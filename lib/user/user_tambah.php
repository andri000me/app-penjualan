<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = rand(111111111, 999999999);
$nama    = strtoupper($_POST['nama']);
$user    = strtolower(str_replace(' ', '', $_POST['nama']));
$pass    = md5(123456);
$level   = $_POST['level'];
$waktu   = date('Y-m-d H:i:s');

// sql query
$query   = "INSERT INTO user SET 
               id_usr   = '$id',
               nama_usr = '$nama',
               user_usr = '$user',
               pass_usr = '$pass',
               lvl_usr  = '$level',
               wkt_usr  = '$waktu'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
