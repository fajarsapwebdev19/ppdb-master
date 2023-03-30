<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['hapus_admin']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

      $d_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
      
      $data = mysqli_fetch_assoc($d_admin);

      if(empty($data['foto']))
      {
        $delete = mysqli_query($koneksi, "DELETE FROM admin WHERE username='$username'");
      }
      else
      {
        if(file_exists('../../Foto/'.$data['foto'])){
          unlink('../../Foto/'.$data['foto']);
        }

        if(file_exists('../../doc/'.$data['sk_tugas'])){
          unlink('../../doc/'.$data['sk_tugas']);
        }

        $delete = mysqli_query($koneksi, "DELETE FROM admin WHERE username='$username'");
      }

      if($delete)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><div class="alert-message"><em class="fas fa-check-circle"></em> Berhasil Hapus Akun</div></div>';
        header('location: ../../Admin/?page=acn_adm');
      }
    }
  }
  elseif(isset($_POST['hapus_user']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

      $usr = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
      $user = mysqli_fetch_assoc($usr);

      if(empty($user['foto']))
      {
        $delete = mysqli_query($koneksi, "DELETE FROM user WHERE username='$username'");
      }
      else{
        if(file_exists('../../Foto/'.$user['foto']))
        {
          unlink('../../Foto/'.$user['foto']);
        }

        $delete = mysqli_query($koneksi, "DELETE FROM user WHERE username='$username'");
      }

      $berkas_siswa = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
      $berkas = mysqli_fetch_assoc($berkas_siswa);

      $db_berkas = mysqli_num_rows($berkas_siswa);

      if($db_berkas == 1)
      {
        $ijazah_smp = $berkas['file_ijazah_smp'];
        $kk = $berkas['file_kk'];
        $akta = $berkas['file_akta'];
        $kip = $berkas['file_kip'];
        $kks = $berkas['file_kks'];

        if(file_exists('../../assets/dokumen/berkas_siswa/ijazah/'.$ijazah_smp))
        {
          unlink('../../assets/dokumen/berkas_siswa/ijazah/'.$ijazah_smp);
        }

        if(file_exists('../../assets/dokumen/berkas_siswa/kk/'.$kk))
        {
          unlink('../../assets/dokumen/berkas_siswa/kk/'.$kk);
        }

        if(file_exists('../../assets/dokumen/berkas_siswa/akta/'.$akta))
        {
          unlink('../../assets/dokumen/berkas_siswa/akta/'.$akta);
        }

        if(file_exists('../../assets/dokumen/berkas_siswa/kip/'.$kip))
        {
          unlink('../../assets/dokumen/berkas_siswa/kip/'.$kip);
        }

        if(file_exists('../../assets/dokumen/berkas_siswa/kks/'.$kks))
        {
          unlink('../../assets/dokumen/berkas_siswa/kks/'.$kks);
        }

        $delete .= mysqli_query($koneksi, "DELETE FROM berkas_siswa WHERE username='$username'");
      }

      $foto = mysqli_query($koneksi, "SELECT * FROM foto_siswa WHERE username='$username'");
      $ft = mysqli_fetch_assoc($foto);

      $db_ft = mysqli_num_rows($foto);

      if($db_ft == 1)
      {
        if(file_exists('../../assets/dokumen/foto_siswa/'.$ft['foto']))
        {
          unlink('../../assets/dokumen/foto_siswa/'.$ft['foto']);
        }

        $delete .= mysqli_query($koneksi, "DELETE FROM foto_siswa WHERE username='$username'");
      }

      if($delete)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white"><div class="alert-message"><em class="fas fa-check-circle"></em> Berhasil Hapus Akun</div></div>';
        header('location: ../../Admin/?page=acn_sw');
      }
    }
  }
?>