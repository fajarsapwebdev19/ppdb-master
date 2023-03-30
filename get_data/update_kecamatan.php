<?php
    include '../koneksi/koneksi.php';

    $id = $_POST['id'];
    $select_kecamatan = $_POST['select_kecamatan'];

    $kec = mysqli_query($koneksi, "SELECT * FROM wilayah_kecamatan WHERE kabupaten_id='$id' ORDER BY nama ASC");
    $op_kec = '<option value="">Pilih Kecamatan</option>';
    echo $op_kec;
    while($kecamatan = mysqli_fetch_assoc($kec)){
        ?>
            <option value="<?= $kecamatan['id'] ?>" <?php if($kecamatan['id'] == $select_kecamatan){echo 'selected';}?>>Kec. <?= $kecamatan['nama'] ?></option>
        <?php
    }
?>