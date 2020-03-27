<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = rand(111111111, 999999999);
$nama    = strtoupper($_POST['nama']);
$kontak  = $_POST['kontak'];
$alamat  = $_POST['alamat'];
$waktu   = date('Y-m-d H:i:s');

// sql query
$query   = "INSERT INTO supplier SET 
               id_supp   = '$id',
               nama_supp = '$nama',
               almt_supp = '$alamat',
               kntk_supp = '$kontak',
               wkt_supp  = '$waktu'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
