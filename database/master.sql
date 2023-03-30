-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 10:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_data`
--
CREATE DATABASE IF NOT EXISTS `master_data` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `master_data`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `username` char(200) NOT NULL,
  `password` char(200) NOT NULL,
  `tanggal_registrasi` date NOT NULL,
  `status_registrasi` enum('Antrian','Terima','Tolak') NOT NULL,
  `tanggal_tolak` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `status_akun` enum('Y','N') NOT NULL,
  `status_user` enum('On','Off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `username`, `password`, `tanggal_registrasi`, `status_registrasi`, `tanggal_tolak`, `tanggal_terima`, `status_akun`, `status_user`) VALUES
(1, 'Fajar Saputra', 'Laki-Laki', 'Tangerang', '2001-12-19', 'Kedaung Wetan RT 02 / RW 04', 'fajarsaputratkj3@gmail.com', 'neglasarioke', '2022-04-30', 'Terima', '0000-00-00', '2022-04-30', 'Y', 'On');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `nama_agama` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen/Protestan'),
(3, 'Katholik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghucu'),
(7, 'Kepercayaan Kepada Tuhan YME');

-- --------------------------------------------------------

--
-- Table structure for table `alasan_pip`
--

CREATE TABLE `alasan_pip` (
  `id` int(11) NOT NULL,
  `alasan_pip` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alasan_pip`
--

INSERT INTO `alasan_pip` (`id`, `alasan_pip`) VALUES
(4, 'Pemegang PKH/KPS/KIP'),
(5, 'Penerima BSM 2014'),
(6, 'Yatim Piatu/Panti Asuhan/Panti Sosial'),
(7, 'Dampak Bencana Alam'),
(8, 'Pernah Drop OUT '),
(9, 'Siswa Miskin/Rentan Miskin'),
(10, 'Daerah Konflik'),
(11, 'Keluarga Terpidana'),
(12, 'Kelainan Fisik');

-- --------------------------------------------------------

--
-- Table structure for table `cita_cita`
--

