<div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-12">
            <h3>Upload Akta Lahir</h3>

            <?php
                $username = $data_user['username'];
                $upload = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
                $status = mysqli_fetch_assoc($upload);

                if(empty($status['status_upload_akta']))
                {
                    ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <h1 class="fas fa-times-circle text-danger"></h1>
                                    <h2>Anda Belum Melakukan Pengisian Formulir Peserta</h2>
                                    <p>Silahkan lakukan pengisian formulir siswa dengan data yang lengkap agar halaman upload terbuka.</p>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                elseif($status['status_upload_akta'] == "Belum")
                {
                    ?>
                        <div class="card">
                            <div class="card-body">
                               
                                <?php
                                    if(isset($_SESSION['val']) && $_SESSION['val'] !='')
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

                                <form action="../proses/upload/akta_lahir.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <img src="../assets/ilustration/akta.jpg" width="150">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Akta Lahir</label>
                                        <input type="file" name="akta" class="form-control col-md-4" required>
                                        <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                                        <p>Ukuran Max 3MB, Ekstensi (png,jpg,jpeg,pdf)</p>
                                        <p>Note: Jika tidak ada akta bisa menggunakan surat keterangan lahir</p>
                                    </div>

                                    <div class="mb-3">
                                        <?php
                                            $batas = $apl['batas_pengisian'];
                                            $tanggal = date('Y-m-d');
                                            $date = new DateTime($tanggal);
                                            $end = new DateTime($batas);

                                            if($date >= $end)
                                            {
                                                ?>
                                                    <button type="submit" name="cutoff" class="btn btn-info"><em class="fas fa-upload"></em> Upload</button>
                                                <?php
                                            }else{
                                                ?>
                                                    <button type="submit" name="upload_akta" class="btn btn-info"><em class="fas fa-upload"></em> Upload</button>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                }elseif($status['status_upload_akta'] == "Sudah")
                {
                    ?>
                         <div class="card">
                            <div class="card-body">

                                <?php
                                    if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                                    {
                                        echo $_SESSION['val'];
                                        unset($_SESSION['val']);
                                    }
                                ?>

                                <?php
                                    $tanggal = date('Y-m-d');
                                    $batas  = $apl['batas_pengisian'];

                                    if($tanggal >= $batas)
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

                                <div class="alert alert-success text-white bg-success">
                                    <div class="alert-message">
                                        Sudah Melakukan Upload File
                                    </div>
                                </div>

                                <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <img src="../assets/dokumen/berkas_siswa/akta/<?= $status['file_akta']?>" width="150">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Akta Lahir</label>
                                        <input type="file" name="akta" class="form-control col-md-4" disabled required>
                                        <p>Ukuran Max 3MB, Ekstensi (png,jpg,jpeg,pdf)</p>
                                        <p>Note: Jika tidak ada akta bisa menggunakan surat keterangan lahir</p>
                                    </div>

                                    <?php
                                        $batas = $apl['batas_pengisian'];
                                        $tanggal = date('Y-m-d');
                                        $date = new DateTime($tanggal);
                                        $end = new DateTime($batas);
                                        if($date >= $end)
                                        {
                                            ?>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-info mt-2" disabled><em class="fas fa-upload"></em> Upload</button>
                                                    <button disabled type="button" class="btn btn-primary mt-2"><em class="fas fa-edit"></em> Edit File</button>
                                                    <button disabled type="button" class="btn btn-danger mt-2"><em class="fas fa-trash"></em> Delete File</button>
                                                </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-info mt-2" disabled><em class="fas fa-upload"></em> Upload</button>
                                                    <button type="button" data-bs-target="#edit_akta" data-bs-toggle="modal" class="btn btn-primary mt-2"><em class="fas fa-edit"></em> Edit File</button>
                                                    <button type="button" data-bs-target="#delete_akta" data-bs-toggle="modal" class="btn btn-danger mt-2"><em class="fas fa-trash"></em> Delete File</button>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </form>

                                <!-- modal update akta -->
                                <div class="modal fade" id="edit_akta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Update File Akta Lahir</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../proses/upload/update/akta.php" method="post" enctype="multipart/form-data">
                                                    <div class="mb-2">
                                                        <label for="">Akta Lahir</label>
                                                        <input type="file" name="akta" class="form-control">
                                                        <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                                                    </div>
                                                    <div class="mb-2">
                                                        <div class="modal-footer">
                                                            <button type="submit" name="update" class="btn btn-info">Update</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal update akta -->
                                <!-- modal delete file akta -->
                                <div class="modal fade" id="delete_akta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Delete File Akta Lahir</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda Yakin Ingin Menghapus File Akta Anda Dan Akan Mengakibatkan Pengajuan Anda Menjadi dibatalkan ?
                                            </div>
                                            <div class="text-center mb-4">
                                                <form action="../proses/delete/akta.php" method="post">
                                                    <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                                                    <button type="submit" name="delete" class="btn btn-success">Ya, Hapus</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal delete file akta -->
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>