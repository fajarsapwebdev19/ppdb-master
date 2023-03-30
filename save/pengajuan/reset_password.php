<?php
session_start();
include '../../koneksi/koneksi.php';


    if(isset($_POST['ajukan']))
    {
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $token = $_POST['token'];
        $status_pengajuan = $_POST['status_pengajuan'];
        $tanggal_pengajuan = $_POST['tanggal_pengajuan'];
        $keterangan = $_POST['keterangan'];
        $status_approve_user = $_POST['status_approve_user'];
        $tanggal_diterima = $_POST['tanggal_diterima'];
        $tanggal_approve_user = $_POST['tanggal_approve_user'];
        $tanggal_approve_admin = $_POST['tanggal_approve_admin'];
        $tanggal_tolak_admin = $_POST['tanggal_tolak_admin'];

        $SQL = "INSERT INTO pengajuan_reset VALUES('','$username','$nama','$token','$status_pengajuan','$tanggal_pengajuan','$keterangan','$status_approve_user','$tanggal_diterima','$tanggal_approve_user','$tanggal_approve_admin','$tanggal_tolak_admin')";

        $AJUKAN = mysqli_query($koneksi, $SQL);

            if($AJUKAN)
            {
                $_SESSION['val'] = '<div class="alert alert-success" id="alert">Pengajuan Berhasil! Silahkan Cek Status Pengajuan Reset Anda</div>';
                header('location: ../../login/login.php?auth=reset');
            }
    }

?>