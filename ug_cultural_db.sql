-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2026 at 11:35 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ug_cultural_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `region` varchar(50) NOT NULL,
  `tribe` varchar(50) NOT NULL,
  `instrument` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT 'General',
  `password` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `fullname`, `email`, `region`, `tribe`, `instrument`, `category`, `password`, `reg_date`, `reset_token`, `reset_expiry`) VALUES
(1, 'Ndere Troupe', 'info@ndere.com', 'Central', 'Baganda', 'Magogo (Drums)', 'Troupe', NULL, '2026-03-25 09:14:18', NULL, NULL),
(2, 'The Adungu Masters', 'alur@culture.ug', 'Northern', 'Alur', 'Adungu (Harp)', 'Professional', NULL, '2026-03-25 09:14:18', NULL, NULL),
(3, 'Bamaba Cultural Group', 'mbale@heritage.org', 'Eastern', 'Bamasaba', 'Kadodi Drums', 'Community', NULL, '2026-03-25 09:14:18', NULL, NULL),
(4, 'Ankole Traditional Dancers', 'mbarara@dance.ug', 'Western', 'Banyankole', 'Amakondere (Horns)', 'Troupe', NULL, '2026-03-25 09:14:18', NULL, NULL),
(5, 'Busoga Heritage Choir', 'jinja@choir.com', 'Eastern', 'Basoga', 'Endingidi (Fiddle)', 'Church', NULL, '2026-03-25 09:14:18', NULL, NULL),
(6, 'Ghetto Kids Dancers', 'kids@ghetto.ug', 'Central', 'Baganda', 'Baksimba Percussion', 'Ghetto', NULL, '2026-03-25 09:14:18', NULL, NULL),
(7, 'Ndere troupe', 'kisj205@gmail.com', 'Central', 'Baganda', 'String (Adungu/Endingidi)', 'General', '$2y$10$ewAvLjvVtaPEq3JZWv98pO0Dy1WP158COoFrgau1Dk1unNbyDtFYa', '2026-03-30 14:32:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `event_name` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `fullname`, `email`, `phone`, `event_name`, `reg_date`) VALUES
(1, 'kizito jackson', 'Jackkizito205@gmail.com', '0777910395', 'Bagishu Imbalu Festival', '2026-03-25 08:30:45'),
(2, 'kizito jackson', 'Jackkizito205@gmail.com', '0777910395', 'Nile Tourism Expo', '2026-03-25 08:32:38'),
(3, 'kizito jackson', 'Jackkizito205@gmail.com', '0777910395', 'Engalabi Master Battle', '2026-03-25 08:32:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
