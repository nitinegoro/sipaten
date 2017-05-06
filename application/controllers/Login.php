<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* Login Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Login extends CI_Controller 
{
	private $nik;

	private $password;

	public $captcha_component;

	public function __construct()
	{
		parent::__construct();
		
		$this->nik = $this->input->post('nik');

		$this->password = $this->input->post('password');

		$this->captcha_component = array(
			'word' => '', 
			'word_length' => 4, 
			'img_path' => './public/captcha/',   
			'img_url' => base_url() .'public/captcha/',
			'font_path' => FCPATH . 'system/fonts/arial.ttf',
			'img_width' => '250',
			'img_height' => 65,  
			'font_size' => 25,
			'expiration' => 3600 ,
	        'colors'        => array(
	           	'background' => array(255, 255, 255),
	           	'border' => array(255, 255, 255),
	           	'text' => array(34,42,125),
	           	'grid' => array(40, 40, 40)
	        )
		);
	}

	public function index()
	{
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_validate_captcha');

		$data['captcha'] = create_captcha($this->captcha_component);
		
        if ($this->form_validation->run() == FALSE)
        {
		 	$this->session->set_userdata( array('captcha' => $data['captcha']) );

            $this->load->view('login-form', $data);
        } 
        else 
        {
        	$nik = $this->input->post('nik');
        	$password = $this->input->post('password');

        	// get data account
        	$account = $this->_get_account($nik);

        	// authentifaction dengan password verify
        	if (password_verify($password, $account->password)) 
        	{
        		// set session data
        		$this->_set_account_login($account);

        		// if session destroy in other page
        		if( $this->input->get('from_url') != '')
        		{
        			redirect( $this->input->get('from_url') );
        		} else {
        			redirect('main');
        		}
        	} else {
	        	// set error alert
				$this->template->alert(
					'Nik dan password tidak valid.', 
					array('type' => 'danger','icon' => 'times')
				);
        		$this->load->view('login-form', $data);
        	}
        }
	}

	/**
	 * Take a data  accounts
	 *
	 * @param String (nik)
	 * @access private
	 * @return Object
	 **/
	private function _get_account($param = 0)
	{
		$query = $this->db->get_where('users', array('nip' => $param));

		if($query->num_rows() == 1)
		{
			return $query->row();
		} else {
			// hilangkan error object
			return (Object) array('password' => '');
		}
	}

	/**
	 * Create Login Session
	 *
	 * @param String
	 * @access private
	 * @return void 
	 **/
	private function _set_account_login($account)
	{
		$this->delete_captcha();
        // set session data
        $account_session = array(
        	'authentifaction' => TRUE,
        	'ID' => $account->user_id,
        	'account' => $account
        );	
        $this->session->set_userdata( $account_session );
	}

	/**
	 * Sign Out session Destroy
	 *
	 * @return Void (destroy session)
	 **/
	public function signout()
	{
		$this->session->sess_destroy();
		redirect($this->input->get('from_url'));
	}

	public function delete_captcha()
	{
        if(isset($this->session->userdata['image']))
        {
            $lastImage = FCPATH . "public/captcha/" . $this->session->userdata['image'];

            if(file_exists($lastImage))
                unlink($lastImage);
        }

        return;
    }

	public function captcha_refresh()
	{
		$captcha = create_captcha($this->captcha_component);

		echo $captcha['image'];
	}

	public function validate_captcha()
	{
	    if($this->input->post('captcha') != $this->session->userdata('captcha')['word'])
	    {
	    	if(!$this->input->post('captcha'))
	    	{
		        $this->form_validation->set_message('validate_captcha', 'Kode Captcha ini diperlukan.');
		        
		        return false;
	    	}
	        
	        $this->form_validation->set_message('validate_captcha', 'Kode Captcha yang anda masukkan salah.');
	        
	        return false;
	   
	    } else {
	        return true;
	    }
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */