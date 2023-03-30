<?php
    require '../../koneksi/koneksi.php';
?>
<table class="table table-hover table-sm table-striped nowrap" id="example2">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>JK</th>
            <th>No SK</th>
            <th>Tgl Sk Tugas</th>
            <th>SK Tugas</th>
        </tr>
    </thead>
    <tbody>
        <?php
                        $no = 1;
                        $terima = mysqli_query($koneksi, "SELECT * FROM admin WHERE status_registrasi='Terima' AND status_akun='Aktif'");
                        while($data_terima = mysqli_fetch_assoc($terima)):
                      ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data_terima['nama'] ?></td>
            <td><?php 
                                if($data_terima['jenis_kelamin'] == "Laki-Laki")
                                {
                                  echo "L";
                                }
                                elseif($data_terima['jenis_kelamin'] == "Perempuan")
                                {
                                  echo "P";
                                }
                              ?>
            </td>
            <td><?= $data_terima['no_sk_tugas'] ?></td>
            <td><?= date('d-m-Y', strtotime($data_terima['tgl_sk_tugas']))?></td>
            <td>
                <a href="../doc/<?= $data_terima['sk_tugas']?>" target="_blank">
                    <button class="btn btn-info btn-sm"><em class="fas fa-file"></em> View SK</button>
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<script>
    $('.table').DataTable();
</script>