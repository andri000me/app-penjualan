-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Apr 2020 pada 08.06
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `krj_beli`
--

CREATE TABLE `krj_beli` (
  `id_krj` int(11) NOT NULL,
  `sess_id` int(10) NOT NULL,
  `prd_id` int(10) NOT NULL,
  `nama_prd` varchar(150) NOT NULL,
  `hrg_prd` int(10) NOT NULL,
  `jml_prd` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `krj_beli`
--
DELIMITER $$
CREATE TRIGGER `eksekusi_hapus` AFTER DELETE ON `krj_beli` FOR EACH ROW BEGIN    
    UPDATE produk SET stok_prd = stok_prd - OLD.jml_prd
    WHERE id_prd = OLD.prd_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eksekusi_ubah` AFTER UPDATE ON `krj_beli` FOR EACH ROW BEGIN    
    UPDATE produk SET stok_prd = stok_prd - OLD.jml_prd
    WHERE id_prd = OLD.prd_id;
    
    UPDATE produk SET stok_prd = stok_prd + NEW.jml_prd
    WHERE id_prd = NEW.prd_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `krj_jual`
--

CREATE TABLE `krj_jual` (
  `id_krj` int(11) NOT NULL,
  `sess_id` int(10) NOT NULL,
  `prd_id` int(10) NOT NULL,
  `nama_prd` varchar(150) NOT NULL,
  `hrg_prd` int(10) NOT NULL,
  `jml_prd` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `krj_jual`
--
DELIMITER $$
CREATE TRIGGER `hapus_dari_krj_jual` AFTER DELETE ON `krj_jual` FOR EACH ROW BEGIN    
    UPDATE produk SET stok_prd = stok_prd + OLD.jml_prd
    WHERE id_prd = OLD.prd_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubah_dari_krj_jual` AFTER UPDATE ON `krj_jual` FOR EACH ROW BEGIN    
    UPDATE produk SET stok_prd = stok_prd + OLD.jml_prd
    WHERE id_prd = OLD.prd_id;
    
    UPDATE produk SET stok_prd = stok_prd - NEW.jml_prd
    WHERE id_prd = NEW.prd_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_bl` int(10) NOT NULL,
  `tgl_bl` date NOT NULL,
  `supp_id` int(10) NOT NULL,
  `item_bl` int(5) NOT NULL,
  `total_bl` int(10) NOT NULL,
  `disk_bl` int(3) NOT NULL,
  `byr_bl` int(10) NOT NULL,
  `user_bl` varchar(150) NOT NULL,
  `wkt_bl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_bl`, `tgl_bl`, `supp_id`, `item_bl`, `total_bl`, `disk_bl`, `byr_bl`, `user_bl`, `wkt_bl`) VALUES
(312432536, '2020-03-31', 237282201, 1, 15000, 0, 15000, 'M IRFAN PERMANA', '2020-03-31 20:39:14'),
(538674609, '2020-03-31', 0, 0, 0, 0, 0, 'M IRFAN PERMANA', '2020-03-31 21:16:17'),
(907749098, '2020-03-29', 237282201, 1, 15000, 0, 15000, 'M IRFAN PERMANA', '2020-03-29 12:31:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_bdet` int(11) NOT NULL,
  `beli_id` int(10) NOT NULL,
  `prd_id` int(10) NOT NULL,
  `prd_nama` varchar(150) NOT NULL,
  `prd_hrg` int(10) NOT NULL,
  `jml_bdet` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_bdet`, `beli_id`, `prd_id`, `prd_nama`, `prd_hrg`, `jml_bdet`) VALUES
(1, 907749098, 390134448, 'PARACETAMOL TAB @10 500MG', 150, 100),
(2, 312432536, 390134448, 'PARACETAMOL TAB @10 500MG', 150, 100);

--
-- Trigger `pembelian_detail`
--
DELIMITER $$
CREATE TRIGGER `hapus_dari_pembelian_Detail` AFTER DELETE ON `pembelian_detail` FOR EACH ROW BEGIN    
    UPDATE produk SET stok_prd = stok_prd - OLD.jml_bdet
    WHERE id_prd = OLD.prd_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_lr` int(10) NOT NULL,
  `tgl_lr` date NOT NULL,
  `jns_lr` varchar(150) NOT NULL,
  `nmnl_lr` int(10) NOT NULL,
  `wkt_lr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_lr`, `tgl_lr`, `jns_lr`, `nmnl_lr`, `wkt_lr`) VALUES
