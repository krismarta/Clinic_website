<?php 
require_once "header.php";
    $id= secure($con,$_GET['id']);
    $now = date('Y-m-d H:m:s');
    $cek = mysqli_query($con,"SELECT * FROM tb_pesanan WHERE id_booking = '$id' AND status='Sedang Diperiksa'");
    if (mysqli_num_rows($cek) > 0) {  
        $d = mysqli_fetch_assoc($cek);
        $id_booking = $d['id_booking'];
        $id_pasien = $d['id_pasien'];
        $id_dokter = $d['id_dokter'];
        $id_jadwal = $d['id_jadwal'];
        $no_antrian = $d['no_antrian'];
        $keluhan = $d['keluhan'];
        $diagnosa = $d['diagnosa'];
        $waktu_periksa = $d['waktu_periksa'];
        $waktu_datang = $d['waktu_datang'];
        $status = $d['status'];
        $cari = mysqli_query($con,"SELECT * FROM tb_user where id_user ='$id_pasien'");
        $ds = mysqli_fetch_assoc($cari);
    
 ?>
 <div class="col-md-12">
    <form action="" class="form-horizontal" method="POST">
        <div class="white-box">
            <h3 class="box-title text-primary text-center">ISI HASIL PEMERIKSAAN PASIEN BERNAMA  :  <?=$ds['id_user'] . " | " . $ds['nama']?></h3>
        </div>
     <div class="col-md-4">
        <div class="white-box">
            <div class="form-group">
                <label class="col-md-12">Tulisakan Diagnosa Dokter</label>
                <div class="col-md-12">
                    <textarea name="diagnosa" class="form-control" cols="50" rows="9" placeholder="Tulisakan Hasil Diagnosa Dokter Setelah Pemeriksaan"></textarea>
                </div>
            </div>
        </div>
         
     </div>
     <div class="col-md-8">
         <div class="white-box">
            <h3 class="box-title">Tekan CTRL Dan Pilih Obat yang Cocok untuk Pasien</h3>
             <select  multiple='multiple' size=10 class="form-control" name="obatPasien[]">
                <?php 
                    $ambil = mysqli_query($con,"SELECT * FROM tb_obat_db");
                    while ($d= mysqli_fetch_assoc($ambil)) {?>
                        <option value="<?=$d['nama_obat']?>"><?=$d['nama_obat']?> | <?=$d['stok']?>  |  <?=$d['jenis_obat']?></option>
                    <?php    
                    }
                 ?>
            </select>
         </div>
     </div>
     <button type="submit" name="btnDiag" class="btn btn-success btn-block btn-lg">Kirim Diagnosa</button>
     </form><br>

 </div>
 <?php 
    if (isset($_POST['btnDiag'])) {
        $obat = $_POST['obatPasien'];
        $now = date('Y-m-d H:i:s');
        $diagnosa = $_POST['diagnosa'];
        $update= mysqli_query($con,"UPDATE tb_pesanan SET diagnosa = '$diagnosa' , waktu_periksa = '$now',status= 'Ambil Obat' WHERE id_booking = '$id'");
        if ($update) {
            foreach ($obat as $i) {
                mysqli_query($con,"INSERT INTO tb_obat_pasien VALUES(NULL,'$id','$i')");
            }
            echo("<meta http-equiv='refresh' content='1'>");
            $_SESSION['pesan_success'] = "Berhasil Memberikan Diagnosa Kepada Pasien";
            
        }else{
            echo 'GAGAL';
        }
        
    }

}else{
    echo'<script>window.location="periksa.php"</script>';
}


require_once "footer.php";
 ?>
