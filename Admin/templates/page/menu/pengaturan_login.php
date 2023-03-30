<div class="container-fluid p-0">
    <!-- start title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Pengaturan Halaman Login</h3>
        </div>
    </div>
    <!-- end title -->

    <div class="col-md-12 col-sm-12">
      <!-- start card -->
        <div class="card">
          <div class="card-body">
            <?php
              $login = mysqli_query($koneksi, "SELECT * FROM halaman_login");
              $data_login = mysqli_fetch_assoc($login);

              if(isset($_SESSION['validasi']) && $_SESSION['validasi'] !='')
              {
                echo $_SESSION['validasi'];
                unset($_SESSION['validasi']);
              }
            ?>
            <!-- start form pengaturan login -->
              <form action="../proses/update/pengaturan.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?= $data_login['id'] ?>">
                  <!-- start warna tombol login -->
                  <div class="form-group row mt-3">
                    <label for="" class="col-md-2 col-form-label">Warna Tombol Login</label>
                    <div class="col-md-10">
                      <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="warna_tombol" id="button_a" value="primary" <?php if($data_login['warna_tombol_login'] == "primary"){echo 'checked'; }?>>
                        <label class="form-check-label" for="button_a">Primary</label>
                      </div>
                      <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="warna_tombol" id="button_b" value="danger" <?php if($data_login['warna_tombol_login'] == "danger"){echo 'checked'; }?>>
                        <label class="form-check-label" for="button_b">Danger</label>
                      </div>
                      <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="warna_tombol" id="button_c" value="secondary" <?php if($data_login['warna_tombol_login'] == "secondary"){echo 'checked'; }?>>
                        <label class="form-check-label" for="button_c">Secondary</label>
                      </div>
                      <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="warna_tombol" id="button_d" value="success" <?php if($data_login['warna_tombol_login'] == "success"){echo 'checked'; }?>>
                        <label class="form-check-label" for="button_d">Success</label>
                      </div>
                      <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="warna_tombol" id="button_e" value="warning" <?php if($data_login['warna_tombol_login'] == "warning"){echo 'checked'; }?>>
                        <label class="form-check-label" for="button_e">Warning</label>
                      </div>
                      <div class="form-check form-check-inline mt-2">
                        <input class="form-check-input" type="radio" name="warna_tombol" id="button_f" value="info" <?php if($data_login['warna_tombol_login'] == "info"){echo 'checked'; }?>>
                        <label class="form-check-label" for="button_f">Info</label>
                      </div>
                    </div>
                  </div>
                  <!-- end warna tombol login -->

                  <!-- start tahun ajaran -->
                  <div class="form-group row mt-3">
                    <label for="" class="col-md-2 col-form-label">Tahun Ajaran</label>
                    <div class="col-md-10">
                      <input type="text" name="tahun_ajaran" class="form-control" value="<?= $data_login['tahun_ajaran']?>">
                    </div>
                  </div>
                  <!-- end tahun ajaran -->

                  <!-- start vektor -->
                    <div class="form-group row mt-3">
                      <label for="" class="col-md-2 col-form-label">Vektor</label>
                      <div class="col-md-10">
                        <?php
                          if(empty($data_login['vektor'])){
                            ?>
                              <img src="../Foto/ppdb.png" class="img-responsive" alt="" width="350">
                            <?php
                          }else{
                            ?>
                              <img src="../Foto/<?= $data_login['vektor']?>" alt="" width="250">
                            <?php
                          }
                        ?>
                        <div class="mt-2"></div>
                        <input type="file" name="vektor" class="form-control">
                        <div class="text-primary">link download vektor : <a href="https://undraw.co/">undraw.co</a></div>
                      </div>
                    </div>
                  <!-- end vektor -->

                  <!-- start button save -->
                  <div class="form-group row mt-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                      <button type="submit" name="save_pengaturan_login" class="btn btn-info">Simpan</button>
                    </div>
                  </div>
                  <!-- end button save -->
              </form>
            <!-- end form pengaturan login -->
          </div>
        </div>
      <!-- end card -->
    </div>
</div>