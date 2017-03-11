<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maccount extends Sipaten_model 
{
	public $user;

	public function __construct()
	{
		parent::__construct();

		$this->user = $this->session->userdata('ID');

		$this->load->library(array('upload'));
	}

	public function get()
	{
		return $this->db->get_where('users', array('user_id' => $this->user))->row();
	}
	
	public function change_password()
	{
		$get = $this->get();

		$config['upload_path'] = './public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_foto')) 
		{

			$this->template->alert(
				$this->upload->display_errors('<span>','</span>'), 
				array('type' => 'success','icon' => 'check')
			);

			$gambar = $get->photo;
			
		} else {

			if($get->photo != '')
				unlink("public/image/{$get->photo}");

			$gambar = $this->upload->file_name;
		}

		$data = array(
			'nip' => $this->input->post('nip'),
			'name' => $this->input->post('name'),  
			'address' => $this->input->post('alamat'),
			'phone' => $this->input->post('phone'),
			'photo' => $gambar
		);

		if($this->input->post('new_pass') != '')
			$data['password'] = password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT);

		$this->db->update('users', $data, array('user_id' => $this->user));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Perubahan tersimpan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal melakukan perubahan.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}
}

/* End of file Maccount.php */
/* Location: ./application/models/Maccount.php */