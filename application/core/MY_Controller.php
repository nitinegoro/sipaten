<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('SIPATEN_VERSION', '1.0.0 <small>(Pre Release)</small>');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		

	}
}

/**
* Extends Class Sipaten
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/
class Sipaten extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(0, 'Home', 'main');

		if($this->session->has_userdata('authentifaction')==FALSE)
			redirect(site_url('login'));
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */