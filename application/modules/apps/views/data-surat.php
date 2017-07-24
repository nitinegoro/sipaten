<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header', $this->data );
?>
<body class="grey lighten-3">
    <div class="navbar-fixed">
        <nav class="nav-extended orange darken-3">
            <div class="nav-wrapper navbar-fixed">
                <a href="<?php echo site_url('apps'); ?>"><i class="fa fa-angle-double-left"></i></a>
                <a class="heading-text"><?php echo $title ?></a>
                <a href="#logoff" class="right"><i class="fa fa-sign-out"></i></a>
                <div class="input-field">
                    <input type="search" value="" placeholder="Pencarian data ...">
                    <label class="label-icon"><i class="icon-search-nav material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </div>
        </nav>
    </div>
    <section class="white">
    <div class="main-content">
        <div class="collection">
            <a href="<?php echo site_url("apps/surat/get/3") ?>" class="collection-item grey-text">
                <i class="fa fa-check green-text right"></i>
                <span class="list-name">SURAT PENGANTAR KARTU KELUARGA</span> <br>
                <small>Nomor : 100/0001/19.04.01.2003/2017</small><br>
                <small>Sabtu, 23 Agustus 2017 diajukan oleh Eko Maulana </small>
            </a>
            <a href="<?php echo site_url("apps/surat/get/3") ?>" class="collection-item grey-text">
                <i class="fa fa-check green-text right"></i>
                <span class="list-name">SURAT REKOMENDASI IZIN KERAMAIAN</span> <br>
                <small>Nomor : 100/0001/19.04.01.2003/2017</small><br>
                <small>Sabtu, 23 Agustus 2017 diajukan oleh Eko Maulana </small>
            </a>
            <a href="<?php echo site_url("apps/surat/get/3") ?>" class="collection-item grey-text">
                <i class="fa fa-times red-text right"></i>
                <span class="list-name">SURAT KETERANGAN PINDAH JIWA</span> <br>
                <small>Nomor : 100/0001/19.04.01.2003/2017</small><br>
                <small>Sabtu, 23 Agustus 2017 diajukan oleh Eko Maulana </small>
            </a>
            <a href="<?php echo site_url("apps/surat/get/3") ?>" class="collection-item grey-text">
                <i class="fa fa-check green-text right"></i>
                <span class="list-name">SURAT KETERANGAN PINDAH JIWA</span> <br>
                <small>Nomor : 100/0001/19.04.01.2003/2017</small><br>
                <small>Sabtu, 23 Agustus 2017 diajukan oleh Eko Maulana </small>
            </a>
        </div>
        <ul class="pagination center">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active orange"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>
    </section>

<?php  

$this->load->view('footer', $this->data );

/* End of file data-surat.php */
/* Location: ./application/modules/apps/views/data-surat.php */
