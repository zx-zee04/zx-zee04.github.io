-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2024 at 03:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbukurama`
--
CREATE DATABASE IF NOT EXISTS `dbbukurama` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `dbbukurama`;

-- --------------------------------------------------------

--
-- Table structure for table `tbpengarang`
--

CREATE TABLE `tbpengarang` (
  `No` int NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbpengarang`
--

INSERT INTO `tbpengarang` (`No`, `nama`, `alamat`, `email`, `no_telepon`) VALUES
(1, 'Sugeng Fitriyadi', 'Pemalang', 'sugeng@yahoo.com', '0811223344'),
(2, 'Didik K', 'Lampung', 'didik@yahoo.com', '081233445566'),
(3, 'Arief N', 'Riau', 'arief@yahoo.com', '0816363636'),
(4, 'Mawardi', 'Medan', 'ardi@yahoo.com', '02187867888'),
(5, 'Reno Mariaci', 'Tegal', NULL, '0817959595'),
(6, 'Bunafit Nugroho', 'Lampung', 'bunafit@yahoo.com', '081556677889'),
(7, 'Agung', 'Klaten', 'agung@yahoo.com', '0811667788');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbpengarang`
--
ALTER TABLE `tbpengarang`
  ADD PRIMARY KEY (`No`);
--
-- Database: `nama_schema`
--
CREATE DATABASE IF NOT EXISTS `nama_schema` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `nama_schema`;
--
-- Database: `nasdang`
--
CREATE DATABASE IF NOT EXISTS `nasdang` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `nasdang`;
--
-- Database: `nasdang12`
--
CREATE DATABASE IF NOT EXISTS `nasdang12` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `nasdang12`;

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nama`, `nim`, `kelas`, `prodi`, `foto`) VALUES
(15, 'makanan padang', '120000', 'A', 'Informatika', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Database: `pegawai`
--
CREATE DATABASE IF NOT EXISTS `pegawai` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `pegawai`;
--
-- Database: `penjualan`
--
CREATE DATABASE IF NOT EXISTS `penjualan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `penjualan`;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(5) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `umur` int NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `tanggal_bergabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `umur`, `saldo`, `tanggal_bergabung`) VALUES
('000A4', 'Jeremi', 'Jl. Tjilik Riwut km. 9', 17, '6500000.00', '2024-09-01'),
('000A5', 'Wahid', 'Jl. Kalibata', 16, '6500000.00', '2024-09-05'),
('000B1', 'Tulus', 'Jl. Kakap', 17, '7500000.00', '2024-09-10'),
('000B2', 'Harlen', 'Jl. Permata Indah', 15, '6500000.00', '2024-09-15'),
('000B3', 'Yavin', 'Jl. Gurame', 16, '6500000.00', '2024-09-20'),
('000B4', 'Dharma', 'Jl. Bandeng', 17, '6500000.00', '2024-09-25'),
('000B5', 'Angga', 'Jl. Piranha', 17, '6500000.00', '2024-10-01'),
('000C1', 'Syarif', 'Jl. Permata Indah', 14, '6500000.00', '2024-10-05'),
('000C2', 'Gana', 'Jl. Permata Indah', 15, '6500000.00', '2024-10-10'),
('000C3', 'Alex', 'Jl. Garuda V', 16, '6500000.00', '2024-10-15'),
('000C4', 'Yudi', 'Jl. Tingang', 17, '6500000.00', '2024-10-20'),
('000C5', 'Frensa', 'Jl. Adonis Samad', 16, '6500000.00', '2024-10-25'),
('000D1', 'Felix', 'Jl. Aries 3', 23, '4300000.00', '2024-11-01'),
('000D2', 'Ardian', 'Jl. Rajawali 7', 21, '4750000.00', '2024-11-05'),
('000D3', 'Husein', 'Jl. Lele 3', 18, '5300000.00', '2024-11-15'),
('000D4', 'Izor', 'Jl. Kutilang 5', 20, '5750000.00', '2024-11-20'),
('000D5', 'Rozi', 'Jl. Mahir Mahar 8', 22, '6300000.00', '2024-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `total_pembelian` decimal(12,2) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total_pembelian`, `tanggal_transaksi`) VALUES
('TRX0002', '150000.00', '2024-08-05'),
('TRX0003', '250000.00', '2024-08-10'),
('TRX0004', '100000.00', '2024-08-15'),
('TRX0005', '120000.00', '2024-09-01'),
('TRX0009', '210000.00', '2024-10-05'),
('TRX0010', '320000.00', '2024-10-10'),
('TRX0011', '150000.00', '2024-10-15'),
('TRX0013', '175000.00', '2024-08-30'),
('TRX0014', '130000.00', '2024-09-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);
--
-- Database: `perusahaan`
--
CREATE DATABASE IF NOT EXISTS `perusahaan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `perusahaan`;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `gaji` decimal(11,0) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jabatan`, `gaji`, `keterangan`) VALUES
(1, 'cuy', 'biasa', '1500000', 'besok'),
(2, 'budi', 'Kebiasaan', '1115151', 'kapanlah'),
(3, 'Siti', 'Staff', '7000000', 'Part-time'),
(4, 'Andi', 'Supervisor', '9000000', 'Full-time'),
(5, 'Dewi', 'Staff', '7500000', 'Remote'),
(6, 'Joko', 'Manager', '13000000', 'Full-time');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `ptmancingmania`
--
CREATE DATABASE IF NOT EXISTS `ptmancingmania` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `ptmancingmania`;

-- --------------------------------------------------------

--
-- Table structure for table `man_perahu`
--

CREATE TABLE `man_perahu` (
  `Code_Kapal` int NOT NULL,
  `Nama_Kapal` varchar(50) NOT NULL,
  `Tipe_Kapal` varchar(30) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `pemilik` varchar(20) DEFAULT NULL,
  `Tanggal_Perawatan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(5) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `umur` int NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `tanggal_bergabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `umur`, `saldo`, `tanggal_bergabung`) VALUES
('P003', 'agus wijaya', 'jl. mawar 5', 21, '750000.00', '2023-03-10'),
('P004', 'rina susanti', 'jl. anggrek 3', 19, '250000.00', '2023-04-18'),
('P005', 'joko widodo', 'jl. merpati 2', 36, '300000.00', '2023-05-07'),
('P006', 'tiara putri', 'jl. kenanga 9', 23, '950000.00', '2023-06-22'),
('P007', 'alif rahman', 'jl. melati 1', 20, '850000.00', '2023-07-10'),
('P008', 'muhammad irfan', 'jl. bambu kuning 12', 29, '600000.00', '2023-08-11'),
('P009', 'dewi ariska', 'jl. sukajadi 5', 27, '400000.00', '2023-09-15'),
('P010', 'ali hamdani', 'jl. bintaro 6', 34, '700000.00', '2023-10-20'),
('P011', 'sri wahyuni', 'jl. cempaka 11', 25, '1200000.00', '2023-11-12'),
('P012', 'febriani putra', 'jl. tanjung 4', 30, '800000.00', '2023-12-01'),
('P013', 'daniel nathan', 'jl. alamanda 7', 33, '500000.00', '2024-01-05'),
('P014', 'farah hidayat', 'jl. kelapa gading 8', 22, '1100000.00', '2024-02-10'),
('P015', 'hendro satria', 'jl. durian 15', 28, '650000.00', '2024-03-03'),
('P016', 'batok', 'jl. elgato 12', 26, '680000.00', '2023-02-13'),
('P017', 'ljune', 'jl. arbaatun 2', 28, '1900000.00', '2024-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `total_pembelian` decimal(12,2) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total_pembelian`, `tanggal_transaksi`) VALUES
('t0001', '200000.00', '2023-08-01'),
('t0002', '300000.00', '2023-08-05'),
('t0003', '500000.00', '2023-08-10'),
('t0005', '150000.00', '2023-08-20'),
('t0006', '900000.00', '2023-08-25'),
('t0007', '250000.00', '2023-08-30'),
('t0008', '120000.00', '2023-09-01'),
('t0010', '800000.00', '2023-09-10'),
('t0011', '300000.00', '2023-09-15'),
('t0012', '450000.00', '2023-09-20'),
('t0014', '1000000.00', '2023-09-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `man_perahu`
--
ALTER TABLE `man_perahu`
  ADD PRIMARY KEY (`Code_Kapal`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);
--
-- Database: `simple_web`
--
CREATE DATABASE IF NOT EXISTS `simple_web` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `simple_web`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `travel_plan`
--
CREATE DATABASE IF NOT EXISTS `travel_plan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `travel_plan`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Tempat Wisata'),
(2, 'Alam'),
(3, 'Kota');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int NOT NULL,
  `destination` varchar(255) NOT NULL,
  `days` int NOT NULL,
  `tanggal_perjalanan` date NOT NULL,
  `category_id` int DEFAULT NULL,
  `keterangan` text,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `destination`, `days`, `tanggal_perjalanan`, `category_id`, `keterangan`, `file_path`) VALUES
(4, '123', 5124, '2024-10-17', 1, NULL, NULL),
(5, 'universal', 2, '2024-11-01', 1, '', NULL),
(6, 'universal', 122, '2024-11-01', 1, NULL, NULL),
(7, 'kampung', 990, '2024-10-12', 2, 'asd', NULL),
(8, 'kemansd', 1412, '2024-10-12', 2, 'makan&quot;', NULL),
(9, 'asdfa', 14, '2024-10-23', 1, 'nasipadang', 'uploads/Screenshot (17).png'),
(10, 'universalqweq', 5, '2024-10-17', 1, 'q41', 'uploads/2024-10-16 14.11.00.png'),
(11, 'capekalibah', 44, '2024-11-02', 1, 'kesini?', 'uploads/2024-10-16 13.52.35.png'),
(12, 'Gunung Myoboku', 2, '2024-10-24', 1, '', 'uploads/2024-10-16 14.33.06.png'),
(17, 'tes 4123', 1111, '2026-12-12', 2, '', NULL),
(18, 'tes1 1111', 1111, '2026-12-12', 3, '', 'uploads/2024-10-16 15.00.45.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
