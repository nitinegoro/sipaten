<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memployee extends Sipaten_model 
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
		if($this->input->get('gender') != '')
			$this->db->where('jns_kelamin', $this->input->get('gender'));

		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'))
					 ->or_like('nip', $this->input->get('query'));

		if($type == 'result')
		{
			return $this->db->get('pegawai', $limit, $offset)->result();
		} else {
			return $this->db->get('pegawai')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('pegawai', array('ID' => $param))->row();
	}

	public function create()
	{
		$pegawai = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('name'),
			'jabatan' => $this->input->post('jabatan'),
			'jns_kelamin' => $this->input->post('gender'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon')
		);

		$this->db->insert('pegawai', $pegawai);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Pegawai ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	public function update($param = 0)
	{
		$pegawai = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('name'),
			'jabatan' => $this->input->post('jabatan'),
			'jns_kelamin' => $this->input->post('gender'),
			'alamat' => $this->input->post('alamat'),
			'telepon' => $this->input->post('telepon')
		);

		$this->db->update('pegawai', $pegawai, array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Pegawai diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}	
	}

	public function delete($param = 0)
	{
		$this->db->delete('pegawai',  array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Pegawai dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menghapus data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete_multiple()
	{
		if(is_array($this->input->post('pegawai')))
		{
			foreach($this->input->post('pegawai') as $value)
				$this->db->delete('pegawai', array('ID' => $value));

			$this->template->alert(
				' Data pegawai berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dipilih.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}
	
	/**
	 * Check Ketersediaan nip
	 *
	 * @param Integer (ID)
	 * @return string
	 **/
	public function nip_check($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('pegawai', array('nip' => $this->input->post('nip')))->num_rows();
		} else {
			return $this->db->query("SELECT nip FROM pegawai WHERE nip IN({$this->input->post('nip')}) AND ID != {$param}")->num_rows();
		}
	}
}

/* End of file Memployee.php */
/* Location: ./application/models/Memployee.php */