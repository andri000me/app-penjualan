<?php

// views data utama
if (isset($_GET['view'])) $view = $_GET['view'];
else $view = "beranda";

if ($view == "beranda") include("app/beranda.php");
elseif ($view == "operator") include("app/operator.php");
elseif ($view == "keluar") include("src/keluar.php");

// views CRUD data standar
elseif ($view == "satuan") include("app/satuan.php");
elseif ($view == "supplier") include("app/supplier.php");
elseif ($view == "user") include("app/user.php");
elseif ($view == "pengeluaran") include("app/pengeluaran.php");

// views data produk
elseif ($view == "produk") include("app/produk.php");
elseif ($view == "produk-import-excel") include("app/produk_import_excel.php");

// views data pembelian
elseif ($view == "pembelian") include("app/pembelian.php");
elseif ($view == "pembelian-lihat") include("app/pembelian_lihat.php");
elseif ($view == "pembelian-baru") include("lib/pembelian/pembelian_baru.php");
elseif ($view == "pembelian-batal") include("lib/pembelian/pembelian_batal.php");
elseif ($view == "pembelian-detail") include("lib/pembelian/pembelian_detail.php");
elseif ($view == "pembelian-simpan") include("lib/pembelian/pembelian_simpan.php");

// views data penjualan
elseif ($view == "penjualan") include("app/penjualan.php");
elseif ($view == "penjualan-lihat") include("app/penjualan_lihat.php");
elseif ($view == "penjualan-baru") include("lib/penjualan/penjualan_baru.php");
elseif ($view == "penjualan-batal") include("lib/penjualan/penjualan_batal.php");
elseif ($view == "penjualan-detail") include("lib/penjualan/penjualan_detail.php");
elseif ($view == "penjualan-simpan") include("lib/penjualan/penjualan_simpan.php");

// views data laporan
elseif ($view == "laporan") include("app/laporan.php");
elseif ($view == "laporan-periode") include("app/laporan_periode.php");

// views data backup dan restor
elseif ($view == "backup") include("app/backup.php");
