-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 04:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rinaldirent`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `no_plat` varchar(12) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `jenis_transmisi` varchar(10) NOT NULL,
  `harga_sewa` varchar(12) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `no_plat`, `merek`, `jenis_transmisi`, `harga_sewa`, `warna`, `status`, `gambar`) VALUES
(18, 'DA 7777 MR', 'Xpander', 'Matic', '400000', 'Silver', 'Ready', '60dee190c0223.jpg'),
(19, 'DA 8888 WR', 'Avanza', 'Matic', '300000', 'Putih', 'Disewa', '60dee59428b2f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `no_plat` varchar(12) NOT NULL,
  `id_sewa` varchar(8) NOT NULL,
  `no_id` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(8) NOT NULL,
  `lama_sewa` varchar(3) NOT NULL,
  `total_biaya` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`no_plat`, `id_sewa`, `no_id`, `nama_lengkap`, `jenis_kelamin`, `lama_sewa`, `total_biaya`) VALUES
('DA 8888 WR', 'REN001', '6372040408004555', 'Rinaldi', 'Pria', '3', '900000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_id` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `akun` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `no_id`, `nama_lengkap`, `no_hp`, `akun`) VALUES
(1, 'admin', 'admin12', '6372040408000001', 'Muhammad Rinaldi', '0895705038835', 'admin'),
(7, 'kamal', 'kamal1234', '6372040207000001', 'Muhammad Kamal', '085248362237', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
