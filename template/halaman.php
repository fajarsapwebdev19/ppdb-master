<?php

    if(empty($_GET['page'])){
        include 'halaman/home.php';
    }elseif($_GET['page'] == "Reg"){
        include 'halaman/Registrasi.php';
    }elseif($_GET['page'] == "Cek"){
        include 'halaman/CekAkun.php';
    }elseif($_GET['page'] == "Cont"){
        include 'halaman/Kontak.php';
    }elseif($_GET['page'] == "Reg_Casis")
    {
        include 'halaman/Registrasi_Siswa.php';
    }
    elseif($_GET['page'] == "Reg_Admin")
    {
        include 'halaman/Registrasi_Admin.php';
    }

?>