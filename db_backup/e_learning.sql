-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 04:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `tags` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `subcategory_id`, `title`, `content`, `like`, `dislike`, `tags`, `uploaded_by`, `picture`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Make Others\' Happy', 'Always keep a smile on your face. Sometimes a smile can change a persons\' mood.', 0, 0, 'happy', 'Admin', '1656267586.jpg', 'Running', NULL, '2021-05-21 20:37:27', '2021-05-21 20:37:27'),
(2, 3, 4, 'Rapidly increasing the number of cases', 'The World Health Organization on Sunday reported the largest single-day increase in coronavirus cases by its count, at more than 183,000 new cases in the latest 24 hours.', 0, 0, 'corona', 'Admin', '1971458747.jpg', 'Running', NULL, '2021-05-21 20:38:34', '2021-05-21 20:38:34'),
(3, 1, 1, 'Form Validation', 'Validation on forms provides you the feature so that data must be entered in correct format.', 1, 0, 'validation', 'Admin', '1988231094.jpg', 'Running', NULL, '2021-05-21 20:39:44', '2021-05-21 21:19:07'),
(4, 2, 2, 'Break the Walls', 'Break the Walls that restricts you. Move on, Fly and touch the sky. You will get the happiness for sure.', 0, 0, 'business', 'Admin', '670822164.jpg', 'Running', NULL, '2021-05-21 20:40:37', '2021-05-21 20:51:21'),
(5, 3, 5, '‘black fungus’ in Covid-19 patients', 'The disease, also known colloquially as “black fungus”, was made notifiable by the government on Thursday, making it mandatory for states to report both suspected and confirmed cases to the Integrated Disease Surveillance Programme (IDSP).', 0, 0, 'fungus', 'Admin', '741661312.jpg', 'Running', NULL, '2021-05-21 20:48:16', '2021-05-21 20:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Technology', '2021-05-21 20:31:48', '2021-05-21 20:31:48'),
(2, 'Motivation', '2021-05-21 20:31:58', '2021-05-21 20:31:58'),
(3, 'Trending News', '2021-05-21 20:32:09', '2021-05-21 20:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `type`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'E-Book', 'Reet', 'reet@gmail.com', 'Great Mystery', 'It is a really great mystery and really interesting story.', '2021-05-21 21:23:35', '2021-05-21 21:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ebookcategory_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages` int(11) NOT NULL,
  `published_on` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `like` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dislike` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `ebookcategory_id`, `title`, `author`, `pages`, `published_on`, `description`, `uploaded_by`, `picture`, `ebook`, `status`, `like`, `dislike`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Codename:Chimera', 'Jake & Kate Persy', 188, '2020-03-02', 'How do you track down a killer when he has no face? The corpse of a millionaire antique collector is found in New York on the eve of a major auction. The last thing he saw in the darkness, seconds before his grisly demise, was something that terrified him beyond imagination and was enough to end his life. But was it a man or was it a ghost? Now detective Kevin Kris must draw on all of his considerable skills in what amounts to the most challenging case of his career, as he sets out to track a murderer who is known as The Man With No Face. This cozy, fast-paced, whodunnit mystery is packed full of twists and turns that will leave you as breathless as Kris, as he tries to keep pace with a foe who is every bit his equal.', 'Admin', '132111053.jpg', '2037301552.pdf', 'Running', '0', '0', NULL, '2021-05-21 21:09:50', '2021-05-21 21:09:50'),
(2, 1, 'An Uncollected Death', 'Meg Wolfe', 290, '2019-07-19', 'Broke, friendless, and career in freefall--will solve a murder get her life back on track? An Uncollected Death introduces Charlotte Anthony, a forty-something divorcée, single mother, and magazine editor who suddenly finds herself an empty-nester, unemployed, and on the verge of bankruptcy. She gratefully takes the job of editing the journals of Olivia Bernadin, a long-lost nouveau roman author. Things rapidly deteriorate, however, when she finds Olivia left for dead the first day on the job--and herself a suspect in the crime.', 'Admin', '926882663.jpg', '1904991208.pdf', 'Running', '0', '0', NULL, '2021-05-21 21:11:15', '2021-05-21 21:11:15'),
(3, 2, 'C4B: Mobile Robotics', 'Paul Michael Newman', 114, '2014-03-12', 'A set of lectures about navigating mobile platforms or robots that is an extension of the B4 estimation course covering topics such as linear and non-linear Kalman Filtering.', 'Admin', '1108124399.jpg', '498927649.pdf', 'Running', '0', '0', NULL, '2021-05-21 21:12:32', '2021-05-21 21:12:32'),
(4, 2, 'Programming with Robots', 'Albert W. Schueller', 78, '2013-12-17', 'An overview on robot programming using RobotC software at\r\nCarnegie-Mellon\'s Robotics laboratory as the main reference.', 'Admin', '887422104.jpg', '1831129016.pdf', 'Running', '0', '0', NULL, '2021-05-21 21:14:13', '2021-05-21 21:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `ebook_categories`
--

CREATE TABLE `ebook_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ebookcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebook_categories`
--

INSERT INTO `ebook_categories` (`id`, `ebookcategory_name`, `created_at`, `updated_at`) VALUES
(1, 'Mystery', '2021-05-21 21:07:26', '2021-05-21 21:07:26'),
(2, 'Robotics', '2021-05-21 21:07:32', '2021-05-21 21:07:32'),
(3, 'World', '2021-05-21 21:07:37', '2021-05-21 21:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_09_103418_create_admins_table', 1),
(5, '2020_04_09_112623_create_categories_table', 1),
(6, '2020_04_09_121126_create_subcategories_table', 1),
(7, '2020_04_09_122830_create_blogs_table', 1),
(8, '2020_04_10_062734_create_videos_table', 1),
(9, '2020_06_23_043223_create_ebook_categories_table', 1),
(10, '2020_06_23_051329_create_ebooks_table', 1),
(11, '2020_06_23_170033_create_comments_table', 1),
(12, '2020_06_23_172156_create_question_paper_categories_table', 1),
(13, '2020_06_23_172343_create_question_papers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_papers`
--

CREATE TABLE `question_papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quecategory_id` bigint(20) UNSIGNED NOT NULL,
  `sem` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_paper` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_papers`
--

INSERT INTO `question_papers` (`id`, `quecategory_id`, `sem`, `subject`, `year`, `question_paper`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'Chemistery', '2019', '783285362.pdf', NULL, '2021-05-21 21:17:14', '2021-05-21 21:17:14'),
(2, 1, '1', 'BEEE', '2019', '1737765535.pdf', NULL, '2021-05-21 21:17:36', '2021-05-21 21:17:36'),
(3, 1, '1', 'ED', '2019', '1800666624.pdf', NULL, '2021-05-21 21:18:00', '2021-05-21 21:18:00'),
(4, 1, '3', 'DCLD', '2018', '1492203733.pdf', NULL, '2021-05-21 21:18:33', '2021-05-21 21:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `question_paper_categories`
--

CREATE TABLE `question_paper_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quecategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_paper_categories`
--

INSERT INTO `question_paper_categories` (`id`, `quecategory_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'BTech CSE', NULL, '2021-05-21 21:16:14', '2021-05-21 21:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'PHP', NULL, '2021-05-21 20:32:41', '2021-05-21 20:32:41'),
(2, 2, 'Professional', NULL, '2021-05-21 20:32:55', '2021-05-21 20:32:55'),
(3, 2, 'Self', NULL, '2021-05-21 20:33:05', '2021-05-21 20:33:05'),
(4, 3, 'COVID-19', NULL, '2021-05-21 20:33:34', '2021-05-21 20:33:34'),
(5, 3, 'Black Fungus', NULL, '2021-05-21 20:33:50', '2021-05-21 20:33:50'),
(6, 1, 'IOT', NULL, '2021-05-21 20:33:57', '2021-05-21 20:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Reet', 'reet@gmail.com', NULL, '$2y$10$RlKXbQZO8vHC0WGSPTeH2.3gWsqM0LcmKvM7YIVV926fEWpIIU0Um', NULL, '2021-05-21 21:22:19', '2021-05-21 21:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `tags` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `category_id`, `subcategory_id`, `title`, `content`, `like`, `dislike`, `tags`, `uploaded_by`, `video`, `type`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'Internet of Things', 'Internet of Things is the latest technology which takes the world to another level of innovation.', 0, 0, 'iot', 'Admin', 'LlhmzVL5bm8', ' ', 'Running', NULL, '2021-05-21 20:58:50', '2021-05-21 20:58:50'),
(2, 2, 3, 'I\'ve Come too far to quit', 'If you are struggling now, don\'t give up.\r\nNo hard work goes in vain.\r\nYou have to struggle now so that you can sit on the throne for the rest of your life.\"If you do what is easy, your life will be hard. But if you do what is hard, your life will be easy.\"', 0, 0, 'quit', 'Admin', 'pxY_ZAsoD4I', ' ', 'Running', NULL, '2021-05-21 21:02:09', '2021-05-21 21:02:09'),
(3, 3, 4, 'Covid-19 in India: A country struggling to breathe', 'On March 1, 2021, India recorded 12,286 new cases. It was a dip in the Covid-19 graph that had been flatlining since the beginning of the year. The pandemic, it seemed, was receding. India was getting back to normal. The surge of medical facilities that had been set up across the country during the first wave had begun to be dismantled. In February 2021, for instance, the Union home ministry had closed down a 10,000-bed Covid care facility, the world’s largest, at the Radha Soami Satsang Beas in South Delhi’s Chhatarpur last June. By March 26, the Election Commission had announced the election schedules for the five states going to polls.\r\n\r\nThen, on April 6, India crossed 115,000 infections in just 24 hours, its single-largest daily case load since the start of the pandemic. The wall of the Covid tsunami had begun to loom over the horizon.', 0, 0, 'india', 'Admin', 'Gm_4CD0zWB4', ' ', 'Running', NULL, '2021-05-21 21:07:01', '2021-05-21 21:07:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`),
  ADD KEY `blogs_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ebooks_ebookcategory_id_foreign` (`ebookcategory_id`);

--
-- Indexes for table `ebook_categories`
--
ALTER TABLE `ebook_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `question_papers`
--
ALTER TABLE `question_papers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_papers_quecategory_id_foreign` (`quecategory_id`);

--
-- Indexes for table `question_paper_categories`
--
ALTER TABLE `question_paper_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_category_id_foreign` (`category_id`),
  ADD KEY `videos_subcategory_id_foreign` (`subcategory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ebook_categories`
--
ALTER TABLE `ebook_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `question_papers`
--
ALTER TABLE `question_papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question_paper_categories`
--
ALTER TABLE `question_paper_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `blogs_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `ebooks` (`id`);

--
-- Constraints for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD CONSTRAINT `ebooks_ebookcategory_id_foreign` FOREIGN KEY (`ebookcategory_id`) REFERENCES `ebook_categories` (`id`);

--
-- Constraints for table `question_papers`
--
ALTER TABLE `question_papers`
  ADD CONSTRAINT `question_papers_quecategory_id_foreign` FOREIGN KEY (`quecategory_id`) REFERENCES `question_paper_categories` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `videos_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
