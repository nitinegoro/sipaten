<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Seeting Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Setting extends Sipaten 
{
	public $myaccount;

	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Pengaturan', "setting");

		$this->myaccount = $this->session->userdata('ID');

		//$this->load->js(base_url('public/app/tour/account-tour.js'));
	}

	public function index()
	{
		$this->breadcrumbs->unshift(2, 'Pengaturan Sistem', "setting");
		$this->page_title->push('Pengaturan', 'Pengaturan Sistem');

		$this->data = array(
			'title' => "Pengaturan Sistem", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view('setting/sistem-setting', $this->data);
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */