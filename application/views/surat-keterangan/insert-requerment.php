<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title">Surat Keterangan <?php echo $title; ?> <small>- Lengkapi Syarat</small></h3>
            </div>
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(site_url("surat_keterangan/save_history"), array('class' => 'form-horizontal'));
 
echo form_hidden('kategori-surat', $get->id_surat);

echo form_hidden('nik', '');
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="col-md-7">
					<div class="form-group">
						<label for="nik" class="control-label col-md-3 col-xs-12">NIK / Nama : <strong class="text-red">*</strong></label>
						<div class="col-md-7">
							<input type="text" id="cari-nik" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="control-label col-md-3 col-xs-12">Lengkapi Syarat : <strong class="text-red">*</strong></label>
						<div class="col-md-9">
	              	<?php  
	              	/* Loop Syarat Surat */
	              	foreach($syarat as $row) :
	              	?>
		                    <div class="checkbox checkbox-primary checkbox-lg">
		                        <input id="log_surat_check" class="styled syarat-<?php echo $row->id_syarat; ?>" name="syarat[]" value="<?php echo $row->id_syarat; ?>" type="checkbox" data-id="<?php echo $row->id_syarat; ?>">
		                        <label><?php echo $row->nama_syarat; ?></label>
		                    </div>
		            <?php  
		            endforeach;
		            ?>
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
						<div class="col-md-5 col-xs-6 pull-right">
							<button type="button" id="save-histori" class="btn btn-app">
								<i class="fa fa-history"></i> Buat Histori
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
								<td id="data-nik"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Nama :</th>
								<td id="data-nama"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Tempat, Tanggal Lahir :</th>
								<td id="data-tgl-lahir"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Jenis Kelamin :</th>
								<td id="data-jns-kelamin"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Alamat : <br> RT/RW : <br>Kel/Desa : <br>Kecamatan :</th>
								<td id="data-alamat"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Agama :</th>
								<td id="data-agama"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Status Perkawinan :</th>
								<td id="data-status-kawin"></td>
							</tr>
							<tr>
								<th width="150" class="bg-silver text-right">Kewarganegaraan :</th>
								<td id="data-kewarganegaraan"></td>
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

	
			<!-- Modal Dialog Jadikan Histori -->
	        <div class="modal animated fadeIn modal-info" id="diaolo-save-history" tabindex="-1" data-backdrop="static" data-keyboard="false">
	          	<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Jadikan Histori?</h4>
			                <span>Simpan Rekaman Data ini menjadi histori pengajuan Surat</span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
							<button type="submit" class="btn btn-outline pull-right">Simpan</button>
						</div>
					</div>
				</div>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</dov>
</div>