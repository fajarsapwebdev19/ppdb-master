<?php
    session_start();
    require '../koneksi/koneksi.php';

    $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">Berhasil Logout !</div>';

    $level = $_SESSION['level'];

    if($level == "Admin")
    {
        $username = $_SESSION['username'];
        $logout = mysqli_query($koneksi, "UPDATE admin SET on_status='Offline' WHERE username='$username'");
    }
    elseif($level == "Calon Siswa")
    {
        $username = $_SESSION['username'];
        $logout = mysqli_query($koneksi, "UPDATE user SET on_status='Offline' WHERE username='$username'");
    }

    unset($_SESSION['username']);
    unset($_SESSION['level']);
    unset($_SESSION['status_akun']);
    unset($_SESSION['login_status']);
    header('location: ./');
?>