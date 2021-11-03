
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
    <!-- Start page Title Section -->
    <div class="page-ttl">
    </div><!-- End page Title Section -->
    <!-- Start Login Section -->
    <div id="login-page" class="layer-stretch">
        <div class="layer-wrapper">
            <form method="POST">
            <div class="form-container">    
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-id-card"></i>
                    <input class="mdl-textfield__input" name="id_user" type="text" id="id_user">
                    <label class="mdl-textfield__label" for="id_user">Masukan ID<em> *</em></label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-key"></i>
                    <input class="mdl-textfield__input" name="password" type="password" id="login-password">
                    <label class="mdl-textfield__label" for="login-password">Masukan Password <em> *</em></label>
                </div>
                <div class="form-submit">
                    <input type="submit" name="submitLogin" class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary" value="Masuk Dashboard">
                </div><br>

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
                <div class="login-link">
                    <span class="paragraph-small">Tidak Punya Akun?</span>
                    <a href="daftar.php" class="">Daftar Sebagai Pasien</a>
                </div>
            </div>
            


        </div>
    </div><!-- End Login Section -->
<?php 
}
    require_once "footer.php";
 ?>
