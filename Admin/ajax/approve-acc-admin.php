<?php
    require '../../koneksi/koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $_POST['id']);

    $sql = mysqli_query($koneksi, "SELECT *,admin.nama, admin.id, wilayah_provinsi.nama AS name_prov, wilayah_kabupaten.nama AS name_kab, wilayah_kecamatan.nama AS name_kec, wilayah_desa.nama AS name_desa FROM admin JOIN wilayah_provinsi ON admin.provinsi = wilayah_provinsi.id JOIN wilayah_kabupaten ON admin.kabupaten = wilayah_kabupaten.id JOIN wilayah_kecamatan ON admin.kecamatan = wilayah_kecamatan.id JOIN wilayah_desa ON admin.kelurahan = wilayah_desa.id WHERE admin.id='$id'");

    $data_antri_admin = mysqli_fetch_assoc($sql);
?>

<div class="modal-body">
    <div class="form-group">
        <label class="mt-3">Nama</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['nama']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Jenis Kelamin</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['jenis_kelamin']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">NIK</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['nik']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Tempat, Tanggal Lahir</label>
        <input type="text" class="form-control mt-2"
            value="<?= $data_antri_admin['tempat_lahir']?>, <?= date('d-m-Y', strtotime($data_antri_admin['tanggal_lahir']))?>"
            disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Agama</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['agama']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Alamat</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['alamat']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">RT</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['rt']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">RW</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['rw']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Provinsi</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['name_prov'] ?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Kabupaten / Kota</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['name_kab'] ?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Kecamatan</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['name_kec']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Desa / Kelurahan</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['name_desa'] ?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">No Telp</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['no_telp']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">No SK Tugas</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['no_sk_tugas']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Tanggal SK Tugas</label>
        <input type="text" class="form-control mt-2"
            value="<?= ($data_antri_admin['tgl_sk_tugas'] == "" || $data_antri_admin['tgl_sk_tugas'] == NULL) ? '' : date('d-m-Y', strtotime($data_antri_admin['tgl_sk_tugas']))  ?>"
            disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Jabatan</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['jabatan']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Username</label>
        <input type="text" class="form-control mt-2" value="<?= $data_antri_admin['username']?>" disabled>
    </div>
    <div class="form-group">
        <label class="mt-3">Tanggal Registrasi</label>
        <input type="text" class="form-control mt-2"
            value="<?= date('d-m-Y',strtotime($data_antri_admin['tanggal_registrasi'])) ?>" disabled>
    </div>
    <form class="needs-validation" id="approve-form" method="post">
        <input type="hidden" name="id" id="id_user" value="<?= $data_antri_admin['id']?>">
        <div class="modal-footer">
            <button type="button" class="btn btn-success terima">Terima</button>
            <button type="button" class="btn btn-danger tolak">Tolak</button>
        </div>
    </form>
</div>