<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends Sipaten 
{
	public $data;

	public $now_date;

	public $start_date;

	public $end_date;

	public $category;

	public $user;

	public $status;

	public $query;

	public $per_page;

	public $page;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Surat Keluar', "surat_keluar");

		$this->load->model('msurat_keluar', 'surat_keluar');

		$this->now_date = date('Y-m-d');

		$this->start_date = $this->input->get('start');

		$this->end_date = $this->input->get('end');

		$this->category = $this->input->get('jenis');

		$this->user = $this->input->get('user');

		$this->status = $this->input->get('status');

		$this->query = $this->input->get('query');

		$this->per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 20;

		$this->page = $this->input->get('page');

		$this->load->js('https://js.pusher.com/2.2/pusher.min.js');
		$this->load->js(base_url("public/app/surat_keluar.js"));
	}

	public function index()
	{
		$this->page_title->push('Surat Keluar', 'Data Surat Keluar');

		$this->breadcrumbs->unshift(2, 'Surat Keluar', "surat_keluar");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url(
			"surat_keluar?per_page={$this->per_page}&query={$this->query}&start={$this->start_date}&end={$this->end_date}&jenis={$this->category}&status={$this->status}&user={$this->user}"
		);

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->surat_keluar->data(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => 'Data Surat Keluar', 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data_surat' => $this->surat_keluar->data($this->per_page, $this->page),
			'num_surat' => $config['total_rows']
		);

		$this->template->view('surat-keluar/data-surat', $this->data);
	}

	public function print_out()
	{
		$this->data = array(
			'title' => 'Data Surat Keluar', 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data_surat' => $this->surat_keluar->data($this->per_page, $this->page),
			'num_surat' => $this->surat_keluar->data(null, null, 'num')
		);

		$this->load->view('surat-keluar/print-surat-keluar', $this->data);
	}

	/**
	 * Get Print SUrat
	 *
	 * @param Integer (ID) surat
	 * @return Html output (print)
	 **/
	public function print_surat($param = 0)
	{
		$surat = $this->surat_keluar->get($param);

		$this->data = array(
			'title' => "PRINT | {$surat->judul_surat}",
			'get' => $surat,
			'isi' => json_decode($surat->isi_surat)
		);

		$this->load->view("surat-keluar/print/{$surat->slug}", $this->data);
	}

	/**
	 * Get Update SUrat
	 *
	 * @param Integer (ID) surat
	 * @return Html output (form update)
	 **/
	public function get($param = 0)
	{
		$this->load->js(base_url("public/app/isi_surat.js"));
		
		$this->page_title->push('Surat Keluar', 'Sunting Surat Keluar');

		$this->breadcrumbs->unshift(2, 'Sunting Surat Keluar', "surat_keluar");

		$surat = $this->surat_keluar->get($param);

		if($surat == FALSE)
			show_404();

		/*!
		*
		* Get Validation Rules 
		* Ambil dari parent controller
		*/
		parent::get_surat_validation($surat->slug);

		if($this->form_validation->run() == TRUE)
		{
			$this->surat_keluar->update_surat($param);
			
			redirect("surat_keluar/get/{$param}");

		}

		$this->data = array(
			'title' => "Sunting - {$surat->judul_surat}",
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pegawai' => $this->create_surat->pegawai(),
			'syarat' => $this->create_surat->get_syarat($surat->syarat),
			'get' => $surat,
			'isi' => json_decode($surat->isi_surat)
		);

		$this->template->view("surat-keluar/form/{$surat->slug}", $this->data);
	}

	/**
	 * Set Update Status Surat Keluar
	 *
	 * @param Integer (ID) key table surat
	 * @param String (status)
	 * @return 301
	 **/
	public function set_verification($param = 0, $status = 'pending')
	{
		$this->surat_keluar->upadte_status($param, $status);

		$surat = $this->surat_keluar->get($param);

		if( $surat->user != $this->session->userdata('ID') )
		{
			$this->load->library('ci_pusher');
			$pusher = $this->ci_pusher->get_pusher();

			if($status == 'pending')
			{
				$data = array(
					'message' => $this->session->userdata('account')->name." Menolak surat pengajuan anda.",
					'param' => $param,
					'status' => 'warning'
				); 
			} else {
				$data = array(
					'message' => $this->session->userdata('account')->name." Memverifikasi surat pengajuan anda.",
					'param' => $param,
					'status' => 'info'
				); 
			}

			// Send message
			$event = $pusher->trigger('test_channel', 'my_event', $data);
		}
		
		redirect('surat_keluar');
	}

	/**
	 * Hapus Data Surat keluar
	 *
	 * @param Integer (ID) key table surat
	 * @return 301
	 **/
	public function delete($param = 0)
	{
		$this->surat_keluar->delete($param);

		redirect('surat_keluar');
	}

	/**
	 * Get Action Multiple
	 *
	 * @return 301
	 **/
	public function bulk_action()
	{
		switch ($this->input->post('action')) 
		{
			case 'value':
				# code...
				break;
			
			default:
				# code...
				break;
		}
	}

	public function trigger_event()
	{
		// Load the library.
		// You can also autoload the library by adding it to config/autoload.php
		$this->load->library('ci_pusher');
		$pusher = $this->ci_pusher->get_pusher();

		echo form_open(current_url());
		echo "<textarea name='pesan'></textarea>";
		echo "<button type='submit'>Kirim pesan </button>";

		echo form_close();
		// Set message
		if($this->input->post('pesan') != '')
		{
			$data['message'] = $this->input->post('pesan');
			// Send message
			$event = $pusher->trigger('test_channel', 'my_event', $data);
			if ($event === TRUE)
			{
				echo 'Oke Zakky';
			}
			else
			{
				echo 'Ouch, something happend. Could not trigger event.';
			}
		}	

	}
}

/* End of file Surat_keluar.php */
/* Location: ./application/controllers/Surat_keluar.php */