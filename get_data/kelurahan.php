<?php
    include '../koneksi/koneksi.php';

    $id = $_POST['id'];

    $kel = mysqli_query($koneksi, "SELECT * FROM wilayah_desa WHERE kecamatan_id='$id' ORDER BY nama ASC");
    $op_kel = '<option value="">Pilih Kelurahan</option>';
    echo $op_kel;
    while($kelurahan = mysqli_fetch_assoc($kel)){
        ?>
            <option value="<?= $kelurahan['id'] ?>"><?= $kelurahan['nama'] ?></option>
        <?php
    }
?>