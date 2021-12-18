-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2021 at 04:22 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_email` varchar(255) NOT NULL,
  `ad_pass` varchar(255) NOT NULL,
  `ad_image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` varchar(255) NOT NULL,
  `ad_user_name` varchar(255) NOT NULL,
  `ad_role` varchar(255) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_email`, `ad_pass`, `ad_image`, `status`, `created_at`, `ad_user_name`, `ad_role`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin.png', 'active', '20202', 'Farhad', 'admin'),
(3, 'hello@gmail.com', '123', '3.jpg', 'active', '2020', 'farff', 'admin'),
(4, 'farhad@gmail.com', '  ', 'i.jpg', 'active', '2020', 'Farhad Rahmani', 'admin'),
(5, 'watThefacuk@gmail.com', 'dd', 'i.jpg', 'active', '2020', 'Farhad Rahmani', 'admin'),
(8, 'rahmni@gmail.com', 'ff', '2.jpg', 'active', '2021/20/1', 'Farhad', 'admin'),
(9, 'admin@gmail.com', 'ff', '2.jpg', 'active', '2021/20/1', 'Farhad', 'admin'),
(10, 'admin@gmail.com', 'f', '2.jpg', 'active', '2021/20/1', 'Farhad', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `background_img`
--

DROP TABLE IF EXISTS `background_img`;
CREATE TABLE IF NOT EXISTS `background_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'publish',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `background_img`
--

INSERT INTO `background_img` (`id`, `name`, `wallpaper`, `status`) VALUES
(27, 'Walidge', '01dae66b36533acf5a4f1c04e4391750.png', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `pro_author` varchar(255) NOT NULL,
  `who_adding_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=289 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_total_pro` int(255) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT 'publish',
  `created_at` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `cat_total_pro`, `status`, `created_at`, `created_by`) VALUES
(31, 'Winter Care', 'jx66k5moct8lavzz0meq.jpg', 0, 'publish', 'Dec 12, 2021at08: 53 PM', 'Farhad'),
(28, 'Healthcare Devices', 'qjfdkz5njmk9n7vvrbb3.png', 0, 'publish', 'Dec 12, 2021at08: 51 PM', 'Farhad'),
(29, 'Skin Care', 'cabpuknnlyyzgqfnb4x5.png', 0, 'publish', 'Dec 12, 2021at08: 52 PM', 'Farhad'),
(30, 'Homeopathy', 'kfyx5kvvn2ai5fwswhsa.png', 0, 'publish', 'Dec 12, 2021at08: 53 PM', 'Farhad'),
(27, 'Sexual Wellness', 'bkhusfgfiu9qedowph2i.png', 0, 'publish', 'Dec 12, 2021at08: 50 PM', 'Farhad'),
(26, 'Cream', 'af7gui0fuc0wyg0xwhrq.png', 0, 'publish', 'Dec 12, 2021at08: 46 PM', 'Farhad');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_pro_id` int(11) NOT NULL,
  `com_pro_author` varchar(255) NOT NULL,
  `com_detail` text NOT NULL,
  `com_sender_id` int(11) NOT NULL,
  `com_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `com_status` varchar(255) NOT NULL DEFAULT 'pendding',
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `com_pro_id`, `com_pro_author`, `com_detail`, `com_sender_id`, `com_date`, `com_status`) VALUES
(39, 5260, 'farhad', 'Hello How are you ', 27, '2021-12-14 13:55:43', 'pendding'),
(40, 5260, 'farhad', 'Hi I are you safwelkrjwel', 27, '2021-12-14 14:07:44', 'pendding');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

DROP TABLE IF EXISTS `favourite`;
CREATE TABLE IF NOT EXISTS `favourite` (
  `fav_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `pro_author` varchar(255) NOT NULL,
  `mem_id` int(11) NOT NULL,
  PRIMARY KEY (`fav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`fav_id`, `pro_id`, `pro_author`, `mem_id`) VALUES
(18, 5259, 'asdf', 24);

-- --------------------------------------------------------

--
-- Table structure for table `folllow`
--

DROP TABLE IF EXISTS `folllow`;
CREATE TABLE IF NOT EXISTS `folllow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `followOn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_name` varchar(255) NOT NULL,
  `mem_user_name` varchar(255) NOT NULL,
  `mem_image` varchar(255) NOT NULL,
  `mem_email` varchar(255) NOT NULL,
  `mem_pass` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `mem_name`, `mem_user_name`, `mem_image`, `mem_email`, `mem_pass`, `created_at`) VALUES
(26, 'farhad', 'farhad', 'developers-x2.png', 'farhadwardak2018@gmail.com', '$2y$10$3paz2wF/HUbwNJZC26sFVeoixkbxKpiqWAst/CRu.pUNiGYsK8/T6', 'Aug 8, 2021at10:00 PM'),
(24, 'wardaddd', 'asdf', 'nft-non-fungible-token-nft-text-nft-logo-non-fungible-token-poster-new-digital-currency-digital-art-transaction-illustration-background-vector.jpg', 'aaa@gmail.com', '$2y$10$Ipyl/cw5J4Ea68IVE8eNY.5jUIn0QV6xdirWUa7n12369QPwlrX1.', 'Aug 8, 2021at10:23 AM'),
(32, 'Wardak', 'wardak', '157-1575188_penicillin-antibiotics-pharmaceutical-drug-dentistry-medicine-png-transparent.png', 'wardak@gmail.com', '$2y$10$9lZIe0mj9ttf79F7rLQeA.KBU09fKFstB4kI6ROFtIWr7ObSqWgE.', 'Dec 12, 2021at06:27 PM'),
(27, 'admin', 'admin', 'games-tf2.png', 'khanwali@gmail.com', '$2y$10$rua4GReCojVmLHmYECHqYu4zkGtGUys1rGC3mhx2v4JieG4JH1kqy', 'Aug 8, 2021at12:49 PM');

-- --------------------------------------------------------

--
-- Table structure for table `member_cover_photo`
--

DROP TABLE IF EXISTS `member_cover_photo`;
CREATE TABLE IF NOT EXISTS `member_cover_photo` (
  `cover_id` int(11) NOT NULL AUTO_INCREMENT,
  `cover_image` varchar(255) NOT NULL,
  `mem_user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cover_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_cover_photo`
--

INSERT INTO `member_cover_photo` (`cover_id`, `cover_image`, `mem_user_name`) VALUES
(29, '', 'farhad'),
(26, 'fourth.jpg', 'asdf'),
(28, 'marketplace-x2.png', 'admin'),
(25, 'teahub.io-airport-wallpaper-645168.png', 'WARDAK'),
(23, '418539.jpg', 'WARDAK'),
(24, 'a1511934697_verybig_1571906621.png', '123'),
(22, 'cscu3_1602589061.png', 'farhad');

-- --------------------------------------------------------

--
-- Table structure for table `mem_bio`
--

DROP TABLE IF EXISTS `mem_bio`;
CREATE TABLE IF NOT EXISTS `mem_bio` (
  `bio_id` int(11) NOT NULL AUTO_INCREMENT,
  `bio_detail` varchar(500) NOT NULL,
  `bio_user_id` int(11) NOT NULL,
  PRIMARY KEY (`bio_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mem_bio`
--

INSERT INTO `mem_bio` (`bio_id`, `bio_detail`, `bio_user_id`) VALUES
(16, 'Web Developer 2+ year of experience in designing and developing user interfaces, testing, debugging and training staff within eCommerce technologies. Proven ability in optimizing web functionalities that improve data retrieval and workflow efficiencies.', 24),
(12, 'Be Different From Normal People Becouse The Developer Has Thier Own Target IN Thier Life', 26),
(13, 'Only VIP Vistore Allowed', 27);

-- --------------------------------------------------------

--
-- Table structure for table `mem_products`
--

DROP TABLE IF EXISTS `mem_products`;
CREATE TABLE IF NOT EXISTS `mem_products` (
  `mem_pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_pro_name` varchar(255) NOT NULL,
  `mem_pro_detail` varchar(255) NOT NULL,
  `mem_pro_image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `at` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `pro_views` int(18) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'publish',
  `mem_fav_pro` varchar(255) NOT NULL DEFAULT 'fav',
  PRIMARY KEY (`mem_pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5261 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mem_products`
--

INSERT INTO `mem_products` (`mem_pro_id`, `mem_pro_name`, `mem_pro_detail`, `mem_pro_image`, `category_id`, `tag`, `at`, `author`, `pro_views`, `price`, `status`, `mem_fav_pro`) VALUES
(5252, 'NetriOrg', 'The NetriOrg is Best skin products in the World.', 'c95rt5demksuokza1at8.png', 29, 'skin', 'Dec 12, 2021at09: 11 PM', 'farhad', 0, 23, 'publish', 'fav'),
(5253, 'ShilaJet', 'This Capsol is Used for sexual wellness And Power', 'ueakypjkbnctieaevpse.png', 27, 'power', 'Dec 12, 2021at09: 22 PM', 'admin', 0, 32, 'publish', 'fav'),
(5254, 'Energy', 'PowerFull Energy any kind of situations', 'nafthqsf7fsubuushscx.png', 31, 'Energy', 'Dec 12, 2021at01: 33 AM', 'farhad', 0, 76, 'publish', 'fav'),
(5255, 'wight Management', 'It\'s better to use for middle age person this medicine because the wight is most importent thing in the Human body', 'xvv96syec6byj5ahojzy.png', 31, 'Wight', 'Dec 12, 2021at01: 35 AM', 'farhad', 0, 56, 'publish', 'fav'),
(5256, 'Women Proten', 'Why Proten for Only Women\'s use, also contain choclates.', 'ghtrtag5kj5ovy89l6lg.png', 31, 'Protens', 'Dec 12, 2021at01: 41 AM', 'admin', 0, 122, 'publish', 'fav'),
(5257, 'face Mask', 'for crona every body should use the mask for himself and for him familiy health that should use mask.', 'h3zzgb2tjejohyv3tt2t.jpg', 31, 'mask', 'Dec 12, 2021at01: 42 AM', 'admin', 0, 44, 'publish', 'fav'),
(5258, 'Hydration Energy', 'Hydration Energy is Popular Energy but our product is special You Can Test it.', 'xujapwjw6thc8yxcmnwm.jpg', 30, 'energy', 'Dec 12, 2021at01: 45 AM', 'asdf', 0, 125, 'publish', 'fav'),
(5259, 'Heart Health', 'be Careful with you Heart because this is most Importent part of our Body.', 'lc3bohxfl3ounndazqhu.png', 30, 'Heart', 'Dec 12, 2021at01: 48 AM', 'asdf', 0, 234, 'publish', 'fav');

-- --------------------------------------------------------

--
-- Table structure for table `mem_social_profiles`
--

DROP TABLE IF EXISTS `mem_social_profiles`;
CREATE TABLE IF NOT EXISTS `mem_social_profiles` (
  `social_id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(500) NOT NULL,
  `twitter` varchar(500) NOT NULL,
  `google` varchar(500) NOT NULL,
  `behance` varchar(500) NOT NULL,
  `dribbble` varchar(500) NOT NULL,
  `mem_id` int(11) NOT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mem_social_profiles`
--

INSERT INTO `mem_social_profiles` (`social_id`, `facebook`, `twitter`, `google`, `behance`, `dribbble`, `mem_id`) VALUES
(1, 'www.facebook.com/BCSTricks', 'www.twitter.com/BCSTricks', 'www.google.com/BCSTricks', 'www.behance.comBCSTricks', 'www.dribbble.comBCSTricks', 0),
(2, 'www.facebook.com/ahmadi', 'www.twitter.com/ahmadi', 'www.google.com/ahmadi', 'www.behance.comahmadi', 'www.dribbble.comahmadi', 22),
(3, 'www.facebook.com/BCSTricks', 'www.twitter.com/BCSTricks', 'www.google.com/BCSTricks', 'www.behance.com/BCSTricks', 'www.dribbble.com/BCSTricks', 21),
(9, 'https://facebook.com/Adminian', 'https://twitter.com/Adminian', 'https://google.com/Adminian', 'https://behance.com/Adminian', 'www.dribbble.com/Adminian', 27),
(10, 'https://facebook.com/wardak', 'https://twitter.com/ahmadi', 'https://google.com/ahmadi', 'https://behance.com/ahmadi', 'https://dribbble.com/ahmadi', 24),
(11, 'https://facebook.com/BCSTricks', 'https://twitter.com/BCSTricks', 'https://google.com/BCSTricks', 'https://behance.com/BCSTricks', 'https://dribbble.com/BCSTricks', 26);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_user_name` varchar(255) NOT NULL,
  `msg_user_email` varchar(255) NOT NULL,
  `msg_detail` varchar(1000) NOT NULL,
  `msg_date` varchar(255) NOT NULL,
  `msg_status` varchar(255) NOT NULL DEFAULT 'pendding',
  `msg_state` int(11) NOT NULL DEFAULT '0',
  `reciever` int(11) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `msg_user_name`, `msg_user_email`, `msg_detail`, `msg_date`, `msg_status`, `msg_state`, `reciever`) VALUES
(5, 'farhad', 'farhad@gmail.com', 'Thank you for Recieving My Messages ', 'Aug 8, 2021at10: 30 PM', 'pendding', 1, 27),
(6, 'farhad', 'farhad@gmail.com', 'Great Working', 'Aug 8, 2021at10: 38 PM', 'pendding', 1, 27),
(7, 'admin', 'khan@gmail.com', 'hello how are you ASDF What is this name ha ?', 'Aug 8, 2021at11: 25 PM', 'pendding', 1, 24),
(8, 'admin', 'khan@gmail.com', 'I am Admin I happy To message With You Dear', 'Aug 8, 2021at11: 27 PM', 'pendding', 1, 24),
(10, 'farhad', 'farhad@gmail.com', 'Hello ASDF How are you ?\r\n\r\n\r\n\r\n                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque modi sed dicta sit dolorem minus qui, doloribus odit veniam. Officia ratione rerum temporibus quo voluptatibus aspernatur quam corporis sequi veritatis.\r\n                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque modi sed dicta sit dolorem minus qui, doloribus odit veniam. Officia ratione rerum temporibus quo voluptatibus aspernatur quam corporis sequi veritatis.\r\n\r\n\r\n                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque modi sed dicta sit dolorem minus qui, doloribus odit veniam. Officia ratione rerum temporibus quo voluptatibus aspernatur quam corporis sequi veritatis.', 'Aug 8, 2021at12: 28 PM', 'pendding', 1, 24),
(11, 'farhad', 'farhad@gmail.com', 'Another Check Wait Please Okey?\r\n\r\n\r\n\r\n\r\n                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque modi sed dicta sit dolorem minus qui, doloribus odit veniam. Officia ratione rerum temporibus quo voluptatibus aspernatur quam corporis sequi veritatis.\r\n', 'Aug 8, 2021at12: 28 PM', 'pendding', 1, 24),
(12, 'farhad', 'farhad@gmail.com', 'Hello How are you are You fine\r\n', 'Sep 9, 2021at07: 47 PM', 'pendding', 1, 26),
(13, 'farhad', 'farhad@gmail.com', 'Are Good It you r farhad ', 'Sep 9, 2021at07: 47 PM', 'pendding', 1, 26),
(14, 'admin', 'khan@gmail.com', 'How are you Farhad \r\n', 'Sep 9, 2021at09: 35 PM', 'pendding', 1, 26),
(15, 'admin', 'khan@gmail.com', 'I am Admin Are Fine?', 'Sep 9, 2021at09: 35 PM', 'pendding', 1, 26),
(16, 'admin', 'khan@gmail.com', 'Great The Notification Is Also Corrected Thier was div class fogotten by Developer', 'Sep 9, 2021at09: 39 PM', 'pendding', 1, 26),
(17, 'farhad', 'farhad@gmail.com', 'Hello admin\r\n', 'Sep 9, 2021at11: 54 AM', 'pendding', 1, 27),
(18, 'farhad', 'farhad@gmail.com', 'We Want Test Message to you Are Fine?', 'Sep 9, 2021at11: 54 AM', 'pendding', 1, 27),
(19, 'admin', 'khan@gmail.com', 'Hello ASDF How are you?', 'Oct 10, 2021at07: 00 PM', 'pendding', 1, 24),
(20, 'farhad', 'farhad@gmail.com', 'Ø³Ù„Ø§Ù… ÙˆØ±ÙˆØ±Ù‡ Ø³Ù†Ú«Ù‡ ÛŒÛŒ Ø¬ÙˆØ± Ù¾Ù‡ Ø®ÛŒØ± ÚšÙ‡ ÛŒÛŒ Ø§Ø¯Ù…ÛŒÙ† ØµØ§Ø­Ø¨', 'Dec 12, 2021at08: 49 AM', 'pendding', 1, 27),
(21, 'admin', 'khanwali@gmail.com', 'Hello Farhad Message Testing', 'Dec 12, 2021at12: 12 AM', 'pendding', 1, 26),
(22, 'farhad', 'farhadwardak2018@gmail.com', 'hello farhad', 'Dec 12, 2021at12: 24 AM', 'pendding', 1, 26),
(23, 'asdf', 'aaa@gmail.com', 'Hello This Was Awesome Product Dear Sire', 'Dec 12, 2021at01: 06 AM', 'pendding', 0, 5252);

-- --------------------------------------------------------

--
-- Table structure for table `parchased`
--

DROP TABLE IF EXISTS `parchased`;
CREATE TABLE IF NOT EXISTS `parchased` (
  `parchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `pro_author` varchar(255) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'pendding',
  PRIMARY KEY (`parchase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parchased`
--

INSERT INTO `parchased` (`parchase_id`, `pro_id`, `pro_author`, `buyer_id`, `date`, `status`) VALUES
(50, 5255, 'farhad', 24, '2021-12-17 06:53:17', 'pendding'),
(49, 5256, 'admin', 27, '2021-12-17 02:50:42', 'pendding'),
(48, 5259, 'asdf', 27, '2021-12-17 02:49:30', 'pendding'),
(47, 5255, 'farhad', 27, '2021-12-17 02:49:05', 'pendding'),
(46, 5255, 'farhad', 27, '2021-12-17 02:25:07', 'pendding'),
(45, 5259, 'asdf', 27, '2021-12-17 02:24:08', 'pendding'),
(44, 5255, 'farhad', 27, '2021-12-17 02:21:38', 'pendding'),
(43, 5256, 'admin', 27, '2021-12-17 02:12:32', 'pendding'),
(42, 5260, 'farhad', 27, '2021-12-17 02:07:42', 'pendding'),
(41, 5259, 'asdf', 27, '2021-12-17 02:06:59', 'pendding'),
(40, 5259, 'asdf', 27, '2021-12-17 02:04:20', 'pendding'),
(39, 5258, 'asdf', 27, '2021-12-17 01:56:58', 'pendding'),
(38, 5257, 'admin', 27, '2021-12-17 01:54:03', 'pendding'),
(37, 5260, 'farhad', 24, '2021-12-16 13:19:34', 'pendding'),
(36, 5260, 'farhad', 24, '2021-12-16 13:19:32', 'pendding'),
(51, 5256, 'admin', 24, '2021-12-17 06:53:25', 'pendding'),
(52, 5256, 'admin', 24, '2021-12-17 15:35:12', 'pendding'),
(53, 5256, 'admin', 24, '2021-12-17 15:35:18', 'pendding'),
(54, 5259, 'asdf', 24, '2021-12-17 15:35:26', 'pendding');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) NOT NULL,
  `pro_detail` varchar(255) NOT NULL,
  `pro_price` int(50) NOT NULL,
  `pro_image` varchar(255) NOT NULL,
  `pro_author` varchar(255) NOT NULL,
  `pro_category_id` int(100) NOT NULL,
  `add_to_favorite` varchar(255) NOT NULL DEFAULT '0',
  `pro_tag` varchar(255) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_detail`, `pro_price`, `pro_image`, `pro_author`, `pro_category_id`, `add_to_favorite`, `pro_tag`) VALUES
(8, 'Best Over', 'Best Skin for the karken Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur repellendus quaerat, explicabo odit laudantium sed facere a. Exercitationem, laborum accusamus! Modi, at et illum fugit nam dignissimos numquam eveniet ab!', 452, 'a1511934697_verybig_1571906621.png', 'Farhad', 2, '0', 'Art'),
(7, 'Karaken', 'Best Skin for the karken Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur repellendus quaerat, explicabo odit laudantium sed facere a. Exercitationem, laborum accusamus! Modi, at et illum fugit nam dignissimos numquam eveniet ab!', 451, 'cscu3_1602589061.png', 'sdf', 3, '0', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `rate_pro_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT '0',
  `who_reviewed` int(11) NOT NULL,
  `review_comment` varchar(500) NOT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `replay`
--

DROP TABLE IF EXISTS `replay`;
CREATE TABLE IF NOT EXISTS `replay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_pro_id` int(11) NOT NULL,
  `com_pro_author` varchar(255) NOT NULL,
  `com_sender_id` int(11) NOT NULL,
  `com_replay` varchar(500) NOT NULL,
  `replay_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replay`
--

INSERT INTO `replay` (`id`, `com_pro_id`, `com_pro_author`, `com_sender_id`, `com_replay`, `replay_date`) VALUES
(12, 10, 'farhad', 27, 'Dear ASDF It\'s My Pleasure to Hear That Dear Bro!', '2021-12-13 23:03:41'),
(11, 4, 'farhad', 27, 'Thank you From Your Again Comment hahaha', '2021-12-13 23:02:41'),
(10, 3, 'farhad', 27, 'Thank you from Your Comment We Will be Intech.', '2021-12-13 22:34:58'),
(13, 12, 'farhad', 27, 'Really?', '2021-12-13 23:10:47'),
(14, 12, 'farhad', 27, 'awesome Thank you', '2021-12-13 23:11:12'),
(15, 12, 'farhad', 26, 'I am The owner of this product what the of admin doing??????', '2021-12-13 23:13:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
