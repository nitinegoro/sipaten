<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title">Surat Keterangan <?php echo $title; ?></h3>
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
						<label for="email" class="control-label col-md-3 col-xs-12">NIK / Nama : <strong class="text-red">*</strong></label>
						<div class="col-md-6">
							<input type="text" name="nama_surat" class="form-control" value="<?php echo set_value('nama_surat'); ?>">
							<p class="help-block"><?php echo form_error('nama_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Nomor Surat : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" name="nama_surat" class="form-control" value="<?php echo set_value('nama_surat'); ?>">
							<p class="help-block"><?php echo form_error('nama_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Tanda Tangan : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<select name="staf" class="form-control">
								<option value="">- PILIH -</option>
							</select>
							<p class="help-block"><?php echo form_error('nama_surat', '<small class="text-red">', '</small>'); ?></p>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-12"> <hr> </div>
						<div class="col-md-3 col-xs-5">
							<a href="<?php echo $this->input->get('from') ?>" class="btn btn-app pull-right">
								<i class="ion ion-reply"></i> Kembali
							</a>
						</div>
						<div class="col-md-7 col-xs-6 pull-right">
							<button type="submit" class="btn btn-app">
								<i class="fa fa-print"></i> Cetak
							</button>
							<button type="submit" class="btn btn-app">
								<i class="fa fa-save"></i> Simpan
							</button>
							<button type="submit" class="btn btn-app">
								<i class="fa fa-file-word-o"></i> Dokumen
							</button>
						</div>
						<div class="col-md-12"><hr>
							<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
							<small><strong class="text-blue">*</strong>	Field Optional</small>
						</div>
					</div>

				</div>

				<div class="col-md-5">
					<table class="table table-bordered mini-font">
						<tbody>
							<tr>
								<th width="150" class="bg-silver text-right">NIK :</th>
								<td>89723895727582357</td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Nama :</th>
								<td>Vicky Nitinegoro</td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Tempat, Tanggal Lahir :</th>
								<td>Pangkalpinang, 23 Januari 1996 (<small>20 Tahun</small>)</td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Jenis Kelamin :</th>
								<td>Laki-laki</td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Alamat : <br> RT/RW : <br>Kel/Desa : <br>Kecamatan :</th>
								<td>Jl. Ratna No. 58 Pasir Putih</td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Agama :</th>
								<td>Islam</td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Status Perkawinan :</th>
								<td></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Kewarganegaraan :</th>
								<td></td>
							</tr>
						</tbody>
					</table>
					<h4>Syarat Penerbitan Surat :</h4>
	              	<ol>
	                	<li>Lorem ipsum dolor sit amet</li>
	                	<li>Consectetur adipiscing elit</li>
	                	<li>Integer molestie lorem at massa</li>
	                	<li>Facilisis in pretium nisl aliquet</li>
	                	<li>Faucibus porta lacus fringilla vel</li>
	                	<li>Aenean sit amet erat nunc</li>
	                	<li>Eget porttitor lorem</li>
	              	</ol>
				</div>
			</div>
<!-- 
			<div class="box-footer with-border">

			</div>
			<div class="box-footer with-border">

			</div> -->
<?php  
// End Form
echo form_close();
?>
		</div>
	</dov>
</div>