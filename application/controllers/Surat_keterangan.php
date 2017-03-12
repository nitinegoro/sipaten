<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keterangan extends Sipaten 
{
	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Surat Keterangan', "surat_keterangan/index/{$this->uri->segment(3)}");

		$this->load->model('msurat_keterangan', 'surat_keterangan');

		$this->load->js(base_url("public/app/surat_keterangan.js"));
	}

	public function index($param = 0)
	{
		if($this->surat_keterangan->surat_category($param, 'non perizinan') == FALSE)
			show_404();

		$surat = $this->surat_keterangan->surat_category($param, 'non perizinan');

		$this->page_title->push('Surat Keterangan', $surat->nama_kategori);

		$this->breadcrumbs->unshift(2, $surat->nama_kategori, "surat_keterangan/index/{$param}");

		$this->data = array(
			'title' => $surat->nama_kategori, 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pegawai' => $this->surat_keterangan->pegawai(),
			'syarat' => $this->surat_keterangan->get_syarat($surat->syarat),
			'get' => $surat
		);

		$this->template->view('surat-keterangan/insert-requerment', $this->data);
	}

	/**
	 * Menyimpan Syarat Pengajuan Surat
	 * Menjadi log_surat 'pending'
	 *
	 * @return string
	 **/
	public function save_history()
	{
		$this->surat_keterangan->save_history();

		redirect("surat_keterangan/index/{$this->input->post('kategori-surat')}");
	}

	public function create($param = 0)
	{
		if($this->surat_keterangan->surat_category($param, 'non perizinan') == FALSE)
			show_404();

		$surat = $this->surat_keterangan->surat_category($param, 'non perizinan');

		$this->page_title->push('Surat Keterangan', $surat->nama_kategori);

		$this->breadcrumbs->unshift(2, $surat->nama_kategori, "surat_keterangan/create/{$param}");

		$this->data = array(
			'title' => $surat->nama_kategori, 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pegawai' => $this->surat_keterangan->pegawai(),
			'syarat' => $this->surat_keterangan->get_syarat($surat->syarat)
		);

		$this->template->view('surat-keterangan/create', $this->data);
	}

}

/* End of file Surat_keterangan.php */
/* Location: ./application/controllers/Surat_keterangan.php */