<?php
    $page = isset($_GET['page']) ? $_GET['page'] : '';

    if($page == "")
    {
        $title = "Dashboard";
    }
    else if($page == "acn_adm")
    {
        $title = "Manajemen Akun - Admin";
    }
    else if($page == "acn_sw")
    {
        $title = "Manajemen Akun - Calon Siswa";
    }
    else if($page == "ver_form")
    {
        $title = "Verifikasi Data - Formulir";
    }
    else if($page == "ver_file")
    {
        $title = "Verifikasi Data - Berkas";
    }
    else if($page == "calon")
    {
        $title = "Data Siswa Baru";
    }
    else if($page == "app_adm")
    {
        $title = "Approval - Akun Admin";
    }
    else if($page == "app_sw")
    {
        $title = "Approval - Akun Calon Siswa";
    }
    else if($page == "set_home")
    {
        $title = "Pengaturan - Halaman Awal";
    }
    else if($page == "set_apl")
    {
        $title = "Pengaturan - Aplikasi";
    }
    else if($page == "set_log")
    {
        $title = "Pengaturan - Login Page";
    }
    else if($page == "profile")
    {
        $title = "Profile Admin";
    }
    else if($page == "update_password")
    {
        $title = "Ubah Password";
    }
?>