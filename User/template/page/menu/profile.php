<div class="container-fluid p-0">
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Profile</h3>
        </div>
    </div>
    <!-- end title -->

    <div class="col-md-12">
      <div class="row">
        <!-- start card -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <?php
                if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                {
                  echo $_SESSION['val'];
                  unset($_SESSION['val']);
                }
              ?>
              <!-- start foto -->
              <div class="text-center">
                <?php
                  if(empty($data_user['foto']))
                  {
                    if($data_user['jenis_kelamin'] == "Laki-Laki")
                    {
                      ?>
                        <img src="../Foto/foto_profile/man.png" width="120" height="140">
                      <?php
                    }
                    elseif($data_user['jenis_kelamin'] == "Perempuan")
                    {
                      ?>
                        <img src="../Foto/foto_profile/woman.png" width="120" height="140">
                      <?php
                    }
                  }else{
                    ?>
                      <img src="../Foto/foto_profile/<?= $data_user['foto'] ?>" alt="" width="120" height="160">
                    <?php
                  }
                ?>
              </div>
              <!-- end foto -->
              <!-- start data user -->
              <div class="table-responsive">
                <table class="table table-hover mt-3">
                  <tr>
                    <th>Nama</th>
                    <td><?= $data_user['nama'] ?></td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td><?= $data_user['jenis_kelamin']?></td>
                  </tr>
                  <tr>
                    <th>Tempat Lahir</th>
                    <td><?= $data_user['tempat_lahir'] ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Lahir</th>
                    <td><?= date('d-m-Y',strtotime($data_user['tanggal_lahir']))?></td>
                  </tr>
                  <tr>
                    <th>Usia</th>
                    <td>
                      <?php
                        $tanggal_lahir = $data_user['tanggal_lahir'];
                        $hitung = new DateTime($tanggal_lahir);
                        $sekarang = new DateTime("today");

                        if($hitung > $sekarang){
                          $usia = "0";
                        }

                        $usia = $sekarang->diff($hitung)->y;

                        echo $usia.' '.'Tahun';
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th>NIK</th>
                    <td><?= $data_user['nik'] ?></td>
                  </tr>
                  <tr>
                    <th>Agama</th>
                    <td><?= $data_user['agama']?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><?= $data_user['alamat']?></td>
                  </tr>
                  <tr>
                    <th>RT / RW</th>
                    <td><?= $data_user['rt'] ?> / <?= $data_user['rw']?></td>
                  </tr>
                  <tr>
                    <th>Provinsi</th>
                    <td>
                      <?php
                        $provinsi = $data_user['provinsi'];
                        $prov = mysqli_query($koneksi, "SELECT * FROM wilayah_provinsi WHERE id='$provinsi'");
                        $name_prov = mysqli_fetch_assoc($prov);
                        echo @$name_prov['nama'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Kabupaten / Kota</th>
                    <td>
                      <?php
                        $kabupaten = $data_user['kabupaten'];
                        $kab = mysqli_query($koneksi, "SELECT * FROM wilayah_kabupaten WHERE id='$kabupaten'");
                        $name_kab = mysqli_fetch_assoc($kab);
                        echo @$name_kab['nama'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Kecamatan</th>
                    <td>
                      <?php
                        $kecamatan = $data_user['kecamatan'];
                        $kec = mysqli_query($koneksi, "SELECT * FROM wilayah_kecamatan WHERE id='$kecamatan'");
                        $name_kec = mysqli_fetch_assoc($kec);
                        echo @$name_kec['nama'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Kelurahan</th>
                    <td>
                      <?php
                        $kelurahan = $data_user['kelurahan'];
                        $kel = mysqli_query($koneksi, "SELECT * FROM wilayah_desa WHERE id='$kelurahan'");
                        $name_kel = mysqli_fetch_assoc($kel);
                        echo @$name_kel['nama'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th>No Telp</th>
                    <td><?= $data_user['no_telp'] ?></td>
                  </tr>
                  <tr>
                    <th>Username</th>
                    <td><?= $data_user['username'] ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Registrasi</th>
                    <td><?= date('d-m-Y',strtotime($data_user['tanggal_registrasi'])) ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Gabung</th>
                    <td><?= date('d-m-Y',strtotime($data_user['tanggal_diterima'])) ?></td>
                  </tr>
                  <tr>
                    <th>Status Akun</th>
                    <td><?= $data_user['status_akun'] ?></td>
                  </tr>
                </table>
              </div>
              <!-- end data user -->
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <!-- start button -->
              <ul class="list-group">
                <li class="list-group-item">
                  <a href="#" data-bs-toggle="modal" style="text-decoration: none;" data-bs-target="#profile"><em class="fas fa-user-edit"></em> Update Profile</a>
                </li>
                <li class="list-group-item">
                  <a href="#" data-bs-toggle="modal" style="text-decoration: none;" data-bs-target="#update_foto"><em class="fas fa-camera"></em> Update Foto Profile</a>
                </li>
              </ul>
              <?php
                require 'btn/btn_profile.php';
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>