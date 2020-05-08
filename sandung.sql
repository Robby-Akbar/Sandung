-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2020 at 02:36 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandung`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` char(10) NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL,
  `id_user` char(7) DEFAULT NULL,
  `id_ruangan` char(7) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `tgl_booking` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_penggunaan` date NOT NULL,
  `scan_ktm` varchar(255) NOT NULL,
  `scan_surat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status_booking` enum('acc','belum','tidak') NOT NULL DEFAULT 'belum',
  `id_dosen` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `penanggung_jawab`, `id_user`, `id_ruangan`, `jam_mulai`, `jam_berakhir`, `tgl_booking`, `tgl_penggunaan`, `scan_ktm`, `scan_surat`, `keterangan`, `status_booking`, `id_dosen`) VALUES
('b000000001', 'Robby Akbar', 'u000001', 'r000001', '15:00:00', '18:00:00', '2020-04-18 11:40:38', '2020-04-24', 'aaa.jpg', 'aaaa.jpg', 'Mumas PSTI', 'acc', NULL);

--
-- Triggers `booking`
--
DELIMITER $$
CREATE TRIGGER `tg_booking_insert` BEFORE INSERT ON `booking` FOR EACH ROW BEGIN
  INSERT INTO booking_seq VALUES (NULL);
  SET NEW.id_booking = CONCAT('b', LPAD(LAST_INSERT_ID(), 9, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking_seq`
--

CREATE TABLE `booking_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_seq`
--

INSERT INTO `booking_seq` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `direksi`
--

CREATE TABLE `direksi` (
  `id_direksi` char(5) NOT NULL,
  `nama_direksi` varchar(150) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` char(15) NOT NULL,
  `jabatan` varchar(75) NOT NULL,
  `id_instansi` char(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','staff') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `direksi`
--

INSERT INTO `direksi` (`id_direksi`, `nama_direksi`, `jenis_kelamin`, `no_hp`, `jabatan`, `id_instansi`, `username`, `password`, `type`) VALUES
('a0001', 'Robby Akbar', 'L', '6289666549850', 'Kasubag Umper', 'i001', 'ibbor123', '$2y$10$IRYKQkT0K2Qv4yW/cgnzkedJT2Kxb0lyMnrAA8rp8bQZNveK9HoWy', 'admin'),
('a0002', 'Rabka Ibbor', 'L', '6289666549850', 'Tim ICT', 'i002', 'rabka321', '$2y$10$Dbc9hbRgNzNxWYFRcfFnROj.wzK5Z9PXiN9ChVYzTUNx9Y8.fHK6C', 'admin'),
('a0003', 'Rabka Ibbor', 'L', '6285219485295', 'Tim ICT', 'i001', 'rabka', 'QiWljMw=', 'staff');

--
-- Triggers `direksi`
--
DELIMITER $$
CREATE TRIGGER `tg_direksi_insert` BEFORE INSERT ON `direksi` FOR EACH ROW BEGIN
  INSERT INTO direksi_seq VALUES (NULL);
  SET NEW.id_direksi = CONCAT('a', LPAD(LAST_INSERT_ID(), 4, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `direksi_seq`
--

CREATE TABLE `direksi_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `direksi_seq`
--

INSERT INTO `direksi_seq` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` varchar(5) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_jurusan` char(5) NOT NULL,
  `id_instansi` char(4) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `username`, `password`, `id_jurusan`, `id_instansi`, `jenis_kelamin`) VALUES
('d0001', 'Dian Permata Sari, M.Kom.', 'dianchan', 'AXb0', 'p0001', 'i001', 'P'),
('d0002', 'Dr. Suko Pratomo, M.Pd.', 'sukoco', 'A3b2', 'p0004', 'i001', 'L'),
('d0003', 'Syifaul Fuada, S.Pd., M.T.', 'syifa', 'Qz2ugcw=', 'p0007', 'i001', 'L'),
('d0004', 'Nuur Wachid Abdulmajid, M.Pd.', 'nuur', 'XjGylQ==', 'p0001', 'i001', 'L');

