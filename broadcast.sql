-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2020 pada 06.55
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broadcast`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tglawal` date NOT NULL,
  `tglakhir` date NOT NULL,
  `fileup` varchar(255) NOT NULL,
  `iduser` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `uploads`
--

INSERT INTO `uploads` (`id`, `judul`, `deskripsi`, `tglawal`, `tglakhir`, `fileup`, `iduser`, `bagian`, `status`) VALUES
(63, 'test req', 'request', '2020-04-26', '2020-04-29', 'Tugas Class Diagram (Kelompok 4).pdf', 'ii102', 'Medical', 'Pending'),
(65, 'test', 'testing', '2020-04-24', '2020-04-26', 'Tugas Class Diagram (Kelompok 4).pdf', 'ii101', 'IT', 'Complete'),
(69, 'bb', 'banana', '2020-05-05', '2020-05-08', 'Bab 3.pdf', 'ii101', 'IT', 'Complete'),
(70, 'testt', 'tttt', '2020-04-25', '2020-04-27', 'Form Nilai KP jessica.pdf', 'ii102', 'Medical', 'Pending'),
(71, 'testt', 'tttt', '2020-04-25', '2020-04-27', 'Form Nilai KP jessica.pdf', 'ii102', 'Medical', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fungsi` varchar(20) NOT NULL,
  `bagian` varchar(20) NOT NULL,
  `role` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `fungsi`, `bagian`, `role`) VALUES
('fin999', 'Jeno Lee', 'jenolee@gmail.com', 'beb9e8d02517a8a8ebb6b5cc2bcef7ad', 'Finance', 'Finance', 'user'),
('ii101', 'Jessica Julia', 'jessicaaajulia@gmail.com', 'beb9e8d02517a8a8ebb6b5cc2bcef7ad', 'IT', 'IT', 'admin'),
('ii102', 'Ridha Ayu Salsabila', 'ridhaayusalsabila@gmail.com', '04e42ab67fc05cecfc63282944894c51', 'Medical', 'Medical', 'user'),
('iii', 'jeno', 'akuaku@aku.com', 'eb9e538e56ed4ca9070962b00ff5b67b', 'IT', 'IT', 'user'),
('sn1234', 'Stefany Naomi', 'stefany.naomi@gmail.com', '8c605059d99cc5d489b3a3c16f0f6fd1', 'IT', 'HR', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
