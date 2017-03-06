<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* Main Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Main extends Sipaten 
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->page_title->push('Dashboard', 'Selamat datang di Administrator');

		$this->data = array(
			'title' => "Main Dashboard", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('main-dashboard', $this->data);
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */