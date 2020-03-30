<?php
session_start();

include("../../src/pengaturan.php");
include("../../src/rupiah.php");


$query   = "SELECT * FROM produk JOIN satuan on produk.stn_id=satuan.id_stn ORDER BY wkt_prd DESC";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data    = array();
$no      = 1;

while ($list = mysqli_fetch_array($sql)) {
   $row    = array();

   $row[]  = '<center>' . $no++ . '</center>';
   $row[]  = $list['nama_prd'];
   $row[]  = '<p class="text-center">' . $list['nama_stn'] . '</p>';
   if ($_SESSION['level'] == 1) {
      $row[]  = 'Rp. <span class="float-right">' . rupiah($list['beli_prd']) . '</span>';
   }
   $row[]  = 'Rp. <span class="float-right">' . rupiah($list['jual_prd']) . '</span>';
   $row[]  = '<span class="float-right">' . number_format($list['disk_prd']) . ' %</span>';
   $row[]  = '<p class="text-right">' . number_format($list['stok_prd']) . '</p>';
   if ($_SESSION['level'] == 1) {
      $row[]  = '
         <div class="text-center">
            <div class="btn-group btn-group-sm">
               <button type="button" class="btn btn-warning text-white" onclick="ubahForm(' . $list['id_prd'] . ')">
                  <i class="fa fa-edit"></i> Ubah
               </button>
               <button type="button" class="btn btn-danger" onclick="hapusData(' . $list['id_prd'] . ')">
                  <i class="fa fa-trash"></i> Hapus
               </button>
            </div>
         </div>
   ';
   }

   $data[] = $row;
}

$output = array("data" => $data);
echo json_encode($output);
