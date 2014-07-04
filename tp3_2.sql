-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2014-06-30 14:13:48
-- 服务器版本： 5.6.17
-- PHP Version: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tp3.2`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_login_log`
--

CREATE TABLE IF NOT EXISTS `admin_login_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL COMMENT '管理员ID',
  `times` int(10) NOT NULL COMMENT '登录时间',
  `ip` varchar(15) NOT NULL COMMENT '登录IP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员登录日志' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `admin_login_log`
--

INSERT INTO `admin_login_log` (`id`, `uid`, `times`, `ip`) VALUES
(4, 1, 1403505495, '127.0.0.1'),
(5, 1, 2118632145, '113.140.78.26'),
(6, 1, 1403574347, '127.0.0.1'),
(7, 1, 1403600969, '127.0.0.1'),
(8, 1, 1403668463, '127.0.0.1'),
(9, 1, 1403678489, '127.0.0.1'),
(10, 1, 1403745133, '127.0.0.1'),
(11, 1, 1403835045, '127.0.0.1'),
(12, 1, 1404092211, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `dm` char(4) NOT NULL COMMENT '随机字符串,密码二次加密',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '帐号状态,1正常,0禁用',
  `times` int(10) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `dm`, `status`, `times`) VALUES
(1, 'admin', 'd52c7dbbabf48174266f3358b4e0a4bf', 'OGTz', 0, 1111111111),
(2, 'ceshi', '', '', 0, 1),
(3, 'demo', '', '', 1, 0),
(4, '1', 'a8da1897f59c6947337c0921bae3a35d', 'qgOB', 0, 1403166145),
(5, '', '49ffcdbccb342bcf0abb924115b513e8', 'CPxt', 0, 1403166364),
(6, '12312365576', '7573b6b2d10732e5d31fea7b2d26376a', 'qXKo', 0, 1403166400),
(8, 'aaaaaaa', '2a5974cd8080eb6d231eecc0685243b1', 'qKna', 0, 1403237864),
(9, '77777777', '10f04762c016677d0f5d50d2065a12c0', 'dbfI', 0, 1403238218);

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_group`
--

CREATE TABLE IF NOT EXISTS `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `think_auth_group`
--

INSERT INTO `think_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '超级管理员', 1, '1,2');

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_group_access`
--

CREATE TABLE IF NOT EXISTS `think_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_auth_group_access`
--

INSERT INTO `think_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_rule`
--

CREATE TABLE IF NOT EXISTS `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(2) NOT NULL DEFAULT '1',
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `think_auth_rule`
--

INSERT INTO `think_auth_rule` (`id`, `type`, `name`, `title`, `status`, `condition`) VALUES
(9, 1, 'Admin/Index/index', '管理', 1, ''),
(10, 1, 'Admin/Index/del', '删除', 1, ''),
(11, 1, 'Admin/Index/del1', '删除1', 1, ''),
(12, 1, 'Admin/Index/del2', '删除2', 1, ''),
(13, 1, 'Admin/Index/del3', '删除3', 1, ''),
(14, 1, 'Admin/Index/del4', '删除4', 1, ''),
(15, 1, 'Admin/Index/del5', '删除5', 1, ''),
(16, 1, 'Admin/Index/del6', '删除6', 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
