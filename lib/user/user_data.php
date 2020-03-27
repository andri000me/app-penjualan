<?php
include("../../src/pengaturan.php");

$query   = "SELECT * FROM user ORDER BY wkt_usr DESC";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data    = array();
$no      = 1;

while ($list = mysqli_fetch_array($sql)) {
   $row    = array();

   $row[]  = '<center>' . $no++ . '</center>';
   $row[]  = $list['nama_usr'];
   $row[]  = '<center>' . $list['user_usr'] . '</center>';
   if ($list['lvl_usr'] == 1) {
      $row[]  = '<p class="text-center text-success">Administrator</p>';
   } else {
      $row[]  = '<p class="text-center text-primary">Operator</p>';
   }
   $row[]  = '
         <div class="text-center">
            <button type="button" class="btn btn-sm btn-danger" onclick="hapusData(' . $list['id_usr'] . ')">
               <i class="fa fa-trash"></i> Hapus
            </button>
         </div>
   ';

   $data[] = $row;
}

$output = array("data" => $data);
echo json_encode($output);
