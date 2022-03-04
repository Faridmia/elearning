-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 03:51 PM
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
-- Database: `elearning_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(11) NOT NULL DEFAULT 1,
  `about_title` text DEFAULT NULL,
  `about_desc` longtext DEFAULT NULL,
  `about_title_2` text NOT NULL,
  `about_desc_2` longtext NOT NULL,
  `about_title_3` text NOT NULL,
  `about_desc_3` longtext NOT NULL,
  `button_title` text DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `about_img` varchar(255) DEFAULT NULL,
  `about_heading` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_title`, `about_desc`, `about_title_2`, `about_desc_2`, `about_title_3`, `about_desc_3`, `button_title`, `button_link`, `about_img`, `about_heading`) VALUES
(1, 'Why we will learn on the learning platform', 'It is very difficult to find Bangla word technical content, especially plastering related content. As much as there is some content edik over there, a lot of it is being shown. Tidy, Organic Method, Small but Detailed Oriented Learning It is very difficult to find your problem.', 'What is the objective of the course', 'Our first objective is to create quality learning materials in Bengali language and make them easily accessible to all.', 'Online Tutoring Experience:', 'I have conducted almost 14 online tutorial classes for long distance students by helping them to achieve their grades.', 'Learn More', 'link', 'NVr03zv5N7.jpg', 'I,m Farid Mia');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`post_id`, `post_title`, `post_image`, `users_id`) VALUES
(2, 'Online Training course in Bangladesh 2022', 'FD8Q9IUkkv.jpg', 1),
(3, 'ডিজিটাল মার্কেটিং ট্রেনিং কি এবং কেন করবেন?', 'zvPf6ae3nA.jpg', 1),
(4, 'Free online Training on-Microsoft Cloud Skill', 'hubDXK8ZXb.jpg', 1);

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
(3, 'php'),
(4, 'graphics');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `con_id` int(11) NOT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `addr_title` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mail_title` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `phone_title` varchar(255) DEFAULT NULL,
  `phone_num` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`con_id`, `sub_heading`, `heading`, `content`, `addr_title`, `address`, `mail_title`, `mail`, `phone_title`, `phone_num`) VALUES
(1, 'Reach Us', 'Contact Us', 'Contact us for any questions or support regarding the course', 'Reach Us', '# DeFactor- 4/1 Chowdurypara <br/> DIT Road, Malibagh,Dhaka 1219', 'Drop A Mail', 'support@gmail.com <br/> farid@gmail.com', 'Call Us', '(88) 01739692387 <br/>01739692387');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_title` text NOT NULL,
  `course_original_price` float(10,2) NOT NULL,
  `is_free_course` varchar(11) DEFAULT NULL,
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
  `is_top_course` varchar(11) DEFAULT NULL,
  `requirement` text DEFAULT NULL,
  `course_features` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` varchar(255) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `is_featured_course` varchar(11) DEFAULT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 1,
  `status` int(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL DEFAULT 0,
  `rcmd_cid` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_original_price`, `is_free_course`, `course_overview_provider`, `course_tag`, `video_url`, `course_desc`, `outcomes`, `course_duration`, `course_sell_price`, `course_img`, `long_desc`, `level`, `is_top_course`, `requirement`, `course_features`, `category_id`, `user_id`, `sub_category_id`, `is_featured_course`, `added`, `is_active`, `status`, `users_id`, `rcmd_cid`) VALUES
