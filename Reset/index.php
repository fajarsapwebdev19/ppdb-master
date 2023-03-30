<?php
    session_start();
    require '../koneksi/koneksi.php';
    $aplication = mysqli_query($koneksi, "SELECT * FROM aplikasi");
    $app = mysqli_fetch_assoc($aplication);
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
            font-size: 16px;
        }
    </style>

    <title>Reset Password - PPDB SEKOLAH</title>
</head>

<body>
    <!-- start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../assets/login/forgot_password.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Reset Password Akun</h3>
                                <p class="mb-4">Silahkan Masukan Username Anda Untuk Mereset Sebuah Password Anda</p>
                            </div>
                            <!-- validasi ketika si user salah password -->
                            <?php
                                if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                                {
                                    echo $_SESSION['val'];
                                    unset($_SESSION['val']);
                                }
                            ?>
                            <?php
                                if(empty($_GET['page']))
                                {
                                    ?>
                                        <form action="../proses/reset/password.php" method="post" class="needs-validation" novalidate autocomplete="off">
                                            <div class="form-group">
                                                <label for="token_reset" class="col-form-label">Username</label>
                                                <input type="text" name="username" class="form-control" required>
                                                </div>
                                                <button type="submit" name="reset" class="btn btn-block btn-success">Reset Password</button>
                                        </form>
                                    <?php
                                }elseif($_GET['page'] == "recovery")
                                {
                                    if(empty($_GET['token']))
                                    {
                                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                                Not Token
                                            </div>';
                                        header('location: ./');
                                    }else{
                                        if(isset($_GET['token']))
                                        {
                                            $token = $_GET['token'];
                                            
                                            $query = mysqli_query($koneksi, "SELECT token_auth,username,level FROM user WHERE token_auth='$token' UNION SELECT token_auth,username,level FROM admin WHERE token_auth='$token'");
                                            
                                            $cek = mysqli_num_rows($query);

                                            if($cek == 0)
                                            {
                                                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                                    Token Expired
                                                </div>';
                                                header('location: ./');
                                            }else {
                                                $d = mysqli_fetch_object($query);
                                                $token = $d->token_auth;
                                                $level = $d->level;
                                                $_SESSION['level'] = $level;
                                                $_SESSION['token'] = $token;
                                            }
                                        }
                                    }
                                    ?>
                                        <form action="../proses/reset/password.php" method="post">
                                            <div class="form-group">
                                                <label for="">Password Baru</label>
                                                <input type="text" name="password_baru" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Konfirmasi Password Baru</label>
                                                <input type="text" name="kon_password_baru" class="form-control">
                                            </div>
                                            <button type="submit" name="recovery" class="btn btn-block btn-success">Recovery Password</button>
                                        </form>
                                    <?php
                                }
                            ?>
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