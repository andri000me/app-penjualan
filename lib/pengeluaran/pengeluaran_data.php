<?php
include("../../src/pengaturan.php");
include("../../src/tanggal.php");
include("../../src/rupiah.php");

$query   = "SELECT * FROM pengeluaran ORDER BY wkt_lr DESC";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data    = array();
$no      = 1;

while ($list = mysqli_fetch_array($sql)) {
   $row    = array();

   $row[]  = '<center>' . $no++ . '</center>';
   $row[]  = '<center>' . tanggal($list['tgl_lr']) . '</center>';
   $row[]  = $list['jns_lr'];
   $row[]  = 'Rp. <span class="float-right">' . rupiah($list['nmnl_lr']) . '</span>';
   $row[]  = '
         <div class="text-center">
            <div class="btn-group btn-group-sm">
               <button type="button" class="btn btn-warning text-white" onclick="ubahForm(' . $list['id_lr'] . ')">
                  <i class="fa fa-edit"></i> Ubah
               </button>
               <button type="button" class="btn btn-danger" onclick="hapusData(' . $list['id_lr'] . ')">
                  <i class="fa fa-trash"></i> Hapus
               </button>
            </div>
         </div>
   ';

   $data[] = $row;
}

$output = array("data" => $data);
echo json_encode($output);
