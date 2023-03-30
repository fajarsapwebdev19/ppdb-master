<?php
    session_start();
    require '../../koneksi/koneksi.php';

    if(isset($_POST['upload_kk']))
    {
        if(isset($_POST['username']))
        {
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
            $kk = $_FILES['kk']['name'];
            $tmp_kk = $_FILES['kk']['tmp_name'];
            $size_kk = $_FILES['kk']['size'];
            $ekstensi = array('png','jpg','jpeg','pdf');
            $ek = pathinfo($kk, PATHINFO_EXTENSION);

            $db_app = mysqli_query($koneksi, "SELECT * FROM aplikasi");
            $app = mysqli_fetch_assoc($db_app);
            $batas = $app['batas_pengisian'];
            $tanggal = date('Y-m-d');
            $date = new DateTime($tanggal);
            $end = new DateTime($batas);

            if($date >= $end)
            {
                $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white" id="auto-close">
                    <div class="alert-message">
                        <em class="fas fa-times-circle"></em> Jangan Main Rubah Sembarangan Ya :)
                    </div>
                </div>';
                header('location: ../../User/?page=up_kk');
            }else{
                if(empty($kk))
                {
                    $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger text-white bg-danger alert-message">Hayooooo Mao Ngapain</div>';
                    header('location: ../../User/?page=up_kk');
                }else{
                    if($size_kk >= 3000000)
                    {
                        $_SESSION['val'] = '<div id="auto-close" class="alert alert-message alert-danger text-white bg-danger">Ukuran File Maximal 3 Mb</div>';
                        header('location: ../../User/?page=up_kk');
                    }else{
                        if(!in_array($ek, $ekstensi))
                        {
                            $_SESSION['val'] = '<div id="auto-close" class="alert alert-warning alert-message text-primary bg-warning">Ekstensi File Hanya Mendukung png,jpg,jpeg,dan pdf</div>';
                            header('location: ../../User/?page=up_kk');
                        }else{
                            $dir = '../../assets/dokumen/berkas_siswa/kk/'.$kk;
                            move_uploaded_file($tmp_kk, $dir);

                            $upload = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_kk='$kk', status_verifikasi_kk='Antrian', status_upload_kk='Sudah' WHERE username='$username'");

                            if($upload)
                            {
                                $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                                <div class="alert-message"><em class="fas fa-check-circle"></em> Berhasil Upload KK</div></div>';
                                header('location: ../../User/?page=up_kk');
                            }
                        }
                    }
                }
            }
        }
    }elseif(isset($_POST['cutoff']))
    {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white" id="auto-close">
            <div class="alert-message">
                <em class="fas fa-times-circle"></em> Input Data Sudah Di Tutup
            </div>
        </div>';
        header('location: ../../User/?page=up_kk');
    }
?>