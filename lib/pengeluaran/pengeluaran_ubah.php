<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = $_POST['id'];
$jenis   = strtoupper($_POST['jenis']);
$nominal = $_POST['nominal'];
$tanggal = $_POST['tanggal'];

// sql query
$query   = "UPDATE pengeluaran SET 
               tgl_lr = '$tanggal',
               jns_lr = '$jenis',
               nmnl_lr = '$nominal'
            WHERE id_lr = '$id'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
