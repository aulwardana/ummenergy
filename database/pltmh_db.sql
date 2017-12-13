-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 13 Des 2017 pada 09.56
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
(1, 'aulwardana', 'auliawardan@gmail.com', 'Administrator', 'Aulia Arif', 'Wardana', '108c7fa2683212337052202d2eb60f0e563b454e4015eacf2c5300b1f7e2094e', '622d883eea41a8151ee606aa725afb711259e8b11436d7afd0003de0cebdf573', '2017-12-13 01:45:00'),
(2, 'aulworker', 'auldesain@gmail.com', 'Worker', 'Aulia Arif', 'Wardana', '6c92430edda41683386567ad973d6f7080e1cc4d2361c1d7dff5c522e8dfead0', 'b48d2153064a7cd46d6ec5da353898c46c643ecd31109d7e7ad6ad67f345c9a8', '2017-12-13 01:45:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hits`
--

CREATE TABLE `hits` (
  `pageid` varchar(100) NOT NULL,
  `isunique` tinyint(1) NOT NULL,
  `hitcount` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `hits`
--
ALTER TABLE `hits`
  ADD KEY `pageid` (`pageid`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pltmh_data_s`
--
ALTER TABLE `pltmh_data_s`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pltmh_data_t`
--
ALTER TABLE `pltmh_data_t`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temperature`
--
ALTER TABLE `temperature`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
