<?php
  session_start();
  require '../../../koneksi/koneksi.php';

  if(isset($_POST['update']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $kk = $_FILES['kk']['name'];
      $tmp_kk = $_FILES['kk']['tmp_name'];
      $size = $_FILES['kk']['size'];
      $ek = pathinfo($kk, PATHINFO_EXTENSION);
      $ekstension = array('png','jpg','jpeg');

      if(empty($kk))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            File Kosong
          </div>
        </div>';
        header('location: ../../../User/?page=up_kk');
      }
      else{
        if(!in_array($ek, $ekstension))
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
            <div class="alert-message">
              Ekstensi File Hanya Mendukung png,jpg,jpeg
            </div>
          </div>';
          header('location: ../../../User/?page=up_kk');
        }else{
          if($size >= 3000000)
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
              <div class="alert-message">
                Ukuran File Maximal 3 MB
              </div>
            </div>';
            header('location: ../../../User/?page=up_kk');
          }
          else{
            $berkas = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
            $data = mysqli_fetch_assoc($berkas);

            $location = "../../../assets/dokumen/berkas_siswa/kk/".$data['file_kk'];
            if(file_exists($location))
            {
              unlink($location);
            }

            $rename_kk = rand(0,99999).'_'.$kk;
            $dir = "../../../assets/dokumen/berkas_siswa/kk/".$rename_kk;

            move_uploaded_file($tmp_kk, $dir);

            $update = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_kk='$rename_kk', status_verifikasi_kk='Antrian' WHERE username='$username'");

            if($update)
            {
              $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                <div class="alert-message">
                  <em class="fas fa-check-circle"></em> Berhasil Update File Kartu Keluarga
                </div>
              </div>';
              header('location: ../../../User/?page=up_kk');
            }
          }
        }
      }
    }
  }
?>