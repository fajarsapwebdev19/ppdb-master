<?php
require '../../koneksi/koneksi.php';
?>
<table class="table table-hover table-sm table-striped nowrap" id="example">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Nama</th>
            <th class="text-center">JK</th>
            <th class="text-center">No SK</th>
            <th class="text-center">Tgl Sk Tugas</th>
            <th class="text-center">SK Tugas</th>
            <th class="text-center">Validasi</th>
        </tr>
    </thead>
    <tbody>
        <?php
$no = 1;
$antri_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE status_registrasi='Antrian' AND status_akun='Tidak Aktif'");
while ($data_antri_admin = mysqli_fetch_assoc($antri_admin)):
?>
        <tr>
            <td class="text-center"><?=$no++;?></td>
            <td><?=$data_antri_admin['nama']?></td>
            <td class="text-center">
                <?php
if ($data_antri_admin['jenis_kelamin'] == "Laki-Laki") {
    echo "L";
} elseif ($data_antri_admin['jenis_kelamin'] == "Perempuan") {
    echo "P";
}
?>
            </td>
            <td class="text-center"><?=$data_antri_admin['no_sk_tugas']?></td>
            <td class="text-center"><?=date('d-m-Y', strtotime($data_antri_admin['tgl_sk_tugas']))?></td>
            <td class="text-center"><a href="../doc/<?=$data_antri_admin['sk_tugas']?>" target="_blank"
                    class="btn btn-info btn-sm"><em class="fas fa-file"></em> View SK</a></td>
            <td class="text-center"><a href="#" data-id="<?= $data_antri_admin['id'] ?>" class="btn btn-success btn-sm acc-adm"><em
                        class="fas fa-check"></em></a></td>
        </tr>
        <?php endwhile;?>
    </tbody>
</table>

<script>
$('.table').DataTable();
</script>