<?php
  session_start();
  require '../../../koneksi/koneksi.php';

  if(isset($_POST['update']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $foto = $_FILES['foto']['name'];
      $tmp_foto = $_FILES['foto']['tmp_name'];
      $size = $_FILES['foto']['size'];
      $ek = pathinfo($foto, PATHINFO_EXTENSION);
      $ekstension = array('png','jpg','jpeg');

      if(empty($foto))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            File Kosong
          </div>
        </div>';
        header('location: ../../../User/?page=up_ft');
      }
      else
      {
        if(!in_array($ek, $ekstension))
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
            <div class="alert-message">
              Ekstensi Hanya Mendukung jpg,jpeg,png
            </div>
          </div>';
          header('location: ../../../User/?page=up_ft');
        }
        else
        {
          if($size >= 3000000)
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
              <div class="alert-message">
                Ukursan File Maximal 3MB
              </div>
            </div>';
            header('location: ../../../User/?page=up_ft');
          }
          else
          {
            $foto_siswa = mysqli_query($koneksi, "SELECT * FROM foto_siswa WHERE username='$username'");
            $data = mysqli_fetch_assoc($foto_siswa);
            $file_location = "../../../assets/dokumen/foto_siswa/".$data['foto'];
            if(file_exists($file_location))
            {
              unlink($file_location);
            }
            $rename_ft = rand(115,1000000000).'_'.$foto;
            $dir = '../../../assets/dokumen/foto_siswa/'.$rename_ft;

            move_uploaded_file($tmp_foto, $dir);

            $update = mysqli_query($koneksi, "UPDATE foto_siswa SET foto='$rename_ft', status_verifikasi='Antrian' WHERE username='$username'");

            if($update)
            {
              $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                <div class="alert-message">
                  <em class="fas fa-check-circle"></em> Berhasil Update Foto Siswa
                </div>
              </div>';
              header('location: ../../../User/?page=up_ft');
            }
          }
        }
      }
    }
  }
?>