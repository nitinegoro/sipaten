<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends Sipaten 
{
	public $data;

	public $now_date;

	public $start_date;

	public $end_date;

	public $category;

	public $user;

	public $status;

	public $query;

	public $per_page;

	public $page;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Surat Keluar', "surat_keluar");

		$this->load->model('msurat_keluar', 'surat_keluar');

		$this->now_date = date('Y-m-d');

		$this->start_date = $this->input->get('start');

		$this->end_date = $this->input->get('end');

		$this->category = $this->input->get('jenis');

		$this->user = $this->input->get('user');

		$this->status = $this->input->get('status');

		$this->query = $this->input->get('query');

		$this->per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 20;

		$this->page = $this->input->get('page');

		$this->load->js(base_url("public/app/surat_keluar.js"));
	}

	public function index()
	{
		$this->page_title->push('Surat Keluar', 'Data Surat Keluar');

		$this->breadcrumbs->unshift(2, 'Surat Keluar', "surat_keluar");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url(
			"surat_keluar?per_page={$this->per_page}&query={$this->query}&start={$this->start_date}&end={$this->end_date}&jenis={$this->category}&status={$this->status}&user={$this->user}"
		);

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->surat_keluar->data(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => 'Data Surat Keluar', 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data_surat' => $this->surat_keluar->data($this->per_page, $this->page),
			'num_surat' => $config['total_rows']
		);

		$this->template->view('surat-keluar/data-surat', $this->data);
	}

	/**
	 * Get Print SUrat
	 *
	 * @param Integer (ID) surat
	 * @return Html output (print)
	 **/
	public function print_surat($param = 0)
	{
		$surat = $this->surat_keluar->get($param);

		$this->data = array(
			'title' => "PRINT | {$surat->judul_surat}",
			'get' => $surat,
			'isi' => json_decode($surat->isi_surat)
		);

		$this->load->view("surat-keluar/print/{$surat->slug}", $this->data);
	}

	/**
	 * Get Update SUrat
	 *
	 * @param Integer (ID) surat
	 * @return Html output (form update)
	 **/
	public function get($param = 0)
	{
		$this->page_title->push('Surat Keluar', 'Sunting Surat Keluar');

		$this->breadcrumbs->unshift(2, 'Sunting Surat Keluar', "surat_keluar");

		$surat = $this->surat_keluar->get($param);

		if($surat == FALSE)
			show_404();

		/*!
		*
		* Get Validation Rules 
		* Ambil dari parent controller
		*/
		parent::get_surat_validation($surat->slug);

		if($this->form_validation->run() == TRUE)
		{
			$this->surat_keluar->update_surat($param);
			
			redirect("surat_keluar/get/{$param}");

		}

		$this->data = array(
			'title' => "Sunting - {$surat->judul_surat}",
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pegawai' => $this->create_surat->pegawai(),
			'syarat' => $this->create_surat->get_syarat($surat->syarat),
			'get' => $surat,
			'isi' => json_decode($surat->isi_surat)
		);

		$this->template->view("surat-keluar/form/{$surat->slug}", $this->data);
	}

	public function test($param = 0)
	{
		$surat = $this->surat_keluar->get($param);

		$isi = json_decode($surat->isi_surat);

		echo "<pre>";
		echo print_r($isi);

		echo "</pre>";

		echo $isi->nama_desa;
	}
}

/* End of file Surat_keluar.php */
/* Location: ./application/controllers/Surat_keluar.php */