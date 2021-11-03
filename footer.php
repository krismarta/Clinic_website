<footer id="colorlib-footer" role="contentinfo">
<div class="overlay"></div>
<div class="container" id="hubungikami">
<div class="row row-pb-md">
<div class="col-md-4 colorlib-widget">
<h3>Informasi Klinik</h3>
<ul class="colorlib-footer-links">
<li><?=$alamat?></li>
<li><a href="tel://<?=$telp1?>"><i class="icon-phone"></i> <?=$telp1?></a></li>
<li><a href="mailto:<?=$emailku?>"><i class="icon-mail"></i> <span ><?=$emailku?></span></a></li>
</ul>
</div>

<div class="col-md-2 colorlib-widget">
<h3>Useful Links</h3>
<p>
<ul class="colorlib-footer-links">
<li><a href="index.php">Beranda</a></li>
<li><a href="#">Layanan Klinik</a></li>
<li><a href="#">Tentang Klinik</a></li>
<li><a href="#">Tim Dokter</a></li>
<li><a href="#">Hubungi Kami</a></li>
<?php 
if (trim(!@$_SESSION['id_user'])) {?>
<li><a href="login.php">Masuk</a></li>
<li><a href="daftar.php">Daftar</a></li> 
    <?php
}else{ ?>
    <li><a href="login.php">Dashboard <?=$_SESSION['role']?></a></li>
    <li><a href="logout.php">Keluar</a></li>
<?php
}
?>
</ul>
</p>
</div>
<div class="col-md-6 colorlib-widget">
<h3>Hubungi Kami </h3>
<form class="contact-form" method="POST" >
<div class="form-group" method="POST">
<label for="name" class="sr-only">Name</label>
<input type="name" class="form-control" name="namaPesan" required="" id="nama" placeholder="Masukan Nama Anda">
</div>
<div class="form-group">
<label for="email" class="sr-only">Email</label>
<input type="email" class="form-control" name="emailPesan" required=""  id="email" placeholder="Masukan Email Aktif Anda ">
</div>
<div class="form-group">
<label for="message" class="sr-only">Message</label>
<textarea class="form-control" id="message" name="pesan" required rows="3" placeholder="Tuliskan Pesan Anda ...."></textarea>
</div>
<div class="form-group">
<input type="submit" name="btnpesan" id="btn-submit" class="btn btn-primary btn-send-message btn-md" value="Kirim Pesan">
</div>
</form>
<?php 
  if (isset($_POST['btnpesan'])) {
    $nama = secure($con,$_POST['namaPesan']);
    $email = secure($con,$_POST['emailPesan']);
    $pesan = secure($con,$_POST['pesan']);
    if (empty($nama) || empty($email) || empty($pesan)) {
        $_SESSION['pesan_error'] = "Formulir Hubungi Kami Masih Kosong.";
    }else{
        $input = mysqli_query($con, "INSERT INTO tb_hubungi_kami VALUES(NULL,'$nama','$email','$pesan')");
        if ($input) {
          $_SESSION['pesan_success'] = "Terimakasih Telah Mengirim Kami Pesan, Cek Email Anda.";
        }else{
          $_SESSION['pesan_error'] = "Terjadi Kesalahan Silahkan ulangi.";
        }
    }
  }

 ?>
</div>
</div>
</div>
<div class="row copyright">
<div class="col-md-12 text-center">
<p>
<small class="block">
 <?=date('Y')?> &copy; <?=$nama_web?> ALL RIGHTS RESERVED.
</small>
</p>
</div>
</div>
</footer>
</div>
<div class="gototop js-top">
<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<script src="<?=base_url('base/new/')?>js/jquery.min.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script src="<?=base_url('base/new/')?>js/jquery.easing.1.3.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script src="<?=base_url('base/new/')?>js/bootstrap.min.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script src="<?=base_url('base/new/')?>js/jquery.waypoints.min.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script src="<?=base_url('base/new/')?>js/jquery.stellar.min.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script src="<?=base_url('base/new/')?>js/owl.carousel.min.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script src="<?=base_url('base/new/')?>js/jquery.flexslider-min.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script src="<?=base_url('base/new/')?>js/jquery.countTo.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script src="<?=base_url('base/new/')?>js/jquery.magnific-popup.min.js" type="565bb8047f8f38d487258de8-text/javascript"></script>
<script src="<?=base_url('base/new/')?>js/magnific-popup-options.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script src="<?=base_url('base/new/')?>js/sticky-kit.min.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script src="<?=base_url('base/new/')?>js/main.js" type="565bb8047f8f38d487258de8-text/javascript"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="565bb8047f8f38d487258de8-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="565bb8047f8f38d487258de8-|49" defer=""></script>
<?php 
if (isset($_SESSION['pesan_error'])) { ?>
  <script type="text/javascript">swal("Opps !","<?=$_SESSION['pesan_error'];?>","error");</script>
  <?php
  unset($_SESSION['pesan_error']);
}elseif (isset($_SESSION['pesan_info'])) {?>
  <script type="text/javascript">swal("Info","<?=$_SESSION['pesan_info'];?>","info");</script>
  <?php
  unset($_SESSION['pesan_info']);
}elseif (isset($_SESSION['pesan_success'])) {?>
  <script type="text/javascript">swal("Sukses","<?=$_SESSION['pesan_success'];?>","success");</script>
  <?php
  unset($_SESSION['pesan_success']);
}?>
 <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }

$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html,body').stop().animate({
              scrollTop: target.offset().top,
            }, 500);
            return false;
        }
    });
  </script>
</body>
</html>
