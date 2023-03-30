<?php
    session_start();
    require '../../koneksi/koneksi.php';

    $method = mysqli_real_escape_string($koneksi, $_POST['method']);
    
    if($method == "terima")
    {
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);
        $tanggal_terima = date('Y-m-d');
        $status_registrasi = "Terima";
        $status_akun = "Aktif";

        $app_adm = mysqli_query($koneksi, "UPDATE admin SET status_registrasi='$status_registrasi', status_akun='$status_akun', tanggal_diterima='$tanggal_terima' WHERE id='$id'");

        if($app_adm)
        {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-success alert-message bg-success text-white">Berhasil Approval Akun !</div>';
        }
    }
    else if($method == "tolak")
    {
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);
        $tanggal_terima = date('Y-m-d');
        $status_registrasi = "Tolak";
        $status_akun = "Tidak Aktif";

        $rej_adm = mysqli_query($koneksi, "UPDATE admin SET status_registrasi='$status_registrasi', status_akun='$status_akun', tanggal_diterima='$tanggal_terima' WHERE id='$id'");

        if($rej_adm)
        {
            $_SESSION['val'] = '<div id="auto-close" class="alert alert-success alert-message bg-success text-white">Berhasil Approval Akun !</div>';
        }
    }
?>