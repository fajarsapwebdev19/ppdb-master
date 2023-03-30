<!-- view data admin -->
<div class="modal fade" id="view<?= $admin['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View Data Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <a href="../doc/<?= $admin['sk_tugas']?>" target="_blank" class="btn btn-success btn-sm">View Sk</a>
        <div class="form-group mt-3">
            <label class="col-form-label">Nama</label>
            <input type="text" class="form-control" value="<?= $admin['nama'] ?>" disabled>
        </div>
        <div class="form-group mt-3">
            <label class="col-form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" value="<?= $admin['jenis_kelamin'] ?>" disabled>
        </div>
        <div class="form-group mt-3">
            <label class="col-form-label">Tempat Lahir</label>
            <input type="text" class="form-control" value="<?= $admin['tempat_lahir'] ?>" disabled>
        </div>
        <div class="form-group mt-3">
            <label class="col-form-label">Tanggal Lahir</label>
            <input type="text" class="form-control" value="<?= date('d-m-Y', strtotime($admin['tanggal_lahir'])) ?>" disabled>
        </div>
        <div class="form-group mt-3">
            <label class="col-form-label">NIK</label>
            <input type="text" class="form-control" value="<?= $admin['nik'] ?>" disabled>
        </div>
        <div class="form-group mt-3">
            <label class="col-form-label">Agama</label>
            <input type="text" class="form-control" value="<?= $admin['agama'] ?>" disabled>
        </div>
        <?php
            // get name provinsi, kabupaten/kota,  kecamatan, kelurahan

            $prov = $admin['provinsi'];
            $get_prov = mysqli_query($koneksi, "SELECT * FROM wilayah_provinsi WHERE id='$prov'");
            $get_name_provinsi = mysqli_fetch_assoc($get_prov);
            $provinsi_name = $get_name_provinsi['nama'];

            $kab = $admin['kabupaten'];
            $get_kab = mysqli_query($koneksi, "SELECT * FROM wilayah_kabupaten WHERE id='$kab'");
            $get_name_kabupaten = mysqli_fetch_assoc($get_kab);
            $kabupaten_name = $get_name_kabupaten['nama'];

            $kec = $admin['kecamatan'];
            $get_kec = mysqli_query($koneksi, "SELECT * FROM wilayah_kecamatan WHERE id='$kec'");
            $get_name_kecamatan = mysqli_fetch_assoc($get_kec);
            $kecamatan_name = $get_name_kecamatan['nama'];

            $kel = $admin['kelurahan'];
            $get_kel = mysqli_query($koneksi, "SELECT * FROM wilayah_desa WHERE id='$kel'");
            $get_name_kelurahan = mysqli_fetch_assoc($get_kel);
            $kelurahan_name = $get_name_kelurahan['nama'];
        ?>
        <div class="form-group mt-3">
            <label class="col-form-label">Alamat</label>
            <textarea name="alamat" class="form-control" disabled rows="5"><?= $admin['alamat'] ?>, RT <?= $admin['rt']?>, RW <?= $admin['rw'] ?>, Kel <?= $kelurahan_name; ?>, Kec, <?= $kecamatan_name; ?>, Kota <?= $kabupaten_name; ?>, Prov. <?= $provinsi_name; ?></textarea>
        </div>
        <div class="form-group mt-3">
            <label class="col-form-label">No Telp</label>
            <input type="text" class="form-control" value="<?= $admin['no_telp'] ?>" disabled>
        </div>
        <div class="form-group mt-3">
            <label class="col-form-label">No SK Tugas</label>
            <input type="text" class="form-control" value="<?= $admin['no_sk_tugas'] ?>" disabled>
        </div>
        <div class="form-group mt-3">
            <label class="col-form-label">Tanggal SK Tugas</label>
            <input type="text" class="form-control" value="<?= date('d-m-Y', strtotime($admin['tgl_sk_tugas'])) ?>" disabled>
        </div>
        <div class="form-group mt-3">
            <label class="col-form-label">No Telp</label>
            <input type="text" class="form-control" value="<?= $admin['no_telp'] ?>" disabled>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end view data admin -->

