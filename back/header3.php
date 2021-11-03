<?php 
    require_once "config/function.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site Title -->
    <title>F & H Klinik</title>
    <!-- Meta Description Tag -->
    <meta name="Description" content="Klinik is a HTML5 & CSS3 responsive template">
    <!-- Favicon Icon -->
    <link rel="icon" type="image/x-icon" href="<?=base_url('base/utama/')?>images/favicon.png" />
    <!-- Font Awesoeme Stylesheet CSS -->
    <link rel="stylesheet" href="<?=base_url('base/utama/')?>font-awesome/css/font-awesome.min.css" />
    <!-- Google web Font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,500">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?=base_url('base/utama/')?>css/bootstrap.min.css">
    <!-- Material Design Lite Stylesheet CSS -->
    <link rel="stylesheet" href="<?=base_url('base/utama/')?>css/material.min.css" />
    <!-- Material Design Select Field Stylesheet CSS -->
    <link rel="stylesheet" href="<?=base_url('base/utama/')?>css/mdl-selectfield.min.css">
    <!-- Owl Carousel Stylesheet CSS -->
    <link rel="stylesheet" href="<?=base_url('base/utama/')?>css/owl.carousel.min.css" />
    <!-- Animate Stylesheet CSS -->
    <link rel="stylesheet" href="<?=base_url('base/utama/')?>css/animate.min.css" />
    <!-- Magnific Popup Stylesheet CSS -->
    <link rel="stylesheet" href="<?=base_url('base/utama/')?>css/magnific-popup.css" />
    <!-- Flex Slider Stylesheet CSS -->
    <link rel="stylesheet" href="<?=base_url('base/utama/')?>css/flexslider.css" />
    <!-- Custom Main Stylesheet CSS -->
    <link rel="stylesheet" href="<?=base_url('base/utama/')?>css/style.css">
</head>
<body>
    <!-- Start Header -->
    <header id="header">
        <!-- Start Header Top Section -->
        <div id="hdr-top-wrapper">
            <div class="layer-stretch hdr-top">
                <div class="hdr-top-block hidden-xs">
                    <div id="hdr-social">
                        <ul class="social-list social-list-sm">
                            <li><a class="width-auto font-13">Follow Us : </a></li>
                            <li><a href="#" target="_blank" id="hdr-facebook" ><i class="fa fa-facebook" ></i></a><span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-facebook">Facebook</span></li>
                            <li><a href="#" target="_blank" id="hdr-twitter" ><i class="fa fa-twitter" ></i></a><span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-twitter">Twitter</span></li>
                            <li><a href="#" target="_blank" id="hdr-instagram" ><i class="fa fa-instagram" ></i></a><span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-instagram">Instagram</span></li>
                        </ul>
                    </div>
                </div>
                <div class="hdr-top-line hidden-xs"></div>
                <div class="hdr-top-block hdr-number">
                    <div class="font-13">
                        <i class="fa fa-mobile font-20 tbl-cell"> </i> <span class="hidden-xs tbl-cell"> Emergency Number : </span> <span class="tbl-cell">1800000000</span>
                    </div>
                </div>
                
            </div>
        </div><!-- End Header Top Section -->
        <!-- Start Main Header Section -->
        <div id="hdr-wrapper">
            <div class="layer-stretch hdr">
                <div class="tbl">
                    <div class="tbl-row">
                        <!-- Start Header Logo Section -->
                        <div class="tbl-cell hdr-logo">
                            <a href="index.html"><img src="<?=base_url('base/utama/')?>images/logo.png" alt=""></a>
                        </div><!-- End Header Logo Section -->
                        <div class="tbl-cell hdr-menu">
                            <!-- Start Menu Section -->
                            <ul class="menu">
                                <li>
                            <a href="index.php" id="menu-home" class="mdl-button mdl-js-button mdl-js-ripple-effect">Beranda</a>
                        </li>
                        <li>
                            <a id="menu-home" class="mdl-button mdl-js-button mdl-js-ripple-effect">Tentang Kami</a>
                        </li>
                        <li class="menu-megamenu-li">
                            <a id="menu-pages" class="mdl-button mdl-js-button mdl-js-ripple-effect">Fasilitas & Pelayanan</a>
                        </li>
                        <li>
                            <a id="menu-service" class="mdl-button mdl-js-button mdl-js-ripple-effect">Tim Dokter </a>
                        </li>
                        <li>
                            <a id="menu-service" class="mdl-button mdl-js-button mdl-js-ripple-effect">Hubungi Kami </a>
                        </li>

                        <li><a href="components.html" id="menu-shortcodes" class="mdl-button mdl-js-button mdl-js-ripple-effect">FAQ</a></li>
                        <?php 
                            if (trim(@$_SESSION['id_user'])) {?>

                                <li><a href="login.php" id="menu-shortcodes" class="mdl-button mdl-js-button mdl-js-ripple-effect">Dashboard <?=$_SESSION['role']?></a></li><?php
                            }
                         ?>
                                <li class="mobile-menu-close"><i class="fa fa-times"></i></li>
                            </ul><!-- End Menu Section -->
                            <div id="menu-bar"><a><i class="fa fa-bars"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Main Header Section -->
    </header><!-- End Header -->
