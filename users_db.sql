-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2020 at 11:32 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

DROP TABLE IF EXISTS `tbl_contacts`;
CREATE TABLE IF NOT EXISTS `tbl_contacts` (
  `contact_id` int(12) NOT NULL AUTO_INCREMENT,
  `c_fname` varchar(100) NOT NULL,
  `c_lname` varchar(100) NOT NULL,
  `c_email` varchar(155) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_adddress` varchar(155) NOT NULL,
  `c_registerd_date` datetime NOT NULL DEFAULT current_timestamp(),
  `c_status` int(1) NOT NULL,
  `c_profile_image` varchar(200) NOT NULL,
  `master_user_id` int(11) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`contact_id`, `c_fname`, `c_lname`, `c_email`, `c_phone`, `c_adddress`, `c_registerd_date`, `c_status`, `c_profile_image`, `master_user_id`) VALUES
(1, 'brayan', 'smith', 'brayansmith@gmail.com', '0714548796', 'badlgama', '2020-12-15 13:56:28', 1, 'ContacsImg/1608021884fish-378286_1920.jpg', 82),
(3, 'jhon ', 'smith', 'jhon@gmail.com', '0784951256', 'negombo', '2020-12-15 15:52:23', 1, 'ContacsImg/1608027743sea-2361247_1920.jpg', 82),
(4, 'feona', 'grane', 'feona@gmail.com', '0779947415', 'colombo', '2020-12-15 15:52:56', 1, 'ContacsImg/1608027776flower-729512_1920.jpg', 82),
(5, 'steve', 'job', 'stev@gmail.com', '0754782259', 'kandy', '2020-12-15 15:54:24', 1, 'ContacsImg/1608027864elephant-3903267_1920.jpg', 82),
(8, 'viz', 'khalifa', 'vizkalifa@gmail.com', '0712548965', 'negombo abc', '2020-12-15 22:16:42', 1, 'ContacsImg/1608050802moon-4919501_1920.jpg', 82),
(9, 'Hanna', 'Gover', 'hannagover@gmail.com', '0749625145', 'jaffna abc', '2020-12-15 22:31:49', 1, 'ContacsImg/1608051709elephant-1822636_1920.jpg', 81),
(10, 'John', 'doe abc', 'jhondoe@gmail.com', '0784962510', 'gampaha', '2020-12-15 22:32:56', 1, 'ContacsImg/1608051892snorkeling-984422_1920.jpg', 81),
(11, 'Timmy ', 'Turner', 'timmyturner@gmail.com', '0784948556', 'badlgama', '2020-12-15 22:56:41', 1, 'ContacsImg/1608053201stingray-4392776_1920.jpg', 81),
(12, 'Emma.', 'Votsan', 'emmavotson@gmail.com', '0789585226', 'Gall', '2020-12-16 04:21:23', 1, 'ContacsImg/1608072683jellyfish-1730018_1920.jpg', 81),
(13, 'Isabella.', 'Charlotte', 'Isabellacharlot@gmail.com', '0769952146', 'kandy', '2020-12-16 04:23:16', 1, 'ContacsImg/1608072856people-4690996_1920.jpg', 82),
(14, 'Nora', 'Grace', 'noragrace@gmail.com', '0754782015', 'jaffna', '2020-12-16 04:29:40', 1, 'ContacsImg/1608073180ella-3621804_1920.jpg', 83),
(15, 'Emily', 'Harper', 'emaliharper@gmail.com', '0784962195', 'Gall', '2020-12-16 04:30:55', 1, 'ContacsImg/1608073255bear-2095379_1920.jpg', 83);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_data`
--

DROP TABLE IF EXISTS `tbl_user_data`;
CREATE TABLE IF NOT EXISTS `tbl_user_data` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_inserted_date` datetime NOT NULL DEFAULT current_timestamp(),
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` int(1) NOT NULL,
  `block_status` int(1) NOT NULL,
  `user_contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user_data`
--

INSERT INTO `tbl_user_data` (`user_id`, `first_name`, `last_name`, `email`, `record_inserted_date`, `profile_image`, `active_status`, `block_status`, `user_contact`, `user_address`, `user_password`) VALUES
(81, 'ishara', 'krishan', 'ishara@gmail.com', '2020-12-14 21:59:14', 'Images/1607963354rocket-launch-67643_1920.jpg', 1, 0, '0784962915', 'badlagama', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(82, 'jhon', 'smith', 'admin@gmail.com', '2020-12-15 14:04:11', 'Images/1608021251deer-3275594_1920.jpg', 1, 0, '0784986152', 'colombo', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(83, 'Olivia', 'michel', 'olivia@gmail.com', '2020-12-16 04:26:35', 'Images/1608072995marine-liner-4936750_1920.jpg', 1, 0, '0769158962', 'France', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
