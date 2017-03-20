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
		$this->db->select('surat.ID, nomor_surat, surat.nik, nama_lengkap, kode_surat, id_surat, tanggal, status,  judul_surat, name, nama');

		$this->db->where_not_in('status', 'entry');

		$this->db->join('kategori_surat', 'surat.kategori = kategori_surat.id_surat', 'left');

		$this->db->join('penduduk', 'surat.nik = penduduk.nik', 'left');

		$this->db->join('users', 'surat.user = users.user_id', 'left');

		$this->db->join('pegawai', 'surat.pegawai = pegawai.ID', 'left');

		$this->db->order_by('surat.ID', 'desc');

		if($type == 'result')
		{
			return $this->db->get('surat', $limit, $offset)->result();
		} else {
			return $this->db->get('surat')->num_rows();
		}
	}

	public function get($param = 0)
	{
		$this->db->select('
			surat.*, kategori_surat.*, penduduk.nik, penduduk.nama_lengkap, penduduk.pekerjaan, penduduk.tmp_lahir, penduduk.tgl_lahir, penduduk.agama, penduduk.alamat, penduduk.rt, penduduk.rw, penduduk.jns_kelamin, penduduk.status_kawin, penduduk.kewarganegaraan, desa.nama_desa, pegawai.nama, pegawai.jabatan'
		);

		$this->db->where_not_in('status', 'entry');

		$this->db->join('kategori_surat', 'surat.kategori = kategori_surat.id_surat', 'left');

		$this->db->join('penduduk', 'surat.nik = penduduk.nik', 'left');

		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');

		$this->db->join('users', 'surat.user = users.user_id', 'left');

		$this->db->join('pegawai', 'surat.pegawai = pegawai.ID', 'left');

		$this->db->where('surat.ID', $param);

		return $this->db->get('surat')->row();
	}

	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	public function update_surat($param = 0)
	{
		$surat = array(
			'nomor_surat' => $this->input->post('nomor_surat'),
			'isi_surat' => json_encode($this->input->post('isi')),
			'pegawai' => $this->input->post('ttd_pejabat') 
		);

		$this->db->update('surat', $surat, array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Surat berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

}

/* End of file Msurat_keluar.php */
/* Location: ./application/models/Msurat_keluar.php */