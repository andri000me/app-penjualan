<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$prd_id   = $_POST['id_produk'];
$jumlah   = $_POST['jumlah'];

// sql query
$query2   = "UPDATE krj_beli SET jml_prd = '$jumlah' WHERE prd_id  = '$prd_id'";

// eksekusi
mysqli_query($conn, $query2) or die(mysqli_error($conn));
