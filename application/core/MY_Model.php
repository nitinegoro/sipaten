<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	

}

/**
* Extends Model Class Sipaten
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/
class Sipaten_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_role($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get('users_role')->result();
		} else {
			return $this->db->get_where('users_role', array('role_id' => $param))->row();
		}
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */