-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2020 at 10:39 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.1.33-16+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inner_eye`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `sub_title` varchar(1024) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `organization_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT '0',
  `description` text NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `tags` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `creator_id`, `title`, `sub_title`, `slug`, `organization_id`, `project_id`, `description`, `image`, `tags`, `created_at`, `updated_at`) VALUES
(1, 1, 'Manoj', NULL, 'manoj', 2, 0, '<p>asdsadad</p>', 'Document1574499779_446.jpg', '[{"id":1,"title":"Donations"},{"id":2,"title":"Inspiration"},{"id":3,"title":"Ploat"}]', '2019-11-22 11:27:59', '2019-11-23 14:33:02'),
(2, 1, 'Beautiful lady dance', NULL, 'beautiful-lady-dance', 3, 0, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><br></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><br></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'Document1574500436_99.jpg', '[{"id":1,"title":"Donations"}]', '2019-11-22 11:31:42', '2019-11-23 14:45:44'),
(3, 1, 'Himat vala', NULL, 'himat-vala', 1, 0, '<p><strong style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">Lorem Ipsum</strong><span style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">&nbsp;is simply dummy text of the printing and typesetting industry.</span></p><p><br></p><p><br></p><p><br></p><p><span style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, </span></p><p><br></p><p><br></p><p><span style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><br></p><p><br></p>', 'Document1574499818_418.jpg', '[{"id":2,"title":"Inspiration"}]', '2019-11-22 11:40:09', '2019-11-23 14:33:41'),
(5, 1, 'Kljasdjksjas', NULL, 'kljasdjksjas', 0, 0, 'sdasdasd', 'Document1574504452_775.jpg', '[]', '2019-11-23 15:50:54', '2019-11-23 15:50:54'),
(6, 1, 'Dxs', NULL, 'dxs', 1, 0, '<p>xss</p>', 'Document1574514738_415.jpg', '[{"id":2,"title":"Inspiration"}]', '2019-11-23 18:42:23', '2019-11-23 18:42:23'),
(7, 244, 'Blog title', 'My sub title', 'blog-title', 0, 9, '<p>a</p><p>a</p><p>sd</p><p>s</p><p>ds</p><p>sa</p><p>d</p><p>s</p><p>sad </p>', 'Document1577887415_438.jpg', '[{"id":2,"title":"Inspiration"}]', '2020-01-01 19:33:40', '2020-01-01 19:33:40'),
(8, 1, 'Aaa', 'Vvv', 'aaa', 208, 9, '<p>asd</p><p>s</p><p>d</p><p>as</p><p>dsad</p><p>sa</p><p>dsa</p><p>d</p>', 'Document1581071643_511.jpeg', '[{"id":2,"title":"Inspiration"},{"id":3,"title":"Ploat"}]', '2020-01-01 19:34:34', '2020-02-07 16:04:41'),
(9, 1, 'Xxxx', 'Yyyy', 'xxxx', 219, 5, '<p>sdasd </p><p>asd</p><p>s</p><p>dadsa</p><p>dsad</p>', 'Document1577887541_598.png', '[{"id":2,"title":"Inspiration"},{"id":3,"title":"Ploat"}]', '2020-01-01 19:35:44', '2020-01-01 19:39:09'),
(10, 244, 'Hi', 'The wonde', 'hi', 209, 7, '<p>hi  is life and wrong with you </p>', 'Document1578553513_405.jpg', '[{"id":1,"title":"Donations"},{"id":2,"title":"Inspiration"}]', '2020-01-09 12:35:18', '2020-01-09 12:35:55'),
(11, 1, 'Sasda', 'Dsasdas', 'sasda', 207, 9, '<p>asdas asda </p><p>d</p><p>as</p><p>ds</p><p>da</p><p>d</p><p>sad</p><p>sad asdas  </p>', 'Document1581068659_897.png', '[{"id":2,"title":"Inspiration"}]', '2020-02-07 15:14:51', '2020-02-07 15:14:51'),
(12, 251, 'Jd panchal', 'Jd', 'jd-panchal', 207, 9, '<p>asd sdasdasd</p><p>asd</p><p>asds</p><p>adasda</p><p>sdsadas</p>', 'Document1581069258_37.png', '[{"id":2,"title":"Inspiration"}]', '2020-02-07 15:24:46', '2020-02-07 15:24:46'),
(13, 251, 'Ved blog', 'Ved blog', 'ved-blog', 207, 9, '<p><span style="background-color: rgb(255, 255, 255); color: rgb(36, 39, 41);">This will create a hashed password. You may use it in your controller or even in a model, for example, if a user submits a password using a form to your controller using&nbsp;</span><code style="background-color: var(--black-050); color: rgb(36, 39, 41);">POST</code><span style="background-color: rgb(255, 255, 255); color: rgb(36, 39, 41);">&nbsp;method then you may hash it using something like this:</span></p><p><br></p><p><span style="background-color: rgb(255, 255, 255); color: rgb(36, 39, 41);">This will create a hashed password. You may use it in your controller or even in a model, for example, if a user submits a password using a form to your controller using&nbsp;</span><code style="background-color: var(--black-050); color: rgb(36, 39, 41);">POST</code><span style="background-color: rgb(255, 255, 255); color: rgb(36, 39, 41);">&nbsp;method then you may hash it using something like this:</span></p>', 'Document1581578791_893.jpg', '[{"id":2,"title":"Inspiration"}]', '2020-02-13 12:56:34', '2020-02-13 12:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT '',
  `blogno` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `title`, `slug`, `blogno`, `created_at`, `updated_at`) VALUES
