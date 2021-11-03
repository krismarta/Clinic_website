<?php 
    require_once "header.php";
 ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="white-box">
                <h3 class="box-title text-center "><strong>Isi Semua Informasi Untuk Membuat Janji</strong></h3><hr>
                <form action="" class="form-horizontal" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6 ">
                                <h4 class="text-center text-info"><strong>Informasi Anda</strong> </h4><hr>
                                <div class="form-group">
                                    <label class="col-md-12" >Nama Anda :</label>
                                    <div class="col-md-12">
                                        <input type="hidden" class="form-control" name="id_user" value="<?=$_SESSION['id_user']?>" readonly> 
                                        <input type="text" class="form-control" placeholder="<?=$_SESSION['nama']?>" disabled> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" >Jenis Kelamin Anda :</label>
                                    <div class="col-md-12">
                                        <select class="form-control" disabled="">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki" <?php if($_SESSION['jenis_kelamin']=="Laki-Laki") echo 'selected="selected"'; ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?php if($_SESSION['jenis_kelamin']=="Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" >Telepon Anda :</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="<?=$_SESSION['telepon']?>" disabled> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" >Alamat Anda :</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="<?=$_SESSION['alamat']?>" disabled> </div>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <h4 class="text-center text-info" ><strong>Informasi Pemesanan</strong></h4><hr>
                                <div class="form-group">
                                    <label class="col-md-12" >Pilih Nama Dokter</label>
                                    <div class="col-md-12">
                                        <select name="id_dokter" class="form-control" onchange="ajaxJadwal(this.value)">
                                            <option value="">Pilih Dokter</option>
                                            <?php 
                                                $select = mysqli_query($con,"SELECT * FROM tb_user WHERE role = 'Dokter' ");
                                                if (mysqli_num_rows($select) > 0) {
                                                    while ($d = mysqli_fetch_assoc($select) ){
                                                        echo '<option value="'.$d['id_user'] . '">' .  $d['id_user'] . " | " . $d['nama']. '</option>';
                                                    }
                                                }else{
                                                    echo '<option value="">Tidak Ada Dokter</option>';
                                                }
                                             ?>
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" >Jadwal Dokter :</label>
                                    <div class="col-md-12">
                                        <select name="id_jadwal" class="form-control" id="jadwalDokter" onchange="">
                                            <option value="">Pilih Jadwal Dokter</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" > Ceritakan Keluhan Anda :</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" name="keluhan" cols="60" placeholder="Tulis Keluhan Kamu disini..." class="form-control"></textarea>  
                                    </div>
                                </div>
                                
                            </div> 

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <h5 class="text-danger"><strong>*Note : Pastikan Data Anda Benar, Jika ada yang salah silahkan perbaiki di menu ubah profile.</strong></h3>
                                    <input type="submit" name="btnJanji" class="btn btn-info btn-block" value="Buat Janji"> 
                                    <input type="reset" class="btn btn-warning btn-block" value="Reset"> 
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                <?php 
                    if (isset($_POST['btnJanji'])) {
                        $id_booking = unique_id(5,"BO");
                        $id_user = secure($con,$_POST['id_user']);
                        $id_dokter = secure($con,$_POST['id_dokter']);
                        $id_jadwal = secure($con,$_POST['id_jadwal']);
                        $keluhan = secure($con,$_POST['keluhan']);
                        $status = "Menunggu";
                        if (empty($id_user) || empty($id_dokter) || empty($id_jadwal)  || empty($keluhan)) {
                            echo '<div class="alert alert-danger" role="alert">
                                 Formulir belum lengkap, ulangi kembali.
                                </div>';
                        }else{
                            $cekID = mysqli_query($con,"SELECT * FROM tb_pesanan WHERE id_booking = '$id_booking'");
                            if (mysqli_num_rows($cekID) > 0 ) {
                                echo '<div class="alert alert-danger" role="alert">
                                     Terjadi Kesalahan, Ulangi Halaman.
                                    </div>';
                            }else{
                                $query = mysqli_query($con,"INSERT INTO tb_pesanan(id_booking,id_pasien,id_dokter,id_jadwal,keluhan,status) VALUES('$id_booking','$id_user','$id_dokter','$id_jadwal','$keluhan','$status')");
                                if ($query) {
                                     echo '<div class="alert alert-success" role="alert">
                                     SELAMAT ! Berhasil Melakukan Pendaftaran Online. <br> <strong class="text-danger">*Catat ID BOOKING : ' . $id_booking . '</strong><br> Silahkan Datang Untuk Mendapatkan No Antrian.
                                    </div>';
                                    $_SESSION['pesan_success'] = "SELAMAT ! Berhasil Melakukan Pendaftaran Online.*Catat ID BOOKING : ' . $id_booking . 'Silahkan Datang Untuk Mendapatkan No Antrian.";
                                }else{
                                     echo '<div class="alert alert-danger" role="alert">
                                     Data Tidak Diterima, Ulangi Beberapa Saat Lagi.
                                    </div>';
                                }
                            }
                        }
                    }

                 ?>
            </div>
        </div>
    </div>

<?php 
    require_once "footer.php";
 ?>
