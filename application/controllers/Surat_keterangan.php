<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keterangan extends Sipaten 
{
	public $now_date;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Surat Keterangan', "surat_keterangan/index/{$this->uri->segment(3)}");

		$this->load->model('msurat_keterangan', 'surat_keterangan');

		$this->now_date = date('Y-m-d');
	}

	public function index($param = 0)
	{
		if($this->surat_keterangan->surat_category($param, 'non perizinan') == FALSE)
			show_404();

		$this->load->js(base_url("public/app/requirment_surat.js"));

		$surat = $this->surat_keterangan->surat_category($param, 'non perizinan');

		$this->page_title->push('Surat Keterangan', $surat->nama_kategori);

		$this->breadcrumbs->unshift(2, $surat->nama_kategori, "surat_keterangan/index/{$param}");

		$this->data = array(
			'title' => $surat->nama_kategori, 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pegawai' => $this->surat_keterangan->pegawai(),
			'syarat' => $this->surat_keterangan->get_syarat($surat->syarat),
			'get' => $surat
		);

		$this->template->view('surat-keterangan/insert-requerment', $this->data);
	}

	/**
	 * Menghapus Log Syarat Pengajuan Surat
	 * Menjadi log_surat 
	 *
	 * @return string
	 **/
	public function delete_history($param = '', $category = 0)
	{
		$this->surat_keterangan->delete_history($param, $category);

		redirect("surat_keterangan/index/{$category}");
	}

	/**
	 * Menghapus Syarat pada checkbox Pengajuan Surat 
	 *
	 * @param Integer (id_syarat)
	 * @return string
	 **/
	public function delete_syarat($param = 0)
	{
		$this->surat_keterangan->delete_syarat($param);
	}	

	/**
	 * Check Log Surat 
	 * Apakah sudah pernah buat sebelumnya
	 *
	 * @param Integer (nik) penduduk
	 * @return string
	 **/
	public function insert_log_surat()
	{
		if(is_array($this->input->post('syarat')))
		{
			foreach($this->input->post('syarat') as $key => $value)
			{
				if($this->surat_keterangan->log_surat_check_syarat($this->input->post('nik'), $this->input->post('kategori-surat'), $value))
				{
					continue;
				} else {
					$log_surat = array(
						'nik' => $this->input->post('nik'),
						'tanggal' => date('Y-m-d'),
						'kategori' => $this->input->post('kategori-surat'),
						'syarat' => $value,
						'nomor_surat' => 0
					);

					$this->db->insert('log_surat', $log_surat);
				}
			}

			if($this->surat_keterangan->valid_requirement_check($this->input->post('nik'), $this->input->post('kategori-surat')) )
			{
				$this->data = array(
					'status' => true
				);
			} else {
				$this->data = array(
					'status' => false
				);
			}

			$this->output->set_content_type('application/json')->set_output(json_encode($this->data));
		}
	}

	public function create($param = 0, $ID = 0)
	{
		if($this->surat_keterangan->surat_category($param, 'non perizinan') == FALSE)
			show_404();

		$penduduk = $this->surat_keterangan->get_penduduk($ID);

		/* Apabila syarat kosong */
		if( $this->surat_keterangan->valid_requirement_check($penduduk->nik, $param) == FALSE)
			show_404();

		$this->surat_keterangan->create_surat($penduduk->nik, $param);

		$surat = $this->surat_keterangan->surat_category($param, 'non perizinan');

		$this->page_title->push('Surat Keterangan', $surat->nama_kategori);

		$this->breadcrumbs->unshift(2, $surat->nama_kategori, "surat_keterangan/create/{$param}");

		/* Get Validation Rules */
		$this->get_validation($surat->slug);

		if($this->form_validation->run() == TRUE)
		{
			$this->surat_keterangan->update_surat($penduduk->nik, $param);
			
			redirect("surat_keterangan/index/{$param}");

		}

		$this->data = array(
			'title' => $surat->nama_kategori, 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pegawai' => $this->surat_keterangan->pegawai(),
			'syarat' => $this->surat_keterangan->get_syarat($surat->syarat),
			'penduduk' => $penduduk,
			'surat' => $surat
		);

		$this->template->view("surat-keterangan/{$surat->slug}", $this->data);
	}

	/**
	 * Get Validation Rules
	 *
	 * @param String (slug) kategori surat
	 * @return Void
	 **/
	private function get_validation($param = '')
	{
		switch ($param) 
		{
			case 'domisili-perusahaan':
				$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[nama_perusahaan]', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_perusahaan]', 'Alamat Perusahaan', 'trim|required');
				break;
			
			default:
				# code...surat
				break;
		}

		$this->form_validation->set_rules('ttd_pejabat', 'Tanda Tangan', 'trim|required');
	}

}

/* End of file Surat_keterangan.php */
/* Location: ./application/controllers/Surat_keterangan.php */