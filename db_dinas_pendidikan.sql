-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2013 at 04:22 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_dinas_pendidikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `word` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=69 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `word`) VALUES
(68, 1361579748, 'YZK53');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_admin_dinas`
--

CREATE TABLE IF NOT EXISTS `dlmbg_admin_dinas` (
  `id_admin_dinas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_admin_dinas` varchar(100) NOT NULL,
  `username_admin_dinas` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_bidang` int(5) NOT NULL,
  PRIMARY KEY (`id_admin_dinas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dlmbg_admin_dinas`
--

INSERT INTO `dlmbg_admin_dinas` (`id_admin_dinas`, `nama_admin_dinas`, `username_admin_dinas`, `password`, `id_bidang`) VALUES
(1, 'Gede Lumbung Suma Wijaya', 'gede', '8ffbb1d0a07e5acdcff984df4cce14f0', 1),
(3, 'Suma', 'suma', '8ffbb1d0a07e5acdcff984df4cce14f0', 1),
(4, 'Gede Lumbung Suma Wijaya', 'gedelumbung', '8ffbb1d0a07e5acdcff984df4cce14f0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_admin_sekolah`
--

CREATE TABLE IF NOT EXISTS `dlmbg_admin_sekolah` (
  `id_admin_sekolah` int(5) NOT NULL AUTO_INCREMENT,
  `id_sekolah` int(5) NOT NULL,
  `nama_operator` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin_sekolah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dlmbg_admin_sekolah`
--

INSERT INTO `dlmbg_admin_sekolah` (`id_admin_sekolah`, `id_sekolah`, `nama_operator`, `username`, `password`, `email`) VALUES
(1, 4, 'Suma Wijaya', 'sumawijaya', '8ffbb1d0a07e5acdcff984df4cce14f0', 'sumawijaya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_admin_super`
--

CREATE TABLE IF NOT EXISTS `dlmbg_admin_super` (
  `id_admin_super` int(5) NOT NULL AUTO_INCREMENT,
  `nama_super_admin` varchar(100) NOT NULL,
  `username_super_admin` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin_super`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dlmbg_admin_super`
--

INSERT INTO `dlmbg_admin_super` (`id_admin_super`, `nama_super_admin`, `username_super_admin`, `password`) VALUES
(1, 'Gede Lumbung', 'lumbung', '8ffbb1d0a07e5acdcff984df4cce14f0');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_counter`
--

CREATE TABLE IF NOT EXISTS `dlmbg_counter` (
  `id_counter` int(10) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(20) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  PRIMARY KEY (`id_counter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=290 ;

--
-- Dumping data for table `dlmbg_counter`
--

INSERT INTO `dlmbg_counter` (`id_counter`, `ip_address`, `tanggal`) VALUES
(1, '::1', '07-Feb-2013 19:10:55'),
(2, '::1', '08-Feb-2013 00:51:56'),
(3, '::1', '08-Feb-2013 05:33:05'),
(4, '::1', '08-Feb-2013 19:44:16'),
(5, '::1', '11-Feb-2013 02:32:36'),
(6, '::1', '11-Feb-2013 03:12:08'),
(7, '::1', '11-Feb-2013 12:44:50'),
(8, '::1', '11-Feb-2013 12:53:02'),
(9, '::1', '11-Feb-2013 13:24:15'),
(10, '::1', '11-Feb-2013 23:43:27'),
(11, '::1', '12-Feb-2013 00:18:03'),
(12, '::1', '12-Feb-2013 00:18:13'),
(13, '::1', '12-Feb-2013 00:23:33'),
(14, '::1', '12-Feb-2013 00:25:12'),
(15, '::1', '12-Feb-2013 02:36:03'),
(16, '::1', '12-Feb-2013 02:40:00'),
(17, '::1', '12-Feb-2013 02:40:05'),
(18, '::1', '12-Feb-2013 02:40:28'),
(19, '::1', '12-Feb-2013 02:40:31'),
(20, '::1', '12-Feb-2013 04:38:19'),
(21, '::1', '12-Feb-2013 04:39:26'),
(22, '::1', '12-Feb-2013 04:40:10'),
(23, '::1', '16-Feb-2013 04:41:24'),
(24, '::1', '16-Feb-2013 04:41:37'),
(25, '::1', '16-Feb-2013 04:42:46'),
(26, '::1', '12-Feb-2013 04:45:24'),
(27, '::1', '12-Feb-2013 04:46:13'),
(28, '::1', '12-Feb-2013 04:46:22'),
(29, '::1', '12-Feb-2013 04:46:29'),
(30, '::1', '12-Feb-2013 04:46:32'),
(31, '::1', '12-Feb-2013 04:46:34'),
(32, '::1', '12-Feb-2013 04:49:26'),
(33, '::1', '12-Feb-2013 04:58:22'),
(34, '::1', '12-Feb-2013 04:58:29'),
(35, '::1', '12-Feb-2013 04:58:39'),
(36, '::1', '12-Feb-2013 04:59:01'),
(37, '::1', '12-Feb-2013 04:59:14'),
(38, '::1', '12-Feb-2013 04:59:17'),
(39, '::1', '12-Feb-2013 05:00:41'),
(40, '::1', '12-Feb-2013 05:00:48'),
(41, '::1', '12-Feb-2013 05:07:43'),
(42, '::1', '12-Feb-2013 05:08:13'),
(43, '::1', '12-Feb-2013 05:08:32'),
(44, '::1', '12-Feb-2013 05:08:40'),
(45, '::1', '12-Feb-2013 05:09:58'),
(46, '::1', '12-Feb-2013 05:10:26'),
(47, '::1', '12-Feb-2013 05:10:42'),
(48, '::1', '12-Feb-2013 05:45:59'),
(49, '::1', '12-Feb-2013 05:46:11'),
(50, '::1', '12-Feb-2013 05:46:29'),
(51, '::1', '12-Feb-2013 05:47:26'),
(52, '::1', '12-Feb-2013 05:47:37'),
(53, '::1', '12-Feb-2013 05:47:53'),
(54, '::1', '12-Feb-2013 05:48:31'),
(55, '::1', '12-Feb-2013 05:48:46'),
(56, '::1', '12-Feb-2013 05:48:53'),
(57, '::1', '12-Feb-2013 05:49:02'),
(58, '::1', '12-Feb-2013 05:49:47'),
(59, '::1', '12-Feb-2013 05:50:22'),
(60, '::1', '12-Feb-2013 05:52:25'),
(61, '::1', '12-Feb-2013 05:52:30'),
(62, '::1', '12-Feb-2013 05:53:00'),
(63, '::1', '12-Feb-2013 05:53:02'),
(64, '::1', '12-Feb-2013 05:54:14'),
(65, '::1', '12-Feb-2013 05:54:33'),
(66, '::1', '12-Feb-2013 05:54:52'),
(67, '::1', '12-Feb-2013 05:55:52'),
(68, '::1', '12-Feb-2013 05:56:13'),
(69, '::1', '12-Feb-2013 05:56:17'),
(70, '::1', '12-Feb-2013 05:56:20'),
(71, '::1', '12-Feb-2013 05:56:22'),
(72, '::1', '12-Feb-2013 05:57:28'),
(73, '::1', '12-Feb-2013 05:57:44'),
(74, '::1', '12-Feb-2013 05:57:48'),
(75, '::1', '12-Feb-2013 05:58:03'),
(76, '::1', '12-Feb-2013 05:58:24'),
(77, '::1', '12-Feb-2013 05:58:49'),
(78, '::1', '12-Feb-2013 05:59:03'),
(79, '::1', '12-Feb-2013 05:59:03'),
(80, '::1', '12-Feb-2013 05:59:13'),
(81, '::1', '12-Feb-2013 05:59:20'),
(82, '::1', '12-Feb-2013 05:59:26'),
(83, '::1', '12-Feb-2013 05:59:29'),
(84, '::1', '12-Feb-2013 05:59:33'),
(85, '::1', '12-Feb-2013 05:59:36'),
(86, '::1', '12-Feb-2013 05:59:42'),
(87, '::1', '12-Feb-2013 05:59:56'),
(88, '::1', '12-Feb-2013 05:59:59'),
(89, '::1', '12-Feb-2013 06:00:05'),
(90, '::1', '12-Feb-2013 06:00:09'),
(91, '::1', '12-Feb-2013 06:00:09'),
(92, '::1', '12-Feb-2013 06:00:14'),
(93, '::1', '12-Feb-2013 06:00:40'),
(94, '::1', '12-Feb-2013 06:02:04'),
(95, '::1', '12-Feb-2013 06:02:12'),
(96, '::1', '12-Feb-2013 06:02:12'),
(97, '::1', '12-Feb-2013 06:02:30'),
(98, '::1', '12-Feb-2013 06:02:47'),
(99, '::1', '12-Feb-2013 06:03:05'),
(100, '::1', '12-Feb-2013 06:03:56'),
(101, '::1', '12-Feb-2013 06:04:08'),
(102, '::1', '12-Feb-2013 06:04:14'),
(103, '::1', '12-Feb-2013 06:04:17'),
(104, '::1', '12-Feb-2013 06:04:20'),
(105, '::1', '12-Feb-2013 06:04:23'),
(106, '::1', '12-Feb-2013 06:04:26'),
(107, '::1', '12-Feb-2013 06:05:35'),
(108, '::1', '12-Feb-2013 06:06:12'),
(109, '::1', '12-Feb-2013 06:06:21'),
(110, '::1', '12-Feb-2013 06:06:26'),
(111, '::1', '12-Feb-2013 06:06:28'),
(112, '::1', '12-Feb-2013 06:07:54'),
(113, '::1', '12-Feb-2013 06:11:31'),
(114, '::1', '12-Feb-2013 06:11:38'),
(115, '::1', '12-Feb-2013 06:11:55'),
(116, '::1', '12-Feb-2013 06:12:30'),
(117, '::1', '12-Feb-2013 06:12:35'),
(118, '::1', '12-Feb-2013 06:12:41'),
(119, '::1', '12-Feb-2013 06:12:44'),
(120, '::1', '12-Feb-2013 06:12:54'),
(121, '::1', '12-Feb-2013 06:12:59'),
(122, '::1', '12-Feb-2013 06:13:02'),
(123, '::1', '12-Feb-2013 06:13:22'),
(124, '::1', '12-Feb-2013 06:15:09'),
(125, '::1', '12-Feb-2013 06:17:24'),
(126, '::1', '12-Feb-2013 06:19:30'),
(127, '::1', '12-Feb-2013 06:20:07'),
(128, '::1', '12-Feb-2013 06:21:09'),
(129, '::1', '12-Feb-2013 06:21:26'),
(130, '::1', '12-Feb-2013 06:22:03'),
(131, '::1', '12-Feb-2013 06:22:11'),
(132, '::1', '12-Feb-2013 06:22:30'),
(133, '::1', '12-Feb-2013 06:22:31'),
(134, '::1', '12-Feb-2013 06:22:36'),
(135, '::1', '12-Feb-2013 06:22:47'),
(136, '::1', '12-Feb-2013 06:23:13'),
(137, '::1', '12-Feb-2013 06:23:24'),
(138, '::1', '12-Feb-2013 06:23:29'),
(139, '::1', '12-Feb-2013 06:23:34'),
(140, '::1', '12-Feb-2013 06:37:35'),
(141, '::1', '12-Feb-2013 06:41:13'),
(142, '::1', '12-Feb-2013 06:42:52'),
(143, '::1', '12-Feb-2013 06:43:10'),
(144, '::1', '12-Feb-2013 06:43:36'),
(145, '::1', '12-Feb-2013 06:43:48'),
(146, '::1', '12-Feb-2013 06:44:43'),
(147, '::1', '12-Feb-2013 06:45:26'),
(148, '::1', '12-Feb-2013 06:45:55'),
(149, '::1', '12-Feb-2013 06:46:02'),
(150, '::1', '12-Feb-2013 06:46:05'),
(151, '::1', '12-Feb-2013 06:46:08'),
(152, '::1', '12-Feb-2013 06:46:18'),
(153, '::1', '12-Feb-2013 06:46:38'),
(154, '::1', '12-Feb-2013 06:46:50'),
(155, '::1', '12-Feb-2013 06:46:57'),
(156, '::1', '12-Feb-2013 06:47:05'),
(157, '::1', '12-Feb-2013 06:47:10'),
(158, '::1', '12-Feb-2013 06:47:13'),
(159, '::1', '12-Feb-2013 06:47:16'),
(160, '::1', '12-Feb-2013 06:47:26'),
(161, '::1', '12-Feb-2013 06:47:41'),
(162, '::1', '12-Feb-2013 06:47:45'),
(163, '::1', '12-Feb-2013 06:47:51'),
(164, '::1', '12-Feb-2013 06:47:54'),
(165, '::1', '12-Feb-2013 06:49:14'),
(166, '::1', '12-Feb-2013 06:49:16'),
(167, '::1', '12-Feb-2013 06:49:31'),
(168, '::1', '12-Feb-2013 06:49:34'),
(169, '::1', '12-Feb-2013 06:49:36'),
(170, '::1', '12-Feb-2013 06:49:44'),
(171, '::1', '12-Feb-2013 06:50:41'),
(172, '::1', '12-Feb-2013 06:50:47'),
(173, '::1', '12-Feb-2013 07:05:03'),
(174, '::1', '12-Feb-2013 07:05:45'),
(175, '::1', '12-Feb-2013 07:05:50'),
(176, '::1', '12-Feb-2013 07:05:52'),
(177, '::1', '12-Feb-2013 07:06:02'),
(178, '::1', '12-Feb-2013 07:06:04'),
(179, '::1', '12-Feb-2013 07:06:11'),
(180, '::1', '12-Feb-2013 07:06:58'),
(181, '::1', '12-Feb-2013 07:07:05'),
(182, '::1', '12-Feb-2013 07:07:08'),
(183, '::1', '12-Feb-2013 07:07:17'),
(184, '::1', '12-Feb-2013 07:07:28'),
(185, '::1', '12-Feb-2013 07:07:31'),
(186, '::1', '12-Feb-2013 07:07:44'),
(187, '::1', '12-Feb-2013 07:07:47'),
(188, '::1', '12-Feb-2013 07:07:53'),
(189, '::1', '12-Feb-2013 07:36:16'),
(190, '::1', '12-Feb-2013 07:43:27'),
(191, '::1', '12-Feb-2013 07:49:30'),
(192, '::1', '12-Feb-2013 07:52:51'),
(193, '::1', '12-Feb-2013 07:53:57'),
(194, '::1', '12-Feb-2013 07:54:05'),
(195, '::1', '12-Feb-2013 07:54:09'),
(196, '::1', '12-Feb-2013 07:54:11'),
(197, '::1', '12-Feb-2013 07:57:03'),
(198, '::1', '12-Feb-2013 07:58:46'),
(199, '::1', '12-Feb-2013 07:59:50'),
(200, '::1', '12-Feb-2013 08:00:04'),
(201, '::1', '12-Feb-2013 08:00:11'),
(202, '::1', '12-Feb-2013 08:04:26'),
(203, '::1', '12-Feb-2013 08:04:30'),
(204, '::1', '12-Feb-2013 08:04:31'),
(205, '::1', '12-Feb-2013 08:05:54'),
(206, '::1', '12-Feb-2013 08:06:39'),
(207, '::1', '12-Feb-2013 08:07:54'),
(208, '::1', '12-Feb-2013 08:11:20'),
(209, '::1', '12-Feb-2013 08:13:43'),
(210, '::1', '12-Feb-2013 08:14:08'),
(211, '::1', '12-Feb-2013 08:14:31'),
(212, '::1', '12-Feb-2013 08:15:36'),
(213, '::1', '12-Feb-2013 08:16:14'),
(214, '::1', '12-Feb-2013 08:16:36'),
(215, '::1', '12-Feb-2013 08:16:58'),
(216, '::1', '12-Feb-2013 08:17:28'),
(217, '::1', '12-Feb-2013 08:17:45'),
(218, '::1', '12-Feb-2013 08:17:52'),
(219, '::1', '12-Feb-2013 08:18:17'),
(220, '::1', '12-Feb-2013 08:18:23'),
(221, '::1', '12-Feb-2013 08:18:30'),
(222, '::1', '12-Feb-2013 08:18:38'),
(223, '::1', '12-Feb-2013 08:20:36'),
(224, '::1', '12-Feb-2013 08:21:09'),
(225, '::1', '12-Feb-2013 08:22:25'),
(226, '::1', '12-Feb-2013 08:25:48'),
(227, '::1', '12-Feb-2013 08:26:31'),
(228, '::1', '12-Feb-2013 08:28:03'),
(229, '::1', '12-Feb-2013 08:28:11'),
(230, '::1', '12-Feb-2013 08:28:31'),
(231, '::1', '12-Feb-2013 08:28:59'),
(232, '::1', '12-Feb-2013 08:29:15'),
(233, '::1', '12-Feb-2013 08:29:21'),
(234, '::1', '12-Feb-2013 08:29:28'),
(235, '::1', '12-Feb-2013 08:30:55'),
(236, '::1', '12-Feb-2013 08:31:06'),
(237, '::1', '12-Feb-2013 08:31:33'),
(238, '::1', '12-Feb-2013 08:31:35'),
(239, '::1', '12-Feb-2013 08:31:38'),
(240, '::1', '12-Feb-2013 08:31:40'),
(241, '::1', '12-Feb-2013 08:32:21'),
(242, '::1', '12-Feb-2013 08:33:41'),
(243, '::1', '12-Feb-2013 08:42:37'),
(244, '::1', '12-Feb-2013 08:42:39'),
(245, '::1', '12-Feb-2013 08:43:17'),
(246, '::1', '12-Feb-2013 08:44:16'),
(247, '::1', '12-Feb-2013 08:46:45'),
(248, '::1', '12-Feb-2013 14:11:58'),
(249, '::1', '12-Feb-2013 23:36:01'),
(250, '::1', '13-Feb-2013 12:27:58'),
(251, '::1', '13-Feb-2013 20:48:22'),
(252, '::1', '14-Feb-2013 13:45:01'),
(253, '::1', '14-Feb-2013 14:14:54'),
(254, '::1', '15-Feb-2013 00:11:51'),
(255, '::1', '15-Feb-2013 00:11:55'),
(256, '::1', '15-Feb-2013 02:14:13'),
(257, '::1', '15-Feb-2013 02:14:22'),
(258, '::1', '15-Feb-2013 02:50:45'),
(259, '::1', '15-Feb-2013 02:53:07'),
(260, '::1', '15-Feb-2013 02:54:01'),
(261, '::1', '15-Feb-2013 07:44:50'),
(262, '::1', '15-Feb-2013 07:44:54'),
(263, '::1', '15-Feb-2013 07:44:56'),
(264, '::1', '15-Feb-2013 07:45:14'),
(265, '::1', '15-Feb-2013 14:44:10'),
(266, '::1', '16-Feb-2013 02:20:22'),
(267, '::1', '16-Feb-2013 16:55:25'),
(268, '::1', '17-Feb-2013 02:31:15'),
(269, '::1', '18-Feb-2013 00:46:44'),
(270, '::1', '18-Feb-2013 12:00:47'),
(271, '::1', '18-Feb-2013 12:20:19'),
(272, '::1', '18-Feb-2013 16:06:29'),
(273, '::1', '19-Feb-2013 03:57:51'),
(274, '::1', '19-Feb-2013 14:38:48'),
(275, '::1', '19-Feb-2013 15:20:39'),
(276, '::1', '19-Feb-2013 21:02:05'),
(277, '::1', '20-Feb-2013 04:36:49'),
(278, '::1', '20-Feb-2013 15:14:56'),
(279, '::1', '21-Feb-2013 01:58:17'),
(280, '::1', '22-Feb-2013 02:09:05'),
(281, '174.129.228.67', '22-Feb-2013 11:57:50'),
(282, '174.129.228.67', '22-Feb-2013 16:59:16'),
(283, '125.164.244.154', '23-Feb-2013 00:07:35'),
(284, '174.129.228.67', '23-Feb-2013 09:35:37'),
(285, '114.79.2.84', '23-Feb-2013 10:19:01'),
(286, '174.129.228.67', '23-Feb-2013 10:36:26'),
(287, '203.78.119.74', '23-Feb-2013 11:50:31'),
(288, '::1', '27-Feb-2013 13:45:25'),
(289, '::1', '04-Mar-2013 23:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_dinas_download`
--

CREATE TABLE IF NOT EXISTS `dlmbg_dinas_download` (
  `id_dinas_download` int(10) NOT NULL AUTO_INCREMENT,
  `judul_file` varchar(150) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `id_admin_dinas` int(5) NOT NULL,
  `id_bidang` int(5) NOT NULL,
  `stts` int(1) NOT NULL,
  PRIMARY KEY (`id_dinas_download`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dlmbg_dinas_download`
--

INSERT INTO `dlmbg_dinas_download` (`id_dinas_download`, `judul_file`, `nama_file`, `id_admin_dinas`, `id_bidang`, `stts`) VALUES
(1, 'Formulir Pengajuan Beasiswa', '7f34574b1ac8db2f27cd2bf7c75d3ba0.zip', 1, 1, 1),
(2, 'Formulir Prestasi Olahraga', 'olahraga.zip', 3, 4, 1),
(3, 'Formulir Prestasi Olahraga', 'olahraga.zip', 3, 2, 0),
(4, 'Formulir Prestasi Olahraga', 'olahraga.zip', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_menu`
--

CREATE TABLE IF NOT EXISTS `dlmbg_menu` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT,
  `id_parent` int(5) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url_route` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `posisi` varchar(10) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `dlmbg_menu`
--

INSERT INTO `dlmbg_menu` (`id_menu`, `id_parent`, `menu`, `url_route`, `content`, `posisi`) VALUES
(1, 0, 'Profil Dinas', 'http://gedelumbung.com', 'Selamat datang di Website Dinas Perhubungan, Komunikasi dan Informatika Kota Pekanbaru, Website ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi dan gambaran Dinas Perhubungan, Komunikasi dan Informatika <p>Kota Pekanbaru dalam melaksanakan pelayanan perhubungan. Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang Kebijakan Pemerintah Kota Pekanbaru didalam pengelolaan sektor transportasi dan telekomunikasi di wilayah Kotamadya Pekanbaru.</p>\r\n\r\n<p>Kritik dan saran terhadap kekurangan dan kesalahan yang ada sangat kami harapkan guna penyempurnaan Website ini dimasa datang. Semoga Website ini memberikan manfaat bagi kita semua.</p>Selamat datang di Website Dinas Perhubungan, Komunikasi dan Informatika Kota Pekanbaru, Website ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi dan gambaran Dinas Perhubungan, Komunikasi dan Informatika <p>Kota Pekanbaru dalam melaksanakan pelayanan perhubungan. Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang Kebijakan Pemerintah Kota Pekanbaru didalam pengelolaan sektor transportasi dan telekomunikasi di wilayah Kotamadya Pekanbaru.</p>\r\n\r\n<p>Kritik dan saran terhadap kekurangan dan kesalahan yang ada sangat kami harapkan guna penyempurnaan Website ini dimasa datang. Semoga Website ini memberikan manfaat bagi kita semua.</p>\r\n\r\n', 'atas'),
(2, 0, 'Kepegawaian', '', '', 'atas'),
(3, 0, 'Sekolah', '', '', 'atas'),
(4, 0, 'Galeri', '/web/galeri', '', 'atas'),
(5, 0, 'Forum', 'http://gedelumbung.com', '', 'atas'),
(6, 1, 'Sambutan Kepala Dinas', '', 'Selamat datang di Website Dinas Perhubungan, Komunikasi dan Informatika Kota Pekanbaru, Website ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi dan gambaran Dinas Perhubungan, Komunikasi dan Informatika <p>Kota Pekanbaru dalam melaksanakan pelayanan perhubungan. Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang Kebijakan Pemerintah Kota Pekanbaru didalam pengelolaan sektor transportasi dan telekomunikasi di wilayah Kotamadya Pekanbaru.</p>\r\n\r\n<p>Kritik dan saran terhadap kekurangan dan kesalahan yang ada sangat kami harapkan guna penyempurnaan Website ini dimasa datang. Semoga Website ini memberikan manfaat bagi kita semua.</p>Selamat datang di Website Dinas Perhubungan, Komunikasi dan Informatika Kota Pekanbaru, Website ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi dan gambaran Dinas Perhubungan, Komunikasi dan Informatika <p>Kota Pekanbaru dalam melaksanakan pelayanan perhubungan. Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang Kebijakan Pemerintah Kota Pekanbaru didalam pengelolaan sektor transportasi dan telekomunikasi di wilayah Kotamadya Pekanbaru.</p>\r\n\r\n<p>Kritik dan saran terhadap kekurangan dan kesalahan yang ada sangat kami harapkan guna penyempurnaan Website ini dimasa datang. Semoga Website ini memberikan manfaat bagi kita semua.</p>', 'atas'),
(7, 1, 'Visi dan Misi', '', 'Selamat datang di Website Dinas Perhubungan, Komunikasi dan Informatika Kota Pekanbaru, Website ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi dan gambaran Dinas Perhubungan, Komunikasi dan Informatika <p>Kota Pekanbaru dalam melaksanakan pelayanan perhubungan. Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang Kebijakan Pemerintah Kota Pekanbaru didalam pengelolaan sektor transportasi dan telekomunikasi di wilayah Kotamadya Pekanbaru.</p>\r\n\r\n<p>Kritik dan saran terhadap kekurangan dan kesalahan yang ada sangat kami harapkan guna penyempurnaan Website ini dimasa datang. Semoga Website ini memberikan manfaat bagi kita semua.</p>Selamat datang di Website Dinas Perhubungan, Komunikasi dan Informatika Kota Pekanbaru, Website ini dimaksudkan sebagai sarana publikasi untuk memberikan Informasi dan gambaran Dinas Perhubungan, Komunikasi dan Informatika <p>Kota Pekanbaru dalam melaksanakan pelayanan perhubungan. Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang Kebijakan Pemerintah Kota Pekanbaru didalam pengelolaan sektor transportasi dan telekomunikasi di wilayah Kotamadya Pekanbaru.</p>\r\n\r\n<p>Kritik dan saran terhadap kekurangan dan kesalahan yang ada sangat kami harapkan guna penyempurnaan Website ini dimasa datang. Semoga Website ini memberikan manfaat bagi kita semua.</p>', 'atas'),
(8, 2, 'Struktur Kepegawaian', '', '<p>a.   Kepala Dinas;</p>\r\n<p>b.   Sekretariat :</p>\r\n<ol>\r\n<li>Sub Bagian Perencanaan;</li>\r\n<li>Sub Bagian  Umum dan Kepegawaian; dan</li>\r\n<li>Sub Bagian Keuangan</li>\r\n</ol>\r\n<p>c.   Bidang Pendidikan Dasar dan Agama :</p>\r\n<ol>\r\n<li>Seksi Sarana dan Prasarana Pendidikan Dasar dan Agama;</li>\r\n<li>Seksi  Kurikulum Pendidikan Dasar dan Agama; dan</li>\r\n<li>Seksi SPEM.</li>\r\n</ol>\r\n<p>d.   Bidang Pendidikan Menengah, Kejuruan dan Agama :</p>\r\n<ol>\r\n<li>Seksi Sarana dan Prasarana Pendidikan Menengah, Kejuruan dan Agama;</li>\r\n<li>Seksi  Kurikulum Pendidikan Menengah, Kejuruan dan Agama; dan</li>\r\n<li>Seksi SPEM.</li>\r\n</ol>\r\n<p>e.   Bidang Pemuda dan Olahraga :</p>\r\n<ol>\r\n<li>Seksi Pembinaan Pemuda;</li>\r\n<li>Seksi Pembinaan Olah Raga; dan</li>\r\n<li>Seksi Pembinaan PLS.</li>\r\n</ol>\r\n<p>f.    Bidang Ketenagaan Pendidikan  :</p>\r\n<ol>\r\n<li>Seksi Pendidikan dan Pelatihan;</li>\r\n<li>Seksi Ketenagaan TK/SD; dan</li>\r\n<li>Seksi Ketenagaan SMP/SMU/SMK.</li>\r\n</ol>', 'atas'),
(9, 2, 'Data Kepegawaian', '/web/data_kepegawaian', '', 'atas'),
(10, 3, 'Data Sekolah', '/web/data_sekolah', '', 'atas'),
(11, 3, 'Data PTK / Guru', '/web/data_guru', '', 'atas'),
(12, 3, 'Data Peserta Didik', '/web/data_siswa', '', 'atas'),
(13, 0, 'Beranda', '/web/web', '', 'bawah'),
(14, 0, 'Berita', '/web/berita', '', 'bawah'),
(15, 0, 'Pengumuman', '/web/pengumuman', '', 'bawah'),
(16, 0, 'Agenda Dinas', '/web/agenda', '', 'bawah'),
(17, 0, 'List Download', '/web/download', '', 'bawah'),
(18, 0, 'Buku Tamu', '/web/buku_tamu', '', 'bawah');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_multi_agenda`
--

CREATE TABLE IF NOT EXISTS `dlmbg_multi_agenda` (
  `id_multi_agenda` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` int(30) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_bidang` int(5) NOT NULL,
  `tipe_user` varchar(10) NOT NULL,
  `stts` char(1) NOT NULL,
  PRIMARY KEY (`id_multi_agenda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dlmbg_multi_agenda`
--

INSERT INTO `dlmbg_multi_agenda` (`id_multi_agenda`, `judul`, `isi`, `tanggal`, `id_user`, `id_bidang`, `tipe_user`, `stts`) VALUES
(1, 'AMD Umuman APU E-Series Terbaru', 'Untuk hasil test maba bisa didownload pada menu download.....\r\n\r\ndan untuk yang mendapat hasil test wawancara harap secepatnya menghubungi bagian pendaftaran STIKOM.\r\n\r\nwawancara akan dilaksanakan pada tgl 4 Juli 2012 pukul 10.00.\r\n\r\ndan yang dinyatakan lulus dimohon segera melakukan registrasi mulai tanggal 3 Juli di Bagian Pendaftaran STIKOM. ', 1349035111, 2, 2, 'dinas', '0'),
(2, 'JADWAL SKRIPSI / TUGAS AKHIR PERIODE GENAP 2011/2012', '', 1349035111, 2, 2, 'dinas', '1'),
(3, 'JADWAL SKRIPSI / TUGAS AKHIR PERIODE GENAP 2011/2012', '<p>JADWAL SKRIPSI / TUGAS AKHIR PERIODE GENAP 2011/2012</p><p>JADWAL SKRIPSI / TUGAS AKHIR PERIODE GENAP 2011/2012</p><p>JADWAL SKRIPSI / TUGAS AKHIR PERIODE GENAP 2011/2012</p>', 1349035111, 2, 2, 'dinas', '1'),
(4, 'JADWAL SKRIPSI / TUGAS AKHIR PERIODE GENAP 2011/2012', '', 1349035111, 2, 2, 'dinas', '0'),
(5, 'Mulyadi, si Anak Jenius dari Hongkong', '<p>OK</p>', 1361197847, 0, 0, 'superadmin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_multi_berita`
--

CREATE TABLE IF NOT EXISTS `dlmbg_multi_berita` (
  `id_multi_berita` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` int(30) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_bidang` int(5) NOT NULL,
  `tipe_user` varchar(10) NOT NULL,
  `stts` char(1) NOT NULL,
  `headline` char(1) NOT NULL,
  PRIMARY KEY (`id_multi_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `dlmbg_multi_berita`
--

INSERT INTO `dlmbg_multi_berita` (`id_multi_berita`, `judul`, `isi`, `gambar`, `tanggal`, `id_user`, `id_bidang`, `tipe_user`, `stts`, `headline`) VALUES
(1, 'Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing', 'Banyuwangi - Dalam rangka peningkatan kualitas penyusunan rencana pembangunan Desa/Kelurahan Tahun 2014 serta peningkatan kualitas Musrenbang (Musyawarah Perencanaan Pembangunan) yang akan dilaksanakan selama bulan Januari 2013, Bappeda bekerjasama dengan STIKOM (Sekolah Tinggi Ilmu Komputer) ... ', 'slider-banner-1.jpg', 1349032111, 0, 0, 'dinas', '1', 'n'),
(2, 'Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing', 'Banyuwangi - Dalam rangka peningkatan kualitas penyusunan rencana pembangunan Desa/Kelurahan Tahun 2014 serta peningkatan kualitas Musrenbang (Musyawarah Perencanaan Pembangunan) yang akan dilaksanakan selama bulan Januari 2013, Bappeda bekerjasama dengan STIKOM (Sekolah Tinggi Ilmu Komputer) ... ', '82f92e7a10d782371645355babec3333.jpg', 1349032111, 0, 0, 'dinas', '1', 'n'),
(3, 'Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing', 'Banyuwangi - Dalam rangka peningkatan kualitas penyusunan rencana pembangunan Desa/Kelurahan Tahun 2014 serta peningkatan kualitas Musrenbang (Musyawarah Perencanaan Pembangunan) yang akan dilaksanakan selama bulan Januari 2013, Bappeda bekerjasama dengan STIKOM (Sekolah Tinggi Ilmu Komputer) ... ', 'slider-banner-1.jpg', 1349032111, 1, 1, 'dinas', '0', 'n'),
(4, 'Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing', 'Banyuwangi - Dalam rangka peningkatan kualitas penyusunan rencana pembangunan Desa/Kelurahan Tahun 2014 serta peningkatan kualitas Musrenbang (Musyawarah Perencanaan Pembangunan) yang akan dilaksanakan selama bulan Januari 2013, Bappeda bekerjasama dengan STIKOM (Sekolah Tinggi Ilmu Komputer) ... ', 'slider-banner-1.jpg', 1349032111, 1, 0, 'dinas', '0', 'n'),
(5, 'Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing', 'Banyuwangi - Dalam rangka peningkatan kualitas penyusunan rencana pembangunan Desa/Kelurahan Tahun 2014 serta peningkatan kualitas Musrenbang (Musyawarah Perencanaan Pembangunan) yang akan dilaksanakan selama bulan Januari 2013, Bappeda bekerjasama dengan STIKOM (Sekolah Tinggi Ilmu Komputer) ... ', 'slider-banner-1.jpg', 1349032111, 1, 0, 'dinas', '0', 'n'),
(6, 'Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing', 'Banyuwangi - Dalam rangka peningkatan kualitas penyusunan rencana pembangunan Desa/Kelurahan Tahun 2014 serta peningkatan kualitas Musrenbang (Musyawarah Perencanaan Pembangunan) yang akan dilaksanakan selama bulan Januari 2013, Bappeda bekerjasama dengan STIKOM (Sekolah Tinggi Ilmu Komputer) ... ', 'd73b8397781c4f5b12bbeecc3965bb88.JPG', 1349032111, 1, 1, 'dinas', '1', 'y'),
(7, 'Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing', 'Banyuwangi - Dalam rangka peningkatan kualitas penyusunan rencana pembangunan Desa/Kelurahan Tahun 2014 serta peningkatan kualitas Musrenbang (Musyawarah Perencanaan Pembangunan) yang akan dilaksanakan selama bulan Januari 2013, Bappeda bekerjasama dengan STIKOM (Sekolah Tinggi Ilmu Komputer) ... ', 'c00c4eecc784005d309cef0d82d7b4de.JPG', 1349032111, 1, 1, 'dinas', '1', 'y'),
(8, 'Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing', 'Banyuwangi - Dalam rangka peningkatan kualitas penyusunan rencana pembangunan Desa/Kelurahan Tahun 2014 serta peningkatan kualitas Musrenbang (Musyawarah Perencanaan Pembangunan) yang akan dilaksanakan selama bulan Januari 2013, Bappeda bekerjasama dengan STIKOM (Sekolah Tinggi Ilmu Komputer) ... ', '6b0220ae74328dd733588a96d9bfb5be.JPG', 1349032111, 1, 1, 'dinas', '1', 'y'),
(12, 'Diving Into Laravel 3.0 - Controller Routing & Reverse Routing', '<p>Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing.Â Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing</p>\r\n', 'd550bb1ad4af59365c5af9e436c18b39.JPG', 1361245726, 0, 0, 'superadmin', '1', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_multi_pengumuman`
--

CREATE TABLE IF NOT EXISTS `dlmbg_multi_pengumuman` (
  `id_multi_pengumuman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` int(30) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_bidang` int(5) NOT NULL,
  `tipe_user` varchar(10) NOT NULL,
  `stts` char(1) NOT NULL,
  PRIMARY KEY (`id_multi_pengumuman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `dlmbg_multi_pengumuman`
--

INSERT INTO `dlmbg_multi_pengumuman` (`id_multi_pengumuman`, `judul`, `isi`, `tanggal`, `id_user`, `id_bidang`, `tipe_user`, `stts`) VALUES
(2, 'Mulyadi, si Anak Jenius dari Hongkong', 'Untuk hasil test maba bisa didownload pada menu download.....\r\n\r\ndan untuk yang mendapat hasil test wawancara harap secepatnya menghubungi bagian pendaftaran STIKOM.\r\n\r\nwawancara akan dilaksanakan pada tgl 4 Juli 2012 pukul 10.00.\r\n\r\ndan yang dinyatakan lulus dimohon segera melakukan registrasi mulai tanggal 3 Juli di Bagian Pendaftaran STIKOM. ', 1349035514, 1, 1, 'superadmin', '0'),
(3, 'Hasil Tes Calon MaBa Gelombang 2 2012', 'Untuk hasil test maba bisa didownload pada menu download.....\n\ndan untuk yang mendapat hasil test wawancara harap secepatnya menghubungi bagian pendaftaran STIKOM.\n\nwawancara akan dilaksanakan pada tgl 4 Juli 2012 pukul 10.00.\n\ndan yang dinyatakan lulus dimohon segera melakukan registrasi mulai tanggal 3 Juli di Bagian Pendaftaran STIKOM. ', 1349035514, 1, 1, 'superadmin', '1'),
(4, 'Hasil Tes Calon MaBa Gelombang 2 2012', 'Untuk hasil test maba bisa didownload pada menu download.....\n\ndan untuk yang mendapat hasil test wawancara harap secepatnya menghubungi bagian pendaftaran STIKOM.\n\nwawancara akan dilaksanakan pada tgl 4 Juli 2012 pukul 10.00.\n\ndan yang dinyatakan lulus dimohon segera melakukan registrasi mulai tanggal 3 Juli di Bagian Pendaftaran STIKOM. ', 1349035514, 1, 1, 'superadmin', '1'),
(5, 'Pengumuman Yudisium Dan Wisuda', 'Tanggal 21 Januari 2013, di Halaman STIKOM PGRI BANYUWANGI\r\nPersyaratan\r\n1. Mengisi formulir/membayar registrasi Rp. 20.000,-\r\n2. Group / perorangan dan memiliki talenta di bidang musik/dance\r\n3. Mahasiswa STIKOM PGRI BANYUWANGI\r\n4. Untuk Kategori Band (2 Lagu) no punk & no underground\r\nKategori talent Musik : Band,Akustik,Solo / Group Vocal,Dance (Modern,Tradisional)\r\nUntuk Juara 1 , 2 , 3 ada tropi dan uang pembinaan .\r\nPendaftaran mulai tanggal 14 - 18 januari tempat pendaftaran Ruang UKM Seni Melodi Stikom Pgri Banyuwangi\r\nContact Person : \r\nLuqman : 085336037916\r\nRiski : 089682222007', 1349035514, 2, 2, 'dinas', '0'),
(6, 'Pengumuman Yudisium Dan Wisuda', 'Tanggal 21 Januari 2013, di Halaman STIKOM PGRI BANYUWANGI\r\nPersyaratan\r\n1. Mengisi formulir/membayar registrasi Rp. 20.000,-\r\n2. Group / perorangan dan memiliki talenta di bidang musik/dance\r\n3. Mahasiswa STIKOM PGRI BANYUWANGI\r\n4. Untuk Kategori Band (2 Lagu) no punk & no underground\r\nKategori talent Musik : Band,Akustik,Solo / Group Vocal,Dance (Modern,Tradisional)\r\nUntuk Juara 1 , 2 , 3 ada tropi dan uang pembinaan .\r\nPendaftaran mulai tanggal 14 - 18 januari tempat pendaftaran Ruang UKM Seni Melodi Stikom Pgri Banyuwangi\r\nContact Person : \r\nLuqman : 085336037916\r\nRiski : 089682222007', 1349035111, 3, 3, 'dinas', '0'),
(7, 'Pengumuman Yudisium Dan Wisudaaaaa', 'Tanggal 21 Januari 2013, di Halaman STIKOM PGRI BANYUWANGI\r\nPersyaratan\r\n1. Mengisi formulir/membayar registrasi Rp. 20.000,-\r\n2. Group / perorangan dan memiliki talenta di bidang musik/dance\r\n3. Mahasiswa STIKOM PGRI BANYUWANGI\r\n4. Untuk Kategori Band (2 Lagu) no punk & no underground\r\nKategori talent Musik : Band,Akustik,Solo / Group Vocal,Dance (Modern,Tradisional)\r\nUntuk Juara 1 , 2 , 3 ada tropi dan uang pembinaan .\r\nPendaftaran mulai tanggal 14 - 18 januari tempat pendaftaran Ruang UKM Seni Melodi Stikom Pgri Banyuwangi\r\nContact Person : \r\nLuqman : 085336037916\r\nRiski : 089682222007', 1349035111, 3, 3, 'dinas', '0'),
(8, 'Pengumuman Yudisium Dan Wisuda OKOK', 'Tanggal 21 Januari 2013, di Halaman STIKOM PGRI BANYUWANGI\r\nPersyaratan\r\n1. Mengisi formulir/membayar registrasi Rp. 20.000,-\r\n2. Group / perorangan dan memiliki talenta di bidang musik/dance\r\n3. Mahasiswa STIKOM PGRI BANYUWANGI\r\n4. Untuk Kategori Band (2 Lagu) no punk & no underground\r\nKategori talent Musik : Band,Akustik,Solo / Group Vocal,Dance (Modern,Tradisional)\r\nUntuk Juara 1 , 2 , 3 ada tropi dan uang pembinaan .\r\nPendaftaran mulai tanggal 14 - 18 januari tempat pendaftaran Ruang UKM Seni Melodi Stikom Pgri Banyuwangi\r\nContact Person : \r\nLuqman : 085336037916\r\nRiski : 089682222007', 1349035111, 3, 3, 'dinas', '0'),
(9, 'Pengumuman Yudisium Dan Wisuda', 'Tanggal 21 Januari 2013, di Halaman STIKOM PGRI BANYUWANGI\nPersyaratan\n1. Mengisi formulir/membayar registrasi Rp. 20.000,-\n2. Group / perorangan dan memiliki talenta di bidang musik/dance\n3. Mahasiswa STIKOM PGRI BANYUWANGI\n4. Untuk Kategori Band (2 Lagu) no punk & no underground\nKategori talent Musik : Band,Akustik,Solo / Group Vocal,Dance (Modern,Tradisional)\nUntuk Juara 1 , 2 , 3 ada tropi dan uang pembinaan .\nPendaftaran mulai tanggal 14 - 18 januari tempat pendaftaran Ruang UKM Seni Melodi Stikom Pgri Banyuwangi\nContact Person : \nLuqman : 085336037916\nRiski : 089682222007', 1349035111, 3, 3, 'dinas', '0'),
(10, 'Pengumuman Yudisium Dan Wisuda', 'Tanggal 21 Januari 2013, di Halaman STIKOM PGRI BANYUWANGI\nPersyaratan\n1. Mengisi formulir/membayar registrasi Rp. 20.000,-\n2. Group / perorangan dan memiliki talenta di bidang musik/dance\n3. Mahasiswa STIKOM PGRI BANYUWANGI\n4. Untuk Kategori Band (2 Lagu) no punk & no underground\nKategori talent Musik : Band,Akustik,Solo / Group Vocal,Dance (Modern,Tradisional)\nUntuk Juara 1 , 2 , 3 ada tropi dan uang pembinaan .\nPendaftaran mulai tanggal 14 - 18 januari tempat pendaftaran Ruang UKM Seni Melodi Stikom Pgri Banyuwangi\nContact Person : \nLuqman : 085336037916\nRiski : 089682222007', 1349035111, 3, 3, 'dinas', '0'),
(11, 'Pengumuman Yudisium Dan Wisuda', 'Tanggal 21 Januari 2013, di Halaman STIKOM PGRI BANYUWANGI\nPersyaratan\n1. Mengisi formulir/membayar registrasi Rp. 20.000,-\n2. Group / perorangan dan memiliki talenta di bidang musik/dance\n3. Mahasiswa STIKOM PGRI BANYUWANGI\n4. Untuk Kategori Band (2 Lagu) no punk & no underground\nKategori talent Musik : Band,Akustik,Solo / Group Vocal,Dance (Modern,Tradisional)\nUntuk Juara 1 , 2 , 3 ada tropi dan uang pembinaan .\nPendaftaran mulai tanggal 14 - 18 januari tempat pendaftaran Ruang UKM Seni Melodi Stikom Pgri Banyuwangi\nContact Person : \nLuqman : 085336037916\nRiski : 089682222007', 1349035111, 3, 3, 'dinas', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_sekolah_artikel`
--

CREATE TABLE IF NOT EXISTS `dlmbg_sekolah_artikel` (
  `id_sekolah_artikel` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` int(20) NOT NULL,
  `id_admin_sekolah` int(5) NOT NULL,
  `id_sekolah_profil` int(5) NOT NULL,
  `stts` int(1) NOT NULL,
  PRIMARY KEY (`id_sekolah_artikel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dlmbg_sekolah_artikel`
--

INSERT INTO `dlmbg_sekolah_artikel` (`id_sekolah_artikel`, `judul`, `isi`, `gambar`, `tanggal`, `id_admin_sekolah`, `id_sekolah_profil`, `stts`) VALUES
(1, 'AMD Umuman APU E-Series Terbaru AMD Umuman APU E-Series Terbaru', 'Akhirnya kita masuk ke bulan kedua di tahun 2013, yang katanya sih merupakan bulan yang istimewa dan penuh cinta. Yaw mungkin itu tidak berlaku buat yang lagi menyandang pangkat jomblo ;). Gak apalah kalau sekarang jomblo, yang penting besok nikahnya tepat waktu :p. Kegiatan saya bulan ini lumayan padat, masih berkutat dengan yang namanya skripsi. Tapi bukan skripsi punya saya, tapi punya teman. Siapa??? Yaw ada deh, saya orangnya gak senang mengumbar privasi orang. Karena saya tau bagaimana rasanya jika privasi kita diumbar di depan orang banyak, rasanya seret-seret gimana gitu, sambil bawaannya pengen jambak-jambak itu orang (#haha). Cukup saya saja dan teman saya saja yang tau. Selain itu, di bulan ini saya juga jadi lebih banyak mengetahui watak-watak orang di sekitar saya. Mulai dari yang wataknya kayak sengkuni, yang senang mengadu domba orang. Ada yang di depan saya baik tapi di belakang malah menikam. Dan ada juga yang memang berjiwa ksatria, mengibarkan bendera perang, tanpa ada basa-basi layaknya orang-orang munafik yang kerap saya temui. Hehe, kok jadi curhat yakkk... Gak apalah, yaw kan namanya juga blog pribadi.', 'slider-banner-1.jpg', 1349032111, 1, 4, 1),
(2, 'Hadir di Indonesia, Xbox 360 Slim Dibanderol Rp 3,4 Juta', 'Akhirnya kita masuk ke bulan kedua di tahun 2013, yang katanya sih merupakan bulan yang istimewa dan penuh cinta. Yaw mungkin itu tidak berlaku buat yang lagi menyandang pangkat jomblo ;). Gak apalah kalau sekarang jomblo, yang penting besok nikahnya tepat waktu :p. Kegiatan saya bulan ini lumayan padat, masih berkutat dengan yang namanya skripsi. Tapi bukan skripsi punya saya, tapi punya teman. Siapa??? Yaw ada deh, saya orangnya gak senang mengumbar privasi orang. Karena saya tau bagaimana rasanya jika privasi kita diumbar di depan orang banyak, rasanya seret-seret gimana gitu, sambil bawaannya pengen jambak-jambak itu orang (#haha). Cukup saya saja dan teman saya saja yang tau. Selain itu, di bulan ini saya juga jadi lebih banyak mengetahui watak-watak orang di sekitar saya. Mulai dari yang wataknya kayak sengkuni, yang senang mengadu domba orang. Ada yang di depan saya baik tapi di belakang malah menikam. Dan ada juga yang memang berjiwa ksatria, mengibarkan bendera perang, tanpa ada basa-basi layaknya orang-orang munafik yang kerap saya temui. Hehe, kok jadi curhat yakkk... Gak apalah, yaw kan namanya juga blog pribadi.', 'slider-banner-1.jpg', 1349032111, 1, 4, 1),
(3, 'Hadir di Indonesia, Xbox 360 Slim Dibanderol Rp 3,4 Juta', 'Akhirnya kita masuk ke bulan kedua di tahun 2013, yang katanya sih merupakan bulan yang istimewa dan penuh cinta. Yaw mungkin itu tidak berlaku buat yang lagi menyandang pangkat jomblo ;). Gak apalah kalau sekarang jomblo, yang penting besok nikahnya tepat waktu :p. Kegiatan saya bulan ini lumayan padat, masih berkutat dengan yang namanya skripsi. Tapi bukan skripsi punya saya, tapi punya teman. Siapa??? Yaw ada deh, saya orangnya gak senang mengumbar privasi orang. Karena saya tau bagaimana rasanya jika privasi kita diumbar di depan orang banyak, rasanya seret-seret gimana gitu, sambil bawaannya pengen jambak-jambak itu orang (#haha). Cukup saya saja dan teman saya saja yang tau. Selain itu, di bulan ini saya juga jadi lebih banyak mengetahui watak-watak orang di sekitar saya. Mulai dari yang wataknya kayak sengkuni, yang senang mengadu domba orang. Ada yang di depan saya baik tapi di belakang malah menikam. Dan ada juga yang memang berjiwa ksatria, mengibarkan bendera perang, tanpa ada basa-basi layaknya orang-orang munafik yang kerap saya temui. Hehe, kok jadi curhat yakkk... Gak apalah, yaw kan namanya juga blog pribadi.', 'slider-banner-1.jpg', 1349032111, 1, 4, 1),
(5, 'Hadir di Indonesia, Xbox 360 Slim Dibanderol Rp 3,4 Juta', 'Akhirnya kita masuk ke bulan kedua di tahun 2013, yang katanya sih merupakan bulan yang istimewa dan penuh cinta. Yaw mungkin itu tidak berlaku buat yang lagi menyandang pangkat jomblo ;). Gak apalah kalau sekarang jomblo, yang penting besok nikahnya tepat waktu :p. Kegiatan saya bulan ini lumayan padat, masih berkutat dengan yang namanya skripsi. Tapi bukan skripsi punya saya, tapi punya teman. Siapa??? Yaw ada deh, saya orangnya gak senang mengumbar privasi orang. Karena saya tau bagaimana rasanya jika privasi kita diumbar di depan orang banyak, rasanya seret-seret gimana gitu, sambil bawaannya pengen jambak-jambak itu orang (#haha). Cukup saya saja dan teman saya saja yang tau. Selain itu, di bulan ini saya juga jadi lebih banyak mengetahui watak-watak orang di sekitar saya. Mulai dari yang wataknya kayak sengkuni, yang senang mengadu domba orang. Ada yang di depan saya baik tapi di belakang malah menikam. Dan ada juga yang memang berjiwa ksatria, mengibarkan bendera perang, tanpa ada basa-basi layaknya orang-orang munafik yang kerap saya temui. Hehe, kok jadi curhat yakkk... Gak apalah, yaw kan namanya juga blog pribadi.', 'slider-banner-1.jpg', 1349032111, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_sekolah_galeri_sekolah`
--

CREATE TABLE IF NOT EXISTS `dlmbg_sekolah_galeri_sekolah` (
  `id_sekolah_galeri_sekolah` int(5) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(100) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `id_admin_sekolah` int(5) NOT NULL,
  `id_sekolah` int(5) NOT NULL,
  `stts` int(1) NOT NULL,
  PRIMARY KEY (`id_sekolah_galeri_sekolah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `dlmbg_sekolah_galeri_sekolah`
--

INSERT INTO `dlmbg_sekolah_galeri_sekolah` (`id_sekolah_galeri_sekolah`, `gambar`, `judul`, `id_admin_sekolah`, `id_sekolah`, `stts`) VALUES
(14, 'a6e237b393a5e8142684aafe2f85cad3.png', 'Mulyadi, si Anak Jenius dari Hongkong', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_sekolah_guru`
--

CREATE TABLE IF NOT EXISTS `dlmbg_sekolah_guru` (
  `id_sekolah_guru` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `jk` char(1) NOT NULL,
  `status_pns` varchar(30) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `tugas` varchar(40) NOT NULL,
  `id_sekolah` int(5) NOT NULL,
  `id_jenjang_pendidikan` int(5) NOT NULL,
  `id_kecamatan` int(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `tanggal_bertugas` varchar(30) NOT NULL,
  PRIMARY KEY (`id_sekolah_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `dlmbg_sekolah_guru`
--

INSERT INTO `dlmbg_sekolah_guru` (`id_sekolah_guru`, `nama`, `jk`, `status_pns`, `golongan`, `tugas`, `id_sekolah`, `id_jenjang_pendidikan`, `id_kecamatan`, `tempat_lahir`, `tanggal_lahir`, `tanggal_bertugas`) VALUES
(2, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(3, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(4, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(5, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(6, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 2, 'Denpasar', '02/04/1991', '02/13/2011'),
(7, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 2, 'Denpasar', '02/04/1991', '02/13/2011'),
(8, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(9, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(10, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(11, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(12, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 2, 2, 'Denpasar', '02/04/1991', '02/13/2011'),
(13, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(14, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(15, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(16, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(17, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(18, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(19, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(20, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(21, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(22, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(23, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(24, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(25, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(26, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(27, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(28, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(29, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(30, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(31, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(32, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(33, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(34, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(35, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(36, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(37, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(38, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(39, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(40, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(41, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(42, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(43, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 3, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(44, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(45, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(46, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(47, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(48, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(49, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(50, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(51, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(52, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(53, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(54, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(55, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(56, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(57, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(58, 'Gede Lumbung', 'L', 'Aktif', 'IV', 'Kepala Sekolah', 4, 1, 1, 'Denpasar', '02/04/1991', '02/13/2011'),
(60, 'Adi Januardi', 'L', 'Aktif', 'IIIA', 'Guru', 4, 3, 1, 'Denpasar', '04/02/1991', '02/23/2005');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_sekolah_profil`
--

CREATE TABLE IF NOT EXISTS `dlmbg_sekolah_profil` (
  `id_sekolah_profil` int(5) NOT NULL AUTO_INCREMENT,
  `npsn` varchar(100) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `status_sekolah` varchar(30) NOT NULL,
  `id_jenjang_pendidikan` int(5) NOT NULL,
  `visi_misi` text NOT NULL,
  `alamat` text NOT NULL,
  `id_kecamatan` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sekolah_profil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `dlmbg_sekolah_profil`
--

INSERT INTO `dlmbg_sekolah_profil` (`id_sekolah_profil`, `npsn`, `nama_sekolah`, `status_sekolah`, `id_jenjang_pendidikan`, `visi_misi`, `alamat`, `id_kecamatan`, `email`) VALUES
(1, '', 'SMAN 1 Wongsorejo', '', 1, '', '', 1, ''),
(2, '', 'SMKN 1 Denpasar', '', 1, '', '', 2, ''),
(3, '', 'SMPN 2 Wongsorejo', '', 2, '', '', 1, ''),
(4, '1109100350', 'SD 2 Wongsorejo', 'Pemerintah - Terakreditasi', 3, 'Visi :\r\n\r\nMenjadi sekolah berstandar internasional\r\n\r\nMisi :\r\n\r\nMenyiapkan tenaga terampil tingkat menengah bidang teknik industri yang memenuhi standar kompetensi international', 'Jl. HOS. Cokroaminoto No. 84 Ubung, Denpasar\r\nDENPASAR\r\nBALI\r\nINDONESIA\r\n8011667777', 1, 'gedesumawijaya@gmail.com'),
(5, '', 'SD 3 Wongsorejo', '', 3, '', '', 1, ''),
(6, '', 'SD 4 Wongsorejo', '', 3, '', '', 1, ''),
(7, '', 'SD 4 Denpasar', '', 3, '', '', 2, ''),
(9, '', 'SMPN 1 Denpasar', '', 2, '', '', 2, ''),
(10, '', 'SMPN 3 Denpasar', '', 2, '', '', 2, ''),
(11, '', 'SD 2 Wongsorejo', '', 1, '', '', 1, ''),
(12, '', 'SD 4 Denpasar', '', 1, '', '', 1, ''),
(13, '', 'SMPN 3 Denpasar', '', 1, '', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_sekolah_siswa`
--

CREATE TABLE IF NOT EXISTS `dlmbg_sekolah_siswa` (
  `id_sekolah_siswa` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `id_sekolah` int(5) NOT NULL,
  `id_jenjang_pendidikan` int(5) NOT NULL,
  `id_kecamatan` int(10) NOT NULL,
  PRIMARY KEY (`id_sekolah_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dlmbg_sekolah_siswa`
--

INSERT INTO `dlmbg_sekolah_siswa` (`id_sekolah_siswa`, `nama`, `nisn`, `kelas`, `id_sekolah`, `id_jenjang_pendidikan`, `id_kecamatan`) VALUES
(1, 'Alex Firdaus', '1109100350', 'X', 2, 1, 1),
(2, 'Alex Firdaus', '1109100350', 'X', 2, 1, 1),
(3, 'Alex Firdaus', '1109100350', 'X', 1, 1, 1),
(4, 'Alex Firdaus', '1109100350', 'X', 3, 2, 2),
(6, 'Gede Becing Becing', '1109100350', 'X', 4, 3, 1),
(7, 'Annisa Tayara Callista', '1108100200', 'XI', 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_setting`
--

CREATE TABLE IF NOT EXISTS `dlmbg_setting` (
  `id_setting` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `dlmbg_setting`
--

INSERT INTO `dlmbg_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'Dinas Pendidikan Kota Denpasar'),
(2, 'site_footer', 'Teks Footer', 'Copyright &copy; 2013 Dinas Pendidikan Kota Denpasar<br>\r\nDesigned & Developed by Gede Lumbung - http://gedelumbung.com'),
(3, 'site_quotes', 'Quotes Situs', 'Moving Forward With Global Mandiri School\r\n'),
(4, 'site_slider', 'Aktifkan Slider', 'yes'),
(5, 'site_kepala_dinas', 'Foto Kepala Dinas', '5dc4c2a698ba75b36f0c2e63d4a33fea.png'),
(6, 'site_limit_pengumuman_sidebar', 'Limit View Pengumuman - Sidebar', '4'),
(7, 'site_limit_agenda_sidebar', 'Limit View Agenda - Sidebar', '4'),
(8, 'site_kepala_dinas_nama_kepala', 'Nama Kepala Dinas', 'Drs. I Wayan Gede Suma Wijaya'),
(9, 'site_kepala_dinas_nip', 'NIP Kepala Dinas', 'NIP. 110910035004021991'),
(10, 'site_limit_artikel_sekolah_footer', 'Limit View Artikel Sekolah - Footer', '4'),
(11, 'site_limit_berita_slider', 'Limit View Berita - Slider', '5'),
(12, 'site_slider_always', 'Tampilkan Slider di Semua Halaman', 'no'),
(13, 'site_theme', 'Nama Tampilan', 'blue-clouds'),
(14, 'site_sambutan', 'Kata Sambutan', '<strong>Om Swastyastu,</strong><br /><br />\r\n Selamat datang di Website Dinas Pendidikan Kota Denpasar. Website ini sebagai sarana publikasi untuk memberikan Informasi dan gambaran Dinas Pendidikan Kota Denpasar dalam melaksanakan pelayanan di sektor pendidikan. <br /><br />Melalui keberadaan website ini kiranya masyarakat dapat mengetahui seluruh informasi tentang Kebijakan Pemerintah Kota Denpasar  didalam pengelolaan sektor pendidikan di wilayah Kota Denpasar.');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_album_galeri_dinas`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_album_galeri_dinas` (
  `id_abum_galeri_dinas` int(3) NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(100) NOT NULL,
  PRIMARY KEY (`id_abum_galeri_dinas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dlmbg_super_album_galeri_dinas`
--

INSERT INTO `dlmbg_super_album_galeri_dinas` (`id_abum_galeri_dinas`, `nama_album`) VALUES
(1, 'Peresmian Kantor Baru'),
(2, 'Pembukaan Acara Jalan Santai'),
(3, 'Pekan Olahraga Kabupaten 2013'),
(4, 'Pekan Olahraga Kabupaten 2013');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_bidang`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_bidang` (
  `id_super_bidang` int(5) NOT NULL AUTO_INCREMENT,
  `bidang` varchar(100) NOT NULL,
  PRIMARY KEY (`id_super_bidang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dlmbg_super_bidang`
--

INSERT INTO `dlmbg_super_bidang` (`id_super_bidang`, `bidang`) VALUES
(1, 'Kepegawaian'),
(2, 'P2PM'),
(3, 'Dikdas'),
(4, 'Dikmen');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_buku_tamu`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_buku_tamu` (
  `id_super_buku_tamu` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` int(20) NOT NULL,
  `stts` int(1) NOT NULL,
  PRIMARY KEY (`id_super_buku_tamu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dlmbg_super_buku_tamu`
--

INSERT INTO `dlmbg_super_buku_tamu` (`id_super_buku_tamu`, `nama`, `kontak`, `pesan`, `tanggal`, `stts`) VALUES
(1, 'Gede Lumbung', '081916186418', 'Generates server headers which force data to be downloaded to your desktop. Useful with file downloads. The first parameter is the name you want the downloaded file to be named, the second parameter is the file data. Example:', 1349032111, 0),
(2, 'Gede Lumbung', '081916186418', 'Generates server headers which force data to be downloaded to your desktop. Useful with file downloads. The first parameter is the name you want the downloaded file to be named, the second parameter is the file data. Example:', 1349032111, 0),
(3, 'Gede Lumbung', '081916186418', 'Generates server headers which force data to be downloaded to your desktop. Useful with file downloads. The first parameter is the name you want the downloaded file to be named, the second parameter is the file data. Example:', 1349032111, 0),
(4, 'Gede Lumbung', '081916186418', 'Generates server headers which force data to be downloaded to your desktop. Useful with file downloads. The first parameter is the name you want the downloaded file to be named, the second parameter is the file data. Example:', 1349032111, 1),
(5, 'Gede Lumbung', '081916186418', 'Generates server headers which force data to be downloaded to your desktop. Useful with file downloads. The first parameter is the name you want the downloaded file to be named, the second parameter is the file data. Example:', 1349032111, 1),
(6, 'Gede Lumbung', '081916186418', 'Generates server headers which force data to be downloaded to your desktop. Useful with file downloads. The first parameter is the name you want the downloaded file to be named, the second parameter is the file data. Example:', 1349032111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_galeri_dinas`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_galeri_dinas` (
  `id_super_galeri_dinas` int(5) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `id_album` int(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `judul` varchar(150) NOT NULL,
  PRIMARY KEY (`id_super_galeri_dinas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `dlmbg_super_galeri_dinas`
--

INSERT INTO `dlmbg_super_galeri_dinas` (`id_super_galeri_dinas`, `id_user`, `id_album`, `gambar`, `judul`) VALUES
(4, 1, 4, '5318f3565e685ddc6bf408ddf7dd1eb0.jpg', 'Mulyadi, si Anak Jenius dari Hongkong'),
(5, 1, 4, 'bb17a81e262819125f73c32d2ca3a069.jpg', 'Testing Aplikasi'),
(6, 1, 4, 'cea7724c289f70786177ff17dff9d070.jpg', 'Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing'),
(7, 1, 4, 'e7e4377853bd4ce61c408f952cc73ec3.jpg', 'Mulyadi, si Anak Jenius dari Hongkong'),
(8, 1, 4, 'e9f046d03affc77584eef3adf8af3f05.jpg', 'Hasil Tes Calon MaBa Gelombang 2 2012'),
(9, 1, 4, 'de0f8a95695f6487e1b80394f57a397a.jpg', 'Mulyadi, si Anak Jenius dari Hongkong'),
(10, 1, 4, 'e10e0531ade69b09dfa16e6f8802ac76.jpg', 'Testing Aplikasi'),
(11, 1, 4, '06c983bc51bd6002e8dfd96931b6eb20.jpg', 'Bappeda dan STIKOM selenggarakan WORKSHOP Internet Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_jawaban_poll`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_jawaban_poll` (
  `id_super_jawaban_poll` int(5) NOT NULL AUTO_INCREMENT,
  `id_pertanyaan` int(5) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `jum` int(10) NOT NULL,
  PRIMARY KEY (`id_super_jawaban_poll`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dlmbg_super_jawaban_poll`
--

INSERT INTO `dlmbg_super_jawaban_poll` (`id_super_jawaban_poll`, `id_pertanyaan`, `jawaban`, `jum`) VALUES
(1, 1, 'Sangat Bagus', 3),
(2, 1, 'Bagus', 4),
(3, 1, 'Sangat Bagus', 0),
(4, 1, 'Bagus', 1),
(5, 1, 'Sangat Bagus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_jenjang_pendidikan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_jenjang_pendidikan` (
  `id_super_jenjang_pendidikan` int(5) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_super_jenjang_pendidikan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dlmbg_super_jenjang_pendidikan`
--

INSERT INTO `dlmbg_super_jenjang_pendidikan` (`id_super_jenjang_pendidikan`, `pendidikan`) VALUES
(1, 'SMA'),
(2, 'SMP'),
(3, 'SD');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_kecamatan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_kecamatan` (
  `id_super_kecamatan` int(5) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(40) NOT NULL,
  PRIMARY KEY (`id_super_kecamatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dlmbg_super_kecamatan`
--

INSERT INTO `dlmbg_super_kecamatan` (`id_super_kecamatan`, `kecamatan`) VALUES
(1, 'Wongsorejo'),
(2, 'Denpasar Timur');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_kepegawaian`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_kepegawaian` (
  `id_super_kepegawaian` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_bidang` int(5) NOT NULL,
  `kontak` text NOT NULL,
  PRIMARY KEY (`id_super_kepegawaian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dlmbg_super_kepegawaian`
--

INSERT INTO `dlmbg_super_kepegawaian` (`id_super_kepegawaian`, `nama`, `nip`, `jabatan`, `id_bidang`, `kontak`) VALUES
(1, 'Gede Lumbung', '1109100350', 'Kepala Dinas', 1, 'gede@gmail.com'),
(2, 'Alex Firdaus', '1109100351', 'Wakil Kepala Dinas', 1, 'alex@gmail.com'),
(3, 'Alex Firdaus', '1109100351', 'Wakil Kepala Dinas', 1, 'alex@gmail.com'),
(4, 'Alex Firdaus', '1109100351', 'Wakil Kepala Dinasss', 4, 'alex@gmail.com'),
(5, 'Alex Firdaus', '1109100351', 'Wakil Kepala Dinas', 1, 'alex@gmail.com'),
(6, 'Alex Firdaus', '1109100351', 'Wakil Kepala Dinas', 1, 'alex@gmail.com'),
(7, 'Alex Firdaus', '1109100351', 'Wakil Kepala Dinas', 1, 'alex@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_link_terkait`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_link_terkait` (
  `id_super_link_terkait` int(5) NOT NULL AUTO_INCREMENT,
  `nama_link` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id_super_link_terkait`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dlmbg_super_link_terkait`
--

INSERT INTO `dlmbg_super_link_terkait` (`id_super_link_terkait`, `nama_link`, `url`) VALUES
(1, 'Pemerintah Kota Denpasar', 'http://denpasarkota.go.id'),
(2, 'Perpustakaan Daerah Kota Denpasar', 'http://perpus.denpasarkota.go.id');

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_pertanyaan_poll`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_pertanyaan_poll` (
  `id_super_pertanyaan_poll` int(5) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id_super_pertanyaan_poll`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dlmbg_super_pertanyaan_poll`
--

INSERT INTO `dlmbg_super_pertanyaan_poll` (`id_super_pertanyaan_poll`, `pertanyaan`, `aktif`) VALUES
(1, 'Bagaimana menurut anda tentang Kurikulum 2013 yang akan dicanangkan pada tahun ajaran mendatang?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dlmbg_super_statis`
--

CREATE TABLE IF NOT EXISTS `dlmbg_super_statis` (
  `id_super_statis` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`id_super_statis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
