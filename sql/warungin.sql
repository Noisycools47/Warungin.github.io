-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2021 pada 07.40
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warungin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` double NOT NULL,
  `satuan_barang` varchar(50) NOT NULL,
  `pemilik_barang` varchar(50) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `kategori_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_barang`
--

INSERT INTO `tabel_barang` (`barang_id`, `nama_barang`, `harga_barang`, `satuan_barang`, `pemilik_barang`, `foto_barang`, `kategori_barang`) VALUES
(1, 'Indomie Goreng', 25000, 'dus', 'Warung Mang Sholeh', 'img/images (31).jpeg', 'Makanan Instan'),
(2, 'Telur Ayam', 20000, 'kg', 'Warung Mang Juned', 'img/telur.jpg', 'Bahan Masakan'),
(3, 'Lifebuoy Shampo', 8000, 'pack', 'Warung Mang Ayat', 'img/shampoo.jpg', 'Peralatan Mandi'),
(4, 'Kopikap', 16000, 'dus', 'Warung Mpok Niyem', 'img/kopikap.jpg', 'Minuman'),
(5, 'Beras', 12000, 'kg', 'Warung Mang Ade', 'img/beras.jpg', 'Bahan Masakan'),
(6, 'Chuba', 25000, 'pack', 'Warung Sejahtera', 'img/ciki.jpg', 'Makanan Ringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`user_id`, `nama`, `email`, `password`) VALUES
(4, 'noisycools', 'adityanh1604@gmail.com', 'koding47'),
(5, 'anjaymabar', 'anjaymabar@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
