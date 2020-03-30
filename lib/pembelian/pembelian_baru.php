<?php

$id         = rand(111111111, 999999999);
$tanggal    = date('Y-m-d');
$supplier   = 0;
$item       = 0;
$total      = 0;
$diskon     = 0;
$bayar      = 0;
$user       = $_SESSION['nama_lengkap'];
$waktu      = date('Y-m-d H:i:s');

// sql query
$query   = "INSERT INTO pembelian SET 
               id_bl = '$id',
               tgl_bl = '$tanggal',
               supp_id = '$supplier',
               item_bl = '$item',
               total_bl = '$total',
               disk_bl = '$diskon',
               byr_bl = '$bayar',
               user_bl = '$user',
               wkt_bl = '$waktu'
            ";

// eksekusi
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($sql) {

   // buat session
   $_SESSION['id_beli'] = $id;

   // berhasil
   echo "<meta http-equiv='refresh' content='0.3;url=?view=pembelian-detail&id=$id'>";
} else {
   // gagal
   header("Location: ../home.php/?view=pembelian");
}
