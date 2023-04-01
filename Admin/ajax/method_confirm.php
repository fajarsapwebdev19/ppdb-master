<?php
    require '../../koneksi/koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $_POST['id']);

    $sql = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE id='$id'");
    $data = mysqli_fetch_object($sql);
?>
<div class="modal-body">
    <p class="text-center">
        <input type="hidden" name="username" value="<?= $data->username; ?>">
        Apakah Anda Ingin Konfirmasi Bahwa Siswa Tersebut Ingin Melakukan Perubahan Data ?
        <br><br>
        <button type="submit" class="btn btn-success ok">
            Ya
        </button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            Tidak
        </button>
    </p>
</div>