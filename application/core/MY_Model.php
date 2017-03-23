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

	public function get_user($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get('users')->result();
		} else {
			return $this->db->get_where('users', array('user_id' => $param))->row();
		}
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

	public function get_desa($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get('desa')->result();
		} else {
			return $this->db->get_where('desa', array('id_desa' => $param))->row();
		}
	}

	/**
	 * Get Syarat Surat
	 *
	 * @param Integer (id_syarat)
	 **/
	public function get_syarat_surat($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get('syarat_surat')->result();
		} else {
			return $this->db->get_where('syarat_surat', array('id_syarat' => $param))->row();
		}
	}

	/**
	 * Get Kategori Surat
	 *
	 * @param Integer (id_surat)
	 * @param String (jenis)
	 **/
	public function surat_category($param = 0, $jenis = 'non perizinan')
	{
		if($param == FALSE)
		{
			return $this->db->get_where('kategori_surat', array('jenis' => $jenis))->result();
		} else {
			return $this->db->get_where('kategori_surat', array('id_surat' => $param))->row();
		}
	}

	/**
	 * Get Kategori Surat
	 *
	 **/
	public function category()
	{
		return $this->db->get('kategori_surat')->result();
	}

	/**
	 * Get Pejabat Pemerintah
	 *
	 * @param Integer (ID)
	 **/
	public function pegawai($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('pegawai')->result();
		} else {
			return $this->db->get_where('pegawai', array('ID' => $param))->row();
		}
	}

	/**
	 * Get Data Penduduk
	 *
	 * @param Integer (ID)
	 **/
	public function get_penduduk($param = 0)
	{
		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');
		return $this->db->get_where('penduduk', array('ID' => $param))->row();
	}

	/**
	 * Get Keluarga in (no_kk)
	 *
	 * @param String (no_kk)
	 * @return Result
	 **/
	public function get_keluarga($param = 0)
	{
		return $this->db->get_where('penduduk', array('no_kk' => $param))->result();

		//return $this->db->query("SELECT * FROM penduduk WHERE no_kk IN({$param})")->result();
	}

	/**
	 * Ambil Maks Nomor Surat
	 *
	 * @param Integer (category surat)
	 * @param String (Date as tanggal)
	 * @return Integer
	 **/
	public function get_nomor_surat($category = 0, $year = NULL)
	{
		if($year == NUll)
			$year = date('Y');

		$query = $this->db->query("SELECT MAX(nomor_surat) AS nomor FROM surat WHERE YEAR(tanggal) = {$year} AND kategori = {$category}")->row('nomor');

		return nomor_urut(++$query);
	}
	
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */