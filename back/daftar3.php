<?php 
    require_once "header.php";
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
                    <input class="mdl-textfield__input" name="id_user" maxlength="10" readonly="" value="<?=unique_id(6,"P")?>" type="text" id="id_user">
                    <label class="mdl-textfield__label" for="id_user">ID Anda</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-user"></i>
                    <input class="mdl-textfield__input" name="nama_user" maxlength="35" autofocus="" type="text" id="nama_user">
                    <label class="mdl-textfield__label" for="nama_user">Masukan Nama<em> *</em></label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-phone"></i>
                    <input class="mdl-textfield__input" name="telepon_user" maxlength="15" type="text" id="telepon_user">
                    <label class="mdl-textfield__label" for="telepon_user">Masukan Telepon<em> *</em></label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-phone"></i>
                    <input class="mdl-textfield__input" name="tanggal_lahir"  type="date" id="tanggal_lahir">
                    
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-male"></i>
                    <select name="jenis_kelamin" id="" class="mdl-textfield__input">
                        <option value="">Pilih Jenis Kelamin<em> *</em></option>
                        <option value="Laki-Laki" >Laki-Laki </option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-map-marker"></i>
                    <input class="mdl-textfield__input" name="alamat_user" maxlength="50" type="text" id="alamat_user">
                    <label class="mdl-textfield__label" for="alamat_user">Masukan Alamat Lengkap<em> *</em></label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-key"></i>
                    <input class="mdl-textfield__input" name="passowrd_user" maxlength="20" type="password" id="login-password">
                    <label class="mdl-textfield__label" for="login-password">Masukan Password <em> *</em></label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-key"></i>
                    <input class="mdl-textfield__input" name="ulangi_password" maxlength="20" type="password" id="login-password">
                    <label class="mdl-textfield__label" for="login-password">Ulangi Password <em> *</em></label>
                </div>
                <div class="form-submit">
                    <input type="submit" name="submitDaftar" class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary" value="Daftar Akun">
                </div>
                <br>
            
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
                                $stmt = $con->prepare("INSERT INTO tb_user(id_user,nama,jenis_kelamin,tanggal_lahir,password,salt,telepon,alamat,role) VALUES(?,?,?,?,?,?,?,?,?) ");
                                $stmt->bind_param("sssssssss", $id,$nama,$jenis_kelamin,$tanggal_lahir,$passwordEnkrip,$salt,$telepon,$alamat,$role);
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
                <div class="login-link">
                    <span class="paragraph-small">Sudah Punya Akun?</span>
                    <a href="login.php" class="">Login Sebagai Pasien</a>
                </div>
            
            </div>
        </div>
    </div><!-- End Login Section -->
<?php 
    require_once "footer.php";
 ?>
