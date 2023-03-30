<div class="container-fluid p-0">
 <div class="row">
  <div class="col-md-12">
    <?php
      if(isset($_SESSION['val']))
      {
        echo $_SESSION['val'];
        unset($_SESSION['val']);
      }
    ?>
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <?php
                if($data_admin['foto'] == "" || $data_admin['foto'] == NULL)
                {
                  if($data_admin['jenis_kelamin'] == "Laki-Laki")
                  {
                    ?>
                      <img src="../Foto/foto_profile/man.png" style="width:auto; height: 120px; max-width:100%; object-fit:contain; ">
                    <?php
                  }else if($data_admin['jenis_kelamin'] == "Perempuan")
                  {
                    ?>
                      <img src="../Foto/foto_profile/woman.png" style="width:auto; height: 120px; max-width:100%; object-fit:contain; ">
                    <?php
                  }
                }else{
                  ?>
                    <img src="../Foto/foto_profile/<?= $data_admin['foto'] ?>" style="width:auto; height: 120px; max-width:100%; object-fit:contain; ">
                  <?php
                }
              ?>
            </div>
            <div class="table-responsive d-flex justify-content-center mt-4">
              <table width="80%" rowspan="8">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <td><?= $data_admin['nama'] ?></td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td><?= $data_admin['jenis_kelamin'] ?></td>
                  </tr>
                  <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td><?= $data_admin['tempat_lahir'] ?>, <?= ($data_admin['tanggal_lahir'] == "" || $data_admin['tanggal_lahir'] == NULL) ? '' : date('d-m-Y', strtotime($data_admin['tanggal_lahir'])) ?></td>
                  </tr>
                  <tr>
                    <th>NIK</th>
                    <td><?= $data_admin['nik'] ?></td>
                  </tr>
                  <tr>
                    <th>Agama</th>
                    <td><?= $data_admin['agama'] ?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><?= $data_admin['alamat'] ?>, RT <?= $data_admin['rt']?>, RW <?= $data_admin['rw'] ?></td>
                  </tr>
                  <tr>
                    <th>Provinsi</th>
                    <td><?= $data_admin['prov'] ?></td>
                  </tr>
                  <tr>
                    <th>Kabupaten/Kota</th>
                    <td><?= $data_admin['kab'] ?></td>
                  </tr>
                  <tr>
                    <th>Kecamatan</th>
                    <td><?= $data_admin['kec'] ?></td>
                  </tr>
                  <tr>
                    <th>Kelurahan</th>
                    <td><?= $data_admin['kel'] ?></td>
                  </tr>
                  <tr>
                    <th>No SK Tugas</th>
                    <td><?= $data_admin['no_sk_tugas'] ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal SK Tugas</th>
                    <td><?= ($data_admin['tgl_sk_tugas'] == "" || $data_admin['tgl_sk_tugas'] == NULL) ? '' : date('d-m-Y', strtotime($data_admin['tgl_sk_tugas'])) ?></td>
                  </tr>
                  <tr>
                    <th>Jabatan</th>
                    <td><?= $data_admin['jabatan'] ?></td>
                  </tr>
                  <tr>
                    <th>Bergabung Pada Tanggal</th>
                    <td><?= ($data_admin['tanggal_registrasi'] == "" || $data_admin['tanggal_registrasi'] == NULL) ? '' : date('d-m-Y', strtotime($data_admin['tanggal_registrasi']))?></td>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div> <!-- end col-md-8 -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">
                <a class="link-profile up_prof">
                  <em class="fas fa-user"></em> Update Profile
                </a>
              </li>
              <li class="list-group-item">
                <a class="link-profile up_file_sk">
                  <em class="fas fa-file"></em> Update File SK
                </a>
              </li>
              <li class="list-group-item">
                <a class="link-profile up_foto_prof">
                  <em class="fas fa-camera"></em> Update Foto Profile
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <?php require 'btn/btn_profile.php'; ?>
  </div>
 </div>
</div>