CREATE TABLE `cita_cita` (
  `id` int(11) NOT NULL,
  `cita_cita` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cita_cita`
--

INSERT INTO `cita_cita` (`id`, `cita_cita`) VALUES
(1, 'Programmer'),
(2, 'Polisi'),
(5, 'Dokter'),
(6, 'Tentara'),
(7, 'Pilot'),
(8, 'Presiden'),
(9, 'Guru / Dosen'),
(10, 'PNS'),
(11, 'Pemadam Kebakaran'),
(12, 'Astronot'),
(13, 'Masinis Kereta Api'),
(14, 'Wirausahawan'),
(15, 'Pengusaha / Bisnismen'),
(16, 'Perawat / Suster'),
(17, 'Bidan'),
(18, 'Teknisi / Mekanik'),
(19, 'Pembalap'),
(20, 'Atlit Olahraga'),
(21, 'E-sport'),
(22, 'Pengacara'),
(23, 'Pelaut'),
(24, 'Da\'i / Ustadz'),
(25, 'Artis / Seniman'),
(26, 'Penyanyi'),
(27, 'Pemain Film / Bintang Film'),
(28, 'Pemain Bulu Tangkis'),
(29, 'Pemain Sepak Bola'),
(30, 'Chef'),
(31, 'Penyiar Radio'),
(32, 'Petani / Peternak Sukses'),
(33, 'Wartawan'),
(34, 'Desaigner'),
(35, 'Game Developer'),
(36, 'Pegawai Kantoran / Wanita Karir'),
(37, 'Nelayan'),
(38, 'Psikolog'),
(39, 'Pedangang'),
(40, 'Sopir'),
(41, 'Arsitek'),
(42, 'Tukang Taman'),
(43, 'Tukang Las'),
(44, 'Tukang Cukur'),
(45, 'Kuli Bangunan'),
(46, 'Apoteker'),
(47, 'Pengantar Barang'),
(48, 'Kasir'),
(49, 'Penjahit');

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

CREATE TABLE `hobby` (
  `id` int(11) NOT NULL,
  `hobby` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hobby`
--

INSERT INTO `hobby` (`id`, `hobby`) VALUES
(2, 'Bermain Sepak Bola'),
(3, 'testdfg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pendaftaran`
--

CREATE TABLE `jenis_pendaftaran` (
  `id` int(11) NOT NULL,
  `jenis` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_pendaftaran`
--

INSERT INTO `jenis_pendaftaran` (`id`, `jenis`) VALUES
(1, 'Siswa Baru'),
(2, 'Pindahan'),
(3, 'Kembali Bersekolah');

-- --------------------------------------------------------

--
-- Table structure for table `kejuruan`
--

CREATE TABLE `kejuruan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(300) NOT NULL,
  `kode_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kejuruan`
--

INSERT INTO `kejuruan` (`id`, `nama_jurusan`, `kode_jurusan`) VALUES
(2, 'Otomatisasi Tata Kelola Dan Perkantoran', '6045'),
(3, 'Teknik Komputer dan Jaringan', '2063');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `activity` varchar(300) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `username`, `activity`, `time`) VALUES
(1, 'fajarsaputratkj3@gmail.com', 'Login', '30-04-2022'),
(2, 'fajarsaputratkj3@gmail.com', 'Login', '30-04-2022'),
(3, 'fajarsaputratkj3@gmail.com', 'Login', '30-04-2022'),
(4, 'fajarsaputratkj3@gmail.com', 'Login', '30-04-2022'),
(5, 'fajarsaputratkj3@gmail.com', 'Login', '30-04-2022'),
(6, 'fajarsaputratkj3@gmail.com', 'Login', '30-04-2022'),
(7, 'fajarsaputratkj3@gmail.com', 'Login', '30-04-2022'),
(8, 'fajarsaputratkj3@gmail.com', 'Login', '30-04-2022'),
(9, 'fajarsaputratkj3@gmail.com', 'Login', '01-05-2022'),
(10, 'fajarsaputratkj3@gmail.com', 'Login', '01-05-2022'),
(11, 'fajarsaputratkj3@gmail.com', 'Login', '01-05-2022'),
(12, 'fajarsaputratkj3@gmail.com', 'Login', '01-05-2022'),
(13, 'fajarsaputratkj3@gmail.com', 'Login', '01-05-2022'),
(14, 'fajarsaputratkj3@gmail.com', 'Login', '01-05-2022'),
(15, 'fajarsaputratkj3@gmail.com', 'Login', '01-05-2022'),
(16, 'fajarsaputratkj3@gmail.com', 'Login', '01-05-2022'),
(17, 'fajarsaputratkj3@gmail.com', 'Login', '02-05-2022'),
(18, 'fajarsaputratkj3@gmail.com', 'Login', '02-05-2022'),
(19, 'fajarsaputratkj3@gmail.com', 'Login', '03-05-2022'),
(20, 'fajarsaputratkj3@gmail.com', 'Login', '03-05-2022'),
(21, 'fajarsaputratkj3@gmail.com', 'Login', '03-05-2022'),
(22, 'fajarsaputratkj3@gmail.com', 'Login', '04-05-2022'),
(23, 'fajarsaputratkj3@gmail.com', 'Login', '05-05-2022'),
(24, 'fajarsaputratkj3@gmail.com', 'Login', '05-05-2022'),
(25, 'fajarsaputratkj3@gmail.com', 'Login', '07-05-2022'),
(26, 'fajarsaputratkj3@gmail.com', 'Login', '07-05-2022'),
(27, 'fajarsaputratkj3@gmail.com', 'Login', '07-05-2022'),
(28, 'fajarsaputratkj3@gmail.com', 'Login', '08-05-2022'),
(29, 'fajarsaputratkj3@gmail.com', 'Login', '09-05-2022'),
(30, 'fajarsaputratkj3@gmail.com', 'Login', '09-05-2022'),
(31, 'fajarsaputratkj3@gmail.com', 'Login', '11-05-2022'),
(32, 'fajarsaputratkj3@gmail.com', 'Login', '17-05-2022'),
(33, 'fajarsaputratkj3@gmail.com', 'Login', '07-01-2023');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `pekerjaan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `pekerjaan`) VALUES
(3, 'Tidak Bekerja'),
(4, 'Nelayan'),
(5, 'Petani'),
(6, 'Peternak'),
(7, 'PNS/TNI/Polri'),
(8, 'Karyawan Swasta'),
(9, 'Pedagang Kecil'),
(10, 'Pedagang Besar'),
(11, 'Wiraswasta'),
(12, 'Wirausaha'),
(13, 'Buruh'),
(14, 'Pensiunan'),
(15, 'Meninggal Dunia');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `pendidikan`) VALUES
(1, 'Tidak Sekolah'),
(2, 'Putus SD'),
(3, 'SD Sederajat'),
(4, 'SMP Sederajat'),
(5, 'SMA Sederajat'),
(6, 'D1'),
(7, 'D2'),
(8, 'D3'),
(9, 'D4/S1'),
(10, 'S2'),
(11, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id` int(11) NOT NULL,
  `value` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penghasilan`
--

INSERT INTO `penghasilan` (`id`, `value`) VALUES
(1, 'Kurang Dari 500.000'),
(3, '500.000 - 999.999'),
(4, '1 juta - 1.999.999'),
(5, '2 juta - 4.999.999'),
(6, '5 juta - 20 juta'),
(7, 'lebih dari 20 juta'),
(8, 'Tidak berpenghasilan');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_tinggal`
--

CREATE TABLE `tempat_tinggal` (
  `id` int(11) NOT NULL,
  `nama_tempat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempat_tinggal`
--

INSERT INTO `tempat_tinggal` (`id`, `nama_tempat`) VALUES
(2, 'Bersama Orang Tua'),
(3, 'Pesantren'),
(5, 'Wali'),
(6, 'Kos'),
(7, 'Asrama'),
(8, 'Panti Asuhan');

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `id` int(11) NOT NULL,
  `nama_transportasi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`id`, `nama_transportasi`) VALUES
(1, 'Jalan Kaki'),
(4, 'Kendaraan Pribadi'),
(5, 'Kendaraan Umum/Angkot/Pete-Pete'),
(7, 'Jemputan Sekolah'),
(8, 'Kereta Api'),
(9, 'Andong/Bendi/Sado/Dokar/Delman/Beca'),
(10, 'Perahu Penyebrangan/Rakit/Getek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alasan_pip`
--
ALTER TABLE `alasan_pip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cita_cita`
--
ALTER TABLE `cita_cita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pendaftaran`
--
ALTER TABLE `jenis_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kejuruan`
--
ALTER TABLE `kejuruan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_tinggal`
--
ALTER TABLE `tempat_tinggal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `alasan_pip`
--
ALTER TABLE `alasan_pip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cita_cita`
--
ALTER TABLE `cita_cita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `hobby`
--
ALTER TABLE `hobby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_pendaftaran`
--
ALTER TABLE `jenis_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kejuruan`
--
ALTER TABLE `kejuruan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tempat_tinggal`
--
ALTER TABLE `tempat_tinggal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
