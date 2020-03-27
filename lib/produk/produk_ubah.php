<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = $_POST['id'];
$nama    = strtoupper($_POST['nama']);
$satuan  = $_POST['satuan'];
$beli    = $_POST['beli'];
$jual    = $_POST['jual'];
$diskon  = $_POST['diskon'];
$stok    = $_POST['stok'];

// sql query
$query   = "UPDATE produk SET 
               nama_prd = '$nama',
               stn_id   = '$satuan',
               beli_prd = '$beli',
               jual_prd = '$jual',
               disk_prd = '$diskon',
               stok_prd = '$stok'
            WHERE id_prd = '$id'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
