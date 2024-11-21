-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 04:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_attendance`
--

CREATE TABLE `tb_attendance` (
  `id` int(11) NOT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attendance_status` enum('Present','Sick','Without Explanation','Permission') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_attendance`
--

INSERT INTO `tb_attendance` (`id`, `id_employee`, `date`, `attendance_status`) VALUES
(1, 1, '2024-09-01', 'Present'),
(2, 1, '2024-09-02', 'Present'),
(3, 1, '2024-09-03', 'Present'),
(4, 1, '2024-09-04', 'Present'),
(5, 1, '2024-09-05', 'Present'),
(6, 1, '2024-09-06', 'Present'),
(7, 1, '2024-09-07', 'Present'),
(8, 1, '2024-09-08', 'Present'),
(9, 1, '2024-09-09', 'Present'),
(10, 1, '2024-09-10', 'Present'),
(11, 1, '2024-09-11', 'Present'),
(12, 1, '2024-09-12', 'Present'),
(13, 1, '2024-09-13', 'Present'),
(14, 1, '2024-09-14', 'Present'),
(15, 1, '2024-09-15', 'Present'),
(16, 1, '2024-09-16', 'Present'),
(17, 1, '2024-09-17', 'Present'),
(18, 1, '2024-09-18', 'Present'),
(19, 1, '2024-09-19', 'Present'),
(20, 1, '2024-09-20', 'Present'),
(21, 1, '2024-09-21', 'Present'),
(22, 1, '2024-09-22', 'Present'),
(23, 1, '2024-09-23', 'Present'),
(24, 1, '2024-09-24', 'Present'),
(25, 1, '2024-09-25', 'Present'),
(26, 1, '2024-09-26', 'Present'),
(27, 1, '2024-09-27', 'Present'),
(28, 1, '2024-09-28', 'Present'),
(29, 1, '2024-09-29', 'Present'),
(30, 1, '2024-09-30', 'Present'),
(31, 2, '2024-09-01', 'Present'),
(32, 2, '2024-09-02', 'Present'),
(33, 2, '2024-09-03', 'Present'),
(34, 2, '2024-09-04', 'Present'),
(35, 2, '2024-09-05', 'Present'),
(36, 2, '2024-09-06', 'Present'),
(37, 2, '2024-09-07', 'Present'),
(38, 2, '2024-09-08', 'Present'),
(39, 2, '2024-09-09', 'Present'),
(40, 2, '2024-09-10', 'Present'),
(41, 2, '2024-09-11', 'Present'),
(42, 2, '2024-09-12', 'Present'),
(43, 2, '2024-09-13', 'Present'),
(44, 2, '2024-09-14', 'Present'),
(45, 2, '2024-09-15', 'Present'),
(46, 2, '2024-09-16', 'Present'),
(47, 2, '2024-09-17', 'Present'),
(48, 2, '2024-09-18', 'Present'),
(49, 2, '2024-09-19', 'Present'),
(50, 2, '2024-09-20', 'Present'),
(51, 2, '2024-09-21', 'Present'),
(52, 2, '2024-09-22', 'Present'),
(53, 2, '2024-09-23', 'Present'),
(54, 2, '2024-09-24', 'Present'),
(55, 2, '2024-09-25', 'Present'),
(56, 2, '2024-09-26', 'Present'),
(57, 2, '2024-09-27', 'Present'),
(58, 2, '2024-09-28', 'Present'),
(59, 2, '2024-09-29', 'Present'),
(60, 2, '2024-09-30', 'Present'),
(61, 3, '2024-09-01', 'Present'),
(62, 3, '2024-09-02', 'Present'),
(63, 3, '2024-09-03', 'Present'),
(64, 3, '2024-09-04', 'Present'),
(65, 3, '2024-09-05', 'Present'),
(66, 3, '2024-09-06', 'Present'),
(67, 3, '2024-09-07', 'Present'),
(68, 3, '2024-09-08', 'Present'),
(69, 3, '2024-09-09', 'Present'),
(70, 3, '2024-09-10', 'Present'),
(71, 3, '2024-09-11', 'Present'),
(72, 3, '2024-09-12', 'Present'),
(73, 3, '2024-09-13', 'Present'),
(74, 3, '2024-09-14', 'Present'),
(75, 3, '2024-09-15', 'Present'),
(76, 3, '2024-09-16', 'Present'),
(77, 3, '2024-09-17', 'Present'),
(78, 3, '2024-09-18', 'Present'),
(79, 3, '2024-09-19', 'Present'),
(80, 3, '2024-09-20', 'Present'),
(81, 3, '2024-09-21', 'Present'),
(82, 3, '2024-09-22', 'Present'),
(83, 3, '2024-09-23', 'Present'),
(84, 3, '2024-09-24', 'Present'),
(85, 3, '2024-09-25', 'Present'),
(86, 3, '2024-09-26', 'Present'),
(87, 3, '2024-09-27', 'Present'),
(88, 3, '2024-09-28', 'Present'),
(89, 3, '2024-09-29', 'Present'),
(90, 3, '2024-09-30', 'Present'),
(91, 4, '2024-09-01', 'Present'),
(92, 4, '2024-09-02', 'Present'),
(93, 4, '2024-09-03', 'Present'),
(94, 4, '2024-09-04', 'Present'),
(95, 4, '2024-09-05', 'Present'),
(96, 4, '2024-09-06', 'Present'),
(97, 4, '2024-09-07', 'Present'),
(98, 4, '2024-09-08', 'Present'),
(99, 4, '2024-09-09', 'Present'),
(100, 4, '2024-09-10', 'Present'),
(101, 4, '2024-09-11', 'Present'),
(102, 4, '2024-09-12', 'Present'),
(103, 4, '2024-09-13', 'Present'),
(104, 4, '2024-09-14', 'Present'),
(105, 4, '2024-09-15', 'Present'),
(106, 4, '2024-09-16', 'Present'),
(107, 4, '2024-09-17', 'Present'),
(108, 4, '2024-09-18', 'Present'),
(109, 4, '2024-09-19', 'Present'),
(110, 4, '2024-09-20', 'Present'),
(111, 4, '2024-09-21', 'Present'),
(112, 4, '2024-09-22', 'Present'),
(113, 4, '2024-09-23', 'Present'),
(114, 4, '2024-09-24', 'Present'),
(115, 4, '2024-09-25', 'Present'),
(116, 4, '2024-09-26', 'Present'),
(117, 4, '2024-09-27', 'Present'),
(118, 4, '2024-09-28', 'Present'),
(119, 4, '2024-09-29', 'Present'),
(120, 4, '2024-09-30', 'Present'),
(121, 5, '2024-09-01', 'Present'),
(122, 5, '2024-09-02', 'Present'),
(123, 5, '2024-09-03', 'Present'),
(124, 5, '2024-09-04', 'Present'),
(125, 5, '2024-09-05', 'Present'),
(126, 5, '2024-09-06', 'Present'),
(127, 5, '2024-09-07', 'Present'),
(128, 5, '2024-09-08', 'Present'),
(129, 5, '2024-09-09', 'Present'),
(130, 5, '2024-09-10', 'Present'),
(131, 5, '2024-09-11', 'Present'),
(132, 5, '2024-09-12', 'Present'),
(133, 5, '2024-09-13', 'Present'),
(134, 5, '2024-09-14', 'Present'),
(135, 5, '2024-09-15', 'Present'),
(136, 5, '2024-09-16', 'Present'),
(137, 5, '2024-09-17', 'Present'),
(138, 5, '2024-09-18', 'Present'),
(139, 5, '2024-09-19', 'Present'),
(140, 5, '2024-09-20', 'Present'),
(141, 5, '2024-09-21', 'Present'),
(142, 5, '2024-09-22', 'Present'),
(143, 5, '2024-09-23', 'Present'),
(144, 5, '2024-09-24', 'Present'),
(145, 5, '2024-09-25', 'Present'),
(146, 5, '2024-09-26', 'Present'),
(147, 5, '2024-09-27', 'Present'),
(148, 5, '2024-09-28', 'Present'),
(149, 5, '2024-09-29', 'Present'),
(150, 5, '2024-09-30', 'Present'),
(151, 6, '2024-09-01', 'Present'),
(152, 6, '2024-09-02', 'Present'),
(153, 6, '2024-09-03', 'Present'),
(154, 6, '2024-09-04', 'Present'),
(155, 6, '2024-09-05', 'Present'),
(156, 6, '2024-09-06', 'Present'),
(157, 6, '2024-09-07', 'Present'),
(158, 6, '2024-09-08', 'Present'),
(159, 6, '2024-09-09', 'Present'),
(160, 6, '2024-09-10', 'Present'),
(161, 6, '2024-09-11', 'Present'),
(162, 6, '2024-09-12', 'Present'),
(163, 6, '2024-09-13', 'Present'),
(164, 6, '2024-09-14', 'Present'),
(165, 6, '2024-09-15', 'Present'),
(166, 6, '2024-09-16', 'Present'),
(167, 6, '2024-09-17', 'Present'),
(168, 6, '2024-09-18', 'Present'),
(169, 6, '2024-09-19', 'Present'),
(170, 6, '2024-09-20', 'Present'),
(171, 6, '2024-09-21', 'Present'),
(172, 6, '2024-09-22', 'Present'),
(173, 6, '2024-09-23', 'Present'),
(174, 6, '2024-09-24', 'Present'),
(175, 6, '2024-09-25', 'Present'),
(176, 6, '2024-09-26', 'Present'),
(177, 6, '2024-09-27', 'Present'),
(178, 6, '2024-09-28', 'Present'),
(179, 6, '2024-09-29', 'Present'),
(180, 6, '2024-09-30', 'Present'),
(181, 7, '2024-09-01', 'Present'),
(182, 7, '2024-09-02', 'Present'),
(183, 7, '2024-09-03', 'Present'),
(184, 7, '2024-09-04', 'Present'),
(185, 7, '2024-09-05', 'Present'),
(186, 7, '2024-09-06', 'Present'),
(187, 7, '2024-09-07', 'Present'),
(188, 7, '2024-09-08', 'Present'),
(189, 7, '2024-09-09', 'Present'),
(190, 7, '2024-09-10', 'Present'),
(191, 7, '2024-09-11', 'Present'),
(192, 7, '2024-09-12', 'Present'),
(193, 7, '2024-09-13', 'Present'),
(194, 7, '2024-09-14', 'Present'),
(195, 7, '2024-09-15', 'Present'),
(196, 7, '2024-09-16', 'Present'),
(197, 7, '2024-09-17', 'Present'),
(198, 7, '2024-09-18', 'Present'),
(199, 7, '2024-09-19', 'Present'),
(200, 7, '2024-09-20', 'Present'),
(201, 7, '2024-09-21', 'Present'),
(202, 7, '2024-09-22', 'Present'),
(203, 7, '2024-09-23', 'Present'),
(204, 7, '2024-09-24', 'Present'),
(205, 7, '2024-09-25', 'Present'),
(206, 7, '2024-09-26', 'Present'),
(207, 7, '2024-09-27', 'Present'),
(208, 7, '2024-09-28', 'Present'),
(209, 7, '2024-09-29', 'Present'),
(210, 7, '2024-09-30', 'Present'),
(211, 8, '2024-09-01', 'Present'),
(212, 8, '2024-09-02', 'Present'),
(213, 8, '2024-09-03', 'Present'),
(214, 8, '2024-09-04', 'Present'),
(215, 8, '2024-09-05', 'Present'),
(216, 8, '2024-09-06', 'Present'),
(217, 8, '2024-09-07', 'Present'),
(218, 8, '2024-09-08', 'Present'),
(219, 8, '2024-09-09', 'Present'),
(220, 8, '2024-09-10', 'Present'),
(221, 8, '2024-09-11', 'Present'),
(222, 8, '2024-09-12', 'Present'),
(223, 8, '2024-09-13', 'Present'),
(224, 8, '2024-09-14', 'Present'),
(225, 8, '2024-09-15', 'Present'),
(226, 8, '2024-09-16', 'Present'),
(227, 8, '2024-09-17', 'Present'),
(228, 8, '2024-09-18', 'Present'),
(229, 8, '2024-09-19', 'Present'),
(230, 8, '2024-09-20', 'Present'),
(231, 8, '2024-09-21', 'Present'),
(232, 8, '2024-09-22', 'Present'),
(233, 8, '2024-09-23', 'Present'),
(234, 8, '2024-09-24', 'Present'),
(235, 8, '2024-09-25', 'Present'),
(236, 8, '2024-09-26', 'Present'),
(237, 8, '2024-09-27', 'Present'),
(238, 8, '2024-09-28', 'Present'),
(239, 8, '2024-09-29', 'Present'),
(240, 8, '2024-09-30', 'Present'),
(241, 9, '2024-09-01', 'Present'),
(242, 9, '2024-09-02', 'Present'),
(243, 9, '2024-09-03', 'Present'),
(244, 9, '2024-09-04', 'Present'),
(245, 9, '2024-09-05', 'Present'),
(246, 9, '2024-09-06', 'Present'),
(247, 9, '2024-09-07', 'Present'),
(248, 9, '2024-09-08', 'Present'),
(249, 9, '2024-09-09', 'Present'),
(250, 9, '2024-09-10', 'Present'),
(251, 9, '2024-09-11', 'Present'),
(252, 9, '2024-09-12', 'Present'),
(253, 9, '2024-09-13', 'Present'),
(254, 9, '2024-09-14', 'Present'),
(255, 9, '2024-09-15', 'Present'),
(256, 9, '2024-09-16', 'Present'),
(257, 9, '2024-09-17', 'Present'),
(258, 9, '2024-09-18', 'Present'),
(259, 9, '2024-09-19', 'Present'),
(260, 9, '2024-09-20', 'Present'),
(261, 9, '2024-09-21', 'Present'),
(262, 9, '2024-09-22', 'Present'),
(263, 9, '2024-09-23', 'Present'),
(264, 9, '2024-09-24', 'Present'),
(265, 9, '2024-09-25', 'Present'),
(266, 9, '2024-09-26', 'Present'),
(267, 9, '2024-09-27', 'Present'),
(268, 9, '2024-09-28', 'Present'),
(269, 9, '2024-09-29', 'Present'),
(270, 9, '2024-09-30', 'Present'),
(271, 10, '2024-09-01', 'Present'),
(272, 10, '2024-09-02', 'Present'),
(273, 10, '2024-09-03', 'Present'),
(274, 10, '2024-09-04', 'Present'),
(275, 10, '2024-09-05', 'Present'),
(276, 10, '2024-09-06', 'Present'),
(277, 10, '2024-09-07', 'Present'),
(278, 10, '2024-09-08', 'Present'),
(279, 10, '2024-09-09', 'Present'),
(280, 10, '2024-09-10', 'Present'),
(281, 10, '2024-09-11', 'Present'),
(282, 10, '2024-09-12', 'Present'),
(283, 10, '2024-09-13', 'Present'),
(284, 10, '2024-09-14', 'Present'),
(285, 10, '2024-09-15', 'Present'),
(286, 10, '2024-09-16', 'Present'),
(287, 10, '2024-09-17', 'Present'),
(288, 10, '2024-09-18', 'Present'),
(289, 10, '2024-09-19', 'Present'),
(290, 10, '2024-09-20', 'Present'),
(291, 10, '2024-09-21', 'Present'),
(292, 10, '2024-09-22', 'Present'),
(293, 10, '2024-09-23', 'Present'),
(294, 10, '2024-09-24', 'Present'),
(295, 10, '2024-09-25', 'Present'),
(296, 10, '2024-09-26', 'Present'),
(297, 10, '2024-09-27', 'Present'),
(298, 10, '2024-09-28', 'Present'),
(299, 10, '2024-09-29', 'Present'),
(300, 10, '2024-09-30', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `id_employee` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jobdesk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`id_employee`, `username`, `email`, `jobdesk`) VALUES
(1, 'Adisti', 'adisti11@example.com', 'Employee'),
(2, 'Helma', 'helma12@example.com', 'Employee'),
(3, 'Yaritza', 'yaritza13@example.com', 'Employee'),
(4, 'Tantoganjel', 'tantoganjel16@example.com', 'Employee'),
(5, 'Tata', 'tata17@example.com', 'Employee'),
(6, 'Egawulandari', 'egawulandari2@example.com', 'Employee'),
(7, 'Laili', 'laili3@example.com', 'Employee'),
(8, 'Aan', 'aan5@example.com', 'Employee'),
(9, 'Nanda', 'nanda6@example.com', 'Employee'),
(10, 'Atia', 'atia7@example.com', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `email` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(100) DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`email`, `username`, `password`, `reset_token`, `id_admin`) VALUES
('zacktmint@email.com', 'zackyadmin1', '$2y$10$D.LW2.n17W6TSl2YpNJOeu05EUw5ZawnjOwch2Vbrly5EJAvlVq3i', NULL, 1),
('zackm@gmail.com', 'zackm', '$2y$10$o2txV314u4FPTShlDKmIE.kfXwohXeuMIadoCYGWzQhyosMBV0H/6', NULL, 2),
('tmintcreative@gmail.com', 'administrator', '$2y$10$gHMTxX1AXchreS0Xv/lyhuX7Uh/Uji9/18J/0glOFlUAxFtPq8yE.', NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  ADD CONSTRAINT `tb_attendance_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `tb_employee` (`id_employee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