(1, 'category 1', 'category1', 2, '2019-11-21 00:00:00', '2019-11-23 18:42:23'),
(2, 'category 2', 'category2', 3, '2019-11-21 00:00:00', '2019-11-14 00:00:00'),
(3, 'category 3', 'category3', 1, '2019-11-21 00:00:00', '2019-11-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `comment` varchar(1024) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `name`, `email`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello', 'W@gmail.com', 'This is from manoj patel for you and only your task', 1, '2019-11-25 13:46:41', '2019-11-25 13:46:41'),
(2, 0, 'Hello', 'W@gmail.com', 'asdasdsa asdasdad', 1, '2019-11-25 13:47:46', '2019-11-25 13:47:46'),
(3, 5, 'pista', 'pai@gmail.com', 'asdjskd\nasd\n\ndas\nds\nda\ndsdasdd', 1, '2019-11-25 13:49:19', '2019-11-25 13:49:19'),
(4, 5, 'hiren patel', 'hiren@gmail.com', 'shdkaskdsakskdsa', 1, '2019-11-25 14:23:02', '2019-11-25 14:23:02'),
(5, 5, 'aa', 'aa@gmail.com', 'asdsadasdasscasda', 1, '2019-11-25 15:08:46', '2019-11-25 15:08:46'),
(6, 5, 'aa', 'aa@gmail.com', 'sda sda sadasdssa', 1, '2019-11-25 15:08:49', '2019-11-25 15:08:49'),
(7, 5, 'please', 'aa@gmail.com', 'data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"', 1, '2019-11-25 15:18:24', '2019-11-25 15:18:24'),
(8, 5, 'please', 'aa@gmail.com', 'data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"', 1, '2019-11-25 15:18:32', '2019-11-25 15:18:32'),
(9, 3, 'aa', 'am@gmail.com', 'Rick Mofina is a former journalist who has interviewed murderers on death row, flown over L.A. with the LAPD and patrolled with the Royal Canadian Mounted Police near the Arctic. He’s also reported from the Caribbean, Africa and Kuwait’s border with Iraq. His books have been published in nearly 30 countries, including an illegal translation produced in Iran', 1, '2019-11-25 15:42:14', '2019-11-25 15:42:14'),
(10, 3, 'aa', 'am@gmail.com', 'Rick Mofina is a former journalist who has interviewed murderers on death row, flown over L.A. with the LAPD and patrolled with the Royal Canadian Mounted Police near the Arctic. He’s also reported from the Caribbean, Africa and Kuwait’s border with Iraq. His books have been published in nearly 30 countries, including an illegal translation produced in Iran', 1, '2019-11-25 15:42:20', '2019-11-25 15:42:20'),
(11, 3, 'aa', 'am@gmail.com', 'Rick Mofina is a former journalist who has interviewed murderers on death row, flown over L.A. with the LAPD and patrolled with the Royal Canadian Mounted Police near the Arctic. He’s also reported from the Caribbean, Africa and Kuwait’s border with Iraq. His books have been published in nearly 30 countries, including an illegal translation produced in Iran', 1, '2019-11-25 15:42:24', '2019-11-25 15:42:24'),
(12, 2, 'nice one and good for public', 'aa@gmail.com', 'this is extremly good and love to do it', 1, '2020-02-18 13:20:49', '2020-02-18 13:20:49'),
(13, 2, 'nice one and good for public', 'aa@gmail.com', 'sddaddasd sdasdas', 1, '2020-02-18 13:21:13', '2020-02-18 13:21:13'),
(14, 2, 'nice one and good for public', 'aa@gmail.com', 'sddaddasd sdasdas', 1, '2020-02-18 13:21:15', '2020-02-18 13:21:15'),
(15, 2, 'sd', 'aa@gmail.com', 'sdasd sdasdasd asds', 1, '2020-02-18 13:23:44', '2020-02-18 13:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `blog_story`
--

CREATE TABLE `blog_story` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_story`
--

INSERT INTO `blog_story` (`id`, `name`, `creator_id`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Manoj Patel', 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It is a long established fact that', 'Document1574508247_719.jpg', '2019-11-23 15:55:09', '2019-11-23 16:54:28'),
(2, 'Arun Kumar', 1, 'Lorem Ipsum are isaok a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,and scrambled it to make a type sp', 'Document1574506226_193.jpg', '2019-11-23 16:19:58', '2019-11-23 16:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `slug` varchar(500) DEFAULT '',
  `subtitle` varchar(500) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `story` text CHARACTER SET utf8 NOT NULL,
  `location` varchar(100) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `collect_amount` varchar(20) NOT NULL DEFAULT '0',
  `no_of_donor` int(11) NOT NULL DEFAULT '0',
  `collect_percentage` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `tags` varchar(500) DEFAULT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `creator_id`, `project_id`, `title`, `slug`, `subtitle`, `description`, `story`, `location`, `amount`, `collect_amount`, `no_of_donor`, `collect_percentage`, `start_date`, `tags`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '4 Help Save This Kid Who Is Vomiting Blood And Crying In Pain Because Of Blood Cancer', '11117', '3 Help Save This Kid Who Is Vomiting Blood And Crying In Pain Because Of Blood Cancer', '', '', 'Ahmedabad, Gujarat, India', 150, '65', 0, 43, '2019-10-01', '[{"id":1,"title":"Donations"},{"id":2,"title":"Inspiration"}]', '2019-10-11', 1, '2019-10-01 13:24:47', '2019-10-11 21:06:54'),
(2, 1, 8, 'Fighting Cancer With HOPE!', '8888', 'Fighting Cancer With HOPE!', '', '', 'Vastral, Ahmedabad, Gujarat, India', 150000, '0', 0, 35, '2019-10-02', '[{"id":1,"title":"Donations"},{"id":3,"title":"Ploat"}]', '2019-10-18', 1, '2019-10-02 08:30:24', '2019-10-02 08:30:24'),
(3, 170, 6, 'My Mother Is Suffering From Kidney Disease, Her Condition Is Extremely Critical', '1234', 'hello workd My Mother Is Suffering From Kidney Disease, Her Condition Is Extremely Critical', '', '', '', 100, '15', 0, 15, '2019-10-11', '[{"id":2,"title":"Inspiration"}]', '2019-10-26', 1, '2019-10-11 19:55:00', '2019-10-12 17:47:15'),
(5, 170, 1, 'campaign 1', 'campaign-1', 'My Mother Is Suffering From Kidney Disease, Her Condition Is Extr', '', '', 'Vasant Kunj, New Delhi, Delhi, India', 0, '0', 0, 0, '2019-10-16', '[{"id":2,"title":"Inspiration"}]', '2019-10-31', 1, '2019-10-11 20:20:53', '2019-10-18 19:07:28'),
(6, 1, 7, 'campaign 1', 'campaign-1-1', 'My Mother Is Suffering From Kidney Disease, Her Condition Is Extr', '', '', 'Aveiro, Portugal', 1522, '282', 0, 19, '2019-10-16', '[{"id":2,"title":"Inspiration"},{"id":3,"title":"Ploat"}]', '2019-10-31', 1, '2019-10-11 20:23:34', '2019-11-20 12:52:57'),
(7, 1, 8, 'popal', 'popal', 'how are you', '', '', 'Vancouver, BC, Canada', 1500, '0', 0, 0, '2019-10-19', '[{"id":2,"title":"Inspiration"},{"id":3,"title":"Ploat"}]', '2019-12-21', 1, '2019-10-19 11:56:56', '2019-10-19 11:56:56'),
(8, 1, 1, 'bindya', 'bindya', 'bindya', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '20', 0, 1, '2019-11-20', '[{"id":2,"title":"Inspiration"}]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-12-20 15:02:04'),
(9, 1, 8, 'ffffffff1', 'ffffffff1', 'xxxxxxxxx1222', '', '', 'Chennai, Tamil Nadu, India', 15000, '0', 0, 0, '2019-11-20', '[{"id":2,"title":"Inspiration"},{"id":3,"title":"Ploat"}]', '2019-11-29', 1, '2019-11-20 13:35:04', '2019-11-20 13:35:26'),
(10, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '30', 0, 2, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2020-02-07 12:18:40'),
(11, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(12, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(13, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(14, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(15, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(16, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(17, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(18, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(19, 1, 9, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(20, 1, 9, 'pankaj', 'aaasd', 'pankaj udash', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(21, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(22, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(23, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(24, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(25, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(26, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(27, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(28, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(29, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(30, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(31, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(32, 1, 1, 'xxxxxxxxxxx', 'xxxxxxxxxxx', 'yyyyyyyyyyyyyy', '', '', 'Vastral, Ahmedabad, Gujarat, India', 1500, '0', 0, 0, '2019-11-20', '[]', '2020-03-13', 1, '2019-11-20 12:54:40', '2019-11-20 12:54:40'),
(33, 244, 7, 'vasd', 'vasd', 'asdas', '<p><span style="color: rgb(0, 0, 0);">મળતી માહિતી પ્રમાણે, દરોદા ગામની રહેવાસી અંકિતા પિસુદે મહિલા કોલેજમાં શિક્ષિકા છે. તે સોમવારે સવારે લગભગ 7.15 વાગ્યે રોજની જેમ રોડવેઝ બસથી 75 કિમી દૂર કોલેજ જઈ રહી હતી. યુવતી બસમાંથી ઉતરી ત્યારે પહેલાથી હાજર આરોપી વિકેશ નાગરાલે(27) તેની સ્કૂટીમાંથી પેટ્રોલ કાઢીને અંકિતા પાસે આવ્યો હતો. અંકિતા કંઈ પણ સમજી શકે એ પહેલા વિકેશે તેની પર પેટ્રોલ છાંટીને આગ ચાંપી ત્યાંથી ભાગી ગયો હતો. વિકેશ પણ દરોદા ગામનો રહેવાસી છે</span></p>', '<p><span style="color: rgb(0, 0, 0);">મળતી માહિતી પ્રમાણે, દરોદા ગામની રહેવાસી અંકિતા પિસુદે મહિલા કોલેજમાં શિક્ષિકા છે. તે સોમવારે સવારે લગભગ 7.15 વાગ્યે રોજની જેમ રોડવેઝ બસથી 75 કિમી દૂર કોલેજ જઈ રહી હતી. યુવતી બસમાંથી ઉતરી ત્યારે પહેલાથી હાજર આરોપી વિકેશ નાગરાલે(27) તેની સ્કૂટીમાંથી પેટ્રોલ કાઢીને અંકિતા પાસે આવ્યો હતો. અંકિતા કંઈ પણ સમજી શકે એ પહેલા વિકેશે તેની પર પેટ્રોલ છાંટીને આગ ચાંપી ત્યાંથી ભાગી ગયો હતો. વિકેશ પણ દરોદા ગામનો રહેવાસી છે</span></p>', '', 0, '0', 0, 0, '2020-02-04', '[{"id":2,"title":"Inspiration"}]', '2020-02-21', 1, '2020-02-04 16:02:30', '2020-02-04 16:02:30'),
(34, 251, 8, 'org vednats campaign', 'org-vednats-campaign', 'org vednats campaign here', '<p><strong>Sometimes</strong>, when I tell people that I blog for a living, they roll their eyes. "That\'s so easy," they say. "You get a paycheck for sitting on the internet all day and writing. A monkey <span style="background-color: rgb(102, 185, 102);">could do your job!</span>"</p><p><br></p><p><br></p><p>That\'s when I roll my eyes. See, <strong class="ql-size-large">people</strong> are quick to deem blogging as a no-brainer job. But when they actually sit down to write their first couple of posts, it hits them: This is way harder than I thought. Like any person starting a new job, they mess things up.</p>', '<p>Simply put, a blog is a tool that can help develop an online presence, attract leads, and engage with an audience. It\'s often a series of editorial content centered around a central topic that demonstrates industry expertise -- for instance, a catering company might write blog posts like "The 11 Best Appetizers to Serve to a Crowd" or "Stress-Free Dinner Parties: Recipes that are Prepared Ahead of Time".</p><p><br></p><p><span style="color: rgb(107, 36, 178);" class="ql-size-huge">Blogs</span> can help drive traffic to your website, convert that traffic into leads, establish authority in your industry, and&nbsp;<a href="https://blog.hubspot.com/marketing/what-is-a-blog?_ga=2.117054918.1559363486.1561986372-527251855.1560789477" target="_blank" style="color: rgb(0, 145, 174);">ultimately grow your business</a>. In fact, organizations are&nbsp;<a href="https://www.hubspot.com/marketing-statistics?_ga=2.222693727.558674788.1561985800-983944916.1546275206" target="_blank" style="color: rgb(0, 145, 174);">13x more likely to see positive ROI</a>&nbsp;by prioritizing blogging.&nbsp;</p><p><br></p><p>Most of a blog\'s traffic is driven organically -- in other words, consumers will search for something on a search engine and click on your blog if it matches their intended topic. However, there are a lot of organizations competing for your audience\'s attention, so it\'s important to avoid common blog mistakes to stand out.&nbsp;&nbsp;</p>', 'Vastral, Ahmedabad, Gujarat, India', 15000, '0', 0, 0, '2020-02-13', '[{"id":2,"title":"Inspiration"}]', '2020-07-17', 1, '2020-02-13 12:13:21', '2020-03-09 13:19:53'),
(35, 251, 6, 'c', 'c', 'c', '<p>asd</p>', '<p>asd</p>', 'Vashi, Navi Mumbai, Maharashtra, India', 1000, '0', 0, 0, '2020-02-13', '[{"id":2,"title":"Inspiration"}]', '2020-02-27', 1, '2020-02-13 13:04:01', '2020-02-13 13:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_collection`
--

CREATE TABLE `campaign_collection` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT '0',
  `bill_no` varchar(15) DEFAULT NULL,
  `reference` varchar(150) DEFAULT NULL,
  `expense_category` int(11) NOT NULL DEFAULT '0',
  `paiddate` date DEFAULT NULL,
  `project_stage` varchar(50) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `respose_user` int(11) DEFAULT '0',
  `txtfirstname` varchar(30) DEFAULT NULL,
  `txtlastname` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `txtemail` varchar(200) DEFAULT NULL,
  `txtphone` varchar(20) DEFAULT NULL,
  `payment_id` varchar(60) DEFAULT NULL,
  `amount` varchar(10) DEFAULT '0',
  `txtaddress1` varchar(200) DEFAULT NULL,
  `txtaddress2` varchar(200) DEFAULT NULL,
  `txtstate` varchar(30) DEFAULT NULL,
  `txtzipcode` varchar(10) DEFAULT NULL,
  `txtcountry` varchar(30) DEFAULT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'web' COMMENT '''web'',''payment'',''expense'',''''',
  `is_payment` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=payment received 0=expense',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_collection`
--

INSERT INTO `campaign_collection` (`id`, `campaign_id`, `project_id`, `bill_no`, `reference`, `expense_category`, `paiddate`, `project_stage`, `description`, `respose_user`, `txtfirstname`, `txtlastname`, `date`, `txtemail`, `txtphone`, `payment_id`, `amount`, `txtaddress1`, `txtaddress2`, `txtstate`, `txtzipcode`, `txtcountry`, `type`, `is_payment`, `created_at`, `updated_at`) VALUES
(51, 0, 10, '150', 'asdsada', 0, NULL, '', 'chik', 156, 'hiren', '', '2020-03-04', '', '', '', '2', '', '', '', '', '', 'Net-Banking', 0, '2020-03-04 20:05:31', '2020-03-04 20:05:31'),
(52, 0, 10, '150', 'asdsada', 0, NULL, '', 'chik', 156, 'hiren', '', '2020-03-04', '', '', '', '250', '', '', '', '', '', 'Net-Banking', 0, '2020-03-04 20:07:00', '2020-03-04 20:07:00'),
(54, 0, 10, 'no123', 'get by check it', 3, NULL, '', 'hello item', 154, 'manoj patel', '', '2020-03-04', '', '', '', '150', '', '', '', '', '', 'Cheque', 0, '2020-03-04 20:24:13', '2020-03-04 20:24:13'),
(74, 0, 13, '1500', 'this is good babes', 4, '2020-03-11', '', 'viper purchase', 166, 'hiren shah', '', '2020-03-11', '', '', '', '150', '', '', '', '', '', 'Cheque', 1, '2020-03-05 16:06:11', '2020-03-05 16:06:11'),
(76, NULL, 13, NULL, NULL, 0, NULL, 'Design', 'sda sdasdasd asdasd asdasd', 157, 'great kahli', NULL, '2001-11-22', NULL, NULL, NULL, '800', NULL, NULL, NULL, NULL, NULL, 'payment', 1, '2020-03-07 15:29:08', '2020-03-07 15:29:08'),
(77, NULL, 13, NULL, NULL, 0, '2019-11-20', 'Plan', 'genrate electricity ride', 159, 'love rose', NULL, '2019-11-20', NULL, NULL, NULL, '19', NULL, NULL, NULL, NULL, NULL, 'payment', 1, '2020-03-07 15:35:24', '2020-03-07 15:35:24'),
(79, 0, 8, 'aas', 'sdsadsa', 13, '2020-03-10', '', 'asssss', 161, 'bbb', '', '2020-03-05', '', '', '', '111', '', '', '', '', '', 'Net-Banking', 0, '2020-03-07 18:03:39', '2020-03-07 18:03:39'),
(80, 0, 8, 'aa', 'ccc', 1, '2020-03-18', '', 'sss', 156, '', '', '2020-03-12', '', '', '', '122', '', '', '', '', '', 'Cheque', 0, '2020-03-07 18:04:14', '2020-03-07 18:04:14'),
(85, 0, 13, '1500', 'this is good babes', 4, '2020-03-11', '', 'viper purchase 2', 166, 'hiren shah', '', '2020-03-09', '', '', '', '150', '', '', '', '', '', 'Cheque', 0, '2020-03-09 12:22:18', '2020-03-09 12:22:18'),
(86, 0, 13, '1500', 'this is good babes', 4, '2020-03-11', '', 'viper purchase 4 updates for you', 166, 'hiren shah', '', '2020-03-09', '', '', '', '150', '', '', '', '', '', 'Cheque', 0, '2020-03-09 12:22:35', '2020-03-09 12:28:26'),
(88, 0, 13, '1001', 'this book purchased by manoj for poor kids and enjoy it good', 17, '2020-03-04', '', 'purchase books', 157, 'Manoj patel', '', '2020-03-05', '', '', '', '1001', '', '', '', '', '', 'Cheque', 0, '2020-03-09 12:37:24', '2020-03-09 12:37:24'),
(89, 0, 8, '66', 'yes', 15, '2020-03-08', '', 'test', 157, 'hiu', '', '2020-03-10', '', '', '', '12.5100', '', '', '', '', '', 'Cheque', 0, '2020-03-09 15:16:56', '2020-03-09 15:16:56'),
(90, 0, 13, '8800', 'test', 4, '2020-03-06', '', 'test', 170, 'yahoo', '', '2020-03-10', '', '', '', '45.30', '', '', '', '', '', 'Net-Banking', 0, '2020-03-09 15:17:49', '2020-03-09 15:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_comment`
--

CREATE TABLE `campaign_comment` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `comment` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_comment`
--

INSERT INTO `campaign_comment` (`id`, `campaign_id`, `name`, `email`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(40, 6, NULL, NULL, 'Please tack care', 1, '2019-10-21 17:31:24', '2019-10-21 17:31:24'),
(47, 6, NULL, NULL, 'sdasdasdas asdass', 1, '2019-10-21 18:57:47', '2019-10-21 18:57:47'),
(49, 6, NULL, NULL, 'ccccccccccccc', 1, '2019-10-21 20:29:15', '2019-10-21 20:29:15'),
(50, 6, NULL, NULL, 'asdassadasdad', 1, '2019-10-22 15:03:38', '2019-10-22 15:03:38'),
(51, 6, NULL, NULL, 'love to workload love to workloadlove to workloadlove to workloadlove to workload', 1, '2019-10-22 15:12:32', '2019-10-22 15:12:32'),
(52, 6, NULL, NULL, 'stop encourage please ignore it', 1, '2019-10-22 15:15:25', '2019-10-22 15:15:25'),
(53, 6, NULL, NULL, 'avvvasdasdasddasd', 0, '2019-10-22 15:32:49', '2019-10-22 15:32:49'),
(54, 6, NULL, NULL, 'sdasdsdsadadsd', 2, '2019-10-22 18:51:56', '2019-10-22 18:51:56'),
(55, 6, NULL, NULL, 'daasdasdasd', 2, '2019-10-23 15:33:46', '2019-10-23 15:33:46'),
(56, 1, NULL, NULL, 'asdasdasdas dasdad', 2, '2019-10-23 20:27:24', '2019-10-23 20:27:24'),
(57, 6, 'Dinesg', 'dinesh@gmail.com', 'Hello working', 2, '2019-10-24 14:54:12', '2019-10-24 14:54:12'),
(58, 6, 'Manoj Kumar', 'manoj@gmail.com', 'hope you doing well', 2, '2019-10-24 15:10:20', '2019-10-24 15:10:20'),
(59, 6, '', '', 'asjdkjdaksjkdjakjdkasd', 2, '2019-10-25 18:16:56', '2019-10-25 18:16:56'),
(60, 6, 'dsdasdsdd', 'aak@gmail.com', '', 2, '2019-10-25 19:29:48', '2019-10-25 19:29:48'),
(61, 4, 'manoj', 'patel@patel.com', 'good i like this camp', 1, '2019-11-15 19:20:31', '2019-11-15 19:20:31'),
(62, 8, 'Manoj', 'manoj@gmail.com', 'Manoj Patel  he sjdhajs hsdsj asjd djhjk jsdkjasdasdjkk skjasdjaskdj jksjdaksjdksjkksjk jkjkj jskdajs jkk\nsdas\nas sd   sdkajskdjskd jkjkslakls  jsdkajsdklajs kjskdjlasjdk', 1, '2019-11-25 13:10:44', '2019-11-25 13:10:44'),
(63, 9, 'a', 'aa@gmail.com', 'data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"', 1, '2019-11-25 15:21:07', '2019-11-25 15:21:07'),
(64, 9, 'a', 'aa@gmail.com', 'data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"', 1, '2019-11-25 15:21:13', '2019-11-25 15:21:13'),
(65, 9, 'a', 'aa@gmail.com', 'data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"', 1, '2019-11-25 15:21:17', '2019-11-25 15:21:17'),
(66, 9, 'a', 'aa@gmail.com', 'data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"', 1, '2019-11-25 15:21:27', '2019-11-25 15:21:27'),
(67, 34, 'asd', 'aak@gmail.com', 'asdas asd sasd sdasd asdas asd sasd sdasd asdas asd sasd sdasd asdas asd sasd sdasd asdas asd sasd sdasd asdas asd sasd sdasd asdas asd sasd sdasd asdas asd sasd sdasd', 1, '2020-02-18 13:26:31', '2020-02-18 13:26:31'),
(68, 34, 'hiren', 'hiren@gmial.com', 'dasdas as asds babcbcbcbcbccbbcbccbcccb', 1, '2020-02-18 13:32:24', '2020-02-18 13:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_contact`
--

CREATE TABLE `campaign_contact` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_contact`
--

INSERT INTO `campaign_contact` (`id`, `campaign_id`, `user_id`, `comment`, `name`, `email`, `created_at`, `updated_at`) VALUES
(2, 6, 2, 'cccccccccccccddddddddd', 'nnnnnnn', 'aa@gmail.com', '2019-10-26 11:21:37', '2019-10-26 11:21:37'),
(3, 6, 2, 'ccccccccccasdsdasdasdas', 'manoj', 'manoj@gmail.com', '2019-10-26 12:31:25', '2019-10-26 12:31:25'),
(4, 6, 2, 'sdasdaasdasdad', 'manoj', 'manoj@gmail.com', '2019-10-26 12:32:03', '2019-10-26 12:32:03'),
(5, 6, 2, 'Hello dear jindgi', 'vvv', 'aa@gmail.com', '2019-10-26 12:37:02', '2019-10-26 12:37:02'),
(6, 6, 2, 'Hello dear jindgi', 'vvv', 'aa@gmail.com', '2019-10-26 12:37:50', '2019-10-26 12:37:50'),
(7, 6, 2, 'Hello dear jindgi', 'vvv', 'aa@gmail.com', '2019-10-26 12:38:03', '2019-10-26 12:38:03'),
(8, 6, 2, 'Hello dear jindgi', 'vvv', 'aa@gmail.com', '2019-10-26 12:42:11', '2019-10-26 12:42:11'),
(9, 6, 2, 'Hello dear jindgi', 'vvv', 'aa@gmail.com', '2019-10-26 12:43:43', '2019-10-26 12:43:43'),
(10, 6, 2, 'hello teasrmsda as ldklajsdklasjkdjlk aslkdjskjdalsjdkaljs', 'manoj', 'mano@gmail.com', '2019-10-26 12:47:13', '2019-10-26 12:47:13'),
(11, 6, 2, 'hello teasrmsda as ldklajsdklasjkdjlk aslkdjskjdalsjdkaljs', 'manoj', 'mano@gmail.com', '2019-10-26 12:49:45', '2019-10-26 12:49:45'),
(12, 6, 2, 'hello teasrmsda as ldklajsdklasjkdjlk aslkdjskjdalsjdkaljs', 'manoj', 'mano@gmail.com', '2019-10-26 13:17:55', '2019-10-26 13:17:55'),
(13, 6, 2, 'hello teasrmsda as ldklajsdklasjkdjlk aslkdjskjdalsjdkaljs', 'manoj', 'mano@gmail.com', '2019-10-26 13:18:49', '2019-10-26 13:18:49'),
(14, 6, 2, 'hello teasrmsda as ldklajsdklasjkdjlk aslkdjskjdalsjdkaljs', 'manoj', 'mano@gmail.com', '2019-10-26 13:23:07', '2019-10-26 13:23:07'),
(15, 6, 2, 'hello teasrmsda as ldklajsdklasjkdjlk aslkdjskjdalsjdkaljs', 'manoj', 'mano@gmail.com', '2019-10-26 13:23:54', '2019-10-26 13:23:54'),
(16, 6, 2, 'hello teasrmsda as ldklajsdklasjkdjlk aslkdjskjdalsjdkaljs', 'manoj', 'mano@gmail.com', '2019-10-26 13:24:38', '2019-10-26 13:24:38'),
(17, 6, 2, 'hello teasrmsda as ldklajsdklasjkdjlk aslkdjskjdalsjdkaljs', 'manoj', 'mano@gmail.com', '2019-10-26 13:29:13', '2019-10-26 13:29:13'),
(18, 6, 2, 'hello teasrmsda as ldklajsdklasjkdjlk aslkdjskjdalsjdkaljs', 'manoj', 'mano@gmail.com', '2019-10-26 14:11:29', '2019-10-26 14:11:29'),
(19, 4, 2, 'hi this is my date 15 nov 20189', 'Manoj', 'manoj.infoways@gmail.com', '2019-11-15 17:00:28', '2019-11-15 17:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_images`
--

CREATE TABLE `campaign_images` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `image` varchar(60) NOT NULL,
  `thumb` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_images`
--

INSERT INTO `campaign_images` (`id`, `campaign_id`, `image`, `thumb`, `type`, `created_at`, `updated_at`) VALUES
(2, 1, 'Document1569936275_381.jpeg', '', 'img', '2019-10-01 13:24:48', '2019-10-01 13:24:48'),
(4, 2, 'Document1570005014_402.jpeg', '', 'img', '2019-10-02 08:30:25', '2019-10-02 08:30:25'),
(5, 3, 'Document1570803889_146.jpeg', '', 'img', '2019-10-11 19:55:00', '2019-10-11 19:55:00'),
(6, 3, 'Document1570803893_409.jpg', '', 'img', '2019-10-11 19:55:00', '2019-10-11 19:55:00'),
(9, 6, 'Document1570805608_476.jpg', '', 'img', '2019-10-11 20:23:34', '2019-10-11 20:23:34'),
(10, 5, 'Document1571404411_759.jpg', '', 'img', '2019-10-18 18:43:42', '2019-10-18 18:43:42'),
(11, 5, 'Document1571404419_477.jpg', '', 'img', '2019-10-18 18:43:43', '2019-10-18 18:43:43'),
(12, 7, 'Document1571466347_370.jpg', '', 'img', '2019-10-19 11:56:56', '2019-10-19 11:56:56'),
(13, 7, 'Document1571466355_996.jpg', '', 'img', '2019-10-19 11:56:57', '2019-10-19 11:56:57'),
(14, 7, 'Document1571466363_164.jpg', 'img', 'doc', '2019-10-19 11:56:57', '2019-10-19 11:56:57'),
(15, 7, 'Document1571466367_748.jpg', 'img', 'doc', '2019-10-19 11:56:57', '2019-10-19 11:56:57'),
(16, 9, 'Document1576833697_694.jpg', '', 'img', '2019-12-20 14:51:48', '2019-12-20 14:51:48'),
(17, 9, 'Document1576833706_856.jpg', '', 'img', '2019-12-20 14:51:48', '2019-12-20 14:51:48'),
(18, 9, 'Document1576833702_764.jpg', 'img', 'doc', '2019-12-20 14:51:48', '2019-12-20 14:51:48'),
(19, 8, 'Document1576834259_256.jpeg', '', 'img', '2019-12-20 15:01:06', '2019-12-20 15:01:06'),
(20, 8, 'Document1576834262_364.jpg', '', 'img', '2019-12-20 15:01:07', '2019-12-20 15:01:07'),
(21, 34, 'Document1581576191_668.jpg', '', 'img', '2020-02-13 12:13:21', '2020-02-13 12:13:21'),
(22, 34, 'Document1581576199_669.jpg', 'img', 'doc', '2020-02-13 12:13:21', '2020-02-13 12:13:21'),
(23, 35, 'Document1581579235_222.jpg', '', 'img', '2020-02-13 13:04:02', '2020-02-13 13:04:02'),
(24, 35, 'Document1581579239_494.png', 'img', 'doc', '2020-02-13 13:04:02', '2020-02-13 13:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_team`
--

CREATE TABLE `campaign_team` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_team`
--

INSERT INTO `campaign_team` (`id`, `campaign_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 1, 156, '2019-10-01 13:34:52', '2019-10-01 13:34:52'),
(4, 1, 166, '2019-10-01 13:34:52', '2019-10-01 13:34:52'),
(5, 2, 174, '2019-10-02 08:30:24', '2019-10-02 08:30:24'),
(6, 2, 185, '2019-10-02 08:30:24', '2019-10-02 08:30:24'),
(7, 3, 154, '2019-10-11 19:55:00', '2019-10-11 19:55:00'),
(8, 3, 157, '2019-10-11 19:55:00', '2019-10-11 19:55:00'),
(9, 3, 169, '2019-10-11 19:55:00', '2019-10-11 19:55:00'),
(22, 5, 159, '2019-10-18 19:07:28', '2019-10-18 19:07:28'),
(23, 5, 166, '2019-10-18 19:07:28', '2019-10-18 19:07:28'),
(30, 7, 157, '2019-10-19 11:56:56', '2019-10-19 11:56:56'),
(31, 7, 164, '2019-10-19 11:56:56', '2019-10-19 11:56:56'),
(60, 6, 157, '2019-11-20 12:52:57', '2019-11-20 12:52:57'),
(61, 6, 171, '2019-11-20 12:52:57', '2019-11-20 12:52:57'),
(67, 9, 156, '2019-12-20 14:51:48', '2019-12-20 14:51:48'),
(68, 9, 157, '2019-12-20 14:51:48', '2019-12-20 14:51:48'),
(69, 8, 157, '2019-12-20 15:01:06', '2019-12-20 15:01:06'),
(70, 33, 156, '2020-02-04 16:02:30', '2020-02-04 16:02:30'),
(72, 35, 156, '2020-02-13 13:04:01', '2020-02-13 13:04:01'),
(73, 35, 169, '2020-02-13 13:04:01', '2020-02-13 13:04:01'),
(75, 34, 156, '2020-03-09 13:19:53', '2020-03-09 13:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group`
--

CREATE TABLE `chat_group` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL DEFAULT '0',
  `institute_id` int(11) NOT NULL DEFAULT '0',
  `group_name` varchar(200) DEFAULT '',
  `icon` varchar(100) DEFAULT NULL,
  `total_member` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_group`
--

INSERT INTO `chat_group` (`id`, `creator_id`, `institute_id`, `group_name`, `icon`, `total_member`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kharagpur Group', 'Document1574504707_429.jpg', 2, '2020-02-18 05:16:13', '2020-02-27 16:39:40'),
(2, 1, 0, 'Success Quotes', 'Document1574506167_2.jpg', 1, '2020-02-18 05:16:13', '2020-02-27 16:02:07'),
(5, 0, 0, 'google works', 'Document1582887682_404.jpg', 0, '2020-02-28 16:31:24', '2020-02-29 16:00:27'),
(6, 0, 0, 'Pankaj Friend club', 'Document1582890888_865.png', 0, '2020-02-28 17:25:40', '2020-02-29 15:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group_member`
--

CREATE TABLE `chat_group_member` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_group_member`
--

INSERT INTO `chat_group_member` (`id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 244, '2020-02-26 00:00:00', '2020-02-20 00:00:00'),
(2, 1, 243, '2020-02-12 00:25:00', '2020-02-26 00:19:00'),
(3, 3, 156, '2020-02-28 16:18:43', '2020-02-28 16:18:43'),
(4, 3, 159, '2020-02-28 16:18:43', '2020-02-28 16:18:43'),
(7, 5, 156, '2020-02-28 16:31:24', '2020-02-28 16:31:24'),
(8, 5, 244, '2020-02-28 16:31:24', '2020-02-28 16:31:24'),
(19, 4, 159, '2020-02-28 19:17:08', '2020-02-28 19:17:08'),
(20, 4, 171, '2020-02-28 19:17:08', '2020-02-28 19:17:08'),
(21, 6, 154, '2020-02-29 15:58:57', '2020-02-29 15:58:57'),
(22, 6, 237, '2020-02-29 15:58:57', '2020-02-29 15:58:57'),
(23, 6, 244, '2020-02-29 15:58:57', '2020-02-29 15:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group_messages`
--

CREATE TABLE `chat_group_messages` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `message` varchar(2024) DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `read_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_group_messages`
--

INSERT INTO `chat_group_messages` (`id`, `group_id`, `message`, `sender_id`, `is_active`, `read_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'mazakaro bhai ', 244, 1, 0, '2020-02-19 00:00:00', '2020-02-05 00:00:00'),
(2, 1, 'jai bharat. jai mataji', 243, 1, 0, '2020-02-19 00:00:00', '2020-02-05 00:00:00'),
(3, 2, 'jams bond', 243, 1, 0, '2020-02-19 00:00:00', '2020-02-03 01:00:00'),
(4, 2, 'jams bond bbas', 1, 1, 0, '2020-02-19 00:00:00', '2020-02-03 01:00:00'),
(7, 1, 'success q', 1, 0, 0, '2020-02-27 16:01:28', '2020-02-27 16:01:28'),
(8, 1, 'kharagpura', 1, 0, 0, '2020-02-27 16:02:07', '2020-02-27 16:02:07'),
(9, 1, 'performance', 244, 0, 0, '2020-02-27 16:39:40', '2020-02-27 16:39:40'),
(10, 5, 'google work https://www.google.com/   and goto heaven', 244, 0, 0, '2020-02-28 17:17:27', '2020-02-28 17:17:27'),
(11, 5, 'yes its working charm https://codepen.io/zuhairtaha/pen/NmbGKJ', 1, 0, 0, '2020-02-29 13:00:14', '2020-02-29 13:00:14'),
(12, 5, 'https://www.google.com/', 1, 0, 0, '2020-02-29 15:39:47', '2020-02-29 15:39:47'),
(13, 5, ':)', 1, 0, 0, '2020-02-29 16:00:17', '2020-02-29 16:00:17'),
(14, 5, 'http://localhost/innereye/crm/admin/groupchat', 1, 0, 0, '2020-02-29 16:00:27', '2020-02-29 16:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `chat_individual`
--

CREATE TABLE `chat_individual` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `message` varchar(2045) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `read_status` tinyint(4) NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_individual`
--

INSERT INTO `chat_individual` (`id`, `chat_id`, `message`, `sender_id`, `receiver_id`, `read_status`, `updated_at`, `created_at`) VALUES
(98, 9, 'p', 1, 243, 0, '2020-01-20 12:24:09', '2020-01-17 12:36:45'),
(99, 10, 'hi land', 1, 241, 0, '2020-01-20 12:24:09', '2020-01-17 12:37:09'),
(100, 11, 'hi pin', 1, 237, 0, '2020-01-20 12:24:09', '2020-01-17 12:37:27'),
(101, 12, 'po', 1, 225, 0, '2020-01-20 12:24:09', '2020-01-17 12:37:49'),
(102, 12, 'll', 1, 225, 0, '2020-01-20 12:24:09', '2020-01-17 13:16:02'),
(103, 12, 's', 1, 225, 0, '2020-01-20 12:24:09', '2020-01-17 13:16:06'),
(104, 12, 'asd', 1, 225, 0, '2020-01-20 12:24:09', '2020-01-17 13:16:09'),
(105, 12, 'sdas', 1, 225, 0, '2020-01-20 12:24:09', '2020-01-17 13:16:12'),
(106, 12, 'x', 1, 225, 0, '2020-01-20 12:24:09', '2020-01-17 13:16:20'),
(107, 13, 'hi', 244, 1, 1, '2020-01-21 18:50:00', '2020-01-17 20:55:53'),
(108, 13, 'yes mr p', 1, 244, 1, '2020-01-22 12:29:57', '2020-01-20 11:50:57'),
(109, 13, 'i need your https://codepen.io/ help', 244, 1, 1, '2020-01-21 18:50:00', '2020-01-20 11:51:56'),
(110, 13, 'said', 1, 244, 1, '2020-01-22 12:29:57', '2020-01-20 11:52:34'),
(111, 13, 'good moring', 1, 244, 1, '2020-01-22 12:29:57', '2020-01-20 12:07:30'),
(112, 13, 'sir', 1, 244, 1, '2020-01-22 12:29:57', '2020-01-20 12:07:39'),
(113, 13, 'opop', 1, 244, 1, '2020-01-22 12:29:57', '2020-01-20 12:18:57'),
(114, 13, 'hi', 1, 244, 1, '2020-01-22 12:29:57', '2020-01-20 12:26:23'),
(115, 13, 'p', 244, 1, 1, '2020-01-21 18:50:00', '2020-01-20 12:33:55'),
(116, 13, 'ok', 1, 244, 1, '2020-01-22 12:29:57', '2020-01-20 12:34:11'),
(117, 13, 'pako', 244, 1, 1, '2020-01-21 18:50:00', '2020-01-20 12:38:10'),
(118, 13, 'ban', 244, 1, 1, '2020-01-21 18:50:00', '2020-01-20 12:38:20'),
(119, 13, 'kem bura', 244, 1, 1, '2020-01-21 18:50:00', '2020-01-20 12:40:55'),
(120, 13, 'as', 1, 244, 1, '2020-01-22 12:29:57', '2020-01-20 12:44:27'),
(121, 13, '[[', 244, 1, 1, '2020-01-21 18:50:00', '2020-01-20 12:51:36'),
(122, 13, '63..', 1, 244, 1, '2020-01-22 12:29:57', '2020-01-20 12:52:16'),
(123, 14, 'wonder loss', 1, 159, 0, '2020-01-20 17:43:11', '2020-01-20 17:43:11'),
(124, 14, 'hi', 1, 159, 0, '2020-01-21 11:51:02', '2020-01-21 11:51:02'),
(125, 14, 'hi', 1, 159, 0, '2020-01-21 11:51:15', '2020-01-21 11:51:15'),
(126, 11, 'hi pink', 1, 237, 0, '2020-01-21 11:51:43', '2020-01-21 11:51:43'),
(127, 12, 'asda', 1, 225, 0, '2020-01-21 15:35:51', '2020-01-21 15:35:51'),
(128, 15, 'asdas', 1, 150, 0, '2020-01-21 15:35:58', '2020-01-21 15:35:58'),
(129, 16, 'asd.', 1, 242, 0, '2020-01-21 15:39:16', '2020-01-21 15:39:16'),
(130, 15, 'xxx', 1, 150, 0, '2020-01-21 17:46:48', '2020-01-21 17:46:48'),
(131, 16, 'lady', 1, 242, 0, '2020-01-21 17:51:30', '2020-01-21 17:51:30'),
(132, 15, 'hi 150', 1, 150, 0, '2020-01-21 17:59:53', '2020-01-21 17:59:53'),
(133, 12, 'pi', 1, 225, 0, '2020-01-21 18:02:08', '2020-01-21 18:02:08'),
(134, 15, 'hi', 1, 150, 0, '2020-01-21 18:02:42', '2020-01-21 18:02:42'),
(135, 11, 'hi pink', 1, 237, 0, '2020-01-21 18:08:45', '2020-01-21 18:08:45'),
(136, 15, 'lady', 1, 150, 0, '2020-01-21 18:15:51', '2020-01-21 18:15:51'),
(137, 11, 'pi 237', 1, 237, 0, '2020-01-21 18:19:25', '2020-01-21 18:19:25'),
(138, 15, 'ldy', 1, 150, 0, '2020-01-21 18:24:10', '2020-01-21 18:24:10'),
(139, 16, '242 hu', 1, 242, 0, '2020-01-21 18:27:00', '2020-01-21 18:27:00'),
(140, 15, 'lay', 1, 150, 0, '2020-01-21 18:27:52', '2020-01-21 18:27:52'),
(141, 11, 'pik', 1, 237, 0, '2020-01-21 18:28:04', '2020-01-21 18:28:04'),
(142, 16, 'pisd', 1, 242, 0, '2020-01-21 18:50:30', '2020-01-21 18:50:30'),
(143, 15, 'x', 1, 150, 0, '2020-01-21 19:00:21', '2020-01-21 19:00:21'),
(144, 11, 'pik', 1, 237, 0, '2020-01-21 19:01:41', '2020-01-21 19:01:41'),
(145, 16, 'hu', 1, 242, 0, '2020-01-21 19:07:22', '2020-01-21 19:07:22'),
(146, 15, 'lagos', 1, 150, 0, '2020-01-21 19:08:10', '2020-01-21 19:08:10'),
(147, 14, '159', 1, 159, 0, '2020-01-21 19:08:30', '2020-01-21 19:08:30'),
(148, 13, 'ok', 1, 244, 1, '2020-01-22 12:29:57', '2020-01-21 19:14:54'),
(149, 17, 'hi deal', 244, 243, 0, '2020-01-22 12:51:33', '2020-01-22 12:51:33'),
(150, 18, 'lady', 244, 150, 0, '2020-01-22 12:52:11', '2020-01-22 12:52:11'),
(151, 19, 'hi', 223, 33, 0, '2020-01-23 12:29:57', '2020-01-23 12:29:57'),
(152, 20, 'hi', 244, 33, 0, '2020-02-08 16:37:01', '2020-02-08 16:37:01'),
(153, 21, 'asd', 1, 2, 0, '2020-02-27 15:38:22', '2020-02-27 15:38:22'),
(154, 21, 'asdsdas', 1, 2, 0, '2020-02-27 15:38:37', '2020-02-27 15:38:37'),
(155, 21, 'good', 1, 2, 0, '2020-02-27 15:42:23', '2020-02-27 15:42:23'),
(156, 21, 'https://www.google.com/', 1, 2, 0, '2020-02-29 15:39:32', '2020-02-29 15:39:32'),
(157, 13, 'https://codepen.io/ click here', 1, 244, 1, '2020-02-29 19:29:48', '2020-02-29 15:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `chat_master`
--

CREATE TABLE `chat_master` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_master`
--

INSERT INTO `chat_master` (`id`, `sender_id`, `receiver_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 243, 0, '2020-01-17 12:36:45', '2020-01-17 12:36:45'),
(10, 1, 241, 0, '2020-01-17 12:37:09', '2020-01-17 12:37:09'),
(11, 1, 237, 0, '2020-01-17 12:37:27', '2020-01-21 19:01:41'),
(12, 1, 225, 0, '2020-01-17 12:37:49', '2020-01-21 18:02:08'),
(13, 244, 1, 0, '2020-01-17 20:55:53', '2020-02-29 15:45:06'),
(14, 1, 159, 0, '2020-01-20 17:43:11', '2020-01-21 19:08:30'),
(15, 1, 150, 0, '2020-01-21 15:35:58', '2020-01-21 19:08:10'),
(16, 1, 242, 0, '2020-01-21 15:39:16', '2020-01-21 19:07:22'),
(17, 244, 243, 0, '2020-01-22 12:51:33', '2020-01-22 12:51:33'),
(18, 244, 150, 0, '2020-01-22 12:52:11', '2020-01-22 12:52:11'),
(19, 223, 33, 0, '2020-01-23 12:29:57', '2020-01-23 12:29:57'),
(20, 244, 33, 0, '2020-02-08 16:37:01', '2020-02-08 16:37:01'),
(21, 1, 2, 0, '2020-02-27 15:38:22', '2020-02-29 15:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `creator_id` int(11) DEFAULT '1',
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(1024) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `seats` int(11) NOT NULL DEFAULT '0',
  `attendee` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `location` varchar(255) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `reminderdatetime` datetime DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `lng` varchar(20) DEFAULT '0',
  `tags` varchar(1024) DEFAULT '0',
  `status` int(11) DEFAULT '1' COMMENT '1=upcoming 2=completed 3=canceled',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `project_id`, `creator_id`, `title`, `slug`, `sub_title`, `seats`, `attendee`, `description`, `location`, `startdatetime`, `enddatetime`, `reminderdatetime`, `lat`, `lng`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'firsttitle33', 'oeas', 'secondtitle 111', 30, 0, '<p>Very goood </p><p><br></p><p>love <span style="color: rgb(230, 0, 0);">you</span> doosto</p>', 'Vila do Conde, Portugal', NULL, NULL, NULL, '41.43846941470099', '-8.295329555859325', '', 1, '2019-08-28 14:19:41', '2019-08-28 14:49:07'),
(2, 1, 1, 'Pankit', 'weh', 'Pushkar', 30, 0, '<p>This is wonder land</p>', 'Almería, Spain', NULL, NULL, NULL, '36.834047', '-2.4637136000000055', '', 1, '2019-08-29 13:13:34', '2019-08-29 13:13:34'),
(3, 1, 1, 'sasd', 'srt', 'asdas', 2, 0, '<p>Hello world this is good </p><p><br></p><p><span style="color: rgb(230, 0, 0);" class="ql-size-large">Experiance</span></p><p><br></p><p><span style="color: rgb(230, 0, 0);" class="ql-size-large">Never give up sd</span></p><p><br></p><p><br></p>', '250 Vesey Street, New York, NY, USA', NULL, NULL, NULL, '40.7140998', '-74.01611029999998', '', 1, '2019-08-29 13:25:31', '2019-08-29 13:25:31'),
(6, 1, 1, 'asdas', 'xxxas', 'dasdd', 2, 0, '<p>Hello world this is good </p><p><br></p><p><span style="color: rgb(230, 0, 0);" class="ql-size-large">Experiance</span></p><p><br></p><p><span style="color: rgb(230, 0, 0);" class="ql-size-large">Never give up sd</span></p><p><br></p><p><br></p>', '0', NULL, NULL, NULL, '40.7140998', '-74.01611029999998', '', 1, '2019-08-29 13:51:34', '2019-08-29 13:51:34'),
(7, 6, 1, 'Poratn as', 'asg4', 'akshar', 2, 0, '<p>sdas</p><p>das</p><p>dsda</p><p>ds</p><p>das</p><p>d</p><p><br></p>', 'Vashi Bridge, Navi Mumbai, Maharashtra, India', NULL, NULL, NULL, '19.155766233778778', '73.24163571210943', '', 1, '2019-08-29 13:53:05', '2019-08-29 14:28:01'),
(8, 8, 1, 'Vrundavan Party ploat', 'as', 'sasdsads', 12, 0, '<p>sdasdada</p>', 'Västerås, Sweden', NULL, NULL, NULL, '59.638372234040716', '16.689004756640657', '', 1, '2019-08-30 06:45:30', '2019-08-30 06:45:30'),
(9, 7, 1, 'Public meetup', 'x', 'this is wonder date', 2, 0, '<p>hello </p><p>we are going to </p><p><br></p><p><br></p>', 'Vasto, Province of Chieti, Italy', NULL, NULL, NULL, '42.1045588', '14.705871099999968', '', 1, '2019-08-30 06:48:04', '2019-08-30 06:48:04'),
(10, 10, 1, '3333', '3333', 'aaaa', 3, 0, '<p><br></p>', '0', '2019-12-31 00:00:00', '2019-12-31 00:00:00', '2019-12-16 00:00:00', '', '', '[]', 1, '2019-09-04 11:21:09', '2019-12-18 17:24:51'),
(11, 5, 1, 'axx', 'd', 'aaaaaa', 3, 0, '<p>asdasasd</p><p><br></p><p>sd</p><p>sdasdas</p>', 'Västervik, Sweden', NULL, NULL, NULL, '57.75771559999999', '16.63697590000004', '[{"id":1,"title":"Donations"}]', 1, '2019-09-04 11:36:52', '2019-09-04 12:28:28'),
(12, 9, 1, 'asasd', '5', 'asdas', 2, 0, '<p>asdas</p>', '0', '2019-12-16 00:00:00', '2019-12-26 00:00:00', '2019-12-16 00:00:00', '', '', '[{"id":1,"title":"Donations"}]', 1, '2019-09-05 13:38:01', '2019-12-16 17:18:13'),
(13, 1, 1, 'xxx', '4', 'ss', 3, 0, '<p>dsada</p>', 'Vasant Kunj, New Delhi, Delhi, India', '2019-09-11 00:00:00', '2019-09-11 00:00:00', '2019-09-11 00:00:00', '28.5293121', '77.14844419999997', '[]', 1, '2019-09-05 14:04:12', '2019-09-05 14:04:12'),
(14, 7, 1, 'Vrundavan Party ploat', '3', 'popopopo', 30, 0, '<p><br></p>', '0', '2019-09-05 06:00:00', '2019-09-05 05:30:00', '2019-09-05 00:45:00', '', '', '[{"id":1,"title":"Donations"}]', 1, '2019-09-05 14:08:25', '2019-09-05 14:08:25'),
(15, 1, 1, 'Vrundavan Party ploat', '1', 'oouiouio', 32, 0, '<p><br></p>', '0', '2019-09-19 02:00:00', '2019-09-19 02:30:00', '2019-09-05 16:00:00', '', '', '[{"id":1,"title":"Donations"}]', 1, '2019-09-05 14:10:02', '2019-09-05 14:10:02'),
(16, 7, 1, 'Summer Camp Students Get Together', 'summer-camp-students-get-together', 'Summer Camp Students Get Together', 50, 0, '<p>Summer Camp Students Get Together</p><p><br></p><p>Summer Camp Students Get Together</p><p><br></p><p>Summer Camp Students Get Together</p><p><br></p><p>Summer Camp Students Get Together</p>', 'Valencia, Spain', '2019-12-16 01:15:00', '2019-12-16 03:15:00', '2019-12-19 00:15:00', '37.3664814', '-95.26447089999999', '[{"id":1,"title":"Donations"},{"id":2,"title":"Inspiration"}]', 1, '2019-09-06 09:25:20', '2019-12-17 12:40:37'),
(17, 7, 1, 'panetar hotel bluer', 'panetar-hotel-bluer', 'panetar hotel', 150, 0, '<p>panetar hotelMoment was designed to work both in the browser and in Node.js.</p><p>All code should work in both of these environments, and all unit tests are run in both of these environments.Moment was designed to work both in the browser and in Node.js.</p><p>All code should work in both of these environments, and all unit tests are run in both of these environments.Moment was designed to work both in the browser and in Node.js.</p><p>All code should work in both of these environments, and all unit tests are run in both of these environments.</p>', 'Vashi, Navi Mumbai, Maharashtra, India', '2019-12-19 00:00:00', '2020-04-23 00:00:00', '2019-12-17 00:00:00', '26.4011751', '-80.26447089999999', '[{"id":2,"title":"Inspiration"},{"id":3,"title":"Ploat"}]', 1, '2019-12-17 12:56:34', '2019-12-20 16:16:28'),
(18, 8, 251, 'event by oraganization', 'event-by-oraganization', 'this is event form organization', 15, 0, '<p>This is vasudev janki patel </p><p><br></p><p>Sdas sk asjdja <strong>skjdkadas</strong></p><p><br></p><p>as</p><p>da</p><p>sd sad</p><p>ad</p><p>sa\'dsa</p><p>d</p><p>sad</p><p>sad</p><p> a</p><p>sdasd</p><p>a</p><p>sd </p><p>asd</p><p>a</p><p>sd</p>', 'Vastral, Ahmedabad, Gujarat, India', '2020-02-20 00:45:00', '2020-02-20 01:00:00', '2020-02-20 00:00:00', '23.020589825155724', '72.578100375', '[{"id":2,"title":"Inspiration"}]', 1, '2020-02-13 11:47:52', '2020-02-13 11:47:52'),
(19, 9, 1, 'vs', 'vs', 'vs', 10, 0, '<p><span style="background-color: rgb(255, 255, 255); color: rgb(36, 39, 41);">This will create a hashed password. You may use it in your controller or even in a model, for example, if a user submits a password using a form to your controller using&nbsp;</span><code style="background-color: var(--black-050); color: rgb(36, 39, 41);">POST</code><span style="background-color: rgb(255, 255, 255); color: rgb(36, 39, 41);">&nbsp;method then you may hash it using something like this:This will create a hashed password. You may use it in your controller or even in a model, for example, if a user submits a password using a form to your controller using&nbsp;</span><code style="background-color: var(--black-050); color: rgb(36, 39, 41);">POST</code><span style="background-color: rgb(255, 255, 255); color: rgb(36, 39, 41);">&nbsp;method then you may hash it using something like this:</span></p>', 'Västerås, Sweden', '2020-02-13 00:00:00', '2020-02-13 00:00:00', '2020-02-14 00:00:00', '59.60990049999999', '16.5448092', '[{"id":1,"title":"Donations"},{"id":2,"title":"Inspiration"}]', 1, '2020-02-13 12:57:40', '2020-02-13 12:57:40'),
(20, 7, 251, 'fafadfafad', 'fafadfafad', 'dicrect checking good', 12, 0, '<p>sasd asdasdas</p>', 'Västerås, Sweden', '2020-02-13 00:00:00', '2020-02-29 01:15:00', '2020-02-14 00:00:00', '59.60990049999999', '16.5448092', '[]', 1, '2020-02-13 13:00:56', '2020-02-18 16:04:12'),
(21, 10, 1, 'pattaya event', 'pattaya-event', 'sub event', 20, 0, '<p>hi description 	</p>', 'Vashi, Navi Mumbai, Maharashtra, India', '2020-03-02 00:00:00', '2020-03-02 00:00:00', '2020-03-19 00:00:00', '19.0744857', '72.99778409999999', '[]', 1, '2020-03-02 16:02:40', '2020-03-04 13:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `event_booking`
--

CREATE TABLE `event_booking` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT '0',
  `description` varchar(1024) DEFAULT NULL,
  `respose_user` int(11) DEFAULT '0',
  `txtfirstname` varchar(30) DEFAULT NULL,
  `txtlastname` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `txtemail` varchar(200) DEFAULT NULL,
  `txtphone` varchar(20) DEFAULT NULL,
  `txtaddress1` varchar(200) DEFAULT NULL,
  `txtaddress2` varchar(200) DEFAULT NULL,
  `txtstate` varchar(30) DEFAULT NULL,
  `txtzipcode` varchar(10) DEFAULT NULL,
  `txtcountry` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_booking`
--

INSERT INTO `event_booking` (`id`, `event_id`, `project_id`, `description`, `respose_user`, `txtfirstname`, `txtlastname`, `date`, `txtemail`, `txtphone`, `txtaddress1`, `txtaddress2`, `txtstate`, `txtzipcode`, `txtcountry`, `created_at`, `updated_at`) VALUES
(3, 7, 0, 'sdasd sdasdsdaasd sad dsdass', 0, 'a', 'a', NULL, 'sec@gmail.com', '1231231234', 'ava', 'dad', '', '', 'Netherlands', '2019-12-17 19:56:51', '2019-12-17 19:56:51'),
(4, 7, 0, 'sdasd sdasdsdaasd sad dsdass', 0, 'a', 'a', NULL, 'sec@gmail.com', '1231231234', 'ava', 'dad', '', '', 'Netherlands', '2019-12-17 19:58:40', '2019-12-17 19:58:40'),
(5, 7, 0, 'sds das sads dasd sdasd sdas dsad', 0, 'as', 'asdsd', NULL, 'aak@gmail.com', '8866056366', '', '', '', '', 'United States', '2019-12-17 20:02:35', '2019-12-17 20:02:35'),
(6, 7, 0, 'sdsadd asdsasd', 0, 'acc', 'aaa', NULL, 'aak@gmail.com', '', '', '', '', '', 'United States', '2019-12-17 20:04:08', '2019-12-17 20:04:08'),
(7, 15, 0, 'asdas', 0, 'as', 'asdsd', NULL, 'aak@gmail.com', '', '', '', '', '', 'United States', '2019-12-17 20:07:39', '2019-12-17 20:07:39'),
(8, 0, 0, 'asdasd', 0, 'asda', 'sdas', NULL, 'sdas', '', 'vastr', 'sa', 'sa', 'sdas', 'India', '2019-12-18 16:33:54', '2019-12-18 16:33:54'),
(9, 0, 0, 'i am not changed need to help poor', 0, 'Vedant', 'patel', NULL, 'manoj@gmail.com', '3432434333', 'add1', 'add2', 'gujart', '382418', 'USA', '2019-12-18 16:38:47', '2019-12-18 16:38:47'),
(10, 17, 0, 'dfsdfsdf', 0, 'va', 'kaskdj', NULL, 'ka@gmial.com', '9823265985', 'jska', 'asda', 's', 'jsdk', 'India', '2019-12-18 16:40:24', '2019-12-18 16:40:24'),
(11, 17, 0, 'sdas', 0, 's', 's', NULL, 'aak@gmail.com', '1231231234', 'as', 'sd', 'sa', 'sda', 'India', '2019-12-18 17:09:28', '2019-12-18 17:09:28'),
(12, 17, 0, 'sdasd', 0, 'as', 'dasdasdas', NULL, 'aa@gmail.com', '9723297232', 'vast', 'av', 'a', '143423', 'India', '2019-12-18 17:10:26', '2019-12-18 17:10:26'),
(13, 15, 0, 'need to know process about your trust', 0, 'palak', 'patel', NULL, 'palak@gmail.com', '9723290030', 'Ghatloadia', 'abad', 'gujju', '326588', 'India', '2020-02-07 13:33:52', '2020-02-07 13:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `event_comment`
--

CREATE TABLE `event_comment` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `comment` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_comment`
--

INSERT INTO `event_comment` (`id`, `event_id`, `name`, `email`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(40, 6, NULL, NULL, 'Please tack care', 1, '2019-10-21 17:31:24', '2019-10-21 17:31:24'),
(47, 6, NULL, NULL, 'sdasdasdas asdass', 1, '2019-10-21 18:57:47', '2019-10-21 18:57:47'),
(49, 6, NULL, NULL, 'ccccccccccccc', 1, '2019-10-21 20:29:15', '2019-10-21 20:29:15'),
(50, 6, NULL, NULL, 'asdassadasdad', 1, '2019-10-22 15:03:38', '2019-10-22 15:03:38'),
(51, 6, NULL, NULL, 'love to workload love to workloadlove to workloadlove to workloadlove to workload', 1, '2019-10-22 15:12:32', '2019-10-22 15:12:32'),
(52, 6, NULL, NULL, 'stop encourage please ignore it', 1, '2019-10-22 15:15:25', '2019-10-22 15:15:25'),
(53, 6, NULL, NULL, 'avvvasdasdasddasd', 0, '2019-10-22 15:32:49', '2019-10-22 15:32:49'),
(54, 6, NULL, NULL, 'sdasdsdsadadsd', 2, '2019-10-22 18:51:56', '2019-10-22 18:51:56'),
(55, 6, NULL, NULL, 'daasdasdasd', 2, '2019-10-23 15:33:46', '2019-10-23 15:33:46'),
(56, 1, NULL, NULL, 'asdasdasdas dasdad', 2, '2019-10-23 20:27:24', '2019-10-23 20:27:24'),
(57, 6, 'Dinesg', 'dinesh@gmail.com', 'Hello working', 2, '2019-10-24 14:54:12', '2019-10-24 14:54:12'),
(58, 6, 'Manoj Kumar', 'manoj@gmail.com', 'hope you doing well', 2, '2019-10-24 15:10:20', '2019-10-24 15:10:20'),
(59, 6, '', '', 'asjdkjdaksjkdjakjdkasd', 2, '2019-10-25 18:16:56', '2019-10-25 18:16:56'),
(60, 6, 'dsdasdsdd', 'aak@gmail.com', '', 2, '2019-10-25 19:29:48', '2019-10-25 19:29:48'),
(61, 4, 'manoj', 'patel@patel.com', 'good i like this camp', 1, '2019-11-15 19:20:31', '2019-11-15 19:20:31'),
(62, 8, 'Manoj', 'manoj@gmail.com', 'Manoj Patel  he sjdhajs hsdsj asjd djhjk jsdkjasdasdjkk skjasdjaskdj jksjdaksjdksjkksjk jkjkj jskdajs jkk\nsdas\nas sd   sdkajskdjskd jkjkslakls  jsdkajsdklajs kjskdjlasjdk', 1, '2019-11-25 13:10:44', '2019-11-25 13:10:44'),
(63, 9, 'a', 'aa@gmail.com', 'data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"', 1, '2019-11-25 15:21:07', '2019-11-25 15:21:07'),
(64, 9, 'a', 'aa@gmail.com', 'data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"', 1, '2019-11-25 15:21:13', '2019-11-25 15:21:13'),
(65, 9, 'a', 'aa@gmail.com', 'data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"', 1, '2019-11-25 15:21:17', '2019-11-25 15:21:17'),
(66, 9, 'a', 'aa@gmail.com', 'data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10" data-msg-minlength="Enter Minimum 10 Characters"  data-rule-minlength="10"', 1, '2019-11-25 15:21:27', '2019-11-25 15:21:27'),
(67, 12, 'ganesh', 'ganesh@gmial.com', 'hi how are you friends', 1, '2019-12-16 18:48:32', '2019-12-16 18:48:32'),
(68, 12, 'ganesh', 'ganesh@gmial.com', 'sds asdasd ggfhgfhfg', 1, '2019-12-16 18:49:11', '2019-12-16 18:49:11'),
(69, 15, 'hiren', 'hiren@gmail.com', 'hi hi hiasaddadadad', 1, '2019-12-16 19:31:11', '2019-12-16 19:31:11'),
(70, 16, 'gmail', 'aa@gmail.com', 'Nepal has been seriously devastated by the recent earthquake. Over 8,000 people have died (with death toll rising), thousands more are injured, and countless more have been displaced. Many homes, temples, and public monuments have been destroyed throughout the affected areas.', 1, '2019-12-16 19:59:42', '2019-12-16 19:59:42'),
(71, 16, 'gmail', 'aa@gmail.com', 'Nepal has been seriously devastated by the recent earthquake. Over 8,000 people have died (with death toll rising), t ed. Many homes, temples, and public monuments have been destroyed throughout the affected areas.Nepal has been seriously devastated by the recent earthquake. Over 8,000 people have died (with death toll rising), thousands more are injured, and countless more have been displaced. Many homes, temples, and public monuments have been destroyed throughout the affected areas.', 1, '2019-12-16 19:59:56', '2019-12-16 19:59:56'),
(72, 16, 'aa', 'assign@gmail.com', 'sdassldasdkadas ddsadsad', 1, '2019-12-16 20:18:26', '2019-12-16 20:18:26'),
(73, 16, 'aa', 'aa@gmail.com', 'sjdasdd asdsa damd ma dmasdsad', 1, '2019-12-16 20:20:25', '2019-12-16 20:20:25'),
(74, 16, 'yaho', 'yaho@gmial.com', 'sjd asd samd sd dsadmadsadsadsad', 1, '2019-12-16 20:22:01', '2019-12-16 20:22:01'),
(75, 7, 'vv', 'aak@gmail.com', 'asad\nsd\nasd\nasd\n\nadad', 1, '2019-12-17 19:32:11', '2019-12-17 19:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `image` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `event_id`, `image`, `created_at`, `updated_at`) VALUES
(2, 6, 'Document1567086563_398.jpg', '2019-08-29 13:51:34', '2019-08-29 13:51:34'),
(3, 7, 'Document1567086782_960.jpg', '2019-08-29 13:53:05', '2019-08-29 13:53:05'),
(4, 7, 'Document1567088117_188.jpg', '2019-08-29 14:15:39', '2019-08-29 14:15:39'),
(6, 7, 'Document1567088637_715.jpeg', '2019-08-29 14:24:17', '2019-08-29 14:24:17'),
(7, 7, 'Document1567088654_890.jpeg', '2019-08-29 14:24:17', '2019-08-29 14:24:17'),
(8, 8, 'Document1567147520_346.jpg', '2019-08-30 06:45:30', '2019-08-30 06:45:30'),
(9, 8, 'Document1567147527_982.jpeg', '2019-08-30 06:45:30', '2019-08-30 06:45:30'),
(10, 9, 'Document1567147636_184.jpg', '2019-08-30 06:48:04', '2019-08-30 06:48:04'),
(11, 9, 'Document1567149817_183.jpg', '2019-08-30 07:23:44', '2019-08-30 07:23:44'),
(13, 9, 'Document1567151868_536.jpg', '2019-08-30 07:57:50', '2019-08-30 07:57:50'),
(14, 9, 'Document1567152083_86.jpg', '2019-08-30 08:01:26', '2019-08-30 08:01:26'),
(15, 12, 'Document1567690428_241.jpeg', '2019-09-05 13:38:01', '2019-09-05 13:38:01'),
(16, 12, 'Document1567690434_371.jpg', '2019-09-05 13:38:01', '2019-09-05 13:38:01'),
(17, 16, 'Document1576505628_687.jpg', '2019-12-16 19:44:22', '2019-12-16 19:44:22'),
(18, 16, 'Document1576505633_325.jpg', '2019-12-16 19:44:22', '2019-12-16 19:44:22'),
(19, 17, 'Document1576567579_842.jpg', '2019-12-17 12:56:34', '2019-12-17 12:56:34'),
(20, 17, 'Document1576567582_811.jpg', '2019-12-17 12:56:34', '2019-12-17 12:56:34'),
(21, 20, 'Document1581579029_499.jpg', '2020-02-13 13:00:56', '2020-02-13 13:00:56'),
(22, 20, 'Document1582021889_331.png', '2020-02-18 16:03:40', '2020-02-18 16:03:40'),
(24, 21, 'Document1583308862_73.jpg', '2020-03-04 13:31:30', '2020-03-04 13:31:30'),
(25, 21, 'Document1583308883_215.jpg', '2020-03-04 13:31:30', '2020-03-04 13:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `event_team`
--

CREATE TABLE `event_team` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_team`
--

INSERT INTO `event_team` (`id`, `event_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 1, 157, '2019-08-28 14:49:07', '2019-08-28 14:49:07'),
(6, 1, 180, '2019-08-28 14:49:07', '2019-08-28 14:49:07'),
(7, 2, 164, '2019-08-29 13:13:34', '2019-08-29 13:13:34'),
(8, 3, 156, '2019-08-29 13:25:31', '2019-08-29 13:25:31'),
(13, 6, 156, '2019-08-29 13:51:34', '2019-08-29 13:51:34'),
(14, 6, 175, '2019-08-29 13:51:34', '2019-08-29 13:51:34'),
(30, 7, 156, '2019-08-29 14:28:01', '2019-08-29 14:28:01'),
(31, 8, 171, '2019-08-30 06:45:30', '2019-08-30 06:45:30'),
(40, 9, 157, '2019-08-30 08:01:26', '2019-08-30 08:01:26'),
(41, 9, 175, '2019-08-30 08:01:26', '2019-08-30 08:01:26'),
(46, 11, 157, '2019-09-04 12:28:28', '2019-09-04 12:28:28'),
(47, 11, 166, '2019-09-04 12:28:28', '2019-09-04 12:28:28'),
(49, 13, 156, '2019-09-05 14:04:12', '2019-09-05 14:04:12'),
(50, 14, 157, '2019-09-05 14:08:25', '2019-09-05 14:08:25'),
(51, 15, 180, '2019-09-05 14:10:02', '2019-09-05 14:10:02'),
(54, 12, 156, '2019-12-16 17:18:13', '2019-12-16 17:18:13'),
(55, 12, 162, '2019-12-16 17:18:13', '2019-12-16 17:18:13'),
(59, 16, 170, '2019-12-17 12:40:37', '2019-12-17 12:40:37'),
(60, 16, 183, '2019-12-17 12:40:37', '2019-12-17 12:40:37'),
(67, 10, 156, '2019-12-18 17:24:51', '2019-12-18 17:24:51'),
(68, 17, 157, '2019-12-20 16:16:28', '2019-12-20 16:16:28'),
(69, 18, 150, '2020-02-13 11:47:52', '2020-02-13 11:47:52'),
(70, 19, 154, '2020-02-13 12:57:40', '2020-02-13 12:57:40'),
(71, 19, 157, '2020-02-13 12:57:40', '2020-02-13 12:57:40'),
(76, 20, 150, '2020-02-18 16:04:12', '2020-02-18 16:04:12'),
(77, 20, 156, '2020-02-18 16:04:12', '2020-02-18 16:04:12'),
(79, 21, 156, '2020-03-04 13:31:29', '2020-03-04 13:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `individual`
--

CREATE TABLE `individual` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `marital_status` varchar(100) DEFAULT NULL,
  `family_income` varchar(20) DEFAULT NULL,
  `family_size` varchar(10) DEFAULT NULL,
  `support_help_id` int(11) NOT NULL,
  `support_help_text` varchar(600) NOT NULL,
  `reference` varchar(300) NOT NULL,
  `other_reference` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `individual`
--

INSERT INTO `individual` (`id`, `user_id`, `marital_status`, `family_income`, `family_size`, `support_help_id`, `support_help_text`, `reference`, `other_reference`, `created_at`, `updated_at`) VALUES
(1, 213, 'Widow Man', 'More Than 5000', '5', 2, 'Monitory Support for Education', '3', 'Family/Friends', '2019-09-07 08:08:10', '2019-09-07 08:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"a1@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. ji ,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your user id <b>1111111111<\\/b> with password <b>1231231231<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1577511750, 1577511750),
(2, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:23:\\"admin@inneraxasdeye.com\\";s:5:\\"line2\\";s:460:\\"Dear Mr.\\/Ms. asdas das,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>admin@inneraxasdeye.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1577881271, 1577881271),
(3, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"pinky@gmail.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. pinky patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>pinky@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1577881376, 1577881376),
(4, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Pinky@gmail.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. Pinky Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Pinky@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1577881883, 1577881883),
(5, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Pinky@gmail.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. Pinky Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Pinky@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1577883544, 1577883544),
(6, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:21:\\"admixxxn@innereye.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. a as,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>admixxxn@innereye.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1577976568, 1577976568),
(7, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"hiren@gmial.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. hiren patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>hiren@gmial.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578117686, 1578117686),
(8, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:16:\\"Hiren1@gmial.com\\";s:5:\\"line2\\";s:457:\\"Dear Mr.\\/Ms. Hiren1 Patel1,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Hiren1@gmial.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578123020, 1578123020),
(9, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:16:\\"Hiren1@gmial.com\\";s:5:\\"line2\\";s:458:\\"Dear Mr.\\/Ms. Hiren12 Patel1,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Hiren1@gmial.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578123074, 1578123074),
(10, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:16:\\"Hiren1@gmial.com\\";s:5:\\"line2\\";s:457:\\"Dear Mr.\\/Ms. Hiren1 Patel1,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Hiren1@gmial.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578123098, 1578123098),
(11, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:16:\\"Hiren1@gmial.com\\";s:5:\\"line2\\";s:457:\\"Dear Mr.\\/Ms. Hiren1 Patel1,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Hiren1@gmial.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578128892, 1578128892),
(12, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:16:\\"Hiren1@gmial.com\\";s:5:\\"line2\\";s:457:\\"Dear Mr.\\/Ms. Hiren1 Patel1,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Hiren1@gmial.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578128929, 1578128929),
(13, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:21:\\"Admixxxn@innereye.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. A As,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Admixxxn@innereye.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578128985, 1578128985),
(14, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"admin@admin.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. sd asdas,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>admin@admin.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578296849, 1578296849),
(15, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"ax@innereye.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. asd asdas,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>ax@innereye.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578302854, 1578302854),
(16, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:9:\\"bB@B.colm\\";s:5:\\"line2\\";s:440:\\"Dear Mr.\\/Ms. b b,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>bB@B.colm<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578303423, 1578303423),
(17, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"ax@gmail.com\\";s:5:\\"line2\\";s:449:\\"Dear Mr.\\/Ms. lov patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>ax@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578308244, 1578308244),
(18, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"po@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. perfect eoln,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>po@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578308373, 1578308373),
(19, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:9:\\"o@gai.com\\";s:5:\\"line2\\";s:442:\\"Dear Mr.\\/Ms. aa vv,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>o@gai.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578312535, 1578312535),
(20, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:7:\\"a@o.com\\";s:5:\\"line2\\";s:441:\\"Dear Mr.\\/Ms. pik pi,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>a@o.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578313713, 1578313713),
(21, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"pl@gmail.com\\";s:5:\\"line2\\";s:446:\\"Dear Mr.\\/Ms. po poi,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>pl@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578319447, 1578319447),
(22, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:11:\\"p@gmial.com\\";s:5:\\"line2\\";s:448:\\"Dear Mr.\\/Ms. hil kasld,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>p@gmial.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578319859, 1578319859),
(23, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Pl@gmail.com\\";s:5:\\"line2\\";s:446:\\"Dear Mr.\\/Ms. Po Poi,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Pl@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578320935, 1578320935),
(24, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"hello@gmail.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. patel manoj,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>hello@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578377055, 1578377055),
(25, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"lo@gmail.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. manoj patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>lo@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578396999, 1578396999),
(26, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"pink@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. pink patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>pink@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578397299, 1578397299),
(27, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Pink@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Pink Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Pink@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578398612, 1578398612),
(28, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Pink@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Pink Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Pink@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578404680, 1578404680),
(29, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Lo@gmail.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. Manoj Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Lo@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578404694, 1578404694),
(30, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Lo@gmail.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. Manoj Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Lo@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578404765, 1578404765),
(31, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Lo@gmail.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. Manoj Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Lo@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578407306, 1578407306),
(32, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Lo@gmail.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. Manoj Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Lo@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578407323, 1578407323),
(33, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. as dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578468529, 1578468529),
(34, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578473915, 1578473915),
(35, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:9:\\"hi@hi.com\\";s:5:\\"line2\\";s:442:\\"Dear Mr.\\/Ms. hi hi,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>hi@hi.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578490698, 1578490698),
(36, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:9:\\"Hi@hi.com\\";s:5:\\"line2\\";s:443:\\"Dear Mr.\\/Ms. Hix Hi,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Hi@hi.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578490957, 1578490957),
(37, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:9:\\"Hi@hi.com\\";s:5:\\"line2\\";s:444:\\"Dear Mr.\\/Ms. Hixx Hi,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Hi@hi.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578490978, 1578490978),
(38, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:9:\\"Hi@hi.com\\";s:5:\\"line2\\";s:448:\\"Dear Mr.\\/Ms. Hixxxa12 Hi,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Hi@hi.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578491053, 1578491053),
(39, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:27:\\"Annamae.kilback@example.net\\";s:5:\\"line2\\";s:466:\\"Dear Mr.\\/Ms. Mrs. Lady v,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Annamae.kilback@example.net<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578491104, 1578491104),
(40, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"yah@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. sharma patek,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>yah@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578567829, 1578567829),
(41, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578576488, 1578576488),
(42, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"Yah@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. Sharma Patek,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Yah@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578579594, 1578579594),
(43, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578579599, 1578579599),
(44, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578579671, 1578579671),
(45, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"Yah@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. Sharma Patek,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Yah@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578580279, 1578580279);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(46, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"Yah@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. Sharma Patek,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Yah@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578582130, 1578582130),
(47, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"Yah@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. Sharma Patek,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Yah@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578584157, 1578584157),
(48, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"Yah@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. Sharma Patek,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Yah@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578584365, 1578584365),
(49, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"Yah@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. Sharma Patek,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Yah@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578584374, 1578584374),
(50, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"Yah@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. Sharma Patek,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Yah@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578584652, 1578584652),
(51, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"Yah@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. Sharma Patek,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Yah@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578666934, 1578666934),
(52, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"Yah@gmail.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. Sharman Patek,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Yah@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578666945, 1578666945),
(53, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578666968, 1578666968),
(54, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578666982, 1578666982),
(55, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578667396, 1578667396),
(56, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578667435, 1578667435),
(57, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578667465, 1578667465),
(58, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578667534, 1578667534),
(59, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:447:\\"Dear Mr.\\/Ms. As Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578667547, 1578667547),
(60, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"jd@gmail.com\\";s:5:\\"line2\\";s:449:\\"Dear Mr.\\/Ms. jd panchl,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>jd@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1578670522, 1578670522),
(61, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Pic4@gmail.com\\";s:5:\\"line2\\";s:448:\\"Dear Mr.\\/Ms. Pic4 a,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Pic4@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1579774048, 1579774048),
(62, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Pic4@gmail.com\\";s:5:\\"line2\\";s:448:\\"Dear Mr.\\/Ms. Pic4 A,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Pic4@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1579774060, 1579774060),
(63, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:7:\\"P@p.com\\";s:5:\\"line2\\";s:441:\\"Dear Mr.\\/Ms. P asda,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>P@p.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1579774091, 1579774091),
(64, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:7:\\"P@p.com\\";s:5:\\"line2\\";s:441:\\"Dear Mr.\\/Ms. P Asda,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>P@p.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580826873, 1580826873),
(65, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:7:\\"P@p.com\\";s:5:\\"line2\\";s:441:\\"Dear Mr.\\/Ms. P Asda,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>P@p.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580826912, 1580826912),
(66, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Urj@gmal.com\\";s:5:\\"line2\\";s:462:\\"Dear Mr.\\/Ms. Vande matram 170 Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Urj@gmal.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580827023, 1580827023),
(67, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Urj@gmal.com\\";s:5:\\"line2\\";s:462:\\"Dear Mr.\\/Ms. Vande matram 170 Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Urj@gmal.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580827094, 1580827094),
(68, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Urj@gmal.com\\";s:5:\\"line2\\";s:462:\\"Dear Mr.\\/Ms. Vande matram 170 Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Urj@gmal.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580827119, 1580827119),
(69, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Urj@gmal.com\\";s:5:\\"line2\\";s:462:\\"Dear Mr.\\/Ms. Vande matram 170 Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Urj@gmal.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580827249, 1580827249),
(70, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Urj@gmal.com\\";s:5:\\"line2\\";s:462:\\"Dear Mr.\\/Ms. Vande matram 170 Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Urj@gmal.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580827268, 1580827268),
(71, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Urj@gmal.com\\";s:5:\\"line2\\";s:462:\\"Dear Mr.\\/Ms. Vande matram 170 Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Urj@gmal.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580827285, 1580827285),
(72, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580881877, 1580881877),
(73, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580882527, 1580882527),
(74, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580886076, 1580886076),
(75, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580886402, 1580886402),
(76, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580886912, 1580886912),
(77, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580887042, 1580887042),
(78, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580887180, 1580887180),
(79, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580887194, 1580887194),
(80, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580887256, 1580887256),
(81, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580887279, 1580887279),
(82, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Mili@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Mili Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Mili@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580890051, 1580890051),
(83, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:45;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580981984, 1580981984),
(84, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:4;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580982109, 1580982109),
(85, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:10;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580993397, 1580993397),
(86, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:9;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1580993689, 1580993689),
(87, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:12;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581001886, 1581001886),
(88, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:1;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581002548, 1581002548),
(89, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:12;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581003408, 1581003408),
(90, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:1;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581003418, 1581003418),
(91, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:1;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581003457, 1581003457),
(92, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:9;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581003526, 1581003526),
(93, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:1;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581003570, 1581003570),
(94, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:1;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581003585, 1581003585),
(95, 'default', '{"displayName":"App\\\\Jobs\\\\DonationInvoiceMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\DonationInvoiceMail","command":"O:28:\\"App\\\\Jobs\\\\DonationInvoiceMail\\":8:{s:9:\\"parameter\\";a:3:{s:2:\\"id\\";i:46;s:4:\\"type\\";s:15:\\"DonationInvoice\\";s:7:\\"fileUrl\\";s:59:\\"public\\/PDFs\\/DonationInvoice\\/InvoiceDonation_.1581058120.pdf\\";}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581058120, 1581058120),
(96, 'default', '{"displayName":"App\\\\Jobs\\\\EventBookingMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\EventBookingMail","command":"O:25:\\"App\\\\Jobs\\\\EventBookingMail\\":8:{s:9:\\"parameter\\";a:1:{s:2:\\"id\\";i:13;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581062632, 1581062632),
(97, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:11:\\"admin@a.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. asdada sadas,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>admin@a.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581158626, 1581158626);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(98, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:11:\\"admin@a.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. asdada sadas,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>admin@a.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581162457, 1581162457),
(99, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"opxx@gmail.com\\";s:5:\\"line2\\";s:450:\\"Dear Mr.\\/Ms. hop oops,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>opxx@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581173918, 1581173918),
(100, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581318609, 1581318609),
(101, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581320214, 1581320214),
(102, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581328767, 1581328767),
(103, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581330304, 1581330304),
(104, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581331568, 1581331568),
(105, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581331704, 1581331704),
(106, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581331822, 1581331822),
(107, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581331959, 1581331959),
(108, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581332153, 1581332153),
(109, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581332358, 1581332358),
(110, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581332378, 1581332378),
(111, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581332533, 1581332533),
(112, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581332931, 1581332931),
(113, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:472:\\"Dear Mr.\\/Ms. Ashtha foundation Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581332998, 1581332998),
(114, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581333154, 1581333154),
(115, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581333179, 1581333179),
(116, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581333204, 1581333204),
(117, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581333329, 1581333329),
(118, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581333376, 1581333376),
(119, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581333398, 1581333398),
(120, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:18:\\"Vedant13@gmail.com\\";s:5:\\"line2\\";s:462:\\"Dear Mr.\\/Ms. Vedant 159 Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Vedant13@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581499104, 1581499104),
(121, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581515430, 1581515430),
(122, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581515778, 1581515778),
(123, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581516022, 1581516022),
(124, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581516070, 1581516070),
(125, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581516388, 1581516388),
(126, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581516724, 1581516724),
(127, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581517080, 1581517080),
(128, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581517197, 1581517197),
(129, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:473:\\"Dear Mr.\\/Ms. Ashtha foundationa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581517350, 1581517350),
(130, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:474:\\"Dear Mr.\\/Ms. Ashtha foundationaa Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581517501, 1581517501),
(131, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:475:\\"Dear Mr.\\/Ms. Ashtha foundationaax Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581517656, 1581517656),
(132, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:475:\\"Dear Mr.\\/Ms. Ashtha foundationaax Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581517703, 1581517703),
(133, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:15:\\"Virat@gmail.com\\";s:5:\\"line2\\";s:475:\\"Dear Mr.\\/Ms. Ashtha foundationaax Virat kohli,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Virat@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581517738, 1581517738),
(134, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:17:\\"vedanta@gmail.com\\";s:5:\\"line2\\";s:477:\\"Dear Mr.\\/Ms. Vedanta foundation Vedanat patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>vedanta@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581573137, 1581573137),
(135, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:17:\\"vedanta@gmail.com\\";s:5:\\"line2\\";s:477:\\"Dear Mr.\\/Ms. Vedanta foundation Vedanat patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>vedanta@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581573370, 1581573370),
(136, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:18;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581574672, 1581574672),
(137, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:19;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581578860, 1581578860),
(138, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:20;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581579056, 1581579056),
(139, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:13;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581584808, 1581584808),
(140, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"V3@gmail.com\\";s:5:\\"line2\\";s:448:\\"Dear Mr.\\/Ms. V3 patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>V3@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581608532, 1581608532),
(141, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"V3@gmail.com\\";s:5:\\"line2\\";s:448:\\"Dear Mr.\\/Ms. V3 Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>V3@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581608693, 1581608693),
(142, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"V3@gmail.com\\";s:5:\\"line2\\";s:448:\\"Dear Mr.\\/Ms. V3 Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>V3@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581608700, 1581608700),
(143, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"V3@gmail.com\\";s:5:\\"line2\\";s:448:\\"Dear Mr.\\/Ms. V3 Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>V3@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581655221, 1581655221);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(144, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Vela@gmail.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. Vela sasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Vela@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581655796, 1581655796),
(145, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Vela@gmail.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. Vela Sasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Vela@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581656786, 1581656786),
(146, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Vela@gmail.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. Vela Sasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Vela@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581657142, 1581657142),
(147, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Vela@gmail.com\\";s:5:\\"line2\\";s:451:\\"Dear Mr.\\/Ms. Vela Sasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Vela@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581657259, 1581657259),
(148, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:16:\\"Wonder@gmial.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. Wonder vas,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Wonder@gmial.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581669834, 1581669834),
(149, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:16:\\"Wonder@gmial.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. Wonder Vas,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Wonder@gmial.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581670453, 1581670453),
(150, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Aa@gmail.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. Ccc Hiren boss,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Aa@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581674002, 1581674002),
(151, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Aa@gmail.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. Ccc Hiren boss,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Aa@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581674415, 1581674415),
(152, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Aa@gmail.com\\";s:5:\\"line2\\";s:454:\\"Dear Mr.\\/Ms. Ccc Hiren boss,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Aa@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581674693, 1581674693),
(153, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:13:\\"Per@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Per popwind,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Per@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1581675312, 1581675312),
(154, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:20;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582022020, 1582022020),
(155, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:20;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582022053, 1582022053),
(156, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. hiren be Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582036912, 1582036912),
(157, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582097953, 1582097953),
(158, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582098179, 1582098179),
(159, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582098197, 1582098197),
(160, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582100768, 1582100768),
(161, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582101440, 1582101440),
(162, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582101446, 1582101446),
(163, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582101453, 1582101453),
(164, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582101520, 1582101520),
(165, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582102169, 1582102169),
(166, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582102196, 1582102196),
(167, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582102309, 1582102309),
(168, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582102347, 1582102347),
(169, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582102371, 1582102371),
(170, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582102881, 1582102881),
(171, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582103173, 1582103173),
(172, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582103404, 1582103404),
(173, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582103720, 1582103720),
(174, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:12:\\"Op@gmail.com\\";s:5:\\"line2\\";s:455:\\"Dear Mr.\\/Ms. Hiren bhai Dasd,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Op@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582105098, 1582105098),
(175, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:11:\\"p@gmail.com\\";s:5:\\"line2\\";s:449:\\"Dear Mr.\\/Ms. open parel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>p@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1582120413, 1582120413),
(176, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:21;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583145160, 1583145160),
(177, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:10;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583145280, 1583145280),
(178, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:10;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583145301, 1583145301),
(179, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:21;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583308890, 1583308890),
(180, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:5;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583323756, 1583323756),
(181, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:47;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583329660, 1583329660),
(182, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:48;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583329718, 1583329718),
(183, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:49;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583331954, 1583331954),
(184, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:50;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583332363, 1583332363),
(185, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:51;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583332531, 1583332531),
(186, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:13;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583419084, 1583419084),
(187, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:76;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583575148, 1583575148),
(188, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:77;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583575524, 1583575524),
(189, 'default', '{"displayName":"App\\\\Jobs\\\\ProjectCreateMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\ProjectCreateMail","command":"O:26:\\"App\\\\Jobs\\\\ProjectCreateMail\\":8:{s:9:\\"parameter\\";a:1:{s:10:\\"project_id\\";i:13;}s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1583739647, 1583739647),
(190, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:24:\\"manthansharma01@gmal.com\\";s:5:\\"line2\\";s:466:\\"Dear Mr.\\/Ms. Manthan Sharma,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>manthansharma01@gmal.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1584689033, 1584689033),
(191, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Jams@gmail.com\\";s:5:\\"line2\\";s:452:\\"Dear Mr.\\/Ms. Jams Patel,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Jams@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1585079339, 1585079339),
(192, 'default', '{"displayName":"App\\\\Jobs\\\\SendWelcomeMail","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"timeout":null,"timeoutAt":null,"data":{"commandName":"App\\\\Jobs\\\\SendWelcomeMail","command":"O:24:\\"App\\\\Jobs\\\\SendWelcomeMail\\":9:{s:9:\\"parameter\\";a:2:{s:5:\\"email\\";s:14:\\"Jams@gmail.com\\";s:5:\\"line2\\";s:453:\\"Dear Mr.\\/Ms. Jams Patels,<br><br>\\n                    Welcome to iNNER-EYE Portal, a one-step to help people who really want help!! .<br><br>\\n                    Your email <b>Jams@gmail.com<\\/b> with password <b>123123<\\/b> <br><br>\\n                    iNNER-EYE is a charitable organization to enable helpless\\/support-less people to have sustainable Livelihood,\\n                    Health and Education for progressive individual and social development.\\";}s:7:\\"content\\";s:30:\\"Welcome to innerEye Foundation\\";s:6:\\"\\u0000*\\u0000job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:5:\\"delay\\";N;s:7:\\"chained\\";a:0:{}}"}}', 0, NULL, 1585079363, 1585079363);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_07_122047_create_jobs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ms_blood_group`
--

CREATE TABLE `ms_blood_group` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_blood_group`
--

INSERT INTO `ms_blood_group` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A+', 1, '2019-07-30 06:15:13', '2019-07-30 04:14:18'),
(2, 'A-', 1, '2019-07-30 06:15:13', '2019-07-30 04:14:18'),
(3, 'B+', 1, '2019-07-30 06:15:13', '2019-07-30 04:14:18'),
(4, 'B-', 1, '2019-07-30 06:15:13', '2019-07-30 04:14:18'),
(5, 'O+', 1, '2019-07-30 06:15:13', '2019-07-30 04:14:18'),
(6, 'O-', 1, '2019-07-30 06:15:13', '2019-07-30 04:14:18'),
(7, 'AB+', 1, '2019-07-30 06:15:13', '2019-07-30 04:14:18'),
(8, 'AB-', 1, '2019-07-30 06:15:13', '2019-07-30 04:14:18'),
(9, 'ccc', 0, '2019-08-19 13:46:15', '2019-08-19 13:46:20'),
(10, 'Vrundavan Party ploat', 0, '2019-08-19 14:49:24', '2019-08-19 14:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `ms_causes_interested`
--

CREATE TABLE `ms_causes_interested` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_causes_interested`
--

INSERT INTO `ms_causes_interested` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shelter for Old-age', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(2, 'Cloth Distribution', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(3, 'Anna-Seva', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(4, 'Value Education', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(5, 'Teaching Assistance', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(6, 'Note-Book Drive', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(7, 'Merit Scholarship', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(8, 'Monitory Support for Education', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(9, 'i-LiRC (Library Information Services)', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(10, 'Health Awareness', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(11, 'Medical Treatment', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(12, 'Monitory Support for Medical Emergency', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(13, 'Fundraising Campaign', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(14, 'Blood Donation Camp', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(15, 'Disaster Relief Camp', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(16, 'IT Support', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(17, 'Blog Writing', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(18, 'Social Media Promotion', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `ms_education`
--

CREATE TABLE `ms_education` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_education`
--

INSERT INTO `ms_education` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, '1-12', 1, '2019-07-30 04:18:20', '2019-08-19 15:16:09'),
(2, 'Under-graduate', 1, '2019-07-30 04:18:20', '2019-07-30 04:14:18'),
(3, 'Post-graduate', 1, '2019-07-30 04:18:20', '2019-07-30 04:14:18'),
(4, 'Above Post-Graduate', 1, '2019-07-30 04:18:20', '2019-07-30 04:14:18'),
(5, 'Ganesh Project', 0, '2019-08-23 13:24:38', '2019-08-23 13:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `ms_expense_category`
--

CREATE TABLE `ms_expense_category` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_expense_category`
--

INSERT INTO `ms_expense_category` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Operating Activity', 1, '2019-09-04 10:44:08', '2019-09-04 10:44:17'),
(2, 'Telephone Expsense', 1, '2019-09-04 10:44:34', '2019-09-04 11:34:59'),
(3, 'Training Programme', 1, '2019-09-04 10:45:11', '2019-09-04 10:45:11'),
(4, 'Miscellaneous Expenses (Tea/Snacks)', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(5, 'Bank Debit', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(6, 'Seminar/Workshop/Conference', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(7, 'Website &amp; IT Maintance Expanses', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(8, 'Anna-Seva', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(9, 'Prayuta', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(10, 'Health Programme', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(11, 'Educational Programme', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(12, 'Cloth Bank &amp; Distribution', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(13, 'Disaster Relief', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(14, 'Postage Expenses', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(15, 'Food Provision Purchase', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(16, 'Office Expanses', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(17, 'Note-Book Purchase', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(18, 'Salary (Remuneration &amp; Maintance)', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(19, 'Contribution To Beneficiary', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(20, 'Printing &amp; Stationary (Poster/ID/Stamp/Receipts Books)', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(21, 'Traveling Expenses', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00'),
(22, 'Other Expenses', 1, '2019-11-14 00:00:00', '2019-11-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_institutions`
--

CREATE TABLE `ms_institutions` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_institutions`
--

INSERT INTO `ms_institutions` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(2, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(3, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(4, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(5, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(6, 'IIT Guwahati', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(7, 'IIT Roorkee', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(8, 'IIT Ropar', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(9, 'IIT Bhubaneswar', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(10, 'IIT Gandhinagar', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(11, 'IIT Hyderabad', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(12, 'IIT Jodhpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(13, 'IIT Patna', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(14, 'IIT Indore', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(15, 'IIT Mandi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(16, 'IIT (BHU) Varanasi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(17, 'IIT Palakkad', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(18, 'IIT Tirupati', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(19, 'IIT (ISM) Dhanbad', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(20, 'IIT Bhilai', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(21, 'IIT Goa', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(22, 'IIT Jammu', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(23, 'IIT Dharwad', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(24, 'IISER KolkataIISER Pune', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(25, 'IISER Mohali', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(26, 'IISER Bhopal', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(27, 'IISER Thiruvananthapuram', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(28, 'IISER Tirupati', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(29, 'IISER Berhampur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(30, 'NIT Allahabad', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(31, 'NIT Bhopal', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(32, 'NIT Calicut', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(33, 'NIT Hamirpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(34, 'NIT Jaipur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(35, 'NIT Jalandhar', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(36, 'NIT Jamshedpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(37, 'NIT Kurukshetra', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(38, 'NIT Nagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(39, 'NIT Rourkela', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(40, 'NIT Silchar', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(41, 'NIT Karnataka', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(42, 'NIT Warangal', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(43, 'NIT Durgapur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(44, 'NIT Srinagar', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(45, 'NIT Surat', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(46, 'NIT Trichy', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(47, 'NIT Patna', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(48, 'NIT Raipur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(49, 'NIT Agartala', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(50, 'NIT Arunachal Pradesh', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(51, 'NIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(52, 'NIT Goa', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(53, 'NIT Manipur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(54, 'NIT Meghalaya', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(55, 'NIT Mizoram', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(56, 'NIT Nagaland', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(57, 'NIT Puducherry', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(58, 'NIT Sikkim', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(59, 'NIT Uttarakhand', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(60, 'NIT Andhra Pradesh', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(61, 'IISc Bangalore', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(62, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(63, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(64, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(65, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(66, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(67, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(68, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(69, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(70, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(71, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(72, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(73, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(74, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(75, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(76, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(77, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(78, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(79, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(80, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(81, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(82, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(83, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(84, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(85, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(86, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(87, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(88, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(89, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(90, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(91, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(92, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(93, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(94, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(95, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(96, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(97, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(98, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(99, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(100, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(101, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(102, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(103, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(104, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(105, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(106, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(107, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(108, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(109, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(110, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(111, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(112, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(113, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(114, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(115, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(116, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(117, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(118, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(119, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(120, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(121, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(122, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(123, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(124, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(125, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(126, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(127, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(128, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(129, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(130, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(131, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(132, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(133, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(134, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(135, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(136, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(137, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(138, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(139, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(140, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(141, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(142, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(143, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(144, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(145, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(146, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(147, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(148, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(149, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(150, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(151, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(152, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(153, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(154, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(155, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(156, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(157, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(158, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(159, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(160, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(161, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(162, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(163, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(164, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(165, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(166, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(167, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(168, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(169, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(170, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(171, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(172, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(173, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(174, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(175, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(176, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(177, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(178, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(179, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(180, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(181, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(182, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(183, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(184, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(185, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(186, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(187, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(188, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(189, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(190, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(191, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(192, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(193, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(194, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(195, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(196, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(197, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(198, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(199, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(200, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(201, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(202, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(203, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(204, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(205, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(206, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(207, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(208, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(209, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(210, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(211, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(212, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(213, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(214, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(215, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(216, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(217, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(218, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(219, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(220, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(221, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(222, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(223, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(224, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(225, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(226, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(227, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(228, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(229, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(230, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(231, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(232, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(233, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(234, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(235, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(236, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(237, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(238, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(239, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(240, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(241, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(242, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(243, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(244, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(245, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(246, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(247, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(248, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(249, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(250, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(251, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(252, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(253, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(254, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(255, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(256, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(257, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(258, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(259, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(260, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(261, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(262, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(263, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(264, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(265, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(266, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(267, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(268, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(269, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(270, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(271, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(272, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(273, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(274, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(275, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(276, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(277, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(278, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(279, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(280, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(281, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(282, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(283, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(284, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(285, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(286, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(287, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(288, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(289, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(290, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(291, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(292, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(293, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(294, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(295, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(296, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(297, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(298, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(299, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(300, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(301, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(302, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(303, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(304, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(305, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(306, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(307, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(308, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(309, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(310, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(311, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(312, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(313, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(314, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(315, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(316, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(317, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(318, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(319, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(320, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(321, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(322, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(323, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(324, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(325, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(326, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(327, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(328, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(329, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(330, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(331, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(332, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(333, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(334, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(335, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(336, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(337, 'Kharagpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(338, 'IIT Bombay', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(339, 'IIT Madras', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(340, 'IIT Kanpur', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15'),
(341, 'IIT Delhi', 1, '2019-07-30 05:14:15', '2019-07-30 05:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `ms_language_known`
--

CREATE TABLE `ms_language_known` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_language_known`
--

INSERT INTO `ms_language_known` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Assamese', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(2, 'Bengali (Bangla)', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(3, 'Bodo', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(4, 'Dogri', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(5, 'Gujarati', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(6, 'Hindi', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(7, 'Kannada', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(8, 'Kashmiri', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(9, 'Konkani', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(10, 'MaithiliMalayalam', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(11, 'Meitei', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(12, 'Marathi', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(13, 'Nepali', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(14, 'Odia', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(15, 'Punjabi', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(16, 'Sanskrit', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(17, 'Santali', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(18, 'Sindhi', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(19, 'Tamil', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(20, 'Telugu', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(21, 'Urdu', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `ms_occupation`
--

CREATE TABLE `ms_occupation` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_occupation`
--

INSERT INTO `ms_occupation` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Student', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(2, 'Self Employed', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(3, 'Retired', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(4, 'Not Employed', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(5, 'Social Worker', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `ms_organization_category`
--

CREATE TABLE `ms_organization_category` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_organization_category`
--

INSERT INTO `ms_organization_category` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'School', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(2, 'Shelf-Help Group', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(3, 'NGOs', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(4, 'Other', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `ms_state`
--

CREATE TABLE `ms_state` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_state`
--

INSERT INTO `ms_state` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Delhi', 1, '2020-01-07 06:00:00', '2020-01-01 05:00:20'),
(2, 'Gujarat', 1, '2020-01-07 06:00:00', '2020-01-01 05:00:20'),
(3, 'Banglore', 1, '2020-01-07 06:00:00', '2020-01-01 05:00:20'),
(4, 'Tamil nadu', 1, '2020-01-07 06:00:00', '2020-01-01 05:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `ms_support_help`
--

CREATE TABLE `ms_support_help` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_support_help`
--

INSERT INTO `ms_support_help` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ann-Seva: Feed Hunger Monthly', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(2, 'Monitory Support for Education', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(3, 'Note-Books', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(4, 'School Uniforms', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(5, 'Other School Kits', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(6, 'Medical Support', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15'),
(7, 'Other', 1, '2019-07-30 04:18:20', '2019-07-30 05:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `ms_tags`
--

CREATE TABLE `ms_tags` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_tags`
--

INSERT INTO `ms_tags` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Donations', 1, '2019-09-04 10:44:08', '2019-09-04 10:44:17'),
(2, 'Inspiration', 1, '2019-09-04 10:44:34', '2019-09-04 11:34:59'),
(3, 'Ploat', 1, '2019-09-04 10:45:11', '2019-09-04 10:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `ms_user_role`
--

CREATE TABLE `ms_user_role` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_user_role`
--

INSERT INTO `ms_user_role` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(0, 'CEO', 1, '2019-07-30 09:20:24', '2019-07-30 09:20:24'),
(1, 'Volunteer', 1, '2019-07-30 09:20:24', '2019-07-30 09:20:24'),
(2, 'Organization', 1, '2019-07-30 09:20:24', '2019-07-30 09:20:24'),
(3, 'Excecutive/Lead', 1, '2019-07-30 09:20:24', '2019-07-30 09:20:24'),
(4, 'Co-ordinator', 1, '2019-07-30 09:20:24', '2019-07-30 09:20:24'),
(5, 'Beneficiary', 1, '2019-07-30 09:20:24', '2019-07-30 09:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reg_no` varchar(200) DEFAULT NULL,
  `org_category` int(11) NOT NULL,
  `org_category_txt` varchar(255) DEFAULT NULL,
  `org_strength` varchar(255) DEFAULT NULL,
  `support_help_id` int(11) NOT NULL,
  `support_help_text` varchar(600) NOT NULL,
  `reference` varchar(300) NOT NULL,
  `other_reference` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `user_id`, `reg_no`, `org_category`, `org_category_txt`, `org_strength`, `support_help_id`, `support_help_text`, `reference`, `other_reference`, `created_at`, `updated_at`) VALUES
(17, 207, 'reg 164', 4, 'fashion', 'More than 50', 7, 'need money', '5', 'freind', '2019-09-03 14:24:33', '2019-09-03 14:24:33'),
(18, 208, 'Jams', 1, 'School', 'Less than 50', 4, 'School Uniforms', '3', 'Family/Friends', '2019-09-04 09:33:11', '2019-09-04 10:08:06'),
(19, 209, 'asdas', 2, 'Shelf-Help Group', 'More than 50', 3, 'Note-Books', '3', 'Family/Friends', '2019-09-04 12:48:49', '2019-09-04 12:48:49'),
(20, 247, '987', 2, 'Shelf-Help Group', 'More than 100', 3, 'Note-Books', '2', 'Facebook', '2020-01-10 21:05:21', '2020-01-10 21:05:21'),
(21, 248, '8866056366', 3, 'NGOs', 'More than 100', 2, 'Monitory Support for Education', '1', 'Website', '2020-02-08 16:13:46', '2020-02-08 16:13:46'),
(22, 249, 'vastra', 1, 'School', 'More than 100', 3, 'Note-Books', '3', 'Family/Friends', '2020-02-08 20:28:38', '2020-02-08 20:28:38'),
(23, 250, 'LP1660000', 3, 'NGOs', 'More than 50', 4, 'Note-Books', '1', 'Family/Friends', '2020-02-10 12:40:08', '2020-02-12 19:58:58'),
(24, 251, 'LAMD01', 2, 'Shelf-Help Group', 'More than 50', 5, 'Other School Kits', '3', 'Family/Friends', '2020-02-13 11:22:17', '2020-02-13 11:22:17'),
(25, 254, 'casds', 3, 'Shelf-Help Group', 'More than 100', 2, 'Monitory Support for Education', '3', 'Family/Friends', '2020-02-14 14:13:53', '2020-02-14 14:24:12'),
(26, 256, 'POPUP', 2, 'Shelf-Help Group', 'More than 100', 3, 'Note-Books', '2', 'Facebook', '2020-02-14 15:23:21', '2020-02-14 15:34:52'),
(27, 240, '0', 0, '', '', 0, '', '0', '', '2020-02-19 13:09:13', '2020-02-19 13:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `organization_file`
--

CREATE TABLE `organization_file` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `file` varchar(150) NOT NULL,
  `file_type` varchar(10) NOT NULL DEFAULT 'img',
  `file_name` varchar(255) DEFAULT NULL,
  `type` varchar(2) NOT NULL DEFAULT 'D' COMMENT 'D - document C-certificate',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization_file`
--

INSERT INTO `organization_file` (`id`, `organization_id`, `file`, `file_type`, `file_name`, `type`, `created_at`, `updated_at`) VALUES
(17, 17, 'Document1567520648_556.jpg', 'img', 'intro.jpg', 'C', '2019-09-03 14:24:33', '2019-09-03 14:24:33'),
(18, 17, 'Document1567520651_833.zip', 'img', 'raju.zip', 'C', '2019-09-03 14:24:33', '2019-09-03 14:24:33'),
(19, 17, 'Document1567520653_801.jpg', 'img', 'valencia.jpg', 'C', '2019-09-03 14:24:33', '2019-09-03 14:24:33'),
(20, 17, 'Document1567520656_52.zip', 'img', 'raju.zip', 'D', '2019-09-03 14:24:33', '2019-09-03 14:24:33'),
(21, 17, 'Document1567520658_272.jpg', 'img', 'valencia.jpg', 'D', '2019-09-03 14:24:33', '2019-09-03 14:24:33'),
(22, 18, 'Document1567589558_686.jpg', 'img', 'intro.jpg', 'C', '2019-09-04 09:33:11', '2019-09-04 09:33:11'),
(23, 18, 'Document1567589566_264.jpg', 'img', 'nashville-new-construction-homes-for-sale-2.jpg', 'C', '2019-09-04 09:33:11', '2019-09-04 09:33:11'),
(24, 18, 'Document1567589562_470.jpeg', 'img', 'maher-homes-elevation-11859394.jpeg', 'D', '2019-09-04 09:33:11', '2019-09-04 09:33:11'),
(25, 18, 'Document1567589569_661.jpg', 'img', 'model-list-item.jpg', 'D', '2019-09-04 09:33:11', '2019-09-04 09:33:11'),
(26, 19, 'Document1567601322_271.jpeg', 'img', 'maher-homes-elevation-11859394.jpeg', 'C', '2019-09-04 12:48:50', '2019-09-04 12:48:50'),
(27, 19, 'Document1567601325_477.jpeg', 'img', 'maher-homes-elevation-11859394.jpeg', 'D', '2019-09-04 12:48:50', '2019-09-04 12:48:50'),
(28, 20, 'Document1578670445_711.jpg', 'img', 'IMG-20190704-WA0102.jpg', 'C', '2020-01-10 21:05:21', '2020-01-10 21:05:21'),
(29, 20, 'Document1578670450_738.jpg', 'img', 'IMG_20191105_110404 (1).jpg', 'D', '2020-01-10 21:05:22', '2020-01-10 21:05:22'),
(46, 250, 'Document1581333150_960.zip', 'img', 'zenith-slider-master.zip', 'D', '2020-02-10 16:42:34', '2020-02-10 16:42:34'),
(47, 250, 'Document1581333361_589.php', 'img', 'wpindexDelete.php', 'C', '2020-02-10 16:46:16', '2020-02-10 16:46:16'),
(48, 251, 'Document1581573024_911.png', 'img', 'Striped_Background_Effect_Transparent_PNG_Clip_Art_Image.png', 'C', '2020-02-13 11:22:17', '2020-02-13 11:22:17'),
(49, 251, 'Document1581573028_185.jpg', 'img', 'sacred-geometry-event-positive-nights.jpg', 'D', '2020-02-13 11:22:17', '2020-02-13 11:22:17'),
(50, 254, 'Document1581669345_282.jpg', 'img', 'sad-girl-cartoon-sitting-alone-vector-21558557.jpg', 'C', '2020-02-14 14:13:53', '2020-02-14 14:13:53'),
(51, 254, 'Document1581669348_613.png', 'img', 'swami-vivekananda-cku.png', 'D', '2020-02-14 14:13:54', '2020-02-14 14:13:54'),
(52, 256, 'Document1581673967_641.jpg', 'img', 'sacred-geometry-event-positive-nights.jpg', 'C', '2020-02-14 15:23:22', '2020-02-14 15:23:22'),
(53, 256, 'Document1581673980_77.jpg', 'img', 'Nice-Love-Wallpaper.jpg', 'C', '2020-02-14 15:23:22', '2020-02-14 15:23:22'),
(54, 256, 'Document1581673973_344.jpg', 'img', 'natural-light-photography-tips-for-beginners-Photojaanic-120.jpg', 'D', '2020-02-14 15:23:22', '2020-02-14 15:23:22'),
(55, 256, 'Document1581673993_182.jpg', 'img', 'Master.jpg', 'D', '2020-02-14 15:23:22', '2020-02-14 15:23:22'),
(56, 256, 'Document1581674679_327.jpg', 'img', 'Sea_Sunrise_Background-1063.jpg', 'C', '2020-02-14 15:34:53', '2020-02-14 15:34:53'),
(57, 256, 'Document1581674689_271.jpg', 'img', 'Nice-Love-Wallpaper.jpg', 'D', '2020-02-14 15:34:53', '2020-02-14 15:34:53'),
(58, 240, 'profile_Document1578468502_622.jpg', 'img', NULL, 'C', '2020-02-19 13:09:13', '2020-02-19 13:09:13'),
(59, 240, 'id_Document1578468516_361.jpeg', 'img', NULL, 'C', '2020-02-19 13:09:13', '2020-02-19 13:09:13'),
(60, 240, 'repo_Document1578468519_628.jpg', 'img', NULL, 'C', '2020-02-19 13:09:13', '2020-02-19 13:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL DEFAULT '0',
  `project_name` varchar(255) NOT NULL,
  `slug` varchar(1024) DEFAULT NULL,
  `workspace` int(11) NOT NULL,
  `description` text NOT NULL,
  `project_lead_id` int(11) DEFAULT NULL,
  `project_mananger` int(11) NOT NULL,
  `workflow` int(11) NOT NULL,
  `planned_revenue` varchar(20) NOT NULL DEFAULT '0',
  `planned_expense` varchar(20) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `tags` varchar(300) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `creator_id`, `project_name`, `slug`, `workspace`, `description`, `project_lead_id`, `project_mananger`, `workflow`, `planned_revenue`, `planned_expense`, `start_date`, `end_date`, `status`, `tags`, `created_at`, `updated_at`) VALUES
(1, 0, 'Perfect 31 pap', 'perfect-31-pap', 0, '<p>perfect</p><p><br></p><p>i wiolll sd sadas <span class="ql-size-huge" style="color: rgb(255, 255, 102);">dassd</span><span class="ql-size-huge"> asd World pepa</span></p><p><br></p><p><br></p><p><span class="ql-size-huge">Manoj Patel</span></p><p><br></p><p><br></p><p><br></p>', 154, 156, 0, '10000', '10', '2019-08-26', '2019-08-30', 1, '[{"id":2,"title":"Inspiration"}]', '2019-08-26 06:36:16', '2020-02-06 21:09:45'),
(5, 0, 'Project 2', '5', 0, 'perfect', NULL, 156, 0, '10000', '10', '2019-08-26', '2019-08-30', 1, NULL, '2019-08-26 07:03:36', '2019-08-26 07:03:36'),
(6, 0, 'Project 1', '6', 0, '<p><br></p>', NULL, 156, 0, '0', '0', '2019-08-26', '2019-08-26', 1, NULL, '2019-08-26 10:22:35', '2019-08-26 10:22:35'),
(7, 0, 'Mertic Scholarship', '7', 0, '<p>as ssdsa</p><p>s</p><p>da</p><p>sd</p><p>ad</p><p>sa</p><p>das</p><p>dasdads</p>', NULL, 156, 0, '150000', '1000', '2019-08-28', '2019-08-31', 1, NULL, '2019-08-27 06:46:45', '2019-08-27 06:46:45'),
(8, 0, 'Financial Aid for Education', 'financial-aid-for-education', 0, '<p>Hello </p><p><br></p><p><br></p><p><strong style="color: rgb(255, 153, 0);">Wonder kar</strong></p><p><br></p>', 186, 174, 0, '12000', '1200', '2019-08-27', '2019-11-16', 1, '[{"id":2,"title":"Inspiration"}]', '2019-08-27 11:43:20', '2019-12-18 17:35:49'),
(9, 0, 'Anna-Seva', 'anna-seva', 0, '<p>Hello </p><p><br></p><p><br></p><p><strong style="color: rgb(255, 153, 0);">Wonder kar</strong></p><p><br></p>', 186, 177, 0, '12000', '1200', '2019-08-27', '2020-01-17', 1, '[{"id":2,"title":"Inspiration"}]', '2019-08-27 14:59:09', '2020-02-06 18:24:49'),
(10, 0, 'Prayuta', 'prayuta', 0, '<p>Welcome to Ganesh </p><p><br></p><p>we produde to be indian</p><p><br></p>', 156, 156, 0, '0', '0', '2019-08-28', '2020-03-21', 1, '[{"id":2,"title":"Inspiration"}]', '2019-08-28 13:28:57', '2020-02-06 18:19:57'),
(11, 0, 'Nutrition for HIV+ Children', 'Nutrition', 0, '<p>sa</p><p>d</p><p>as</p><p>a</p><p>s</p><p><br></p>', 159, 179, 0, '1500', '1300', '2019-09-04', '2019-09-26', 1, '[{"id":2,"title":"Inspiration"},{"id":3,"title":"Ploat"}]', '2019-09-04 12:45:43', '2019-09-04 12:45:43'),
(12, 0, 'Xu', 'xu', 0, '<p>Piku</p><p><br></p><p><strong class="ql-size-huge" style="background-color: rgb(230, 0, 0); color: rgb(240, 102, 102);">Hello</strong><span style="color: rgb(240, 102, 102);"> </span></p><p>sd</p><p>asd</p><p>adsd</p><p>aasdasda</p><p>Ho<strong>w are you ?</strong></p><p><br></p>', 154, 154, 0, '1252', '111', '2019-12-18', '2019-12-31', 1, '[{"id":2,"title":"Inspiration"}]', '2019-12-18 17:38:24', '2020-02-06 21:06:47'),
(13, 251, 'Org project', 'org-project', 0, '<p>hello ddday pig	</p>', 154, 156, 0, '12500', '10000', '2020-02-13', '2020-05-23', 1, '[{"id":2,"title":"Inspiration"}]', '2020-02-13 14:36:48', '2020-03-09 13:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `project_expense`
--

CREATE TABLE `project_expense` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `amount` varchar(13) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `project_id` int(11) DEFAULT '0',
  `project_stage` varchar(20) DEFAULT NULL,
  `respose_user` int(11) DEFAULT NULL,
  `crm_id` int(11) DEFAULT NULL,
  `description` varchar(2048) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_expense`
--

INSERT INTO `project_expense` (`id`, `name`, `amount`, `date`, `project_id`, `project_stage`, `respose_user`, `crm_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'aaaa', '12222', '2019-12-09', 1, 'Plan', 154, 154, 'sdadas', '2019-12-10 17:35:48', '2019-12-10 17:35:48'),
(2, 'cccc', '212', '2019-12-03', 1, 'Complete', 154, 154, 'sds', '2019-12-11 15:28:02', '2019-12-11 15:28:02'),
(3, 'hiren payment c', '650', '2019-12-11', 9, 'Design', 171, 173, 'thanks god', '2019-12-12 19:10:49', '2019-12-12 19:10:49'),
(4, 'my stage why need', '1500', '2020-01-14', 12, 'Plan', 174, 150, 'loops and goal their is sjd sjdasjd akjsda sjdk sdaksjd skdjas dasjdk kasdjskdsadsd', '2020-02-06 15:11:49', '2020-02-06 15:11:49'),
(5, '', '28348', '2020-02-27', 6, '', 156, 1, '', '2020-03-04 17:39:16', '2020-03-04 17:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `project_file`
--

CREATE TABLE `project_file` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `file` varchar(150) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `meta_data` varchar(5000) DEFAULT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'D' COMMENT 'D - document C-certificate',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_file`
--

INSERT INTO `project_file` (`id`, `project_id`, `file`, `file_name`, `meta_data`, `type`, `created_at`, `updated_at`) VALUES
(28, 11, 'Document1576329645_599.jpg', 'kisspng-emoticon-smiley-vector-graphics-clip-art-thumb-sig-15-hi-emoji-or-hand-wave-emoji-heart-emoji-blac-5c5fd10ed82b71.5715323215497833108854.jpg', '{"size":"120 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"kisspng-emoticon-smiley-vector-graphics-clip-art-thumb-sig-15-hi-emoji-or-hand-wave-emoji-heart-emoji-blac-5c5fd10ed82b71.5715323215497833108854.jpg"}', 'img', '2019-12-14 18:50:45', '2019-12-14 18:50:45'),
(30, 9, 'Document1576330352_12.jpg', 'kisspng-emoticon-smiley-vector-graphics-clip-art-thumb-sig-15-hi-emoji-or-hand-wave-emoji-heart-emoji-blac-5c5fd10ed82b71.5715323215497833108854.jpg', '{"size":"120 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"kisspng-emoticon-smiley-vector-graphics-clip-art-thumb-sig-15-hi-emoji-or-hand-wave-emoji-heart-emoji-blac-5c5fd10ed82b71.5715323215497833108854.jpg"}', 'img', '2019-12-14 19:02:32', '2019-12-14 19:02:32'),
(31, 9, 'Document1576330355_545.jpg', 'kisspng-emoticon-smiley-vector-graphics-clip-art-thumb-sig-15-hi-emoji-or-hand-wave-emoji-heart-emoji-blac-5c5fd10ed82b71.5715323215497833108854.jpg', '{"size":"120 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"kisspng-emoticon-smiley-vector-graphics-clip-art-thumb-sig-15-hi-emoji-or-hand-wave-emoji-heart-emoji-blac-5c5fd10ed82b71.5715323215497833108854.jpg"}', 'img', '2019-12-14 19:02:35', '2019-12-14 19:02:35'),
(33, 10, 'Document1576330499_91.jpg', 'maxresdefault (2).jpg', '{"size":"86.42 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"maxresdefault (2).jpg"}', 'img', '2019-12-14 19:04:59', '2019-12-14 19:04:59'),
(34, 10, 'Document1576330612_320.jpg', 'sad-girl-cartoon-sitting-alone-vector-21558557.jpg', '{"size":"146.72 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"sad-girl-cartoon-sitting-alone-vector-21558557.jpg"}', 'img', '2019-12-14 19:06:52', '2019-12-14 19:06:52'),
(35, 7, 'Document1576330734_814.jpg', 'sad-girl-cartoon-sitting-alone-vector-21558557.jpg', '{"size":"146.72 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"sad-girl-cartoon-sitting-alone-vector-21558557.jpg"}', 'img', '2019-12-14 19:08:54', '2019-12-14 19:08:54'),
(36, 7, 'Document1576330738_708.png', 'Lines-PNG-Background-Photo.png', '{"size":"4.38 KB","mime_type":"image\\/png","extention":"png","filename":"Lines-PNG-Background-Photo.png"}', 'img', '2019-12-14 19:08:58', '2019-12-14 19:08:58'),
(37, 7, 'Document1576330952_22.sql', 'project_note.sql', '{"size":"1.98 KB","mime_type":"text\\/plain","extention":"sql","filename":"project_note.sql"}', 'file', '2019-12-14 19:12:32', '2019-12-14 19:12:32'),
(39, 10, 'Document1576332046_303.pdf', 'Mahiti Pustika.pdf', '{"size":"3.72 MB","mime_type":"application\\/pdf","extention":"pdf","filename":"Mahiti Pustika.pdf"}', 'file', '2019-12-14 19:30:46', '2019-12-14 19:30:46'),
(40, 10, 'Document1576332309_552.pdf', 'Mahiti Pustika.pdf', '{"size":"3.72 MB","mime_type":"application\\/pdf","extention":"pdf","filename":"Mahiti Pustika.pdf"}', 'file', '2019-12-14 19:35:09', '2019-12-14 19:35:09'),
(42, 1, 'Document1576332958_362.png', 'Striped_Background_Effect_Transparent_PNG_Clip_Art_Image.png', '{"size":"10.79 KB","mime_type":"image\\/png","extention":"png","filename":"Striped_Background_Effect_Transparent_PNG_Clip_Art_Image.png"}', 'img', '2019-12-14 19:45:58', '2019-12-14 19:45:58'),
(43, 1, 'Document1576333160_252.jpg', 'kisspng-emoticon-smiley-vector-graphics-clip-art-thumb-sig-15-hi-emoji-or-hand-wave-emoji-heart-emoji-blac-5c5fd10ed82b71.5715323215497833108854.jpg', '{"size":"120 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"kisspng-emoticon-smiley-vector-graphics-clip-art-thumb-sig-15-hi-emoji-or-hand-wave-emoji-heart-emoji-blac-5c5fd10ed82b71.5715323215497833108854.jpg"}', 'img', '2019-12-14 19:49:20', '2019-12-14 19:49:20'),
(45, 12, 'Document1578139388_523.jpeg', 'WhatsApp Image 2020-01-02 at 2.46.43 PM.jpeg', '{"size":"83.92 KB","mime_type":"image\\/jpeg","extention":"jpeg","filename":"WhatsApp Image 2020-01-02 at 2.46.43 PM.jpeg"}', 'img', '2020-01-04 17:33:08', '2020-01-04 17:33:08'),
(46, 12, 'Document1578139399_465.png', 'iNNER EYE  iEF   Compassion   Charity   Service(10).png', '{"size":"278.31 KB","mime_type":"image\\/png","extention":"png","filename":"iNNER EYE  iEF   Compassion   Charity   Service(10).png"}', 'img', '2020-01-04 17:33:19', '2020-01-04 17:33:19'),
(47, 11, 'Document1582988259_620.zip', 'zenith-slider-master.zip', '{"size":"4.69 MB","mime_type":"application\\/zip","extention":"zip","filename":"zenith-slider-master.zip"}', 'file', '2020-02-29 20:27:39', '2020-02-29 20:27:39'),
(48, 11, 'Document1582988281_186.zip', 'vue-color-master.zip', '{"size":"529.36 KB","mime_type":"application\\/zip","extention":"zip","filename":"vue-color-master.zip"}', 'file', '2020-02-29 20:28:01', '2020-02-29 20:28:01'),
(49, 11, 'Document1582988288_322.jpg', 'vector-background-wallpaper-with-polygons-in-gradient-colors (1).jpg', '{"size":"265.16 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"vector-background-wallpaper-with-polygons-in-gradient-colors (1).jpg"}', 'img', '2020-02-29 20:28:08', '2020-02-29 20:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `project_note`
--

CREATE TABLE `project_note` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `note` varchar(2048) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_note`
--

INSERT INTO `project_note` (`id`, `project_id`, `note`, `user_id`, `updated_at`, `created_at`) VALUES
(35, 11, 'Hello alexa', 1, '2019-12-12 12:01:08', '2019-12-12 12:01:08'),
(36, 9, 'Hello All Hello Alls Hello All Hello Alls', 1, '2019-12-12 18:29:39', '2019-12-12 18:29:09'),
(37, 9, 'xxxx', 1, '2019-12-12 18:32:59', '2019-12-12 18:32:59'),
(38, 1, 'asdasd asdasdd a23423', 1, '2019-12-12 18:46:30', '2019-12-12 18:45:01'),
(39, 1, 'xx sdas das manoj', 1, '2019-12-12 18:47:04', '2019-12-12 18:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `project_team`
--

CREATE TABLE `project_team` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_team`
--

INSERT INTO `project_team` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 156, '2019-08-26 07:03:36', '2019-08-26 07:03:36'),
(2, 5, 170, '2019-08-26 07:03:36', '2019-08-26 07:03:36'),
(3, 5, 178, '2019-08-26 07:03:36', '2019-08-26 07:03:36'),
(4, 6, 156, '2019-08-26 10:22:35', '2019-08-26 10:22:35'),
(5, 6, 157, '2019-08-26 10:22:35', '2019-08-26 10:22:35'),
(6, 7, 156, '2019-08-27 06:46:45', '2019-08-27 06:46:45'),
(13, 11, 157, '2019-09-04 12:45:43', '2019-09-04 12:45:43'),
(14, 11, 173, '2019-09-04 12:45:43', '2019-09-04 12:45:43'),
(15, 11, 179, '2019-09-04 12:45:43', '2019-09-04 12:45:43'),
(20, 2, 157, '2019-09-20 10:47:08', '2019-09-20 10:47:08'),
(21, 2, 183, '2019-09-20 10:47:08', '2019-09-20 10:47:08'),
(22, 5, 181, '2019-09-21 09:15:11', '2019-09-21 09:15:11'),
(23, 5, 183, '2019-09-21 09:15:11', '2019-09-21 09:15:11'),
(26, 8, 157, '2019-12-18 17:35:49', '2019-12-18 17:35:49'),
(27, 8, 187, '2019-12-18 17:35:49', '2019-12-18 17:35:49'),
(36, 12, 157, '2020-02-06 21:06:47', '2020-02-06 21:06:47'),
(41, 9, 157, '2020-02-06 21:08:46', '2020-02-06 21:08:46'),
(42, 9, 187, '2020-02-06 21:08:46', '2020-02-06 21:08:46'),
(45, 1, 159, '2020-02-06 21:09:45', '2020-02-06 21:09:45'),
(46, 1, 181, '2020-02-06 21:09:45', '2020-02-06 21:09:45'),
(52, 10, 156, '2020-03-02 16:05:01', '2020-03-02 16:05:01'),
(53, 10, 157, '2020-03-02 16:05:01', '2020-03-02 16:05:01'),
(54, 10, 169, '2020-03-02 16:05:01', '2020-03-02 16:05:01'),
(55, 10, 181, '2020-03-02 16:05:01', '2020-03-02 16:05:01'),
(58, 13, 154, '2020-03-09 13:10:46', '2020-03-09 13:10:46'),
(59, 13, 157, '2020-03-09 13:10:46', '2020-03-09 13:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `task_manager` int(11) NOT NULL,
  `task_assignee` int(11) NOT NULL DEFAULT '0',
  `project_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL COMMENT 'befenficiary id from user table ',
  `recurring_id` int(11) NOT NULL DEFAULT '0',
  `is_recurring` tinyint(4) NOT NULL DEFAULT '0',
  `mode` varchar(10) DEFAULT NULL,
  `day` varchar(200) DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `tags` varchar(500) DEFAULT NULL,
  `startdatetime` datetime DEFAULT NULL,
  `enddatetime` datetime DEFAULT NULL,
  `start_task_datetime` datetime DEFAULT NULL,
  `end_task_datetime` datetime DEFAULT NULL,
  `reminderdatetime` datetime DEFAULT NULL,
  `is_notified` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=not done',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `creator_id`, `title`, `priority`, `description`, `task_manager`, `task_assignee`, `project_id`, `contact_id`, `recurring_id`, `is_recurring`, `mode`, `day`, `enddate`, `tags`, `startdatetime`, `enddatetime`, `start_task_datetime`, `end_task_datetime`, `reminderdatetime`, `is_notified`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Single', 'Medium', '<p>singele</p><p>sad</p><p>asdas</p><p>da</p><p>s</p><p>dasd</p>', 150, 150, 1, 0, 0, 0, '0', '[]', NULL, '[{"id":1,"title":"Donations"}]', '2020-05-18 12:00:00', '2020-05-28 12:00:00', '2020-05-18 12:00:00', '2020-05-28 12:00:00', '2020-05-17 12:00:00', 1, 0, '2020-05-18 15:40:57', '2020-05-21 19:44:44'),
(2, 1, 'Ddd', 'High', '<p>sdsa</p>', 154, 156, 1, 0, 0, 0, 'weekly', '[]', NULL, '[{"id":3,"title":"Ploat"}]', '2020-05-18 12:00:00', '2020-05-30 12:00:00', '2020-05-18 12:00:00', '2020-05-30 12:00:00', '2020-05-17 12:00:00', 1, 0, '2020-05-18 16:12:45', '2020-05-21 19:44:44'),
(3, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 0, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:00:00', '2020-05-20 00:00:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:00:00', 1, 0, '2020-05-18 18:23:04', '2020-05-21 19:44:44'),
(4, 1, 'monthly', 'High', '<p>monthly</p>', 150, 150, 9, 0, 0, 1, 'monthly', '[]', '2020-08-28', '[{"id":3,"title":"Ploat"}]', '2020-05-22 12:15:00', '2020-05-23 16:00:00', '2020-05-22 12:15:00', '2020-05-23 16:00:00', '2020-05-21 00:00:00', 1, 0, '2020-05-20 14:20:38', '2020-05-21 19:44:44'),
(6, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 0, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:00:00', '2020-05-20 00:00:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:00:00', 1, 0, '2020-05-21 18:12:00', '2020-05-21 19:44:44'),
(7, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 0, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:00:00', '2020-05-20 00:00:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:00:00', 1, 0, '2020-05-21 18:13:31', '2020-05-21 19:44:44'),
(8, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 0, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:15:14', '2020-05-21 19:44:44'),
(9, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:20:16', '2020-05-21 19:44:44'),
(10, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:22:00', '2020-05-21 19:44:44'),
(11, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:22:25', '2020-05-21 19:44:44'),
(14, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:34:28', '2020-05-21 19:44:44'),
(16, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:38:42', '2020-05-21 19:44:44'),
(17, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:39:27', '2020-05-21 19:44:44'),
(18, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:39:35', '2020-05-21 19:44:44'),
(19, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:43:05', '2020-05-21 19:44:44'),
(20, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:43:54', '2020-05-21 19:44:44'),
(21, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:44:50', '2020-05-21 19:44:44'),
(22, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:45:27', '2020-05-21 19:44:44'),
(23, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:45:29', '2020-05-21 19:44:44'),
(24, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:45:59', '2020-05-21 19:44:44'),
(28, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:48:10', '2020-05-21 19:44:44'),
(29, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:48:24', '2020-05-21 19:44:44'),
(30, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:49:46', '2020-05-21 19:44:44'),
(31, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:51:58', '2020-05-21 19:46:10'),
(33, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:53:43', '2020-05-21 19:44:44'),
(34, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:53:45', '2020-05-21 19:44:44'),
(35, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:54:17', '2020-05-21 19:44:44'),
(36, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:54:18', '2020-05-21 19:44:44'),
(37, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:54:20', '2020-05-21 19:44:44'),
(38, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:57:49', '2020-05-21 19:44:44'),
(39, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:57:51', '2020-05-21 19:44:44'),
(40, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:57:52', '2020-05-21 19:44:44'),
(41, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:59:36', '2020-05-21 19:44:44'),
(42, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 18:59:52', '2020-05-21 19:44:44'),
(44, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 19:04:23', '2020-05-21 19:44:44'),
(45, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 19:05:43', '2020-05-21 19:44:44'),
(46, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 19:06:35', '2020-05-21 19:44:44'),
(47, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 19:07:20', '2020-05-21 19:44:44'),
(48, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 19:09:20', '2020-05-21 19:44:44'),
(49, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 19:11:23', '2020-05-21 19:44:44'),
(51, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 19:18:47', '2020-05-21 19:44:44'),
(52, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 1, 0, '2020-05-21 19:23:45', '2020-05-22 00:23:09'),
(53, 1, 'weeklu', 'Low', '<p>sdasdas </p><p><br></p><p>da</p><p>sd</p><p>asd</p>', 156, 157, 1, 0, 3, 1, 'weekly', '["2","3"]', NULL, '[{"id":2,"title":"Inspiration"}]', '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:00:00', '2020-05-30 00:00:00', '2020-05-18 00:20:00', 0, 0, '2020-05-21 19:24:20', '2020-05-22 00:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `task_check_list`
--

CREATE TABLE `task_check_list` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `completed_date` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_check_list`
--

INSERT INTO `task_check_list` (`id`, `task_id`, `title`, `completed_date`, `status`, `created_at`, `updated_at`) VALUES
(80, 3, 'avv', NULL, 0, '2020-05-21 18:54:20', '2020-05-21 18:54:20'),
(81, 3, 'prita', NULL, 0, '2020-05-21 18:54:20', '2020-05-21 18:54:20'),
(150, 48, 'avv', NULL, 0, '2020-05-21 19:09:20', '2020-05-21 19:09:20'),
(151, 48, 'prita', NULL, 0, '2020-05-21 19:09:20', '2020-05-21 19:09:20'),
(152, 49, 'avv', NULL, 0, '2020-05-21 19:11:23', '2020-05-21 19:11:23'),
(153, 49, 'prita', NULL, 0, '2020-05-21 19:11:23', '2020-05-21 19:11:23'),
(156, 51, 'avv', NULL, 0, '2020-05-21 19:18:47', '2020-05-21 19:18:47'),
(157, 51, 'prita', NULL, 0, '2020-05-21 19:18:47', '2020-05-21 19:18:47'),
(158, 52, 'avv', NULL, 0, '2020-05-21 19:23:45', '2020-05-21 19:23:45'),
(159, 52, 'prita', NULL, 0, '2020-05-21 19:23:45', '2020-05-21 19:23:45'),
(160, 53, 'avv', NULL, 0, '2020-05-21 19:24:20', '2020-05-21 19:24:20'),
(161, 53, 'prita', NULL, 0, '2020-05-21 19:24:20', '2020-05-21 19:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `task_file`
--

CREATE TABLE `task_file` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `file_url` varchar(60) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_file`
--

INSERT INTO `task_file` (`id`, `task_id`, `file_url`, `file_name`, `created_at`, `updated_at`) VALUES
(1, 3, 'Document1589964636_2.jpg', 'vegetables.jpg', '2020-05-20 14:20:39', '2020-05-20 14:20:39'),
(2, 49, 'Document1589964636_2.jpg', 'vegetables.jpg', '2020-05-21 19:11:23', '2020-05-21 19:11:23'),
(4, 51, 'Document1589964636_2.jpg', 'vegetables.jpg', '2020-05-21 19:18:47', '2020-05-21 19:18:47'),
(5, 52, 'Document1589964636_2.jpg', 'vegetables.jpg', '2020-05-21 19:23:45', '2020-05-21 19:23:45'),
(6, 53, 'Document1589964636_2.jpg', 'vegetables.jpg', '2020-05-21 19:24:20', '2020-05-21 19:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `task_observers`
--

CREATE TABLE `task_observers` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_observers`
--

INSERT INTO `task_observers` (`id`, `task_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 1, 184, '2020-05-18 16:05:34', '2020-05-18 16:05:34'),
(19, 2, 169, '2020-05-18 17:57:30', '2020-05-18 17:57:30'),
(20, 3, 164, '2020-05-18 18:23:04', '2020-05-18 18:23:04'),
(21, 4, 162, '2020-05-20 14:20:38', '2020-05-20 14:20:38'),
(22, 4, 166, '2020-05-20 14:20:38', '2020-05-20 14:20:38'),
(23, 44, 164, '2020-05-21 19:04:23', '2020-05-21 19:04:23'),
(24, 45, 164, '2020-05-21 19:05:43', '2020-05-21 19:05:43'),
(25, 46, 164, '2020-05-21 19:06:35', '2020-05-21 19:06:35'),
(26, 47, 164, '2020-05-21 19:07:20', '2020-05-21 19:07:20'),
(27, 48, 164, '2020-05-21 19:09:20', '2020-05-21 19:09:20'),
(28, 49, 164, '2020-05-21 19:11:23', '2020-05-21 19:11:23'),
(30, 51, 164, '2020-05-21 19:18:47', '2020-05-21 19:18:47'),
(31, 52, 164, '2020-05-21 19:23:45', '2020-05-21 19:23:45'),
(32, 53, 164, '2020-05-21 19:24:20', '2020-05-21 19:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `task_schedule`
--

CREATE TABLE `task_schedule` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `reminder_datetime` datetime DEFAULT NULL,
  `is_created` int(11) NOT NULL DEFAULT '0',
  `notified` tinyint(4) NOT NULL DEFAULT '0',
  `is_recuring` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_schedule`
--

INSERT INTO `task_schedule` (`id`, `task_id`, `start_datetime`, `end_datetime`, `reminder_datetime`, `is_created`, `notified`, `is_recuring`) VALUES
(1, 3, '2020-05-20 00:15:00', '2020-05-20 00:10:00', '2020-05-18 00:20:00', 0, 0, 0),
(2, 3, '2020-05-26 00:00:00', '2020-05-26 00:00:00', '2020-05-18 00:00:00', 0, 0, 0),
(3, 3, '2020-05-27 00:00:00', '2020-05-27 00:00:00', '2020-05-18 00:00:00', 0, 0, 0),
(4, 4, '2020-06-22 12:15:00', '2020-06-23 16:00:00', '2020-05-21 00:00:00', 0, 0, 0),
(5, 4, '2020-07-22 12:15:00', '2020-07-23 16:00:00', '2020-05-21 00:00:00', 0, 0, 0),
(6, 4, '2020-08-22 12:15:00', '2020-08-23 16:00:00', '2020-05-21 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `creator_id` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '0=admin 1=volunteer 2=organization',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `banner_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address_line1` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line2` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_profile_completed` tinyint(4) NOT NULL DEFAULT '0',
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_in` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` int(11) DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_email_verified` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `creator_id`, `first_name`, `last_name`, `email`, `role_id`, `phone`, `profile_pic`, `banner_image`, `gender`, `dob`, `address_line1`, `address_line2`, `city`, `district`, `state`, `is_profile_completed`, `pincode`, `live_in`, `position`, `blood_group`, `email_verified_at`, `password`, `status`, `is_email_verified`, `remember_token`, `online`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin InnerEye', NULL, 'admin@innereye.com', 0, '9448438583', 'Document1582121882_671.jpg', NULL, NULL, NULL, 'innereyefoundation@gmail.com', NULL, NULL, NULL, 'Delhi', 0, NULL, NULL, NULL, NULL, NULL, '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, 'gFWI4FZnw7kRCkageVQi9F1yq8vcurfqJrxOUaIUCpRk7D86nvBLlLLASb74', 0, NULL, '2020-02-19 14:18:02'),
(2, 1, 'Admin InnerEye', NULL, 'admina@innereye.com', 0, '8866056956', 'Document1567589562_470.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Executive', NULL, NULL, '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '2JM6wDgTHrfEUu5HkQXEZCrSLrzcmVYJLZitLYFhM9VyANQgEpaw8k6ObtGF', 0, NULL, '2019-08-12 00:57:21'),
(3, 1, 'Howell Stroman 3', NULL, 'osinski.ezra@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'snxGrGYrsj', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(4, 1, 'Jedidiah Lynch 4', NULL, 'creola29@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '9g8onLAw0t', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(5, 1, 'Marianne O\'Kon Jr. 5', NULL, 'braun.paige@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '5xRFYb7ygL', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(6, 1, 'Emerson Boyle 6', NULL, 'hwisozk@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'sUbaxyZKYu', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(7, 1, 'Missouri Dicki 7', NULL, 'joshuah21@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'JKQojDtrMz', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(8, 1, 'Marisol Hane 8', NULL, 'unique.schmeler@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 2, 0, 'KUg5LIxHLh', 0, '2019-07-30 02:57:36', '2019-08-17 11:47:49'),
(9, 1, 'Fay Bergstrom 9', NULL, 'ndietrich@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'LZNQwXdrHx', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(10, 1, 'Michale Thiel 10', NULL, 'tritchie@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'cG0euSeoO2', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(11, 1, 'Wilbert McLaughlin 11', NULL, 'ofelia66@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 1, 'sPV0jdGZRl', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(12, 1, 'Orie Baumbach 12', NULL, 'bernhard.muller@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 1, 'kVKmwTOHv6', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(13, 1, 'Zoe Lueilwitz 13', NULL, 'bblanda@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'XJNiDl1KOG', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(14, 1, 'Claudine Abshire 14', NULL, 'rippin.dorothy@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'Rc9zVLx2X0', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(15, 1, 'Prof. Cleveland Schowalter 15', NULL, 'isimonis@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'CKgWgWN5LL', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(16, 1, 'Ms. Margret Williamson I 16', NULL, 'ransom89@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'LEnofSYpcN', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(17, 1, 'Clovis Schimmel 17', NULL, 'damore.trey@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '2tjF4Cmn4B', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(18, 1, 'Eugene Marvin 18', NULL, 'pschmidt@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'tGgmWMmM6g', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(19, 1, 'Austyn Towne 19', NULL, 'rhodkiewicz@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'Bf2SgCmwXn', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(20, 1, 'Mr. Travon Kuhlman III 20', NULL, 'flatley.bret@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'o8nCRmdZem', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(21, 1, 'Annie Gusikowski 21', NULL, 'rjaskolski@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'rTb31cUsfk', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(22, 1, 'Miss Elyssa Grady 22', NULL, 'betty59@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'C3xSsCktP6', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(23, 1, 'Lesley Gutmann 23', NULL, 'lessie.cummerata@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'rp2QOBpgyP', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(24, 1, 'Prof. Bryana Daugherty II 24', NULL, 'clark36@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'hGEFC4ZK00', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(25, 1, 'Lavinia Schinner 25', NULL, 'considine.camilla@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'i5A07GffAn', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(26, 1, 'Constantin Dietrich PhD 26', NULL, 'waelchi.kenyon@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'FcircwCDy0', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(27, 1, 'Leanna Blick 27', NULL, 'mateo.kuphal@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'jdkDu5e9zM', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(28, 1, 'Deshaun Beatty V 28', NULL, 'mccullough.izaiah@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'AsWSTAmuEh', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(29, 1, 'Tremayne Mertz 29', NULL, 'cassandra88@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'yMkOFHJKvV', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(30, 1, 'Caleigh Bahringer 30', NULL, 'yundt.jose@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'giUtTKnZSm', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(31, 1, 'Mrs. Elinor Reilly 31', NULL, 'mateo.schaefer@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'WnIDv81RE1', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(32, 1, 'Prof. Shanny Champlin IV 32', NULL, 'guiseppe67@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'P3fKe2qocV', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(33, 1, 'Whitney Fahey 33', NULL, 'nberge@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 2, 0, 'c8RxR4lmNq', 1, '2019-07-30 02:57:36', '2019-08-29 08:59:16'),
(34, 1, 'Prof. Silas Fritsch PhD 34', NULL, 'blaise81@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 2, 0, 'Al9eTSqbVp', 0, '2019-07-30 02:57:36', '2019-08-29 08:58:56'),
(35, 1, 'Mr. Casimer Russel 35', NULL, 'ashlee.haag@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'ttRiN2jyDV', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(36, 1, 'Prof. Murray Borer 36', NULL, 'dwillms@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'e2gNfBmGFH', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(37, 1, 'Sven Marvin MD 37', NULL, 'lynch.jayden@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'K5AyaPfsaU', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(38, 1, 'Madison Volkman 38', NULL, 'wframi@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'mEDplyU3la', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(39, 1, 'Dashawn Baumbach 39', NULL, 'keely.koss@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'iBkowWeiQx', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(40, 1, 'Marianna Conroy 40', NULL, 'lexus82@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '28TQwrwYXc', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(41, 1, 'Prof. Aurelio Tremblay 41', NULL, 'hrutherford@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '6BhDDIkQBQ', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(42, 1, 'Prof. Samara Mills 42', NULL, 'abbigail74@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'Hizm2J7Eao', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(43, 1, 'Iliana Bauch 43', NULL, 'ed96@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '2oKUdhiPDV', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(44, 1, 'Kayla O\'Kon 44', NULL, 'kunde.euna@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'rSNT2F2Zks', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(45, 1, 'Prof. Camryn Champlin 45', NULL, 'ypouros@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'kNG4m5sfPw', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(46, 1, 'Miss Alexa Paucek 46', NULL, 'lehner.genoveva@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'jiJndTcpm8', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(47, 1, 'Cletus Braun 47', NULL, 'nwalsh@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'L7IjGOwUkY', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(48, 1, 'Leilani Oberbrunner 48', NULL, 'darrell75@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'EmNTtFbqxk', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(49, 1, 'Prof. Adrianna Lebsack 49', NULL, 'snikolaus@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'IvpCGdBWf6', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(50, 1, 'Susanna Lubowitz 50', NULL, 'wilderman.tabitha@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 02:57:36', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'iK43oQe8io', 0, '2019-07-30 02:57:36', '2019-07-30 02:57:36'),
(52, 1, 'odl0WOid2G 52', NULL, 'KiyTALrMGF@gmail.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '$2y$10$XMhvc4MJfF67PFbYAbzSSO5e9fBloGMtcfgN35Et5goipGREd7PBq', 1, 0, NULL, 0, NULL, NULL),
(53, 1, 'Mariam Roberts 53', NULL, 'gheaney@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'pwtmoQQ6GQ', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(54, 1, 'Richie Fadel 54', NULL, 'demarcus.aufderhar@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'vpdxskkhCX', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(55, 1, 'Anthony Stehr 55', NULL, 'brianne61@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'iQ03Hsd9o0', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(56, 1, 'Major Morar Jr. 56', NULL, 'mraz.iva@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'HdHnLenJnY', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(57, 1, 'Miss Nora Mraz 57', NULL, 'allison.homenick@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'rY5pMLGYM2', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(58, 1, 'Alejandrin Schulist 58', NULL, 'madison03@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'WYRqwqiJac', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(59, 1, 'Constantin Walker MD 59', NULL, 'tmayer@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'FxdbAzl4ON', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(60, 1, 'Trisha Torphy 60', NULL, 'fkihn@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'UeKYlEE5kP', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(61, 1, 'Ottis Hudson 61', NULL, 'stracke.monte@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'TxmP2kNj0d', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(62, 1, 'Miss Kathryn Murazik PhD 62', NULL, 'aric92@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'hOo0QQkovz', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(63, 1, 'Zita Schneider V 63', NULL, 'ohirthe@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'FkfKeTZ0WS', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(64, 1, 'Robb Stoltenberg 64', NULL, 'rau.connor@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'Ru9vX3ITNQ', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(65, 1, 'Laurianne Jones 65', NULL, 'jacobi.claudia@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'ygJqnOpoYR', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(66, 1, 'Estella Miller 66', NULL, 'elna.von@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '9ZY1L6muxf', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(67, 1, 'Harvey Koch 67', NULL, 'kailey37@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'yuUI0x36L8', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(68, 1, 'Dr. Kiara Hettinger 68', NULL, 'gianni34@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'HpH8dwg3sM', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(69, 1, 'Dakota Hand 69', NULL, 'utrantow@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'WnktmAlAAH', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(70, 1, 'Alexzander Fritsch 70', NULL, 'elta78@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'OjzyZ9Yzhs', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(71, 1, 'General Schoen Jr. 71', NULL, 'etorphy@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'msrD4Si3wd', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(72, 1, 'Isaias McCullough 72', NULL, 'altenwerth.ezequiel@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'Y8OAe2BPgt', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(73, 1, 'Llewellyn Gutmann 73', NULL, 'jwindler@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '8BDX4b7kl1', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(74, 1, 'Verla Johns 74', NULL, 'grutherford@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'NdQiQ6us9U', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(75, 1, 'Dr. Pearl Stiedemann 75', NULL, 'thad.brekke@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'w2FIJxPuMe', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(76, 1, 'Mr. Trenton Thiel 76', NULL, 'wunsch.jeffry@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'XvC6VIci3U', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(77, 1, 'Mr. Alden O\'Hara 77', NULL, 'stephanie.schneider@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'dIS3XaYFac', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(78, 1, 'Jasen Reinger I 78', NULL, 'dbarrows@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '9rWr1v1IIt', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(79, 1, 'Dr. Damien Hilpert 79', NULL, 'geovanny73@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '1r3MSZ58Vb', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(80, 1, 'Mr. Jean Weimann Jr. 80', NULL, 'edgar09@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '7wGrAImjdV', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(81, 1, 'Isidro Spencer 81', NULL, 'lesch.rory@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'H7eERagIxB', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(82, 1, 'Ciara Dickinson 82', NULL, 'brown.jailyn@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'fJhrDPFq3O', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(83, 1, 'Noemy Harris II 83', NULL, 'jacinthe.greenfelder@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'yL7KrKxpe5', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(84, 1, 'Prof. Wilbert Gislason 84', NULL, 'hartmann.zion@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'bINLD1pzDY', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(85, 1, 'Bria Willms 85', NULL, 'nina.will@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '7id6jiTrcz', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(86, 1, 'Prof. Mathilde Roob Jr. 86', NULL, 'rtromp@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'oj15jprONM', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(87, 1, 'Dr. Lenny Rolfson Sr. 87', NULL, 'yesenia44@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '6AHa3MWRE5', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(88, 1, 'Ulises Morissette 88', NULL, 'zechariah.cremin@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'pu02nm1pZX', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(89, 1, 'Mr. Camden Abbott 89', NULL, 'iwitting@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'fnJb0N3Hae', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(90, 1, 'Dr. Weston Orn 90', NULL, 'langosh.marjorie@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'ZhMAGKLDG8', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(91, 1, 'Wava Dooley 91', NULL, 'everette.daniel@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'dQMUWyZsLd', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(92, 1, 'Dusty Witting Sr. 92', NULL, 'clyde.beahan@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'K8ekOrewTu', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(93, 1, 'Prof. Alberta Farrell DDS 93', NULL, 'akeeling@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'gstISksEno', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(94, 1, 'Emory Stiedemann 94', NULL, 'koch.royal@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'gYATsENk1D', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(95, 1, 'Alvera Ruecker PhD 95', NULL, 'zieme.kathryne@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'nj3zcLjomy', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(96, 1, 'Amelia Durgan 96', NULL, 'daisy28@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'soF4FOWxEK', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(97, 1, 'Prof. Okey Berge IV 97', NULL, 'ylueilwitz@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '2M7cZns0xm', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(98, 1, 'Jacky Franecki 98', NULL, 'vladimir.schroeder@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '9DNbhiJQFR', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(99, 1, 'Euna Wisoky II 99', NULL, 'pearlie.wiza@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'DQFxFFkVKg', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(100, 1, 'Mylene Steuber MD 100', NULL, 'wintheiser.emile@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 2, 0, 'AvYV69V7mG', 0, '2019-07-30 03:39:29', '2019-08-09 09:47:59'),
(101, 1, 'Jailyn Boyle 101', NULL, 'bhaley@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'aYGT1Dzom1', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(102, 1, 'Boyd Jones 102', NULL, 'qpouros@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:39:29', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '4dmMzIcYPc', 0, '2019-07-30 03:39:29', '2019-07-30 03:39:29'),
(103, 1, 'Ervin Emard 103', NULL, 'jewell23@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'ASIP2BfDtX', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(104, 1, 'Dr. Jesus Gulgowski IV 104', NULL, 'wjenkins@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'NvQ1nkbOZy', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(105, 1, 'Laurianne Casper 105', NULL, 'lavinia.jacobson@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'E6jKVAIwGO', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(106, 1, 'Robb Pfannerstill 106', NULL, 'vlemke@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'sWdIYts6Ho', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(107, 1, 'Erica Smitham 107', NULL, 'santina99@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'CxofySAk8T', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(108, 1, 'Anibal McKenzie 108', NULL, 'fratke@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'd3X8nQLEwW', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(109, 1, 'Dr. Queenie Fisher 109', NULL, 'moore.damian@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'rMGOtmoEXs', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(110, 1, 'Art Miller 110', NULL, 'bsawayn@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'REKkhsRbho', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(111, 1, 'Dena Spencer Sr. 111', NULL, 'bernhard.javier@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'x73PFaRO5v', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(112, 1, 'Keenan Orn 112', NULL, 'norene.rath@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'GaLyOsSgBT', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(113, 1, 'Eugenia Schoen III 113', NULL, 'dhintz@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'eCCebX5DDX', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(114, 1, 'Mckenzie Stiedemann 114', NULL, 'dbotsford@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'KfTPCoeaBu', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(115, 1, 'Lowell Kuhic DVM 115', NULL, 'price.holly@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'Y44e36goeh', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(116, 1, 'Dr. Icie Christiansen 116', NULL, 'xhoeger@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'ASoiuNSLyK', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(117, 1, 'Keara Stracke 117', NULL, 'ttorphy@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '9inlx6xQ40', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(118, 1, 'Ari Mitchell 118', NULL, 'liliana83@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'XA530baDWh', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(119, 1, 'Ivory Sanford PhD 119', NULL, 'poconnell@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'ews9m2J4E4', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(120, 1, 'Autumn Grant V 120', NULL, 'eschimmel@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'yfR2OupAPE', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(121, 1, 'Jedediah Windler 121', NULL, 'wilton.kertzmann@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'Vxvcx2JgEc', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(122, 1, 'Adonis Jast DVM 122', NULL, 'rebekah.harvey@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'QdzzlOKZhQ', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(123, 1, 'Payton Ziemann 123', NULL, 'colson@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'fSx4UUkf2u', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(124, 1, 'Dr. Tristin Sipes III 124', NULL, 'aufderhar.winston@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'puG0wXJ84g', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(125, 1, 'Greyson Eichmann 125', NULL, 'peter05@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '7EPF2JoaMn', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(126, 1, 'Mrs. Agnes Schoen 126', NULL, 'ova62@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'kvG84InNEs', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(127, 1, 'Brenden Gibson 127', NULL, 'mayer.kathryn@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'sYdXyJgpPe', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(128, 1, 'Bernardo Terry DVM 128', NULL, 'herzog.heber@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'ncWXei9waw', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(129, 1, 'Toni Stracke 129', NULL, 'zstiedemann@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'Fa6sVYFHpT', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(130, 1, 'Kelsi Mohr 130', NULL, 'jazmin16@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'K8m1C1jzKD', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(131, 1, 'Mrs. Rosanna Gaylord DVM 131', NULL, 'otha57@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'cI6O5kVF1I', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(132, 1, 'Prof. Wiley Herman 132', NULL, 'tracey.greenfelder@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'mEfYEgn2q8', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(133, 1, 'Lenore Gulgowski 133', NULL, 'friesen.karley@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'iSmRRilxxO', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(134, 1, 'Keaton Jenkins 134', NULL, 'psawayn@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'qFnROYYkVa', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(135, 1, 'Maci Boyer 135', NULL, 'oschaden@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '1RBxZw88EM', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(136, 1, 'Shany Herman 136', NULL, 'effertz.fleta@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'o8Abi3a3eO', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(137, 1, 'Dr. Lane Wiegand DDS 137', NULL, 'mkemmer@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'd9lZfIIsCL', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(138, 1, 'Chaz Rau 138', NULL, 'cturcotte@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'qacR9jkWVe', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(139, 1, 'Ashly Hoeger 139', NULL, 'harber.desmond@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'V75l02ckxr', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(140, 1, 'Miss Delphine Denesik 140', NULL, 'molly.murphy@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'U2qZpv1D6q', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(141, 1, 'Alexandra Waters 141', NULL, 'hane.fabiola@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'TQIcwX0h55', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(142, 1, 'Lavern Lubowitz 142', NULL, 'nitzsche.oscar@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, '8vrwpBUcmH', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(143, 1, 'Miss Addison Ankunding IV 143', NULL, 'bsipes@example.com', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'rEsuE9blU5', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(144, 1, 'Antonio Maggio 144', NULL, 'abdiel84@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'uDeGiRY4nA', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(145, 1, 'Mr. Ibrahim Ziemann 145', NULL, 'gkuhn@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'TsizNkCG93', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(146, 1, 'Liliane Kuhn 146', NULL, 'zemlak.candace@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'iYX21NggpT', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(147, 1, 'Ellen Kshlerin 147', NULL, 'estelle.stiedemann@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'OUO9XcvSiG', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(148, 1, 'Dr. Sid Grady I 148', NULL, 'wspencer@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'Vrng4yMTTD', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(149, 1, 'Bettye Considine 149', NULL, 'qrenner@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'nlu5uly4iN', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(150, 1, 'Mrs. Lady', 'v', 'Annamae.kilback@example.net', 1, '8866056956', '', NULL, 'Female', NULL, '', '', '', '', '', 0, '', '', NULL, 4, '2020-01-08 13:45:04', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-07-30 03:40:16', '2020-01-08 13:45:04'),
(151, 1, 'Ila Smitham 151', NULL, 'tgibson@example.org', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'CpFkQ22hzP', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(152, 1, 'Janick Pouros 152', NULL, 'chickle@example.net', 0, '8866056956', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2019-07-30 03:40:16', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 0, 'uHDDqvdcwl', 0, '2019-07-30 03:40:16', '2019-07-30 03:40:16'),
(154, 1, 'Vedant 154', 'Patel', 'vedant@gmail.com', 1, '8866056000', '', NULL, 'Female', '2019-11-16', 'B/31 swapna srushti', 'Vastral', 'ahmedabad', 'Ahmedbad', 'gujarat', 0, '382418', NULL, 'Volunteers', 2, NULL, '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 07:37:56', '2020-02-12 11:26:20'),
(156, 1, 'Vedant 156', 'Patel', 'vedant1@gmail.com', 1, '8866056000', 'Document1581576699_997.jpg', NULL, 'Female', '2019-11-16', 'B/31 swapna srushti', 'Vastral', 'ahmedabad', 'Ahmedbad', 'gujarat', 0, '382418', NULL, 'Executive', 2, '2019-08-05 08:13:50', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:13:50', '2020-02-13 06:51:39'),
(157, 1, 'Vedant 157', 'Patel', 'vedant12@gmail.com', 1, '8866056000', '', NULL, 'Female', '2019-11-16', 'B/31 swapna srushti', 'Vastral', 'ahmedabad', 'Ahmedbad', 'gujarat', 0, '382418', NULL, NULL, 2, '2019-08-05 08:14:17', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:14:17', '2019-12-25 11:17:06'),
(159, 1, 'Vedant 159', 'Patel', 'Vedant13@gmail.com', 1, '8866056000', 'Document1581499406_514.png', NULL, 'Female', '2019-11-16', 'B/31 swapna srushti', 'Vastral', 'Ahmedabad', 'Ahmedbad', 'Gujarat', 0, '382418', '', 'Executive', 2, '2020-02-12 09:18:24', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:16:19', '2020-02-12 09:23:26'),
(161, 1, 'Vedant 161', 'Patel', 'vedant14@gmail.com', 1, '8866056000', '', NULL, 'Female', '2019-11-16', 'B/31 swapna srushti', 'Vastral', 'ahmedabad', 'Ahmedbad', 'gujarat', 0, '382418', NULL, NULL, 2, '2019-08-05 08:17:58', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:17:58', '2019-12-25 11:17:06');
INSERT INTO `users` (`id`, `creator_id`, `first_name`, `last_name`, `email`, `role_id`, `phone`, `profile_pic`, `banner_image`, `gender`, `dob`, `address_line1`, `address_line2`, `city`, `district`, `state`, `is_profile_completed`, `pincode`, `live_in`, `position`, `blood_group`, `email_verified_at`, `password`, `status`, `is_email_verified`, `remember_token`, `online`, `created_at`, `updated_at`) VALUES
(162, 1, 'Vedant 162', 'Patel', 'vedant15@gmail.com', 1, '8866056000', '', NULL, 'Female', '2019-11-16', 'B/31 swapna srushti', 'Vastral', 'ahmedabad', 'Ahmedbad', 'gujarat', 0, '382418', NULL, NULL, 2, '2019-08-05 08:18:33', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:18:33', '2019-12-25 11:17:06'),
(164, 1, 'vande matram 164', 'patel', 'j@gmal.com', 1, '8866056000', '', NULL, 'Male', '1987-11-02', '169 Vastral', 'Ahmebda', 'ahmedabad', 'Daskroi', 'Gujarat', 0, '382418', NULL, NULL, 3, '2019-08-05 08:43:57', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:43:57', '2019-12-25 11:17:06'),
(166, 1, 'Manthan', 'Sharma', 'manthansharma01@gmal.com', 1, '8866056000', 'Document1584690121_689.jpeg', NULL, 'Male', '1987-11-02', '169 Vastral', 'Ahmebda', 'Ahmedabad', 'Daskroi', 'Gujarat', 0, '382418', '', 'Co-ordinator', 3, '2020-03-20 07:23:53', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:44:19', '2020-03-20 07:42:01'),
(169, 1, 'vande matram 169', 'patel', '2rj@gmal.com', 1, '8866056000', '', NULL, 'Male', '1987-11-02', '169 Vastral', 'Ahmebda', 'ahmedabad', 'Daskroi', 'Gujarat', 0, '382418', NULL, NULL, 3, '2019-08-05 08:45:36', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:45:36', '2019-12-25 11:17:06'),
(170, 1, 'Vande matram 170', 'Patel', 'Urj@gmal.com', 1, '8866056000', '', NULL, 'Male', '1987-11-02', '169 Vastral', 'Ahmebda', 'Ahmedabad', 'Daskroi', 'Gujarat', 0, '382418', '', NULL, 3, '2020-02-04 14:41:25', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:48:04', '2020-02-04 14:41:25'),
(171, 1, 'vande matram 171', 'patel', 'uraj@gmal.com', 1, '8866056000', '', NULL, 'Male', '1987-11-02', '169 Vastral', 'Ahmebda', 'ahmedabad', 'Daskroi', 'Gujarat', 0, '382418', NULL, NULL, 3, '2019-08-05 08:58:16', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 2, 0, '', 0, '2019-08-05 08:58:16', '2019-12-25 11:17:06'),
(173, 1, 'vande matram 173', 'patel', 'urajx@gmal.com', 1, '8866056000', '', NULL, 'Male', '1987-11-02', '169 Vastral', 'Ahmebda', 'ahmedabad', 'Daskroi', 'Gujarat', 0, '382418', NULL, NULL, 3, '2019-08-05 08:58:46', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 2, 0, '', 0, '2019-08-05 08:58:46', '2019-12-25 11:17:06'),
(174, 1, 'vande matram 174', 'patel', 'urajxx@gmal.com', 1, '8866056000', '', NULL, 'Male', '1987-11-02', '169 Vastral', 'Ahmebda', 'ahmedabad', 'Daskroi', 'Gujarat', 0, '382418', NULL, NULL, 3, '2019-08-05 08:59:05', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:59:05', '2019-12-25 11:17:06'),
(175, 1, 'vande matram 175', 'patel', 'urajxhx@gmal.com', 1, '8866056000', '', NULL, 'Male', '1987-11-02', '169 Vastral', 'Ahmebda', 'ahmedabad', 'Daskroi', 'Gujarat', 0, '382418', NULL, NULL, 3, '2019-08-05 08:59:44', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-05 08:59:44', '2019-12-25 11:17:06'),
(177, 1, 'Hiren 177', 'patel', 'hiren@gmail.com', 1, '29384938', '', NULL, 'Male', '1987-11-03', 'vastr', '1111', 'aas', 'sd', 'adas', 0, '34234', NULL, NULL, 3, '2019-08-05 09:08:12', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 0, 0, '', 0, '2019-08-05 09:08:12', '2019-08-09 09:32:38'),
(178, 1, 'Manoj 178', 'Patel', 'Ja@gmail.com', 1, '8866056000', '', NULL, 'Male', '1987-11-16', 'Bavnath', 'Ghatlodiya', 'Ahmedabad', 'Ahmedabad', 'Gujarat', 0, '382418', '', NULL, 2, '2019-08-07 05:37:20', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-06 00:25:59', '2019-12-25 11:17:06'),
(179, 1, 'Konsa 179', 'Patel', 'Jak@gmail.com', 1, '2387482782', '', NULL, 'Female', '1987-12-31', 'Hopefully', 'Ahamedabad', 'Ahamedabad', 'Aham', 'Guj', 0, '646454', '', NULL, 2, '2019-08-07 06:40:28', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 2, 0, '', 0, '2019-08-06 00:48:55', '2019-08-09 09:47:42'),
(180, 1, 'Sdas 180', 'Patel', 'Admin@digiassure.com', 1, '9723294455', '', NULL, 'Male', '1987-11-16', '', '', '', '', '', 0, '', '', NULL, 2, '2019-08-07 05:36:57', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-08-06 03:42:17', '2019-08-07 05:36:57'),
(181, 1, 'krunal 181', 'pandya', 'krunal@gmail.com', 1, '8866056000', '', NULL, 'Male', '2019-03-16', 'Address li1', 'address li2', 'Ahmeda', 'my district', 'gujrat', 0, '654654', 'IND', NULL, 3, '2019-08-06 06:32:02', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 1, 0, '', 0, '2019-08-06 06:32:02', '2019-12-25 11:17:06'),
(182, 1, 'manoj 182', 'patel', 'admin@dgc.com', 1, '9723294455', '', NULL, 'Trasender', '2011-06-22', '', '', '', '', '', 0, '', NULL, NULL, 5, '2019-08-06 10:33:41', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-08-06 10:33:41', '2019-08-06 10:33:41'),
(183, 1, 'Parth 183', 'Patel', 'Parth@gmail.com', 1, '8866056000', '', NULL, 'Male', '1988-11-16', 'Kadi', 'Ayodhya', 'Kadi city', 'Mehsana', 'Gujarat', 0, '382645', 'Kadi,mehsana', NULL, 5, '2019-08-07 05:37:51', '$2y$10$Ux.ZF2S2jh7J7JHmKFSzIelfGm3yz6WPcEqlIqulLC3.4fYzg4jaO', 2, 0, '', 0, '2019-08-07 05:18:59', '2019-12-25 11:17:06'),
(184, 1, 'sdasd 184', 'patel', 'admin@zaaroz.com', 1, '9723294455', '', NULL, 'Female', NULL, '', '', '', '', '', 0, '', '', NULL, 2, '2019-08-17 16:07:51', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-08-17 16:07:51', '2019-08-17 16:07:51'),
(185, 1, 'sdas 185', 'patel', 'admin@gowin.com', 1, '9723294455', '', NULL, 'Trasender', '2019-08-22', '', '', '', '', '', 0, '', '', NULL, 3, '2019-08-19 12:45:47', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-08-19 12:45:47', '2019-08-19 12:45:47'),
(186, 1, 'Manoj 186', 'Adnam', 'Admin@luxurybusgo.com', 1, '9723294455', '', NULL, 'Male', '2019-08-30', 'A', 'S', '', '', '', 0, '', '', NULL, 3, '2019-08-21 00:08:03', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-08-19 13:49:24', '2019-08-21 00:08:03'),
(187, 1, 'manoj 187', 'patel', 'admin@gh.com', 1, '9723294455', '', NULL, 'Male', NULL, '', '', '', '', '', 0, '', '', NULL, 4, '2019-08-20 06:16:51', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 2, 0, '', 0, '2019-08-20 06:16:51', '2019-08-20 06:16:58'),
(207, 1, 'vedant 207 207', 'patel', 'ved@gmail.com', 2, '2734937488', '', NULL, '', NULL, 'b31 swapnasrushti', 'vastral', 'ahmedabad', 'daskroid', 'gujarat', 0, '382415', '', NULL, 0, '2019-09-03 08:54:33', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-09-03 08:54:33', '2019-09-03 08:54:33'),
(208, 1, 'punyxasd 208', 'patelaaa', 'punya@gmail.com', 2, '9723294000', '', NULL, '', NULL, 'vastralssss', 'ahbad', 'guj', 'guj', 'guj', 0, '293749', '', NULL, 0, '2019-09-04 04:54:06', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-09-04 04:03:11', '2019-09-04 04:54:06'),
(209, 1, 'manoj 209', 'Patel', 'adx@innereye.com', 2, '9723294455', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, '2019-09-04 07:18:49', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-09-04 07:18:49', '2019-09-04 07:18:49'),
(213, 1, 'Manoj 213', 'Manoj', 'Admin@luxur3o.com', 1, '9723294455', '', NULL, 'Female', '2019-09-06', 'Vastra', 'Vas', 'Ahmedabad', 'Asas', 'Sad', 0, '', 'Asdas', NULL, 2, '2019-09-19 04:50:33', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-09-07 02:38:09', '2019-09-19 04:50:33'),
(214, 1, 'sdas', 'asdasa', 'aan@innnereye.com', 1, '2342323412', '', NULL, 'Female', '2019-11-07', 'vastas', '', '', '', '', 0, '', '', NULL, 4, '2019-11-05 09:29:03', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-11-05 09:29:03', '2019-11-05 09:29:03'),
(215, 1, 'hi', '', 'hi@gmial.com', 1, '0123456789', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, NULL, '$2y$10$vHLLuXr4yai7ESzfYxPN/e1NR8DucgpeqKQYfG1KPg9nizgvCwgxm', 1, 0, '$2y$10$0yezwJ4lE8KvUJg1rETjKumTSIZUPceotnfyKHtZdvxbki69o29QS', 0, '2019-12-24 11:43:57', '2019-12-24 11:43:57'),
(217, 1, 'Mili', 'Patel', 'Mili@gmail.com', 1, '9723294588', 'Document1580911510_886.jpg', NULL, 'Female', '2020-02-05', 'Va', 'Sd', 'Sdasdas', 'S', 'S', 0, 'Asdas', 'A', 'Executive', 4, '2020-02-05 08:07:31', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 1, '', 0, '2019-12-25 12:24:55', '2020-02-06 13:56:11'),
(218, 1, 'a', '', 'a@gmail.com', 1, '9998887771', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, NULL, '$2y$10$Znb/Ii.hyhN8f7uheBA8UetT14TJvJPm2B1yr5aqh8VOHEqxyz4Za', 1, 0, '$2y$10$hEOB8A8oWnJIJXoW7z.b.er5rzgNLvbrtST.TK6yHiSQcdTpNfiva', 0, '2019-12-25 12:41:14', '2019-12-25 12:41:14'),
(219, 1, 'orgz', 'asdsa', 'org@gmail.com', 2, '9998887770', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, '2020-01-10 15:29:14', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2019-12-25 12:45:08', '2020-01-10 15:29:14'),
(220, 1, 'pic', '', 'pic@gmail.com', 1, '1231231231', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, NULL, '$2y$10$ftNDXNjhBEXglH9E7mlxXe3dzTT8TFUFsIRu/7OOkfH/UDnV75N0S', 1, 0, '$2y$10$vhjmRg7cD9fOorl7n8kpv.0eBm8ygLMeLVLtkV78NrmUQbMjwiO3a', 0, '2019-12-26 14:28:40', '2019-12-26 14:28:40'),
(221, 1, 'pic', '', 'pic1@gmail.com', 1, '1231231232', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, NULL, '$2y$10$9V2ol8MwEJCXn9lZ4uif3u1343HQdks8Mk7ResCXNPER7JH1Q6r.2', 1, 0, '$2y$10$Bjt6FoOd5jZVqMh8/12XBOZ6MlOnx8A2PD2bVcN8iwpFAG56Po82y', 0, '2019-12-26 14:29:21', '2019-12-26 14:29:21'),
(222, 1, 'pic', '', 'pic3@gmail.com', 1, '1231231233', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, NULL, '$2y$10$rLNQmTTigdeVRFBS9aWMD.jlI948IdTAiXfrUHoTLOB8Y/.9jFWBW', 1, 0, '$2y$10$uYvqcfBV0Z6uNUAINIxABe.dsvNpxs6WeanJM8KuFg0FHk5CGHNlC', 0, '2019-12-26 14:31:53', '2019-12-26 14:31:53'),
(223, 1, 'Pic4', 'A', 'Pic4@gmail.com', 1, '1231231111', '', NULL, 'Female', NULL, '', '', '', '', '', 0, '', 'Jungle India', 'Volunteers', 3, '2020-01-23 10:07:40', '$2y$10$L9DnEHq37l3Dy0/h5FMMyudI4Dj/cT3a6xs7GCSyBpm65iex6EDA.', 1, 0, '', 1, '2019-12-26 14:41:42', '2020-01-23 10:07:40'),
(224, 1, 'po', '', 'ppop@gmail.com', 1, '9723212312', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, NULL, '$2y$10$57ioQscO63gj/icKLQR/luyCenctsrjPQhx4Jn8Gc/FmjJCtyo3s2', 1, 0, '$2y$10$Y7g3VPPJAHOiS/FbG/a1ueD70PrIbY4adOulLB8A/ApnycKQWvdd2', 0, '2019-12-27 08:00:03', '2019-12-27 08:00:03'),
(225, 1, 'po', '', 'ppop2@gmail.com', 1, '9723212314', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, NULL, '$2y$10$LzO4oBJhudeEImEcvnubPO65U/F0oKpljIRSdD8TK1F.YbqCWYxIq', 1, 0, '$2y$10$LQgQaKqd3bVe/.3vHwA0QeqeB3HPi/Hj1ZbBoGL0IpewQs/VAmFsO', 0, '2019-12-27 08:03:43', '2019-12-27 08:03:43'),
(226, 1, 'ji', '', 'a1@gmail.com', 1, '1111111111', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, NULL, '$2y$10$rC2ubrep/dTpXBW5KUktkOln/UgE4Dmt8FXTM6igjSWvb1LANLO8K', 1, 0, '$2y$10$EYR1it1VBsleNF7zesUCIeLUGZ.Ow0AJSP1aY2vtPrFjrzDvS99US', 0, '2019-12-28 05:42:30', '2019-12-28 05:42:30'),
(236, 1, 'asdas', 'das', 'admin@inneraxasdeye.com', 1, '132423423', '', NULL, 'Female', NULL, '', '', '', '', '', 0, '', '', NULL, 6, '2020-01-01 12:21:11', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2020-01-01 12:21:11', '2020-01-01 12:21:11'),
(237, 1, 'Pinky', 'Patel', 'Pinky@gmail.com', 1, '8866056365', 'pinke.jpg', NULL, 'Male', '2019-12-30', 'Vastral', 'Ahmedabad', 'Ahmedabad', 'Gujarat', 'Gujarat', 0, '382418', 'Vastral', NULL, 5, '2020-01-01 12:59:04', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2020-01-01 12:22:56', '2020-01-01 12:59:04'),
(240, 1, 'Hiren bhai', 'Dasd', 'Op@gmail.com', 3, '9879879875', 'profile_Document1582105094_233.jpg', NULL, 'Female', '2020-01-08', 'Cav', 'Sdas', 'Asdas', 'Vastral', 'Gujarat', 0, '382415', '', NULL, 2, '2020-02-19 09:38:18', '123123', 1, 0, '', 0, '2020-01-08 07:28:49', '2020-02-19 09:38:18'),
(241, 1, 'Hixxxa12', 'Hi', 'Hi@hi.com', 1, '9732394588', '', NULL, 'Male', '2025-11-07', 'Va', 'As', 'V', 'A', 'A', 0, 'D', 'S', NULL, 5, '2020-01-08 13:44:13', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2020-01-08 13:38:18', '2020-01-08 13:44:13'),
(242, 1, 'hu', '', 'hu@gmail.com', 1, '9722293666', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, NULL, '$2y$10$sxfFRvT0A.BvTF7SUNZBH.UrJagGe6kOeYW9qTYDrAB0flcLLy/lu', 1, 0, '$2y$10$e6OSkq96CiisFyWnSvjC4e8ZwypA4AfNhLhH73pPdRMNgtXRsncZi', 0, '2020-01-08 14:51:18', '2020-01-08 14:51:18'),
(243, 1, 'hu', '', 'hu1@gmail.com', 1, '9722293444', 'Document1581160076_554.jpg', NULL, '', NULL, '', '', '', '', '', 0, '', '', NULL, 0, NULL, '$2y$10$UXTjl//eDQRd24a82EhF/Ok7rEipo9qAlqF407PTyys/QwP67qyJS', 1, 0, 'wxEFxfRCU5RH5ka3PLaIMNInL6cCoS6MHiZtXPrAY2pUMQunAn2oyoSSAifH', 0, '2020-01-08 14:51:51', '2020-01-08 14:51:51'),
(244, 1, 'P', 'Asda', 'P@p.com', 1, '1112223333', 'Document1582801763_864.png', NULL, 'Trasender', NULL, '', '', '', '', '', 0, '', '', NULL, 3, '2020-02-04 14:35:11', '$2y$10$.Rd/wOirHzNhCAvspQa5WOBv2PjKhn9O1s6QGVtHkw9GLgGq7Pdeq', 1, 0, '9XzWtw2Ab707YE6tjI6DU2QeMjJfzTNQsRJL48SBAysuaYpgi0xgAvHArmhZ', 0, '2020-01-08 15:06:36', '2020-03-24 19:45:21'),
(245, 1, 'Sharman', 'Patek', 'Yah@gmail.com', 3, '8866056366', '', NULL, 'Male', '2015-04-15', 'Vastra', 'Oops', 'Ahmedabad', 'Bill', 'Guj', 0, '382418', '', NULL, 3, '2020-01-10 14:35:45', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 0, 0, '', 0, '2020-01-09 11:03:49', '2020-01-10 14:35:45'),
(247, 1, 'jd', 'panchl', 'jd@gmail.com', 2, '9723294588', '', NULL, '', NULL, 'aa', 'bb', 'cc', 'dd', 'ee', 0, '382418', '', NULL, 0, '2020-01-10 15:35:21', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2020-01-10 15:35:21', '2020-01-10 15:35:21'),
(248, 1, 'asdada', 'sadas', 'admin@a.com', 2, 'sdas', '', NULL, '', NULL, 'asdad', 'sad', '', '', '', 0, '', '', NULL, 0, '2020-02-08 11:47:37', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2020-02-08 10:43:46', '2020-02-08 11:47:37'),
(249, 1, 'hop', 'oops', 'opxx@gmail.com', 2, '9723294588', '', NULL, '', NULL, 'vast', 'asdasd', 's', 'sd', 'a', 0, '2343', '', NULL, 0, '2020-02-08 14:58:38', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2020-02-08 14:58:38', '2020-02-08 14:58:38'),
(250, 1, 'Ashtha foundationaax', 'Virat kohli', 'Virat@gmail.com', 2, '8866056300', 'Document1581517754_741.png', NULL, '', NULL, 'B31 Syamsrushti', 'SV square', 'Ahmedabad', 'Ahmedabad1', 'Gujarat', 0, '382415', '', NULL, 0, '2020-02-12 14:28:58', '$2y$10$cMPMm7CKBdR1bNJS5BxajO85xAel854U7yzF6Wn5yJ5.TcMYuwr.m', 1, 0, '', 0, '2020-02-10 07:10:08', '2020-02-12 14:29:14'),
(251, 1, 'Vedanta foundation', 'Vedanat patel', 'vedanta@gmail.com', 2, '9723294581', 'Document1581576070_676.jpg', NULL, '', NULL, 'Va', 'v2', 'abad', 'Vastra', 'Gujarat', 0, '382418', '', NULL, 0, '2020-02-13 05:56:10', '$2y$10$.r0SYV0fzB4caxC90/8wU..krhwQ7DxglOtdNbSxmk4o0RS6bs.j6', 0, 0, 'Sjw8OKuREg86pnRvDwiOaZyPY63ax06YU5ShkExUSxiZBiEGTS4f6bcS93O3', 0, '2020-02-13 05:52:17', '2020-02-13 15:08:44'),
(252, 1, 'V3', 'Patel', 'V3@gmail.com', 1, '1231231230', '', NULL, 'Female', '2020-02-14', 'Vasd', 'Asdas', 'Aa', 'Sas', 'Asd', 0, 'Aaa', 'Vvvvv', 'Executive', 3, '2020-02-14 04:40:21', '$2y$10$Lut6y5sBJQkYoQLh7htO6.ht1DDzb9YXrLrbfL9kOYx1hCvMcNr/S', 0, 0, 'tW6RMLROeYeMwleojHoURL5HRb0GT6DEpXNBKi8iMwtKBueUPauegBcgk0k4', 0, '2020-02-13 15:10:32', '2020-02-14 04:40:53'),
(253, 1, 'Vela', 'Sasd', 'Vela@gmail.com', 1, '1112223334', '', NULL, 'Male', '2020-02-27', '', '', '', '', '', 0, '', '', NULL, 2, '2020-02-14 05:14:19', '$2y$10$ORXrfN0G9dSskb0/qbsb/.CIOOxYmGyjyO5ZADerSwTMkVVJ8JOHS', 1, 0, '0bJW2vMXtMizBnoGQLfdAySlGrdffXnaf1IiNqbqIFccdK7RbcGjwsenYgld', 0, '2020-02-14 04:42:07', '2020-02-14 11:04:52'),
(254, 1, 'Wonder', 'Vas', 'Wonder@gmial.com', 2, '9999888800', 'Document1581662902_446.jpeg', NULL, '', NULL, 'vastral', 'vasd', 'Ahmedabad', 'Drask', 'sadad', 0, '382415', '', 'Organization', 0, '2020-02-14 08:54:12', '$2y$10$PKxz5weSdFHN9ys3m1Svn.T246dAIKsyhrFHdZguaZhXyRXUlpESi', 0, 0, 'Se4PFUEhkwME0iQwp1ZCSu6Xt9Xk0vFIvmH32NpYYKrcT2ygXTpYJPxoAnqy', 0, '2020-02-14 05:56:20', '2020-02-14 08:54:20'),
(255, 1, 's', '', 'az@gmail.com', 2, '1111001111', '', NULL, '', NULL, '', '', '', '', '', 0, '', '', 'Organization', 0, NULL, '$2y$10$ylSkY8GY6rvn12jXhuO94engu.A63GSnXcE4h8w4kEXFeedIHct2W', 0, 0, '$2y$10$HxXjLzVLS77xJuy2cNTbSOK3TnZi1CsHdxDiFHLm8arWIrJbLKWyW', 0, '2020-02-14 09:01:46', '2020-02-14 09:01:46'),
(256, 1, 'Ccc', 'Hiren boss', 'Aa@gmail.com', 2, '1234567890', 'Document1581674670_109.png', NULL, '', NULL, 'Vastral', 'V1', 'V2', 'V3', 'V4', 0, '152465', '', 'Organization', 0, '2020-02-14 10:04:52', '$2y$10$eKMQi5B70NzfcRpMo3Rvp.CS73.AeR.vO1Gi2uC0PXNwcYvIsMQwe', 1, 0, 'jUnEKCwfR9xMAEnZkLRGEqsQFM1VsrhhGjoYluNf5oAXIjpXibWqWtsK1UyA', 0, '2020-02-14 09:29:33', '2020-02-14 11:04:30'),
(257, 1, 'Per', 'popwind', 'Per@gmail.com', 1, '9988998899', 'Document1581675829_249.png', NULL, 'Female', '2020-02-12', 'va', 'a', 'sdas', 'vas', 'dsda', 0, 'sdasd', 'sda', 'Volunteer', 3, '2020-02-14 10:15:12', '$2y$10$XHkxM6S5LZ.McuLoYvZGYOHAB4N6/YjpNUfm7SydnFx.QUcnNgSxa', 1, 0, '', 1, '2020-02-14 10:08:24', '2020-02-14 10:47:10'),
(258, 1, 'open', 'parel', 'p@gmail.com', 3, '9700025000', 'profile_Document1582120330_809.jpeg', NULL, 'Female', '2019-01-17', 'Ahmedabad', 'vastral', 'abd', 'gj', 'guj', 0, '369852', '', NULL, 2, '2020-02-19 13:53:32', '123123', 0, 0, '', 0, '2020-02-19 13:53:32', '2020-02-19 13:53:33'),
(259, 0, 'Jams', 'Patels', 'Jams@gmail.com', 1, '8866011223', 'Document1585079346_144.jpg', NULL, 'Female', '2020-03-05', 'Ahme', 'Guj', 'Ahbad', 'Guj', 'Gujarat', 1, '382418', 'Ahmedabad', 'Volunteer', 4, '2020-03-24 19:49:23', '$2y$10$KNK8/eP/7Hf.5O2tpJsr3.fhtBJmnMmLyiIUySmjcZ7.sCUUN1uYu', 1, 0, '', 1, '2020-03-24 19:46:40', '2020-05-18 05:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_beneficiar`
--

CREATE TABLE `user_beneficiar` (
  `id` int(11) NOT NULL,
  `title` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `eduction_id` int(11) NOT NULL,
  `no_family` varchar(5) NOT NULL,
  `family_income` varchar(100) NOT NULL,
  `help_type` varchar(150) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `reject_note` varchar(2000) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_beneficiar`
--

INSERT INTO `user_beneficiar` (`id`, `title`, `user_id`, `marital_status`, `eduction_id`, `no_family`, `family_income`, `help_type`, `duration`, `reject_note`, `created_at`, `updated_at`) VALUES
(3, 'Ms.', 240, 'Married', 3, '4', 'More Than 5000', '3', 'Monthly', '', '2020-01-08 12:58:49', '2020-01-10 20:06:08'),
(4, 'Ms.', 245, 'Widow', 2, '4', 'More Than 5000', '3', 'Monthly', '', '2020-01-09 16:33:49', '2020-01-10 20:05:34'),
(5, 'Ms.', 258, 'Widow', 2, '4', 'More Than 5000', '2', 'One Time', '', '2020-02-19 19:23:32', '2020-02-19 19:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_beneficiary_image`
--

CREATE TABLE `user_beneficiary_image` (
  `id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `meta` varchar(1024) DEFAULT NULL,
  `file_for` varchar(10) DEFAULT 'img',
  `type` enum('img','file') NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_beneficiary_image`
--

INSERT INTO `user_beneficiary_image` (`id`, `file`, `meta`, `file_for`, `type`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'id_Document1578377021_845.jpg', '{"size":"63.77 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"html-color-codes-color-tutorials-903ea3cb.jpg"}', 'id_proof', 'img', 238, '2020-01-07 11:34:15', '2020-01-07 11:34:15'),
(2, 'id_Document1578377027_760.sql', '{"size":"1.58 KB","mime_type":"text\\/plain","extention":"sql","filename":"user_beneficiary_image.sql"}', 'id_proof', 'file', 238, '2020-01-07 11:34:15', '2020-01-07 11:34:15'),
(3, 'repo_Document1578377044_982.jpg', '{"size":"120 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"kisspng-emoticon-smiley-vector-graphics-clip-art-thumb-sig-15-hi-emoji-or-hand-wave-emoji-heart-emoji-blac-5c5fd10ed82b71.5715323215497833108854.jpg"}', 'report', 'img', 238, '2020-01-07 11:34:15', '2020-01-07 11:34:15'),
(4, 'repo_Document1578377047_170.jpeg', '{"size":"16.31 KB","mime_type":"image\\/jpeg","extention":"jpeg","filename":"images (3).jpeg"}', 'report', 'img', 238, '2020-01-07 11:34:15', '2020-01-07 11:34:15'),
(5, 'profile_Document1578376986_451.png', '[]', 'profile', 'img', 238, '2020-01-07 11:34:15', '2020-01-07 11:34:15'),
(7, 'id_Document1578396958_270.jpg', '{"size":"505.7 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"nature-evening-sunset-wallpaper.jpg"}', 'id_proof', 'img', 239, '2020-01-07 17:06:39', '2020-01-07 17:06:39'),
(8, 'repo_Document1578396989_909.jpg', '{"size":"238.25 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"maxresdefault (1).jpg"}', 'report', 'img', 239, '2020-01-07 17:06:39', '2020-01-07 17:06:39'),
(20, 'profile_Document1578407301_136.jpg', '[]', 'profile', 'img', 239, '2020-01-07 19:58:26', '2020-01-07 19:58:26'),
(21, 'id_Document1578468516_361.jpeg', '{"size":"5.37 KB","mime_type":"image\\/jpeg","extention":"jpeg","filename":"sad2.jpeg"}', 'id_proof', 'img', 240, '2020-01-08 12:58:49', '2020-01-08 12:58:49'),
(22, 'repo_Document1578468519_628.jpg', '{"size":"15.14 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"pizap-40-min-2.jpg"}', 'report', 'img', 240, '2020-01-08 12:58:49', '2020-01-08 12:58:49'),
(24, 'id_Document1578567715_610.jpg', '{"size":"102.34 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"sad.jpg"}', 'id_proof', 'img', 245, '2020-01-09 16:33:49', '2020-01-09 16:33:49'),
(25, 'id_Document1578567718_802.png', '{"size":"23.14 KB","mime_type":"image\\/png","extention":"png","filename":"mockup-iphone-thin-3.png"}', 'id_proof', 'img', 245, '2020-01-09 16:33:49', '2020-01-09 16:33:49'),
(26, 'repo_Document1578567818_335.jpg', '{"size":"102.34 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"sad.jpg"}', 'report', 'img', 245, '2020-01-09 16:33:49', '2020-01-09 16:33:49'),
(27, 'repo_Document1578567822_10.jpg', '{"size":"849.02 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"Master.jpg"}', 'report', 'img', 245, '2020-01-09 16:33:49', '2020-01-09 16:33:49'),
(28, 'profile_Document1578567683_686.jpeg', '[]', 'profile', 'img', 245, '2020-01-09 16:33:49', '2020-01-09 16:33:49'),
(29, 'id_Document1582098147_820.png', '{"size":"949.76 KB","mime_type":"image\\/png","extention":"png","filename":"your_pic_name(1).png"}', 'id_proof', 'img', 240, '2020-02-19 13:12:58', '2020-02-19 13:12:58'),
(30, 'repo_Document1582098165_541.jpeg', '{"size":"13.37 KB","mime_type":"image\\/jpeg","extention":"jpeg","filename":"Y1+YsHgF.jpeg"}', 'report', 'img', 240, '2020-02-19 13:12:58', '2020-02-19 13:12:58'),
(31, 'repo_Document1582098170_465.jpg', '{"size":"46.65 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"Why-You-Shouldnt-Accept-Being-Tired-All-The-Time.jpg"}', 'report', 'img', 240, '2020-02-19 13:12:59', '2020-02-19 13:12:59'),
(38, 'id_Document1582120383_463.jpeg', '{"size":"5.37 KB","mime_type":"image\\/jpeg","extention":"jpeg","filename":"sad2.jpeg"}', 'id_proof', 'img', 258, '2020-02-19 19:23:32', '2020-02-19 19:23:32'),
(39, 'id_Document1582120387_819.jpg', '{"size":"146.72 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"sad-girl-cartoon-sitting-alone-vector-21558557.jpg"}', 'id_proof', 'img', 258, '2020-02-19 19:23:32', '2020-02-19 19:23:32'),
(40, 'id_Document1582120395_618.jpg', '{"size":"74.06 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"short-instagram-quotes-060818-best-friend-boyfriend-love-1.jpg"}', 'id_proof', 'img', 258, '2020-02-19 19:23:32', '2020-02-19 19:23:32'),
(41, 'repo_Document1582120403_702.jpg', '{"size":"15.14 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"pizap-40-min-2.jpg"}', 'report', 'img', 258, '2020-02-19 19:23:32', '2020-02-19 19:23:32'),
(42, 'repo_Document1582120407_714.jpg', '{"size":"206.32 KB","mime_type":"image\\/jpeg","extention":"jpg","filename":"maxresdefault.jpg"}', 'report', 'img', 258, '2020-02-19 19:23:33', '2020-02-19 19:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contact`
--

INSERT INTO `user_contact` (`id`, `user_id`, `name`, `email`, `phone`, `designation`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'manoj', 'manoj@gmial.com', '8866056366', 'HRM', 'Work', '2020-01-07 11:47:52', '2020-01-07 11:47:52'),
(2, 1, 'jd', 'jd@gmail.com', '9789865496', 'gujarat', 'iNNER-EYE', '2020-01-07 12:02:45', '2020-01-07 12:02:45'),
(3, 1, 'sd', 'as@gmail.com', '8886656598', 'a', 'Personal', '2020-01-07 12:03:25', '2020-01-07 12:03:25'),
(4, 1, 'po', 'po@gmail.com', '9723294588', 'gujarat', 'Work', '2020-01-07 12:06:36', '2020-01-07 12:06:36'),
(6, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(7, 1, 'a', 'a@g.com', '234234234', 'good', 'iNNER-EYE', '2020-01-07 12:25:59', '2020-01-07 12:25:59'),
(8, 1, 'a', 'a@y.com', '3423112312', 'pop', 'Work', '2020-01-07 12:32:14', '2020-01-07 12:32:14'),
(9, 1, 'aksy', 'admin@kshitij.com', '12', 'Classic', 'Work', '2020-01-07 12:33:13', '2020-01-08 12:50:14'),
(10, 1, 'amit', 'admin@xposs.com', '23423', 'sda', 'iNNER-EYE', '2020-01-07 12:35:01', '2020-01-08 12:45:37'),
(11, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(12, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(13, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(14, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(15, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(16, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(17, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(18, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(19, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(20, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(21, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(22, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(23, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(24, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(25, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(26, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(27, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(28, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(29, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(30, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(31, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(32, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(33, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(34, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(35, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(36, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(37, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(38, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(39, 1, 'ki', 'ko@gmail.com', '987654321', 'goa', 'Work', '2020-01-07 12:25:35', '2020-01-07 12:25:35'),
(40, 1, 'hp235x', 'hp1@gmial.com', '23749878', 'asb', 'Work', '2020-01-07 12:38:55', '2020-01-08 11:55:32'),
(41, 244, 'love', 'lov@gmaiil.com', '9723294568', 'Good', 'Work', '2020-01-08 20:49:48', '2020-01-08 20:49:48'),
(42, 251, 'Manoj Patel', 'myfriend@gmail.com', '9723296586', 'Friend only', 'Personal', '2020-02-13 13:07:12', '2020-02-13 13:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_interested_in_causes`
--

CREATE TABLE `user_interested_in_causes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_interested_in_causes`
--

INSERT INTO `user_interested_in_causes` (`id`, `user_id`, `interest_id`, `created_at`, `updated_at`) VALUES
(1, 174, 4, '2019-08-05 14:29:05', '2019-08-05 14:29:05'),
(2, 175, 4, '2019-08-05 14:29:44', '2019-08-05 14:29:44'),
(31, 179, 2, '2019-08-07 12:10:28', '2019-08-07 12:10:28'),
(36, 223, 2, '2020-01-23 15:37:40', '2020-01-23 15:37:40'),
(37, 223, 4, '2020-01-23 15:37:40', '2020-01-23 15:37:40'),
(38, 223, 5, '2020-01-23 15:37:40', '2020-01-23 15:37:40'),
(41, 244, 5, '2020-02-04 20:05:12', '2020-02-04 20:05:12'),
(47, 170, 5, '2020-02-04 20:11:25', '2020-02-04 20:11:25'),
(64, 217, 4, '2020-02-05 13:37:31', '2020-02-05 13:37:31'),
(65, 217, 5, '2020-02-05 13:37:31', '2020-02-05 13:37:31'),
(66, 159, 3, '2020-02-12 14:48:24', '2020-02-12 14:48:24'),
(70, 252, 3, '2020-02-14 10:10:21', '2020-02-14 10:10:21'),
(74, 253, 2, '2020-02-14 10:44:19', '2020-02-14 10:44:19'),
(75, 257, 5, '2020-02-14 15:45:12', '2020-02-14 15:45:12'),
(76, 166, 3, '2020-03-20 12:53:53', '2020-03-20 12:53:53'),
(78, 259, 4, '2020-03-25 01:19:23', '2020-03-25 01:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_language_know`
--

CREATE TABLE `user_language_know` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_language_know`
--

INSERT INTO `user_language_know` (`id`, `user_id`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 174, 4, '2019-08-05 14:29:05', '2019-08-05 14:29:05'),
(2, 175, 4, '2019-08-05 14:29:44', '2019-08-05 14:29:44'),
(3, 175, 5, '2019-08-05 14:29:44', '2019-08-05 14:29:44'),
(4, 175, 6, '2019-08-05 14:29:44', '2019-08-05 14:29:44'),
(5, 177, 2, '2019-08-05 14:38:12', '2019-08-05 14:38:12'),
(9, 181, 3, '2019-08-06 12:02:02', '2019-08-06 12:02:02'),
(10, 181, 5, '2019-08-06 12:02:02', '2019-08-06 12:02:02'),
(11, 182, 4, '2019-08-06 16:03:41', '2019-08-06 16:03:41'),
(12, 182, 5, '2019-08-06 16:03:41', '2019-08-06 16:03:41'),
(13, 182, 6, '2019-08-06 16:03:41', '2019-08-06 16:03:41'),
(20, 180, 3, '2019-08-07 11:06:57', '2019-08-07 11:06:57'),
(21, 180, 5, '2019-08-07 11:06:57', '2019-08-07 11:06:57'),
(22, 178, 2, '2019-08-07 11:07:20', '2019-08-07 11:07:20'),
(23, 183, 3, '2019-08-07 11:07:51', '2019-08-07 11:07:51'),
(24, 183, 4, '2019-08-07 11:07:51', '2019-08-07 11:07:51'),
(25, 183, 8, '2019-08-07 11:07:51', '2019-08-07 11:07:51'),
(31, 179, 2, '2019-08-07 12:10:28', '2019-08-07 12:10:28'),
(32, 184, 2, '2019-08-17 21:37:51', '2019-08-17 21:37:51'),
(33, 184, 5, '2019-08-17 21:37:51', '2019-08-17 21:37:51'),
(34, 184, 6, '2019-08-17 21:37:51', '2019-08-17 21:37:51'),
(35, 184, 2, '2019-08-17 21:37:51', '2019-08-17 21:37:51'),
(36, 184, 5, '2019-08-17 21:37:51', '2019-08-17 21:37:51'),
(37, 184, 6, '2019-08-17 21:37:51', '2019-08-17 21:37:51'),
(38, 185, 3, '2019-08-19 18:15:47', '2019-08-19 18:15:47'),
(39, 185, 3, '2019-08-19 18:15:47', '2019-08-19 18:15:47'),
(46, 187, 3, '2019-08-20 11:46:51', '2019-08-20 11:46:51'),
(47, 187, 4, '2019-08-20 11:46:51', '2019-08-20 11:46:51'),
(48, 187, 3, '2019-08-20 11:46:51', '2019-08-20 11:46:51'),
(49, 187, 4, '2019-08-20 11:46:51', '2019-08-20 11:46:51'),
(53, 186, 2, '2019-08-21 05:38:03', '2019-08-21 05:38:03'),
(54, 186, 3, '2019-08-21 05:38:03', '2019-08-21 05:38:03'),
(55, 186, 5, '2019-08-21 05:38:03', '2019-08-21 05:38:03'),
(59, 213, 5, '2019-09-19 10:20:33', '2019-09-19 10:20:33'),
(60, 214, 3, '2019-11-05 14:59:03', '2019-11-05 14:59:03'),
(61, 214, 3, '2019-11-05 14:59:03', '2019-11-05 14:59:03'),
(79, 236, 8, '2020-01-01 17:51:11', '2020-01-01 17:51:11'),
(85, 237, 3, '2020-01-01 18:29:04', '2020-01-01 18:29:04'),
(99, 241, 4, '2020-01-08 19:14:13', '2020-01-08 19:14:13'),
(100, 241, 5, '2020-01-08 19:14:13', '2020-01-08 19:14:13'),
(102, 150, 4, '2020-01-08 19:15:04', '2020-01-08 19:15:04'),
(103, 150, 5, '2020-01-08 19:15:04', '2020-01-08 19:15:04'),
(106, 223, 4, '2020-01-23 15:37:40', '2020-01-23 15:37:40'),
(109, 244, 4, '2020-02-04 20:05:11', '2020-02-04 20:05:11'),
(115, 170, 4, '2020-02-04 20:11:25', '2020-02-04 20:11:25'),
(134, 217, 3, '2020-02-05 13:37:31', '2020-02-05 13:37:31'),
(135, 217, 5, '2020-02-05 13:37:31', '2020-02-05 13:37:31'),
(136, 159, 4, '2020-02-12 14:48:24', '2020-02-12 14:48:24'),
(140, 252, 2, '2020-02-14 10:10:21', '2020-02-14 10:10:21'),
(144, 253, 2, '2020-02-14 10:44:19', '2020-02-14 10:44:19'),
(145, 257, 2, '2020-02-14 15:45:12', '2020-02-14 15:45:12'),
(146, 166, 6, '2020-03-20 12:53:53', '2020-03-20 12:53:53'),
(148, 259, 4, '2020-03-25 01:19:23', '2020-03-25 01:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `crmconatct` varchar(150) NOT NULL,
  `contacts` varchar(15) NOT NULL DEFAULT 'denied',
  `project` varchar(150) NOT NULL,
  `task` varchar(150) NOT NULL,
  `event` varchar(150) NOT NULL,
  `campaign` varchar(150) NOT NULL,
  `chat` varchar(20) DEFAULT 'denied',
  `blog` varchar(150) NOT NULL,
  `donationreport` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`id`, `user_id`, `crmconatct`, `contacts`, `project`, `task`, `event`, `campaign`, `chat`, `blog`, `donationreport`, `created_at`, `updated_at`) VALUES
(4, 224, 'grant_acces', 'denied', 'grant_acces', 'denied', 'grant_acces', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-04 14:50:50'),
(5, 216, 'denied', 'denied', 'denied', 'grant_acces', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-04 14:31:00'),
(6, 223, 'grant_acces', 'denied', 'denied', 'denied', 'grant_acces', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-04 14:50:14'),
(7, 221, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(8, 220, 'denied', 'denied', 'authorized', 'denied', 'authorized', 'denied', 'denied', 'denied', 'authorized', '2020-01-01 23:20:50', '2020-01-06 15:46:55'),
(9, 219, 'view_only', 'grant_acces', 'denied', 'denied', 'grant_acces', 'denied', 'authorized', 'grant_acces', 'denied', '2020-01-01 23:20:50', '2020-01-22 12:07:43'),
(10, 217, 'denied', 'grant_acces', 'authorized', 'denied', 'grant_acces', 'denied', 'denied', 'authorized', 'denied', '2020-01-01 23:20:50', '2020-02-05 17:03:23'),
(11, 213, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(12, 179, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(13, 215, 'grant_acces', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-09 15:45:25'),
(14, 171, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(15, 183, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(16, 186, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(17, 187, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(18, 185, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(19, 184, 'authorized', 'authorized', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-09 15:28:45'),
(20, 173, 'grant_acces', 'denied', 'denied', 'grant_acces', 'grant_acces', 'grant_acces', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-05 17:09:12'),
(21, 177, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(22, 178, 'authorized', 'denied', 'grant_acces', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-08 17:39:33'),
(23, 180, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(24, 182, 'authorized', 'denied', 'grant_acces', 'denied', 'denied', 'denied', 'denied', 'authorized', 'denied', '2020-01-01 23:20:50', '2020-01-04 14:40:36'),
(25, 181, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(26, 175, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(27, 174, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(28, 170, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(29, 169, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(30, 166, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(31, 164, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(32, 162, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(33, 161, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(34, 159, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(35, 157, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(36, 156, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(37, 154, 'denied', 'denied', 'grant_acces', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-01 23:20:50', '2020-01-01 23:20:50'),
(40, 241, 'grant_acces', 'denied', 'denied', 'denied', 'authorized', 'denied', 'denied', 'denied', 'denied', '2020-01-08 19:08:18', '2020-01-08 19:12:18'),
(42, 150, 'denied', 'grant_acces', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-01-08 19:15:04', '2020-01-09 15:29:45'),
(43, 244, 'view_only', 'grant_acces', 'view_only', 'view_only', 'denied', 'grant_acces', 'denied', 'authorized', 'denied', '2020-01-08 20:36:36', '2020-02-05 17:17:55'),
(44, 249, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-02-08 20:28:38', '2020-02-08 20:28:38'),
(45, 250, 'denied', 'denied', 'grant_acces', 'grant_acces', 'authorized', 'denied', 'denied', 'grant_acces', 'denied', '2020-02-10 12:40:08', '2020-02-12 19:59:51'),
(46, 251, 'denied', 'grant_acces', 'grant_acces', 'authorized', 'grant_acces', 'authorized', 'authorized', 'authorized', 'authorized', '2020-02-13 11:22:17', '2020-02-13 11:42:06'),
(47, 252, 'grant_acces', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-02-13 20:40:32', '2020-02-13 20:40:32'),
(48, 253, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-02-14 10:12:07', '2020-02-14 10:12:07'),
(49, 256, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-02-14 14:59:33', '2020-02-14 14:59:33'),
(50, 257, 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', 'denied', '2020-02-14 15:38:24', '2020-02-14 15:38:24'),
(51, 259, 'denied', 'denied', 'denied', 'view_only', 'denied', 'denied', 'grant_acces', 'denied', 'denied', '2020-03-25 01:16:40', '2020-03-25 01:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_state`
--

CREATE TABLE `user_state` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_state`
--

INSERT INTO `user_state` (`id`, `user_id`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 236, 3, '2020-01-01 17:51:11', '2020-01-01 17:51:11'),
(2, 236, 4, '2020-01-01 17:51:11', '2020-01-01 17:51:11'),
(7, 237, 2, '2020-01-01 18:29:04', '2020-01-01 18:29:04'),
(8, 237, 3, '2020-01-01 18:29:04', '2020-01-01 18:29:04'),
(12, 241, 3, '2020-01-08 19:14:13', '2020-01-08 19:14:13'),
(13, 150, 3, '2020-01-08 19:15:04', '2020-01-08 19:15:04'),
(15, 223, 4, '2020-01-23 15:37:40', '2020-01-23 15:37:40'),
(18, 244, 2, '2020-02-04 20:05:12', '2020-02-04 20:05:12'),
(26, 170, 2, '2020-02-04 20:11:25', '2020-02-04 20:11:25'),
(27, 170, 3, '2020-02-04 20:11:25', '2020-02-04 20:11:25'),
(42, 217, 3, '2020-02-05 13:37:31', '2020-02-05 13:37:31'),
(43, 217, 4, '2020-02-05 13:37:31', '2020-02-05 13:37:31'),
(44, 159, 3, '2020-02-12 14:48:24', '2020-02-12 14:48:24'),
(48, 252, 2, '2020-02-14 10:10:21', '2020-02-14 10:10:21'),
(52, 253, 3, '2020-02-14 10:44:19', '2020-02-14 10:44:19'),
(53, 257, 2, '2020-02-14 15:45:12', '2020-02-14 15:45:12'),
(54, 257, 3, '2020-02-14 15:45:12', '2020-02-14 15:45:12'),
(55, 166, 2, '2020-03-20 12:53:53', '2020-03-20 12:53:53'),
(57, 259, 3, '2020-03-25 01:19:23', '2020-03-25 01:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `code` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `phone`, `code`, `created_at`, `updated_at`) VALUES
(2, '9033302492', '4185', '2019-12-23 17:56:56', '2019-12-23 17:56:56'),
(6, '8866056360', '3136', '2019-12-24 16:10:58', '2019-12-24 16:10:58'),
(7, '8866056000', '3760', '2019-12-24 16:17:11', '2019-12-24 16:17:11'),
(22, '9876543210', '3554', '2019-12-25 19:23:04', '2019-12-25 19:23:04'),
(23, '9966336699', '7945', '2019-12-25 19:24:26', '2019-12-25 19:24:26'),
(24, '9723294511', '2982', '2019-12-25 19:26:33', '2019-12-25 19:26:33'),
(29, '8866056366', '2275', '2019-12-26 12:17:09', '2019-12-26 12:17:09'),
(33, '8866056001', '5515', '2019-12-27 16:52:08', '2019-12-27 16:52:08'),
(34, '9723294333', '4689', '2019-12-27 17:17:35', '2019-12-27 17:17:35'),
(37, '9723205365', '6705', '2019-12-27 17:22:58', '2019-12-27 17:22:58'),
(40, '9723290101', '2147', '2019-12-27 17:25:39', '2019-12-27 17:25:39'),
(41, '9887932323', '2998', '2019-12-27 18:40:19', '2019-12-27 18:40:19'),
(42, '9898989899', '3923', '2019-12-27 18:41:23', '2019-12-27 18:41:23'),
(46, '9723294588', '1871', '2019-12-27 18:53:05', '2019-12-27 18:53:05'),
(48, '1231231231', '2383', '2019-12-28 11:50:48', '2019-12-28 11:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `live_in` varchar(255) DEFAULT NULL,
  `eduction_id` int(11) NOT NULL,
  `institutions_id` int(11) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  `is_blood_donor` int(11) DEFAULT NULL,
  `has_voluntee_experience` int(11) DEFAULT '0',
  `fb_link` varchar(255) DEFAULT NULL,
  `insta_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `interested_in_online` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `user_id`, `live_in`, `eduction_id`, `institutions_id`, `occupation_id`, `is_blood_donor`, `has_voluntee_experience`, `fb_link`, `insta_link`, `twitter_link`, `interested_in_online`, `created_at`, `updated_at`) VALUES
(1, 162, 'Vastral, Ahmedabad', 2, 0, 0, 0, 0, '', '', '', 0, '2019-08-05 13:48:33', '2019-08-05 13:48:33'),
(2, 169, 'Kankariy', 2, 2, 2, 1, 1, 'http://facebook.com', 'http://inst.com', 'http://twiter.com', 0, '2019-08-05 14:15:37', '2019-08-05 14:15:37'),
(3, 170, '', 2, 10, 2, 0, 1, 'http://facebook.com', 'http://inst.com', 'http://twiter.com', 0, '2019-08-05 14:18:04', '2020-02-04 20:11:25'),
(4, 171, 'Kankariy', 2, 2, 2, 0, 1, 'http://facebook.com', 'http://inst.com', 'http://twiter.com', 0, '2019-08-05 14:28:16', '2019-08-05 14:28:16'),
(5, 173, 'Kankariy', 2, 2, 2, 0, 1, 'http://facebook.com', 'http://inst.com', 'http://twiter.com', 0, '2019-08-05 14:28:46', '2019-08-05 14:28:46'),
(6, 174, 'Kankariy', 2, 2, 2, 0, 1, 'http://facebook.com', 'http://inst.com', 'http://twiter.com', 0, '2019-08-05 14:29:05', '2019-08-05 14:29:05'),
(7, 175, 'Kankariy', 2, 2, 2, 0, 1, 'http://facebook.com', 'http://inst.com', 'http://twiter.com', 0, '2019-08-05 14:29:44', '2019-08-05 14:29:44'),
(8, 177, 'sdasd', 3, 0, 2, 0, 0, '', '', '', 0, '2019-08-05 14:38:12', '2019-08-05 14:38:12'),
(9, 178, '', 2, 2, 3, 1, 1, 'Http://fb.com', 'Http://insta.com', 'Http://twit.com/', 0, '2019-08-06 05:55:59', '2019-08-07 11:07:20'),
(10, 179, '', 2, 2, 3, 1, 1, '', '', '', 0, '2019-08-06 06:18:55', '2019-08-07 11:24:21'),
(11, 180, '', 4, 3, 2, 1, 1, 'Http://fb.com', '', '', 0, '2019-08-06 09:12:17', '2019-08-07 11:06:57'),
(12, 181, 'Guj, india', 2, 51, 2, 1, 1, 'http://fb.com', 'http://insta.com', 'http://tw.comtw', 0, '2019-08-06 12:02:02', '2019-08-06 12:02:02'),
(13, 182, '', 3, 5, 2, 1, 1, '', '', '', 0, '2019-08-06 16:03:41', '2019-08-06 16:03:41'),
(14, 183, 'Kadi,mehsana', 3, 5, 5, 0, 0, 'Https://fb.com/123', 'Https://insta.com/123', 'Https://tw.com/123', 0, '2019-08-07 10:48:59', '2019-08-07 11:01:05'),
(15, 184, '', 0, 4, 2, 1, 1, '', '', '', 0, '2019-08-17 21:37:51', '2019-08-17 21:37:51'),
(16, 185, '', 3, 7, 4, 1, 1, '', '', '', 0, '2019-08-19 18:15:47', '2019-08-19 18:15:47'),
(17, 186, '', 0, 5, 4, 1, 1, '', '', '', 0, '2019-08-19 19:19:24', '2019-08-19 19:19:24'),
(18, 187, '', 0, 0, 3, 1, 1, '', '', '', 0, '2019-08-20 11:46:51', '2019-08-20 11:46:51'),
(19, 213, 'Asdas', 1, 10, 2, 0, 0, '', '', '', 0, '2019-09-19 10:20:03', '2019-09-19 10:20:33'),
(20, 214, '', 0, 8, 4, 1, 1, '', '', '', 0, '2019-11-05 14:59:03', '2019-11-05 14:59:03'),
(28, 236, '', 3, 7, 2, 1, 1, '', '', '', 0, '2020-01-01 17:51:11', '2020-01-01 17:51:11'),
(29, 237, 'Vastral', 3, 5, 1, 1, 0, '', '', '', 1, '2020-01-01 17:52:56', '2020-01-01 18:29:04'),
(30, 241, 'S', 2, 7, 4, 1, 1, '', '', '', 1, '2020-01-08 19:08:18', '2020-01-08 19:12:37'),
(31, 150, '', 4, 6, 2, 0, 0, '', '', '', 0, '2020-01-08 19:15:04', '2020-01-08 19:15:04'),
(33, 223, '', 2, 4, 3, 0, 0, '', '', '', 0, '2020-01-23 15:37:28', '2020-01-23 15:37:28'),
(34, 244, '', 0, 5, 3, 0, 0, '', '', '', 0, '2020-01-23 15:38:11', '2020-02-04 20:04:33'),
(35, 217, 'A', 3, 11, 4, 1, 0, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 0, '2020-02-05 11:21:17', '2020-02-05 13:37:31'),
(36, 159, '', 0, 20, 2, 0, 0, '', '', '', 0, '2020-02-12 14:48:24', '2020-02-12 14:51:31'),
(37, 156, 'A', 3, 11, 4, 1, 0, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 0, '2020-02-05 11:21:17', '2020-02-05 13:37:31'),
(38, 154, 'A', 3, 11, 4, 1, 0, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 0, '2020-02-05 11:21:17', '2020-02-05 13:37:31'),
(39, 250, '', 0, 0, 0, 0, 0, '', '', '', 0, '2020-02-12 19:20:30', '2020-02-12 19:20:30'),
(40, 252, 'Vvvvv', 0, 0, 3, 0, 0, '', '', '', 0, '2020-02-13 21:12:12', '2020-02-13 21:14:53'),
(41, 253, '', 3, 6, 3, 0, 0, '', '', '', 0, '2020-02-13 21:12:12', '2020-02-14 10:19:56'),
(42, 257, 'sda', 3, 1, 3, 1, 1, '', '', '', 1, '2020-02-14 15:45:12', '2020-02-14 15:45:12'),
(43, 166, '', 3, 2, 2, 0, 0, 'https://www.facebook.com/people/Manoj-Patel/100044836351449', 'https://www.instagram.com/people/Manoj-Patel/100044836351449', 'https://www.twitter.com/people/Manoj-Patel/100044836351449', 0, '2020-03-20 12:53:53', '2020-03-20 12:53:53'),
(44, 259, 'Ahmedabad', 2, 7, 3, 1, 0, 'https://stackoverflow.com/', 'https://stackoverflow.com/', 'https://stackoverflow.com/', 0, '2020-03-25 01:18:59', '2020-03-25 01:19:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_story`
--
ALTER TABLE `blog_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_collection`
--
ALTER TABLE `campaign_collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_comment`
--
ALTER TABLE `campaign_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_contact`
--
ALTER TABLE `campaign_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_images`
--
ALTER TABLE `campaign_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_team`
--
ALTER TABLE `campaign_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_group`
--
ALTER TABLE `chat_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_group_member`
--
ALTER TABLE `chat_group_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_group_messages`
--
ALTER TABLE `chat_group_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_individual`
--
ALTER TABLE `chat_individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_master`
--
ALTER TABLE `chat_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_booking`
--
ALTER TABLE `event_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_comment`
--
ALTER TABLE `event_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_team`
--
ALTER TABLE `event_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual`
--
ALTER TABLE `individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_blood_group`
--
ALTER TABLE `ms_blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_causes_interested`
--
ALTER TABLE `ms_causes_interested`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_education`
--
ALTER TABLE `ms_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_expense_category`
--
ALTER TABLE `ms_expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_institutions`
--
ALTER TABLE `ms_institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_language_known`
--
ALTER TABLE `ms_language_known`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_occupation`
--
ALTER TABLE `ms_occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_organization_category`
--
ALTER TABLE `ms_organization_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_state`
--
ALTER TABLE `ms_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_support_help`
--
ALTER TABLE `ms_support_help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_tags`
--
ALTER TABLE `ms_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_user_role`
--
ALTER TABLE `ms_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_file`
--
ALTER TABLE `organization_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_expense`
--
ALTER TABLE `project_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_file`
--
ALTER TABLE `project_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_note`
--
ALTER TABLE `project_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_team`
--
ALTER TABLE `project_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_check_list`
--
ALTER TABLE `task_check_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_file`
--
ALTER TABLE `task_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_observers`
--
ALTER TABLE `task_observers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_schedule`
--
ALTER TABLE `task_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_beneficiar`
--
ALTER TABLE `user_beneficiar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_beneficiary_image`
--
ALTER TABLE `user_beneficiary_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_interested_in_causes`
--
ALTER TABLE `user_interested_in_causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_language_know`
--
ALTER TABLE `user_language_know`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_state`
--
ALTER TABLE `user_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `blog_story`
--
ALTER TABLE `blog_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `campaign_collection`
--
ALTER TABLE `campaign_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `campaign_comment`
--
ALTER TABLE `campaign_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `campaign_contact`
--
ALTER TABLE `campaign_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `campaign_images`
--
ALTER TABLE `campaign_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `campaign_team`
--
ALTER TABLE `campaign_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `chat_group`
--
ALTER TABLE `chat_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `chat_group_member`
--
ALTER TABLE `chat_group_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `chat_group_messages`
--
ALTER TABLE `chat_group_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `chat_individual`
--
ALTER TABLE `chat_individual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `chat_master`
--
ALTER TABLE `chat_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `event_booking`
--
ALTER TABLE `event_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `event_comment`
--
ALTER TABLE `event_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `event_team`
--
ALTER TABLE `event_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `individual`
--
ALTER TABLE `individual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ms_blood_group`
--
ALTER TABLE `ms_blood_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ms_causes_interested`
--
ALTER TABLE `ms_causes_interested`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `ms_education`
--
ALTER TABLE `ms_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ms_expense_category`
--
ALTER TABLE `ms_expense_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ms_institutions`
--
ALTER TABLE `ms_institutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;
--
-- AUTO_INCREMENT for table `ms_language_known`
--
ALTER TABLE `ms_language_known`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ms_occupation`
--
ALTER TABLE `ms_occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ms_organization_category`
--
ALTER TABLE `ms_organization_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ms_state`
--
ALTER TABLE `ms_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ms_support_help`
--
ALTER TABLE `ms_support_help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ms_tags`
--
ALTER TABLE `ms_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ms_user_role`
--
ALTER TABLE `ms_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `organization_file`
--
ALTER TABLE `organization_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `project_expense`
--
ALTER TABLE `project_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `project_file`
--
ALTER TABLE `project_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `project_note`
--
ALTER TABLE `project_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `project_team`
--
ALTER TABLE `project_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `task_check_list`
--
ALTER TABLE `task_check_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `task_file`
--
ALTER TABLE `task_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `task_observers`
--
ALTER TABLE `task_observers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `task_schedule`
--
ALTER TABLE `task_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;
--
-- AUTO_INCREMENT for table `user_beneficiar`
--
ALTER TABLE `user_beneficiar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_beneficiary_image`
--
ALTER TABLE `user_beneficiary_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user_interested_in_causes`
--
ALTER TABLE `user_interested_in_causes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `user_language_know`
--
ALTER TABLE `user_language_know`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `user_state`
--
ALTER TABLE `user_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
