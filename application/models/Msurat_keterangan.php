<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msurat_keterangan extends Sipaten_model 
{
	/**
	 * Menampilkan Syarat Penerbitan SUrat
	 *
	 * @param Integer (join)
	 **/
	public function get_syarat($param = 0)
	{
		if($param != FALSE) 
			return $this->db->query("SELECT id_syarat, nama_syarat FROM syarat_surat WHERE id_syarat IN({$param})")->result();
	}
	
	/**
	 * Saving History Data
	 *
	 * @return String 
	 **/
	public function save_history()
	{
		if(is_array($this->input->post('syarat')))
		{
			foreach( $this->input->post('syarat') as $key => $value)
			{
				if($this->log_surat_check_syarat($this->input->post('nik'), $this->input->post('kategori-surat'), $value) == TRUE)
					continue;

				$log_surat = array(
					'nik' => $this->input->post('nik'),
					'tanggal' => date('Y-m-d H:i:s'),
					'kategori' => $this->input->post('kategori-surat'),
					'syarat' => $value,
					'status' => 'pending'
				);

				$this->db->insert('log_surat', $log_surat);
			}

			if($this->db->affected_rows())
			{
				$this->template->alert(
					' Data tersimpan pada histori.', 
					array('type' => 'success','icon' => 'check')
				);
			} else {
				$this->template->alert(
					' Gagal menyimpan data.', 
					array('type' => 'warning','icon' => 'warning')
				);
			}
		} else {

		}
	}

	/**
	 * Cek Log surat 
	 *
	 * @param String (NIK)
	 * @param Integer (kategori_surat)
	 * @param Integer (syarat)
	 **/
	public function log_surat_check_syarat($nik = '', $kategori = 0, $syarat = 0)
	{
		return $this->db->get_where(
			'log_surat', 
			array('nik' => $nik, 'kategori' => $kategori, 'syarat' => $syarat, 'status' => 'pending')
		)->num_rows(); 
	}
}

/* End of file Msurat_keterangan.php */
/* Location: ./application/models/Msurat_keterangan.php */