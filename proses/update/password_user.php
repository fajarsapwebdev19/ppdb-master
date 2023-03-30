<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['update_password_admin']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
      $password_lama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password_lama']));
      $password_baru = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password_baru']));
      
      $query_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password_lama'");

      $cek_pass_admin = mysqli_num_rows($query_admin);

      if($cek_pass_admin > 0)
      {
        $update_password_admin = mysqli_query($koneksi, "UPDATE admin SET password='$password_baru' WHERE username='$username'");

        if($update_password_admin)
        {
          $_SESSION['validasi'] = '<div id="auto-close" class="alert alert-success alert-message bg-success text-white" id="auto-close">Berhasil ! Update Password</div>';
          header('location: ../../Admin/?page=update_password');
        }
      }
      else{
        $_SESSION['validasi'] = '<div id="auto-close" class="alert alert-danger alert-message bg-danger text-white" id="auto-close">
        Gagal ! Password Lama Tidak Sesuai</div>';
        header('location: ../../Admin/?page=update_password');
      }
    }
  }elseif(isset($_POST['update_password_user']))
  {
    if(isset($_POST['username'])){
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
      $password_lama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password_lama']));
      $password_baru = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password_baru']));

      $query_pass_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password_lama'");

      $cek_pass_user = mysqli_num_rows($query_pass_user);

      if($cek_pass_user > 0)
      {
        $update_password_user = mysqli_query($koneksi, "UPDATE user SET password='$password_baru' WHERE username='$username'");

        if($update_password_user)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success alert-message bg-success text-white" id="auto-close">Berhasil ! Update Password</div>';
          header('location: ../../User/?page=update_password');
        }
      }else{
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger alert-message bg-danger text-white" id="auto-close">
        Gagal ! Password Lama Tidak Sesuai</div>';
        header('location: ../../User/?page=update_password');
      }
    }
  }
?>