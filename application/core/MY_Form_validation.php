<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

	public function __construct()
	{
	   
	}


	public function valid_date($date)
	{
		if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date) != TRUE)
		{
			return FALSE;
		}
	}


	
}

/* End of file MY_Form_validation.php */
/* Location: ./application/core/MY_Form_validation.php */