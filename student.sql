create database student;
-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 
-- 服务器版本: 5.5.53
-- PHP 版本: 7.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `student`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `money` decimal(8,2) DEFAULT NULL,
  `face` varchar(200) DEFAULT 'dirname(__FILE__).''upload/12.jpg''',
  `info` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stu_num` (`number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `number`, `email`, `money`, `face`, `info`) VALUES
(2, '赵辰', 123, '935216290@163.com', '300.00', './uploads/860b735bf285eb0f1d512de1544e772c.jpg', 'hahahhah'),
(4, '晨晨', 789, '1230@163.com', '900.00', './uploads/98c1f14207201d9904a1da63f9008e8c.png', 'hahahhah干活干活干活干活'),
(5, 'zc', 8020, '935216290@163.com', '200.00', './uploads/f5be67f2278cf4494fd783a88c5909c8.jpg', 'wo d  djiansj'),
(7, '鼠标', 456, '935216290@163.com', '200.00', './uploads/d02dfe4816223503f6964b2b17928204.jpg', '48789');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
