-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 27, 2022 at 01:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iudyog92_personal`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comments`, `user_name`, `sequence`, `created_at`, `updated_at`) VALUES
(5, 3, 3, 'Hello', 'Shakil Ahmad', NULL, '2022-08-02 12:32:14', '2022-08-02 12:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `likes` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `likes`, `created_at`, `updated_at`) VALUES
(55, 3, 10, 1, '2022-08-09 06:00:34', '2022-08-09 06:00:34'),
(57, 2, 10, 1, '2022-08-09 08:24:03', '2022-08-09 08:24:03');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2019_11_18_105032_create_pages_table', 2),
(6, '2019_11_18_105615_create_uploads_table', 2),
(7, '2020_04_18_064412_create_page_translations_table', 2),
(8, '2020_04_18_065546_create_settings_table', 2),
(9, '2022_07_08_100927_create_sections_table', 3),
(11, '2022_07_08_114813_create_section_items_table', 4),
(13, '2022_07_12_112903_create_posts_table', 5),
(14, '2022_07_28_110842_add_google_id_column', 6),
(15, '2022_07_28_113934_comment', 7),
(16, '2022_08_03_121402_reply', 8),
(17, '2022_08_03_172619_postimages', 9),
(18, '2022_08_08_163934_like', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pagebuilder_pages`
--

CREATE TABLE `pagebuilder_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagebuilder_page_translations`
--

CREATE TABLE `pagebuilder_page_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagebuilder_settings`
--

CREATE TABLE `pagebuilder_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_array` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagebuilder_uploads`
--

CREATE TABLE `pagebuilder_uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `public_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_file` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_file` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('akhilraj8981139540@gmail.com', '$2y$10$uih1ktUl3HIvMUXvVnUxauVUwk88OEC7jKGuH4HPeAhHP/ORKpSzS', '2022-07-04 02:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_content` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `sequence` int(11) DEFAULT NULL,
  `meta_title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `type`, `title`, `sub_title`, `post_content`, `image`, `background_image`, `tag`, `category`, `status`, `sequence`, `meta_title`, `meta_description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'instagram', NULL, NULL, '<blockquote class=\"instagram-media\" data-instgrm-captioned data-instgrm-permalink=\"https://www.instagram.com/reel/Cdm61d9pTLQ/?utm_source=ig_embed&amp;utm_campaign=loading\" data-instgrm-version=\"14\" style=\" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);\"><div style=\"padding:16px;\"> <a href=\"https://www.instagram.com/reel/Cdm61d9pTLQ/?utm_source=ig_embed&amp;utm_campaign=loading\" style=\" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;\" target=\"_blank\"> <div style=\" display: flex; flex-direction: row; align-items: center;\"> <div style=\"background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;\"></div> <div style=\"display: flex; flex-direction: column; flex-grow: 1; justify-content: center;\"> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;\"></div> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;\"></div></div></div><div style=\"padding: 19% 0;\"></div> <div style=\"display:block; height:50px; margin:0 auto 12px; width:50px;\"><svg width=\"50px\" height=\"50px\" viewBox=\"0 0 60 60\" version=\"1.1\" xmlns=\"https://www.w3.org/2000/svg\" xmlns:xlink=\"https://www.w3.org/1999/xlink\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><g transform=\"translate(-511.000000, -20.000000)\" fill=\"#000000\"><g><path d=\"M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631\"></path></g></g></g></svg></div><div style=\"padding-top: 8px;\"> <div style=\" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;\">View this post on Instagram</div></div><div style=\"padding: 12.5% 0;\"></div> <div style=\"display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;\"><div> <div style=\"background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);\"></div> <div style=\"background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;\"></div> <div style=\"background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);\"></div></div><div style=\"margin-left: 8px;\"> <div style=\" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;\"></div> <div style=\" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)\"></div></div><div style=\"margin-left: auto;\"> <div style=\" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);\"></div> <div style=\" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);\"></div> <div style=\" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);\"></div></div></div> <div style=\"display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;\"> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;\"></div> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;\"></div></div></a><p style=\" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;\"><a href=\"https://www.instagram.com/reel/Cdm61d9pTLQ/?utm_source=ig_embed&amp;utm_campaign=loading\" style=\" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;\" target=\"_blank\">A post shared by Madhvi (@madhvichaudhary_)</a></p></div></blockquote> <script async src=\"//www.instagram.com/embed.js\"></script>', NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, '2022-07-13 11:06:35', NULL, '2022-07-13 11:06:35', NULL),
(3, 'linkedin', NULL, NULL, '<iframe src=\"https://www.linkedin.com/embed/feed/update/urn:li:share:6940496309795647488\" height=\"1184\" width=\"504\" frameborder=\"0\" allowfullscreen=\"\" title=\"Embedded post\"></iframe>', NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, '2022-07-13 11:09:16', NULL, '2022-07-13 11:09:16', NULL),
(4, 'twitter', NULL, NULL, '<blockquote class=\"twitter-tweet\"><p lang=\"en\" dir=\"ltr\">Everyone wants to build a mansion, but it has to start somewhere. I tell them to try and build a flat first - and go from there. The beauty of life is that we can start a small as possible and can still make it as big as we want.</p>&mdash; Kamal Kalra (@kamalkalra84) <a href=\"https://twitter.com/kamalkalra84/status/1527122785616949248?ref_src=twsrc%5Etfw\">May 19, 2022</a></blockquote> <script async src=\"https://platform.twitter.com/widgets.js\" charset=\"utf-8\"></script>', NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, '2022-07-13 11:11:40', NULL, '2022-07-13 11:11:40', NULL),
(10, 'twitter', NULL, NULL, '<blockquote class=\"twitter-tweet\"><p lang=\"en\" dir=\"ltr\">&quot;Find <a href=\"https://twitter.com/hashtag/purpose?src=hash&amp;ref_src=twsrc%5Etfw\">#purpose</a> and means will follow&quot; - Mahatma Gandhi. Stands the test of time even after so many years. <a href=\"https://twitter.com/hashtag/startup?src=hash&amp;ref_src=twsrc%5Etfw\">#startup</a> <a href=\"https://twitter.com/hashtag/leadership?src=hash&amp;ref_src=twsrc%5Etfw\">#leadership</a> <a href=\"https://twitter.com/hashtag/lifemantra?src=hash&amp;ref_src=twsrc%5Etfw\">#lifemantra</a></p>&mdash; Kamal Kalra (@kamalkalra84) <a href=\"https://twitter.com/kamalkalra84/status/782408037113982976?ref_src=twsrc%5Etfw\">October 2, 2016</a></blockquote> <script async src=\"https://platform.twitter.com/widgets.js\" charset=\"utf-8\"></script>', NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, '2022-08-03 16:05:24', NULL, '2022-08-03 16:05:24', NULL),
(28, 'blog', 'This is title', 'This is Subtite', 'lorem ipsum testdemo testsfgafga\r\nsdfgs', NULL, NULL, '[\"art\"]', '[\"entertainment\",\"art\",\"hobbies\"]', 'Active', NULL, NULL, NULL, '2022-08-09 16:14:12', NULL, '2022-08-09 16:14:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replys`
--

CREATE TABLE `replys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `replys` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `sequence` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `status`, `sequence`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Intro', 'active', 1, '2022-07-08 10:50:58', NULL, '2022-07-08 10:50:58', NULL),
(23, 'Biography', 'active', 2, '2022-07-12 13:03:02', NULL, '2022-07-12 13:03:02', NULL),
(24, 'My Book', 'active', 3, '2022-07-12 13:26:18', NULL, '2022-07-12 13:26:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section_items`
--

CREATE TABLE `section_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(200) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `section_item_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_item_value` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `sequence` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_items`
--

INSERT INTO `section_items` (`id`, `user_id`, `section_id`, `section_item_name`, `section_item_value`, `status`, `sequence`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(5, 2, 2, 'Profile Image', '1657288649.png', 'active', NULL, '2022-07-08 13:57:29', NULL, '2022-07-08 13:57:29', NULL),
(6, 2, 2, 'Signature', '1657288669.png', 'active', NULL, '2022-07-08 13:57:49', NULL, '2022-07-08 13:57:49', NULL),
(11, 2, 2, 'Greeting', 'Hello, My name is', 'active', NULL, '2022-07-11 13:04:54', NULL, '2022-08-19 18:26:29', NULL),
(12, 2, 2, 'Degree', 'An Engineer by Degree, an Executive by Profession and an Author by Passion. This data is going to be changed', 'active', NULL, '2022-07-11 13:05:48', NULL, '2022-08-02 12:33:27', NULL),
(13, 2, 23, 'Title', 'Biography', 'active', 1, '2022-07-12 13:03:56', NULL, '2022-07-12 13:03:56', NULL),
(14, 2, 23, 'Description', 'I live in Faridabad, with my beautiful wife and two wonderful kids. I proudly call myself an “Intrapreneur”, what does it mean? Well, it means, that I have been an on the job Entrepreneur for last 15 years. I love the process of making processes', 'active', 2, '2022-07-12 13:03:56', NULL, '2022-07-12 13:03:56', NULL),
(15, 2, 23, 'Read More Link', '#', 'active', 3, '2022-07-12 13:03:56', NULL, '2022-07-12 13:03:56', NULL),
(16, 2, 24, 'Section Title', 'My Book', 'active', 1, '2022-07-12 13:03:56', NULL, '2022-07-12 13:03:56', NULL),
(17, 2, 24, 'Section Sub Title', 'Leap Ahead', 'active', 2, '2022-07-12 13:03:56', NULL, '2022-07-12 13:03:56', NULL),
(18, 2, 24, 'Section Description', 'A framework in Operational Excellence', 'active', 3, '2022-07-12 13:03:56', NULL, '2022-07-12 13:03:56', NULL),
(19, 2, 24, 'Title', 'Summary', 'active', 5, '2022-07-12 13:03:56', NULL, '2022-07-12 13:03:56', NULL),
(20, 2, 24, 'Description', 'Timeless principles to build excellence in business operations. You will learn ideas and techniques to not only improve your business but also to help you transform your life. Fragments of this framework can be seen in the lives of every successful human being, in religions and even in literature throughout the centuries.', 'active', 6, '2022-07-12 13:03:56', NULL, '2022-07-12 13:03:56', NULL),
(21, 2, 24, 'Image', '1657614230.png', 'active', NULL, '2022-07-12 08:23:50', NULL, '2022-07-12 08:23:50', NULL),
(22, 2, 24, 'Buy Now Link', '#', 'active', 7, '2022-07-12 08:23:50', NULL, '2022-07-12 08:23:50', NULL),
(23, 2, 2, 'Twitter_Link', 'http://localhost:9001/twitter', 'active', NULL, '2022-08-24 12:07:22', NULL, '2022-08-02 12:26:09', NULL),
(24, 2, 2, 'Facebook_Link', 'http://localhost:9001/faceboook', 'active', NULL, '2022-08-24 12:07:22', NULL, '2022-08-02 12:26:14', NULL),
(25, 2, 2, 'Linkdin_Link', 'http://localhost:9001/linkdin', 'active', NULL, '2022-08-24 12:07:22', NULL, '2022-08-02 12:26:18', NULL),
(26, 2, 2, 'Youtube_Link', 'http://localhost:9001/youtube', 'active', NULL, '2022-08-24 12:07:22', NULL, '2022-08-02 12:26:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`) VALUES
(1, 'Akhil', 'akhilraj8981139540@gmail.com', 'visitor', NULL, '$2y$10$3kE8lAsiTSdkUtm0VsDK0Oq5sGFc3i6Ff36MvckiofkRSVAeFzgNu', NULL, '2022-07-04 02:41:36', '2022-07-04 02:41:36', NULL),
(2, 'Kamal K', 'kamal@gmail.com', 'owner', NULL, '$2y$10$3kE8lAsiTSdkUtm0VsDK0Oq5sGFc3i6Ff36MvckiofkRSVAeFzgNu', NULL, '2022-07-19 17:12:15', '2022-07-19 17:12:15', NULL),
(3, 'Shakil Ahmad', 'shakilbluehorse@gmail.com', 'owner', NULL, '$2y$10$himOQ5qOciaqnckUY/8pJ.JDabMsPStm47X0cbe3p3gkRYVWHGXje', NULL, '2022-07-28 05:54:24', '2022-07-28 05:54:24', '116560865689091275133');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagebuilder_pages`
--
ALTER TABLE `pagebuilder_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagebuilder_page_translations`
--
ALTER TABLE `pagebuilder_page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pagebuilder_page_translations_page_id_locale_unique` (`page_id`,`locale`);

--
-- Indexes for table `pagebuilder_settings`
--
ALTER TABLE `pagebuilder_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pagebuilder_settings_setting_unique` (`setting`);

--
-- Indexes for table `pagebuilder_uploads`
--
ALTER TABLE `pagebuilder_uploads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pagebuilder_uploads_public_id_unique` (`public_id`),
  ADD UNIQUE KEY `pagebuilder_uploads_server_file_unique` (`server_file`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_images_post_id_foreign` (`post_id`);

--
-- Indexes for table `replys`
--
ALTER TABLE `replys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replys_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_items`
--
ALTER TABLE `section_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pagebuilder_pages`
--
ALTER TABLE `pagebuilder_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagebuilder_page_translations`
--
ALTER TABLE `pagebuilder_page_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagebuilder_settings`
--
ALTER TABLE `pagebuilder_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagebuilder_uploads`
--
ALTER TABLE `pagebuilder_uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `replys`
--
ALTER TABLE `replys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `section_items`
--
ALTER TABLE `section_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pagebuilder_page_translations`
--
ALTER TABLE `pagebuilder_page_translations`
  ADD CONSTRAINT `pagebuilder_page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pagebuilder_pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `post_images_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replys`
--
ALTER TABLE `replys`
  ADD CONSTRAINT `replys_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
