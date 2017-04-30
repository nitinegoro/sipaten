<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_online extends Sipaten 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Cek Pelayanan Online', "surat_online");
	}

	public function index()
	{
		$this->page_title->push('Cek Pelayanan Online', 'Cari berdasarkar nomor pengajuan.');

		$this->data = array(
			'title' => "Cek Pelayanan Online", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('surat-online/index', $this->data);
	}

}

/* End of file Surat_online.php */
/* Location: ./application/controllers/Surat_online.php */