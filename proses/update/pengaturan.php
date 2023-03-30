<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['save_home']))
  {
    if(isset($_POST['id']))
    {
      $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
      $judul_header = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['judul_header']));
      $tahun_ajaran = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['tahun_ajaran']));
      $warna_header = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['warna_header']));
      $warna_tombol = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['warna_tombol']));
      $alur_registrasi_admin = mysqli_real_escape_string($koneksi, $_POST['alur_reg_admin']);
      $alur_registrasi_casis = mysqli_real_escape_string($koneksi, $_POST['alur_reg_casis']);


      $update_home = mysqli_query($koneksi, "UPDATE halaman_awal SET judul_header='$judul_header',th_ajaran='$tahun_ajaran',warna_header='$warna_header',warna_tombol_login='$warna_tombol',alur_registrasi_admin='$alur_registrasi_admin',alur_registrasi_casis='$alur_registrasi_casis' WHERE id='$id'");

      if($update_home)
      {
        $_SESSION['validasi'] = '<div id="auto-close" class="alert alert-success bg-success text-white alert-message" id="auto-close">
        Berhasil Simpan Pengaturan !</div>';
        header('location: ../../Admin/?page=set_home');
      }

    }
  }
  elseif(isset($_POST['save_aplikasi']))
  {
    if(isset($_POST['id']))
    {
      $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
      $nama_sekolah = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_sekolah']));
      $batas_pengisian = mysqli_real_escape_string($koneksi, htmlspecialchars(date('Y-m-d', strtotime($_POST['batas_pengisian']))));
      $warna_header = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['warna_header']));
      $auto_close_alert = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['auto_close_alert']));
      $info_admin = mysqli_real_escape_string($koneksi, $_POST['info_admin']);
      $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
      $bidang = mysqli_real_escape_string($koneksi, $_POST['bidang']);

      // foto logo sekolah
      $logo_sekolah = $_FILES['logo_sekolah']['name'];
      $tmp_logo_sekolah = $_FILES['logo_sekolah']['tmp_name'];
      $size_logo = $_FILES['logo_sekolah']['size'];
      $ex = pathinfo($logo_sekolah, PATHINFO_EXTENSION);
      $extension = array('png','jpg','jpeg');


      if(empty($_FILES['logo_sekolah']['name']))
      {
        $update_aplikasi = mysqli_query($koneksi, "UPDATE aplikasi SET nama_sekolah='$nama_sekolah',batas_pengisian='$batas_pengisian',warna_header='$warna_header',auto_close_alert='$auto_close_alert',info_admin='$info_admin', bidang='$bidang', alamat='$alamat' WHERE id='$id'");
      }
      else{
        if(!in_array($ex, $extension))
        {
          $_SESSION['validasi'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white alert-message" id="auto-close">
          Gagal, Ekstensi Yang Di Izinkan Hanya png,jpg,jpeg</div>';
          header('location: ../../Admin/?page=set_apl');
        }else{
          if($size_logo > 2000000)
          {
            $_SESSION['validasi'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white alert-message" id="auto-close">Gagal, Batas Ukuran File Hanya 2 MB saja</div>';
            header('location: ../../Admin/?page=set_apl');
          }else{
            // hapus data lama jika ada

            $pengaturan_aplikasi = mysqli_query($koneksi, "SELECT * FROM aplikasi WHERE id='$id'");
            $data_lama = mysqli_fetch_assoc($pengaturan_aplikasi);

            if(file_exists('../../assets/img/logo/'.$data_lama['logo_sekolah']))
            {
              unlink('../../assets/img/logo/'.$data_lama['logo_sekolah']);
            }

            // lakukan penyimpanan data
            $dir = '../../assets/img/logo/'.$logo_sekolah;

            move_uploaded_file($tmp_logo_sekolah, $dir);

            $update_aplikasi = mysqli_query($koneksi, "UPDATE aplikasi SET nama_sekolah='$nama_sekolah',batas_pengisian='$batas_pengisian',warna_header='$warna_header',auto_close_alert='$auto_close_alert',info_admin='$info_admin', logo_sekolah='$logo_sekolah', bidang='$bidang', alamat='$alamat' WHERE id='$id'");
          }
        }
      }

      if($update_aplikasi)
      {
        $_SESSION['validasi'] = '<div id="auto-close" class="alert alert-success bg-success text-white alert-message" id="auto-close">Berhasil Update Pengaturan !</div>';
        header('location: ../../Admin/?page=set_apl');
      }
    }
  }
  elseif(isset($_POST['save_pengaturan_login']))
  {
    if(isset($_POST['id']))
    {
      $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
      $warna_tombol = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['warna_tombol']));
      $tahun_ajaran = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['tahun_ajaran']));
      $vektor = $_FILES['vektor']['name'];
      $tmp_vektor = $_FILES['vektor']['tmp_name'];
      $size_vek = $_FILES['vektor']['size'];
      $ex_vek = array('png');
      $extension_vek = pathinfo($vektor, PATHINFO_EXTENSION);

      if(empty($vektor)){
        $update_login = mysqli_query($koneksi, "UPDATE halaman_login SET warna_tombol_login='$warna_tombol', tahun_ajaran='$tahun_ajaran' WHERE id='$id'");
      }else{
        if($size_vek > 2000000)
        {
          $_SESSION['validasi'] = '<div id="auto-close" class="alert alert-danger alert-message bg-danger text-white" id="auto-close">
          Gagal, Batas Maksimal Upload Adalah 2 MB</div>';
          header('location: ../../Admin/?page=set_log');
        }else{
          if(!in_array($extension_vek,$ex_vek))
          {
            $_SESSION['validasi'] = '<div id="auto-close" class="alert alert-danger alert-message bg-danger text-white" id="auto-close">
            Gagal, Ekstensi Vektor Hanya Mendukung svg</div>';
            header('location: ../../Admin/?page=set_log');
          }else{
            //hapus data sementara
            $q_login = mysqli_query($koneksi, "SELECT * FROM halaman_login WHERE id='$id'");
            $data_vektor = mysqli_fetch_assoc($q_login);

            if(file_exists("../../Foto/".$data_vektor['vektor']))
            {
              unlink("../../Foto/".$data_vektor['vektor']);
            }

            // upload file dan simpan file
            $dir_vektor = "../../Foto/".$vektor;
            move_uploaded_file($tmp_vektor, $dir_vektor);

            $update_login = mysqli_query($koneksi, "UPDATE halaman_login SET warna_tombol_login='$warna_tombol', tahun_ajaran='$tahun_ajaran', vektor='$vektor' WHERE id='$id'");
          }
        }
      }

      if($update_login)
      {
        $_SESSION['validasi'] = '<div id="auto-close" class="alert alert-success bg-success text-white alert-message" id="auto-close">
        Berhasil Update Data !</div>';
        header('location: ../../Admin/?page=set_log');
      }
    }
  }
?>