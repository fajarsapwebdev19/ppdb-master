<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['terima_admin']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
      $tanggal_terima = date('Y-m-d');
      $status_registrasi = "Terima";
      $status_akun = "Aktif";

      $app_adm = mysqli_query($koneksi, "UPDATE admin SET status_registrasi='$status_registrasi', status_akun='$status_akun', tanggal_diterima='$tanggal_terima' WHERE username='$username'");

      if($app_adm)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success alert-message bg-success text-white">Berhasil !, Approval Akun</div>';
        header('location: ../../Admin/?page=app_adm');
      }
    }
  }
  elseif(isset($_POST['tolak_admin']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
      $tanggal_terima = "";
      $tanggal_tolak = date('Y-m-d');
      $status_registrasi = "Tolak";
      $status_akun = "Tidak Aktif";

      $rej_adm = mysqli_query($koneksi, "UPDATE admin SET status_registrasi='$status_registrasi', status_akun='$status_akun', tanggal_diterima='$tanggal_terima',tanggal_tolak='$tanggal_tolak' WHERE username='$username'");

      if($rej_adm)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success alert-message bg-success text-white">Berhasil !, Reject Akun</div>';
        header('location: ../../Admin/?page=app_adm');
      }
    }
  }elseif(isset($_POST['terima_casis']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
      $status_registrasi = "Terima";
      $status_akun = "Aktif";
      $tanggal_terima = date('Y-m-d');

      $approv_casis = mysqli_query($koneksi, "UPDATE user SET status_registrasi='$status_registrasi', status_akun='$status_akun', tanggal_terima='$tanggal_terima' WHERE username='$username'");

      if($approv_casis)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white alert-message">Berhasil, Approval Akun</div>';
        header('location: ../../Admin/?page=app_sw');
      }
    }
  }
  elseif(isset($_POST['tolak_casis']))
  {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
      $status_registrasi = "Tolak";
      $status_akun = "Tidak Aktif";
      $tanggal_tolak = date('Y-m-d');

      $rej_casis = mysqli_query($koneksi, "UPDATE user SET status_registrasi='$status_registrasi', status_akun='$status_akun', tanggal_tolak='$tanggal_tolak' WHERE username='$username'");
      if($rej_casis)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white alert-message">Berhasil, Reject Akun</div>';
        header('location: ../../Admin/?page=app_sw');
      }
  }
?>