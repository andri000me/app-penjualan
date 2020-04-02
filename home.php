<?php
session_start();
if (!empty($_SESSION['level'])) {
   include("src/pengaturan.php");
   include("src/rupiah.php");
   include("src/tanggal.php");
?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title><?= $title ?></title>

      <!-- favicon -->
      <link rel="shortcut icon" href="asset/img/favicon.svg" type="image/x-icon">

      <!-- Bootstrap core CSS -->
      <link href="asset/bootstrap-4.3.1/css/bootstrap.css" rel="stylesheet">

      <!-- fontawesome core CSS -->
      <link href="asset/fontawesome-free-5.11.2/css/all.min.css" rel="stylesheet">

      <!-- datatables core CSS -->
      <link href="asset/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

      <!-- sweetalert core CSS -->
      <link href="asset/sweetalert/sweetalert.min.css" rel="stylesheet">

      <!-- jquery core CSS -->
      <link href="asset/jquery/jquery-ui.min.css" rel="stylesheet">
   </head>

   <body>
      <div class="container-fluid">

         <!-- header -->
         <header class="blog-header py-1">
            <div class="row flex-nowrap justify-content-between align-items-center">
               <div class="col-6">
                  <span class="blog-header-logo text-dark h1" href="#">
                     <?= $title ?>
                  </span>
               </div>
               <div class="col-6 text-right">
                  <img src="asset/img/favicon.svg" alt="" width="60" height="60">
               </div>
            </div>
         </header>
         <hr style="margin-top: 5px;">

         <!-- navigasi utama -->
         <?php
         if (isset($_GET['view'])) $view = $_GET['view'];

         if ($_SESSION['level'] == 1) {
         ?>
            <!-- MENU UNTUK ADMINISTRATOR -->
            <div class="nav-scroller py-1 mb-2" style="margin-top: -10px;">
               <ul class="nav nav-pills nav-fill">
                  <li class="nav-item">
                     <a class="nav-link <?php if ($view == "beranda") echo 'active'; ?>" href="?view=beranda">
                        <i class="fa fa-home"></i> Beranda
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($view == "satuan") echo 'active'; ?>" href="?view=satuan">
                        <i class="fa fa-list-ul"></i> Satuan
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($view == "produk" or $view == "produk-import-excel") echo 'active'; ?>" href="?view=produk">
                        <i class="fa fa-cubes"></i> Produk
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($view == "supplier") echo 'active'; ?>" href="?view=supplier">
                        <i class="fa fa-truck"></i> Supplier
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($view == "user") echo 'active'; ?>" href="?view=user">
                        <i class="fa fa-users"></i> User
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($view == "penjualan" or $view == "penjualan-detail" or $view == "penjualan-lihat") echo 'active'; ?>" href="?view=penjualan">
                        <i class="fa fa-shopping-cart"></i> Penjualan
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($view == "pembelian" or $view == "pembelian-detail" or $view == "pembelian-lihat") echo 'active'; ?>" href="?view=pembelian">
                        <i class="fa fa-paste"></i> Pembelian
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($view == "pengeluaran") echo 'active'; ?>" href="?view=pengeluaran">
                        <i class="fa fa-credit-card"></i> Pengeluaran
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($view == "laporan" or $view == "laporan-periode") echo 'active'; ?>" href="?view=laporan">
                        <i class="fa fa-file"></i> Laporan
                     </a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link <?php if ($view == "backup") echo 'active'; ?> dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> Pengaturan</a>
                     <div class="dropdown-menu">
                        <button class="dropdown-item" onclick="profilModal()">
                           <i class="fa fa-sm fa-user"></i> &nbsp; Profil
                        </button>
                        <button class="dropdown-item" onclick="ubahpassModal()">
                           <i class="fa fa-sm fa-key"></i> &nbsp; Ubah Password
                        </button>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item" onclick="backupDatabase()">
                           <i class="fa fa-sm fa-database"></i> &nbsp; Backup Data
                        </button>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#" onclick="return keluarApp();">
                        <i class="fa fa-power-off"></i> Keluar
                     </a>
                  </li>
               </ul>
            </div>

            <!-- MENU UNTUK OPERATOR -->
         <?php } else { ?>
            <div class="row py-1 mb-2 justify-content-between" style="margin-top: -10px;">
               <div class="col">
                  <ul class="nav nav-pills">
                     <li class="nav-item">
                        <a class="nav-link <?php if ($view == "operator") echo 'active'; ?>" href="?view=operator">
                           <i class="fa fa-home"></i> Operator
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?php if ($view == "produk") echo 'active'; ?>" href="?view=produk">
                           <i class="fa fa-cubes"></i> Produk
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?php if ($view == "penjualan" or $view == "penjualan-detail" or $view == "penjualan-lihat") echo 'active'; ?>" href="?view=penjualan">
                           <i class="fa fa-shopping-cart"></i> Transaksi Penjualan
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="col">
                  <ul class="nav nav-pills float-right">
                     <li class="nav-item dropdown justify-content-end">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i> Pengaturan</a>
                        <div class="dropdown-menu">
                           <button class="dropdown-item" onclick="profilModal()">
                              <i class="fa fa-user"></i> Profil
                           </button>
                           <button class="dropdown-item" onclick="ubahpassModal()">
                              <i class="fa fa-key"></i> Ubah Password
                           </button>
                        </div>
                     </li>
                     <li class="nav-item justify-content-end">
                        <a class="nav-link" href="#" onclick="return keluarApp();">
                           <i class="fa fa-power-off"></i> Keluar
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         <?php } ?>

         <hr style="margin-top: -2px;">

         <!-- konten utama -->
         <?php include("src/kontrol_halaman.php"); ?>

         <!-- modal profil -->
         <?php include("app/profil.php"); ?>

         <!-- modal ubah_password -->
         <?php include("app/ubah_password.php"); ?>
      </div>

      <!-- Bootstrap core JavaScript-->
      <script src="asset/jquery/jquery-3.4.1.js"></script>
      <script src="asset/jquery/jquery-ui.min.js"></script>
      <script src="asset/bootstrap-4.3.1/js/bootstrap.bundle.min.js"></script>
      <script src="asset/datatables/jquery.dataTables.min.js"></script>
      <script src="asset/datatables/dataTables.bootstrap4.min.js"></script>
      <script src="asset/sweetalert/sweetalert.min.js"></script>
      <script src="asset/chart.js/Chart.min.js"></script>
      <script src="asset/printarea/js/jquery.printarea.js"></script>

      <!-- script custom -->
      <?php include("script/home_js.php"); ?>
      <?php include("src/kontrol_script.php"); ?>

   </body>

   </html>

<?php
} else {
   header("location: index.php");
}
?>