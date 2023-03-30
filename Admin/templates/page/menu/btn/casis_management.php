<!-- view data calon siswa -->
<div class="modal fade" id="view<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View Data Calon Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" class="form-control" value="<?= $data['nama'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="">Jenis Kelamin</label>
            <input type="text" class="form-control" value="<?= $data['jenis_kelamin'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="">Tempat, Tanggal Lahir</label>
            <input type="text" class="form-control" value="<?= $data['tempat_lahir'] ?>, <?= ($data['tanggal_lahir'] == "" || $data['tanggal_lahir'] == NULL) ? '' : date('d-m-Y', strtotime($data['tanggal_lahir'])) ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="">NIK</label>
            <input type="text" class="form-control" value="<?= $data['nik'] ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="">Agama</label>
            <input type="text" class="form-control" value="<?= $data['agama'] ?>" disabled>
        </div>
        <?php
            // get data in database user
            $prov = $data['provinsi'];
            $kab = $data['kabupaten'];
            $kec = $data['kecamatan'];
            $kel = $data['kelurahan'];
            
            // get name provinsi
            $get_prov = mysqli_query($koneksi, "SELECT * FROM wilayah_provinsi WHERE id='$prov'");
            $name_prov = mysqli_fetch_assoc($get_prov);
            // get name kabupaten  / kota
            $get_kab = mysqli_query($koneksi, "SELECT * FROM wilayah_kabupaten WHERE id='$kab'");
            $name_kab = mysqli_fetch_assoc($get_kab);
            // get name kecamatan
            $get_kec = mysqli_query($koneksi, "SELECT * FROM wilayah_kecamatan WHERE id='$kec'");
            $name_kec = mysqli_fetch_assoc($get_kec);
            // get name kelurahan / desa
            $get_kel = mysqli_query($koneksi, "SELECT * FROM wilayah_desa WHERE id='$kel'");
            $name_kel = mysqli_fetch_assoc($get_kel);
        ?>
        <div class="mb-3">
            <label for="">Alamat</label>
            <textarea cols="5" class="form-control" disabled><?= $data['alamat'] ?>, RT <?= $data['rt'] ?>, RW <?= $data['rw'] ?>, Kel <?= $name_kel['nama'] ?>, Kec <?= $name_kec['nama'] ?>,<?= $name_kab['nama'] ?>, Prov. <?= $name_prov['nama'] ?></textarea>
        </div>
        <div class="mb-3">
          <label for="">Username</label>
          <input type="text" class="form-control" value="<?= $data['username'] ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="">Password</label>
          <input type="text" class="form-control" value="<?= $data['password'] ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="">Tanggal Registrasi</label>
          <input type="text" class="form-control" value="<?= ($data['tanggal_registrasi'] == "" || $data['tanggal_registrasi'] == NULL) ? '' : date('d-m-Y', strtotime($data['tanggal_registrasi'])) ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="">Tanggal Di Terima</label>
          <input type="text" class="form-control" value="<?= ($data['tanggal_diterima'] == "" || $data['tanggal_diterima'] == NULL) ? '' : date('d-m-Y', strtotime($data['tanggal_diterima'])) ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="">Status Akun</label>
          <input type="text" class="form-control" value="<?= $data['status_akun'] ?>" disabled>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end view data calon siswa -->

<!-- start update data calon siswa -->
<div class="modal fade" id="edit<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Data Calon Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../proses/update/akun.php" method="post">
          <input type="hidden" name="username" value="<?= $data['username'] ?>">
          <div class="mb-3">
            <label for="">
              Nama
            </label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>">
          </div>
          <div class="mb-3">
            <label for="">
              Jenis Kelamin
            </label>
            <div class="mb-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki" <?php if($data['jenis_kelamin'] == "Laki-Laki"){echo 'checked';}?>>
                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan" <?php if($data['jenis_kelamin'] == "Perempuan"){echo 'checked';}?>>
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="">NIK</label>
            <input type="text" name="nik" class="form-control" onkeypress="return goodchars(event, '0123456789', this)" value="<?= $data['nik'] ?>">
          </div>
          <div class="mb-3">
            <label for="">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="<?= $data['tempat_lahir'] ?>">
          </div>
          <div class="mb-3">
            <label for="">Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" class="form-control tanggal" value="<?= date('d-m-Y', strtotime($data['tanggal_lahir'])) ?>">
          </div>
          <div class="mb-3">
            <label for="">Agama</label>
            <select name="agama" class="form-control">
              <option value="">
                Pilih Salah Satu
              </option>
              <?php
                require '../get_data/master_data.php';
                $religion = mysqli_query($master, "SELECT * FROM agama");
                while($agm = mysqli_fetch_assoc($religion)):
              ?>
                <option <?php if($data['agama'] == $agm['nama_agama']){echo 'selected'; }?>><?= $agm['nama_agama'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $data['alamat']?>">
          </div>
          <div class="mb-3">
            <label for="">RT</label>
            <input type="text" name="rt" class="form-control" value="<?= $data['rt']?>">
          </div>
          <div class="mb-3">
            <label for="">RW</label>
            <input type="text" name="rw" class="form-control" value="<?= $data['rw']?>">
          </div>
          <div class="mb-3">
            <label for="">No Telp</label>
            <input type="text" name="no_telp" class="form-control" value="<?= $data['no_telp']?>">
          </div>
          <div class="mb-3">
            <div class="modal-footer">
              <button type="submit" name="update_user" class="btn btn-info">Update</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end update data calon siswa -->

<!-- start delete data calon siswa -->
<div class="modal fade" id="delete<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Data Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-center">
          Apakah Anda Yakin Ingin Menghapus Data Siswa ? <?= $data['nama'] ?>
        </p>
      </div>
      <div class="text-center mb-4">
        <form action="../proses/delete/akun.php" method="post">
          <input type="hidden" name="username" value="<?= $data['username'] ?>">
          <button type="submit" name="hapus_user" class="btn btn-success">Ya, Hapus</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end delete data calon siswa -->

<!-- start blokir akun calon siswa -->
<div class="modal fade" id="block<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Blokir Akun Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        Apakah Anda Akan Memblokir Akun ? <?= $data['username'] ?>
      </div>
      <div class="text-center mb-4">
        <form action="../proses/management_akun/user.php" method="post">
          <input type="hidden" name="username" value="<?= $data['username'] ?>">
          <button type="submit" name="blokir_user" class="btn btn-success">Ya, Blokir</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end blokir akun calon siswa -->

<!-- start aktif akun calon siswa -->
<div class="modal fade" id="actived<?= $data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Aktivasi Akun Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        Apakah Anda Akan Mengaktifkan Akun ? <?= $data['username'] ?>
      </div>
      <div class="text-center mb-4">
        <form action="../proses/management_akun/user.php" method="post">
          <input type="hidden" name="username" value="<?= $data['username'] ?>">
          <button type="submit" name="actived_user" class="btn btn-success">Ya, Aktifkan</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end aktif akun calon siswa -->