<?php 
    require_once "header.php";
 ?>
 <div class="row">
    <div class="col-md-12 m-b-10">
        <button class="btn btn-success waves-effect waves-light pull-right" type="button" data-toggle="modal" data-target="#tambahDokter"><span class="btn-label"><i class="fa fa-plus"></i></span>Tambah Dokter</button>
    </div>
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Data Dokter</h3>
            <p class="text-muted m-b-30">Lakukan Eksport Data Dengan Tombol Dibawah ini.</p>
            <div class="table-responsive">
                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID Dokter</th>
                            <th>Nama Dokter</th>
                            <th>Telepon</th>
                            <th>Jenis Dokter</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = mysqli_query($con,"SELECT tb_user.id_user, tb_user.nama, tb_user.telepon,tb_jenis_dokter.jenis_dokter FROM tb_user INNER JOIN tb_jenis_dokter ON tb_user.id_user = tb_jenis_dokter.id_dokter");
                            while ($fetch = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?=$fetch['id_user']?></td>
                                    <td><?=$fetch['nama']?></td>
                                    <td><?=$fetch['telepon']?></td>
                                    <td><?=$fetch['jenis_dokter']?></td>
                                    <td><a href="editdokter.php?id=<?=$fetch['id_user']?>" class="btn btn-warning btn-xs "><i class="mdi mdi-pencil"></i></a>
                                    <a  href="hapus.php?p=hapusDokter&id=<?=$fetch['id_user']?>" class="btn btn-danger btn-xs" ><i class="mdi mdi-delete"></i></a>
                                    <a href="jadwal.php?id=<?=$fetch['id_user']?>" class="btn btn-info btn-xs" data-id="USR-8472581"><i class="mdi mdi-calendar"></i></td>
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
<div class="modal fade" id="tambahDokter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><STRONG>Tambah Dokter</STRONG></h4>
            </div>
            <div class="modal-body ">
                <div class="row">
                     <div class="col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-12">ID Dokter <span class="help">(dibuat Otomatis)</span></label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" maxlength="12" name="id_dokter" value="<?=unique_id(6,"D")?>" readonly> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nama Dokter</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" maxlength="35" name="nama" placeholder="Masukan Nama Dokter"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Telepon Dokter</label>
                                <div class="col-md-12">
                                    <input type="text" onkeypress="return hanyaAngka(event)" maxlength="12" class="form-control" name="telepon" placeholder="Masukan Telepon Dokter"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tanggal Lahir Dokter</label>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" name="lahir"  placeholder="Masukan Tanggal Dokter"> </div>
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
                                <label class="col-sm-12">Jenis Dokter</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="jenisdokter">
                                        <option value="">Pilih Jenis Dokter</option>
                                        <option value="Dokter Umum">Dokter Umum</option>
                                        <option value="Dokter Gigi">Dokter Gigi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Alamat Dokter</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" maxlength="100" name="alamat" placeholder="Masukan Alamat Dokter"> </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-12">Foto Dokter</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control" name="foto"> </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left " data-dismiss="modal">Batalkan</button>
                <button type="submit" name="prosesadd" class="btn btn-primary waves-effect text-left">Tambah Dokter</button>
            </div>
        </form>
        <?php 
            if (isset($_POST['prosesadd'])) {
                $id = secure($con,$_POST['id_dokter']);
                $nama = secure($con,$_POST['nama']);
                $telepon = secure($con,$_POST['telepon']);
                $lahir = secure($con,$_POST['lahir']);
                $gender = secure($con,$_POST['gender']);
                $jenisdokter = secure($con,$_POST['jenisdokter']);
                $alamat = secure($con,$_POST['alamat']);
                $password = "dokter";
                $role = "Dokter";
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

                if (empty($id) || empty($nama) || empty($telepon) || empty($lahir) || empty($gender) || empty($jenisdokter) || empty($alamat)  || empty($foto)) {
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
                                    $query1 = mysqli_query($con,"INSERT INTO tb_jenis_dokter(id_dokter,jenis_dokter) VALUES('$id','$jenisdokter')");
                                    if ($query && $query1) {
                                        move_uploaded_file($tmp_foto, '../assets/profil/'.$nama_baru);
                                        $_SESSION['pesan_success'] = "Berhasil Menambah Dokter. Password : dokter";
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
