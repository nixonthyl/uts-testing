-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2025 at 07:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(100) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `jenis` enum('makanan','minuman') NOT NULL,
  `harga_porsi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis`, `harga_porsi`) VALUES
(1, 'Ayam Betutu', 'makanan', 35000),
(2, 'Ayam Kremes', 'makanan', 28000),
(3, 'Bebek Madura', 'makanan', 38000),
(4, 'Gado-Gado', 'makanan', 25000),
(5, 'Ikan Asam Padeh', 'makanan', 40000),
(6, 'Ikan Bakar', 'makanan', 45000),
(7, 'Mie Aceh', 'makanan', 27000),
(8, 'Model Palembang', 'makanan', 20000),
(9, 'Nasi Goreng', 'makanan', 25000),
(10, 'Nasi Liwet', 'makanan', 32000),
(11, 'Nasi Putih', 'makanan', 8000),
(12, 'Pempek', 'makanan', 22000),
(13, 'Rawon', 'makanan', 35000),
(14, 'Sate Lilit', 'makanan', 30000),
(15, 'Sate Madura', 'makanan', 30000),
(16, 'Sop Buntut', 'makanan', 55000),
(17, 'Soto Betawi', 'makanan', 38000),
(18, 'Tahu Gejrot', 'makanan', 15000),
(19, 'Bajigur', 'minuman', 15000),
(20, 'Es Cendol', 'minuman', 18000),
(21, 'Es Jeruk Peras', 'minuman', 12000),
(22, 'Es Kacang Merah', 'minuman', 20000),
(23, 'Es Kuwut', 'minuman', 18000),
(24, 'Es Lemon Tea', 'minuman', 15000),
(25, 'Es Pisang Ijo', 'minuman', 22000),
(26, 'Teh Talua', 'minuman', 18000),
(27, 'Wedang Jahe', 'minuman', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

CREATE TABLE `metode` (
  `id_metode` int(11) NOT NULL,
  `metode_pembayaran` enum('QRIS','Kartu Debit','E-Wallet','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode`
--

INSERT INTO `metode` (`id_metode`, `metode_pembayaran`) VALUES
(1, 'QRIS'),
(2, 'Kartu Debit'),
(3, 'E-Wallet');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` int(12) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama_pelanggan`, `alamat`, `no_telp`, `level`) VALUES
(1, 'vlan', '123', 'kivlan', 'ayam', 344, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `id_metode`, `total_bayar`, `tanggal`) VALUES
(15, 1, 2, 103000, '2025-07-21 06:48:21'),
(16, 1, 1, 65000, '2025-07-21 07:42:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_metode` (`id_metode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `metode`
--
ALTER TABLE `metode`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_metode`) REFERENCES `metode` (`id_metode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
