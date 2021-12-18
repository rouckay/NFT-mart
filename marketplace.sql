-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2021 at 06:35 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `background_img`
--

INSERT INTO `background_img` (`id`, `name`, `wallpaper`, `status`) VALUES
(12, 'Car', 'car.png', 'publish');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `cat_total_pro`, `status`, `created_at`, `created_by`) VALUES
(17, 'Please Do It Someting', 'ØµØ¨Ø± Ù†Ùˆ.png', 0, 'draft', 'Aug 8, 2021at02: 11 AM', 'Farhad'),
(16, 'Art', 'foolish.png', 0, 'publish', 'Aug 8, 2021at03: 17 PM', 'farhad Rahmani'),
(14, 'NFT Red Boll', 'redboll.png', 0, 'publish', 'Aug 8, 2021at03: 15 PM', 'farhad Rahmani'),
(15, 'NFT 0,1', '0_SICbXxSTd3yC_yMK.png', 0, 'publish', 'Aug 8, 2021at03: 15 PM', 'farhad Rahmani'),
(23, 'Cat cat', 'PngItem_4448897.png', 0, 'draft', 'Aug 8, 2021at10: 44 AM', 'Farhad');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

DROP TABLE IF EXISTS `favourite`;
CREATE TABLE IF NOT EXISTS `favourite` (
  `fav_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  PRIMARY KEY (`fav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`fav_id`, `pro_id`, `mem_id`) VALUES
(50, 33, 26),
(49, 33, 27);

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `mem_name`, `mem_user_name`, `mem_image`, `mem_email`, `mem_pass`, `created_at`) VALUES
(26, 'farhad', 'farhad', 'developers-x2.png', 'farhad@gmail.com', '$2y$10$3paz2wF/HUbwNJZC26sFVeoixkbxKpiqWAst/CRu.pUNiGYsK8/T6', 'Aug 8, 2021at10:00 PM'),
(24, 'wardaddd', 'asdf', 'nft-non-fungible-token-nft-text-nft-logo-non-fungible-token-poster-new-digital-currency-digital-art-transaction-illustration-background-vector.jpg', 'aaa@gmail.com', '$2y$10$Ipyl/cw5J4Ea68IVE8eNY.5jUIn0QV6xdirWUa7n12369QPwlrX1.', 'Aug 8, 2021at10:23 AM'),
(27, 'admin', 'admin', 'games-tf2.png', 'khan@gmail.com', '$2y$10$rua4GReCojVmLHmYECHqYu4zkGtGUys1rGC3mhx2v4JieG4JH1kqy', 'Aug 8, 2021at12:49 PM');

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_cover_photo`
--

INSERT INTO `member_cover_photo` (`cover_id`, `cover_image`, `mem_user_name`) VALUES
(26, 'fourth.jpg', 'asdf'),
(28, 'marketplace-x2.png', 'admin'),
(25, 'teahub.io-airport-wallpaper-645168.png', 'WARDAK'),
(23, '418539.jpg', 'WARDAK'),
(24, 'a1511934697_verybig_1571906621.png', '123'),
(22, 'cscu3_1602589061.png', 'farhad');

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mem_products`
--