--
-- Triggers `dosen`
--
DELIMITER $$
CREATE TRIGGER `tg_dosen_insert` BEFORE INSERT ON `dosen` FOR EACH ROW BEGIN
  INSERT INTO dosen_seq VALUES (NULL);
  SET NEW.id_dosen = CONCAT('d', LPAD(LAST_INSERT_ID(), 4, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_seq`
--

CREATE TABLE `dosen_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_seq`
--

INSERT INTO `dosen_seq` (`id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_ruangan`
--

CREATE TABLE `fasilitas_ruangan` (
  `id_fasilitas` char(9) NOT NULL,
  `nama_fasilitas` varchar(75) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_ruangan` char(7) NOT NULL,
  `des_fasilitas` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas_ruangan`
--

INSERT INTO `fasilitas_ruangan` (`id_fasilitas`, `nama_fasilitas`, `jumlah`, `id_ruangan`, `des_fasilitas`) VALUES
('f00000004', 'Televisi', 1, 'r000001', 'Rusak'),
('f00000006', 'Kursi', 15, 'r000002', 'Baru'),
('f00000007', 'Meja', 5, 'r000002', 'Ini Deskripsi');

--
-- Triggers `fasilitas_ruangan`
--
DELIMITER $$
CREATE TRIGGER `tg_fasilitas_insert` BEFORE INSERT ON `fasilitas_ruangan` FOR EACH ROW BEGIN
  INSERT INTO fasilitas_ruangan_seq VALUES (NULL);
  SET NEW.id_fasilitas = CONCAT('f', LPAD(LAST_INSERT_ID(), 8, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_ruangan_seq`
--

CREATE TABLE `fasilitas_ruangan_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas_ruangan_seq`
--

INSERT INTO `fasilitas_ruangan_seq` (`id`) VALUES
(4),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` char(6) NOT NULL,
  `nama_gedung` varchar(75) NOT NULL,
  `id_instansi` varchar(4) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `gambar_gedung` varchar(255) NOT NULL,
  `jumlah_lantai` int(2) NOT NULL,
  `jumlah_ruangan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `id_instansi`, `latitude`, `longitude`, `gambar_gedung`, `jumlah_lantai`, `jumlah_ruangan`) VALUES
('g00001', 'Gedung Terbuka', 'i002', -6.265385, 107.135544, 'i002header.jpg', 1, 5),
('g00002', 'Aula Serba Guna', 'i002', -6.265540, 107.135315, 'i0022.jpg', 1, 3),
('g00003', 'Aula Barat', 'i001', -6.539979, 107.444374, 'i001SAVE_20200410_062107.jpeg', 1, 2);

--
-- Triggers `gedung`
--
DELIMITER $$
CREATE TRIGGER `tg_gedung_insert` BEFORE INSERT ON `gedung` FOR EACH ROW BEGIN
  INSERT INTO gedung_seq VALUES (NULL);
  SET NEW.id_gedung = CONCAT('g', LPAD(LAST_INSERT_ID(), 5, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gedung_seq`
--

CREATE TABLE `gedung_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gedung_seq`
--

INSERT INTO `gedung_seq` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` char(4) NOT NULL,
  `nama_instansi` varchar(150) NOT NULL,
  `alamat_instansi` varchar(175) NOT NULL,
  `no_telp` char(15) NOT NULL,
  `visi` varchar(255) DEFAULT NULL,
  `misi` text,
  `sejarah` text,
  `logo_instansi` varchar(255) NOT NULL,
  `status_instansi` enum('aktif','tidak_aktif') NOT NULL DEFAULT 'tidak_aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `alamat_instansi`, `no_telp`, `visi`, `misi`, `sejarah`, `logo_instansi`, `status_instansi`) VALUES
('i001', 'Universitas Pendidikan Indonesia', 'Jl. Dr. Setiabudhi No. 229 Bandung 40154 Jawa Barat - Indonesia', '62222013161', NULL, NULL, NULL, 'i001upi.png', 'aktif'),
('i002', 'SMK Negeri 2 Cikarang Barat', 'Jl. Fatahillah No. 1A RW 04 Kalijaya Cikarang Barat Bekasi Jawa Barat', '62218900578', NULL, NULL, NULL, 'i002logo_smkn2.png', 'tidak_aktif');

-- --------------------------------------------------------

--
-- Table structure for table `instansi_seq`
--

CREATE TABLE `instansi_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi_seq`
--

INSERT INTO `instansi_seq` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` char(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_ruangan` char(7) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat') NOT NULL,
  `id_matkul` char(6) NOT NULL,
  `id_kelas` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jam_mulai`, `jam_selesai`, `id_ruangan`, `hari`, `id_matkul`, `id_kelas`) VALUES
('j0000000001', '09:30:00', '12:00:00', 'r000001', 'rabu', 'c00001', 'k000002'),
('j0000000002', '07:50:00', '09:30:00', 'r000002', 'senin', 'c00002', 'k000004'),
('j0000000003', '07:00:00', '08:40:00', 'r000001', 'rabu', 'c00003', 'k000002');

--
-- Triggers `jadwal`
--
DELIMITER $$
CREATE TRIGGER `tg_jadwal_insert` BEFORE INSERT ON `jadwal` FOR EACH ROW BEGIN
  INSERT INTO jadwal_seq VALUES (NULL);
  SET NEW.id_jadwal = CONCAT('j', LPAD(LAST_INSERT_ID(), 10, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_seq`
--

CREATE TABLE `jadwal_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_seq`
--

INSERT INTO `jadwal_seq` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` char(5) NOT NULL,
  `type` enum('jurusan','ormawa','ukm') NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `id_instansi` char(4) NOT NULL,
  `des_jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `type`, `nama_jurusan`, `id_instansi`, `des_jurusan`) VALUES
('p0001', 'jurusan', 'Pendidikan Sistem dan Teknologi Informasi', 'i001', ''),
('p0002', 'ormawa', 'HIMA PSTI', 'i001', ''),
('p0003', 'ukm', 'LDK FOKUSSALAM', 'i001', ''),
('p0004', 'jurusan', 'Pendidikan Guru Sekolah Dasar', 'i001', ''),
('p0005', 'ormawa', 'Badan Eksekutif Mahasiswa', 'i001', 'ini deskripsi'),
('p0006', 'jurusan', 'Pendidikan Guru Pendidikan Anak Usia Dini', 'i001', 'siap hap yayaya'),
('p0007', 'jurusan', 'Sistem Telekomunikasi', 'i001', 'Teknik Jaya');

--
-- Triggers `jurusan`
--
DELIMITER $$
CREATE TRIGGER `tg_jurusan_insert` BEFORE INSERT ON `jurusan` FOR EACH ROW BEGIN
  INSERT INTO jurusan_seq VALUES (NULL);
  SET NEW.id_jurusan = CONCAT('p', LPAD(LAST_INSERT_ID(), 4, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan_seq`
--

CREATE TABLE `jurusan_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan_seq`
--

INSERT INTO `jurusan_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` char(7) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `id_jurusan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `angkatan`, `id_jurusan`) VALUES
('k000001', 'Komprehensif', 2020, 'p0002'),
('k000002', '4B', 2018, 'p0001'),
('k000003', 'Progressive', 2020, 'p0005'),
('k000004', 'Sistel 1', 2019, 'p0007');

--
-- Triggers `kelas`
--
DELIMITER $$
CREATE TRIGGER `tg_kelas_insert` BEFORE INSERT ON `kelas` FOR EACH ROW BEGIN
  INSERT INTO kelas_seq VALUES (NULL);
  SET NEW.id_kelas = CONCAT('k', LPAD(LAST_INSERT_ID(), 6, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_seq`
--

CREATE TABLE `kelas_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_seq`
--

INSERT INTO `kelas_seq` (`id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `masukan`
--

CREATE TABLE `masukan` (
  `id_masukan` char(8) NOT NULL,
  `id_user` char(7) NOT NULL,
  `id_instansi` char(4) NOT NULL,
  `masukan` varchar(100) NOT NULL,
  `bukti_foto` varchar(255) NOT NULL,
  `des_masukan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `masukan`
--
DELIMITER $$
CREATE TRIGGER `tg_masukan_insert` BEFORE INSERT ON `masukan` FOR EACH ROW BEGIN
  INSERT INTO masukan_seq VALUES (NULL);
  SET NEW.id_masukan = CONCAT('m', LPAD(LAST_INSERT_ID(), 7, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `masukan_seq`
--

CREATE TABLE `masukan_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` char(6) NOT NULL,
  `nama_matkul` varchar(75) NOT NULL,
  `id_jurusan` char(5) NOT NULL,
  `id_dosen` char(5) NOT NULL,
  `jumlah_sks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matkul`, `nama_matkul`, `id_jurusan`, `id_dosen`, `jumlah_sks`) VALUES
('c00001', 'Supply Chain Management', 'p0001', 'd0001', 3),
('c00002', 'Rangkaian Elektronika', 'p0007', 'd0003', 2),
('c00003', 'Pengelolaan Pendidikan', 'p0001', 'd0004', 2);

--
-- Triggers `mata_kuliah`
--
DELIMITER $$
CREATE TRIGGER `tg_matkul_insert` BEFORE INSERT ON `mata_kuliah` FOR EACH ROW BEGIN
  INSERT INTO mata_kuliah_seq VALUES (NULL);
  SET NEW.id_matkul = CONCAT('c', LPAD(LAST_INSERT_ID(), 5, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah_seq`
--

CREATE TABLE `mata_kuliah_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah_seq`
--

INSERT INTO `mata_kuliah_seq` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` char(7) NOT NULL,
  `nama_ruangan` varchar(75) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  `gambar_ruangan` varchar(255) NOT NULL,
  `id_gedung` char(6) NOT NULL,
  `lantai_ke` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `kapasitas`, `gambar_ruangan`, `id_gedung`, `lantai_ke`) VALUES
('r000001', 'R. 123.456.789', 320, 'g00003xp.jpg', 'g00003', 1),
('r000002', 'R. 987.654.321', 10, 'g000032304164IMG-2049780x390.jpg', 'g00003', 1);

--
-- Triggers `ruangan`
--
DELIMITER $$
CREATE TRIGGER `tg_ruangan_insert` BEFORE INSERT ON `ruangan` FOR EACH ROW BEGIN
  INSERT INTO ruangan_seq VALUES (NULL);
  SET NEW.id_ruangan = CONCAT('r', LPAD(LAST_INSERT_ID(), 6, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan_seq`
--

CREATE TABLE `ruangan_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan_seq`
--

INSERT INTO `ruangan_seq` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(7) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_kelas` char(7) NOT NULL,
  `id_instansi` char(4) NOT NULL,
  `status_user` enum('aktif','tidak') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `id_kelas`, `id_instansi`, `status_user`) VALUES
('u000001', 'Robby Akbar', 'himapstiupi', 'QDezjsIjHQ==', 'k000001', 'i001', 'aktif'),
('u000002', 'Fiqhi Zuhda Fathi Falah', 'fiqhizuhda', 'Vi22j8QyDQMuVQ==', 'k000002', 'i001', 'aktif');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `tg_user_insert` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
  INSERT INTO user_seq VALUES (NULL);
  SET NEW.id_user = CONCAT('u', LPAD(LAST_INSERT_ID(), 6, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_seq`
--

CREATE TABLE `user_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_seq`
--

INSERT INTO `user_seq` (`id`) VALUES
(1),
(2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `booking_seq`
--
ALTER TABLE `booking_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direksi`
--
ALTER TABLE `direksi`
  ADD PRIMARY KEY (`id_direksi`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `direksi_seq`
--
ALTER TABLE `direksi_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `dosen_seq`
--
ALTER TABLE `dosen_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_ruangan`
--
ALTER TABLE `fasilitas_ruangan`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `fasilitas_ruangan_seq`
--
ALTER TABLE `fasilitas_ruangan_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `gedung_seq`
--
ALTER TABLE `gedung_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `instansi_seq`
--
ALTER TABLE `instansi_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `jadwal_seq`
--
ALTER TABLE `jadwal_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `jurusan_seq`
--
ALTER TABLE `jurusan_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `kelas_seq`
--
ALTER TABLE `kelas_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masukan`
--
ALTER TABLE `masukan`
  ADD PRIMARY KEY (`id_masukan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `masukan_seq`
--
ALTER TABLE `masukan_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `mata_kuliah_seq`
--
ALTER TABLE `mata_kuliah_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `id_gedung` (`id_gedung`);

--
-- Indexes for table `ruangan_seq`
--
ALTER TABLE `ruangan_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `user_seq`
--
ALTER TABLE `user_seq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_seq`
--
ALTER TABLE `booking_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `direksi_seq`
--
ALTER TABLE `direksi_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dosen_seq`
--
ALTER TABLE `dosen_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fasilitas_ruangan_seq`
--
ALTER TABLE `fasilitas_ruangan_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gedung_seq`
--
ALTER TABLE `gedung_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `instansi_seq`
--
ALTER TABLE `instansi_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jadwal_seq`
--
ALTER TABLE `jadwal_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jurusan_seq`
--
ALTER TABLE `jurusan_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kelas_seq`
--
ALTER TABLE `kelas_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `masukan_seq`
--
ALTER TABLE `masukan_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mata_kuliah_seq`
--
ALTER TABLE `mata_kuliah_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ruangan_seq`
--
ALTER TABLE `ruangan_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_seq`
--
ALTER TABLE `user_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `direksi`
--
ALTER TABLE `direksi`
  ADD CONSTRAINT `direksi_ibfk_1` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`),
  ADD CONSTRAINT `dosen_ibfk_3` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);

--
-- Constraints for table `fasilitas_ruangan`
--
ALTER TABLE `fasilitas_ruangan`
  ADD CONSTRAINT `fasilitas_ruangan_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);

--
-- Constraints for table `gedung`
--
ALTER TABLE `gedung`
  ADD CONSTRAINT `gedung_ibfk_1` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `mata_kuliah` (`id_matkul`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `masukan`
--
ALTER TABLE `masukan`
  ADD CONSTRAINT `masukan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `masukan_ibfk_2` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `mata_kuliah_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
