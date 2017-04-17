<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends Sipaten
{
	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Analisa Pelayanan', "analytics");

		$this->load->model('manalytics','analytics');
	}

	public function index()
	{
		$this->page_title->push('Analisa Pelayanan', 'Surat Perizinan & Non Perizinan');

		$this->data = array(
			'title' => "Analisa Pelayanan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->analytics->get()
		);

		$this->template->view('analytics/index', $this->data);	
	}

	public function test()
	{
		$pisah = explode('/', '65/0002/19.04.01.2003/2017');

		echo "<pre>";

		print_r($pisah);
	}
}

/* End of file Analytics.php */
/* Location: ./application/controllers/Analytics.php */