-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 03:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_polres`
--

CREATE TABLE `anggota_polres` (
  `ID_ANGGOTA_POLRES` int(11) NOT NULL,
  `ID_POLRES` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_polres`
--

INSERT INTO `anggota_polres` (`ID_ANGGOTA_POLRES`, `ID_POLRES`, `NIP`) VALUES
(3, 1, '126'),
(4, 1, '1112');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_polsek`
--

CREATE TABLE `anggota_polsek` (
  `ID_ANGGOTA_POLSEK` int(11) NOT NULL,
  `ID_POLSEK` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_polsek`
--

INSERT INTO `anggota_polsek` (`ID_ANGGOTA_POLSEK`, `ID_POLSEK`, `NIP`) VALUES
(4, 2, '124'),
(5, 3, '125'),
(6, 2, '1111');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_bulanan`
--

CREATE TABLE `kegiatan_bulanan` (
  `ID_KEGIATAN_BULANAN` int(11) NOT NULL,
  `NIP_PENCATAT` varchar(20) DEFAULT NULL,
  `NAMA_KEGIATAN` varchar(100) DEFAULT NULL,
  `DESKRIPSI_KEGIATAN` varchar(500) DEFAULT NULL,
  `PERIODE_BULAN` varchar(25) DEFAULT NULL,
  `PERIODE_TAHUN` varchar(5) DEFAULT NULL,
  `TARGET_KUANTITAS` varchar(3) DEFAULT NULL,
  `TARGET_WAKTU` date DEFAULT NULL,
  `TANGGAL_INPUT_DATA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NIP_VALIDATOR` varchar(20) DEFAULT NULL,
  `STATUS_KEGIATAN_BULANAN` varchar(30) DEFAULT 'Belum Tervalidasi',
  `TANGGAL_VALIDASI` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan_bulanan`
--

