<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Statistik Surat Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Surat_stats extends Sipaten 
{
	public $start_date;

	public $end_date;

	public function __construct()
	{
		parent::__construct();
		
		$this->start_date = $this->input->get('start');

		$this->end_date = $this->input->get('end');

		$this->breadcrumbs->unshift(1, 'Statistik', "surat_stats");

		$this->load->model('msurat_stats','stats');
	}

	public function index()
	{
		$this->page_title->push('Statistik', 'Surat Non Perizinan');

		$this->breadcrumbs->unshift(2, 'Surat Non Perizinan', "surat_stats");

		$this->data = array(
			'title' => "Surat Non Perizinan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('surat-stats/non_perizinan', $this->data);
	}

	public function perizinan()
	{
		$this->page_title->push('Statistik', 'Surat Perizinan');

		$this->breadcrumbs->unshift(2, 'Surat Perizinan', "surat_stats/perizinan");

		$this->data = array(
			'title' => "Surat Perizinan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);
		
		$this->template->view('surat-stats/perizinan', $this->data);
	}

}

/* End of file Surat_stats.php */
/* Location: ./application/controllers/Surat_stats.php */