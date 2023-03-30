<!-- btn update profile -->
<div class="modal fade" id="profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/update/data_user.php" method="post" autocomplete="off" class="needs-validation" novalidate>
          <input type="text" name="username" value="<?= $data_user['username']; ?>" style="display: none;">
           <!-- start nama  -->
          <div class="form-group row mt-4">
            <label for="nama" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $data_user['nama']?>" required>
            </div>
          </div>
          <!-- end nama -->

          <!-- start jenis kelamin -->
          <div class="form-group row mt-4">
            <label class="col-md-2 col-form-label">Jenis Kelamin</label>
            <div class="col-md-10">
              <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_l" value="Laki-Laki" <?php if($data_user['jenis_kelamin'] == "Laki-Laki"){echo 'checked'; }?>>
                <label class="form-check-label" for="jenis_kelamin_l">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_p" value="Perempuan" <?php if($data_user['jenis_kelamin'] == "Perempuan"){echo 'checked';}?>>
                <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
              </div>
            </div>
          </div>
          <!-- end jenis kelamin -->

          <!-- start tempat lahir -->
          <div class="form-group row mt-4">
            <label for="tempat_lahir" class="col-md-2 col-form-label">Tempat Lahir</label>
            <div class="col-md-10">
              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $data_user['tempat_lahir'] ?>">
            </div>
          </div>
          <!-- end tempat lahir -->

          <!-- start tanggal lahir -->
          <div class="form-group row mt-4">
            <label class="col-md-2 col-form-label">Tanggal Lahir</label>
            <div class="col-md-10">
              <input type="text" name="tanggal_lahir" onkeypress="return goodchars(event, '0123456789-', this)" maxlength="10" class="form-control tanggal" value="<?= date('d-m-Y', strtotime($data_user['tanggal_lahir'])) ?>">
            </div>
          </div>
          <!-- end tanggal lahir -->

          <!-- start nik -->
          <div class="form-group row mt-4">
            <label for="nik" class="col-md-2 col-form-label">NIK</label>
            <div class="col-md-10">
              <input type="text" name="nik" id="nik" onkeypress="return goodchars(event, '0123456789', this)" maxlength="16" minlength="16" class="form-control" value="<?= $data_user['nik'] ?>">
            </div>
          </div>
          <!-- end nik -->

          <!-- start agama -->
          <div class="form-group row mt-4">
            <label for="agama" class="col-md-2 col-form-label">Agama</label>
            <div class="col-md-10">
              <select name="agama" class="form-control" id="agama">
                <option value="">Pilih Salah Satu</option>
                <option <?php if($data_user['agama'] == "Islam"){echo 'selected';} ?>>Islam</option>
                <option <?php if($data_user['agama'] == "Kristen/Protestan"){echo 'selected';}?>>Kristen/Protestan</option>
                <option <?php if($data_user['agama'] == "Katholik"){echo 'selected';}?>>Katholik</option>
                <option <?php if($data_user['agama'] == "Hindu"){echo 'selected';} ?>>Hindu</option>
                <option <?php if($data_user['agama'] == "Budha"){echo 'selected';} ?>>Budha</option>
                <option <?php if($data_user['agama'] == "Kong Hucu"){echo 'selected'; } ?>>Kong Hucu</option>
                <option <?php if($data_user['agama'] == "Kepercayaan Kepada Tuhan YME"){echo 'selected';} ?>>Kepercayaan Kepada Tuhan YME</option>
              </select>
            </div>
          </div>
          <!-- end agama -->

          <!-- start alamat -->
          <div class="form-group row mt-4">
            <label for="alamat" class="col-md-2 col-form-label">Alamat Rumah</label>
            <div class="col-md-10">
              <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $data_user['alamat'] ?>">
            </div>
          </div>
          <!-- end alamat -->

          <!-- start rt -->
          <div class="form-group row mt-4">
            <label for="rt" class="col-md-2 col-form-label">RT</label>
            <div class="col-md-10">
              <input type="text" name="rt" id="rt" class="form-control" onkeypress="return goodchars(event, '0123456789', this)" maxlength="3" value="<?= $data_user['rt'] ?>">
            </div>
          </div>
          <!-- end rt -->

          <!-- start rw -->
          <div class="form-group row mt-4">
            <label for="rw" class="col-md-2 col-form-label">RW</label>
            <div class="col-md-10">
              <input type="text" name="rw" id="rw" onkeypress="return goodchars(event, '0123456789', this)" maxlength="3" class="form-control" value="<?= $data_user['rw'] ?>">
            </div>
          </div>
          <!-- end rw -->

          <!-- start provinsi -->
          <div class="form-group row mt-4">
            <label for="provinsi" class="col-md-2 col-form-label">Provinsi</label>
            <div class="col-md-10">
              <select name="provinsi" id="provinsi" class="form-control">
                <option value="">-- Pilih Salah Satu --</option>
                <?php
                  $data_provinsi = mysqli_query($koneksi, "SELECT * FROM wilayah_provinsi");
                  while($prov = mysqli_fetch_assoc($data_provinsi)):
                ?>
                  <option value="<?= $prov['id'] ?>">Prov. <?= $prov['nama'] ?></option>
                <?php endwhile; ?>
              </select>
            </div>
          </div>
          <!-- end provinsi -->

          <!-- start kabupaten / kota -->
          <div class="form-group row mt-3">
            <label for="kabupaten" class="col-md-2 col-form-label">Kabupaten / Kota</label>
            <div class="col-md-10">
              <select name="kabupaten" id="kabupaten" class="form-control">
                <option value="">-- Pilih Salah Satu --</option>
              </select>
            </div>
          </div>
          <!-- end start kabupaten / kota -->

          <!-- start kecamatan -->
          <div class="form-group row mt-3">
            <label for="kecamatan" class="col-md-2 col-form-label">Kecamatan</label>
            <div class="col-md-10">
              <select name="kecamatan" id="kecamatan" class="form-control">
                <option value="">-- Pilih Salah Satu --</option>
              </select>
            </div>
          </div>
          <!-- end kecamatan -->

          <!-- start kelurahan -->
          <div class="form-group row mt-3">
            <label for="kelurahan" class="col-md-2 col-form-label">Kelurahan</label>
            <div class="col-md-10">
              <select name="kelurahan" id="kelurahan" class="form-control">
                <option value="">-- Pilih Salah Satu --</option>
              </select>
            </div>
          </div>
          <!-- end kelurahan -->

          <!-- start no telp -->
          <div class="form-group row mt-3">
            <label for="no_telp" class="col-md-2 col-form-label">Nomor Telp</label>
            <div class="col-md-10">
              <input type="text" name="no_telp" onkeypress="return goodchars(event, '0123456789', this)" maxlength="13" minlength="12" id="no_telp" class="form-control" value="<?= $data_user['no_telp']?>">
            </div>
          </div>
          <!-- end no telp -->

          <div class="modal-footer mt-3">
            <button type="submit" name="update_user" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end btn update profile -->

<!-- start save token auth -->
<div class="modal fade" id="update_foto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Foto Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/update/foto_profile_user.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
          <input type="file" name="foto" class="form-control">
          <div class="modal-footer">
              <button type="submit" name="update_user" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end save token auth -->