-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2020 at 09:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proj_dns`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `attempt` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_name`, `admin_password`, `attempt`, `created_at`) VALUES
(1, 'admindns', 'Admin PSG', '$2y$10$Jec4PQAjDnTwfaWT1NsrC.CbdI5LnOdH3k4welTRzhQisK2fjfs/K', NULL, 1577178924);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `alternatif_id` int(11) NOT NULL,
  `alternatif_name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`alternatif_id`, `alternatif_name`, `created_at`) VALUES
(1, 'Gizi Buruk', 1577812081),
(2, 'Gizi Kurang', 1577812070),
(3, 'Gizi Baik', 1577812057),
(5, 'Gizi Lebih', 1577812092);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pertanyaan`
--

CREATE TABLE `jawaban_pertanyaan` (
  `jp_id` int(11) NOT NULL,
  `kp_id` int(11) DEFAULT NULL,
  `alternatif_id` int(11) NOT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `bobot` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_pertanyaan`
--

INSERT INTO `jawaban_pertanyaan` (`jp_id`, `kp_id`, `alternatif_id`, `jawaban`, `bobot`, `created_at`) VALUES
(1, 1, 5, 'Selalu', 4, 1577813251),
(2, 1, 3, 'Sering', 3, 1577813440),
(3, 1, 2, 'Kadang-kadang', 2, 1577813500),
(4, 1, 1, 'Tidak Pernah', 1, 1577813530),
(5, 2, 5, 'Selalu', 4, 1577813251),
(6, 2, 3, 'Sering', 3, 1577813440),
(7, 2, 2, 'Kadang-kadang', 2, 1577813500),
(8, 2, 1, 'Tidak Pernah', 1, 1577813530),
(9, 3, 5, 'Selalu', 4, 1577813251),
(10, 3, 3, 'Sering', 3, 1577813440),
(11, 3, 2, 'Kadang-kadang', 2, 1577813500),
(12, 3, 1, 'Tidak Pernah', 1, 1577813530),
(13, 4, 5, 'Selalu', 4, 1577813251),
(14, 4, 3, 'Sering', 3, 1577813440),
(15, 4, 2, 'Kadang-kadang', 2, 1577813500),
(16, 4, 1, 'Tidak Pernah', 1, 1577813530),
(17, 5, 1, 'Selalu', 4, 1577813251),
(18, 5, 2, 'Sering', 3, 1577813440),
(19, 5, 3, 'Kadang-kadang', 2, 1577813500),
(20, 5, 5, 'Tidak Pernah', 1, 1577813530),
(21, 6, 5, 'Selalu', 4, 1577813251),
(22, 6, 3, 'Sering', 3, 1577813440),
(23, 6, 2, 'Kadang-kadang', 2, 1577813500),
(24, 6, 1, 'Tidak Pernah', 1, 1577813530),
(25, 7, 5, 'Selalu', 4, 1577813251),
(26, 7, 3, 'Sering', 3, 1577813440),
(27, 7, 2, 'Kadang-kadang', 2, 1577813500),
(28, 7, 1, 'Tidak Pernah', 1, 1577813530),
(29, 8, 5, 'Selalu', 4, 1577813251),
(30, 8, 3, 'Sering', 3, 1577813440),
(31, 8, 2, 'Kadang-kadang', 2, 1577813500),
(32, 8, 1, 'Tidak Pernah', 1, 1577813530),
(33, 9, 5, 'Selalu', 4, 1577813251),
(34, 9, 3, 'Sering', 3, 1577813440),
(35, 9, 2, 'Kadang-kadang', 2, 1577813500),
(36, 9, 1, 'Tidak Pernah', 1, 1577813530),
(37, 10, 5, 'Selalu', 4, 1577813251),
(38, 10, 3, 'Sering', 3, 1577813440),
(39, 10, 2, 'Kadang-kadang', 2, 1577813500),
(40, 10, 1, 'Tidak Pernah', 1, 1577813530),
(41, 11, 5, 'Selalu', 4, 1577813251),
(42, 11, 3, 'Sering', 3, 1577813440),
(43, 11, 2, 'Kadang-kadang', 2, 1577813500),
(44, 11, 1, 'Tidak Pernah', 1, 1577813530),
(45, 12, 5, 'Selalu', 4, 1577813251),
(46, 12, 3, 'Sering', 3, 1577813440),
(47, 12, 2, 'Kadang-kadang', 2, 1577813500),
(48, 12, 1, 'Tidak Pernah', 1, 1577813530),
(49, 13, 5, 'Selalu', 4, 1577813251),
(50, 13, 3, 'Sering', 3, 1577813440),
(51, 13, 2, 'Kadang-kadang', 2, 1577813500),
(52, 13, 1, 'Tidak Pernah', 1, 1577813530),
(53, 14, 5, 'Selalu', 4, 1577813251),
(54, 14, 3, 'Sering', 3, 1577813440),
(55, 14, 2, 'Kadang-kadang', 2, 1577813500),
(56, 14, 1, 'Tidak Pernah', 1, 1577813530),
(57, 15, 5, 'Selalu', 4, 1577813251),
(58, 15, 3, 'Sering', 3, 1577813440),
(59, 15, 2, 'Kadang-kadang', 2, 1577813500),
(60, 15, 1, 'Tidak Pernah', 1, 1577813530);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_name` varchar(255) DEFAULT NULL,
  `kriteria_bobot` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `kriteria_name`, `kriteria_bobot`, `created_at`) VALUES
