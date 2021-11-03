<?php 
    require_once "../config/function.php";
    if (trim(@$_SESSION['id_user']) && trim(@$_SESSION['role']) == "Pasien") {
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
    <title><?=$nama_web?> Dashboard Pasien</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('base/dashboard/')?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- datatable -->
    <link href="<?=base_url('base/')?>plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="<?=base_url('base/')?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?=base_url('base/dashboard/')?>css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url('base/dashboard/')?>css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?=base_url('base/dashboard/')?>css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
            <!-- sweetalert -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=base_url('base/plugins/bower_components/sweetalert/sweetalert.css')?>">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
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
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">PASIEN</span></h3> </div>
                <ul class="nav" id="side-menu">
                    <li class="user-pro">
                        <a href="javascript:void" class="waves-effect"><img src="<?=base_url('assets/profil/')?><?=$_SESSION['foto']?>" alt="user-img" class="img-circle"> <span class="hide-menu"> <?=$_SESSION['nama']?></span>
                        </a>
                    </li>
                    <li> <a href="buatjanji.php" class="waves-effect"><i class="mdi mdi-calendar-plus fa-fw" data-icon="v"></i> <span class="hide-menu"> Buat Janji</a>
                    </li>
                    <li> <a href="riwayat.php" class="waves-effect"><i class="mdi mdi-history fa-fw" data-icon="v"></i> <span class="hide-menu"> Riwayat Periksa</a>
                    </li>
                    <li> <a href="profil.php" class="waves-effect"><i class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Ubah Profile</a>
                    </li>
                   <li><a href="../logout.php" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Keluar</span></a></li>
                    <li class="devider"></li>
                    <li><a href="../index.php" class="waves-effect"><i class="fa fa-circle-o text-warning"></i> <span class="hide-menu">Kembali Ke Website</span></a></li>
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
                        <h4 class="page-title ">Anda Login Sebagai Pasien <span class="pull-right"><a style="color: #fff;" href="../index.php">Kembali Ke Website</a></span></h4> 
                    </div>
                </div>
    <?php 
}else{
    echo "<script>window.location='".base_url('login.php')."'</script>";
} 

?>
