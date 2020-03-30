<div class="container-fluid shadow-lg p-3 mb-5 bg-white rounded">
   <div class="row">
      <div class="col">
         <h1>GRAND TOTAL : <span class="float-right text-total"></span></h1>
      </div>
   </div>

   <hr style="margin-top: 3px; margin-bottom: 10px;">

   <div class="row">
      <div class="col">
         <form class="form-inline">
            <input type="text" list="produk" id="id_produk" class="form-control form-control-sm mb-2 mr-sm-2" placeholder="ketikkan id atau nama produk disini" size="50" autocomplete="off" autofocus>

            <datalist id="produk"></datalist>

            <button type="button" class="btn btn-sm btn-warning mb-2 text-white btn-tambah">Tambah</button>
         </form>
      </div>
   </div>
   <div class="row">
      <div class="col-8">
         <table class="table table-sm table-hover tabel-detail">
            <thead class="bg-success text-white">
               <tr>
                  <th>Nama Produk</th>
                  <th class="text-center" width="100">Harga</th>
                  <th class="text-right" width="80">Jumlah</th>
                  <th class="text-center" width="120">Total</th>
                  <th class="text-center" width="80">Aksi</th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
      </div>
      <div class="col-4">
         <div class="card">
            <div class="card-body">
               <form action="?view=penjualan-simpan" method="POST">
                  <div class="form-group">
                     <label for="nama">Nama Customer :</label>
                     <input type="text" class="form-control" name="nama" id="nama" value="UMUM">
                  </div>
                  <div class="row">
                     <div class="col-4">
                        <div class="form-group">
                           <label for="item">Item :</label>
                           <input type="text" class="form-control" name="item" id="item" readonly>
                        </div>
                     </div>
                     <div class="col-8">
                        <label for="id">Total :</label>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">Rp.</span>
                           </div>
                           <input type="text" class="form-control" name="total" id="total" readonly>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-4">
                        <label for="id">Diskon :</label>
                        <div class="input-group mb-3">
                           <input type="number" class="form-control" name="diskon" id="diskon" value="0" required>
                           <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">%</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-8">
                        <label for="id">Grand Total :</label>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text">Rp.</span>
                           </div>
                           <input type="text" class="form-control" name="grandtotal" id="grandtotal" readonly>
                        </div>
                     </div>
                  </div>
                  <div class="row mt-2">
                     <div class="col text-center">
                        <button type="submit" class="btn btn-primary">
                           <i class="fa fa-check-circle"></i> Simpan Penjualan
                        </button>
                        <a href="?view=penjualan-batal&id=<?= $_SESSION['id_jual']; ?>" class="btn btn-danger">
                           <i class="fa fa-times"></i> Batal
                        </a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>