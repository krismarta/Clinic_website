<?php 
    require_once "../config/function.php";
    $p = isset($_GET['p'])?$_GET['p']:null;
    if ($p == "hapusDokter") {
        $id = secure($con,$_GET['id']);
        $cek = mysqli_query($con,"SELECT * FROM tb_user Where id_user = '$id' ");
        $q = mysqli_fetch_assoc($cek);
        $folder = "../assets/profil/".$q['foto'];
        $query = mysqli_query($con,"DELETE FROM tb_user Where id_user = '$id' ");
        if ($query) {
            $del1 = mysqli_query($con,"DELETE FROM tb_jenis_dokter WHERE id_dokter = '$id'");
            $del2 = mysqli_query($con,"DELETE FROM tb_jadwal_dokter WHERE id_dokter = '$id'");
            if ($del1 &&  $del2) {
                $_SESSION['pesan_success'] = "Berhasil Menghapus Dokter.";
                ?><script>
                      window.location.href = "<?=base_url('admin/dokter.php');?>";
                  </script>
                <?php
                 unlink($folder);
            }
        }else{
            $_SESSION['pesan_error'] = "Gagal Menghapus Dokter, Coba Lagi";
            ?><script>
                  window.location.href = "<?=base_url('admin/dokter.php');?>";
              </script>
            <?php
        }
    }elseif ($p == "hapusJadwal") {
        $id = secure($con,$_GET['id']);
        $iddok = secure($con,$_GET['idok']);
        $cek = mysqli_query($con,"SELECT * FROM tb_jadwal_dokter Where id_jadwal = '$id' ");
        if ($q = mysqli_fetch_assoc($cek) > 0) {
             $query = mysqli_query($con,"DELETE FROM tb_jadwal_dokter Where id_jadwal = '$id' ");
             if ($query) {
                $_SESSION['pesan_success'] = "Berhasil Menghapus Jadwal Dokter.";
                ?><script>
                      window.location.href = "<?=base_url('admin/jadwal.php?id=');?><?=$iddok?>";
                  </script>
                <?php
            }else{
                $_SESSION['pesan_error'] = "Gagal Menghapus Jadwal Dokter, Coba Lagi";
                ?><script>
                      window.location.href = "<?=base_url('admin/dokter.php');?>";
                  </script>
                <?php
            }
        }else{
            $_SESSION['pesan_error'] = "ID Dokter Tidak Ditemukan";
            ?><script>
                  window.location.href = "<?=base_url('admin/dokter.php');?>";
              </script>
            <?php
        }
    }elseif ($p == "hapusApoteker") {
       $id = secure($con,$_GET['id']);
        $cek = mysqli_query($con,"SELECT * FROM tb_user Where id_user = '$id' ");
        $q = mysqli_fetch_assoc($cek);
        $folder = "../assets/profil/".$q['foto'];
        $query = mysqli_query($con,"DELETE FROM tb_user Where id_user = '$id' ");
        if ($query) {
          $_SESSION['pesan_success'] = "Berhasil Menghapus Apoteker.";
          ?><script>
                window.location.href = "<?=base_url('admin/apoteker.php');?>";
            </script>
          <?php
           unlink($folder);
        }else{
           $_SESSION['pesan_error'] = "Gagal Menghapus Apoteker, Coba Lagi";
            ?><script>
                  window.location.href = "<?=base_url('admin/apoteker.php');?>";
              </script>
            <?php
        }
    }elseif ($p == "hapusPasien") {
      $id = secure($con,$_GET['id']);
        $cek = mysqli_query($con,"SELECT * FROM tb_user Where id_user = '$id' ");
        $q = mysqli_fetch_assoc($cek);
        $folder = "../assets/profil/".$q['foto'];
        $query = mysqli_query($con,"DELETE FROM tb_user Where id_user = '$id' ");
        if ($query) {
          $_SESSION['pesan_success'] = "Berhasil Menghapus Pasien.";
          ?><script>
                window.location.href = "<?=base_url('admin/pasien.php');?>";
            </script>
          <?php
           unlink($folder);
        }else{
           $_SESSION['pesan_error'] = "Gagal Menghapus Pasien, Coba Lagi";
            ?><script>
                  window.location.href = "<?=base_url('admin/pasien.php');?>";
              </script>
            <?php
        }
    }elseif ($p == "hapuspesan") {
      $id = secure($con,$_GET['id']);
      $cek = mysqli_query($con,"SELECT * FROM tb_hubungi_kami Where nama_pengirim = '$id' ");
        $q = mysqli_fetch_assoc($cek);
        $query = mysqli_query($con,"DELETE FROM tb_hubungi_kami Where nama_pengirim = '$id' ");
        if ($query) {
          $_SESSION['pesan_success'] = "Berhasil Menghapus Pesan.";
          ?><script>
                window.location.href = "<?=base_url('admin/hubungikami.php');?>";
            </script>
          <?php
           unlink($folder);
        }else{
           $_SESSION['pesan_error'] = "Gagal Menghapus Pesan  , Coba Lagi";
            ?><script>
                  window.location.href = "<?=base_url('admin/hubungikami.php');?>";
              </script>
            <?php
        }
    }
 ?>
