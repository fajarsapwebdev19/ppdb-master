<div class="container-fluid p-0">

    <!-- Title -->

    <div class="row mb-2 mb-xl-3">
        <div class="title">
            <h3>Status Upload KIP (Kartu Indonesia Pintar)</h3>
            <?php
                $username = $data_user['username'];
                $berkas = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
                $status = mysqli_fetch_assoc($berkas);
            ?>
        </div>

        <div class="card">
            <div class="card-body">
                <?php
                    if(empty($status['file_kip']))
                    {
                        ?>
                            <div class="alert alert-danger text-white bg-danger">
                                <div class="alert-message">
                                    Belum Melakukan Upload
                                </div>
                            </div>
                        <?php
                    }else{
                        ?>
                            <table width='35%'>
                                <tr>
                                    <td><em class="fas fa-upload"></em> Upload KIP</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                            if($status['status_upload_kip'] == "Belum")
                                            {
                                                ?>
                                                    <span class="badge badge-danger">Belum</span>
                                                <?php
                                            }
                                            elseif($status['status_upload_kip'] == "Sudah")
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
                                            if($status['status_verifikasi_kip'] == "Antrian")
                                            {
                                                ?>
                                                    <span class="badge bg-warning">
                                                        Antrian
                                                    </span>
                                                <?php
                                            }
                                            elseif($status['status_verifikasi_kip'] == "Terima")
                                            {
                                                ?>
                                                    <span class="badge bg-success">
                                                        Terima
                                                    </span>
                                                <?php
                                            }
                                            elseif($status['status_verifikasi_kip'] == "Tolak")
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
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>