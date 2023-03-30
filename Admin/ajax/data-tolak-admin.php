<?php require '../../koneksi/koneksi.php'; ?>
<table class="table table-hover table-sm table-striped nowrap" id="example3">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>JK</th>
            <th>No SK</th>
            <th>Tgl Sk Tugas</th>
        </tr>
    </thead>
    <tbody>
        <?php
                        // hapus data otomatis
                        $lama = 1;
                        $auto_delete = mysqli_query($koneksi, "DELETE FROM admin WHERE DATEDIFF(CURDATE(), tanggal_tolak) > $lama");

                        // query data tolak
                        $no = 1;
                        $tolak = mysqli_query($koneksi, "SELECT * FROM admin WHERE status_registrasi='Tolak' AND status_akun='Tidak Aktif'");

                        while($data_tolak = mysqli_fetch_assoc($tolak)):
                      ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data_tolak['nama'] ?></td>
            <td>
                <?php
                              if($data_tolak['jenis_kelamin'] == "Laki-Laki")
                              {
                                echo "L";
                              }
                              elseif($data_tolak['jenis_kelamin'] == "Perempuan")
                              {
                                echo "P";
                              }
                            ?>
            </td>
            <td><?= $data_tolak['no_sk_tugas'] ?></td>
            <td><?= $data_tolak['tgl_sk_tugas'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<script>
    $('.table').DataTable();
</script>