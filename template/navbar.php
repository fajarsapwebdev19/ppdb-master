<?php
    if(empty($_GET['page'])){
        include 'navbar/home.php';
    }elseif($_GET['page'] == "Cek"){
        include 'navbar/cek_akun.php';
    }elseif($_GET['page'] == "Reg"){
        include 'navbar/Registrasi.php';
    }elseif($_GET['page'] == "Cont"){
        include 'navbar/Kontak.php';
    }elseif($_GET['page'] == "Reg_Casis")
    {
        include 'navbar/Registrasi.php';
    }elseif($_GET['page'] == "Reg_Admin")
    {
        include 'navbar/Registrasi.php';
    }

?>