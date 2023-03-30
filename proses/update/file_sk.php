<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['upload_sk_baru']))
  {
    if(isset($_POST['id']))
    {
      $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
      $file_sk = $_FILES['file_sk']['name'];
      $tmp_file_sk = $_FILES['file_sk']['tmp_name'];
      $size = $_FILES['file_sk']['size'];
      $ex = pathinfo($file_sk, PATHINFO_EXTENSION);
      $extension = array('pdf');

      // val jika file kosong
      if(empty($_FILES['file_sk']['name']))
      {
        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white alert-message" id="auto-close">
        Gagal Upload ! File SK Kosong</div>';
        header('location: ../../Admin/?page=profile');
      }else{
        if($size > 3000000)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white alert-message" id="auto-close">
          Gagal Upload ! Ukuran File Tidak Boleh Melebihi 3 MB</div>';
          header('location: ../../Admin/?page=profile');
        }else{
          if(!in_array($ex, $extension)){
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white alert-message" id="auto-close">
            Gagal Upload ! Ekstensi File Hanya Mendukung pdf </div>';
            header('location: ../../Admin/?page=profile');
          }else{
            $file_sk_query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id'");
            $data_lama = mysqli_fetch_assoc($file_sk_query);

            // hapus file lama 
            unlink("../../doc/".$data_lama['sk_tugas']);

            // lakukan upload ke berkas
            $dir = "../../doc/".$file_sk;
            move_uploaded_file($tmp_file_sk, $dir);

            // lakukan update data ke database
            $update = mysqli_query($koneksi, "UPDATE admin SET sk_tugas='$file_sk' WHERE id='$id'");

            if($update)
            {
              $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white alert-message" id="auto-close">Berhasil Upload ! Data Berhasil Di Ubah </div>';
              header('location: ../../Admin/?page=profile');
            }
          }
        }
      }
    }
  }
?>