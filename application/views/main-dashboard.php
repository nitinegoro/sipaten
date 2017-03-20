<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua" id="block-stats-penduduk">
            <div class="inner">
              <h3><?php echo $this->db->count_all('penduduk'); ?></h3> <p>Jumlah Penduduk</p>
            </div>
            <div class="icon"> <i class="ion ion-ios-people"></i></div>
            <a href="<?php echo site_url('people'); ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green" id="block-stats-desa">
            <div class="inner">
                <h3><?php echo $this->db->count_all('desa'); ?></h3><p>Jumlah Kel / Desa</p>
            </div>
            <div class="icon"> <i class="ion ion-map"></i> </div>
            <a href="<?php echo site_url('desa') ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow" id="block-stats-surat-keluar">
            <div class="inner">
                <h3><?php echo $this->db->get_where('surat', array('status' => 'approve'))->num_rows() ?></h3> <p>Surat Keluar</p>
            </div>
            <div class="icon"> <i class="fa fa-line-chart"></i> </div>
            <a href="<?php echo site_url('surat_keluar?status=approve') ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-teal" id="block-stats-pengguna-sistem">
            <div class="inner">
                <h3><?php echo $this->db->count_all('users'); ?></h3> <p>Pengguna Sistem</p>
            </div>
            <div class="icon"> <i class="ion ion-person-stalker"></i> </div>
            <a href="<?php echo site_url('user') ?>" class="small-box-footer">Selengkapnya...</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-default box-solid" id="block-tombol-surat-keterangan">
            <div class="box-header with-border">
              	<h3 class="box-title">Shortcut Surat Non Perizinan </h3>
              	<div class="box-tools pull-right">
                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
              	</div>
            </div>
            <div class="box-body" style="padding-left: 12px;">
      <?php  
      /**
      * Loop Surat Keterangan
      *
      * @param String (jenis) 
      */
      foreach($this->option->surat_category(NULL,'non perizinan') as $row) :
      ?>
              <a class="csurat hvr-pulse-grow" href="<?php echo site_url("create_surat/index/{$row->id_surat}?from=".current_url()) ?>">
                <img src="<?php echo base_url("public/image/icon-surat.png"); ?>" alt="sss"/>
                <span><?php echo $row->nama_kategori; ?></span>
              </a>
      <?php  
      endforeach;
      ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-default box-solid" id="block-tombol-surat-perizinan">
            <div class="box-header with-border">
                <h3 class="box-title">Shortcut Surat Perizinan </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                </div>
            </div>
            <div class="box-body" style="padding-left: 12px;">
      <?php  
      /**
      * Loop Surat Keterangan
      *
      * @param String (jenis) 
      */
      foreach($this->option->surat_category(NULL,'perizinan') as $row) :
      ?>
              <a class="csurat hvr-pulse-grow" href="<?php echo site_url("create_surat/index/{$row->id_surat}?from=".current_url()) ?>">
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
        <div id="surat-keluar" class="block-chart-surat-keluar"></div>
    </div>
</div>