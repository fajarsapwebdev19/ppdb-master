<?php
    session_start();
    require '../../koneksi/koneksi.php';

    if(isset($_POST['upload_akta']))
    {
        if(isset($_POST['username']))
        {
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
            $akta = $_FILES['akta']['name'];
            $tmp_akta = $_FILES['akta']['tmp_name'];
            $size_akta = $_FILES['akta']['size'];
            $ek = pathinfo($akta, PATHINFO_EXTENSION);
            $ekstensi = array('png','jpg','jpeg','pdf');


            // keamanan untuk user bandel
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
                header('location: ../../User/?page=up_akta');
            }else{
                if(empty($akta))
                {
                    $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                        <div class="alert-message">
                            Hayo Mao Ngapain
                        </div>
                    </div>';
                    header('location: ../../User/?page=up_akta');
                }else{
                    if(!in_array($ek, $ekstensi))
                    {
                        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                            <div class="alert-message">
                                Ekstensi Hanya Mendukung png,jpg,jpeg
                            </div>
                        </div>';
                        header('location: ../../User/?page=up_akta');
                    }
                    else{
                        if($size_akta > 3000000)
                        {
                            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                                <div class="alert-message">
                                    Ukuran File Maximal 3MB
                                </div>
                            </div>';
                            header('location: ../../User/?page=up_akta');
                        }
                        else{
                            $dir = '../../assets/dokumen/berkas_siswa/akta/'.$akta;
                            move_uploaded_file($tmp_akta, $dir);

                            $upload = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_akta='$akta', status_upload_akta='Sudah', status_verifikasi_akta='Antrian' WHERE username='$username'");

                            if($upload)
                            {
                                $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                                    <div class="alert-message">
                                        <em class="fas fa-check-circle"></em> Berhasil Upload File Akta
                                    </div>
                                </div>';
                                header('location: ../../User/?page=up_akta');
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
        header('location: ../../User/?page=up_akta');
    }
?>