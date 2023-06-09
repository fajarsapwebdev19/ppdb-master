<?php
    require '../../koneksi/koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $_POST['id']);

    $ds = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE id='$id'");

    $data = mysqli_fetch_assoc($ds);
?>
<div class="modal-body">
<div class="alert alert-info bg-info text-white">
    <div class="alert-message">
        Data Pribadi Siswa
    </div>
</div>
<div class="mb-3">
    <label>Nama</label>
    <input type="text" class="form-control read" value="<?= $data['nama']?>" disabled>
</div>
<div class="mb-3">
    <label>Jenis Kelamin</label>
    <input type="text" class="form-control read" value="<?= $data['jenis_kelamin']?>" disabled>
</div>
<div class="mb-3">
    <label>NISN</label>
    <input type="text" class="form-control read" value="<?= $data['nisn']?>" disabled>
</div>
<div class="mb-3">
    <label>NIK</label>
    <input type="text" class="form-control read" value="<?= $data['nik']?>" disabled>
</div>
<div class="mb-3">
    <label>Tempat Lahir</label>
    <input type="text" class="form-control read" value="<?= $data['tanggal_lahir']?>" disabled>
</div>
<div class="mb-3">
    <label>No Reg Akta</label>
    <input type="text" class="form-control read"
        value="<?php if($data['no_reg_akta'] == ""){echo 'null';}else{echo $data['no_reg_akta']; } ?>" disabled>
</div>
<div class="mb-3">
    <label>Agama</label>
    <input type="text" class="form-control read" value="<?= $data['agama']?>" disabled>
</div>
<div class="mb-3">
    <label>Warganegara</label>
    <input type="text" class="form-control read" value="<?= $data['warganegara']?>" disabled>
</div>
<div id="wn"
    <?php if($data['warganegara'] == "Indonesia(WNI)"){echo 'style="display:none;"';}elseif($data['warganegara'] == "Asing(WNA)"){echo 'style="display:block;"';}?>>
    <div class="mb-3">
        <label for="">Negara</label>
        <input type="text" class="form-control read" value="<?= $data['negara'] ?>">
    </div>
</div>
<div class="mb-3">
    <label>Alamat</label>
    <input type="text" class="form-control read" value="<?= $data['alamat']?>" disabled>
</div>
<div class="mb-3">
    <label>RT</label>
    <input type="text" class="form-control read" value="<?= $data['rt']?>" disabled>
</div>
<div class="mb-3">
    <label>RW</label>
    <input type="text" class="form-control read" value="<?= $data['rw']?>" disabled>
</div>
<div class="mb-3">
    <label>Kecamatan</label>
    <input type="text" class="form-control read" value="<?= $data['kecamatan']?>" disabled>
</div>
<div class="mb-3">
    <label>Kelurahan</label>
    <input type="text" class="form-control read" value="<?= $data['kelurahan']?>" disabled>
</div>
<div class="mb-3">
    <label>RW</label>
    <input type="text" class="form-control read" value="<?= $data['rw']?>" disabled>
</div>

<div class="mb-3">
    <label>Kode Pos</label>
    <input type="text" class="form-control read" value="<?= $data['kode_pos']?>" disabled>
</div>
<div class="mb-3">
    <label>Tempat Tinggal</label>
    <input type="text" class="form-control read" value="<?= $data['tempat_tinggal']?>" disabled>
</div>
<div class="mb-3">
    <label>Moda Transportasi</label>
    <input type="text" class="form-control read" value="<?= $data['transportasi']?>" disabled>
</div>
<div class="mb-3">
    <label>No KKS</label>
    <input type="text" class="form-control read"
        value="<?php if(empty($data['nomor_kks'])){echo "null";}else{echo $data['nomor_kks']; } ?>" disabled>
</div>
<div class="mb-3">
    <label>Anak Ke</label>
    <input type="text" class="form-control read" value="<?= $data['anak_ke']; ?>" disabled>
</div>
<div class="mb-3">
    <div class="alert alert-info bg-info text-white">
        <div class="alert-message">
            Data Kesejahteraan
        </div>
    </div>
</div>
<div class="mb-3">
    <label>Penerima KPS</label>
    <input type="text" class="form-control read" value="<?= $data['penerima_kps']; ?>" disabled>
</div>
<div id="kps"
    <?php if($data['penerima_kps'] == "Ya"){echo 'style="display:block";';}elseif($data['penerima_kps'] == "Tidak"){echo 'style="display:none"; ';} ?>>
    <div class="mb-3">
        <label>No KPS</label>
        <input type="text" class="form-control read" value="<?= $data['nomor_kps']; ?>" disabled>
    </div>
</div>
<div class="mb-3">
    <label>Punya KIP</label>
    <input type="text" class="form-control read" value="<?= $data['punya_pip']; ?>" disabled>
</div>
<div id="pip"
    <?php if($data['punya_pip'] == "Ya"){echo 'style="display:block";'; }elseif($data['punya_pip'] == "Tidak"){echo 'style="display:none"; ';} ?>>
    <div class="mb-3">
        <label>No KIP</label>
        <input type="text" class="form-control read" value="<?= $data['nomor_kip']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label>Nama KIP</label>
        <input type="text" class="form-control read" value="<?= $data['nama_kip']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label>Alasan Menerima KIP</label>
        <input type="text" class="form-control read" value="<?= $data['alasan_menerima_pip']; ?>" disabled>
    </div>
