<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keterangan extends Sipaten 
{
	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Surat Keterangan', "surat_keterangan/index/{$this->uri->segment(3)}");

		$this->load->model('msurat_keterangan', 'surat_keterangan');
	}

	public function index($param = 0)
	{
		if($this->surat_keterangan->surat_category($param, 'non perizinan') == FALSE)
			show_404();
	}

	public function create($param = 0)
	{
		if($this->surat_keterangan->surat_category($param, 'non perizinan') == FALSE)
			show_404();

		$surat = $this->surat_keterangan->surat_category($param, 'non perizinan');

		$this->page_title->push('Surat Keterangan', $surat->nama_kategori);

		$this->breadcrumbs->unshift(2, $surat->nama_kategori, "surat_keterangan/create/{$param}");

		$this->form_validation->set_rules('nip', 'NIP', 'trim|callback_validate_nip|required');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->employee->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => $surat->nama_kategori, 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('surat-keterangan/create', $this->data);
	}

}

/* End of file Surat_keterangan.php */
/* Location: ./application/controllers/Surat_keterangan.php */