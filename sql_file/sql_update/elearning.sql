-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 07:13 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `profileimg` varchar(100) NOT NULL,
  `forget_salt` varchar(64) NOT NULL,
  `is_forget_requested` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `registered` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `login_time` int(11) NOT NULL,
  `logout_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `username`, `password`, `profileimg`, `forget_salt`, `is_forget_requested`, `is_active`, `registered`, `ip`, `login_time`, `logout_time`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '', '', 0, 1, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'development'),
(2, 'design'),
(3, 'women');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_title` text NOT NULL,
  `course_original_price` float(10,2) NOT NULL,
  `is_free_course` varchar(200) DEFAULT NULL,
  `course_overview_provider` text DEFAULT NULL,
  `course_tag` varchar(200) DEFAULT NULL,
  `video_url` text DEFAULT NULL,
  `course_desc` text DEFAULT NULL,
  `outcomes` varchar(255) DEFAULT NULL,
  `course_duration` varchar(255) DEFAULT NULL,
  `course_sell_price` varchar(255) DEFAULT NULL,
  `course_img` varchar(255) DEFAULT NULL,
  `long_desc` text DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `is_top_course` int(11) DEFAULT NULL,
  `requirement` text DEFAULT NULL,
  `course_features` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_original_price`, `is_free_course`, `course_overview_provider`, `course_tag`, `video_url`, `course_desc`, `outcomes`, `course_duration`, `course_sell_price`, `course_img`, `long_desc`, `level`, `is_top_course`, `requirement`, `course_features`, `category_id`, `sub_category_id`, `added`, `is_active`) VALUES
(1, 'Course:Award Winning Business School Prof', 200.00, '1', 'youtube', 'php', 'video url', 'short description', 'demo', '3 month', '130', 'HZF2BnGnLc.jpg', 'long description', 'beginner', 1, 'At vero eos et accusamus et iusto odio dignissimos ducimus', 'Fully Programming', 1, 1, '2021-08-10 22:25:11', 1),
(2, 'The Complete Financial Analyst Course 2021', 3000.00, '1', 'youtube', 'finalcila', 'video', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum', 'demo', '3 month', '2500', '7tkoGznKyJ.jpg', 'We\'re delighted you\'ve come to learn with us. Begin your coding journey with us and master the fundamentals of Ruby, so that at the conclusion of the course, you\'ll be able to create a Tic Tac Toe command line application game. Do you have any idea what a command line application is? You\'re in the proper class, and we\'ll go over it as well as a variety of other topics.Variables, methods, logic, and conditionals will be covered before we move on to object-oriented programming. You\'ll be working on labs throughout the course where you\'ll build a Tic Tac Toe from the ground up.', 'beginner', 1, '<li><span style=\"font-weight: 400;\">You should become familiar with CSS</span></li>\n<li><span style=\"font-weight: 400;\">You should become familiar with HTML</span></li>\n<li><span style=\"font-weight: 400;\">You should become familiar with Javascript</span></li>\n<li><span style=\"font-weight: 400;\">You must need a well developed PC</span></li>\n<li><span style=\"font-weight: 400;\">A strong desire to learn and apply what you\'ve learned into practice</span></li>', 'Fully Programming', 2, 2, '2021-09-25 22:13:46', 1),
(3, 'test course', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-21 23:49:29', 1),
(4, 'test course', 200.00, 'free', 'youtube', 'tag', 'video url', 'desc data', '200', '3 month', '150', 'test.jpg', 'long desc', 'beginner', 1, 'requirement', 'many feature', 2, 1, '2021-09-21 23:51:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_ques` text NOT NULL,
  `faq_answer` text NOT NULL,
  `faq_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faq_category`
--

CREATE TABLE `faq_category` (
  `faq_cat_id` int(11) NOT NULL,
  `faq_cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `r_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `r_name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`r_id`, `rating`, `users_id`, `course_id`, `r_name`, `email`, `message`, `added`) VALUES
(9, 5, 1, 2, 'Farid Mia', 'aklamon093@gmail.com', '\" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. \"', '2021-09-24 11:27:38'),
(10, 5, 2, 2, 'saon', 'saon@gmail.com', '\" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. \"', '2021-09-25 12:23:17'),
(11, 4, 1, 2, 'fack name', 'fack@gmail.com', '\" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. \"', '2021-09-25 10:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `s_id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `address` varchar(155) NOT NULL,
  `copyright` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`s_id`, `phone`, `email`, `facebook`, `twitter`, `linkedin`, `instagram`, `logo`, `address`, `copyright`) VALUES
(5, '01739692382', 'mdfarid7830@gmail.com', 'https://www.facebook.com/farid.hasan.79656/', 'https://twitter.com/FaridMi15741537', 'https://www.linkedin.com/in/farid-mia-b551a9149/', 'https://instagram.com/updatedtesteee', '29XwlC5shU.jpg', '49675 Sardis Sta, Victoria 8007, Montreal. update', '2021 Distance Learning. Designed By Farid Mia');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(100) NOT NULL,
  `stu_email` varchar(150) NOT NULL,
  `stu_username` varchar(120) NOT NULL,
  `stu_pass` varchar(200) NOT NULL,
  `stu_occ` varchar(200) NOT NULL,
  `stu_img` varchar(260) NOT NULL,
  `activated` tinyint(2) NOT NULL DEFAULT 0,
  `token` varchar(100) DEFAULT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`stu_id`, `stu_name`, `stu_email`, `stu_username`, `stu_pass`, `stu_occ`, `stu_img`, `activated`, `token`, `created_on`) VALUES
(14, 'Farid Mia', 'mdfarid7830@gmail.com', 'admin', 'admin', '', '', 0, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(200) DEFAULT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_id`, `sub_name`, `cat_id`) VALUES
(1, 'php', 1),
(2, 'econimic', 2),
(3, 'man', 1);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `t_id` int(11) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `for_whoom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_profile_photo` varchar(255) NOT NULL,
  `biography` text NOT NULL,
  `social_link` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(11) NOT NULL DEFAULT 2,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `email`, `username`, `password`, `user_profile_photo`, `biography`, `social_link`, `date_added`, `role_id`, `status`) VALUES
(1, 'Farid Mia', 'mdfarid7830@gmail.com', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'VBwlmWfQGV.jpg', 'faridpur,Dhaka', 'https://www.facebook.com https://twitter.com https://www.linkedin.com', '2021-08-10 14:52:01', 2, 1),
(2, 'shown', 'saon@gmail.com', 'saon', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'BqGsgtTHiL.jpg', 'vill: boromuskurni,post:moheshurdi,thana:vanga,district:faridpur', 'https://www.facebook.com https://twitter.com https://www.linkedin.com', '2021-09-24 18:22:28', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
