<?php

// data untuk table pembelian
$id_jual    = $_SESSION['id_jual'];
$nama       = strtoupper($_POST['nama']);
$item       = $_POST['item'];
$total      = $_POST['total'];
$diskon     = $_POST['diskon'];
$bayar      = $_POST['grandtotal'];

// sql query
$query   = "UPDATE penjualan SET 
               nama_customer = '$nama',
               item_jl = '$item',
               total_jl = '$total',
               disk_jl = '$diskon',
               byr_jl = '$bayar'
            WHERE id_jl = '$id_jual'
            ";

// eksekusi
$sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

// eksekusi data keranjang beli
$query4   = "SELECT * FROM krj_jual WHERE sess_id='$id_jual'";
$sql4     = mysqli_query($conn, $query4) or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($sql4)) {
   $query2 = "INSERT INTO penjualan_detail SET
                  jual_id = '$id_jual',
                  prd_id = '$data[prd_id]',
                  prd_nama = '$data[nama_prd]',
                  prd_hrg = '$data[hrg_prd]',
                  jml_jdet = '$data[jml_prd]'
               ";
   $sql2   = mysqli_query($conn, $query2) or die(mysqli_error($conn));
}


if ($sql2) {

   // sql query2
   $query3   = "TRUNCATE TABLE krj_jual";

   // eksekusi
   mysqli_query($conn, $query3) or die(mysqli_error($conn));

   // hapus session
   unset($_SESSION['id_jual']);

   // berhasil
   echo "<meta http-equiv='refresh' content='0.3;url=?view=penjualan'>";
}
