-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2023 pada 18.51
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manpro13`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_acara`
--

CREATE TABLE `berita_acara` (
  `nrp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `judul_skripsi` varchar(255) NOT NULL,
  `konsentrasi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `ketua_penguji` varchar(255) NOT NULL,
  `ketua_penguji_hadir` varchar(255) NOT NULL,
  `dosen_penguji` varchar(255) NOT NULL,
  `dosen_penguji_hadir` varchar(255) NOT NULL,
  `dospem_1` varchar(255) NOT NULL,
  `dospem_1_hadir` varchar(255) NOT NULL,
  `dospem_2` varchar(255) NOT NULL,
  `dospem_2_hadir` varchar(255) NOT NULL,
  `tugas` varchar(255) NOT NULL,
  `tugas_tambahan` varchar(255) NOT NULL,
  `cpmk1` int(255) NOT NULL,
  `cpmk2` int(255) NOT NULL,
  `cpmk3` int(255) NOT NULL,
  `cpl1` int(255) NOT NULL,
  `cpl2` int(255) NOT NULL,
  `cpl3` int(255) NOT NULL,
  `cpl4` int(255) NOT NULL,
  `cpl5` int(255) NOT NULL,
  `cpl6` int(255) NOT NULL,
  `cpl7` int(255) NOT NULL,
  `cpl8` int(255) NOT NULL,
  `cpl9` int(255) NOT NULL,
  `cpl10` int(255) NOT NULL,
  `hasil_sidang` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita_acara`
--

INSERT INTO `berita_acara` (`nrp`, `nama`, `judul_skripsi`, `konsentrasi`, `tanggal`, `nilai`, `ketua_penguji`, `ketua_penguji_hadir`, `dosen_penguji`, `dosen_penguji_hadir`, `dospem_1`, `dospem_1_hadir`, `dospem_2`, `dospem_2_hadir`, `tugas`, `tugas_tambahan`, `cpmk1`, `cpmk2`, `cpmk3`, `cpl1`, `cpl2`, `cpl3`, `cpl4`, `cpl5`, `cpl6`, `cpl7`, `cpl8`, `cpl9`, `cpl10`, `hasil_sidang`, `catatan`) VALUES
('c14210197', 'wilberttt', 'manpro ciloko', 'AI', '2023-10-13', 'A', '1', '1', '2', '1', '3', '1', '5', '1', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Lulus', 'lulus hore'),
('c14210197', 'evelin', 'manpro ciloko', 'AI', '2023-11-08', 'A', '1', '1', '2', '1', '3', '1', '5', '1', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Lulus', 'ciloko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nrp` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pembimbing1` varchar(100) NOT NULL,
  `pembimbing2` varchar(100) NOT NULL,
  `penguji` varchar(100) NOT NULL,
  `ketuaPenguji` varchar(100) NOT NULL,
  `tanggal_sidang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nrp`, `nama`, `pembimbing1`, `pembimbing2`, `penguji`, `ketuaPenguji`, `tanggal_sidang`) VALUES
('C14210011', 'Jeje', 'Alex', 'Poatan', 'Henry', 'Cavill', '2023-06-09'),
('C14210012', 'Acto', 'Alex', 'Henry', 'Stephanus', 'Djoni', '2023-07-08'),
('C14210013', 'Budi', 'siapa', 'siapa', 'siapa', 'siapa', '2023-09-04'),
('C14210017', 'Nicho', 'Alex', 'Henry', 'Stephanus', 'Djoni', '2023-09-08'),
('C14210034', 'Clifton', 'Silvia', 'Yulia', 'Alex', 'Adi', '2023-05-06'),
('C14210071', 'Hadi', 'Alex', 'Henry', 'Stephanus', 'Djoni', '2022-09-04'),
('C14210072', 'Samuel', 'Henry', 'Krisna', 'Luis', 'Alvin', '2023-03-04'),
('C14210077', 'Erica', 'Alex', 'Henry', 'Stephanus', 'Djoni', '1970-01-01'),
('C14210088', 'Erica', 'Alex', 'Henry', 'Stephanus', 'Djoni', '2023-01-04'),
('C14210089', 'Verdy', 'Alex', 'Henry', 'Stephanus', 'Djoni', '2023-12-04'),
('C14210090', 'Verdy', 'Alex', 'Henry', 'Stephanus', 'Djoni', '2023-12-04'),
('C14210091', 'Kevin Sadino', 'Alex', 'Henry', 'Stephanus', 'Djoni', '2022-10-04'),
('C14210098', 'Kent', 'Alex', 'Henry', 'Stephanus', 'Djoni', '2023-08-08'),
('C14210099', 'Erica', 'Alex', 'Henry', 'Stephanus', 'Djoni', '2023-11-04'),
('C14210208', 'Jonathan', 'Adi', 'Alex', 'Yulia', 'Henry', '2023-10-01'),
('C14210226', 'Kevin Sadino', 'Silvia', 'Yulia', 'Alex', 'Adi', '2023-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `type`, `password`) VALUES
('evelin', 'admin', '$2y$10$yZzGan18wC16VBZEcMThl.i4v/L4yOftTj4IIsxrRfhwMTCbXtELS'),
('okky', 'dosen', '$2y$10$yZzGan18wC16VBZEcMThl.i4v/L4yOftTj4IIsxrRfhwMTCbXtELS'),
('billy', 'ketua', '$2y$10$yZzGan18wC16VBZEcMThl.i4v/L4yOftTj4IIsxrRfhwMTCbXtELS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`nrp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
