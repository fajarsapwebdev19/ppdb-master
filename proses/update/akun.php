<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['update_admin']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $nama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama'])));
      $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_kelamin'])));
      $tempat_lahir = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tempat_lahir'])));
      $tanggal_lahir = mysqli_real_escape_string($koneksi, htmlspecialchars(trim(date('Y-m-d', strtotime($_POST['tanggal_lahir'])))));
      $agama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['agama'])));
      $no_telp = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_telp'])));
      $no_sk_tugas = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_sk_tugas'])));
      $tgl_sk_tugas = mysqli_real_escape_string($koneksi, htmlspecialchars(trim(date('Y-m-d', strtotime($_POST['tgl_sk_tugas'])))));
      $jabatan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jabatan'])));

      $update = mysqli_query($koneksi, "UPDATE admin SET nama='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', agama='$agama', no_telp='$no_telp', no_sk_tugas='$no_sk_tugas', tgl_sk_tugas='$tgl_sk_tugas' WHERE username='$username'");

      if($update)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><div class="alert-message"><em class="fas fa-check-circle"></em> Berhasil Upate Data !</div></div>';
        header('location: ../../Admin/?page=acn_adm');
      }
    }
  }
  elseif(isset($_POST['update_user']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $nama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama'])));
      $jk = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_kelamin'])));
      $tempat_lahir = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tempat_lahir'])));
      $tanggal_lahir = mysqli_real_escape_string($koneksi, htmlspecialchars(trim(date('Y-m-d', strtotime($_POST['tanggal_lahir'])))));
      $nik = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nik'])));
      $agama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['agama'])));
      $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['alamat'])));
      $rt = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['rt'])));
      $rw = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['rw'])));
      $no_telp = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_telp'])));

      $update_user = mysqli_query($koneksi, "UPDATE user SET nama='$nama',jenis_kelamin='$jk', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', nik='$nik', agama='$agama', alamat='$alamat', rt='$rt', rw='$rw', no_telp='$no_telp' WHERE username='$username'");

      if($update_user)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><div class="alert-message"><em class="fas fa-check-circle"></em> Berhasil Upate Data !</div></div>';
        header('location: ../../Admin/?page=acn_sw');
      }
      
    }
  }
?>