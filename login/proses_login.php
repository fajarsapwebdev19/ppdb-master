<?php
    require_once('../koneksi/koneksi.php');

    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));

        $db_user = mysqli_query($koneksi, "SELECT username,password,level,status_akun,token_auth FROM admin WHERE username='$username' UNION SELECT username,password,level,status_akun,token_auth FROM user WHERE username='$username'");

        $cek = mysqli_num_rows($db_user);

        if($cek > 0)
        {
            $data = mysqli_fetch_object($db_user);

            $level = $_SESSION['level'] = $data->level;

            if($level == "Admin")
            {
                if(password_verify($password, password_hash($data->password, PASSWORD_DEFAULT)))
                {
                    $_SESSION['login_status'] = true;
                    $_SESSION['username'] = $data->username;
                    $username = $_SESSION['username'];
                    $online = mysqli_query($koneksi, "UPDATE admin SET on_status='Online' WHERE username='$username'");
                    header('location: ../Admin/');
                }
                else{
                    $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                        Password Salah !
                    </div>';
                }
            }
            else if($level == "Calon Siswa")
            {
                if(password_verify($password, password_hash($data->password, PASSWORD_DEFAULT)))
                {
                    $_SESSION['login_status'] = true;
                    $_SESSION['username'] = $data->username;
                    $_SESSION['status_akun'] = $data->status_akun;
                    $username = $_SESSION['username'];
                    $online = mysqli_query($koneksi, "UPDATE user SET on_status='Online' WHERE username='$username'");
                    header('location: ../User/');
                }
                else{
                    $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                        Password Salah !
                    </div>';
                }
            }
        }else{
            $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white" id="auto-close">Username Salah !</div>';
        }
    }
?>