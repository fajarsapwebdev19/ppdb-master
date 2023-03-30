<?php
  session_start();
  require '../../../koneksi/koneksi.php';

  if(isset($_POST['update_ijazah']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $ijazah = $_FILES['ijazah']['name'];
      $tmp_ijazah = $_FILES['ijazah']['tmp_name'];
      $size = $_FILES['ijazah']['size'];
      $ek = pathinfo($ijazah, PATHINFO_EXTENSION);
      $ekstension = array('png', 'jpg', 'jpeg');
      
      if(empty($ijazah))
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
          <div class="alert-message">
            File Kosong
          </div>
        </div>';
        header('location: ../../../User/?page=up_ijzh');
      }
      else
      {
        if(!in_array($ek, $ekstension))
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
            <div class="alert-message">
              Ekstensi Yang Didukung Hanya png,jpg,jpeg
            </div>
          </div>';
          header('location: ../../../User/?page=up_ijzh');
        }
        else
        {
          if($size >= 3000000)
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
              <div class="alert-message">
                Ukuran File Maximal 3MB
              </div>
            </div>';
            header('location: ../../../User/?page=up_ijzh');
          }
          else
          {
            $berkas = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
            $data = mysqli_fetch_assoc($berkas);

            if(file_exists('../../../assets/dokumen/berkas_siswa/ijazah/'.$data['file_ijazah_smp']))
            {
              unlink('../../../assets/dokumen/berkas_siswa/ijazah/'.$data['file_ijazah_smp']);
            }

            $dir = "../../../assets/dokumen/berkas_siswa/ijazah/".$ijazah;
            move_uploaded_file($tmp_ijazah, $dir);

            $update = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_ijazah_smp='$ijazah' WHERE username='$username'");

            if($update)
            {
              $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
                <div class="alert-message">
                  <em class="fas fa-check-circle"></em> Berhasil Update File Ijazah
                </div>
              </div>';
              header('location: ../../../User/?page=up_ijzh');
            }
          }
        }
      } 
    }
  }
?>