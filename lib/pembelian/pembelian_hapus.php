<?php

include("../../src/pengaturan.php");

$id      = $_GET['id'];

// sql query
$query   = "DELETE FROM pembelian WHERE id_bl = '$id'";

// eksekusi
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($sql) {

   // sql query2
   $query2   = "DELETE FROM pembelian_detail WHERE beli_id = '$id'";

   // eksekusi
   mysqli_query($conn, $query2) or die(mysqli_error($conn));
}
