<?php 
    require_once "header.php"; 
 ?>
 <div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Data Pengambilan Obat Pasien</h3>
            <p class="text-muted m-b-30">*NOTE : Klik tombol aksi sesuai dengan kode booking pasien.</p>
            <div class="table-responsive">
                <table id="tbindex" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID Booking</th>
                            <th>Keluhan</th>
                            <th>Diagnosa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $id = $_SESSION['id_user'];
                            $master = mysqli_query($con,"SELECT * FROM tb_pesanan WHERE status = 'Ambil Obat'" );
                            while ($fetch = mysqli_fetch_assoc($master)) { 
                                ?>
                                <tr>
                                    <td><?=$fetch['id_booking']?></td>
                                    <td><?=$fetch['keluhan']?></td>
                                    <td><?=$fetch['diagnosa']?></td>
                                    <td><button class="btn btn-sm btn-info btn-xs" data-toggle="modal" data-target="#spekObat" data-id="<?=$fetch['id_booking']?>"><i class="mdi mdi-eye"></i></button>
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
<div class="modal fade" id="spekObat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><STRONG>Detail Data Pasien</STRONG></h4>
            </div>
            <div class="modal-body ">
                <div class="row">
                     <div class="white-box">
                        <div class="fetchs"></div>
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
