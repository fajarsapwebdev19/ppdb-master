<?php
    require '../../koneksi/koneksi.php';
?>
<table class="table table-hover data-tolak-siswa-baru">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>NIK</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Nama Ibu</th>
            <th>Asal Sekolah</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
                      $sb = mysqli_query($koneksi, "SELECT * FROM data_peserta_baru WHERE status_approval='Tolak' AND status_isi='Sudah'");
                      $no = 1;
                      while($dsb = mysqli_fetch_object($sb))
                      {
                        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $dsb->nama; ?></td>
            <td><?= $dsb->nik; ?></td>
            <td><?= $dsb->tempat_lahir ?>,<?= ($dsb->tanggal_lahir == "" || $dsb->tanggal_lahir == NULL) ? '' : date('d-m-Y', strtotime($dsb->tanggal_lahir)) ?>
            </td>
            <td><?= $dsb->alamat; ?></td>
            <td><?= $dsb->nama_ibu; ?></td>
            <td><?= $dsb->asal_sekolah; ?></td>
            <td><button type="button" data-id="<?= $dsb->id; ?>" class="btn btn-danger delete"><em
                        class="fas fa-trash-alt"></em></button></td>
        </tr>
        <?php
                      }
                    ?>
    </tbody>
</table>

<script>
$('.table').DataTable();
</script>