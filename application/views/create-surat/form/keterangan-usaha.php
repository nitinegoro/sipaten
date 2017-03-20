<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-12 col-xs-12">
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
			<div class="box-body" style="margin-top: 10px;">
				<div class="col-md-7">
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Nomor Surat : <strong class="text-red">*</strong></label>
						<div class="col-md-7 block-no-surat">
							<strong><?php echo $surat->kode_surat; ?>/</strong>
							<input type="text" name="nomor_surat" class="no_surat" id="no_surat" value="<?php echo set_value('nomor_surat'); ?>">
							<strong>/<?php echo $this->option->get('kode_kecamatan'); ?>/<?php echo date('Y') ?></strong>
							<p class="help-block"><?php echo form_error('nomor_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Surat Keterangan Usaha dari Kades / Lurah</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Pejabat Lurah / Kades  : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" name="isi[pejabat_lurah]" class="form-control" value="<?php echo set_value('isi[pejabat_lurah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[pejabat_lurah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">NIP : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[nip_pejabat_lurah]" value="<?php echo set_value('isi[nip_pejabat_lurah]'); ?>">
							<p class="help-block"><?php echo form_error('isi[nip_pejabat_lurah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Jabatan : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="isi[jabatan_pejabat_lurah]" value="<?php echo set_value('isi[nama_desa]'); ?>">
							<p class="help-block"><?php echo form_error('isi[jabatan_pejabat_lurah]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<p class="legend-form">Keterangan Usaha</p>
						</div>
						<label for="email" class="control-label col-md-3 col-xs-12">Nama Usaha : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<input type="text" name="isi[nama_usaha]" class="form-control" value="<?php echo set_value('isi[nama_usaha]'); ?>">
							<p class="help-block"><?php echo form_error('isi[nama_usaha]', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Alamat Usaha : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
							<textarea name="isi[alamat_usaha]" class="form-control" cols="30" rows="3"><?php echo set_value('isi[alamat_usaha]'); ?></textarea>
							<p class="help-block"><?php echo form_error('isi[alamat_usaha]', '<small class="text-red">', '</small>'); ?></p>
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
					<table class="table table-bordered mini-font">
						<tbody>
							<tr>
								<th width="150" class="bg-silver text-right">NIK :</th>
								<td id="data-nik"><?php echo $penduduk->nik; ?></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Nama :</th>
								<td id="data-nama"><?php echo $penduduk->nama_lengkap; ?></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Tempat, Tanggal Lahir :</th>
								<td id="data-tgl-lahir"><?php echo ucfirst($penduduk->tmp_lahir).', '.date_id($penduduk->tgl_lahir); ?></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Jenis Kelamin :</th>
								<td id="data-jns-kelamin"><?php echo ucfirst($penduduk->jns_kelamin); ?></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Alamat : <br> RT/RW : <br>Kel/Desa : <br>Kecamatan :</th>
								<td id="data-alamat">
									<?php echo $penduduk->alamat.'<br>'.$penduduk->rt.' / '.$penduduk->rw.'<br>'.$penduduk->nama_desa.'<br>'.$this->option->get('kecamatan'); ?>
								</td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Agama :</th>
								<td id="data-agama"><?php echo ucfirst($penduduk->agama); ?></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Status Perkawinan :</th>
								<td id="data-status-kawin"><?php echo strtoupper($penduduk->status_kawin); ?></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Kewarganegaraan :</th>
								<td id="data-kewarganegaraan"><?php echo strtoupper($penduduk->kewarganegaraan); ?></td>
							</tr>
						</tbody>
					</table>
					<h4>Syarat Penerbitan Surat :</h4>
	              	<ol>
	              	<?php  
	              	/* Loop Syarat Surat */
	              	foreach($syarat as $row) :
	              	?>
	                	<li><?php echo $row->nama_syarat; ?></li>
	                <?php  
	                endforeach;
	                ?>
	              	</ol>
				</div>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</dov>
</div>