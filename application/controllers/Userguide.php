<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userguide extends Sipaten 
{
	/**
	 * Halaman Panduan Sistem Berupa HTML Manual
	 *
	 **/
	public $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Panduan Sistem', "userguide");
	}

	public function index()
	{
		$this->page_title->push('Panduan Sistem', '');

		$this->data = array(
			'title' => "Panduan Sistem",
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view("userguide/index", $this->data);
	}

	public function read($param = '')
	{ 
		if($param == '')
			show_404();

		$this->page_title->push('Panduan Sistem', '');

		$this->data = array(
			'title' => "Panduan Sistem",
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view("userguide/{$param}", $this->data);
	}


}

/* End of file Userguide.php */
/* Location: ./application/controllers/Userguide.php */