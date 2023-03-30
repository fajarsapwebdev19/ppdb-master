<div class="modal fade" id="profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../proses/update/data_user.php" method="POST">
        <div class="modal-body">
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
              <input type="text" name="nama" class="form-control" value="<?= $data_admin['nama']; ?>">
              <input type="hidden" name="id" value="<?= $data_admin['id'] ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Jenis Kelamin</label>
            <div class="col-md-10 mt-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki" <?= ($data_admin['jenis_kelamin'] == "Laki-Laki") ? 'checked' : ''; ?>>
                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan" <?= ($data_admin['jenis_kelamin'] == "Perempuan") ? 'checked' : ''; ?>>
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Tempat Lahir</label>
            <div class="col-md-10">
              <input type="text" name="tempat_lahir" class="form-control" value="<?= $data_admin['tempat_lahir']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Tanggal Lahir</label>
            <div class="col-md-10">
              <input type="text" name="tanggal_lahir" class="form-control tanggal" value="<?= ($data_admin['tanggal_lahir'] == "" || $data_admin['tanggal_lahir'] == NULL ? '' : date('d-m-Y', strtotime($data_admin['tanggal_lahir']))) ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">NIK</label>
            <div class="col-md-10">
              <input type="text" name="nik" class="form-control" value="<?= $data_admin['nik']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Agama</label>
            <div class="col-md-10">
              <select name="agama" class="form-control opsi">
                <option value="">Pilih</option>
                <?php
                while ($a = mysqli_fetch_object($agama)) {
                ?>
                  <option <?= ($a->nama_agama == $data_admin['agama']) ? 'selected' : ''; ?>><?= $a->nama_agama; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Alamat</label>
            <div class="col-md-10">
              <input type="text" name="alamat" class="form-control" value="<?= $data_admin['alamat']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2">RT</label>
            <div class="col-md-4">
              <input type="text" name="rt" class="form-control" value="<?= $data_admin['rt'] ?>">
            </div>
            <label for="" class="col-md-2">RW</label>
            <div class="col-md-4">
              <input type="text" name="rw" class="form-control" value="<?= $data_admin['rw'] ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Provinsi</label>
            <div class="col-md-10" id="locationCodesParent">
              <select name="prov" id="provinsi" class="form-control opsi">
                <option value="">Pilih</option>
                <?php
                $prov = mysqli_query($koneksi, "SELECT * FROM wilayah_provinsi");
                while ($p = mysqli_fetch_object($prov)) {
                ?>
                  <option value="<?= $p->id; ?>"><?= $p->nama; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Kabupaten</label>
            <div class="col-md-10" id="locationCodesParent">
              <select name="kab" id="kabupaten" class="form-control opsi">

              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Kecamatan</label>
            <div class="col-md-10" id="locationCodesParent">
              <select name="kec" id="kecamatan" class="form-control opsi">

              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Kelurahan</label>
            <div class="col-md-10" id="locationCodesParent">
              <select name="kel" id="kelurahan" class="form-control opsi">

              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">No Telp</label>
            <div class="col-md-10">
              <input type="text" name="no_telp" class="form-control" value="<?= $data_admin['no_telp']?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">No SK Tugas</label>
            <div class="col-md-10">
              <input type="text" name="no_sk" class="form-control" value="<?= $data_admin['no_sk_tugas']?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Tgl SK Tugas</label>
            <div class="col-md-10">
              <input type="text" name="tanggal_sk" class="form-control tanggal" value="<?= (empty($data_admin['tgl_sk_tugas']) || $data_admin['tgl_sk_tugas']==NULL|| $data_admin['tgl_sk_tugas'] == "") ? '' : date('d-m-Y', strtotime($data_admin['tgl_sk_tugas']))?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="" class="col-md-2 col-form-label">Jabatan</label>
            <div class="col-md-10">
                <input type="text" name="jabatan" class="form-control" value="<?= $data_admin['jabatan'] ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="update_admin" class="btn btn-info">Update</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="update-sk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update SK Tugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../proses/update/file_sk.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <button type="button" onclick="javascript=window.location.href='../doc/<?= $data_admin['sk_tugas'] ?>'" class="btn btn-success btn-sm" <?= ($data_admin['sk_tugas'] == "" || $data_admin['sk_tugas'] == NULL) ? 'disabled' : ''; ?>>
            <em class="fas fa-file"></em> File SK Lama
          </button>
          <div class="form-group mb-3">
            <label for="">File SK</label>
            <input type="file" name="file_sk" class="form-control">
            <input type="hidden" name="id" value="<?= $data_admin['id'] ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="upload_sk_baru" class="btn btn-success">Upload</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="upload_foto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Upload Foto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../proses/update/foto_profile_user.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="">Foto</label>
            <input type="file" name="foto" class="form-control">
            <input type="hidden" name="id" value="<?= $data_admin['id'] ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="update" class="btn btn-success">Upload</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="../assets/jquery-3.5.1.min.js"></script>

<script>
  $('#provinsi').ready(function() {
    $.ajax({
      url: '../get_data/update_provinsi.php',
      type: 'post',
      data: {
        id: <?= $data_admin['provinsi'] ?>
      },
      success: function(response) {
        $('#provinsi').html(response);
      }
    });

    $('#provinsi').on('change', function() {
      $('#kecamatan').html(null);
      $('#kelurahan').html(null);
    })
  });
  $('#kabupaten').ready(function() {
    $.ajax({
      url: '../get_data/update_kabupaten.php',
      type: 'post',
      data: {
        id: <?= $data_admin['provinsi'] ?>,
        select_kabupaten: <?= $data_admin['kabupaten'] ?>
      },
      success: function(respond) {
        $("#kabupaten").html(respond);
      }
    });

    $('#kabupaten').on('change', function() {
      $('#kelurahan').html(null);
    })
  });

  $('#kecamatan').ready(function() {
    $.ajax({
      url: '../get_data/update_kecamatan.php',
      type: 'post',
      data: {
        id: <?= $data_admin['kabupaten'] ?>,
        select_kecamatan: <?= $data_admin['kecamatan'] ?>
      },
      success: function(respond) {
        $("#kecamatan").html(respond);
      }
    });
  });

  $('#kelurahan').ready(function() {
    $.ajax({
      url: '../get_data/update_kelurahan.php',
      type: 'post',
      data: {
        id: <?= $data_admin['kecamatan'] ?>,
        select_kelurahan: <?= $data_admin['kelurahan'] ?>
      },
      success: function(respond) {
        $("#kelurahan").html(respond);
      }
    });
  })
</script>