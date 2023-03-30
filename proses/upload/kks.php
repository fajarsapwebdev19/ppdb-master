<?php
  session_start();
  require '../../koneksi/koneksi.php';
  
  if(isset($_POST['upload_kks']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
      $kks = $_FILES['kks']['name'];
      $tmp_kks = $_FILES['kks']['tmp_name'];
      $size = $_FILES['kks']['size'];
      $ekstensi = array('jpg','jpeg','png');
      $ek = pathinfo($kks, PATHINFO_EXTENSION);

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
        header('location: ../../User/?page=up_kks');
      }else{
        if(empty($kks))
        {
          $upload = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_kks='', status_upload_kks='Sudah', status_verifikasi_kks='Terima' WHERE username='$username'");
        }else{
          if(!in_array($ek, $ekstensi))
          {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
              <div class="alert-message">
                Ekstensi Hanya Mendukung png,jpg,jpeg 
              </div>
            </div>';
            header('location: ../../User/?page=up_kks');
          }else{
            if($size > 3000000)
            {
              $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white">
                <div class="alert-message">
                  Ukuran Maximal 3 MB
                </div>
              </div>';
              header('location: ../../User/?page=up_kks');
            }else{
              $dir = '../../assets/dokumen/berkas_siswa/kks/'.$kks;
              move_uploaded_file($tmp_kks, $dir);

              $upload = mysqli_query($koneksi, "UPDATE berkas_siswa SET file_kks='$kks', status_upload_kks='Sudah', status_verifikasi_kks='Antrian' WHERE username='$username'");
            }
          }
        }
        if($upload)
        {
          $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white">
            <div class="alert-message">
              <em class="fas fa-check-circle"></em> Berhasil Upload File KKS
            </div>
          </div>';
          header('location: ../../User/?page=up_kks');
        }
      }
    }
  }elseif(isset($_POST['cutoff']))
  {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white" id="auto-close">
            <div class="alert-message">
                <em class="fas fa-times-circle"></em> Input Data Sudah Di Tutup
            </div>
        </div>';
        header('location: ../../User/?page=up_kks');
  }
?>