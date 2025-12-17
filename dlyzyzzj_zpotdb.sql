-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2025 at 04:25 PM
-- Server version: 10.6.23-MariaDB-cll-lve
-- PHP Version: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dlyzyzzj_zpotdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_type` varchar(50) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `user_id`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 17, 'fattan@gmail.com', '087722848699', 'TOLONGIN DONG', '2025-12-10 15:58:32'),
(2, 18, 'gyuwkaku@gmail.com', '087527819', 'halo kayaknya stress', '2025-12-11 16:23:46'),
(4, 17, 'zpotsukses', '09876545678', 'contoh', '2025-12-13 13:16:36'),
(5, 6, 'sabeenapnd', '7654327654', 'toloooong', '2025-12-13 17:43:32'),
(6, 6, 'sabeenapnd', '7654327654', 'contoh', '2025-12-13 17:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `favorite_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender_name` varchar(100) DEFAULT NULL,
  `sender_avatar` varchar(255) DEFAULT 'images/profile/profile.png',
  `type` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recent_activities`
--

CREATE TABLE `recent_activities` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_type` varchar(100) NOT NULL,
  `target_name` varchar(100) DEFAULT NULL,
  `target_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recent_activities`
--

INSERT INTO `recent_activities` (`activity_id`, `user_id`, `activity_type`, `target_name`, `target_image`, `created_at`, `category`) VALUES
(1, 7, 'review', 'TIRAMISU NYA ENAAAAKK', 'images/uploads/1765604208_maiku cafe.jpg', '2025-12-13 05:36:48', ''),
(2, 5, 'review', 'asek', 'images/uploads/1765606380_ig.jpg', '2025-12-13 06:13:00', ''),
(3, 5, 'review', 'Kopi Kenangan', 'images/uploads/1765610809_693d15394a8de.jpg', '2025-12-13 07:26:49', ''),
(4, 19, 'review', 'KOI', 'images/uploads/1765610825_693d154967e2f.png', '2025-12-13 07:27:05', ''),
(10, 6, 'review', 'Klasse House Cibubur', 'images/uploads/1765646281_693d9fc9dab0f.webp', '2025-12-13 17:18:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `place_name` varchar(100) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `visit_date` varchar(50) DEFAULT NULL,
  `tag_text` varchar(100) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `username`, `place_name`, `rating`, `visit_date`, `tag_text`, `review_text`, `image`, `comments`, `likes`, `created_at`, `category`) VALUES
(1, 'bulan', 'Nanny’s Pavillon, Central Park', 5, 'October, 30 2025', 'WILL BE MY GO-TO-LIST!!', 'The food is goooooood!! i love the garlic cheese bread its so scrumptilicious! definitely would come back for that!', 'images/profile/nannys pavillon.webp', 2, 3, '2025-12-10 20:57:55', ''),
(2, 'bulan', 'The Acre, Menteng', 5, 'September, 17 2025', 'GOOD CHOICE FOR BRUNCH!!', 'Nice place for dinner, love the ambience, they have a lot of menu, but what we order all are so delicious.', 'images/profile/the acre.webp', 13, 50, '2025-12-10 20:57:55', ''),
(3, 'bulan', 'Hutan Kota GBK', 4, 'September, 9 2025', 'PIKNIK SIAPA MAU PIKNIIIIIK', 'The place is good dan cocok buat sore ke malam karena adeeem!! cuma kalau siang panas karena pohonnya gak banyak.', 'images/profile/hutankota.webp', 1, 8, '2025-12-10 20:57:55', ''),
(4, 'bulan', 'Warkopolim, Panglima Polim', 4, 'Augustus, 28 2025', 'WARKOP KALCER, BHAAAPPP', 'Great place to gather with friends, hampir selalu rame. Harga makan dan minum tergolong affordable buat daerah sini.', 'images/profile/warkopolim.webp', 1, 8, '2025-12-10 20:57:55', ''),
(5, 'bulan', 'Sate Taichan Yoyo, Setiabudi', 5, 'August, 27 2025', 'TAICHAN CRISPY TERENAK SCRUMPTILICIOUS!!', 'The best sate taichan se jabodetabek!! konsep taichan krispi nya enak banget beda daripada yg lain.', 'images/profile/yoyo.webp', 12, 31, '2025-12-10 20:57:55', ''),
(6, 'bulan', 'Dream Dates, Senopati', 5, 'July, 27 2025', 'WORTH TO TRY!! LARI SEKARANG!!', 'All the meals were very delicious. Price-wise, its also quite affordable. The place has a nice ambience, they also provide a spacious and clean musholla on the second floor.', 'images/index/DreamDates_Photo.png', 12, 31, '2025-12-10 20:57:55', ''),
(11, 'farelbeale', 'beskabean', 5, 'December, 10 2025', 'murah', 'mantap kali, apakan dulu dia biar ga apa kali ', 'images/placeholder.jpg', 0, 0, '2025-12-10 21:49:31', ''),
(12, 'zpotta', 'kopi kina', 5, 'December, 13 2025', 'ambience bagus, cocok buat nongs', 'kopii nya enak, temopat nya cocok buat malmingan sama temen temen. ada yang di kemang dan di tebet (yang paling deket sm aku)', 'images/uploads/5598_kopikina2.webp', 0, 0, '2025-12-13 14:07:02', ''),
(13, 'gyuwkaku', 'Toko Kopi Tuku', 5, 'December, 13 2025', 'enak', 'seenak monyet', 'images/uploads/4224_tuku.webp', 0, 0, '2025-12-13 14:08:19', ''),
(14, 'ghodell', 'Kopi Kenangan', 0, 'December, 13 2025', 'MANTAP', 'wasdw', 'images/uploads/1765610809_693d15394a8de.jpg', 0, 0, '2025-12-13 14:26:49', 'Place'),
(15, 'zpotta', 'KOI', 5, 'December, 13 2025', 'bubble tea enak bangettt', 'gue suka sih wfc disini, BESTTTTT', 'images/uploads/1765610825_693d154967e2f.png', 0, 0, '2025-12-13 14:27:05', 'Place');

-- --------------------------------------------------------

--
-- Table structure for table `signin_log`
--

CREATE TABLE `signin_log` (
  `signin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `signin_log`
