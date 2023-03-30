<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['update_admin']))
  {
    if(isset($_POST['id'])){
      $id = mysqli_real_escape_string($koneksi, $_POST['id']);
      $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
      $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
      $tempat_lahir = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
      $tanggal_lahir = mysqli_real_escape_string($koneksi, date('Y-m-d', strtotime($_POST['tanggal_lahir'])));
      $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
      $agama = mysqli_real_escape_string($koneksi, $_POST['agama']);
      $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
      $rt = mysqli_real_escape_string($koneksi, $_POST['rt']);
      $rw = mysqli_real_escape_string($koneksi, $_POST['rw']);
      $prov = mysqli_real_escape_string($koneksi, $_POST['prov']);
      $kab = mysqli_real_escape_string($koneksi, $_POST['kab']);
      $kec = mysqli_real_escape_string($koneksi, $_POST['kec']);
      $kel = mysqli_real_escape_string($koneksi, $_POST['kel']);
      $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);
      $no_sk = mysqli_real_escape_string($koneksi, $_POST['no_sk']);
      $tanggal_sk = mysqli_real_escape_string($koneksi, date('Y-m-d', strtotime($_POST['tanggal_sk'])));
      $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);

      $update_admin = mysqli_query($koneksi, "UPDATE admin SET nama='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', nik='$nik', agama='$agama', alamat='$alamat', rt='$rt', rw='$rw', provinsi='$prov', kabupaten='$kab', kecamatan='$kec', kelurahan='$kel', no_telp='$no_telp', no_sk_tugas='$no_sk', tgl_sk_tugas='$tanggal_sk', jabatan='$jabatan' WHERE id='$id'");

      if($update_admin)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white alert-message" id="auto-close">Berhasil Update Data !</div>';
        header('location: ../../Admin/?page=profile');
      }
    }
  }
  elseif(isset($_POST['update_user']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
      $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
      $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jenis_kelamin']));
      $tempat_lahir = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['tempat_lahir']));
      $tanggal_lahir = mysqli_real_escape_string($koneksi, htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_lahir']))));
      $nik = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nik']));
      $agama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['agama']));
      $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['alamat']));
      $rt = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['rt']));
      $rw = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['rw']));
      $provinsi = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['provinsi']));
      $kabupaten = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kabupaten']));
      $kecamatan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kecamatan']));
      $kelurahan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kelurahan']));
      $no_telp = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['no_telp']));

      $update_user = mysqli_query($koneksi, "UPDATE user SET nama='$nama',jenis_kelamin='$jenis_kelamin',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',nik='$nik',agama='$agama',alamat='$alamat',rt='$rt',rw='$rw',provinsi='$provinsi',kabupaten='$kabupaten',kecamatan='$kecamatan',kelurahan='$kelurahan',no_telp='$no_telp' WHERE username='$username'");

      $tb_siswa = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE username='$username'");

      $cek_data_siswa = mysqli_num_rows($tb_siswa);

      if($cek_data_siswa > 0)
      {
        $update_user .= mysqli_query($koneksi, "UPDATE data_peserta_baru SET nama='$nama',jenis_kelamin='$jenis_kelamin',nik='$nik',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',agama='$agama',alamat='$alamat',rt='$rt',rw='$rw',kelurahan='$kelurahan',kecamatan='$kecamatan' WHERE username='$username'");

        $update_user .= mysqli_query($koneksi, "UPDATE kesempatan_ubah SET nama_peserta='$nama' WHERE username='$username'");

        $update_user .= mysqli_query($koneksi, "UPDATE berkas_siswa SET nama='$nama',jenis_kelamin='$jenis_kelamin' WHERE username='$username'");

        $update_user .= mysqli_query($koneksi, "UPDATE foto_siswa SET nama='$nama',jenis_kelamin='$jenis_kelamin' WHERE username='$username'");
      }

      if($update_user){
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white alert-message" id="auto-close">Berhasil Update Data !</div>';
        header('location: ../../User/?page=profile');
      }
    }
  }
?>