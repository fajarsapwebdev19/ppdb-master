<div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-12">
            <h3>Upload Ijazah SMP</h3>

            <?php
                $username = $data_user['username'];
                $upload = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
                $status = mysqli_fetch_assoc($upload);

                if(empty($status['status_upload_ijazah']))
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
                elseif($status['status_upload_ijazah'] == "Belum")
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
                                    $batas = $apl['batas_pengisian'];
                                    $tanggal = date('Y-m-d');

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

                                <form action="../proses/upload/ijazah.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <img src="../assets/ilustration/Ijazah SMP.png" width="150">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Ijazah SMP</label>
                                        <input type="file" name="ijazah" class="form-control col-md-4" required>
                                        <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                                        <p>Ukuran Max 3MB, Ekstensi (png,jpg,jpeg,pdf)</p>
                                        <p>Note: Jika tidak ada ijazah smp bisa menggunakan surat keterangan lulus untuk sementara</p>
                                    </div>

                                    <div class="mb-3">
                                        <?php
                                            $tanggal = date('Y-m-d');
                                            $batas = $apl['batas_pengisian'];

                                            if($tanggal >= $batas)
                                            {
                                                ?>
                                                    <button type="submit" name="cutoff" class="btn btn-info"><em class="fas fa-upload"></em> Upload</button>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <button type="submit" name="upload_ijazah" class="btn btn-info"><em class="fas fa-upload"></em> Upload</button>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                }elseif($status['status_upload_ijazah'] == "Sudah")
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
                                    elseif(isset($_SESSION['val_update']) && $_SESSION['val_update'] !='')
                                    {
                                        echo $_SESSION['val_update'];
                                        unset($_SESSION['val_update']);
                                    }
                                ?>

                                <?php
                                    $batas = $apl['batas_pengisian'];
                                    $tanggal = date('Y-m-d');

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
                                        <img src="../assets/dokumen/berkas_siswa/ijazah/<?= $status['file_ijazah_smp']?>" width="150">
                                    </div>

                                    <?php
                                        $batas = $apl['batas_pengisian'];
                                        $tanggal = date('Y-m-d');

                                        if($tanggal >= $batas)
                                        {
                                            ?>
                                                 <div class="mb-3">
                                                    <button type="submit" class="btn btn-info mt-2" disabled><em class="fas fa-upload"></em> Upload</button>
                                                    <button disabled type="button" class="btn btn-primary mt-2"><em class="fas fa-edit"></em> Edit File</button>
                                                    <button disabled type="button" class="btn btn-danger mt-2"><em class="fas fa-trash"></em> Delete File</button>
                                                </div>
                                            <?php
                                        }else{
                                            ?>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-info mt-2" disabled><em class="fas fa-upload"></em> Upload</button>
                                                    <button type="button" data-bs-target="#edit_ijazah" data-bs-toggle="modal" class="btn btn-primary mt-2"><em class="fas fa-edit"></em> Edit File</button>
                                                    <button type="button" data-bs-target="#delete_ijazah" data-bs-toggle="modal" class="btn btn-danger mt-2"><em class="fas fa-trash"></em> Delete File</button>
                                                </div>
                                            <?php
                                        }
                                    ?>

                                    
                                </form>

                                <!-- modal update file ijazah -->

                                <div class="modal fade" id="edit_ijazah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Update File Ijazah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../proses/upload/update/ijazah.php" method="post" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <label>Ijazah SMP</label>
                                                        <input type="file" name="ijazah" class="form-control">
                                                        <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <div class="modal-footer">
                                                            <button type="submit" name="update_ijazah" class="btn btn-info">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal upadte file ijazah -->

                                <!-- modal delete file ijazah -->
                                <div class="modal fade" id="delete_ijazah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Delete File Ijazah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda Yakin Ingin Menghapus File Ijazah Anda Dan Akan Mengakibatkan Pengajuan Anda Menjadi dibatalkan ?
                                            </div>
                                            <div class="text-center mb-4">
                                                <form action="../proses/delete/ijazah.php" method="post">
                                                    <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                                                    <button type="submit" name="delete" class="btn btn-success">Ya, Hapus</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal delete file ijazah -->
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>