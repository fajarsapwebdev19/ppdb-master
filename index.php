<?php

    require_once 'koneksi/koneksi.php';

    $app = mysqli_query($koneksi, "SELECT * FROM aplikasi");
    $apl = mysqli_fetch_assoc($app);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo/<?= $apl['logo_sekolah']?>" type="image/x-icon">
    <link rel="stylesheet" href="assets/halaman_awal/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/halaman_awal/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/halaman_awal/css/style.css">
    <link rel="stylesheet" href="assets/halaman_awal/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/halaman_awal/DataTables/DataTables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/font/font.css">
    <!-- select 2 css -->
    <link rel="stylesheet" href="assets/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/select2/theme/bootstrap/4/select2-bootstrap4.min.css">

    <style>
    body {
        font-family: Poppins;
    }

    .registration{
        color: #39AEA9;
    }

    .registration:hover{
        color: red;
        text-decoration: none;
        background: #eaeaeaea;
    }
    </style>

    <title>PPDB SMK PGRI NEGLASARI</title>
    <META NAME="keywords" CONTENT="PPDB SMK PGRI NEGLASARI, ppdb smk pgri neglasari, ppdbgrineta, ppdbpgrineglasari">
    <META NAME="robot" CONTENT="index,follow">
    <meta name="language" content="indonesia"> 
	<meta name="author" content="fajarsaputra_dev19" />
</head>

<body>

            <?php
                $hal_home = mysqli_query($koneksi, "SELECT * FROM halaman_awal");
                $data = mysqli_fetch_assoc($hal_home);
            ?>
    
            <?php include 'template/navbar.php'; ?>

            <?php include 'template/halaman.php'; ?>

    <script src="assets/jquery-3.5.1.min.js"></script>
    <script src="assets/halaman_awal/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/jquery-validation/dist/additional-methods.js"></script>
    <script type="text/javascript" src="assets/jquery-validation/dist/jquery.validate.min.js"></script>

    <!-- <script src="assets/halaman_awal/vendor/jquery-steps/jquery.steps.min.js"></script> -->
    <script src="assets/halaman_awal/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/halaman_awal/DataTables/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="assets/halaman_awal/DataTables/DataTables/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/halaman_awal/js/table.js"></script>
    <script src="assets/Validation/Form/Registrasi/Reg.js"></script>
    <script src="assets/select2/js/select2.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#provinsi").on('change', function() {
            var id_provinsi = $(this).val();
            $.ajax({
                url: 'get_data/kabupaten.php',
                type: 'post',
                data: {
                    id: id_provinsi
                },
                success: function(respond) {
                    $("#kabupaten").html(respond);
                },
            })
        })

        $("#kabupaten").on('change', function() {
            var id_kabupaten = $(this).val();
            $.ajax({
                url: 'get_data/kecamatan.php',
                type: 'post',
                data: {
                    id: id_kabupaten
                },
                success:function(respond){
                    $("#kecamatan").html(respond);
                },
            })
        })

        $("#kecamatan").on('change', function() {
            var id_kecamatan = $(this).val();
            $.ajax({
                url: 'get_data/kelurahan.php',
                type: 'post',
                data: {
                    id: id_kecamatan
                },
                success:function(respond){
                    $("#kelurahan").html(respond);
                },
            })
        })

    })

    $(document).ready(function(){
        $('select').select2({
            theme: 'bootstrap4'
        });
    });
    </script>






</body>

</html>