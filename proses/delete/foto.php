<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['delete']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

      $berkas = mysqli_query($koneksi, "SELECT * FROM foto_siswa WHERE username='$username'");
      $data = mysqli_fetch_assoc($berkas);

      $file_location = "../../assets/dokumen/foto_siswa/".$data['foto'];

      if(file_exists($file_location))
      {
        unlink($file_location);
      }

      $delete = mysqli_query($koneksi, "UPDATE foto_siswa SET foto='', status_upload='Belum', status_verifikasi='' WHERE username='$username'");

      if($delete)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
          <div class="alert-message">
            <em class="fas fa-check-circle"></em> Berhasil Hapus Foto Siswa
          </div>
        </div>';
        header('location: ../../User/?page=up_ft');
      }
    }
  }
?>