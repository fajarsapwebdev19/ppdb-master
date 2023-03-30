<?php
session_start();
include 'proses_login.php';

// data_aplikasi
$aplication = mysqli_query($koneksi, "SELECT * FROM aplikasi");
$app = mysqli_fetch_assoc($aplication);

// data login
$login = mysqli_query($koneksi, "SELECT * FROM halaman_login");
$halaman_login = mysqli_fetch_assoc($login);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/login/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../assets/login/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="../assets/login/css/style.css">

    <!-- icon -->

    <link rel="shortcut icon" href="../assets/img/logo/<?= $app['logo_sekolah']?>" type="image/x-icon">

    <style>
        @font-face {
            font-family: "Quicksand";
            src: url('../assets/font/Quicksand/static/Quicksand-Regular.ttf');
        }

        body {
            background-color: #fff;
            font-family: Quicksand, sans-serif;
        }

        .content {
            padding: 4rem 0;
        }

        .content a {
            text-decoration: none;
        }

        .content a:hover {
            color: darkblue;
        }

        .content .text-link {
            font-size: 14px;
        }

        .form-control {
            font-size: 10px;
        }
    </style>

    <title>Login - PPDB SEKOLAH</title>
</head>

<body>
    <!-- start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                        if(empty($halaman_login['vektor']))
                        {
                            ?>
                                <img src="../Foto/ppdb.png" alt="Image" class="img-fluid">
                            <?php
                        }else{
                            ?>
                                <img src="../Foto/<?= $halaman_login['vektor'] ?>" alt="Image" class="img-fluid">
                            <?php
                        }
                    ?>
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Login PPDB</h3>
                                <h2><?= $app['nama_sekolah'] ?></h2>
                                <p class="mb-4">TAHUN AJARAN <?= $halaman_login['tahun_ajaran']?></p>
                            </div>
                            <!-- validasi ketika si user salah password -->
                            <?php
                                if (isset($_SESSION['val']) && $_SESSION['val'] != '') {
                                    echo $_SESSION['val'];
                                    unset($_SESSION['val']);
                                }
                                elseif(isset($_SESSION['val_non']) && $_SESSION['val_non'] !=''){
                                    echo $_SESSION['val_non'];
                                    unset($_SESSION['val_non']);
                                }
                            ?>
                            <form action="" method="post" class="needs-validation" novalidate autocomplete="off">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" required>

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-block btn-<?= $halaman_login['warna_tombol_login']?>"> Login </button>

                                <div class="mt-3 text-center text-link">
                                    Lupa Password ? <a href="../Reset/">Reset Password</a>
                                </div>

                                <div class="mt-3 text-center text-link">
                                    Tidak Bisa Login ? <a href="../?page=Cek">Cek Akun Disini</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end content -->


    <script src="../assets/login/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/login/js/popper.min.js"></script>
    <script src="../assets/login/js/bootstrap.min.js"></script>
    <script src="../assets/login/js/main.js"></script>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        window.setTimeout(function() {
            $("#auto-close").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 10000);
    </script>
</body>

</html>