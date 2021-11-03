<?php 
    require_once "config/function.php";
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
        }elseif ($d['key'] == "facebook_link") {
            $facebook_link = $d['value'];
        }
    }
 ?>
<!DOCTYPE HTML>
<html style="scroll-behavior: smooth;">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?=$nama_web?></title>
<link rel="icon" href="<?=base_url('base/plugins/images/').$favicon?>" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<link rel="stylesheet" href="<?=base_url('base/new/')?>css/animate.css">

<link rel="stylesheet" href="<?=base_url('base/new/')?>css/icomoon.css">

<link rel="stylesheet" href="<?=base_url('base/new/')?>css/bootstrap.css">

<link rel="stylesheet" href="<?=base_url('base/new/')?>css/magnific-popup.css">

<link rel="stylesheet" href="<?=base_url('base/new/')?>css/owl.carousel.min.css">
<link rel="stylesheet" href="<?=base_url('base/new/')?>css/owl.theme.default.min.css">

<link rel="stylesheet" href="<?=base_url('base/new/')?>css/flexslider.css">

<link rel="stylesheet" href="<?=base_url('base/new/')?>fonts/flaticon/font/flaticon.css">

<link rel="stylesheet" href="<?=base_url('base/new/')?>css/style.css">

<script src="<?=base_url('base/new/')?>js/modernizr-2.6.2.min.js" type="565bb8047f8f38d487258de8-text/javascript"></script>
            <!-- sweetalert -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=base_url('base/plugins/bower_components/sweetalert/sweetalert.css')?>">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="colorlib-loader"></div>
<div id="page">
<nav class="colorlib-nav" role="navigation">
<div class="top-menu">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="top">
<div class="row">
<div class="col-md-6">
<div id="colorlib-logo"><a href="index.php">F & H <span>Klinik</span></a></div>
</div>
<div class="col-md-3">
<div class="num">
<span class="icon"><i class="icon-phone"></i></span>
<p><a href="tel://<?=$telp1?>"><?=$telp1?></a><br><a target="_blank" href="https://api.whatsapp.com/send?phone=<?=$telp2?>"><?=$telp2?></a></p>
</div>
</div>
<div class="col-md-3">
<div class="loc">
<span class="icon"><i class="icon-location"></i></span>
<p><a href="#"><?=$alamat?>
</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="menu-wrap">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="menu-1">
<ul>
<li class=""><a href="index.php">Beranda</a></li>
<li><a href="#layananpage"  >Layanan Klinik</a></li>
<li><a href="#tentang">Tentang Klinik</a></li>
<li><a href="#timdokter">Tim Dokter</a></li>
<li><a href="#hubungikami">Hubungi Kami</a></li>
<?php 
if (trim(!@$_SESSION['id_user'])) {?>
<li><a href="login.php">Masuk</a></li>
<li><a href="daftar.php">Daftar</a></li> 
    <?php
}else{ ?>
    <li class="has-dropdown">
        <a href="javascript:void(0)">Dashboard</a>
        <ul class="dropdown">
        <li><a href="login.php">Dashboard <?=$_SESSION['role']?></a></li>
        <li><a href="logout.php">Keluar</a></li>
        </ul>
        </li>
<?php
}
?>
</ul>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</nav>
