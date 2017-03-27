<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('SIPATEN_VERSION', '1.0.0 <small>(Pre Release)</small>');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		

	}
}

/**
* Extends Class Sipaten
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/
class Sipaten extends MY_Controller
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mcreate_surat', 'create_surat');

		$this->breadcrumbs->unshift(0, 'Home', 'main');

		if($this->session->has_userdata('authentifaction')==FALSE)
			redirect(site_url('login?from_url='.current_url()));
	}

	/**
	 * Get Data Penduduk JSON
	 *
	 * @param Integer (ID)
	 * @return string (JSON)
	 **/
	public function penduduk($param = 0)
	{
		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');
		if($param == FALSE) 
		{
			foreach($this->db->get('penduduk')->result() as $row)
			{
				$this->data[] = array(
					'id' => $row->ID,
					'nik' => $row->nik,
					'nama' => $row->nama_lengkap,
					'jns_kelamin' => ucfirst($row->jns_kelamin),
					'alamat' => $row->alamat." - ".$row->nama_desa.", RT ".$row->rt."/RW".$row->rw
				); 
			} 
		} else {
			$get = $this->db->get_where('penduduk', array('ID' => $param))->row();

			$date = new DateTime($get->tgl_lahir);

			$this->data = array(
				'id' => $get->ID,
				'nik' => $get->nik,
				'nama' => $get->nama_lengkap,
				'tgl_lahir' => $get->tmp_lahir.", ".$date->format('d M Y'),
				'jns_kelamin' => ucfirst($get->jns_kelamin),
				'alamat' => $get->alamat." - ".$get->nama_desa."<br> ".$get->rt."/".$get->rw."<br>".$get->nama_desa,
				'agama' => ucfirst($get->agama),
				'status_kawin' => strtoupper($get->status_kawin),
				'kewarganegaraan' => strtoupper($get->kewarganegaraan)
			);

			$this->log_surat_check($get->nik, $this->input->get('surat'));

			if( $this->create_surat->valid_requirement_check($get->nik, $this->input->get('surat')) )
			{
				$this->data['status'] = true;
			} else {
				$this->data['status'] = false;
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($this->data));
	}

	/**
	 * Mengecek History Pengajuan Surat
	 *
	 * @param String (NIK)
	 * @param String (kategori_surat)
	 * @return string (JSON)
	 **/
	public function log_surat_check($param = '', $kategori = 0)
	{
		$log_surat = $this->db->query("SELECT nik, syarat, tanggal FROM log_surat WHERE nik = {$param} AND nomor_surat IN(0) AND kategori = {$kategori}")->result();

		foreach($log_surat as $row)
		{
			$this->data['syarat_surat'][] = array(
				'id' => $row->syarat,
				'date' => $row->tanggal
			);
		}

		return $this->data;
	}

	/**
	 * Get Validation Rules
	 *
	 * @param String (slug) kategori surat
	 * @return Void
	 **/
	public function get_surat_validation($param = '')
	{
		switch ($param) 
		{
			case 'domisili-perusahaan':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[nama_desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[nama_perusahaan]', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_perusahaan]', 'Alamat Perusahaan', 'trim|required');
				break;
			case 'keterangan-usaha':
				$this->form_validation->set_rules('isi[pejabat_lurah]', 'Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[nip_pejabat_lurah]', 'NIP Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[jabatan_pejabat_lurah]', 'Jabatan Pejabat Lurah', 'trim|required');
				$this->form_validation->set_rules('isi[nama_usaha]', 'Nama Usaha', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_usaha]', 'Alamat Usaha', 'trim|required');
				break;
			case 'kelakuan-baik':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[nama_desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[keperluan]', 'Keperluan', 'trim|required');
				break;
			case 'perpanjangan-izin-oprasional':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[nama_lembaga]', 'Nama Lembaga', 'trim|required');
				$this->form_validation->set_rules('isi[nama_pengelola]', 'Nama Pengelola', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_lembaga]', 'Alamat Lembaga', 'trim|required');
				break;
			case 'izin-usaha-mikro-dan-kecil':
				$this->form_validation->set_rules('isi[nama_perusahaan]', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[bentuk_perusahaan]', 'Bentuk Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[npwp]', 'NPWP', 'trim|required');
				$this->form_validation->set_rules('isi[kegiatan_usaha]', 'Kegiatan', 'trim|required');
				$this->form_validation->set_rules('isi[sarana_usaha]', 'Sarana', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_perusahaan]', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('isi[jml_modal_usaha]', 'Jumlah Modal', 'trim|is_numeric|required');
				$this->form_validation->set_rules('isi[no_pendaftaran]', 'No Pendaftaran', 'trim|required');
				break;
			case 'izin-keramaian':
				$this->form_validation->set_rules('isi[keperluan]', 'Keperluan', 'trim|required');
				$this->form_validation->set_rules('isi[hari]', 'Hari', 'trim|required');
				$this->form_validation->set_rules('isi[tanggal]', 'Tanggal', 'trim|required');
				$this->form_validation->set_rules('isi[waktu]', 'Waktu', 'trim|required');
				$this->form_validation->set_rules('isi[tempat]', 'Tempat', 'trim|required');
				$this->form_validation->set_rules('isi[hiburan]', 'Hiburan', 'trim|required');
				break;
			case 'surat-izin-gangguan':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[nama_desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[ttd_desa]', 'Tanda Tangan', 'trim|required');
				$this->form_validation->set_rules('isi[jabatan_desa]', 'Jabatan', 'trim|required');
				$this->form_validation->set_rules('isi[nama]', 'Nama Toko / Kios / Perusahaan ', 'trim|required');
				$this->form_validation->set_rules('isi[alamat]', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_kegiatan]', 'Jenis Kegiatan', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_bangunan]', 'Jenis Bangunan', 'trim|required');
				$this->form_validation->set_rules('isi[lokasi_bangunan]', 'Lokasi Bangunan', 'trim|required');
				break;
			case 'izin-mendirikan-bangunan':
				$this->form_validation->set_rules('isi[nama_desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[nama_perusahaan]', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_perusahaan]', 'Alamat Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_bangunan]', 'Jenis Bangunan', 'trim|required');
				$this->form_validation->set_rules('isi[lokasi_bangunan]', 'Lokasi Bangunan', 'trim|required');
				$this->form_validation->set_rules('isi[gsb]', 'GSB', 'trim|required');
				$this->form_validation->set_rules('isi[jangka_tahun]', 'Tahun', 'trim');
				$this->form_validation->set_rules('isi[jangka_mulai]', 'Tanggal Mulai', 'trim');
				$this->form_validation->set_rules('isi[jangka_akhir]', 'Tanggal Akhir', 'trim');
				$this->form_validation->set_rules('isi[luas_bangunan][0][0]', 'Nilai', 'trim|required');
				$this->form_validation->set_rules('isi[luas_bangunan][0][1]', 'Nilai', 'trim|required');
				$this->form_validation->set_rules('isi[luas_bangunan][0][2]', 'Nilai', 'trim|required');
				break;
			case 'rekomendasi-siup':
				$this->form_validation->set_rules('isi[nama_desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[nama_perusahaan]', 'Nama Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[alamat_perusahaan]', 'Alamat Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[kedudukan]', 'Kedudukan', 'trim|required');
				$this->form_validation->set_rules('isi[bentuk_perusahaan]', 'Bentuk Perusahaan', 'trim|required');
				$this->form_validation->set_rules('isi[bidang_usaha]', 'Bidang Usaha', 'trim|required');
				$this->form_validation->set_rules('isi[kegiatan_usaha]', 'Kegiatan Usaha', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_barang_dagang][a]', 'Jenis Barang Dagang Utama', 'trim|required');
				$this->form_validation->set_rules('isi[jenis_barang_dagang][b]', 'Jenis Barang Dagang Utama', 'trim');
				$this->form_validation->set_rules('isi[jenis_barang_dagang][c]', 'Jenis Barang Dagang Utama', 'trim');
				$this->form_validation->set_rules('isi[jumlah_pekerja_laki]', 'Pekerja Laki-laki', 'trim|required');
				$this->form_validation->set_rules('isi[jumlah_pekerja_wanita]', 'Pekerja Wanita', 'trim|required');
				$this->form_validation->set_rules('isi[pekerja_laki][sd]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[pekerja_laki][sltp]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[pekerja_laki][slta]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[pekerja_laki][d3]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[pekerja_laki][s1]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[pekerja_laki][s2]', 'Pekerja Laki-laki', 'trim');
				$this->form_validation->set_rules('isi[modal_usaha]', 'Modal Usaha', 'trim|required');
				$this->form_validation->set_rules('isi[jangka_tahun]', 'Tahun', 'trim');
				$this->form_validation->set_rules('isi[jangka_mulai]', 'Tanggal Mulai', 'trim');
				$this->form_validation->set_rules('isi[jangka_akhir]', 'Tanggal Akhir', 'trim');
				break;
			case 'keterangan-tidak-mampu':
				$this->form_validation->set_rules('isi[no_surat_rek]', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_surat_rek]', 'Tanggal Surat', 'trim|required');
				$this->form_validation->set_rules('isi[nama_desa]', 'Nama Desa', 'trim|required');
				$this->form_validation->set_rules('isi[pejabat_lurah]', 'Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[nip_pejabat_lurah]', 'NIP Pejabat Lurah / Kades', 'trim|required');
				$this->form_validation->set_rules('isi[jabatan_pejabat_lurah]', 'Jabatan Pejabat Lurah', 'trim|required');
				$this->form_validation->set_rules('isi[keperluan]', 'Keperluan', 'trim|required');
				break;
			case 'keterangan-datang':
				$this->form_validation->set_rules('isi[alasan_pindah]', 'Alasan Pindah', 'trim|required');
				$this->form_validation->set_rules('isi[desa]', 'Desa', 'trim|required');
				$this->form_validation->set_rules('isi[kecamatan]', 'Kecamatan', 'trim|required');
				$this->form_validation->set_rules('isi[kabupaten]', 'Kabupaten/Kota', 'trim|required');
				$this->form_validation->set_rules('isi[provinsi]', 'Provinsi', 'trim|required');
				$this->form_validation->set_rules('isi[tgl_pindah]', 'Tanggal Pindah', 'trim|required');
				break;
			default:
				# code...surat
				break;
		}
		$this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
		$this->form_validation->set_rules('ttd_pejabat', 'Tanda Tangan', 'trim|required');
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */