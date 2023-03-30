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
                        if(empty($data_user['foto']))
                        {
                            if($data_user['jenis_kelamin'] == "Laki-Laki")
                            {
                                ?>
                                    <img src="../Foto/foto_profile/man.png" class="avatar img-fluid rounded me-1" alt="<?= $data_user['nama'] ?>">
                                <?php
                            }elseif($data_user['jenis_kelamin'] == "Perempuan")
                            {
                                ?>
                                    <img src="../Foto/foto_profile/woman.png" class="avatar img-fluid rounded me-1" alt="<?= $data_user['nama'] ?>">
                                <?php
                            }
                        }
                        else{
                            ?>
                                <img src="../Foto/foto_profile/<?= $data_user['foto']?>" class="avatar img-fluid rounded me-1" alt="<?= $data_user['nama'] ?>">
                            <?php
                        }
                    ?>
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title" href="#">
                        <?= $data_user['nama'] ?>
                    </a>


                    <div class="sidebar-user-subtitle"><?= $data_user['level'] ?></div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                <?= $data_user['level'] ?>
            </li>

            <!-- Dashboard Menu -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="../User/">
                    <i class="fas fa-home align-middle"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <!-- end Dashboard Menu -->

            <!-- Isi Formulir -->
            <li class="sidebar-item">
                <a data-bs-target="#create_form" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-user-edit align-middle"></i> <span class="align-middle">Isi Formulir</span>
                </a>
                <ul id="create_form" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=frm_pdftrn">Formulir Pendaftaran Siswa</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=edt_dt">Edit Data Formulir</a></li>
                    <li class="sidebar-iteme"><a class="sidebar-link" href="?page=sts_isi">Status Pengisian</a></li>
                </ul>
            </li>
            <!-- end Isi Formulir -->

            <!-- Upload Berkas -->
            <li class="sidebar-item">
                <a data-bs-target="#verif" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-upload"></i> <span class="align-middle">Upload Berkas</span>
                </a>
                <ul id="verif" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=up_kk">Upload KK</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=up_akta">Upload Akta Lahir</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=up_ijzh">Upload Ijazah SMP</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=up_ft">Upload Foto Siswa</a></li>
                </ul>
            </li>
            <!-- end Upload Berkas -->
            
            <!-- upload berkas pendukung -->
            <li class="sidebar-item active">
                <a data-bs-target="#up_brks_pndkng" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-upload"></i> <span class="align-middle">Upload Berkas Pendukung</span>
                </a>
                <ul id="up_brks_pndkng" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=up_kip">Upload KIP</a></li>
                    <li class="sidebar-item active"><a class="sidebar-link" href="?page=up_kks">Upload KKS</a></li>
                </ul>
            </li>
            <!-- end upload berkas pendukung -->

            <!-- Status Upload Berkas -->
            <li class="sidebar-item">
                <a data-bs-target="#sts_up" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="fas fa-user-check align-middle"></i> <span class="align-middle">Status Upload Berkas</span>
                </a>
                <ul id="sts_up" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=sts_kk">Status KK</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=sts_akta">Status Akta Lahir</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=sts_ijzh">Status Ijazah SMP</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=sts_foto">Status Foto</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=sts_kip">Status KIP</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="?page=sts_kks">Status KKS</a></li>
                </ul>
            </li>
            <!-- end Status upload Berkas -->
        </ul>
    </div>
</nav>