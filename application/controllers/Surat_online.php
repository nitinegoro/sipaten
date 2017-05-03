<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_online extends Sipaten 
{
	public $mode_searching;

	public $ID;

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('rest_api'));

		$this->load->model('msurat_online', 'surat_online');

		$this->mode_searching = ( $this->input->get('ID') != '') ? TRUE : FALSE;

		$this->ID = $this->input->get('ID');

		$this->load->js( base_url("public/app/surat_online.js") );
	}

	public function index()
	{
		$this->breadcrumbs->unshift(1, 'Cek Pelayanan Online', "surat_online");

		$this->page_title->push('Cek Pelayanan Online', 'Cari berdasarkar nomor pengajuan.');

		$this->data = array(
			'title' => "Cek Pelayanan Online", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->rest_api->surat(),
			'pegawai' => $this->surat_online->pegawai(),
			'pemeriksa' => $this->surat_online->pemeriksa(),
		);

		$this->template->view('surat-online/index', $this->data);
	}

	public function create()
	{
		echo "<pre>";

		print_r($this->surat_online->create());

		parent::create_surat_notification(base_url(), $this->surat_online->create()['pemeriksa']);
	}

	public function all()
	{
		$this->breadcrumbs->unshift(1, 'Data Pengajuan', "surat_online");

		$this->page_title->push('Data Pengajuan', '');

		$this->data = array(
			'title' => "Data Pengajuan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->rest_api->surat(),
		);

		$this->template->view('surat-online/data', $this->data);
	}
}

/* End of file Surat_online.php */
/* Location: ./application/controllers/Surat_online.php */

