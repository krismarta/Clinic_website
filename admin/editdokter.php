<?php 
    require_once "header.php";
    $id = secure($con,$_GET['id']);
    $query1 = mysqli_query($con,"SELECT * FROM tb_user Where id_user = '$id'");
    $query2 = mysqli_query($con,"SELECT jenis_dokter FROM tb_jenis_dokter WHERE id_dokter = '$id'");
    $data1 = mysqli_fetch_assoc($query1);
    $data2 = mysqli_fetch_assoc($query2);
 ?>
    <div class="col-md-6 col-md-offset-3">
        <div class="white-box">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-12">ID Dokter</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="id_dokter" maxlength="12" value="<?=$data1['id_user']?>" readonly> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Nama Dokter</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" maxlength="35" name="nama" value="<?=$data1['nama']?>"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Telepon Dokter</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="12" name="telepon" value="<?=$data1['telepon']?>"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Tanggal Lahir Dokter</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="lahir"  value="<?=$data1['tanggal_lahir']?>"> </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Jenis Kelamin</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="gender">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" <?php if($data1['jenis_kelamin']=="Laki-Laki") echo 'selected="selected"'; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if($data1['jenis_kelamin']=="Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Jenis Dokter</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="jenisdokter">
                            <option value="">Pilih Jenis Dokter</option>
                            <option value="Dokter Umum" <?php if($data2['jenis_dokter']=="Dokter Umum") echo 'selected="selected"'; ?>>Dokter Umum</option>
                            <option value="Dokter Gigi" <?php if($data2['jenis_dokter']=="Dokter Gigi") echo 'selected="selected"'; ?>>Dokter Gigi</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Alamat Dokter</label>
                    <div class="col-md-12">
                        <input type="text" maxlength="100" class="form-control" name="alamat" value="<?=$data1['alamat']?>"> </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-12">Foto Dokter</label>
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="foto" > </div>
                </div>
                <div class="form-group text-center">
                <img src="../assets/profil/<?=$data1['foto']?>" width="100" alt="foto profil">    
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info btn-block btn-lg">Update Data Dokter</button>
                </div>
            </form>
            <?php 
                if (isset($_POST['submit'])) {
                    $id = secure($con,$_POST['id_dokter']);
                    $nama = secure($con,$_POST['nama']);
                    $telepon = secure($con,$_POST['telepon']);
                    $lahir = secure($con,$_POST['lahir']);
                    $gender = secure($con,$_POST['gender']);
                    $jenisdokter = secure($con,$_POST['jenisdokter']);
                    $alamat = secure($con,$_POST['alamat']);

                    $foto = $_FILES['foto']['name'];
                    $tmp_foto = $_FILES['foto']['tmp_name'];
                    $ukuran = $_FILES['foto']['size'];
                    
                    $ex_bole = array('jpg','png');
                    $x = explode('.',$foto);
                    $ex = strtolower(end($x));
                    if (empty($id) || empty($nama) || empty($telepon) || empty($lahir) || empty($gender) || empty($jenisdokter) || empty($alamat)  || empty($foto)) {
                        $_SESSION['pesan_error'] = "Formulir Masih Kosong.";
                    }else{
                        $cekID = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user = '$id'");
                        if (mysqli_num_rows($cekID) > 0) {
                            $ambil = mysqli_fetch_assoc($cekID);
                            $folder = "../assets/profil/".$ambil['foto'];
                           if (in_array($ex, $ex_bole) == true) {
                                if ($ukuran < 2*MB) {
                                    $temp = explode(".", $foto);
                                    $nama_baru = round(microtime(true)) . '.' . end($temp);
                                    $query = mysqli_query($con,"UPDATE tb_user SET nama = '$nama', telepon = '$telepon', tanggal_lahir='$lahir', jenis_kelamin = '$gender',alamat = '$alamat', foto = '$nama_baru' WHERE id_user = '$id' ");
                                    $query1 = mysqli_query($con,"UPDATE tb_jenis_dokter SET  jenis_dokter = '$jenisdokter' WHERE id_dokter = '$id'");
                                    if ($query && $query1) {
                                        move_uploaded_file($tmp_foto, '../assets/profil/'.$nama_baru);
                                        unlink($folder);
                                        echo("<meta http-equiv='refresh' content='1'>");
                                        $_SESSION['pesan_success'] = "Berhasil Merubah Data Dokter.";
                                        ?><script>
                                              window.location.href = "<?=base_url('admin/dokter.php');?>";
                                          </script>
                                        <?php
                                    }else{
                                        $_SESSION['pesan_error'] = "Terjadi Kesalahan..";
                                    }
                                }else{
                                    $_SESSION['pesan_error'] = "Ukuran Foto tidak boleh lebih dari 2MB";
                                
                                }
                            }else{
                                $_SESSION['pesan_error'] = "Ekstensi Foto Tidak Diizinkan. ";
                              
                            }                  
                        }else{
                            $_SESSION['pesan_error'] = "Silahkan Refresh Ulang.";   
                        
                        }
                    }
                }
             ?>
        </div>
    </div>
<?php 
    require_once "footer.php";
 ?>
