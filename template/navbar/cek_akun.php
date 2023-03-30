<nav class="navbar navbar-expand-lg navbar-dark bg-<?= $data['warna_header'] ?> sticky-top">
  <a class="navbar-brand" href="#"><?= $data['judul_header'] ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="./">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=Reg">Registrasi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="?page=Cek">Cek Akun</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=Cont">Kontak</a>
      </li>
    </ul>
  </div>
  <form class="form-inline">
    <!-- <button class="form-control mr-sm-2 btn btn-info" type="search" placeholder="Search" aria-label="Search"> -->
    <a class="btn btn-<?= $data['warna_tombol_login']?> my-2 my-sm-0" href="login/">Login</a>
  </form>
</nav>