--

INSERT INTO `signin_log` (`signin_id`, `user_id`, `password`, `created_at`) VALUES
(1, 17, 'zpot', '2025-12-10 14:26:01'),
(2, 11, 'elphie', '2025-12-10 14:32:23'),
(3, 7, 'glinda', '2025-12-10 14:40:35'),
(4, 13, 'jamek123', '2025-12-10 14:47:40'),
(5, 11, '***TERSEMBUNYI***', '2025-12-10 15:38:00'),
(6, 5, '***TERSEMBUNYI***', '2025-12-11 04:12:17'),
(7, 6, '***TERSEMBUNYI***', '2025-12-11 05:30:12'),
(8, 5, '***TERSEMBUNYI***', '2025-12-11 05:50:43'),
(9, 6, '***TERSEMBUNYI***', '2025-12-11 07:30:57'),
(10, 10, '***TERSEMBUNYI***', '2025-12-11 08:36:07'),
(11, 10, '***TERSEMBUNYI***', '2025-12-11 08:36:35'),
(12, 5, '***TERSEMBUNYI***', '2025-12-11 10:05:25'),
(13, 5, '***TERSEMBUNYI***', '2025-12-11 10:11:41'),
(14, 5, '***TERSEMBUNYI***', '2025-12-11 10:28:09'),
(15, 11, '***TERSEMBUNYI***', '2025-12-11 10:48:07'),
(16, 7, '***TERSEMBUNYI***', '2025-12-11 11:59:00'),
(17, 11, '***TERSEMBUNYI***', '2025-12-11 12:01:11'),
(18, 5, '***TERSEMBUNYI***', '2025-12-11 12:15:10'),
(19, 5, '***TERSEMBUNYI***', '2025-12-11 12:40:27'),
(20, 17, '***TERSEMBUNYI***', '2025-12-11 12:51:28'),
(21, 6, '***TERSEMBUNYI***', '2025-12-11 13:25:17'),
(22, 7, '***TERSEMBUNYI***', '2025-12-11 14:02:31'),
(23, 10, '***TERSEMBUNYI***', '2025-12-11 14:08:59'),
(24, 11, '***TERSEMBUNYI***', '2025-12-11 14:09:54'),
(25, 18, '***TERSEMBUNYI***', '2025-12-11 14:18:09'),
(26, 6, '***TERSEMBUNYI***', '2025-12-11 14:20:48'),
(27, 5, '***TERSEMBUNYI***', '2025-12-11 14:25:04'),
(28, 5, '***TERSEMBUNYI***', '2025-12-11 14:30:37'),
(29, 18, '***TERSEMBUNYI***', '2025-12-11 16:21:21'),
(30, 10, '***TERSEMBUNYI***', '2025-12-12 02:50:31'),
(31, 7, '***TERSEMBUNYI***', '2025-12-12 06:10:52'),
(32, 10, '***TERSEMBUNYI***', '2025-12-12 06:17:04'),
(33, 18, '***TERSEMBUNYI***', '2025-12-12 07:06:18'),
(34, 6, '***TERSEMBUNYI***', '2025-12-12 07:14:30'),
(35, 18, '***TERSEMBUNYI***', '2025-12-12 07:41:04'),
(36, 5, '***TERSEMBUNYI***', '2025-12-12 08:03:30'),
(37, 7, '***TERSEMBUNYI***', '2025-12-12 08:29:03'),
(38, 7, '***TERSEMBUNYI***', '2025-12-12 08:43:40'),
(39, 10, '***TERSEMBUNYI***', '2025-12-12 08:43:44'),
(40, 18, '***TERSEMBUNYI***', '2025-12-12 09:26:17'),
(41, 10, '***TERSEMBUNYI***', '2025-12-12 10:26:46'),
(42, 19, '***TERSEMBUNYI***', '2025-12-12 10:30:39'),
(43, 18, '***TERSEMBUNYI***', '2025-12-13 04:14:34'),
(44, 5, '***TERSEMBUNYI***', '2025-12-13 05:32:44'),
(45, 7, '***TERSEMBUNYI***', '2025-12-13 05:33:16'),
(46, 6, '***TERSEMBUNYI***', '2025-12-13 06:01:54'),
(47, 18, '***TERSEMBUNYI***', '2025-12-13 07:02:57'),
(48, 19, '***TERSEMBUNYI***', '2025-12-13 07:05:13'),
(49, 6, '***TERSEMBUNYI***', '2025-12-13 07:07:23'),
(50, 5, '***TERSEMBUNYI***', '2025-12-13 07:17:25'),
(51, 6, '***TERSEMBUNYI***', '2025-12-13 08:37:19'),
(52, 19, '***TERSEMBUNYI***', '2025-12-13 10:40:07'),
(53, 17, '***TERSEMBUNYI***', '2025-12-13 10:48:28'),
(54, 17, '***TERSEMBUNYI***', '2025-12-13 10:53:30'),
(55, 20, '***TERSEMBUNYI***', '2025-12-13 11:43:53'),
(56, 17, '***TERSEMBUNYI***', '2025-12-13 11:46:35'),
(57, 6, '***TERSEMBUNYI***', '2025-12-13 15:29:04'),
(58, 6, '***TERSEMBUNYI***', '2025-12-13 15:31:44'),
(59, 19, '***TERSEMBUNYI***', '2025-12-13 16:58:30'),
(60, 21, '***TERSEMBUNYI***', '2025-12-13 17:10:45'),
(61, 6, '***TERSEMBUNYI***', '2025-12-13 17:11:58'),
(62, 17, '***TERSEMBUNYI***', '2025-12-13 17:12:20'),
(63, 17, '***TERSEMBUNYI***', '2025-12-13 17:13:21'),
(64, 6, '***TERSEMBUNYI***', '2025-12-13 17:22:05'),
(65, 6, '***TERSEMBUNYI***', '2025-12-13 17:35:12'),
(66, 19, '***TERSEMBUNYI***', '2025-12-13 17:55:41'),
(67, 19, '***TERSEMBUNYI***', '2025-12-13 19:48:58'),
(68, 19, '***TERSEMBUNYI***', '2025-12-14 05:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `signup_log`
--

CREATE TABLE `signup_log` (
  `signup_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `signup_log`
--

INSERT INTO `signup_log` (`signup_id`, `user_id`, `email`, `password`, `created_at`) VALUES
(1, 17, 'zpot@gmail.com', 'zpot', '2025-12-10 14:25:51'),
(2, 18, 'gyuwkaku@gmail.com', '$2y$10$zaIZGhaVH9b65QfQz.LF1.vDkgc9EMMpS5ukulHJgcYCYq87LHEHS', '2025-12-11 14:17:57'),
(3, 19, 'zpotta@gmail.com', '$2y$10$5JYE2IYs3GZzP831/itHjuFlczTW8/T1BGIoFkVZdIiGmI4.LA6OC', '2025-12-12 10:30:32'),
(4, 20, 'upn@gmail.com', '$2y$10$PFr4LSZYC/YHJ7WuXREAOepfVGY0N0KRwOSw7zZD6ujOyGm.9TRQa', '2025-12-13 11:43:41'),
(5, 21, 'user@gmail.com', '$2y$10$v.kEYJmEYtWW3O5nh8l6qOF8t2IUNWskjleYlQ41SrLUXE8ur/IL6', '2025-12-13 17:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `upload_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`upload_id`, `user_id`, `category_id`, `title`, `description`, `image_url`, `address`, `rating`, `created_at`, `updated_at`) VALUES
(1, 7, 6, 'TIRAMISU NYA ENAAAAKK', 'seru banget must visit sihhh!!\n\n[PROS]: tiramisu nya yang original enak\n[CONS]: better yang ori daripada yg lain', 'images/uploads/1765604208_maiku cafe.jpg', 'Blok M', 5, '2025-12-13 05:36:48', '2025-12-13 05:36:48'),
(2, 5, 2, 'asek', 'wadwa\n\n[PROS]: wasdwa\n[CONS]: sdwas', 'images/uploads/1765606380_ig.jpg', 'dwasdw', 3, '2025-12-13 06:13:00', '2025-12-13 06:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(4, 'mfattan', 'fattan', 'fattan@gmail.com', '$2y$10$lUMZLzLps9H8YBE1bifYBeqBqXS9pzlxlNGN6ApQErY.sf40PO.16'),
(5, 'mrghodell', 'ghodell', 'ghodell@gmail.com', '$2y$10$pc0Efwvt9E3H/gSRZ9u6SOVD4l.jiC7fhVQXh0pUO5YrPWqv1tVrW'),
(6, 'sabina wanokiatty', 'sabeenapnd', 'sabeenapaneunda@gmail.com', '$2y$10$KoaJANNFq4anUvRvzOQTtO.AQdrMnqptAtiopc5KgcPxj1aycNJUy'),
(7, 'galinda upland', 'glindathegood', 'glindaupland@oz.com', '$2y$10$DyErWgD8uT0RkXcszcb4euEyGXF20mqdzcMOWgA9jkMg61sygAsDe'),
(8, 'nayara', 'nayyara', 'nayyarashrr@gmail.com', '$2y$10$ZS8Y2WPOoLdeQv2TjrW/.uAZHjutDYkzOdMlpyyAdPxtAUx553cq2'),
(10, 'bulan', 'moonlove', 'moon@gmail.com', '$2y$10$QnsoJ6TnkLodmF8JgPsv5etg5BBOJed6dG5cETU6MY1e9pqJ4qQQS'),
(11, 'elphaba thropp', 'elphaba', 'elphabathropp@oz.com', '$2y$10$rf7I1RQ8VzIqLdaqzrv5w.Ace0.S3nQK3HlhIUxkmMLM45jZcYoA6'),
(12, 'arya', 'aryasatya', 'aasdasdad@gmail.com', '$2y$10$UYcAgbBd2zm2q/4uCWi5ZObG9TZGlMVgDxdzy1FjtoGvwyVYZ3iSS'),
(14, 'indira putri', 'jjxzyg1 ', 'indiraptr444@gmail.com', '$2y$10$m/49fdf3qWKDRRDq7YVnEuXhbECjYEn19VsgNWdqAIXw6GDQg4Mj.'),
(15, 'eagle perdana khaivi', 'eagleperdana', 'hop45hitman@csum.edu', '$2y$10$nB7HCgpveximVdooxxK68OOfwxwFWi3LvLIPMH.A29r0lNmEx6cd2'),
(16, 'eagle perdana khaivi', 'jokowi', 'eagleivi1222212@gmail.com', '$2y$10$MEu9sQajgyN1Eq7vR2CrM.0fCUYg5b9ULiH0dwjYjWzNIRqhq4ZCi'),
(17, 'zpotsukses', 'zpotsukses', 'zpot@gmail.com', '$2y$10$NiQ3QJv3.YH0Evf/YzFuoeeKFRRhCX3iAsFFv8D1K2H4mlRnBSmX.'),
(18, 'saki', 'gyuwkaku', 'gyuwkaku@gmail.com', '$2y$10$zaIZGhaVH9b65QfQz.LF1.vDkgc9EMMpS5ukulHJgcYCYq87LHEHS'),
(19, 'bismillahzpot', 'zpotta', 'zpotta@gmail.com', '$2y$10$5JYE2IYs3GZzP831/itHjuFlczTW8/T1BGIoFkVZdIiGmI4.LA6OC'),
(20, 'upnveteran', 'upnveteran', 'upn@gmail.com', '$2y$10$PFr4LSZYC/YHJ7WuXREAOepfVGY0N0KRwOSw7zZD6ujOyGm.9TRQa'),
(21, 'user ', 'user', 'user@gmail.com', '$2y$10$v.kEYJmEYtWW3O5nh8l6qOF8t2IUNWskjleYlQ41SrLUXE8ur/IL6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recent_activities`
--
ALTER TABLE `recent_activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signin_log`
--
ALTER TABLE `signin_log`
  ADD PRIMARY KEY (`signin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `signup_log`
--
ALTER TABLE `signup_log`
  ADD PRIMARY KEY (`signup_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recent_activities`
--
ALTER TABLE `recent_activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `signin_log`
--
ALTER TABLE `signin_log`
  MODIFY `signin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `signup_log`
--
ALTER TABLE `signup_log`
  MODIFY `signup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
