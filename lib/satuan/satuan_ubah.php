<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = $_POST['id'];
$nama    = strtoupper($_POST['nama']);

// sql query
$query   = "UPDATE satuan SET nama_stn = '$nama' WHERE id_stn = '$id'";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
