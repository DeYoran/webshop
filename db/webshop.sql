-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 25 apr 2013 om 11:11
-- Serverversie: 5.5.16
-- PHP-Versie: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webshop`
--
CREATE DATABASE `webshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webshop`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `login_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Gegevens worden uitgevoerd voor tabel `logins`
--

INSERT INTO `logins` (`login_id`, `username`, `password`) VALUES
(1, 'root@gmail.com', 'geheim'),
(2, 'administrator@gmail.com', 'geheim'),
(3, 'customer@gmail.com', 'geheim'),
(4, 'adruijter@gmail.com', 'geheim'),
(5, 'lskdj', 'sglkj'),
(6, 'h.van.straaten@gmail.com', 'geheim'),
(7, 'b.de.boer@gmail.com', 'geheim'),
(8, 'jsdflkj', 'lksjd'),
(9, 'lkjsdflkj', 'lkjsdflkj'),
(10, 'lkjsdflkj', 'lkjsdf'),
(11, 'tas@gamil.com', 'geheim'),
(12, 'adruijter@gmail.com', 'geheim'),
(13, 'test@gmail.com', 'geheim'),
(14, 'adruijter@gmail.com', 'geheim'),
(15, 'bert@gmil.com', '123geheim'),
(16, 'johan@gmail.com', 'geheim'),
(17, 'jaap@gmail.com', 'geheim'),
(18, 'q', 'q'),
(19, 'q', 'q'),
(20, 'q', 'q'),
(21, 'bert@gmail.com', 'geheim');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` float NOT NULL,
  `foto_name` varchar(200) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Gegevens worden uitgevoerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `foto_name`) VALUES
(1, 'wortelen', 'amsterdamse bak wortelen', 3.2, 'wortel.jpg'),
(2, 'artisjokken', 'artisjokken uit de provence', 8.5, 'artisjok.jpg'),
(3, 'courgettes', 'courgettes', 1.2, 'courgette.jpg'),
(4, 'pompoen', 'pompoen rood', 1.2, 'pompoen.jpg'),
(5, 'chinese kool', 'kool uit China', 2.4, 'chinese-kool.jpg'),
(6, 'radicchio', 'rode sla', 2.45, 'radicchio.jpg'),
(7, 'andijvie', 'gebleekte andijvie', 2.1, 'andijvie.jpg'),
(8, 'lollo-rosso', 'rode lollo rosso uit Italie', 4.23, 'lollo-rosso.jpg'),
(9, 'spinazie', 'groene lentespinazie. Heerlijk met en eitje', 2.45, 'spinazie.jpg'),
(10, 'rode kool', 'lekkere rode kool en gezond', 8.23, 'rode-kool.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `userroles`
--

CREATE TABLE IF NOT EXISTS `userroles` (
  `userrole_id` int(10) NOT NULL,
  `role` enum('root','administrator','customer') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `userroles`
--

INSERT INTO `userroles` (`userrole_id`, `role`) VALUES
(1, 'root'),
(2, 'administrator'),
(3, 'customer'),
(4, 'administrator'),
(5, 'administrator'),
(6, 'customer'),
(7, 'customer'),
(8, 'customer'),
(9, 'customer'),
(10, 'root'),
(11, 'root'),
(12, 'customer'),
(13, 'administrator'),
(20, 'customer'),
(21, 'customer');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `infix` varchar(50) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `street` varchar(250) NOT NULL,
  `housenumber` varchar(10) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `residence` varchar(100) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `mobilephonenumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `infix`, `surname`, `street`, `housenumber`, `zipcode`, `residence`, `phonenumber`, `mobilephonenumber`) VALUES
(1, 'root', 'de', 'root', '', '', '', '', '', ''),
(2, 'admin', 'de', 'admin', '', '', '', '', '', ''),
(3, 'customer', 'de', 'customer', '', '', '', '', '', ''),
(4, 'Arjan', 'de', 'Ruijter', '', '', '', '', '', ''),
(6, 'Hansje', 'van', 'Straten', '', '', '', '', '', ''),
(7, 'Frank', 'de', 'Boer', '', '', '', '', '', ''),
(13, 'Francien', '', 'Holscher', '', '', '', '', '', ''),
(19, 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q'),
(20, 'Harry', 'van', 'Velzen', 'q', 'q', 'q', 'q', 'q', 'q'),
(21, 'Bert', 'de', 'Vries', 'Bert de Vriesstraat', '12', '1901CV', 'Castricum', '12345678910', '12345678910');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
