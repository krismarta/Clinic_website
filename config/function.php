<?php 
require_once "koneksi.php";
function base_url($url = null){
    $base_url = "http://localhost/klinik";
    if ($url != null) {
        return $base_url."/".$url;
    }else{
        return $base_url;
    }
}
function unique_id($panjang,$prefix){
     $karakter = '1234567890';   
  $string = '';   
  for($i = 0; $i < $panjang; $i++) {   
   $pos = rand(0, strlen($karakter)-1);   
   $string .= $karakter{$pos};   
    }
    return $prefix."-".$string;
}
function secure($con,$get){
    $secure = addslashes(htmlspecialchars(mysqli_real_escape_string($con,trim($get))));
    return $secure;
}
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function tanggalFormat($tanggal){
   $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
   $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function timeFormat($time){ 
  $pecah = explode(':',$time);
  return $pecah['0'] . ':' . $pecah[1];
}
// function token(){
//     $token = base64_encode(openssl_random_pseudo_bytes(25));
//     return $token;
// }

function nourut($con){
  $cek = mysqli_query($con,"SELECT no_antrian FROM tb_pesanan");
  $data = mysqli_fetch_assoc($cek);
  if (mysqli_num_rows($cek) > 0) {
    $nourut = $data['no_antrian'];
    ++$nourut;
  }else{
    $nourut = 0;
  }
    return $nourut;
}
function hitung_umur($tanggal_lahir) {
    list($year,$month,$day) = explode("-",$tanggal_lahir);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($month_diff < 0) $year_diff--;
        elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
    return $year_diff;
}
 ?>


