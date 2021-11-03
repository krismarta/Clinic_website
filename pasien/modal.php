 <?php 
require_once "../config/function.php";
    $op = isset($_GET['op'])?$_GET['op']:null;
    if ($op == "lihatData") {
      $id = $_POST['id'];
            $sql = mysqli_query($con,"SELECT * FROM tb_pesanan WHERE id_booking = '$id'");
            if (mysqli_num_rows($sql) > 0) {
            $d = mysqli_fetch_assoc($sql); 
                $id_booking = $d['id_booking'];
                $id_pasien = $d['id_pasien'];
                $id_dokter = $d['id_dokter'];
                $id_jadwal = $d['id_jadwal'];
                $no_antrian = $d['no_antrian'];
                $keluhan = $d['keluhan'];
                $diagnosa = $d['diagnosa'];
                $waktu_periksa = $d['waktu_periksa'];
                $waktu_datang = $d['waktu_datang'];
                $status = $d['status'];
            ?>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Informasi Pasien</span></a></li>
                <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Informasi Umum</span></a></li>
                <li role="presentation" class=""><a href="#obat" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Informasi Obat Anda</span></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="table-responsive">
                    <table class="table color-table info-table">
                        <thead>
                            <tr>
                                <th width="150">ID Pasien</th>
                                <td>
                                    <?php 
                                        $q = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user = '$id_pasien'");
                                        $y = mysqli_fetch_assoc($q);
                                        echo $y['id_user'];
                                     ?>

                                </td>
                            </tr>
                            <tr>
                                <th width="150">Nama Pasien</th>
                                <td><?=$y['nama']?></td>
                            </tr>
                            <tr>
                                <th width="150">Jenis Kelamin</th>
                                <td><?=$y['jenis_kelamin']?></td>
                            </tr>
                            <tr>
                                <th width="150">Telepon</th>
                                <td><?=$y['telepon']?></td>
                            </tr>
                            <tr>
                                <th width="150">Alamat</th>
                                <td><?=$y['alamat']?></td>
                            </tr>
                            <tr>
                                <th width="150">Umur</th>
                                <td><?=hitung_umur($y['tanggal_lahir'])?> Tahun</td>
                            </tr>
                            <tr>
                                <th width="150">Tanggal Lahir</th>
                                <td><?=tanggalFormat($y['tanggal_lahir'])?></td>
                            </tr>

                        </thead>
                    </table>
                </div><br>
                    <div class="text-center"><button class="text-center btn btn-danger btnCancel" data-id="<?=$id_booking?>">Batalkan Bookingan User</button></div> 
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                         <div class="table-responsive">
                    <table class="table color-table warning-table">
                        <thead>
                            <tr>
                                <th width="150">ID Booking</th>
                                <td><?=$id_booking?></td>
                            </tr>
                            <tr>
                                <th width="150">Nama Dokter</th>
                                <td>
                                    <?php 
                                        $z = mysqli_query($con,"SELECT * FROM tb_user WHERE id_user = '$id_dokter'");
                                        $x = mysqli_fetch_assoc($z); 
                                        echo $x['nama'];
                                        $o = mysqli_query($con,"SELECT * FROM tb_jadwal_dokter WHERE id_dokter = '$id_dokter'");
                                        $i = mysqli_fetch_assoc($o);
                                       
                                     ?>

                                </td>
                            </tr>
                            <tr>
                                <th width="150">Jadwal Dokter</th>
                                <td><?=tanggalFormat($i['tanggal']) . " | " . timeFormat($i['jam_mulai']) . " | " . timeFormat($i['jam_selesai']) ?></td>
                            </tr>
                            <tr>
                                <th width="150">No Antrian</th>
                                <td><?=$no_antrian?></td>
                            </tr>
                            <tr>
                                <th width="150">Keluhan</th>
                                <td>
                                    <?=$keluhan?>
                                </td>
                            </tr>
                            <tr>
                                <th width="150">Diagnosa</th>
                                <td>
                                    <?php 
                                        if ($diagnosa == "") {
                                            echo 'Diagnosa Belum Diberikan Dokter';
                                        }else{
                                            echo $diagnosa;
                                        }
                                     ?>
                                </td>
                            </tr>
                            <tr>
                                <th width="150">Waktu Selesai Periksa</th>
                                <td>
                                    <?php 
                                        if ($waktu_periksa == "") {
                                            echo 'Belum Diperiksa';
                                        }else{
                                            echo $waktu_periksa;
                                        }
                                     ?>
                                </td>
                            </tr>
                            <tr>
                                <th width="150">Waktu Datang</th>
                                <td>
                                    <?php 
                                        if ($waktu_datang == "") {
                                            echo 'Pasien Belum Datang';
                                        }else{
                                            echo $waktu_datang;
                                        }
                                     ?>
                                    </td>
                            </tr>
                            <tr>
                                <th width="150">Status</th>
                                <td><?php echo "<div class='label label-lg label-info'>" . $status. "</div>";?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="obat">
                    <div class="text-center">
                        <h3 class="box-title">Berikut Adalah Obat yang Anda Butuhkan</h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>

                </div>

            </div>
           

        <?php
    }
}
