<?php
include("../../src/pengaturan.php");

$query = "SELECT * FROM produk WHERE nama_prd like '%" . $_GET['id'] . "%' ORDER BY wkt_prd LIMIT 10";
$sql   = mysqli_query($conn, $query) or die(mysqli_error($conn));

$data = array();

while ($produk = mysqli_fetch_assoc($sql)) {
   $data[] = array(
      "id" => $produk['id_prd'],
      "nama" => $produk['nama_prd']
   );
}

echo json_encode($data);
