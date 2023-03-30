<?php
    session_start();
    require '../../koneksi/koneksi.php';

    if(isset($_POST['upload_foto']))
    {
        if(isset($_POST['username'])){
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
            $foto = $_FILES['foto']['name'];
            $tmp_foto = $_FILES['foto']['tmp_name'];
            $size = $_FILES['foto']['size'];
            $ek = pathinfo($foto, PATHINFO_EXTENSION);
            $ekstensi = array('jpg','jpeg','png');

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
                header('location: ../../User/?page=up_ft');
            }else{
                if(empty($foto))
                {
                    $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                        <div class="alert-message">
                            Hayyo Mao Ngapain
                        </div>
                    </div>';
                    header('location: ../../User/?page=up_ft');
                }else{
                    if(!in_array($ek, $ekstensi))
                    {
                        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                            <div class="alert-message">
                                Ekstensi File mendukung jpg,jpeg,dan png
                            </div>
                        </div>';
                        header('location: ../../User/?page=up_ft');
                    }
                    else{
                        if($size >= 3000000)
                        {
                            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                                <div class="alert-message">
                                    Ukuran File Maximal 3MB
                                </div>
                            </div>';
                            header('location: ../../User/?page=up_ft');
                        }else{
                            $dir = '../../assets/dokumen/foto_siswa/'.$foto;

                            move_uploaded_file($tmp_foto, $dir);

                            $upload = mysqli_query($koneksi, "UPDATE foto_siswa SET foto='$foto',status_upload='Sudah', status_verifikasi='Antrian' WHERE username='$username'");

                            if($upload)
                            {
                                $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                                    <div class="alert-message">
                                        <em class="fas fa-check-circle"></em> Berhasil Upload Foto Siswa
                                    </div>
                                </div>';
                                header('location: ../../User/?page=up_ft');
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
        header('location: ../../User/?page=up_ft');
    }
?>