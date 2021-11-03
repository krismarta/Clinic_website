<?php 
    require_once "../config/function.php";

    $aksi = secure($con,$_GET['q']);
    if ($aksi == "querycari") {
        $id = secure($con,$_GET['id']);
        $query = mysqli_query($con,"SELECT DISTINCT DATE_FORMAT(tanggal, '%d %M %Y') AS tgl,jam_mulai,jam_selesai,id_dokter,id_jadwal FROM tb_jadwal_dokter WHERE id_dokter = '$id' ORDER BY tanggal ASC, jam_mulai ASC ");
        echo '<option value="">Pilih Jadwal Dokter</option>';

        while ($d = mysqli_fetch_assoc($query)) {
            echo '<option value="'.$d['id_jadwal'] . '">' .  $d['tgl'] . " | " . $d['jam_mulai']. ' | '. $d['jam_selesai']. '</option>';
        }
    }
 ?>
