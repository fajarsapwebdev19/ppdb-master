<div class="container-fluid p-0">
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Akun Admin</h3>
        </div>
    </div>
    <!-- end title -->

    <!-- data akun admin -->
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
            <table class="table table-hover table-sm nowrap" id="example">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Nama</th>
                  <th class="text-center">JK</th>
                  <th class="text-center">Tempat, Tanggal Lahir</th>
                  <th class="text-center">Usia</th>
                  <th class="text-center">NIK</th>
                  <th class="text-center">No SK Tugas</th>
                  <th class="text-center">Tanggal Registrasi</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Password</th>
                  <th class="text-center">Status Akun</th>
                  <th class="text-center">User Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  $get_data_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE status_registrasi='Terima'");
                  while($admin = mysqli_fetch_assoc($get_data_admin)):
                ?>
                  <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $admin['nama'] ?></td>
                    <td class="text-center">
                      <?php
                        if($admin['jenis_kelamin'] == "Laki-Laki")
                        {
                          echo "L";
                        }
                        elseif($admin['jenis_kelamin'] == "Perempuan")
                        {
                          echo "P";
                        }
                      ?>
                    </td>
                    <td class="text-center">
                      <?= $admin['tempat_lahir'] ?> , <?= date('d-m-Y', strtotime($admin['tanggal_lahir'])) ?>
                    </td>
                    <td class="text-center">
                      <?php
                        $tanggal_lahir = new DateTime($admin['tanggal_lahir']);
                        $sekarang = new DateTime("today");
                        if($tanggal_lahir > $sekarang)
                        {
                          $tahun = "0";
                        }

                        $tahun = $sekarang->diff($tanggal_lahir)->y;

                        echo $tahun.' '."Tahun";
                      ?>
                    </td>
                    <td class="text-center">
                      <?= $admin['nik'] ?>
                    </td>
                    <td class="text-center">
                      <?= $admin['no_sk_tugas'] ?>
                    </td>
                    <td class="text-center"><?= date('d-m-Y', strtotime($admin['tanggal_registrasi'])) ?></td>
                    <td class="text-center">
                      <?= $admin['username'] ?>
                    </td>
                    <td class="text-center">
                      <?= $admin['password'] ?>
                    </td>
                    <td class="text-center">
                      <?php
                        if($admin['status_akun'] == "Aktif")
                        {
                          ?>
                            <p class="badge bg-success">Aktif</p>
                          <?php
                        }elseif($admin['status_akun'] == "Tidak Aktif")
                        {
                          ?>
                            <p class="badge bg-danger">Tidak Aktif</p>
                          <?php
                        }
                      ?>
                    </td>
                    <td class="text-center">
                      <?php
                        if($admin['on_status'] == "Online")
                        {
                          ?>
                            <p class="badge bg-success">Online</p>
                          <?php
                        }
                        elseif($admin['on_status'] == "Offline")
                        {
                          ?>
                            <p class="badge bg-danger">Offline</p>
                          <?php
                        }
                      ?>
                    </td>
                    <td class="text-center">
                      <a href="#" data-bs-target="#view<?= $admin['id'] ?>" data-bs-toggle="modal" class="btn btn-success btn-sm mt-1" title="View Data">
                        <em class="fas fa-eye"></em>
                      </a>
                      <a href="#" data-bs-target="#edit<?= $admin['id'] ?>" data-bs-toggle="modal" class="btn btn-info btn-sm mt-1" title="Update Data">
                        <em class="fas fa-edit"></em>
                      </a>
                      <?php
                        if($admin['status_akun'] == "Aktif")
                        {
                          ?>
                            <?php
                              if($admin['username'] == $data_admin['username'])
                              {
                                ?>
                                  <a href="#" class="btn btn-danger btn-sm mt-1" title="Block Account">
                                    <em class="fas fa-minus-circle"></em>
                                  </a>
                                <?php
                              }else{
                                ?>
                                  <a href="#" data-bs-target="#block<?= $admin['id'] ?>" data-bs-toggle="modal" class="btn btn-danger btn-sm mt-1" title="Block Account">
                                    <em class="fas fa-minus-circle"></em>
                                  </a>    
                                <?php
                              }
                            ?>
                          <?php
                        }elseif($admin['status_akun'] == "Tidak Aktif")
                        {
                          ?>
                            <?php
                              if($admin['username'] == $data_admin['username'])
                              {
                                ?>
                                  <a href="#" class="btn btn-success btn-sm mt-1" title="Active Account">
                                    <em class="fas fa-check-circle"></em>
                                  </a>
                                <?php
                              }else{
                                ?>
                                  <a href="#" data-bs-target="#block<?= $admin['id'] ?>" data-bs-toggle="modal" class="btn btn-success btn-sm mt-1" title="Active Account">
                                    <em class="fas fa-check-circle"></em>
                                  </a>
                                <?php
                              }
                            ?>
                          <?php
                        }
                      ?>
                      <?php
                        if($admin['username'] == $data_admin['username'])
                        {
                          ?>
                            <a href="#" class="btn btn-danger btn-sm mt-1" title="Delete Data">
                              <em class="fas fa-trash-alt"></em>
                            </a>
                          <?php
                        }else{
                          ?>
                            <a href="#" data-bs-target="#delete<?= $admin['id'] ?>" data-bs-toggle="modal" class="btn btn-danger btn-sm mt-1" title="Delete Data">
                              <em class="fas fa-trash-alt"></em>
                            </a>
                          <?php
                        }
                      ?>
                    </td>
                  </tr>
                  <?php require 'btn/admin_management.php'; ?>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- end data akun admin -->
</div>