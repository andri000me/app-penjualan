<?php
session_start();

include("../../src/pengaturan.php");
include("../../src/rupiah.php");

// query sql untuk detail keranjang
$query   = "SELECT * FROM pembelian_detail WHERE beli_id='$_GET[id]'";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$item    = mysqli_num_rows($sql);

while ($list = mysqli_fetch_array($sql)) {
   $row    = array();

   $row[]  = '<small>' . $list['prd_nama'] . '</small>';
   $row[]  = 'Rp. <span class="float-right">' . rupiah($list['prd_hrg']) . '</span>';
   $row[]  = 'Rp. <span class="float-right">' . number_format($list['jml_bdet']) . '</span>';
   $row[]  = 'Rp. <span class="float-right">' . rupiah($list['prd_hrg'] * $list['jml_bdet']) . '</span>';

   $data[] = $row;
   // $total += $list['hrg_prd'] * $list['jml_prd'];
}

// $data[] = array(
//    "<input type='hidden' class='total_item' value='$item'>",
//    "<input type='hidden' class='total' value='$total'>",
//    "",
//    "",
//    "",
// );

$output = array("data" => $data);
echo json_encode($output);
