<?php

date_default_timezone_set('Asia/Kuala_lumpur');

// setting variabel untuk connet sql
$host    = "localhost";
$user    = "root";
$pass    = "";
$db      = "app_pos";
$title   = "Toko Bangkit Pedagang";

// jalankan koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// jika koneksi gagal
if (!$conn) {
   echo "koneksi database tidak berhasil";
}
