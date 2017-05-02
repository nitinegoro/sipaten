<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msurat_online extends Sipaten_model 
{
	protected $ci;

	public $user;

	public function __construct()
	{
		parent::__construct();
		
		$this->ci =& get_instance();

		$this->ci->load->model(array('rest_api'));

		$this->user = $this->session->userdata('ID');
	}

	public function create($param = 0)
	{
		/* Tambahkan Insert Data Penduduk



		*/
		$get = $this->ci->rest_api->surat();

		$catlocal = self::get_local_category( $get->slug );

		$curatonline = array(
			'nomor_surat' => $this->ci->create_surat->get_nomor_surat($catlocal->id_surat, null), 
			'nik' => $get->penduduk->nik,
			'kategori' => $catlocal->id_surat,
			'tanggal' => date('Y-m-d'),
			'isi_surat' => $get->isi,
			'pegawai' => $this->input->post('pegawai'),
			'pemeriksa' => $this->input->post('pemeriksa'),
			'user' => $this->user,
			'waktu_mulai' => $get->waktu->mulai,
			'waktu_selesai' => $get->waktu->selesai,
			'status' => 'pending'
		);

		return $curatonline;
	}

	/**
	 * Ambil Kategori Lokal
	 *
	 * @param String
	 * @return Object
	 **/
	private function get_local_category($slug = '')
	{
		return $this->db->get_where('kategori_surat', array('slug' => $slug))->row();
	}
}

/* End of file Msurat_online.php */
/* Location: ./application/models/Msurat_online.php */