INSERT INTO `kegiatan_bulanan` (`ID_KEGIATAN_BULANAN`, `NIP_PENCATAT`, `NAMA_KEGIATAN`, `DESKRIPSI_KEGIATAN`, `PERIODE_BULAN`, `PERIODE_TAHUN`, `TARGET_KUANTITAS`, `TARGET_WAKTU`, `TANGGAL_INPUT_DATA`, `NIP_VALIDATOR`, `STATUS_KEGIATAN_BULANAN`, `TANGGAL_VALIDASI`) VALUES
(4, '126', 'Kegiatan 2', 'Kegiatan 2', 'Januari', '2021', '4', '2021-11-04', '2021-11-03 11:59:29', NULL, 'Belum Tervalidasi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_harian`
--

CREATE TABLE `kegiatan_harian` (
  `ID_KEGIATAN_HARIAN` int(11) NOT NULL,
  `ID_KEGIATAN_BULANAN` int(11) DEFAULT NULL,
  `NAMA_KEGIATAN` varchar(100) DEFAULT NULL,
  `DESKRIPSI_KEGIATAN` varchar(500) DEFAULT NULL,
  `TANGGAL_KEGIATAN` date DEFAULT NULL,
  `WAKTU_KEGIATAN` time DEFAULT NULL,
  `BUKTI` varchar(500) DEFAULT NULL,
  `TANGGAL_INPUT_DATA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NIP_VALIDATOR` varchar(20) DEFAULT NULL,
  `STATUS_KEGIATAN_HARIAN` int(11) DEFAULT NULL,
  `TANGGAL_VALIDASI` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kejadian`
--

CREATE TABLE `kejadian` (
  `ID_KEJADIAN` int(11) NOT NULL,
  `NIP_PENCATAT` varchar(20) DEFAULT NULL,
  `NIP_VALIDATOR` varchar(20) DEFAULT NULL,
  `NAMA_PELAPOR` varchar(100) DEFAULT NULL,
  `TEMPAT_LAHIR_PELAPOR` varchar(50) DEFAULT NULL,
  `TANGGAL_LAHIR_PELAPOR` date DEFAULT NULL,
  `ALAMAT_PELAPOR` varchar(150) DEFAULT NULL,
  `JENIS_KELAMIN_PELAPOR` varchar(100) DEFAULT NULL,
  `PERISTIWA` varchar(500) DEFAULT NULL,
  `NAMA_PELAKU` varchar(100) DEFAULT NULL,
  `TEMPAT_LAHIR_PELAKU` varchar(50) DEFAULT NULL,
  `TANGGAL_LAHIR_PELAKU` date DEFAULT NULL,
  `ALAMAT_PELAKU` varchar(150) DEFAULT NULL,
  `JENIS_KELAMIN_PELAKU` varchar(100) DEFAULT NULL,
  `NAMA_KORBAN` varchar(100) DEFAULT NULL,
  `TEMPAT_LAHIR_KORBAN` varchar(50) DEFAULT NULL,
  `TANGGAL_LAHIR_KORBAN` date DEFAULT NULL,
  `ALAMAT_KORBAN` varchar(150) DEFAULT NULL,
  `JENIS_KELAMIN_KORBAN` varchar(100) DEFAULT NULL,
  `KETERANGAN_KEJADIAN` varchar(500) DEFAULT NULL,
  `KATEGORI_KEJADIAN` varchar(100) DEFAULT NULL,
  `TANGGAL_INPUT_DATA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `STATUS_KEJADIAN` varchar(255) DEFAULT 'Belum Tervalidasi',
  `TANGGAL_VALIDASI` timestamp NULL DEFAULT NULL,
  `CATATAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kejadian`
--

INSERT INTO `kejadian` (`ID_KEJADIAN`, `NIP_PENCATAT`, `NIP_VALIDATOR`, `NAMA_PELAPOR`, `TEMPAT_LAHIR_PELAPOR`, `TANGGAL_LAHIR_PELAPOR`, `ALAMAT_PELAPOR`, `JENIS_KELAMIN_PELAPOR`, `PERISTIWA`, `NAMA_PELAKU`, `TEMPAT_LAHIR_PELAKU`, `TANGGAL_LAHIR_PELAKU`, `ALAMAT_PELAKU`, `JENIS_KELAMIN_PELAKU`, `NAMA_KORBAN`, `TEMPAT_LAHIR_KORBAN`, `TANGGAL_LAHIR_KORBAN`, `ALAMAT_KORBAN`, `JENIS_KELAMIN_KORBAN`, `KETERANGAN_KEJADIAN`, `KATEGORI_KEJADIAN`, `TANGGAL_INPUT_DATA`, `STATUS_KEJADIAN`, `TANGGAL_VALIDASI`, `CATATAN`) VALUES
(5, '126', '124', 'Anggota Polres 1', 'Malang', '2021-10-12', 'jalan cakalang no 712 c', 'Laki-Laki', 'Menyontek saat ujian', 'Samsul', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Laki-Laki', 'Siti', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Perempuan', 'Menyontek saat ujian', 'Non Kriminal', '2021-11-02 03:28:46', 'Tervalidasi', '2021-11-01 17:00:00', ''),
(6, '126', '124', 'Anggota Polres 1', 'Malang', '2021-10-29', 'jalan cakalang no 712 c', 'Laki-Laki', 'Menyontek saat ujian', 'Bambang', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Laki-Laki', 'Udin', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Laki-Laki', 'Menyontek saat ujian', 'Kriminal', '2021-11-02 03:28:55', 'Tervalidasi', '2021-11-01 17:00:00', ''),
(7, '1112', NULL, 'Anggota Polres 2', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Laki-Laki', 'Menyontek tok pokok', 'Mai', 'Malang', '2021-10-28', 'jalan cakalang no 712 c', 'Perempuan', 'Mas', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Perempuan', 'Menyontek tok pokok', 'Kriminal', '2021-11-02 03:28:51', 'Tertolak', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `polres`
--

CREATE TABLE `polres` (
  `ID_POLRES` int(11) NOT NULL,
  `NAMA_POLRES` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polres`
--

INSERT INTO `polres` (`ID_POLRES`, `NAMA_POLRES`) VALUES
(1, 'Polres Madiun');

-- --------------------------------------------------------

--
-- Table structure for table `polsek`
--

CREATE TABLE `polsek` (
  `ID_POLSEK` int(11) NOT NULL,
  `ID_POLRES` int(11) DEFAULT NULL,
  `NAMA_POLSEK` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polsek`
--

INSERT INTO `polsek` (`ID_POLSEK`, `ID_POLRES`, `NAMA_POLSEK`) VALUES
(1, 1, 'Polsek Balerejo, Madiun'),
(2, 1, 'Polsek Wonoasri, Madiun'),
(3, 1, 'Polsek Mejayan, Madiun'),
(4, 1, 'Polsek Pilangkenceng, Madiun'),
(5, 1, 'Polsek Saradan, Madiun');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `ROLE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID_ROLE`, `ROLE`) VALUES
(1, 'admin'),
(2, 'anggota'),
(3, 'kepala');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NIP` varchar(20) NOT NULL,
  `ID_ROLE` int(11) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(20) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `TELEPON` varchar(16) DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `JABATAN` varchar(50) DEFAULT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIP`, `ID_ROLE`, `NAMA`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `ALAMAT`, `TELEPON`, `FOTO`, `JABATAN`, `USERNAME`, `PASSWORD`) VALUES
('1111', 2, 'Anggota Polsek 2', 'Malang', '2021-10-30', 'Malang', '809201', NULL, 'Anggota Polsek', 'anggotapolsek2', 'admin123'),
('1112', 2, 'Anggota Polres 2', 'Malang', '2021-10-30', 'Malang', '80808', NULL, 'Anggota Polres', 'anggotapolres2', 'admin123'),
('123', 1, 'Admin', 'Malang', '2021-10-18', 'Malang', '122', NULL, 'Admin', 'admin', 'admin123'),
('124', 3, 'Kepala Polsek', 'Malang', '2021-10-26', 'Malang', '123', NULL, 'Kepala Polsek', 'polsek', 'admin123'),
('125', 2, 'Anggota Polsek 1', 'Malang', '2021-10-26', 'Malang', '123', NULL, 'Anggota', 'anggotapolsek1', 'admin123'),
('126', 2, 'Anggota Polres 1', 'Malang', '2021-10-26', 'Malang', '1221', NULL, 'Anggota', 'anggotapolres1', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_polres`
--
ALTER TABLE `anggota_polres`
  ADD PRIMARY KEY (`ID_ANGGOTA_POLRES`),
  ADD KEY `FK_RELATIONSHIP_10` (`NIP`),
  ADD KEY `FK_RELATIONSHIP_9` (`ID_POLRES`);

--
-- Indexes for table `anggota_polsek`
--
ALTER TABLE `anggota_polsek`
  ADD PRIMARY KEY (`ID_ANGGOTA_POLSEK`),
  ADD KEY `FK_RELATIONSHIP_11` (`ID_POLSEK`),
  ADD KEY `FK_RELATIONSHIP_12` (`NIP`);

--
-- Indexes for table `kegiatan_bulanan`
--
ALTER TABLE `kegiatan_bulanan`
  ADD PRIMARY KEY (`ID_KEGIATAN_BULANAN`),
  ADD KEY `FK_RELATIONSHIP_14` (`NIP_PENCATAT`),
  ADD KEY `FK_RELATIONSHIP_6` (`NIP_VALIDATOR`);

--
-- Indexes for table `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  ADD PRIMARY KEY (`ID_KEGIATAN_HARIAN`),
  ADD KEY `FK_RELATIONSHIP_15` (`NIP_VALIDATOR`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_KEGIATAN_BULANAN`);

--
-- Indexes for table `kejadian`
--
ALTER TABLE `kejadian`
  ADD PRIMARY KEY (`ID_KEJADIAN`),
  ADD KEY `FK_RELATIONSHIP_13` (`NIP_VALIDATOR`),
  ADD KEY `FK_RELATIONSHIP_5` (`NIP_PENCATAT`);

--
-- Indexes for table `polres`
--
ALTER TABLE `polres`
  ADD PRIMARY KEY (`ID_POLRES`);

--
-- Indexes for table `polsek`
--
ALTER TABLE `polsek`
  ADD PRIMARY KEY (`ID_POLSEK`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_POLRES`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_ROLE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_polres`
--
ALTER TABLE `anggota_polres`
  MODIFY `ID_ANGGOTA_POLRES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `anggota_polsek`
--
ALTER TABLE `anggota_polsek`
  MODIFY `ID_ANGGOTA_POLSEK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kegiatan_bulanan`
--
ALTER TABLE `kegiatan_bulanan`
  MODIFY `ID_KEGIATAN_BULANAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  MODIFY `ID_KEGIATAN_HARIAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kejadian`
--
ALTER TABLE `kejadian`
  MODIFY `ID_KEJADIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `polres`
--
ALTER TABLE `polres`
  MODIFY `ID_POLRES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `polsek`
--
ALTER TABLE `polsek`
  MODIFY `ID_POLSEK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_polres`
--
ALTER TABLE `anggota_polres`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`NIP`) REFERENCES `user` (`NIP`),
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_POLRES`) REFERENCES `polres` (`ID_POLRES`);

--
-- Constraints for table `anggota_polsek`
--
ALTER TABLE `anggota_polsek`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_POLSEK`) REFERENCES `polsek` (`ID_POLSEK`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`NIP`) REFERENCES `user` (`NIP`);

--
-- Constraints for table `kegiatan_bulanan`
--
ALTER TABLE `kegiatan_bulanan`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`NIP_PENCATAT`) REFERENCES `user` (`NIP`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`NIP_VALIDATOR`) REFERENCES `user` (`NIP`);

--
-- Constraints for table `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`NIP_VALIDATOR`) REFERENCES `user` (`NIP`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_KEGIATAN_BULANAN`) REFERENCES `kegiatan_bulanan` (`ID_KEGIATAN_BULANAN`);

--
-- Constraints for table `kejadian`
--
ALTER TABLE `kejadian`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`NIP_VALIDATOR`) REFERENCES `user` (`NIP`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`NIP_PENCATAT`) REFERENCES `user` (`NIP`);

--
-- Constraints for table `polsek`
--
ALTER TABLE `polsek`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_POLRES`) REFERENCES `polres` (`ID_POLRES`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
