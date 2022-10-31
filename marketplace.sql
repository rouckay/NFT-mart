-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2022 at 12:44 PM
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
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `blg_id` int(11) NOT NULL AUTO_INCREMENT,
  `blg_title` varchar(255) NOT NULL,
  `blg_detail` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blg_img` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `blg_likes` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blg_id`, `blg_title`, `blg_detail`, `user_id`, `blg_img`, `date`, `blg_likes`, `views`) VALUES
(1, 'asdfasdfasdfasdf', 'asdsfasdfsdf', 26, 'Cover.png', '2022-03-03 04:34:20', 0, 11),
(2, 'asdfasdf', 'asdfasdf', 27, 'SQL Certificate.jpg', '2022-03-03 04:35:24', 0, 16),
(3, 'asdfasdfssssssssss', 'asdfasdfsd', 26, 'Cover.png', '2022-03-03 04:36:05', 0, 3),
(4, 'High Paid Job', 'Programming Is The Best One', 27, 'NicePng_studying-png_784688.png', '2022-03-03 09:45:27', 0, 6),
(5, 'aaaaasssssss', 'asdfasdfdf', 27, 'bottom-card.png', '2022-03-03 09:50:15', 0, 22),
(6, 'Hi This Is ASDF Post', 'Nice to Meet Your Dear Brothers There is Soo Good Party OK?', 24, 'ny.jpg', '2022-03-03 11:42:26', 0, 20),
(7, 'Hi, I am Wardak This Is My First Blog Post Here Dear User', 'This Gonna Be So Awesome Post!', 32, 'download (1).png', '2022-03-03 12:21:24', 0, 1),
(8, 'New Pro Language', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et, facilis voluptate. Ab, quos beatae accusamus ad atque odit soluta ea nesciunt adipisci mollitia expedita repellendus veritatis veniam tempore velit quod.', 26, 'download (9).png', '2022-03-04 04:03:29', 0, 1),
(9, 'How Great This is Awesome Bro Thank you Sir', 'The Detail of the Partitucular And Great Post Ever You Seen Here Dear Bro!', 24, 'React.js.png', '2022-03-28 01:53:20', 0, 0),
(10, 'asdddd', 'sdfasdfasdf', 26, 'unnamed (3).jpg', '2022-06-06 15:48:38', 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=559 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `cat_total_pro`, `status`, `created_at`, `created_by`) VALUES
(31, 'Winter Care', 'jx66k5moct8lavzz0meq.jpg', 0, 'publish', 'Dec 12, 2021at08: 53 PM', 'Farhad'),
(32, 'High Quiality', '157-1575188_penicillin-antibiotics-pharmaceutical-drug-dentistry-medicine-png-transparent.png', 0, 'publish', 'Feb 2, 2022at09: 57 AM', 'Farhad'),
(28, 'Healthcare Devices', 'qjfdkz5njmk9n7vvrbb3.png', 0, 'publish', 'Dec 12, 2021at08: 51 PM', 'Farhad'),
(29, 'Skin Care', 'cabpuknnlyyzgqfnb4x5.png', 0, 'publish', 'Dec 12, 2021at08: 52 PM', 'Farhad'),
(30, 'Homeopathy', 'kfyx5kvvn2ai5fwswhsa.png', 0, 'publish', 'Dec 12, 2021at08: 53 PM', 'Farhad'),
(27, 'Sexual Wellness', 'bkhusfgfiu9qedowph2i.png', 0, 'publish', 'Dec 12, 2021at08: 50 PM', 'Farhad'),
(26, 'Cream', 'af7gui0fuc0wyg0xwhrq.png', 0, 'publish', 'Dec 12, 2021at08: 46 PM', 'Farhad');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

DROP TABLE IF EXISTS `chatbot`;
CREATE TABLE IF NOT EXISTS `chatbot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `replies` varchar(255) NOT NULL,
  `queries` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `replies`, `queries`) VALUES
(1, 'How are you', 'hi'),
(2, 'nijat.com/dashboard.php is you Home Page', 'Where Home Page?'),
(3, 'Bad Guy That is so scary boy lazy boy', 'what about rahimullah'),
(4, 'Abdulkhaliq is Like Rahim But one Different that is so tricky boy in playing cards', 'what about abdulkhaliq'),
(5, 'farhad is so smart boy farhad made me, I have to say for farhad Thank you', 'farhad'),
(6, 'Mahmood Qazi is Good Guy that is Smart, Mahmood Rahman have Best attitude with out wake uping late.', 'what about mahmood qazi'),
(7, 'I Am AI Chat Bot, and I am One your Friends helping With you with your Buziness, i have four Firends They are (Rahimullah, Mahmood Qazi, Farhad Rahmani, Abdulkhaliq.', 'who are you?');

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
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `com_pro_id`, `com_pro_author`, `com_detail`, `com_sender_id`, `com_date`, `com_status`) VALUES
(50, 5257, 'admin', 'asdfasdf', 26, '2021-12-22 09:27:11', 'pendding'),
(51, 5258, 'asdf', 'Most Usefull Product That I have Seen This In My Life Google Should Give this Noble Gift Because This Is Unique\nMost Usefull Product That I have Seen This In My Life Google Should Give this Noble Gift Because This Is Unique\nMost Usefull Product That I have Seen This In My Life Google Should Give this Noble Gift Because This Is Unique\nMost Usefull Product That I have Seen This In My Life Google Should Give this Noble Gift Because This Is Unique\n', 24, '2022-01-01 15:36:08', 'pendding'),
(47, 5257, 'admin', 'sdfg', 26, '2021-12-22 09:04:33', 'pendding'),
(48, 5257, 'admin', 'Hi             ssssssssssssssssssss', 26, '2021-12-22 09:14:57', 'pendding'),
(49, 5257, 'admin', 'Greaaaaaaaaaaaaaaaaaaaaaa', 26, '2021-12-22 09:15:38', 'pendding'),
(45, 5256, 'admin', 'Thank you', 27, '2021-12-22 07:32:32', 'pendding'),
(46, 5257, 'admin', 'Yes Exactly Awesome', 26, '2021-12-22 08:56:07', 'pendding'),
(77, 5252, 'farhad', 'asdfdsdsdddddddddddd', 27, '2022-02-23 17:25:05', 'pendding'),
(39, 5260, 'farhad', 'Hello How are you ', 27, '2021-12-14 13:55:43', 'pendding'),
(76, 5252, 'farhad', 'asdfsdf', 27, '2022-02-23 17:23:44', 'pendding'),
(75, 5258, 'asdf', 'asddddd', 26, '2022-02-23 16:46:07', 'pendding'),
(74, 5258, 'asdf', 'Good Good', 26, '2022-02-23 16:45:09', 'pendding'),
(73, 5258, 'asdf', 'Great i think', 26, '2022-02-23 16:44:06', 'pendding'),
(72, 5258, 'asdf', 'I think It\'s Great', 26, '2022-02-23 16:43:23', 'pendding'),
(71, 5283, 'admin', 'Ha The Best One Ever I seen', 26, '2022-02-23 16:35:09', 'pendding'),
(70, 5283, 'admin', 'Great Awesome Dear Friends howar you', 26, '2022-02-23 16:33:04', 'pendding'),
(69, 5281, 'farhad', 'I think it\'s great', 27, '2022-02-23 04:12:57', 'pendding'),
(68, 5283, 'admin', 'Awesome Bro That Gona be Awesome', 26, '2022-02-23 04:02:16', 'pendding'),
(67, 5252, 'farhad', 'Great I love It', 32, '2022-02-23 02:56:37', 'pendding'),
(66, 5252, 'farhad', 'Goo ', 27, '2022-02-23 02:46:52', 'pendding'),
(65, 5252, 'farhad', 'hii', 27, '2022-02-23 02:41:21', 'pendding'),
(64, 5252, 'farhad', 'sdfd', 27, '2022-02-23 02:38:55', 'pendding'),
(78, 5281, 'farhad', 'Soooooooooooooo Crazy Bro That much Much Better', 27, '2022-03-01 12:24:41', 'pendding'),
(79, 5281, 'farhad', 'soo great', 27, '2022-03-01 12:24:59', 'pendding');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_progress`
--

DROP TABLE IF EXISTS `delivery_progress`;
CREATE TABLE IF NOT EXISTS `delivery_progress` (
  `deliv_id` int(11) NOT NULL AUTO_INCREMENT,
  `deliv_pro_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `progress_time` int(255) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`deliv_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`fav_id`, `pro_id`, `pro_author`, `mem_id`) VALUES
(73, 5283, 'admin', 32),
(75, 5263, 'farhad', 26),
(71, 5283, 'admin', 24),
(72, 5281, 'farhad', 24),
(74, 5283, 'admin', 26),
(66, 5281, 'farhad', 32),
(77, 5281, 'farhad', 26),
(78, 5252, 'farhad', 26),
(79, 5281, 'farhad', 27),
(80, 5255, 'farhad', 27),
(81, 5263, 'farhad', 27);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `design_feed` varchar(600) NOT NULL DEFAULT 'empty',
  `technical_feed` varchar(600) NOT NULL DEFAULT 'empty',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `design_feed`, `technical_feed`) VALUES
