<?php
  include '../koneksi/koneksi.php';

  $id = $_POST['id'];

  $prov = mysqli_query($koneksi, "SELECT * FROM wilayah_provinsi ORDER BY nama ASC");
  $data = '<option value="">-- Pilih Provinsi --</option>';
  echo $data;
  while($data_provinsi = mysqli_fetch_assoc($prov)):
?>
  <option value="<?= $data_provinsi['id']?>" <?php if($data_provinsi['id'] == $id){echo 'selected'; }?>>Prov. <?= $data_provinsi['nama']?></option>
<?php endwhile; ?>