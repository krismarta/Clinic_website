<?php 
    require_once "header.php";
 ?>
 <div class="row">
    <div class="col-sm-12">
        <div class="col-md-8">
            <div class="white-box">
                <div class="white-box">
            <h3 class="box-title m-b-0">Data Obat Obatan</h3>
            <p class="text-muted m-b-30">Data Ini Hanya Anda yang dapat Mengelola.</p>
            <div class="table-responsive">
                <table id="tbindex" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID Obat</th>
                            <th>Nama Obat</th>
                            <th>Jenis Obat</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                            $select = mysqli_query($con,"SELECT * FROM tb_obat_db");
                            while ($d = mysqli_fetch_assoc($select)) { 
                                ?>
                                <td><?=$d['id_obat']?></td>
                                <td><?=$d['nama_obat']?></td>
                                <td><?=$d['jenis_obat']?></td>
                                <td><?=$d['stok']?></td>
                                    <td><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editObat" data-id="<?=$d['id_obat']?>"><i class="mdi mdi-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs btnDelO" data-id="<?=$d['id_obat']?>"><i class="mdi mdi-close"></i></button>
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
        </div><div class="col-md-4">
            <div class="white-box">
                <div class="white-box">
            <h3 class="box-title m-b-0">Tambah Obat</h3><hr>
                <form action="" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label class="col-md-12">Nama Obat</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" maxlength="35" name="nama" placeholder="Masukan Nama Obat"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Jenis Obat</label>
                        <div class="col-md-12">
                            <select class="form-control" name="jenis_obat">
                                <option value="">Pilih Jenis Obat</option>
                               <option value="Sirup">Sirup</option>
                               <option value="Tablet">Tablet</option>
                               <option value="Kaplet">Kaplet</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Stok Obat</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  onkeypress="return hanyaAngka(event)" maxlength="12" name="stok" placeholder="Masukan Stok Obat"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-block" name="btnAddObat" value="Simpan Data" > </div>
                    </div>
                </form>
                <?php 
                    if (isset($_POST['btnAddObat'])) {
                        $nama = secure($con,$_POST['nama']);
                        $stok = secure($con,$_POST['stok']);
                        $jenis = secure($con,$_POST['jenis_obat']);

                        if (empty($nama) || empty($stok) || empty($jenis)) {
                            echo '<div class="alert alert-danger" role="alert">
                                     Formulir Masih Kosong, Coba Lagi
                                    </div>';
                        }else{
                            $cek = mysqli_query($con,"SELECT * FROM tb_obat_db WHERE nama_obat ='$nama'");
                            if (mysqli_num_rows($cek) > 0) {
                                echo '<div class="alert salert-danger" role="alert">
                                     Sudah Tersedia, Coba Lagi
                                    </div>';
                            }else{
                                $quer = mysqli_query($con,"INSERT INTO tb_obat_db VALUES(NULL,'$nama','$jenis','$stok')");
                                if ($quer) {

                                    echo '<div class="alert alert-success" role="alert">
                                         Berhasil menambah Obat.
                                        </div> ';
                                        echo("<meta http-equiv='refresh' content='1'>");
                                }else {
                                    echo '<div class="alert alert-danger" role="alert">
                                         Terjadi Kesalahan, Coba Lagi
                                        </div>';
                                }
                            }
                        }
                    }
                 ?>
            </div>
            </div>
        </div>
        
    </div>
</div>
<!-- /.row -->
<div class="modal fade" id="editObat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><STRONG>Edit Obat </STRONG></h4>
            </div>
            <div class="modal-body ">
                <div class="row">
                     <div class="white-box">
                        <div class="fetch"></div>
                     </div>
                </div>
            </div>
        <!-- /.modal-content -->
        <div class="modal-footer">
            <button type="button" class="btn btn-warning waves-effect text-left " data-dismiss="modal">Batalkan</button>
        </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>
<?php 
    require_once "footer.php";
    
 ?>
