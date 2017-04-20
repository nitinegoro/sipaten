<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpenilaian extends CI_Model 
{
	public $now_date;

	public $tahun;

	public function __construct()
	{
		parent::__construct();
		
		$this->tahun = (!$this->input->get('year')) ? date('Y') : $this->input->get('year'); 

		$this->now_date = date('Y-m-d');
	}
	
	public function get_answers()
	{
		return $this->db->get('opsi_jawaban')->result();
	}

	public function save()
	{
		$this->db->update('tb_options', array('option_value' => $this->input->post('pertanyaan')), array('option_name' => 'pertanyaan_penilaian'));

		if( is_array($this->input->post('jawaban')) ) 
		{
			foreach($this->input->post('jawaban') as $key => $value) 
			{
				$this->db->update('opsi_jawaban', array('jawaban' => $value), array('ID' => $key) );
			}
		}

		$config['upload_path'] = './public/image/emoji';
		$config['max_size']	= '110240';
		$config['allowed_types'] = 'gif|jpg|png|svg';
		$config['overwrite'] = FALSE;
		
		$this->upload->initialize($config);

		$result_array = array(); 

		foreach($_FILES as $key => $value)
		{
			if($this->upload->do_upload($key) != FALSE)
			{
				$ikon = $this->db->query("SELECT icon FROM opsi_jawaban WHERE ID = '{$key}'")->row('icon');
				
				@unlink("public/image/emoji/{$ikon}");

				$this->db->update('opsi_jawaban', array('icon' => $this->upload->file_name), array('ID' => $key) );
			}

		}

		$this->template->alert(
			' Perubahan tersimpan.', 
			array('type' => 'success','icon' => 'check')
		);
	}

	public function get_people_in_day()
	{
		return $this->db->query("
			SELECT surat.ID, surat.nik, penduduk.nama_lengkap, kategori_surat.nama_kategori 
			FROM surat RIGHT JOIN penduduk ON surat.nik = penduduk.nik RIGHT JOIN kategori_surat ON surat.kategori = kategori_surat.id_surat WHERE DATE(waktu_selesai) = '{$this->now_date}' AND NOT EXISTS (SELECT * FROM penilaian WHERE surat.ID = penilaian.surat)")->result();
	}

	public function create()
	{
		$data = array(
			'surat' => $this->input->post('surat'),
			'jawaban' => $this->input->post('answer'),
			'tanggal' => date('Y-m-d H:i:s') 
		);

		$this->db->insert('penilaian', $data);
	}

	/**
	 * Hitung Jumlah Responder
	 *
	 * @param Integer (ID) from jawaban
	 * @return Integer
	 **/
	public function count($param = 0)
	{
		$this->db->select('tanggal');

		if($this->input->get('start_date') != '')
			$this->db->where('tanggal >= ', $this->input->get('start_date'));

		if($this->input->get('end_date') != '')
			$this->db->where('tanggal <= ', $this->input->get('end_date'));

		if($this->input->get('month') != '')
			$this->db->where('MONTH(tanggal) =', $this->input->get('month'));

		if($this->input->get('year') != '')
			$this->db->where('YEAR(tanggal) =', $this->input->get('year'));

		$this->db->where('jawaban', $param);

		return $this->db->get('penilaian')->num_rows();
	}

	/**
	 * Hitung Jumlah Responder
	 *
	 * @param Integer (ID) from jawaban
	 * @return Integer
	 **/
	public function count_month($param = 0, $month = FALSE, $year = FALSE)
	{
		$this->db->select('tanggal');

		$this->db->where('MONTH(tanggal) =', $month);

		$this->db->where('YEAR(tanggal) =', $year);

		$this->db->where('jawaban', $param);

		return $this->db->get('penilaian')->num_rows();
	}

}

/* End of file Mpenilaian.php */
/* Location: ./application/models/Mpenilaian.php */