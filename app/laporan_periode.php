<div class="container">
   <div class="row justify-conten-between">
      <div class="col">
         <h3>Data Laporan Per Bulan</h3>
      </div>
   </div>
   <hr style="margin-top: 3px; margin-bottom: 10px;">
   <form class="form-inline" method="POST" action="?view=laporan-periode">
      <label class="my-1 mr-2 align-middle" for="awal">Mulai</label>
      <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="awal" id="awal" required>

      <label class="my-1 mr-2" for="akhir">Akhir</label>
      <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" name="akhir" id="akhir" required>

      <button type="submit" name="btn_periode" class="btn btn-sm btn-info mb-2"><i class="fa fa-random"></i> &nbsp; Ubah</button>
      &nbsp;
      <a href="?view=laporan" class="btn btn-sm btn-secondary mb-2"><i class="fa fa-reply"></i> &nbsp; Ulang</a>
   </form>
   <hr style="margin-top: 3px; margin-bottom: 10px;">
   <div id="area-print">
      <table class="table table-sm table-striped table-bordered" width="100%" cellspacing="0">
         <thead class="bg-dark text-white">
            <tr class="text-center">
               <th width="10">No.</th>
               <th width="110">Tanggal</th>
               <th width="110"><span class="text-primary">Penjualan</span></th>
               <th width="110"><span class="text-warning">Pembelian</span></th>
               <th width="110"><span class="text-danger">Pengeluaran</span></th>
               <th width="110"><span class="text-success">Pendapatan</span></th>
            </tr>
         </thead>
         <tbody>
            <?php
            if (isset($_POST['btn_periode'])) :
               $awal  = $_POST['awal'];
               $akhir  = $_POST['akhir'];
               $no = 1;
               $data = array();
               $pendapatan = 0;
               $total_pendapatan = 0;
               $grand_penjualan = 0;
               $grand_pembelian = 0;
               $grand_pengeluaran = 0;
               $grand_pendapatan = 0;

               while (strtotime($awal) <= strtotime($akhir)) :
                  // ambil data tanggal
                  $tanggal = $awal;
                  $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

                  // jumlah total penjualan
                  $query_jl = "SELECT SUM('total_jl') AS total_penjualan FROM penjualan WHERE tgl_jl LIKE '$tanggal'";
                  $sql_jl = mysqli_query($conn, $query_jl) or die(mysqli_error($conn));
                  $data_jl = mysqli_fetch_assoc($sql_jl);
                  $total_penjualan = $data_jl['total_penjualan'];
                  $grand_penjualan += $total_penjualan;

                  // jumlah total pembelian
                  $total_pembelian = 0;
                  $grand_pembelian += $total_pembelian;

                  // jumlah total pengeluaran
                  $total_pengeluaran = 0;
                  $grand_pengeluaran += $total_pengeluaran;

                  // jumlah total pendapatan
                  $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
                  $total_pendapatan += $pendapatan;
                  $grand_pendapatan += $total_pendapatan;
            ?>
                  <tr>
                     <td class="text-center"><?= $no++ ?></td>
                     <td class="text-center"><?= tanggal($tanggal) ?></td>
                     <td class="text-primary">
                        Rp. <span class="float-right"><?= rupiah($total_penjualan) ?> ,-</span>
                     </td>
                     <td class="text-warning">
                        Rp. <span class="float-right"><?= rupiah($total_pembelian) ?> ,-</span>
                     </td>
                     <td class="text-danger">
                        Rp. <span class="float-right"><?= rupiah($total_pengeluaran) ?> ,-</span>
                     </td>
                     <td class="text-success">
                        Rp. <span class="float-right"><?= rupiah($total_pendapatan) ?> ,-</span>
                     </td>
                  </tr>
            <?php
               endwhile;
            endif;
            ?>
            <tr class="bg-dark text-white">
               <td class="text-right" colspan="2"><strong>Grand Total :</strong></td>
               <td class="text-primary">
                  <strong>
                     Rp. <span class="float-right"><?= rupiah($grand_penjualan) ?> ,-</span>
                  </strong>
               </td>
               <td class="text-warning">
                  <strong>
                     Rp. <span class="float-right"><?= rupiah($grand_pembelian) ?> ,-</span>
                  </strong>
               </td>
               <td class="text-danger">
                  <strong>
                     Rp. <span class="float-right"><?= rupiah($grand_pengeluaran) ?> ,-</span>
                  </strong>
               </td>
               <td class="text-success">
                  <strong>
                     Rp. <span class="float-right"><?= rupiah($grand_pendapatan) ?> ,-</span>
                  </strong>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>