(23, 'ওয়েব ডেভেলপমেন্টের শুরু', 3000.00, '1', 'youtube', 'php gdgf', 'https://www.youtube.com/embed/L7nz4kkhAsQ', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore. veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'Course video', '6 month', '2500', 'MGzoFhhLXu.jpg', '<p>It is full of newcomers\r\nYou can start if you know the basics of computer\r\nIn clear Bengali language</p><p>\r\nFrom this course you can learn basic html css</p>', 'beginner', '1', '<li>You can do this course only if you know basic computer usage</li> \r\n<li>browser usage but the condition is to learn regularly</li>', '<li><i class=\"ti-angle-right\"></i>Fully Programming</li>\r\n										<li><i class=\"ti-angle-right\"></i>Help Code to Code</li>\r\n										<li><i class=\"ti-angle-right\"></i>Free Trial Life time</li>\r\n										<li><i class=\"ti-angle-right\"></i>Unlimited Videos</li>', 2, 'faridmia', 2, '1', '2022-03-03 07:10:12', 1, 1, 1, 25),
(24, 'specking english', 1500.00, '', 'youtube', 'english', 'https://www.youtube.com/embed/ud3brruUDzg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore. veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'Course video', '3 month', '1000', '1vkLEIGDoP.png', '<p>It is full of newcomers\r\nYou can start if you know the basics of computer\r\nIn clear Bengali language</p><p>\r\nFrom this course you can learn basic html css</p>', 'beginner', '1', '<li>You can do this course only if you know basic computer usage</li> \r\n<li>browser usage but the condition is to learn regularly</li>', '<li><i class=\"ti-angle-right\"></i>Fully Programming</li>\r\n										<li><i class=\"ti-angle-right\"></i>Help Code to Code</li>\r\n										<li><i class=\"ti-angle-right\"></i>Free Trial Life time</li>\r\n										<li><i class=\"ti-angle-right\"></i>Unlimited Videos</li>', 4, 'faridmia', 4, '', '2022-03-04 10:38:35', 1, 1, 1, 27),
(25, 'Graphic Design Course', 3000.00, '1', 'youtube', 'photoshop, illustrator', 'https://www.youtube.com/embed/t0gBYc7QEU8', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore. veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'Course video', '3 month', '2500', 'luGAzNKerD.jpg', '<p>It is full of newcomers\nYou can start if you know the basics of computer\nIn clear Bengali language</p><p>\nFrom this course you can learn basic html css</p>', 'beginner', '1', '<li>You can do this course only if you know basic computer usage</li> \n<li>browser usage but the condition is to learn regularly</li>', '<li><i class=\"ti-angle-right\"></i>Fully Programming</li>\n										<li><i class=\"ti-angle-right\"></i>Help Code to Code</li>\n										<li><i class=\"ti-angle-right\"></i>Free Trial Life time</li>\n										<li><i class=\"ti-angle-right\"></i>Unlimited Videos</li>', 2, 'boniamin1996@gmail.com', 5, '0', '2022-02-05 00:12:44', 1, 1, 10, 25),
(26, 'Financial analyst course', 200.00, '', 'youtube', 'php', 'https://www.youtube.com/embed/L7nz4kkhAsQ', 'The Complete Financial Analyst Course 2022', 'demo', '3 month', '130', 'VZWzP2k7Ka.jpg', '<p>It is full of newcomers\r\nYou can start if you know the basics of computer\r\nIn clear Bengali language</p><p>\r\nFrom this course you can learn basic html css</p>', 'beginner', '1', '<li>You can do this course only if you know basic computer usage</li> \r\n<li>browser usage but the condition is to learn regularly</li>', '<li><i class=\"ti-angle-right\"></i>Fully Programming</li>\r\n										<li><i class=\"ti-angle-right\"></i>Help Code to Code</li>\r\n										<li><i class=\"ti-angle-right\"></i>Free Trial Life time</li>\r\n										<li><i class=\"ti-angle-right\"></i>Unlimited Videos</li>', 1, 'parvej@gmail.com', 1, '', '2022-02-09 19:33:39', 1, 1, 11, 0),
(27, 'Photoshop Design Course', 200.00, '1', 'youtube', 'php', 'https://www.youtube.com/embed/RU6jsPXj1ys', 'Photoshop Design Course', 'demo', '3 month', '150', 'UW1xdamn9Y.jpg', '<p>It is full of newcomers\nYou can start if you know the basics of computer\nIn clear Bengali language</p><p>\nFrom this course you can learn basic html css</p>', 'beginner', '1', '<li>You can do this course only if you know basic computer usage</li> \n<li>browser usage but the condition is to learn regularly</li>', '<li><i class=\"ti-angle-right\"></i>Fully Programming</li>\n										<li><i class=\"ti-angle-right\"></i>Help Code to Code</li>\n										<li><i class=\"ti-angle-right\"></i>Free Trial Life time</li>\n										<li><i class=\"ti-angle-right\"></i>Unlimited Videos</li>', 2, 'faridmia', 2, '1', '2022-02-05 10:23:57', 1, 1, 10, 0),
(28, 'Skill based freelancing course', 200.00, '1', 'youtube', 'freelancing', 'https://www.youtube.com/embed/bOz6wYCw9-Q', 'Is freelancing easy to learn?\r\nWhen it comes to building responsive websites, Flexbox makes it super easy to create flexible and responsive layouts. So learning Flexbox is a must for front-end developers. ... In this tutorial, I am going to show you the most common use cases of Flexbox by solving eight tasks togethe', 'Course video', '6 month', '130', 'gJ5uw8RRpe.jpg', 'Is freelancing easy to learn?\r\nWhen it comes to building responsive websites, Flexbox makes it super easy to create flexible and responsive layouts. So learning Flexbox is a must for front-end developers. ... In this tutorial, I am going to show you the most common use cases of Flexbox by solving eight tasks togethe', 'beginner', '', '<li>You can do this course only if you know basic computer usage</li> \r\n<li>browser usage but the condition is to learn regularly</li>	', '<li><i class=\"ti-angle-right\"></i>Fully Programming</li>\r\n										<li><i class=\"ti-angle-right\"></i>Help Code to Code</li>\r\n										<li><i class=\"ti-angle-right\"></i>Free Trial Life time</li>\r\n										<li><i class=\"ti-angle-right\"></i>Unlimited Videos</li>	', 2, 'faridmia', 2, '1', '2022-03-04 10:40:21', 1, 1, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `e_id` int(11) NOT NULL,
  `coll_skill_title` varchar(255) DEFAULT NULL,
  `coll_session` varchar(255) DEFAULT NULL,
  `coll_name` varchar(255) DEFAULT NULL,
  `coll_desc` text DEFAULT NULL,
  `ver_skill_title` text DEFAULT NULL,
  `ver_session` varchar(255) DEFAULT NULL,
  `ver_name` varchar(255) DEFAULT NULL,
  `ver_desc` text DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`e_id`, `coll_skill_title`, `coll_session`, `coll_name`, `coll_desc`, `ver_skill_title`, `ver_session`, `ver_name`, `ver_desc`, `users_id`) VALUES
(1, 'Diploma in Computer', '13-14', 'Faridpur polytechnic instiute', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'Bsc In CSE', '2017 - 2021', 'Green University', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 1),
(2, 'Diploma in Computer', '13-14', 'Faridpur polytechnic instiute', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'Bsc In CSE', '2017 - 2022', 'Green University', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 5),
(3, 'Diploma in Computer', '13-14', 'Patuakhali polytechnic instiute', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'Bsc In CSE', '2017 - 2022', 'Green University', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 7),
(4, 'Diploma in Computer', '13-14', 'Faridpur polytechnic instiute', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'Bsc In CSE', '2017 - 2022', 'Green University', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 6),
(5, 'designer', '13-14', 'sfdgs', 'description', 'Bsc In CSE', '2017 - 2021', 'Green University', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 10),
(6, 'designer', '13-14', 'sfdgs', 'description', 'Bsc In CSE', '2017 - 2021', 'Green University', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enroll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`enroll_id`, `user_id`, `course_id`, `added`) VALUES
(2, 5, 23, '2021-11-06 17:32:52'),
(15, 5, 24, '0000-00-00 00:00:00'),
(16, 5, 25, '2021-11-06 17:30:11'),
(17, 6, 26, '2021-11-27 23:05:17'),
(18, 6, 23, '2021-11-06 17:32:52'),
(19, 6, 24, '2021-12-05 00:27:46'),
(20, 1, 27, '2022-01-26 21:04:51');

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

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_ques`, `faq_answer`, `faq_cat_id`) VALUES
(1, 'How To Install Distance Learning Theme?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.', 1),
(2, 'What is main Requirements For Distance Learning?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.', 1),
(3, 'Why Choose Distance Learning Theme?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.', 1),
(4, 'May I Request For Refund?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.', 2),
(5, 'May I Get Any Offer in Future?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.', 2),
(6, 'How Much Time It will Take For refund?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.', 2),
(7, 'How To Upgrade Distance Learning Theme?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faq_category`
--

CREATE TABLE `faq_category` (
  `faq_cat_id` int(11) NOT NULL,
  `faq_cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_category`
--

INSERT INTO `faq_category` (`faq_cat_id`, `faq_cat_name`) VALUES
(1, 'General'),
(2, 'Payment'),
(3, 'Upgrade');

-- --------------------------------------------------------

--
-- Table structure for table `footer_top`
--

CREATE TABLE `footer_top` (
  `footer_id` int(11) NOT NULL,
  `addr_title` varchar(255) DEFAULT NULL,
  `contact_info` text DEFAULT NULL,
  `menu_title_1` varchar(255) DEFAULT NULL,
  `menu_info_1` text DEFAULT NULL,
  `menu_title_2` varchar(255) DEFAULT NULL,
  `menu_info_2` text DEFAULT NULL,
  `menu_title_3` varchar(255) DEFAULT NULL,
  `menu_info_3` text DEFAULT NULL,
  `app_title` varchar(255) DEFAULT NULL,
  `app_text_1` varchar(255) DEFAULT NULL,
  `app_text_2` varchar(255) DEFAULT NULL,
  `app_link_1` varchar(255) DEFAULT NULL,
  `app_link_2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer_top`
--

INSERT INTO `footer_top` (`footer_id`, `addr_title`, `contact_info`, `menu_title_1`, `menu_info_1`, `menu_title_2`, `menu_info_2`, `menu_title_3`, `menu_info_3`, `app_title`, `app_text_1`, `app_text_2`, `app_link_1`, `app_link_2`) VALUES
(1, 'Shewrapara, Mirpur, Dhaka.', ' <p>+88 01739692387</p> <p>info@elearning.com</p>', 'Pages', '<li><a href=\"http://localhost/education_learning/about-us.php\">About Us</a></li>\r\n                            <li><a href=\"http://localhost/education_learning/faq.php\">FAQs Page</a></li>\r\n                            <li><a href=\"http://localhost/education_learning/full-width-course.php\">Our Course</a></li>\r\n                            <li><a href=\"http://localhost/education_learning/contact.php\">Contact</a></li>\r\n                            <li><a href=\"http://localhost/education_learning/\">Blog</a></li>', 'New Categories', ' <li><a href=\"#\">Designing</a></li> <li><a href=\"#\">Nusiness</a></li>\r\n                            <li><a href=\"#\">Software</a></li>\r\n                            <li><a href=\"#\">WordPress</a></li>\r\n                            <li><a href=\"#\">PHP</a></li>', 'Useful Links', '<li><a href=\"#\">Free Consultation</a></li>\r\n<li><a href=\"#\">Visit Us</a></li>\r\n<li><a href=\"#\">Chat with us</a></l<li>\r\n       ', 'Download Apps', 'Google Play <span>Get It Now</span>', ' App Store <span>Now it Available</span>', 'https://play.google.com/store/apps', 'https://play.google.com/store/apps');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_title` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `video_url` text NOT NULL,
  `upload_video` varchar(256) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_title`, `course_id`, `section_id`, `video_url`, `upload_video`, `status`, `seen`) VALUES
(30, 'How To Design Website Layout Using HTML CSS Bangla part 1', 23, 20, 'https://www.youtube.com/embed/-65YXXhJvOE', '', 0, 1),
(31, 'How To Design Website Layout Using HTML CSS Bangla part 2', 23, 21, 'https://www.youtube.com/embed/kD75n-6-Sig', '', 0, 1),
(32, 'How To Design Website Layout Using HTML CSS Bangla part 3', 23, 22, 'https://www.youtube.com/embed/x78oty0P-Ks', '', 0, 1),
(33, 'How To Design Website Layout Using HTML CSS Bangla part 4', 23, 23, 'https://www.youtube.com/embed/9NDUn2GV3Ts', '', 0, 1),
(34, 'How to Design Website Layout Using HTML CSS Bangla part 5', 23, 24, 'https://www.youtube.com/embed/0if8z-Eevi8', '', 0, 1),
(35, 'Easy spoken english course 1st class', 24, 26, 'https://www.youtube.com/embed/g4lbwKcV_q4', '', 0, 0),
(36, 'Easy spoken english 2nd class', 24, 27, 'https://www.youtube.com/embed/yDfmLyxYRAk', '', 0, 0),
(37, 'Easy spoken english 3rd Class', 24, 28, 'https://www.youtube.com/embed/K9mzRJ46oKo', '', 0, 0),
(38, 'Adobe Photoshop CC Bangla Tutorials Full Course', 27, 30, 'https://www.youtube.com/embed/3WvAaYnj0fw', '', 0, 0),
(39, 'Format Management and Interface | Adobe Photoshop CC', 27, 31, 'https://www.youtube.com/embed/0YJjC8tIKwQ', '', 0, 0),
(40, 'Layer | Adobe Photoshop CC Bangla Tutorial Full Course', 27, 32, 'https://www.youtube.com/embed/gnAip6lF7bI', '', 0, 0),
(41, 'Selection Tools | Adobe Photoshop CC Bangla Tutorial Full Course', 27, 33, 'https://www.youtube.com/embed/PDxATiKH738', '', 0, 0),
(42, 'Freelancing About Me Who am I DigiSkills', 28, 34, 'https://www.youtube.com/embed/DSAYlSWt9tM', '', 0, 0),
(43, 'Freelancing About Me How did I start freelancing DigiSkills', 28, 34, 'https://www.youtube.com/embed/h4vOlBsyzmc', '', 0, 0),
(44, 'Freelancing About Me Why you should learn from me DigiSkills', 28, 35, 'https://www.youtube.com/embed/Sl6fGe0Jm-M', '', 0, 0),
(45, 'Graphic Design Bangla Tutorial', 25, 36, 'https://www.youtube.com/embed/hzYdrMUs0gs', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `privacy_id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `desc_1` text NOT NULL,
  `desc_2` text NOT NULL,
  `desc_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`privacy_id`, `heading`, `desc_1`, `desc_2`, `desc_3`) VALUES
(1, 'Our Terms & Conditions', 'You can access these courses from a computer and a mobile phone. If you need to use more than this computer, you have to get permission from us on the support page', 'Your account credentials (username and password) are exclusively for your own use. These are not allowed to be shared with anyone else. If your account credentials are shared with someone else, your account may be terminated at any time and in that case you will no longer be able to access course materials from this account.', 'Before enrolling in the course, check the course tutorial list or details section. If you can&#39;t find the tutorial list, please contact support.&#13;&#10;All in all, hopefully, you will maintain a conducive learning environment here.&#13;&#10;The Authority has the power to update the Terms and Conditions at any time without giving any reason.');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `users_id`, `course_id`, `datetime`) VALUES
(14, 'Farid mia', 5, 'It\'s also an amazing course and I\'ve been just completed your two courses.', 1, 28, 1644052869),
(15, 'Boni amin', 5, 'Very helpful', 1, 25, 1644052946),
(16, 'Parvez', 5, 'awesome course', 11, 26, 1644058890),
(17, 'Farid mia', 5, 'good course', 1, 23, 1646237176),
(19, 'Farid mia', 5, 'good course', 1, 27, 1646243623),
(22, 'Boni amin', 4, 'good course', 10, 23, 1646374123);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_title` text NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_title`, `course_id`) VALUES
(20, 'Basic HTML part 1', 23),
(21, 'Basic HTML part 2', 23),
(22, 'Basic HTML part 3', 23),
(23, 'Basic HTML part 4', 23),
(24, 'Basic HTML part 5', 23),
(26, 'English part 1', 24),
(27, 'English part 2', 24),
(28, 'English part  3', 24),
(30, 'Photoshop Part 1', 27),
(31, 'Photoshop Part 2', 27),
(32, 'Photoshop Part 3', 27),
(33, 'Photoshop Part 4', 27),
(34, 'Freelancing part 1', 28),
(35, 'Freelancing part 2', 28),
(36, 'graphics part 1', 25);

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
  `copyright` text NOT NULL,
  `banner_title` text NOT NULL,
  `banner_desc` text NOT NULL,
  `banner_img` varchar(255) NOT NULL,
  `newsletter_heading` varchar(255) DEFAULT NULL,
  `newsletter_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`s_id`, `phone`, `email`, `facebook`, `twitter`, `linkedin`, `instagram`, `logo`, `address`, `copyright`, `banner_title`, `banner_desc`, `banner_img`, `newsletter_heading`, `newsletter_content`) VALUES
(5, '01739692382', 'mdfarid7830@gmail.com', 'www.facebook.com/faridupdate', 'https://twitter.com/FaridMi15741537', 'https://www.linkedin.com/in/farid-mia-b551a9149/', 'https://instagram.com/updatedtesteee', 'esbmPjTqsL.jpg', 'Shewrapara, Mirpur, Dhaka.', '2022 © Automatic Course Recommender System. Designed By GUB 182 Batch', 'We help you learn what you love', 'Take High-Quality Online Courses from the Best Online Instructors of Bangladesh Develop Your Skills.', 'I5WjbDobBG.jpg', 'Subscribe To Our Newsletter', 'Phasellus nec dolor.Sed ornare semper ipsum. Sed pede orci volutpat sed congue vels gravida non lacus.');

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
(14, 'Farid Mia', 'mdfarid7830@gmail.com', 'admin', 'admin', '', '', 0, NULL, '0000-00-00'),
(63, 'Boni Amin', 'boni@gmail.com', '', 'admin', 'student', '', 1, NULL, '0000-00-00'),
(64, 'Parvez', 'parvez@gmail.com', '', 'admin', 'student', '', 1, NULL, '0000-00-00');

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
(3, 'man', 1),
(4, 'english', 4),
(5, 'graphics', 2);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `t_id` int(11) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `for_whoom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`t_id`, `terms`, `for_whoom`) VALUES
(1, 'Boni Amin', '2');

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
  `user_experience` varchar(255) NOT NULL DEFAULT '0 years',
  `description` text NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `email`, `username`, `password`, `user_profile_photo`, `biography`, `social_link`, `date_added`, `role_id`, `user_experience`, `description`, `status`) VALUES
