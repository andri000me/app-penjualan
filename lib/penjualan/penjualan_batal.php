<?php

$id      = $_GET['id'];
$sess_id = $_SESSION['id_jual'];

// sql query
$query   = "DELETE FROM penjualan WHERE id_jl = '$id'";

// eksekusi
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($sql) {

   // sql query2
   $query2   = "DELETE FROM krj_jual WHERE sess_id = '$sess_id'";

   // eksekusi
   mysqli_query($conn, $query2) or die(mysqli_error($conn));

   // hapus session
   unset($_SESSION['id_jual']);

   // berhasil
   echo "<meta http-equiv='refresh' content='0.2;url=?view=penjualan'>";
} else {
   // gagal
   echo "<meta http-equiv='refresh' content='0.2;url=?view=penjualan'>";
}
