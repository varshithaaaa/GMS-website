-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 07:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `asset` text NOT NULL,
  `supervisor` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `asset`, `supervisor`, `quantity`, `status`) VALUES
(9, 'pesticides', 'pavani', 46, 'approved'),
(20, 'pesticides', 'Elamaran', 23, 'approved'),
(24, 'Mowers', 'pavani', 34, 'approved'),
(26, 'scissors', 'sas', 4, 'approved'),
(27, 'spray', 'pavani', 50, 'approved'),
(28, 'Scissors', 'pavani', 10, ''),
(29, 'spray', 'pavani', 15, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `iii` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `task` text NOT NULL,
  `worker` varchar(20) NOT NULL,
  `supervisor` text NOT NULL,
  `manager` text NOT NULL,
  `date` date NOT NULL,
  `status` text NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `end_date` date NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`iii`, `job_id`, `task`, `worker`, `supervisor`, `manager`, `date`, `status`, `start_time`, `end_time`, `end_date`, `rating`) VALUES
(1, 91945, 'cleaning', 'radha', 'Elamaran', '', '0000-00-00', 'completed', '15:57:00', '10:17:11', '0000-00-00', 0),
(2, 91945, 'cleaning', 'leyla', 'Elamaran', '', '0000-00-00', 'completed', '15:57:00', '10:17:11', '0000-00-00', 0),
(3, 20499, 'cleaning', 'radha', 'Elamaran', '', '0000-00-00', 'completed', '15:57:00', '11:28:57', '0000-00-00', 0),
(4, 20499, 'cleaning', 'leyla', 'Elamaran', '', '2023-12-02', 'completed', '15:57:00', '11:28:57', '2023-12-05', 0),
(5, 88450, 'cleaning', 'radha', 'sas', '', '2023-12-05', 'completed', '15:57:00', '15:48:48', '2023-12-07', 5),
(6, 88450, 'cleaning', 'leyla', 'sas', '', '2023-12-05', 'completed', '15:57:00', '15:48:48', '2023-12-07', 5),
(7, 59538, 'cleaning', 'radha', 'pavani', '', '2023-11-03', 'completed', '15:57:00', '08:44:20', '2024-02-12', 1),
(8, 59538, 'cleaning', 'leyla', 'pavani', '', '0000-00-00', 'completed', '15:57:00', '08:44:20', '2024-02-12', 1),
(9, 59538, 'cleaning', 'sara', 'pavani', '', '0000-00-00', 'completed', '15:57:00', '08:44:20', '2024-02-12', 1),
(10, 52447, 'Cleaning', 'karthik', 'pavani', 'surya', '2023-11-27', 'pending', '12:42:00', '16:05:16', '2023-12-07', 4),
(11, 52447, 'Cleaning', 'leyla', 'pavani', 'surya', '2023-11-27', 'pending', '12:42:00', '16:05:16', '2023-12-07', 4),
(12, 52447, 'Cleaning', 'lakshmi', 'pavani', 'surya', '2023-11-27', 'pending', '12:42:00', '16:05:16', '2023-12-07', 4),
(13, 21204, 'cleaning', 'radha', 'pavani', '', '0000-00-00', 'pending', '15:57:00', '11:17:35', '0000-00-00', 0),
(14, 21204, 'cleaning', 'leyla', 'pavani', '', '0000-00-00', 'pending', '15:57:00', '11:17:35', '0000-00-00', 0),
(15, 21204, 'cleaning', 'sara', 'pavani', '', '0000-00-00', 'pending', '15:57:00', '11:17:35', '0000-00-00', 0),
(16, 44086, 'maintenance', 'karthik', 'pavani', '', '2024-02-29', 'pending', '02:31:00', '13:45:43', '2024-03-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `supervisor` text NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `supervisor`, `message`) VALUES
(1, '', 'clean the location'),
(2, 'pavani', 'clean the location'),
(3, '', 'clean the location'),
(4, '', 'clean the location'),
(5, '', 'clean the location'),
(6, '', 'clean the location'),
(7, '', 'clean the location'),
(8, '', 'clean the location'),
(9, '', 'clean the location'),
(10, 'Elamaran', 'clean the location'),
(11, 'sas', 'clean the location'),
(12, 'bhavana', 'clean the location'),
(13, 'Elamaran', 'planting to be done'),
(14, 'sas', 'planting to be done'),
(15, 'bhavana', 'planting to be done'),
(16, 'Elamaran', 'water all plants'),
(17, 'Elamaran', 'water all plants'),
(18, 'bhavana', 'clean the location'),
(19, 'Elamaran', 'clean the location'),
(20, 'pavani', 'hello'),
(21, 'Elamaran', 'hello'),
(22, 'Elamaran', 'hello'),
(23, 'Elamaran', 'hello'),
(24, 'sah', 'welcome'),
(25, 'sah', 'hgh'),
(26, 'Elamaran', 'work is incompete'),
(27, 'pavani', 'come back'),
(28, 'pavani', 'let me know about the status of watering'),
(29, 'pavani', 'come hear'),
(30, 'bhavana', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `place_id` int(11) NOT NULL,
  `place_name` text NOT NULL,
  `image_path` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `place_name`, `image_path`) VALUES
(37, 'chennai', 'chennai.PNG'),
(38, 'tirupathi', 'tirupathi.PNG'),
(39, 'hyderabad', 'hyderabad.PNG'),
(40, 'trichy', 'green-park-view.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `worker_name` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `job_id`, `worker_name`, `rating`, `timestamp`) VALUES
(1, 52447, 'radha', 3, '2023-11-16 03:58:55'),
(2, 21204, 'radha', 4, '2023-12-02 05:47:35'),
(4, 88450, 'leyla', 3, '2023-12-02 08:16:45'),
(6, 21204, 'radha', 4, '2023-12-13 08:20:24'),
(7, 21204, 'radha', 4, '2023-12-02 09:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`) VALUES
(1, 'cleaning'),
(2, 'watering'),
(3, 'cutting'),
(4, 'maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `manager` text NOT NULL,
  `name` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `workers` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `manager`, `name`, `location`, `workers`) VALUES
(56, 'surya', 'sas', 'trichy', 'lakshmi'),
(57, 'surya', 'Elamaran', 'tirupathi', 'lakshmi'),
(58, 'surya', 'sah', 'trichy', 'lakshmi'),
(65, 'surya', 'pavani', 'tirupathi', 'lakshmi'),
(66, 'surya', 'bhavana', 'chennai', 'bharath');

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `tool_id` int(11) NOT NULL,
  `tool_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tool`
--

INSERT INTO `tool` (`tool_id`, `tool_name`, `quantity`, `image`) VALUES
(1, 'Scissors', 10, 'tirupathi.PNG'),
(2, 'Sprinklers', 10, 'hyderabad.PNG'),
(3, 'Mowers', 206, 'growth-fresh-green-plant-natures-lap-generative-ai.jpg'),
(5, 'spray', 114, 'top-view-gardening-tools-ground.jpg'),
(7, 'pesticides', 11, 'top-view-hands-manipulating-plant.jpg'),
(9, 'Leveler', 90, 'top-view-gardening-tools-ground.jpg'),
(10, 'Machine Learning', 100, 'green-park-view.jpg'),
(11, 'METALS', 80, 'chennai.PNG'),
(18, 'test', 10, 'tirupathi.PNG'),
(20, 'cutter', 10, 'hyderabad.PNG'),
(22, 'test3', 10, 'green-park-view.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `role` text NOT NULL,
  `name` text NOT NULL,
  `dob` text NOT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL COMMENT 'active/deactive',
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Username`, `Password`, `role`, `name`, `dob`, `mobile_no`, `status`, `rating`) VALUES
(1, 'admin', '123', 'Admin', 'admin', '1997-11-16', '9876543210', 'Active', NULL),
(2, 'pavani', '123', 'Supervisor', 'pavani', '2016-02-11', '739676075', 'Active', 3),
(3, 'Manager', '123', 'Manager', 'surya', '2014-02-07', '9856223144', 'Active', NULL),
(4, '', '', 'Worker', 'sara', '1996-01-01', '4236587453', 'Active', 4),
(5, '', '', 'Worker', 'radha', '1999-06-16', '9586321426', 'Active', 3),
(6, 'sah', '123', 'Supervisor', 'sah', '1997-11-09', '7396635719', 'Active', NULL),
(7, 'nisha', '123', 'Supervisor', 'nisha', '2020-06-24', '125225633', 'Deactive', NULL),
(8, 'sas', '123', 'Supervisor', 'sas', '0000-00-00', '7396635719', 'Deactive', NULL),
(10, 'bha', '123', 'Supervisor', 'bhavana', '2020-03-05', '7396790780', 'Active', NULL),
(13, 'akshaya', '123', 'Supervisor\n', 'akshaya', '02-03-2004', '7396635719', 'Deactive', NULL),
(17, '123', '12345', 'Supervisor', 'Elamaran', '12-12-1212', '9809809809', 'Deactive', 4),
(20, '', '', 'Worker', 'lakshmi', '2023-05-11', '7387675698', 'Active', NULL),
(21, '', '123', 'Worker', 'sas', '2023-11-04', '0630251663', 'Active', NULL),
(25, '', '123', 'Worker', 'leyla', '2023-11-15', '0739663571', 'Active', 5),
(26, '', '123', 'Worker', 'john', '2023-11-01', '7396635715', 'Active', NULL),
(27, '', '123', 'Worker', 'karthik', '3221-03-02', '6302516635', 'Active', 3),
(35, 'David', '12345', 'Worker', 'David', '21-02-1998', '9787765467', 'Active', NULL),
(36, 'Raj123', '12345', 'Manager', 'Raj', '2023-11-08', '38989631', 'Active', NULL),
(37, '', '', 'Worker', 'bharath', '', '9491922653', 'Active', NULL),
(38, 'ramukumar', '123', 'Supervisor', 'ramukumar', '1986-02-22', '1234567890', 'Active', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`iii`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`tool_id`),
  ADD UNIQUE KEY `tool_name` (`tool_name`) USING HASH;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `iii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tool`
--
ALTER TABLE `tool`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
