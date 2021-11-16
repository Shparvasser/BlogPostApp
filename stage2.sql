-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2021 at 12:42 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stage2`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `author_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `date`, `content`, `author_id`) VALUES
(75, 'The standard Lorem Ipsum passage, used since the 1500s', '2021-10-28', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 8),
(76, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '2021-10-28', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 8),
(77, '1914 translation by H. Rackham', '2021-10-28', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"', 8),
(78, 'Lorem Test', '2021-10-28', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed urna nibh, pharetra in elementum eu, sollicitudin nec elit. Vestibulum volutpat vitae turpis sit amet mollis. Morbi dictum volutpat ligula, sed bibendum eros imperdiet sit amet. Aenean rutrum ac turpis sit amet posuere. Morbi pellentesque mauris id mi suscipit ultrices. Proin eu pretium libero. Morbi a tristique ex. Praesent ac consectetur magna. Praesent bibendum lectus et risus tincidunt tincidunt. Ut eu elit at est tempor placerat. Nam ornare ex ut turpis dignissim porttitor. Phasellus placerat accumsan ligula a semper.', 14),
(121, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2021-11-16', 'Donec lobortis nibh in imperdiet blandit. Aliquam elit metus, mollis non posuere ac, egestas eget elit. Vivamus ultrices urna id ante hendrerit sollicitudin ut sit amet arcu. Nam tincidunt volutpat turpis a pharetra. Nulla posuere turpis nibh, ut tincidunt tellus consequat a. Quisque lectus libero, ultrices eu enim nec, imperdiet ultrices nunc. Suspendisse potenti. Proin a est in urna varius gravida.\r\nInteger facilisis ultricies mi, condimentum ornare arcu egestas a. Mauris et sem posuere, luctus lorem eget, consectetur purus. Nullam quis volutpat odio. Ut rutrum libero sit amet nulla tincidunt, eget dictum enim efficitur. Quisque eget viverra est, ac convallis orci. In et interdum erat, vitae condimentum justo. Etiam vel lectus sollicitudin, pellentesque libero aliquet, malesuada orci. Sed vel mollis orci. Donec ornare ex a ante sollicitudin ultrices. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam cursus lobortis dui ac pellentesque. Mauris dapibus diam in egestas tristique.\r\nOrci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec malesuada est lacus, vitae eleifend orci fermentum ac. Sed lacinia fringilla nunc non finibus. Cras lacinia mollis mauris et semper. Vestibulum vitae iaculis lectus. Donec porta finibus neque, et finibus mi porta at. Maecenas erat leo, aliquet sed bibendum sit amet, convallis sed urna. Vestibulum quis lectus non libero condimentum cursus in sit amet ligula. Phasellus tempus nec nibh feugiat sodales. Vivamus pretium, est feugiat fermentum pulvinar, odio tortor fermentum mi, ut cursus nibh orci a augue. Nulla tellus purus, tincidunt non sollicitudin eu, mattis eget justo. Morbi rutrum lobortis eleifend. Curabitur sagittis, ligula eget blandit elementum, tortor tortor porttitor lorem, in imperdiet sapien justo eu est. Nulla blandit turpis eu mauris rhoncus, id commodo enim feugiat. Suspendisse leo orci, faucibus non vulputate id, euismod sed diam.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `postsTags`
--

CREATE TABLE `postsTags` (
  `posts_id` int UNSIGNED NOT NULL,
  `tag_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `postsTags`
--

INSERT INTO `postsTags` (`posts_id`, `tag_id`) VALUES
(75, 1),
(76, 6),
(77, 8),
(78, 6),
(121, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int UNSIGNED NOT NULL,
  `tag` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'science'),
(2, 'education'),
(3, 'health'),
(4, 'fantastic'),
(5, 'fantasy'),
(6, 'history'),
(7, 'meditsyna'),
(8, 'information');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int UNSIGNED NOT NULL,
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `surname` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone` varchar(80) DEFAULT NULL,
  `password` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `surname`, `email`, `phone`, `password`) VALUES
(8, 'Dima', 'Shparvasser', 'Stalkerok320@gmail.com', '380660517524', '111111'),
(14, 'Vasya', 'Pupkin', 'Vasya@gmail.com', '38000000000', '111111'),
(16, 'Denchik', 'Martovsckiy', 'Denchik@gmail.com', '280446456745', '111111'),
(17, 'dadwqe', 'adqweqeq', 'WDqwdqe@dad.cpo', '4575757577575', '111111'),
(18, 'dadadqw', 'eadqweqdeq', 'qdqweqweqwe@asd.sadqw', '1414242544', '111111'),
(19, 'adadaaa', 'dfadfaf', 'ddadadda@dacmakm.dax', '1454644645646', '111111'),
(20, 'Evgen', 'Kulish', 'Kulish@gamil.com', '211644687643', '111111'),
(21, 'Darks', 'Samuray', 'Samuray@dsa.cad', '16464874631', '111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`) USING BTREE;

--
-- Indexes for table `postsTags`
--
ALTER TABLE `postsTags`
  ADD PRIMARY KEY (`posts_id`,`tag_id`),
  ADD KEY `posts_id` (`posts_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`users_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `postsTags`
--
ALTER TABLE `postsTags`
  ADD CONSTRAINT `postsTags_ibfk_1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postsTags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;