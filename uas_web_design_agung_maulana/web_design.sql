-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Jun 2019 pada 15.29
-- Versi Server: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_design`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_design`
--

CREATE TABLE IF NOT EXISTS `web_design` (
  `id` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `web_design`
--

INSERT INTO `web_design` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(1, 'Agung', 'Sulawesi', '2000-01-04', 'Laki-Laki'),
(2, 'Maulana', 'Bogor', '2019-06-01', 'Laki-Laki'),
(3, 'Hasan', 'Bogor', '2019-06-25', 'Laki-Laki'),
(4, 'Abdullah', 'Cibinong', '2019-06-24', 'Laki-Laki'),
(5, 'Aliza', 'Bogor', '2019-06-11', 'Perempuan'),
(6, 'Vivi', 'Bogor', '2019-06-03', 'Perempuan'),
(7, 'Syarif', 'Cikaret', '2019-06-05', 'Laki-Laki'),
(8, 'Agung2', 'Sulawesi', '2000-01-04', 'Laki-Laki'),
(9, 'Maulana2', 'Bogor', '2019-06-01', 'Laki-Laki'),
(10, 'Hasan2', 'Bogor', '2019-06-25', 'Laki-Laki'),
(11, 'Abdullah2', 'Cibinong', '2019-06-24', 'Laki-Laki'),
(12, 'Aliza2', 'Bogor', '2019-06-11', 'Perempuan'),
(13, 'Vivi2', 'Bogor', '2019-06-03', 'Perempuan'),
(14, 'Syarif2', 'Cikaret', '2019-06-05', 'Laki-Laki'),
(15, 'Amin', 'Cikaret', '2019-06-05', 'Laki-Laki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `web_design`
--
ALTER TABLE `web_design`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `web_design`
--
ALTER TABLE `web_design`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
