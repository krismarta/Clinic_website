<?php
    date_default_timezone_set("Asia/Jakarta");
    date_default_timezone_get();

    @session_start();
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'klinik';
    define('KB',1024);
    define('MB',1048576);
    define('GB',1073741824);
    $con = mysqli_connect($host,$user,$pass,$db) or die('Periksa Status Koneksi Database : ERROR 404');

 ?>
