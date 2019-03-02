-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 03:24 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sams`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_attend`
--

CREATE TABLE `db_attend` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `attend` varchar(255) NOT NULL,
  `attend_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_attend`
--

INSERT INTO `db_attend` (`id`, `roll`, `attend`, `attend_time`) VALUES
(16, 1, 'present', '2018-11-02'),
(17, 2, 'present', '2018-11-02'),
(18, 3, 'present', '2018-11-02'),
(19, 4, 'present', '2018-11-02'),
(20, 5, 'present', '2018-11-02'),
(25, 1, 'present', '2018-11-03'),
(26, 2, 'present', '2018-11-03'),
(27, 3, 'present', '2018-11-03'),
(28, 4, 'present', '2018-11-03'),
(29, 5, 'absent', '2018-11-03'),
(30, 1, 'absent', '2019-01-22'),
(31, 2, 'present', '2019-01-22'),
(32, 3, 'present', '2019-01-22'),
(33, 4, 'present', '2019-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `db_student`
--

CREATE TABLE `db_student` (
  `id` int(11) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `studentRoll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_student`
--

INSERT INTO `db_student` (`id`, `studentName`, `studentRoll`) VALUES
(1, 'Mohib', 1),
(2, 'Shihab', 2),
(3, 'pavel', 3),
(4, 'sujon', 4),
(5, 'Kamal', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_attend`
--
ALTER TABLE `db_attend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_student`
--
ALTER TABLE `db_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_attend`
--
ALTER TABLE `db_attend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `db_student`
--
ALTER TABLE `db_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
