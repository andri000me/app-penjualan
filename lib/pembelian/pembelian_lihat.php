<?php

$query   = "SELECT * FROM pembelian JOIN supplier on pembelian.supp_id=supplier.id_supp WHERE id_bl='$_GET[id]'";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$pembelian = mysqli_fetch_assoc($sql);
$data    = array(
   "id_beli" => $pembelian['id_bl'],
   "tgl_beli" => $pembelian['tgl_bl'],
   "item_beli" => $pembelian['item_bl'],
   "total_beli" => $pembelian['total_bl'],
   "diskon_beli" => $pembelian['disk_bl'],
   "byr_beli" => $pembelian['byr_bl'],
   "nama_supp" => $pembelian['nama_supp'],
);

$query2   = "SELECT * FROM pembelian_detail WHERE beli_id='$_GET[id]'";
$sql2     = mysqli_query($conn, $query2) or die(mysqli_error($conn));

while ($produk = mysqli_fetch_assoc($sql2)) {
   $data[] = array(
      "detail" => array(
         "prd_id" => $produk['prd_id'],
         "prd_nama" => $produk['prd_nama'],
         "prd_hrg" => $produk['prd_hrg'],
         "prd_jml" => $produk['jml_bdet']
      )
   );
}

echo json_encode($data);
