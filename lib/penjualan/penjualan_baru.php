<?php

$id         = rand(111111111, 999999999);
$tanggal    = date('Y-m-d');
$nama       = 'UMUM';
$item       = 0;
$total      = 0;
$diskon     = 0;
$bayar      = 0;
$user       = $_SESSION['nama_lengkap'];
$waktu      = date('Y-m-d H:i:s');

// sql query
$query   = "INSERT INTO penjualan SET 
               id_jl = '$id',
               tgl_jl = '$tanggal',
               nama_customer = '$nama',
               item_jl = '$item',
               total_jl = '$total',
               disk_jl = '$diskon',
               byr_jl = '$bayar',
               user_jl = '$user',
               wkt_jl = '$waktu'
            ";

// eksekusi
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($sql) {

   // buat session
   $_SESSION['id_jual'] = $id;

   // berhasil
   echo "<meta http-equiv='refresh' content='0.3;url=?view=penjualan-detail&id=$id'>";
} else {
   // gagal
   header("Location: ../home.php/?view=penjualan");
}
