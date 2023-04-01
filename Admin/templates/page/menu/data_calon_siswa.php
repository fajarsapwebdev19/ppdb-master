<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Data Calon Siswa</h3>
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
            <table class="table table table-sm table-hover table-striped nowrap" id="example">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>JK</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Usia</th>
                  <th>Alamat</th>
                  <th>Asal Sekolah</th>
                  <th>Nama Ayah</th>
                  <th>Nama Ibu</th>
                  <th>Kesempatan Ubah</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  $data_siswa = mysqli_query($koneksi, "SELECT *, data_peserta_baru.id AS id FROM data_peserta_baru JOIN kesempatan_ubah WHERE data_peserta_baru.status_approval='Terima'");
                  while($data = mysqli_fetch_assoc($data_siswa)):
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?php if($data['jenis_kelamin'] == "Laki-Laki"){echo "L";}elseif($data['jenis_kelamin'] == "Perempuan"){echo "P";} ?></td>
                    <td><?= $data['tempat_lahir'] ?>, <?= date('d-m-Y', strtotime($data['tanggal_lahir'])) ?></td>
                    <td>
                      <?php 
                        $birdthday = $data['tanggal_lahir'];
                        $tanggal_lahir = new DateTime($birdthday);
                        $sekarang = new DateTime("today");

                        if($tanggal_lahir > $sekarang)
                        {
                          $usia = "0";
                        }

                        $usia = $sekarang->diff($tanggal_lahir)->y;

                        echo $usia.' '.'Tahun';
                      ?>
                    </td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['asal_sekolah'] ?></td>
                    <td><?= $data['nama_ayah'] ?></td>
                    <td><?= $data['nama_ibu']?></td>
                    <td class="text-center"><?= $data['kesempatan_ubah'] ?></td>
                    <td>
                        <a href="#!" class="btn btn-sm btn-info" title="View Data" data-bs-target="#view<?= $data['id'] ?>" data-bs-toggle="modal">
                          <em class="fas fa-eye"></em>
                        </a>
                        <a href="#!" class="btn btn-sm btn-danger" title="Delete Data" data-bs-target="#delete<?= $data['id']?>" data-bs-toggle="modal">
                          <em class="fas fa-trash-alt"></em>
                        </a>
                        <button type="button" class="btn btn-sm btn-primary confirm_update_kouta" title="Add Update" <?= ($data['kesempatan_ubah'] == 0 ? '' : 'disabled') ?> data-id="<?= $data['id'] ?>">
                          <em class="fas fa-user-plus"></em>
                        </button>
                        <button type="button" class="btn btn-sm btn-info print" title="Print" data-id="<?= $data['id'] ?>">
                          <em class="fas fa-print"></em>
                        </button>
                        
                    </td>
                    <?php require 'btn/data_siswa.php'; ?>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>