<?php
include("../../src/rupiah.php");

$total = $_GET['total'];
$diskon = $_GET['diskon'];

$bayar = $total - ($diskon / 100 * $total);

$data = array(
   'text_total' => 'Rp. ' . rupiah($bayar) . ',-',
   'bayar' => $bayar,
);

echo json_encode($data);
