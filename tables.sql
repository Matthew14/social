-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 172.16.4.118
-- Generation Time: Jul 15, 2013 at 02:17 PM
-- Server version: 5.0.83
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db1280529_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE IF NOT EXISTS `friendships` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(50) NOT NULL,
  `friend` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photoAlbum`
--

CREATE TABLE IF NOT EXISTS `photoAlbum` (
  `id` int(11) NOT NULL auto_increment,
  `owner` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL auto_increment,
  `album` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `userDetail`
--

CREATE TABLE IF NOT EXISTS `userDetail` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL default '''''',
  `email` varchar(50) NOT NULL default '''''',
  `firstName` varchar(50) NOT NULL default '''''',
  `surname` varchar(50) NOT NULL default '''''',
  `picture` varchar(50) NOT NULL default 'images/default.png',
  `about` varchar(5000) NOT NULL default '''''',
  `dob` date NOT NULL,
  `gender` varchar(8) NOT NULL default '''''',
  `location` varchar(50) NOT NULL default '''''',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `usertype` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
