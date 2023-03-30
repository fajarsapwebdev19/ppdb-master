<?php
    if(empty($apl['warna_header']))
    {
        ?>
            <nav class="navbar navbar-expand navbar-light bg-dark-dev">
        <?php
    }else{
        ?>
            <nav class="navbar navbar-expand navbar-light bg-<?= $apl['warna_header']?>">
        <?php
    }
?>
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <span class="d-none d-sm-inline-block">
        <b>PPDB <?= $apl['nama_sekolah'] ?></b>
    </span>

    <div class="navbar-collapse collapse sticky-top">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <?php
                        if(empty($data_user['foto']))
                        {
                            if($data_user['jenis_kelamin'] == "Laki-Laki")
                            {
                                ?>
                                    <img src="../Foto/foto_profile/man.png" class="avatar img-fluid rounded" alt="<?= $data_user['nama'] ?>">
                                <?php
                            }
                            elseif($data_user['jenis_kelamin'] == "Perempuan")
                            {
                                ?>
                                    <img src="../Foto/foto_profile/woman.png" class="avatar img-fluid rounded" alt="<?= $data_user['nama'] ?>">
                                <?php
                            }
                        }else{
                            ?>
                                <img src="../Foto/foto_profile/<?= $data_user['foto'] ?>" class="avatar img-fluid rounded" alt="<?= $data_user['nama'] ?>">
                            <?php
                        }
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="?page=profile"><i class="fas fa-user me-1"></i> Profile</a>
                    <a class="dropdown-item" href="?page=update_password"><i class="fas fa-key me-1"></i> Update
                        Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../login/logout.php"><i class="fas fa-power-off"></i> Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>