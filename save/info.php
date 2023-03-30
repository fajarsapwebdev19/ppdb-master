<?php
session_start();
include '../koneksi/koneksi.php';

    if(isset($_POST['update'])){
        if(isset($_POST['id'])){
            $id     = $_POST['id'];
            $isi    = $_POST['isi'];

            $query = mysqli_query($koneksi, "UPDATE info SET isi='$isi' WHERE id='$id'");

            if($query){
                $_SESSION['val'] = '<div class="alert alert-success" id="alert">Berhasil Di Simpan ! <button class="close  text-white" type="button" data-dismiss="alert">&times;</button></div>';
                header('location: ../Admin/?page=add_info');
            }
        }
    }