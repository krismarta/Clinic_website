<?php 
    require_once "header.php";
    $id = secure($con,$_GET['id']);
    $query2 = mysqli_query($con,"SELECT nama FROM tb_user WHERE id_user = '$id'");
    $d = mysqli_fetch_assoc($query2);
    $GLOBALS['namaDokter'] = $d['nama'];
 ?>
<a class="btn btn-warning waves-effect waves-light pull-right m-b-10" href="dokter.php"><span class="btn-label"><i class="mdi mdi-arrow-left-bold"></i></span>Data Dokter</a>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Jadwal Praktek <?=$GLOBALS['namaDokter']?></h3><button class="btn btn-primary waves-effect waves-light pull-right" type="button" data-toggle="modal" data-target="#tambahJadwal"><span class="btn-label"><i class="fa fa-plus"></i></span>Tambah Jadwal</button>
            <p class="text-muted m-b-30">Anda Dapat Melakukan Penambahan Jadwal</p>
            <div class="table-responsive">
                <table id="tbindex" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Tanggal Praktek</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = mysqli_query($con,"SELECT DISTINCT DATE_FORMAT(tanggal, '%d %M %Y') AS tgl,jam_mulai,jam_selesai,id_dokter,id_jadwal FROM tb_jadwal_dokter WHERE id_dokter = '$id' ORDER BY tanggal ASC, jam_mulai ASC ");

                            while ($d = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?=($d['tgl'])?></td>
                                    <td><?=timeFormat($d['jam_mulai']); ?></td>
                                    <td><?=timeFormat($d['jam_selesai'])?></td>
                                    <td>
                                    <a href="hapus.php?p=hapusJadwal&id=<?=$d['id_jadwal']?>&idok=<?=$d['id_dokter']?>" class="btn btn-danger btn-xs"><i class="mdi mdi-delete"></i></a></td>
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


<div class="modal fade" id="tambahJadwal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><STRONG>Tambah Jadwal Anda</STRONG></h4>
            </div>
            <div class="modal-body ">
                <div class="row">
                     <div class="col-sm-12 col-xs-12">
                        <form class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label class="col-md-12">Tanggal Jadwal</label>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" name="tanggal_praktek"></div>
                                </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">Jam Mulai</label>
                                        <div class="col-md-12">
                                            <input type="time" name="mulai" class="form-control" > </div>
                                    </div>   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">Jam Selesai</label>
                                        <div class="col-md-12">
                                            <input type="time" name="selesai" class="form-control"> </div>
                                    </div>   
                                </div>
                            </div>              
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left " data-dismiss="modal">Batalkan</button>
                <button type="submit" name="btnAdd" class="btn btn-info waves-effect text-left">Tambah Jadwal</button>
                 </form>
            </div>
        <?php 
                if (isset($_POST['btnAdd'])) {
                    
                    $tanggal = secure($con,$_POST['tanggal_praktek']);
                    $mulai = secure($con, $_POST['mulai']);
                    $selesai = secure($con, $_POST['selesai']);
                    // echo $tanggal."</br>";
                    // echo $mulai."</br>";
                    // echo $selesai."</br>";
                    // die();
                    if (empty($tanggal) || empty($mulai) || empty($selesai)) {
                        echo '<div class="alert alert-danger">
                              <strong>Perhatian </strong>Silahkan Lengkapkan Formulir Diatas. 
                            </div>';
                    }else{
                        $masuk = mysqli_query($con,"INSERT INTO tb_jadwal_dokter(id_dokter,tanggal,jam_mulai,jam_selesai) VALUES('$id', '$tanggal','$mulai','$selesai')");
                        if ($masuk) {
                            echo $d['nama'];
                            $_SESSION['pesan_success'] = "Berhasil Menambahkan Jadwal Dokter : $GLOBALS[namaDokter]";
                            echo("<meta http-equiv='refresh' content='1'>");
                        }else{
                            $_SESSION['pesan_error'] = "Terjadi Kesalahan...";
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
