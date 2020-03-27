<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = rand(111111111, 999999999);
$nama    = strtoupper($_POST['nama']);
$waktu   = date('Y-m-d H:i:s');

// sql query
$query   = "INSERT INTO satuan SET 
               id_stn   = '$id',
               nama_stn = '$nama',
               wkt_stn  = '$waktu'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
