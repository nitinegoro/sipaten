<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msurat_keluar extends Sipaten_model 
{
	public $start_date;

	public $end_date;

	public $category;

	public $user;

	public $status;

	public $query;

	public function __construct()
	{
		parent::__construct();
	
		$this->start_date = $this->input->get('start');

		$this->end_date = $this->input->get('end');

		$this->category = $this->input->get('jenis');

		$this->user = $this->input->get('user');

		$this->status = $this->input->get('status');

		$this->query = $this->input->get('query');
	}

	public function data($limit = 20, $offset = 0, $type = 'result')
	{
		$this->db->select('nomor_surat, surat.nik, nama_lengkap, kode_surat, tanggal, status,  judul_surat, name, nama');

		$this->db->where_not_in('status', 'entry');

		$this->db->join('kategori_surat', 'surat.kategori = kategori_surat.id_surat', 'left');

		$this->db->join('penduduk', 'surat.nik = penduduk.nik', 'left');

		$this->db->join('users', 'surat.user = users.user_id', 'left');

		$this->db->join('pegawai', 'surat.pegawai = pegawai.ID', 'left');

		if($type == 'result')
		{
			return $this->db->get('surat', $limit, $offset)->result();
		} else {
			return $this->db->get('surat')->num_rows();
		}
	}

}

/* End of file Msurat_keluar.php */
/* Location: ./application/models/Msurat_keluar.php */