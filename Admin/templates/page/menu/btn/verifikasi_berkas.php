<!-- verifikasi berkas ijazah -->
<div class="modal fade" id="ver_ijz<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Berkas Ijazah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/approval/berkas.php" method="post">
          <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" class="form-control read" value="<?= $data['nama'] ?>" disabled>
            <input type="hidden" name="username" value="<?= $data['username'] ?>">
          </div>
          <div class="mb-3">
            <label for="">Berkas Ijazah</label>
            <div class="mb-3">
              <div class="col-md-4">
                <img src="../assets/dokumen/berkas_siswa/ijazah/<?= $data['file_ijazah_smp']?>" width="130" height="180" alt="">
              </div>
            </div>
          </div>
          <?php
            if($data['status_verifikasi_ijazah'] == "Antrian")
            {
              ?>
                  <div class="mb-3">
                    <label for="">
                      Verifikasi
                    </label>
                    <div class="mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_berkas_ijazah" id="inlineRadio1" value="Terima">
                        <label class="form-check-label" for="inlineRadio1">Terima</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_berkas_ijazah" id="inlineRadio2" value="Tolak">
                        <label class="form-check-label" for="inlineRadio2">Tolak</label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="verifikasi_ijazah" class="btn btn-success">Verifikasi</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
              <?php
            }else{
              ?>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              <?php
            }
          ?>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end verifikasi berkas ijazah -->

<!-- verifikasi berkas kk -->
<div class="modal fade" id="ver_kk<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="0" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Berkas Kartu Keluarga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/approval/berkas.php" method="post">
          <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" class="form-control read" value="<?= $data['nama'] ?>" disabled>
            <input type="hidden" name="username" value="<?= $data['username'] ?>">
          </div>
          <div class="mb-3">
            <label for="">Berkas Kartu Kelurga</label>
            <div class="mb-3">
              <img src="../assets/dokumen/berkas_siswa/kk/<?= $data['file_kk']?>" width="210" height="120" alt="">
            </div>
          </div>
          <?php
            if($data['status_verifikasi_kk'] == "Antrian")
            {
              ?>
                  <div class="mb-3">
                    <label for="">
                      Verifikasi
                    </label>
                    <div class="mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_berkas_kk" id="inlineRadio1" value="Terima">
                        <label class="form-check-label" for="inlineRadio1">Terima</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_berkas_kk" id="inlineRadio2" value="Tolak">
                        <label class="form-check-label" for="inlineRadio2">Tolak</label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="verifikasi_kk" class="btn btn-success">Verifikasi</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
              <?php
            }else{
              ?>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              <?php
            }
          ?>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end verifikasi berkas kk -->

<!-- verifikasi akta lahir -->
<div class="modal fade" id="ver_akta<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Akta Lahir</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/approval/berkas.php" method="post">
          <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" class="form-control read" value="<?= $data['nama'] ?>" disabled>
            <input type="hidden" name="username" value="<?= $data['username'] ?>">
          </div>
          <div class="mb-3">
            <label for="">Berkas Akta Lahir</label>
            <div class="mb-3">
              <img src="../assets/dokumen/berkas_siswa/akta/<?= $data['file_akta']?>" width="130" height="180" alt="">
            </div>
          </div>
          <?php
            if($data['status_verifikasi_akta'] == "Antrian")
            {
              ?>
                  <div class="mb-3">
                    <label for="">
                      Verifikasi
                    </label>
                    <div class="mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_berkas_akta" id="inlineRadio1" value="Terima">
                        <label class="form-check-label" for="inlineRadio1">Terima</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_berkas_akta" id="inlineRadio2" value="Tolak">
                        <label class="form-check-label" for="inlineRadio2">Tolak</label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="verifikasi_akta" class="btn btn-success">Verifikasi</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
              <?php
            }else{
              ?>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              <?php
            }
          ?>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end verifikasi akta lahir -->

