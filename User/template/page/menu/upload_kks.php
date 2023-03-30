<div class="container-fluid p-0">
  <div class="row">
    <div class="col-md-12">
      <h3>Upload KKS (Kartu Keluarga Sejahtera)</h3>

      <?php
        $username = $data_user['username'];
        $upload = mysqli_query($koneksi, "SELECT * FROM berkas_siswa WHERE username='$username'");
        $status = mysqli_fetch_assoc($upload);

        if(empty($status['status_upload_kks']))
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
        elseif($status['status_upload_kks'] == "Belum")
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
                  function data($apl){
                    global $batas;
                    global $tanggal;
                    $batas = $apl['batas_pengisian'];
                    $tanggal = date('Y-m-d');
                  }

                  echo data($apl);

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
                <form action="../proses/upload/kks.php" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <img src="../assets/ilustration/KKS.png" width="150">
                  </div>

                  <div class="mb-3">
                    <label for="">
                      KKS
                    </label>
                    <input type="file" name="kks" class="form-control col-md-4">
                    <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                  </div>

                  <div class="mb-3">
                    <?php
                      echo data($apl);

                      if($tanggal >= $batas)
                      {
                        ?>
                          <button type="submit" name="cutoff" class="btn btn-info"><em class="fas fa-upload"></em> Upload</button>
                        <?php
                      }else{
                        ?>
                          <button type="submit" name="upload_kks" class="btn btn-info"><em class="fas fa-upload"></em> Upload</button>
                        <?php
                      }
                    ?>
                  </div>
                </form>
              </div>
            </div>
          <?php
        }
        elseif($status['status_upload_kks'] == "Sudah")
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
                  function data($apl){
                    global $batas;
                    global $tanggal;
                    $batas = $apl['batas_pengisian'];
                    $tanggal = date('Y-m-d');
                  }
                  echo data($apl);

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
                <form action="/" method="post">
                  <div class="mb-3">
                    <?php
                      if(empty($status['file_kks']))
                      {
                        ?>
                          <img src="../assets/ilustration/KKS.png" width="150">
                        <?php
                      }else{
                        ?>
                          <img src="../assets/dokumen/berkas_siswa/kks/<?= $status['file_kks']?>" width="150">
                        <?php
                      }
                    ?>
                  </div>

                  <div class="mb-3">
                    <label>KKS</label>
                    <input type="file" name="kks" class="form-control col-md-4" disabled>
                  </div>

                  <?php
                    echo data($apl);

                    if($tanggal >= $batas)
                    {
                      ?>
                        <div class="mb-3">
                          <button type="submit" class="btn btn-info" disabled><em class="fas fa-upload"></em> Upload</button>
                          <button disabled type="button" class="btn btn-primary"><em class="fas fa-edit"></em> Edit File</button>
                          <button disabled type="button" class="btn btn-danger"><em class="fas fa-trash"></em> Delete File</button>
                        </div>
                      <?php
                    }else{
                      ?>
                        <div class="mb-3">
                          <button type="submit" class="btn btn-info" disabled><em class="fas fa-upload"></em> Upload</button>
                          <button type="button" data-bs-target="#edit_kks" data-bs-toggle="modal" class="btn btn-primary"><em class="fas fa-edit"></em> Edit File</button>
                          <button type="button" data-bs-target="#delete_kks" data-bs-toggle="modal" class="btn btn-danger"><em class="fas fa-trash"></em> Delete File</button>
                        </div>
                      <?php
                    }
                  ?>
                </form>

                <!-- modal update file kks -->
                <div class="modal fade" id="edit_kks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update File Kartu Keluarga Sejahtera</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="../proses/upload/update/kks.php" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                          <div class="mb-2">
                            <label for="">
                              Kartu Keluarga Sejahtera
                            </label>
                            <input type="file" name="kks" class="form-control">
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-info">Update</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end modal update file kks -->

                <!-- modal delete file kks -->
                <div class="modal fade" id="delete_kks" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete File Kartu Keluarga Sejahtera</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah Anda Yakin Ingin Menghapus File KKS Anda Dan Akan Mengakibatkan Pengajuan Anda Menjadi dibatalkan ?
                      </div>
                      <div class="text-center mb-4">
                        <form action="../proses/delete/kks.php" method="post">
                          <input type="hidden" name="username" value="<?= $data_user['username'] ?>">
                          <button type="submit" name="hapus" class="btn btn-success">Ya, Hapus</button>
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end modal delete file kks -->
              </div>
            </div>
          <?php
        }
      ?>
    </div>
  </div>
</div>