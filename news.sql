-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 04:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_category`
--

CREATE TABLE `cms_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_category`
--

INSERT INTO `cms_category` (`id`, `name`) VALUES
(1, 'Laravel'),
(2, 'Resources'),
(3, 'Resources'),
(4, 'PHP'),
(5, 'PHP'),
(6, 'Tip'),
(7, 'MySQL'),
(8, 'PHP'),
(9, 'HTML'),
(10, 'HTML'),
(11, 'Quick Learn'),
(12, 'WordPress');

-- --------------------------------------------------------

--
-- Table structure for table `cms_posts`
--

CREATE TABLE `cms_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `message` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` enum('published','draft','archived') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_posts`
--

INSERT INTO `cms_posts` (`id`, `title`, `message`, `category_id`, `userid`, `status`, `created`, `updated`) VALUES
(1, '15 Essential Packages For Extending Laravel', 'A collection of 15 of the most useful Laravel libraries and packages that will make developing your ', 1, 1, 'published', '2023-01-27 00:00:00', '2023-01-28 00:00:00'),
(2, '20 Awesome PHP Libraries For Early 2017', 'A curated list of some of our favorite open-source PHP libraries and frameworks from the last couple', 2, 2, 'published', '2023-01-24 00:00:00', '2023-01-25 00:00:00'),
(3, '20 Awesome PHP Libraries For Summer 2016', 'A handcrafted collection of 20 open-source libraries containing some of the most useful and top-qual', 3, 3, 'published', '2023-01-27 00:00:00', '2023-01-28 00:00:00'),
(4, 'Tutorial: Making a Shoutbox with PHP and jQuery', 'In this tutorial, we are going to build a shout box, which allows visitors of your website to leave ', 4, 4, 'published', '2023-01-28 00:00:00', '2023-01-29 00:00:00'),
(5, 'Cute File Browser with jQuery and PHP', 'Today we want to share a cool experiment with you - a cute file browser, which you can upload to you', 5, 5, 'published', '2023-01-17 00:00:00', '2023-01-18 00:00:00'),
(6, 'Quick Tip: Create a Simple URL Shortener With 10 Lines of PHP', 'In this quick tip, we will write a tiny URL routing script, backed by an INI file as a database.', 6, 6, 'published', '2023-01-09 00:00:00', '2023-01-10 00:00:00'),
(7, 'Making a Super Simple Registration System With PHP and MySQL', 'This time we will make a very simple registration system that doesn\'t require or store passwords. It', 7, 7, 'published', '2023-01-11 00:00:00', '2023-01-12 00:00:00'),
(8, 'Mini AJAX File Upload Form', 'In this tutorial we are going to create an AJAX file upload form, that will let visitors upload file', 8, 8, 'published', '2023-01-17 00:00:00', '2023-01-18 00:00:00'),
(9, 'Tutorial: Let\'s Build a Lightweight Blog System (part 2)', 'In the second part of the tutorial, we are creating the views and writing the CSS that will make our', 9, 9, 'published', '2022-12-21 00:00:00', '2022-12-22 00:00:00'),
(10, 'Tutorial: Let\'s Build a Lightweight Blog System (part 1)', 'In this tutorial, we will be making a lightweight blog system with PHP and CSS3. It won\'t require a ', 10, 10, 'published', '2023-01-01 00:00:00', '2023-01-02 00:00:00'),
(11, '24 Cool PHP Libraries You Should Know About', 'It is an exciting time to be a PHP developer. There are lots of useful libraries released every day,', 11, 11, 'published', '2023-01-03 00:00:00', '2023-01-04 00:00:00'),
(12, 'Setting Up a Local WordPress Testing Environment', 'Having a local test version of your website is a must if you modify or update it often. So here\'s an', 12, 12, 'published', '2023-01-17 00:00:00', '2023-01-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_user`
--

CREATE TABLE `cms_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms_user`
--

INSERT INTO `cms_user` (`id`, `fullname`, `username`, `password`, `deleted`) VALUES
(1, 'Tran Anh Quan', 'Tran Anh Quan', '0f3a7698065e7157c0bed078d062a68a', 0),
(2, 'Tran Van Thu', 'Tran Van Thu', '28e8d0ffd613a714dee0e9061e150197', 0),
(3, 'Ngo Thi Mai Huong', 'Ngo Thi Mai Huong', '59ec5983e698b882c1b306bf2ed88759', 0),
(4, 'Dinh Thanh Tuan', 'Dinh Thanh Tuan', 'aaff0e58842d880ec9ea1139ad2d78d9', 0),
(5, 'Rasmus Lerdorf', 'Rasmus Lerdorf', '02813c40e7a27456350ba2f262c3ba20', 0),
(6, 'Hoang Anh Tuan', 'Hoang Anh Tuan', '8eb8bd5a5d8b06b11a169d3fc404765f', 0),
(7, 'Le Van Bac', 'Le Van Bac', '146a9e67aea49f52a9102d0a3bd7533b', 0),
(8, 'Nguyen Van Tu', 'Nguyen Van Tu', '57356842df7e535648870a65bc954b44', 0),
(9, 'Nguyen Tien Linh', 'Nguyen Tien Linh', '9a970254dc2055bb273c8081c0531a53', 0),
(10, 'Nguyen Quang Hai', 'Nguyen Quang Hai', 'd2b480315cedd716387a0cc1c9124992', 0),
(11, 'Nguyen Ngoc Quang', 'Nguyen Ngoc Quang', 'de6d001672558308cb05839a52d466cc', 0),
(12, 'Ngo Thi Phuoong', 'Ngo Thi Phuong', '94f003594fa1ed223923366709911718', 0);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `visited` tinyint(1) NOT NULL DEFAULT 0,
  `lat` float(9,6) NOT NULL DEFAULT 0.000000,
  `lng` float(9,6) NOT NULL DEFAULT 0.000000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `visited`, `lat`, `lng`) VALUES
(12, 'Berlin', 1, 52.520000, 13.405000),
(13, 'Budapest', 1, 47.497898, 19.040199),
(14, 'Cincinnati', 0, 39.103100, -84.512001),
(15, 'Denver', 0, 39.739201, -104.989998),
(16, 'Helsinki', 1, 60.169899, 24.938400),
(17, 'Lisbon', 1, 38.722301, -9.139340),
(18, 'Moscow', 0, 55.755798, 37.617298),
(19, 'Nairobi', 0, -1.292070, 36.821899),
(20, 'Oslo', 1, 59.913898, 10.752200),
(21, 'Rio', 1, -22.906799, -43.172901),
(22, 'Tokyo', 0, 35.689499, 139.692001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_category`
--
ALTER TABLE `cms_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_posts`
--
ALTER TABLE `cms_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_user`
--
ALTER TABLE `cms_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_category`
--
ALTER TABLE `cms_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cms_posts`
--
ALTER TABLE `cms_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cms_user`
--
ALTER TABLE `cms_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
