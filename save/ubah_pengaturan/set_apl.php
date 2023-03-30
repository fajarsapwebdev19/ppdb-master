<?php
session_start();
    include '../../koneksi/koneksi.php';

    if(isset($_POST['update'])){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $nama_apl = $_POST['nama_apl'];
            $ver_apl = $_POST['ver_apl'];
            $title_nav = $_POST['title_nav'];
            $color_nav = $_POST['color_nav'];

            $update = mysqli_query($koneksi, "UPDATE aplikasi SET nama_apl='$nama_apl', ver_apl='$ver_apl', title_nav='$title_nav', color_nav='$color_nav' WHERE id='$id'");

            if($update){
                $_SESSION['val'] = '<div class="alert alert-success" id="alert">Ubah Pengaturan Aplikasi Berhasil ! <button type="button" class="close text-white" data-dismiss="alert">&times;</button></div>';
                header('location: ../../Admin/?page=sett_apl');
            }
        }
    }


?>