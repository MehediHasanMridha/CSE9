-- Adminer 4.8.1 MySQL 5.5.5-10.3.28-MariaDB-cll-lve dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(4,	'messi',	'1463ccd2104eeb36769180b8a0c86bb6'),
(5,	'mehedi',	'hasan');

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cla_no` int(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `action` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `class` (`id`, `cla_no`, `course_id`, `stu_id`, `action`) VALUES
(75,	1,	2,	26,	1);

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `file` (`id`, `name`, `roll`, `file`) VALUES
(16,	'Mehedi Hasan',	'19CSE022',	'upload/photo_2021-09-12_16-36-35.jpg');

DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cl` int(11) NOT NULL,
  `sir_no` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `emb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `record` (`id`, `cl`, `sir_no`, `url`, `emb`) VALUES
(5,	1,	1,	'',	'https://drive.google.com/file/d/1CHZkCUR5zBKnIKLpHS-1Ims3xmqqr3aK/preview\" width=\"640\" height=\"480\" allow=\"autoplay'),
(7,	1,	2,	'',	'');

DROP TABLE IF EXISTS `sir`;
CREATE TABLE `sir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sir` (`id`, `Name`, `email`, `number`, `dept`) VALUES
(12,	'Saleh Ahamed',	'sumon.edu@gmail.com',	1717487506,	'CSE'),
(13,	'Mrinal Kanti Baowaly',	'baowaly@gmail.com',	1913912066,	'CSE'),
(14,	'MD.Jamal Uddin',	'jamal.bsmrstu@gmail.com',	1734531900,	'CSE'),
(15,	'MD. Akkas Ali',	'akkas.buet@gmail.com',	1731336006,	'CSE');

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `number` int(255) NOT NULL,
  `dis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `student` (`id`, `username`, `roll`, `image`, `number`, `dis`) VALUES
(26,	'Mehedi Hasan',	'19CSE022',	'upload/ec498cf563.jpg',	1916813369,	'Madaripur'),
(29,	'Tahsin',	'19CSE051',	'upload/e93d37f502.jpg',	1786637479,	'Gopalgonj '),
(30,	'mdibuhossain',	'19CSE065',	'upload/7a3041abd2.jpg',	1941688233,	'Dhaka'),
(32,	'Turjo Rahman',	'19CSE034',	'upload/229b887ec2.jpg',	1751017412,	'Khulna '),
(33,	'Suman Mandol',	'19CSE021',	'upload/ae89b29afa.jpg',	1776422160,	'Madaripur'),
(34,	'Shofiqur',	'19CSE052',	'upload/5a6635c464.jpg',	1572016467,	'Madaripur'),
(35,	'Diptanshu_004',	'19CSE004',	'upload/71a91a3f90.jpg',	1648504604,	'KHULNA'),
(37,	'MANOSH RAY',	'19CSE057.',	'upload/120aa5779a.jpg',	1950512410,	'Khulna '),
(38,	'Sushamay Malakar',	'19CSE011',	'upload/e82755ccac.jpg',	1922180496,	'Khulna'),
(39,	'Ranjit Halder',	'19CSE020',	'upload/fd30b6a203.jpeg',	1521756844,	'Madaripur'),
(40,	'Md Mahmudul Hasan ',	'18CSE040',	'upload/58edc70501.png',	1862704970,	'Tangail, Dhaka, Bangladesh '),
(41,	'Redoy Kumar Das ',	'19CSE050',	'upload/2f3ed4e173.jpg',	1854286370,	'Bagerhat '),
(42,	'Himel Devnath',	'19CSE005',	'upload/d569a0b3d5.jpg',	1723820468,	'Naogaon'),
(43,	'Jonayet Hossain',	'19CSE025',	'upload/ede7e84d33.jpg',	1934209294,	'Cumilla'),
(44,	'Anik_Kumar',	'19CSE003',	'upload/6b0f82d3d3.jpg',	1744155760,	'Bogura'),
(45,	'Laylatun Nur Ananna',	'19CSE009',	'upload/0789843529.jpg',	1726854433,	'Faridpur '),
(46,	'Priya Akter',	'19CSE049',	'upload/640d166669.jpg',	1818558559,	'Madaripur '),
(47,	'Azizul_29',	'19CSE029',	'upload/84087d5c2d.jpg',	1834653560,	'Jamalpur '),
(48,	'Arnab Majumder',	'19CSE048',	'upload/3de4339a0d.png',	1842110895,	'Noakhali'),
(49,	'Shakline_1469',	'19CSE053',	'upload/ec9efc6d0f.jpg',	1735265349,	'Pabna'),
(50,	'Md Omor Faruk',	'19CSE056',	'upload/1160d71352.jpg',	1732641773,	'Cumilla');

-- 2021-09-26 16:57:50
