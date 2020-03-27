<?php
include("../../src/pengaturan.php");

// ambil data dari ajax jquery
$id      = $_GET['id'];

// sql query
$query   = "DELETE FROM produk WHERE id_prd = '$id'";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
