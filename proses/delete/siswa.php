<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['delete']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

      // hapus form siswa dan kesempatan_ubah
      $delete = mysqli_query($koneksi, "DELETE FROM data_peserta_baru WHERE username='$username'");

      $delete .= mysqli_query($koneksi, "DELETE FROM kesempatan_ubah WHERE username='$username'");

      // ambil data file berkas yang ada di database
      $tb_file = mysqli_query($koneksi, "SELECT file_ijazah_smp AS file_ijazah, file_skl, file_kk, file_akta, file_kip, file_kks FROM berkas_siswa WHERE username='$username'");
      $get_file = mysqli_fetch_assoc($tb_file);

      $file_ijazah = $get_file['file_ijazah'];
      $file_kk = $get_file['file_kk'];
      $file_akta = $get_file['file_akta'];
      $file_kip = $get_file['file_kip'];
      $file_kks = $get_file['file_kks'];

      // Hapus berkas berserta file
      
      // file kk
      if(file_exists('../../assets/dokumen/berkas_siswa/kk/'.$file_kk))
      {
        unlink('../../assets/dokumen/berkas_siswa/kk/'.$file_kk);
      }
      // file akta
      if(file_exists('../../assets/dokumen/berkas_siswa/akta/'.$file_akta))
      {
        unlink('../../assets/dokumen/berkas_siswa/akta/'.$file_akta);
      }
      // file ijazah
      if(file_exists('../../assets/dokumen/berkas_siswa/ijazah/'.$file_ijazah))
      {
        unlink('../../assets/dokumen/berkas_siswa/ijazah/'.$file_ijazah);
      }
      // file kip
      if(file_exists('../../assets/dokumen/berkas_siswa/kip/'.$file_kip))
      {
        unlink('../../assets/dokumen/berkas_siswa/kip/'.$file_kip);
      }
      // file kks
      if(file_exists('../../assets/dokumen/berkas_siswa/kks/'.$file_kks))
      {
        unlink('../../assets/dokumen/berkas_siswa/kks/'.$file_kks);
      }

      $delete .= mysqli_query($koneksi, "DELETE FROM berkas_siswa WHERE username='$username'");

      $tb_pic = mysqli_query($koneksi, "SELECT foto FROM foto_siswa WHERE username='$username'");
      $get_pic = mysqli_fetch_assoc($tb_pic);
      $foto = $get_pic['foto'];

      if(file_exists('../../assets/dokumen/foto_siswa/'.$foto))
      {
        unlink('../../assets/dokumen/foto_siswa/'.$foto);
      }

      $delete .= mysqli_query($koneksi, "DELETE FROM foto_siswa WHERE username='$username'");

      if($delete)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
          <div class="alert-message">
            <em class="fas fa-check-circle"></em> Berhasil Hapus Data Siswa
          </div>
        </div>';
        header('location: ../../Admin/?page=calon');
      }
    }
  }
?>