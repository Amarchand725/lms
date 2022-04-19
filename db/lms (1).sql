-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 05:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `created_by`, `title`, `announcement`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 15, 'Extra classes are going to start', 'It is inform to all that extra classes are going to start on 20 april 2022 wednesday. \r\nRegards: LMS.', 1, NULL, '2022-04-16 10:23:28', '2022-04-16 10:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_classes`
--

CREATE TABLE `assigned_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `study_class_id` bigint(20) NOT NULL,
  `notify_id` bigint(20) NOT NULL COMMENT 'assignment or announcement id',
  `notify_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'type of entry e.g assignment or announcement data',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_classes`
--

INSERT INTO `assigned_classes` (`id`, `study_class_id`, `notify_id`, `notify_type`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'announcement', 1, '2022-04-16 10:23:28', '2022-04-16 10:23:28'),
(3, 2, 2, 'assignment', 1, '2022-04-16 10:29:21', '2022-04-16 10:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `created_by`, `name`, `description`, `file`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 15, 'Lacey Moses', 'Sint neque magna del', '16-04-2022-152921.jpg', 1, NULL, '2022-04-16 10:29:21', '2022-04-16 10:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `assign_classes`
--

CREATE TABLE `assign_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'teacher_id',
  `study_class_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `school_year_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_classes`
--

INSERT INTO `assign_classes` (`id`, `user_id`, `study_class_id`, `subject_id`, `school_year_id`, `created_at`, `updated_at`) VALUES
(1, 15, 2, 2, 2, '2022-04-15 02:43:47', '2022-04-15 02:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `content`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Doloremque dolor exe', 'Architecto consequun', 1, NULL, '2022-04-13 02:17:02', '2022-04-13 02:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_in_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `person_in_charge`, `department_name`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Dr. Antonio Deraja', 'College of Industrial Technology', 'College of Industrial Technology', 1, NULL, '2022-04-11 06:41:21', '2022-04-11 06:41:21');

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
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `user_id`, `subject`, `url`, `method`, `ip`, `agent`, `created_at`, `updated_at`) VALUES
(1, 1, 'Role Added', 'http://localhost/lms/role', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-13 03:56:36', '2022-04-13 03:56:36'),
(2, 1, 'School Year Added', 'http://localhost/lms/school_year', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-13 04:25:58', '2022-04-13 04:25:58'),
(3, 1, 'School Year updated', 'http://localhost/lms/school_year/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-13 04:42:39', '2022-04-13 04:42:39'),
(4, 1, 'School Year Deleted', 'http://localhost/lms/school_year/1', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-13 04:43:56', '2022-04-13 04:43:56'),
(5, 1, 'School Year Added', 'http://localhost/lms/school_year', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-13 04:44:24', '2022-04-13 04:44:24'),
(6, 15, 'Asigned class removed', 'http://localhost/lms/assigned_class/1', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 02:01:57', '2022-04-15 02:01:57'),
(7, 15, 'Asigned class removed', 'http://localhost/lms/assigned_class/2', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 02:03:20', '2022-04-15 02:03:20'),
(8, 15, 'Asigned class removed', 'http://localhost/lms/assigned_class/3', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 02:04:11', '2022-04-15 02:04:11'),
(9, 15, 'Asigned class removed', 'http://localhost/lms/assigned_class/4', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 02:19:36', '2022-04-15 02:19:36'),
(10, 15, 'Asigned class removed', 'http://localhost/lms/assigned_class/8', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 02:22:58', '2022-04-15 02:22:58'),
(11, 15, 'Asigned class removed', 'http://localhost/lms/assigned_class/6', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 02:23:01', '2022-04-15 02:23:01'),
(12, 15, 'Asigned class removed', 'http://localhost/lms/assigned_class/7', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 02:23:12', '2022-04-15 02:23:12'),
(13, 15, 'Asigned class removed', 'http://localhost/lms/assigned_class/5', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 02:23:37', '2022-04-15 02:23:37'),
(14, 15, 'Material Added', 'http://localhost/lms/material', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 03:33:56', '2022-04-15 03:33:56'),
(15, 15, 'Announcement Added', 'http://localhost/lms/announcement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 05:15:13', '2022-04-15 05:15:13'),
(16, 15, 'Announcement updated', 'http://localhost/lms/announcement/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 05:41:21', '2022-04-15 05:41:21'),
(17, 15, 'Announcement updated', 'http://localhost/lms/announcement/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 05:53:31', '2022-04-15 05:53:31'),
(18, 15, 'Announcement Deleted', 'http://localhost/lms/announcement/1', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 05:58:10', '2022-04-15 05:58:10'),
(19, 15, 'Announcement Added', 'http://localhost/lms/announcement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-15 05:58:19', '2022-04-15 05:58:19'),
(20, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 00:47:14', '2022-04-16 00:47:14'),
(21, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 02:28:02', '2022-04-16 02:28:02'),
(22, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 02:29:28', '2022-04-16 02:29:28'),
(23, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 02:32:55', '2022-04-16 02:32:55'),
(24, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 02:37:09', '2022-04-16 02:37:09'),
(25, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 04:08:46', '2022-04-16 04:08:46'),
(26, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 04:10:12', '2022-04-16 04:10:12'),
(27, 15, 'Assignment Added', 'http://localhost/lms/assignment/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 05:41:31', '2022-04-16 05:41:31'),
(28, 15, 'Assignment Updated', 'http://localhost/lms/assignment/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 05:49:30', '2022-04-16 05:49:30'),
(29, 15, 'Assignment Updated', 'http://localhost/lms/assignment/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 05:54:02', '2022-04-16 05:54:02'),
(30, 15, 'Assignment Updated', 'http://localhost/lms/assignment/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 05:54:45', '2022-04-16 05:54:45'),
(31, 15, 'Assignment Deleted', 'http://localhost/lms/assignment/1', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 05:57:40', '2022-04-16 05:57:40'),
(32, 15, 'Assignment Deleted', 'http://localhost/lms/assignment/1', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 06:01:55', '2022-04-16 06:01:55'),
(33, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 06:02:42', '2022-04-16 06:02:42'),
(34, 15, 'Announcement Added', 'http://localhost/lms/announcement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 08:26:22', '2022-04-16 08:26:22'),
(35, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 09:36:37', '2022-04-16 09:36:37'),
(36, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 09:38:03', '2022-04-16 09:38:03'),
(37, 15, 'Announcement Added', 'http://localhost/lms/announcement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 09:42:28', '2022-04-16 09:42:28'),
(38, 15, 'Announcement Updated', 'http://localhost/lms/announcement/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:04:46', '2022-04-16 10:04:46'),
(39, 15, 'Announcement Updated', 'http://localhost/lms/announcement/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:05:48', '2022-04-16 10:05:48'),
(40, 15, 'Announcement Deleted', 'http://localhost/lms/announcement/1', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:07:22', '2022-04-16 10:07:22'),
(41, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:09:55', '2022-04-16 10:09:55'),
(42, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:13:43', '2022-04-16 10:13:43'),
(43, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:17:42', '2022-04-16 10:17:42'),
(44, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:21:13', '2022-04-16 10:21:13'),
(45, 15, 'Announcement Added', 'http://localhost/lms/announcement', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:23:28', '2022-04-16 10:23:28'),
(46, 15, 'Assignment Deleted', 'http://localhost/lms/assignment/1', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:28:35', '2022-04-16 10:28:35'),
(47, 15, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 10:29:21', '2022-04-16 10:29:21'),
(48, 15, 'Quiz Added', 'http://localhost/lms/quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 14:48:17', '2022-04-16 14:48:17'),
(49, 15, 'Quiz updated', 'http://localhost/lms/quiz/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 14:55:25', '2022-04-16 14:55:25'),
(50, 15, 'Quiz updated', 'http://localhost/lms/quiz/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 14:55:37', '2022-04-16 14:55:37'),
(51, 15, 'Quiz Deleted', 'http://localhost/lms/quiz/1', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 14:57:10', '2022-04-16 14:57:10'),
(52, 15, 'Quiz Added', 'http://localhost/lms/quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 14:57:27', '2022-04-16 14:57:27'),
(53, 15, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 16:22:08', '2022-04-16 16:22:08'),
(54, 15, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 16:28:26', '2022-04-16 16:28:26'),
(55, 15, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 16:29:15', '2022-04-16 16:29:15'),
(56, 15, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 16:30:02', '2022-04-16 16:30:02'),
(57, 15, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 16:30:29', '2022-04-16 16:30:29'),
(58, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:07:53', '2022-04-16 17:07:53'),
(59, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:08:20', '2022-04-16 17:08:20'),
(60, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:09:20', '2022-04-16 17:09:20'),
(61, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:10:05', '2022-04-16 17:10:05'),
(62, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:10:28', '2022-04-16 17:10:28'),
(63, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:11:54', '2022-04-16 17:11:54'),
(64, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:13:22', '2022-04-16 17:13:22'),
(65, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:14:37', '2022-04-16 17:14:37'),
(66, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:19:34', '2022-04-16 17:19:34'),
(67, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:20:01', '2022-04-16 17:20:01'),
(68, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:21:01', '2022-04-16 17:21:01'),
(69, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:21:22', '2022-04-16 17:21:22'),
(70, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:26:46', '2022-04-16 17:26:46'),
(71, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:27:08', '2022-04-16 17:27:08'),
(72, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:27:27', '2022-04-16 17:27:27'),
(73, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:27:56', '2022-04-16 17:27:56'),
(74, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:28:26', '2022-04-16 17:28:26'),
(75, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:30:16', '2022-04-16 17:30:16'),
(76, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:30:50', '2022-04-16 17:30:50'),
(77, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:31:12', '2022-04-16 17:31:12'),
(78, 15, 'Question Updated', 'http://localhost/lms/question/2', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:31:42', '2022-04-16 17:31:42'),
(79, 15, 'Question Deleted', 'http://localhost/lms/question/2', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:33:48', '2022-04-16 17:33:48'),
(80, 15, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:43:45', '2022-04-16 17:43:45'),
(81, 15, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:45:06', '2022-04-16 17:45:06'),
(82, 15, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 17:46:43', '2022-04-16 17:46:43'),
(83, 15, 'Class quiz Added', 'http://localhost/lms/study_class_quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 18:46:38', '2022-04-16 18:46:38'),
(84, 15, 'Class quiz Added', 'http://localhost/lms/study_class_quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 18:48:29', '2022-04-16 18:48:29'),
(85, 15, 'Class quiz Added', 'http://localhost/lms/study_class_quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 18:50:16', '2022-04-16 18:50:16'),
(86, 15, 'Class quiz Added', 'http://localhost/lms/study_class_quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 18:51:58', '2022-04-16 18:51:58'),
(87, 15, 'Class quiz Added', 'http://localhost/lms/study_class_quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 18:52:53', '2022-04-16 18:52:53'),
(88, 15, 'Class quiz Added', 'http://localhost/lms/study_class_quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-16 19:00:52', '2022-04-16 19:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `study_class_id` bigint(20) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `created_by`, `study_class_id`, `file_name`, `description`, `file`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'Danielle Daniel', 'Consequatur Nemo fu', '12-04-2022-120155.jpg', 1, NULL, '2022-04-12 07:01:55', '2022-04-12 07:01:55'),
(3, 15, 2, 'Study Documentation', 'lorem ipsum', '15-04-2022-083356.pdf', 1, NULL, '2022-04-15 03:33:56', '2022-04-15 03:33:56');

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
(6, '2022_04_07_115931_create_permission_tables', 1),
(8, '2022_04_07_113307_create_semesters_table', 2),
(9, '2022_04_08_111805_create_teachers_table', 3),
(12, '2022_04_08_115148_create_study_classes_table', 5),
(16, '2022_04_11_081123_create_contents_table', 7),
(20, '2022_04_11_072809_create_subjects_table', 11),
(21, '2022_04_11_084303_create_departments_table', 12),
(24, '2022_04_08_114413_create_students_table', 13),
(26, '2022_04_11_080157_create_materials_table', 14),
(28, '2022_04_13_072214_create_user_logs_table', 16),
(29, '2022_04_11_081910_create_log_activity_table', 17),
(30, '2022_04_13_091201_create_school_years_table', 18),
(31, '2022_04_14_085255_create_assign_classes_table', 19),
(36, '2022_04_11_080307_create_assignments_table', 22),
(41, '2022_04_16_080803_create_notifications_table', 24),
(42, '2022_04_16_081542_create_read_notifications_table', 25),
(44, '2022_04_15_092324_create_announcements_table', 26),
(45, '2022_04_16_052816_create_assigned_classes_table', 27),
(46, '2022_04_16_153955_create_question_types_table', 28),
(47, '2022_04_16_184012_create_questions_table', 29),
(49, '2022_04_16_184544_create_student_class_quizzes_table', 30),
(50, '2022_04_16_191130_create_quizzes_table', 31),
(52, '2022_04_16_205601_create_options_table', 32),
(55, '2022_04_16_230237_create_study_class_quizzes_table', 33);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `notify_id` bigint(20) NOT NULL COMMENT 'assignment_id, announcement_id etc',
  `notify_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'notification from e.g assignment, announcement etc.',
  `notification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `notify_id`, `notify_type`, `notification`, `created_at`, `updated_at`) VALUES
(2, 15, 2, 'announcement', 'An announcement added new', '2022-04-16 10:23:28', '2022-04-16 10:23:28'),
(3, 15, 2, 'assignment', 'Assignment added new', '2022-04-16 10:29:21', '2022-04-16 10:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option`, `created_at`, `updated_at`) VALUES
(1, 1, 'Recog screen', '2022-04-16 17:43:45', '2022-04-16 17:43:45'),
(2, 1, 'Point Screen', '2022-04-16 17:43:45', '2022-04-16 17:43:45'),
(3, 1, 'Android Screen', '2022-04-16 17:43:45', '2022-04-16 17:43:45'),
(4, 2, 'UVD', '2022-04-16 17:45:06', '2022-04-16 17:45:06'),
(5, 2, 'VDUD', '2022-04-16 17:45:06', '2022-04-16 17:45:06'),
(6, 2, 'CCTV', '2022-04-16 17:45:06', '2022-04-16 17:45:06'),
(7, 3, 'MB>GB>TB>KB', '2022-04-16 17:46:43', '2022-04-16 17:46:43'),
(8, 3, 'TB>GB>MB>KB', '2022-04-16 17:46:43', '2022-04-16 17:46:43'),
(9, 3, 'GB>MB>KB>TB', '2022-04-16 17:46:43', '2022-04-16 17:46:43');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `permission`, `created_at`, `updated_at`) VALUES
(5, 'role-list', 'web', 'list', '2022-04-13 06:06:12', '2022-04-13 06:06:12'),
(6, 'role-create', 'web', 'create', '2022-04-13 06:06:12', '2022-04-13 06:06:12'),
(7, 'role-edit', 'web', 'edit', '2022-04-13 06:06:12', '2022-04-13 06:06:12'),
(8, 'role-delete', 'web', 'delete', '2022-04-13 06:06:12', '2022-04-13 06:06:12'),
(9, 'user-list', 'web', 'list', '2022-04-13 06:06:34', '2022-04-13 06:06:34'),
(10, 'user-create', 'web', 'create', '2022-04-13 06:06:34', '2022-04-13 06:06:34'),
(11, 'user-edit', 'web', 'edit', '2022-04-13 06:06:34', '2022-04-13 06:06:34'),
(12, 'user-delete', 'web', 'delete', '2022-04-13 06:06:34', '2022-04-13 06:06:34'),
(13, 'permission-list', 'web', 'list', '2022-04-13 06:07:13', '2022-04-13 06:07:13'),
(14, 'permission-create', 'web', 'create', '2022-04-13 06:07:13', '2022-04-13 06:07:13'),
(15, 'permission-edit', 'web', 'edit', '2022-04-13 06:07:13', '2022-04-13 06:07:13'),
(16, 'permission-delete', 'web', 'delete', '2022-04-13 06:07:13', '2022-04-13 06:07:13'),
(17, 'student-list', 'web', 'list', '2022-04-13 06:13:39', '2022-04-13 06:13:39'),
(18, 'student-create', 'web', 'create', '2022-04-13 06:13:39', '2022-04-13 06:13:39'),
(19, 'student-edit', 'web', 'edit', '2022-04-13 06:13:39', '2022-04-13 06:13:39'),
(20, 'student-delete', 'web', 'delete', '2022-04-13 06:13:39', '2022-04-13 06:13:39'),
(21, 'semester-list', 'web', 'list', '2022-04-13 06:13:51', '2022-04-13 06:13:51'),
(22, 'semester-create', 'web', 'create', '2022-04-13 06:13:51', '2022-04-13 06:13:51'),
(23, 'semester-edit', 'web', 'edit', '2022-04-13 06:13:51', '2022-04-13 06:13:51'),
(24, 'semester-delete', 'web', 'delete', '2022-04-13 06:13:51', '2022-04-13 06:13:51'),
(25, 'subject-list', 'web', 'list', '2022-04-13 06:14:02', '2022-04-13 06:14:02'),
(26, 'subject-create', 'web', 'create', '2022-04-13 06:14:02', '2022-04-13 06:14:02'),
(27, 'subject-edit', 'web', 'edit', '2022-04-13 06:14:02', '2022-04-13 06:14:02'),
(28, 'subject-delete', 'web', 'delete', '2022-04-13 06:14:02', '2022-04-13 06:14:02'),
(29, 'study-classes-list', 'web', 'list', '2022-04-13 06:14:15', '2022-04-13 06:14:15'),
(30, 'study-classes-create', 'web', 'create', '2022-04-13 06:14:15', '2022-04-13 06:14:15'),
(31, 'study-classes-edit', 'web', 'edit', '2022-04-13 06:14:15', '2022-04-13 06:14:15'),
(32, 'study-classes-delete', 'web', 'delete', '2022-04-13 06:14:15', '2022-04-13 06:14:15'),
(33, 'department-list', 'web', 'list', '2022-04-13 06:14:28', '2022-04-13 06:14:28'),
(34, 'department-create', 'web', 'create', '2022-04-13 06:14:28', '2022-04-13 06:14:28'),
(35, 'department-edit', 'web', 'edit', '2022-04-13 06:14:28', '2022-04-13 06:14:28'),
(36, 'department-delete', 'web', 'delete', '2022-04-13 06:14:28', '2022-04-13 06:14:28'),
(37, 'material-list', 'web', 'list', '2022-04-13 06:14:36', '2022-04-13 06:14:36'),
(38, 'material-create', 'web', 'create', '2022-04-13 06:14:36', '2022-04-13 06:14:36'),
(39, 'material-edit', 'web', 'edit', '2022-04-13 06:14:36', '2022-04-13 06:14:36'),
(40, 'material-delete', 'web', 'delete', '2022-04-13 06:14:36', '2022-04-13 06:14:36'),
(41, 'assignments-list', 'web', 'list', '2022-04-13 06:14:48', '2022-04-13 06:14:48'),
(42, 'assignments-create', 'web', 'create', '2022-04-13 06:14:48', '2022-04-13 06:14:48'),
(43, 'assignments-edit', 'web', 'edit', '2022-04-13 06:14:48', '2022-04-13 06:14:48'),
(44, 'assignments-delete', 'web', 'delete', '2022-04-13 06:14:48', '2022-04-13 06:14:48'),
(45, 'content-list', 'web', 'list', '2022-04-13 06:14:59', '2022-04-13 06:14:59'),
(46, 'content-create', 'web', 'create', '2022-04-13 06:14:59', '2022-04-13 06:14:59'),
(47, 'content-edit', 'web', 'edit', '2022-04-13 06:14:59', '2022-04-13 06:14:59'),
(48, 'content-delete', 'web', 'delete', '2022-04-13 06:14:59', '2022-04-13 06:14:59'),
(49, 'user-log-list', 'web', 'list', '2022-04-13 06:15:14', '2022-04-13 06:15:14'),
(50, 'user-log-delete', 'web', 'delete', '2022-04-13 06:15:31', '2022-04-13 06:15:31'),
(51, 'activity-log-list', 'web', 'list', '2022-04-13 06:15:48', '2022-04-13 06:15:48'),
(52, 'activity-log-delete', 'web', 'delete', '2022-04-13 06:15:48', '2022-04-13 06:15:48'),
(53, 'school-years-list', 'web', 'list', '2022-04-13 06:16:01', '2022-04-13 06:16:01'),
(54, 'school-years-create', 'web', 'create', '2022-04-13 06:16:01', '2022-04-13 06:16:01'),
(55, 'school-years-edit', 'web', 'edit', '2022-04-13 06:16:01', '2022-04-13 06:16:01'),
(56, 'school-years-delete', 'web', 'delete', '2022-04-13 06:16:01', '2022-04-13 06:16:01');

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_type_id` bigint(20) NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_type_id`, `quiz_id`, `question`, `answer`, `points`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Name of the screen that recognizes touch input is', 'Touch Screen', 0, 1, NULL, '2022-04-16 17:43:45', '2022-04-16 17:43:45'),
(2, 2, 2, 'Computer Moniter is also known as', 'DVUB', 0, 1, NULL, '2022-04-16 17:45:06', '2022-04-16 17:45:06'),
(3, 2, 2, 'Arrange in ascending order the units of memory TB, KB, GB, MB', 'TB>GB>MB>KB', 0, 1, NULL, '2022-04-16 17:46:43', '2022-04-16 17:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE `question_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_types`
--

INSERT INTO `question_types` (`id`, `type`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'True or False', 1, NULL, '2022-04-16 22:35:02', '2022-04-16 22:35:02'),
(2, 'Multiple Choice', 1, NULL, '2022-04-16 22:35:02', '2022-04-16 22:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Monthly Test', 'Lorem ipsum', 1, NULL, '2022-04-16 14:57:27', '2022-04-16 14:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `read_notifications`
--

CREATE TABLE `read_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'student id',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unread, 1=read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `read_notifications`
--

INSERT INTO `read_notifications` (`id`, `notification_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 12, 0, '2022-04-16 10:23:28', '2022-04-16 10:23:28'),
(4, 2, 14, 0, '2022-04-16 10:23:28', '2022-04-16 10:23:28'),
(5, 3, 12, 0, '2022-04-16 10:29:21', '2022-04-16 10:29:21'),
(6, 3, 14, 0, '2022-04-16 10:29:21', '2022-04-16 10:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'Admin role has all permissions', '2022-04-08 01:19:49', '2022-04-13 06:46:28'),
(2, 'Student', 'web', 'This is student role', '2022-04-08 01:37:17', '2022-04-08 06:19:32'),
(3, 'Teacher', 'web', 'This is teacher role.', '2022-04-08 06:18:34', '2022-04-08 06:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_years`
--

INSERT INTO `school_years` (`id`, `created_by`, `year`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, '2022-2024', 'Lorem ipusm', 1, NULL, '2022-04-13 04:44:24', '2022-04-13 04:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Raymond Donaldson', 'Maiores qui voluptat', 1, '2022-04-08 11:16:48', '2022-04-08 05:22:21', '2022-04-08 06:16:48'),
(2, 'First Semester', NULL, 1, NULL, '2022-04-08 06:17:00', '2022-04-08 06:17:00'),
(3, 'Second Semester', NULL, 1, NULL, '2022-04-08 06:17:10', '2022-04-08 06:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `batch_id` bigint(20) NOT NULL,
  `study_class_id` bigint(20) DEFAULT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `batch_id`, `study_class_id`, `student_id`, `first_name`, `last_name`, `location`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 12, 2, 2, '3445666099', 'Mariko', 'Leblanc', 'Et quaerat ab non do', 1, NULL, '2022-04-12 04:44:50', '2022-04-12 04:44:50'),
(2, 14, 2, 2, NULL, 'Student', NULL, NULL, 1, NULL, '2022-04-14 03:19:48', '2022-04-14 03:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quizzes`
--

CREATE TABLE `student_class_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quize_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `quiz_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_classes`
--

CREATE TABLE `study_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_classes`
--

INSERT INTO `study_classes` (`id`, `name`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'BSIS-3A', 'BSIS-3A', 1, NULL, '2022-04-11 06:07:03', '2022-04-11 06:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `study_class_quizzes`
--

CREATE TABLE `study_class_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `study_class_id` bigint(20) NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `quiz_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_class_quizzes`
--

INSERT INTO `study_class_quizzes` (`id`, `study_class_id`, `quiz_id`, `quiz_time`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '10', '2022-04-16 19:00:52', '2022-04-16 19:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `semester_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_request` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `category_id`, `semester_id`, `title`, `code`, `unit`, `description`, `pre_request`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, NULL, 2, 'Senior Systems Project 1', 'IS 411A', 2, 'Senior Systems Project 1', NULL, 1, NULL, '2022-04-11 05:32:11', '2022-04-11 05:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_status` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'active or deactive',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `department_id`, `first_name`, `last_name`, `location`, `about`, `teacher_status`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 13, 2, 'Elaine', 'Whitley', 'Possimus ut vero mi', 'Dolor perferendis an', NULL, 1, NULL, '2022-04-12 07:02:27', '2022-04-12 07:02:27'),
(3, 15, NULL, 'Teacher', NULL, NULL, NULL, NULL, 1, NULL, '2022-04-14 03:21:17', '2022-04-14 03:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `picture`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hardik', 'admin@gmail.com', NULL, '$2y$10$1PXD3UpXUTnWAnpIudApeO5H4.4e4p6kQZagSwKEc3vc1hynEsoMy', 'team-3.jpg', NULL, NULL, '2022-04-08 01:19:49', '2022-04-08 01:19:49'),
(12, 'Mariko Et quaerat ab non do', 'muderetaje@mailinator.com', NULL, '$2y$10$gpzTlLtu3Uu7ZPi9Pe9Ruum3FtAg/zRNQ/tcg4OZMYscIiGy2TGL2', NULL, NULL, NULL, '2022-04-12 04:44:50', '2022-04-12 04:44:50'),
(13, 'Elaine Possimus ut vero mi', 'nuhatuvek@mailinator.com', NULL, '$2y$10$bW3/tMGlKKwGaK2XzwQsveUHDi8tD0BNY6gQu0W5Hl9SpV2mk3kga', NULL, NULL, NULL, '2022-04-12 07:02:27', '2022-04-12 07:02:27'),
(14, 'Student', 'student@mail.com', NULL, '$2y$10$6BgXaYwhI7/5XLub6rH3c.HGtTf2aUcdvPF3R66HSlUFV8TeSjaMO', NULL, NULL, NULL, '2022-04-14 03:19:48', '2022-04-14 03:19:48'),
(15, 'Teacher', 'teacher@mail.com', NULL, '$2y$10$zVtkv01A0XH0fU3yChTv2eAEDI.EbgOdQEe4mPWlTP8bpjlflYqZa', NULL, NULL, NULL, '2022-04-14 03:21:17', '2022-04-14 03:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `logged_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logged_out` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `logged_in`, `logged_out`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-04-13 08:20:35', '2022-04-13 08:20:46', '2022-04-13 03:20:35', '2022-04-13 03:20:46'),
(2, 1, '2022-04-13 08:21:07', '2022-04-13 09:50:40', '2022-04-13 03:21:07', '2022-04-13 04:50:40'),
(3, 1, '2022-04-13 10:08:43', NULL, '2022-04-13 05:08:43', '2022-04-13 05:08:43'),
(4, 1, '2022-04-13 11:00:02', NULL, '2022-04-13 06:00:02', '2022-04-13 06:00:02'),
(5, 1, '2022-04-14 06:52:11', '2022-04-14 07:34:59', '2022-04-14 01:52:11', '2022-04-14 02:34:59'),
(6, 1, '2022-04-14 07:35:15', '2022-04-14 07:35:34', '2022-04-14 02:35:15', '2022-04-14 02:35:34'),
(7, 1, '2022-04-14 07:56:34', '2022-04-14 07:57:29', '2022-04-14 02:56:34', '2022-04-14 02:57:29'),
(8, 14, '2022-04-14 08:19:48', '2022-04-14 08:20:17', '2022-04-14 03:19:48', '2022-04-14 03:20:17'),
(9, 15, '2022-04-14 08:21:17', '2022-04-14 08:21:27', '2022-04-14 03:21:17', '2022-04-14 03:21:27'),
(10, 15, '2022-04-14 08:22:29', '2022-04-14 09:08:54', '2022-04-14 03:22:29', '2022-04-14 04:08:54'),
(11, 15, '2022-04-14 09:09:04', '2022-04-14 09:11:33', '2022-04-14 04:09:04', '2022-04-14 04:11:33'),
(12, 15, '2022-04-14 09:11:40', '2022-04-14 12:06:11', '2022-04-14 04:11:40', '2022-04-14 07:06:11'),
(13, 1, '2022-04-14 12:06:25', '2022-04-14 12:06:34', '2022-04-14 07:06:25', '2022-04-14 07:06:34'),
(14, 15, '2022-04-14 12:06:39', '2022-04-14 12:07:02', '2022-04-14 07:06:39', '2022-04-14 07:07:02'),
(15, 1, '2022-04-14 12:07:25', '2022-04-14 12:07:51', '2022-04-14 07:07:25', '2022-04-14 07:07:51'),
(16, 15, '2022-04-14 12:08:06', '2022-04-14 12:23:05', '2022-04-14 07:08:06', '2022-04-14 07:23:05'),
(17, 1, '2022-04-14 12:23:19', '2022-04-14 12:23:30', '2022-04-14 07:23:19', '2022-04-14 07:23:30'),
(18, 15, '2022-04-14 12:23:57', NULL, '2022-04-14 07:23:57', '2022-04-14 07:23:57'),
(19, 1, '2022-04-15 05:47:03', '2022-04-15 05:47:07', '2022-04-15 00:47:03', '2022-04-15 00:47:07'),
(20, 15, '2022-04-15 05:47:26', '2022-04-15 07:11:59', '2022-04-15 00:47:26', '2022-04-15 02:11:59'),
(21, 15, '2022-04-15 07:18:49', '2022-04-15 07:49:10', '2022-04-15 02:18:49', '2022-04-15 02:49:10'),
(22, 15, '2022-04-15 07:49:16', NULL, '2022-04-15 02:49:16', '2022-04-15 02:49:16'),
(23, 15, '2022-04-16 05:07:42', '2022-04-16 06:05:08', '2022-04-16 00:07:42', '2022-04-16 01:05:08'),
(24, 1, '2022-04-16 06:05:20', '2022-04-16 06:55:32', '2022-04-16 01:05:20', '2022-04-16 01:55:32'),
(25, 15, '2022-04-16 06:55:53', NULL, '2022-04-16 01:55:53', '2022-04-16 01:55:53'),
(26, 15, '2022-04-16 18:18:35', NULL, '2022-04-16 13:18:35', '2022-04-16 13:18:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_classes`
--
ALTER TABLE `assigned_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_classes`
--
ALTER TABLE `assign_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `read_notifications`
--
ALTER TABLE `read_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class_quizzes`
--
ALTER TABLE `student_class_quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_classes`
--
ALTER TABLE `study_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_class_quizzes`
--
ALTER TABLE `study_class_quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assigned_classes`
--
ALTER TABLE `assigned_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assign_classes`
--
ALTER TABLE `assign_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question_types`
--
ALTER TABLE `question_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `read_notifications`
--
ALTER TABLE `read_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_class_quizzes`
--
ALTER TABLE `student_class_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_classes`
--
ALTER TABLE `study_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `study_class_quizzes`
--
ALTER TABLE `study_class_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
