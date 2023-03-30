<?php
    session_start();
    require '../koneksi/koneksi.php';
    require '../get_data/master_data.php';

    // jika token auth tidak ada maka akan redirect kembali ke halaman login
    if(empty($_SESSION['login_status']))
    {
        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">Anda Belum Login !</div>';
        header('location: ../login/');
    }
    // jika user login dengan keadaan status akun tidak aktif maka akan di redirect ke halaman login dan menunset semua session yang masuk
    elseif($_SESSION['status_akun'] == "Tidak Aktif")
    {
        $_SESSION['val_non'] = '<div class="alert alert-success bg-danger text-white">Akun Anda Tidak Aktif</div>';

        unset($_SESSION['username']);
        unset($_SESSION['level']);
        unset($_SESSION['status_akun']);
        unset($_SESSION['token_auth']);
        header('location: ../login/');
    }

    $level = $_SESSION['level'];

    if($level == "Admin")
    {
        if($level != 'Calon Siswa'){
            ?>
                <script>
                    alert('Anda Bukan Calon Siswa');
                    document.location.href='../Admin/';
                </script>
            <?php
        }
    }

    $username = $_SESSION['username'];

    // query data user in table user
    $user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    $data_user = mysqli_fetch_assoc($user);

    // insial data nama 
    $inisial = mysqli_query($koneksi, "SELECT LEFT(nama,1) as nama FROM user WHERE username='$username'");
    $in = mysqli_fetch_assoc($inisial);

    // data_pengaturan aplikasi
    $aplikasi = mysqli_query($koneksi, "SELECT * FROM aplikasi");
    $apl = mysqli_fetch_assoc($aplikasi);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Halaman Calon Siswa PPDB">
	<meta name="author" content="Fajar Saputra">
	<meta name="keywords" content="ppdb,ppdb smk,calon siswa,siswa page">

	<title>Calon Siswa - PPDB SEKOLAH</title>

    <link rel="shortcut icon" href="../assets/img/logo/<?= $apl['logo_sekolah']?>" type="image/x-icon">

    <link rel="stylesheet" href="../assets/halaman_awal/bootstrap/css/bootstrap.min.css">

	<link href="../assets/admin/css2.css?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<link href="../assets/admin/css/light.css" rel="stylesheet">
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<link class="js-stylesheet" href="../assets/admin/css/light.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.11.5/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="../assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

    

    <!-- select 2 -->
    <link rel="stylesheet" href="../assets/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../assets/select-2-bs-5/select2-bootstrap-5-theme.min.css">
	<style>
        @font-face {
            font-family: 'Quicksand';
            src: url('../assets/font/Quicksand/static/Quicksand-Regular.ttf');
        }
		body {
			opacity: 0;
            font-family: 'Quicksand';
		}

        label.error{
            color: red;
            margin-left: 5px;
            font-size: 12px;
        }

        input.error{
            border: 1px solid red;
        }

        .bg-dark-dev{
            color: #000;
            background-color: #FFF;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 20px;
            font-size: 14px;
            user-select: none;
            -webkit-user-select: none;
        }

        
	</style>
	<!-- END SETTINGS -->
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">
        <?php require 'template/sidebar/user.php'; ?>
        <div class="main">
            <?php require 'template/header/user.php'; ?>
            <main class="content">
                <?php require 'template/page/user.php'; ?>
            </main>
        </div>
    </div>
    <script src="../assets/jquery-3.5.1.min.js"></script>
    <script src="../assets/popper.min.js"></script>
	<script src="../assets/admin/js/app.js"></script>

    <script src="../assets/jquery-validation/jquery.validate.js"></script>

    <script src="../assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/DataTables/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="../assets/DataTables/DataTables-1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script src="../assets/select2/dist/js/select2.min.js"></script>

    <script src="../assets/select2/dist/js/select2.full.min.js"></script>

    <script src="../assets/showhide_form.js"></script>

	<script>
        $(document).ready(function() {
            $('.opsi').select2({
                theme: "bootstrap-5",
                width: '100%'
            });
        })

		document.addEventListener("DOMContentLoaded", function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')
			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function(form) {
					form.addEventListener('submit', function(event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}
						form.classList.add('was-validated')
					}, false)
				})
		    });

            $(document).ready(function() {
                $("#update_password").validate({
                    rules: {
                        konfirmasi_password_baru:{
                            required: true,
                            equalTo: "#pass_baru"
                        },
                        password_lama:{
                            required: true
                        },
                        password_baru:{
                            required: true
                        },
                        "#tanggal":{
                            required: true
                        }
                    },
                    messages: {
                        konfirmasi_password_baru:{
                            required: '<div class="error text-danger mt-2">Konfirmasi Password Tidak Kosong</div>',
                            equalTo: "<div class='error text-danger mt-2'>Password Anda Tidak Sama</div>"
                        },
                        password_baru:{
                            required: '<div class="error text-danger mt-2">Password Baru Tidak Boleh Kosong</div>'
                        },
                        password_lama:{
                            required: '<div class="error text-danger mt-2">Password Lama Tidak Boleh Kosong</div>'
                        },
                        "#tanggal":{
                            required: '<div class="error text-danger mt-2">Tanggal Terima Kosong</div>'
                        }
                    }
                });
            });

            // datepicker
            $("#tanggal").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true
            });

            $('.tanggal_lahir').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true
            });

            $('#tanggal_batas').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true
            });

            $(".tgl_sk_tugas").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true
            });

            // input hanya angka saja 
            function getkey(e){
                if (window.event)
                    return window.event.keyCode;
                else if (e)
                    return e.which;
                else
                    return null;
            }

            function goodchars(e, goods, field) {
            var key, keychar;
            key = getkey(e);
            if (key == null) return true;

            keychar = String.fromCharCode(key);
            keychar = keychar.toLowerCase();
            goods = goods.toLowerCase();

            // check goodkeys
            if (goods.indexOf(keychar) != -1)
                return true;
            // control keys
            if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
                return true;

            if (key == 13) {
                var i;
                for (i = 0; i < field.form.elements.length; i++)
                    if (field == field.form.elements[i])
                        break;
                i = (i + 1) % field.form.elements.length;
                field.form.elements[i].focus();
                return false;
            };
            // else return false
            return false;
            }

            $(document).ready(function() {
                $('#provinsi').on('change', function() {
                    var id_provinsi = $(this).val();
                    $.ajax({
                        url: '../get_data/kabupaten.php',
                        type: 'post',
                        data: {
                            id: id_provinsi
                        },
                        success: function(respond)
                        {
                            $("#kabupaten").html(respond);
                        },
                    });
                });

                $("#kabupaten").on('change', function() {
                    var id_kabupaten = $(this).val();
                    $.ajax({
                        url: '../get_data/kecamatan.php',
                        type: 'post',
                        data: {
                            id: id_kabupaten
                        },
                        success:function(respond){
                            $("#kecamatan").html(respond);
                        },
                    });
                });

                $("#kecamatan").on('change', function() {
                    var id_kecamatan = $(this).val();
                    $.ajax({
                        url: '../get_data/kelurahan.php',
                        type: 'post',
                        data: 
                        {
                            id: id_kecamatan
                        },
                        success:function(respond)
                        {
                            $("#kelurahan").html(respond);
                        }
                    });
                });

                $.ajax({
                    url: '../get_data/update_provinsi.php',
                    type: 'post',
                    data:{
                        id: <?= $data_user['provinsi'] ?>
                    },
                    success:function(respond)
                    {
                        $("#provinsi").html(respond);
                    }
                });

                $.ajax({
                    url: '../get_data/update_kabupaten.php',
                    type: 'post',
                    data: {
                        id: <?= $data_user['provinsi'] ?>,
                        select_kabupaten: <?= $data_user['kabupaten'] ?>
                    }, 
                    success:function(respond)
                    {
                        $("#kabupaten").html(respond);
                    }
                });

                $.ajax({
                    url: '../get_data/update_kecamatan.php',
                    type: 'post',
                    data:{
                        id: <?= $data_user['kabupaten'] ?>, 
                        select_kecamatan: <?= $data_user['kecamatan'] ?>
                    },
                    success:function(respond){
                        $("#kecamatan").html(respond);
                    }
                });

                $.ajax({
                    url: '../get_data/update_kelurahan.php',
                    type: 'post',
                    data: {
                        id: <?= $data_user['kecamatan'] ?>,
                        select_kelurahan: <?= $data_user['kelurahan']?>
                    },
                    success:function(respond)
                    {
                        $("#kelurahan").html(respond);
                    }
                });
            });

            <?php
                if($apl['auto_close_alert'] == "Yes")
                {
                    ?>
                        window.setTimeout(function() {
                            $("#auto-close").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                            });
                        }, 3000);
                    <?php
                }
            ?>

	</script>
</body>

</html>