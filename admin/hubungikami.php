<?php 
    require_once "header.php";
 ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Pesan Masuk User Random</h3>
            <p class="text-muted m-b-0">Pesan Ini adalah pesan yang dikirim melalu fitur hubungi kami.</p>
            <p class="text-muted m-b-30"><strong class="text-danger">*NOTE :</strong> Silahkan Jawab Pertanyan user melalui Email secara manual</p>
            <div class="table-responsive">
                <table id="tbindex" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Pengirim</th>
                            <th>Email Pengirim</th>
                            <th>Pesan Pengirim</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                            $select = mysqli_query($con,"SELECT * FROM tb_hubungi_kami");
                            while ($d = mysqli_fetch_assoc($select)) { ?>
                                <tr>
                                    <td><?=$d['nama_pengirim']?></td>
                                    <td><?=$d['email_pengirim']?></td>
                                    <td><?=$d['pesan_pengirim']?></td>
                                    <td><a href="hapus.php?p=hapuspesan&id=<?=$d['nama_pengirim']?>" class="btn btn-danger btn-xs "><i class="mdi mdi-delete"></i></a></td>
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
