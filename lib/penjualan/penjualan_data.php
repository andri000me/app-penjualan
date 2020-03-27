<?php
include("../../src/pengaturan.php");
include("../../src/tanggal.php");
include("../../src/rupiah.php");


$query   = "SELECT * FROM penjualan ORDER BY wkt_jl DESC";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data    = array();
$no      = 1;

while ($list = mysqli_fetch_array($sql)) {
   $row    = array();

   $row[]  = '<p class="text-center">' . $no++ . '</p>';
   $row[]  = '<p class="text-center">' . tanggal($list['tgl_jl']) . '</p>';
   $row[]  = $list['nama_customer'];
   $row[]  = '<p class="text-center">' . number_format($list['item_jl']) . '</p>';
   $row[]  = 'Rp. <span class="float-right">' . rupiah($list['total_jl']) . '</span>';
   $row[]  = '<span class="float-right">' . number_format($list['disk_jl']) . ' %</>';
   $row[]  = 'Rp. <span class="float-right">' . rupiah($list['byr_jl']) . '</span>';
   $row[]  = '
         <div class="text-center">
            <div class="btn-group btn-group-sm">
               <a class="btn btn-sm btn-secondary" href="?view=penjualan-lihat&id=' . $list['id_jl'] . '">
                  <i class="fa fa-eye"></i> Lihat
               </a>
               <button type="button" class="btn btn-sm btn-danger" onclick="hapusData(' . $list['id_jl'] . ')">
                  <i class="fa fa-trash"></i> Hapus
               </button>
            </div>
         </div>
   ';

   $data[] = $row;
}

$output = array("data" => $data);
echo json_encode($output);
