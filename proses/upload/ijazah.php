<?php
    session_start();
    require '../../koneksi/koneksi.php';

    if(isset($_POST['upload_ijazah']))
    {
        if(isset($_POST['username']))
        {
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
            $ijazah = $_FILES['ijazah']['name'];
            $tmp_ijazah = $_FILES['ijazah']['tmp_name'];
            $size = $_FILES['ijazah']['size'];
            $ek = array('png','jpg','jpeg','pdf');
            $ekstensi = pathinfo($ijazah, PATHINFO_EXTENSION);

            $db_app = mysqli_query($koneksi, "SELECT * FROM aplikasi");
            $app = mysqli_fetch_assoc($db_app);

            $batas = $app['batas_pengisian'];
            $tanggal = date('Y-m-d');

            if($tanggal >= $batas)
            {
                $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white" id="auto-close">
                    <div class="alert-message">
                        <em class="fas fa-times-circle"></em> Jangan Main Rubah Sembarangan Ya :)
                    </div>
                </div>';
                header('location: ../../User/?page=up_ijzh');
            }else{
                if(empty($ijazah))
                {
                    $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                        <div class="alert-message">
                            Hayooooo Mao Ngapain
                        </div>
                    </div>';
                }else{
                    if(!in_array($ekstensi, $ek))
                    {
                        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                            <div class="alert-message">
                                Ekstensi File Hanya Mendukung png,jpg,jpeg,dan pdf
                            </div>
                        </div>';
                        header('location: ../../User/?page=up_ijzh');
                    }else{
                        if($size > 3000000)
                        {
                            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                                <div class="alert-message">
                                    Ukuran File Maximal 3 MB
                                </div>
                            </div>';
                            header('location: ../../User/?page=up_ijzh');
                        }else{
                            $dir = '../../assets/dokumen/berkas_siswa/ijazah/'.$ijazah;

                            move_uploaded_file($tmp_ijazah, $dir);

                            $upload = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_ijazah_smp='$ijazah', status_verifikasi_ijazah='Antrian', status_upload_ijazah='Sudah' WHERE username='$username'");

                            if($upload)
                            {
                                $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                                    <div class="alert-message">
                                        <em class="fas fa-check-circle"></em> Berhasil Upload Ijazah SMP
                                    </div>
                                </div>';
                                header('location: ../../User/?page=up_ijzh');
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
        header('location: ../../User/?page=up_ijzh');
    }
?>