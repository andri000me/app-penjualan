<?php
session_start();

include("../../src/pengaturan.php");
include("../../src/rupiah.php");

// query sql untuk detail keranjang
$query   = "SELECT * FROM krj_beli ORDER BY id_krj DESC";
$sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data    = array();
$total   = 0;

// query untuk total item 
$sess_id = $_SESSION['id_beli'];
$query2  = "SELECT * FROM krj_beli WHERE id_krj = '$sess_id'";
$sql2    = mysqli_query($conn, $query) or die(mysqli_error($conn));
$item    = mysqli_num_rows($sql2);

while ($list = mysqli_fetch_array($sql)) {
   $row    = array();

   $row[]  = '<small>' . $list['nama_prd'] . '</small>';
   $row[]  = 'Rp. <span class="float-right">' . rupiah($list['hrg_prd']) . '</span>';
   $row[]  = '
         <input type="number" id="prd-' . $list['prd_id'] . '" class="form-control form-control-sm" value="' . $list['jml_prd'] . '" onChange="ubahJumlah(' . $list['prd_id'] . ')">
   ';
   $row[]  = 'Rp. <span class="float-right">' . rupiah($list['hrg_prd'] * $list['jml_prd']) . '</span>';
   $row[]  = '
         <div class="text-center">
            <div class="btn-group btn-group-sm">
               <button type="button" class="btn btn-sm btn-secondary" onclick="deleteItem(' . $list['prd_id'] . ')">
                  <i class="fa fa-trash"></i> Hapus
               </button>
            </div>
         </div>
   ';

   $data[] = $row;
   $total += $list['hrg_prd'] * $list['jml_prd'];
}

$data[] = array(
   "<input type='hidden' class='total_item' value='$item'>",
   "<input type='hidden' class='total' value='$total'>",
   "",
   "",
   "",
);

$output = array("data" => $data);
echo json_encode($output);
