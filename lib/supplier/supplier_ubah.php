<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = $_POST['id'];
$nama    = strtoupper($_POST['nama']);
$kontak  = $_POST['kontak'];
$alamat  = $_POST['alamat'];

// sql query
$query   = "UPDATE supplier SET 
               nama_supp = '$nama',
               almt_supp = '$alamat',
               kntk_supp = '$kontak'
               WHERE id_supp = '$id'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
