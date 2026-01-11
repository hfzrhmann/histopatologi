-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 09 Des 2025 pada 08.14
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `histopatologi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nip` int(17) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `email` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_sampel` int(11) NOT NULL,
  `id_pemeriksaan` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `makroskopis` text DEFAULT NULL,
  `mikroskopis` text DEFAULT NULL,
  `kesimpulan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` int(17) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `umur` int(2) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_sampel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('Sampel Diterima','Menunggu Makroskopik','Makroskopik','Pemrosesan Jaringan','Embedding','Microtomy','Pewarnaan','Siap Dibaca','Pemeriksaan Mikroskopis','Penyusunan Hasil','Selesai') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampel`
--

CREATE TABLE `sampel` (
  `id` int(255) NOT NULL,
  `no_lab` varchar(255) NOT NULL,
  `id_pasien` int(255) NOT NULL,
  `id_dokter` int(255) NOT NULL,
  `jenis_sampel` varchar(255) NOT NULL,
  `anatomi` varchar(255) NOT NULL,
  `tanggal_masuk` year(4) NOT NULL,
  `kondisi_sampel` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','petugas') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_sampel` (`id_sampel`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemeriksaan-dokter` (`id_dokter`),
  ADD KEY `pemeriksaan-pasien` (`id_pasien`),
  ADD KEY `pemeriksaan-sampel` (`id_sampel`),
  ADD KEY `pemeriksaan-user` (`id_user`);

--
-- Indeks untuk tabel `sampel`
--
ALTER TABLE `sampel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sampel`
--
ALTER TABLE `sampel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan-dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan-pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan-sampel` FOREIGN KEY (`id_sampel`) REFERENCES `sampel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaan-user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sampel`
--
ALTER TABLE `sampel`
  ADD CONSTRAINT `sampel-dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sampel-pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
