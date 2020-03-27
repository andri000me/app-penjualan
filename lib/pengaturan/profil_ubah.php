<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = $_POST['id'];
$nama    = strtoupper($_POST['nama']);
$user    = strtolower(str_replace(' ', '', $_POST['user']));

// sql query
$query   = "UPDATE user SET 
               nama_usr = '$nama',
               user_usr = '$user'
            WHERE id_usr   = '$id'
            ";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
