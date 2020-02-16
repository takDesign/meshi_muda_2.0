-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2020 at 07:57 AM
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
  `strWhen` varchar(255) NOT NULL,
  `strLocation` varchar(255) NOT NULL,
  `bAvailable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `strRestaurant`, `strDeal`, `strImage`, `strWhen`, `strLocation`, `bAvailable`) VALUES
(1, 'Gojira', '20% off ramen', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.blueapron.com%2Frecipes%2F21508%2Fsquare_newsletter_images%2F1548708557-425-0064-6683%2F0521_2PV2_Snow-Pea-Ramen_5768_WEB_SQ_hi_res.jpg&f=1&nofb=1', 'today', 'Vancouver', 1),
(2, 'Pizza Man', '$2 slices', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F960x960%2F4547323.jpg&f=1&nofb=1', 'Friday', 'Vancouver', 0),
(6, 'Testraunt', '40% off', 'https://image.flaticon.com/icons/svg/763/763853.svg', 'Today until close', 'Right here', 0),
(7, 'Testing Sold out', '50% off', 'https://image.flaticon.com/icons/svg/763/763853.svg', 'Today only', '55 Right here, Vancouver', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reset-password`
--

DROP TABLE IF EXISTS `reset-password`;
CREATE TABLE IF NOT EXISTS `reset-password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strEmail` varchar(50) NOT NULL,
  `strToken` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset-password`
--

INSERT INTO `reset-password` (`id`, `strEmail`, `strToken`) VALUES
(1, 'testemail', 'testtoken'),
(2, 'dev@vanarts.com', 'a5b6df1ac58312df29e41dbc6ca2071a'),
(3, 'dev@vanarts.com', 'a5b6df1ac58312df29e41dbc6ca2071a'),
(4, 'dev@vanarts.com', 'a5b6df1ac58312df29e41dbc6ca2071a'),
(5, 'jess@vanarts.com', '489c0ba6948fde43fd3825f237fb5e8a'),
(6, 'x@x.com', '85e4239ff9662bf8296083d98da17677'),
(7, 'php@vanarts.com', '35bbd3feb5ea22ddc0bf44aa130c15f4'),
(8, 'jessica.everington@gmail.com', 'beaca527b12f64fbd5358f454042828e'),
(9, 'dev@vanarts.com', 'a5b6df1ac58312df29e41dbc6ca2071a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(50) NOT NULL AUTO_INCREMENT,
  `strEmail` varchar(255) NOT NULL,
  `strPassword` varchar(255) NOT NULL,
  `strToken` varchar(255) NOT NULL,
  `strCity` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `strEmail`, `strPassword`, `strToken`, `strCity`) VALUES
(1, 'jess@vanarts.com', '$2y$12$VWQLnZahfbYyq7PM9lIAyuIwN/N9L1kgVWgLJv.CCnQ5/k2RraNC.', '', 'Vancouver'),
(2, 'z@z.com', '$2y$10$InZx8e091SjjMvGZOTcrK.YiT5FACSEid81NuXpwXO9m97dne1/Q.', '', 'vancouver'),
(3, 'a@a.com', '$2y$10$DzHEwCCm271mq4e9cleQgu6xLnyJdW4TCIE/KymgyO.QM9ftGEToi', '', 'vancouver'),
(4, 'q@q.com', '$2y$10$oZfPmNjCQYRcljdKXHw.5eMyAMY5o7mj/WWQGGv.9nkeWYAM9JTMu', '', 'vancouver'),
(5, 'e@e.com', '$2y$10$lLgHHiyNA/gmIH6SeKfnCeDtxahxpoiTvFo2ynf9kxPgluweGDVbe', '', 'vancouver'),
(6, 'd@d.com', '$2y$10$llomfcTbCKsiwxUjC3lyo.JhwvdCIdo07uz5AxcvtCuDt0N8NLkaW', '', 'vancouver'),
(7, 'r@r.com', '$2y$10$d0nKB69t49j4hodPWzEc6eZuuaEQUi6sLlrmY/eiRDZtFfaNqM51K', '', 'vancouver'),
(8, 's@s.com', '$2y$10$Qfgq./1p/W6gB1l8aWm27OiSgzAo2.3aPb9709EHqBoFcK3qsRaqm', '', 'vancouver'),
(9, 'cindy@vanarts.com', '$2y$10$6k7y04dTDjaXfONH.akXf.ivGxdk5JDIS/dl7c.c4MLosUBH6gn/2', '', 'vancouver'),
(10, 'admin@vanarts.com', '$2y$10$OtEWVRiy0lFFcXbkLwWMFO0Lg6blKMnO/BbfWGlPKVDTHe4xFqadq', '', 'Sydney'),
(11, 'toki@trouble.com', '$2y$10$Tva10PLv7dGsZddebrWvE.fUUtqj4Cs65SDFt63YAI4O/1veMpcaq', '', 'Sydney'),
(12, 'dev@vanarts.com', '$2y$10$H.CA5FmJU.X30A6x4Fjtg.spfNjKo7ZowuupBohs1GgJ0FQ3rtusq', '', 'Los Angeles'),
(13, 'php@vanarts.com', '$2y$10$sTAIWpOk2mxjtnuxGF9qMuZAWW2BIsXNtgmfIpXom0xQwKRUeukFy', '', 'Helsinki');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
