 id="auto-close"<?php
    session_start();
    require '../../../koneksi/koneksi.php';

    if(isset($_POST['update']))
    {
        if(isset($_POST['username']))
        {
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
            $kks = $_FILES['kks']['name'];
            $tmp_kks = $_FILES['kks']['tmp_name'];
            $size = $_FILES['kks']['size'];
            $ek = pathinfo($kks, PATHINFO_EXTENSION);
            $ekstensi = array('png', 'jpg', 'jpeg');

            if(empty($kks))
            {
                $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                    <div class="alert-message">
                        File Kosong
                    </div>
                </div>';
                header('location: ../../../User/?page=up_kks');
            }
            else
            {
                if(!in_array($ek, $ekstensi))
                {
                    $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                        <div class="alert-message">
                            Ekstensi File Mendukung jpg,jpeg,png
                        </div>
                    </div>';
                    header('location: ../../../User/?page=up_kks');
                }
                else
                {
                    if($size >= 3000000)
                    {
                        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                            <div class="alert-message">
                                Ukuran File Maximal 3 MB
                            </div>
                        </div>';
                        header('location: ../../../User/?page=up_kks');
                    }
                    else
                    {
                        $berkas = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
                        $data = mysqli_fetch_assoc($berkas);

                        $location = "../../../assets/dokumen/berkas_siswa/kks/".$data['file_kks'];

                        if(file_exists($location))
                        {
                            unlink($location);
                        }

                        $rename_kks = rand().'___'.$kks;

                        $dir = "../../../assets/dokumen/berkas_siswa/kks/".$rename_kks;

                        move_uploaded_file($tmp_kks, $dir);

                        $update = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_kks='$rename_kks', status_upload_kks='Sudah', status_verifikasi_kks='Antrian' WHERE username='$username'");

                        if($update)
                        {
                            $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                                <div class="alert-message">
                                   <em class="fas fa-check-circle"></em> Berhasil Update File KKS
                                </div>
                            </div>';
                            header('location: ../../../User/?page=up_kks');
                        }
                    }
                }
            }
        }
    }
?>