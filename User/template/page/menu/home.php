<div class="container-fluid p-0">

    <!-- Title -->

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Dashboard</h3>
        </div>
    </div>

    <!-- End Title -->

    <div class="row">
        <div class="col-sm-12">
            <div class="alert-success bg-success">
                <h2 class="text-white">Selamat Datang, <?= $data_user['nama'] ?></h2>
            </div>

            <div class="card">
                <div class="card-header">
                    Rekap Data Siswa Perjurusan
                </div>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Jurusan</th>
                                <th class="text-center">L</th>
                                <th class="text-center">P</th>
                                <th class="text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $kj = mysqli_query($master, "SELECT * FROM kejuruan");
                                $no = 1;
                                while($kjr = mysqli_fetch_assoc($kj)):
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $kjr['nama_jurusan'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                            $j = $kjr['nama_jurusan'];
                                            $l = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE jenis_kelamin='Laki-Laki' AND jurusan='$j'");
                                            echo mysqli_num_rows($l);
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                            $j = $kjr['nama_jurusan'];
                                            $p = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE jenis_kelamin='Perempuan' AND jurusan='$j'");
                                            echo mysqli_num_rows($p);
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                            $j = $kjr['nama_jurusan'];
                                            $all = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE jurusan='$j'");
                                            echo mysqli_num_rows($all);
                                        ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Progress Pendaftaran
                </div>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Kegiatan</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Pengisian Formulir</td>
                                <td class="text-center">
                                    <?php 
                                        $username = $data_user['username'];
                                        $frm = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE username='$username'");
                                        $frm_sts = mysqli_fetch_assoc($frm);

                                        if(empty($frm_sts['status_isi']))
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                        elseif($frm_sts['status_isi'] == "Sudah")
                                        {
                                            ?>
                                                <em class="fas fa-check-circle text-success"></em>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>Upload Kartu Keluarga</td>
                                <td class="text-center">
                                    <?php 
                                        $username = $data_user['username'];
                                        $up = mysqli_query($koneksi, "SELECT * FROM berkas_siswa INNER JOIN foto_siswa USING(username)
                                        WHERE (username = '$username')");
                                        $upl = mysqli_fetch_assoc($up);

                                        if(empty($upl['status_upload_kk']))
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload_kk'] == "Sudah")
                                        {
                                            ?>
                                                <em class="fas fa-check-circle text-success"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload_kk'] == "Belum")
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Upload Ijazah SMP</td>
                                <td class="text-center">
                                    <?php 
                                        if(empty($upl['status_upload_ijazah']))
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload_ijazah'] == "Sudah")
                                        {
                                            ?>
                                                <em class="fas fa-check-circle text-success"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload_ijazah'] == "Belum")
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>Upload Akta Lahir</td>
                                <td class="text-center">
                                    <?php

                                        if(empty($upl['status_upload_akta']))
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload_akta'] == "Sudah")
                                        {
                                            ?>
                                                <em class="fas fa-check-circle text-success"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload_akta'] == "Belum")
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>Upload Kartu Indonesia Pintar</td>
                                <td class="text-center">
                                    <?php

                                        if(empty($upl['status_upload_kip']))
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload_kip'] == "Sudah")
                                        {
                                            ?>
                                                <em class="fas fa-check-circle text-success"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload_kip'] == "Belum")
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>Upload Kartu Keluarga Sejahtera</td>
                                <td class="text-center">
                                    <?php

                                        if(empty($upl['status_upload_kks']))
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload_kks'] == "Sudah")
                                        {
                                            ?>
                                                <em class="fas fa-check-circle text-success"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload_kks'] == "Belum")
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td>Upload Foto Siswa</td>
                                <td class="text-center">
                                    <?php

                                        if(empty($upl['status_upload']))
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload'] == "Sudah")
                                        {
                                            ?>
                                                <em class="fas fa-check-circle text-success"></em>
                                            <?php
                                        }
                                        elseif($upl['status_upload'] == "Belum")
                                        {
                                            ?>
                                                <em class="fas fa-times-circle text-danger"></em>
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

    