<!-- verifikasi kartu indonesia pintar -->
<div class="modal fade" id="ver_kip<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Kartu Indonesia Pintar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/approval/berkas.php" method="post">
          <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" class="form-control read" value="<?= $data['nama'] ?>" disabled>
            <input type="hidden" name="username" value="<?= $data['username'] ?>">
          </div>
          <div class="mb-3">
            <label for="">Berkas Kartu Indonesia Pintar</label>
            <div class="mb-3">
              <?php
                if(empty($data['file_kip']))
                {
                  ?>
                    Tidak Memiliki KIP
                  <?php
                }
                else{
                  ?>
                    <img src="../assets/dokumen/berkas_siswa/kip/<?= $data['file_kip']?>" width="180" height="120" alt="">
                  <?php
                }
              ?>
            </div>
          </div>
          <?php
            if($data['status_verifikasi_kip'] == "Antrian")
            {
              ?>
                  <div class="mb-3">
                    <label for="">
                      Verifikasi
                    </label>
                    <div class="mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_berkas_kip" id="inlineRadio1" value="Terima">
                        <label class="form-check-label" for="inlineRadio1">Terima</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_berkas_kip" id="inlineRadio2" value="Tolak">
                        <label class="form-check-label" for="inlineRadio2">Tolak</label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="verifikasi_kip" class="btn btn-success">Verifikasi</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
              <?php
            }else{
              ?>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              <?php
            }
          ?>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end verifikasi kartu indonesia pintar -->

<!-- verifikasi kartu keluarga sejahtera -->
<div class="modal fade" id="ver_kks<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Kartu Keluarga Sejahtera</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/approval/berkas.php" method="post">
          <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" class="form-control read" value="<?= $data['nama'] ?>" disabled>
            <input type="hidden" name="username" value="<?= $data['username'] ?>">
          </div>
          <div class="mb-3">
            <label for="">Berkas Kartu Indonesia Pintar</label>
            <div class="mb-3">
              <?php
                if(empty($data['file_kks']))
                {
                  ?>
                    Tidak Memiliki KKS
                  <?php
                }
                else{
                  ?>
                    <img src="../assets/dokumen/berkas_siswa/kks/<?= $data['file_kks']?>" width="180" height="120" alt="">
                  <?php
                }
              ?>
            </div>
          </div>
          <?php
            if($data['status_verifikasi_kks'] == "Antrian")
            {
              ?>
                  <div class="mb-3">
                    <label for="">
                      Verifikasi
                    </label>
                    <div class="mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_berkas_kks" id="inlineRadio1" value="Terima">
                        <label class="form-check-label" for="inlineRadio1">Terima</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_berkas_kks" id="inlineRadio2" value="Tolak">
                        <label class="form-check-label" for="inlineRadio2">Tolak</label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="verifikasi_kks" class="btn btn-success">Verifikasi</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
              <?php
            }else{
              ?>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              <?php
            }
          ?>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end verifikasi kartu keluarga sejahtera -->

<!-- verifikasi foto siswa -->
<div class="modal fade" id="ver_ft<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Foto Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/approval/berkas.php" method="post">
          <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" class="form-control read" value="<?= $data['nama'] ?>" disabled>
            <input type="hidden" name="username" value="<?= $data['username'] ?>">
          </div>
          <div class="mb-3">
            <label for="">Foto Siswa</label>
            <div class="mb-3">
              <img src="../assets/dokumen/foto_siswa/<?= $data['foto']?>" width="130" height="180" alt="">
            </div>
          </div>
          <?php
            if($data['status_verifikasi'] == "Antrian")
            {
              ?>
                  <div class="mb-3">
                    <label for="">
                      Verifikasi
                    </label>
                    <div class="mb-3">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_fotos" id="inlineRadio1" value="Terima">
                        <label class="form-check-label" for="inlineRadio1">Terima</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="verifikasi_fotos" id="inlineRadio2" value="Tolak">
                        <label class="form-check-label" for="inlineRadio2">Tolak</label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="verifikasi_foto" class="btn btn-success">Verifikasi</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
              <?php
            }else{
              ?>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              <?php
            }
          ?>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end verifikasi foto siswa -->