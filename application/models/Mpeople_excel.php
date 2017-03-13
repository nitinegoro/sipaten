<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* SIMPATEN
* People Model Excel Class 
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/

class Mpeople_excel extends Sipaten_model 
{
	public function __construct()
	{
		parent::__construct();

		ini_set('max_execution_time', 3000); 

		$this->load->library(array('Excel/PHPExcel','upload','slug'));
	}

	public function upload()
	{
		$config['upload_path'] = 'public/excel';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '5120';
		
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_excel')) 
		{
			$this->template->alert(
				$this->upload->display_errors('<span>','</span>'), 
				array('type' => 'warning','icon' => 'warning')
			);
		} else {

			$file_excel = "./public/excel/{$this->upload->file_name}";

			// Identifikasi File Excel Reader
			try {

				$excelReader = new PHPExcel_Reader_Excel2007();

            	$loadExcel = $excelReader->load($file_excel);	

            	$sheet = $loadExcel->getActiveSheet()->toArray(null, true, true ,true);

		        // Loops Excel data reader

		        foreach ($sheet as $key => $value) 
		        {
		        	// Mulai Dari Baris ketiga
		        	if($key > 1)
		        	{
		        		if($value['B'] == FALSE OR $this->nik_check($value['B'])) 
		        			continue;

		        		if( $this->desa($value['K']) )
		        		{
		        			$desa = $this->desa($value['K']);
		        		} else {
		        			$desa_in = array(
		        				'nama_desa' => $value['K'],
		        				'slug' => $this->slug->create_slug($value['K']),
		        				'kepala_desa' => ''
		        			);

		        			$this->db->insert('desa', $desa_in);

		        			$desa = $this->db->insert_id();
		        		}

						$people = array(
							'nik' => $value['B'],
							'nama_lengkap' => $value['C'],
							'tmp_lahir' => $value['E'],
							'tgl_lahir' => date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($value['F'])),
							'jns_kelamin' => strtolower($value['D']),
							'alamat' => $value['O'],
							'rt' => $value['M'],
							'rw' => $value['N'],
							'desa' => $desa,
							'kecamatan' => $value['L'],
							'agama' => strtolower($value['G']),
							'pekerjaan' => $value['P'],
							'kewarganegaraan' => strtolower($value['H']),
							'status_kawin' => strtolower($value['I']),
							'gol_darah' => strtoupper($value['J']),
							'telepon' => $value['K']
						);

						$this->db->insert('penduduk', $people);
		        	// End Baris ketiga
		        	}

					if($this->db->affected_rows())
					{
						$this->template->alert(
							' Data Penduduk berhasil diimpor.', 
							array('type' => 'success','icon' => 'check')
						);
					} else {
						$this->template->alert(
							' Tidak ada data yang diimpor.', 
							array('type' => 'warning','icon' => 'warning')
						);
					}
		        // End Loop
		        }

		        unlink("./public/excel/{$this->upload->file_name}");
			} catch (Exception $e) {
				$this->template->alert(
					' Error loading file "'.pathinfo($file_excel,PATHINFO_BASENAME).'": '.$e->getMessage(), 
					array('type' => 'warning','icon' => 'warning')
				);
			}
		}
	}
	
	/**
	 * Export Data Penduduk ke Excel
	 *
	 * @return Attachment excel
	 **/
	public function get()
	{
		$objPHPExcel = new PHPExcel();

		$worksheet = $objPHPExcel->createSheet(0);

	    for ($cell='A'; $cell <= 'P'; $cell++)
	    {
	        $worksheet->getStyle($cell.'1')->getFont()->setBold(true);
	    }

	    $worksheet->getStyle('A1:P1')->applyFromArray(
	    	array(
		        'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        ),
		        'borders' => array(
		            'allborders' => array(
		                'style' => PHPExcel_Style_Border::BORDER_THIN,
		                'color' => array('rgb' => '000000')
		            )
		        ),
		        'fill' => array(
		            'type' => PHPExcel_Style_Fill::FILL_SOLID,
		            'color' => array('rgb' => 'F2F2F2')
		        )
	    	)
	    );

		// Header dokumen
		 $worksheet->setCellValue('A1', 'NO.')
		 		   ->setCellValue('B1', 'NIK')
		 		   ->setCellValue('C1', 'NAMA LENGKAP')
		 		   ->setCellValue('D1', 'JENIS KELAMIN')
		 		   ->setCellValue('E1', 'TEMPAT LAHIR')
		 		   ->setCellValue('F1', 'TANGGAL LAHIR')
		 		   ->setCellValue('G1', 'AGAMA')
		 		   ->setCellValue('H1', 'KEWARGANEGARAAN')
		 		   ->setCellValue('I1', 'STATUS PERKAWINAN')
		 		   ->setCellValue('J1', 'GOLONGAN DARAH')
		 		   ->setCellValue('K1', 'DESA KELURAHAN')
		 		   ->setCellValue('L1', 'RT')
		 		   ->setCellValue('M1', 'RW')
		 		   ->setCellValue('N1', 'ALAMAT')
		 		   ->setCellValue('O1', 'PEKERJAAN')
		 		   ->setCellValue('P1', 'TELEPON');

		$this->db->join('desa', 'penduduk.desa = desa.id_desa', 'left');

		$row_cell = 2;
		foreach($this->db->get('penduduk')->result() as $key => $value)
		{
			$date = new DateTime($value->tgl_lahir);

			 $worksheet->setCellValue('A'.$row_cell, ++$key)
			 		   ->setCellValue('B'.$row_cell, $value->nik)
			 		   ->setCellValue('C'.$row_cell, $value->nama_lengkap)
			 		   ->setCellValue('D'.$row_cell, ucfirst($value->jns_kelamin))
			 		   ->setCellValue('E'.$row_cell, $value->tmp_lahir)
			 		   ->setCellValue('F'.$row_cell, $date->format('d/m/Y'))
			 		   ->setCellValue('G'.$row_cell, ucfirst($value->agama))
			 		   ->setCellValue('H'.$row_cell, strtoupper($value->kewarganegaraan))
			 		   ->setCellValue('I'.$row_cell, strtoupper($value->status_kawin))
			 		   ->setCellValue('J'.$row_cell, strtoupper($value->gol_darah))
			 		   ->setCellValue('K'.$row_cell, $value->nama_desa)
			 		   ->setCellValue('L'.$row_cell, $value->rt)
			 		   ->setCellValue('M'.$row_cell, $value->rw)
			 		   ->setCellValue('N'.$row_cell, $value->alamat)
			 		   ->setCellValue('O'.$row_cell, $value->pekerjaan)
			 		   ->setCellValue('P'.$row_cell, $value->telepon);

			$row_cell++;
		}

		// Sheet Title
		$worksheet->setTitle("DATA PENDUDUK");

		$objPHPExcel->setActiveSheetIndex(0);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="DATA-PENDUDUK.xlsx"');
        $objWriter->save("php://output");
	}

	/**
	 * Check Ketersediaan NIK
	 *
	 * @param Integer (user_id)
	 * @return string
	 **/
	public function nik_check($param = 0)
	{
		return $this->db->get_where('penduduk', array('nik' => $param))->num_rows();
	}

	/**
	 * Ambil ID Desa
	 *
	 * @param String (Nama Desa)
	 * @return Integer
	 **/
	public function desa($param = '')
	{
		return $this->db->get_where('desa', array('slug' => $this->slug->create_slug($param)))->row('id_desa');
	}
}

/* End of file Mpeople_excel.php */
/* Location: ./application/models/Mpeople_excel.php */