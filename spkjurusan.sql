-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 10, 2025 at 01:46 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkjurusan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_jurusan`
--

CREATE TABLE `bobot_jurusan` (
  `id_bobot` int NOT NULL,
  `id_jurusan` int DEFAULT NULL,
  `id_kriteria` int DEFAULT NULL,
  `bobot` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bobot_jurusan`
--

INSERT INTO `bobot_jurusan` (`id_bobot`, `id_jurusan`, `id_kriteria`, `bobot`) VALUES
(25, 2, 1, 20),
(26, 2, 2, 10),
(27, 2, 3, 35),
(28, 2, 4, 5),
(29, 2, 8, 10),
(30, 2, 9, 20),
(31, 1, 1, 20),
(32, 1, 2, 35),
(33, 1, 3, 10),
(34, 1, 4, 5),
(35, 1, 8, 10),
(36, 1, 9, 20),
(37, 3, 1, 20),
(38, 3, 2, 5),
(39, 3, 3, 10),
(40, 3, 4, 35),
(41, 3, 8, 10),
(42, 3, 9, 20);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama`) VALUES
(1, 'Akuntansi'),
(2, 'Administrasi Perkantoran'),
(3, 'DKV');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int NOT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `sifat` enum('benefit','cost') DEFAULT 'benefit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode`, `nama`, `sifat`) VALUES
(1, 'C1', 'Nilai Ujian Umum', 'benefit'),
(2, 'C2', 'Nilai Ujian Wajib Akuntansi', 'benefit'),
(3, 'C3', 'Nilai Ujian Wajib Adm Perkantoran', 'benefit'),
(4, 'C4', 'Nilai Ujian Wajib DKV', 'benefit'),
(8, 'C7', 'Point Prestasi Akademik', 'benefit'),
(9, 'C8', 'Hasil Tes dan Wawancara', 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `no_telepon` varchar(20) DEFAULT NULL,
  `jurusan_sekarang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nisn`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `jurusan_sekarang`) VALUES
(6, '4748', 'I Nyoman Pastika', 'Pupuan, Tabanan, Bali', '2004-03-16', 'Desa, Pujungan. kecamatan Pupuan, ', '085738824131', 'Akuntansi'),
(7, '4750', 'Asvin Andika Putra', 'Pecatu, Kuta Selatan, Badung, Bali', '2005-06-24', 'Pecatu, Kuta Selatan', '085738824131', 'Akuntasi'),
(9, '9080', 'Sir Wagyu', 'Surabaya', '2008-06-20', 'Unggasan, Kuta Selatan, Badung, Bali', '085738824131', 'DKV');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Pendidikan Agama'),
(2, 'PPkn'),
(3, 'Bahasa Indonesia'),
(4, 'Bahasa Inggris'),
(5, 'Matematika'),
(6, 'Fisika'),
(7, 'Kimia'),
(8, 'Biologi'),
(9, 'Ekonomi'),
(10, 'Sejarah'),
(11, 'TIK (informatika)'),
(12, 'Seni Budaya'),
(13, 'PJOK'),
(14, 'Budi Pekerti'),
(15, 'Kewirausahaan');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mahasiswa`
--

CREATE TABLE `nilai_mahasiswa` (
  `id_nilai` int NOT NULL,
  `id_mahasiswa` int DEFAULT NULL,
  `id_kriteria` int DEFAULT NULL,
  `nilai` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nilai_mahasiswa`
--

INSERT INTO `nilai_mahasiswa` (`id_nilai`, `id_mahasiswa`, `id_kriteria`, `nilai`) VALUES
(162, 6, 1, 86.78),
(163, 6, 2, 87.83),
(164, 6, 3, 87.50),
(165, 6, 4, 87.33),
(166, 6, 8, 28.00),
(167, 6, 9, 114.00),
(174, 7, 1, 86.44),
(175, 7, 2, 86.83),
(176, 7, 3, 86.17),
(177, 7, 4, 86.17),
(178, 7, 8, 2.00),
(179, 7, 9, 95.00),
(186, 9, 1, 87.89),
(187, 9, 2, 87.67),
(188, 9, 3, 87.17),
(189, 9, 4, 89.67),
(190, 9, 8, 15.00),
(191, 9, 9, 114.00);

-- --------------------------------------------------------

--
-- Table structure for table `preferensi`
--

CREATE TABLE `preferensi` (
  `id_preferensi` int NOT NULL,
  `id_mahasiswa` int NOT NULL,
  `id_jurusan` int NOT NULL,
  `nilai_preferensi` decimal(10,2) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int NOT NULL,
  `id_mahasiswa` int NOT NULL,
  `jenis_prestasi` varchar(150) NOT NULL,
  `tingkat` enum('Kabupaten','Provinsi','Nasional','Internasional') NOT NULL,
  `juara` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `id_mahasiswa`, `jenis_prestasi`, `tingkat`, `juara`) VALUES
(8, 6, 'Olimpiade Sains', 'Internasional', '1'),
(9, 6, 'Cerdas cermat', 'Nasional', '1'),
(10, 7, 'Cerdas Cermat', 'Kabupaten', '3'),
(12, 9, 'kujuaran catur internasional', 'Nasional', '1'),
(13, 9, 'Olimpiade Tik', 'Kabupaten', '2');

-- --------------------------------------------------------

--
-- Table structure for table `raport`
--

