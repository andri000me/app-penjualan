<div class="container">
   <!-- konten -->
   <div class="row justify-conten-between">
      <div class="col">
         <h3>Import Data Produk</h3>
      </div>
   </div>
   <hr style="margin-top: 3px; margin-bottom: 10px;">
   <div class="row">
      <div class="col-12">
         <table class="table table-bordered">
            <tr>
               <td class="align-top">
                  <form name="myForm" id="myForm" onSubmit="return validateForm()" action="lib/produk/produk_import.php" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="file_excel" id="file_excel">
                           <label class="custom-file-label" for="customFile">klik untuk pilih file excel</label>
                           <small class="pl-1 form-text text-danger">pastikan format file yang di unggah adalah Excel 2003 (.xls)</small>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success mt-3">
                           <i class="fa fa-upload"></i> Unggah Data
                        </button>
                     </div>
                  </form>
               </td>
               <td class="align-top">
                  <div class="card shadow">
                     <div class="card-body text-center">
                        <h6 class="text-center">Download File Contoh</h6>
                        <a href="asset/contoh_file_import_excel.xls" class="btn btn-sm btn-success">
                           <i class="fa fa-download"></i> Unduh File
                        </a>
                     </div>
                  </div>
               </td>
               <td class="align-top">
                  <table class="table table-sm table-bordered" width="100%">
                     <tr class="bg-dark text-white text-center">
                        <td>ID Satuan</td>
                        <td>Nama</td>
                     </tr>
                     <?php
                     $query   = "SELECT * FROM satuan ORDER BY wkt_stn DESC";
                     $sql     = mysqli_query($conn, $query) or die(mysqli_error($conn));
                     while ($satuan  = mysqli_fetch_array($sql)) :
                     ?>
                        <tr class="text-center">
                           <td><?= $satuan['id_stn'] ?></td>
                           <td><?= $satuan['nama_stn'] ?></td>
                        </tr>
                     <?php endwhile; ?>
                  </table>
               </td>
            </tr>
         </table>
      </div>
   </div>

</div>