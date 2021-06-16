-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2021 pada 18.03
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sme-branding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_produk` int(11) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto_produk`
--

INSERT INTO `foto_produk` (`id_produk`, `foto`) VALUES
(6, 'logo_bebas_14.png'),
(6, 'logo_bebas_52.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `freelancer_data`
--

CREATE TABLE `freelancer_data` (
  `id_user` int(11) NOT NULL,
  `kategori_keahlian` varchar(150) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `freelancer_data`
--

INSERT INTO `freelancer_data` (`id_user`, `kategori_keahlian`, `keterangan`) VALUES
(14, 'bisnis', 'Consequatur sit blanditiis quo autem ut id.'),
(15, 'bisnis', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `total_gaji` int(11) DEFAULT NULL,
  `status` enum('pending','lunas','belum lunas') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_pemesanan`
--

CREATE TABLE `hasil_pemesanan` (
  `id_hasil_pemesanan` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `link` text DEFAULT NULL,
  `hasil_foto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kemasan_produk`
--

CREATE TABLE `kemasan_produk` (
  `id_produk` int(11) DEFAULT NULL,
  `foto_kemasan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kemasan_produk`
--

INSERT INTO `kemasan_produk` (`id_produk`, `foto_kemasan`) VALUES
(6, 'logo_bebas_teks4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `detail_layanan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `harga`, `detail_layanan`) VALUES
(1, 'desain kemasan', 150000, NULL),
(2, 'desain logo', 100000, NULL),
(3, 'konsultasi branding', 120000, NULL),
(4, 'konsultasi bisnis', 150000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo_produk`
--

CREATE TABLE `logo_produk` (
  `id_produk` int(11) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pengelola` int(11) DEFAULT NULL,
  `id_freelancer` int(11) DEFAULT NULL,
  `id_layanan` int(11) DEFAULT NULL,
  `tgl_order` date DEFAULT curdate(),
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan_order` text DEFAULT NULL,
  `detail_revisi` text DEFAULT NULL,
  `status` enum('pending','mencari freelancer','on going','review','revisi','approval') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `id_produk`, `id_pengelola`, `id_freelancer`, `id_layanan`, `tgl_order`, `tgl_mulai`, `tgl_akhir`, `jumlah`, `keterangan_order`, `detail_revisi`, `status`) VALUES
(1, 1, NULL, NULL, 1, '2021-06-12', NULL, NULL, NULL, NULL, NULL, 'pending'),
(2, 2, NULL, NULL, 2, '2021-06-12', NULL, NULL, NULL, NULL, NULL, 'pending'),
(3, 2, NULL, NULL, 3, '2021-06-12', NULL, NULL, NULL, NULL, NULL, 'approval'),
(4, 6, NULL, NULL, 1, '2021-06-14', NULL, NULL, NULL, NULL, NULL, 'pending'),
(5, 6, NULL, NULL, 4, '2021-06-14', NULL, NULL, NULL, NULL, NULL, 'pending'),
(6, 7, NULL, NULL, 2, '2021-06-14', NULL, NULL, NULL, NULL, NULL, 'revisi'),
(7, 8, NULL, NULL, 1, '2021-06-14', NULL, NULL, NULL, NULL, NULL, 'on going');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `id_portofolio` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `bukti_portofolio` varchar(150) DEFAULT NULL,
  `detail_portofolio` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_umkm` int(11) NOT NULL,
  `nama_produk` varchar(150) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_umkm`, `nama_produk`, `keterangan`) VALUES
(1, 1, 'Produk A2', 'Contoh'),
(2, 1, 'Produk B4', 'Produk percoban kedua'),
(6, 2, 'contoh 1', 'contoh 2'),
(7, 1, 'Contoh lain', 'Contoh lain'),
(8, 1, 'asfasdf', 'asdfasdf'),
(9, 1, 'Percobaan svg', 'Percobaan upload file svg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_umkm` int(11) NOT NULL,
  `detail_testimoni` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `durasi` int(11) DEFAULT 300,
  `wkt_dibuat` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id_token`, `id_user`, `token`, `durasi`, `wkt_dibuat`) VALUES
(1, 1, '142d0eceb6ad8e115eb233cf49f235be', 86400, '2021-06-01 20:09:48'),
(8, 2, 'bcaf215d80087c0dd1b5009e5362b2ea', 86400, '2021-06-08 14:25:54'),
(9, 2, 'addbba0e09e7a640123c109530f9512c', 86400, '2021-06-08 14:45:11'),
(10, 2, '2691745795ab33f37b860d6094f96dd6', 86400, '2021-06-09 16:30:37'),
(11, 2, '8f5556f5daee15a991ca2336e670815f', 86400, '2021-06-11 19:30:01'),
(12, 2, '784c278368d1c499a433b7a98816cb0c', 86400, '2021-06-12 00:29:59'),
(13, 2, '509c9d3fc0aab06fc4ca24b3286726da', 86400, '2021-06-12 00:32:00'),
(14, 2, '80375ca46e0b0cf7f8bf95a2ad422497', 86400, '2021-06-13 23:41:00'),
(15, 2, '37c72c8be2a9c8aeddd16160740d1360', 86400, '2021-06-15 15:14:44'),
(16, 2, '6f4ea3f5ad09f10382fa2523b03964d4', 86400, '2021-06-16 15:25:08'),
(17, 17, '85c5295f2fcf3bf6556cb131fe6e5cfb', 86400, '2021-06-16 22:59:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` enum('pending','lunas','belum lunas','ditolak') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `umkm`
--

CREATE TABLE `umkm` (
  `id_umkm` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_umkm` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `umkm`
--

INSERT INTO `umkm` (`id_umkm`, `id_user`, `nama_umkm`, `alamat`) VALUES
(1, 2, 'quaerat', 'Ds. Bah Jaya No. 652, Sorong 69431, NTB'),
(2, 10, 'aspernatur', 'Dk. Yogyakarta No. 178, Singkawang 97081, Babel'),
(3, 11, 'rerum', 'Dk. Perintis Kemerdekaan No. 548, Bitung 11691, Sulteng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_wa` varchar(15) NOT NULL,
  `level` enum('pengelola','freelancer','umkm') DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `foto`, `email`, `no_wa`, `level`, `status`) VALUES
(1, 'admin1', '$2y$10$thqjwGLgTune4LndnZMEROvhbCXwf/WspvR/Hj3uAcJU6xBwizFZG', NULL, NULL, NULL, '', 'pengelola', '1'),
(2, 'umkm1', '$2y$10$s8KCMmcUrJw6jgN/eprHou31vdkaHYoUlH.LOhtL4IzeSRMHreiAG', 'Jane Amethyst', NULL, 'user0605@domain.com', '08112233445', 'umkm', '1'),
(4, 'wmandala', '$2y$10$u1dviTcd.1ec1NWh9uOohOse4kOb2k/yPZsIN9lxUkaT4SOKrTU/2', 'Cinthia Nuraini S.I.Kom', NULL, 'muwais@nasyiah.sch.id', '0815 6744 769', 'pengelola', '1'),
(10, 'wacana.vanya', '$2y$10$eVCGiXbm51Mf9pTCCmOYLOttl3y0O5QGICQO2G9tjEmiTivEgWZcG', 'Liman Narpati S.IP', NULL, 'hsimanjuntak@pratiwi.asia', '(+62) 853 1511 ', 'umkm', '1'),
(11, 'permata.jumadi', '$2y$10$LvVzx3fkQ39Tfu1cFquXFujgNyiIQXUu4ZlwA5QH4D1WgNbbjzcwm', 'Cinthia Nuraini S.I.Kom', NULL, 'salwa.winarsih@yahoo.com', '(+62) 368 3252 ', 'umkm', '1'),
(14, 'jpalastri', '$2y$10$VmHj5M30BcG0WC9Hju3hhesi1HvgNRwoIwlXfxr7wHhbZWAX/KF0W', 'Sakura Lailasari', NULL, 'cyolanda@yolanda.desa.id', '0484 1658 4801', 'freelancer', '1'),
(15, 'mala.saefullah', '$2y$10$EheenuHwjNTTkTQIrsFyjO8sgapfZYRqyGJjDt0MSe7rHgnu.x.YS', 'Mahesa Maulana S.IP', NULL, 'ndamanik@gmail.com', '(+62) 671 5678 ', 'freelancer', '1'),
(16, 'freelancer1', '$2y$10$TSDpPl8sx4Ogajxb9d9CPu5hvVbxr.UGLO1mdS2D9GaC3QsHqjsy2', 'Renanda Ruby', 'freelancer.png', 'user1506@domain.com', '08112233445', 'freelancer', '1'),
(17, 'umkm2', '$2y$10$lBB2xtZ7uTWiBGgn2NToz.NTQ8yz85Z.mniZ2PC7cspbyOE7AHXwW', 'Bebas', 'umkm.png', 'akjsf@domain.com', '0812', 'umkm', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `freelancer_data`
--
ALTER TABLE `freelancer_data`
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_transaksi` (`id_transaksi`) USING BTREE;

--
-- Indeks untuk tabel `hasil_pemesanan`
--
ALTER TABLE `hasil_pemesanan`
  ADD PRIMARY KEY (`id_hasil_pemesanan`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indeks untuk tabel `kemasan_produk`
--
ALTER TABLE `kemasan_produk`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `logo_produk`
--
ALTER TABLE `logo_produk`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pengelola` (`id_pengelola`),
  ADD KEY `id_freelancer` (`id_freelancer`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id_portofolio`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_umkm` (`id_umkm`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_umkm` (`id_umkm`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indeks untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_umkm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_pemesanan`
--
ALTER TABLE `hasil_pemesanan`
  MODIFY `id_hasil_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id_portofolio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD CONSTRAINT `foto_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `freelancer_data`
--
ALTER TABLE `freelancer_data`
  ADD CONSTRAINT `freelancer_data_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `gaji_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `hasil_pemesanan`
--
ALTER TABLE `hasil_pemesanan`
  ADD CONSTRAINT `hasil_pemesanan_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pemesanan` (`id_pesan`);

--
-- Ketidakleluasaan untuk tabel `kemasan_produk`
--
ALTER TABLE `kemasan_produk`
  ADD CONSTRAINT `kemasan_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `logo_produk`
--
ALTER TABLE `logo_produk`
  ADD CONSTRAINT `logo_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_pengelola`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_freelancer`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`),
  ADD CONSTRAINT `pemesanan_ibfk_5` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `portofolio`
--
ALTER TABLE `portofolio`
  ADD CONSTRAINT `portofolio_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `umkm` (`id_umkm`);

--
-- Ketidakleluasaan untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_umkm`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pemesanan` (`id_pesan`);

--
-- Ketidakleluasaan untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `umkm_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
