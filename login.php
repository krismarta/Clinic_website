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
                        <div class="col-md-4 col-md-offset-4">
                            <h2 align="center">Login Area</h2><hr>
                            <form method="POST">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="id">ID Anda</label>
                                        <input type="text" id="id" class="form-control" name="id_user" placeholder="Masukan ID Anda">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="password">Password Anda</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Masukan Password Anda">
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <input type="submit" name="submitLogin" value="Login Dashboard" class="btn btn-success">
                                </div>

                                <?php 
                    if (isset($_POST['submitLogin'])) {
                        $id = secure($con,$_POST['id_user']);
                        $password = secure($con,$_POST['password']);
                        if (empty($id) || empty($password)) {
                            $_SESSION['pesan_error'] = "Formulir Tidak Boleh Kosong";                      
                        }else{
                            $stmt = $con->prepare("SELECT * FROM tb_user WHERE id_user = ? ");
                            $stmt->bind_param("s",$id);
                            if ($stmt->execute()) {
                                $user = $stmt->get_result()->fetch_assoc();
                                $salt = $user['salt'];
                                $passwordDB = $user['password'];
                                $hash = base64_encode(sha1($password . $salt, true).$salt);
                                if ($hash == $passwordDB) {
                                    if ($user != FALSE) {
                                        $_SESSION['id_user'] = $user['id_user'];
                                        $_SESSION['nama'] = $user['nama'];
                                        $_SESSION['jenis_kelamin'] = $user['jenis_kelamin'];
                                        $_SESSION['tanggal_lahir'] = $user['tanggal_lahir'];
                                        $_SESSION['telepon'] = $user['telepon'];
                                        $_SESSION['alamat'] = $user['alamat'];
                                        $_SESSION['role'] = $user['role'];
                                        $_SESSION['foto'] = $user['foto'];
                                    }
                                        if ($_SESSION['role'] == "Pasien") {
                                            $_SESSION['pesan_success'] = "Selamat Datang Pasien";
                                            ?><script>
                                                  window.location.href = "<?=base_url('pasien');?>";
                                              </script>
                                            <?php
                                        }elseif ($_SESSION['role'] == "Dokter") {
                                            $_SESSION['pesan_success'] = "Selamat Datang Dokter"
                                            ?><script>
                                                ;
                                                  window.location.href = "<?=base_url('dokter');?>";
                                              </script>
                                            <?php
                                        }elseif ($_SESSION['role'] == "Apoteker") {
                                            $_SESSION['pesan_success'] = "Selamat Datang Apoteker";
                                            ?><script>
                                                  window.location.href = "<?=base_url('apoteker');?>";
                                              </script>
                                            <?php
                                        }elseif ($_SESSION['role'] == "Admin") {

                                            ?><script>
                                                  window.location.href = "<?=base_url('admin');?>";
                                              </script>

                                            <?php
                                            $_SESSION['pesan_success'] = "Selamat Datang Admin";
                                        }
                                    }else{
                                        $_SESSION['pesan_error'] = "Kesalahan ID dan Password tidak dikenali. ";
                                    }
                            }else{
                                 $_SESSION['pesan_error'] = "Kesalahan ID dan Password tidak dikenali. ";
                            }
                        }
                    }
                 ?>

                            </form>
                            <hr>
                            <div class="text-center ">
                                <span class="paragraph-small">Tidak Punya Akun?</span>
                                <a href="daftar.php" class="">Daftar Sebagai Pasien</a>
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
