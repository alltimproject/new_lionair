-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2018 at 05:57 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lion_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `email` varchar(25) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_administrator`
--

INSERT INTO `tb_administrator` (`email`, `firstname`, `lastname`, `password`, `level`) VALUES
('acclion@liongroup.com', 'Isyana', 'Sarasvati', '1673448ee7064c989d02579c534f6b66', 'accounting'),
('admlion@liongroup.com', 'Wahyu', 'Alfarisi', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `kd_booking` varchar(20) NOT NULL,
  `tgl_booking` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adult` int(1) NOT NULL,
  `child` int(1) NOT NULL,
  `infant` int(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tipe_booking` varchar(20) NOT NULL,
  `gelar` varchar(6) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(80) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`kd_booking`, `tgl_booking`, `adult`, `child`, `infant`, `status`, `tipe_booking`, `gelar`, `nama_depan`, `nama_belakang`, `alamat`, `no_tlp`, `email`) VALUES
('BOMTNI', '2018-07-02 14:38:29', 0, 0, 0, 'Confirmed', 'Multi Trip', 'Mr.', 'Haviz', 'Indra Maulana', 'Jakarta', '081355754092', 'haviz_im@outlook.com'),
('HAVIZIM', '2018-07-02 15:33:58', 1, 1, 1, 'RFN', 'Multi Trip', 'Mr.', 'Haviz', 'Indra Maulana', 'Jakarta', '081355754092', 'haviz_im@outlook.com'),
('RFABYL', '2018-07-02 14:38:30', 0, 0, 0, 'RFN', 'Multi Trip', 'Mr.', 'Haviz', 'Indra Maulana', 'Jakarta', '081355754092', 'haviz_im@outlook.com'),
('RFEHSO', '2018-07-02 15:21:29', 0, 0, 0, 'RFN', 'Multi Trip', 'Mr.', 'Haviz', 'Indra Maulana', 'Jakarta', '081355754092', 'haviz_im@outlook.com'),
('WAHYUA', '2018-07-02 14:25:23', 2, 0, 0, 'Confirmed', 'Multi Trip', 'Mr.', 'Wahyu', 'Alfarisi', 'Bekasi', '085752291376', 'wahyualfa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `kd_booking` varchar(20) NOT NULL,
  `no_penerbangan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`kd_booking`, `no_penerbangan`) VALUES
('HAVIZIM', 'JT001'),
('WAHYUA', 'JT001'),
('WAHYUA', 'JT031'),
('BOMTNI', 'JT001'),
('RFABYL', 'JT031'),
('RFEHSO', 'JT031');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbangan`
--

CREATE TABLE `tb_penerbangan` (
  `no_penerbangan` varchar(10) NOT NULL,
  `kota_asal` varchar(30) NOT NULL,
  `kota_tujuan` varchar(30) NOT NULL,
  `tgl_keberangkatan` datetime NOT NULL,
  `tgl_tiba` datetime NOT NULL,
  `class` varchar(10) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `provider` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penerbangan`
--

