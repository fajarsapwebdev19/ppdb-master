<?php

    include '../../koneksi/koneksi.php';

    if(isset($_POST['approv']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $token = $_POST['token'];
            $status_pengajuan = $_POST['status_pengajuan'];
            $tanggal_approve_admin = $_POST['tanggal_approve_admin'];
            $status_approve_user = $_POST['status_approve_user'];
            $password_baru = $_POST['password_baru'];
            

            $Approve = mysqli_query($koneksi, "UPDATE pengajuan_reset SET token='$token', status_pengajuan='$status_pengajuan', tanggal_approve_admin='$tanggal_approve_admin', status_approve_user='$status_approve_user', password_baru='$password_baru' WHERE id='$id'");

            if($Approve)
            {
                header('location: ../../Admin/?page=ajuan_reset');
            }
        }
    }
?>