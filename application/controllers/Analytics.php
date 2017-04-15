<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends Sipaten
{
	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Analisa Pelayanan', "analytics");
	}

	public function index()
	{
		$this->page_title->push('Analisa Pelayanan', 'Surat Perizinan & Non Perizinan');

		$this->data = array(
			'title' => "Analisa Pelayanan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('analytics/index', $this->data);	
	}

}

/* End of file Analytics.php */
/* Location: ./application/controllers/Analytics.php */