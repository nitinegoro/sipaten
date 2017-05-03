<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_api extends CI_Model 
{
	public $url;

	public $method;

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library( array('curl') );
	
		$this->url = "http://192.168.100.6/tempayan/api";

		$this->method = $this->input->get('ID');
	}
	
	public function surat()
	{
		$surat = json_decode( $this->curl->simple_get( $this->url . '/surat?ID=' . $this->method ) );

		if( $surat  != NULL) 
		{
			if( $this->method != '') 
			{
				return $surat[0];
			} else {
				return $surat;
			}
		} else {
			return FALSE;
		}
	}



	/**
	 * Generate DOM file
	 *
	 * @param String (Url)
	 * @return String
	 **/
	public function view_file($url = '')
	{
		$filepath = pathinfo($url);

		switch ( $filepath['extension'] ) 
		{
			case 'jpg':
			case 'gif':
			case 'png':
			case 'JPG':
			case 'GIF':
			case 'PNG':
				return '<a href="'.$url.'" data-toggle="lightbox"  data-title="Berkas Gambar"><i class="fa fa-image"></i> </a>';
				break;
			case 'pdf':
			case 'PDF':
				return '<a href="'.$url.'" data-width="1200" data-toggle="lightbox" data-title="Berkas PDF"><i class="fa fa-file-pdf-o"></i></a>';
				break;
			default:
				# code...
				break;
		}
	}
}

/* End of file Rest_api.php */
/* Location: ./application/models/Rest_api.php */