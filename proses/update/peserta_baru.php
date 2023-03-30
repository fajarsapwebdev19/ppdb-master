<?php
    session_start();
    require '../../koneksi/koneksi.php';

    if(isset($_POST['update']))
    {
        if(isset($_POST['username']))
        {
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['username'])));
            $nisn = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nisn'])));
            $no_reg_akta = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_reg_akta'])));
            $agama = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['agama'])));
            $warganegara = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['warganegara'])));
            $negara = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['negara'])));
            $kode_pos = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['kode_pos'])));
            $tempat_tinggal = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tempat_tinggal'])));
            $transportasi = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['transportasi'])));
            $no_kks = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_kks'])));
            $anak_ke = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['anak_ke'])));
            $nerima_kps = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nerima_kps'])));
            $no_kps = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_kps'])));
            $punya_kip = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['punya_kip']));
            $no_kip = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['no_kip'])));
            $nama_kip = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_kip'])));
            $alasan_pip = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['alasan_pip'])));
            $nama_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_ayah'])));
            $nik_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nik_ayah'])));
            $tl_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tl_ayah'])));
            $pendidikan_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pendidikan_ayah'])));
            $pekerjaan_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pekerjaan_ayah'])));
            $pengasilan_ayah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['penghasilan_ayah'])));
            $nama_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_ibu'])));
            $nik_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nik_ibu'])));
            $tl_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tl_ibu'])));
            $pendidikan_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pendidikan_ibu'])));
            $pekerjaan_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pekerjaan_ibu'])));
            $pengasilan_ibu = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['penghasilan_ibu'])));
            $punya_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['punya_wali'])));
            $nama_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nama_wali'])));
            $nik_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['nik_wali'])));
            $tl_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tl_wali'])));
            $pendidikan_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pendidikan_wali'])));
            $pekerjaan_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['pekerjaan_wali'])));
            $pengasilan_wali = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['penghasilan_wali'])));
            $tinggi = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['tinggi'])));
            $berat = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['berat'])));
            $jarak_kesekolah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jarak_sekolah'])));
            $sebutkan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jarak'])));
            $jam = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jam'])));
            $menit = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['menit'])));
            $jumlah_saudara = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jumlah_saudara'])));
            $jurusan = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jurusan'])));
            $jenis_pendaftaran = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['jenis_pendaftaran'])));
            $cita_cita = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['cita_cita'])));
            $hobby = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['hobi'])));
            $asal_sekolah = mysqli_real_escape_string($koneksi, htmlspecialchars(trim($_POST['asal_sekolah'])));

            // keamanan untuk user bandel

            $db_app = mysqli_query($koneksi, "SELECT * FROM aplikasi");
            $app = mysqli_fetch_assoc($db_app);
            $tanggal = date('Y-m-d');
            $batas = $app['batas_pengisian'];
            $date = new DateTime($tanggal);
            $end = new DateTime($batas);

            if($date >= $end)
            {
                $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white" id="auto-close">
                    <div class="alert-message">
                        <em class="fas fa-check-circle"></em> Jangan Main Rubah Sembarangan Ya :)
                    </div>
                </div>';
                header('location: ../../User/?page=edt_dt');
            }else{
                $update = mysqli_query($koneksi, "UPDATE data_peserta_baru SET nisn='$nisn', no_reg_akta='$no_reg_akta', agama='$agama', warganegara='$warganegara', negara='$negara', kode_pos='$kode_pos', tempat_tinggal='$tempat_tinggal', transportasi='$transportasi', nomor_kks='$nomor_kks', anak_ke='$anak_ke', penerima_kps='$nerima_kps', nomor_kps='$no_kps', punya_pip='$punya_kip', nomor_kip='$no_kip', nama_kip='$nama_kip', alasan_menerima_pip='$alasan_pip', nama_ayah='$nama_ayah', nik_ayah='$nik_ayah', tl_ayah='$tl_ayah', pendidikan_ayah='$pendidikan_ayah', pekerjaan_ayah='$pekerjaan_ayah', penghasilan_ayah='$pengasilan_ayah', nama_ibu='$nama_ibu', nik_ibu='$nik_ibu', tl_ibu='$tl_ibu', pendidikan_ibu='$pendidikan_ibu', pekerjaan_ibu='$pekerjaan_ibu', penghasilan_ibu='$pengasilan_ibu', punya_wali='$punya_wali', nama_wali='$nama_wali', nik_wali='$nik_wali', pendidikan_wali='$pendidikan_wali', pekerjaan_wali='$pekerjaan_wali', penghasilan_wali='$pengasilan_wali', tinggi='$tinggi', berat='$berat', jarak_kesekolah='$jarak_kesekolah', dalam_kilometer='$sebutkan', jam='$jam', menit='$menit', jumlah_saudara='$jumlah_saudara', jenis_pendaftaran='$jenis_pendaftaran', cita_cita='$cita_cita', hobby='$hobby', asal_sekolah='$asal_sekolah' WHERE username='$username'");
            
                $kesempatan = mysqli_query($koneksi, "SELECT * FROM kesempatan_ubah WHERE username='$username'");
                $ubah = mysqli_fetch_assoc($kesempatan);

                $penolakan = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE username='$username'");
                $status = mysqli_fetch_assoc($penolakan);

                if($status['status_approval'] == "Tolak")
                {
                    $update .= mysqli_query($koneksi, "UPDATE data_peserta_baru SET status_approval='Antrian', keterangan_tolak='' WHERE username='$username'");
                }else{
                    if($ubah['kesempatan_ubah'] == 3)
                    {
                        $update .= mysqli_query($koneksi, "UPDATE kesempatan_ubah SET kesempatan_ubah='2' WHERE username='$username'");
                    }
                    elseif($ubah['kesempatan_ubah'] == 2)
                    {
                        $update .= mysqli_query($koneksi, "UPDATE kesempatan_ubah SET kesempatan_ubah='1' WHERE username='$username'");
                    }
                    elseif($ubah['kesempatan_ubah'] == 1)
                    {
                        $update .= mysqli_query($koneksi, "UPDATE kesempatan_ubah SET kesempatan_ubah='0' WHERE username='$username'");
                    }
                }

                if($update)
                {
                    $_SESSION['val'] = "<div id='auto-close' class='alert alert-success bg-success text-white'> <div class='alert-message'><em class='fas fa-check-circle'></em> Berhasil Update Data Peserta</div></div>";
                    header('location: ../../User/?page=edt_dt');
                }
            }
        }
    }
    elseif(isset($_POST['cutoff']))
    {
        $_SESSION['val'] = '<div id="auto-close" class="alert alert-danger bg-danger text-white" id="auto-close">
        <div class="alert-message">
              <em class="fas fa-times-circle"></em> Input Data Sudah Di Tutup
        </div>
      </div>';
      header('location: ../../User/?page=edt_dt');
    }
?>