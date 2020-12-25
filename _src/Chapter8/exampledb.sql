-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- होस्ट: localhost
-- समय पर बनाया: 02 नवम्बर, 2010 को 10:15 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
--  डाटाबेस: `exampledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `cityName` varchar(32) NOT NULL,
  `cityRating` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `cityName`, `cityRating`) VALUES
(1, 'Udaipur', 71),
(2, 'Leh', 55),
(3, 'Mahabaleshwar', 28),
(4, 'Mount Abu', 31),
(5, 'Rishikesh', 15),
(6, 'Hampi', 81),
(7, 'Matheran', 29),
(8, 'Manali', 85),
(9, 'Mysore', 33),
(10, 'Jaipur', 55),
(11, 'Munnar', 89),
(12, 'Bangalore', 66),
(13, 'Wayanad', 42),
(14, 'Amritsar', 29),
(15, 'Gangtok', 69),
(16, 'Havelock Islands', 27),
(17, 'DharamShala', 57),
(18, 'Kashmir', 78),
(19, 'Tirupati', 22),
(20, 'Goa', 75);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(16) NOT NULL,
  `middleName` varchar(16) NOT NULL,
  `lastName` varchar(16) NOT NULL,
  `mobileNumber` varchar(16) NOT NULL,
  `phoneNumber` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstName`, `middleName`, `lastName`, `mobileNumber`, `phoneNumber`, `email`, `website`) VALUES
(1, 'Vijay', '', 'Joshi', '+91-8080646789', '05964223715', 'vijay@someserver.com', 'http://vijayjoshi.org'),
(2, 'Some', 'Middle', 'Name', '9729482784', '0374927293', 'test@test.com', 'http://testsite.com');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryName` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `countryName`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `functions`
--

CREATE TABLE IF NOT EXISTS `functions` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `languageId` int(11) NOT NULL,
  `functionName` varchar(64) NOT NULL,
  `summary` varchar(128) NOT NULL,
  `example` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `functions`
--

INSERT INTO `functions` (`id`, `languageId`, `functionName`, `summary`, `example`) VALUES
(1, 1, 'simplexml_load_file', 'Interprets an XML file into an object ', '$xml = simplexml_load_file(''test.xml'');\r\nprint_r($xml);\r\n'),
(2, 1, 'array_push', 'Push one or more elements onto the end of array', '$arrPets = array(''Dog'', ''Cat'', ''Fish'' );\r\narray_push($arrPets, ''Bird'', ''Rat'');\r\n'),
(3, 1, 'ucfirst', 'Make a string''s first character uppercase', '$message = ''have a nice day;\r\n$message = ucfirst($message);             // output: Have A Nice Day\r\n'),
(4, 1, 'mail', 'used to send email', '$message = "Example message for mail";\r\nif(mail(''test@test.com'', ''Test Subject'', $message))\r\n{\r\n	echo ''Mail sent'';\r\n}\r\nelse\r\n{\r\n	echo ''Sending of mail failed'';\r\n}\r\n'),
(5, 2, '$.get', 'Load data from the server using a HTTP GET request.', '$.ajax({\r\n  url: url,\r\n  data: data,\r\n  success: success,\r\n  dataType: dataType\r\n});\r\n'),
(6, 2, 'hover', 'hover method accepts 2 functions as parameters which execute alternativelt when mouse enters and leaves an element.', '$(selector).hover(\r\nfunction()\r\n{\r\n//executes on mouseenter\r\n},\r\nfunction()\r\n{\r\n//executes on mouseleave\r\n});'),
(7, 2, 'bind', 'Attach a handler to an event for the elements.', '$(element).bind(''click'', function() \r\n{\r\n  alert(''click happened'');\r\n});\r\n'),
(8, 2, 'jQuery.data', 'Store arbitrary data associated with the specified element.', 'jQuery.data(element, key, value);'),
(9, 1, 'add class', 'Adds a class', '(''p'').addClass(''myClass yourClass'');');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `languageName` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `languageName`) VALUES
(1, 'PHP'),
(2, 'jQuery');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movieName` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movieName`) VALUES
(1, ' 1. The Godfather'),
(2, ' 2. The Shawshank Redemption'),
(3, ' 3. Casablanca'),
(4, ' 4. The Lord of the Rings: The Return of the King'),
(5, ' 5. Titanic'),
(6, ' 6. Pulp Fiction'),
(7, ' 7. Forrest Gump'),
(8, ' 8. Gone with the Wind'),
(9, ' 9. Star Wars'),
(10, ' 10. The Dark Knight'),
(11, ' 11. Schindler''s List'),
(12, ' 12. The Godfather Part II'),
(13, ' 13. Citizen Kane'),
(14, ' 14. Goodfellas'),
(15, ' 15. The Lord of the Rings: The Fellowship of the Ring'),
(16, ' 16. Fight Club'),
(17, ' 17. Saving Private Ryan'),
(18, ' 18. Braveheart'),
(19, ' 19. The Lord of the Rings: The Two Towers'),
(20, ' 20. The Wizard of Oz'),
(21, ' 21. The Sound of Music'),
(22, ' 22. It''s A Wonderful Life'),
(23, ' 23. Gladiator'),
(24, ' 24. 2001: A Space Odyssey'),
(25, ' 25. The Good, The Bad, and The Ugly'),
(26, ' 26. The Departed'),
(27, ' 27. Apocalypse Now'),
(28, ' 28. One Flew Over the Cuckoo''s Nest'),
(29, ' 29. Psycho'),
(30, ' 30. American Beauty'),
(31, ' 31. Scarface'),
(32, ' 32. Taxi Driver'),
(33, ' 33. A Beautiful Mind'),
(34, ' 34. Raiders of the Lost Ark'),
(35, ' 35. The Silence of the Lambs'),
(36, ' 36. The Notebook'),
(37, ' 37. The Matrix'),
(38, ' 38. Lawrence of Arabia'),
(39, ' 39. A Clockwork Orange'),
(40, ' 40. Back to the Future'),
(41, ' 41. Ben Hur'),
(42, ' 42. Jaws'),
(43, ' 43. Rocky'),
(44, ' 44. Blade Runner'),
(45, ' 45. Pride and Prejudice'),
(46, ' 46. Memento'),
(47, ' 47. The Empire Strikes Back'),
(48, ' 48. American History X'),
(49, ' 49. The Seven Samurai'),
(50, ' 50. The Shining'),
(51, ' 51. The Usual Suspects'),
(52, ' 52. Dr. Strangelove'),
(53, ' 53. Avatar'),
(54, ' 54. Annie Hall'),
(55, ' 55. Singin'' in the Rain'),
(56, ' 56. The Big Lebowski'),
(57, ' 57. No Country for Old Men'),
(58, ' 58. Reservoir Dogs'),
(59, ' 59. Alfred Hitchcock''s Rear Window'),
(60, ' 60. Vertigo'),
(61, ' 61. Life is Beautiful'),
(62, ' 62. On the Waterfront'),
(63, ' 63. The Green Mile'),
(64, ' 64. 8 1/2'),
(65, ' 65. 12 Angry Men'),
(66, ' 66. To Kill A Mockingbird'),
(67, ' 67. Slumdog Millionaire'),
(68, ' 68. Die Hard'),
(69, ' 69. Amadeus'),
(70, ' 70. Troy'),
(71, ' 71. Pirates of the Caribbean: The Curse of the Black Pearl'),
(72, ' 72. Crash'),
(73, ' 73. Eternal Sunshine of the Spotless Mind'),
(74, ' 74. Terminator 2: Judgement Day'),
(75, ' 75. Unforgiven'),
(76, ' 76. There Will Be Blood'),
(77, ' 77. Grease'),
(78, ' 78. The Sixth Sense'),
(79, ' 79. Cool Hand Luke'),
(80, ' 80. Scent of a Woman'),
(81, ' 81. My Fair Lady'),
(82, ' 82. Alien'),
(83, ' 83. Heat'),
(84, ' 84. Se7en'),
(85, ' 85. Monty Python and the Holy Grail'),
(86, ' 86. The Sting'),
(87, ' 87. Platoon'),
(88, ' 88. The Pianist'),
(89, ' 89. Butch Cassidy and the Sundance Kid'),
(90, ' 90. The Princess Bride'),
(91, ' 91. Amalie'),
(92, ' 92. Twilight'),
(93, ' 93. Rain Man'),
(94, ' 94. The Graduate'),
(95, ' 95. All About Eve'),
(96, ' 96. The Bridge on the River Kwai'),
(97, ' 97. Dances with Wolves'),
(98, ' 98. The Ten Commandments'),
(99, ' 99. Castaway'),
(100, ' 100. Breakfast at Tiffany''s');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryId` int(11) NOT NULL,
  `stateName` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `countryId`, `stateName`) VALUES
