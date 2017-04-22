<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Permission Module pada fiel role
 * Table user_role
 *
 * @param String (module name)
 * @param String (action module)
 * @return Boleaan
 **/
class Permission
{
	protected $ci;

	public $user_role;

	public $role = array();

	public function __construct()
	{
        $this->ci =& get_instance();

        $this->ci->load->model('option');

        $this->user_role = $this->ci->session->userdata('account')->role_id;

        if($this->user_role)
        	$this->role = json_decode($this->ci->option->get_role($this->user_role)->role);
	}

	public function is_true($module = '', $action = '')
	{
		return in_array($action, $this->role->$module);
	}

}

/* End of file Permission.php */
/* Location: ./application/libraries/Permission.php */
