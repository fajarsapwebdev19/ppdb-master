<?php

    include '../../koneksi/koneksi.php';

    if(isset($_POST['tolak']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $keterangan = $_POST['keterangan'];
            $status_pengajuan = $_POST['status_pengajuan'];
            $tanggal_tolak_admin = $_POST['tanggal_tolak_admin'];

            $tolak = mysqli_query($koneksi, "UPDATE pengajuan_reset SET keterangan='$keterangan', status_pengajuan='$status_pengajuan', tanggal_tolak_admin='$tanggal_tolak_admin' WHERE id='$id'");


            if($tolak)
            {
                header('location: ../../Admin/?page=ajuan_reset');
            }
            
        }
    }


?>