(1, 'Farid mia', 'mdfarid7830@gmail.com', 'faridmia', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'brE6dijHhQ.jpg', 'Web Developer', 'www.facebook.com/faridupdate https://twitter.com/FaridMi15741537 https://www.linkedin.com/in/farid-mia-b551a9149/', '2022-03-04 05:24:12', 1, '4 years', 'As a Web Developer, I want to grow my career in the IT sector with responsibilities and take part in the development of this sector. Always have a positive mindset to work and give my best. 2 years plus experience in Smartdatasoft company\'s about Web Development and presently I am working with SmartDataSoft a WordPress & PHP Developer. Before that, I worked for 10 months as an intern at 8 Pairs Solution Limited.', 1),
(10, 'MD. BONI AMIN', 'boniamin1996@gmail.com', 'boniamin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'kBkumCII0S.jpg', 'Web Designer', 'www.facebook.com/faridupdate https://twitter.com/FaridMi15741537 https://www.linkedin.com/in/farid-mia-b551a9149/', '2022-01-29 18:13:26', 2, '1 years', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.', 1),
(11, 'parvej', 'parvej@gmail.com', 'parvez', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'kMB7x2ZqEP.jpg', 'Video Editor', 'www.facebook.com/faridupdate https://twitter.com/FaridMi15741537 https://www.linkedin.com/in/farid-mia-b551a9149/', '2022-01-29 18:13:31', 2, '2 years', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.', 1),
(12, 'rakib', 'rakib@gmail.com', 'rakib', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '', '', '', '0000-00-00 00:00:00', 2, '0 years', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_title` (`course_title`(768)),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `faq_category`
--
ALTER TABLE `faq_category`
  ADD PRIMARY KEY (`faq_cat_id`);

--
-- Indexes for table `footer_top`
--
ALTER TABLE `footer_top`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`privacy_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `course_id` (`course_id`);

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
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq_category`
--
ALTER TABLE `faq_category`
  MODIFY `faq_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `footer_top`
--
ALTER TABLE `footer_top`
  MODIFY `footer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `privacy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
