<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$prd_id   = $_POST['id_produk'];
$jumlah   = $_POST['jumlah'];

// eksekusi data produk
$query   = "SELECT * FROM produk WHERE id_prd='$prd_id' LIMIT 1";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$list    = mysqli_fetch_array($sql);

// validasi input jumlah melebih stok
if ($list['stok_prd']  < $jumlah) {
   echo "gagal";
} else {
   // sql query
   $query2   = "UPDATE krj_jual SET jml_prd = '$jumlah' WHERE prd_id  = '$prd_id'";

   // eksekusi
   mysqli_query($conn, $query2) or die(mysqli_error($conn));
}
