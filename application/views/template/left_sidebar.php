<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
   <aside class="main-sidebar">
      <section class="sidebar">
      <div class="user-panel">
         <div class="pull-left image">
            <img src="<?php echo (!$this->session->userdata('account')->photo) ? base_url("public/image/avatar.jpg") : base_url("public/image/{$this->session->userdata('account')->photo}"); ?>" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p><?php echo $this->session->userdata('account')->name; ?></p>
            <small>Administrator</small>
         </div>
      </div>
      <ul class="sidebar-menu">
        <li class="<?php echo active_link_controller('ha'); ?>">
            <a href="<?php echo site_url('main') ?>">
               <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('setting')); ?>">
            <a href="#">
               <i class="fa fa-file-text-o"></i> <span> Surat Keterangan</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
      <?php  
      /**
      * Loop Surat Keterangan
      *
      * @param String (jenis) 
      */
      foreach($this->option->surat_category(NULL,'non perizinan') as $row) :
      ?>
            <li>
              <a href="" class="<?php echo active_link_controller('ok') ?>"><i class="fa fa-angle-double-right"></i> <?php echo $row->nama_kategori; ?></a>
            </li>
      <?php  
      endforeach;
      ?>
          </ul>
        </li>
        <li class="treeview <?php echo active_link_multiple(array('ha', 'setting')); ?>">
            <a href="#">
               <i class="ion ion-clipboard"></i> <span>Surat Perizinan</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
      <?php  
      /**
      * Loop Surat Perizinan
      *
      * @param String (jenis) 
      */
      foreach($this->option->surat_category(NULL,'perizinan') as $row) :
      ?>
            <li>
              <a href="" class="<?php echo active_link_controller('ok') ?>"><i class="fa fa-angle-double-right"></i> <?php echo $row->nama_kategori; ?></a>
            </li>
      <?php  
      endforeach;
      ?>
          </ul>
        </li>

        <li class="<?php echo active_link_controller('ha'); ?>">
            <a href="<?php echo site_url('main') ?>">
               <i class="fa fa-line-chart"></i> <span>Data Surat Keluar</span>
            </a>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('people','desa', 'surat','employee')); ?>">
            <a href="#">
               <i class="fa fa-database"></i> <span> Master Data</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('people') ?>" class="<?php echo active_link_controller('people') ?>"><i class="fa fa-angle-double-right"></i> Data Penduduk</a>
            </li>
            <li>
              <a href="<?php echo site_url('desa') ?>" class="<?php echo active_link_controller('desa') ?>"><i class="fa fa-angle-double-right"></i> Data Kelurahan/Desa</a>
            </li>
            <li>
              <a href="<?php echo site_url('surat') ?>" class="<?php echo active_link_controller('surat') ?>"><i class="fa fa-angle-double-right"></i> Manajemen Surat</a>
            </li>
            <li>
              <a href="<?php echo site_url('employee') ?>" class="<?php echo active_link_controller('employee') ?>"><i class="fa fa-angle-double-right"></i> Data Kepegawaian</a>
            </li>
          </ul>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('stats_people')); ?>">
            <a href="#">
               <i class="fa fa-bar-chart-o"></i> <span>Statistik</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('stats_people'); ?>" class="<?php echo active_link_controller('stats_people') ?>"><i class="fa fa-angle-double-right"></i> Kependudukan</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Surat Keterangan</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Surat Perizinan</a>
            </li>
          </ul>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('user')); ?>">
            <a href="#">
               <i class="ion ion-person-stalker"></i> <span>Data Pengguna</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('user') ?>" class="<?php echo active_link_method('index','user') ?>"><i class="fa fa-angle-double-right"></i> Data pengguna</a>
            </li>
            <li>
              <a href="<?php echo site_url('user/create') ?>" class="<?php echo active_link_method('create','user') ?>"><i class="fa fa-angle-double-right"></i> Tambah Pengguna</a>
            </li>
          </ul>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('setting')); ?>">
            <a href="#">
               <i class="fa fa-wrench"></i> <span>Pengaturan</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
            <li>
              <a href="" class="<?php echo active_link_controller('setting') ?>"><i class="fa fa-angle-double-right"></i> Pengaturan Sistem</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Hak Akses Pengguna</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('setting') ?>"><i class="fa fa-angle-double-right"></i> Lain-lain</a>
            </li>
          </ul>
        </li>
      </ul>
      </section>
   </aside>
   <div class="content-wrapper">
      <section class="content-header">
        <?php 
        /**
         * Generated Page Title
         *
         * @return string
         **/
          echo $page_title;

        /**
         * Generate Breadcrumbs from library
         *
         * @var string
         **/
          echo $breadcrumb; 
        ?>
      </section>
      <section class="content">
<?php  
/* End of file left_sidebar.php */
/* Location: ./application/modules/Akademik/views/_template/left_sidebar.php */
?>

