<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('tgl_indo'))
{
	function date_id($tgl, $format = FALSE)
	{
		date_default_timezone_set('Asia/Jakarta');
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		if($format == FALSE) 
		{
			return $tanggal.' '.$bulan.' '.$tahun;
		} else {
			return hari_ini(date('D')).', '.$tanggal.' '.$bulan.' '.$tahun;
		}
	}
}

if ( ! function_exists('hari_ini'))
{
	function hari_ini($hari_ini)
	{
		date_default_timezone_set('Asia/Jakarta');

		switch ($hari_ini) {
			case 'Sun':
				return 'Minggu';
				break;
			case 'Mon':
				return 'Senin';
				break;
			case 'Tue':
				return 'Selasa';
				break;
			case 'Wed':
				return 'Rabu';
				break;
			case 'Thu':
				return 'Kamis';
				break;
			case 'Fri':
				return 'Jumat';
				break;
			case 'Sat':
				return 'Sabtu';
				break;
			default:
				return 'Invalid day!';
				break;
		}
	}
}

if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}


if( !  function_exists('nomo_urut') )
{
	function nomor_urut($number = 0)
	{
		switch (strlen($number)) 
		{
			case 1:
				return '000'.$number;
				break;
			case 2:
				return '00'.$number;
				break;
			case 3:
				return '0'.$number;
				break;
			default:
				return $number;
				break;
		}
	}
}

/* End of file indonesia_helper.php */
/* Location: ./application/helpers/indonesia_helper.php */