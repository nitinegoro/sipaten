<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userguide extends Sipaten 
{
	/**
	 * Halaman Panduan Sistem Berupa HTML Manual
	 *
	 **/
	public $data = array();

	public $method;

	public function __construct()
	{
		parent::__construct();

        $ci    =& get_instance();

        $this->method = $ci->router->fetch_method();

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

	private function tutorial_contents()
	{
		return array_diff_key(scandir(APPPATH."/views/userguide/tutorial"), array('.','..'));
	}

	public function tutorial($param = '')
	{ 
		if($param == '')
			show_404();

		$this->page_title->push('Panduan Sistem', '');

		$this->data = array(
			'title' => "Panduan Sistem",
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view("userguide/tutorial/{$param}", $this->data);
	}	

}

/* End of file Userguide.php */
/* Location: ./application/controllers/Userguide.php */