<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['reset']))
  {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);

    // cek username
    $sql = mysqli_query($koneksi, "SELECT username,status_akun,level FROM user WHERE username='$username' UNION SELECT username,status_akun,level FROM admin WHERE username='$username'");

    $cek = mysqli_num_rows($sql);
    if($cek == 0)
    {
      $_SESSION['val'] = "<div class='alert alert-warning'>Email Anda Tidak Terdaftar Di Database !</div>";
      header('location: ../../Reset/');
    }else{
      $data = mysqli_fetch_object($sql);

      if($data->status_akun == "Tidak Aktif")
      {
        $_SESSION['val'] = "<div class='alert alert-warning'>Mohon Maaf Anda Tidak Bisa Melakukan Reset Password ! Akun Anda Di Suspend Oleh Admin</div>";
        header('location: ../../Reset/');
      }else{
        $create_token = rand().''.date('dmy');
        $email = $data->username;
        $level = $data->level;

        if($level == "Admin")
        {
          $up_token = mysqli_query($koneksi, "UPDATE admin SET token_auth='$create_token' WHERE username='$email'");
        }
        else if($level == "Calon Siswa")
        {
          $up_token = mysqli_query($koneksi, "UPDATE user SET token_auth='$create_token' WHERE username='$email'");
        }
        
        // kirim link reset password ke email yang aktif
        $to = $email;
        $subject = "Reset Password";
        $message = "<h3>Permintaan Reset Password</h3>
        <br><br>Anda Ingin Melakukan Perubahan Password Anda Dikarenakan anda lupa. silahkan klik link berikut untuk melakukan perubahan password anda <a href='https://ppdbsmkpgrineglasari.dev19.my.id/Reset/?page=recovery&token={$create_token}'>Klik Di sini</a>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: adminserver@ppdbsmkpgrineglasari.dev19.my.id" . "\r\n";

        $send = mail($to,$subject, $message, $headers);
        
        if($send)
        {
          $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
            Berhasil ! Silahkan Cek Akun email anda
          </div>';
          header('location: ../../Reset/');
        }else{
          $_SESSION['val'] = "<div class='alert alert-warning'>Gagal !</div>";
          header('location: ../../Reset/');
        }
      }
    }
  }
  else if(isset($_POST['recovery']))
  {
    $password_baru = mysqli_real_escape_string($koneksi, $_POST['password_baru']);
    $kon_password_baru = mysqli_real_escape_string($koneksi, $_POST['kon_password_baru']);
    $token = $_SESSION['token'];
    
    // get data
    $sql = mysqli_query($koneksi, "SELECT level,username FROM admin WHERE token_auth='$token' UNION SELECT level,username FROM user WHERE token_auth='$token'");

    $data = mysqli_fetch_object($sql);

    if($data->level == "Admin")
    {
      $username = $data->username;
      if($password_baru == $kon_password_baru)
      {
        $update = mysqli_query($koneksi, "UPDATE admin SET password='$password_baru', token_auth='' WHERE username='$username'");

        if($update)
        {
          $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
            Berhasil Melakukan Reset Password !
          </div>';
          header('location: ../../Reset/');
        }
      }else{
        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
            Password Baru Dengan Konfirmasi Password Baru Tidak Sama
          </div>';
          header('location: ../../Reset/?page=recovery&token='.$token);
      }
    }
    else if($data->level == "Calon Siswa")
    {
      if($password_baru == $kon_password_baru)
      {
        $update = mysqli_query($koneksi, "UPDATE user SET password='$password_baru', token_auth='' WHERE username='$username'");

        if($update)
        {
          $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
            Berhasil Melakukan Reset Password !
          </div>';
          header('location: ../../Reset/');
        }
      }else{
        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
            Password Baru Dengan Konfirmasi Password Baru Tidak Sama
          </div>';
          header('location: ../../Reset/?page=recovery&token='.$token);
      }
    }
  }
?>