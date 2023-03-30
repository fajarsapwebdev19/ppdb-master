<?php
    session_start();
    require '../../koneksi/koneksi.php';

    if(isset($_POST['delete']))
    {
        if(isset($_POST['username']))
        {
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

            $berkas = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
            $data = mysqli_fetch_assoc($berkas);

            $location = "../../assets/dokumen/berkas_siswa/kk/".$data['file_kk'];
            
            if(file_exists($location))
            {
                unlink($location);
            }

            $delete = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_kk='', status_upload_kk='Belum', status_verifikasi_kk='' WHERE username='$username'");

            if($delete)
            {
                $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                    <div class="alert-message">
                        <em class="fas fa-check-circle"></em> Berhasil Hapus File KK
                    </div>
                </div>';
                header('location: ../../User/?page=up_kk');
            }

        }
    }
?>