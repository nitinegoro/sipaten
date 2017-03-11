<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIPATEN
* Statistik Data Kependudukan Model Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Mstats_people extends Sipaten_model 
{
	/**
	 * Menghitung Jumlah penduduk
	 *
	 * @return Integer
	 **/
	public $count_penduduk;

	/**
	 * Menghitung Jumlah desa
	 *
	 * @return Integer
	 **/
	public $count_desa;


	public function __construct()
	{
		parent::__construct();
		
		$this->count_penduduk = $this->db->count_all('penduduk');

		$this->count_desa = $this->db->count_all('desa');
	}

	/**
	 * Hitung Populasi by desa
	 *
	 * @param Integer (desa)
	 * @return Float
	 **/
	public function desa_population($param = 0)
	{
		$query = $this->db->get_where('penduduk', array('desa' => $param))->num_rows();

		$population = ($this->count_penduduk * $this->count_desa) / 100;

		return $population;
	}


}

/* End of file Mstats_people.php */
/* Location: ./application/models/Mstats_people.php */