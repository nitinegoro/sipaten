<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keterangan extends Sipaten 
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index($param = 0)
	{
		echo $param;
	}

}

/* End of file Surat_keterangan.php */
/* Location: ./application/controllers/Surat_keterangan.php */