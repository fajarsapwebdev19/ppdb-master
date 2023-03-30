<?php
    session_start();
    require '../../../koneksi/koneksi.php';

    if(isset($_POST['update']))
    {
        if(isset($_POST['username']))
        {
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
            $kip = $_FILES['kip']['name'];
            $tmp_kip = $_FILES['kip']['tmp_name'];
            $size = $_FILES['kip']['size'];
            $ek = pathinfo($kip, PATHINFO_EXTENSION);
            $ekstensi = array('png', 'jpg', 'jpeg');

            if(empty($kip))
            {
                $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                    <div class="alert-message">
                        File Kosong
                    </div>
                </div>';
                header('location: ../../../User/?page=up_kip');
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
                    header('location: ../../../User/?page=up_kip');
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
                        header('location: ../../../User/?page=up_kip');
                    }
                    else
                    {
                        $berkas = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
                        $data = mysqli_fetch_assoc($berkas);

                        $location = "../../../assets/dokumen/berkas_siswa/kip/".$data['file_kip'];

                        if(file_exists($location))
                        {
                            unlink($location);
                        }

                        $rename_kip = rand().'___'.$kip;

                        $dir = "../../../assets/dokumen/berkas_siswa/kip/".$rename_kip;

                        move_uploaded_file($tmp_kip, $dir);

                        $update = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_kip='$rename_kip', status_upload_kip='Sudah', status_verifikasi_kip='Antrian' WHERE username='$username'");

                        if($update)
                        {
                            $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                                <div class="alert-message">
                                   <em class="fas fa-check-circle"></em> Berhasil Update File KIP
                                </div>
                            </div>';
                            header('location: ../../../User/?page=up_kip');
                        }
                    }
                }
            }
        }
    }
?>