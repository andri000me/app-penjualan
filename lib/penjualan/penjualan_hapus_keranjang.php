<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$prd_id   = $_POST['id_produk'];

// sql query
$query   = "DELETE FROM krj_jual WHERE prd_id  = '$prd_id'";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
