<div class="container-fluid p-0">

    <!-- Title -->

    <div class="row mb-2 mb-xl-3">
        <div class="title">
            <h3>Status Pengisian Formulir Siswa</h3>
            <?php
                $username = $data_user['username'];
                $form = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE username='$username'");
                $status = mysqli_fetch_assoc($form);
            ?>
        </div>

        <div class="card">
            <div class="card-body">
                <?php
                    if(empty($status))
                    {
                        ?>
                            <div class="alert alert-danger bg-danger text-white">
                                <div class="alert-message">
                                    <em class="fas fa-exchange"></em> Anda Belum Melakukan Pengisian Formulir Siswa
                                </div>
                            </div>
                        <?php
                    }else{
                        ?>
                            <table width='25%'>
                                <tr>
                                    <td><em class="fas fa-edit"></em> Pengisian Formulir</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                            if(empty($status['status_isi']))
                                            {
                                                ?>
                                                    <span class="badge badge-danger">Belum</span>
                                                <?php
                                            }
                                            elseif($status['status_isi'] == "Sudah")
                                            {
                                                ?>
                                                    <span class="badge badge-success">Sudah</span>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><em class="fas fa-user-check"></em> Status Approval Admin</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                            if($status['status_approval'] == "Antrian")
                                            {
                                                ?>
                                                    <span class="badge bg-warning">
                                                        Antrian
                                                    </span>
                                                <?php
                                            }
                                            elseif($status['status_approval'] == "Terima")
                                            {
                                                ?>
                                                    <span class="badge bg-success">
                                                        Terima
                                                    </span>
                                                <?php
                                            }
                                            elseif($status['status_approval'] == "Tolak")
                                            {
                                                ?>
                                                    <span class="badge bg-danger">
                                                        Tolak
                                                    </span>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </table>

                            <div class="mt-3">
                                <?php
                                    if($status['status_approval'] == "Terima")
                                    {
                                        ?>
                                            <form action="../proses/cetak/form.php" method="post">
                                                <input type="hidden" name="username" value="<?= $data_user['username']?>">
                                                <button name="print" class="btn btn-success bg-success text-white">
                                                    <em class="fas fa-download"></em> Download Formulir Siswa
                                                </button>
                                            </form>
                                            <p class="mt-3">
                                                Note : Silahkan Download Formulir Tersebut Dan Cetak kemudian tanda tangan orang tua dan bawa kesekolah sebagai bukti pendaftaran.
                                            </p>
                                        <?php
                                    }
                                    elseif($status['status_approval'] == "Tolak")
                                    {
                                        ?>
                                            <p>
                                                Alasan Penolakan : <?= $status['keterangan_tolak']; ?> 
                                            </p>
                                        <?php
                                    }
                                ?>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>

</div>