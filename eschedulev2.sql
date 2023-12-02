-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 09:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eschedulev2`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `tgl_jadwal` date NOT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_user`, `id_shift`, `tgl_jadwal`, `created_date`, `updated_at`) VALUES
(2, 1, 3, '2023-02-23', '2023-02-24 08:15:21', '2023-02-24 08:15:21'),
(3, 6, 2, '2023-02-23', '2023-02-23 14:54:40', '2023-02-24 07:14:16'),
(4, 6, 1, '2023-02-25', '2023-02-24 08:18:20', '2023-02-24 08:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shf_id` int(11) NOT NULL,
  `shf_deskripsi` varchar(255) NOT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shf_id`, `shf_deskripsi`, `pesan`, `jam`, `created_at`, `updated_at`) VALUES
(1, 'Shift 1', 'Tes', '07:00:00', '2023-02-02', '0000-00-00'),
(2, 'Shift 2', 'shift2', '15:00:00', '0000-00-00', '2023-02-17'),
(3, 'Shift 3', 'Hello', '22:00:00', '2023-02-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_username` varchar(100) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_nama` varchar(255) NOT NULL,
  `usr_level` enum('Admin','User') NOT NULL,
  `chat_id` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_id`, `usr_username`, `usr_password`, `usr_nama`, `usr_level`, `chat_id`, `unit`, `created_at`, `updated_at`) VALUES
(0, 'rusdi', '123', 'rusdi', 'Admin', 1296178949, 'IT Office', '2023-02-21', NULL),
(1, 'admin', '$2y$10$Eps1ykjBvm3Ww20uQBgVLeEgzcVz4AXktniYaVlyXJ7oW1pyBmOOa', 'Jimmy Arianda Bahari', 'Admin', 550996783, 'Store', '2022-12-23', '2023-02-02'),
(6, 'iksan', '$2y$10$cWErT5khQN4VL1BFhImHpe6RuEAW0.lzgkps93ztFyiKeXH.ZVACm', 'Ikhsan IT', 'Admin', 550996783, 'Store', '2023-01-27', '2023-01-27');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jadwal`
-- (See below for the actual view)
--
CREATE TABLE `view_jadwal` (
`id_jadwal` int(11)
,`usr_nama` varchar(255)
,`shf_deskripsi` varchar(255)
,`tgl_jadwal` date
);

-- --------------------------------------------------------

--
-- Structure for view `view_jadwal`
--
DROP TABLE IF EXISTS `view_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jadwal`  AS SELECT `j`.`id_jadwal` AS `id_jadwal`, `usr`.`usr_nama` AS `usr_nama`, `s`.`shf_deskripsi` AS `shf_deskripsi`, `j`.`tgl_jadwal` AS `tgl_jadwal` FROM ((`jadwal` `j` join `user` `usr` on(`j`.`id_user` = `usr`.`usr_id`)) join `shift` `s` on(`j`.`id_shift` = `s`.`shf_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_shift` (`id_shift`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shf_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_fk1` FOREIGN KEY (`id_user`) REFERENCES `user` (`usr_id`),
  ADD CONSTRAINT `jadwal_fk2` FOREIGN KEY (`id_shift`) REFERENCES `shift` (`shf_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
