<div class="row">
   <div class="col-9">
      <div class="jumbotron p-4 p-md-5 text-white rounded bg-success" style="height: 300px">
         <div class="row">
            <div class="col-md-3 my-auto">
               <img class="img-fluid" alt="Responsive image" src="asset/img/favicon.svg" width="180" height="180">
            </div>
            <div class="col-md-9 my-auto">
               <h3>Selamat Datang Operator:</h3>
               <h1 class="display-4 font-italic"><?= ucwords($_SESSION['nama_lengkap']) ?></h1>
               <p class="lead my-3 text-justify">Sistem Informasi Penjualan <strong><?= $title ?></strong> untuk memantau semua transaksi yang dilakukan mulai dari penjualan, pembelian hingga pengeluaran dengan laporan data setiap bulan</p>
            </div>
         </div>
      </div>
   </div>

   <?php
   // jumlah total penjualan
   $tanggal = date('Y-m-d');
   $query_jl = "SELECT SUM(total_jl) AS total_penjualan FROM penjualan WHERE tgl_jl LIKE '$tanggal'";
   $sql_jl = mysqli_query($conn, $query_jl) or die(mysqli_error($conn));
   $data_jl = mysqli_fetch_assoc($sql_jl);
   $total_penjualan = $data_jl['total_penjualan'];
   ?>
   <div class="col-3">
      <div class="jumbotron p-4 p-md-5 text-white rounded bg-info" style="height: 300px">
         <div class="row">
            <div class="col text-center my-auto">
               <h1><i class="fa fa-shopping-cart"></i></h1>
               <h3>Total Penjualan</h3>
               <h4>Rp. <?= rupiah($total_penjualan) ?> ,-</h4>

               <br>

               <a href="?view=penjualan-baru" class="btn btn-warning text-white"><i class="fa fa-plus"></i> Transaksi Baru</a>
            </div>
         </div>

      </div>
   </div>
</div>