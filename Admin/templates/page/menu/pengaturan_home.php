<div class="container-fluid p-0">
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Pengaturan Halaman Utama</h3>
        </div>
    </div>
    <!-- end title -->

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <?php
            // query_pengaturan
            $home_table = mysqli_query($koneksi, "SELECT * FROM halaman_awal");
            $data_home = mysqli_fetch_assoc($home_table);

            if(isset($_SESSION['validasi']) && $_SESSION['validasi'] !='')
            {
              echo $_SESSION['validasi'];
              unset($_SESSION['validasi']);
            }
          ?>
          <form action="../proses/update/pengaturan.php" method="post">
            <input type="hidden" name="id" value="<?= $data_home['id'] ?>">
            <!-- start judul header -->
            <div class="form-group row mt-3">
              <label for="title_header" class="col-md-2 col-form-label">Judul Header</label>
              <div class="col-md-10">
                <input type="text" name="judul_header" id="title_header" class="form-control" value="<?= $data_home['judul_header']?>">
              </div>
            </div>
            <!-- end judul header -->

            <!-- start tahun ajaran -->
            <div class="form-group row mt-3">
              <label for="year_student" class="col-md-2 col-form-label">Tahun Ajaran</label>
              <div class="col-md-10">
                <input type="text" name="tahun_ajaran" id="year_student" class="form-control" value="<?= $data_home['th_ajaran']?>">
              </div>
            </div>
            <!-- end tahun ajaran -->

            <!-- start warna header -->
            <div class="form-group row mt-3">
              <label for="" class="col-md-2 col-form-label">Warna Header</label>
              <div class="col-md-10">
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio1" value="primary" <?php if($data_home['warna_header'] == "primary"){echo 'checked';}?>>
                  <label class="form-check-label" for="inlineRadio1">Primary</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio2" value="danger" <?php if($data_home['warna_header'] == "danger"){echo 'checked';}?>>
                  <label class="form-check-label" for="inlineRadio2">Danger</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio3" value="secondary" <?php if($data_home['warna_header'] == "secondary"){echo 'checked';}?>>
                  <label class="form-check-label" for="inlineRadio3">Secondary</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio4" value="success" <?php if($data_home['warna_header'] == "success"){echo 'checked';}?>>
                  <label class="form-check-label" for="inlineRadio4">Success</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio5" value="warning" <?php if($data_home['warna_header'] == "warning"){echo 'checked'; }?>>
                  <label class="form-check-label" for="inlineRadio5">Warning</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio6" value="info" <?php if($data_home['warna_header'] == "info"){echo 'checked'; }?>>
                  <label class="form-check-label" for="inlineRadio6">Info</label>
                </div>
              </div>
            </div>
            <!-- end warna header -->

            <!-- start warna tombol login -->
            <div class="form-group row mt-3">
              <label for="" class="col-md-2 col-form-label">Warna Tombol Login</label>
              <div class="col-md-10">
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_tombol" id="button_a" value="primary" <?php if($data_home['warna_tombol_login'] == "primary"){echo 'checked';}?>>
                  <label class="form-check-label" for="button_a">Primary</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_tombol" id="button_b" value="danger" <?php if($data_home['warna_tombol_login'] == "danger"){echo 'checked';}?>>
                  <label class="form-check-label" for="button_b">Danger</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_tombol" id="button_c" value="secondary" <?php if($data_home['warna_tombol_login'] == "secondary"){echo 'checked';}?>>
                  <label class="form-check-label" for="button_c">Secondary</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_tombol" id="button_d" value="success" <?php if($data_home['warna_tombol_login'] == "success"){echo 'checked';}?>>
                  <label class="form-check-label" for="button_d">Success</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_tombol" id="button_e" value="warning" <?php if($data_home['warna_tombol_login'] == "warning"){echo 'checked';}?>>
                  <label class="form-check-label" for="button_e">Warning</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                  <input class="form-check-input" type="radio" name="warna_tombol" id="button_f" value="info" <?php if($data_home['warna_tombol_login'] == "info"){echo 'checked';}?>>
                  <label class="form-check-label" for="button_f">Info</label>
                </div>
              </div>
            </div>
            <!-- end warna tombol login -->

            <!-- start alur registrasi admin -->
            <div class="form-group row mt-3">
              <label for="" class="col-md-2 col-form-label">Alur Registrasi Admin</label>
              <div class="col-md-10">
                <div id="editor">
                  <textarea class="editor" name="alur_reg_admin" cols="30" rows="10" style="margin-top: 50px;">
                    <?= $data_home['alur_registrasi_admin']; ?>
                  </textarea>
                </div>
              </div>
            </div>
            <!-- end alur registrasi admin -->

            <!-- start alur registrasi calon siswa -->
            <div class="form-group row mt-3">
              <label for="" class="col-md-2 col-form-label">Alur Registrasi Calon Siswa</label>
              <div class="col-md-10">
                <textarea name="alur_reg_casis" id="edit" cols="30" rows="10" class="editor form-control">
                <?= $data_home['alur_registrasi_casis']; ?>
                </textarea>
              </div>
            </div>
            <!-- end alur registrasi calon siswa -->

            <!-- start button submit --> 
            <div class="form-group row mt-3">
              <div class="col-md-2"></div>
              <div class="col-md-10">
                <button type="submit" name="save_home" class="btn btn-info">Simpan</button>
              </div>
            </div>
            <!-- end button submit -->
          </form>
        </div>
      </div>
    </div>
</div>