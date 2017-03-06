<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends Sipaten_model 
{
	public $user;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->user = $this->session->userdata('ID');
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{

		$this->db->join('users_role', 'users.role_id = users_role.role_id', 'left');

		if($type == 'result')
		{
			return $this->db->get('users', $limit, $offset)->result();
		} else {
			return $this->db->get('users')->num_rows();
		}
	}

	public function create()
	{
		$user = array(
			'nik' => $this->input->post('nik'),
			'name' => $this->input->post('name'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'address' => '',
			'phone' => '',
			'photo' => '',
			'active' => 1,
			'role_id' => $this->input->post('role') 
		);

		$this->db->insert('users', $user);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Pengguna ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	/**
	 * Check Ketersediaan NIK
	 *
	 * @param Integer (user_id)
	 * @return string
	 **/
	public function nik_check($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('users', array('nik' => $this->input->post('nik')))->num_rows();
		}
	}

}

/* End of file Muser.php */
/* Location: ./application/models/Muser.php */