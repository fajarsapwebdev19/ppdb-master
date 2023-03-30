<?php
  session_start();
  require_once('../koneksi/koneksi.php');
  
  if(isset($_POST['registrasi']))
  {
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
    $no_telp =mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['no_telp']));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));
    $level = "Calon Siswa";
    $status_registrasi = "Antrian";
    $tanggal_registrasi = date('Y-m-d');
    $tanggal_diterima = "0000-00-00";
    $tanggal_tolak = "0000-00-00";
    $status_akun = "Tidak Aktif";
    $foto = "";
    $token_auth = sha1($username).'_'.rand();
    $on_status = "Offline";

    $db = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    
    $cek_akun = mysqli_num_rows($db);

    if($cek_akun > 0){
      $_SESSION['validasi'] = "<div class='alert alert-warning bg-warning text-blue'>Akun $username Sudah Ada Di Database</div>";
      header('location: ../?page=Reg_Casis');
    }else{
      $insert = mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$nik','$agama','$alamat','$rt','$rw','$provinsi','$kabupaten','$kecamatan','$kelurahan','$no_telp','$username','$password','$level','$status_registrasi','$tanggal_registrasi','$tanggal_diterima','$tanggal_tolak','$status_akun','$foto','$token_auth','$on_status')");

      if($insert){
        $_SESSION['validasi'] = "<div class='alert alert-success bg-success text-white'>Berhasil Registrasi Akun ! Silahkan Tunggu Proses Aktivasi Akun Oleh Admin</div>";
        header('location: ../?page=Reg_Casis');
      }
    }
  }
  elseif(isset($_POST['registrasi_admin']))
  {
    $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
    $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jenis_kelamin']));
    $nik = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nik']));
    $tempat_lahir = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['tempat_lahir']));
    $tanggal_lahir = mysqli_real_escape_string($koneksi, htmlspecialchars(date('Y-m-d',strtotime($_POST['tanggal_lahir']))));
    $agama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['agama']));
    $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['alamat']));
    $rt = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['rt']));
    $rw = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['rw']));
    $provinsi = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['provinsi']));
    $kabupaten = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kabupaten']));
    $kecamatan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kecamatan']));
    $kelurahan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kelurahan']));
    $no_telp = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['no_telp']));
    $no_sk_tugas = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['no_sk_tugas']));
    $tanggal_sk_tugas = mysqli_real_escape_string($koneksi, htmlspecialchars(date('Y-m-d', strtotime($_POST['tgl_sk_tugas']))));
    $jabatan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jabatan']));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));
    $level = "Admin";
    $status_registrasi = "Antrian";
    $tanggal_registrasi = date('Y-m-d');
    $tanggal_diterima = "0000-00-00";
    $tanggal_tolak = "0000-00-00";
    $status_akun = "Tidak Aktif";
    $foto = "";
    $token_auth = sha1($username).'_'.rand();
    $on_status = "Offline";

    // bagian upload sk
    $file_sk_tugas = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['file_sk']['name']));
    $tmp_file_sk_tugas = $_FILES['file_sk']['tmp_name'];
    $size = $_FILES['file_sk']['size'];
    $ektension = array('pdf');
    $ex = pathinfo($file_sk_tugas, PATHINFO_EXTENSION);

    // validasi file sk

    // validasi jenis file yang di izinkan
    if(!in_array($ex, $ektension))
      {
        $_SESSION['validasi'] = "<div class='alert alert-danger bg-danger text-white'>Ekstensi File Harus Berformat Pdf</div>";
        header('location: ../?page=Reg_Admin');
      }else{
        // validasi batas ukuran file
        if($size > 2000000)
        {
          $_SESSION['validasi'] = "<div class='alert alert-danger bg-danger text-white'>Ukuran File Hanya 2MB</div>";
          header('location: ../?page=Reg_Admin');
        }else{
          // tempat penyimpanan file 
          $path = '../doc/'.$file_sk_tugas;

          // proses upload file ke dalam penyimpanan
          move_uploaded_file($tmp_file_sk_tugas, $path);

          // query insert data
          $insert_admin = mysqli_query($koneksi, "INSERT INTO admin VALUES(NULL, '$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$nik','$agama','$alamat','$rt','$rw','$provinsi','$kabupaten','$kecamatan','$kelurahan','$no_telp','$no_sk_tugas','$tanggal_sk_tugas','$file_sk_tugas','$jabatan','$username','$password','$level','$status_registrasi','$tanggal_registrasi','$tanggal_diterima','$tanggal_tolak','$status_akun','$foto','$token_auth','$on_status')");

          if($insert_admin)
          {
            $_SESSION['validasi'] = "<div class='alert alert-success bg-success text-white'>Berhasil Registrasi Akun Silahkan Tunggu Aktivasi Akun Oleh Admin !</div>";
            header('location: ../?page=Reg_Admin');
          }
        }
      }
  }
?>