<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="sidebar-brand-text align-middle text-center">
                <h3 class="fas fa-user-edit text-white"> PPDB SMK </h3>
            </span>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    <?php
                        if(empty($data_admin['foto']))
                        {
                            if($data_admin['jenis_kelamin'] == "Laki-Laki")
                            {
                                ?>
                                    <img src="../Foto/foto_profile/man.png" class="avatar img-fluid rounded me-1" alt="<?= $data_admin['nama'] ?>">
                                <?php
                            }elseif($data_admin['jenis_kelamin'] == "Perempuan")
                            {
                                ?>
                                    <img src="../Foto/foto_profile/woman.png" class="avatar img-fluid rounded me-1" alt="<?= $data_admin['nama'] ?>">
                                <?php
                            }
                        }
                        else{
                            ?>
                                <img src="../Foto/foto_profile/<?= $data_admin['foto']?>" class="avatar img-fluid rounded me-1" alt="<?= $data_admin['nama'] ?>">
                            <?php
                        }
                    ?>
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title" href="#">
                        <?= $data_admin['nama'] ?>
                    </a>


                    <div class="sidebar-user-subtitle"><?= $data_admin['level'] ?></div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                <?= $data_admin['level'] ?>
            </li>

            <!-- Dashboard Menu -->
            <li class="sidebar-item <?php if(!$page){echo 'active';}?>">
                <a class="sidebar-link" href="./">
                    <i class="fas fa-home align-middle"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <!-- end Dashboard Menu -->

            <!-- Manajemen Akun Menu -->
            <li class="sidebar-item  <?php if($page == "acn_adm" || $page == "acn_sw"){echo 'active'; }?>">
                <a data-bs-target="#acount" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-user-lock align-middle"></i> <span class="align-middle">Manajemen Akun</span>
                </a>
                <ul id="acount" class="sidebar-dropdown list-unstyled collapse <?php if($page == "acn_adm" || $page == "acn_sw"){echo 'show'; }?>" data-bs-parent="#sidebar">
                    <li class="sidebar-item <?= ($page == "acn_adm") ? 'active' : ''; ?>"><a class="sidebar-link" href="?page=acn_adm">Admin</a></li>
                    <li class="sidebar-item <?= ($page == "acn_sw") ? 'active' : ''; ?>"><a class="sidebar-link" href="?page=acn_sw">Calon Siswa</a></li>
                </ul>
            </li>
            <!-- end Manajemen Menu -->

            <!-- Verifikasi Data Menu -->
            <li class="sidebar-item <?php if($page == "ver_form" || $page == "ver_file"){echo 'active'; }?>">
                <a data-bs-target="#verif" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-check"></i> <span class="align-middle">Verifikasi Data</span>
                </a>
                <ul id="verif" class="sidebar-dropdown list-unstyled collapse <?php if($page == "ver_form" || $page == "ver_file"){echo 'show'; }?>" data-bs-parent="#sidebar">
                    <li class="sidebar-item <?= ($page == "ver_form") ? 'active' : ''; ?>"><a class="sidebar-link" href="?page=ver_form">Pengisian Form Calon Siswa</a></li>
                    <li class="sidebar-item <?= ($page == "ver_file") ? 'active' : ''; ?>"><a class="sidebar-link" href="?page=ver_file">Berkas Calon Siswa</a></li>
                </ul>
            </li>
            <!-- end Verifikasi Data Menu -->

            <!-- Data Calon Siswa Menu -->
            <li class="sidebar-item <?= ($page == "calon") ? 'active' : '';?>">
                <a class="sidebar-link" href="?page=calon">
                    <i class="align-middle fas fa-user"></i> <span class="align-middle">Data Calon Siswa</span>
                </a>
            </li>
            <!-- end Data Calon Siswa Menu-->

            <!-- Approval Registrasi Akun Menu-->
            <li class="sidebar-item <?= ($page == "app_adm" || $page == "app_sw") ? 'active' : ''; ?>">
                <a data-bs-target="#approv" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-user-check"></i> <span class="align-middle">Approval Registrasi Akun</span>
                </a>
                <ul id="approv" class="sidebar-dropdown list-unstyled collapse <?= ($page == "app_adm" || $page == "app_sw") ? 'show' : ''; ?>" data-bs-parent="#sidebar">
                    <li class="sidebar-item <?= ($page == "app_adm") ? 'active' : ''; ?>"><a class="sidebar-link" href="?page=app_adm">Admin</a></li>
                    <li class="sidebar-item <?= ($page == "app_sw") ? 'active' : ''; ?>"><a class="sidebar-link" href="?page=app_sw">Calon Siswa</a></li>
                </ul>
            </li>
            <!-- end Registrasi Akun Menu -->

            <!-- Pengaturan Menu -->
            <li class="sidebar-item <?= ($page == "set_home" || $page == "set_apl" || $page == "set_log") ? 'active' : ''; ?>">
                <a data-bs-target="#pengaturan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-cog"></i> <span class="align-middle">Pengaturan</span>
                </a>
                <ul id="pengaturan" class="sidebar-dropdown list-unstyled collapse <?= ($page == "set_home" || $page == "set_apl" || $page == "set_log") ? 'show' : ''; ?>" data-bs-parent="#sidebar">
                    <li class="sidebar-item <?= ($page == "set_home") ? 'active' : ''; ?>"><a class="sidebar-link" href="?page=set_home">Halaman Awal</a></li>
                    <li class="sidebar-item <?= ($page == "set_apl") ? 'active' : ''; ?>"><a class="sidebar-link" href="?page=set_apl">Aplikasi</a></li>
                    <li class="sidebar-item <?= ($page == "set_log") ? 'active' : ''; ?>"><a class="sidebar-link" href="?page=set_log">Login</a></li>
                </ul>
            </li>
            <!-- end Pengaturan Menu -->
        </ul>
    </div>
</nav>