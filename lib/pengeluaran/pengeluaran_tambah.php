<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = rand(111111111, 999999999);
$jenis   = strtoupper($_POST['jenis']);
$nominal = $_POST['nominal'];
$tanggal = $_POST['tanggal'];
$waktu   = date('Y-m-d H:i:s');

// sql query
$query   = "INSERT INTO pengeluaran SET 
               id_lr = '$id',
               tgl_lr = '$tanggal',
               jns_lr = '$jenis',
               nmnl_lr = '$nominal',
               wkt_lr  = '$waktu'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
