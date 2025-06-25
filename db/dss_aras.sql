-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss_aras`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_data` int(11) DEFAULT NULL,
  `nama_alternatif` varchar(100) DEFAULT NULL,
  `processor` int(11) DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `tipe_storage` int(11) DEFAULT NULL,
  `kapasitas_storage` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_data`, `nama_alternatif`, `processor`, `ram`, `tipe_storage`, `kapasitas_storage`, `harga`) VALUES
(1, 1, 'A1', 4, 4, 4, 5, 4),
(2, 2, 'A2', 3, 4, 5, 3, 4),
(3, 3, 'A3', 1, 4, 5, 3, 3),
(4, 4, 'A4', 3, 4, 5, 3, 4),
(5, 5, 'A5', 1, 2, 4, 5, 3),
(6, 6, 'A6', 4, 4, 4, 5, 4),
(7, 7, 'A7', 4, 4, 4, 5, 4),
(8, 8, 'A8', 5, 5, 5, 5, 5),
(9, 9, 'A9', 3, 4, 4, 5, 4),
(10, 10, 'A10', 3, 4, 4, 5, 4),
(11, 11, 'A11', 4, 4, 5, 4, 5),
(12, 12, 'A12', 5, 5, 5, 5, 5),
(13, 13, 'A13', 5, 4, 5, 4, 5),
(14, 14, 'A14', 3, 4, 5, 4, 4),
(15, 15, 'A15', 3, 4, 4, 5, 4),
(16, 16, 'A16', 4, 4, 5, 4, 5),
(17, 17, 'A17', 2, 2, 5, 4, 1),
(18, 18, 'A18', 4, 4, 5, 4, 5),
(19, 19, 'A19', 4, 4, 5, 4, 4),
(20, 20, 'A20', 3, 4, 5, 3, 4),
(21, 21, 'A21', 3, 2, 5, 5, 3),
(22, 22, 'A22', 5, 4, 5, 5, 5),
(23, 23, 'A23', 3, 4, 5, 4, 4),
(24, 24, 'A24', 5, 5, 5, 5, 5),
(25, 25, 'A25', 3, 4, 5, 5, 4),
(26, 26, 'A26', 4, 4, 5, 4, 5),
(27, 27, 'A27', 4, 4, 4, 5, 5),
(28, 28, 'A28', 4, 4, 5, 4, 4),
(29, 29, 'A29', 4, 4, 4, 5, 5),
(30, 30, 'A30', 3, 2, 5, 3, 3),
(31, 31, 'A31', 5, 4, 5, 5, 5),
(32, 32, 'A32', 4, 5, 5, 4, 5),
(33, 33, 'A33', 4, 4, 5, 4, 5),
(34, 34, 'A34', 4, 4, 5, 4, 5),
(35, 35, 'A35', 3, 4, 5, 3, 5),
(36, 36, 'A36', 4, 4, 5, 5, 4),
(37, 37, 'A37', 4, 4, 5, 4, 5),
(38, 38, 'A38', 3, 4, 4, 5, 4),
(39, 39, 'A39', 5, 4, 5, 5, 4),
(40, 40, 'A40', 3, 5, 5, 4, 5),
(41, 41, 'A41', 4, 2, 5, 4, 4),
(42, 42, 'A42', 5, 5, 5, 3, 5),
(43, 43, 'A43', 4, 5, 5, 4, 5),
(44, 44, 'A44', 3, 4, 4, 5, 5),
(45, 45, 'A45', 3, 2, 4, 5, 3),
(46, 46, 'A46', 2, 2, 4, 5, 4),
(47, 47, 'A47', 3, 2, 5, 4, 2),
(48, 48, 'A48', 4, 4, 5, 4, 4),
(49, 49, 'A49', 3, 4, 4, 5, 5),
(50, 50, 'A50', 4, 2, 5, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_mentah`
--

