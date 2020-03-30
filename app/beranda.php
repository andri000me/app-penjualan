<div class="jumbotron p-4 p-md-5 text-white rounded bg-success">
   <div class="row">
      <div class="col-md-6 my-auto">
         <h1 class="display-4 font-italic">Selamat Datang !</h1>
         <p class="lead my-3 text-justify">Sistem Informasi Penjualan <?= $title ?> untuk memantau semua transaksi yang dilakukan mulai dari penjualan, pembelian hingga pengeluaran dengan laporan data setiap bulan</p>
      </div>
      <div class="col-md-6 text-right">
         <img class="img-fluid" alt="Responsive image" src="asset/img/favicon.svg" width="200" height="200">
      </div>
   </div>
</div>
<?php
$awal  = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
$akhir = date('Y-m-d');
$no = 1;
$data = array();
$pendapatan = 0;
$total_pendapatan = 0;
$grand_penjualan = 0;
$grand_pembelian = 0;
$grand_pengeluaran = 0;

while (strtotime($awal) <= strtotime($akhir)) {
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
}
?>
<div class="row mb-2">
   <div class="col-md-3">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow h-md-250 position-relative">
         <div class="col p-4 d-flex flex-column position-static">
            <div class="d-inline-block mb-2 font-weight-bold">Rp. <?= rupiah($grand_penjualan) ?>,-</div>
            <h4 class="mb-0 text-primary">Penjualan</h4>
         </div>
         <div class="col d-none d-lg-block my-auto">
            <img class="img-fluid" alt="Responsive image" src="asset/img/penjualan.svg" width="100" height="100">
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow h-md-250 position-relative">
         <div class="col p-4 d-flex flex-column position-static">
            <div class="d-inline-block mb-2 font-weight-bold">Rp. <?= rupiah($grand_pembelian) ?>,-</div>
            <h4 class="mb-0 text-warning">Pembelian</h4>
         </div>
         <div class="col d-none d-lg-block my-auto">
            <img class="img-fluid" alt="Responsive image" src="asset/img/pembelian.svg" width="100" height="100">
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow h-md-250 position-relative">
         <div class="col p-4 d-flex flex-column position-static">
            <div class="d-inline-block mb-2 font-weight-bold">Rp. <?= rupiah($grand_pengeluaran) ?>,-</div>
            <h4 class="mb-0 text-danger">Pengeluaran</h4>
         </div>
         <div class="col d-none d-lg-block my-auto">
            <img class="img-fluid" alt="Responsive image" src="asset/img/pengeluaran.svg" width="100" height="100">
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow h-md-250 position-relative">
         <div class="col p-4 d-flex flex-column position-static">
            <div class="d-inline-block mb-2 font-weight-bold">Rp. <?= rupiah($total_pendapatan) ?>,-</div>
            <h4 class="mb-0 text-success">Pendapatan</h4>
         </div>
         <div class="col d-none d-lg-block my-auto">
            <img class="img-fluid" alt="Responsive image" src="asset/img/pendapatan.svg" width="100" height="100">
         </div>
      </div>
   </div>
</div>

<div class="row">
   <div class="col-6">
      <div class="card border border-primary shadow mb-4">
         <div class="card-header bg-primary text-white">
            <h6 class="m-0 font-weight-bold">Grafik Penjualan</h6>
         </div>
         <div class="card-body">
            <div class="chart-area">
               <canvas id="chart_penjualan"></canvas>
            </div>
         </div>
      </div>
   </div>
   <div class="col-6">
      <div class="card border border-warning shadow mb-4">
         <div class="card-header bg-warning text-white">
            <h6 class="m-0 font-weight-bold">Grafik Pembelian</h6>
         </div>
         <div class="card-body">
            <div class="chart-area">
               <canvas id="chart_pembelian"></canvas>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-6">
      <div class="card border border-danger shadow mb-4">
         <div class="card-header bg-danger text-white">
            <h6 class="m-0 font-weight-bold">Grafik Pengeluaran</h6>
         </div>
         <div class="card-body">
            <div class="chart-area">
               <canvas id="chart_pengeluaran"></canvas>
            </div>
         </div>
      </div>
   </div>
   <div class="col-6">
      <div class="card border border-success shadow mb-4">
         <div class="card-header bg-success text-white">
            <h6 class="m-0 font-weight-bold">Grafik Pendapatan</h6>
         </div>
         <div class="card-body">
            <div class="chart-area">
               <canvas id="chart_pendapatan"></canvas>
            </div>
         </div>
      </div>
   </div>
</div>