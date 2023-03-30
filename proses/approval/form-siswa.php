<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['verifikasi']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $status_approval = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['status_approval'])));

      if(empty($status_approval))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            <em class="fas fa-times-circle"></em> Gagal Belum Milih Salah Satu
          </div>
        </div>';
        header('location: ../../Admin/?page=ver_form');
      }
      else{
        if($status_approval == "Terima")
        {
          $verifikasi = mysqli_query($koneksi, "UPDATE data_peserta_baru SET status_approval='$status_approval' WHERE username='$username'");
        }
        elseif($status_approval == "Tolak")
        {
          $keterangan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['alasan_tolak'])));
          $verifikasi = mysqli_query($koneksi, "UPDATE data_peserta_baru SET status_approval='$status_approval', keterangan_tolak='$keterangan' WHERE username='$username'");
        }
      }

      if($verifikasi)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
          <div class="alert-message">
            <em class="fas fa-check-circle"></em> Berhasil Verifikasi Data
          </div>
        </div>';
        header('location: ../../Admin/?page=ver_form');
      }
    }
  }
  else if(isset($_POST['hapus']))
  {
    if(isset($_POST['id']))
    {
      $id = mysqli_real_escape_string($koneksi, $_POST['id']);

      $hapus = mysqli_query($koneksi, "DELETE FROM data_peserta_baru WHERE id='$id'");

      if($hapus)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
          <div class="alert-message">
            <em class="fas fa-check-circle"></em> Berhasil Hapus Data
          </div>
        </div>';
        header('location: ../../Admin/?page=ver_form');
      }
    }
  }
?>