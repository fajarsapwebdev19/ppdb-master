<?php
    session_start();
    require '../../koneksi/koneksi.php';

    if(isset($_POST['id']))
    {
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);
        $status_approval = mysqli_real_escape_string($koneksi, $_POST['status_approval']);
        $alasan_tolak = mysqli_real_escape_string($koneksi, $_POST['alasan_tolak']);

        if(empty($status_approval))
        {
            $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                <div class="alert-message">
                    <em class="fas fa-times"></em> Gagal ! Anda Belum Menentukan Status Approval
                </div>
            </div>';
        }else{
            $approve = mysqli_query($koneksi, "UPDATE data_peserta_baru SET status_approval='$status_approval', keterangan_tolak='$alasan_tolak' WHERE id='$id'");

            if($approve)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                    <div class="alert-message">
                        <em class="fas fa-check"></em> Berhasil Melakukan Approval Siswa !
                    </div>
                </div>';
            }
        }
    }
?>