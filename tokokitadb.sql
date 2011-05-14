-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 13, 2011 at 11:02 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `tokokitadb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `categories`
-- 

CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `categories`
-- 

INSERT INTO `categories` (`id`, `name`, `permalink`, `description`) VALUES 
(1, 'Komputer dan Internet', 'komputer-dan-internet', 'Ini adalah kategori buku komputer'),
(4, 'Pengetahuan', 'pengetahuan', 'Ini kategori pengetahuan umum');

-- --------------------------------------------------------

-- 
-- Table structure for table `pages`
-- 

CREATE TABLE `pages` (
  `id` int(11) NOT NULL auto_increment,
  `permalink` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `pages`
-- 

INSERT INTO `pages` (`id`, `permalink`, `title`, `body`, `status`) VALUES 
(1, 'judul-halaman', 'Judul Halaman', 'Isi halaman', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `products`
-- 

CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `sku` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `products`
-- 

INSERT INTO `products` (`id`, `sku`, `name`, `permalink`, `price`, `description`, `stock`, `status`, `category_id`) VALUES 
(1, '345345', 'Buku PHP', 'buku-php', 500005, 'Ini adalah deskripsi.. f\r\n', 5, 1, 1),
(2, '64576435', 'Buku Java EE', 'buku-java-ee', 75000, 'Ini adalah buku Java', 3, 1, 4);

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `email`, `password`, `full_name`, `address`, `phone`, `level`, `status`) VALUES 
(1, 'admin@gie-art.com', '21232f297a57a5a743894a0e4a801fc3', 'sugiarto', 'Jl Tamansiswa, Yogyakarta', '54674573', 1, 1),
(2, 'agie0925@gmail.com', '202cb962ac59075b964b07152d234b70', 'Agie', 'Yogyakarta', '356363', 0, 1);
