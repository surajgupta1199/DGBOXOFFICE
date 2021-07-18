-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2021 at 07:54 PM
-- Server version: 5.7.34
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bwebtech_streamit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email_id` varchar(255) NOT NULL,
  `admin_password` text NOT NULL,
  `admin_roll` int(11) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=active,1=deactive',
  `admin_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `admin_name`, `admin_email_id`, `admin_password`, `admin_roll`, `admin_status`, `admin_date_time`) VALUES
(1, 'Bandhu', 'admin@gmail.com', 'cbdbe4936ce8be63184d9f2e13fc249234371b9a', 1, 0, '2021-01-29 17:55:01'),
(2, 'sanket', 'admin2@gmail.com', '62cc2d8b4bf2d8728120d052163a77df', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_description` text NOT NULL,
  `cat_banner` varchar(255) NOT NULL,
  `content_id` int(11) NOT NULL COMMENT 'refer content master',
  `cat_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=active , 1=deactive',
  `current_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_description`, `cat_banner`, `content_id`, `cat_status`, `current_date_time`) VALUES
(1, 'salman khan movie', 'The best Salman khan Moviie', '1_cat_banner.jpg', 1, 0, '0000-00-00 00:00:00'),
(2, 'Horror', 'The best Horror Moviie', '2_cat_banner.jpg', 1, 0, '0000-00-00 00:00:00'),
(6, 'Action', 'The best Comedy Moviies to watch', '6_cat_banner.jpg', 2, 0, '0000-00-00 00:00:00'),
(7, 'Kids Series', 'The best Kids Moviie', '7_cat_banner.jpg', 2, 0, '0000-00-00 00:00:00'),
(9, 'Thriller', 'The Best thriller movies', '8_cat_banner.jpg', 3, 0, '0000-00-00 00:00:00'),
(10, 'Kids series', 'Watch Kids series without break', '10_cat_banner.jpg', 4, 0, '0000-00-00 00:00:00'),
(11, 'Drama ', 'The best thriller series', '11_cat_banner.jpg', 2, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `common_master`
--

CREATE TABLE `common_master` (
  `common_id` int(11) NOT NULL,
  `cat_id` varchar(255) NOT NULL COMMENT 'refer category table',
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `release_year` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `imdb_rating` varchar(255) NOT NULL,
  `synopsis` text NOT NULL,
  `total_duration` int(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `domain_url` text NOT NULL,
  `type` int(11) NOT NULL COMMENT 'refer content master table',
  `current_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `common_master`
--

INSERT INTO `common_master` (`common_id`, `cat_id`, `title`, `price`, `release_year`, `rating`, `imdb_rating`, `synopsis`, `total_duration`, `language`, `description`, `domain_url`, `type`, `current_date_time`) VALUES
(1, '6,9', 'Master', 800, '2021', '18+', '8.5', '<p>JD, an alcoholic professor, is enrolled to teach at a juvenile facility, unbeknownst to him. He soon clashes with a ruthless gangster, who uses the children as scapegoats for his crimes.</p>', 150, 'Hindi', '<p>JD, an alcoholic professor, is enrolled to teach at a juvenile facility, unbeknownst to him. He soon clashes with a ruthless gangster, who uses the children as scapegoats for his crimes.</p>', 'http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil', 1, '0000-00-00 00:00:00'),
(3, '1', 'Check', 900, '2021', '13+', '8.4', '<p>Check is a 2021 Indian Telugu-language prison drama film written and directed by Chandra Sekhar Yeleti. Produced by V. Anand Prasad\'s Bhavya Creations, the film stars Nithiin, Rakul Preet Singh, Priya Prakash Varrier, and Simran Choudary</p>', 120, 'Tamil', '<p>Check is a 2021 Indian Telugu-language prison drama film written and directed by Chandra Sekhar Yeleti. Produced by V. Anand Prasad\'s Bhavya Creations, the film stars Nithiin, Rakul Preet Singh, Priya Prakash Varrier, and Simran Choudary</p>', 'http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil', 1, '0000-00-00 00:00:00'),
(4, '2,9', 'The MarksMan', 500, '2021', '13+', '6.2', '<p>Jim is a former Marine who lives a solitary life as a rancher along the Arizona-Mexican border. But his peaceful existence soon comes crashing down when he tries to protect a boy on the run from members of a vicious cartel.</p>', 120, 'English', '<p>Jim is a former Marine who lives a solitary life as a rancher along the Arizona-Mexican border. But his peaceful existence soon comes crashing down when he tries to protect a boy on the run from members of a vicious cartel.</p>', 'http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil', 5, '0000-00-00 00:00:00'),
(5, '7', 'Joker', 1000, '2021', '13+', '8.5', '<p>Forever alone in a crowd, failed comedian Arthur Fleck seeks connection as he walks the streets of Gotham City. Arthur wears two masks -- the one he paints for his day job as a clown, and the guise he projects in a futile attempt to feel like he\'s part of the world around him. Isolated, bullied</p>', 120, 'Hindi', '<p>Forever alone in a crowd, failed comedian Arthur Fleck seeks connection as he walks the streets of Gotham City. Arthur wears two masks -- the one he paints for his day job as a clown, and the guise he projects in a futile attempt to feel like he\'s part of the world around him. Isolated, bullied</p>', 'http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil', 1, '0000-00-00 00:00:00'),
(7, '9', 'Mirzapur', 1000, '2021', '18+', '8.4', '<p>runs a drugs and arms business, under the guise of a carpet manufacturing company. One night, his son Phoolchand AKA Munna Bhaiya, accidentally kills a groom with celebratory gunfire while dancing at his wedding.</p>', 240, 'Hindi', '<p>runs a drugs and arms business, under the guise of a carpet manufacturing company. One night, his son Phoolchand AKA Munna Bhaiya, accidentally kills a groom with cele</p>', 'http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil', 2, '0000-00-00 00:00:00'),
(8, '6,9,11', 'The Family man', 2000, '2019', '13+', '8.8', '<p>Srikant Tiwari is a middle-class man who also serves as a world-class spy. Srikant tries to balance his familial responsibilities with the demands of the highly secretive special cell of the National Intelligence Agency that he is working for.</p>', 120, 'Hindi', '<p>Srikant Tiwari is a middle-class man who also serves as a world-class spy. Srikant tries to balance his familial responsibilities with the demands of the highly secretive special cell of the National Intelligence Agency that he is working for.</p>', 'https:www.google.com', 2, '0000-00-00 00:00:00'),
(11, '9', '', 200, '2021', '18+', '', '<p>btvecdwx</p>', 120, 'Hindi', '', '', 3, '0000-00-00 00:00:00'),
(12, '9', 'English Medium', 200, '2012', '18+', '9.5', '<p>Though Champak initially disapproves, he eventually does everything in his power while going through a series of hilarious mishaps to fulfil his daughter\'s dream of going to London to study further.</p>', 12, 'Hindi', '<p>Though Champak initially disapproves, he eventually does everything in his power while going through a series of hilarious mishaps to fulfil his daughter\'s dream of going to London to study further.</p>', 'http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil', 5, '0000-00-00 00:00:00'),
(13, '9', '', 400, 'fef', 'ssdf', '', '<p>dfced</p>', 60, 'Hindi', '', '', 3, '0000-00-00 00:00:00'),
(14, '2', 'The Last Breath', 400, '2021', '18+', '8.4', '<p>A diver is stranded on bottom of the North Sea with only five minutes of oxygen and no chance of rescue for at least thirty minutes. The original participants deliver emotional first-hand accounts of an incident which changed their lives.</p>', 30, 'Hindi', '<p>A diver is stranded on bottom of the North Sea with only five minutes of oxygen and no chance of rescue for at least thirty minutes. The original participants deliver emotional first-hand accounts of an incident which changed their lives.</p>', 'http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil', 1, '0000-00-00 00:00:00'),
(15, '2,6', 'chucky', 500, '2021', '18+', '8.5', '<p>Karen buys a high-tech doll called Chucky for her son Andy on his birthday. However, horrific events follow as the doll reveals its ominous tendencies.</p>', 120, 'Hindi', '<p>Karen buys a high-tech doll called Chucky for her son Andy on his birthday. However, horrific events follow as the doll reveals its ominous tendencies.</p>', 'http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil', 1, '0000-00-00 00:00:00'),
(16, '9', '', 500, '2021', '13+', '', '<p>vgbhjnkml</p>', 20, 'Hindi', '', '', 3, '0000-00-00 00:00:00'),
(17, '7', 'Chernobyl', 600, '2021', '18+', '9.4', '<p><strong>Chernobyl</strong> is a nuclear power plant in Ukraine that was the site of a disastrous nuclear accident on April 26, 1986. ... The worst nuclear disaster in history killed two workers in the explosions and, within months, at least 28 more would be dead by acute radiation exposure.</p>', 120, 'English', '<p><strong>Chernobyl</strong> is a nuclear power plant in Ukraine that was the site of a disastrous nuclear accident on April 26, 1986. ... The worst nuclear disaster in history killed two workers in the explosions and, within months, at least 28 more would be dead by acute radiation exposure.</p>', 'https://www.google.com', 2, '0000-00-00 00:00:00'),
(20, '10', '', 500, '2021', '13+', '', '<p>jtyhrgefd</p>', 120, 'Hindi', '', '', 4, '0000-00-00 00:00:00'),
(21, '10', '', 900, '2021', '13', '', '<p>mutynrthgrf</p>', 20, 'Hindi', '', '', 4, '0000-00-00 00:00:00'),
(23, '2,6,7', 'Stranger Things', 800, '2021', '13+', '', '<p>In 1980s Indiana, a group of young friends witness supernatural forces and secret government exploits. As they search for answers, the children unravel a series of extraordinary mysteries.</p>', 120, 'Hindi', '<p>In 1980s Indiana, a group of young friends witness supernatural forces and secret government exploits. As they search for answers, the children unravel a series of extraordinary mysteries.</p>', 'http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil', 2, '0000-00-00 00:00:00'),
(24, '7', '', 900, '2021', '13+', '', '<p>ygvhbjnkml,</p>', 120, 'Hindi', '', '', 4, '0000-00-00 00:00:00'),
(25, '7', '', 900, '2021', '13+', '', '<p>ygvhbjnkml,</p>', 120, 'Hindi', '', '', 4, '0000-00-00 00:00:00'),
(26, '7', '', 900, '2021', '13+', '', '<p>ygvhbjnkml,</p>', 120, 'Hindi', '', '', 4, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `content_master`
--

CREATE TABLE `content_master` (
  `content_id` int(11) NOT NULL,
  `contennt_type` text NOT NULL,
  `content_status` int(11) NOT NULL COMMENT '0=active , 1=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_master`
--

INSERT INTO `content_master` (`content_id`, `contennt_type`, `content_status`) VALUES
(1, 'Movies', 0),
(2, 'Series', 0),
(3, 'Music', 0),
(4, 'Infotainment', 0),
(5, 'DRAMA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_mobile_no` bigint(11) NOT NULL,
  `customer_password` varchar(500) NOT NULL,
  `customer_profile_img` varchar(500) NOT NULL,
  `customer_dob` text NOT NULL,
  `customer_gender` int(11) NOT NULL,
  `customer_lang_pref` text NOT NULL,
  `customer_status` int(11) NOT NULL DEFAULT '0' COMMENT '0:active;1:deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`customer_id`, `customer_name`, `customer_mobile_no`, `customer_password`, `customer_profile_img`, `customer_dob`, `customer_gender`, `customer_lang_pref`, `customer_status`) VALUES
(1, 'Khatal Sanket Sanjay', 9619641597, 'eac33da6fb1be3838fe2b18f20ed496b', '1_profile_img.jpg', '1996-07-27', 1, 'English,Hindi,Marathi', 0),
(2, 'Suraj Gupta', 8692869259, '62cc2d8b4bf2d8728120d052163a77df', '', '1996-11-13', 1, 'English,Hindi', 0),
(3, 'suraj', 8692869254, 'eac33da6fb1be3838fe2b18f20ed496b', '', '', 0, '', 0),
(4, 'Danku', 9969238751, 'e10adc3949ba59abbe56e057f20f883e', '', '', 0, '', 0),
(5, 'Pinku', 5422118963, 'eac33da6fb1be3838fe2b18f20ed496b', '', '', 0, '', 0),
(6, 'suraj', 8692856256, '62cc2d8b4bf2d8728120d052163a77df', '', '2021-03-17', 1, 'Hindi,Marathi,Tamil', 0);

-- --------------------------------------------------------

--
-- Table structure for table `end_timer_master`
--

CREATE TABLE `end_timer_master` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `common_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `each_episode` varchar(10) NOT NULL,
  `count_timer` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=not expired,1=expired'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `end_timer_master`
--

INSERT INTO `end_timer_master` (`id`, `order_id`, `common_id`, `customer_id`, `type`, `each_episode`, `count_timer`, `date`, `status`) VALUES
(1, '', 14, 1, 1, '', 171, 8, 0),
(2, '', 12, 1, 5, '', 9, 8, 0),
(3, '', 8, 2, 2, '2', 75, 20, 1),
(4, '', 8, 2, 2, '3', 51, 20, 1),
(5, '', 8, 2, 2, '1', 51, 20, 1),
(6, '', 14, 2, 1, '', 75, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `front_banner_master`
--

CREATE TABLE `front_banner_master` (
  `banner_id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'refer content master',
  `current_date_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=active,1=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `front_banner_master`
--

INSERT INTO `front_banner_master` (`banner_id`, `common_id`, `type`, `current_date_time`, `status`) VALUES
(28, 1, 1, '0000-00-00 00:00:00', 0),
(29, 3, 1, '0000-00-00 00:00:00', 0),
(30, 5, 1, '0000-00-00 00:00:00', 0),
(31, 14, 1, '0000-00-00 00:00:00', 0),
(32, 8, 2, '0000-00-00 00:00:00', 0),
(33, 17, 2, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie_master`
--

CREATE TABLE `movie_master` (
  `movie_id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL COMMENT 'refer common master',
  `movie_trail_link` varchar(255) NOT NULL,
  `movie_link` varchar(255) NOT NULL,
  `movie_banner` varchar(255) NOT NULL,
  `movie_poster` text NOT NULL,
  `movie_cast` text NOT NULL,
  `movie_director` text NOT NULL,
  `movie_writer` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=published,1=unpublished,2=upcoming'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_master`
--

INSERT INTO `movie_master` (`movie_id`, `common_id`, `movie_trail_link`, `movie_link`, `movie_banner`, `movie_poster`, `movie_cast`, `movie_director`, `movie_writer`, `status`) VALUES
(1, 1, 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_4_dgboxabr.smil/playlist.m3u8', '1_movie_banner.jpg', '1_movie_poster.jpg', 'Vijay,Priyamani,Samantha Akkineni', 'Lokesh Kanagaraj', 'Lokesh Kanagaraj', 0),
(3, 3, 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_4_dgboxabr.smil/playlist.m3u8', '3_movie_banner.jpg', '3_movie_poster.jpg', 'Chandra Sekhar Yeleti,Anand Prasad V.', 'Anand Prasad V.', 'Chandra Sekhar Yeleti', 0),
(4, 4, 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_4_dgboxabr.smil/playlist.m3u8', '4_movie_banner.jpg', '4_movie_poster.jpg', 'Tai Duncan, Mark Williams, Warren Goz, Eric Gold, Robert Lorenz', 'Warren Goz; Eric Gold', 'Robert Lorenz', 0),
(5, 5, 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_4_dgboxabr.smil/playlist.m3u8', '5_movie_banner.jpg', '5_movie_poster.jpg', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz', 'Todd Phillips', 'Scott Silver', 0),
(6, 12, 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_4_dgboxabr.smil/playlist.m3u8', '12_movie_banner.jpg', '12_movie_poster.jpg', 'Sachin–Jigar, Tanishk Bagchi, Jigar Saraiya, Sachin Sanghvi', 'Homi Adajania', 'Dinesh Vijan', 0),
(7, 14, 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_4_dgboxabr.smil/playlist.m3u8', '14_movie_banner.jpg', '14_movie_poster.jpg', 'Richard da Costa, Dylan Williams, Alex Parkinson, Alison Morrow, Stewart le Maréchal, Angus Lamont', 'Paul Leonard-Morgan', 'Durjoy Datta', 0),
(8, 15, 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_4_dgboxabr.smil/playlist.m3u8', '15_movie_banner.jpg', '15_movie_poster.jpg', 'David Katzenberg, Seth Grahame-Smith', 'Lars Klevberg', 'David Katzenberg, Seth Grahame-Smith', 0);

-- --------------------------------------------------------

--
-- Table structure for table `music_master`
--

CREATE TABLE `music_master` (
  `music_id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL,
  `music_name` varchar(255) NOT NULL,
  `singer` text NOT NULL,
  `musician` text NOT NULL,
  `producer` varchar(255) NOT NULL,
  `music_link` varchar(255) NOT NULL,
  `music_banner` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active;1=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music_master`
--

INSERT INTO `music_master` (`music_id`, `common_id`, `music_name`, `singer`, `musician`, `producer`, `music_link`, `music_banner`, `status`) VALUES
(2, 11, 'efrwdeqs', '<p>bevrwcs</p>', '<p>trvecwd</p>', '<p>vfecdx</p>', 'https://www.google.com', '2_music_banner.jpg', 0),
(3, 13, 'bvsdfe', '<p>fsdfew</p>', '<p>dewfe</p>', '<p>fwede</p>', 'https://www.google.com', '3_music_banner.jpg', 0),
(4, 16, 'cyvgubhnj', '<p>cfygvubh</p>', '<p>cvgbhjn</p>', '<p>vgbhjnk</p>', 'https://www.google.com', '4_music_banner.jpg', 0),
(5, 16, 'Billionare', '<p>Arjit Singh</p>', '<p>Milind Bhatnagar</p>', '<p>Mukesh Bhatt</p>', ' http://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Demo_film_dgboxabr.smil/playlist.m3u8', '1_music_banner.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `order_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'reff content master',
  `price` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '1' COMMENT '1:in progress 2:delivered 3:pending',
  `status` int(11) NOT NULL COMMENT '0=not expired,1=expired',
  `ordered_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `transaction_id`, `customer_id`, `common_id`, `type`, `price`, `order_status`, `status`, `ordered_on`) VALUES
(1, 0, 1, 1, 1, 800, 1, 0, '2021-03-05'),
(2, 0, 2, 8, 2, 1000, 1, 1, '2021-03-05'),
(3, 0, 2, 14, 1, 900, 1, 1, '2021-03-05'),
(6, 0, 1, 23, 2, 800, 1, 0, '2021-03-06'),
(7, 0, 1, 12, 5, 300, 1, 0, '2021-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `otp_master`
--

CREATE TABLE `otp_master` (
  `otp_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp_master`
--

INSERT INTO `otp_master` (`otp_id`, `otp`, `is_expired`, `created_on`) VALUES
(1, 785338, 0, '2021-03-04 15:10:41'),
(2, 496445, 0, '2021-03-04 15:10:50'),
(3, 664959, 0, '2021-03-04 19:10:56'),
(4, 822336, 1, '2021-03-04 22:11:54'),
(5, 800409, 0, '2021-03-24 18:12:01'),
(6, 554998, 1, '2021-03-04 09:12:04'),
(7, 439756, 1, '2021-03-30 18:12:09'),
(8, 975469, 0, '2021-03-09 19:59:12'),
(9, 922151, 0, '2021-03-09 19:59:52'),
(10, 877915, 0, '2021-03-09 19:59:55'),
(11, 578237, 0, '2021-03-09 19:59:57'),
(12, 423097, 0, '2021-03-09 20:00:00'),
(13, 329891, 0, '2021-03-09 20:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `series_master`
--

CREATE TABLE `series_master` (
  `id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL COMMENT 'refer common master',
  `season_number` int(11) NOT NULL,
  `series_com_id` varchar(255) NOT NULL COMMENT 'common_id value',
  `series_banner` varchar(255) NOT NULL,
  `series_poster` text NOT NULL,
  `series_trail_link` varchar(455) NOT NULL,
  `total_number_episode` varchar(255) NOT NULL,
  `each_episode_duration` text NOT NULL,
  `each_episode_name` text NOT NULL,
  `each_episode_link` text NOT NULL,
  `each_episode_banner` text NOT NULL,
  `each_episode_poster` text NOT NULL,
  `each_synopsis` text NOT NULL,
  `series_cast` text NOT NULL,
  `series_director` text NOT NULL,
  `series_writer` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active,1=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `series_master`
--

INSERT INTO `series_master` (`id`, `common_id`, `season_number`, `series_com_id`, `series_banner`, `series_poster`, `series_trail_link`, `total_number_episode`, `each_episode_duration`, `each_episode_name`, `each_episode_link`, `each_episode_banner`, `each_episode_poster`, `each_synopsis`, `series_cast`, `series_director`, `series_writer`, `status`) VALUES
(2, 7, 1, '', '7_series_banner.jpg', '7_series_poster.jpg', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', '2', '[\"40\",\"40\"]', '[\"No. Akhandanand Tripathi AKA Kaleen Bhaiya, the uncrowned king \",\"Rati Shankar, an old rival of Tripathi, sends a man to kill Munna. Munna survives and kills the man\"]', '[\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_1_dgboxabr.smil/playlist.m3u8\",\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_4_dgboxabr.smil/playlist.m3u8\"]', '[\"71_series_episode_banner.jpg\",\"72_series_episode_banner.jpg\"]', '[\"71_series_episode_poster.jpg\",\"72_series_episode_poster.jpg\"]', '[\"<p>runs a drugs and arms business, under the guise of a carpet manufacturing company. One night, his son Phoolchand AKA Munna Bhaiya, accidentally kills a groom with celebratory gunfire while dancing at his wedding.</p>\",\"<p>runs a drugs and arms business, under the guise of a carpet manufacturing company. One night, his son Phoolchand AKA Munna Bhaiya, accidentally kills a groom with celebratory gunfire while dancing at his wedding.</p>\"]', 'Bharat Tyagi,Shatrughan Tyagi', 'Vijay Varma', 'Karan Anshuman', 0),
(3, 8, 1, '', '8_series_banner.jpg', '8_series_poster.jpg', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', '3', '[\"20\",\"30\",\"20\"]', '[\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8\",\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8\",\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8\"]', '[\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_1_dgboxabr.smil/playlist.m3u8\",\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_4_dgboxabr.smil/playlist.m3u8\",\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8\"]', '[\"81_series_episode_banner.jpg\",\"82_series_episode_banner.jpg\",\"83_series_episode_banner.jpg\"]', '[\"81_series_episode_poster.jpg\",\"82_series_episode_poster.jpg\",\"83_series_episode_poster.jpg\"]', '[\"<p>A scooter bomb goes off at Kala Ghoda and Srikant learns about a mission called Zulfiqar. Meanwhile, suspects in the blast case tell him about a drop box near Victoria College, and he arranges for round-the-clock surveillance at the location.</p>\",\"<p>scooter bomb goes off at Kala Ghoda and Srikant learns about a mission called Zulfiqar. Meanwhile, suspects in the blast case tell him about a drop box near Victoria College, and he arranges for round-the-clock surveillance at the location.4gefdc</p>\",\"<p>When he discovers that one of the hospitalised prisoners is part of Mission Zulfiqar, Srikant interrogates the prisoner\'s friend about it. Later, TASC monitors Kareem\'s hostel room, but he gives them the slip.</p>\"]', 'Manoj Bajpai,Priyamani,Samantha Akkineni', 'Suman Kumar', 'Raj Nidimoru', 0),
(4, 17, 1, '', '17_series_banner.jpg', '17_series_poster.jpg', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', '2', '[\"40\",\"40\"]', '[\"sdfgh\",\"ASDFGHJK\"]', '[\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_1_dgboxabr.smil/playlist.m3u8\",\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_4_dgboxabr.smil/playlist.m3u8\"]', '[\"171_series_episode_banner.jpg\",\"172_series_episode_banner.jpg\"]', '[\"171_series_episode_poster.jpg\",\"172_series_episode_poster.jpg\"]', '[\"<p><strong>Chernobyl</strong> is a nuclear power plant in Ukraine that was the site of a disastrous nuclear accident on April 26, 1986. ... The worst nuclear disaster in history killed two workers in the explosions and, within months, at least 28 more would be dead by acute radiation exposure.</p>\",\"<p><strong>Chernobyl</strong> is a nuclear power plant in Ukraine that was the site of a disastrous nuclear accident on April 26, 1986. ... The worst nuclear disaster in history killed two workers in the explosions and, within months, at least 28 more would be dead by acute radiation exposure.</p>\"]', 'Jared Harris, Stellan Skarsgård, Emily Watson', 'Johan Renck', 'Craig Mazin', 0),
(5, 23, 1, '', '23_series_banner.jpg', '23_series_poster.jpg', 'https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8', '1', '[\"120\"]', '[\"guhjkl\"]', '[\"[\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_5_dgboxabr.smil/playlist.m3u8\",\"https://kr2ayplza6wy-hls-push.5centscdn.com/mp4/demo_movie/Episode_1_dgboxabr.smil/playlist.m3u8\"]\"]', '[\"231_series_episode_banner.jpg\"]', '[\"231_series_episode_poster.jpg\"]', '[\"<p>In 1980s Indiana, a group of young friends witness supernatural forces and secret government exploits. As they search for answers, the children unravel a series of extraordinary mysteries.</p>\"]', 'Millie Bobby Brown, Finn Wolfhard, Noah Schnapp', 'Shawn Levy', 'Matt Duffer, Jessie Nickson-Lopez', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session_master`
--

CREATE TABLE `session_master` (
  `id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL,
  `session_name` varchar(255) NOT NULL,
  `session_trail_link` varchar(255) NOT NULL,
  `conducted_by` text NOT NULL,
  `total_number_session` int(11) NOT NULL,
  `session_banner` varchar(255) NOT NULL,
  `each_session_duration` text NOT NULL,
  `each_session_name` text NOT NULL,
  `each_session_link` text NOT NULL,
  `each_session_banner` text NOT NULL,
  `each_synopsis` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=active,1=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session_master`
--

INSERT INTO `session_master` (`id`, `common_id`, `session_name`, `session_trail_link`, `conducted_by`, `total_number_session`, `session_banner`, `each_session_duration`, `each_session_name`, `each_session_link`, `each_session_banner`, `each_synopsis`, `status`) VALUES
(1, 20, 'uhijok', '', '<p>tnrbgefrwd</p>', 2, '1_session_banner.jpg', '[\"10min \",\"10 min\"]', '[\"yguhijnok\",\"mutynrtbfv\"]', '[\"https://www.google.com\",\"https://www.google.com\"]', '[\"11_session_episode_banner.jpg\",\"12_session_episode_banner.jpg\"]', '[\"<p>cfvgbhjnkml<\\/p>\",\"<p>tyrhtgerfde<\\/p>\"]', 0),
(2, 21, 'vuhbjn', '', '<p>mtyrhtgrfd</p>', 1, '2_session_banner.jpg', '[\"20 min\"]', '[\"hvjbklm\"]', '[\"https://www.google.com\"]', '[\"21_session_episode_banner.jpg\"]', '[\"<p>bvcsaxz<\\/p>\"]', 0),
(3, 26, 'gvbhjnkml', 'https://www.google.com', '<p>vgbhjnkmlvgbhj</p>', 1, '3_session_banner.jpg', '[\"120 min\"]', '[\"tguhij\"]', '[\"https://www.google.com\"]', '[\"31_session_episode_banner.jpg\"]', '[\"<p>vecdXEWF<\\/p>\"]', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `common_master`
--
ALTER TABLE `common_master`
  ADD PRIMARY KEY (`common_id`);

--
-- Indexes for table `content_master`
--
ALTER TABLE `content_master`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `end_timer_master`
--
ALTER TABLE `end_timer_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_banner_master`
--
ALTER TABLE `front_banner_master`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `movie_master`
--
ALTER TABLE `movie_master`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `music_master`
--
ALTER TABLE `music_master`
  ADD PRIMARY KEY (`music_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `otp_master`
--
ALTER TABLE `otp_master`
  ADD PRIMARY KEY (`otp_id`);

--
-- Indexes for table `series_master`
--
ALTER TABLE `series_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_master`
--
ALTER TABLE `session_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `common_master`
--
ALTER TABLE `common_master`
  MODIFY `common_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `content_master`
--
ALTER TABLE `content_master`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `end_timer_master`
--
ALTER TABLE `end_timer_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `front_banner_master`
--
ALTER TABLE `front_banner_master`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `movie_master`
--
ALTER TABLE `movie_master`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `music_master`
--
ALTER TABLE `music_master`
  MODIFY `music_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `otp_master`
--
ALTER TABLE `otp_master`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `series_master`
--
ALTER TABLE `series_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session_master`
--
ALTER TABLE `session_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
