<?php 
require_once "header.php";
if (trim(@$_SESSION['id_user']) && trim(@$_SESSION['role']) == "Admin") {
    echo "<script>window.location='".base_url('admin')."'</script>";
}elseif (trim(@$_SESSION['id_user']) && trim(@$_SESSION['role']) == "Pasien") {
    echo "<script>window.location='".base_url('pasien')."'</script>";
}elseif (trim(@$_SESSION['id_user']) && trim(@$_SESSION['role']) == "Dokter") {
    echo "<script>window.location='".base_url('dokter')."'</script>";
}elseif (trim(@$_SESSION['id_user']) && trim(@$_SESSION['role']) == "Apoteker") {
    echo "<script>window.location='".base_url('apoteker')."'</script>";
}else{ 
?>

    <div id="colorlib-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 align="center">Area Pendaftaran</h2><hr>
                            <form method="POST">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="id">ID Anda (Otomatis)</label>
                                        <input type="text" id="id" class="form-control" readonly maxlength="12"  name="id_user" value="<?=unique_id(6,"P")?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nama">Nama Lengkap Anda</label>
                                        <input type="text" id="nama" autofocus="" class="form-control" maxlength="35" name="nama_user" placeholder="Masukan Nama Lengkap Anda">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="telepon">No Telepon Anda</label>
                                        <input type="text" onkeypress="return hanyaAngka(event)" maxlength="12" id="telepon" name="telepon_user" class="form-control" placeholder="Masukan Telepon Anda">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggal_lahir">Tanggal Lahir Anda</label>
                                        <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir Anda">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="kelamin">Jenis Kelamin Anda</label>
                                        <select name="jenis_kelamin" id="kelamin" class="form-control">
                                            <option value="">Pilih Jenis Kelamin<em> *</em></option>
                                            <option value="Laki-Laki" >Laki-Laki </option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="alamat">Alamat Anda</label>
                                        <input type="text" maxlength="100" id="alamat" class="form-control" name="alamat_user" placeholder="Masukan Alamat Anda">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="passowrd_user">Password Anda</label>
                                        <input type="password" maxlength="20" id="passowrd_user" class="form-control" name="passowrd_user" placeholder="Masukan Password Anda">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ulangi_password">Ulangi Password Anda</label>
                                        <input type="password" maxlength="20" id="ulangi_password" class="form-control" name="ulangi_password" placeholder="Masukan Password Anda">
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <input type="submit" name="submitDaftar" value="Daftar Sebagai Pasien" class="btn btn-warning">
                                </div>

            <?php 
                if (isset($_POST['submitDaftar'])) {
                    $id = secure($con,$_POST['id_user']);
                    $nama = secure($con,$_POST['nama_user']);
                    $telepon = secure($con,$_POST['telepon_user']);
                    $tanggal_lahir = secure($con,$_POST['tanggal_lahir']);
                    $jenis_kelamin = secure($con,$_POST['jenis_kelamin']);
                    $alamat = secure($con,$_POST['alamat_user']);
                    $password = secure($con,$_POST['passowrd_user']);
                    $ulangi_password = secure($con,$_POST['ulangi_password']);
                    if ($jenis_kelamin == "Laki-Laki") {
                        $foto = "boy.png";
                    }elseif ($jenis_kelamin == "Perempuan") {
                        $foto = "girl.png";
                    }

                    if (empty($id) || empty($nama) || empty($telepon) || empty($jenis_kelamin) || empty($alamat) || empty($password) || empty($ulangi_password) || empty($tanggal_lahir) ) {
                       echo '<div class="alert alert-danger">
                              <strong>Perhatian </strong>Silahkan Lengkapkan Formulir Diatas. 
                            </div>'; 
                    }else{
                        $cekID = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user = '$id'");
                        if (mysqli_num_rows($cekID) > 0) {
                             echo '<div class="alert alert-danger">
                              <strong>Kesalahan! </strong>Silahkan Refresh Page. 
                            </div>';                         
                        }else{
                            if ($password != $ulangi_password) {
                                echo '<div class="alert alert-danger">
                              <strong>Kesalahan! </strong>Passowrd Tidak Sama. 
                            </div>'; 
                            }else{
                                $salt = sha1(rand());
                                $salt = substr($salt,0, 10);
                                $enkripsiPass = base64_encode(sha1($password . $salt,true). $salt);
                                $hash = array("salt" => $salt, "enkripsiPass" => $enkripsiPass);
                                $passwordEnkrip = $hash['enkripsiPass'];
                                $salt = $hash['salt'];
                                $role = "Pasien";
                                $stmt = $con->prepare("INSERT INTO tb_user(id_user,nama,jenis_kelamin,tanggal_lahir,password,salt,telepon,alamat,role,foto) VALUES(?,?,?,?,?,?,?,?,?,?) ");
                                $stmt->bind_param("ssssssssss", $id,$nama,$jenis_kelamin,$tanggal_lahir,$passwordEnkrip,$salt,$telepon,$alamat,$role,$foto);
                                $result = $stmt->execute();
                                if ($result) {
                                    echo '<div class="alert alert-success">
                                          <strong>Berhasil! </strong> ID PASIEN ANDA : <strong>' . $id. '</strong> Harap Selalu Diingat. 
                                        </div>'; 
                                }else{
                                    echo '<div class="alert alert-danger">
                                          <strong>Kesalahan! </strong>Gagal Mendaftar Silahkan Coba Lagi. 
                                        </div>'; 
                                }
                            }
                        }
                    }

                }
             ?>
                            </form>
                            <hr>
                            <div class="text-center ">
                                <span class="paragraph-small">Sudah Punya Akun?</span>
                                <a href="login.php" class="">Login Sebagai Pasien</a>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>

<?php 
}
    require_once "footer.php";
 ?>
