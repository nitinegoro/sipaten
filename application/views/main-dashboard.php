<div class="row">
	<div class="col-md-12">
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong><i class="fa fa-info-circle"></i></strong> Silahkan klik menu pilihan di sebelah kiri untuk untuk mengelola software anda atau pilih icon pada Shortcut Panel di bawah ini.
		</div>
	</div>
    <div class="col-md-7">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
              	<h3 class="box-title">Surat Keterangan </h3>
              	<div class="box-tools pull-right">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
              	</div>
            </div>
            <div class="box-body">
      <?php  
      /**
      * Loop Surat Keterangan
      *
      * @param String (jenis) 
      */
      foreach($this->option->surat_category(NULL,'non perizinan') as $row) :
      ?>
              <a class="csurat" href="<?php echo site_url("surat_keterangan/index/{$row->id_surat}") ?>">
                <img src="<?php echo base_url("public/image/icon-surat.png"); ?>" alt="sss"/>
                <span><?php echo $row->nama_kategori; ?></span>
              </a>
      <?php  
      endforeach;
      ?>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Surat Perizinan </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                </div>
            </div>
            <div class="box-body">
      <?php  
      /**
      * Loop Surat Keterangan
      *
      * @param String (jenis) 
      */
      foreach($this->option->surat_category(NULL,'perizinan') as $row) :
      ?>
              <a class="csurat" href="<?php echo site_url('') ?>">
                <img src="<?php echo base_url("public/image/icon-surat.png"); ?>" alt="sss"/>
                <span><?php echo $row->nama_kategori; ?></span>
              </a>
      <?php  
      endforeach;
      ?>
            </div>
        </div>
    </div>
</div>