<div class="container-fluid p-0">
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Akun Calon Siswa</h3>
        </div>
    </div>
    <!-- end title -->

    <!-- data akun admin -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <?php
            if(isset($_SESSION['val']) && $_SESSION['val'] != '')
            {
              echo $_SESSION['val'];
              unset($_SESSION['val']);
            }
          ?>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-striped nowrap" id="example">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Nama</th>
                  <th class="text-center">JK</th>
                  <th class="text-center">Tempat, Tanggal Lahir</th>
                  <th class="text-center">Usia</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Password</th>
                  <th class="text-center">Status Akun</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  $db_user = mysqli_query($koneksi, "SELECT * FROM user WHERE status_registrasi='Terima'");
                  while($data = mysqli_fetch_assoc($db_user)):
                ?>
                  <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td class="text-center">
                      <?php
                        if(empty($data['jenis_kelamin']))
                        {
                          echo "";
                        }
                        elseif($data['jenis_kelamin'] == "Laki-Laki")
                        {
                          echo "L";
                        }
                        elseif($data['jenis_kelamin'] == "Perempuan")
                        {
                          echo "P";
                        }
                      ?>
                    </td>
                    <td class="text-center"><?= $data['tempat_lahir'] ?>, <?= date('d-m-Y', strtotime($data['tanggal_lahir']))?></td>
                    <td class="text-center">
                      <?php
                        $tanggal_lahir = $data['tanggal_lahir'];
                        $hitung = new DateTime($tanggal_lahir);
                        $sekarang = new DateTime("today");

                        if($hitung > $sekarang)
                        {
                          $usia = 0;
                        }

                        $usia = $sekarang->diff($hitung)->y;

                        echo $usia.' '."Tahun";
                      ?>
                    </td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['password'] ?></td>
                    <td class="text-center">
                      <?php
                        if(empty($data['status_akun']))
                        {
                          echo "";
                        }
                        elseif($data['status_akun'] == "Aktif")
                        {
                          ?>
                            <p class="badge bg-success">Aktif</p>
                          <?php
                        }
                        elseif($data['status_akun'] == "Tidak Aktif")
                        {
                          ?>
                            <p class="badge bg-danger">Tidak Aktif</p>
                          <?php
                        }
                      ?>
                    </td>
                    <td class="text-center">
                      <?php
                        if($data['on_status'] == "Online")
                        {
                          ?>
                            <p class="badge bg-success">Online</p>
                          <?php
                        }
                        elseif($data['on_status'] == "Offline")
                        {
                          ?>
                            <p class="badge bg-danger">Offline</p>
                          <?php
                        }
                      ?>
                    </td>
                    <td>
                        <a href="#!" data-bs-target="#view<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-sm btn-success" title="View User"><em class="fas fa-eye"></em></a>
                        <a href="#!" data-bs-target="#edit<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-sm btn-info" title="Edit User"><em class="fas fa-edit"></em></a>
                        <a href="#!" data-bs-target="#delete<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-sm btn-danger" title="Delete User"><em class="fas fa-trash"></em></a>
                        <?php
                          if($data['status_akun'] == "Aktif")
                          {
                            ?>
                              <a href="#!" data-bs-target="#block<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-sm btn-danger" title="Block User"><em class="fas fa-times-circle"></em></a>
                            <?php
                          }
                          elseif($data['status_akun'] == "Tidak Aktif")
                          {
                            ?>
                              <a href="#!" data-bs-target="#actived<?= $data['id']?>" data-bs-toggle="modal" class="btn btn-sm btn-success" title="Actived User"><em class="fas fa-check-circle"></em></a>
                            <?php
                          }
                        ?>
                    </td>
                  </tr>
                  <?php require 'btn/casis_management.php'; ?>
                <?php endwhile; ?>
              </tbody>
            </table>  
          </div>
        </div>
      </div>
    </div>
    <!-- end data akun admin -->
</div>