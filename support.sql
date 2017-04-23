-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2017 at 02:52 PM
-- Server version: 5.5.52-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sibaspag_support`
--

-- --------------------------------------------------------

--
-- Table structure for table `sp_tickets`
--

CREATE TABLE IF NOT EXISTS `sp_tickets` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` text NOT NULL,
  `t_desc` text NOT NULL,
  `t_sts` varchar(100) NOT NULL,
  `t_pri` varchar(100) NOT NULL,
  `t_cre` varchar(225) NOT NULL,
  `t_dt` varchar(225) NOT NULL,
  `t_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `sp_tickets`
--

INSERT INTO `sp_tickets` (`t_id`, `t_name`, `t_desc`, `t_sts`, `t_pri`, `t_cre`, `t_dt`, `t_status`) VALUES
(17, 'Ready all the folder structure and common setups for SOP app', 'Need to set up the backend folder structure and create a MVC architecture. And for front end create default filters and Classes to work comfortably and easy to maintaince.', 'close', 'urgent', 'Sibaram Sahu', '2016-09-22', 1),
(18, 'Logo for fit all device and color', 'Make some logo which has fit to all devices and visible on every variant of colors', 'close', 'high', 'Sibaram Sahu', '2016-09-22', 1),
(19, 'Landing page', 'Make a stunning landing page having good UX . User has easy to search their address & location.', 'close', 'high', 'Sibaram Sahu', '2016-09-23', 1),
(20, 'Plan the Pre-Signed in pages', 'Plan all the pre signed in pages i.e about, contact etc.', 'close', 'urgent', 'Sibaram Sahu', '2016-10-02', 1),
(21, 'Create the client side setup', 'Setup in client side i.e filter, services etc which help to easily play with the objects and their representation.', 'open', 'medium', 'Sibaram Sahu', '2016-09-20', 1),
(22, 'Create the server side setup', 'Design an architecture to easily manage the backend calls, security, data etc', 'open', 'medium', 'Sibaram Sahu', '2016-09-20', 1),
(23, 'Find the Plugins and libraries to be used', 'Search and list the number of plugins and libraries to be used in SOP. List out it and  put all the links here.', 'close', 'urgent', 'Sibaram Sahu', '2016-09-23', 1),
(24, 'Create a use case', 'Plan out all the flow and Use cases, User also the data flow.', 'close', 'urgent', 'Sibaram Sahu', '2016-09-21', 1),
(25, 'Make a theme', 'Create a theme for the SOP application', 'close', 'low', 'Sibaram Sahu', '2016-10-02', 1),
(26, 'Wireframe for the user home page', 'Make a wire frame for the home page for the user which contains their info like room no, facilities, contact etc.', 'close', 'high', 'Sibaram Sahu', '2016-09-23', 1),
(27, 'Make a stunning search', 'The search must be user friendly and easy to search the PG location.', 'open', 'high', 'Sibaram Sahu', '2016-09-23', 1),
(28, 'Use Google map API', 'For locate the PG use Google map API and try to find multiple location.', 'open', 'medium', 'Sibaram Sahu', '2016-09-23', 1),
(29, 'Make Get and Post call', 'Create GET & POST call for client side', 'close', 'medium', 'Sibaram Sahu', '2016-10-02', 1),
(30, 'Search in main page issue', 'After search in the main page if press enter It''s not showing the selected City and Address.', 'open', 'high', 'Sibaram Sahu', '2016-10-02', 1),
(31, 'Login and enter into dashboard', 'The user and admin Login and enter into the dashboard of their own.', 'open', 'urgent', 'Sibaram Sahu', '2016-10-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sp_user`
--

CREATE TABLE IF NOT EXISTS `sp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(225) NOT NULL,
  `pas` varchar(225) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `sts` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sp_user`
--

INSERT INTO `sp_user` (`id`, `usr`, `pas`, `name`, `email`, `sts`) VALUES
(1, '@siba', 'a1617648803cd269896c6455172a1b5c', 'Sibaram Sahu', 'sibascodeking@gmail.com', 1),
(2, '@gyana', '903accf37b71fbef5bbf161e0631845c', 'Gyanaranjan Das', 'gyana@gmail.com', 1),
(3, '@rajib', 'cc116e61249e970c17253f594f1310ca', 'Rajib Nanda', 'rajivnanda100@gmail.com', 1),
(4, '@abhinav', 'd5f724a02cfea5b487a8f0e6862a1c72', 'Abhinav Singh', 'abhinavsinghj@gmail.com\r\n', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
