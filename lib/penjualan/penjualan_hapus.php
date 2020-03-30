<?php

include("../../src/pengaturan.php");

$id      = $_GET['id'];

// sql query
$query   = "DELETE FROM penjualan WHERE id_jl = '$id'";

// eksekusi
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($sql) {

   // sql query2
   $query2   = "DELETE FROM penjualan_detail WHERE jual_id = '$id'";

   // eksekusi
   mysqli_query($conn, $query2) or die(mysqli_error($conn));
}
