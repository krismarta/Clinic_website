<?php 
    require_once '../config/function.php';
    if (trim(@$_SESSION['id_user']) && trim(@$_SESSION['role']) == "Admin") {
            $query = mysqli_query($con,"SELECT * FROM tb_pengaturan");
    while ($d = mysqli_fetch_assoc($query)) {
        if ($d['key'] == "nama") {
            $nama_web = $d['value'];
        }elseif ($d['key'] == "favicon") {
            $favicon = $d['value'];
        }elseif ($d['key'] == "telp1") {
            $telp1 = $d['value'];
        }elseif ($d['key'] == "telp2") {
            $telp2 = $d['value'];
        }elseif ($d['key'] == "alamat") {
            $alamat = $d['value'];
        }elseif ($d['key'] == "slider1") {
            $slider1 = $d['value'];
        }elseif ($d['key'] == "slider2") {
            $slider2 = $d['value'];
        }elseif ($d['key'] == "slider1-h1") {
            $slider1h1 = $d['value'];
        }elseif ($d['key'] == "slider1-h2") {
            $slider1h2 = $d['value'];
        }elseif ($d['key'] == "slider2-h1") {
            $slider2h1 = $d['value'];
        }elseif ($d['key'] == "slider2-h2") {
            $slider2h2 = $d['value'];
        }elseif ($d['key'] == "aboutimg") {
            $aboutimg = $d['value'];
        }elseif ($d['key'] == "aboutcontent") {
            $aboutcontent = $d['value'];
        }elseif ($d['key'] == "misi") {
            $misiAbout = $d['value'];
        }elseif ($d['key'] == "visi") {
            $visiAbout = $d['value'];
        }elseif ($d['key'] == "email") {
            $emailku = $d['value'];
        }elseif ($d['key'] == "logo-text") {
            $logoText = $d['value'];
        }elseif ($d['key'] == "facebook_link") {
            $facebook_link = $d['value'];
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=base_url('base/plugins/images/').$favicon?>" type="image/x-icon">
    <title><?=$nama_web?> Dashboard Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('base/dashboard/')?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- datatable -->
    <link href="<?=base_url('base/')?>plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="<?=base_url('base/')?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('base/')?>plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" />
    <!-- animation CSS -->
    <link href="<?=base_url('base/dashboard/')?>css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url('base/dashboard/')?>css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?=base_url('base/dashboard/')?>css/colors/green.css" id="theme" rel="stylesheet">
  <!-- sweetalert -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../base/plugins/bower_components/sweetalert/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
            <!-- sweetalert -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=base_url('base/plugins/bower_components/sweetalert/sweetalert.css')?>">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>

<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="../index.php">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img width="35" src="<?=base_url('base/plugins/images/').$favicon?>" alt="home" class="dark-logo" /><!--This is light logo icon--><img width="35" src="<?=base_url('base/plugins/images/').$favicon?>" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img width="180" src="<?=base_url('base/plugins/images/').$logoText?>" alt="home" class="dark-logo" /><!--This is light logo text--><img width="180" src="<?=base_url('base/plugins/images/').$logoText?>" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">ADMIN</span></h3> </div>
                <ul class="nav" id="side-menu">
                    <li class="user-pro">
                        <a href="javascript:void" class="waves-effect"><img src="<?=base_url('assets/profil/')?><?=$_SESSION['foto']?>" alt="user-img" class="img-circle"> <span class="hide-menu"> <?=$_SESSION['nama']?></span>
                        </a>
                    </li>
                    <li> <a href="index.php" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard</a>
                    </li>
                    <li> <a href="jadwalpasien.php" class="waves-effect"><i class="mdi mdi-calendar fa-fw" data-icon="v"></i> <span class="hide-menu"> Jadwal Pasien</a>
                    </li>
                    <li> <a href="dokter.php" class="waves-effect"><i class="mdi mdi-account-multiple fa-fw" data-icon="v"></i> <span class="hide-menu"> Data Dokter</a>
                    </li>
                    <li> <a href="apoteker.php" class="waves-effect"><i class="mdi mdi-account-box fa-fw" data-icon="v"></i> <span class="hide-menu"> Data Apoteker</a>
                    </li>
                    <li> <a href="pasien.php" class="waves-effect"><i class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Data Pasien</a>
                    </li>
                    <li> <a href="hubungikami.php" class="waves-effect"><i class="mdi mdi-message fa-fw" data-icon="v"></i> <span class="hide-menu"> Pesan Masuk</a>
                    </li>
                    <li> <a href="profil.php" class="waves-effect"><i class="mdi mdi-account-edit fa-fw" data-icon="v"></i> <span class="hide-menu"> Ubah Profile</a>
                    </li>
                    <li> <a href="settings.php" class="waves-effect"><i class="mdi mdi-settings fa-fw" data-icon="v"></i> <span class="hide-menu"> Pengaturan Web</a>
                    </li>

                    <li><a href="../logout.php" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Keluar</span></a></li>
                
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alert alert-info">
                        <h4 class="page-title ">Anda Login Sebagai Admin <span class="pull-right"><a style="color: #fff;" href="../index.php">Kembali Ke Website</a></span></h4> 
                    </div>
                </div>
    <?php 
     if (isset($_SESSION['pesan_err'])) { ?>
          <script type="text/javascript">swal("Error!","<?=$_SESSION['pesan_err'];?>","error");</script>
          <?php
          unset($_SESSION['pesan_err']);
        }elseif (isset($_SESSION['pesan_info'])) {?>
          <script type="text/javascript">swal("Informasi","<?=$_SESSION['pesan_info'];?>","info");</script>
          <?php
          unset($_SESSION['pesan_info']);
        }elseif (isset($_SESSION['pesan_success'])) {?>
          <script type="text/javascript">swal("Yeayy","<?=$_SESSION['pesan_success'];?>","success");</script>
          <?php
          unset($_SESSION['pesan_success']);
        }
}else{
    echo "<script>window.location='".base_url('login.php')."'</script>";
} 