(1, 1, 'U.P.'),
(2, 1, 'Uttarakhand');

-- --------------------------------------------------------

--
-- Table structure for table `towninfo`
--

CREATE TABLE IF NOT EXISTS `towninfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `townId` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `towninfo`
--

INSERT INTO `towninfo` (`id`, `townId`, `description`) VALUES
(1, 3, 'Pithoragarh is a beautiful town situated in Kumaon region of Uttarakhand. It has an average elevation of 1,514 metres (4,967 feet) above sea level.'),
(2, 4, 'Dehradun also known as Doon is the capital city of Uttarakhand. It is around 250 Kilometers from national capital Delhi.\r\nRice and Lychee are major products of this city.'),
(3, 1, 'Lucknow is the capital city of U.P. or Uttar Pradesh.\r\nLucknow has Asia''s first human DNA bank.\r\nIt is popularly known as The City of Nawabs, Golden City of the East and The Constantinople of India.');

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE IF NOT EXISTS `towns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stateId` int(11) NOT NULL,
  `townName` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`id`, `stateId`, `townName`) VALUES
(1, 1, 'Lucknow'),
(2, 1, 'Bareilly'),
(3, 2, 'Pithoragarh'),
(4, 2, 'Dehradun'),
(5, 2, 'Nainital');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'holmes', 'sherlockholmes'),
(2, 'watson', 'johnwatson'),
(3, 'sati', 'pranay'),
(4, 'mantu', 'ajayjoshi'),
(5, 'sahji', 'brijsah'),
(6, 'vijay', 'vijayjoshi'),
(7, 'brij', 'brijsah'),
(8, 'arjun', 'samant'),
(9, 'jyotsna', 'sonawane'),
(12, 'ravindra', 'pokharia'),
(13, 'prakash', 'joshi'),
(14, 'basant', 'bhandari'),
(15, 'ajay', 'gamer');
