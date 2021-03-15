-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 08:18 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `d_base_espara`
--
CREATE DATABASE IF NOT EXISTS `d_base_espara` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `d_base_espara`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE IF NOT EXISTS `tb_guru` (
  `kd_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(35) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `golruang` varchar(9) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `pangkat` varchar(25) NOT NULL,
  `uname` varchar(35) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status_guru` enum('1','0') NOT NULL,
  PRIMARY KEY (`kd_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;



-- --------------------------------------------------------

--
-- Table structure for table `tb_hari`
--

CREATE TABLE IF NOT EXISTS `tb_hari` (
  `kd_hari` int(11) NOT NULL AUTO_INCREMENT,
  `hari` varchar(9) NOT NULL,
  `status_hari` enum('1','0') NOT NULL,
  PRIMARY KEY (`kd_hari`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_hari`
--

INSERT INTO `tb_hari` (`kd_hari`, `hari`, `status_hari`) VALUES
(1, 'Senin', '1'),
(2, 'Selasa', '1'),
(3, 'Rabu', '1'),
(4, 'Kamis', '1'),
(5, 'Jum''at', '1'),
(6, 'Sabtu', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `kd_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `kd_mapel` int(11) NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `kd_guru` int(11) NOT NULL,
  `kd_jam` int(11) NOT NULL,
  `kd_hari` int(11) NOT NULL,
  `kd_penugasan` int(11) NOT NULL,
  `tahun_pelajaran` varchar(9) NOT NULL,
  `semester` varchar(6) NOT NULL,
  PRIMARY KEY (`kd_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=635 ;


--
-- Table structure for table `tb_jam`
--

CREATE TABLE IF NOT EXISTS `tb_jam` (
  `kd_jam` int(11) NOT NULL AUTO_INCREMENT,
  `jam_ke` varchar(3) NOT NULL,
  `pukul` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_jam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_jam`
--

INSERT INTO `tb_jam` (`kd_jam`, `jam_ke`, `pukul`) VALUES
(1, '1', '07.20-08.10'),
(2, '2', '08.00-08.40'),
(3, '3', '08.40-09.20'),
(4, '4', '09.20-10.00'),
(5, '5', '10.20-11.00'),
(6, '6', '11.00-11.40'),
(7, '7', '12.10-12.50'),
(8, '8', '12.50-13.30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `kd_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) NOT NULL,
  `kd_guru` int(11) NOT NULL,
  `status_kelas` enum('1','0') NOT NULL,
  PRIMARY KEY (`kd_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;



--
-- Table structure for table `tb_mapel`
--

CREATE TABLE IF NOT EXISTS `tb_mapel` (
  `kd_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `kode_mapel` varchar(3) NOT NULL,
  `mapel` varchar(20) NOT NULL,
  `kd_hari` int(11) NOT NULL,
  PRIMARY KEY (`kd_mapel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`kd_mapel`, `kode_mapel`, `mapel`, `kd_hari`) VALUES
(1, 'A', 'PAI', 6),
(2, 'B', 'PKn', 2),
(3, 'C', 'Bahasa Indonesia', 3),
(4, 'D', 'Bahasa Inggris', 2),
(5, 'E', 'Matematika', 4),
(6, 'F', 'IPA', 6),
(7, 'G', 'IPS', 3),
(8, 'H', 'Seni Budaya', 4),
(9, 'I', 'Penjas', 4),
(10, 'J', 'Prakarya', 6),
(11, 'K', 'TIK', 6),
(12, 'L', 'Bahasa Jawa', 2),
(13, 'M', 'Baca Tulis Al-Quran', 4),
(14, 'N', 'BK', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penugasan`
--

CREATE TABLE IF NOT EXISTS `tb_penugasan` (
  `kd_penugasan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_guru` int(11) NOT NULL,
  `kd_mapel` int(11) NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `jml_jam` int(11) NOT NULL,
  `status_penugasan` enum('1','0') NOT NULL,
  PRIMARY KEY (`kd_penugasan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=289 ;

--
-- Table structure for table `tmp_jadwal`
--

CREATE TABLE IF NOT EXISTS `tmp_jadwal` (
  `kd_jad` int(11) NOT NULL AUTO_INCREMENT,
  `kd_penugasan` int(11) NOT NULL,
  `kd_hari` int(11) NOT NULL,
  PRIMARY KEY (`kd_jad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
