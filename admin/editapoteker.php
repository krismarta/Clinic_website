<?php 
    require_once "header.php";
    $id = secure($con,$_GET['id']);
    $query1 = mysqli_query($con,"SELECT * FROM tb_user Where id_user = '$id'");
    $data1 = mysqli_fetch_assoc($query1);
 ?>
    <div class="col-md-6 col-md-offset-3">
        <div class="white-box">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-12">ID Apoteker</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" maxlength="12" name="id_apoteker" value="<?=$data1['id_user']?>" readonly> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Nama Apoteker</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" maxlength="35" name="nama" value="<?=$data1['nama']?>"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Telepon Apoteker</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="12" name="telepon" value="<?=$data1['telepon']?>"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Tanggal Lahir Apoteker</label>
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
                    <label class="col-md-12">Alamat Apoteker</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" maxlength="100" name="alamat" value="<?=$data1['alamat']?>"> </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-12">Foto Apoteker</label>
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="foto" > </div>
                </div>
                <div class="form-group text-center">
                <img src="../assets/profil/<?=$data1['foto']?>" width="100" alt="foto profil">    
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info btn-block btn-lg">Update Data Apoteker</button>
                </div>
            </form>
            <?php 
                if (isset($_POST['submit'])) {
                    $id = secure($con,$_POST['id_apoteker']);
                    $nama = secure($con,$_POST['nama']);
                    $telepon = secure($con,$_POST['telepon']);
                    $lahir = secure($con,$_POST['lahir']);
                    $gender = secure($con,$_POST['gender']);
                    $alamat = secure($con,$_POST['alamat']);
                    $foto = $_FILES['foto']['name'];
                    $tmp_foto = $_FILES['foto']['tmp_name'];
                    $ukuran = $_FILES['foto']['size'];
                    
                    $ex_bole = array('jpg','png');
                    $x = explode('.',$foto);
                    $ex = strtolower(end($x));
                    if (empty($id) || empty($nama) || empty($telepon) || empty($lahir) || empty($gender) ||  empty($alamat)  || empty($foto)) {
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
                                    if ($query) {
                                        move_uploaded_file($tmp_foto, '../assets/profil/'.$nama_baru);
                                        unlink($folder);
                                        echo("<meta http-equiv='refresh' content='1'>");
                                        $_SESSION['pesan_success'] = "Berhasil Merubah Data Apoteker.";
                                        ?><script>
                                              window.location.href = "<?=base_url('admin/apoteker.php');?>";
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
