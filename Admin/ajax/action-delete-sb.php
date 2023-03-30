<?php
    session_start();
    require '../../koneksi/koneksi.php';

    if(isset($_POST['id']))
    {
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);

        $delete = mysqli_query($koneksi, "DELETE FROM data_peserta_baru WHERE id='$id'");

        if($delete)
        {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                <div class="alert-message">
                    Berhasil Hapus
                </div>
            </div>';
        }
    }
?>