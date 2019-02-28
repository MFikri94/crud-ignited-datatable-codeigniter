-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Nov 2017 pada 05.25
-- Versi Server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud_ignited`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `barang_kode` varchar(10) NOT NULL,
  `barang_nama` varchar(100) DEFAULT NULL,
  `barang_harga` double DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`barang_kode`),
  KEY `barang_kategori_id` (`barang_kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_kode`, `barang_nama`, `barang_harga`, `barang_kategori_id`) VALUES
('846826510', 'Lipstick 2', 40000, 1),
('846826511', 'Lipstick 3', 50000, 1),
('846826582', 'Face Wash', 40000, 1),
('846826583', 'Lipstick', 50000, 1),
('846826584', 'Minuman 1', 4000, 2),
('846826585', 'Minuman 2', 5000, 2),
('846826586', 'Minuman 3', 4000, 2),
('846826587', 'Makanan 1', 40000, 3),
('846826588', 'Makanan 2', 7000, 3),
('846826589', 'Makanan 3', 10000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Cosmetics'),
(2, 'Minuman'),
(3, 'Makanan');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`barang_kategori_id`) REFERENCES `kategori` (`kategori_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
