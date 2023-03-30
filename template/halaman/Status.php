<?php
    $c = mysqli_query($koneksi, "SELECT LEFT(nama,1) as nama FROM admin");

    $data = mysqli_fetch_array($c);

    echo $data['nama'];