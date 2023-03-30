<?php
    require '../../koneksi/koneksi.php';
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $sql = mysqli_query($koneksi, "SELECT
    user.id,
    user.nama,
    user.jenis_kelamin,
    user.tempat_lahir,
    user.tanggal_lahir,
    user.nik,
    user.agama,
    user.alamat,
    user.rt,
    user.rw,
    wilayah_provinsi.nama AS name_prov,
    wilayah_kabupaten.nama AS name_kab,
    wilayah_kecamatan.nama AS name_kec,
    wilayah_desa.nama AS name_kel,
    user.no_telp,
    user.username,
    user.tanggal_registrasi
    FROM user
    JOIN wilayah_provinsi ON user.provinsi = wilayah_provinsi.id
    JOIN wilayah_kabupaten ON user.kabupaten = wilayah_kabupaten.id
    JOIN wilayah_kecamatan ON user.kecamatan = wilayah_kecamatan.id
    JOIN wilayah_desa ON user.kelurahan = wilayah_desa.id
    WHERE user.id='$id'
    ");
    $data = mysqli_fetch_object($sql);
?>
<div class="modal-body">
    <div class="mb-3">
        <label for="">Nama</label>
        <input type="text" class="form-control" value="<?= $data->nama; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Jenis Kelamin</label>
        <input type="text" class="form-control" value="<?= $data->jenis_kelamin; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Tempat, Tanggal Lahir</label>
        <input type="text" class="form-control" value="<?= $data->tempat_lahir; ?>,<?= ($data->tanggal_lahir == "" || $data->tanggal_lahir == NULL) ? '' : date('d-m-Y', strtotime($data->tanggal_lahir)) ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">NIK</label>
        <input type="text" class="form-control" value="<?= $data->nik; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Agama</label>
        <input type="text" class="form-control" value="<?= $data->agama; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Alamat</label>
        <input type="text" class="form-control" value="<?= $data->alamat; ?>" disabled>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">RT</label>
                <input type="text" class="form-control" value="<?= $data->rt; ?>" disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">RW</label>
                <input type="text" class="form-control" value="<?= $data->rw; ?>" disabled>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="">Provinsi</label>
        <input type="text" class="form-control" value="<?= $data->name_prov; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Kabupaten</label>
        <input type="text" class="form-control" value="<?= $data->name_kab; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Kecamatan</label>
        <input type="text" class="form-control" value="<?= $data->name_kec; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Kelurahan</label>
        <input type="text" class="form-control" value="<?= $data->name_kel; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">No Telp</label>
        <input type="text" class="form-control" value="<?= $data->no_telp; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Username</label>
        <input type="text" class="form-control" value="<?= $data->username; ?>" disabled>
    </div>
</div>
<div class="modal-footer">
    <form method="post">
        <input type="hidden" name="id" id="user_id" value="<?= $data->id; ?>">
        <button type="button" class="btn btn-success terima">Terima</button>
        <button type="button" class="btn btn-danger tolak">Tolak</button>
    </form>
</div>