<?php
session_start();
require '../../koneksi/koneksi.php';

$username = mysqli_real_escape_string($koneksi, $_POST['username']);

$permision = mysqli_query($koneksi, "UPDATE kesempatan_ubah SET kesempatan_ubah='3' WHERE username='$username'");

if($permision)
{
    $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
          <div class="alert-message">
            <em class="fas fa-check-circle"></em> Berhasil Izinkan Peserta Ubah Data
          </div>
        </div>';
    header('location: ../../Admin/?page=calon');
}
?>