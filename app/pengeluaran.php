<div class="container">
   <!-- alert -->
   <div class="alert alert-primary alert-dismissible fade show" role="alert" style="display:none;">
      <strong>Selamat ! </strong> data pengeluaran berhasil ditambahkan.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <div class="alert alert-warning alert-dismissible fade show" role="alert" style="display:none;">
      <strong>Selamat ! </strong> data pengeluaran berhasil diubah.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none;">
      <strong>Selamat ! </strong> data pengeluaran berhasil dihapus.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>

   <!-- konten -->
   <div class="row justify-conten-between">
      <div class="col">
         <h3>Data Pengeluaran</h3>
      </div>
      <div class="col">
         <div class="btn-group float-right">
            <button type="button" class=" btn btn-primary btn-tambah" onclick="tambahForm()">
               <i class="fa fa-plus"></i> Tambah
            </button>
         </div>
      </div>
   </div>
   <hr style="margin-top: 3px; margin-bottom: 10px;">
   <table class="table table-sm table-bordered table-hover dataTable">
      <thead class="bg-success text-white">
         <tr>
            <th class="text-center" width="50">No. </th>
            <th class="text-center" width="200">Tanggal</th>
            <th>Jenis Pengeluaran</th>
            <th class="text-center" width="150">Nominal</th>
            <th class="text-center" width="150">Tombol Aksi</th>
         </tr>
      </thead>
      <tbody></tbody>
   </table>
</div>

<!-- Modal Form -->
<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <form>
            <input type="hidden" id="id">
            <div class="modal-header">
               <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Pengeluaran :</label>
                        <input type="text" class="form-control" id="jenis" placeholder="Beli ATK" required>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-6">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal :</label>
                        <input type="date" class="form-control" id="tanggal" required>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Nominal :</label>
                        <input type="number" class="form-control" id="nominal" placeholder="0" required>
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