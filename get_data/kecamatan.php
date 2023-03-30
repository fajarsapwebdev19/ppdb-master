<?php
    include '../koneksi/koneksi.php';

    $id = $_POST['id'];

    $kec = mysqli_query($koneksi, "SELECT * FROM wilayah_kecamatan WHERE kabupaten_id='$id' ORDER BY nama ASC");
    $op_kec = '<option value="">Pilih Kecamatan</option>';
    echo $op_kec;
    while($kecamatan = mysqli_fetch_assoc($kec)){
        ?>
            <option value="<?= $kecamatan['id'] ?>">Kec. <?= $kecamatan['nama'] ?></option>
        <?php
    }
?>