<?php
  session_start();
  require '../../../koneksi/koneksi.php';

  if(isset($_POST['update']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $akta = $_FILES['akta']['name'];
      $tmp_akta = $_FILES['akta']['tmp_name'];
      $size = $_FILES['akta']['size'];
      $ek = pathinfo($akta, PATHINFO_EXTENSION);
      $ekstensi = array('png','jpg','jpeg');

      if(empty($akta))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            File Kosong
          </div>
        </div>';
        header('location: ../../../User/?page=up_akta');
      }
      else
      {
        if(!in_array($ek, $ekstensi))
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
            <div class="alert-message">
              Ekstensi File Hanya Mendukung png,jpg,jpeg
            </div>
          </div>';
          header('location: ../../../User/?page=up_akta');
        }
        else
        {
          if($size > 3000000)
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
              <div class="alert-message">
                Ukuran File Maximal 3MB
              </div>
            </div>';
            header('location: ../../../User/?page=up_akta');
          }
          else
          {
            $berkas = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
            $data = mysqli_fetch_assoc($berkas);
            
            if(file_exists("../../../assets/dokumen/berkas_siswa/akta/".$data['file_akta'])){
              unlink("../../../assets/dokumen/berkas_siswa/akta/".$data['file_akta']);
            }

            $rename_akta = rand().'_'.$akta;
            $dir = "../../../assets/dokumen/berkas_siswa/akta/".$rename_akta;

            move_uploaded_file($tmp_akta, $dir);

            $update = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_akta='$rename_akta', status_upload_akta='Sudah'");

            if($update)
            {
              $_SESSION['val'] = "<div id='auto-close' class='alert alert-success bg-success text-white'>
                <div class='alert-message'>
                  <em class='fas fa-check-circle'></em> Berhasil Update File Akta
                </div>
              </div>";
              header('location: ../../../User/?page=up_akta');
            }
          }
        }
      }
    }
  }
?>