INSERT INTO `tb_penerbangan` (`no_penerbangan`, `kota_asal`, `kota_tujuan`, `tgl_keberangkatan`, `tgl_tiba`, `class`, `harga_tiket`, `provider`) VALUES
('JT001', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-08 01:00:00', '2018-08-08 03:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT002', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-26 02:00:00', '2018-08-26 04:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT003', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-08 03:00:00', '2018-08-08 05:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT004', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-08 04:00:00', '2018-08-08 06:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT005', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-08 05:00:00', '2018-08-08 07:00:00', 'Promo', 450000, 'Lion Air'),
('JT006', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT007', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT008', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT009', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT010', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT011', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT012', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT013', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT014', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT015', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT016', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT017', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT018', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT019', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT020', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT021', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT022', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT023', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT024', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT025', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT026', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT027', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT028', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT029', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT030', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT031', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-09 22:00:00', '2018-08-09 23:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT032', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT033', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT034', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT035', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT036', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT037', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT038', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT039', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT040', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT041', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT042', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT043', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT044', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT045', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT046', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT047', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT048', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT049', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT050', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT051', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT052', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT053', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT054', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT055', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT056', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT057', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT058', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT059', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT060', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT061', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT062', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT063', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT064', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT065', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT066', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT067', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT068', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT069', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT070', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT071', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT072', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT073', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT074', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT075', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT076', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT077', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT078', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT079', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT080', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT081', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT082', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT083', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT084', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT085', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT086', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT087', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT088', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT089', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT090', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT091', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT092', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT093', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT094', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT095', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT096', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT097', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT098', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT099', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT100', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Promo', 450000, 'Lion Air');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pessenger`
--

CREATE TABLE `tb_pessenger` (
  `id_tiket` int(11) NOT NULL,
  `no_tiket` varchar(50) NOT NULL,
  `nama_pessenger` varchar(100) NOT NULL,
  `tipe_pessenger` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kd_booking` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pessenger`
--

INSERT INTO `tb_pessenger` (`id_tiket`, `no_tiket`, `nama_pessenger`, `tipe_pessenger`, `tgl_lahir`, `kd_booking`) VALUES
(1, '902100', 'Haviz Indra Maulana', 'Adult', '2018-07-11', 'RFEHSO'),
(2, '902101', 'Devan Dirgantara Putra', 'Child', '2018-07-18', 'BOMTNI'),
(3, '902103', 'Kalyssa Innara Putri', 'Infant', '2018-07-18', 'BOMTNI'),
(4, '902105', 'Wahyu Alfarisi', 'Adult', '2018-07-18', 'WAHYUA'),
(5, '902106', 'Yumayzera Wondal', 'Adult', '2018-07-18', 'WAHYUA'),
(6, '902101', 'Devan Dirgantara Putra', 'Child', '2018-07-18', 'RFABYL'),
(7, '902103', 'Kalyssa Innara Putri', 'Infant', '2018-07-18', 'RFABYL'),
(8, '902100', 'Haviz Indra Maulana', 'Adult', '2018-07-11', 'HAVIZIM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_refund`
--

CREATE TABLE `tb_refund` (
  `no_refund` varchar(10) NOT NULL,
  `tgl_refund` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_refund` int(11) NOT NULL,
  `kd_booking` varchar(10) NOT NULL,
  `refund_name` varchar(100) NOT NULL,
  `refund_alamat` varchar(300) NOT NULL,
  `refund_telepon` varchar(15) NOT NULL,
  `refund_email` varchar(50) NOT NULL,
  `refund_status` varchar(20) NOT NULL,
  `secure_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_refund`
--

INSERT INTO `tb_refund` (`no_refund`, `tgl_refund`, `total_refund`, `kd_booking`, `refund_name`, `refund_alamat`, `refund_telepon`, `refund_email`, `refund_status`, `secure_code`) VALUES
('RFCIW5', '2018-07-02 15:33:58', 735000, 'HAVIZIM', 'Mr.  Haviz Indra Maulana', 'Jakarta', '081355754092', 'haviz_im@outlook.com', 'Verify', '5ef06647d837068632a55d486744434a'),
('RFEHSO', '2018-07-02 15:21:30', 735000, 'HAVIZIM', 'Mr.  Haviz Indra Maulana', 'Jakarta', '081355754092', 'haviz_im@outlook.com', 'Verify', '21c3812d200717ebd04094247708c1ad'),
('RFGDCL', '2018-07-03 11:56:37', 1470000, 'WAHYUA', 'Mr.  wahyu alfarisi', 'kalimalang', '087654321123', 'wahyu@gmail.com', 'onproses', ''),
('RFIL2H', '2018-07-03 00:28:23', 2940000, 'WAHYUA', 'Mr.  Haviz Indra Maulana', 'Jakarta', '081355754092', 'haviz_im@outlook.com', 'onproses', ''),
('RFSW5U', '2018-07-02 15:17:11', 735000, 'HAVIZIM', 'Mr.  Haviz Indra Maulana', 'Jakarta', '081355754092', 'haviz_im@outlook.com', 'notverify', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_refund_detail`
--

CREATE TABLE `tb_refund_detail` (
  `no_refund` varchar(10) NOT NULL,
  `no_penerbangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_refund_detail`
--

INSERT INTO `tb_refund_detail` (`no_refund`, `no_penerbangan`) VALUES
('RFSW5U', 'JT031'),
('RFEHSO', 'JT031'),
('RFCIW5', 'JT001'),
('RFIL2H', 'JT001'),
('RFIL2H', 'JT031'),
('RFGDCL', 'JT001'),
('RFGDCL', 'JT031');

-- --------------------------------------------------------

--
-- Table structure for table `tb_refund_pessenger`
--

CREATE TABLE `tb_refund_pessenger` (
  `no_refund` varchar(10) NOT NULL,
  `no_tiket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_refund_pessenger`
--

INSERT INTO `tb_refund_pessenger` (`no_refund`, `no_tiket`) VALUES
('RFSW5U', '902100'),
('RFEHSO', '902100'),
('RFCIW5', '902100'),
('RFIL2H', '902105'),
('RFIL2H', '902106'),
('RFGDCL', '902106');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reschedul`
--

CREATE TABLE `tb_reschedul` (
  `no_reschedule` varchar(10) NOT NULL,
  `tgl_reschedul` datetime NOT NULL,
  `total_reschedul` int(11) NOT NULL,
  `kd_booking` varchar(20) NOT NULL,
  `reschedul_name` varchar(100) NOT NULL,
  `reschedul_alamat` varchar(300) NOT NULL,
  `reschedul_telepon` varchar(15) NOT NULL,
  `reschedul_email` varchar(50) NOT NULL,
  `reschedul_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reschedul`
--

INSERT INTO `tb_reschedul` (`no_reschedule`, `tgl_reschedul`, `total_reschedul`, `kd_booking`, `reschedul_name`, `reschedul_alamat`, `reschedul_telepon`, `reschedul_email`, `reschedul_status`) VALUES
('RSRIZK', '2018-07-01 00:00:00', 1200000, 'RZKYMM', 'Wahyu', 'jakarat', '081317726873', 'wahyualfarisi', 'onproses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reschedul_detail`
--

CREATE TABLE `tb_reschedul_detail` (
  `no_reschedule` varchar(10) NOT NULL,
  `no_penerbangan` varchar(10) NOT NULL,
  `no_penerbangan_baru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reschedul_detail`
--

INSERT INTO `tb_reschedul_detail` (`no_reschedule`, `no_penerbangan`, `no_penerbangan_baru`) VALUES
('RSRIZK', 'JT001', 'JT004'),
('RSRIZK', 'JT002', 'JT005'),
('RSRIZK', 'JT001', 'JT004'),
('RSRIZK', 'JT002', 'JT005');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reschedul_payment`
--

CREATE TABLE `tb_reschedul_payment` (
  `no_reschedule` varchar(25) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `lampiran_pembayaran` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reschedul_payment`
--

INSERT INTO `tb_reschedul_payment` (`no_reschedule`, `metode_pembayaran`, `lampiran_pembayaran`, `status`) VALUES
('RSRIZK', 'Tranfer', 'shkhskshk', 'onproses'),
('RSRIZK', 'Tranfer', 'shkhskshk', 'onproses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reschedul_pessenger`
--

CREATE TABLE `tb_reschedul_pessenger` (
  `no_reschedule` varchar(10) NOT NULL,
  `no_tiket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reschedul_pessenger`
--

INSERT INTO `tb_reschedul_pessenger` (`no_reschedule`, `no_tiket`) VALUES
('RSRIZK', '990211101'),
('RSRIZK', '990211102'),
('RSRIZK', '990211101'),
('RSRIZK', '990211102');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`kd_booking`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD KEY `kd_booking` (`kd_booking`),
  ADD KEY `no_penerbangan` (`no_penerbangan`);

--
-- Indexes for table `tb_penerbangan`
--
ALTER TABLE `tb_penerbangan`
  ADD PRIMARY KEY (`no_penerbangan`);

--
-- Indexes for table `tb_pessenger`
--
ALTER TABLE `tb_pessenger`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `kd_booking` (`kd_booking`);

--
-- Indexes for table `tb_refund`
--
ALTER TABLE `tb_refund`
  ADD PRIMARY KEY (`no_refund`),
  ADD KEY `no_tiket` (`kd_booking`);

--
-- Indexes for table `tb_refund_detail`
--
ALTER TABLE `tb_refund_detail`
  ADD KEY `no_refund` (`no_refund`),
  ADD KEY `no_penerbangan` (`no_penerbangan`),
  ADD KEY `no_refund_2` (`no_refund`),
  ADD KEY `no_penerbangan_2` (`no_penerbangan`),
  ADD KEY `no_refund_3` (`no_refund`);

--
-- Indexes for table `tb_refund_pessenger`
--
ALTER TABLE `tb_refund_pessenger`
  ADD KEY `no_refund` (`no_refund`),
  ADD KEY `no_tiket` (`no_tiket`),
  ADD KEY `no_refund_2` (`no_refund`);

--
-- Indexes for table `tb_reschedul`
--
ALTER TABLE `tb_reschedul`
  ADD PRIMARY KEY (`no_reschedule`),
  ADD KEY `kd_booking` (`kd_booking`),
  ADD KEY `kd_booking_2` (`kd_booking`);

--
-- Indexes for table `tb_reschedul_detail`
--
ALTER TABLE `tb_reschedul_detail`
  ADD KEY `no_refund` (`no_reschedule`),
  ADD KEY `no_penerbangan` (`no_penerbangan`),
  ADD KEY `no_penerbangan_baru` (`no_penerbangan_baru`);

--
-- Indexes for table `tb_reschedul_payment`
--
ALTER TABLE `tb_reschedul_payment`
  ADD KEY `no_reschedull` (`no_reschedule`),
  ADD KEY `no_reschedull_2` (`no_reschedule`);

--
-- Indexes for table `tb_reschedul_pessenger`
--
ALTER TABLE `tb_reschedul_pessenger`
  ADD KEY `no_rescedul` (`no_reschedule`),
  ADD KEY `no_tiket` (`no_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pessenger`
--
ALTER TABLE `tb_pessenger`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD CONSTRAINT `tb_detail_ibfk_3` FOREIGN KEY (`kd_booking`) REFERENCES `tb_booking` (`kd_booking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_ibfk_4` FOREIGN KEY (`no_penerbangan`) REFERENCES `tb_penerbangan` (`no_penerbangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pessenger`
--
ALTER TABLE `tb_pessenger`
  ADD CONSTRAINT `tb_pessenger_ibfk_1` FOREIGN KEY (`kd_booking`) REFERENCES `tb_booking` (`kd_booking`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_refund`
--
ALTER TABLE `tb_refund`
  ADD CONSTRAINT `tb_refund_ibfk_1` FOREIGN KEY (`kd_booking`) REFERENCES `tb_booking` (`kd_booking`);

--
-- Constraints for table `tb_refund_detail`
--
ALTER TABLE `tb_refund_detail`
  ADD CONSTRAINT `tb_refund_detail_ibfk_2` FOREIGN KEY (`no_penerbangan`) REFERENCES `tb_penerbangan` (`no_penerbangan`),
  ADD CONSTRAINT `tb_refund_detail_ibfk_3` FOREIGN KEY (`no_refund`) REFERENCES `tb_refund` (`no_refund`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_refund_pessenger`
--
ALTER TABLE `tb_refund_pessenger`
  ADD CONSTRAINT `tb_refund_pessenger_ibfk_3` FOREIGN KEY (`no_refund`) REFERENCES `tb_refund` (`no_refund`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_reschedul`
--
ALTER TABLE `tb_reschedul`
  ADD CONSTRAINT `tb_reschedul_ibfk_1` FOREIGN KEY (`kd_booking`) REFERENCES `tb_booking` (`kd_booking`);

--
-- Constraints for table `tb_reschedul_detail`
--
ALTER TABLE `tb_reschedul_detail`
  ADD CONSTRAINT `tb_reschedul_detail_ibfk_1` FOREIGN KEY (`no_reschedule`) REFERENCES `tb_reschedul` (`no_reschedule`),
  ADD CONSTRAINT `tb_reschedul_detail_ibfk_2` FOREIGN KEY (`no_penerbangan`) REFERENCES `tb_penerbangan` (`no_penerbangan`),
  ADD CONSTRAINT `tb_reschedul_detail_ibfk_3` FOREIGN KEY (`no_penerbangan_baru`) REFERENCES `tb_penerbangan` (`no_penerbangan`);

--
-- Constraints for table `tb_reschedul_payment`
--
ALTER TABLE `tb_reschedul_payment`
  ADD CONSTRAINT `tb_reschedul_payment_ibfk_1` FOREIGN KEY (`no_reschedule`) REFERENCES `tb_reschedul` (`no_reschedule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_reschedul_pessenger`
--
ALTER TABLE `tb_reschedul_pessenger`
  ADD CONSTRAINT `tb_reschedul_pessenger_ibfk_1` FOREIGN KEY (`no_reschedule`) REFERENCES `tb_reschedul` (`no_reschedule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
