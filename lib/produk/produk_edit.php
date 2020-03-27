<?php
include("../../src/pengaturan.php");

// ambil data dari ajax jquery
$id      = $_GET['id'];

// sql query
$query   = "SELECT * FROM produk WHERE id_prd = '$id'";

// eksekusi
$sql  = mysqli_query($conn, $query) or die(mysqli_error($conn));

echo json_encode(mysqli_fetch_assoc($sql));
