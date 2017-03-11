<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* Surat Model Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Msurat extends Sipaten_model 
{
	public $user;
	
	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('slug'));
		
		$this->user = $this->session->userdata('ID');
	}
	
	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('nama_kategori', $this->input->get('query'));

		if($type == 'result')
		{
			return $this->db->get('kategori_surat', $limit, $offset)->result();
		} else {
			return $this->db->get('kategori_surat')->num_rows();
		}
	}

	public function create_category()
	{
		$kategori_surat = array(
			'nama_kategori' => $this->input->post('nama_surat'), 
			'deskripsi' => $this->input->post('deskripsi'),
			'jenis' => $this->input->post('jenis'),
			'syarat' => implode(",", $this->input->post('syarat')),
			'durasi' => $this->input->post('durasi')
		);

		$this->db->insert('kategori_surat', $kategori_surat);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Jenis ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}
}

/* End of file Msurat.php */
/* Location: ./application/models/Msurat.php */