<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<body class="hold-transition skin-sipaten sidebar-mini fixed">
   <div class="wrapper">
      <header class="main-header">
         <a href="<?php echo site_url('main') ?>" class="logo">
            <img src="<?php echo base_url("public/image/in-logo.png"); ?>" class="logo-head" alt="Logo STIE Pertiba">
         </a>
         <nav class="navbar navbar-static-top">
<!--             <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
   <span class="sr-only">Toggle navigation</span>
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
</a> -->
         <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               <li class="dropdown" data-toggle="tooltip" data-placement="bottom" title="Aktifkan Pemandu Sistem" data-class="<?php echo $this->router->fetch_class(); ?>" data-method="<?php echo $this->router->fetch_method(); ?>">
                  <a id="get-tour" style="font-size: 20px;">
                     <i class="fa fa-book"></i>
                  </a>
               </li>
               <li class="dropdown user user-menu" data-toggle="tooltip" data-placement="bottom" title="Pengaturan Login">
                  <a href="<?php echo site_url('account'); ?>" style="font-size: 20px;">
                     <i class="fa fa-user"></i>
                  </a>
               </li>
               <li>
                  <a href="#" style="font-size: 20px;" data-toggle="modal" data-target="#logout" data-placement="bottom" title="Keluar dari Sistem">
                     <i class="fa fa-power-off"></i>
                  </a>
               </li>
            </ul>
         </div>
       </nav>
      </header>
<?php  
/* End of file navbar.php */
/* Location: ./application/modules/Akademik/views/_template/navbar.php */
?>