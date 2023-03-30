<div class="mt-4">
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>SELAMAT DATANG DI <?= $data['judul_header']?></h1>
            <p class="lead">Jika Anda Ingin Mendaftar Silahkan Registrasi Atau Klik Tombol Di Bawah Ini</p>
            <hr class="my-4">
            <p><a href="?page=Reg" class="btn btn-primary">Registrasi</a></p>
        </div>

        <div class="container">
            <h3 class="text-left">Alur Registrasi Akun Siswa Baru</h3>
            <div class="mt-3"></div>
            <div class="row">
                <div class="col-md-8">
                    <?= $data['alur_registrasi_casis'] ?>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

        <div class="container">
            <h3 class="text-left">Alur Registrasi Akun Admin PPDB</h3>
            <div class="mt-3"></div>
            <div class="row">
                <div class="col-md-8">
                    <?= $data['alur_registrasi_admin'] ?>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</div>
<!-- modal info -->
<div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content modal-dialog-scrollable">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info Admin PPDB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= $apl['info_admin']?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal info -->
<script src="assets/jquery-3.5.1.min.js"></script>
<script src="assets/halaman_awal/bootstrap/js/bootstrap.min.js"></script>
<script>
    <?php
        if($apl['info_admin'] == "")
        {
            ?>
                $(document).ready(function(){
                    $("#info").modal('hide');
                });
            <?php
        }else{
            ?>
                $(document).ready(function(){
                    $("#info").modal('show');
                });
            <?php
        }
    ?>
</script>