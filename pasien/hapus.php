<?php 
require_once "../config/function.php";
    $op = isset($_GET['op'])?$_GET['op']:null;

    if ($op == "hapusjanji") {
        $id_booking = $_GET['id_booking'];
        $query = mysqli_query($con,"UPDATE tb_pesanan SET status = 'Dibatalkan' WHERE id_booking = '$id_booking'");
        if ($query) {
            $response['status'] = 'success';
            $response['message'] = 'Berhasil Dibatalkan';
            echo json_encode($response);
        }else{
            $response['status'] = 'error';
            $response['message'] = 'Gagal Membatalkan Janjis';
            echo json_encode($response);
        }
        
    }
 ?>
