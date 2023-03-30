<div class="mt-3" style="padding: 10px 0;">
  <div class="container">
      <div class="col-md-12">
        <?php
          session_start();
          if(isset($_SESSION['validasi']) && $_SESSION['validasi'] !='')
          {
            echo $_SESSION['validasi'];
            unset($_SESSION['validasi']);
          }
        ?>
        <h3>Registrasi Akun Admin PPDB</h3>
        <form action="save/simpan_reg.php" method="post" class="needs-validation" enctype="multipart/form-data" autocomplete="off" novalidate>
          <div class="form-group row">
            <label for="" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
              <input type="text" name="nama" class="form-control" required>
              <div class="invalid-feedback">Nama Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
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
            <label for="" class="col-md-2 col-form-label">NIK</label>
            <div class="col-md-10">
              <input type="text" name="nik" class="form-control" maxlength="16" minlength="16" required onkeypress="return goodchars(event, '0123456789', this)">
              <div class="invalid-feedback">NIK Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
              <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-md-2 col-form-label">Tempat Lahir</label>
            <div class="col-md-10">
              <input type="text" name="tempat_lahir" class="form-control" required>
              <div class="invalid-feedback">Tempat Lahir Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
              <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-md-2 col-form-label">Tanggal Lahir</label>
            <div class="col-md-10">
              <input type="text" name="tanggal_lahir" id="tgl" dateformat="dd-mm-yy" maxlength="10" onkeypress="return goodchars(event, '-0123456789', this)" class="form-control" required>
              <div class="invalid-feedback">Tanggal Lahir Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
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
              <div class="invalid-feedback">Pilih Salah Satu !</div>
              <div class="valid-feedback">Terima Kasih Sudah Memilih</div>
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
            <label class="col-md-2 col-form-label">No SK Tugas Panitia PPDB</label>
            <div class="col-md-10">
              <input type="text" name="no_sk_tugas" class="form-control" required>
              <div class="invalid-feedback">No SK Tugas Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
              <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Tanggal SK Tugas</label>
            <div class="col-md-10">
              <input type="text" name="tgl_sk_tugas" id="tgl2" maxlength="10" onkeypress="return goodchars(event, '-0123456789', this)" class="form-control" required>
              <div class="invalid-feedback">Tanggal SK Tugas Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
              <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Upload SK Tugas (Scan)</label>
            <div class="col-md-10">
              <input type="file" name="file_sk" class="form-control" required>
              <div class="text-primary text-small">Ukuran Max 2Mb. Format (pdf)</div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Jabatan</label>
            <div class="col-md-10">
              <input type="text" name="jabatan" class="form-control" required>
              <div class="invalid-feedback">Jabatan Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
              <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Username</label>
            <div class="col-md-10">
              <input type="email" name="username" class="form-control" required>
              <div class="invalid-feedback">Username Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
              <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label">Password</label>
            <div class="col-md-10">
              <input type="password" name="password" class="form-control" required>
              <div class="invalid-feedback">Password Tidak Boleh Kosong. Kolom Ini Diperlukan !</div>
              <div class="valid-feedback">Terima Kasih Sudah Mengisi</div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
              <button name="registrasi_admin" type="submit" class="btn btn-success">Registrasi</button>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>