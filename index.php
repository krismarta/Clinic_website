<?php 
    require_once "header.php";
 ?>
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(<?=base_url("base/new/images/").$slider1?>);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
                    <div class="slider-text-inner">
                        <h1><?=$slider1h1?></h1>
                        <h2><?=$slider1h2?></h2>
                        <p><a class="btn btn-primary btn-lg btn-learn" href="login.php">Buat Janji</a></p>
                    </div>
                </div>
            </div>
        </div>
        </li>
        <li style="background-image: url(<?=base_url("base/new/images/").$slider2?>);">
            <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
                            <div class="slider-text-inner">
                                <h1><?=$slider2h1?></h1>
                                <h2><?=$slider2h2?></h2>
                            </div>
                        </div>
                    </div>
                </div>
        </li>
        </ul>
    </div>
</aside>

<div id="colorlib-services" >
    <div class="container" >
        <div class="row" id="layananpage">
            <div class="col-md-12">
                <div style="margin-bottom: 20px;text-align: center;"><br>
                    <div class="head ">
                        <h2 style="text-align: center;">Layanan Klinik Kesehatan KLINIK F & H CIKUPA </h2>
                    </div>
                </div>
            <div class="services-flex">
            <div class="one-fifth no-border-bottom animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-hospital"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="javascript:void(0)">Dokter Umum</a></h3>
                    </div>
                </div>  
            </div>
            <div class="one-fifth no-border-bottom animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-healthy-1"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="javascript:void(0)">Dokter Gigi</a></h3>
                    </div>
                </div>
            </div>
            <div class="one-fifth no-border-bottom animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-stethoscope"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="javascript:void(0)">Kebidanan</a></h3>
                    </div>
                </div>
            </div>
            <div class="one-fifth no-border-bottom animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-stethoscope"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="javascript:void(0)">Apoteker</a></h3>
                    </div>
                </div>
            </div>
            <div class="one-fifth no-border-bottom animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-stethoscope"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="javascript:void(0)">Laboratorium</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div id="colorlib-about">
    <div class="container">
        <div class="row" id="tentang">
            <div class="col-md-6 col-md-push-6 animate-box">
                <img class="img-responsive about-img" src="<?=base_url('base/new/images/').$aboutimg?>" alt="aboutIMG">
            </div>
        <div class="col-md-6 col-md-pull-6 animate-box">
            <h2>Tentang <?=$nama_web?></h2>
        <p><?=$aboutcontent?></p>
        <div class="fancy-collapse-panel">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Visi <?=$nama_web?> </a>
                        </h4>
                    </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?=$visiAbout?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Misi <?=$nama_web?></a>
        </h4>
    </div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
    <div class="panel-body">
        <?=$misiAbout?>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="colorlib-choose">
<div class="container-fluid">
<div class="row">
<div class="choose">
<div class="half img-bg" style="background-image: url(<?=base_url('base/new/images/')?>cover_bg_1.jpg);"></div>
<div class="half features-wrap">
<div class="features-services animate-box">
<div class="colorlib-heading animate-box">
<h3>Apa Keunggulan dari <?=$nama_web?> ?</h3>
</div>
<div class="row">
<div class="col-md-6">
<div class="features animate-box">
<span class="icon text-center"><i class="flaticon-healthy-1"></i></span>
<div class="desc">
<h3>Telepon Darurat</h3>
<p>HUbungi  021 - 5962690 jika dalam keadaan darurat.</p>
</div>
</div>
<div class="features animate-box">
<span class="icon text-center"><i class="flaticon-stethoscope"></i></span>
<div class="desc">
<h3>24 Jam Layanan</h3>
<p>Kami Melayani anda dalam waktu 24 Jam penuh. </p>
</div>
</div>
</div>
<div class="col-md-6">
<div class="features animate-box">
<span class="icon text-center"><i class="flaticon-medical-1"></i></span>
<div class="desc">
<h3>Booking Online</h3>
<p>Daftar akun agar dapat menikmati booking order secara online.</p>
</div>
</div>
<div class="features animate-box">
<span class="icon text-center"><i class="flaticon-pills"></i></span>
<div class="desc">
<h3>Informasi Lanjut</h3>
<p>Untuk Mengetahui kantor Cabang Kami Terdekat  Hubungi SMS/WA/Telegram di  081904343000 </p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="colorlib-doctor">
<div class="container">
<div class="row animate-box" id="timdokter">   
<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
<h2>Tim Dokter</h2>
</div>
</div>
<div class="row">
<div class="col-md-12 animate-box">
<div class="row">
<div class="owl-carousel2">

<?php 
    $querys = mysqli_query($con,"SELECT * FROM tb_user WHERE role = 'Dokter'");
    while ($f = mysqli_fetch_assoc($querys)) { ?>
        

<div class="item">
<div class="col-md-6">
<div class="doctor-desc">
<h3><a href="#"><?=$f['nama']?></a></h3>
<span class="specialty">
    <?php 
        $cari = mysqli_query($con,"SELECT * FROM tb_jenis_dokter WHERE id_dokter='$f[id_user]'");
        $m = mysqli_fetch_assoc($cari);
        echo $m['jenis_dokter'];
     ?>
</span>
<p>Dibawah ini adalah jadwal masing masing dokter di <strong><?=$nama_web?></strong></p>
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
                <?php 
                    $carijadwal = mysqli_query($con,"SELECT DISTINCT DATE_FORMAT(tanggal, '%d %M %Y') AS tgl,jam_mulai,jam_selesai,id_dokter,id_jadwal FROM tb_jadwal_dokter WHERE id_dokter = '$f[id_user]' ORDER BY tanggal ASC, jam_mulai ASC ");
                    while ($n = mysqli_fetch_assoc($carijadwal)) {?>
                        <tr>
                            <td><?=$n['tgl']?></td>
                            <td><?=$n['jam_mulai']?></td>
                            <td><?=$n['jam_selesai']?></td>

                        </tr>
                    <?php
                    };?>
        </tbody>
    </table>
    <p class="text-danger">*NOTE : Silahkan Lihat Jadwal Praktek Dokter Sebelum memesan</p>
</div>
</div>
</div>
<div class="col-md-6">
<div class="doctor-img" style="background-image: url(<?=base_url('assets/profil/').$f['foto']?>);">
</div>
</div>
</div><?php
    }
 ?>


</div>
</div>
</div>
</div>
</div>
</div>

<?php 
    require_once "footer.php";
 ?>
