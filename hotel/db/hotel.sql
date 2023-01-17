-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 07:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `id_checkin` varchar(7) NOT NULL,
  `nm_penyewa` varchar(20) DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `almt_penyewa` text DEFAULT NULL,
  `kd_kamar` varchar(7) DEFAULT NULL,
  `nm_kamar` varchar(20) DEFAULT NULL,
  `jns_kamar` varchar(15) DEFAULT NULL,
  `tgl_checkin` date DEFAULT NULL,
  `tgl_checkout` date DEFAULT NULL,
  `lama_menginap` int(3) DEFAULT NULL,
  `jml_kamar_disewa` int(4) DEFAULT NULL,
  `hrg_sewa` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`id`, `id_checkin`, `nm_penyewa`, `no_ktp`, `almt_penyewa`, `kd_kamar`, `nm_kamar`, `jns_kamar`, `tgl_checkin`, `tgl_checkout`, `lama_menginap`, `jml_kamar_disewa`, `hrg_sewa`, `total`) VALUES
(9, '1010-20', 'Maura Audirra', '320009881213', 'JL, Sukajadi, Bandung', 'KMR_001', 'Melati', '10x20', '2022-08-04', '2022-08-12', 8, 2, 200000, 3200000),
(11, '1010-22', 'Rafly', '320009881213', 'JL, Elang No 2', 'KMR_001', 'Melati', '10x20', '2022-08-06', '2022-08-14', 8, 1, 200000, 1600000),
(13, '1010-40', 'Rafly', '320009881321', 'jl, Setiabudhi. No 38', 'KMR_001', 'Melati', '10x20', '2022-08-05', '2022-08-12', 7, 5, 200000, 7000000);

--
-- Triggers `checkin`
--
DELIMITER $$
CREATE TRIGGER `ambilstok` AFTER INSERT ON `checkin` FOR EACH ROW BEGIN
	UPDATE data_hotel SET jml_kamar = jml_kamar - NEW.jml_kamar_disewa WHERE kd_kamar = NEW.kd_kamar; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) DEFAULT NULL,
  `id_checkout` varchar(7) NOT NULL,
  `nm_penyewa` varchar(20) DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `almt_penyewa` text DEFAULT NULL,
  `kd_kamar` varchar(7) DEFAULT NULL,
  `nm_kamar` varchar(20) DEFAULT NULL,
  `jns_kamar` varchar(15) DEFAULT NULL,
  `tgl_checkin` date DEFAULT NULL,
  `tgl_checkout` date DEFAULT NULL,
  `jml_kamar_disewa` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `id_checkout`, `nm_penyewa`, `no_ktp`, `almt_penyewa`, `kd_kamar`, `nm_kamar`, `jns_kamar`, `tgl_checkin`, `tgl_checkout`, `jml_kamar_disewa`) VALUES
(0, '100-100', 'Rafly', '320009881321', 'jl, Setiabudhi. No 38', 'KMR_001', 'Melati', '10x20', '2022-08-05', '2022-08-12', 5),
(0, '100-122', 'Rafly', '320009881213', 'JL, Elang No 2', 'KMR_001', 'Melati', '10x20', '2022-08-06', '2022-08-14', 1),
(0, '100-123', 'Maura Audirra', '320009881213', 'JL, Sukajadi, Bandung', 'KMR_001', 'Melati', '10x20', '2022-08-04', '2022-08-12', 2),
(0, '100-133', 'Rafly', '320009881213', 'JL, Elang No 2', 'KMR_001', 'Melati', '10x20', '2022-08-06', '2022-08-14', 1);

--
-- Triggers `checkout`
--
DELIMITER $$
CREATE TRIGGER `beristock` AFTER INSERT ON `checkout` FOR EACH ROW BEGIN
	UPDATE data_hotel SET jml_kamar = jml_kamar + NEW.jml_kamar_disewa WHERE kd_kamar = NEW.kd_kamar;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `data_hotel`
--

CREATE TABLE `data_hotel` (
  `id` int(11) NOT NULL,
  `kd_kamar` varchar(7) NOT NULL,
  `nm_kamar` varchar(20) DEFAULT NULL,
  `jns_kamar` varchar(15) DEFAULT NULL,
  `kps_kamar` int(2) DEFAULT NULL,
  `lok_kamar` varchar(10) DEFAULT NULL,
  `fas_kamar` text DEFAULT NULL,
  `jml_kamar` int(4) DEFAULT NULL,
  `hrg_sewa` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_hotel`
--

INSERT INTO `data_hotel` (`id`, `kd_kamar`, `nm_kamar`, `jns_kamar`, `kps_kamar`, `lok_kamar`, `fas_kamar`, `jml_kamar`, `hrg_sewa`) VALUES
(1, 'KMR_001', 'Melati', '10x20', 4, 'LT-2-003', 'AC,TV, WC', 19, 200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id_checkin`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `data_hotel`
--
ALTER TABLE `data_hotel`
  ADD PRIMARY KEY (`kd_kamar`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_hotel`
--
ALTER TABLE `data_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
