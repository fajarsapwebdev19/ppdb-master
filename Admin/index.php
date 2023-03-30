<?php
session_start();
require '../koneksi/koneksi.php';
require '../get_data/master_data.php';
$page = isset($_GET['page']) ? $_GET['page'] : null;

if (empty($_SESSION['login_status'])) {
    header('location: ../login/');
}


$username = $_SESSION['username'];

// query data user in table user
$admin = mysqli_query($koneksi, "SELECT *, 
admin.id,
admin.username, 
admin.nama,
wilayah_provinsi.nama AS prov,
wilayah_kabupaten.nama AS kab,
wilayah_kecamatan.nama AS kec,
wilayah_desa.nama AS kel
FROM admin
JOIN wilayah_provinsi ON admin.provinsi = wilayah_provinsi.id
JOIN wilayah_kabupaten ON admin.kabupaten = wilayah_kabupaten.id
JOIN wilayah_kecamatan ON admin.kecamatan = wilayah_kecamatan.id
JOIN wilayah_desa ON admin.kelurahan = wilayah_desa.id
WHERE admin.username='$username'");

$data_admin = mysqli_fetch_assoc($admin);

// data_pengaturan aplikasi
$aplikasi = mysqli_query($koneksi, "SELECT * FROM aplikasi");
$apl = mysqli_fetch_assoc($aplikasi);

if ($apl['auto_close_alert'] == "Yes") {
?>
    <script>
        window.setTimeout(function() {
            $("#auto-close").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
<?php
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../assets/img/logo/<?= $apl['logo_sekolah'] ?>">

    <link rel="stylesheet" href="../assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

    <?php require 'templates/title.php'; ?>
    <title><?= ($title == "") ? '' : $title; ?></title>

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="../assets/admin/css/light.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.11.5/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="../assets/select2/dist/css/select2.min.css">

    <link rel="stylesheet" href="../assets/select2/theme/bootstrap/5/select2-bootstrap-5-theme.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="../assets/editor/summernote-lite.min.css">

    </script>

    <style>
        @font-face {
            font-family: 'Poppins';
            src: url('../assets/font/poppins/Poppins-Light.otf');
        }

        * {
            font-size: 13.80px;
        }

        body {
            opacity: 0;
            font-family: "Poppins";
        }

        .form-control:disabled {
            background-color: #fff;
        }

        .select2-container--bootstrap-5 .select2-selection {
            font-size: .875rem;
        }

        .link-profile:hover {
            text-decoration: none;
        }

        .error {
            font-size: 10px;
        }

        .error.form-control {
            border: 1px solid red;
        }
    </style>
    <!-- END SETTINGS -->
    <script async="" src="../assets/admin/gtag/js.js?id=UA-120946860-10"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-120946860-10', {
            'anonymize_ip': true
        });
    </script>
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">
        <?php require 'templates/sidebar.php'; ?>

        <div class="main">
            <?php require 'templates/navbar.php'; ?>

            <main class="content">
                <?php require 'templates/page/page.php'; ?>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="https://github.com/fajarsapwebdev19" class="text-muted"><strong>PPDB</strong></a> &copy; <?= date('Y') ?>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <b>Version 1.6.0</b>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- jquery and app js -->
    <script src="../assets/jquery-3.5.1.min.js"></script>
    <script src="../assets/admin/js/app.js"></script>
    <!-- select 2 js -->
    <script src="../assets/select2/dist/js/select2.min.js"></script>
    <!-- Datatables js -->
    <script src="../assets/DataTables/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="../assets/DataTables/DataTables-1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script src="../assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script src="../assets/editor/summernote-lite.min.js"></script>

    <script src="../assets/jquery-validation/jquery.validate.js"></script>


    <script>
        $('.table').DataTable();

        $('.up_prof').on('click', function() {
            $('#profile').modal('show');
        });

        $('.up_file_sk').click(function() {
            $('#update-sk').modal('show');
        })

        $('.up_foto_prof').click(function() {
            $('#upload_foto').modal('show');
        })

        $('.tanggal').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });

        $(document).ready(function() {
            var parentElement = $("#locationCodesParent");
            $(".opsi").select2({
                placeholder: "Pilih Salah Satu",
                theme: "bootstrap-5",
                dropdownParent: parentElement,
                width: null //select2 to take on width of parent
            }).on('select2:opening select2:closing', function(event) {
                //Disable original search (https://select2.org/searching#multi-select)
                var searchfield = $(this).parent().find('.select2-search__field');
                searchfield.prop('disabled', true);
            });
        });

        $('#provinsi').on('change', function() {
            var id = $(this).val();

            $.ajax({
                url: '../get_data/kabupaten.php',
                data: {
                    id: id
                },
                type: 'POST',
                success: function(response) {
                    $("#kabupaten").html(response);
                }
            });
        });

        $('#kabupaten').on('change', function() {
            var id = $(this).val();

            $.ajax({
                url: '../get_data/kecamatan.php',
                data: {
                    id: id
                },
                type: 'POST',
                success: function(response) {
                    $("#kecamatan").html(response);
                }
            });
        });

        $('#kecamatan').on('change', function() {
            var id = $(this).val();

            $.ajax({
                url: '../get_data/kelurahan.php',
                data: {
                    id: id
                },
                type: 'POST',
                success: function(response) {
                    $('#kelurahan').html(response);
                }
            });
        });

        // view data siswa baru in form
        $('.dts').load("ajax/data-siswa-tolak.php");
        $('.das').load("ajax/data-antrian-siswa.php");
        $('.dtrs').load("ajax/data-terima-siswa-baru.php");

        // data antrian siswa
        $('.das').on('click', '.approve', function() {
            var id = $(this).data("id");
            $.ajax({
                url: 'ajax/approve-siswa-baru.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(response) {
                    $('#approve').modal('show');
                    $('#ver').html(response);
                }
            });
        });

        // on click delete data tolak siswa
        $('.dts').on('click', '.delete', function() {
            var id = $(this).data("id");

            $.ajax({
                url: 'ajax/action-delete-siswa-baru.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(response) {
                    $('#delete').modal('show');
                    $('#delete-form').html(response);
                }
            })
        })

        $('#ver').on('click', '.terima', function() {
            $('.alasan_tolak').hide();
        })

        $('#ver').on('click', '.tolak', function() {
            $('.alasan_tolak').show();
        })

        // verifikasi form pendaftaran siswa
       $('#ver').on('click', '.verif', function() {
            var data = $('#ver').serialize();

            $.ajax({
                url: 'ajax/method-verifikasi-formulir.php',
                data: data,
                type: 'post',
                success:function(response){
                    $('#approve').modal('hide');
                    $('.message').load('ajax/message.php');
                    $('.dts').load("ajax/data-siswa-tolak.php");
                    $('.das').load("ajax/data-antrian-siswa.php");
                    $('.dtrs').load("ajax/data-terima-siswa-baru.php");
                }
            });
       });

        $('#delete-form').on('click', '#hapus', function() {
            var data = $('#delete-form').serialize();

            $.ajax({
                url: "ajax/action-delete-sb.php",
                data: data,
                type: 'post',
                success: function(response) {
                    $('#delete').modal('hide');
                    $('.message').load("ajax/message.php");
                    $('.dts').load("ajax/data-siswa-tolak.php");
                }
            })
        })

        // view data approval akun admin 
        $('.antradm').load("ajax/data-antrian-admin.php");
        $('.trmadm').load("ajax/data-terima-admin.php");
        $('.tlkadm').load("ajax/data-tolak-admin.php");

        // on click approve accept account admin
        $('.antradm').on('click', '.acc-adm', function() {
            var id = $(this).data("id");

            $.ajax({
                url: 'ajax/approve-acc-admin.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    $('#approve').modal('show');
                    $('#verifikasi').html(response);
                }
            })
        })

        // click button terima in approve account admin
        $('#verifikasi').on('click', '.terima', function() {
            var id = $('#id_user').val();
            $.ajax({
                url: 'ajax/proses-approval-admin.php',
                type: 'post',
                data: {
                    id: id,
                    method: 'terima'
                },
                success: function(response) {
                    $('.message').load("ajax/message.php");
                    $('.antradm').load("ajax/data-antrian-admin.php");
                    $('.trmadm').load("ajax/data-terima-admin.php");
                    $('.tlkadm').load("ajax/data-tolak-admin.php");
                    $('#approve').modal('hide');
                }
            })
        })

        // click button tolak in approve admin
        $('#verifikasi').on('click', '.tolak', function() {
            var id = $("#id_user").val();
            $.ajax({
                url: 'ajax/proses-approval-admin.php',
                type: 'post',
                data: {
                    id: id,
                    method: 'tolak'
                },
                success: function(response) {
                    $('.message').load("ajax/message.php");
                    $('.antradm').load("ajax/data-antrian-admin.php");
                    $('.trmadm').load("ajax/data-terima-admin.php");
                    $('.tlkadm').load("ajax/data-tolak-admin.php");
                    $('#approve').modal('hide');
                }
            })
        })

        // view data registration account siswa
        $('.ars').load("ajax/data-antrian-reg-siswa.php");
        $('.trs').load("ajax/data-terima-reg-siswa.php");
        $('.tls').load("ajax/data-tolak-reg-siswa.php");
        
        // click verifikasi akun siswa
        $('.ars').on('click', '.approve', function() {
            var id = $(this).data('id');
            
            $.ajax({
                url: 'ajax/approve-reg-siswa.php',
                data: {id:id},
                type: 'post',
                success:function(response)
                {
                    $('#verifikasi-casis').modal('show');
                    $('#form-verifikasi').html(response);
                }
            })
        })
        
        
        // on click approve accept in account siswa
        $('#form-verifikasi').on('click', '.terima', function() {
            var id = $('#user_id').val();
            $.ajax({
                url: 'ajax/proses-approval-siswa.php',
                type: 'post',
                data: {
                    id: id,
                    method: 'terima'
                },
                success: function(response) {
                    $('.message').load("ajax/message.php");
                    $('.ars').load("ajax/data-antrian-reg-siswa.php");
                    $('.trs').load("ajax/data-terima-reg-siswa.php");
                    $('.tls').load("ajax/data-tolak-reg-siswa.php");
                    $('#verifikasi-casis').modal('hide');
                }
            })
        })

        // on click approve reject account siswa
        $('#form-verifikasi').on('click', '.tolak', function() {
            var id = $('#user_id').val();
            $.ajax({
                url: 'ajax/proses-approval-siswa.php',
                type: 'post',
                data: {
                    id: id,
                    method: 'tolak'
                },
                success: function(response) {
                    $('.message').load("ajax/message.php");
                    $('.ars').load("ajax/data-antrian-reg-siswa.php");
                    $('.trs').load("ajax/data-terima-reg-siswa.php");
                    $('.tls').load("ajax/data-tolak-reg-siswa.php");
                    $('#verifikasi-casis').modal('hide');
                }
            })
        })

        // editor text
        $('.editor').summernote({
            tabsize: 4,
            tabDisable: true,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']]
            ]
        });

        // validation update password
        $("#update_password").validate({
            rules: {
                konfirmasi_password_baru: {
                    required: true,
                    equalTo: "#pass_baru"
                },
                password_lama: {
                    required: true
                },
                password_baru: {
                    required: true
                },
                "#tanggal": {
                    required: true
                }
            },
            messages: {
                konfirmasi_password_baru: {
                    required: '<div class="error text-danger mt-2">Konfirmasi Password Tidak Kosong</div>',
                    equalTo: "<div class='error text-danger mt-2'>Password Anda Tidak Sama</div>"
                },
                password_baru: {
                    required: '<div class="error text-danger mt-2">Password Baru Tidak Boleh Kosong</div>'
                },
                password_lama: {
                    required: '<div class="error text-danger mt-2">Password Lama Tidak Boleh Kosong</div>'
                },
                "#tanggal": {
                    required: '<div class="error text-danger mt-2">Tanggal Terima Kosong</div>'
                }
            }
        });

        
    </script>

</body>

</html>