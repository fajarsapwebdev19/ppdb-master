<?php
  require_once('../../dompdf/autoload.inc.php');
  require_once('../../koneksi/koneksi.php');

  session_start();
  ob_start();

  if(empty($_SESSION['login_status']))
  {
    header('location: ../../login/');
  }

  use Dompdf\Dompdf;
  $dompdf = new Dompdf();

  if(isset($_POST['print']))
  {
    if(isset($_POST['username']))
    {
      $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));

      $dpb = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE data_peserta_baru.username='$username'");

      $data = mysqli_fetch_assoc($dpb);
    }
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulir Pendaftaran Siswa Baru</title>
	<style type="text/css">
    .kop{
      margin: 0;
      padding: 0;
      width: 100%;
    }
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr td {
			font-size: 14px;
      font-family: 'Times New Roman', Times, serif;
		}

    p{
      font-size: 12px;
    }

    .kotak{
      border: 5px solid #000;
      padding-top: 6px;
      padding-bottom: 6px;
    }

    .text-center{
      text-align: center;
    }

    .size-rincian{
      font-size: 12px;
    }

    .table-rincian{
      font-size: 12px;
      border: 1px solid #000;
      border-collapse: collapse;
      padding: 6px;
    }

    .table-rincian thead tr th{
      background-color: green;
      text-align:center;
      color: #eaeaea;
      text-transform: uppercase;
      border: 1px solid #000;
      border-collapse: collapse;
    }

    .table-rincian tbody tr td{
      border-collapse: collapse;
      border: 1px solid #000;
      letter-spacing: 1px;
    }

    .angsur{
      padding: 10px;
      font-size: 10px;
    }

    .kotak-angsur{
      padding: 4px;
      border: 3px solid #000;
      font-size: 12px;
    }

    .angsur-siswa{
      font-size: 10px;
    }
	</style>
