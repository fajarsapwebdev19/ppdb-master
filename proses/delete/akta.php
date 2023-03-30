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

      $url_file = "../../assets/dokumen/berkas_siswa/akta/".$data['file_akta'];

      if(file_exists($url_file))
      {
        unlink($url_file);
      }

      $delete = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_akta='', status_upload_akta='Belum', status_verifikasi_akta='' WHERE username='$username'");

      if($delete)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
          <div class="alert-message">
            <em class="fas fa-check-circle"></em> Berhasil Hapus File Akta
          </div>
        </div>';
        header('location: ../../User/?page=up_akta');
      }
    }
  }
?>