<?php
    session_start();
    require '../../koneksi/koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $method = mysqli_real_escape_string($koneksi, $_POST['method']);

    if($method == "terima")
    {
        $status_akun = "Aktif";
        $date = date('Y-m-d');
        $status_registrasi = "Terima";

        $approve = mysqli_query($koneksi, "UPDATE user SET status_akun='$status_akun', tanggal_diterima='$date', status_registrasi='$status_registrasi' WHERE id='$id'");

        if($approve)
        {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                <div class="alert-message">
                    <em class="fas fa-check"></em> Berhasil Approve Akun
                </div>
            </div>';
        }
    }
    else if($method == "tolak")
    {
        $status_akun = "Tidak Aktif";
        $date = date('Y-m-d');
        $status_registrasi = "Tolak";

        $approve = mysqli_query($koneksi, "UPDATE user SET status_akun='$status_akun', tanggal_diterima='$date', status_registrasi='$status_registrasi' WHERE id='$id'");

        if($approve)
        {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                <div class="alert-message">
                    <em class="fas fa-check"></em> Berhasil Approve Akun
                </div>
            </div>';
        }
    }
?>