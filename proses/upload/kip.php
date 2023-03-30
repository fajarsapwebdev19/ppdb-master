<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['upload_kip']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $kip = $_FILES['kip']['name'];
      $tmp_kip = $_FILES['kip']['tmp_name'];
      $size = $_FILES['kip']['size'];
      $ek = array('png','jpg','jpeg');
      $ekstensi = pathinfo($kip, PATHINFO_EXTENSION);

      $db_app = mysqli_query($koneksi, "SELECT * FROM aplikasi");
      $app = mysqli_fetch_assoc($db_app);

      $batas = $app['batas_pengisian'];
      $tanggal = date('Y-m-d');
      $date = new DateTime($tanggal);
      $end = new DateTime($batas);

      if($date >= $end)
      {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white" id="auto-close">
                  <div class="alert-message">
                      <em class="fas fa-times-circle"></em> Jangan Main Rubah Sembarangan Ya :)
                  </div>
          </div>';
          header('location: ../../User/?page=up_kip');
      }else{
        if(empty($kip))
        {
          $upload = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_kip='', status_upload_kip='Sudah', status_verifikasi_kip='Terima' WHERE username='$username'");
        }else{
          if(!in_array($ekstensi, $ek))
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
              <div class="alert-message">
                Ekstensi Hanya Mendukung png,jpg,jpeg
              </div>
            </div>';
            header('location: ../../User/?page=up_kip');
          }
          else{
            if($size >= 3000000)
            {
              $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                <div class="alert-message">
                  Ukuran Maximal 3 MB
                </div>
              </div>';
              header('location: ../../User/?page=up_kip');
            }
            else{
              $dir = "../../assets/dokumen/berkas_siswa/kip/".$kip;
              move_uploaded_file($tmp_kip, $dir);
  
              $upload = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_kip='$kip', status_upload_kip='Sudah', status_verifikasi_kip='Antrian' WHERE username='$username'");
            }
          }
        }
  
        if($upload)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
            <div class="alert-message">
              <em class="fas fa-check-circle"></em> Berhasil Upload File KIP
            </div>
          </div>';
          header('location: ../../User/?page=up_kip');
        }
      }
    }
  }elseif(isset($_POST['cut_off']))
  {
    $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white" id="auto-close">
            <div class="alert-message">
                <em class="fas fa-times-circle"></em> Input Data Sudah Di Tutup
            </div>
    </div>';
    header('location: ../../User/?page=up_kip');
  }
?>