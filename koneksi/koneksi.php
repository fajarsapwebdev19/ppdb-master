<?php
date_default_timezone_set('Asia/Jakarta');

// koneksi database ppdb_sekolah
$SERVER_NAME    = "localhost";
$USERNAME       = "root";
$PASSWORD       = "";
$DATABASE       = "ppdb_sekolah";

$koneksi = mysqli_connect($SERVER_NAME,$USERNAME,$PASSWORD,$DATABASE);

// koneksi untuk database master_data
$SERVER_NAME2 = "localhost";
$USERNAME2 = "root";
$PASSWORD2 = "";
$DATABASE2 = "master_data";

$master = mysqli_connect($SERVER_NAME2, $USERNAME2, $PASSWORD2, $DATABASE2);


?>