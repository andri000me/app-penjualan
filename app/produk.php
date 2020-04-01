<div class="container-fluid">
   <!-- alert -->
   <div class="alert alert-primary alert-dismissible fade show" role="alert" style="display:none;">
      <strong>Selamat ! </strong> data produk berhasil ditambahkan.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <div class="alert alert-warning alert-dismissible fade show" role="alert" style="display:none;">
      <strong>Selamat ! </strong> data produk berhasil diubah.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none;">
      <strong>Selamat ! </strong> data produk berhasil dihapus.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>

   <!-- konten -->
   <div class="row justify-conten-between">
      <div class="col">
         <h3>Data Produk</h3>
      </div>
      <?php
      if ($_SESSION['level'] == 1) {
      ?>
         <div class="col">
            <div class="float-right">
               <button type="button" class=" btn btn-primary btn-tambah" onclick="tambahForm()">
                  <i class="fa fa-plus"></i> Tambah
               </button>
               <a href="?view=produk-import-excel" class=" btn btn-success btn-tambah">
                  <i class="fa fa-file-excel"></i> Import Excel
               </a>
            </div>
         </div>
      <?php } ?>
   </div>
   <hr style="margin-top: 3px; margin-bottom: 10px;">
   <table class="table table-sm table-bordered table-hover dataTable">
      <thead class="bg-success text-white">
         <tr>
            <th class="text-center" width="30">No. </th>
            <th>Nama Produk</th>
            <th class="text-center" width="150">Satuan</th>
            <?php if ($_SESSION['level'] == 1) : ?>
               <th class="text-center" width="100">H.Beli</th>
            <?php endif; ?>
            <th class="text-center" width="100">H.Jual</th>
            <th class="text-center" width="50">Disk</th>
            <th class="text-center" width="50">Stok</th>
            <?php
            if ($_SESSION['level'] == 1) {
            ?>
               <th class="text-center" width="150">Tombol Aksi</th>
            <?php } ?>
         </tr>
      </thead>
      <tbody></tbody>
   </table>
</div>

<!-- Modal Form -->
<?php
if ($_SESSION['level'] == 1) {
?>
   <div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
         <div class="modal-content">
            <form>
               <input type="hidden" id="id">
               <div class="modal-header">
                  <h5 class="modal-title"></h5>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-8">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Nama Produk :</label>
                           <input type="text" class="form-control" id="nama" placeholder="masukkan nama produk" required>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Satuan :</label>
                           <select id="satuan" class="form-control" required>
                              <?php
                              $query   = "SELECT * FROM satuan ORDER BY wkt_stn DESC";
                              $sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
                              while ($satuan  = mysqli_fetch_array($sql)) {
                              ?>
                                 <option value="<?= $satuan['id_stn'] ?>"><?= $satuan['nama_stn'] ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-4">
                        <div class="form-group">
                           <label for="exampleInputEmail1">H. Beli :</label>
                           <input type="number" class="form-control" id="beli" placeholder="0" required>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-group">
                           <label for="exampleInputEmail1">H. Jual :</label>
                           <input type="number" class="form-control" id="jual" placeholder="0" required>
                        </div>
                     </div>
                     <div class="col-2">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Diskon :</label>
                           <input type="number" class="form-control" id="diskon" value="0">
                        </div>
                     </div>
                     <div class="col-2">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Stok :</label>
                           <input type="number" class="form-control" id="stok" value="0">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                     <i class="fa fa-reply"></i> Batal
                  </button>
                  <button type="submit" class="btn btn-success">
                     <i class="fa fa-check"></i> Simpan Data
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
<?php } ?>