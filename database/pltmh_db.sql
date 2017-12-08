-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08 Des 2017 pada 08.16
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pltmh_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `username` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `role` varchar(30) NOT NULL,
  `first_name` varchar(65) NOT NULL,
  `last_name` varchar(65) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id_account`, `username`, `email`, `role`, `first_name`, `last_name`, `password`, `salt`, `date_joined`) VALUES
(1, 'aulwardana', 'auldesain@gmail.com', 'Administrator', 'Aulia Arif', 'Wardana', '456a31f98f8e827b41775849d963878a651311e6179542a5b9d21a24517906d4', 'ed52a4c2a5dce39e09ecb09c0c55f2d0016ec88ae3ab435daebba1d170e02e3f', '2017-12-05 09:29:12'),
(2, 'aulworker', 'auliawardan@gmail.com', 'Worker', 'Aulia Arif', 'Wardana', 'a2a323356de7f4caf2318eb9816df9105aadaa2b0b1af50a1f8ad4115ea2391d', 'ecad56ab9e909b0c011122f6287a42349f6d83ea3e362dd1f29f18b73c5e53c6', '2017-12-05 09:32:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
(1, '1512599874');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pltmh_data_r`
--

CREATE TABLE `pltmh_data_r` (
  `id` int(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `watt` varchar(255) NOT NULL,
  `voltampere` varchar(255) NOT NULL,
  `cosphi` varchar(255) NOT NULL,
  `volt` varchar(255) NOT NULL,
  `ampere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pltmh_data_r`
--

INSERT INTO `pltmh_data_r` (`id`, `time`, `watt`, `voltampere`, `cosphi`, `volt`, `ampere`) VALUES
(1, '2017-12-07 12:22:00', '2', '2', '2', '2', '2'),
(2, '2017-12-07 12:24:34', '4', '4', '4', '4', '4'),
(3, '2017-12-07 12:25:01', '6', '6', '6', '6', '6'),
(4, '2017-12-07 12:31:42', '7', '7', '7', '7', '8.9'),
(5, '2017-12-08 03:16:52', '7', '7', '7', '7', '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pltmh_data_s`
--

CREATE TABLE `pltmh_data_s` (
  `id` int(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `watt` varchar(255) NOT NULL,
  `voltampere` varchar(255) NOT NULL,
  `cosphi` varchar(255) NOT NULL,
  `volt` varchar(255) NOT NULL,
  `ampere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pltmh_data_s`
--

INSERT INTO `pltmh_data_s` (`id`, `time`, `watt`, `voltampere`, `cosphi`, `volt`, `ampere`) VALUES
(1, '2017-12-07 12:22:00', '2', '2', '2', '2', '2'),
(2, '2017-12-07 12:24:34', '4', '4', '4', '4', '4'),
(3, '2017-12-07 12:25:01', '6', '6', '6', '6', '6'),
(4, '2017-12-07 12:31:42', '7', '7', '7', '7', '8.9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pltmh_data_t`
--

CREATE TABLE `pltmh_data_t` (
  `id` int(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `watt` varchar(255) NOT NULL,
  `voltampere` varchar(255) NOT NULL,
  `cosphi` varchar(255) NOT NULL,
  `volt` varchar(255) NOT NULL,
  `ampere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pltmh_data_t`
--

INSERT INTO `pltmh_data_t` (`id`, `time`, `watt`, `voltampere`, `cosphi`, `volt`, `ampere`) VALUES
(1, '2017-12-07 12:22:00', '2', '2', '2', '2', '2'),
(2, '2017-12-07 12:24:34', '4', '4', '4', '4', '4'),
(3, '2017-12-07 12:25:01', '6', '6', '6', '6', '6'),
(4, '2017-12-07 12:31:42', '7', '7', '7', '7', '8.9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temperature`
--

CREATE TABLE `temperature` (
  `id` int(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `celcius` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `pltmh_data_r`
--
ALTER TABLE `pltmh_data_r`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pltmh_data_s`
--
ALTER TABLE `pltmh_data_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pltmh_data_t`
--
ALTER TABLE `pltmh_data_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pltmh_data_r`
--
ALTER TABLE `pltmh_data_r`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pltmh_data_s`
--
ALTER TABLE `pltmh_data_s`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pltmh_data_t`
--
ALTER TABLE `pltmh_data_t`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `temperature`
--
ALTER TABLE `temperature`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