(418826627, '2020-03-31', 'BELI PLASTIK KECIL', 5000, '2020-03-31 21:13:32'),
(720060212, '2020-03-18', 'BELI ATK ADMIN', 8000, '2020-03-21 23:29:39'),
(736157637, '2020-03-30', 'BELI PLASTIK KLIP KECIL', 15000, '2020-03-30 22:45:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jl` int(10) NOT NULL,
  `tgl_jl` date NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `item_jl` int(5) NOT NULL,
  `total_jl` int(10) NOT NULL,
  `disk_jl` int(3) NOT NULL,
  `byr_jl` int(10) NOT NULL,
  `user_jl` varchar(150) NOT NULL,
  `wkt_jl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_jl`, `tgl_jl`, `nama_customer`, `item_jl`, `total_jl`, `disk_jl`, `byr_jl`, `user_jl`, `wkt_jl`) VALUES
(195631198, '2020-03-30', 'UMUM', 3, 20000, 0, 20000, 'AQMARINA LAILANI', '2020-03-30 22:34:51'),
(247595374, '2020-04-09', 'IQBAL', 1, 3000, 0, 3000, 'AQMARINA LAILANI', '2020-04-09 14:46:22'),
(274212399, '2020-03-30', 'H.MUHYAR', 3, 27500, 0, 27500, 'AQMARINA LAILANI', '2020-03-30 22:43:46'),
(365051996, '2020-03-30', 'UMUM', 1, 5000, 0, 5000, 'AQMARINA LAILANI', '2020-03-30 22:58:28'),
(384563507, '2020-04-01', 'IBU RETNO', 2, 16000, 0, 16000, 'AQMARINA LAILANI', '2020-04-01 20:28:12'),
(513768840, '2020-03-29', 'UMUM', 2, 19700, 0, 19700, 'AQMARINA LAILANI', '2020-03-29 12:33:04'),
(790791869, '2020-03-30', 'H BAHARUDDIN', 2, 19000, 0, 19000, 'NUR FADLY RAMLI', '2020-03-30 23:33:02'),
(821610695, '2020-04-01', 'UMUM', 1, 37500, 0, 37500, 'AQMARINA LAILANI', '2020-04-01 20:13:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_jdet` int(11) NOT NULL,
  `jual_id` int(10) NOT NULL,
  `prd_id` int(10) NOT NULL,
  `prd_nama` varchar(150) NOT NULL,
  `prd_hrg` int(10) NOT NULL,
  `jml_jdet` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_jdet`, `jual_id`, `prd_id`, `prd_nama`, `prd_hrg`, `jml_jdet`) VALUES
(5, 513768840, 734162829, 'CEFADROXYL 500MG @10TAB', 970, 10),
(6, 513768840, 854868495, 'ASAM MEFENAMAT 500MG @10 TAB', 500, 20),
(7, 195631198, 854868495, 'ASAM MEFENAMAT 500MG @10 TAB', 500, 10),
(8, 195631198, 342112116, 'AMPICILLIN 500MG @10TAB', 750, 10),
(9, 195631198, 248971002, 'AMOXYCILLIN 500 MG TAB @10', 750, 10),
(10, 274212399, 390134448, 'PARACETAMOL TAB @10 500MG', 300, 50),
(11, 274212399, 854868495, 'ASAM MEFENAMAT 500MG @10 TAB', 500, 10),
(12, 274212399, 248971002, 'AMOXYCILLIN 500 MG TAB @10', 750, 10),
(13, 365051996, 602057917, 'BODREX FLU BATUK HIJAU @4TAB', 2500, 2),
(14, 790791869, 390134448, 'PARACETAMOL TAB @10 500MG', 300, 30),
(15, 790791869, 602057917, 'BODREX FLU BATUK HIJAU @4TAB', 2500, 4),
(16, 821610695, 248971002, 'AMOXYCILLIN 500 MG TAB @10', 750, 50),
(17, 384563507, 602057917, 'BODREX FLU BATUK HIJAU @4TAB', 2500, 4),
(18, 384563507, 390134448, 'PARACETAMOL TAB @10 500MG', 300, 20),
(19, 247595374, 390134448, 'PARACETAMOL TAB @10 500MG', 300, 10);

--
-- Trigger `penjualan_detail`
--
DELIMITER $$
CREATE TRIGGER `hapus_dari_penjualan_detail` AFTER DELETE ON `penjualan_detail` FOR EACH ROW BEGIN    
    UPDATE produk SET stok_prd = stok_prd + OLD.jml_jdet
    WHERE id_prd = OLD.prd_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_prd` int(10) NOT NULL,
  `nama_prd` varchar(200) NOT NULL,
  `stn_id` int(10) NOT NULL,
  `beli_prd` int(10) NOT NULL,
  `jual_prd` int(10) NOT NULL,
  `disk_prd` int(3) NOT NULL,
  `stok_prd` int(5) NOT NULL,
  `wkt_prd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_prd`, `nama_prd`, `stn_id`, `beli_prd`, `jual_prd`, `disk_prd`, `stok_prd`, `wkt_prd`) VALUES
