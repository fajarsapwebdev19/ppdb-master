<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['tarik']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $db_s = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE username='$username'");
      $data = mysqli_fetch_assoc($db_s);

      $nama = $data['nama'];
      echo $nama;
    }
  }
?>