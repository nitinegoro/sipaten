<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
   <aside class="main-sidebar">
      <section class="sidebar">
      <div class="user-panel">
         <div class="pull-left image">
            <img src="<?php echo base_url("public/image/avatar.jpg"); ?>" class="img-circle" alt="User Image">
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
            <li>
              <a href="" class="<?php echo active_link_controller('surat') ?>"><i class="fa fa-angle-double-right"></i> Tidak Mampu</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Kelakuan Baik</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi KTP</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi KK</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi Akta Kelahiran</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi Tinggal Sementara</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i>  Pindah Jiwa</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi Izin Keramaian</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Pernyataan Waris & Kuasa Waris</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Domisili Perusahaan</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi TDP</a>
            </li>
          </ul>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('surat', 'setting')); ?>">
            <a href="#">
               <i class="ion ion-clipboard"></i> <span>Surat Perizinan</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
            <li>
              <a href="" class="<?php echo active_link_controller('surat') ?>"><i class="fa fa-angle-double-right"></i> Bersih Lingkungan</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Izin Usaha Mikro Kecil</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi SIUP (Perorangan)</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi SIUP (CV)</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi SIUP (PT)</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi IMB</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi SIG</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi TDG</a>
            </li>
            <li>
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Rekomendasi TDI</a>
            </li>
          </ul>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('people','desa')); ?>">
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
              <a href="" class="<?php echo active_link_controller('role') ?>"><i class="fa fa-angle-double-right"></i> Manajemen Surat</a>
            </li>
          </ul>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('setting')); ?>">
            <a href="#">
               <i class="fa fa-bar-chart-o"></i> <span>Statistik</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">
            <li>
              <a href="" class="<?php echo active_link_controller('surat') ?>"><i class="fa fa-angle-double-right"></i> Kependudukan</a>
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