INSERT INTO `mem_products` (`mem_pro_id`, `mem_pro_name`, `mem_pro_detail`, `mem_pro_image`, `category_id`, `tag`, `at`, `author`, `pro_views`, `price`, `status`, `mem_fav_pro`) VALUES
(29, 'Check Name yes', 'yteeee', 'games-dota2.png', 16, 'ass', 'Aug 8, 2021at11: 16 PM', 'asdf', 0, 30002222, 'publish', 'asdf_fav'),
(32, 'Betterfuly', 'New Relase Token By The Google Developers', 'social-defi.png', 16, 'gaming', 'Aug 8, 2021at05: 16 PM', 'admin', 0, 4554, 'publish', '-1_fav'),
(13, 'First member Product', 'sdf', 'pngfind.com-pliers-png-5469400.png', 16, 'sdd', 'Aug 8, 2021at06: 59 AM', 'uploaderwardak', 0, 3000222, 'publish', ''),
(14, 'First member Product', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, pariatur eius? Natus aperiam incidunt impedit dolore odio sint debitis! Rem laborum, earum placeat voluptatum necessitatibus aliquid voluptatem laboriosam ullam ducimus?', 'pngfind.com-pliers-png-5469400.png', 14, 'sdf', 'Aug 8, 2021at07: 03 AM', 'uploaderwardak', 0, 30000, 'publish', 'farhad_fav'),
(15, 'First member Product', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, pariatur eius? Natus aperiam incidunt impedit dolore odio sint debitis! Rem laborum, earum placeat voluptatum necessitatibus aliquid voluptatem laboriosam ullam ducimus?', 'ezgif.com-gif-maker.gif', 16, 'sdfssdf', 'Aug 8, 2021at07: 08 AM', 'uploaderwardak', 0, 30000, 'publish', ''),
(16, 'First member Product', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, pariatur eius? Natus aperiam incidunt impedit dolore odio sint debitis! Rem laborum, earum placeat voluptatum necessitatibus aliquid voluptatem laboriosam ullam ducimus?', 'pngfind.com-pliers-png-5469400.png', 16, 'sdf', 'Aug 8, 2021at07: 09 AM', 'uploaderwardak', 0, 30000, 'publish', ''),
(17, 'First member Product', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, pariatur eius? Natus aperiam incidunt impedit dolore odio sint debitis! Rem laborum, earum placeat voluptatum necessitatibus aliquid voluptatem laboriosam ullam ducimus?', 'pngfind.com-pliers-png-5469400.png', 16, 'SDFSD', 'Aug 8, 2021at07: 09 AM', 'uploaderwardak', 0, 30000, 'publish', ''),
(18, 'University Branding', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, pariatur eius? Natus aperiam incidunt impedit dolore odio sint debitis! Rem laborum, earum placeat voluptatum necessitatibus aliquid voluptatem laboriosam ullam ducimus?asdf', 'omr-3723132_1920.jpg', 16, 'Education', 'Aug 8, 2021at07: 23 AM', 'uploaderwardak', 0, 30000, 'publish', 'asdf_fav'),
(19, 'Wardak products', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, pariatur eius? Natus aperiam incidunt impedit dolore odio sint debitis! Rem laborum, earum placeat voluptatum necessitatibus aliquid voluptatem laboriosam ullam ducimus?', 'NicePng_tounge-png_3095988.png', 14, 'warddd', 'Aug 8, 2021at07: 26 AM', 'uploaderwardak', 0, 30000, 'publish', ''),
(20, 'Wardak Second product', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, pariatur eius? Natus aperiam incidunt impedit dolore odio sint debitis! Rem laborum, earum placeat voluptatum necessitatibus aliquid voluptatem laboriosam ullam ducimus?', 'NicePng_tounge-png_3095988.png', 16, 'artin', 'Aug 8, 2021at07: 26 AM', 'Check User name', 0, 30002222, 'publish', ''),
(21, 'First member', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, pariatur eius? Natus aperiam incidunt impedit dolore odio sint debitis! Rem laborum, earum placeat voluptatum necessitatibus aliquid voluptatem laboriosam ullam ducimus?', 'pngfind.com-pliers-png-5469400.png', 16, 'art', 'Aug 8, 2021at07: 31 AM', 'Check User name', 0, 30000, 'publish', ''),
(22, 'Greate test', 'sdf', 'NicePng_tounge-png_3095988.png', 14, 'arting', 'Aug 8, 2021at09: 11 AM', 'Check User name', 0, 30000, 'publish', 'asdf_fav'),
(24, 'Car', 'lorem ', 'kisspng-vacuum-cleaner-carpet-cleaning-cleaning-products-5acce7bab53776.3296978615233781067423.png', 14, 'art', 'Aug 8, 2021at09: 05 PM', 'asdf', 0, 65555, 'publish', 'asdf_fav'),
(25, 'favourite', 'Greate Detail', 'blockchain-x2.png', 16, 'talk', 'Aug 8, 2021at10: 37 PM', 'farhad', 0, 123333, 'publish', 'asdf_fav'),
(33, 'Awesome Skin', 'New Relase Token By The Google Developers', 'mobile2.png', 14, 'gaming', 'Aug 8, 2021at05: 20 PM', 'admin', 0, 64443, 'publish', '-1_fav'),
(31, 'Google Token', 'New Relase Token By The Google Developers', 'mobile-v2.png', 15, 'Gaming', 'Aug 8, 2021at12: 52 PM', 'admin', 0, 6323, 'publish', 'fav'),
(30, 'text', 'textee', 'dpayments.png', 14, 'sdf', 'Aug 8, 2021at07: 55 AM', 'asdf', 0, 30002222, 'publish', 'asdf_fav');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mem_social_profiles`
--

INSERT INTO `mem_social_profiles` (`social_id`, `facebook`, `twitter`, `google`, `behance`, `dribbble`, `mem_id`) VALUES
(1, 'www.facebook.com/BCSTricks', 'www.twitter.com/BCSTricks', 'www.google.com/BCSTricks', 'www.behance.comBCSTricks', 'www.dribbble.comBCSTricks', 0),
(2, 'www.facebook.com/ahmadi', 'www.twitter.com/ahmadi', 'www.google.com/ahmadi', 'www.behance.comahmadi', 'www.dribbble.comahmadi', 22),
(3, 'www.facebook.com/BCSTricks', 'www.twitter.com/BCSTricks', 'www.google.com/BCSTricks', 'www.behance.com/BCSTricks', 'www.dribbble.com/BCSTricks', 21),
(9, 'https://facebook.com/Adminian', 'https://twitter.com/Adminian', 'https://google.com/Adminian', 'https://behance.com/Adminian', 'www.dribbble.com/Adminian', 27);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_user_name` varchar(255) NOT NULL,
  `msg_user_email` varchar(255) NOT NULL,
  `msg_detail` varchar(255) NOT NULL,
  `msg_date` varchar(255) NOT NULL,
  `msg_status` varchar(255) NOT NULL DEFAULT 'pendding',
  `msg_state` int(11) NOT NULL DEFAULT '0',
  `reciever` int(11) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `msg_user_name`, `msg_user_email`, `msg_detail`, `msg_date`, `msg_status`, `msg_state`, `reciever`) VALUES
(5, 'farhad', 'farhad@gmail.com', 'Thank you for Recieving My Messages ', 'Aug 8, 2021at10: 30 PM', 'pendding', 0, 27),
(6, 'farhad', 'farhad@gmail.com', 'Great Working', 'Aug 8, 2021at10: 38 PM', 'pendding', 0, 27),
(7, 'admin', 'khan@gmail.com', 'hello how are you ASDF What is this name ha ?', 'Aug 8, 2021at11: 25 PM', 'pendding', 0, 24),
(8, 'admin', 'khan@gmail.com', 'I am Admin I happy To message With You Dear', 'Aug 8, 2021at11: 27 PM', 'pendding', 0, 24);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
