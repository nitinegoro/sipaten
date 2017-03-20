<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Surat Keluar</h3>
				</div>
			</div>
<?php  
/**
 * Start Form Pencarian
 *
 * @return string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>
			<div class="box-body">
				<div class="col-md-4">
				    <div class="form-group">
				        <label>Tanggal :</label>
		            	<div class="input-group registration-date-time">
		            		<input class="form-control input-sm" name="start" id="datepicker" placeholder="Mulai Tanggal ..">
		            		<span class="input-group-addon"><span class="fa fa-calendar" aria-hidden="true"></span></span>
		            		<input class="form-control input-sm" name="end" id="datepicker2" placeholder="Sampai Tanggal ..">
		            	</div>	
				    </div>
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="No. Surat / NIK / Nama  . . . ">
				    </div>
				</div>
				<div class="col-md-4">
				    <div class="form-group col-md-12">
				        <label>Jenis Surat :</label>
				        <select name="jenis" class="form-control input-sm">
				        	<option value="">-- PILIH JENIS SURAT--</option>
				    <?php  
				    /* Loop Surat Kategori */
				    foreach($this->surat_keluar->category() as $row) :
				    ?>
							<option value="<?php echo $row->id_surat; ?>"><?php echo $row->judul_surat; ?></option>
					<?php  
					endforeach;
					?>
				        </select>	
				    </div>
				    <div class="form-group col-md-8">
				        <label>Status :</label>
				        <select name="status" class="form-control input-sm">
				        	<option value="">-- PILIH STATUS --</option>
				        	<option value="pria" <?php if($this->input->get('status')=='pending') echo 'selected'; ?>>Pending</option>
				        	<option value="wanita" <?php if($this->input->get('status')=='approve') echo 'selected'; ?>>Terverifikasi</option>
				        </select>	
				    </div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
				        <label>User :</label>
				        <select name="status" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	<option value="pria" <?php if($this->input->get('status')=='pending') echo 'selected'; ?>>Pending</option>
				        	<option value="wanita" <?php if($this->input->get('status')=='approve') echo 'selected'; ?>>Terverifikasi</option>
				        </select>	
					</div>
				</div>
				<div class="col-md-3" style="margin-left:-10px;">
                    <button type="submit" class="btn btn-app hvr-shadow"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('surat_keluar') ?>" class="btn btn-app hvr-shadow" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-3">
					Tampilkan 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('surat_keluar?per_page='); ?>' + this.value;">
					<?php  
					/**
					 * Loop 10 to 100
					 * Guna untuk limit data yang ditampilkan
					 * 
					 * @var 10
					 **/
					$start = 20; 
					while($start <= 100) :
						$selected = ($start == $this->input->get('per_page')) ? 'selected' : '';
						echo "<option value='{$start}' " . $selected . ">{$start}</option>";

						$start += 10;
					endwhile;
					?>
					</select>
					per Halaman
				</div>
				<div class="col-md-3 pull-right">
					<a href="<?php echo site_url(""); ?>" class="btn btn-default hvr-shadow btn-flat btn-print">
						<i class="fa fa-print"></i> Cetak
					</a>
					<a href="<?php echo site_url("") ?>" class="btn btn-default hvr-shadow btn-flat">
						<i class="fa fa-download"></i> Ekspor Data
					</a>
				</div>
			</div>
<?php  
// End form pencarian
echo form_close();
?>
			<div class="box-body">

<?php  
// End form pencarian
echo form_close();

/**
 * Start Form Multiple Action
 *
 * @return string
 **/
echo form_open(site_url('surat_keluar/bulk_action'));
?>
				<table class="table table-hover table-bordered col-md-12 mini-font" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="30">
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
			                    </div>
							</th>
							<th class="text-center">No. Surat</th>
							<th class="text-center">Jenis Surat</th>
							<th class="text-center" width="90">Tanggal</th>
							<th class="text-center">Nama Penduduk</th>
							<th class="text-center">Ditanda Tangani</th>
							<th class="text-center">User</th>
							<th class="text-center">Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
				<?php  
				/*
				* Loop data penduduk
				*/
				foreach($data_surat as $row) :
					$date = new DateTime($row->tanggal);
				?>
						<tr>
							<td>
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox" name="surat[]" value=""> <label for="checkbox1"></label>
			                    </div>
							</td>
							<td class="text-center">
								<?php echo $row->kode_surat.'/<b>'.$row->nomor_surat.'</b>/'.$this->option->get('kode_kecamatan').'/'.$date->format('Y'); ?>
							</td>
							<td><?php echo $row->judul_surat; ?></td>
							<td class="text-center"><?php echo date_id($row->tanggal); ?></td>
							<td><?php echo $row->nama_lengkap; ?></td>
							<td><?php echo $row->nama; ?></td>
							<td><?php echo $row->name; ?></td>
							<td><?php echo strtoupper($row->status) ?></td>
							<td class="text-center" style="font-size: 14px;" width="100">
								<div class="btn-group dropup">
  									
  									<a href="<?php echo site_url("surat_keluar/print_surat/{$row->ID}") ?>" class="btn btn-xs btn-default btn-print"><i class="glyphicon glyphicon-print"></i> Cetak</a>

  									<button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" data-placement="bottom"  title="Tombol Lainnya">
    									<span class="caret"></span>
    									<span class="sr-only">Toggle Dropdown</span>
  									</button>
  									<ul class="dropdown-menu">
								    	<li>
								    		<a href="<?php echo site_url("surat_keluar/get/{$row->ID}") ?>"> Sunting</a>
								    	</li>
								    	<li>
								    		<a href=""> Pending</a>
								    	</li>
								    	<li>
								    		<a href=""> Verifikasi</a>
								    	</li>
								    	<li>
								    		<a href=""> Unduh</a>
								    	</li>
								    	<li>
								    		<a href=""> Hapus</a>
								    	</li>
  									</ul>
								</div>
							</td>
						</tr>
				<?php  
				endforeach;
				?>
					</tbody>
					<tfoot>
						<th>
		                    <div class="checkbox checkbox-inline">
		                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
		                    </div>
						</th>
						<th colspan="8">
							<label style="font-size: 11px; margin-right: 10px;">Yang terpilih :</label>
							<a class="btn btn-xs btn-round btn-danger hvr-shadow get-delete-people-multiple"><i class="fa fa-trash-o"></i> Hapus</a>
							<a class="btn btn-xs btn-round btn-warning hvr-shadow"><i class="fa fa-times"></i> Pending</a>
							<a class="btn btn-xs btn-round btn-success hvr-shadow"><i class="fa fa-check"></i> Verifikasi</a>
							<small class="pull-right"><?php echo count($data_surat) . " dari " . $num_surat . " data"; ?></small>
						</th>
					</tfoot>
				</table>

				<div class="modal animated fadeIn modal-danger" id="modal-delete-people-multiple" tabindex="-1" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog modal-sm">
				        <div class="modal-content">
				           	<div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				                <span>Hapus data penduduk yang terpilih dari sistem?</span>
				           	</div>
				           	<div class="modal-footer">
				                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				                <button type="submit" name="action" value="delete" id="btn-delete" class="btn btn-outline"> Hapus </button>
				           	</div>
				        </div>
				    </div>
				</div>
<?php  
// End Form Multiple Action
echo form_close();
?>
			</div>
			<div class="box-footer text-center">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>



<div class="modal animated fadeIn modal-danger" id="modal-delete-people" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
                <span>Hapus data penduduk ini dari sistem?</span>
           	</div>
           	<div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
           	</div>
        </div>
    </div>
</div>