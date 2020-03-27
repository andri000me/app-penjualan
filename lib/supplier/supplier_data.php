<?php
include("../../src/pengaturan.php");

$query   = "SELECT * FROM supplier ORDER BY wkt_supp DESC";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data    = array();
$no      = 1;

while ($list = mysqli_fetch_array($sql)) {
   $row    = array();

   $row[]  = '<center>' . $no++ . '</center>';
   $row[]  = $list['nama_supp'];
   $row[]  = '<center>' . $list['kntk_supp'] . '</center>';
   $row[]  = '
         <div class="text-center">
            <div class="btn-group btn-group-sm">
               <button type="button" class="btn btn-warning text-white" onclick="ubahForm(' . $list['id_supp'] . ')">
                  <i class="fa fa-edit"></i> Ubah
               </button>
               <button type="button" class="btn btn-danger" onclick="hapusData(' . $list['id_supp'] . ')">
                  <i class="fa fa-trash"></i> Hapus
               </button>
            </div>
         </div>
   ';

   $data[] = $row;
}

$output = array("data" => $data);
echo json_encode($output);
