-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2020 at 05:39 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meshi_muda`
--

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

DROP TABLE IF EXISTS `deals`;
CREATE TABLE IF NOT EXISTS `deals` (
  `id` mediumint(50) NOT NULL AUTO_INCREMENT,
  `strRestaurant` varchar(255) NOT NULL,
  `strDeal` varchar(255) NOT NULL,
  `strImage` varchar(255) NOT NULL,
  `nPrice` decimal(10,2) NOT NULL,
  `strWhen` varchar(255) NOT NULL,
  `strLocation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `strRestaurant`, `strDeal`, `strImage`, `nPrice`, `strWhen`, `strLocation`) VALUES
(1, 'Gojira', '20% off ramen', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.blueapron.com%2Frecipes%2F21508%2Fsquare_newsletter_images%2F1548708557-425-0064-6683%2F0521_2PV2_Snow-Pea-Ramen_5768_WEB_SQ_hi_res.jpg&f=1&nofb=1', '15.00', 'today', 'Vancouver'),
(2, 'Pizza Man', '$2 slices', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F960x960%2F4547323.jpg&f=1&nofb=1', '2.00', 'Friday', 'Vancouver'),
(6, 'Testraunt', '40% off', 'https://image.flaticon.com/icons/svg/763/763853.svg', '0.00', 'Today until close', 'Right here');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(50) NOT NULL AUTO_INCREMENT,
  `strEmail` varchar(255) NOT NULL,
  `strPassword` varchar(255) NOT NULL,
  `strCity` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `strEmail`, `strPassword`, `strCity`) VALUES
(1, 'jess@vanarts.com', '$2y$12$VWQLnZahfbYyq7PM9lIAyuIwN/N9L1kgVWgLJv.CCnQ5/k2RraNC.', 'Vancouver'),
(2, 'z@z.com', '$2y$10$InZx8e091SjjMvGZOTcrK.YiT5FACSEid81NuXpwXO9m97dne1/Q.', 'vancouver'),
(3, 'a@a.com', '$2y$10$DzHEwCCm271mq4e9cleQgu6xLnyJdW4TCIE/KymgyO.QM9ftGEToi', 'vancouver'),
(4, 'q@q.com', '$2y$10$oZfPmNjCQYRcljdKXHw.5eMyAMY5o7mj/WWQGGv.9nkeWYAM9JTMu', 'vancouver'),
(5, 'e@e.com', '$2y$10$lLgHHiyNA/gmIH6SeKfnCeDtxahxpoiTvFo2ynf9kxPgluweGDVbe', 'vancouver'),
(6, 'd@d.com', '$2y$10$llomfcTbCKsiwxUjC3lyo.JhwvdCIdo07uz5AxcvtCuDt0N8NLkaW', 'vancouver'),
(7, 'r@r.com', '$2y$10$d0nKB69t49j4hodPWzEc6eZuuaEQUi6sLlrmY/eiRDZtFfaNqM51K', 'vancouver'),
(8, 's@s.com', '$2y$10$Qfgq./1p/W6gB1l8aWm27OiSgzAo2.3aPb9709EHqBoFcK3qsRaqm', 'vancouver'),
(9, 'cindy@vanarts.com', '$2y$10$6k7y04dTDjaXfONH.akXf.ivGxdk5JDIS/dl7c.c4MLosUBH6gn/2', 'vancouver'),
(10, 'admin@vanarts.com', '$2y$10$FD.QTWDlaOdCikoA4CX2Ius8UVJ.6SQZeNBX4HbhzkDMgjql97DA6', 'Sydney'),
(11, 'toki@trouble.com', '$2y$10$Tva10PLv7dGsZddebrWvE.fUUtqj4Cs65SDFt63YAI4O/1veMpcaq', 'Sydney'),
(12, 'dev@vanarts.com', '$2y$10$/0GGbpm4Z6owiqDxgu881e0M6UeJ/HELAp8PnTYeT6zubSF3fJ.Kq', 'Los Angeles');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
