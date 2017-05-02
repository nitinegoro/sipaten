<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_online extends Sipaten 
{
	public $mode_searching;

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('rest_api'));
		
		$this->breadcrumbs->unshift(1, 'Cek Pelayanan Online', "surat_online");

		$this->mode_searching = ( $this->input->get('ID') != '') ? TRUE : FALSE;
	}

	public function index()
	{
		$this->page_title->push('Cek Pelayanan Online', 'Cari berdasarkar nomor pengajuan.');

		$this->data = array(
			'title' => "Cek Pelayanan Online", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->rest_api->surat(),
		);

		$this->template->view('surat-online/index', $this->data);
	}

	public function test($value='')
	{
		return "Oke";
	}
}

/* End of file Surat_online.php */
/* Location: ./application/controllers/Surat_online.php */