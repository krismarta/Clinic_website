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
    <meta name="Description" content="F & H Klinik">
    <!-- Favicon Icon -->
    <link rel="icon" type="image/x-icon" href="<?=base_url('base/utama/')?>images/favicon.png" />
    <!-- Font Awesoeme Stylesheet CSS -->
    <link rel="stylesheet" href="<?=base_url('base/utama/')?>font-awesome/css/font-awesome.min.css" />
    <!-- Google web Font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600">
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
    <!-- Start Header Section -->
    <header id="header-transparent">
        <div class="layer-stretch hdr-center">
            <div class="row align-items-center">
            <?php 
                if (trim(!@$_SESSION['id_user'])) {?>
                      <div class="col-5 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    <div class="hdr-center-account text-left p-0">
                        <a href="login.php" class="font-14 mr-4"><i class="fa fa-sign-in"></i>Masuk</a>
                        <a href="daftar.php" class="font-14"><i class="fa fa-user-o"></i>Daftar</a>
                    </div>
                </div>  
                    <?php
                }
             ?>
                
                <div class="col">
                    <div class="hdr-center-logo text-center">
                        <a href="index.html" class="d-inline-block"><img src="<?=base_url('base/')?>images/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-5 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                    <div class="pull-right">
                        <ul class="social-list social-list-white">
                            <li>
                                <a href="#" id="hdr-facebook" class="fa fa-facebook rounded"></a>
                                <span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-facebook">Facebook</span>
                            </li>
                            <li>
                                <a href="#" id="hdr-twitter" class="fa fa-twitter rounded"></a>
                                <span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-twitter">Twitter</span>
                            </li>
                            <li>
                                <a href="#" id="hdr-instagram" class="fa fa-instagram rounded"></a>
                                <span class="mdl-tooltip mdl-tooltip--bottom" data-mdl-for="hdr-instagram">Instagram</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-transparent-menu">
            <div class="hdr layer-stretch">
                <div class="row align-items-center justify-content-end">
                    <!-- Start Menu Section -->
                    <ul class="col menu text-left">
                        <li>
                            <a id="menu-home" class="mdl-button mdl-js-button mdl-js-ripple-effect">Beranda</a>
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
                        <li class="mobile-menu-close"><i class="fa fa-times"></i></li>
                        <?php 
                            if (trim(@$_SESSION['id_user'])) {?>

                                <li><a href="login.php" id="menu-shortcodes" class="mdl-button mdl-js-button mdl-js-ripple-effect">Dashboard <?=$_SESSION['role']?></a></li><?php
                            }
                         ?>
                        
                    </ul><!-- End Menu Section -->
                    <div class="col col-md-auto d-none d-sm-block d-md-block d-lg-block d-xl-block">
                        <button onclick="window.location.href='login.php'" class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect hdr-apointment"><i class="fa fa-calendar m-0 color-white"></i> Buat Janji</button>
                    </div>
                    <div id="menu-bar" class="col-2 col-md-auto"><a><i class="fa fa-bars color-white"></i></a></div>
                </div>
            </div>
        </div>
    </header><!-- End Header Section -->
    <!-- Start Slider Section -->
    <div id="slider" class="slider-1">
        <div class="flexslider slider-wrapper">
            <ul class="slides">     
                <li>
                    <div class="slider-backgroung-image" style="background-image: url(base/utama/uploads/n1.jpg);"></div>
                </li>
                 <li>
                    <div class="slider-backgroung-image" style="background-image: url(base/utama/uploads/slider-1.jpg);"></div>
                </li>
            </ul>
        </div>
    </div><!-- End Slider Section -->
    <!-- Start Service Section -->
    <div id="hm-service" class="layer-stretch">
        <div class="layer-wrapper">
            <div class="layer-ttl">
                <h3>Fasilitas Dan Pelayanan</h3>
            </div>
            <div class="layer-container row">
                <div class="hm-service-left col-md-5">
                    <img src="base/uploads/hm-service.jpg" alt="Klinical Health care">
                </div>
                <div class="hm-service-right col-md-7">
                    <p class="paragraph-medium paragraph-black">Klinik is a HTML5 &#38; CSS3 responsive template created for clinic and hospital but also can be used for generalised website. It is a fully responsive, feature rich and beautifully designed to host a website or create online identity. We have created 55+ pages and 200+ components for this template and much more in future.</p>
                    <div class="hm-service">
                        <div class="hm-service-block">
                            <i class="fa fa-stethoscope"></i>
                            <span>Apotek</span>
                        </div>
                        <div class="hm-service-block">
                            <i class="fa fa-child"></i>
                            <span>Dokter Umum</span>
                        </div>
                        <div class="hm-service-block">
                            <i class="fa fa-certificate"></i>
                            <span>Kebidanan</span>
                        </div>
                        <div class="hm-service-block">
                            <i class="fa fa-h-square"></i>
                            <span>Dokter Gigi</span>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div><!-- End Service Section -->
    <!-- Start About Section -->
    <div id="hm-about" class="parallax-background parallax-background-1">
        <div class="layer-stretch">
            <div class="layer-wrapper">
                <div class="layer-ttl layer-ttl-white">
                    <h3>Tentang Kami </h3>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="hm-about-block">
                            <div class="tbl-cell hm-about-icon"><i class="fa fa-user-md"></i></div>
                            <div class="tbl-cell hm-about-number">
                                <span class="counter">54</span>
                                <p>Dokter</p>
                            </div>
                        </div>
                        <div class="hm-about-block">
                            <div class="tbl-cell hm-about-icon"><i class="fa fa-ambulance"></i></div>
                            <div class="tbl-cell hm-about-number">
                                <span class="counter">130</span>
                                <p>Ruangan</p>
                            </div>
                        </div>  
                        <div class="hm-about-paragraph">
                            <p class="paragraph-medium paragraph-white">
                                <span class="theme-dropcap color-white">K</span>Reque errem oblique sed et, an fugit omnes impetus qui. Mea et ludus choro, wisi mnesarchum no vim, no aliquip laoreet his. Mutat sapientem similique usu ex, novum docendi inimicus at vis, te sit persecuti philosophia delicatissimi. Mei civibus eloquentiam cu. Unum invidunt adipiscing sea et, corrumpit torquatos pri cu. Malis nihil menandri ea vel, stet possit usu cu. Nec autem graeco ea, ne ferri reque est.No est liber eloquentiam, mei an adhuc dicunt meliore. Purto volutpat vix ut, qui ad sint utinam nominavi. Ea option recusabo eos, no est vide eleifend gloriatur. Atqui timeam omnesque nec te.
                            </p> 
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img class="img-thumbnail" src="base/uploads/hm-about.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End About Section -->

    <!-- Start Feature Section -->
    <div id="hm-feature" class="layer-stretch">
        <div class="layer-wrapper layer-bottom-10">
            <div class="layer-ttl">
                <h3>Nilai Nilai</h3>
            </div>
            <div class="layer-container">
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-stethoscope"></i>
                    </div>
                    <span>Orientasi Kualitas</span>
                    <p class="paragraph-small paragraph-black">Kami mengadopsi manajemen kualitas sebagai filosofi utama dalam apapun yang kami lakukan dan menekankan pada budaya pengembangan kualitas secara menyeluruh atau terintegrasi yang diwujudkan dengan tenaga medis dan pendukung yang terlatih dan dikembangkan dari waktu ke waktu dengan dukungan peralatan yang modern.</p>
                </div>
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <span>Tim Kerja</span>
                    <p class="paragraph-small paragraph-black">Kami bekerja sama antar bagian dan tim dengan niat tulus, merasa menjadi bagian dari sebuah tim, saling mendukung untuk tujuan terbaik untuk klinik dan pasien serta komunitas pendukungnya. Kerjasama dengan pemasok, rumah sakit lanjutan dan juga regulator akan ditingkatkan secara professional untuk kepentingan pasien, keluarga pasien dan karyawan klinik.</p>
                </div>
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-cloud"></i>
                    </div>
                    <span>Kepedualian Kami</span>
                    <p class="paragraph-small paragraph-black">Kami melayani pasien melalui pelayanan yang responsif, terpadu, nyaman, komunikasi yang baik, mengerti masalah pasien, memberikan pelayanan dan saran yang terbaik, menolong pasien secara menyeluruh, membuat pasien merasa aman seperti dilayani keluarga sendiri.</p>
                </div>
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <span>Telepon Darurat</span>
                    <p class="paragraph-small paragraph-black">Dalam Keadaan Darurat Bisa Menghubungi Kami. dinomor : 08585858588</p>
                </div>
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <span>24 Jam Pelayanan</span>
                    <p class="paragraph-small paragraph-black">Kami Melayani anda dalam waktu 24 Jam penuh</p>
                </div>
                <div class="hm-feature-block">
                    <div class="hm-feature-icon">
                        <i class="fa fa-ambulance"></i>
                    </div>
                    <span>Etika dan Nilai Nilai</span>
                    <p class="paragraph-small paragraph-black">Kami bertanggung jawab secara professional dengan standar etik kesehatan yang baik.</p>
                </div>
 
            </div>
        </div>
    </div><!-- End Feature Section -->
    <!-- Start Doctor Section -->
    <div class="parallax-background parallax-background-2">
        <div class="layer-stretch">
            <div class="layer-wrapper">
                <div class="layer-ttl layer-ttl-white">
                    <h3>Tim Dokter</h3>
                </div>
                <div class="layer-container">
                    <div id="hm-doctor-slider" class="owl-carousel owl-theme theme-owl-dot">
                        <div class="hm-doctor">
                            <img class="img-responsive" src="base/uploads/slide-doctor-1.jpg" alt="">
                            <h6>Dr. Daniel Barnes</h6>
                            <p>Orthologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="base/uploads/slide-doctor-2.jpg" alt="">
                            <h6>Dr. Melisa bates</h6>
                            <p>Gynocologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="base/uploads/slide-doctor-3.jpg" alt="">
                            <h6>Dr. Cheri Aria</h6>
                            <p>Dermatologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="base/uploads/slide-doctor-4.jpg" alt="">
                            <h6>Steve Soeren</h6>
                            <p>Orthologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="base/uploads/slide-doctor-5.jpg" alt="">
                            <h6>Barbara Baker</h6>
                            <p>Surgeon</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="base/uploads/slide-doctor-6.jpg" alt="">
                            <h6>Dr Widada</h6>
                            <p>Dokter Umum</p>
                             <div class="table-responsive">
                                <table class="table color-table primary-table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2020-01-20</td>
                                            <td>14:00</td>
                                            <td>16:00</td>
                                        </tr>
                                            <td>2020-01-20</td>
                                            <td>14:00</td>
                                            <td>16:00</td>
                                        </tr>
                                            <td>2020-01-20</td>
                                            <td>14:00</td>
                                            <td>16:00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="base/uploads/slide-doctor-7.jpg" alt="">
                            <h6>Emily Rasberry</h6>
                            <p>Pathologist</p>
                        </div>
                        <div class="hm-doctor">
                            <img class="img-responsive" src="base/uploads/slide-doctor-8.jpg" alt="">
                            <h6>Nancy Allen</h6>
                            <p>Gynocologist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Doctor Section -->
    <!-- Start Emergency Section -->
    <div id="emergency">
        <div class="layer-stretch">
            <div class="layer-wrapper">
                <div class="layer-ttl">
                    <h3>Keperluan Darurat ?</h3>
                </div>
                <div class="layer-container">
                    <div class="paragraph-medium paragraph-black">
                       Kami melayani anda selama 24 jam penuh. jika terjadi sesuatu yang bersifat <strong>DARURAT</strong>, anda bisa menghubungi kami melalui telepon
                    </div>
                    <div class="emergency-number">Telepon : 021(2023112)</div>
                </div>
            </div>
        </div>
    </div><!-- End Emergency Section -->
    <!-- Start Footer Section -->
    <footer id="footer">
        <div class="layer-stretch">
            <!-- Start main Footer Section -->
            <div class="row layer-wrapper">
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Informasi Klinik</p></div>
                    <div class="footer-container footer-a">
                        <div class="tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-map-marker"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white">
                                        Your office, Building Name<br />
                                        Street name, Area<br />
                                        City, Country Pin Code
                                    </p>
                                </div>
                            </div>
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-phone"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white">12213</p>
                                </div>
                            </div>
                            <div class="tbl-row">
                                <div class="tbl-cell"><i class="fa fa-envelope"></i></div>
                                <div class="tbl-cell">
                                    <p class="paragraph-medium paragraph-white">hello@yourdomain.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Menu Cepat</p></div>
                    <div class="footer-container footer-b">
                        <div class="tbl">
                            <div class="tbl-row">
                                <ul class="tbl-cell">
                                    <li><a href="event-1.html">Event Style 1</a></li>
                                    <li><a href="event-2.html">Event Style 2</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="privacy-policy.html">Privacy policy</a></li>
                                    <li><a href="terms-conditions.html">Terms condition</a></li>
                                    <li><a href="faq.html">Faq</a></li>
                                </ul>
                                <ul class="tbl-cell">
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="forgot.html">Forgot Password</a></li>
                                    <li><a href="myappointment.html">My Appointment</a></li>
                                    <li><a href="myrequest.html">My Request</a></li>
                                    <li><a href="myprofile.html">My Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-block">
                    <div class="footer-ttl"><p>Sosial Media </p></div>
                    <div class="footer-container footer-c">
                        <ul class="social-list social-list-colored footer-social">
                            <li>
                                <a href="#" target="_blank" id="footer-facebook" class="fa fa-facebook"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-facebook">Facebook</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-twitter" class="fa fa-twitter"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-twitter">Twitter</span>
                            </li>
                            <li>
                                <a href="#" target="_blank" id="footer-instagram" class="fa fa-instagram"></a>
                                <span class="mdl-tooltip mdl-tooltip--top" data-mdl-for="footer-instagram">Instagram</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- End main Footer Section -->
        <!-- Start Copyright Section -->
        <div id="copyright">
            <div class="layer-stretch">
                <div class="paragraph-medium paragraph-white"><?=date('Y')?> © F & H Klinik ALL RIGHTS RESERVED.</div>
            </div>
        </div><!-- End of Copyright Section -->
    </footer><!-- End of Footer Section -->

    <!-- **********Included Scripts*********** -->

    <!-- Jquery Library 2.1 JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/jquery-2.1.4.min.js"></script>
    <!-- Popper JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/popper.min.js"></script>
    <!-- Bootstrap Core JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/bootstrap.min.js"></script>
    <!-- Material Design Lite JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/material.min.js"></script>
    <!-- Material Select Field Script -->
    <script src="<?=base_url('base/utama/')?>js/mdl-selectfield.min.js"></script>
    <!-- Flexslider Plugin JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/jquery.flexslider.min.js"></script>
    <!-- Owl Carousel Plugin JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/owl.carousel.min.js"></script>
    <!-- Scrolltofixed Plugin JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/jquery-scrolltofixed.min.js"></script>
    <!-- Magnific Popup Plugin JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/jquery.magnific-popup.min.js"></script>
    <!-- WayPoint Plugin JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/jquery.waypoints.min.js"></script>
    <!-- CounterUp Plugin JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/jquery.counterup.js"></script>
    <!-- SmoothScroll Plugin JavaScript-->
    <script src="<?=base_url('base/utama/')?>js/smoothscroll.min.js"></script>
    <!--Custom JavaScript for Klinik Template-->
    <script src="<?=base_url('base/utama/')?>js/custom.js"></script>
</body>
</html>