(1, 'Berat Badan menurut umur (BB/U)', 70, 1577804227),
(2, 'Tinggi Badan Menurut Umur (TB/U)', 15, 1577804241),
(3, 'Berat Badan Menurut Tinggi Badan (BB/TB)', 15, 1577804253);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_pertanyaan`
--

CREATE TABLE `kriteria_pertanyaan` (
  `kp_id` int(11) NOT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `pertanyaan` varchar(500) DEFAULT NULL,
  `bobot` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_pertanyaan`
--

INSERT INTO `kriteria_pertanyaan` (`kp_id`, `kriteria_id`, `pertanyaan`, `bobot`, `created_at`) VALUES
(1, 1, 'Anak saya memiliki nafsu makan yang baik', 15, 1577812968),
(2, 1, 'Pola makan anak saya 3 kali dalam sehari dengan tepat waktu', 20, 1577813015),
(3, 1, 'Menu makanan yang di konsumsi anak saya setiap hari berupa makanan pokok, sayur, lauk, buah dan susu', 40, 1577813042),
(4, 1, 'Anak saya imunisasi dengan tepat waktu (sesuai jadwal)', 15, 1577813071),
(5, 1, 'berat  badan anak saya setiap bulannya mengalamai kenaikan', 10, 1577813096),
(6, 2, 'Tinggi badan anak saya setiap bulannya mengalami kenaikan', 10, 1577813137),
(7, 2, 'Setiap hari anak saya makan makanan bergizi terutama lauk pauk, sayuran dan buah-buahan', 35, 1577813163),
(8, 2, 'Saat umur 0-6 bulan, saya memberikan ASI Eksklusif kepada anak', 25, 1577813163),
(9, 2, 'Saat umur > 6 bulan saya memberikan makanan pendamping ASI', 20, 1577813163),
(10, 2, 'Dalam sehari-hari, anak saya  bergerak dengan aktif', 10, 1577813163),
(11, 3, 'Saya memberikan vitamin pertumbuhan untuk anak', 5, 1577813163),
(12, 3, 'Saat berkunjung ke posyandu, saya berkonsultasi ke petugas gizi mengenai perkembangan anak saya', 20, 1577813163),
(13, 3, 'Setiap tahun, anak saya mendapatkan Vitamin A 2 kali yaitu bulan Februari dan Agustus', 10, 1577813163),
(14, 3, 'Saya memperhatikan komposisi zat gizi dan variasi menu dalam menyusun menu makanan untuk anak', 50, 1577813163),
(15, 3, 'Saya menggunkan bahan yang masih segar dan berkualitas baik dalam mengolah makanan untuk anak', 15, 1577813163);

-- --------------------------------------------------------

--
-- Table structure for table `ksak`
--

