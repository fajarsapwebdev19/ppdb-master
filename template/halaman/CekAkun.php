<div class="jumbotron bg-white">
  <div class="container col-sm-8">
  <h3>CEK AKUN</h3>
  <hr>
  <p>Masukan Username Atau Email Untuk Mengecek Status Registrasi Akun Anda</p>
  <?php
    if(isset($_POST['cek'])){
        
        // input berasal dari form cek
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);

        $database = mysqli_query($koneksi, "SELECT username,level,status_registrasi,status_akun FROM admin WHERE username='$username' UNION SELECT username,level,status_registrasi,status_akun FROM user WHERE username='$username'");

        $cek = mysqli_num_rows($database);

        if($cek > 0){
            $data = mysqli_fetch_assoc($database);
            
            if($data['status_registrasi'] == "Antrian")
            {
                $_SESSION['message'] = "<div class='alert alert-info text-white bg-info'>Username $username Dalam Antrian !</div>";
            }
            elseif($data['status_registrasi'] == "Tolak") 
            {
                $_SESSION['message'] = "<div class='alert alert-danger text-white bg-danger'>Username $username Di Tolak Admin !</div>";
            }
            elseif($data['status_registrasi'] == "Terima") 
            {
                if($data['status_akun'] == "Tidak Aktif"){
                    $_SESSION['message'] = "<div class='alert alert-warning text-black bg-warning'>Username $username Tidak Aktif !</div>";
                }elseif($data['status_akun'] == "Aktif"){
                    $_SESSION['message'] = "<div class='alert alert-success text-white bg-success'>Username $username Sudah Aktif !</div>";
                }
            }
        }else{
            $_SESSION['message'] = "<div class='alert alert-danger bg-danger text-white'>Username $username Tidak Ditemukan Di Database !</div>";
        }
    }
  
  
  ?>

  <!-- Form Cek Akun -->
  
      <?php
        if(isset($_SESSION['message']) && $_SESSION['message'] !='')
        {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
      ?>
 
  <form action="" method="post" class="needs-validation" novalidate>
      <input type="email" name="username" class="form-control" required>
      <div class="invalid-feedback">Harus Diisi</div>
      <div class="mt-3"></div>
      <button class="btn btn-success" name="cek" type="submit">Cek</button>
  </form>
  </div>
</div>

