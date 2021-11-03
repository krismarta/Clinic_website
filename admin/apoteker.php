<?php 
    require_once "header.php";
 ?>
 <div class="row">
    <div class="col-md-12 m-b-10">
        <button class="btn btn-primary waves-effect waves-light pull-right" type="button" data-toggle="modal" data-target="#tambahApoteker"><span class="btn-label"><i class="fa fa-plus"></i></span>Tambah Apoteker</button>
    </div>
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Data Apoteker</h3>
            <p class="text-muted m-b-30">Lakukan Eksport Data Dengan Tombol Dibawah ini.</p>
            <div class="table-responsive">
                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID Apoteker</th>
                            <th>Nama Apoteker</th>
                            <th>Telepon</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $select = mysqli_query($con,"SELECT * FROM tb_user WHERE role = 'Apoteker'");
                            while ($d = mysqli_fetch_assoc($select)) { ?>
                                <tr>
                                    <td><?=$d['id_user']?></td>
                                    <td><?=$d['nama']?></td>
                                    <td><?=$d['telepon']?></td>
                                    <td><?=$d['tanggal_lahir']?></td>
                                    <td><a href="editApoteker.php?id=<?=$d['id_user']?>" class="btn btn-warning btn-xs "><i class="mdi mdi-pencil"></i></a>
                                    <a href="hapus.php?p=hapusApoteker&id=<?=$d['id_user']?>" class="btn btn-danger btn-xs "><i class="mdi mdi-delete"></i></a>
                                </td>
                                </tr>
                                <?php
                            }
                         ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="modal fade" id="tambahApoteker" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><STRONG>Tambah Apoteker</STRONG></h4>
            </div>
            <div class="modal-body ">
                <div class="row">
                     <div class="col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-12">ID Apoteker <span class="help">(dibuat Otomatis)</span></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="id_apoteker" maxlength="12" value="<?=unique_id(6,"A")?>" readonly> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nama Apoteker</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" maxlength="35" name="nama" placeholder="Masukan Nama Apoteker"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Telepon Apoteker</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="12" name="telepon" placeholder="Masukan Telepon Apoteker"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tanggal Lahir Apoteker</label>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" name="lahir" placeholder="Masukan Tanggal Apoteker"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Jenis Kelamin</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="gender">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Alamat Apoteker</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" maxlength="100" name="alamat" placeholder="Masukan Alamat Apoteker"> </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Foto Apoteker</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control" name="foto"> </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left " data-dismiss="modal">Batalkan</button>
                <button type="submit" name="prosesadd" class="btn btn-primary waves-effect text-left">Tambah Apoteker</button>
            </div>
        </form>
        <?php 
            if (isset($_POST['prosesadd'])) {
                $id = secure($con,$_POST['id_apoteker']);
                $nama = secure($con,$_POST['nama']);
                $telepon = secure($con,$_POST['telepon']);
                $lahir = secure($con,$_POST['lahir']);
                $gender = secure($con,$_POST['gender']);
                $alamat = secure($con,$_POST['alamat']);
                $password = "apoteker";
                $role = "Apoteker";
                $status = "Aktif";
                $foto = $_FILES['foto']['name'];
                $tmp_foto = $_FILES['foto']['tmp_name'];
                $ukuran = $_FILES['foto']['size'];
                
                $ex_bole = array('jpg','png');
                $x = explode('.',$foto);
                $ex = strtolower(end($x));
                
                $salt = sha1(rand());
                $salt = substr($salt,0, 10);
                $enkripsiPass = base64_encode(sha1($password . $salt,true). $salt);
                $hash = array("salt" => $salt, "enkripsiPass" => $enkripsiPass);
                $passwordEnkrip = $hash['enkripsiPass'];
                $salt = $hash['salt'];

                if (empty($id) || empty($nama) || empty($telepon) || empty($lahir) || empty($gender) || empty($alamat)  || empty($foto)) {
                    $_SESSION['pesan_error'] = "Formulir Masih Kosong.";
                }else{
                    $cekID = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user = '$id'");
                        if (mysqli_num_rows($cekID) > 0) {
                             $_SESSION['pesan_error'] = "Silahkan Refresh Ulang.";                      
                        }else{
                            if (in_array($ex, $ex_bole) == true) {
                                if ($ukuran < 2*MB) {
                                    $temp = explode(".", $foto);
                                    $nama_baru = round(microtime(true)) . '.' . end($temp);
                                    $query = mysqli_query($con, "INSERT INTO tb_user VALUES('$id','$nama','$gender','$lahir','$passwordEnkrip','$salt','$telepon','$alamat','$role','$status','$nama_baru')");
                                    if ($query) {
                                        move_uploaded_file($tmp_foto, '../assets/profil/'.$nama_baru);
                                        $_SESSION['pesan_success'] = "Berhasil Menambah Apoteker. Password : apoteker";
                                        echo("<meta http-equiv='refresh' content='1'>");
                                    }else{
                                        $_SESSION['pesan_error'] = "Terjadi Kesalahan..";
                                    }
                                }else{
                                    $_SESSION['pesan_error'] = "Ukuran Foto tidak boleh lebih dari 2MB";
                                }
                            }else{
                                $_SESSION['pesan_error'] = "Ekstensi Foto Tidak Diizinkan. ";
                            }
                        }
                }
            }
         ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
<?php 
    require_once "footer.php";
 ?>
