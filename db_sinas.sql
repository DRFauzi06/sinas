-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 11:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `debitur`
--

CREATE TABLE `debitur` (
  `id_debitur` int(11) NOT NULL,
  `nama_debitur` varchar(256) NOT NULL,
  `nik_debitur` varchar(256) NOT NULL,
  `tgl_lahir` varchar(256) NOT NULL,
  `jenis_kelamin` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `cif` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debitur`
--

INSERT INTO `debitur` (`id_debitur`, `nama_debitur`, `nik_debitur`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `cif`, `status`) VALUES
(7, 'Ridwan Panji', '32731228117600032', '1978-02-09', 'Laki-laki', 'Kota Bandung', '42382832', 1),
(8, 'Ridwan Panji', '32731228117600033', '2023-09-26', 'Laki-laki', 'Kota Bandung', '67480884', 1),
(11, 'dendi', '1234567890123456', '2023-09-05', 'Laki-laki', 'asd', '75782951', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `id_debitur` int(11) NOT NULL,
  `nama_akun` varchar(256) NOT NULL,
  `no_rekening` varchar(256) NOT NULL,
  `no_cif` varchar(256) NOT NULL,
  `tanggal_buka` varchar(256) NOT NULL,
  `tanggal_tutup` varchar(256) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `id_debitur`, `nama_akun`, `no_rekening`, `no_cif`, `tanggal_buka`, `tanggal_tutup`, `saldo`, `status`) VALUES
(14, 7, 'Tabunganku', '23092678', '42382832', '2023-09-26', NULL, 60000, 1),
(15, 7, 'Tabunganku 2', '23092638', '42382832', '2023-09-26', NULL, 0, 1),
(16, 7, 'Tabunganku', '23092723', '42382832', '2023-09-26', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_debitur` int(11) NOT NULL,
  `no_rekening` varchar(256) NOT NULL,
  `tanggal_transaksi` varchar(255) NOT NULL,
  `jam` varchar(256) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jenis_transaksi` varchar(256) NOT NULL,
  `debet` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_debitur`, `no_rekening`, `tanggal_transaksi`, `jam`, `nominal`, `jenis_transaksi`, `debet`) VALUES
(56, 7, '23092678', '2023-09-26', '14:14:17', 60000, 'Setoran Tunai', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `no_telepon` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `no_telepon`, `nama`) VALUES
(1, 'dendi', '$2a$12$KIRelhwX2XzRkEXanA/mh.7IdhDvT5sRyvHw1UyvPxIpjrkNYMw9W', '087805766936', 'Dendi Rizal Fauzi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `debitur`
--
ALTER TABLE `debitur`
  ADD PRIMARY KEY (`id_debitur`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_debitur` (`id_debitur`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_debitur` (`id_debitur`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `debitur`
--
ALTER TABLE `debitur`
  MODIFY `id_debitur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
