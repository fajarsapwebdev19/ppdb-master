<?php
session_start();
    include '../../koneksi/koneksi.php';

    if(isset($_POST['update'])){
        if(isset($_POST['id'])){
            
            // INPUT FORM UBAH KE DATABASE
            $id = $_POST['id'];
            $nama_sekolah = $_POST['nama_sekolah'];
            $info_admin = $_POST['info_admin'];
            $btn_login = $_POST['btn_login'];

            // LOGO SEKOLAH FILE FOTO
            $logo = $_FILES['logo_sekolah']['name'];
            $tmp_name = $_FILES['logo_sekolah']['tmp_name'];
            $path = '../../assets/img/logo/'.$logo;
           
            // JIKA FOTO KOSONG MAKA LAKUKAN UBAH DATA TEKS SAJA
            if(empty($logo)){
                $update = mysqli_query($koneksi, "UPDATE login_sett SET nama_sekolah='$nama_sekolah', info_admin='$info_admin', btn_login='$btn_login' WHERE id='$id'");

                if($update){
                    $_SESSION['val'] = '<div class="alert alert-success" id="alert">Perubahan Pengaturan Halaman Login Berhasil Di Lakukan !<button class="close text-white" data-dismiss="alert" type="button">&times;</button></div>';
                    header('location: ../../Admin/?page=sett_hallogin');
                }
                // JIKA ADA FOTO MAKA LAKUKAN UBAH TEKS DAN FOTO
            }else{
                if(move_uploaded_file($tmp_name, $path)){
                    
                    // AMBIL DATA DARI DATABASE
                    $sel = mysqli_query($koneksi, "SELECT * FROM login_sett WHERE id='$id'");
                    $data = mysqli_fetch_assoc($sel);

                    // TAMPILKAN FOTO LOGO LAMA KE DALAM FOLDER
                    $foto_lama = $data['logo_sekolah'];

                    // EKSEKUSI HAPUS FILE KETIKA MELAKUKAN UBAH FOTO
                    unlink('../../assets/img/logo/'.$foto_lama);

                    // EKSEKUSI UBAH DATA
                    $update = mysqli_query($koneksi, "UPDATE login_sett SET logo_sekolah='$logo', nama_sekolah='$nama_sekolah', info_admin='$info_admin', btn_login='$btn_login' WHERE id='$id'");

                    if($update){
                        $_SESSION['val'] = '<div class="alert alert-success" id="alert">Perubahan Pengaturan Halaman Login Berhasil Di Lakukan !</div>';
                        header('location: ../../Admin/?page=sett_hallogin');
                    }
                }
            }
        }
    }
?>