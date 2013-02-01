-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2013 at 11:04 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`productID`),
  UNIQUE KEY `img` (`img`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `price`, `text`, `img`, `active`, `featured`, `updated`) VALUES
(4, 'SRT Viper GTS', 122390.00, 'The SRT Viper (formerly known as the ''Dodge Viper'' prior to the 2013 model year) is a V10-powered sports car, manufactured by the Dodge division of Chrysler. ', '2013-srt-viper-gts-f.jpg', 1, 1, '2013-01-27 22:29:24'),
(5, 'Porsche 911 Turbo S Cabriolet ', 172100.00, 'The Porsche 911 is the flagship of the current line up of Porsche. It is a two-door grand tourer made by Porsche AG of Stuttgart, Germany. ', 'porschenormal.jpg', 1, 1, '2013-01-27 22:29:30'),
(6, 'Ferrari 458 Italia', 229825.00, 'The Ferrari 458 Italia is a mid-engined sports car produced by the Italian sports car manufacturer Ferrari.', 'ferrari_458_02.jpg', 1, 1, '2013-01-27 22:29:18'),
(7, 'Audi R8 GT Spyder', 210300.00, 'The Audi R8 GT Spyder is a mid-engine, 2-seater sports car which uses Audi''s trademark Quattro permanent all-wheel drive system. Only 333 were produced in this trim.', '2012-Audi-R8-GT-Spyder.jpg', 1, 0, '2013-01-27 21:17:30'),
(8, 'Bugatti Veyron Super Sport', 2400000.00, 'The Bugatti Veyron EB 16.4 is a mid-engined grand touring car, designed and developed by the Volkswagen Group and manufactured in Molsheim, France by Bugatti Automobiles S.A.S. The Super Sport version of the Veyron is the fastest street-legal production car in the world, with a top speed of 431.072 km/h (267.856 mph).', 'bugatti-veyron-super-sports.jpg', 1, 0, '2013-01-27 21:31:58'),
(9, 'Saleen S7 Twin Turbo', 555000.00, 'The Saleen S7 is a limited-production, hand-built, high-performance American supercar, the only car produced by Saleen not based on an existing chassis. ', 'saleen-s7-twin-turbo.jpg', 1, 0, '2013-01-27 21:37:34'),
(10, 'Gumpert Apollo Sport', 450000.00, 'The Gumpert Apollo is a sports car produced by German automaker Gumpert Sportwagenmanufaktur GmbH in Altenburg. Gumpert ended business endeavors in August of 2012, after undergoing bankruptcy.', 'gumpert-apollo-sport.jpg', 1, 0, '2013-01-27 22:23:10'),
(11, 'Hennessey Venom GT ', 1000000.00, 'On January 21, 2013, the Venom GT set a new Guinness World Record for an average 0-300 km/h acceleration time of 13.63 seconds, after hitting 186 miles per hour speed, making it the quickest production car in the world.', 'Hennessey-Venom-GT.jpg', 1, 0, '2013-01-27 22:23:10'),
(12, 'Lamborghini Aventador LP 700-4', 387000.00, 'The Lamborghini Aventador LP 700-4 is a two-door, two-seater sports car publicly unveiled by Lamborghini at the Geneva Motor Show on 28 February 2011. Production will be limited to 4,000 units. The Aventador LP 700-4 uses Lamborghini''s new 700 PS (510 kW; 690 bhp) 6.5 liter 60 degree V12 engine. Known internally as the L539, the new engine is Lamborghini''s fourth in-house engine and second V12.', 'lambo_aventador.jpg', 1, 0, '2013-01-28 01:37:13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
