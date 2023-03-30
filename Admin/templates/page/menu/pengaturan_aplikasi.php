<div class="container-fluid p-0">
    <!-- start title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Pengaturan Aplikasi</h3>
        </div>
    </div>
    <!-- end title -->

    <div class="col-md-12 col-sm-12">
      <!-- start card -->
        <div class="card">
          <div class="card-body">
            <?php
              if(isset($_SESSION['validasi']) && $_SESSION['validasi'] !='')
              {
                echo $_SESSION['validasi'];
                unset($_SESSION['validasi']);
              }

              $db_ap = mysqli_query($koneksi, "SELECT * FROM aplikasi");
              $data_aplikasi = mysqli_fetch_assoc($db_ap);
            ?>
            <!-- start form pengaturan aplikasi -->
            <form action="../proses/update/pengaturan.php" method="post" autocomplete="off" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $data_aplikasi['id'] ?>">
              <!-- start nama sekolah -->
              <div class="form-group row mt-2">
                <label for="" class="col-md-2 col-form-label">Nama Sekolah</label>
                <div class="col-md-10">
                  <input type="text" name="nama_sekolah" class="form-control" value="<?= $data_aplikasi['nama_sekolah']?>">
                </div>
              </div>
              <!-- end nama sekolah -->

              <!-- start batas pengisian -->
              <div class="form-group row mt-2">
                <label for="" class="col-md-2 col-form-label">Batas Pengisian</label>
                <div class="col-md-10">
                  <input type="text" name="batas_pengisian" id="tanggal_batas" class="tanggal form-control" value="<?= date('d-m-Y',strtotime($data_aplikasi['batas_pengisian']))?>">
                </div>
              </div>
              <!-- end batas pengisian -->
              
              <!-- start warna header -->
              <div class="form-group row mt-3">
                <label for="" class="col-md-2 col-form-label">Warna Header</label>
                <div class="col-md-10">
                  <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio1" value="primary text-white" <?php if($data_aplikasi['warna_header'] == "primary text-white"){echo 'checked'; }?>>
                    <label class="form-check-label" for="inlineRadio1">Primary</label>
                  </div>
                  <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio2" value="danger text-white" <?php if($data_aplikasi['warna_header'] == "danger text-white"){echo 'checked'; }?>>
                    <label class="form-check-label" for="inlineRadio2">Danger</label>
                  </div>
                  <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio3" value="secondary text-white" <?php if($data_aplikasi['warna_header'] == "secondary text-white"){echo 'checked'; }?>>
                    <label class="form-check-label" for="inlineRadio3">Secondary</label>
                  </div>
                  <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio4" value="success text-white" <?php if($data_aplikasi['warna_header'] == "success text-white"){echo 'checked'; }?>>
                    <label class="form-check-label" for="inlineRadio4">Success</label>
                  </div>
                  <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio5" value="warning text-white" <?php if($data_aplikasi['warna_header'] == "warning text-white"){echo 'checked'; }?>>
                    <label class="form-check-label" for="inlineRadio5">Warning</label>
                  </div>
                  <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="warna_header" id="inlineRadio6" value="info text-white" <?php if($data_aplikasi['warna_header'] == "info text-white"){echo 'checked'; }?>>
                    <label class="form-check-label" for="inlineRadio6">Info</label>
                  </div>
                </div>
              </div>
              <!-- end warna header -->

              <!-- start auto close alert -->
              <div class="form-group row mt-3">
                <label for="" class="col-md-2 col-form-label">Auto Close Alert</label>
                <div class="col-md-10">
                  <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="auto_close_alert" id="auto_close_a" value="Yes" <?php if($data_aplikasi['auto_close_alert'] == "Yes"){echo 'checked'; }?>>
                    <label class="form-check-label" for="auto_close_a">Ya</label>
                  </div>
                  <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="auto_close_alert" id="auto_close_b" value="No" <?php if($data_aplikasi['auto_close_alert'] == "No"){echo 'checked'; }?>>
                    <label class="form-check-label" for="auto_close_b">Tidak</label>
                  </div>
                </div>
              </div>
              <!-- end auto close alert -->

              <!-- start info admin  -->
              <div class="form-group row mt-3">
                <label for="" class="col-md-2 col-form-label">Info Admin</label>
                <div class="col-md-10">
                  <textarea name="info_admin" id="edit" cols="30" rows="10" class="form-control editor">
                    <?= $data_aplikasi['info_admin'] ?>
                  </textarea>
                </div>
              </div>
              <!-- end info admin  -->

              <!-- start logo sekolah -->
              <div class="form-group row mt-3">
                <label for="" class="col-md-2 col-form-label">Logo Sekolah</label>
                <div class="col-md-10">
                  <?php
                    if(empty($data_aplikasi['logo_sekolah']))
                    {
                      ?>
                        <img src="../assets/img/logo/logo_kemdik.png" alt="" width="120">
                      <?php
                    }else{
                      ?>
                        <img src="../assets/img/logo/<?= $data_aplikasi['logo_sekolah']?>" alt="" width="120">
                      <?php
                    }
                  ?>
                  <div class="mt-2"></div>
                  <input type="file" name="logo_sekolah" class="form-control">
                </div>
              </div>
              <!-- end logo sekolah -->

              <!-- start alamat  -->
              <div class="form-group row mt-3">
                <label for="" class="col-md-2 col-form-label">Alamat Sekolah</label>
                <div class="col-md-10">
                  <textarea name="alamat" cols="30" rows="5" class="form-control editor"><?= $data_aplikasi['alamat'] ?>
                  </textarea>
                </div>
              </div>
              <!-- end alamat  -->

              <!-- start bidang  -->
              <div class="form-group row mt-3">
                <label for="" class="col-md-2 col-form-label">Bidang Keahlian</label>
                <div class="col-md-10">
                  <textarea name="bidang" cols="30" rows="5" class="form-control editor"><?= $data_aplikasi['bidang'] ?>
                  </textarea>
                </div>
              </div>
              <!-- end bidang  -->

              <!-- start button save -->
              <div class="form-group row mt-3">
                <div for="" class="col-md-2"></div>
                <div class="col-md-10">
                  <button type="submit" name="save_aplikasi" class="btn btn-success">Simpan</button>
                </div>
              </div>
              <!-- end button save -->
            </form>
            <!-- end start form pengaturan aplikasi -->
          </div>
        </div>
      <!-- end card -->
    </div>
</div>