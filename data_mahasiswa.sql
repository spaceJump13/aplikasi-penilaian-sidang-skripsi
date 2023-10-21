-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2023 pada 15.34
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_manpro`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
