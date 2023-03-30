<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['blokir_user']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $status_akun = "Tidak Aktif";

      $user = mysqli_query($koneksi, "UPDATE user SET status_akun='$status_akun' WHERE username='$username'");

      if($user)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
          <div class="alert-message">
            <em class="fas fa-check-circle"></em> Berhasil Blokir Akun
          </div>
        </div>';
        header('location: ../../Admin/?page=acn_sw');
      }
    }
  }elseif(isset($_POST['actived_user']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $status_akun = "Aktif";

      $user = mysqli_query($koneksi, "UPDATE user SET status_akun='$status_akun' WHERE username='$username'");

      if($user)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
          <div class="alert-message">
            <em class="fas fa-check-circle"></em> Berhasil Aktivasi Akun
          </div>
        </div>';
        header('location: ../../Admin/?page=acn_sw');
      }
    }
  }
?>