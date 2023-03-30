<div class="container-fluid p-0">

    <!-- Title -->

    <div class="row mb-2 mb-xl-3">
        <div class="alert alert-warning bg-warning">
            <h3>Formulir Peserta Didik</h3>
        </div>

        <?php
            if(isset($_SESSION['val']) && $_SESSION['val'] !="")
            {
                echo $_SESSION['val'];
                unset($_SESSION['val']);
            }
            
            $batas = $apl['batas_pengisian'];
            $tanggal = date('Y-m-d');
            $date = new DateTime($tanggal);
            $end = new DateTime($batas);

            if($date >= $end)
            {
                ?>
                    <div class="alert alert-warning bg-warning">
                        <div class="alert-message" style="color:#F0EBE3;">
                            <em class="fas fa-exclamation-triangle"></em> Pengisian Data Sudah Di tutup.
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>

    <!-- End Title -->

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <?php
                        $username = $data_user['username'];
                        $query_data = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE status_isi='Sudah' AND username='$username'");
                        $cek = mysqli_fetch_assoc($query_data);

                        if(empty($cek['status_isi']))
                        {
                            ?>
                                <form action="../proses/send/peserta_baru.php" method="post" autocomplete="off" class="needs-validation" novalidate>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">Nama</label>
                                        <div class="col-md-10">
                                            <input type="text" name="nama" class="form-control" required value="<?= $data_user['nama']?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">Jenis Kelamin</label>
                                        <div class="col-md-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki" <?php if($data_user['jenis_kelamin'] == "Laki-Laki"){echo 'checked'; }?>>
                                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan" <?php if($data_user['jenis_kelamin'] == "Perempuan"){echo 'checked'; } ?>>
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            NISN
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="nisn" minlength="10" maxlength="10" class="form-control" onkeypress='return goodchars(this,"0123456789",event)' required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            NIK
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="nik" minlength="16" maxlength="16" class="form-control" onkeypress="return goodchars(this,'0123456789',event)" value="<?= $data_user['nik'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Tempat Lahir
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $data_user['tempat_lahir'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Tanggal Lahir
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="tanggal_lahir" class="form-control" value="<?= date('d-m-Y', strtotime($data_user['tanggal_lahir']))?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            No. Reg Akta Lahir
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="no_reg_akta_lahir" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Agama & Kepercayaan
                                        </label>
                                        <div class="col-md-10">
                                            <select name="agama" class="form-control opsi" required>
                                                <option value="">Pilih Salah Satu</option>
                                                <?php
                                                    $religion = mysqli_query($master, "SELECT * FROM agama");
                                                    while($agm = mysqli_fetch_assoc($religion)):                                
                                                ?>
                                                    <option><?= $agm['nama_agama']?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">Kewarganegaraan</label>
                                        <div class="col-md-10">
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="warganegara" onclick="wng(0)"  id="inlineRadio3" value="Indonesia(WNI)" required>
                                            <label class="form-check-label" for="inlineRadio3">Indonesia (WNI)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="warganegara" onclick="wng(1)" id="inlineRadio4" value="Asing (WNA)" required>
                                                <label class="form-check-label" for="inlineRadio4">Asing (WNA)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="country" style="display: none;">
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Negara
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" name="negara" id="n" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Alamat
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="alamat" class="form-control" value="<?= $data_user['alamat'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            RT
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="rt" class="form-control" value="<?= $data_user['rt']?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            RW
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="rw" class="form-control" value="<?= $data_user['rw']?>" readonly>
                                        </div>
                                    </div>
                                    <?php
                                        $get_kelurahan = $data_user['kelurahan'];
                                        $kel = mysqli_query($koneksi, "SELECT * FROM wilayah_desa WHERE id='$get_kelurahan'");
                                        $get_name_kelurahan = mysqli_fetcH_assoc($kel);
                                        $name_kelurahan = $get_name_kelurahan['nama'];

                                        $get_kecamatan = $data_user['kecamatan'];
                                        $kec = mysqli_query($koneksi, "SELECT * FROM wilayah_kecamatan WHERE id='$get_kecamatan'");
                                        $get_name_kecamatan = mysqli_fetch_assoc($kec);
                                        $name_kecamatan = $get_name_kecamatan['nama'];
                                    ?>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Kelurahan
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="kelurahan" class="form-control" value="<?= $name_kelurahan; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Kecamatan
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="kecamatan" class="form-control" value="<?= $name_kecamatan; ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Kode POS
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" onkeypress="return goodchars(this,'0123456789',event)" name="kode_pos" class="form-control" maxlength="5" minlength="5" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Tempat Tinggal
                                        </label>
                                        <div class="col-md-10">
                                            <select name="tempat_tinggal" class="form-control opsi" required>
                                                <option value="">Pilih Salah Satu</option>
                                                <?php
                                                    while($tmp = mysqli_fetch_assoc($tempat)):
                                                ?>
                                                    <option><?= $tmp['nama_tempat'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Moda Transportasi
                                        </label>
                                        <div class="col-md-10">
                                            <select name="transportasi" class="form-control opsi" required>
                                                <option value="">Pilih Salah Satu</option>
                                                <?php
                                                    while($tr = mysqli_fetch_assoc($transport)):
                                                ?>
                                                    <option><?= $tr['nama_transportasi'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Nomor KKS
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="no_kks" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">
                                            Anak Keberapa
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="anak_ke" onkeypress="return goodchars(this, '0123456789', event)" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">Penerima KPS/PKH</label>
                                        <div class="col-md-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input check" type="radio" name="nerima_kps" onclick="kps(0),chck(0)" id="inlineRadio5" value="Ya" required>
                                                <label class="form-check-label" for="inlineRadio5">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input check" type="radio" name="nerima_kps" onclick="kps(1)" id="inlineRadio6" value="Tidak" required>
                                                <label class="form-check-label" for="inlineRadio6">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kps"  id="kps" style="display:none;">
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                No. KPS/PKH
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" id="no_kps" name="no_kps" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-2">Apakah Punya KIP</label>
                                        <div class="col-md-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="punya_kip" onclick="pkip(0)" id="inlineRadio7" value="Ya" required>
                                                <label class="form-check-label" for="inlineRadio7">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="punya_kip" id="inlineRadio8" onclick="pkip(1)" value="Tidak" required>
                                                <label class="form-check-label" for="inlineRadio8">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="pip" style="display:none;">
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Nomor KIP
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" name="no_kip" id="kip" class="form-control" minlength="6" maxlength="6">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Nama Tertera KIP
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama_kip" id="nama_kip" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Alasan Penerima KIP
                                            </label>
                                            <div class="col-md-10">
                                            <select name="alasan_pip" class="form-control opsi" id="al_kip">
                                                <option value="">Pilih Salah Satu</option>
                                                <?php
                                                    while($apip = mysqli_fetch_assoc($alpip)):
                                                ?>
                                                    <option><?= $apip['alasan_pip'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="data-ayah">
                                        <div class="alert alert-info alert-message">
                                                Data Ayah Kandung
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Nama Ayah Kandung
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama_ayah" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                NIK Ayah
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" name="nik_ayah" class="form-control" minlength="16" maxlength="16">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Tahun Lahir
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" name="tl_ayah" class="form-control" maxlength="4" minlength="4">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Pendidikan
                                            </label>
                                            <div class="col-md-10">
                                                <select name="pendidikan_ayah" class="form-control opsi">
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        while($p = mysqli_fetch_assoc($pendidikan)):
                                                    ?>
                                                        <option><?= $p['pendidikan'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Pekerjaan
                                            </label>
                                            <div class="col-md-10">
                                                <select name="pekerjaan_ayah" class="form-control opsi">
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        while($pkj_a = mysqli_fetch_assoc($pekerjaan)):
                                                    ?>
                                                        <option><?= $pkj_a['pekerjaan'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Penghasilan Bulanan
                                            </label>
                                            <div class="col-md-10">
                                                <select name="penghasilan_ayah" class="form-control opsi">
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        while($v_a = mysqli_fetch_assoc($penghasilan)):
                                                    ?>
                                                        <option><?= $v_a['value'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- #data-ibu -->
                                    <div id="data-ibu">
                                        <div class="alert alert-info alert-message">
                                            Data Ibu Kandung
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Nama Ibu Kandung
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" name="nama_ibu" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                NIK Ibu
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" name="nik_ibu" class="form-control" maxlength="16" minlength="16">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Tahun Lahir
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" name="tl_ibu" class="form-control" maxlength="4" minlength="4">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Pendidikan
                                            </label>
                                            <div class="col-md-10">
                                                <select name="pendidikan_ibu" class="form-control opsi">
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        $pendidikan_ibu = mysqli_query($master, "SELECT * FROM pendidikan");
                                                        while($p = mysqli_fetch_assoc($pendidikan_ibu)):
                                                    ?>
                                                        <option><?= $p['pendidikan'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Pekerjaan
                                            </label>
                                            <div class="col-md-10">
                                                <select name="pekerjaan_ibu" class="form-control opsi">
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        $pekerjaan_ibu = mysqli_query($master, "SELECT * FROM pekerjaan");
                                                        while($pkj_i = mysqli_fetch_assoc($pekerjaan_ibu)):
                                                    ?>
                                                        <option><?= $pkj_i['pekerjaan'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Penghasilan Bulanan
                                            </label>
                                            <div class="col-md-10">
                                                <select name="penghasilan_ibu" class="form-control opsi">
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        $penghasilan_ibu = mysqli_query($master, "SELECT * FROM penghasilan");
                                                        while($v_i = mysqli_fetch_assoc($penghasilan_ibu)):
                                                    ?>
                                                        <option><?= $v_i['value'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end #data-ibu -->

                                    <!-- #data-wali -->
                                    <div class="form-group row">
                                        <label class="col-md-2">
                                            Punya Wali ?
                                        </label>
                                        <div class="col-md-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="punya_wali" id="inlineRadio10" onclick="wali(0)" value="Ya" required>
                                                <label class="form-check-label" for="inlineRadio10">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="punya_wali" id="inlineRadio11" onclick="wali(1)" value="Tidak" required>
                                                <label class="form-check-label" for="inlineRadio11">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wali" style="display:none;">
                                        <div class="alert alert-info alert-message">
                                            Data Wali
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Nama Wali
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" id="nm_w" name="nama_wali" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                NIK Wali
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" id="nik_w" name="nik_wali" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Tahun Lahir
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" id="tl_w" name="tl_wali" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Pendidikan
                                            </label>
                                            <div class="col-md-10">
                                                <select name="pendidikan_wali" id="pnd_w" class="form-control opsi">
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        $pendidikan_wali = mysqli_query($master, "SELECT * FROM pendidikan");
                                                        while($p_w = mysqli_fetch_assoc($pendidikan_wali)):
                                                    ?>
                                                        <option><?= $p_w['pendidikan']?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Wajib Pilih Salah Satu
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Pekerjaan
                                            </label>
                                            <div class="col-md-10">
                                                <select name="pekerjaan_wali" class="form-control opsi" id="pkr_w">
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        $pekerjaan_wali = mysqli_query($master, "SELECT * FROM pekerjaan");
                                                        while($pkr_w = mysqli_fetch_assoc($pekerjaan_wali)):
                                                    ?>
                                                        <option><?= $pkr_w['pekerjaan']?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Wajib Pilih Salah Satu
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">
                                                Penghasilan Bulanan
                                            </label>
                                            <div class="col-md-10">
                                                <select name="penghasilan_wali" id="pg_w" class="form-control opsi">
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        $penghasilan_wali = mysqli_query($master, "SELECT * FROM penghasilan");
                                                        while($pgs_w = mysqli_fetch_assoc($penghasilan_wali)):
                                                    ?>
                                                        <option><?= $pgs_w['value']?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="periodik">
                                        <div class="alert alert-info alert-message">
                                            DATA PRIODIK
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Tinggi Badan
                                            </label>
                                            <div class="col-md-2">
                                                <input type="text" name="tinggi" class="form-control" required>
                                            </div>
                                            <div class="col-md-2">
                                                cm
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Berat Badan
                                            </label>
                                            <div class="col-md-2">
                                                <input type="text" name="berat" class="form-control" required>
                                            </div>
                                            <div class="col-md-2">
                                                kg
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Jarak Tempat Tinggal Ke Sekolah
                                            </label>
                                            <div class="col-md-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jarak_sekolah" onclick="j_skl(1)" id="jarak1" value="Kurang dari 1 km" required>
                                                    <label class="form-check-label" for="jarak1">Kurang dari 1 km</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jarak_sekolah" onclick="j_skl(2)" id="jarak2" value="Lebih dari 1 km" required>
                                                    <label class="form-check-label" for="jarak2">Lebih dari 1 km</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="kilo" style="display:none;">
                                            <div class="form-group row">
                                                <label for="" class="col-md-2">
                                                    Sebutkan Dalam Kilo meter
                                                </label>
                                                <div class="col-md-2">
                                                    <input type="text" id="sebut" name="jarak" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    km
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Waktu tempuh ke sekolah
                                            </label>
                                            <div class="col-md-2">
                                                <input type="text" name="jam" class="form-control" id="sebut" onkeypress="return goodchars(this,'0123456789',event)" required>
                                            </div>
                                            <div class="col-md-1">
                                                Jam
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="menit" class="form-control" id="sebut" onkeypress="return goodchars(this,'0123456789',event)" required>
                                            </div>
                                            <div class="col-md-1">
                                                Menit
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Jumlah Saudara Kandung
                                            </label>
                                            <div class="col-md-2">
                                                <input type="text" name="jumlah_saudara" onkeypress="return goodchars(this,'0123456789',event)" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="registrasi_siswa">
                                        <div class="alert alert-info alert-message">
                                            REGISTRASI PESERTA DIDIK
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Jurusan
                                            </label>
                                            <div class="col-md-10">
                                                <select name="jurusan" class="form-control opsi" required>
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        while($kj = mysqli_fetch_assoc($kejuruan)):
                                                    ?>
                                                        <option><?= $kj['nama_jurusan']?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Jenis Pendaftaran
                                            </label>
                                            <div class="col-md-10">
                                                <select name="jenis_pendaftaran" class="form-control opsi" required>
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        $jenis_pendaftaran = mysqli_query($master, "SELECT * FROM jenis_pendaftaran");

                                                        while($j_p = mysqli_fetch_assoc($jenis_pendaftaran)):
                                                    ?>
                                                        <option><?= $j_p['jenis'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Cita-Cita
                                            </label>
                                            <div class="col-md-10">
                                                <select name="cita_cita" class="form-control opsi" required>
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        while($ct = mysqli_fetch_assoc($cita_cita)):
                                                    ?>
                                                        <option><?= $ct['cita_cita']?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Hobby
                                            </label>
                                            <div class="col-md-10">
                                                <select name="hobi" class="form-control opsi" required>
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php
                                                        while($hb = mysqli_fetch_assoc($hobby)):
                                                    ?>
                                                        <option><?= $hb['hobby']?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-md-2">
                                                Asal Sekolah
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" name="asal_sekolah" class="form-control" required>
                                                <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $tanggal = date('d-m-Y');
                                        $batas = date('d-m-Y', strtotime($apl['batas_pengisian']));
                                        $end = new DateTime($batas);
                                        $date = new DateTime($tanggal);
                                        if($date >= $end)
                                        {
                                            ?>
                                                <button class="btn btn-success" name="cutoff" type="submit">Kirim Data Formulir</button>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <button class="btn btn-success" name="kirim" type="submit">Kirim Data Formulir</button>
                                            <?php
                                        }
                                    ?>
                                </form>
                            <?php
                        }else{
                            ?>
                                <div class="text-center">
                                    <h1 class="fas fa-check-circle text-success"></h1>
                                    <h3>Anda Sudah Melakukan Pengisian Formulir Siswa</h3>
                                    <p>Data Anda Sudah Masuk Ke dalam sistem kami dan akan segera di verifikasi oleh admin sekolah. Jika ada perubahan data silahkan perbaiki di laman Edit Data Formulir. Terima Kasih</p>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>