<div class="container">
   <?php
   $query1   = "SELECT * FROM pembelian JOIN supplier on pembelian.supp_id=supplier.id_supp WHERE id_bl='$_GET[id]'";
   $sql1     = mysqli_query($conn, $query1) or die(mysqli_error($conn));
   $data     = mysqli_fetch_array($sql1);
   ?>

   <!-- konten -->
   <div class="row justify-conten-between">
      <div class="col">
         <h3><?= tanggal($data['tgl_bl'], true) ?></h3>
      </div>
      <div class="col">
         <h3 class="text-right"><?= $data['nama_supp'] ?></h3>
      </div>
   </div>
   <hr style="margin-top: 3px; margin-bottom: 10px;">

   <table class="table table-sm table-bordered" width="150%">
      <thead class="bg-dark text-white">
         <tr>
            <th>Nama Produk</th>
            <th class="text-center" width="150">Harga</th>
            <th class="text-center" width="100">Jumlah</th>
            <th class="text-center" width="150">Total</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $query   = "SELECT * FROM pembelian_detail WHERE beli_id='$_GET[id]'";
         $sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
         $item    = mysqli_num_rows($sql);
         $grandtotal = 0;
         while ($list = mysqli_fetch_array($sql)) {
         ?>
            <tr>
               <td class="align-middle"><?= $list['prd_nama'] ?></td>
               <td class="align-middle">Rp. <span class="float-right"><?= rupiah($list['prd_hrg']) ?></span></td>
               <td class="align-middle text-center">
                  <span><?= number_format($list['jml_bdet']) ?></span>
               </td>
               <td class="align-middle">Rp. <span class="float-right"><?= rupiah($list['prd_hrg'] * $list['jml_bdet']) ?></span></td>
            </tr>
         <?php
            $grandtotal += $list['prd_hrg'] * $list['jml_bdet'];
         }
         ?>
         <tr>
            <td class="align-middle" colspan="3">
               <span class="float-right font-weight-bold">Total Item :</span>
            </td>
            <td class="align-middle">
               <span class="float-right font-weight-bold"><?= number_format($item) ?> item</span>
            </td>
         </tr>
         <tr>
            <td class="align-middle" colspan="3">
               <span class="float-right font-weight-bold">Grand Total :</span>
            </td>
            <td class="align-middle">
               Rp. <span class="float-right font-weight-bold"><?= rupiah($grandtotal) ?></span></td>
         </tr>
         <tr>
            <td class="align-middle" colspan="3">
               <span class="float-right font-weight-bold">Diskon :</span>
            </td>
            <td class="align-middle">
               <span class="float-right font-weight-bold"><?= rupiah($data['disk_bl']) ?> %</span></td>
         </tr>
         <tr>
            <td class="align-middle" colspan="3">
               <span class="float-right font-weight-bold">Total Bayar :</span>
            </td>
            <td class="align-middle">
               Rp. <span class="float-right font-weight-bold"><?= rupiah($data['byr_bl']) ?></span></td>
         </tr>
      </tbody>
   </table>
</div>