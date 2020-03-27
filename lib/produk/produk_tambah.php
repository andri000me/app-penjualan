<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = rand(111111111, 999999999);
$nama    = strtoupper($_POST['nama']);
$satuan  = $_POST['satuan'];
$beli    = $_POST['beli'];
$jual    = $_POST['jual'];
$diskon  = $_POST['diskon'];
$stok    = $_POST['stok'];
$waktu   = date('Y-m-d H:i:s');

// sql query
$query   = "INSERT INTO produk SET 
               id_prd   = '$id',
               nama_prd = '$nama',
               stn_id   = '$satuan',
               beli_prd = '$beli',
               jual_prd = '$jual',
               disk_prd = '$diskon',
               stok_prd = '$stok',
               wkt_prd  = '$waktu'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
