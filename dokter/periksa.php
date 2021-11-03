<?php 
    require_once "header.php";
 ?>
 <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Data Pasien Anda </h3>
            <p class="text-muted m-b-30">Data yang akan tampil adalah pasien anda dengan status sedang diperiksa</p>
            <div class="table-responsive">
                <table id="tbindex" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID Booking</th>
                            <th>No Urut</th>
                            <th>Nama Pasien</th>
                            <th>Keluhan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                         $idku = $_SESSION['id_user'];
                            $select = mysqli_query($con,"SELECT * FROM tb_pesanan WHERE id_dokter ='$idku' AND status='Sedang Diperiksa'");
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
                                    <td><?=$d['keluhan']?></td>
                                    <td>
                                        <a href="diagnosa.php?id=<?=$idB?>" class="btn btn-success btn-xs btnAcc"><i class="mdi mdi-check"></i></button>
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
<?php 
    require_once "footer.php";
    
 ?>
