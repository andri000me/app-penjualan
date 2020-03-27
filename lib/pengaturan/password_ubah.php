<?php
include("../../src/pengaturan.php");

// ambil data post dari ajax jquery
$id      = $_POST['id'];
$pass    = md5($_POST['pass']);

// sql query
$query   = "UPDATE user SET pass_usr = '$pass' WHERE id_usr = '$id'";

// eksekusi
mysqli_query($conn, $query) or die(mysqli_error($conn));
