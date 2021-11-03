<?php 
    require_once "../config/function.php";
    $op = isset($_GET['op'])?$_GET['op']:null;

    if ($op == "accpasien") {
        $id= $_POST['id'];
        $now = date('Y-m-d H:m:s');
        $cek = mysqli_query($con,"SELECT * FROM tb_pesanan WHERE id_booking = '$id'");
        if (mysqli_num_rows($cek) > 0) {  
            $d = mysqli_fetch_assoc($cek); 
         $d = mysqli_fetch_assoc($cek); 
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
            <form action="">
                <div class="form-group">
                    <label class="col-md-12">Tulisakan Dignosa Dokter</label>
                    <div class="col-md-12">
                        <textarea name="" class="form-control" cols="50" rows="5"></textarea>
                    </div>
                </div>
                <h5 class="box-title">Pre-selected options</h5>
                    <select id='pre-selected-options' multiple='multiple'>
                        <option value='elem_1'>elem 1</option>
                        <option value='elem_2'>elem 2</option>
                        <option value='elem_3'>elem 3</option>
                        <option value='elem_4' selected>elem 4</option>
                        <option value='elem_5' selected>elem 5</option>
                        <option value="elem_6">elem 6</option>
                        <option value="elem_7">elem 7</option>
                        <option value="elem_8">elem 8</option>
                        <option value="elem_9">elem 9</option>
                        <option value="elem_10">elem 10</option>
                        <option value="elem_11">elem 11</option>
                        <option value="elem_12">elem 12</option>
                        <option value="elem_13">elem 13</option>
                        <option value="elem_14">elem 14</option>
                        <option value="elem_15">elem 15</option>
                        <option value="elem_16">elem 16</option>
                        <option value="elem_17">elem 17</option>
                        <option value="elem_18">elem 18</option>
                        <option value="elem_19">elem 19</option>
                        <option value="elem_20">elem 20</option>
                    </select>
            </form>
        <?php
        }
    }
 ?>
