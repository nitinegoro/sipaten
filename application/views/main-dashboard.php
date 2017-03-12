<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong><i class="fa fa-info-circle"></i></strong> Silahkan klik menu pilihan di sebelah kiri untuk untuk mengelola software anda atau pilih icon pada Shortcut Panel di bawah ini.
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $this->db->count_all('penduduk'); ?></h3> <p>Jumlah Penduduk</p>
            </div>
            <div class="icon"> <i class="ion ion-ios-people"></i></div>
            <a href="<?php echo site_url('people'); ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $this->db->count_all('desa'); ?></h3><p>Jumlah Kel / Desa</p>
            </div>
            <div class="icon"> <i class="ion ion-map"></i> </div>
            <a href="<?php echo site_url('desa') ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>44</h3> <p>Surat Keluar</p>
            </div>
            <div class="icon"> <i class="fa fa-line-chart"></i> </div>
            <a href="#" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-teal">
            <div class="inner">
                <h3><?php echo $this->db->count_all('users'); ?></h3> <p>Pengguna Sistem</p>
            </div>
            <div class="icon"> <i class="ion ion-person-stalker"></i> </div>
            <a href="<?php echo site_url('user') ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-7">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
              	<h3 class="box-title">Shortcut Surat Keterangan </h3>
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
              <a class="csurat" href="<?php echo site_url("surat_keterangan/create/{$row->id_surat}?from=".current_url()) ?>">
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
                <h3 class="box-title">Shortcut Surat Perizinan </h3>
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

<div class="row">
    <div class="col-md-12">
        <div id="surat-keluar"></div>
    </div>
</div>