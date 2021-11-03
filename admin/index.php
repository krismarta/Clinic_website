<?php 
    require_once "header.php";
 ?>
 <!-- .row -->
<div class="row">
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Pasien</h3>
            <ul class="list-inline two-part">
                <li><i class="mdi mdi-account text-info"></i></li>
                <li class="text-right"><span class="counter">
                    <?php 
                        $data1 = mysqli_query($con,"SELECT * FROM tb_user WHERE role = 'Pasien'");
                        echo mysqli_num_rows($data1);
                     ?>
                </span></li>
                <!-- <script>swal('hehe','Mantap',"success")</script> -->
            </ul>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Dokter</h3>
            <ul class="list-inline two-part">
                <li><i class="mdi mdi-account-multiple text-purple"></i></li>
                <li class="text-right"><span class="counter">
                    <?php 
                        $data2 = mysqli_query($con,"SELECT * FROM tb_user WHERE role = 'Dokter'");
                        echo mysqli_num_rows($data2);
                     ?>
                </span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Apoteker</h3>
            <ul class="list-inline two-part">
                <li><i class="mdi mdi-account-box text-danger"></i></li>
                <li class="text-right"><span class=""><?php 
                        $data3 = mysqli_query($con,"SELECT * FROM tb_user WHERE role = 'Apoteker'");
                        echo mysqli_num_rows($data3);
                     ?></span></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Total Pendaftar</h3>
            <ul class="list-inline two-part">
                <li><i class="mdi mdi-check text-success"></i></li>
                <li class="text-right"><span class=""><?php 
                        $data4 = mysqli_query($con,"SELECT * FROM tb_pesanan ");
                        echo mysqli_num_rows($data4);
                     ?></span></li>
            </ul>
        </div>
    </div>
</div>
<!-- /.row -->
<?php 
    require_once "footer.php";
 ?>