<!-- update data admin -->
<div class="modal fade" id="edit<?= $admin['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Data Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/update/akun.php" class="form-edit" method="post">
          <input type="hidden" name="username" value="<?= $admin['username'] ?>">
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $admin['nama'] ?>">
          </div>
          <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <br>
            <div class="form-check form-check-inline">
              <input type="radio" name="jenis_kelamin" id="jk_1" class="form-check-input" value="Laki-Laki" <?php if($admin['jenis_kelamin'] == "Laki-Laki"){echo 'checked';} ?>
              <label class="form-check-label" for="jk_1">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" name="jenis_kelamin" id="jk_2" class="form-check-input" value="Perempuan" <?php if($admin['jenis_kelamin'] == "Perempuan"){echo 'checked';}?>>
              <label for="jk_2" class="form-check-label">Perempuan</label>
            </div>
          </div>
          <div class="form-group">
            <label for="">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="<?= $admin['tempat_lahir'] ?>">
          </div>
          <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control tanggal" value="<?= date('d-m-Y', strtotime($admin['tanggal_lahir'])); ?>">
          </div>
          <div class="form-group">
            <label for="">Agama</label>
            <select name="agama" class="form-control">
              <option value="">-- Pilih Salah Satu --</option>
              <option <?php if($admin['agama'] == "Islam"){echo 'selected';}?>>Islam</option>
              <option <?php if($admin['agama'] == "Kristen/Protestan"){echo 'selected';}?>>Kristen/Protestan</option>
              <option <?php if($admin['agama'] == "Katholik"){echo 'selected';}?>>Katholik</option>
              <option <?php if($admin['agama'] == "Hindu"){echo 'selected';}?>>Hindu</option>
              <option <?php if($admin['agama'] == "Budha"){echo 'selected';}?>>Budha</option>
              <option <?php if($admin['agama'] == "Kong Hucu"){echo 'selected';} ?>>Kong Hucu</option>
              <option <?php if($admin['agama'] == "Kepercayaan Kepada Tuhan YME"){echo 'selected';}?>>Kepercayaan Kepada Tuhan YME</option>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">No Telp</label>
            <input type="text" name="no_telp" class="form-control" value="<?= $admin['no_telp'] ?>">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">No Sk Tugas</label>
            <input type="text" name="no_sk_tugas" class="form-control" value="<?= $admin['no_sk_tugas']?>">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Tanggal SK Tugas</label>
            <input type="text" name="tgl_sk_tugas" class="form-control tanggal" value="<?= date('d-m-Y', strtotime($admin['tgl_sk_tugas']))?>">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="<?= $admin['jabatan']?>">
          </div>
          <div class="modal-footer">
            <button type="submit" name="update_admin" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end update data admin -->

<!-- block akun admin -->
<div class="modal fade" id="block<?= $admin['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php
        if($admin['status_akun'] == "Aktif")
        {
          ?>
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Blokir Akun Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../proses/management_akun/admin.php" method="post">
                <input type="hidden" name="username" value="<?= $admin['username'] ?>">
                <div class="form-group text-center">
                  <p>Apakah Anda Yakin Ingin Memblokir Akun Tersebut ? </p>
                  <button type="submit" name="nonactive" class="btn btn-success">Ya, Nonaktifkan</button>
                  <button data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                </div>
              </form>
            </div>
          <?php
        }elseif($admin['status_akun'] == "Tidak Aktif")
        {
          ?>
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Aktifkan Kembali Akun Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../proses/management_akun/admin.php" method="post">
                <input type="hidden" name="username" value="<?= $admin['username'] ?>">
                <div class="form-group text-center">
                  <p>Apakah Anda Yakin Ingin Mengaktifkan Kembali Akun Tersebut ? </p>
                  <button type="submit" name="active" class="btn btn-success">Ya, Aktifkan</button>
                  <button data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                </div>
              </form>
            </div>
          <?php
        }
      ?>
    </div>
  </div>
</div>
<!-- end block akun admin -->

<!-- hapus data admin -->
<div class="modal fade" id="delete<?= $admin['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/delete/akun.php" method="post">
          <input type="hidden" name="username" value="<?= $admin['username'] ?>">
          <div class="text-center">
            <p>Apakah Anda Yakin Ingin Menghapus Akun Tersebut ?</p>
            <button type="submit" name="hapus_admin" class="btn btn-success">Ya</button>
            <button data-bs-dismiss="modal" class="btn btn-danger">Tidak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end hapus data admin -->