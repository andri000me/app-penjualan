<!-- Modal Form -->
<div class="modal fade" id="modal-pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form>
            <input type="hidden" id="id_password">
            <div class="modal-header">
               <h5 class="modal-title"><i class="fa fa-key"></i> Ubah Password</h5>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="exampleInputEmail1">Password Baru :</label>
                  <input type="password" class="form-control" id="ubah_password" required>
                  <small class="form-text text-danger">kosongkan jika tidak ingin merubah password</small>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">
                  <i class="fa fa-reply"></i> Batal
               </button>
               <button type="submit" class="btn btn-success">
                  <i class="fa fa-check"></i> Ubah Data
               </button>
            </div>
         </form>
      </div>
   </div>
</div>