<?php
    session_start();
    require '../../koneksi/koneksi.php';

    if(isset($_POST['hapus']))
    {
        if(isset($_POST['username']))
        {
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

            $berkas = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
            $data = mysqli_fetch_assoc($berkas);

            $location = "../../assets/dokumen/berkas_siswa/kks/".$data['file_kks'];

            if(file_exists($location))
            {
                unlink($location);
            }

            $delete = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_kks='', status_upload_kks='Belum', status_verifikasi_kks='' WHERE username='$username'");

            if($delete)
            {
                $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                    <div class="alert-message">
                        <em class="fas fa-check-circle"></em> Berhasil Hapus Berkas File KKS
                    </div>
                </div>';
                header('location: ../../User/?page=up_kks');
            }
        }
    }
?>