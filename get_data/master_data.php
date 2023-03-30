<?php
    require '../koneksi/koneksi.php';

    // agama
    $agama = mysqli_query($master, "SELECT * FROM agama");

    // data tempat tinggal
    $tempat = mysqli_query($master, "SELECT * FROM tempat_tinggal");

    // Transportasi 
    $transport = mysqli_query($master, "SELECT * FROM transportasi");

    // Pendidikan Terakhir
    $pendidikan = mysqli_query($master, "SELECT * FROM pendidikan");

    // Pekerjaan
    $pekerjaan = mysqli_query($master, "SELECT * FROM pekerjaan");

    // Penghasilan
    $penghasilan = mysqli_query($master, "SELECT * FROM penghasilan");

    // Cita-Cita
    $cita_cita = mysqli_query($master, "SELECT * FROM cita_cita");

    // Hobby
    $hobby = mysqli_query($master, "SELECT * FROM hobby");

    // Alasan Layak PIP
    $alpip = mysqli_query($master, "SELECT * FROM alasan_pip");

    // Kejuruan
    $kejuruan = mysqli_query($master, "SELECT * FROM kejuruan");
?>