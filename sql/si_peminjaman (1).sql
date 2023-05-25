-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Agu 2019 pada 02.28
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_peminjaman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_peminjaman_bmn`
--

CREATE TABLE `data_peminjaman_bmn` (
  `id_peminjaman` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `nama_bmn` varchar(1000) NOT NULL,
  `alasan_peminjaman` varchar(50000) NOT NULL,
  `tgl_mulai_peminjaman` date NOT NULL,
  `tgl_selesai_peminjaman` date NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status_peminjaman` varchar(10) NOT NULL DEFAULT 'MENUNGGU',
  `alasan_penolakan` varchar(1000) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_peminjaman_bmn`
--

INSERT INTO `data_peminjaman_bmn` (`id_peminjaman`, `id_peminjam`, `nama_bmn`, `alasan_peminjaman`, `tgl_mulai_peminjaman`, `tgl_selesai_peminjaman`, `tgl_pengajuan`, `status_peminjaman`, `alasan_penolakan`) VALUES
(20, 2, 'Laptop', 'as', '2019-08-20', '2019-08-20', '2019-08-20', 'DISETUJUI', '-'),
(21, 2, 'Mobil', 'sss', '2019-08-20', '2019-08-20', '2019-08-20', 'DISETUJUI', 'MALAS AJA. MAKANYA SAYA TOLAK...'),
(22, 5, 'Mobil', 'asas', '2019-08-20', '2019-08-20', '2019-08-20', 'DISETUJUI', 'HELOO'),
(23, 2, 'Laptop', 'anjing', '2019-08-20', '2019-08-24', '2019-08-20', 'DITOLAK', 'anjj\r\n'),
(24, 2, 'Mobil', 'asasa', '2019-08-21', '2019-08-21', '2019-08-21', 'DISETUJUI', '-'),
(25, 2, ' Motor', 'assssssss', '2019-08-21', '2019-08-21', '2019-08-21', 'MENUNGGU', '-'),
(26, 2, 'Mobil', 'ass you', '2019-08-21', '2019-08-21', '2019-08-21', 'MENUNGGU', '-'),
(29, 2, 'Laptop', 'yayaya', '2019-08-21', '2019-08-21', '2019-08-21', 'MENUNGGU', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nip`, `password`, `nama_lengkap`, `jabatan`, `no_telp`) VALUES
(2, '1777', 'www', 'Imam Hanafi', 'HAKIM', '0881'),
(5, '7', 'aaa', 'Imam Hanafi', 'GM', '999'),
(6, '1708', 'ADMIN', 'ADMIN', 'ADMIN', '4'),
(7, '999', 'ADMIN', 'ADMIN', 'ADMIN', '999'),
(9, '69', 'BIJIQU', 'BIJI', 'YO BIJI', '96'),
(10, '17082010032', 'wgy', 'Imam Hanafi', 'UNDERBOSS', '08819815131'),
(11, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_peminjaman_bmn`
--
ALTER TABLE `data_peminjaman_bmn`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_peminjaman_bmn`
--
ALTER TABLE `data_peminjaman_bmn`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
