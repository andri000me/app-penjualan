<!-- Modal Form -->
<div class="modal fade" id="modal-profil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form>
            <input type="hidden" id="id_profil">
            <div class="modal-header">
               <h5 class="modal-title"><i class="fa fa-user"></i> Profil</h5>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap :</label>
                  <input type="text" class="form-control" id="nama_profil">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Username :</label>
                  <input type="text" class="form-control" id="user_profil">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">
                  <i class="fa fa-reply"></i> Batal
               </button>
               <button type="submit" class="btn btn-success">
                  <i class="fa fa-check"></i> Ubah Profil
               </button>
            </div>
         </form>
      </div>
   </div>
</div>