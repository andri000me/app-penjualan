<div class="container">
   <div class="row justify-conten-between">
      <?php
      if (isset($_POST['btn_periode'])) {
         $awal  = $_POST['awal'];
         $akhir  = $_POST['akhir'];
      }
      ?>
      <div class="col-9">
         <h3>Laporan Tanggal : <?= tanggal($awal) . ' - ' . tanggal($akhir) ?></h3>
      </div>
      <div class="col-3 text-right">
         <button type="button" class="btn btn-dark btn-print">
            <i class="fa fa-print"></i> Cetak Laporan
         </button>
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
            $no = 1;
            $data = array();
            $pendapatan = 0;
            $total_pendapatan = 0;
            $grand_penjualan = 0;
            $grand_pembelian = 0;
            $grand_pengeluaran = 0;

            while (strtotime($awal) <= strtotime($akhir)) :
               // ambil data tanggal
               $tanggal = $awal;
               $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

               // jumlah total penjualan
               $query_jl = "SELECT SUM(total_jl) AS total_penjualan FROM penjualan WHERE tgl_jl LIKE '$tanggal'";
               $sql_jl = mysqli_query($conn, $query_jl) or die(mysqli_error($conn));
               $data_jl = mysqli_fetch_assoc($sql_jl);
               $total_penjualan = $data_jl['total_penjualan'];
               $grand_penjualan += $total_penjualan;

               // jumlah total pembelian
               $query_bl = "SELECT SUM(total_bl) AS total_pembelian FROM pembelian WHERE tgl_bl LIKE '$tanggal'";
               $sql_bl = mysqli_query($conn, $query_bl) or die(mysqli_error($conn));
               $data_bl = mysqli_fetch_assoc($sql_bl);
               $total_pembelian = $data_bl['total_pembelian'];
               $grand_pembelian += $total_pembelian;

               // jumlah total pengeluaran
               $query_lr = "SELECT SUM(nmnl_lr) AS total_pengeluaran FROM pengeluaran WHERE tgl_lr LIKE '$tanggal'";
               $sql_lr = mysqli_query($conn, $query_lr) or die(mysqli_error($conn));
               $data_lr = mysqli_fetch_assoc($sql_lr);
               $total_pengeluaran = $data_lr['total_pengeluaran'];
               $grand_pengeluaran += $total_pengeluaran;

               // jumlah total pendapatan
               $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
               $total_pendapatan += $pendapatan;
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
                     Rp. <span class="float-right"><?= rupiah($pendapatan) ?> ,-</span>
                  </td>
               </tr>
            <?php
            endwhile;
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
                     Rp. <span class="float-right"><?= rupiah($total_pendapatan) ?> ,-</span>
                  </strong>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>