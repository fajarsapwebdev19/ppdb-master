<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['delete']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      
      $berkas = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
      $data = mysqli_fetch_assoc($berkas);

      if(file_exists("../../assets/dokumen/berkas_siswa/ijazah/".$data['file_ijazah_smp']))
      {
        unlink('../../assets/dokumen/berkas_siswa/ijazah/'.$data['file_ijazah_smp']);
      }

     $delete = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_ijazah_smp='',status_upload_ijazah='Belum', status_verifikasi_ijazah='' WHERE username='$username'");

      if($delete)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
          <div class="alert-message">
            <em class="fas fa-check-circle"></em> Berhasil Hapus Berkas File Ijazah
          </div>
        </div>';
        header('location: ../../User/?page=up_ijzh');
      }
    }
  }
?>