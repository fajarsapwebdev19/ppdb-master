<div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-12">
            <h3>Upload Foto Siswa</h3>

            <?php
               $username = $data_user['username'];
               $foto = mysqli_query($koneksi, "SELECT * FROM foto_siswa WHERE username='$username'");
               $status = mysqli_fetch_assoc($foto);

               if(empty($status['status_upload']))
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
               elseif($status['status_upload'] == "Belum")
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
                                    $batas = $apl['batas_pengisian'];

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
                                <form action="../proses/upload/foto.php" class="needs-validation" enctype="multipart/form-data" method="post" novalidate>
                                    <div class="mb-3">
                                        <img src="../assets/ilustration/ft.png" width="150">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Foto</label>
                                        <input type="file" name="foto" class="col-md-4 form-control" required>
                                        <input type="hidden" name="username" value="<?= $status['username']?>">
                                        <p>Ukuran File max 3MB, Ektensi Hanya Mendukung jpg,jpeg,png</p>
                                    </div>
                                    <div class="form-group mb-3">
                                        <?php
                                            $batas = $apl['batas_pengisian'];
                                            $tanggal = date('Y-m-d');

                                            if($tanggal >= $batas)
                                            {
                                                ?>
                                                    <button type="submit" name="cutoff" class="btn btn-info"><em class="fas fa-upload"></em> Upload</button>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                    <button type="submit" name="upload_foto" class="btn btn-info"><em class="fas fa-upload"></em> Upload</button>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                   <?php
               }
               elseif($status['status_upload'] == "Sudah")
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
                                    $batas = $apl['batas_pengisian'];

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
                                <div class="alert alert-success bg-success text-white">
                                    <div class="alert-message">
                                        Sudah Melakukan Upload File
                                    </div>
                                </div>
                                <form action="/" class="needs-validation" enctype="multipart/form-data" method="post" novalidate>
                                    <div class="mb-3">
                                        <img src="../assets/dokumen/foto_siswa/<?= $status['foto'] ?>" width="150">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Foto</label>
                                        <input type="file" name="foto" disabled class="col-md-4 form-control" required>
                                        <input type="hidden" name="username" value="<?= $status['foto']?>">
                                        <p>Ukuran File max 3MB, Ektensi Hanya Mendukung jpg,jpeg,png</p>
                                    </div>
                                    <?php
                                        $tanggal = date('Y-m-d');
                                        $batas = $apl['batas_pengisian'];

                                        if($tanggal >= $batas){
                                            ?>
                                                <div class="form-group mb-3">
                                                    <button type="button" class="btn btn-info mt-2" disabled><em class="fas fa-upload"></em> Upload</button>
                                                    <button disabled type="button" class="btn btn-primary mt-2"><em class="fas fa-edit"></em> Edit File</button>
                                                    <button disabled type="button" class="btn btn-danger mt-2"><em class="fas fa-trash"></em> Delete File</button>
                                                </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <div class="form-group mb-3">
                                                    <button type="button" class="btn btn-info mt-2" disabled><em class="fas fa-upload"></em> Upload</button>
                                                    <button type="button" data-bs-target="#edit_foto" data-bs-toggle="modal" class="btn btn-primary mt-2"><em class="fas fa-edit"></em> Edit File</button>
                                                    <button type="button" data-bs-target="#delete_foto" data-bs-toggle="modal" class="btn btn-danger mt-2"><em class="fas fa-trash"></em> Delete File</button>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </form>

                                <!-- modal update foto siswa -->
                                <div class="modal fade" id="edit_foto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Update Foto Siswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../proses/upload/update/foto.php" method="post" enctype="multipart/form-data">
                                                    <div class="mb-2">
                                                        <label>
                                                            Foto Siswa
                                                        </label>
                                                        <input type="file" name="foto" class="form-control">
                                                        <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="update" class="btn btn-success">Update</button>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal update foto_siswa -->
                                <!-- modal delete foto_siswa -->
                                <div class="modal fade" id="delete_foto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Delete Foto Siswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda Yakin Ingin Menghapus File Foto Siswa Anda Dan Akan Mengakibatkan Pengajuan Anda Menjadi dibatalkan ?
                                            </div>
                                            <div class="text-center mb-4">
                                                <form action="../proses/delete/foto.php" method="post">
                                                    <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                                                    <button type="submit" name="delete" class="btn btn-success">Ya, Hapus</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal delete foto_siswa -->
                            </div>
                        </div>
                   <?php
               }
            ?>
        </div>
    </div>
</div>