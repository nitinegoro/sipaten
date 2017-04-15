<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends Sipaten 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->breadcrumbs->unshift(1, 'Menajemen Penilaian', "penilaian");

		$this->load->model('mpenilaian','penilaian');
	}

	public function index()
	{
		$this->page_title->push('Menajemen Penilaian', 'Administrator KIOSK Penilaian');

		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');

		if($this->input->post())
			foreach($this->input->post('jawaban') as $key => $value)
				$this->form_validation->set_rules("jawaban[{$key}]", "Jawaban {$key}", 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->penilaian->save();

			redirect(current_url());
		} else 

		$this->data = array(
			'title' => "Menajemen Penilaian", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('penilaian/index', $this->data);	
	}

}

/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */