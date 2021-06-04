-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 06:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diff_it_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `points_table`
--

CREATE TABLE `points_table` (
  `post_id` int(255) NOT NULL,
  `p_a` text NOT NULL DEFAULT '-diff it at first-',
  `p_b` text NOT NULL DEFAULT '-diff it at first-',
  `i` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points_table`
--

INSERT INTO `points_table` (`post_id`, `p_a`, `p_b`, `i`) VALUES
(1, 'First Line of A', 'First Line of B', 1),
(1, 'Second Line of A', 'Second Line of B', 2),
(2, 'post 2 A', 'post 2 B', 3),
(2, 'Doe222', 'new value', 5),
(2, 'defensing-by @<i>hasibur</i>', 'doe third', 6),
(2, 'Doe22', 'new value newnew', 7),
(1, 'defense it-by @hasibur', 'defense done now-by @hasibur', 8),
(1, 'dasdas-by @<i>hasibur</i>', 'defense done-by @hasibur', 9),
(5, 'defense me first -by @<i>hasibur</i>', 'defense done first -by @hasibur', 10),
(5, 'defense me 2nd-by @<i>hasibur</i>', 'defense it frst-by @hasibur', 11),
(4, 'defense me first -by @<i>hasibur</i>', 'defense me first -by @hasibur', 12),
(4, 'defense me done-by @<i>hasibur</i>', 'defense me first -by @hasibur', 13),
(1, 'defense done-by @<i>hasibur</i>', 'defense me first -by @hasibur', 14),
(3, 'test defense me-by @<b><i>hasibur', 'deeda-by @hasibur', 15),
(3, 'defe-by @<b><i>hasibur', 'ok i am defending -by @hasibur', 16),
(3, 'wjat u see-by @<b><i>hasibur', 'ok defensing wee-by @hasibur', 17),
(3, 'xsda-by @<b><i>hasibur', 'sdasd-by @hasibur', 18),
(2, 'asdasd  -by @<b><i>hasibur', 'problem|  -by @<b><i>hasibur', 19),
(5, 'problem  -by @<b><i>hasibur', 'problem|  -by @<b><i>hasibur', 20),
(5, 'whatsingasss[-by @<b><i>hasibur]', 'whatings[-by @<b><i>hasibur]', 21),
(5, 'rechekeddd<b><i>[-by @hasibur]', 'recheckd<b><i>[-by @hasibur]', 22),
(1, 'ok test done<b><i>[-by @hasibur]', 'sdads<b><i>[-by @hasibur]', 23),
(2, 'ssss2<b><i>[-by @hasibur]', 'test<b><i>[-by @hasibur]', 24),
(4, 'dfsfsdf<b><i>[-by @hasibur]', 'fsdsdfs<b><i>[-by @hasibur]', 25),
(2, 'sdfsdf<b><i>[-by @hasibur]', 'sdfs<b><i>[-by @hasibur]', 26),
(3, 'sdfsdf<b><i>[-by @hasibur]', 'sdfsdf<b><i>[-by @hasibur]', 27),
(3, '...\n<b><i>[-by @hasibur]', '/<b><i>[-by @hasibur]', 28),
(1, 'dad<b><i>[-by @hasibur]', 'daad<b><i>[-by @hasibur]', 29),
(6, 'point 1<b><i>[-by @naim]', 'defense point 1<b><i>[-by @naim]', 30),
(6, 'jjjjjj<b><i>[-by @naim]', 'defed done<b><i>[-by @naim]', 31),
(6, 'asdasdasd<b><i>[-by @naim]', 'check<b><i>[-by @naim]', 32),
(6, 'jasjsajsjsjs<b><i>[-by @hasibur]', 'adssadsdasdaasd<b><i>[-by @hasibur]', 33),
(1, 'this is line for defense<b><i>[-by @hasibur]', 'defese<b><i>[-by @hasibur]', 34);

-- --------------------------------------------------------

--
-- Table structure for table `posts_table`
--

CREATE TABLE `posts_table` (
  `p_id` int(255) NOT NULL,
  `a_id` int(255) NOT NULL,
  `p_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts_table`
--

INSERT INTO `posts_table` (`p_id`, `a_id`, `p_title`) VALUES
(1, 1, 'first topic'),
(2, 6, 'second topic'),
(3, 2, 'Three no title '),
(4, 6, 'Four title of a topic\n'),
(5, 6, 'Five no topic test'),
(6, 3, 'Why badhon is a bro');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `u_name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `passwd` text NOT NULL,
  `s_link` varchar(100) NOT NULL,
  `role` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `u_name`, `email`, `passwd`, `s_link`, `role`) VALUES
(1, 'Hasibur', 'Rahman2015', 'hasibur2015', 'hasibur2015@gm.com', '202cb962ac59075b964b07152d234b70', 'hr.com/5h4nt0', 1),
(2, 'Hasibur', 'Rahman', 'hasibur', 'hasibur.cse7@gmail.com', '202cb962ac59075b964b07152d234b70', 'https://www.facebook.com/hr5h4nt0/', 1),
(3, 'Naim', 'Istiak', 'naim', 'naim@gm.com', '7538d4dcba3305622d94579666135c31', 'https://www.facebook.com/naim.istiak.75', 1),
(6, 'Emtiyaz', 'Ahmed', 'emtiyaz', 'emtiyaz@gm.com', '861e9682b8da3290f7d2c5b4809aff9e', 'https://www.facebook.com/profile.php?id=100005993348858', 1),
(9, 'Rashedul', 'Islam', 'rashed', 'rashed@gmail.com', '698d51a19d8a121ce581499d7b701668', 'https://www.facebook.com/profile.php?id=100008917351349', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `points_table`
--
ALTER TABLE `points_table`
  ADD PRIMARY KEY (`i`);

--
-- Indexes for table `posts_table`
--
ALTER TABLE `posts_table`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `points_table`
--
ALTER TABLE `points_table`
  MODIFY `i` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `posts_table`
--
ALTER TABLE `posts_table`
  MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