</div>
<div class="mb-3">
    <div class="alert alert-info bg-info text-white">
        <div class="alert-message">
            Data Ayah Kandung
        </div>
    </div>
    <div class="mb-3">
        <label for="">Nama Ayah</label>
        <input type="text" class="form-control read" value="<?= $data['nama_ayah']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">NIK Ayah</label>
        <input type="text" class="form-control read" value="<?= $data['nik_ayah']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Tahun Lahir Ayah</label>
        <input type="text" class="form-control read" value="<?= $data['tl_ayah']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Pendidikan Ayah</label>
        <input type="text" class="form-control read" value="<?= $data['pendidikan_ayah']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Pekerjaan Ayah</label>
        <input type="text" class="form-control read" value="<?= $data['pekerjaan_ayah']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Penghasilan Ayah</label>
        <input type="text" class="form-control read" value="<?= $data['penghasilan_ayah']; ?>" disabled>
    </div>
</div>
<div class="mb-3">
    <div class="alert alert-info bg-info text-white">
        <div class="alert-message">
            Data Ibu Kandung
        </div>
    </div>
    <div class="mb-3">
        <label for="">Nama Ibu</label>
        <input type="text" class="form-control read" value="<?= $data['nama_ibu']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">NIK Ibu</label>
        <input type="text" class="form-control read" value="<?= $data['nik_ibu']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Tahun Lahir Ibu</label>
        <input type="text" class="form-control read" value="<?= $data['tl_ibu']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Pendidikan Ibu</label>
        <input type="text" class="form-control read" value="<?= $data['pendidikan_ibu']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Pekerjaan Ibu</label>
        <input type="text" class="form-control read" value="<?= $data['pekerjaan_ibu']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Penghasilan Ibu</label>
        <input type="text" class="form-control read" value="<?= $data['penghasilan_ibu']; ?>" disabled>
    </div>
</div>
<div class="mb-3">
    <label>Punya Wali</label>
    <input type="text" class="form-control read" value="<?= $data['punya_wali'] ?>">
</div>
<div class="mb-3"
    <?php if($data['punya_wali'] == "Ya"){echo 'style="display:block; "';}elseif($data['punya_wali'] == "Tidak"){echo 'style="display:none; "';}?>>
    <div class="alert alert-info bg-info text-white">
        <div class="alert-message">
            Data Wali
        </div>
    </div>
    <div class="mb-3">
        <label for="">Nama Wali</label>
        <input type="text" class="form-control read" value="<?= $data['nama_wali']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">NIK Wali</label>
        <input type="text" class="form-control read" value="<?= $data['nik_wali']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Tahun Lahir Wali</label>
        <input type="text" class="form-control read" value="<?= $data['tl_wali']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Pendidikan Wali</label>
        <input type="text" class="form-control read" value="<?= $data['pendidikan_wali']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Pekerjaan Wali</label>
        <input type="text" class="form-control read" value="<?= $data['pekerjaan_wali']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Penghasilan Wali</label>
        <input type="text" class="form-control read" value="<?= $data['penghasilan_wali']; ?>" disabled>
    </div>
</div>
<div class="mb-3">
    <div class="alert alert-info bg-info text-white">
        <div class="alert-message">
            Data Priodik Siswa
        </div>
    </div>
    <div class="mb-3">
        <label for="">Tinggi Badan</label>
        <input type="text" class="form-control read" value="<?= $data['tinggi']; ?> cm" disabled>
    </div>
    <div class="mb-3">
        <label for="">Berat Badan</label>
        <input type="text" class="form-control read" value="<?= $data['berat']; ?> kg" disabled>
    </div>
    <div class="mb-3">
        <label for="">Jarak Rumah Ke Sekolah</label>
        <input type="text" class="form-control read" value="<?= $data['jarak_kesekolah']; ?>" disabled>
    </div>
    <div class="mb-3"
        <?php if($data['jarak_kesekolah'] == "Kurang dari 1 km"){echo 'style="display:none;"';}elseif($data['jarak_kesekolah'] == "Lebih dari 1 km"){echo 'style="display:block; "';}?>>
        <label for="">Jarak Rumah Ke Sekolah</label>
        <input type="text" class="form-control read" value="<?= $data['jarak_kesekolah']; ?> kg" disabled>
    </div>
    <div class="mb-3">
        <label for="">Waktu tempuh ke sekolah</label>
        <div class="mb-3">
            <input type="text" class="form-control read" value="<?= $data['jam']?> Jam" disabled>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control read" value="<?= $data['menit']?> Menit" disabled>
        </div>
    </div>
    <div class="mb-3">
        <label for="">Jumlah Saudara Kandung</label>
        <input type="text" class="form-control read" value="<?= $data['jumlah_saudara'] ?>">
    </div>
</div>
<div class="mb-3">
    <div class="alert alert-info bg-info text-white">
        <div class="alert-message">
            Registrasi Peserta Didik
        </div>
    </div>
    <div class="mb-3">
        <label for="">Jurusan</label>
        <input type="text" class="form-control read" value="<?= $data['jurusan']?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Jenis Pendaftaran</label>
        <input type="text" class="form-control read" value="<?= $data['jenis_pendaftaran']?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Cita-Cita</label>
        <input type="text" class="form-control read" value="<?= $data['cita_cita']?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Hobby</label>
        <input type="text" class="form-control read" value="<?= $data['hobby']?>" disabled>
    </div>
    <div class="mb-3">
        <label for="">Asal Sekolah</label>
        <input type="text" class="form-control read" value="<?= $data['asal_sekolah']?>" disabled>
    </div>
</div>
<div class="mb-3">
        <label for="">Verifikasi</label>
        <div class="mb-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input terima" type="radio" name="status_approval" id="app" value="Terima">
                <label class="form-check-label" for="app">
                    Terima
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input tolak" type="radio" name="status_approval" id="rej" value="Tolak">
                <label class="form-check-label" for="rej">Tolak</label>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="alasan_tolak" style="display: none;">
            <label for="">Alasan Tolak</label>
            <input type="text" name="alasan_tolak" class="form-control">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary verif">Verifikasi</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
</div>