(46, 'empty', 'How to open my withdrawal Page?'),
(45, 'How to Be Best Saler', 'empty'),
(44, 'empty', 'How Great Thing'),
(43, 'Great Awesome', 'empty'),
(42, 'empty', 'That Gonna Be So Awesome '),
(41, 'empty', 'Awesome Bro ');

-- --------------------------------------------------------

--
-- Table structure for table `folllow`
--

DROP TABLE IF EXISTS `folllow`;
CREATE TABLE IF NOT EXISTS `folllow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `followOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `folllow`
--

INSERT INTO `folllow` (`id`, `sender`, `reciever`, `followOn`) VALUES
(22, 33, 27, '2022-03-25 13:13:00'),
(21, 27, 26, '2022-03-22 17:38:46'),
(20, 26, 27, '2022-03-22 17:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `freelancering`
--

DROP TABLE IF EXISTS `freelancering`;
CREATE TABLE IF NOT EXISTS `freelancering` (
  `fl_id` int(11) NOT NULL AUTO_INCREMENT,
  `freel_mem_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancering`
--

INSERT INTO `freelancering` (`fl_id`, `freel_mem_id`, `status`) VALUES
(31, 24, 0),
(30, 27, 1),
(29, 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `in_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_img` varchar(255) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`in_id`)
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
  `acc_status` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`mem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `mem_name`, `mem_user_name`, `mem_image`, `mem_email`, `mem_pass`, `created_at`, `acc_status`) VALUES
(26, 'farhad', 'farhad', 'developers-x2.png', 'farhadwardak2018@gmail.com', '$2y$10$3paz2wF/HUbwNJZC26sFVeoixkbxKpiqWAst/CRu.pUNiGYsK8/T6', 'Aug 8, 2021at10:00 PM', 'publish'),
(24, 'wardaddd', 'asdf', 'nft-non-fungible-token-nft-text-nft-logo-non-fungible-token-poster-new-digital-currency-digital-art-transaction-illustration-background-vector.jpg', 'aaa@gmail.com', '$2y$10$Ipyl/cw5J4Ea68IVE8eNY.5jUIn0QV6xdirWUa7n12369QPwlrX1.', 'Aug 8, 2021at10:23 AM', 'publish'),
(32, 'Wardak', 'wardak', '157-1575188_penicillin-antibiotics-pharmaceutical-drug-dentistry-medicine-png-transparent.png', 'wardak@gmail.com', '$2y$10$9lZIe0mj9ttf79F7rLQeA.KBU09fKFstB4kI6ROFtIWr7ObSqWgE.', 'Dec 12, 2021at06:27 PM', 'publish'),
(27, 'admin', 'admin', 'games-tf2.png', 'khanwali@gmail.com', '$2y$10$rua4GReCojVmLHmYECHqYu4zkGtGUys1rGC3mhx2v4JieG4JH1kqy', 'Aug 8, 2021at12:49 PM', 'publish'),
(33, 'ahmad', 'ahmad', 'pngkey.com-taking-notes-png-5931489.png', 'ahmad@gmail.com', '$2y$10$xE9A0cKHxo3JaJNVRfg.xO5N4Jl4/0r30j4Iu9P7fv33guUbPX15u', 'Mar 3, 2022at05:39 PM', 'publish'),
(34, 'dddddddd', 'al;skdjf', 'profile-pic (3).png', 'sdffasd@gmail.com', '$2y$10$JGZ6Yukd.h6im5bOFlGz6upc1M/XwFBt8KGHK/jp7cXJMQ1o3Gm4a', 'Mar 3, 2022at09:53 PM', 'pending'),
(35, 'ddddddddddd', 'al;skdjfd', 'profile-pic (3).png', 'dsdffasd@gmail.com', '$2y$10$mV.HvLUSQyQ24KztqGu8DuwtuwQ4FZ9LdDtMbz1kzi1Eyjrb/Jl/e', 'Mar 3, 2022at09:55 PM', 'pending');

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
  `bio_detail` varchar(600) NOT NULL,
  `bio_user_id` int(11) NOT NULL,
  PRIMARY KEY (`bio_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mem_bio`
--

INSERT INTO `mem_bio` (`bio_id`, `bio_detail`, `bio_user_id`) VALUES
(28, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat eveniet aperiam iusto odio, numquam ratione quod dolores animi suscipit vitae saepe, molestiae, ipsam quia tempora nemo repellat architecto. Voluptatem, modi!', 26),
(29, 'Yes I am The Admin Exactly', 27),
(30, 'Yes Exactly Bro, Great Thing Is Building Slowly Slowly', 24);

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
  `pro_amount` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT 'publish',
  `expireDate` varchar(255) NOT NULL DEFAULT 'null',
  PRIMARY KEY (`mem_pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5285 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mem_products`
--

INSERT INTO `mem_products` (`mem_pro_id`, `mem_pro_name`, `mem_pro_detail`, `mem_pro_image`, `category_id`, `tag`, `at`, `author`, `pro_views`, `price`, `pro_amount`, `status`, `expireDate`) VALUES
(5252, 'NetriOrg', 'The NetriOrg is Best skin products in the World.', 'c95rt5demksuokza1at8.png', 29, 'skin', 'Dec 12, 2021at09: 11 PM', 'farhad', 32, 23, '1', 'publish', '2022-7-2'),
(5253, 'ShilaJet', 'This Capsol is Used for sexual wellness And Power', 'ueakypjkbnctieaevpse.png', 27, 'power', 'Dec 12, 2021at09: 22 PM', 'admin', 6, 32, '54', 'publish', '2022-11-12'),
(5261, 'Multi Vetamine', 'The Capsol will Keep you Stonge And Tight;', 'hzqtydexskktgnkgv0f8.jpg', 29, 'Vetamine', 'Dec 12, 2021at07: 42 AM', 'admin', 2, 53, '4', 'publish', '2022-10-12'),
(5255, 'wight Management', 'It\'s better to use for middle age person this medicine because the wight is most importent thing in the Human body', 'xvv96syec6byj5ahojzy.png', 31, 'Wight', 'Dec 12, 2021at01: 35 AM', 'farhad', 2, 56, '5', 'publish', '2022-07-12'),
(5256, 'Women Proten', 'Why Proten for Only Women\'s use, also contain choclates.', 'ghtrtag5kj5ovy89l6lg.png', 31, 'Protens', 'Dec 12, 2021at01: 41 AM', 'admin', 0, 122, '55', 'publish', '2022-06-12'),
(5258, 'Hydration Energy', 'Hydration Energy is Popular Energy but our product is special You Can Test it.', 'xujapwjw6thc8yxcmnwm.jpg', 30, 'energy', 'Dec 12, 2021at01: 45 AM', 'asdf', 7, 125, '-18', 'publish', '2022-05-12'),
(5259, 'Heart Health', 'be Careful with you Heart because this is most Importent part of our Body.', 'lc3bohxfl3ounndazqhu.png', 30, 'Heart', 'Dec 12, 2021at01: 48 AM', 'asdf', 3, 234, '-12', 'publish', '2022-02-12'),
(5262, 'Strong Bons', 'The Capsol will Keep you Stonge And Tight;', 'gc3u9gfc331wtsipnljl.png', 31, 'Body', 'Dec 12, 2021at07: 50 AM', 'admin', 5, 54, '15', 'publish', '2022-01-12'),
(5263, 'immance', 'Imance Boost your General Body health That will keep you Stronge And healthy', 'jiekacxr93gkhvfjrsez.jpg', 30, 'health', 'Jan 1, 2022at09: 21 AM', 'farhad', 2, 40, '1', 'publish', '2022-02-03'),
(5279, 'Be H', 'be Careful with you Heart because this is most Importent part of our Body.', 'jfnya3gelqastes2dbco.png', 29, 'Healths', 'Jan 1, 2022at06: 57 AM', 'farhad', 8, 32, '202', 'publish', '2022-09-28'),
(5270, 'New Immunity', 'Imance Boost your General Body health That will keep you Stronge And healthy', 'hytkia0zymrlxl3q1rt1.jpg', 30, 'health', 'Jan 1, 2022at09: 11 AM', 'farhad', 13, 23, '0', 'publish', '2022-02-24'),
(5283, 'New Release Power', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem facere consequuntur esse accusantium quasi dolore exercitationem doloremque beatae provident consequatur odio, mollitia, incidunt vero quae accusamus repellat nihil, quidem vel.', 'y9ksgy5sjvtwaz01wbfi.png', 30, 'new', 'Feb 2, 2022at06: 19 PM', 'admin', 27, 23, '429', 'publish', '2022-09-23'),
(5269, 'beauty Creame', 'Best Beauty Creame That will Never Seen In Any Store', 'c5h0rjmw3hw30gsvo76h.png', 26, 'creame', 'Jan 1, 2022at09: 09 AM', 'farhad', 0, 12, '0', 'publish', '2022-01-27'),
(5284, 'meena Time', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, pariatur eius? Natus aperiam incidunt impedit dolore odio sint debitis! Rem laborum, earum placeat voluptatum necessitatibus aliquid voluptatem laboriosam ullam ducimus?', 'unnamed (3).jpg', 28, 'Drags', 'Jun 6, 2022at08: 01 AM', 'farhad', 0, 3433, '122', 'publish', '2022-06-16'),
(5281, 'Good Me', 'be Careful with you Heart because this is most Importent part of our Body.', 'a7g8x7gp3owaz3zzlkie.png', 29, 'Healths', 'Jan 1, 2022at07: 00 AM', 'farhad', 26, 32, '208', 'publish', '2023-05-19');

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
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

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
(23, 'asdf', 'aaa@gmail.com', 'Hello This Was Awesome Product Dear Sire', 'Dec 12, 2021at01: 06 AM', 'pendding', 0, 5252),
(24, 'asdf', 'aaa@gmail.com', 'Hi admin', 'Dec 12, 2021at02: 20 PM', 'pendding', 1, 27),
(25, 'admin', 'khanwali@gmail.com', 'Fine Dear ASDF', 'Dec 12, 2021at02: 30 PM', 'pendding', 1, 24),
(26, 'asdf', 'aaa@gmail.com', 'Wecome', 'Dec 12, 2021at02: 36 PM', 'pendding', 1, 27),
(27, 'admin', 'khanwali@gmail.com', 'Great Work Dear ASDF', 'Jan 1, 2022at08: 00 PM', 'pendding', 1, 24),
(28, 'admin', 'khanwali@gmail.com', 'hooo', 'Feb 2, 2022at11: 51 AM', 'pendding', 1, 26),
(29, 'farhad', 'farhadwardak2018@gmail.com', 'Hi Admin This Notif Test', 'Feb 2, 2022at04: 49 PM', 'pendding', 1, 27),
(30, 'farhad', 'farhadwardak2018@gmail.com', 'Hi Admin This Notif Test', 'Feb 2, 2022at04: 50 PM', 'pendding', 1, 27),
(31, 'admin', 'khanwali@gmail.com', 'notificationFrom', 'Feb 2, 2022at04: 54 PM', 'pendding', 1, 26),
(32, 'admin', 'khanwali@gmail.com', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Feb 2, 2022at04: 56 PM', 'pendding', 1, 26),
(33, 'admin', 'khanwali@gmail.com', 'Hi Admin This Notif Test', 'Feb 2, 2022at04: 58 PM', 'pendding', 1, 26),
(34, 'admin', 'khanwali@gmail.com', '', 'Feb 2, 2022at04: 59 PM', 'pendding', 0, 26),
(35, 'admin', 'khanwali@gmail.com', 'asdfasds', 'Feb 2, 2022at04: 59 PM', 'pendding', 0, 26),
(36, 'admin', 'khanwali@gmail.com', 'Hi Admin This Notif Test', 'Feb 2, 2022at05: 02 PM', 'pendding', 0, 26),
(37, 'admin', 'khanwali@gmail.com', 'sdddddddddddd', 'Feb 2, 2022at05: 03 PM', 'pendding', 0, 26),
(38, 'admin', 'khanwali@gmail.com', 'sdfsdfds', 'Feb 2, 2022at05: 04 PM', 'pendding', 0, 26),
(39, 'admin', 'khanwali@gmail.com', 'aaaaaasdfsd', 'Feb 2, 2022at05: 10 PM', 'pendding', 0, 26),
(40, 'admin', 'khanwali@gmail.com', 'asdfasdf', 'Feb 2, 2022at05: 11 PM', 'pendding', 0, 26),
(41, 'admin', 'khanwali@gmail.com', 'How are you Dear sir', 'Feb 2, 2022at05: 42 PM', 'pendding', 0, 26),
(42, 'farhad', 'farhadwardak2018@gmail.com', 'Hi Dteee', 'Feb 2, 2022at06: 59 PM', 'pendding', 1, 27),
(43, 'admin', 'khanwali@gmail.com', 'asd', 'Feb 2, 2022at07: 04 PM', 'pendding', 0, 26),
(44, 'admin', 'khanwali@gmail.com', 'hh', 'Feb 2, 2022at06: 34 AM', 'pendding', 0, 26),
(45, 'farhad', 'farhadwardak2018@gmail.com', 'Hello Mother Fucker Admin', 'Feb 2, 2022at06: 35 AM', 'pendding', 1, 27),
(46, 'wardak', 'wardak@gmail.com', 'Got It Awesome', 'Feb 2, 2022at07: 26 AM', 'pendding', 0, 26),
(47, 'admin', 'khanwali@gmail.com', 'hellow How are you Dear Sir How Is Going', 'Mar 3, 2022at10: 09 PM', 'pendding', 1, 27),
(48, 'admin', 'khanwali@gmail.com', 'Notif Test', 'Mar 3, 2022at07: 28 AM', 'pendding', 0, 26),
(49, 'admin', 'khanwali@gmail.com', 'Yes I think Got it Fucked Message', 'Mar 3, 2022at07: 30 AM', 'pendding', 0, 26),
(50, 'admin', 'khanwali@gmail.com', 'sdfsf', 'Mar 3, 2022at07: 31 AM', 'pendding', 0, 26),
(51, 'admin', 'khanwali@gmail.com', 'sdfsdf', 'Mar 3, 2022at07: 31 AM', 'pendding', 0, 26),
(52, 'farhad', 'farhadwardak2018@gmail.com', 'Thank you for your Parchse', 'Apr 4, 2022at07: 07 PM', 'pendding', 1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `newarrived`
--

DROP TABLE IF EXISTS `newarrived`;
CREATE TABLE IF NOT EXISTS `newarrived` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arr_pro_id` int(11) NOT NULL,
  `arr_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `notificationFor` int(11) NOT NULL,
  `notificationFrom` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notif_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notificationCount` int(11) NOT NULL DEFAULT '1',
  `notif_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`ID`, `notificationFor`, `notificationFrom`, `pro_id`, `type`, `notif_at`, `notificationCount`, `notif_status`) VALUES
(4, 26, 27, 12, 'Message', '2022-02-22 13:12:26', 1, 1),
(3, 26, 27, 12, 'Message', '2022-02-22 12:41:04', 1, 1),
(5, 26, 27, 12, 'Message', '2022-02-22 14:34:52', 1, 1),
(6, 26, 27, 12, 'Message', '2022-02-23 02:04:20', 1, 1),
(7, 27, 26, 12, 'Message', '2022-02-23 02:05:51', 1, 1),
(77, 26, 27, 5263, 'Favourite', '2022-03-24 02:40:48', 1, 1),
(76, 26, 27, 5255, 'Favourite', '2022-03-24 02:40:01', 1, 1),
(12, 26, 32, 5281, 'Favourite', '2022-02-23 03:14:46', 1, 1),
(13, 26, 32, 5270, 'Favourite', '2022-02-23 03:14:59', 1, 1),
(14, 27, 26, 5283, 'Favourite', '2022-02-23 03:22:58', 1, 1),
(15, 24, 26, 5258, 'Favourite', '2022-02-23 03:23:39', 1, 1),
(16, 26, 26, 5263, 'Favourite', '2022-02-23 03:25:24', 1, 1),
(17, 26, 26, 5263, 'Favourite', '2022-02-23 03:25:54', 1, 1),
(18, 26, 26, 5281, 'Favourite', '2022-02-23 03:59:18', 1, 1),
(19, 26, 26, 5279, 'Favourite', '2022-02-23 03:59:37', 1, 1),
(20, 26, 27, 5281, 'Favourite', '2022-02-23 03:59:55', 1, 1),
(21, 26, 32, 5281, 'Favourite', '2022-02-23 04:00:39', 1, 1),
(22, 27, 26, 0, 'Comment', '2022-02-23 04:02:16', 1, 1),
(23, 26, 27, 0, 'Comment', '2022-02-23 04:12:57', 1, 1),
(24, 26, 27, 0, 'Reply', '2022-02-23 04:13:13', 1, 1),
(25, 27, 26, 5283, 'Favourite', '2022-02-23 04:27:05', 1, 1),
(26, 26, 26, 5270, 'Favourite', '2022-02-23 04:27:19', 1, 1),
(27, 26, 26, 5252, 'Favourite', '2022-02-23 04:27:45', 1, 1),
(28, 27, 26, 0, 'Add To Cart', '2022-02-23 04:31:32', 1, 1),
(29, 26, 27, 0, 'Add To Cart', '2022-02-23 04:33:15', 1, 1),
(30, 27, 26, 0, 'Add To Cart', '2022-02-23 10:33:59', 1, 1),
(31, 24, 26, 0, 'Add To Cart', '2022-02-23 10:34:38', 1, 1),
(32, 24, 26, 5258, 'Favourite', '2022-02-23 10:35:28', 1, 1),
(33, 24, 26, 0, 'Add To Cart', '2022-02-23 10:35:31', 1, 1),
(34, 27, 26, 0, 'Add To Cart', '2022-02-23 11:37:33', 1, 1),
(35, 26, 27, 0, 'Add To Cart', '2022-02-23 11:40:30', 1, 1),
(36, 26, 27, 0, 'Add To Cart', '2022-02-23 11:40:33', 1, 1),
(37, 26, 27, 0, 'Add To Cart', '2022-02-23 11:40:37', 1, 1),
(38, 27, 26, 0, 'Add To Cart', '2022-02-23 11:43:22', 1, 1),
(39, 27, 26, 0, 'Add To Cart', '2022-02-23 11:43:40', 1, 1),
(40, 27, 26, 0, 'Add To Cart', '2022-02-23 11:43:48', 1, 1),
(41, 26, 27, 0, 'Add To Cart', '2022-02-23 11:47:40', 1, 1),
(42, 26, 27, 0, 'Add To Cart', '2022-02-23 11:47:49', 1, 1),
(43, 26, 27, 0, 'Add To Cart', '2022-02-23 11:47:59', 1, 1),
(44, 26, 27, 0, 'Add To Cart', '2022-02-23 11:48:08', 1, 1),
(45, 27, 26, 0, 'Comment', '2022-02-23 16:33:04', 1, 1),
(46, 27, 26, 0, 'Comment', '2022-02-23 16:35:09', 1, 1),
(47, 24, 26, 0, 'Comment', '2022-02-23 16:43:23', 1, 1),
(48, 24, 26, 0, 'Comment', '2022-02-23 16:44:06', 1, 1),
(49, 24, 26, 0, 'Comment', '2022-02-23 16:45:09', 1, 1),
(50, 24, 26, 0, 'Comment', '2022-02-23 16:46:07', 1, 1),
(51, 26, 27, 0, 'Comment', '2022-02-23 17:23:44', 1, 1),
(52, 26, 27, 0, 'Comment', '2022-02-23 17:25:05', 1, 1),
(53, 26, 27, 0, 'Comment', '2022-03-01 12:24:41', 1, 1),
(54, 26, 27, 0, 'Comment', '2022-03-01 12:24:59', 1, 1),
(55, 26, 27, 0, 'Reply', '2022-03-01 12:25:24', 1, 1),
(56, 26, 27, 0, 'Add To Cart', '2022-03-02 14:55:36', 1, 1),
(57, 24, 26, 0, 'Add To Cart', '2022-03-02 14:57:59', 1, 1),
(58, 27, 24, 5283, 'Favourite', '2022-03-02 16:45:43', 1, 1),
(59, 26, 24, 5281, 'Favourite', '2022-03-02 16:45:52', 1, 1),
(60, 27, 32, 5283, 'Favourite', '2022-03-03 12:28:36', 1, 1),
(61, 27, 32, 0, 'Add To Cart', '2022-03-03 12:28:52', 1, 1),
(62, 26, 27, 0, 'Add To Cart', '2022-03-03 12:29:55', 1, 1),
(63, 27, 27, 0, 'Message', '2022-03-22 17:39:41', 1, 1),
(64, 27, 26, 5283, 'Favourite', '2022-03-22 18:12:37', 1, 1),
(65, 27, 26, 0, 'Add To Cart', '2022-03-22 18:12:48', 1, 1),
(66, 27, 26, 0, 'Add To Cart', '2022-03-22 18:15:02', 1, 1),
(67, 26, 27, 0, 'Add To Cart', '2022-03-22 18:16:24', 1, 1),
(68, 26, 27, 0, 'Add To Cart', '2022-03-22 18:16:33', 1, 1),
(69, 26, 27, 0, 'Add To Cart', '2022-03-22 18:16:38', 1, 1),
(70, 26, 27, 0, 'Add To Cart', '2022-03-22 18:16:56', 1, 1),
(71, 26, 26, 5263, 'Favourite', '2022-03-22 18:20:55', 1, 1),
(72, 26, 26, 5279, 'Favourite', '2022-03-23 01:56:26', 1, 1),
(73, 26, 26, 5281, 'Favourite', '2022-03-23 01:58:09', 1, 1),
(74, 26, 26, 5252, 'Favourite', '2022-03-23 01:58:23', 1, 1),
(75, 26, 27, 5281, 'Favourite', '2022-03-23 14:16:14', 1, 1),
(82, 26, 27, 0, 'Message', '2022-03-24 03:01:57', 1, 1),
(81, 26, 27, 0, 'Message', '2022-03-24 03:01:36', 1, 1),
(83, 27, 26, 0, 'Add To Cart', '2022-03-28 02:27:24', 1, 1),
(84, 26, 27, 0, 'Add To Cart', '2022-04-02 03:32:16', 1, 1),
(85, 26, 27, 0, 'Add To Cart', '2022-04-02 03:32:26', 1, 1),
(86, 26, 27, 0, 'Add To Cart', '2022-04-02 03:32:37', 1, 1),
(87, 26, 27, 0, 'Add To Cart', '2022-04-03 14:34:51', 1, 1),
(88, 27, 26, 0, 'Message', '2022-04-03 14:37:42', 1, 1),
(89, 26, 27, 5279, 'Favourite', '2022-04-03 14:38:48', 1, 1);

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
  `amount` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'pendding',
  PRIMARY KEY (`parchase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parchased`
--

INSERT INTO `parchased` (`parchase_id`, `pro_id`, `pro_author`, `buyer_id`, `amount`, `date`, `status`) VALUES
(120, 5255, 'farhad', 24, 8, '2022-01-11 16:55:28', 'pendding'),
(119, 5279, 'farhad', 27, 7, '2022-01-08 06:34:39', 'pendding'),
(118, 5264, 'farhad', 27, 8, '2022-01-07 06:09:01', 'pendding'),
(117, 5259, 'wardaddd', 26, 13, '2022-01-06 11:46:20', 'pendding'),
(116, 5270, 'farhad', 24, 300, '2022-01-05 10:55:04', 'pendding'),
(115, 5256, 'admin', 24, 1, '2022-01-02 11:04:22', 'pendding'),
(114, 5262, 'admin', 26, 18, '2022-01-02 05:29:50', 'pendding'),
(113, 5255, 'farhad', 24, 1, '2022-01-02 05:22:24', 'pendding'),
(112, 5263, 'farhad', 27, 10, '2022-01-02 05:18:47', 'pendding'),
(110, 5261, 'admin', 24, 0, '2022-01-01 15:17:15', 'pendding'),
(107, 5255, 'farhad', 27, 0, '2022-01-01 15:14:00', 'pendding'),
(108, 5259, 'wardaddd', 27, 0, '2022-01-01 15:15:23', 'pendding'),
(109, 5262, 'admin', 24, 0, '2022-01-01 15:17:09', 'pendding'),
(121, 5263, 'farhad', 27, 18, '2022-01-11 16:55:37', 'pendding'),
(122, 5283, 'admin', 26, 1, '2022-02-23 04:33:25', 'pendding'),
(123, 5281, 'farhad', 27, 1, '2022-03-01 12:25:51', 'pendding'),
(124, 5270, 'farhad', 27, 32, '2022-03-02 14:56:24', 'pendding'),
(125, 5258, 'wardaddd', 27, 19, '2022-03-02 16:44:37', 'pendding'),
(126, 5283, 'admin', 32, 1, '2022-03-03 12:29:29', 'pendding'),
(127, 5281, 'farhad', 27, 1, '2022-03-03 12:30:24', 'pendding'),
(128, 5283, 'admin', 26, 1, '2022-03-22 18:15:42', 'pendding'),
(129, 5281, 'farhad', 27, 1, '2022-03-22 18:17:49', 'pendding'),
(130, 5279, 'farhad', 27, 1, '2022-03-22 18:18:16', 'pendding'),
(131, 5263, 'farhad', 27, 1, '2022-03-27 15:22:04', 'pendding'),
(132, 5283, 'admin', 26, 1, '2022-04-02 03:38:32', 'pendding'),
(133, 5279, 'farhad', 27, 1, '2022-04-03 14:35:57', 'pendding');

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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replay`
--

INSERT INTO `replay` (`id`, `com_pro_id`, `com_pro_author`, `com_sender_id`, `com_replay`, `replay_date`) VALUES
(12, 10, 'farhad', 27, 'Dear ASDF It\'s My Pleasure to Hear That Dear Bro!', '2021-12-13 23:03:41'),
(11, 4, 'farhad', 27, 'Thank you From Your Again Comment hahaha', '2021-12-13 23:02:41'),
(10, 3, 'farhad', 27, 'Thank you from Your Comment We Will be Intech.', '2021-12-13 22:34:58'),
(13, 12, 'farhad', 27, 'Really?', '2021-12-13 23:10:47'),
(14, 12, 'farhad', 27, 'awesome Thank you', '2021-12-13 23:11:12'),
(15, 12, 'farhad', 26, 'I am The owner of this product what the of admin doing??????', '2021-12-13 23:13:10'),
(16, 42, 'asdf', 27, 'So good Why Bad', '2021-12-22 07:02:41'),
(17, 44, 'admin', 27, 'Thank you Sir', '2021-12-22 07:22:04'),
(18, 43, 'admin', 27, 'Thank you from Using This Product', '2021-12-22 07:23:58'),
(19, 43, 'admin', 27, 'Great ASDF', '2021-12-22 08:51:34'),
(20, 43, 'admin', 27, 'Awesome Thank you Sir', '2021-12-22 08:55:06'),
(21, 41, 'admin', 26, 'Got So Good', '2021-12-22 08:56:19'),
(22, 41, 'admin', 26, 'Got So Good', '2021-12-22 09:04:24'),
(23, 41, 'admin', 26, 'Got So Good', '2021-12-22 09:04:36'),
(24, 48, 'admin', 26, 'GAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '2021-12-22 09:16:10'),
(25, 49, 'admin', 26, 'tttttttttttttttttttttttttttttttttttttttttttttttttt', '2021-12-22 09:16:27'),
(26, 41, 'admin', 26, 'ZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ', '2021-12-22 09:19:10'),
(27, 42, 'asdf', 24, 'Dear Admin That Awesome I Love You', '2022-01-01 15:34:52'),
(28, 54, 'farhad', 27, 'awesome', '2022-02-22 14:39:15'),
(29, 69, 'farhad', 27, 'awesome Goood', '2022-02-23 04:13:13'),
(30, 79, 'farhad', 27, 'Great goood', '2022-03-01 12:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `site_message`
--

DROP TABLE IF EXISTS `site_message`;
CREATE TABLE IF NOT EXISTS `site_message` (
  `site_ms_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(255) NOT NULL,
  `senderEmail` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`site_ms_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_message`
--

INSERT INTO `site_message` (`site_ms_id`, `sender_name`, `senderEmail`, `message`) VALUES
(18, 'admin', 'farhad@gmail.com', 'sdsdsd'),
(17, 'admin', 'farhad@gmail.com', 'sdfsd'),
(16, 'khan', 'farhad@gmail.com', 'asdfasdfasdf'),
(24, 'admin', 'farhad@gmail.com', 'warddd@gmail.com'),
(25, 'admin', 'khan@gmail.com', 'sadfasdfsd'),
(26, 'sdafsdf', 'asdfasdf@gmail.com', 'asdfasdf'),
(27, 'admin', 'farhad@gmail.com', 'asddfasfd'),
(28, 'admin', 'farhad@gmail.com', 'asddfadsf'),
(29, 'admin', 'farhad@gmail.com', 'asdfadsfsfd'),
(30, 'admin', 'farhad@gmail.com', 'sdfdsdf'),
(31, 'admin', 'asdfasdf@gmail.com', 'asdfs'),
(32, 'admin', 'farhad@gmail.com', 'sadfdf'),
(33, 'admin', 'farhad@gmail.com', 'sdsfdsf'),
(34, 'admin', 'farhad@gmail.com', 'asdf'),
(35, 'admin', 'farhad@gmail.com', 'sdfsdf'),
(36, 'Ø´Ø§Ú©Ø±Ù‡', 'farhad@gmail.com', 'sdf'),
(37, 'admin', 'farhad@gmail.com', 'sfsdf'),
(38, 'admin', 'farhad@gmail.com', 'asdasda'),
(39, 'admin', 'farhad@gmail.com', 'sdssd');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

DROP TABLE IF EXISTS `withdrawal`;
CREATE TABLE IF NOT EXISTS `withdrawal` (
  `with_id` int(11) NOT NULL AUTO_INCREMENT,
  `with_pro_id` int(11) NOT NULL,
  `with_pro_author` varchar(255) NOT NULL,
  `with_buyer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `with_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`with_id`)
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`with_id`, `with_pro_id`, `with_pro_author`, `with_buyer_id`, `amount`, `with_date`, `status`) VALUES
(147, 5263, 'farhad', 27, 1, '2022-04-02 03:32:39', 'pending'),
(145, 5281, 'farhad', 27, 1, '2022-04-02 03:32:19', 'pending'),
(140, 5252, 'farhad', 27, 1, '2022-03-22 18:17:03', 'pending');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
