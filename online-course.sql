-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2024 pada 12.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-course`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `judul_kursus` varchar(255) NOT NULL,
  `deskripsi_kursus` text NOT NULL,
  `durasi_kursus` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `judul_kursus`, `deskripsi_kursus`, `durasi_kursus`, `created_at`) VALUES
(1, 'React', 'Belajar react bersama', '90', NULL),
(2, 'C++', 'C++ terbaru', '60', NULL),
(3, 'Figma', 'Belajar figma dari awal', '30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul_materi` varchar(255) NOT NULL,
  `deskripsi_materi` text NOT NULL,
  `link_materi` text NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `judul_materi`, `deskripsi_materi`, `link_materi`, `id_kursus`, `created_at`) VALUES
(3, 'Materi 1 React', 'Pendahuluan React', 'https://wp007.cloudborneo.com/', 1, NULL),
(5, 'Materi 2 React', 'Pengenalan React', 'https://wp008.cloudborneo.com/', 1, NULL),
(6, 'Materi 3 React', 'Instalasi React', 'https://wp017.cloudborneo.com/', 1, NULL),
(10, 'Materi 1 C++', 'Pendahuluan C++', 'https://wp018.cloudborneo.com', 2, NULL),
(11, 'Materi 2 C++', 'Pengenalan C++', 'https://wp027.cloudborneo.com', 2, NULL),
(12, 'Materi 3 C++', 'Instalasi C++', 'https://wp028.cloudborneo.com', 2, NULL),
(13, 'Materi 1 Figma', 'Pendahuluan Figma', 'https://wp028.cloudborneo.com', 3, NULL),
(14, 'Materi 2 Figma', 'Pengenalan Figma', 'https://wp037.cloudborneo.com', 3, NULL),
(15, 'Materi 3 Figma', 'Instalasi Figma', 'https://wp038.cloudborneo.com', 3, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(17, '2024-08-08-074043', 'App\\Database\\Migrations\\Kursus', 'default', 'App', 1723170306, 1),
(18, '2024-08-08-074049', 'App\\Database\\Migrations\\Materi', 'default', 'App', 1723170306, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `materi_id_kursus_foreign` (`id_kursus`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_id_kursus_foreign` FOREIGN KEY (`id_kursus`) REFERENCES `kursus` (`id_kursus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
