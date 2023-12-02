
CREATE TABLE IF NOT EXISTS `cuti` (
  `id_cuti` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `keterangan` text,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table ppinfra.cuti: ~3 rows (approximately)
INSERT INTO `cuti` (`id_cuti`, `id_user`, `keterangan`, `tgl_awal`, `tgl_akhir`, `tanggal`, `updated_at`) VALUES
	(2, 2, 'c', '2023-11-06', '2023-11-26', '2023-11-25', '2023-12-01 00:46:23'),
	(4, 2, 'bolos\r\n', '2023-12-01', '2023-10-01', '2023-11-30', '2023-12-01 05:07:11'),
	(5, 2, '', '2023-12-01', '2023-12-01', '2023-11-30', '2023-12-01 05:07:07');

-- Dumping structure for table ppinfra.shift
CREATE TABLE IF NOT EXISTS `shift` (
  `shf_id` int NOT NULL AUTO_INCREMENT,
  `shf_deskripsi` varchar(255) NOT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`shf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppinfra.shift: ~3 rows (approximately)
INSERT INTO `shift` (`shf_id`, `shf_deskripsi`, `pesan`, `jam`, `created_at`, `updated_at`) VALUES
	(1, 'Shift 1', 'Tes', '07:00:00', '2023-02-02', '0000-00-00'),
	(2, 'Shift 2', 'shift2', '15:00:00', '0000-00-00', '2023-02-17'),
	(3, 'Shift 3', 'Hello', '22:00:00', '2023-02-13', '0000-00-00');

-- Dumping structure for table ppinfra.spd
CREATE TABLE IF NOT EXISTS `spd` (
  `id_spd` int NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) DEFAULT NULL,
  `pemberi` int DEFAULT NULL,
  `penerima` int DEFAULT NULL,
  `urusan` text,
  `berangkat` varchar(255) DEFAULT NULL,
  `bertugas` varchar(255) DEFAULT NULL,
  `kembali` date DEFAULT NULL,
  `transportasi` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_spd`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table ppinfra.spd: ~8 rows (approximately)
INSERT INTO `spd` (`id_spd`, `nomor`, `pemberi`, `penerima`, `urusan`, `berangkat`, `bertugas`, `kembali`, `transportasi`, `tanggal`, `updated_at`) VALUES
	(1, '/SPD/PPIN/XI/2023', 0, 2, 'coba', '3173', '1471', '2023-12-01', NULL, '2023-01-17', '2023-11-30 23:53:49'),
	(2, '/SPD/PPIN/XI/2023', 1, 2, 'coba', '0', '0', '2023-12-01', 'Pesawat Terbang', '2023-05-19', '2023-11-30 23:46:04'),
	(3, '/SPD/PPIN/XI/2023', 1, 2, 'sda', '0', '0', '2023-12-01', 'Pesawat Terbang', '2023-06-19', '2023-11-30 23:46:08'),
	(4, '/SPD/PPIN/XI/2023', 1, 2, 'ccc', '0', '0', '2023-12-01', 'Pesawat Terbang', '2023-07-18', '2023-11-30 23:46:12'),
	(5, '/SPD/PPIN/XI/2023', 1, 2, 'g', '1404', '5105', '2023-12-01', 'Pesawat Terbang', '2023-08-19', '2023-11-30 23:46:14'),
	(6, '/SPD/PPIN/XI/2023', 1, 2, 'ad', 'KOTA JAKARTA PUSAT', 'KOTA PEKANBARU', '2023-12-01', 'Pesawat Terbang', '2023-11-19', '2023-12-01 00:20:40'),
	(11, '/SPD/PPIN/XI/2023', 1, 2, 'testing', 'KABUPATEN KEPULAUAN MENTAWAI', 'KABUPATEN LEBAK', '2023-12-01', 'Pesawat Terbang', '2023-11-25', '2023-12-01 00:20:32'),
	(12, '/SPD/PPIN/XI/2023', 1, 2, '', 'KABUPATEN SIMEULUE', 'KABUPATEN SIMEULUE', '2023-12-01', '', '2023-11-30', '2023-11-30 23:45:42');

-- Dumping structure for table ppinfra.user
CREATE TABLE IF NOT EXISTS `user` (
  `usr_id` int NOT NULL AUTO_INCREMENT,
  `usr_username` varchar(100) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_nama` varchar(255) NOT NULL,
  `usr_level` enum('Admin','User') NOT NULL,
  `usr_jabatan` varchar(255) DEFAULT NULL,
  `usr_unit` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppinfra.user: ~2 rows (approximately)
INSERT INTO `user` (`usr_id`, `usr_username`, `usr_password`, `usr_nama`, `usr_level`, `usr_jabatan`, `usr_unit`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', '$2y$10$zrAezKxWDX9OnwXzG2g9L.Yy1frciJtREyDWjtCO2eyCyFdq4Z9BW', 'admin', 'Admin', 'Manager IT', 'IT', '2023-11-19', NULL),
	(2, 'iksan', '$2y$10$lB6Qe2WU/5ZXxN1SlNjhguqcOYXfC3zZVWF7TIIyTpXeWXMVZk09y', 'isan', 'User', 'IT Support', 'Teknik', '2023-11-19', NULL);
