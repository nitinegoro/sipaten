<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Apps 
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->data = array(
			'title' => "Dashboard"
		);

		$this->load->view('main-index', $this->data);
	}
}

/* End of file Main.php */
/* Location: ./application/modules/apps/controllers/Main.php */