CREATE TABLE `data_mentah` (
  `id_data` int(11) NOT NULL,
  `nama_laptop` varchar(100) DEFAULT NULL,
  `processor` varchar(50) DEFAULT NULL,
  `ram` varchar(20) DEFAULT NULL,
  `tipe_storage` varchar(20) DEFAULT NULL,
  `kapasitas_storage` varchar(20) DEFAULT NULL,
  `harga` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mentah`
--

INSERT INTO `data_mentah` (`id_data`, `nama_laptop`, `processor`, `ram`, `tipe_storage`, `kapasitas_storage`, `harga`) VALUES
(1, 'Lenovo Ideapad S145 Core i5 10th Gen', 'Intel Core i5 (10th Gen)', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp8.409.000'),
(2, 'Lenovo IdeaPad Core i3 11th Gen', 'Intel Core i3 (11th Gen)', '8 GB DDR4 RAM', 'SSD', '256 GB', 'Rp8.409.000'),
(3, 'HP Pentium Quad Core', 'Intel Pentium Quad Core Processor', '8 GB DDR4 RAM', 'SSD', '256 GB', 'Rp6.021.000'),
(4, 'HP 14s Core i3 11th Gen', 'Intel Core i3 (11th Gen)', '8 GB DDR4 RAM', 'SSD', '256 GB', 'Rp7.832.000'),
(5, 'HP 15s Athlon Dual Core', 'AMD Athlon Dual Core', '4 GB DDR4 RAM', 'HDD', '1 TB', 'Rp6.212.000'),
(6, 'Lenovo IdeaPad 3 Core i5 10th Gen', 'Intel Core i5 (10th Gen)', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp8.212.000'),
(7, 'HP Pavilion Gaming Ryzen 5 Quad Core 3550H', 'AMD Ryzen 5 Quad Core Processor', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp9.753.000'),
(8, 'acer Predator Helios 300 Core i7 10th Gen', 'Intel Core i7 (10th Gen)', '16 GB DDR4 RAM', 'HDD', '1 TB', 'Rp22.375.000'),
(9, 'ASUS VivoBook 15 Core i3 10th Gen', 'Intel Core i3 (10th Gen)', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp7.267.000'),
(10, 'HP 15s Ryzen 3 Dual Core 3250U', 'AMD Ryzen 3 Dual Core Processor', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp7.073.000'),
(11, 'ASUS VivoBook Gaming Core i5 9th Gen', 'Intel Core i5 (9th Gen)', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp11.289.000'),
(12, 'MSI GL65 Leopard Core i7 10th Gen', 'Intel Core i7 (10th Gen)', '16 GB DDR4 RAM', 'SSD', '512 GB', 'Rp20.992.000'),
(13, 'HP 14 Core i3 11th Gen', 'AMD Ryzen 7 Octa Core Processor', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp10.798.000'),
(14, 'HP 14s Core i3 11th Gen', 'Intel Core i3 (11th Gen)', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp9.173.000'),
(15, 'HP 15s Core i3 11th Gen', 'Intel Core i3 (11th Gen)', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp8.019.000'),
(16, 'Lenovo Ideapad Core i5 11th Gen', 'Intel Core i5 (11th Gen)', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp11.997.000'),
(17, 'Avita Cosmos 2 in 1 Celeron Dual Core', 'Intel Celeron Dual Core Processor', '4 GB DDR4 RAM', 'SSD', '512 GB', 'Rp3.249.000'),
(18, 'HP 15s Core i5 11th Gen', 'Intel Core i5 11th Gen', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp11.269.000'),
(19, 'acer Aspire 7 Ryzen 5 Quad Core 3550H', 'AMD Ryzen 5 Quad Core Processor', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp9.939.000'),
(20, 'Lenovo IdeaPad Core i3 11th Gen', 'Intel Core i3 11th Gen', '8 GB DDR4 RAM', 'SSD', '256 GB', 'Rp8.599.000'),
(21, 'ASUS Ryzen 3 Dual Core', 'AMD Ryzen 3 Dual Core', '4 GB DDR4 RAM', 'HDD', '1 TB', 'Rp6.309.000'),
(22, 'Lenovo Legion Core i7 9th Gen', 'Intel Core i7 9th Gen', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp13.358.000'),
(23, 'HP 15s Ryzen 3 Dual Core 3250U', 'AMD Ryzen 3 Dual Core Processor', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp8.019.000'),
(24, 'Lenovo IdeaPad Ryzen 7 Octa Core 5700U', 'AMD Ryzen 7 Octa Core Processor', '16 GB DDR4 RAM', 'HDD', '1 TB', 'Rp12.996.000'),
(25, 'HP 15s Core i3 10th Gen', 'Intel Core i3 10th Gen', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp8.405.000'),
(26, 'ASUS VivoBook 15 Core i5 10th Gen', 'Intel Core i5 10th Gen', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp10.126.000'),
(27, 'ASUS VivoBook Ultra 14 Core i5 11th Gen', 'Intel Core i5 11th Gen', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp11.446.000'),
(28, 'Lenovo Ideapad S145 Core i5 10th Gen', 'Intel Core i5 10th Gen', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp8.409.000'),
(29, 'acer Aspire 7 Core i5 9th Gen', 'Intel Core i5 9th Gen', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp10.869.000'),
(30, 'Lenovo IdeaPad Core i3 10th Gen', 'Intel Core i3 10th Gen', '4 GB DDR4 RAM', 'SSD', '256 GB', 'Rp6.872.000'),
(31, 'APPLE MacBook Air M1', 'Intel Core i7 10th Gen', '8 GB DDR4 RAM', 'SSD', '256 GB', 'Rp17.756.000'),
(32, 'acer Predator Helios 300 Core i7 10th Gen', 'Intel Core i5 9th Gen', '16 GB DDR4 RAM', 'HDD', '1 TB', 'Rp22.375.000'),
(33, 'MSI GF63 Thin Core i5 9th Gen', 'Intel Core i5 11th Gen', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp10.869.000'),
(34, 'HP 14s Core i5 11th Gen', 'Intel Core i5 11th Gen', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp10.507.000'),
(35, 'ASUS VivoBook Ultra 14 Core i5 11th Gen', 'Intel Core i5 11th Gen', '8 GB DDR4 RAM', 'SSD', '256 GB', 'Rp11.998.000'),
(36, 'Lenovo Ideapad Core i3 11th Gen', 'Intel Core i3 11th Gen', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp8.409.000'),
(37, 'Lenovo IdeaPad Gaming Ryzen 5 Hexa Core 4600H', 'AMD Ryzen 5 Hexa Core Processor', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp12.221.000'),
(38, 'HP 15s Ryzen 5 Quad Core 3500U', 'AMD Ryzen 5 Quad Core Processor', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp9.358.000'),
(39, 'HP 15s Core i3 10th Gen', 'Intel Core i7 10th Gen', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp7.933.000'),
(40, 'MSI GL65 Leopard Core i7 10th Gen', 'Intel Core i3 10th Gen', '16 GB DDR4 RAM', 'SSD', '512 GB', 'Rp20.992.000'),
(41, 'ASUS Core i3 10th Gen', 'Intel Core i5 11th Gen', '4 GB DDR4 RAM', 'SSD', '512 GB', 'Rp7.451.000'),
(42, 'APPLE MacBook Pro Core i7 9th Gen', 'Intel Core i7 10th Gen', '16 GB DDR4 RAM', 'SSD', '256 GB', 'Rp38.168.000'),
(43, 'HP Pavilion Core i7 11th Gen', 'Intel Core i5 11th Gen', '16 GB DDR4 RAM', 'SSD', '512 GB', 'Rp16.239.000'),
(44, 'Lenovo Ideapad Core i5 11th Gen', 'AMD Ryzen 3 Dual Core Processor', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp11.997.000'),
(45, 'Lenovo Ideapad S145 Ryzen 3 Dual Core 3200U', 'Intel Core i3 10th Gen', '4 GB DDR4 RAM', 'HDD', '1 TB', 'Rp5.927.000'),
(46, 'HP 14s Core i3 10th Gen', 'Intel Celeron Dual Core Processor', '4 GB DDR4 RAM', 'HDD', '1 TB', 'Rp7.105.000'),
(47, 'ASUS Celeron Dual Core', 'Intel Core i3 11th Gen', '4 GB DDR4 RAM', 'SSD', '512 GB', 'Rp4.586.000'),
(48, 'Lenovo Ideapad Core i3 11th Gen', 'Intel Core i5 11th Gen', '8 GB DDR4 RAM', 'SSD', '512 GB', 'Rp8.589.000'),
(49, 'ASUS VivoBook Ultra 14 Core i5 11th Gen', 'AMD Ryzen 3 Dual Core Processor', '8 GB DDR4 RAM', 'HDD', '1 TB', 'Rp11.446.000'),
(50, 'HP 15s Ryzen 3 Dual Core 3250U', 'Intel Core i5 11th Gen', '4 GB DDR4 RAM', 'SSD', '512 GB', 'Rp6.309.000');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_akhir`
--

CREATE TABLE `hasil_akhir` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `skor` float DEFAULT NULL,
  `preferensi` float DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_akhir`
--

INSERT INTO `hasil_akhir` (`id`, `id_alternatif`, `nama`, `skor`, `preferensi`, `ranking`) VALUES
(1655, NULL, 'Avita Cosmos 2 in 1 Celeron Dual Core', 0.0251136, 0.73929, 1),
(1656, NULL, 'acer Predator Helios 300 Core i7 10th Gen', 0.0235327, 0.692752, 2),
(1657, NULL, 'MSI GL65 Leopard Core i7 10th Gen', 0.0235327, 0.692752, 3),
(1658, NULL, 'Lenovo IdeaPad Ryzen 7 Octa Core 5700U', 0.0235327, 0.692752, 4),
(1659, NULL, 'HP 15s Core i3 10th Gen', 0.0230327, 0.678031, 5),
(1660, NULL, 'Lenovo Legion Core i7 9th Gen', 0.0223803, 0.658828, 6),
(1661, NULL, 'APPLE MacBook Air M1', 0.0223803, 0.658828, 7),
(1662, NULL, 'APPLE MacBook Pro Core i7 9th Gen', 0.0219744, 0.646878, 8),
(1663, NULL, 'HP 14 Core i3 11th Gen', 0.0216012, 0.635891, 9),
(1664, NULL, 'Lenovo Ideapad Core i3 11th Gen', 0.0214927, 0.632697, 10),
(1665, NULL, 'acer Predator Helios 300 Core i7 10th Gen', 0.0212136, 0.62448, 11),
(1666, NULL, 'HP Pavilion Core i7 11th Gen', 0.0212136, 0.62448, 12),
(1667, NULL, 'Lenovo Ideapad S145 Core i5 10th Gen', 0.0207795, 0.611704, 13),
(1668, NULL, 'Lenovo IdeaPad 3 Core i5 10th Gen', 0.0207795, 0.611704, 14),
(1669, NULL, 'HP Pavilion Gaming Ryzen 5 Quad Core 3550H', 0.0207795, 0.611704, 15),
(1670, NULL, 'acer Aspire 7 Ryzen 5 Quad Core 3550H', 0.0207135, 0.60976, 16),
(1671, NULL, 'Lenovo Ideapad S145 Core i5 10th Gen', 0.0207135, 0.60976, 17),
(1672, NULL, 'Lenovo Ideapad Core i3 11th Gen', 0.0207135, 0.60976, 18),
(1673, NULL, 'ASUS Celeron Dual Core', 0.0201304, 0.592594, 19),
(1674, NULL, 'ASUS VivoBook Ultra 14 Core i5 11th Gen', 0.0201272, 0.592501, 20),
(1675, NULL, 'acer Aspire 7 Core i5 9th Gen', 0.0201272, 0.592501, 21),
(1676, NULL, 'ASUS VivoBook Gaming Core i5 9th Gen', 0.0200612, 0.590557, 22),
(1677, NULL, 'Lenovo Ideapad Core i5 11th Gen', 0.0200612, 0.590557, 23),
(1678, NULL, 'HP 15s Core i5 11th Gen', 0.0200612, 0.590557, 24),
(1679, NULL, 'ASUS VivoBook 15 Core i5 10th Gen', 0.0200612, 0.590557, 25),
(1680, NULL, 'MSI GF63 Thin Core i5 9th Gen', 0.0200612, 0.590557, 26),
(1681, NULL, 'HP 14s Core i5 11th Gen', 0.0200612, 0.590557, 27),
(1682, NULL, 'Lenovo IdeaPad Gaming Ryzen 5 Hexa Core 4600H', 0.0200612, 0.590557, 28),
(1683, NULL, 'HP 15s Core i3 10th Gen', 0.0199527, 0.587363, 29),
(1684, NULL, 'MSI GL65 Leopard Core i7 10th Gen', 0.0196736, 0.579146, 30),
(1685, NULL, 'HP 15s Ryzen 3 Dual Core 3250U', 0.0194959, 0.573918, 31),
(1686, NULL, 'ASUS VivoBook 15 Core i3 10th Gen', 0.0192395, 0.566369, 32),
(1687, NULL, 'HP 15s Ryzen 3 Dual Core 3250U', 0.0192395, 0.566369, 33),
(1688, NULL, 'HP 15s Core i3 11th Gen', 0.0192395, 0.566369, 34),
(1689, NULL, 'HP 15s Ryzen 5 Quad Core 3500U', 0.0192395, 0.566369, 35),
(1690, NULL, 'HP 14s Core i3 11th Gen', 0.0191735, 0.564426, 36),
(1691, NULL, 'HP 15s Ryzen 3 Dual Core 3250U', 0.0191735, 0.564426, 37),
(1692, NULL, 'ASUS Ryzen 3 Dual Core', 0.0187351, 0.55152, 38),
(1693, NULL, 'Lenovo Ideapad Core i5 11th Gen', 0.0185872, 0.547166, 39),
(1694, NULL, 'ASUS VivoBook Ultra 14 Core i5 11th Gen', 0.0185872, 0.547166, 40),
(1695, NULL, 'ASUS Core i3 10th Gen', 0.0184087, 0.541913, 41),
(1696, NULL, 'Lenovo IdeaPad Core i3 11th Gen', 0.0183943, 0.541489, 42),
(1697, NULL, 'HP 14s Core i3 11th Gen', 0.0183943, 0.541489, 43),
(1698, NULL, 'Lenovo IdeaPad Core i3 11th Gen', 0.0183943, 0.541489, 44),
(1699, NULL, 'Lenovo Ideapad S145 Ryzen 3 Dual Core 3200U', 0.018022, 0.530527, 45),
(1700, NULL, 'ASUS VivoBook Ultra 14 Core i5 11th Gen', 0.017742, 0.522286, 46),
(1701, NULL, 'Lenovo IdeaPad Core i3 10th Gen', 0.0171768, 0.505647, 47),
(1702, NULL, 'HP Pentium Quad Core', 0.0164015, 0.482825, 48),
(1703, NULL, 'HP 14s Core i3 10th Gen', 0.0153948, 0.453188, 49),
(1704, NULL, 'HP 15s Athlon Dual Core', 0.014942, 0.439859, 50);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `tipe_kriteria` enum('benefit','cost') NOT NULL,
  `bobot_kriteria` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `tipe_kriteria`, `bobot_kriteria`) VALUES
(1, 'processor', 'benefit', 0.2772),
(2, 'ram', 'benefit', 0.2178),
(3, 'tipe_storage', 'benefit', 0.1683),
(4, 'kapasitas_storage', 'benefit', 0.1683),
(5, 'harga', 'cost', 0.1683);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `id_data` (`id_data`);

--
-- Indexes for table `data_mentah`
--
ALTER TABLE `data_mentah`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `data_mentah`
--
ALTER TABLE `data_mentah`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1705;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`id_data`) REFERENCES `data_mentah` (`id_data`);

--
-- Constraints for table `hasil_akhir`
--
ALTER TABLE `hasil_akhir`
  ADD CONSTRAINT `hasil_akhir_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
