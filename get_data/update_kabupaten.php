<?php
    include '../koneksi/koneksi.php';

    $id = $_POST['id'];
    $id_kabupaten = $_POST['select_kabupaten'];
    
    $kab = mysqli_query($koneksi, "SELECT * FROM wilayah_kabupaten WHERE provinsi_id='$id' ORDER BY nama ASC");
    $op_kab = '<option value="">Pilih Kabupaten / Kota </option>';
    echo $op_kab;
    while($kabupaten = mysqli_fetch_assoc($kab)){
?>
    <option value="<?= $kabupaten['id'] ?>" <?php if($kabupaten['id'] == $id_kabupaten){echo 'selected';}?>><?= $kabupaten['nama']?></option>
<?php   
        }
?>