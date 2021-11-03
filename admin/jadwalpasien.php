<?php 
    require_once "header.php";
 ?>
 <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Data Pasien Terjadwal</h3>
            <p class="text-muted m-b-30">Gunakan Fitur Pencarian Data</p>
            <div class="table-responsive">
                <table id="tbindex" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID Booking</th>
                            <th>No Urut</th>
                            <th>Nama Pasien</th>
                            <th>Nama Dokter</th>
                            <th>Terjadwal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                            $select = mysqli_query($con,"SELECT * FROM tb_pesanan");
                            while ($d = mysqli_fetch_assoc($select)) { 
                                $idP = $d['id_pasien'];
                                $idD = $d['id_dokter'];
                                $idJ = $d['id_jadwal'];
                                $idB = $d['id_booking'];
                                ?>
                                <tr>
                                    <td><?=$idB?></td>
                                    <td><?=$d['no_antrian']?></td>
                                    <td>
                                        <?php 
                                            $query1 = mysqli_query($con,"SELECT nama, id_user FROM tb_user WHERE id_user = '$idP'");
                                            $data1 = mysqli_fetch_assoc($query1);
                                            echo $data1['nama'];
                                         ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $query2 = mysqli_query($con,"SELECT nama, id_user FROM tb_user WHERE id_user = '$idD'");
                                            $data2 = mysqli_fetch_assoc($query2);
                                            echo $data2['nama'];
                                         ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $query3 = mysqli_query($con,"SELECT DISTINCT DATE_FORMAT(tanggal, '%d %M %Y') AS tgl,jam_mulai,jam_selesai,id_dokter,id_jadwal FROM tb_jadwal_dokter WHERE id_dokter = '$idD' ORDER BY tanggal ASC, jam_mulai ASC ");

                                            $data3 = mysqli_fetch_assoc($query3);
                                            echo $data3['tgl'] . " | " . $data3['jam_mulai']. " | " . $data3['jam_selesai'] ;
                                         ?>
                                    </td>
                                    <td>
                                        <?php 
                                        $status = $d['status'];
                                            if ($status == "Menunggu") {
                                                echo '<p class="label label-warning">'.$status.'</p>';
                                            }elseif ($status == "Sedang Diperiksa") {
                                                echo '<p class="label label-info">'.$status.'</p>';
                                            }elseif ($status == "Ambil Obat") {
                                                echo '<p class="label label-primary">'.$status.'</p>';
                                            }elseif ($status == "Selesai") {
                                                echo '<p class="label label-success">'.$status.'</p>';
                                            }elseif ($status == "Dibatalkan") {
                                                echo '<p class="label label-danger">'.$status.'</p>';
                                            }
                                         ?>
                                        
                                    </td>
                                    <td><button class="btn btn-info btn-xs " data-toggle="modal" data-id="<?=$idB?>"  data-target="#lihatData"><i class="mdi mdi-eye"></i></button>
                                        <button class="btn btn-success btn-xs btnCheck" data-id="<?=$idB?>"><i class="mdi mdi-check"></i></button>
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
