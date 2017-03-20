<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('SIPATEN_VERSION', '1.0.0 <small>(Pre Release)</small>');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		

	}
}

/**
* Extends Class Sipaten
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/
class Sipaten extends MY_Controller
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mcreate_surat', 'create_surat');

		$this->breadcrumbs->unshift(0, 'Home', 'main');

		if($this->session->has_userdata('authentifaction')==FALSE)
			redirect(site_url('login?from_url='.current_url()));
	}

	/**
	 * Get Data Penduduk JSON
	 *
	 * @param Integer (ID)
	 * @return string (JSON)
	 **/
	public function penduduk($param = 0)
	{
		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');
		if($param == FALSE) 
		{
			foreach($this->db->get('penduduk')->result() as $row)
			{
				$this->data[] = array(
					'id' => $row->ID,
					'nik' => $row->nik,
					'nama' => $row->nama_lengkap,
					'jns_kelamin' => ucfirst($row->jns_kelamin),
					'alamat' => $row->alamat." - ".$row->nama_desa.", RT ".$row->rt."/RW".$row->rw
				); 
			} 
		} else {
			$get = $this->db->get_where('penduduk', array('ID' => $param))->row();

			$date = new DateTime($get->tgl_lahir);

			$this->data = array(
				'id' => $get->ID,
				'nik' => $get->nik,
				'nama' => $get->nama_lengkap,
				'tgl_lahir' => $get->tmp_lahir.", ".$date->format('d M Y'),
				'jns_kelamin' => ucfirst($get->jns_kelamin),
				'alamat' => $get->alamat." - ".$get->nama_desa."<br> ".$get->rt."/".$get->rw."<br>".$get->nama_desa,
				'agama' => ucfirst($get->agama),
				'status_kawin' => strtoupper($get->status_kawin),
				'kewarganegaraan' => strtoupper($get->kewarganegaraan)
			);

			$this->log_surat_check($get->nik, $this->input->get('surat'));

			if( $this->create_surat->valid_requirement_check($get->nik, $this->input->get('surat')) )
			{
				$this->data['status'] = true;
			} else {
				$this->data['status'] = false;
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($this->data));
	}

	/**
	 * Mengecek History Pengajuan Surat
	 *
	 * @param String (NIK)
	 * @param String (kategori_surat)
	 * @return string (JSON)
	 **/
	public function log_surat_check($param = '', $kategori = 0)
	{
		$log_surat = $this->db->query("SELECT nik, syarat, tanggal FROM log_surat WHERE nik = {$param} AND nomor_surat IN(0) AND kategori = {$kategori}")->result();

		foreach($log_surat as $row)
		{
			$this->data['syarat_surat'][] = array(
				'id' => $row->syarat,
				'date' => $row->tanggal
			);
		}

		return $this->data;
	}

	/**
	 * Get Validation Rules
	 *
	 * @param String (slug) kategori surat
	 * @return Void
	 **/
	public function get_surat_validation($param = '')
	{
		switch ($param) 
		{
			case 'domisili-perusahaan':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[nama_desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[nama_perusahaan]', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_perusahaan]', 'Alamat Perusahaan', 'trim|required');
				break;
			case 'keterangan-usaha':
				$this->form_validation->set_rules('isi[pejabat_lurah]', 'Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[nip_pejabat_lurah]', 'NIP Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[jabatan_pejabat_lurah]', 'Jabatan Pejabat Lurah', 'trim|required');
				$this->form_validation->set_rules('isi[nama_usaha]', 'Nama Usaha', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_usaha]', 'Alamat Usaha', 'trim|required');
				break;
			case 'kelakuan-baik':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[nama_desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[keperluan]', 'Keperluan', 'trim|required');
				break;
			case 'perpanjangan-izin-oprasional':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[nama_lembaga]', 'Nama Lembaga', 'trim|required');
				$this->form_validation->set_rules('isi[nama_pengelola]', 'Nama Pengelola', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_lembaga]', 'Alamat Lembaga', 'trim|required');
				break;
			default:
				# code...surat
				break;
		}
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('ttd_pejabat', 'Tanda Tangan', 'trim|required');
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */