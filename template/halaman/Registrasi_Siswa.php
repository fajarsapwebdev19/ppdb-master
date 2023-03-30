<div class="mt-3" style="padding: 10px 0;">
  <div class="container">
    <h3>Registrasi Siswa Baru</h3>

    <?php
        session_start();
        if(isset($_SESSION['validasi']) && $_SESSION['validasi'] != ''){
            echo $_SESSION['validasi'];
            unset($_SESSION['validasi']);
        }
    
    ?>

    <form action="save/simpan_reg.php" id="form-reg" class="needs-validation" method="post" autocomplete="off" novalidate>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" name="nama" class="form-control" required>
          <div class="invalid-feedback">Nama Tidak Boleh Kosong. Kolom Ini Di Perlukan!</div>
          <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10 mt-2">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" required>
            <label class="custom-control-label" for="customRadioInline1">Laki - Laki</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="Perempuan" required>
            <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
            <div class="invalid-feedback ml-4">Wajib Pilih Salah Satu</div>
            <div class="valid-feedback ml-4">Terima Kasih Sudah Memilih</div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
        <div class="col-sm-10">
          <input type="text" name="tempat_lahir" class="form-control" required>
          <div class="invalid-feedback">Tempat Lahir Tidak Boleh Kosong. Kolom Ini Di Perlukan !</div>
          <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
          <input type="text" name="tanggal_lahir" maxlength="10" onKeyPress="return goodchars(event,'0123456789-',this)" class="form-control" id="tgl" dateformat="dd-mm-yy" required>
          <div class="invalid-feedback">Tanggal Lahir Tidak Boleh Kosong. Kolom Ini Di Perlukan !</div>
          <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">NIK</label>
        <div class="col-sm-10">
          <input type="text" name="nik" maxlength="16" onKeyPress="return goodchars(event,'0123456789',this)" class="form-control" required>
          <div class="invalid-feedback">NIK Tidak Boleh Kosong. Kolom Ini Di Perlukan !</div>
          <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Agama</label>
        <div class="col-sm-10">
          <select name="agama" class="form-control" required>
            <option value=""> -- Pilih Salah Satu --</option>
            <option>Islam</option>
            <option>Kristen/Protestan</option>
            <option>Katholik</option>
            <option>Hindu</option>
            <option>Budha</option>
            <option>Kong Hucu</option>
            <option>Kepercayaan Kepada Tuhan YME</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat Rumah</label>
        <div class="col-sm-10">
          <input type="text" name="alamat" class="form-control" required>
          <div class="invalid-feedback">Alamat Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
          <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">RT</label>
        <div class="col-sm-10">
          <input type="text" name="rt" maxlength="3" onkeypress="return goodchars(event,'0123456789',this)" class="form-control" required>
          <div class="invalid-feedback">RT Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
          <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">RW</label>
        <div class="col-sm-10">
          <input type="text" name="rw" maxlength="3" onkeypress="return goodchars(event,'0123456789',this)" class="form-control" required>
          <div class="invalid-feedback">RW Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
          <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Provinsi</label>
        <div class="col-sm-10">
          <select name="provinsi" class="form-control" id="provinsi" required>
            <option value="">Pilih Provinsi</option>
            <?php
            $provinsi = mysqli_query($koneksi, "SELECT * FROM wilayah_provinsi ORDER BY nama ASC");
            while ($prov = mysqli_fetch_assoc($provinsi)) :
            ?>
              <option value="<?= $prov['id'] ?>">Prov. <?= $prov['nama'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Kabupaten / Kota</label>
        <div class="col-sm-10">
          <select name="kabupaten" class="form-control" id="kabupaten" required>
            <option value="">Pilih Kabupaten / Kota</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kecamatan</label>
        <div class="col-sm-10">
          <select name="kecamatan" class="form-control" id="kecamatan" required>
            <option value="">Pilih Kecamatan</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kelurahan</label>
        <div class="col-sm-10">
          <select name="kelurahan" class="form-control" id="kelurahan" required>
            <option value="">Pilih Kelurahan</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nomor Telpon</label>
        <div class="col-sm-10">
          <input type="text" name="no_telp" maxlength='13' onkeypress="return goodchars(event,'0123456789',this)" class="form-control" required>
          <div class="invalid-feedback">No Telpon Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
          <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username (Email)</label>
        <div class="col-sm-10">
          <input type="text" name="username" class="form-control" required>
          <div class="invalid-feedback">Username Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
          <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" required>
          <div class="invalid-feedback">Password Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
          <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
          <button class="btn btn-success ml-1" type="submit" name="registrasi">Registrasi</button>
        </div>
      </div>
    </form>
  </div>
</div>