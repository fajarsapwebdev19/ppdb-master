<?php
    if(empty($_GET['page']))
    {
        require 'menu/home.php';
    }

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }

    switch($page){
        case 'acn_adm';
        require 'menu/akun_admin.php';
        break;

        case 'acn_sw';
        require 'menu/akun_calon_siswa.php';
        break;

        case 'ver_form';
        require 'menu/verifikasi_formulir.php';
        break;

        case 'ver_file';
        require 'menu/verifikasi_berkas.php';
        break;

        case 'calon';
        require 'menu/data_calon_siswa.php';
        break;

        case 'app_adm';
        require 'menu/approv_registrasi_admin.php';
        break;

        case 'app_sw';
        require 'menu/approv_registrasi_siswa.php';
        break;

        case 'set_home';
        require 'menu/pengaturan_home.php';
        break;

        case 'set_apl';
        require 'menu/pengaturan_aplikasi.php';
        break;

        case 'set_log';
        require 'menu/pengaturan_login.php';
        break;

        case 'profile';
        require 'menu/profile.php';
        break;

        case 'update_password';
        require 'menu/update_password.php';
        break;
    }

?>