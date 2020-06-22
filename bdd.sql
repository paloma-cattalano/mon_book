-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `monbook_paloma`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `index_picture_url` varchar(50) NOT NULL,
  `index_title` text NOT NULL,
  `index_description` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`index_picture_url`, `index_title`, `index_description`, `email`, `phone`) VALUES
('super_orage.jpeg', 'L\'incroyable vie de Roberte', '	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'paloma.cattalano@gmail.com', '06.98.56.83.18');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `url` text,
  `tag` text,
  `img` text,
  `priority` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `url`, `tag`, `img`, `priority`, `date`) VALUES
(1, 'CODEVORES', 'Sed lectus vestibulum mattis ullamcorper velit. Id donec ultrices tincidunt arcu non. Risus viverra adipiscing at in. Tempor orci dapibus ultrices in iaculis nunc sed augue. Nulla facilisi morbi tempus iaculis urna id volutpat. Odio morbi quis commodo odio aenean sed adipiscing. Scelerisque purus semper eget duis. Placerat in egestas erat imperdiet sed. Tincidunt dui ut ornare lectus sit. Urna et pharetra pharetra massa. Nam aliquam sem et tortor consequat id porta nibh. Cursus euismod quis viverra nibh cras pulvinar mattis nunc sed. Senectus et netus et malesuada fames ac turpis egestas. Nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. Tellus mauris a diam maecenas sed. Amet volutpat consequat mauris nunc congue nisi vitae suscipit tellus.', 'https://github.com/paloma-cattalano/codevores', 'HTML5 | JS', 'super_chemin.jpeg ', 5, '2020-05-15'),
(2, 'ADA HOTEL', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'https://github.com/paloma-cattalano/Ada-Hotel', 'HTML5 | CSS3', 'super_vigne.jpeg ', 2, '2020-02-20'),
(3, 'MARINARTISTE', 'Nulla facilisi morbi tempus iaculis urna id volutpat. Odio morbi quis commodo odio aenean sed adipiscing. Scelerisque purus semper eget duis. Placerat in egestas erat imperdiet sed. Tincidunt dui ut ornare lectus sit. Urna et pharetra pharetra massa. Nam aliquam sem et tortor consequat id porta nibh. Cursus euismod quis viverra nibh cras pulvinar mattis nunc sed. Senectus et netus et malesuada fames ac turpis egestas. Nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. Tellus mauris a diam maecenas sed. Amet volutpat consequat mauris nunc congue nisi vitae suscipit tellus.', 'https://github.com/paloma-cattalano/Marinartiste', 'HTML5 | CSS3', 'super_pinede.jpeg', 1, '2020-06-12'),
(5, 'MEDICIO', 'Scelerisque purus semper eget duis. Placerat in egestas erat imperdiet sed. Tincidunt dui ut ornare lectus sit. Urna et pharetra pharetra massa. Senectus et netus et malesuada fames ac turpis egestas. Nullam eget felis eget nunc lobortis mattis aliquam faucibus purus. Tellus mauris a diam maecenas sed. Amet volutpat consequat mauris nunc congue nisi vitae suscipit tellus.', '', 'HTML5 | CSS3', 'super_canadaire.jpeg', 4, '2020-04-20'),
(6, 'LEMONI', 'Sed lectus vestibulum mattis ullamcorper velit. Id donec ultrices tincidunt arcu non. Risus viverra adipiscing at in. Tempor orci dapibus ultrices in iaculis nunc sed augue. Nulla facilisi morbi tempus iaculis urna id volutpat. Odio morbi quis commodo odio aenean sed adipiscing. Scelerisque purus semper eget duis. Placerat in egestas erat imperdiet sed. Tincidunt dui ut ornare lectus sit.', 'https://github.com/paloma-cattalano/Lemoni', 'HTML5 | CSS3', 'super_pin.jpeg', 3, '2020-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `pseudo` text NOT NULL,
  `password` text NOT NULL,
  `rank` text,
  `page` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pseudo`, `password`, `rank`, `page`) VALUES
(2, '', 'frt', '$2y$10$g1RcNksWJMVFeAv6bwzmV.m.afQIBwj8AVDRxSWRd.DgnMPLmAKVa', 'visiteur', 'Bonjour je ne sais qui!'),
(1, '', 'palo', '$2y$10$DJJU6IWkKcFVt5fi8Eg0NuDOQBTF2xePInOW6Xw45eICcHZ9jWFHK', 'admin', 'Bonjour, oh grand maître!'),
(3, 'zoul@zoul.fr', 'mathilde', '$2y$10$CW8hPxj1/Y0Auivk9zNuo.VcKQLDVmj84UA/oYi5cqL79F3bjB1WO', 'visiteur', 'Bonjour Mathilde!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
