<?php

$id      = $_GET['id'];
$sess_id = $_SESSION['id_beli'];

// sql query
$query   = "DELETE FROM pembelian WHERE id_bl = '$id'";

// eksekusi
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($sql) {

   // sql query2
   $query2   = "DELETE FROM krj_beli WHERE sess_id = '$sess_id'";

   // eksekusi
   mysqli_query($conn, $query2) or die(mysqli_error($conn));

   // buat session
   unset($_SESSION['id_beli']);

   // berhasil
   echo "<meta http-equiv='refresh' content='0.2;url=?view=pembelian'>";
} else {
   // gagal
   echo "<meta http-equiv='refresh' content='0.2;url=?view=pembelian'>";
}
