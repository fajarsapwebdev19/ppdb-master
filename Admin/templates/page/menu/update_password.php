<div class="container-fluid p-0">
    <!-- title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Update Password</h3>
        </div>
    </div>
    <!-- end title -->

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <!-- validasi -->
          <?php
            if(isset($_SESSION['validasi']) && $_SESSION['validasi'] !='')
            {
              echo $_SESSION['validasi'];
              unset($_SESSION['validasi']);
            }
          ?>
          <!-- end validasi -->
          <form action="../proses/update/password_user.php" id="update_password" method="post">
            <input type="hidden" name="username" value="<?= $data_admin['username']?>">
            <div class="form-group row mt-3">
              <label for="pass_lama" class="col-md-2 col-form-label">Password Lama</label>
              <div class="col-md-10">
                <input type="password" name="password_lama" id="pass_lama" class="form-control" required>
              </div>
            </div>
            <div class="form-group row mt-3">
              <label for="pass_baru" class="col-md-2 col-form-label">Password Baru</label>
              <div class="col-md-10">
                <input type="password" name="password_baru" id="pass_baru" class="form-control">
              </div>
            </div>
            <div class="form-group row mt-3">
              <label for="kon_pass_baru" class="col-md-2 col-form-label">Konfirmasi Password Baru</label>
              <div class="col-md-10">
                <input type="password" name="konfirmasi_password_baru" id="kon_pass_baru" class="form-control">
              </div>
            </div>
            <div class="form-group row mt-3">
              <label for="" class="col-md-2"></label>
              <div class="col-md-10">
                <button type="submit" name="update_password_admin" class="btn btn-success">Update Passsword</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>