(248971002, 'AMOXYCILLIN 500 MG TAB @10', 123456789, 500, 750, 0, 30, '2020-03-24 00:23:11'),
(298830756, 'BODREX MIGRA TAB @4', 398907743, 2200, 2500, 0, 0, '2020-04-01 19:18:24'),
(342112116, 'AMPICILLIN 500MG @10TAB', 123456789, 500, 750, 0, 90, '2020-03-22 13:15:17'),
(390134448, 'PARACETAMOL TAB @10 500MG', 123456789, 150, 300, 0, 90, '2020-03-24 00:14:39'),
(477073313, 'BODREXIN KOTAK @12 TABLET', 877843914, 4500, 6000, 0, 0, '2020-04-01 19:18:24'),
(549776380, 'BODREX FLU BATUK BIRU TAB @4 ', 398907743, 2350, 2500, 0, 0, '2020-04-01 19:13:46'),
(602057917, 'BODREX FLU BATUK HIJAU @4TAB', 398907743, 2350, 2500, 0, 90, '2020-03-24 21:09:49'),
(716350914, 'IBUPROFEN TAB 500MG @10', 123456789, 350, 500, 0, 100, '2020-03-26 04:42:02'),
(734162829, 'CEFADROXYL 500MG @10TAB', 123456789, 700, 1000, 3, 90, '2020-03-26 04:42:43'),
(854868495, 'ASAM MEFENAMAT 500MG @10 TAB', 123456789, 350, 500, 0, 460, '2020-03-24 19:51:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_stn` int(10) NOT NULL,
  `nama_stn` varchar(50) NOT NULL,
  `wkt_stn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_stn`, `nama_stn`, `wkt_stn`) VALUES
(123456789, 'TABLET', '2020-03-21 16:40:14'),
(190329765, 'AMPUL', '2020-04-02 12:22:09'),
(398907743, 'STRIP', '2020-03-21 17:37:50'),
(877843914, 'KOTAK', '2020-03-27 20:44:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supp` int(10) NOT NULL,
  `nama_supp` varchar(150) NOT NULL,
  `almt_supp` text NOT NULL,
  `kntk_supp` varchar(15) NOT NULL,
  `wkt_supp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supp`, `nama_supp`, `almt_supp`, `kntk_supp`, `wkt_supp`) VALUES
(237282201, 'PT. KIMIA FARMA ', 'jalan damanhuri samarinda ', '085246805241', '2020-03-26 04:41:08'),
(778393905, 'PT. BINA SAN PRIMA', 'jalan basuki rahmat, air hitam', '085246805241', '2020-03-24 23:48:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_usr` int(10) NOT NULL,
  `nama_usr` varchar(150) NOT NULL,
  `user_usr` varchar(50) NOT NULL,
  `pass_usr` varchar(150) NOT NULL,
  `lvl_usr` int(2) NOT NULL,
  `wkt_usr` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_usr`, `nama_usr`, `user_usr`, `pass_usr`, `lvl_usr`, `wkt_usr`) VALUES
(271985407, 'NUR FADLY RAMLI', 'nurfadlyramli', 'e10adc3949ba59abbe56e057f20f883e', 2, '2020-03-30 23:32:48'),
(513386427, 'AQMARINA LAILANI', 'aqmarinalailani', 'e10adc3949ba59abbe56e057f20f883e', 2, '2020-03-27 20:26:57'),
(703095392, 'M IRFAN PERMANA', 'mirfanpermana', 'f455f5a8421d755049228c4a700c1dea', 1, '2020-03-21 23:02:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `krj_beli`
--
ALTER TABLE `krj_beli`
  ADD PRIMARY KEY (`id_krj`);

--
-- Indeks untuk tabel `krj_jual`
--
ALTER TABLE `krj_jual`
  ADD PRIMARY KEY (`id_krj`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_bl`);

--
-- Indeks untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_bdet`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_lr`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_jl`);

--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_jdet`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_prd`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_stn`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supp`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usr`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `krj_beli`
--
ALTER TABLE `krj_beli`
  MODIFY `id_krj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `krj_jual`
--
ALTER TABLE `krj_jual`
  MODIFY `id_krj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_bdet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_jdet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
