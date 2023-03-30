<?php
    session_start();

    include '../../koneksi/koneksi.php';

    if(isset($_POST['update'])){
        if(isset($_POST['id'])){
            $id             = $_POST['id'];
            $sekolah        = $_POST['nama_sekolah'];
            $header         = $_POST['judul_header'];
            $th_ajaran      = $_POST['th_ajaran'];
            $warna_header   = $_POST['warna_header'];
            $tombol_login   = $_POST['warna_tombol_login'];

            $update         = mysqli_query($koneksi, "UPDATE halaman_awal SET nama_sekolah='$sekolah',   judul_header ='$header', th_ajaran='$th_ajaran', warna_header='$warna_header', warna_tombol_login='$tombol_login' WHERE id='$id'");

            if($update){
                $_SESSION['val'] = '<div class="alert alert-success" id="alert">Perubahan Page Home Berhasil !<button class="close text-white" data-dismiss="alert" type="button">&times;</button></div>';
                header('location: ../../Admin/?page=sett_halhome');
            }
        }
    }
?>