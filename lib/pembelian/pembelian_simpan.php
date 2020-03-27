<?php

// data untuk table pembelian
$id_beli    = $_SESSION['id_beli'];
$supplier   = $_POST['supplier'];
$item       = $_POST['item'];
$total      = $_POST['total'];
$diskon     = $_POST['diskon'];
$bayar      = $_POST['grandtotal'];

// sql query
$query   = "UPDATE pembelian SET 
               supp_id = '$supplier',
               item_bl = '$item',
               total_bl = '$total',
               disk_bl = '$diskon',
               byr_bl = '$bayar'
            WHERE id_bl = '$id_beli'
            ";

// eksekusi
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

// eksekusi data keranjang beli
$query4   = "SELECT * FROM krj_beli WHERE sess_id='$id_beli'";
$sql4     = mysqli_query($conn, $query4) or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($sql4)) {
   $query2 = "INSERT INTO pembelian_detail SET
                  beli_id = '$id_beli',
                  prd_id = '$data[prd_id]',
                  prd_nama = '$data[nama_prd]',
                  prd_hrg = '$data[hrg_prd]',
                  jml_bdet = '$data[jml_prd]'
               ";
   $sql2   = mysqli_query($conn, $query2) or die(mysqli_error($conn));
}


if ($sql2) {

   // sql query2
   $query3   = "TRUNCATE TABLE krj_beli";

   // eksekusi
   mysqli_query($conn, $query3) or die(mysqli_error($conn));

   // buat session
   unset($_SESSION['id_beli']);

   // berhasil
   echo "<meta http-equiv='refresh' content='0.3;url=?view=pembelian'>";
}
