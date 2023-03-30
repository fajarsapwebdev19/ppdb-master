<?php
  session_start();
  require '../../koneksi/koneksi.php';

  if(isset($_POST['kirim']))
  {
    $nama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama'])));
    $jk = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_kelamin'])));
    $nisn = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nisn'])));
    $nik = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nik'])));
    $tempat_lahir = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tempat_lahir'])));
    $tanggal_lahir = mysqli_real_escape_string($koneksi, htmlspecialchars(trim(date('Y-m-d', strtotime($_POST['tanggal_lahir'])))));
    $no_reg_akta = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_reg_akta_lahir'])));
    $agama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['agama'])));
    $warganegara = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['warganegara'])));
    $negara = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['negara'])));
    $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['alamat'])));
    $rt = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['rt'])));
    $rw = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['rw'])));
    $kelurahan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kelurahan'])));
    $kecamatan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kecamatan'])));
    $kode_pos = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kode_pos'])));
    $tempat_tinggal = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tempat_tinggal'])));
    $transportasi = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['transportasi'])));
    $no_kks = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_kks'])));
    $anak_ke = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['anak_ke'])));
    $nerima_kps = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nerima_kps'])));
    $no_kps = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_kps'])));
    $punya_kip = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['punya_kip'])));
    $no_kip = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_kip'])));
    $nama_kip = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_kip'])));
    $alasan_pip = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['alasan_pip'])));
    $nama_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_ayah'])));
    $nik_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nik_ayah'])));
    $tl_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tl_ayah'])));
    $pendidikan_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pendidikan_ayah'])));
    $pekerjaan_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pekerjaan_ayah'])));
    $penghasilan_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['penghasilan_ayah'])));
    $nama_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_ibu'])));
    $nik_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nik_ibu'])));
    $tl_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tl_ibu'])));
    $pendidikan_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pendidikan_ibu'])));
    $pekerjaan_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pekerjaan_ibu'])));
    $penghasilan_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['penghasilan_ibu'])));
    $punya_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['punya_wali'])));
    $nama_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_wali'])));
    $nik_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nik_wali'])));
    $tl_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tl_wali'])));
    $pendidikan_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pendidikan_wali'])));
    $pekerjaan_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pekerjaan_wali'])));
    $penghasilan_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['penghasilan_wali'])));
    $tinggi = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tinggi'])));
    $berat = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['berat'])));
    $jarak_sekolah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jarak_sekolah'])));
    $sebutkan_jarak = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jarak'])));
    $jam = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jam'])));
    $menit = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['menit'])));
    $jumlah_saudara = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jumlah_saudara'])));
    $jurusan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jurusan'])));
    $jenis_pendaftaran = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_pendaftaran'])));
    $cita_cita = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['cita_cita'])));
    $hobby = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['hobi'])));
    $asal_sekolah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['asal_sekolah'])));
    $status_isi = "Sudah";
    $status_approval = "Antrian";
    $keterangan_tolak = "";
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));

    // keamanan untuk user bandel

    $app = mysqli_query($koneksi, "SELECT * FROM aplikasi");
    $aps = mysqli_fetch_assoc($app);
    $batas = $aps['batas_pengisian'];
    $tanggal = date('Y-m-d');
    $date = new DateTime($tanggal);
    $end = new DateTime($batas);

    if($date >= $end)
    {
      $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white" id="auto-close">
        <div class="alert-message">
              <em class="fas fa-check-circle"></em> Jangan Main Rubah Sembarangan Ya :)
        </div>
      </div>';
      header('location: ../../User/?page=frm_pdftrn');
    }else{
      $kirim_data = mysqli_query($koneksi, "INSERT INTO data_peserta_baru (id,nama,jenis_kelamin,nisn,nik,tempat_lahir,tanggal_lahir,no_reg_akta,agama,warganegara,negara,alamat,rt,rw,kelurahan,kecamatan,kode_pos,tempat_tinggal,transportasi,nomor_kks,anak_ke,penerima_kps,nomor_kps,punya_pip,nomor_kip,nama_kip,alasan_menerima_pip,nama_ayah,nik_ayah,tl_ayah,pendidikan_ayah,pekerjaan_ayah,penghasilan_ayah,nama_ibu,nik_ibu,tl_ibu,pendidikan_ibu,pekerjaan_ibu,penghasilan_ibu,punya_wali,nama_wali,nik_wali,tl_wali,pendidikan_wali,pekerjaan_wali,penghasilan_wali,tinggi,berat,jarak_kesekolah,dalam_kilometer,jam,menit,jumlah_saudara,jurusan,jenis_pendaftaran,cita_cita,hobby,asal_sekolah,status_isi,status_approval,keterangan_tolak,username) VALUES (NULL,'$nama','$jk','$nisn','$nik','$tempat_lahir','$tanggal_lahir','$no_reg_akta','$agama','$warganegara','$negara','$alamat','$rt','$rw','$kelurahan','$kecamatan','$kode_pos','$tempat_tinggal','$transportasi','$no_kks','$anak_ke','$nerima_kps','$no_kps','$punya_kip','$no_kip','$nama_kip','$alasan_pip','$nama_ayah','$nik_ayah','$tl_ayah','$pendidikan_ayah','$pekerjaan_ayah','$penghasilan_ayah','$nama_ibu','$nik_ibu','$tl_ibu','$pendidikan_ibu','$pekerjaan_ibu','$penghasilan_ibu','$punya_wali','$nama_wali','$nik_wali','$tl_wali','$pendidikan_wali','$pekerjaan_wali','$penghasilan_wali','$tinggi','$berat','$jarak_sekolah','$sebutkan_jarak','$jam','$menit','$jumlah_saudara','$jurusan','$jenis_pendaftaran','$cita_cita','$hobby','$asal_sekolah','$status_isi','$status_approval','$keterangan_tolak','$username')");

      // berkas_siswa
      $belum = "Belum";

      $kirim_data .= mysqli_query($koneksi, "INSERT INTO berkas_siswa(id,nama,jenis_kelamin,file_ijazah_smp,file_kk,file_akta,file_kip,file_kks,status_verifikasi_ijazah,status_verifikasi_kk,status_verifikasi_akta,status_verifikasi_kip,status_verifikasi_kks,status_upload_ijazah,status_upload_kk,status_upload_akta,status_upload_kip,status_upload_kks,username) VALUES (NULL,'$nama','$jk','','','','','','','','','','','$belum','$belum','$belum','$belum','$belum','$username')");

      $kirim_data .= mysqli_query($koneksi, "INSERT INTO foto_siswa (id,nama,jenis_kelamin,foto,status_upload,status_verifikasi,username) VALUES(NULL, '$nama', '$jk','','$belum','','$username')");
      
      $kirim_data .= mysqli_query($koneksi, "INSERT INTO kesempatan_ubah (id,nama_peserta,username,kesempatan_ubah) VALUES (NULL, '$nama', '$username', '3')");

      if($kirim_data)
      {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-success bg-success text-white" id="auto-close">
          <div class="alert-message">
                <em class="fas fa-check-circle"></em> Berhasil Kirim Data Ke Admin
          </div>
        </div>';
        header('location: ../../User/?page=frm_pdftrn');
      }
    }
  }elseif(isset($_POST['cutoff']))
  {
    $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white" id="auto-close">
        <div class="alert-message">
              <em class="fas fa-check-circle"></em> Input Data Sudah Di Tutup
        </div>
      </div>';
      header('location: ../../User/?page=frm_pdftrn');
  }
?>