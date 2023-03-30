<?php
    session_start();
    include '../../koneksi/koneksi.php';

    if(isset($_POST['oke']))
    {
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $sts_app = $_POST['status_approve_user'];
            $tanggal_app = $_POST['tanggal_approve_user'];

            $app = mysqli_query($koneksi, "UPDATE pengajuan_reset SET status_approve_user='$sts_app', tanggal_approve_user='$tanggal_app' WHERE username='$username'");

            if($app)
            {   
                $_SESSION['val'] = '<div class="alert alert-success">Reset Password Sudah Selesai ! Terima Kasih Atas Masukan Anda !</div>';
                header('location: ../../login/hasil.php');
            }
        }
    }
?>