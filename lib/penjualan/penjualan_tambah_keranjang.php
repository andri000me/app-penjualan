<?php
session_start();
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id_prd   = $_POST['id_produk'];

// eksekusi data keranjang beli
$query4   = "SELECT * FROM krj_jual WHERE prd_id='$id_prd'";
$sql4     = mysqli_query($conn, $query4) or die(mysqli_error($conn));
$cek      = mysqli_num_rows($sql4);

if ($cek < 1) {
   // eksekusi data produk
   $query   = "SELECT * FROM produk WHERE id_prd='$id_prd' LIMIT 1";
   $sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
   $list    = mysqli_fetch_array($sql);

   // varibel
   $sess_id  = $_SESSION['id_jual'];
   $prd_id  = $list['id_prd'];
   $nama    = $list['nama_prd'];
   $harga   = $list['jual_prd'];

   // sql query
   $query2   = "INSERT INTO krj_jual SET
                  sess_id  = '$sess_id',
                  prd_id  = '$prd_id',
                  nama_prd = '$nama',
                  hrg_prd = '$harga',
                  jml_prd = 0
               ";

   // eksekusi
   mysqli_query($conn, $query2) or die(mysqli_error($conn));
} else {

   $query3   = "UPDATE krj_jual SET jml_prd = jml_prd+1 WHERE prd_id  = '$id_prd'";

   // eksekusi
   mysqli_query($conn, $query3) or die(mysqli_error($conn));
}
