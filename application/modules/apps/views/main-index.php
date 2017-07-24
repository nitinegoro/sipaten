<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header', $this->data );

$account = $this->account->get();

?>
<body class="grey lighten-3">
    <div class="navbar-fixed">
        <nav class="nav-extended orange darken-3">
            <div class="nav-wrapper navbar-fixed">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                <img class="brand-logo center" src="<?php echo base_url("public/android/images/logo1.png"); ?>" alt="Logo apps tempayan">
                <a href="#logoff" class="right"><i class="fa fa-sign-out"></i></a>
            </div>
            <div class="nav-content">
                <ul class="tabs tabs-transparent orange darken-4">
                    <li class="tab"><a href="#test1" class="active"><i class="tiny material-icons">assignment</i></a></li>
                    <li class="tab"><a href="#test2"><i class="material-icons">trending_up</i></a></li>
                    <li class="tab"><a href="#test3"><i class="material-icons">av_timer</i></a></li>
                    <li class="tab"><a href="#test4"><i class="material-icons ">hearing</i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <ul id="slide-out" class="side-nav">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="<?php echo base_url("public/android/images/bg.jpg"); ?>" alt="main bg">
                </div>
                <a href="#!user"><img class="circle" src="<?php echo base_url("public/android/images/user.jpg"); ?>"></a>
                <a href="#!name"><span class="white-text name"><?php echo $account->name; ?></span></a>
                <a href="#!email"><span class="white-text email"><?php echo $account->email ?></span></a>
            </div>
        </li>
        <li><a href=""><i class="fa fa-home"></i> Halaman Utama</a></li>
        <li><a href="<?php echo site_url('apps/surat') ?>"><i class="fa fa-envelope-o"></i> Data Surat Keluar</a></li>
        <li><a href=""><i class="fa fa-line-chart"></i> Analisa Pelayanan</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Pengaturan</a></li>
        <li><a class="waves-effect" href="<?php echo site_url('apps/account') ?>"><i class="fa fa-user"></i> Akun</a></li>
    </ul>
    <div id="test1" class="container">
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
              
            </div>
        </div>
    </div>

    <div id="test2" class="container">
        <div class="section no-pad-bot" id="index-banner">
            <div class="container" >
                <h1 class="header center orange-text">Statistik</h1>
            </div>
        </div>
    </div>

    <div id="test3" class="container">
        <div class="section no-pad-bot" id="index-banner">
            <div class="container" >
                <h1 class="header center orange-text">Layanan</h1>
            </div>
        </div>
    </div>

    <div id="test4" class="container">
        <div class="section no-pad-bot" id="index-banner">
            <div class="container" >
                <h1 class="header center orange-text">Profl</h1>
            </div>
        </div>
    </div>

<?php  

$this->load->view('footer', $this->data );

/* End of file main-index.php */
/* Location: ./application/modules/apps/views/main-index.php */
?>


