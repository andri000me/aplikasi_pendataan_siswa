 -- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2020 at 06:52 PM
-- Server version: 5.6.38
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(155) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `gambar`, `level`) VALUES
(1, 'candra dwi cahyo', 'admin@gmail.com', 'admin', 'created_by_candradwicahyo_5fb7f4fd7f5a6.png', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` text NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tahun_ajaran` int(10) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `ttl_ibu` text NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `ttl_ayah` text NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `masuk` varchar(20) NOT NULL,
  `keluar` text NOT NULL,
  `spp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nama`, `ttl`, `jk`, `alamat`, `tahun_ajaran`, `nama_ibu`, `ttl_ibu`, `nama_ayah`, `ttl_ayah`, `kelas`, `jurusan`, `masuk`, `keluar`, `spp`) VALUES
(4, 'candra dwi cahyo', '20 mei 2004', 'laki - laki', 'bedali indah', 2020, 'endang', '16 july 1975', 'suyibto', '12 september 1965', 'xii', 'teknik informatika', '2020-11-20', '2023-11-20', 120000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
