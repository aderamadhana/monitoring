-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2022 pada 17.24
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `anggota_polres`
--

CREATE TABLE `anggota_polres` (
  `ID_ANGGOTA_POLRES` int(11) NOT NULL,
  `ID_POLRES` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_polres`
--

INSERT INTO `anggota_polres` (`ID_ANGGOTA_POLRES`, `ID_POLRES`, `NIP`) VALUES
(3, 1, '126'),
(4, 1, '1112');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_polsek`
--

CREATE TABLE `anggota_polsek` (
  `ID_ANGGOTA_POLSEK` int(11) NOT NULL,
  `ID_POLSEK` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota_polsek`
--

INSERT INTO `anggota_polsek` (`ID_ANGGOTA_POLSEK`, `ID_POLSEK`, `NIP`) VALUES
(4, 2, '124'),
(5, 3, '125'),
(6, 2, '1111'),
(7, 4, '17700');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_bulanan`
--

CREATE TABLE `kegiatan_bulanan` (
  `ID_KEGIATAN_BULANAN` int(11) NOT NULL,
  `NIP_PENCATAT` varchar(20) DEFAULT NULL,
  `NAMA_KEGIATAN` varchar(100) DEFAULT NULL,
  `DESKRIPSI_KEGIATAN` varchar(500) DEFAULT NULL,
  `PERIODE_BULAN` varchar(25) DEFAULT NULL,
  `PERIODE_TAHUN` varchar(5) DEFAULT NULL,
  `TARGET_KUANTITAS` varchar(3) DEFAULT NULL,
  `TARGET_TEREALISASI` int(11) NOT NULL DEFAULT 0,
  `TARGET_WAKTU` date DEFAULT NULL,
  `TANGGAL_INPUT_DATA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `NIP_VALIDATOR` varchar(20) DEFAULT NULL,
  `STATUS_KEGIATAN_BULANAN` varchar(30) DEFAULT 'Belum Tervalidasi',
  `TANGGAL_VALIDASI` timestamp NULL DEFAULT NULL,
  `CATATAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan_bulanan`
--

INSERT INTO `kegiatan_bulanan` (`ID_KEGIATAN_BULANAN`, `NIP_PENCATAT`, `NAMA_KEGIATAN`, `DESKRIPSI_KEGIATAN`, `PERIODE_BULAN`, `PERIODE_TAHUN`, `TARGET_KUANTITAS`, `TARGET_TEREALISASI`, `TARGET_WAKTU`, `TANGGAL_INPUT_DATA`, `NIP_VALIDATOR`, `STATUS_KEGIATAN_BULANAN`, `TANGGAL_VALIDASI`, `CATATAN`) VALUES
(4, '1111', 'Kegiatan 2', 'Kegiatan 2', '1', '2021', '4', 2, '2021-11-04', '2022-01-22 09:42:47', '124', 'Tervalidasi', '2021-11-04 11:39:25', ''),
(5, '1111', 'Kegiatan 1', 'Kegiatan 1', '4', '2021', '2', 0, '2021-11-03', '2022-01-22 09:42:51', NULL, 'Tertolak', NULL, ''),
(6, '1111', 'Mabar', 'Mabar bersama', '12', '2022', '5', 0, '2022-01-21', '2022-01-22 09:42:57', NULL, 'Belum Tervalidasi', NULL, NULL),
(7, '125', 'pp', 'pppp', '4', '2022', '6', 0, '2022-02-23', '2022-01-23 15:13:50', '124', 'Tervalidasi', '2022-01-23 15:13:50', ''),
(8, '125', 'Patroli', 'Melaksanakan kegiatan patroli untuk menjaga ketentraman masyarakat', '1', '2022', '30', 0, '2022-01-31', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 06:53:54', ''),
(9, '125', 'Sambang Desa', 'Melaksanakan kegiatan sambang desa untuk lebih dekat dengan masyarakat dan mencari permasalahan yang ada di masyarakat', '2', '2022', '6', 0, '2022-02-28', '2022-01-26 06:54:07', '124', 'Tervalidasi', '2022-01-26 06:54:07', ''),
(10, '125', 'nn', 'nnnn', '6', '2021', '4', 4, '2021-06-30', '2022-01-26 15:05:00', '124', 'Tervalidasi', '2022-01-26 15:01:12', ''),
(11, '1111', 'KB1', 'KB1', '8', '2022', '3', 3, '2022-01-26', '2022-01-26 16:22:35', '124', 'Tervalidasi', '2022-01-26 16:21:15', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_harian`
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
  `STATUS_KEGIATAN_HARIAN` varchar(25) DEFAULT 'Belum Tervalidasi',
  `TANGGAL_VALIDASI` timestamp NULL DEFAULT NULL,
  `CATATAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan_harian`
--

INSERT INTO `kegiatan_harian` (`ID_KEGIATAN_HARIAN`, `ID_KEGIATAN_BULANAN`, `NAMA_KEGIATAN`, `DESKRIPSI_KEGIATAN`, `TANGGAL_KEGIATAN`, `WAKTU_KEGIATAN`, `BUKTI`, `TANGGAL_INPUT_DATA`, `NIP_VALIDATOR`, `STATUS_KEGIATAN_HARIAN`, `TANGGAL_VALIDASI`, `CATATAN`) VALUES
(138, 4, 'Mabar 1', 'Mabar', '2022-01-20', '10:10:00', '43535475.jpg', '2022-01-20 07:36:59', NULL, 'Tervalidasi', NULL, NULL),
(139, 4, '', '', '0000-00-00', '00:00:00', '', '2022-01-20 07:37:17', NULL, 'Tervalidasi', NULL, NULL),
(140, 4, '', '', '0000-00-00', '00:00:00', '', '2022-01-20 07:15:10', NULL, 'Belum Tervalidasi', NULL, NULL),
(141, 4, '', '', '0000-00-00', '00:00:00', '', '2022-01-20 07:15:10', NULL, 'Belum Tervalidasi', NULL, NULL),
(173, 8, 'Patroli di Desa Bongsopotro', 'Menemukan pelanggaran tidak memakai masker', '2022-01-01', '20:10:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(174, 8, 'Patroli di Desa Pajaran', 'Menemukan pelanggaran adu ayam', '2022-01-02', '10:30:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(175, 8, 'Patroli di Desa Sambirejo', 'Menemukan pelanggaran lalu lintas yang tidak memakai helm', '2022-01-03', '09:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(176, 8, 'Patroli di Desa Siwalan', 'Menemukan sekumpulan orang yang bermain judi', '2022-01-04', '23:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(177, 8, 'Patroli di Desa Bener', 'Menemukan orang menjual minuman keras', '2022-01-05', '00:00:00', 'WhatsApp_Image_2020-06-08_at_18_36_04.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(178, 8, 'Patroli di Desa Tulung', 'Menemukan sekumpulan orang yang tidak memakai masker', '2022-01-06', '22:00:00', 'WhatsApp_Image_2020-06-08_at_18_36_03.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(179, 8, 'Patroli di Desa Sambirejo', 'Melakukan Patroli di Desa Sambirejo', '2022-01-07', '20:00:00', 'WhatsApp_Image_2020-06-08_at_18_35_59.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(180, 8, 'Patroli di Desa Ngepeh', 'Melakukan Patroli di Desa Ngepeh', '2022-01-08', '21:00:00', 'WhatsApp_Image_2020-06-08_at_18_36_03_(1)1.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(181, 8, 'Patroli di Desa Sugihwaras', 'Melakukan Patroli di Desa Sugihwaras', '2022-01-09', '07:00:00', 'WhatsApp_Image_2020-06-08_at_18_36_07.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(182, 8, 'Patroli di Desa Sumbersari', 'Melakukan Patroli di Desa Sumbersari', '2022-01-10', '10:00:00', 'WhatsApp_Image_2020-05-10_at_18_15_10.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(183, 8, 'Patroli di Desa Klangon', 'Melakukan Patroli di Desa Klangon', '2022-01-11', '22:00:00', 'WhatsApp_Image_2020-05-10_at_18_15_29.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(184, 8, 'Patroli di Desa Klumutan', 'Melakukan Patroli di Desa Klumutan', '2022-01-12', '20:00:00', 'WhatsApp_Image_2020-05-10_at_18_15_30_(1).jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(185, 8, 'Patroli di Desa Bajulan', 'Melakukan Patroli di Desa Bajulan', '2022-01-13', '14:00:00', 'WhatsApp_Image_2020-05-10_at_18_15_08.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(186, 8, 'Patroli di Desa Bandungan', 'Melakukan Patroli di Desa Bandungan', '2022-01-14', '09:00:00', 'WhatsApp_Image_2020-05-10_at_18_15_30.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(187, 8, 'Patroli di Desa Sukorejo', 'Melakukan Patroli di Desa Sukorejo', '2022-01-15', '13:00:00', 'WhatsApp_Image_2020-05-10_at_18_15_40.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(188, 8, 'Patroli di Desa Bener', 'Menemukan sekumpulan orang yang tidak memakai masker', '2022-01-16', '16:00:00', 'WhatsApp_Image_2020-05-10_at_18_15_27_(1).jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(189, 8, 'Patroli di Desa Tulung', 'Melakukan Patroli di Desa Tulung', '2022-01-17', '11:00:00', 'WhatsApp_Image_2020-05-10_at_18_15_081.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(190, 8, 'Patroli di Desa Sambirejo', 'Melakukan Patroli di Desa Sambirejo', '2022-01-18', '09:00:00', 'WhatsApp_Image_2020-05-10_at_18_15_30_(1)1.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(191, 8, 'Patroli di Desa Bongsopotro', 'Melakukan Patroli di Desa Bongsopotro', '2022-01-19', '16:00:00', 'WhatsApp_Image_2020-05-10_at_18_15_401.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(192, 8, 'Patroli di Desa Sugihwaras', 'Melakukan Patroli di Desa Sugihwaras', '2022-01-20', '20:00:00', 'WhatsApp_Image_2020-06-08_at_18_36_03_(1)2.jpeg', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(193, 8, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(194, 8, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(195, 8, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(196, 8, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(197, 8, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(198, 8, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(199, 8, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(200, 8, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(201, 8, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(202, 8, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 13:44:35', '124', 'Tervalidasi', '2022-01-26 13:44:35', ''),
(203, 10, 'oo', 'o', '2022-01-05', '13:30:00', 'WhatsApp_Image_2020-06-08_at_18_34_58.jpeg', '2022-01-26 15:05:00', '124', 'Tervalidasi', '2022-01-26 15:05:00', ''),
(204, 10, 'buyyb ', 'gyfyt', '2022-01-30', '16:00:00', 'WhatsApp_Image_2020-06-08_at_18_35_57.jpeg', '2022-01-26 15:05:00', '124', 'Tervalidasi', '2022-01-26 15:05:00', ''),
(205, 10, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 15:05:00', '124', 'Tervalidasi', '2022-01-26 15:05:00', ''),
(206, 10, '', '', '0000-00-00', '00:00:00', '', '2022-01-26 15:05:00', '124', 'Tervalidasi', '2022-01-26 15:05:00', ''),
(207, 11, 'Kagi1', 'Kagi1', '2022-01-26', '10:10:00', '4353547514.jpg', '2022-01-26 16:22:35', '124', 'Tervalidasi', '2022-01-26 16:22:35', ''),
(208, 11, 'Keg1', 'Kagi1', '2022-01-26', '10:10:00', '4353547515.jpg', '2022-01-26 16:22:35', '124', 'Tervalidasi', '2022-01-26 16:22:35', ''),
(209, 11, 'Kagi1', 'Kagi1', '2022-01-26', '10:10:00', '4353547516.jpg', '2022-01-26 16:22:35', '124', 'Tervalidasi', '2022-01-26 16:22:35', '');

--
-- Trigger `kegiatan_harian`
--
DELIMITER $$
CREATE TRIGGER `DELETE_DATA` AFTER DELETE ON `kegiatan_harian` FOR EACH ROW UPDATE kegiatan_bulanan SET kegiatan_bulanan.TARGET_TEREALISASI = kegiatan_bulanan.TARGET_TEREALISASI - 1 WHERE kegiatan_bulanan.ID_KEGIATAN_BULANAN = old.ID_KEGIATAN_BULANAN
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UPDATE_DATA` AFTER UPDATE ON `kegiatan_harian` FOR EACH ROW UPDATE kegiatan_bulanan SET kegiatan_bulanan.TARGET_TEREALISASI = kegiatan_bulanan.TARGET_TEREALISASI + 1 WHERE kegiatan_bulanan.ID_KEGIATAN_BULANAN = old.ID_KEGIATAN_BULANAN AND new.STATUS_KEGIATAN_HARIAN = "Tervalidasi"
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kejadian`
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
  `NAMA_PELAKU` varchar(100) DEFAULT '-',
  `TEMPAT_LAHIR_PELAKU` varchar(50) DEFAULT '-',
  `TANGGAL_LAHIR_PELAKU` date DEFAULT NULL,
  `ALAMAT_PELAKU` varchar(150) DEFAULT '-',
  `JENIS_KELAMIN_PELAKU` varchar(100) DEFAULT '-',
  `NAMA_KORBAN` varchar(100) DEFAULT '-',
  `TEMPAT_LAHIR_KORBAN` varchar(50) DEFAULT '-',
  `TANGGAL_LAHIR_KORBAN` date DEFAULT NULL,
  `ALAMAT_KORBAN` varchar(150) DEFAULT '-',
  `JENIS_KELAMIN_KORBAN` varchar(100) DEFAULT '-',
  `NAMA_SAKSI` varchar(100) NOT NULL DEFAULT '-',
  `TEMPAT_LAHIR_SAKSI` varchar(50) NOT NULL DEFAULT '-',
  `TANGGAL_LAHIR_SAKSI` date DEFAULT NULL,
  `ALAMAT_SAKSI` varchar(150) NOT NULL DEFAULT '-',
  `JENIS_KELAMIN_SAKSI` varchar(100) NOT NULL DEFAULT '-',
  `KETERANGAN_KEJADIAN` varchar(500) DEFAULT NULL,
  `KATEGORI_KEJADIAN` varchar(100) DEFAULT NULL,
  `TEMPAT_KEJADIAN` varchar(150) NOT NULL DEFAULT '-',
  `BUKTI` varchar(500) NOT NULL,
  `TANGGAL_KEJADIAN` date NOT NULL,
  `WAKTU_KEJADIAN` time NOT NULL,
  `TANGGAL_INPUT_DATA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `STATUS_KEJADIAN` varchar(255) DEFAULT 'Sedang Diproses',
  `TANGGAL_VALIDASI` timestamp NULL DEFAULT NULL,
  `CATATAN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kejadian`
--

INSERT INTO `kejadian` (`ID_KEJADIAN`, `NIP_PENCATAT`, `NIP_VALIDATOR`, `NAMA_PELAPOR`, `TEMPAT_LAHIR_PELAPOR`, `TANGGAL_LAHIR_PELAPOR`, `ALAMAT_PELAPOR`, `JENIS_KELAMIN_PELAPOR`, `PERISTIWA`, `NAMA_PELAKU`, `TEMPAT_LAHIR_PELAKU`, `TANGGAL_LAHIR_PELAKU`, `ALAMAT_PELAKU`, `JENIS_KELAMIN_PELAKU`, `NAMA_KORBAN`, `TEMPAT_LAHIR_KORBAN`, `TANGGAL_LAHIR_KORBAN`, `ALAMAT_KORBAN`, `JENIS_KELAMIN_KORBAN`, `NAMA_SAKSI`, `TEMPAT_LAHIR_SAKSI`, `TANGGAL_LAHIR_SAKSI`, `ALAMAT_SAKSI`, `JENIS_KELAMIN_SAKSI`, `KETERANGAN_KEJADIAN`, `KATEGORI_KEJADIAN`, `TEMPAT_KEJADIAN`, `BUKTI`, `TANGGAL_KEJADIAN`, `WAKTU_KEJADIAN`, `TANGGAL_INPUT_DATA`, `STATUS_KEJADIAN`, `TANGGAL_VALIDASI`, `CATATAN`) VALUES
(5, '1111', '124', 'Anggota Polres 1', 'Malang', '2021-10-12', 'jalan cakalang no 712 c', 'Laki-Laki', 'Menyontek saat ujian', 'Samsul', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Laki-Laki', 'Siti', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Perempuan', '-', '-', NULL, '-', '-', 'Menyontek saat ujian', 'Non Kriminal', '-', '', '0000-00-00', '00:00:00', '2022-01-22 09:41:00', 'Tervalidasi', '2021-11-01 17:00:00', ''),
(6, '1111', '124', 'Anggota Polres 1', 'Malang', '2021-10-29', 'jalan cakalang no 712 c', 'Laki-Laki', 'Menyontek saat ujian', 'Bambang', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Laki-Laki', 'Udin', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Laki-Laki', '-', '-', NULL, '-', '-', 'Menyontek saat ujian', 'Kriminal', '-', '', '0000-00-00', '00:00:00', '2022-01-22 09:41:07', 'Tervalidasi', '2021-11-01 17:00:00', ''),
(7, '1111', NULL, 'Anggota Polres 2', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Laki-Laki', 'Menyontek tok pokok', 'Mai', 'Malang', '2021-10-28', 'jalan cakalang no 712 c', 'Perempuan', 'Mas', 'Malang', '2021-10-30', 'jalan cakalang no 712 c', 'Perempuan', '-', '-', NULL, '-', '-', 'Menyontek tok pokok', 'Kriminal', '-', '', '0000-00-00', '00:00:00', '2022-01-22 09:41:13', 'Tertolak', NULL, ''),
(9, '1111', '124', 'Aku', 'Bumi', '2022-01-15', 'Bumi 2', 'Laki-Laki', 'Peristiwa', 'Kamu', 'Bumi 3', '2022-01-17', 'Bumi 4', 'Perempuan', 'Mereka', 'Bumi 5', '2022-01-18', 'Bumi 6', 'Laki-Laki', '-', '-', NULL, '-', '-', 'Keterangan Kejadian', 'Kriminal', '-', '', '0000-00-00', '00:00:00', '2022-01-22 09:41:26', 'Tervalidasi', '2022-01-14 17:16:57', 'Mantap'),
(10, '1111', NULL, 'a', 'a', '2022-01-15', 'a', 'Laki-Laki', 'a', 'a', 'a', '2022-01-15', 'a', 'Laki-Laki', 'a', 'a', '2022-01-15', 'a', 'Laki-Laki', '-', '-', NULL, '-', '-', 'a', 'Kriminal', '-', '', '0000-00-00', '00:00:00', '2022-01-22 09:41:32', 'Belum Tervalidasi', NULL, NULL),
(11, '1111', NULL, '', '', '0000-00-00', '', 'Laki-Laki', 'Abc 123', '', '', '0000-00-00', '', '-', '', '', '0000-00-00', '', '-', '-', '-', NULL, '-', '-', '123 Abc', 'Non Kriminal', '-', '', '0000-00-00', '00:00:00', '2022-01-22 09:41:38', 'Belum Tervalidasi', NULL, NULL),
(12, '1111', NULL, '123', '123', '2022-01-19', '123', 'Laki-Laki', '123', '', '', '0000-00-00', '', '-', '', '', '0000-00-00', '', '-', '456', '456', '2022-01-19', '456', 'Laki-Laki', '123', 'Kriminal', '-', '', '0000-00-00', '00:00:00', '2022-01-22 09:41:44', 'Belum Tervalidasi', NULL, NULL),
(13, '1111', NULL, 'a', 'a', '2022-01-20', 'm', 'Laki-Laki', 'aaa', '', '', '0000-00-00', '', '-', '', '', '0000-00-00', '', '-', '', '', '0000-00-00', '', '-', 'a', 'Kriminal', 'a', '', '2022-01-20', '10:00:00', '2022-01-22 09:41:49', 'Belum Tervalidasi', NULL, NULL),
(21, '125', NULL, 'Nanang', 'Madiun', '1994-10-04', 'Madiun', 'Laki-Laki', 'Kasus tabrak lari di Tol Madiun menewaskan 2 orang.', '', '', '0000-00-00', '', '-', 'Sudarto', 'Madiun', '0000-00-00', 'Desa Bongsopotro, Kecamatan Saradan, Madiun', 'Laki-Laki', 'Dwi Sumahardi', 'Madiun', '0000-00-00', '', 'Laki-Laki', 'Kejadian ini bermula saat korban melaju dari arah Madiun ke Surabaya. Tepat di KM 622.200 A Ruas Caruban-Nganjuk, truk berhenti untuk mengecek kondisi ban. Diduga saat itu, mereka tertabrak kendaraan yang melintas.', 'Non Kriminal', 'Tol Ngawi-Kertosono', 'http://localhost/monitoring/assets/img/kejadian/mobil-tertabrak-truk-di-ruas-tol-ngawi-kertosono-km-622200-a_43.jpeg', '2022-01-25', '06:00:00', '2022-01-25 17:56:50', 'Belum Tervalidasi', NULL, NULL),
(22, '125', NULL, 'Miftakul Erfan', 'Madiun', '2004-01-09', 'Madiun', 'Laki-Laki', 'Kasus pencurian sejumlah sepeda motor di Madiun', 'Andre Andriawan', 'Magetan', '1994-06-13', 'Magetan', 'Laki-Laki', '', '', '0000-00-00', '', '-', 'Miftakul Erfan', 'Madiun', '2004-01-09', 'Madiun', 'Laki-Laki', 'Bedalih bayar hutang tiga pemuda di Madiun nekat curi motor dengan modus keliling kampung hingga persawahan dan sekitar rumah kost, untuk mencari sasaran sepeda motor yang terparkir ditinggal pemiliknya.', 'Kriminal', 'Desa Pule, Kecamatan Sawahan, Kabupaten Madiun', 'http://localhost/monitoring/assets/img/kejadian/Curanmor.jpeg', '2021-11-07', '14:01:00', '2022-01-25 18:25:02', 'Belum Tervalidasi', NULL, NULL),
(23, '125', NULL, 'Dhevit', 'Madiun', '1998-09-28', 'Madiun', 'Laki-Laki', 'Aksi tak terpuji, fasilitas lapak UMKM dirusak seseorang, pelaku terekam CCTV.', '', '', '0000-00-00', '', '-', '', '', '0000-00-00', '', '-', 'Karneli', 'Tawangrejo', '1991-12-02', 'Madiun', 'Laki-Laki', 'Pelaku masuk area lapak dengan mengendarai sepeda motor. Berdasarkan rekaman CCTV, pelaku terlihat cukup mengenal lokasi lapak. Pelaku langsung berhenti di dekat panel setbox lantas mematikan arus listriknya. Berbekal alat pemotong, pelaku mulai memotong almpu strip led yang terpasang di payung taman. Selain itu, pelaku juga merobohkan tiang lampu taman.', 'Kriminal', 'Kelurahan Tawangrejo, Kabupaten Madiun', 'http://localhost/monitoring/assets/img/kejadian/Perusak_Fasilitas_Taman.jpg', '2021-12-05', '03:00:00', '2022-01-25 18:40:08', 'Belum Tervalidasi', NULL, NULL),
(24, '125', NULL, ' Imam Nurfahroni', 'Madiun', '2006-11-15', 'Madiun', 'Laki-Laki', 'Bayi ditemukan dalam kardus di halaman Asrama Panti, diduga ditinggalkan orang tua.', '', '', '0000-00-00', '', '-', '', '', '0000-00-00', '', '-', '', '', '0000-00-00', '', '-', 'Bayi yang diperkirakan baru berusia tiga hari itu kali pertama ditemukan Imam Nurfahroni, salah seorang santri. Imam memberanikan diri keluar asrama setelah mendengar suara tangisan bayi. Benar saja seorang bayi ditemukan dalam kardus air mineral yang terletak di salah satu pojok halaman asrama. Saat ditemukan bayi berpakaian lengkap. Juga terdapat selimut, susu formula, botol susu, popok sekali pakai dan popok kain, tisu basah dan kering, juga kain gendong.', 'Kriminal', 'Asrama Panti Asuhan Islamiah Kelurahan Rejomulyo Kota Madiun', 'http://localhost/monitoring/assets/img/kejadian/Bayi_terbuang.jpeg', '2021-11-20', '00:15:00', '2022-01-25 18:51:50', 'Belum Tervalidasi', NULL, NULL),
(25, '125', NULL, 'Fauzan', 'Madiun', '1986-06-30', 'Madiun', 'Laki-Laki', 'Baru pulang dari Hongkong, jumlah pasien Omicron di Madiun bertambah 3 orang.', '', '', '0000-00-00', '', '-', '', '', '0000-00-00', '', '-', '', '', '0000-00-00', '', '-', 'Direktur RSUD Dolopo, Dr. Purnomo Hadi mengatakan tambahan tiga kasus terduga omicron tersebut, dua diantaranya merupakan hasil pelacakan kontak erat dari positif omicron pertama S, sedangkan satu lainnya merupakan mantan Pekerja Migran Indonesia (PMI) yang baru pulang dari Hongkong.', 'Non Kriminal', 'RSUD Dolopo, Kabupaten Madiun, Jawa Timur', 'http://localhost/monitoring/assets/img/kejadian/ilustrasi-covid-19-varian-omicron.jpg', '2022-01-15', '20:00:00', '2022-01-25 19:06:03', 'Belum Tervalidasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `polres`
--

CREATE TABLE `polres` (
  `ID_POLRES` int(11) NOT NULL,
  `NAMA_POLRES` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `polres`
--

INSERT INTO `polres` (`ID_POLRES`, `NAMA_POLRES`) VALUES
(1, 'Polres Madiun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polsek`
--

CREATE TABLE `polsek` (
  `ID_POLSEK` int(11) NOT NULL,
  `ID_POLRES` int(11) DEFAULT NULL,
  `NAMA_POLSEK` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `polsek`
--

INSERT INTO `polsek` (`ID_POLSEK`, `ID_POLRES`, `NAMA_POLSEK`) VALUES
(1, 1, 'Polsek Balerejo, Madiun'),
(2, 1, 'Polsek Wonoasri, Madiun'),
(3, 1, 'Polsek Mejayan, Madiun'),
(4, 1, 'Polsek Pilangkenceng, Madiun'),
(5, 1, 'Polsek Saradan, Madiun'),
(6, 1, 'Polsek Nglames, Madiun'),
(7, 1, 'Polsek Kare, Madiun'),
(8, 1, 'Polsek Wungu, Madiun'),
(9, 1, 'Polsek Kebonsari, Madiun'),
(10, 1, 'Polsek Gemarang, Madiun'),
(11, 1, 'Polsek Dagangan, Madiun'),
(12, 1, 'Polsek Geger, Madiun'),
(13, 1, 'Polsek Dolopo, Madiun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `ROLE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`ID_ROLE`, `ROLE`) VALUES
(1, 'admin'),
(2, 'anggota'),
(3, 'kepala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
  `PASSWORD` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`NIP`, `ID_ROLE`, `NAMA`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `ALAMAT`, `TELEPON`, `FOTO`, `JABATAN`, `PASSWORD`) VALUES
('1111', 2, 'Sidiq P.', 'Madiun', '1982-10-06', 'Madiun', '809201', NULL, 'Anggota Polsek', 'admin123'),
('1112', 2, 'Anggota Polres 2', 'Malang', '2021-10-30', 'Malang', '80808', NULL, 'Anggota Polres', 'admin123'),
('123', 1, 'Admin', 'Malang', '2021-10-18', 'Malang', '122', NULL, 'Admin', 'admin123'),
('124', 3, 'Kepala Polsek', 'Malang', '2021-10-26', 'Malang', '123', NULL, 'Kepala Polsek', 'admin123'),
('125', 2, 'Andri K.', 'Madiun', '1984-11-25', 'Madiun', '123', NULL, 'Anggota', 'admin123'),
('126', 2, 'Pihak Polres', 'Malang', '2021-10-26', 'Malang', '1221', NULL, 'Anggota', 'admin123'),
('17700', 2, 'roni', 'jakarta', '2021-12-30', 'madiun', '09987655432', NULL, 'anggota', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_polres`
--
ALTER TABLE `anggota_polres`
  ADD PRIMARY KEY (`ID_ANGGOTA_POLRES`),
  ADD KEY `FK_RELATIONSHIP_10` (`NIP`),
  ADD KEY `FK_RELATIONSHIP_9` (`ID_POLRES`);

--
-- Indeks untuk tabel `anggota_polsek`
--
ALTER TABLE `anggota_polsek`
  ADD PRIMARY KEY (`ID_ANGGOTA_POLSEK`),
  ADD KEY `FK_RELATIONSHIP_11` (`ID_POLSEK`),
  ADD KEY `FK_RELATIONSHIP_12` (`NIP`);

--
-- Indeks untuk tabel `kegiatan_bulanan`
--
ALTER TABLE `kegiatan_bulanan`
  ADD PRIMARY KEY (`ID_KEGIATAN_BULANAN`),
  ADD KEY `FK_RELATIONSHIP_14` (`NIP_PENCATAT`),
  ADD KEY `FK_RELATIONSHIP_6` (`NIP_VALIDATOR`);

--
-- Indeks untuk tabel `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  ADD PRIMARY KEY (`ID_KEGIATAN_HARIAN`),
  ADD KEY `FK_RELATIONSHIP_15` (`NIP_VALIDATOR`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_KEGIATAN_BULANAN`);

--
-- Indeks untuk tabel `kejadian`
--
ALTER TABLE `kejadian`
  ADD PRIMARY KEY (`ID_KEJADIAN`),
  ADD KEY `FK_RELATIONSHIP_13` (`NIP_VALIDATOR`),
  ADD KEY `FK_RELATIONSHIP_5` (`NIP_PENCATAT`);

--
-- Indeks untuk tabel `polres`
--
ALTER TABLE `polres`
  ADD PRIMARY KEY (`ID_POLRES`);

--
-- Indeks untuk tabel `polsek`
--
ALTER TABLE `polsek`
  ADD PRIMARY KEY (`ID_POLSEK`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_POLRES`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_ROLE`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_polres`
--
ALTER TABLE `anggota_polres`
  MODIFY `ID_ANGGOTA_POLRES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `anggota_polsek`
--
ALTER TABLE `anggota_polsek`
  MODIFY `ID_ANGGOTA_POLSEK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_bulanan`
--
ALTER TABLE `kegiatan_bulanan`
  MODIFY `ID_KEGIATAN_BULANAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  MODIFY `ID_KEGIATAN_HARIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT untuk tabel `kejadian`
--
ALTER TABLE `kejadian`
  MODIFY `ID_KEJADIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `polres`
--
ALTER TABLE `polres`
  MODIFY `ID_POLRES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `polsek`
--
ALTER TABLE `polsek`
  MODIFY `ID_POLSEK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota_polres`
--
ALTER TABLE `anggota_polres`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`NIP`) REFERENCES `user` (`NIP`),
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_POLRES`) REFERENCES `polres` (`ID_POLRES`);

--
-- Ketidakleluasaan untuk tabel `anggota_polsek`
--
ALTER TABLE `anggota_polsek`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_POLSEK`) REFERENCES `polsek` (`ID_POLSEK`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`NIP`) REFERENCES `user` (`NIP`);

--
-- Ketidakleluasaan untuk tabel `kegiatan_bulanan`
--
ALTER TABLE `kegiatan_bulanan`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`NIP_PENCATAT`) REFERENCES `user` (`NIP`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`NIP_VALIDATOR`) REFERENCES `user` (`NIP`);

--
-- Ketidakleluasaan untuk tabel `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`NIP_VALIDATOR`) REFERENCES `user` (`NIP`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_KEGIATAN_BULANAN`) REFERENCES `kegiatan_bulanan` (`ID_KEGIATAN_BULANAN`);

--
-- Ketidakleluasaan untuk tabel `kejadian`
--
ALTER TABLE `kejadian`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`NIP_VALIDATOR`) REFERENCES `user` (`NIP`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`NIP_PENCATAT`) REFERENCES `user` (`NIP`);

--
-- Ketidakleluasaan untuk tabel `polsek`
--
ALTER TABLE `polsek`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_POLRES`) REFERENCES `polres` (`ID_POLRES`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
