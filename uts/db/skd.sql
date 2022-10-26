-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2022 pada 12.27
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `alamat`, `nama`, `role`, `status`, `token`) VALUES
(2, 'admin', '0192023a7bbd73250516f069df18b500', '', '', '', 'admin', 0, ''),
(4, 'ryan', 'bd410624ee16dc9e3e23bc68700c43ab', '', '', '', 'user', 0, ''),
(5, 'admin2', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'user', 0, ''),
(7, 'budi', '$2y$10$Gy7/rrBXnZGyRCA1n5fQO.2lxMw71aDlV3hdZp34ZVRUsr7ia7BNi', 'ryanindrajaya678@gmail.com', 'Grogol, Cukir', 'Budi Antono', 'user', 1, 'b3cef2da761e5ae1f55c1713916cb1cabfcdcd0d0e253247a8420c16562cf4d62e875de8'),
(8, 'nadiemz', '97f660c183e9a0074d97d14b1a59159e', 'ryanindrajaya678@gmail.com', 'Solo', 'Nadiem Makarim', 'user', 1, 'be955eeacf80b0c1e136ef3279a3fa1b989eaac31d003279093ef61526658b4ff0032c2d'),
(9, 'nadiemz', '97f660c183e9a0074d97d14b1a59159e', 'ryanindrajaya678@gmail.com', 'Solo', 'Nadiem Makarim', 'user', 1, '285e8e8edb466a9f20f41e90cb848b53275067d62add103797fecdc3f565327db9fef501');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
