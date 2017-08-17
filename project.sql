-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.iheardyouharvard.com
-- Generation Time: Dec 08, 2013 at 08:38 AM
-- Server version: 5.1.53
-- PHP Version: 5.4.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `iheardyouharvard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `number` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `message` varchar(70) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`number`, `subject`, `message`) VALUES
(1, 'hi', 'hi'),
(2, 'test 2', 'test 2'),
(3, 'this is an email', 'this is an email'),
(4, 'hi', 'hi'),
(5, 'hello', 'hello'),
(6, 'hi', 'hi\r\n'),
(7, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `heardby` varchar(50) NOT NULL,
  `story` text NOT NULL,
  `verified` varchar(5) NOT NULL DEFAULT 'false',
  `count` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `upvotes` int(10) unsigned NOT NULL,
  `downvotes` int(10) unsigned NOT NULL,
  UNIQUE KEY `count` (`count`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `title`, `location`, `heardby`, `story`, `verified`, `count`, `upvotes`, `downvotes`) VALUES
(1, 'Don''t rage and write', 'Sever entrance', 'Sorry bout your paper tho', 'Girl: I read the essay that I submitted in *rage* last night. It''s pretty bad.', 'true', 1, 3, 0),
(0, 'Thank you, joke ticket', 'Annenberg', 'Amen', 'Guy: Shout out to Sam and Gus for this tomato basil ravioli!', 'true', 2, 4, 0),
(2, 'Maybe Zuckerberg just likes crimson?', 'CS50 hackathon', 'Fellow CS50 cult member', 'Guy (after seeing fake tweets from Zuckerberg on the monitor): That''s not the real Zuckerberg. You really think someone who dropped out of Harvard is gonna make their twitter handle @Crimson?', 'true', 3, 3, 1),
(1, 'Since when can CS jokes be vulgar?', 'CS50 Hackathon', 'Please be talking about a CS project', 'Guy 1: I did the back end. Time to do the front end.<br/>\r\nGuy 2: Yeah, letâ€™s do some front end!', 'false', 4, 0, 0),
(1, 'Um, TMI?', 'Dorm bathroom', 'Mine too', 'Girl: My boobs hurt!', 'false', 5, 0, 0),
(1, '// Title of story', '// Location of story', '// Heard by person', '// Story', 'false', 6, 2, 0),
(1, '// Example', '// Example', '// Example', '// Example', 'false', 7, 4, 0),
(3, '// example 2', '// example 2', '// example 2', '// example 2', 'false', 8, 2, 0),
(4, 'hi', 'hi', 'hi', 'hi', 'false', 9, 1, 0),
(4, 'yo', 'yo', 'yo', 'yo', 'false', 10, 1, 0),
(1, 'test', 'test', 'test', 'test', 'false', 11, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`) VALUES
(1, 'test', '$1$YKk20mnF$VQw0P7PXRU945fLRdsH6e/'),
(2, 'admin', '$1$SuDkIm8P$aHd1gotOZ6vV9yg5iSJp0.'),
(3, 'test2', '$1$X0eRo85Z$sfVsTt62qtQD7.rVM2uRO.'),
(4, 'test3', '$1$1U0DqY9B$uWO5ezZG1m9.zl7gZsjz20');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE IF NOT EXISTS `voting` (
  `id` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL,
  `upvotes` varchar(3) NOT NULL DEFAULT 'no',
  `downvotes` varchar(3) NOT NULL DEFAULT 'no',
  `favorite` varchar(3) NOT NULL DEFAULT 'no',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`id`, `count`, `upvotes`, `downvotes`, `favorite`) VALUES
(1, 7, 'yes', 'no', 'no'),
(1, 7, 'no', 'no', 'no'),
(1, 6, 'yes', 'no', 'no'),
(1, 3, 'yes', 'no', 'no'),
(1, 2, 'yes', 'no', 'no'),
(1, 1, 'yes', 'no', 'no'),
(1, 1, 'yes', 'no', 'no'),
(1, 3, 'yes', 'no', 'no'),
(2, 7, 'yes', 'no', 'no'),
(2, 7, 'no', 'no', 'no'),
(2, 6, 'yes', 'no', 'no'),
(2, 3, 'yes', 'no', 'no'),
(2, 3, 'yes', 'no', 'no'),
(2, 3, 'yes', 'no', 'no'),
(2, 3, 'yes', 'no', 'no'),
(2, 3, 'no', 'no', 'no'),
(3, 7, 'yes', 'no', 'no'),
(3, 8, 'no', 'no', 'no'),
(3, 8, 'yes', 'no', 'no'),
(3, 7, 'no', 'no', 'no'),
(3, 8, 'no', 'no', 'yes'),
(3, 7, 'no', 'no', 'yes'),
(3, 2, 'no', 'no', 'yes'),
(3, 1, 'yes', 'no', 'no'),
(3, 2, 'no', 'no', 'no'),
(3, 3, 'no', 'no', 'yes'),
(3, 2, 'yes', 'no', 'no'),
(4, 2, 'yes', 'no', 'no'),
(4, 1, 'yes', 'no', 'no'),
(4, 3, 'yes', 'no', 'no'),
(4, 1, 'no', 'yes', 'no'),
(4, 8, 'no', 'no', 'yes'),
(4, 7, 'no', 'no', 'yes'),
(4, 3, 'no', 'no', 'yes'),
(1, 8, 'no', 'no', 'yes'),
(1, 3, 'no', 'no', 'yes'),
(1, 1, 'no', 'no', 'yes'),
(1, 8, 'yes', 'no', 'no'),
(1, 8, 'no', 'yes', 'no'),
(1, 1, 'no', 'yes', 'no'),
(1, 2, 'no', 'no', 'yes'),
(4, 7, 'no', 'yes', 'no'),
(4, 8, 'no', 'yes', 'no'),
(4, 3, 'no', 'yes', 'no'),
(4, 7, 'yes', 'no', 'no'),
(4, 9, 'yes', 'no', 'no'),
(4, 2, 'no', 'yes', 'no'),
(1, 10, 'no', 'no', 'yes'),
(1, 6, 'no', 'no', 'yes'),
(1, 10, 'yes', 'no', 'no'),
(1, 6, 'no', 'yes', 'no'),
(4, 2, 'no', 'no', 'yes'),
(2, 2, 'yes', 'no', 'no'),
(2, 3, 'no', 'no', 'yes'),
(1, 3, 'no', 'yes', 'no');

