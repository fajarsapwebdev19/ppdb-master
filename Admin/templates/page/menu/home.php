<div class="container-fluid p-0">

    <!-- Title -->

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Dashboard</h3>
        </div>
    </div>

    <!-- End Title -->

    <!-- Jumlah User -->

    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Admin</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                        $admin = mysqli_query($koneksi, "SELECT * FROM admin");
                        echo mysqli_num_rows($admin);
                        ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Calon Siswa</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                        $user = mysqli_query($koneksi, "SELECT * FROM user");
                        echo mysqli_num_rows($user);
                        ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Siswa Diterima</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="fas fa-user-check"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                        $approve = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE status_approval='Terima'");
                        echo mysqli_num_rows($approve);
                        ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Siswa Ditolak</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="fas fa-user-times"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                        $reject = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE status_approval='Tolak'");
                        echo mysqli_num_rows($reject);
                        ?>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h5 class="text-white">Jumlah Calon Siswa Perjurusan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Jurusan</th>
                                        <th>L</th>
                                        <th>P</th>
                                        <th>Keseluruhan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $tb_jurusan = mysqli_query($master, "SELECT * FROM kejuruan");
                                        while($jurusan = mysqli_fetch_assoc($tb_jurusan)):
                                    ?>
                                        <tr class="text-center">
                                            <td><?= $no++; ?></td>
                                            <td><?= $jurusan['nama_jurusan']; ?></td>
                                            <td>
                                                <?php
                                                    $j = $jurusan['nama_jurusan'];
                                                    $l = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE jenis_kelamin='Laki-Laki' AND jurusan='$j'");
                                                    $lk = mysqli_num_rows($l);
                                                    echo $lk;
                                                ?>
                                            </td>
                                            <td>
                                            <?php
                                                $j = $jurusan['nama_jurusan'];
                                                $p = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE jenis_kelamin='Perempuan' AND jurusan='$j'");
                                                $pr = mysqli_num_rows($p);
                                                echo $pr;
                                            ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $j = $jurusan['nama_jurusan'];
                                                    $kj = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE jurusan='$j'");
                                                    $kjrn = mysqli_num_rows($kj);
                                                    echo $kjrn;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-md-6 -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h5 class="text-white">Rekap Data Proses Pendaftaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Status Verifikasi</th>
                                        <th>Antrian</th>
                                        <th>Tolak</th>
                                        <th>Terima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Pengisian Formulir</td>
                                        <td class="text-center">
                                            <?php
                                                $antrian_form = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE status_approval='Antrian'");
                                                $antri_frm = mysqli_num_rows($antrian_form);
                                                echo $antri_frm;
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $rej_form = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE status_approval='Tolak'");
                                                $rej_frm = mysqli_num_rows($rej_form);
                                                echo $rej_frm;
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $aprov_form = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE status_approval='Terima'");
                                                $ap_frm = mysqli_num_rows($aprov_form);
                                                echo $ap_frm;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Verifikasi Berkas KK</td>
                                        <td class="text-center">
                                            <?php
                                                $antr_kk = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_kk='Antrian'");
                                                echo mysqli_num_rows($antr_kk);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $rej_kk = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_kk='Tolak'");
                                                echo mysqli_num_rows($rej_kk);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $app_kk = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_kk='Terima'");
                                                echo mysqli_num_rows($app_kk);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>Verifikasi Berkas Akta</td>
                                        <td class="text-center">
                                            <?php
                                                $antr_akta = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_akta='Antrian'");
                                                echo mysqli_num_rows($antr_akta);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $rej_akta = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_akta='Tolak'");
                                                echo mysqli_num_rows($rej_akta);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $app_akta = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_akta='Terima'");
                                                echo mysqli_num_rows($app_akta);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>Verifikasi Berkas Ijazah</td>
                                        <td class="text-center">
                                            <?php
                                                $antr_ijazah = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_ijazah='Antrian'");
                                                echo mysqli_num_rows($antr_ijazah);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $rej_ijazah = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_ijazah='Tolak'");
                                                echo mysqli_num_rows($rej_ijazah);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $app_ijazah = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_ijazah='Terima'");
                                                echo mysqli_num_rows($app_ijazah);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td>Verifikasi Foto Siswa</td>
                                        <td class="text-center">
                                            <?php
                                                $antr_foto = mysqli_query($koneksi, "SELECT * FROM foto_siswa WHERE status_verifikasi='Antrian'");
                                                echo mysqli_num_rows($antr_foto);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $rej_foto = mysqli_query($koneksi, "SELECT * FROM foto_siswa WHERE status_verifikasi='Tolak'");
                                                echo mysqli_num_rows($rej_foto);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $app_foto = mysqli_query($koneksi, "SELECT * FROM foto_siswa WHERE status_verifikasi='Terima'");
                                                echo mysqli_num_rows($app_foto);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td>Verifikasi Berkas KIP</td>
                                        <td class="text-center">
                                            <?php
                                                $antr_kip = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_kip='Antrian'");
                                                echo mysqli_num_rows($antr_kip);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $rej_kip = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_kip='Tolak'");
                                                echo mysqli_num_rows($rej_kip);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $app_kip = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_kip='Terima'");
                                                echo mysqli_num_rows($app_kip);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td>Verifikasi Berkas KKS</td>
                                        <td class="text-center">
                                            <?php
                                                $antr_kks = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_kks='Antrian'");
                                                echo mysqli_num_rows($antr_kks);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $rej_kks = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_kks='Tolak'");
                                                echo mysqli_num_rows($rej_kks);
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $app_kks = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE status_verifikasi_kks='Terima'");
                                                echo mysqli_num_rows($app_kks);
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

        <!-- End Jumlah User -->
    </div>