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

    switch($page)
    {
        case 'frm_pdftrn';
        require 'menu/form_pendaftaran.php';
        break;

        case 'edt_dt';
        require 'menu/edit_formulir.php';
        break;

        case 'sts_isi';
        require 'menu/status_isi.php';
        break;

        case 'up_kk';
        require 'menu/upload_kk.php';
        break;

        case 'up_akta';
        require 'menu/upload_akta.php';
        break;

        case 'up_ijzh';
        require 'menu/upload_ijazah.php';
        break;

        case 'up_ft';
        require 'menu/upload_foto.php';
        break;

        case 'up_kip';
        require 'menu/upload_kip.php';
        break;

        case 'up_kks';
        require 'menu/upload_kks.php';
        break;

        case 'sts_kk';
        require 'menu/status_kk.php';
        break;

        case 'sts_akta';
        require 'menu/status_akta.php';
        break;

        case 'sts_ijzh';
        require 'menu/status_ijazah.php';
        break;

        case 'sts_foto';
        require 'menu/status_foto.php';
        break;

        case 'sts_kip';
        require 'menu/status_kip.php';
        break;

        case 'sts_kks';
        require 'menu/status_kks.php';
        break;

        case 'profile';
        require 'menu/profile.php';
        break;

        case 'update_password';
        require 'menu/update_password.php';
        break;
    }
?>