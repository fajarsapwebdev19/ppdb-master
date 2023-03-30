<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['nonactive']))
  {
    if(isset($_POST['username']))
    {
      $status_akun = "Tidak Aktif";
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

      // jaga jaga dari user bandel
      $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
      $cek_data = mysqli_num_rows($query);

      if($cek_data == 0)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
        <div class="alert-message"><em class="fas fa-times-circle"></em> Hayo Mao Ngapain wkwk </div>
        </div>';
        header('location: ../../Admin/?page=acn_adm');
      }
      else{
        $nonact = mysqli_query($koneksi, "UPDATE admin SET status_akun='$status_akun' WHERE username='$username'");
        
        if($nonact)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><div class="alert-message"><em class="fas fa-check-circle"></em> Berhasil Blokir Akun</div></div>';
          header('location: ../../Admin/?page=acn_adm');
        }
      }
    }
  }elseif(isset($_POST['active']))
  {
    if(isset($_POST['username']))
    {
      $status_akun = "Aktif";
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

      // jaga jaga dari user bandel
      $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
      $cek_data = mysqli_num_rows($query);

      if($cek_data == 0)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
        <div class="alert-message"><em class="fas fa-times-circle"></em> Hayo Mao Ngapain wkwk </div>
        </div>';
        header('location: ../../Admin/?page=acn_adm');
      }
      else{
        $nonact = mysqli_query($koneksi, "UPDATE admin SET status_akun='$status_akun' WHERE username='$username'");

        if($nonact)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><div class="alert-message"><em class="fas fa-check-circle"></em> Berhasil Aktifkan Kembali Akun</div></div>';
          header('location: ../../Admin/?page=acn_adm');
        }
      }
    }
  }
?>