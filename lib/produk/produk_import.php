<?php

include("../../src/pengaturan.php");
include("../../src/PHPexcel/PHPExcel.php");


ini_set('memory_limit', '-1');
$inputFileName = $_FILES['file_excel']['tmp_name'];

try {
   $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch (Exception $e) {
   die('Error loading file :' . $e->getMessage());
}

$worksheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
$numRows = count($worksheet);

// import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
for ($i = 2; $i < ($numRows + 1); $i++) {

   // membaca data (kolom ke-1 sd terakhir)
   $id      = rand(111111111, 999999999);
   $nama    = strtoupper($worksheet[$i]["A"]);
   $satuan  = $worksheet[$i]["B"];
   $beli    = $worksheet[$i]["C"];
   $jual    = $worksheet[$i]["D"];
   $diskon  = $worksheet[$i]["E"];
   $stok    = $worksheet[$i]["F"];
   $waktu   = date('Y-m-d H:i:s');

   // setelah data dibaca, masukkan ke tabel pegawai sql
   $query   = "INSERT INTO produk SET 
                  id_prd   = '$id',
                  nama_prd = '$nama',
                  stn_id   = '$satuan',
                  beli_prd = '$beli',
                  jual_prd = '$jual',
                  disk_prd = '$diskon',
                  stok_prd = '$stok',
                  wkt_prd  = '$waktu'
               ";
   $hasil = mysqli_query($conn, $query) or die(mysqli_error($conn));
}

if ($hasil) {
   // hapus file xls yang udah dibaca
   unlink($_FILES['file_excel']['tmp_name']);
   // berhasil
   echo "<meta http-equiv='refresh' content='0.3;url=/home.php?view=produk'>";
} else {
   // gagal
   echo "<meta http-equiv='refresh' content='0.3;url=/home.php?view=penjualan-import-excel'>";
}
