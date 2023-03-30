<?php
    require '../../koneksi/koneksi.php';
?>
<table class="table table-hover table-sm table-striped nowrap" id="example">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Nama</th>
            <th class="text-center">JK</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Tempat, Tanggal Lahir</th>
            <th class="text-center">Validasi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            $antri_user = mysqli_query($koneksi, "SELECT * FROM user
            WHERE status_registrasi='Antrian' AND status_akun='Tidak Aktif'");
            while($data_antri_user = mysqli_fetch_assoc($antri_user)):
        ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $data_antri_user['nama']?></td>
            <td class="text-center">
            <?php
                if ($data_antri_user['jenis_kelamin'] == "Laki-Laki") {
                    echo "L";
                } elseif ($data_antri_user['jenis_kelamin'] == "Perempuan") {
                    echo "P";
                }
            ?>
            </td>
            <td class="text-center"><?= $data_antri_user['nik'] ?></td>
            <td class="text-center"><?= $data_antri_user['tempat_lahir']?>,<?= ($data_antri_user['tanggal_lahir'] == "" || $data_antri_user['tanggal_lahir'] == NULL) ? '' : date('d-m-Y', strtotime($data_antri_user['tanggal_lahir'])) ?>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-success btn-sm approve" data-id="<?= $data_antri_user['id'] ?>">
                    <em class="fas fa-check"></em>
                </button>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script>
    $('.table').DataTable();
</script>