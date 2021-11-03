<?php 
    require_once "header.php";
 ?>
<div class="col-lg-10 col-sm-10 col-xs-12 col-md-offset-1 col-sm-offset-1">
    <div class="white-box">
        <h3 class="box-title m-b-0">Pengaturan Website</h3>
        <p class="text-muted m-b-20">Halaman ini akan merubah pengaturan pada website seperti gambar dan tulisan.</p>
        <div class="vtabs customvtab">
            <ul class="nav tabs-vertical">
                <li class="tab active">
                    <a data-toggle="tab" href="#umum" aria-expanded="true"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Umum</span> </a>
                </li>
                <li class="tab">
                    <a data-toggle="tab" href="#slider" aria-expanded="false"> <span class="visible-xs"><i class="ti-flag"></i></span> <span class="hidden-xs">Slider</span> </a>
                </li>
                <li class="tab">
                    <a aria-expanded="false" data-toggle="tab" href="#tentang"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Tentang Klinik</span> </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="umum" class="tab-pane active">
                    <div class="col-md-12">
                        <p class="text-danger"> *NOTE : Pada tab ini akan disimpan beberapa informasi konfigurasi pada website anda lengkapi informasi berikut dengan sesuai.</p>
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                         <div class="form-group">
                            <label class="col-md-12">Nama Website</label>
                            <div class="col-md-12">
                                <input type="text" width="100%" name="namaWeb" class="form-control" value="<?=$nama_web?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Favicon Website</label>
                            <div class="col-md-12">
                                <input type="file" width="100%" name="fav" class="form-control" value="<?=$favicon?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Facebook Url</label>
                            <div class="col-md-12">
                                <input type="text" width="100%" name="faceURl" class="form-control" value="<?=$facebook_link?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Telepon 1</label>
                            <div class="col-md-12">
                                <input type="text" width="100%" name="telp1" class="form-control" value="<?=$telp1?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Telepon 2</label>
                            <div class="col-md-12">
                                <input type="text" width="100%" name="telp2" class="form-control" value="<?=$telp2?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Alamat</label>
                            <div class="col-md-12">
                                <input type="text" width="100%" name="alamat" class="form-control" value="<?=$alamat?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Email Web</label>
                            <div class="col-md-12">
                                <input type="text" width="100%" name="email" class="form-control" value="<?=$emailku?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Logo Text Website</label>
                            <div class="col-md-12">
                                <input type="file" width="100%" name="logo" class="form-control" value="<?=$logoText?>"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" name="btnUmum" class=" btn btn-primary btn-block"  value="Siapkan Website"> </div>
                        </div>
                    </form>
                    <?php 
                            if (isset($_POST['btnUmum'])) {
                                $namaweb = secure($con,$_POST['namaWeb']);
                                $faceURL = secure($con,$_POST['faceURl']);
                                $telp1 = secure($con,$_POST['telp1']);
                                $telp2 = secure($con,$_POST['telp2']);
                                $alamat = secure($con,$_POST['alamat']);
                                $email = secure($con,$_POST['email']);
                                
                                $fav = $_FILES['fav']['name'];
                                $tmp_fav = $_FILES['fav']['tmp_name'];
                                $size_fav = $_FILES['fav']['size'];

                                $logo = $_FILES['logo']['name'];
                                $tmp_logo = $_FILES['logo']['tmp_name'];
                                $size_logo = $_FILES['logo']['size'];

                                if (empty($namaweb) || empty($faceURL) || empty($telp1) || empty($telp2) || empty($alamat) || empty($email) || empty($fav) || empty($logo) ) {
                                        echo '<div class="alert alert-danger">
                                              <strong>Perhatian </strong>Silahkan Ulangi Halaman
                                            </div>'; 
                                }else{
                                   $namaquery = mysqli_query($con,"UPDATE tb_pengaturan SET value = '$namaweb' WHERE id = '1'");
                                   if ($namaquery) {
                                       $facequery = mysqli_query($con,"UPDATE tb_pengaturan SET value='$faceURL' WHERE id = '3'");
                                       if ($facequery) {
                                           $telp1query = mysqli_query($con,"UPDATE tb_pengaturan SET value='$telp1' WHERE id = '4'");
                                           if ($telp1query) {
                                               $telp2query = mysqli_query($con,"UPDATE tb_pengaturan SET value='$telp2' WHERE id = '5'");
                                               if ($telp2query) {
                                                   $alamatquery = mysqli_query($con,"UPDATE tb_pengaturan SET value='$alamat' WHERE id = '6'");
                                                   if ($alamatquery) {
                                                        $emailquery = mysqli_query($con,"UPDATE tb_pengaturan SET value='$email' WHERE id = '17'");
                                                        if ($emailquery) {
                                                            $cekfav = mysqli_query($con,"SELECT * FROM tb_pengaturan WHERE id = '2'");
                                                            $favold = mysqli_fetch_assoc($cekfav);
                                                            $favlama = $favold['value'];

                                                            $ex_bole = array('jpg','png','jpeg');
                                                            $x_fav = explode('.',$fav);
                                                            $ex_fav = strtolower(end($x_fav));

                                                            if (in_array($ex_fav, $ex_bole) == true) {
                                                                if ($size_fav < 2*MB) {
                                                                    $temp_fav = explode(".",$fav);
                                                                    $nama_fav = round(microtime(true)) . "fav" . '.' . end($temp_fav);
                                                                    $favquery = mysqli_query($con,"UPDATE tb_pengaturan SET value='$nama_fav' WHERE id = '2'");
                                                                     if ($favquery) {
                                                                        move_uploaded_file($tmp_fav,'../base/plugins/images/'.$nama_fav);
                                                                        unlink('../base/plugins/images/'.$favlama);

                                                                        $ceklogo = mysqli_query($con,"SELECT * FROM tb_pengaturan WHERE id = '18'");
                                                                        $logoold = mysqli_fetch_assoc($ceklogo);
                                                                        $logolama = $logoold['value'];

                                                                        $x_logo = explode('.',$logo);
                                                                        $ex_logo = strtolower(end($x_logo));

                                                                        if (in_array($ex_logo, $ex_bole) == true) {
                                                                            if ($size_logo < 2*MB) {
                                                                                 $temp_logo = explode(".",$logo);
                                                                                $nama_logo = round(microtime(true)). "logo" . '.' . end($temp_logo);
                                                                                $logoquery = mysqli_query($con,"UPDATE tb_pengaturan SET value='$nama_logo' WHERE id = '18'");
                                                                                if ($logoquery) {
                                                                                    move_uploaded_file($tmp_logo,'../base/plugins/images/'.$nama_logo);
                                                                                    unlink('../base/plugins/images/'.$logolama);
                                                                                     echo("<meta http-equiv='refresh' content='1'>");
                                                                                }
                                                                            }
                                                                        }else{
                                                                            echo '<div class="alert alert-danger">
                                                                              <strong>Perhatian </strong>ekstensi tidak diperbolehkan 
                                                                            </div>'; 
                                                                        }

                                                                       
                                                                    }


                                                                }else{
                                                                    echo '<div class="alert alert-danger">
                                                              <strong>Perhatian </strong>Ukuran Favicon tidak boleh lebih dari 2MB
                                                            </div>'; 
                                                                }
                                                            }else{
                                                                echo '<div class="alert alert-danger">
                                                              <strong>Perhatian </strong>ekstensi tidak diperbolehkan 
                                                            </div>'; 
                                                            }
                                                        }else{
                                                            echo '<div class="alert alert-danger">
                                                              <strong>Perhatian </strong>Email Gagal Diubah. 
                                                            </div>'; 
                                                        }
                                                   }else{
                                                        echo '<div class="alert alert-danger">
                                                      <strong>Perhatian </strong>Alamat Gagal Diubah. 
                                                    </div>'; 
                                                   }
                                               }else{
                                                echo '<div class="alert alert-danger">
                                                  <strong>Perhatian </strong>Telepon 2 Gagal Diubah. 
                                                </div>'; 
                                            }
                                           }else{
                                            echo '<div class="alert alert-danger">
                                              <strong>Perhatian </strong>Telepon 1 Gagal Diubah. 
                                            </div>'; 
                                        }
                                       }else{
                                        echo '<div class="alert alert-danger">
                                          <strong>Perhatian </strong>Facebook Url Gagal Diubah. 
                                        </div>'; 
                                    }
                                   }else{
                                        echo '<div class="alert alert-danger">
                                          <strong>Perhatian </strong>Nama Web Gagal Diubah. 
                                        </div>'; 
                                   }
                                }   
                            }
                     ?>
                    </div>
                </div>
                <div id="slider" class="tab-pane">
                    <div class="col-md-12">
                        <p class="text-danger"> *NOTE : Pada tab ini akan disimpan beberapa informasi konfigurasi Slider pada website anda lengkapi informasi berikut dengan sesuai.</p>
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                         <div class="form-group">
                            <label class="col-md-12">Gambar Slider 1</label>
                            <div class="col-md-12"> 
                                <input type="file" width="100%" name="slider1" class="form-control" > </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12"> H1 Slider 1</label>
                            <div class="col-md-12">
                                <input type="text" width="100%" name="slider1h1" class="form-control" value="<?=$slider1h1?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">H2 Slider 1</label>
                            <div class="col-md-12">
                                <input type="text" width="100%" name="slider1h2" class="form-control" value="<?=$slider1h2?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Gambar Slider 2</label>
                            <div class="col-md-12">
                                <input type="file" width="100%" name="slider2" class="form-control" ?> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">H1 Slider 2</label>
                            <div class="col-md-12">
                                <input type="text" width="100%" name="slider2h1" class="form-control" value="<?=$slider2h1?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">H2 Slider 2</label>
                            <div class="col-md-12">
                                <input type="text" width="100%" name="slider2h2" class="form-control" value="<?=$slider2h2?>"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" name="btnsliderproses"  class=" btn btn-primary btn-block"  value="Siapkan Website"> </div>
                        </div>
                    </form>
                    <?php 
                        if (isset($_POST['btnsliderproses'])) {
                            $slider1h1 = secure($con,$_POST['slider1h1']);
                            $slider1h2 = secure($con,$_POST['slider1h2']);
                            $slider2h1 = secure($con,$_POST['slider2h1']);
                            $slider2h2 = secure($con,$_POST['slider2h2']);

                            $slider1 = $_FILES['slider1']['name'];
                            $tmp_slider1 = $_FILES['slider1']['tmp_name'];
                            $size_slider1 = $_FILES['slider1']['size'];

                            $slider2 = $_FILES['slider2']['name'];
                            $tmp_slider2 = $_FILES['slider2']['tmp_name'];
                            $size_slider2 = $_FILES['slider2']['size']; 

                            if (empty($slider1h1) || empty($slider1h2) || empty($slider2h1) || empty($slider2h2) || empty($slider1) || empty($slider2)) {
                                echo '<div class="alert alert-danger">
                                              <strong>Perhatian </strong>Silahkan Ulangi Halaman
                                            </div>'; 
                            }else{
                                $slider1h1query = mysqli_query($con,"UPDATE tb_pengaturan SET value= '$slider1h1' WHERE id = '9'");
                                if ($slider1h1query) {
                                    $slider1h2query = mysqli_query($con,"UPDATE tb_pengaturan SET value= '$slider1h2' WHERE id = '10'");
                                    if ($slider1h2query) {
                                        $slider2h1query = mysqli_query($con,"UPDATE tb_pengaturan SET value= '$slider2h1' WHERE id = '11'");
                                            if ($slider2h1query) {
                                                $slider2h2query = mysqli_query($con,"UPDATE tb_pengaturan SET value= '$slider2h2' WHERE id = '12'");
                                                    if ($slider2h2query) {
                                                         $cekslider1 = mysqli_query($con,"SELECT * FROM tb_pengaturan WHERE id = '7'");
                                                            $slider1old = mysqli_fetch_assoc($cekslider1);
                                                            $slider1lama = $slider1old['value'];

                                                            $ex_bole = array('jpg','png','jpeg');
                                                            $x_slider1 = explode('.',$slider1);
                                                            $ex_slider1 = strtolower(end($x_slider1));

                                                            if (in_array($ex_slider1, $ex_bole) == true) {
                                                                if ($size_slider1 < 2*MB) {
                                                                    $temp_slider1 = explode(".",$slider1);
                                                                    $nama_slider1 = round(microtime(true)) . "slider1" . '.' . end($temp_slider1);
                                                                    $slider1query = mysqli_query($con,"UPDATE tb_pengaturan SET value='$nama_slider1' WHERE id = '7'");
                                                                     if ($slider1query) {
                                                                        $g = move_uploaded_file($tmp_slider1,'../base/new/images/'.$nama_slider1);
                                                                        unlink('../base/plugins/images/'.$slider1lama);

                                                                        $cekslider2 = mysqli_query($con,"SELECT * FROM tb_pengaturan WHERE id = '8'");
                                                                        $slider2old = mysqli_fetch_assoc($cekslider2);
                                                                        $slider2lama = $slider2old['value'];

                                                                        $x_slider2 = explode('.',$slider2);
                                                                        $ex_slider2 = strtolower(end($x_slider2));

                                                                        if (in_array($ex_slider2, $ex_bole) == true) {
                                                                            if ($size_slider2 < 2*MB) {
                                                                                 $temp_slider2 = explode(".",$slider2);
                                                                                $nama_slider2 = round(microtime(true)). "logo" . '.' . end($temp_slider2);
                                                                                $slider2query = mysqli_query($con,"UPDATE tb_pengaturan SET value='$nama_slider2' WHERE id = '8'");
                                                                                if ($slider2query) {
                                                                                    move_uploaded_file($tmp_slider2,'../base/new/images/'.$nama_slider2);
                                                                                    unlink('../base/plugins/images/'.$slider2lama);
                                                                                     echo("<meta http-equiv='refresh' content='1'>");
                                                                                }
                                                                            }
                                                                        }else{
                                                                            echo '<div class="alert alert-danger">
                                                                              <strong>Perhatian </strong>ekstensi tidak diperbolehkan 
                                                                            </div>'; 
                                                                        }
                                                                    }
                                                                }else{
                                                                    echo '<div class="alert alert-danger">
                                                              <strong>Perhatian </strong>Ukuran Favicon tidak boleh lebih dari 2MB
                                                            </div>'; 
                                                                }
                                                            }else{
                                                                echo '<div class="alert alert-danger">
                                                              <strong>Perhatian </strong>ekstensi tidak diperbolehkan 
                                                            </div>'; 
                                                            }
                                                       
                                                    }else{
                                                        echo '<div class="alert alert-danger">
                                                          <strong>Perhatian </strong>Slider 2 H2 Gagal Diubah. 
                                                        </div>'; 
                                                    }
                                            }else{
                                                echo '<div class="alert alert-danger">
                                                  <strong>Perhatian </strong>Slider 2 H2 Gagal Diubah. 
                                                </div>'; 
                                            }
                                    }else{
                                        echo '<div class="alert alert-danger">
                                          <strong>Perhatian </strong>Slider 1 H2 Gagal Diubah. 
                                        </div>'; 
                                    }
                                }else{
                                    echo '<div class="alert alert-danger">
                                      <strong>Perhatian </strong>Slider 1 H1 Gagal Diubah. 
                                    </div>'; 
                                }
                            }

                        }

                     ?>
                    </div>
                </div>
                <div id="tentang" class="tab-pane">
                    <div class="col-md-12">
                        <p class="text-danger"> *NOTE : Pada tab ini akan disimpan beberapa informasi konfigurasi pada Halaman Tentang Klinik anda lengkapi informasi berikut dengan sesuai.</p>
                        <form method="POST" class="form-horizontal" id="formabout" enctype="multipart/form-data">
                         <div class="form-group">
                            <label class="col-md-12">Gambar Tentang </label>
                            <div class="col-md-12">
                                <input type="file" width="100%" name="about" class="form-control"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Tentang Klinik</label>
                            <div class="col-md-12">
                                <textarea class="tentang_content form-control" name="tentang" rows="15" placeholder="Masukan Tentang Klinik"><?=$aboutcontent?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Misi Klinik</label>
                            <div class="col-md-12">
                                <textarea class="tentang_misi form-control" name="misi" rows="15" value=""><?=$misiAbout?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Visi Klinik</label>
                            <div class="col-md-12">
                                <textarea class="tentang_visi form-control" name="visi" rows="15" placeholder="Masukan Visi Klinik"><?=$visiAbout?></textarea>
                            </div>
                            <input type="hidden" id="htmls" name="hasil" >
                        </div>                  
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" name="btnAboutproses" class=" btn btn-primary btn-block"  value="Siapkan Website"> </div>
                        </div>
                    </form>
                    <?php 
                        if (isset($_POST['btnAboutproses'])) {
                            $tentang = $_POST['tentang'];
                            $misi = $_POST['misi'];
                            $visi = $_POST['visi'];

                            $about = $_FILES['about']['name'];
                            $tmp_about = $_FILES['about']['tmp_name'];
                            $size_about = $_FILES['about']['size'];
                             $ex_bole = array('jpg','png','jpeg');

                            if (empty($tentang) || empty($misi) || empty($visi) || empty($about)) {
                                echo '<div class="alert alert-danger">
                                  <strong>Perhatian </strong>Data Belum Lengkap
                                </div>';
                            }else{
                                $tentangquery = mysqli_query($con,"UPDATE tb_pengaturan SET value= '$tentang' WHERE id='14'");
                                if ($tentangquery) {
                                    $misiquery = mysqli_query($con,"UPDATE tb_pengaturan SET value= '$misi' WHERE id='15'");
                                    if ($misiquery) {
                                        $visiquery = mysqli_query($con,"UPDATE tb_pengaturan SET value= '$visi' WHERE id='16'");
                                        if ($visiquery) {
                                            $cekabout = mysqli_query($con,"SELECT * FROM tb_pengaturan WHERE id = '13'");
                                            $aboutold = mysqli_fetch_assoc($cekabout);
                                            $aboutlama = $aboutold['value'];

                                            $x_about = explode('.',$about);
                                            $ex_about = strtolower(end($x_about));

                                            if (in_array($ex_about, $ex_bole) == true) {
                                                if ($size_about < 2*MB) {
                                                     $temp_about = explode(".",$about);
                                                    $nama_about = round(microtime(true)). "about" . '.' . end($temp_about);
                                                    $aboutquery = mysqli_query($con,"UPDATE tb_pengaturan SET value='$nama_about' WHERE id = '13'");
                                                    if ($aboutquery) {
                                                        move_uploaded_file($tmp_about,'../base/new/images/'.$nama_about);
                                                        unlink('../base/new/images/'.$aboutlama);
                                                         echo("<meta http-equiv='refresh' content='1'>");
                                                    }
                                                }else{
                                                    echo '<div class="alert alert-danger">
                                                  <strong>Perhatian </strong>Ukuran Gambar Terlalu Besar.
                                                </div>'; 
                                                }
                                            }else{
                                                echo '<div class="alert alert-danger">
                                                  <strong>Perhatian </strong>ekstensi tidak diperbolehkan 
                                                </div>'; 
                                            }
                                        }else{
                                            echo '<div class="alert alert-danger">
                                                  <strong>Perhatian </strong>Visi Gagal diperbarui. 
                                                </div>'; 
                                        }
                                    }else{
                                            echo '<div class="alert alert-danger">
                                                  <strong>Perhatian </strong>Misi Gagal diperbarui. 
                                                </div>'; 
                                        }
                                    }else{
                                            echo '<div class="alert alert-danger">
                                                  <strong>Perhatian </strong>Tentang Klinik Gagal diperbarui. 
                                                </div>'; 
                                        }
                                }

                        }

                     ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
<?php 
    require_once "footer.php";
 ?>
