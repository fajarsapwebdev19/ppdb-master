<?php
session_start();
require 'koneksi/koneksi.php';
    if(isset($_POST['kirim']))
    {
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $subject_mail = mysqli_real_escape_string($koneksi, $_POST['subject']);
        $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

        if(empty($nama & $email & $subject_mail & $pesan))
        {
            $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                Mohon Lengkapi Data !
            </div>';
        }else{
            $to = "admserverhebat1207@gmail.com";
            $subject = "Email dengan HTML";
            $message = "<h3>Pesan Dari {$nama} Melalui WEB PPDB SMK PGRI NEGLASARI</h3>
            <h5>Nama</h5><p>{$nama}</p>
            <h5>Email</h5><p>{$email}</p>
            <h5>Perihal</h5><p>{$subject_mail}</p>
            <h5>Pesan</h5><p>{$pesan}</p>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: ' . $email . "\r\n";

            $kirim = mail($to,$subject,$message,$headers);

            if($kirim)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                    Berhasil Kirim Pesan !
                </div>';
            }else{
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                    Gagal Kirim !
                </div>';
            }
        }
    }
?>
<div class="mt-2" style="padding: 10px 0;">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <?php
                if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                {
                    echo $_SESSION['val'];
                    unset($_SESSION['val']);
                }
            ?>
            <h3 class="mb-4">Kontak Kami</h3>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control col-md-8">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control col-md-8">
                </div>
                <div class="form-group">
                    <label for="">Perihal</label>
                    <input type="text" name="subject" class="form-control col-md-8">
                </div>
                <div class="form-group">
                    <label for="">Pesan Anda</label>
                    <textarea name="pesan" id="" rows="5" class="form-control col-md-8"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="kirim" class="btn btn-success">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>