CREATE TABLE `ksak` (
  `ksak_id` int(11) NOT NULL,
  `c1` int(11) DEFAULT NULL,
  `c2` int(11) DEFAULT NULL,
  `c3` int(11) DEFAULT NULL,
  `c4` int(11) DEFAULT NULL,
  `c5` int(11) DEFAULT NULL,
  `c6` int(11) DEFAULT NULL,
  `c7` int(11) DEFAULT NULL,
  `c8` int(11) DEFAULT NULL,
  `c9` int(11) DEFAULT NULL,
  `c10` int(11) DEFAULT NULL,
  `c11` int(11) DEFAULT NULL,
  `c12` int(11) DEFAULT NULL,
  `c13` int(11) DEFAULT NULL,
  `c14` int(11) DEFAULT NULL,
  `c15` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Perhitungan Kecocokan setiap alternatif pada setiap kriteria';

--
-- Dumping data for table `ksak`
--

INSERT INTO `ksak` (`ksak_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`, `c12`, `c13`, `c14`, `c15`) VALUES
(59, 4, 3, 3, 3, 2, 3, 3, 3, 4, 3, 3, 3, 2, 3, 3),
(64, 1, 4, 4, 3, 3, 3, 2, 2, 1, 3, 4, 3, 3, 3, 2),
(65, 4, 3, 3, 3, 3, 2, 2, 3, 3, 4, 4, 3, 3, 3, 2),
(66, 4, 3, 3, 3, 4, 3, 2, 3, 3, 3, 3, 2, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `bk_id` int(11) NOT NULL,
  `kp_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nama_ot` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `umur` varchar(20) DEFAULT NULL,
  `hasil` varchar(255) DEFAULT NULL,
  `bobot` int(1) DEFAULT 0,
  `total` varchar(128) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responden`
--

INSERT INTO `responden` (`bk_id`, `kp_id`, `kriteria_id`, `nama_ot`, `name`, `lastname`, `alamat`, `umur`, `hasil`, `bobot`, `total`, `created_at`) VALUES
(76, 1, 1, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.105', 5, '0.76', 1582984598),
(77, 2, 1, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.14', 3, '0.76', 1582984598),
(78, 3, 1, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.28', 3, '0.76', 1582984598),
(79, 4, 1, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.105', 3, '0.76', 1582984598),
(80, 5, 1, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.07', 2, '0.76', 1582984598),
(81, 6, 2, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.015', 3, '0.76', 1582984598),
(82, 7, 2, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.0525', 3, '0.76', 1582984598),
(83, 8, 2, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.0375', 3, '0.76', 1582984598),
(84, 9, 2, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.03', 5, '0.76', 1582984598),
(85, 10, 2, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.015', 3, '0.76', 1582984598),
(86, 11, 3, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.0075', 3, '0.76', 1582984598),
(87, 12, 3, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.03', 3, '0.76', 1582984598),
(88, 13, 3, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.015', 2, '0.76', 1582984598),
(89, 14, 3, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.075', 3, '0.76', 1582984598),
(90, 15, 3, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.0225', 3, '0.76', 1582984598),
(151, 1, 1, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.105', 1, '0.86', 1583159054),
(152, 2, 1, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.14', 4, '0.86', 1583159054),
(153, 3, 1, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.28', 4, '0.86', 1583159054),
(154, 4, 1, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.105', 3, '0.86', 1583159054),
(155, 5, 1, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.07', 3, '0.86', 1583159054),
(156, 6, 2, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.015', 3, '0.86', 1583159054),
(157, 7, 2, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.0525', 2, '0.86', 1583159054),
(158, 8, 2, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.0375', 2, '0.86', 1583159054),
(159, 9, 2, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.03', 1, '0.86', 1583159054),
(160, 10, 2, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.015', 3, '0.86', 1583159054),
(161, 11, 3, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.0075', 4, '0.86', 1583159054),
(162, 12, 3, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.03', 3, '0.86', 1583159054),
(163, 13, 3, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.015', 3, '0.86', 1583159054),
(164, 14, 3, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.075', 3, '0.86', 1583159054),
(165, 15, 3, 'hnnn', 'aa', 'hhhh', 'jl. nn', '1 bulan', '0.0225', 2, '0.86', 1583159054),
(166, 1, 1, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.105', 4, '0.86', 1583283238),
(167, 2, 1, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.14', 3, '0.86', 1583283238),
(168, 3, 1, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.28', 3, '0.86', 1583283238),
(169, 4, 1, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.105', 3, '0.86', 1583283238),
(170, 5, 1, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.07', 3, '0.86', 1583283238),
(171, 6, 2, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.015', 2, '0.86', 1583283238),
(172, 7, 2, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.0525', 2, '0.86', 1583283238),
(173, 8, 2, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.0375', 3, '0.86', 1583283238),
(174, 9, 2, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.03', 3, '0.86', 1583283238),
(175, 10, 2, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.015', 4, '0.86', 1583283238),
(176, 11, 3, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.0075', 4, '0.86', 1583283238),
(177, 12, 3, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.03', 3, '0.86', 1583283238),
(178, 13, 3, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.015', 3, '0.86', 1583283238),
(179, 14, 3, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.075', 3, '0.86', 1583283238),
(180, 15, 3, 'asd', 'asd', 'asd', 'asd', '1 bulan', '0.0225', 2, '0.86', 1583283238),
(181, 1, 1, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.105', 4, '0.83', 1583283353),
(182, 2, 1, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.14', 3, '0.83', 1583283353),
(183, 3, 1, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.28', 3, '0.83', 1583283353),
(184, 4, 1, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.105', 3, '0.83', 1583283353),
(185, 5, 1, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.07', 4, '0.83', 1583283353),
(186, 6, 2, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.015', 3, '0.83', 1583283353),
(187, 7, 2, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.0525', 2, '0.83', 1583283353),
(188, 8, 2, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.0375', 3, '0.83', 1583283353),
(189, 9, 2, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.03', 3, '0.83', 1583283353),
(190, 10, 2, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.015', 3, '0.83', 1583283353),
(191, 11, 3, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.0075', 3, '0.83', 1583283353),
(192, 12, 3, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.03', 2, '0.83', 1583283353),
(193, 13, 3, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.015', 2, '0.83', 1583283353),
(194, 14, 3, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.075', 3, '0.83', 1583283353),
(195, 15, 3, 'cvbcv', 'asd', 'ty', 'asd', '1 bulan', '0.0225', 1, '0.83', 1583283353);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('a69e512e62ae9576b72fd04d4daae701ee3eeb33', '::1', 1582978580, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323937383538303b),
('9d715543f156572e621d145ec9a01cc82a316c8d', '::1', 1582978990, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323937383939303b),
('fc1288c99cbf61063604aae14fc6630c2f5adbb7', '::1', 1582979120, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323937383939303b6e616d657c733a393a2241646d696e20505347223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b),
('8b0b6d35cf56226eb6e576285a67aa62cb3b69ae', '::1', 1582980665, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938303636353b),
('489e04fb240eaa670efb1d93160150693ef42f68', '::1', 1582981069, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938313036393b),
('ea164aa24065b9617b9aa21f01a40ff37749e56f', '::1', 1582981377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938313337373b),
('8eb81c6235df0e0af2f63aea7891f9975a4bd867', '::1', 1582981683, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938313638333b),
('c2ef170889e39022b253b7ea397d17aa1cdea366', '::1', 1582982416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938323431363b),
('bd515d0a505c597e110d49cbbbd58ea07d3e219d', '::1', 1582982746, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938323734363b),
('8b06b12cc9fae28288900f1a468ca55e8c3817e4', '::1', 1582984106, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938343130363b),
('59f19ee070e1e4d67879d311d7d0a933600a7e90', '::1', 1582984524, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938343532343b),
('06878eb2a0303c673cfcec52e45e020f04d0cade', '::1', 1582984839, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938343833393b),
('7b1a180a09ca2750da96145a084478663d109f42', '::1', 1582985305, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938353330353b),
('4e088b9571ff46582eedb6a4d9238dc5df03657f', '::1', 1582985647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538323938353330353b),
('96a31dda875622ec7c319e174c7d4d4b6d2e8e46', '::1', 1583033609, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333033333539393b),
('979d61a3ff9c88dc0a473ebaeee75e1ee67574ad', '::1', 1583158653, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333135383635333b),
('6899ac3730c9d119055fd3d244a6bbe0bcbc52e0', '::1', 1583159002, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333135393030323b),
('c0445bb800312b0124ac6adc03e0108d67fdd88d', '::1', 1583159071, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333135393030323b),
('90dad70a274ddd76103d9364bf600d096063a6ff', '::1', 1583196873, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333139363837333b),
('51b5aa3f538a88e05395aafaf70461a96d3d49da', '::1', 1583197776, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333139373737363b),
('630882eccf6ca7ccc32e7023d61b0fd3c813bd21', '::1', 1583203068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333230333036383b),
('4014fca589c94179b1e28ae3d11fa99ae29d90e3', '::1', 1583204650, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333230343635303b),
('52353a80cbc742aded78375fb060292a72fd386c', '::1', 1583205203, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333230353230333b),
('63822e9600553fcf27669893332b47f7cd6f81bf', '::1', 1583205665, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333230353636353b),
('cf275878c8e48261a578a5ce8ff9356a1f29685a', '::1', 1583205666, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333230353636353b),
('0f9688af64b4915999a8a7f90e1d826cb9929844', '::1', 1583278762, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333237383736323b),
('c0054c2d2488e2f34c45a2691c57cf729f7c2e29', '::1', 1583279064, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333237393036343b),
('3e7309efe8f2a0dd42824a9b602bc29aa7325c02', '::1', 1583279410, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333237393431303b),
('4053549a1c1126adefa544e28f5ac617fe41c3c6', '::1', 1583279726, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333237393732363b),
('3ad93410eba00eb6699ab0d12f223d6153d48393', '::1', 1583280062, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333238303036323b),
('7f381d1aecc858bcd969292fc1070b13a50694fb', '::1', 1583280416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333238303431363b),
('d74e30bb95b483c70c5ae030718238c40691f0f2', '::1', 1583280939, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333238303933393b),
('12180e6b352a39a0ad2ff3901ecc3be1112aff7e', '::1', 1583281571, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333238313537313b),
('04625e66703e0bdeaf8af1db355fdd8b46f89d32', '::1', 1583283029, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333238333032393b),
('a55b268be63c14520d73c91c3752ae8f017f9d5b', '::1', 1583283353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333238333335333b),
('8ec47ae8c977dafe444678dcb6b3cc6d4e01af32', '::1', 1583283762, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333238333736323b),
('dc720959403ce55946a1882ceb4eff0bf784f06b', '::1', 1583283762, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333238333736323b),
('5029711de3f7f31f5941902e6b0b1b0a7828ea99', '::1', 1583372446, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333337323434363b6e616d657c733a393a2241646d696e20505347223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6d6573736167657c733a32323a224461746120626572686173696c20646968617075732e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226e6577223b7d),
('b9032ecb313797a636ff68bc360ca95753c20529', '::1', 1583372446, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333337323434363b6e616d657c733a393a2241646d696e20505347223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b6d6573736167657c733a32323a224461746120626572686173696c20646968617075732e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('dded048c22c749a743e0e2df79f430f984a98877', '::1', 1583410892, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333431303739313b),
('01ced479e3b70b5a998c8e31c6fa2afae1c00f05', '::1', 1583484363, 0x5f5f63695f6c6173745f726567656e65726174657c693a313538333438343333313b6e616d657c733a393a2241646d696e20505347223b69734c6f67676f6e7c623a313b697341646d696e7c623a313b);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_username` (`admin_username`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`alternatif_id`);

--
-- Indexes for table `jawaban_pertanyaan`
--
ALTER TABLE `jawaban_pertanyaan`
  ADD PRIMARY KEY (`jp_id`),
  ADD KEY `kp_id` (`kp_id`),
  ADD KEY `alternatif_id` (`alternatif_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `kriteria_pertanyaan`
--
ALTER TABLE `kriteria_pertanyaan`
  ADD PRIMARY KEY (`kp_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `ksak`
--
ALTER TABLE `ksak`
  ADD PRIMARY KEY (`ksak_id`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`bk_id`),
  ADD KEY `kp_id` (`kp_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `alternatif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jawaban_pertanyaan`
--
ALTER TABLE `jawaban_pertanyaan`
  MODIFY `jp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria_pertanyaan`
--
ALTER TABLE `kriteria_pertanyaan`
  MODIFY `kp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ksak`
--
ALTER TABLE `ksak`
  MODIFY `ksak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban_pertanyaan`
--
ALTER TABLE `jawaban_pertanyaan`
  ADD CONSTRAINT `jawaban_pertanyaan_ibfk_1` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`alternatif_id`);

--
-- Constraints for table `responden`
--
ALTER TABLE `responden`
  ADD CONSTRAINT `kid` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`kriteria_id`),
  ADD CONSTRAINT `kp` FOREIGN KEY (`kp_id`) REFERENCES `kriteria_pertanyaan` (`kp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
