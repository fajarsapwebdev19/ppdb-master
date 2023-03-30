<div class="container-fluid p-0">
  <div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
      <h3>Verifikasi Berkas Calon Siswa</h3>
    </div>
  </div>

  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <?php
          if(isset($_SESSION['val']) && $_SESSION['val'] !='')
          {
            echo $_SESSION['val'];
            unset($_SESSION['val']);
          }
        ?>
        <div class="table-responsive">
          <table class="table table-sm table-hover table-striped nowrap">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>Nama Siswa</th>
                <th>JK</th>
                <th>Status Ijazah</th>
                <th>Status KK</th>
                <th>Status Akta</th>
                <th>Status KIP</th>
                <th>Status KKS</th>
                <th>Status Foto</th>
                <th>Ijazah</th>
                <th>KK</th>
                <th>Akta</th>
                <th>KIP</th>
                <th>KKS</th>
                <th>Foto</th>
              </tr>
            </thead>
            <tbody>
              
                <?php
                  $no = 1;
                  $berkas = mysqli_query($koneksi, "SELECT * FROM berkas_siswa INNER JOIN foto_siswa ON berkas_siswa.username = foto_siswa.username");
                  while ($data = mysqli_fetch_assoc($berkas)):
                ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama']?></td>
                <td><?php if($data['jenis_kelamin'] == "Laki-Laki"){echo "L"; }elseif($data['jenis_kelamin'] == "Perempuan"){echo "P"; } ?></td>
                <td>
                  <?php
                    if($data['status_upload_ijazah'] == "Sudah")
                    {
                      ?>
                        <p class="badge bg-success">
                          Sudah
                        </p>
                      <?php
                    }
                    elseif($data['status_upload_ijazah'] == "Belum")
                    {
                      ?>
                        <p class="badge bg-danger">
                          Belum
                        </p>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload_kk'] == "Sudah")
                    {
                      ?>
                        <p class="badge bg-success">
                          Sudah
                        </p>
                      <?php
                    }
                    elseif($data['status_upload_kk'] == "Belum")
                    {
                      ?>
                        <p class="badge bg-danger">
                          Belum
                        </p>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload_akta'] == "Sudah")
                    {
                      ?>
                        <p class="badge bg-success">
                          Sudah
                        </p>
                      <?php
                    }
                    elseif($data['status_upload_akta'] == "Belum")
                    {
                      ?>
                        <p class="badge bg-danger">
                          Belum
                        </p>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload_kip'] == "Sudah")
                    {
                      ?>
                        <p class="badge bg-success">
                          Sudah
                        </p>
                      <?php
                    }
                    elseif($data['status_upload_kip'] == "Belum")
                    {
                      ?>
                        <p class="badge bg-danger">
                          Belum
                        </p>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload_kks'] == "Sudah")
                    {
                      ?>
                        <p class="badge bg-success">
                          Sudah
                        </p>
                      <?php
                    }
                    elseif($data['status_upload_kks'] == "Belum")
                    {
                      ?>
                        <p class="badge bg-danger">
                          Belum
                        </p>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload'] == "Sudah")
                    {
                      ?>
                        <p class="badge bg-success">
                          Sudah
                        </p>
                      <?php
                    }
                    elseif($data['status_upload'] == "Belum")
                    {
                      ?>
                        <p class="badge bg-danger">
                          Belum
                        </p>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload_ijazah'] == "Belum")
                    {
                      ?>
                        <button class="btn btn-primary btn-sm">Verifikasi</button>
                      <?php
                    }
                    elseif($data['status_upload_ijazah'] == "Sudah")
                    {
                      ?>
                        <?php
                          if($data['status_verifikasi_ijazah'] == "Antrian")
                          {
                            ?>
                              <a href="#!" data-bs-target="#ver_ijz<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">Verifikasi</a>
                            <?php
                          }
                          elseif($data['status_verifikasi_ijazah'] == "Terima")
                          {
                            ?>
                              <button data-bs-target="#ver_ijz<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-success btn-sm">Verifikasi</button>
                            <?php
                          }
                          elseif($data['status_verifikasi_ijazah'] == "Tolak")
                          {
                            ?>
                              <button class="btn btn-danger btn-sm">Verifikasi</button>
                            <?php
                          }
                        ?>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload_kk'] == "Belum")
                    {
                      ?>
                        <button class="btn btn-primary btn-sm">Verifikasi</button>
                      <?php
                    }
                    elseif($data['status_upload_kk'] == "Sudah")
                    {
                      ?>
                        <?php
                          if($data['status_verifikasi_kk'] == "Antrian")
                          {
                            ?>
                              <a href="#!" data-bs-target="#ver_kk<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">Verifikasi</a>
                            <?php
                          }
                          elseif($data['status_verifikasi_kk'] == "Terima")
                          {
                            ?>
                              <button data-bs-target="#ver_kk<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-success btn-sm">Verifikasi</button>
                            <?php
                          }
                          elseif($data['status_verifikasi_kk'] == "Tolak")
                          {
                            ?>
                              <button class="btn btn-danger btn-sm">Verifikasi</button>
                            <?php
                          }
                        ?>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload_akta'] == "Belum")
                    {
                      ?>
                        <button class="btn btn-primary btn-sm">Verifikasi</button>
                      <?php
                    }
                    elseif($data['status_upload_akta'] == "Sudah")
                    {
                      ?>
                        <?php
                          if($data['status_verifikasi_akta'] == "Antrian")
                          {
                            ?>
                              <a href="#!" data-bs-target="#ver_akta<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">Verifikasi</a>
                            <?php
                          }
                          elseif($data['status_verifikasi_akta'] == "Terima")
                          {
                            ?>
                              <button data-bs-target="#ver_akta<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-success btn-sm">Verifikasi</button>
                            <?php
                          }
                          elseif($data['status_verifikasi_akta'] == "Tolak")
                          {
                            ?>
                              <button class="btn btn-danger btn-sm">Verifikasi</button>
                            <?php
                          }
                        ?>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload_kip'] == "Belum")
                    {
                      ?>
                        <button class="btn btn-primary btn-sm">Verifikasi</button>
                      <?php
                    }
                    elseif($data['status_upload_kip'] == "Sudah")
                    {
                      ?>
                        <?php
                          if($data['status_verifikasi_kip'] == "Antrian")
                          {
                            ?>
                              <a href="#!" data-bs-target="#ver_kip<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">Verifikasi</a>
                            <?php
                          }
                          elseif($data['status_verifikasi_kip'] == "Terima")
                          {
                            ?>
                              <button data-bs-target="#ver_kip<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-success btn-sm">Verifikasi</button>
                            <?php
                          }
                          elseif($data['status_verifikasi_kip'] == "Tolak")
                          {
                            ?>
                              <button class="btn btn-danger btn-sm">Verifikasi</button>
                            <?php
                          }
                        ?>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload_kks'] == "Belum")
                    {
                      ?>
                        <button class="btn btn-primary btn-sm">Verifikasi</button>
                      <?php
                    }
                    elseif($data['status_upload_kks'] == "Sudah")
                    {
                      ?>
                        <?php
                          if($data['status_verifikasi_kks'] == "Antrian")
                          {
                            ?>
                              <a href="#!" data-bs-target="#ver_kks<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">Verifikasi</a>
                            <?php
                          }
                          elseif($data['status_verifikasi_kks'] == "Terima")
                          {
                            ?>
                              <button data-bs-target="#ver_kks<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-success btn-sm">Verifikasi</button>
                            <?php
                          }
                          elseif($data['status_verifikasi_kks'] == "Tolak")
                          {
                            ?>
                              <button class="btn btn-danger btn-sm">Verifikasi</button>
                            <?php
                          }
                        ?>
                      <?php
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if($data['status_upload'] == "Belum")
                    {
                      ?>
                        <button class="btn btn-primary btn-sm">Verifikasi</button>
                      <?php
                    }
                    elseif($data['status_upload'] == "Sudah")
                    {
                      ?>
                        <?php
                          if($data['status_verifikasi'] == "Antrian")
                          {
                            ?>
                              <a href="#!" data-bs-target="#ver_ft<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">Verifikasi</a>
                            <?php
                          }
                          elseif($data['status_verifikasi'] == "Terima")
                          {
                            ?>
                              <button data-bs-target="#ver_ft<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-success btn-sm">Verifikasi</button>
                            <?php
                          }
                          elseif($data['status_verifikasi'] == "Tolak")
                          {
                            ?>
                              <button class="btn btn-danger btn-sm">Verifikasi</button>
                            <?php
                          }
                        ?>
                      <?php
                    }
                  ?>
                </td>
                <?php require 'btn/verifikasi_berkas.php'; ?>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>