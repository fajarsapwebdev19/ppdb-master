<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['verifikasi_ijazah']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $status_verifikasi_ijazah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['verifikasi_berkas_ijazah'])));

      if(empty($status_verifikasi_ijazah))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            <em class="fas fa-times-circle"></em> Gagal Verifikasi Karna Kolom Verifikasi Kosong
          </div>
        </div>';
        header('location: ../../Admin/?page=ver_file');
      }else{
        $ver_ijazah = mysqli_query($koneksi, "UPDATE berkas_siswa SET status_verifikasi_ijazah='$status_verifikasi_ijazah' WHERE username='$username'");

        if($ver_ijazah)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
            <div class="alert-message">
              <em class="fas fa-check-circle"></em> Berhasil Verifikasi Berkas Ijazah
            </div>
          </div>';
          header('location: ../../Admin/?page=ver_file');
        }
      }
    }
  }elseif(isset($_POST['verifikasi_kk']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $status_verifikasi_kk = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['verifikasi_berkas_kk'])));

      if(empty($status_verifikasi_kk))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            <em class="fas fa-times-circle"></em> Gagal Verifikasi Karna Kolom Verifikasi Kosong
          </div>
        </div>';
        header('location: ../../Admin/?page=ver_file');
      }else{
        $ver_kk = mysqli_query($koneksi, "UPDATE berkas_siswa SET status_verifikasi_kk='$status_verifikasi_kk' WHERE username='$username'");

        if($ver_kk)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
            <div class="alert-message">
              <em class="fas fa-check-circle"></em> Berhasil Verifikasi Berkas Kartu Keluarga
            </div>
          </div>';
          header('location: ../../Admin/?page=ver_file');
        }
      }
    }
  }elseif(isset($_POST['verifikasi_akta']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $status_verifikasi_akta = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['verifikasi_berkas_akta'])));

      if(empty($status_verifikasi_akta))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            <em class="fas fa-times-circle"></em> Gagal Verifikasi Karna Kolom Verifikasi Kosong
          </div>
        </div>';
        header('location: ../../Admin/?page=ver_file');
      }else{
        $ver_akta = mysqli_query($koneksi, "UPDATE berkas_siswa SET status_verifikasi_akta='$status_verifikasi_akta' WHERE username='$username'");

        if($ver_akta)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
            <div class="alert-message">
              <em class="fas fa-check-circle"></em> Berhasil Verifikasi Berkas Akta Lahir
            </div>
          </div>';
          header('location: ../../Admin/?page=ver_file');
        }
      }
    }
  }elseif(isset($_POST['verifikasi_kip']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $status_verifikasi_kip = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['verifikasi_berkas_kip'])));

      if(empty($status_verifikasi_kip))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            <em class="fas fa-times-circle"></em> Gagal Verifikasi Karna Kolom Verifikasi Kosong
          </div>
        </div>';
        header('location: ../../Admin/?page=ver_file');
      }else{
        $ver_kip = mysqli_query($koneksi, "UPDATE berkas_siswa SET status_verifikasi_kip='$status_verifikasi_kip' WHERE username='$username'");

        if($ver_kip)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
            <div class="alert-message">
              <em class="fas fa-check-circle"></em> Berhasil Verifikasi Berkas Kartu Indonesia Pintar
            </div>
          </div>';
          header('location: ../../Admin/?page=ver_file');
        }
      }
    }
  }elseif(isset($_POST['verifikasi_kks']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $status_verifikasi_kks = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['verifikasi_berkas_kks'])));

      if(empty($status_verifikasi_kks))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            <em class="fas fa-times-circle"></em> Gagal Verifikasi Karna Kolom Verifikasi Kosong
          </div>
        </div>';
        header('location: ../../Admin/?page=ver_file');
      }else{
        $ver_kks = mysqli_query($koneksi, "UPDATE berkas_siswa SET status_verifikasi_kks='$status_verifikasi_kks' WHERE username='$username'");

        if($ver_kks)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
            <div class="alert-message">
              <em class="fas fa-check-circle"></em> Berhasil Verifikasi Berkas Kartu Kesejahteraan Sosial
            </div>
          </div>';
          header('location: ../../Admin/?page=ver_file');
        }
      }
    }
  }elseif(isset($_POST['verifikasi_foto']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $status_verifikasi_foto = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['verifikasi_fotos'])));

      if(empty($status_verifikasi_foto))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            <em class="fas fa-times-circle"></em> Gagal Verifikasi Karna Kolom Verifikasi Kosong
          </div>
        </div>';
        header('location: ../../Admin/?page=ver_file');
      }else{
        $ver_kks = mysqli_query($koneksi, "UPDATE foto_siswa SET status_verifikasi='$status_verifikasi_foto' WHERE username='$username'");

        if($ver_kks)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
            <div class="alert-message">
              <em class="fas fa-check-circle"></em> Berhasil Verifikasi Foto Siswa            
            </div>
          </div>';
          header('location: ../../Admin/?page=ver_file');
        }
      }
    }
  }
?>