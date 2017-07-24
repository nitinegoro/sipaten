<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends Apps 
{
	public $data;

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->data = array(
			'title' => "Data Surat Keluar"
		);

		$this->load->view('data-surat', $this->data);
	}

	public function get()
	{
		$this->data = array(
			'title' => "Detail Surat"
		);

		$this->load->view('detail-surat', $this->data);
	}
}

/* End of file Surat.php */
/* Location: ./application/modules/apps/controllers/Surat.php */