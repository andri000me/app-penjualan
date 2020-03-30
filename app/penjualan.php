<div class="container-fluid">
   <!-- konten -->
   <div class="row justify-conten-between">
      <div class="col">
         <h3>Data Penjualan</h3>
      </div>
      <?php if ($_SESSION['level'] == 2) : ?>
         <div class="col">
            <div class="btn-group float-right">
               <?php if (!empty($_SESSION['id_jual'])) : ?>
                  <a class="btn btn-warning text-white" href="?view=penjualan-detail&id=<?= $_SESSION['id_jual'] ?>">
                     <i class="fa fa-undo"></i> Penjualan Aktif
                  </a>
               <?php endif; ?>
               <a class=" btn btn-primary btn-tambah" href="?view=penjualan-baru">
                  <i class="fa fa-plus"></i> Penjualan Baru
               </a>
            </div>
         </div>
      <?php endif; ?>
   </div>
   <hr style="margin-top: 3px; margin-bottom: 10px;">
   <table class="table table-sm table-bordered table-hover dataTable">
      <thead class="bg-success text-white">
         <tr>
            <th class="text-center" width="30">No. </th>
            <th class="text-center" width="200">Tanggal</th>
            <th>Nama Customer</th>
            <th class="text-center" width="50">Item</th>
            <th class="text-center" width="150">Total</th>
            <th class="text-center" width="50">Disk</th>
            <th class="text-center" width="150">Grand Total</th>
            <th class="text-center" width="150">Tombol Aksi</th>
         </tr>
      </thead>
      <tbody></tbody>
   </table>
</div>