<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Main Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Stats_people extends Sipaten 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Statistik', "stats_people");

		$this->load->model('mstats_people', 'stats_people');

		$this->load->js(base_url('public/app/statistik_penduduk.js'));
	}

	public function index()
	{
		$this->page_title->push('Statistik', 'Populasi Penduduk Desa');

		$this->breadcrumbs->unshift(2, 'Kependudukan', "stats_people");

		$this->data = array(
			'title' => "Populasi Penduduk Desa", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'desa' => $this->stats_people->get_desa(),
		);

		$this->template->view('statistik/people-population', $this->data);
	}

}

/* End of file Stats_people.php */
/* Location: ./application/controllers/Stats_people.php */