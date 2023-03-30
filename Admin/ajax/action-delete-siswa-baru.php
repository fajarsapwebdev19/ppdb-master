<?php
    require '../../koneksi/koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $_POST['id']);

    $sb = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE id='$id'");

    $data = mysqli_fetch_object($sb);
?>
<div class="modal-body">
    <p>Apakah Anda Yakin Ingin Hapus Data Tersebut ?</p>
    <input type="hidden" name="id" value="<?= $data->id; ?>">
</div>
<div class="modal-footer">
    <button type="button" id="hapus" class="btn btn-success">Ya, Hapus</button>
    <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
</div>