</head>
<body>
	<center>
		<table class="kop">
			<tr>
        <!-- data kop surat -->
          <?php
            $kop = mysqli_query($koneksi, "SELECT * FROM aplikasi");
            $data_kop = mysqli_fetch_assoc($kop);
          ?>
        <!-- end data kop surat -->
        <!-- logo sekolah -->
				<td><img src="../../assets/img/logo/<?= $data_kop['logo_sekolah']?>" width="120" height="120"></td>
				<td>
				<center style="margin-right: 90px;">
					<font size="4">FORMULIR PENDAFTARAN SISWA BARU</font><br>
					<font size="5"><b><?= $data_kop['nama_sekolah']?></b></font><br>
					<font size="2">Bidang Keahlian : <?= $data_kop['bidang']?></font>
					<font size="2" class="alamat"><i><?= $data_kop['alamat']?></i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr style="width: 100%;"></td>
			</tr>
		</table>
    </center>
    <table>
      <tr>
        <td width="100%">
          <h3>
            Data Peserta
          </h3>
        </td>
      </tr>
    </table>
    <table border="0" width="200%">
      <tbody>
        <tr>
          <td width="12%">Nama</td>
          <td>:&nbsp;<?= $data['nama']?></td>
        </tr>
        <tr>
          <td width="12%">Jenis Kelamin</td>
          <td>:&nbsp;<?= $data['jenis_kelamin']?></td>
        </tr>
        <tr>
          <td width="12%">NISN</td>
          <td>:&nbsp;<?= $data['nisn']?></td>
        </tr>
        <tr>
          <td width="12%">NIK</td>
          <td>:&nbsp;<?= $data['nik']?></td>
        </tr>
        <tr>
          <td width="12%">Tempat Lahir</td>
          <td>:&nbsp;<?= $data['tempat_lahir']?></td>
        </tr>
        <tr>
          <td width="12%">Tanggal Lahir</td>
          <td>:&nbsp;<?= date('d-m-Y', strtotime($data['tanggal_lahir']))?></td>
        </tr>
        <tr>
          <td width="12%">No Registrasi Akta Lahir</td>
          <td>:&nbsp;<?php if(empty($data['no_reg_akta'])){echo '-';}else{echo $data['no_reg_akta'];}?></td>
        </tr>
        <tr>
          <td width="12%">Agama</td>
          <td>:&nbsp;<?= $data['agama'] ?></td>
        </tr>
        <tr>
          <td width="12%">Kewarganegaraan</td>
          <td>:&nbsp;<?= $data['warganegara']?></td>
        </tr>
        <tr <?php if($data['warganegara'] == "Indonesia(WNI)"){echo 'style="display: none;"';}else{echo 'style="display:block;"';}?>>
          <td width="12%">Negara</td>
          <td>:&nbsp;<?= $data['negara']?></td>
        </tr>
        <tr>
          <td width="12%">Alamat</td>
          <td>:&nbsp;<?= $data['alamat'] ?></td>
        </tr>
        <tr>
          <td width="12%">RT / RW</td>
          <td>:&nbsp;<?= $data['rt'] ?> / <?= $data['rw']?></td>
        </tr>
        <?php
          // kelurahan
          $kelurahan = $data['kelurahan'];
          $tb_kel = mysqli_query($koneksi, "SELECT * FROM wilayah_desa WHERE id='$kelurahan'");
          $dk = mysqli_fetch_assoc($tb_kel);
          $name_kelurahan = $dk['nama'];
          $kecamatan = $data['kecamatan'];
          $tb_kec = mysqli_query($koneksi, "SELECT * FROM wilayah_kecamatan WHERE id='$kecamatan'");
          $dkc = mysqli_fetch_assoc($tb_kec);
          $name_kecamatan = $dkc['nama'];
        ?>
        <tr>
          <td width="12%">Kelurahan</td>
          <td>:&nbsp;<?= $kelurahan; ?></td>
        </tr>
        <tr>
          <td width="12%">Kecamatan</td>
          <td>:&nbsp;<?= $kecamatan; ?></td>
        </tr>
        <tr>
          <td width="12%">Kode POS</td>
          <td>:&nbsp;<?= $data['kode_pos']; ?></td>
        </tr>
        <tr>
          <td width="12%">Tempat Tinggal</td>
          <td>:&nbsp;<?= $data['tempat_tinggal']; ?></td>
        </tr>
        <tr>
          <td width="12%">Moda Transportasi</td>
          <td>:&nbsp;<?= $data['transportasi']; ?></td>
        </tr>
        <tr>
          <td width="12%">Nomor KKS</td>
          <td>:&nbsp;<?php if(empty($data['nomor_kks'])){echo '-';}else{echo $data['nomor_kks'];} ; ?></td>
        </tr>
        <tr>
          <td width="12%">Anak Ke</td>
          <td>:&nbsp;<?= $data['anak_ke']?></td>
        </tr>
      </tbody>
    </table>
    <table>
      <tr>
        <td width="100%">
          <h3>
            Data Kesejahteraan
          </h3>
        </td>
      </tr>
    </table>
    <table border="0" width="200%">
      <tbody>
        <tr>
          <td width="12%">Penerima KPS</td>
          <td>:&nbsp;<?= $data['penerima_kps'] ?></td>
        </tr>
        <tr>
          <td width="12%">Nomor KPS</td>
          <td>:&nbsp;<?php if(empty($data['nomor_kps'])){echo '-';}else{echo $data['nomor_kps'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Punya KIP</td>
          <td>:&nbsp;<?= $data['punya_pip']?></td>
        </tr>
        <tr>
          <td width="12%">Nomor KIP</td>
          <td>:&nbsp;<?php if(empty($data['nomor_kip'])){echo '-';}else{echo $data['nomor_kip']; } ?></td>
        </tr>
        <tr>
          <td width="12%">Nama Tertera KIP</td>
          <td>:&nbsp;<?php if(empty($data['nama_kip'])){echo '-';}else{echo $data['nama_kip']; }?></td>
        </tr>
        <tr>
          <td width="12%">Alasan Menerima KIP</td>
          <td>:&nbsp;<?php if(empty($data['alasan_menerima_pip'])){echo '-';}else{echo  $data['alasan_menerima_pip'];}?></td>
        </tr>
      </tbody>
    </table>
    <br><br><br><br><br><br><br><br><br>
    <table>
      <tr>
        <td width="100%">
          <h3>
            Data Ayah Kandung
          </h3>
        </td>
      </tr>
    </table>
    <table border="0" width="200%">
      <tbody>
        <tr>
          <td width="12%">Nama</td>
          <td>:&nbsp;<?php if(empty($data['nama_ayah'])){echo '-';}else{echo $data['nama_ayah'];} ?></td>
        </tr>
        <tr>
          <td width="12%">NIK</td>
          <td>:&nbsp;<?php if(empty($data['nik_ayah'])){echo '-';}else{echo $data['nik_ayah'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Tahun Lahir</td>
          <td>:&nbsp;<?php if(empty($data['tl_ayah'])){echo '-';}else{echo $data['tl_ayah'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Pendidikan Terakhir</td>
          <td>:&nbsp;<?php if(empty($data['pendidikan_ayah'])){echo '-';}else{echo $data['pendidikan_ayah'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Pekerjaan</td>
          <td>:&nbsp;<?php if(empty($data['pekerjaan_ayah'])){echo '-';}else{echo $data['pekerjaan_ayah'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Penghasilan</td>
          <td>:&nbsp;<?php if(empty($data['pekerjaan_ayah'])){echo '-';}else{echo $data['penghasilan_ayah'];}?></td>
        </tr>
      </tbody>
    </table>
    <table>
      <tr>
        <td width="100%">
          <h3>
            Data Ibu Kandung
          </h3>
        </td>
      </tr>
    </table>
    <table border="0" width="200%">
      <tbody>
        <tr>
          <td width="12%">Nama</td>
          <td>:&nbsp;<?php if(empty($data['nama_ibu'])){echo '-';}else{echo $data['nama_ibu'];} ?></td>
        </tr>
        <tr>
          <td width="12%">NIK</td>
          <td>:&nbsp;<?php if(empty($data['nik_ibu'])){echo '-';}else{echo $data['nik_ibu'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Tahun Lahir</td>
          <td>:&nbsp;<?php if(empty($data['tl_ibu'])){echo '-';}else{echo $data['tl_ibu'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Pendidikan Terakhir</td>
          <td>:&nbsp;<?php if(empty($data['pendidikan_ibu'])){echo '-';}else{echo $data['pendidikan_ibu'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Pekerjaan</td>
          <td>:&nbsp;<?php if(empty($data['pekerjaan_ibu'])){echo '-';}else{echo $data['pekerjaan_ibu'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Penghasilan</td>
          <td>:&nbsp;<?php if(empty($data['penghasilan_ibu'])){echo '-';}else{echo $data['penghasilan_ibu'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Punya Wali</td>
          <td>:&nbsp;<?= $data['punya_wali'] ?></td>
        </tr>
      </tbody>
    </table>
    <table>
      <tr>
        <td width="100%">
          <h3>
            Data Wali
          </h3>
        </td>
      </tr>
    </table>
    <table border="0" width="200%">
      <tbody>
        <tr>
          <td width="12%">Nama</td>
          <td>:&nbsp;<?php if(empty($data['nama_wali'])){echo '-';}else{echo  $data['nama_wali'];}?></td>
        </tr>
        <tr>
          <td width="12%">NIK</td>
          <td>:&nbsp;<?php if(empty($data['nik_wali'])){echo '-';}else{echo  $data['nik_wali'];}?></td>
        </tr>
        <tr>
          <td width="12%">Tahun Lahir</td>
          <td>:&nbsp;<?php if(empty($data['tl_wali'])){echo '-';}else{echo $data['tl_wali'];}?></td>
        </tr>
        <tr>
          <td width="12%">Pendidikan Terakhir</td>
          <td>:&nbsp;<?php if(empty($data['pendidikan_wali'])){echo '-';}else{echo $data['pendidikan_wali'];} ?></td>
        </tr>
        <tr>
          <td width="12%">Pekerjaan</td>
          <td>:&nbsp;<?php if(empty($data['pekerjaan_wali'])){echo '-';}else{echo $data['pekerjaan_wali'];}?></td>
        </tr>
        <tr>
          <td width="12%">Penghasilan</td>
          <td>:&nbsp;<?php if(empty($data['penghasilan_wali'])){echo '-';}else{echo $data['penghasilan_wali'];}?></td>
        </tr>
      </tbody>
    </table>
    <table>
      <tr>
        <td width="100%">
          <h3>
            Data Priodik Siswa
          </h3>
        </td>
      </tr>
    </table>
    <table border="0" width="200%">
      <tbody>
        <tr>
          <td width="12%">Tinggi Badan</td>
          <td>:&nbsp;<?= $data['tinggi']?> cm</td>
        </tr>
        <tr>
          <td width="12%">Berat Badan</td>
          <td>:&nbsp;<?= $data['berat']?> kg</td>
        </tr>
        <tr>
          <td width="12%">Jarak Rumah Ke Sekolah</td>
          <td>:&nbsp;<?= $data['jarak_kesekolah']?></td>
        </tr>
        <tr>
          <td width="12%">Sebutkan Dalam Kilometer</td>
          <td>:&nbsp;<?php if($data['jarak_kesekolah']=="Kurang dari 1 km"){echo '-';}else{echo $data['dalam_kilometer'];}?></td>
        </tr>
        <tr>
          <td width="12%">Waktu Tempuh Kesekolah</td>
          <td>:&nbsp;<?= $data['jam']?> Jam <?= $data['menit']?> Menit</td>
        </tr>
        <tr>
          <td width="12%">Jumlah Saudara Kandung</td>
          <td>:&nbsp;<?= $data['jumlah_saudara']?></td>
        </tr>
      </tbody>
    </table>
    <br><br><br><br><br><br><br><br><br><br>
    <table>
      <tr>
        <td width="100%">
          <h3>
            Registrasi Peserta Didik
          </h3>
        </td>
      </tr>
    </table>
    <table border="0" width="200%">
      <tbody>
        <tr>
          <td width="12%">Jurusan</td>
          <td>:&nbsp;<?= $data['jurusan']?></td>
        </tr>
        <tr>
          <td width="12%">Jenis Pendaftaran</td>
          <td>:&nbsp;<?= $data['jenis_pendaftaran']?></td>
        </tr>
        <tr>
          <td width="12%">Cita-Cita</td>
          <td>:&nbsp;<?= $data['cita_cita']?></td>
        </tr>
        <tr>
          <td width="12%">Hobby</td>
          <td>:&nbsp;<?= $data['hobby']?></td>
        </tr>
        <tr>
          <td width="12%">Asal Sekolah</td>
          <td>:&nbsp;<?= $data['asal_sekolah']?></td>
        </tr>
      </tbody>
    </table>
    <br><br><br>
    <p>Note : Bawa Formulir Ini Sebagai Barang Bukti Pendaftaran Lewat Online Atau Cukup Tunjukan Bukti Pendaftaran Kepada Panitia PPDB</p>
    <p>
        Persyaratan :
    </p>
    <p>
        1. FC Kartu Keluarga
        <br>
        2. FC Foto Copy Akta Kelahiran
        <br>
        3. FC Ijazah SMP/MTS
        <br>
        4. Pas Photo Ukuran 3x4
        <br>
        5. FC KTP Orang Tua
        <br>
        6. Kartu KIP (jika ada)
        <br>
        7. Materai Rp.10.000
    </p>
    <br><br>
    <div class="kotak">
      <div class="text-center">
        <b class="size-rincian">RINCIAN BIAYA PENERIMAAN <br> SISWA BARU TAHUN PELAJARAN 2023/2024</b>
      </div>
      <table class="table-rincian" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Uraian Biaya</th>
            <th>Jurusan OTKP</th>
            <th>Jurusan TKJ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">1</td>
            <td>Uang Bangunan</td>
            <td class="text-center">GRATIS</td>
            <td class="text-center">GRATIS</td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td>Formulir</td>
            <td class="text-center">Rp. 150.000</td>
            <td class="text-center">Rp. 150.000</td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td>SPP Perbulan</td>
            <td class="text-center">Rp. 260.000</td>
            <td class="text-center">Rp. 285.000</td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td>OSIS</td>
            <td class="text-center">Rp. 200.000</td>
            <td class="text-center">Rp. 200.000</td>
          </tr>
          <tr>
            <td class="text-center">5</td>
            <td>Kartu Pelajar, Kartu SPP, Sampul Raport</td>
            <td class="text-center">Rp. 200.000</td>
            <td class="text-center">Rp. 200.000</td>
          </tr>
          <tr>
            <td class="text-center">6</td>
            <td>Mabis</td>
            <td class="text-center">Rp. 150.000</td>
            <td class="text-center">Rp. 150.000</td>
          </tr>
          <tr>
            <td class="text-center">7</td>
            <td>Seragam Dan Atribut</td>
            <td class="text-center">Rp. 850.000</td>
            <td class="text-center">Rp. 850.000</td>
          </tr>
          <tr>
            <td class="text-center">8</td>
            <td>Sarana Prasarana</td>
            <td class="text-center">Rp. 400.000</td>
            <td class="text-center">Rp. 400.000</td>
          </tr>
          <tr style="background: #eaeaea;">
            <td colspan="2"><b>TOTAL BIAYA MASUK</b></td>
            <td class="text-center"><b>Rp. 2.210.000</b></td>
            <td class="text-center"><b>Rp. 2.235.000</b></td>
          </tr>
        </tbody>
      </table>

      <br><br>
      <div class="angsur">
        <div class="kotak-angsur">
          <b>BIAYA MASUK Bisa Diangsur <br> JURUSAN OTKP</b>
        </div>
        <table class="angsur-siswa">
          <tr>
            <th>Dana Setoran Pertama (*wajib)</th>
            <td>Rp. 960.000</td>
          </tr>
          <tr>
            <td>angsuran ke-1 sebagai syarat PTS Ganjil</td>
            <td>Rp. 625.000</td>
          </tr>
          <tr>
            <td>angsuran ke-2 sebagai syarat PAS Ganjil</td>
            <td>Rp. 625.000</td>
          </tr>
        </table>
        <div class="kotak-angsur">
          <b>BIAYA MASUK Bisa Diangsur <br> JURUSAN OTKP</b>
        </div>
        <table class="angsur-siswa">
          <tr>
            <th>Dana Setoran Pertama (*wajib)</th>
            <td>Rp. 985.000</td>
          </tr>
          <tr>
            <td>angsuran ke-1 sebagai syarat PTS Ganjil</td>
            <td>Rp. 625.000</td>
          </tr>
          <tr>
            <td>angsuran ke-2 sebagai syarat PAS Ganjil</td>
            <td>Rp. 625.000</td>
          </tr>
        </table>
      </div>
    </div>
		<table width="100%">
			<tr>
				<td width="410"><br><br><br><br></td>
				<td align="center">Orang Tua/Wali Siswa<br><br><br><br><br><br>
          <b>
            <?php
              if(empty($data['nama_ayah']))
              {
                echo $data['nama_ibu'];
              }
              elseif(empty($data['nama_ayah']) && $data['nama_ibu']){
                echo $data['nama_wali'];
              }else{
                echo "NULL";
              }
            ?>
          </b>
        </td>
			</tr>
	  </table>
</body>
</html>
<?php
  $html = ob_get_contents();
  ob_end_clean();

  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4','potrait');
  $dompdf->render();
  $tahun = date('Y');
  $title = "Formulir Pendaftaran Siswa".' - '.$data['nama'];
  $dompdf->stream($title.' Tahun '.$tahun.'.pdf', array("Attachment"=>0));
?>