<?php
    session_start();
    include '../../koneksi/koneksi.php';

    if(isset($_POST['approve'])){
        if(isset($_POST['id'])){
            $id =  $_POST['id'];
            $reg = $_POST['status_registrasi'];
            $tanggal_terima = $_POST['tanggal_terima'];
            $akun = $_POST['status_akun'];


            $SQL = "UPDATE user SET status_registrasi='$reg', status_akun='$akun', tanggal_diterima='$tanggal_terima' WHERE id='$id'";
            $QUERY = mysqli_query($koneksi, $SQL);

            if($QUERY){
                $_SESSION['val'] = '<div class="alert alert-success" id="alert"><b>Approval Berhasil Di Lakukan !</b></div>';
                header('location: ../../Admin/?page=ajuan_registrasi');
            }
        }
    }
?>