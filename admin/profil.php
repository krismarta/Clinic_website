<?php 
    require_once "header.php";
    $id = $_SESSION['id_user'];
    $query1 = mysqli_query($con,"SELECT * FROM tb_user Where id_user = '$id'");
    $data1 = mysqli_fetch_assoc($query1);
 ?>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8">
                <div class="white-box">
                    <h3 class="box-title">Ubah Informasi Anda</h3><hr>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-12">ID Pasien</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" maxlength="12" name="id_admin" value="<?=$data1['id_user']?>" readonly> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nama Pasien</label>
                            <div class="col-md-12">
                                <input type="text" maxlength="35" class="form-control" name="nama" value="<?=$data1['nama']?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Telepon Pasien</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="12" name="telepon" value="<?=$data1['telepon']?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Tanggal Lahir Pasien</label>
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
                            <label class="col-md-12">Alamat Pasien</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="alamat" value="<?=$data1['alamat']?>" maxlength="100"> </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-12">Foto Pasien</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="foto" > </div>
                        </div>
                        <div class="form-group text-center">
                        <img src="../assets/profil/<?=$data1['foto']?>" width="100" alt="foto profil">    
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-success">Update Data Admin</button>
                        </div>
                    </form>
                      <?php 
                if (isset($_POST['submit'])) {
                    $id = secure($con,$_POST['id_admin']);
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
                                        $_SESSION['pesan_success'] = "Berhasil Merubah Data Admin.";
                                        ?><script>
                                              window.location.href = "<?=base_url('logout.php');?>";
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
            <div class="col-md-4">
                <div class="white-box">
                    <h3 class="box-title">Ubah Password Anda</h3><hr>
                                        <form class="form-horizontal" method="POST">
                        <div class="form-group">
                            <label class="col-md-12">Password Baru</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" maxlength="20" name="password" placeholder="Masukan Password Baru"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Ulangi password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" maxlength="20" name="ulangPass" placeholder="Ulangi Password Baru"> </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-warning">Ubah Password</button>
                        </div>
                    </form>
                    <?php 
                        if (isset($_POST['submit'])) {
                            $passbaru = secure($con,$_POST['password']);
                            $ulangpass = secure($con,$_POST['ulangPass']);;
                            $stmt = $con->prepare("SELECT * FROM tb_user WHERE id_user= ?");
                            $stmt->bind_param("s",$_SESSION['id_user']);
                            $stmt->execute();
                            $stmt->store_result();
                            if ($stmt->num_rows > 0) {
                                if (empty($passbaru) || empty($ulangpass)) {
                                    $_SESSION['pesan_error'] = "Formulir Masih Kosong";
                                }else{
                                    if ($passbaru != $ulangpass) {
                                        $_SESSION['pesan_error'] = "Password Tidak Sama ";
                                    }else{
                                        $uuid = uniqid('',true);
                                        $salt = sha1(rand());
                                        $salt = substr($salt,0,10);
                                        $encrypted = base64_encode(sha1($passbaru . $salt,true) . $salt);
                                        $hash = array("salt" => $salt , "encrypted" => $encrypted);
                                        $encrypted_password = $hash["encrypted"];
                                        $salt = $hash['salt'];                         
                                        $stmt = $con->prepare("UPDATE tb_user SET password = '$encrypted_password' , salt = '$salt' WHERE id_user = '$_SESSION[id_user]'");
                                        $result = $stmt->execute();
                                        if ($result) {
                                             $stmt = $con->prepare("SELECT * FROM tb_user WHERE id_user = ?");
                                             $stmt->bind_param("s", $_SESSION['id_user']);
                                             $stmt->execute();
                                             $user = $stmt->get_result()->fetch_assoc();
                                             if ($user != FALSE) {
                                                $_SESSION['pesan_success'] = "Berhasil Merubah Password, Silahkan masuk Ulang";
                                                session_destroy();                         
                                             }else{
                                                $_SESSION['pesan_error'] = "Terjadi Kesalahan ... ";
                                             }
                                        }else{
                                            $_SESSION['pesan_error'] = "Terjadi Kesalahan ... ";
                                        }
                                    }
                                }
                            }else{
                                $stmt->close();
                                $_SESSION['pesan_error'] = "Terjadi Kesalahan ... ";
                            }
                        }
                     ?>
                </div>
            </div>
        </div>
    </div>
<?php 
    require_once "footer.php";
 ?>