CREATE TABLE `raport` (
  `id_raport` int NOT NULL,
  `id_mahasiswa` int NOT NULL,
  `mapel_id` int NOT NULL,
  `pengetahuan` decimal(5,2) DEFAULT NULL,
  `keterampilan` decimal(5,2) DEFAULT NULL,
  `nilai_akhir` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `raport`
--

INSERT INTO `raport` (`id_raport`, `id_mahasiswa`, `mapel_id`, `pengetahuan`, `keterampilan`, `nilai_akhir`) VALUES
(46, 6, 1, 90.00, 88.00, 89.00),
(47, 6, 2, 87.00, 88.00, 88.00),
(48, 6, 3, 86.00, 84.00, 85.00),
(49, 6, 4, 87.00, 88.00, 88.00),
(50, 6, 5, 90.00, 90.00, 90.00),
(51, 6, 6, 90.00, 90.00, 90.00),
(52, 6, 7, 89.00, 88.00, 89.00),
(53, 6, 8, 87.00, 85.00, 86.00),
(54, 6, 9, 89.00, 78.00, 84.00),
(55, 6, 10, 82.00, 80.00, 81.00),
(56, 6, 11, 90.00, 90.00, 90.00),
(57, 6, 12, 81.00, 80.00, 81.00),
(58, 6, 13, 90.00, 90.00, 90.00),
(59, 6, 14, 80.00, 81.00, 81.00),
(60, 6, 15, 90.00, 90.00, 90.00),
(61, 7, 1, 90.00, 89.00, 90.00),
(62, 7, 2, 87.00, 85.00, 86.00),
(63, 7, 3, 90.00, 87.00, 89.00),
(64, 7, 4, 84.00, 85.00, 85.00),
(65, 7, 5, 82.00, 80.00, 81.00),
(66, 7, 6, 87.00, 86.00, 87.00),
(67, 7, 7, 88.00, 90.00, 89.00),
(68, 7, 8, 84.00, 88.00, 86.00),
(69, 7, 9, 89.00, 87.00, 88.00),
(70, 7, 10, 90.00, 90.00, 90.00),
(71, 7, 11, 89.00, 87.00, 88.00),
(72, 7, 12, 88.00, 85.00, 87.00),
(73, 7, 13, 81.00, 80.00, 81.00),
(74, 7, 14, 90.00, 90.00, 90.00),
(75, 7, 15, 90.00, 90.00, 90.00),
(91, 9, 1, 90.00, 90.00, 90.00),
(92, 9, 2, 87.00, 83.00, 85.00),
(93, 9, 3, 87.00, 86.00, 87.00),
(94, 9, 4, 88.00, 87.00, 88.00),
(95, 9, 5, 90.00, 90.00, 90.00),
(96, 9, 6, 87.00, 85.00, 86.00),
(97, 9, 7, 84.00, 85.00, 85.00),
(98, 9, 8, 88.00, 87.00, 88.00),
(99, 9, 9, 82.00, 83.00, 83.00),
(100, 9, 10, 81.00, 80.00, 81.00),
(101, 9, 11, 90.00, 90.00, 90.00),
(102, 9, 12, 97.00, 96.00, 97.00),
(103, 9, 13, 87.00, 88.00, 88.00),
(104, 9, 14, 82.00, 383.00, 233.00),
(105, 9, 15, 87.00, 88.00, 88.00);

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id_tes` int NOT NULL,
  `id_mahasiswa` int NOT NULL,
  `iq` int DEFAULT NULL,
  `wawancara` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id_tes`, `id_mahasiswa`, `iq`, `wawancara`) VALUES
(4, 6, 140, 88.00),
(6, 7, 120, 70.00),
(8, 9, 140, 88.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(16) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `username`, `password`, `level`) VALUES
('68babc87ea6ec', 'I Nyoman Pastika', '26 Agustus 2004', '2004-06-08', 'Br.Mertasari\r\nDesa Pujungan', '085738824131', 'passtika', '$2y$10$I9dsgaiQlCju.7ZZCEyA.e5LXnthK7glKRSyHtAtkSDjkwnVUbLj2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_jurusan`
--
ALTER TABLE `bobot_jurusan`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `preferensi`
--
ALTER TABLE `preferensi`
  ADD PRIMARY KEY (`id_preferensi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`id_raport`),
  ADD KEY `fk_mahasiswa` (`id_mahasiswa`),
  ADD KEY `fk_mapel` (`mapel_id`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id_tes`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_jurusan`
--
ALTER TABLE `bobot_jurusan`
  MODIFY `id_bobot` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `preferensi`
--
ALTER TABLE `preferensi`
  MODIFY `id_preferensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `raport`
--
ALTER TABLE `raport`
  MODIFY `id_raport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `id_tes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot_jurusan`
--
ALTER TABLE `bobot_jurusan`
  ADD CONSTRAINT `bobot_jurusan_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `bobot_jurusan_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Constraints for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  ADD CONSTRAINT `nilai_mahasiswa_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `nilai_mahasiswa_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Constraints for table `preferensi`
--
ALTER TABLE `preferensi`
  ADD CONSTRAINT `preferensi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `preferensi_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `raport`
--
ALTER TABLE `raport`
  ADD CONSTRAINT `fk_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_mapel` FOREIGN KEY (`mapel_id`) REFERENCES `mata_pelajaran` (`id_mapel`) ON DELETE CASCADE;

--
-- Constraints for table `tes`
--
ALTER TABLE `tes`
  ADD CONSTRAINT `tes_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
