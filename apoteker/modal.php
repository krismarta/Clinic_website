<?php 
require_once "../config/function.php";
    $op = isset($_GET['op'])?$_GET['op']:null;

    if ($op == "hapusObat") {
        $id= secure($con,$_POST['id']);
        $cek = mysqli_query($con,"SELECT * FROM tb_obat_db WHERE id_obat='$id'");
        if (mysqli_num_rows($cek) > 0) {
            $query = mysqli_query($con,"DELETE FROM tb_obat_db WHERE id_obat = '$id'");
            if ($query) {
                $response['status'] = 'success';
                $response['message'] = 'Berhasil Mengahapus Obat';
                echo json_encode($response);
            }else{
                $response['status'] = 'error';
                $response['message'] = 'Oops Ada yang salah.';
                echo json_encode($response);
            }
        }else{
            $response['status'] = 'error';
            $response['message'] = 'Obat Tidak Ditemukan';
            echo json_encode($response);
        }
    }elseif ($op == "editObat") {
        $id = secure($con,$_POST['id']);
        $query = mysqli_query($con,"SELECT * FROM tb_obat_db WHERE id_obat='$id'");
        $d = mysqli_fetch_assoc($query); ?>
        <form  class="form-horizontal" action="modal.php?op=aksiEditO" method="POST">
            <div class="form-group">
                <label class="col-md-12">ID Obat</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" maxlength="12" name="id" value="<?=$d['id_obat']?>" readonly> </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Nama Obat</label>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="nama" maxlength="50" value="<?=$d['nama_obat']?>"> </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Jenis Obat</label>
                <div class="col-md-12">
                    <select class="form-control" name="jenis_obat">
                        <option value="">Pilih Jenis Obat</option>
                       <?php 
                       if ($d['jenis_obat'] == "Sirup") {
                           echo '<option value="Sirup" selected>Sirup</option>
                               <option value="Tablet">Tablet</option>
                               <option value="Kaplet">Kaplet</option>';
                       }elseif ($d['jenis_obat'] == "Tablet") {
                           echo '<option value="Sirup" >Sirup</option>
                               <option value="Tablet" selected>Tablet</option>
                               <option value="Kaplet">Kaplet</option>';
                       }elseif ($d['jenis_obat'] == "Kaplet") {
                           echo '<option value="Sirup" >Sirup</option>
                               <option value="Tablet">Tablet</option>
                               <option value="Kaplet" selected>Kaplet</option>';
                       }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Stok Obat</label>
                <div class="col-md-12">
                    <input type="text" class="form-control"  onkeypress="return hanyaAngka(event)" name="stok" value="<?=$d['stok']?>"> </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success pull-right" name="btnEditObat" value="Ubah Data" > </div>
            </div>
        </form>    
<?php
       
    }elseif ($op == "aksiEditO") {
         if (isset($_POST['btnEditObat'])) {
            $id = secure($con,$_POST['id']);
            $nama = secure($con,$_POST['nama']);
            $stok = secure($con,$_POST['stok']);
            $jenis = secure($con,$_POST['jenis_obat']);
             if (empty($nama) || empty($stok) || empty($id) || empty($jenis) ){
                echo '<div class="alert alert-danger" role="alert">
                         Formulir Masih Kosong, Coba Lagi
                        </div>';
            }else{
                $cek = mysqli_query($con,"SELECT * FROM tb_obat_db WHERE nama_obat ='$nama'");
                if (mysqli_num_rows($cek) > 0) {
                    $quer = mysqli_query($con,"UPDATE tb_obat_db SET nama_obat='$nama', stok='$stok',jenis_obat = '$jenis' WHERE id_obat = '$id'");
                    if ($quer) {
                        echo '<div class="alert alert-success" role="alert">
                             Berhasil Mengubah Obat.
                            </div> ';
                            
                            header("Location:kelola.php");
                        
                            
                    }else {
                        echo '<div class="alert alert-danger" role="alert">
                             Terjadi Kesalahan, Coba Lagi
                            </div>';
                    }
                }else{
                    
                    echo '<div class="alert salert-danger" role="alert">
                         Sudah Tersedia, Coba Lagi
                        </div>';
                }
            }
        }
    }elseif ($op == "lihatData") {
      $id = secure($con,$_POST['id']);
            $sql = mysqli_query($con,"SELECT * FROM tb_pesanan WHERE id_booking = '$id'");
            if (mysqli_num_rows($sql) > 0) {
            $d = mysqli_fetch_assoc($sql); 
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
            ?>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Informasi Pasien</span></a></li>
                <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Informasi Umum</span></a></li>
                <li role="presentation" class=""><a href="#obat" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Informasi Obat Anda</span></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="table-responsive">
                    <table class="table color-table info-table">
                        <thead>
                            <tr>
                                <th width="150">ID Pasien</th>
                                <td>
                                    <?php 
                                        $q = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user = '$id_pasien'");
                                        $y = mysqli_fetch_assoc($q);
                                        echo $y['id_user'];
                                     ?>

                                </td>
                            </tr>
                            <tr>
                                <th width="150">Nama Pasien</th>
                                <td><?=$y['nama']?></td>
                            </tr>
                            <tr>
                                <th width="150">Jenis Kelamin</th>
                                <td><?=$y['jenis_kelamin']?></td>
                            </tr>
                            <tr>
                                <th width="150">Telepon</th>
                                <td><?=$y['telepon']?></td>
                            </tr>
                            <tr>
                                <th width="150">Alamat</th>
                                <td><?=$y['alamat']?></td>
                            </tr>
                            <tr>
                                <th width="150">Umur</th>
                                <td><?=hitung_umur($y['tanggal_lahir'])?> Tahun</td>
                            </tr>
                            <tr>
                                <th width="150">Tanggal Lahir</th>
                                <td><?=tanggalFormat($y['tanggal_lahir'])?></td>
                            </tr>

                        </thead>
                    </table>
                </div><br>
                    <div class="text-center"><button class="text-center btn btn-danger btnCancel" data-id="<?=$id_booking?>">Batalkan Bookingan User</button></div> 
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                         <div class="table-responsive">
                    <table class="table color-table warning-table">
                        <thead>
                            <tr>
                                <th width="150">ID Booking</th>
                                <td><?=$id_booking?></td>
                            </tr>
                            <tr>
                                <th width="150">Nama Dokter</th>
                                <td>
                                    <?php 
                                        $z = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user = '$id_dokter'");
                                        $x = mysqli_fetch_assoc($z); 
                                        echo $x['nama'];
                                        $o = mysqli_query($con,"SELECT * FROM tb_jadwal_dokter WHERE id_dokter = '$id_dokter'");
                                        $i = mysqli_fetch_assoc($o);
                                       
                                     ?>

                                </td>
                            </tr>
                            <tr>
                                <th width="150">Jadwal Dokter</th>
                                <td><?=tanggalFormat($i['tanggal']) . " | " . timeFormat($i['jam_mulai']) . " | " . timeFormat($i['jam_selesai']) ?></td>
                            </tr>
                            <tr>
                                <th width="150">No Antrian</th>
                                <td><?=$no_antrian?></td>
                            </tr>
                            <tr>
                                <th width="150">Keluhan</th>
                                <td>
                                    <?=$keluhan?>
                                </td>
                            </tr>
                            <tr>
                                <th width="150">Diagnosa</th>
                                <td>
                                    <?php 
                                        if ($diagnosa == "") {
                                            echo 'Diagnosa Belum Diberikan Dokter';
                                        }else{
                                            echo $diagnosa;
                                        }
                                     ?>
                                </td>
                            </tr>
                            <tr>
                                <th width="150">Waktu Selesai Periksa</th>
                                <td>
                                    <?php 
                                        if ($waktu_periksa == "") {
                                            echo 'Belum Diperiksa';
                                        }else{
                                            echo $waktu_periksa;
                                        }
                                     ?>
                                </td>
                            </tr>
                            <tr>
                                <th width="150">Waktu Datang</th>
                                <td>
                                    <?php 
                                        if ($waktu_datang == "") {
                                            echo 'Pasien Belum Datang';
                                        }else{
                                            echo $waktu_datang;
                                        }
                                     ?>
                                    </td>
                            </tr>
                            <tr>
                                <th width="150">Status</th>
                                <td><?php echo "<div class='label label-lg label-info'>" . $status. "</div>";?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="obat">
                    <div class="text-center">
                        <h3 class="box-title">Berikut Adalah Obat yang Anda Butuhkan</h3>
                    </div>
                    <div class="col-md-12">
                        <ul class="list-group">
                            <?php 
                            $ambil = mysqli_query($con,"SELECT * FROM tb_obat_pasien WHERE id_booking ='$id_booking'");
                            while ($d = mysqli_fetch_assoc($ambil)) { ?>
                                <li class="list-group-item"><?=$d['nama_obat']?></li>
                            <?php    
                            }
                             ?>
                        </ul>
                        <div class="text-center">
                            <button class="btn btn-success waves-effect waves-light btnSelesai" type="button" data-id="<?=$id_booking?>"><span class="btn-label"><i class="fa fa-check"></i></span>Selesai</button>
                    </div>


                </div>

            </div>
           

        <?php
    }
}elseif ($op == "selesaikanPasien") {
  $id = secure($con,$_POST['id']);
  $sql = mysqli_query($con,"SELECT  * FROM tb_pesanan WHERE id_booking ='$id'");
  if (mysqli_num_rows($sql)  > 0) {
      $selesai = mysqli_query($con,"UPDATE tb_pesanan SET status='Selesai' WHERE id_booking = '$id'");
      if ($selesai) {
            $response['status'] = 'success';
            $response['message'] = 'Pasien Telah Selesai';
            echo json_encode($response);
        }else{
            $response['status'] = 'error';
            $response['message'] = 'Oops Ada yang salah.';
            echo json_encode($response);
        }
  }else{
    header("location:index.php");
  }
}

 ?>
