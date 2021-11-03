<?php 
    require_once "header.php"; 
 ?>
 <div class="row">
    <div class="col-md-12 m-b-10">
        <a class="btn btn-success waves-effect waves-light pull-right" href="buatjanji.php"><span class="btn-label"><i class="fa fa-plus"></i></span>Buat Janji Baru</a>
    </div>
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Riwayat Pemeriksaan Anda</h3>
            <p class="text-muted m-b-30">*NOTE : Jika Anda Tidak Hadir Pada jam Yang sudah dipilih maka janji akan di batalkan.</p>
            <div class="table-responsive">
                <table id="tbindex" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID Booking</th>
                            <th>Nama Dokter</th>
                            <th>Jadwal Terpilih</th>
                            <th>No Urut</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $id = $_SESSION['id_user'];

                            $master = mysqli_query($con,"SELECT * FROM tb_pesanan WHERE id_pasien = '$id' ORDER by no_antrian ASC");
                            while ($fetch = mysqli_fetch_assoc($master)) { 
                                $id_booking = $fetch['id_booking'];
                                $id_dokter = $fetch['id_dokter'];
                                $id_jadwal = $fetch['id_jadwal'];
                                ?>

                                <tr>
                                    <td><?=$fetch['id_booking']?></td>
                                    <td>
                                        <?php 
                                            $query1 = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user = '$id_dokter'");
                                            $p = mysqli_fetch_assoc($query1);
                                            echo $p['nama'];
                                         ?>                                        
                                    </td>
                                    <td>
                                        <?php 
                                            $query2 = mysqli_query($con,"SELECT DISTINCT DATE_FORMAT(tanggal, '%d %M %Y') AS tgl,jam_mulai,jam_selesai,id_dokter,id_jadwal FROM tb_jadwal_dokter WHERE id_jadwal = '$id_jadwal'");
                                            $q = mysqli_fetch_assoc($query2);
                                            echo $q['tgl'] . " | " . $q['jam_mulai'] . " | " . $q['jam_selesai'];
                                         ?>      
                                    </td>
                                    <td>
                                        <?php 
                                        $no = $fetch['id_booking'];
                                     
                                        $query3 = mysqli_query($con,"SELECT no_antrian FROM tb_pesanan WHERE id_booking = '$id_booking'");
                                        $c = mysqli_fetch_assoc($query3);
                                        if ($c['no_antrian'] == "") {
                                            echo 'Belum Tersedia';
                                        }else{
                                            echo $c['no_antrian'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if ($fetch['status'] == "Dibatalkan") {
                                                echo '<p class="label label-warning">'.$fetch['status'] . '</p>';
                                            }elseif ($fetch['status'] == "Menunggu") {
                                                echo '<p class="label label-info">'.$fetch['status'] . '</p>';
                                            }elseif ($fetch['status'] == "Sedang Diperiksa") {
                                                echo '<p class="label label-primary">'.$fetch['status'] . '</p>';
                                            }elseif ($fetch['status'] == "Ambil Obat") {
                                                echo '<p class="label label-info">'.$fetch['status'] . '</p>';
                                            }
                                         ?>
                                    </td>
                                    <td><button class="btn btn-sm btn-primary view btn-xs" data-toggle="modal" data-target="#lihatData" data-id="<?=$id_booking?>"><i class="mdi mdi-eye"></i></button>
                                    <button class="btn btn-sm btn-danger delR btn-xs" data-id="<?=$id_booking?>"><i class="mdi mdi-close"></i></button>
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
<div class="modal fade" id="lihatData" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><STRONG>Detail Booking</STRONG></h4>
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

