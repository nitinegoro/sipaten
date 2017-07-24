<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header', $this->data );
?>
<body class="grey lighten-3">
    <div class="navbar-fixed">
        <nav class="nav-extended orange darken-3">
            <div class="nav-wrapper navbar-fixed">
                <a href="<?php echo site_url('apps/surat'); ?>"><i class="fa fa-angle-double-left"></i></a>
                <a class="heading-text"><?php echo $title ?></a>
                <a href="#logoff" class="right"><i class="fa fa-sign-out"></i></a>
            </div>
        </nav>
    </div>
    <section class="white">
    <div class="main-content">

    </div>
    </section>

<?php  

$this->load->view('footer', $this->data );

/* End of file surat-surat.php */
/* Location: ./application/modules/apps/views/surat-surat.php */
