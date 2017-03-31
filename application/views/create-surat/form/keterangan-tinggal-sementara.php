<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title"> <?php echo $title; ?></h3>
            </div>
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal'));
?>
			<div class="box-body" style="margin-top: 10px;"><?php echo validation_errors(); ?>
				<div class="col-md-7">
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Nomor Surat : <strong class="text-red">*</strong></label>
						<div class="col-md-7 block-no-surat">
							<strong><?php echo $surat->kode_surat; ?>/</strong>
							<input type="text" name="nomor_surat" class="no_surat" id="no_surat" value="<?php echo $this->create_surat->get_nomor_surat($surat->id_surat, null); ?>">
							<strong>/<?php echo $this->option->get('kode_kecamatan'); ?>/<?php echo date('Y') ?></strong>
							<p class="help-block"><?php echo form_error('nomor_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Desa : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<select name="desa" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($this->create_surat->get_desa() as $row) :
					?>
								<option value="<?php echo $row->id_desa; ?>" <?php if($row->id_desa==set_value('desa')) echo 'selected'; ?>><?php echo $row->nama_desa; ?></option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('desa', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Keterangan Tinggal Sementara</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">No. Tanda Masuk : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[no_tanda_masuk]" class="form-control" value="<?php echo set_value('isi[no_tanda_masuk]'); ?>">
							<p class="help-block"><?php echo form_error('isi[no_tanda_masuk]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanggal Tanda Masuk : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[tgl_tanda_masuk]" id="datepicker" value="<?php echo set_value('isi[tgl_tanda_masuk]'); ?>" placeholder="Ex : <?php echo date('Y-m-d'); ?>">
							<p class="help-block"><?php echo form_error('isi[tgl_tanda_masuk]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alasan Pindah : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<div class="col-md-4">
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="pekerjaan" <?php if(set_value('isi[alasan_pindah]')=='pekerjaan') echo "checked"; ?>> <label> Pekerjaan</label>
						       	</div>
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="pendidikan" <?php if(set_value('isi[alasan_pindah]')=='pendidikan') echo "checked"; ?>> <label> Pendidikan</label>
						       	</div>
							</div>
							<div class="col-md-4">
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="keamanan" <?php if(set_value('isi[alasan_pindah]')=='keamanan') echo "checked"; ?>> <label> Keamanan</label>
						       	</div>
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="kesehatan" <?php if(set_value('isi[alasan_pindah]')=='kesehatan') echo "checked"; ?>> <label> Kesehatan</label>
						       	</div>
							</div>
							<div class="col-md-4">
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="keluarga" <?php if(set_value('isi[alasan_pindah]')=='keluarga') echo "checked"; ?>> <label> Keluarga</label>
						       	</div>
						       	<div class="radio radio-primary">
						           <input name="isi[alasan_pindah]" type="radio" value="lainnya" <?php if(set_value('isi[alasan_pindah]')=='lainnya') echo "checked"; ?>> <label> lainnya...</label>
						       	</div>
							</div>
							<p class="help-block"><?php echo form_error('isi[alasan_pindah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Penanggung Jawab</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[nama]" class="form-control" value="<?php echo set_value('isi[nama]'); ?>">
							<p class="help-block"><?php echo form_error('isi[nama]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alamat  : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea name="isi[alamat]" class="form-control" cols="30" rows="3"><?php echo set_value('isi[alamat]'); ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alamat]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Pekerjaan  : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[pekerjaan]" class="form-control" value="<?php echo set_value('isi[pekerjaan]'); ?>">
							<p class="help-block"><?php echo form_error('isi[pekerjaan]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Anggota Keluarga Pengikut</p>
						</div>
						<label for="nik" class="control-label col-md-3 col-xs-12">NIK / Nama : <strong class="text-primary">*</strong></label>
						<div class="col-md-9">
							<div class="input-group">
							  	<input type="text" id="cari-pengikut" class="form-control">
							  	<span class="input-group-addon"><i class="fa fa-search"></i> Cari</span>
							</div>
						</div>
						<div class="col-md-12 top">
							<table class="table table-bordered mini-font">
								<thead class="bg-silver">
									<tr>
										<th width="30"></th>
										<th class="text-center">NIK</th>
										<th class="text-center">Nama</th>
										<th class="text-center">Jenis Kelamin</th>
										<th class="text-center">Tempat, Tanggal Lahir</th>
										<th class="text-center" width="130"><small>Hubungan dengan Pemohon</small></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
						                    <a class="icon-button text-red get-delete-people" data-id="" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
										</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
<!-- 							<input type="text" name="isi[pengikut][0][id]">
<input type="text" name="isi[pengikut][0][status_hubungan]"> -->
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form"></p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Tanda Tangan : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<select name="ttd_pejabat" class="form-control">
								<option value="">- PILIH -</option>
					<?php  
					/* Loop Data Pegawai */
					foreach($pegawai as $row) :
					?>
								<option value="<?php echo $row->ID; ?>" <?php if($row->ID==set_value('ttd_pejabat')) echo 'selected'; ?>><?php echo $row->nama; ?> (<?php echo $row->jabatan; ?>)</option>
					<?php  
					endforeach;
					?>
							</select>
							<p class="help-block"><?php echo form_error('ttd_pejabat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-12"> <hr> </div>
						<div class="col-md-4">
							<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
							<small><strong class="text-blue">*</strong>	Field Optional</small>
						</div>
						<div class="col-md-3 col-xs-6 pull-right">
							<button type="submit" class="btn btn-app">
								<i class="fa fa-save"></i> Simpan
							</button>
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<?php  
					/**
					 * Tampilkan Data Pemohon
					 *
					 * @var string
					 **/
					$this->load->view('create-surat/data-pemohon');
					?>
				</div>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</div>
</div>