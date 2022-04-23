-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 06:50 PM
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
(1, 1, 1, 'assignment', 1, '2022-04-22 07:01:53', '2022-04-22 07:01:53'),
(2, 2, 1, 'assignment', 1, '2022-04-22 07:01:53', '2022-04-22 07:01:53');

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
(1, 5, 'Jessamine Tillman', 'Quia officia proiden', '22-04-2022-120153.png', 1, NULL, '2022-04-22 07:01:53', '2022-04-22 07:01:53');

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
(1, 5, 1, 1, 1, '2022-04-19 07:41:37', '2022-04-19 07:41:37'),
(2, 5, 2, 2, 1, '2022-04-19 07:41:46', '2022-04-19 07:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `backpacks`
--

CREATE TABLE `backpacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `by_teacher_id` bigint(20) NOT NULL,
  `material_id` bigint(20) NOT NULL,
  `study_class_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_systems`
--

CREATE TABLE `chat_systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `reciever_id` bigint(20) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unread, 1=read',
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_systems`
--

INSERT INTO `chat_systems` (`id`, `sender_id`, `reciever_id`, `is_read`, `message`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 5, 0, 'ttes', NULL, 1, '2022-04-20 04:00:17', '2022-04-20 04:00:17'),
(2, 5, 5, 0, 'ttesd', NULL, 1, '2022-04-20 04:00:26', '2022-04-20 04:00:26'),
(3, 5, 5, 0, 'ttesd', NULL, 1, '2022-04-20 04:00:45', '2022-04-20 04:00:45'),
(4, 5, 5, 0, 'ttesd', NULL, 1, '2022-04-20 04:00:55', '2022-04-20 04:00:55'),
(5, 5, 5, 0, 'ttesd', NULL, 1, '2022-04-20 04:01:05', '2022-04-20 04:01:05'),
(6, 5, 5, 0, 'hi', NULL, 1, '2022-04-20 04:01:28', '2022-04-20 04:01:28'),
(7, 5, 5, 0, 'hi', NULL, 1, '2022-04-20 04:01:42', '2022-04-20 04:01:42'),
(8, 5, 9, 1, 'HID', NULL, 1, '2022-04-20 04:18:08', '2022-04-20 06:49:44'),
(9, 5, 9, 1, 'HID', NULL, 1, '2022-04-20 04:18:10', '2022-04-20 06:49:44'),
(10, 5, 9, 1, 'HID', NULL, 1, '2022-04-20 04:19:09', '2022-04-20 06:49:44'),
(11, 5, 9, 1, 'HID', NULL, 1, '2022-04-20 04:19:23', '2022-04-20 06:49:44'),
(12, 5, 9, 1, 'gxgd', NULL, 1, '2022-04-20 04:20:23', '2022-04-20 06:49:44'),
(13, 5, 5, 0, 'tested', NULL, 1, '2022-04-20 04:23:19', '2022-04-20 04:23:19'),
(14, 5, 5, 0, 'testeddfd', NULL, 1, '2022-04-20 04:23:31', '2022-04-20 04:23:31'),
(15, 5, 5, 0, 'test', NULL, 1, '2022-04-20 04:24:54', '2022-04-20 04:24:54'),
(16, 5, 5, 0, 'sdf', NULL, 1, '2022-04-20 04:25:44', '2022-04-20 04:25:44'),
(17, 5, 5, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, '2022-04-20 05:02:13', '2022-04-20 05:02:13'),
(18, 5, 6, 0, 'hi bro', NULL, 1, '2022-04-20 05:14:32', '2022-04-20 05:14:32'),
(19, 5, 6, 0, 'tested', NULL, 1, '2022-04-20 05:17:12', '2022-04-20 05:17:12'),
(20, 5, 6, 0, 'g', NULL, 1, '2022-04-20 05:24:00', '2022-04-20 05:24:00'),
(21, 5, 14, 0, 'what is your full name?', NULL, 1, '2022-04-20 05:24:15', '2022-04-20 05:24:15'),
(22, 9, 5, 1, 'Hello sir how are you?', NULL, 1, '2022-04-20 05:31:42', '2022-04-20 06:20:41'),
(23, 9, 5, 1, 'hi', NULL, 1, '2022-04-20 05:31:55', '2022-04-20 06:20:41'),
(24, 9, 5, 1, 'ji ji sir', NULL, 1, '2022-04-20 05:32:51', '2022-04-20 06:20:41'),
(25, 1, 1, 0, 'test', NULL, 1, '2022-04-22 08:03:16', '2022-04-22 08:03:16');

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
(1, 'John Smith', 'Department 1', 'Lorem ipsum', 1, NULL, '2022-04-19 07:13:27', '2022-04-19 07:13:27'),
(2, 'Max', 'Department 2', 'max', 1, NULL, '2022-04-19 07:26:03', '2022-04-19 07:26:03'),
(3, 'John Doe', 'Dempartment 3', 'lorem ipsum', 1, NULL, '2022-04-19 07:26:28', '2022-04-19 07:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `starting_date`, `ending_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Test Event', '2022-04-22', '2022-04-26', 0, '2022-04-22 10:24:55', '2022-04-22 10:24:55');

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
(1, 1, 'Department Added', 'http://localhost/lms/department', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:13:27', '2022-04-19 07:13:27'),
(2, 1, 'Role Added', 'http://localhost/lms/role', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:18:31', '2022-04-19 07:18:31'),
(3, 1, 'Study Class Added', 'http://localhost/lms/study_class', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:19:37', '2022-04-19 07:19:37'),
(4, 1, 'Study Class Added', 'http://localhost/lms/study_class', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:19:46', '2022-04-19 07:19:46'),
(5, 1, 'Study Class Added', 'http://localhost/lms/study_class', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:19:54', '2022-04-19 07:19:54'),
(6, 1, 'Study Class Added', 'http://localhost/lms/study_class', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:20:02', '2022-04-19 07:20:02'),
(7, 1, 'Study Class Added', 'http://localhost/lms/study_class', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:20:10', '2022-04-19 07:20:10'),
(8, 1, 'Study Class Added', 'http://localhost/lms/study_class', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:20:17', '2022-04-19 07:20:17'),
(9, 1, 'Semester Added', 'http://localhost/lms/semester', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:20:55', '2022-04-19 07:20:55'),
(10, 1, 'Semester Added', 'http://localhost/lms/semester', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:21:04', '2022-04-19 07:21:04'),
(11, 1, 'Subject Added', 'http://localhost/lms/subject', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:22:16', '2022-04-19 07:22:16'),
(12, 1, 'Subject Added', 'http://localhost/lms/subject', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:22:39', '2022-04-19 07:22:39'),
(13, 1, 'Subject Added', 'http://localhost/lms/subject', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:22:58', '2022-04-19 07:22:58'),
(14, 1, 'Subject Added', 'http://localhost/lms/subject', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:23:17', '2022-04-19 07:23:17'),
(15, 1, 'Subject Added', 'http://localhost/lms/subject', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:23:56', '2022-04-19 07:23:56'),
(16, 1, 'Subject Added', 'http://localhost/lms/subject', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:24:16', '2022-04-19 07:24:16'),
(17, 1, 'Subject Added', 'http://localhost/lms/subject', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:24:37', '2022-04-19 07:24:37'),
(18, 1, 'Subject Added', 'http://localhost/lms/subject', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:24:56', '2022-04-19 07:24:56'),
(19, 1, 'Subject Added', 'http://localhost/lms/subject', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:25:20', '2022-04-19 07:25:20'),
(20, 1, 'Department Added', 'http://localhost/lms/department', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:26:03', '2022-04-19 07:26:03'),
(21, 1, 'Department Added', 'http://localhost/lms/department', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:26:28', '2022-04-19 07:26:28'),
(22, 1, 'Teacher Added', 'http://localhost/lms/teacher', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:31:54', '2022-04-19 07:31:54'),
(23, 1, 'Teacher Added', 'http://localhost/lms/teacher', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:33:09', '2022-04-19 07:33:09'),
(24, 1, 'School Year Added', 'http://localhost/lms/school_year', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:34:56', '2022-04-19 07:34:56'),
(25, 1, 'Student Added', 'http://localhost/lms/student', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:35:45', '2022-04-19 07:35:45'),
(26, 1, 'Student Added', 'http://localhost/lms/student', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:36:01', '2022-04-19 07:36:01'),
(27, 1, 'Student Added', 'http://localhost/lms/student', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:36:15', '2022-04-19 07:36:15'),
(28, 1, 'Student Added', 'http://localhost/lms/student', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:36:28', '2022-04-19 07:36:28'),
(29, 1, 'Student Added', 'http://localhost/lms/student', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:36:59', '2022-04-19 07:36:59'),
(30, 1, 'Student Added', 'http://localhost/lms/student', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:37:09', '2022-04-19 07:37:09'),
(31, 1, 'Student Added', 'http://localhost/lms/student', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:37:32', '2022-04-19 07:37:32'),
(32, 1, 'Student Added', 'http://localhost/lms/student', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:37:47', '2022-04-19 07:37:47'),
(33, 1, 'Student Added', 'http://localhost/lms/student', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:37:59', '2022-04-19 07:37:59'),
(34, 1, 'Student Added', 'http://localhost/lms/student', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.88 Safari/537.36', '2022-04-19 07:38:12', '2022-04-19 07:38:12'),
(35, 5, 'Subject Overview Added', 'http://localhost/lms/subject_overview', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 01:39:20', '2022-04-21 01:39:20'),
(36, 5, 'Subject Overview Added', 'http://localhost/lms/subject_overview', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 01:49:56', '2022-04-21 01:49:56'),
(37, 5, 'Subject Overview Updated', 'http://localhost/lms/subject_overview/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 01:59:39', '2022-04-21 01:59:39'),
(38, 5, 'Subject Overview Updated', 'http://localhost/lms/subject_overview/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 01:59:56', '2022-04-21 01:59:56'),
(39, 5, 'Subject Overview Deleted', 'http://localhost/lms/subject_overview/1', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:00:12', '2022-04-21 02:00:12'),
(40, 5, 'Quiz Added', 'http://localhost/lms/quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:03:33', '2022-04-21 02:03:33'),
(41, 5, 'Quiz Added', 'http://localhost/lms/quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:03:52', '2022-04-21 02:03:52'),
(42, 5, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:44:55', '2022-04-21 02:44:55'),
(43, 5, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:45:39', '2022-04-21 02:45:39'),
(44, 5, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:46:24', '2022-04-21 02:46:24'),
(45, 5, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:47:11', '2022-04-21 02:47:11'),
(46, 5, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:48:00', '2022-04-21 02:48:00'),
(47, 5, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:50:03', '2022-04-21 02:50:03'),
(48, 5, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:51:47', '2022-04-21 02:51:47'),
(49, 5, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:56:00', '2022-04-21 02:56:00'),
(50, 5, 'Question Deleted', 'http://localhost/lms/question/8', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 02:57:17', '2022-04-21 02:57:17'),
(51, 5, 'Question Deleted', 'http://localhost/lms/question/8', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 03:02:45', '2022-04-21 03:02:45'),
(52, 5, 'Question Deleted', 'http://localhost/lms/question/8', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 03:04:50', '2022-04-21 03:04:50'),
(53, 5, 'Question Deleted', 'http://localhost/lms/question/8', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 03:06:16', '2022-04-21 03:06:16'),
(54, 5, 'Class quiz Added', 'http://localhost/lms/study_class_quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 03:06:42', '2022-04-21 03:06:42'),
(55, 5, 'Class quiz Added', 'http://localhost/lms/study_class_quiz', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-21 04:43:44', '2022-04-21 04:43:44'),
(56, 5, 'Question Added', 'http://localhost/lms/question', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 04:10:34', '2022-04-22 04:10:34'),
(57, 5, 'Question Updated', 'http://localhost/lms/question/7', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 04:33:25', '2022-04-22 04:33:25'),
(58, 5, 'Question Updated', 'http://localhost/lms/question/7', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 04:36:01', '2022-04-22 04:36:01'),
(59, 5, 'Question Updated', 'http://localhost/lms/question/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 04:37:26', '2022-04-22 04:37:26'),
(60, 5, 'Question Updated', 'http://localhost/lms/question/6', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 04:40:01', '2022-04-22 04:40:01'),
(61, 5, 'Question Updated', 'http://localhost/lms/question/5', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 04:41:40', '2022-04-22 04:41:40'),
(62, 5, 'Question Updated', 'http://localhost/lms/question/4', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 04:43:38', '2022-04-22 04:43:38'),
(63, 9, 'Quiz Attempt Added', 'http://localhost/lms/quiz_attempt', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 06:20:58', '2022-04-22 06:20:58'),
(64, 9, 'Quiz Attempt Added', 'http://localhost/lms/quiz_attempt', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 06:22:57', '2022-04-22 06:22:57'),
(65, 9, 'Quiz Attempt Added', 'http://localhost/lms/quiz_attempt', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 06:31:03', '2022-04-22 06:31:03'),
(66, 9, 'Quiz Attempt Added', 'http://localhost/lms/quiz_attempt', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 06:33:08', '2022-04-22 06:33:08'),
(67, 5, 'Assignment Added', 'http://localhost/lms/assignment', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 07:01:53', '2022-04-22 07:01:53'),
(68, 1, 'Event Added', 'http://localhost/lms/event', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 10:23:38', '2022-04-22 10:23:38'),
(69, 1, 'Event Added', 'http://localhost/lms/event', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 10:24:55', '2022-04-22 10:24:55'),
(70, 1, 'Event Deleted', 'http://localhost/lms/event/1', 'DELETE', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 10:35:41', '2022-04-22 10:35:41'),
(71, 1, 'SMTP setting Added', 'http://localhost/lms/mail_setting', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 11:16:42', '2022-04-22 11:16:42'),
(72, 1, 'SMTP setting Added', 'http://localhost/lms/mail_setting?1=', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 11:29:07', '2022-04-22 11:29:07'),
(73, 1, 'SMTP setting Added', 'http://localhost/lms/mail_setting?1=', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 11:29:24', '2022-04-22 11:29:24'),
(74, 1, 'SMTP setting Added', 'http://localhost/lms/mail_setting?1=', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 11:29:57', '2022-04-22 11:29:57'),
(75, 1, 'SMTP setting Updated', 'http://localhost/lms/mail_setting/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 11:34:26', '2022-04-22 11:34:26'),
(76, 1, 'SMTP setting Updated', 'http://localhost/lms/mail_setting/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', '2022-04-22 11:35:25', '2022-04-22 11:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_mailer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_port` int(10) UNSIGNED NOT NULL,
  `mail_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_from_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`id`, `mail_mailer`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_from_address`, `mail_from_name`, `created_at`, `updated_at`) VALUES
(1, 'test@mail.com', 'gmail.com', 465, 'Test User', '123@1123', 'test@mail.com', 'mail@from.com', 'Tester', '2022-04-22 11:16:42', '2022-04-22 11:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material_details`
--

CREATE TABLE `material_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) NOT NULL,
  `study_class_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2022_04_07_113307_create_semesters_table', 1),
(6, '2022_04_07_115931_create_permission_tables', 1),
(7, '2022_04_08_111805_create_teachers_table', 1),
(8, '2022_04_08_114413_create_students_table', 1),
(9, '2022_04_08_115148_create_study_classes_table', 1),
(10, '2022_04_11_072809_create_subjects_table', 1),
(11, '2022_04_11_080157_create_materials_table', 1),
(12, '2022_04_11_080307_create_assignments_table', 1),
(13, '2022_04_11_081123_create_contents_table', 1),
(14, '2022_04_11_081910_create_log_activity_table', 1),
(15, '2022_04_11_084303_create_departments_table', 1),
(16, '2022_04_13_072214_create_user_logs_table', 1),
(17, '2022_04_13_091201_create_school_years_table', 1),
(18, '2022_04_14_085255_create_assign_classes_table', 1),
(19, '2022_04_15_092324_create_announcements_table', 1),
(20, '2022_04_16_052816_create_assigned_classes_table', 1),
(21, '2022_04_16_080803_create_notifications_table', 1),
(22, '2022_04_16_081542_create_read_notifications_table', 1),
(23, '2022_04_16_153955_create_question_types_table', 1),
(24, '2022_04_16_184012_create_questions_table', 1),
(26, '2022_04_16_191130_create_quizzes_table', 1),
(27, '2022_04_16_205601_create_options_table', 1),
(28, '2022_04_16_230237_create_study_class_quizzes_table', 1),
(29, '2022_04_18_083608_create_material_details_table', 1),
(31, '2022_04_18_105726_create_share_files_table', 1),
(32, '2022_04_19_081613_create_backpacks_table', 1),
(35, '2022_04_18_085428_create_chat_systems_table', 2),
(37, '2022_04_21_060205_create_subject_overviews_table', 3),
(38, '2022_04_16_184544_create_student_class_quizzes_table', 4),
(41, '2022_04_22_075908_create_quiz_attempt_details_table', 7),
(43, '2022_04_16_184544_create_quiz_attempts_table', 8),
(44, '2022_04_21_093530_create_events_table', 9),
(46, '2022_04_20_064834_create_mail_settings_table', 10);

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
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18);

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
(1, 5, 1, 'assignment', 'Assignment added new', '2022-04-22 07:01:53', '2022-04-22 07:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_answer` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option`, `is_answer`, `created_at`, `updated_at`) VALUES
(23, 7, 'False', 1, '2022-04-22 04:36:01', '2022-04-22 04:36:01'),
(25, 6, '1970s', 1, '2022-04-22 04:40:01', '2022-04-22 04:40:01'),
(26, 6, '1850', 0, '2022-04-22 04:40:01', '2022-04-22 04:40:01'),
(27, 6, '1760', 0, '2022-04-22 04:40:01', '2022-04-22 04:40:01'),
(28, 6, '2020', 0, '2022-04-22 04:40:01', '2022-04-22 04:40:01'),
(29, 5, 'Image file', 0, '2022-04-22 04:41:40', '2022-04-22 04:41:40'),
(30, 5, 'Audio file', 0, '2022-04-22 04:41:40', '2022-04-22 04:41:40'),
(31, 5, 'MS Office document', 0, '2022-04-22 04:41:40', '2022-04-22 04:41:40'),
(32, 5, 'Animation/movie file', 1, '2022-04-22 04:41:40', '2022-04-22 04:41:40'),
(33, 4, '1850s', 0, '2022-04-22 04:43:38', '2022-04-22 04:43:38'),
(34, 4, '1860s', 0, '2022-04-22 04:43:38', '2022-04-22 04:43:38'),
(35, 4, '1870s', 0, '2022-04-22 04:43:38', '2022-04-22 04:43:38'),
(36, 4, '1900s', 1, '2022-04-22 04:43:38', '2022-04-22 04:43:38');

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
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(4, 2, 1, 'In which decade with the first transatlantic radio broadcast occur?', NULL, 0, 1, NULL, '2022-04-21 02:47:11', '2022-04-22 04:43:38'),
(5, 2, 1, '\'.MOV\' extension refers usually to what kind of file?', NULL, 0, 1, NULL, '2022-04-21 02:48:00', '2022-04-22 04:41:40'),
(6, 2, 2, 'In which decade was the SPICE simulator introduced?', NULL, 0, 1, NULL, '2022-04-21 02:50:03', '2022-04-22 04:37:26'),
(7, 1, 2, 'Most modern TV\'s draw power even if turned off. The circuit the power is used Remote control?', NULL, 0, 1, NULL, '2022-04-21 02:51:47', '2022-04-22 04:33:25');

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
(1, 'True or False', 1, NULL, '2022-04-21 07:07:03', '2022-04-21 07:07:03'),
(2, 'Multiple Choice', 1, NULL, '2022-04-21 07:07:03', '2022-04-21 07:07:03');

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
(1, 'Monthly Test', 'Lorem ipsum', 1, NULL, '2022-04-21 02:03:33', '2022-04-21 02:03:33'),
(2, 'Semester', 'Lorem ipsum', 1, NULL, '2022-04-21 02:03:52', '2022-04-21 02:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quize_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `total_questions` bigint(20) NOT NULL,
  `correct_answers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_attempt_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_attempts`
--

INSERT INTO `quiz_attempts` (`id`, `quize_id`, `student_id`, `total_questions`, `correct_answers`, `quiz_attempt_time`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 2, '2', '9:56', '2022-04-22 06:33:08', '2022-04-22 06:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempt_details`
--

CREATE TABLE `quiz_attempt_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_attempt_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `option_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_attempt_details`
--

INSERT INTO `quiz_attempt_details` (`id`, `quiz_attempt_id`, `question_id`, `option_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 36, '2022-04-22 06:33:08', '2022-04-22 06:33:08'),
(2, 1, 5, 32, '2022-04-22 06:33:08', '2022-04-22 06:33:08');

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
(1, 1, 14, 0, '2022-04-22 07:01:53', '2022-04-22 07:01:53'),
(2, 1, 9, 0, '2022-04-22 07:01:53', '2022-04-22 07:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, '2022-04-19 07:08:55', '2022-04-19 07:08:55'),
(2, 'Teacher', 'web', 'Loreim ipsum', '2022-04-19 07:17:22', '2022-04-19 07:17:22'),
(3, 'Student', 'web', 'Lorem ipsum', '2022-04-19 07:18:31', '2022-04-19 07:18:31');

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
(1, 1, '2022-2023', 'Lorem ipsum', 1, NULL, '2022-04-19 07:34:56', '2022-04-19 07:34:56');

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
(1, 'First Semester', 'First Semester', 1, NULL, '2022-04-19 07:20:55', '2022-04-19 07:20:55'),
(2, 'Second Semester', 'Second Semester', 1, NULL, '2022-04-19 07:21:04', '2022-04-19 07:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `share_files`
--

CREATE TABLE `share_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shared_by_teacher_id` bigint(20) NOT NULL,
  `shared_to_teacher_id` bigint(20) NOT NULL,
  `study_class_id` bigint(20) NOT NULL,
  `shared_material_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `batch_id` bigint(20) DEFAULT NULL,
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
(1, 9, 1, 2, '10001', 'Mari', 'Alston', 'Vel enim dignissimos', 1, NULL, '2022-04-19 07:35:45', '2022-04-19 07:35:45'),
(2, 10, 1, 5, '10002', 'Rylee', 'Leach', 'Ipsum rerum ut irur', 1, NULL, '2022-04-19 07:36:01', '2022-04-19 07:36:01'),
(3, 11, 1, 3, '10003', 'Mona', 'Nunez', 'Sequi dolor accusant', 1, NULL, '2022-04-19 07:36:15', '2022-04-19 07:36:15'),
(4, 12, 1, 4, '10004', 'Yoko', 'Reyes', 'Vel consequatur ips', 1, NULL, '2022-04-19 07:36:28', '2022-04-19 07:36:28'),
(5, 13, 1, 4, '10005', 'Naida', 'Larsen', 'Lorem ipsum dolor se', 1, NULL, '2022-04-19 07:36:59', '2022-04-19 07:36:59'),
(6, 14, 1, 1, '10006', 'Yuri', 'Drake', 'Excepturi quod iure', 1, NULL, '2022-04-19 07:37:09', '2022-04-19 07:37:09'),
(7, 15, 1, 6, '10007', 'Yetta', 'Cannon', 'Cupiditate consequat', 1, NULL, '2022-04-19 07:37:32', '2022-04-19 07:37:32'),
(8, 16, 1, 4, '10008', 'Adele', 'Boone', 'Beatae ex lorem labo', 1, NULL, '2022-04-19 07:37:47', '2022-04-19 07:37:47'),
(9, 17, 1, 5, '10009', 'Denise', 'Beck', 'Voluptatem mollitia', 1, NULL, '2022-04-19 07:37:59', '2022-04-19 07:37:59'),
(10, 18, 1, 6, '10010', 'Avye', 'Nunez', 'Fugit sint volupta', 1, NULL, '2022-04-19 07:38:12', '2022-04-19 07:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quizzes`
--

CREATE TABLE `student_class_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quize_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `total_questions` bigint(20) NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'BSIS-4A', 'BSIS-4A', 1, NULL, '2022-04-19 07:19:37', '2022-04-19 07:19:37'),
(2, 'BSIS-4B', 'BSIS-4B', 1, NULL, '2022-04-19 07:19:46', '2022-04-19 07:19:46'),
(3, 'BSIS-3A', 'BSIS-3A', 1, NULL, '2022-04-19 07:19:54', '2022-04-19 07:19:54'),
(4, 'BSIS-3B', 'BSIS-3B', 1, NULL, '2022-04-19 07:20:02', '2022-04-19 07:20:02'),
(5, 'BSIS-3C', 'BSIS-3C', 1, NULL, '2022-04-19 07:20:10', '2022-04-19 07:20:10'),
(6, 'BSIS-2A', 'BSIS-2A', 1, NULL, '2022-04-19 07:20:17', '2022-04-19 07:20:17');

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
(1, 1, 1, '10', '2022-04-21 03:06:42', '2022-04-21 03:06:42'),
(2, 2, 1, '10', '2022-04-21 03:06:42', '2022-04-21 03:06:42'),
(3, 1, 1, '10', '2022-04-21 04:43:44', '2022-04-21 04:43:44'),
(4, 2, 1, '10', '2022-04-21 04:43:44', '2022-04-21 04:43:44');

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
(1, NULL, 1, 'Senior Systems Project 1', 'IS 411A', 2, 'IS 411A', NULL, 1, NULL, '2022-04-19 07:22:16', '2022-04-19 07:22:16'),
(2, NULL, 1, 'Effective Human Communication for IT Professional', 'IS 412', 5, 'IS 412', NULL, 1, NULL, '2022-04-19 07:22:39', '2022-04-19 07:22:39'),
(3, NULL, 1, 'Programming Languages', 'IS 311', 5, 'IS 311', NULL, 1, NULL, '2022-04-19 07:22:58', '2022-04-19 07:22:58'),
(4, NULL, 1, 'Introduction to the IM Professional and Ethics', 'IS 413', 15, 'IS 413', NULL, 1, NULL, '2022-04-19 07:23:17', '2022-04-19 07:23:17'),
(5, NULL, 1, 'Application Development', 'IS 221', 23, 'IS 221', NULL, 1, NULL, '2022-04-19 07:23:56', '2022-04-19 07:23:56'),
(6, NULL, 2, 'Network and Internet Technology', 'IS 222', 12, 'IS 222', NULL, 1, NULL, '2022-04-19 07:24:16', '2022-04-19 07:24:16'),
(7, NULL, 2, 'Business Process', 'IS 223', 5, 'IS 223', NULL, 1, NULL, '2022-04-19 07:24:37', '2022-04-19 07:24:37'),
(8, NULL, 2, 'Discrete Structures', '6', 6, 'Discrete Structures', NULL, 1, NULL, '2022-04-19 07:24:56', '2022-04-19 07:24:56'),
(9, NULL, 2, 'IS Programming 2', 'IS 227', 3, 'IS 227', NULL, 1, NULL, '2022-04-19 07:25:20', '2022-04-19 07:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `subject_overviews`
--

CREATE TABLE `subject_overviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 5, 1, 'Teacher', '1', 'Lorem ipsum', 'Lorem ipsum', NULL, 1, NULL, '2022-04-19 07:31:54', '2022-04-19 07:31:54'),
(2, 6, 1, 'Teacher', '2', 'lorem', 'data', NULL, 1, NULL, '2022-04-19 07:33:09', '2022-04-19 07:33:09');

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
(1, 'Hardik', 'admin@gmail.com', NULL, '$2y$10$yeTlVv6UdasGBjfgR2S5.u3JUWlVZYrpMxf7Al0dYzdpyUnCETGR2', 'team-3.jpg', NULL, NULL, '2022-04-19 07:08:55', '2022-04-19 07:08:55'),
(5, 'Teacher Lorem ipsum', 'teacher@gmail.com', NULL, '$2y$10$FouW66WZGMOncuKM.EQFY.45JN94z.ZUIzamrnuAG2nHBgW.LBIv6', NULL, NULL, NULL, '2022-04-19 07:31:54', '2022-04-19 07:31:54'),
(6, 'Teacher lorem', 'teacher2@gmail.com', NULL, '$2y$10$npuOX0rDLLBlnLOhjkhMf.P63fAy4GWMP3YcMV2IwK5vJCrSBWSGy', NULL, NULL, NULL, '2022-04-19 07:33:09', '2022-04-19 07:33:09'),
(9, 'Mari Vel enim dignissimos', 'student@gmail.com', NULL, '$2y$10$quf4GadhUE1Zf/AhavKQW.DlynMQtKM7ZF98FAiN5VKNIlZ6oIsAi', '21-04-2022-084921.jpg', NULL, NULL, '2022-04-19 07:35:45', '2022-04-21 03:49:21'),
(10, 'Rylee Ipsum rerum ut irur', 'zera@mailinator.com', NULL, '$2y$10$Nvt3borYM7x3TEjrC/EFzOvg8897sD7wHQrDs6ArjV6MLs9L.2Y16', NULL, NULL, NULL, '2022-04-19 07:36:01', '2022-04-19 07:36:01'),
(11, 'Mona Sequi dolor accusant', 'wymewapehy@mailinator.com', NULL, '$2y$10$6msckLkyYsTesUSdDojIO.Rg2cmfzrmUpv6WlAgdWSg9Pj.7MgwLS', NULL, NULL, NULL, '2022-04-19 07:36:15', '2022-04-19 07:36:15'),
(12, 'Yoko Vel consequatur ips', 'qydaqixyj@mailinator.com', NULL, '$2y$10$XsBFkbdq2ztL.rxZKa5XseM1dtUXpBZyvJ4Y363gZ8Q29JdW4IR8e', NULL, NULL, NULL, '2022-04-19 07:36:28', '2022-04-19 07:36:28'),
(13, 'Naida Lorem ipsum dolor se', 'bypiky@mailinator.com', NULL, '$2y$10$SGHEBF1RcHB7nKNREEyx1ewCfHSjrPuubAxBHOBl/SNwBZ/sjL9iq', NULL, NULL, NULL, '2022-04-19 07:36:59', '2022-04-19 07:36:59'),
(14, 'Yuri Excepturi quod iure', 'tewu@mailinator.com', NULL, '$2y$10$1JX8V668.YzDE8LwGEhdPOJojNtGGvhLxvKPev30WKAamcc/Rb3Uy', NULL, NULL, NULL, '2022-04-19 07:37:09', '2022-04-19 07:37:09'),
(15, 'Yetta Cupiditate consequat', 'tovybuzomi@mailinator.com', NULL, '$2y$10$IjPuwBKsr6InnPEAyy24SeezBwmZFGJ6gRUmLM1nsf6xeK6x3uCUy', NULL, NULL, NULL, '2022-04-19 07:37:32', '2022-04-19 07:37:32'),
(16, 'Adele Beatae ex lorem labo', 'qyxuno@mailinator.com', NULL, '$2y$10$PDK8A.icnYJABGzhcq2Xb.XW6eSMmgG6IJIumKyW14bTdBMe.OqJe', NULL, NULL, NULL, '2022-04-19 07:37:47', '2022-04-19 07:37:47'),
(17, 'Denise Voluptatem mollitia', 'liriha@mailinator.com', NULL, '$2y$10$XpereAUwz4zz2TpOhHySR.6JC7y2xeKUIqZhDT.yLXPVoxofvEYoq', NULL, NULL, NULL, '2022-04-19 07:37:59', '2022-04-19 07:37:59'),
(18, 'Avye Fugit sint volupta', 'mapecylijy@mailinator.com', NULL, '$2y$10$EqbetEt2uGsipiWJKAB33e3lnp7cW9xx4Ry7XIOG3d5jnhZwd9DqO', NULL, NULL, NULL, '2022-04-19 07:38:12', '2022-04-19 07:38:12');

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
(1, 1, '2022-04-19 12:10:28', '2022-04-19 12:28:37', '2022-04-19 07:10:28', '2022-04-19 07:28:37'),
(2, 1, '2022-04-19 12:28:46', '2022-04-19 12:41:11', '2022-04-19 07:28:46', '2022-04-19 07:41:11'),
(3, 5, '2022-04-19 12:41:19', '2022-04-19 12:41:57', '2022-04-19 07:41:19', '2022-04-19 07:41:57'),
(4, 1, '2022-04-19 12:42:07', '2022-04-19 12:42:54', '2022-04-19 07:42:07', '2022-04-19 07:42:54'),
(5, 9, '2022-04-19 12:43:16', '2022-04-19 12:42:54', '2022-04-19 07:43:16', '2022-04-19 07:43:16'),
(6, 9, '2022-04-20 05:50:37', '2022-04-20 05:51:46', '2022-04-20 00:50:37', '2022-04-20 00:51:46'),
(7, 5, '2022-04-20 05:51:53', '2022-04-20 05:53:34', '2022-04-20 00:51:53', '2022-04-20 00:53:34'),
(8, 5, '2022-04-20 05:53:44', '2022-04-20 06:17:52', '2022-04-20 00:53:44', '2022-04-20 01:17:52'),
(9, 9, '2022-04-20 06:17:57', '2022-04-20 06:28:15', '2022-04-20 01:17:57', '2022-04-20 01:28:15'),
(10, 5, '2022-04-20 06:28:20', '2022-04-20 10:25:08', '2022-04-20 01:28:20', '2022-04-20 05:25:08'),
(11, 9, '2022-04-20 10:25:59', '2022-04-20 10:34:26', '2022-04-20 05:25:59', '2022-04-20 05:34:26'),
(12, 5, '2022-04-20 10:34:30', '2022-04-20 11:48:12', '2022-04-20 05:34:30', '2022-04-20 06:48:12'),
(13, 9, '2022-04-20 11:48:18', '2022-04-20 11:49:55', '2022-04-20 06:48:18', '2022-04-20 06:49:55'),
(14, 9, '2022-04-20 11:50:01', '2022-04-20 11:59:09', '2022-04-20 06:50:01', '2022-04-20 06:59:09'),
(15, 5, '2022-04-20 11:59:15', '2022-04-20 11:59:45', '2022-04-20 06:59:15', '2022-04-20 06:59:45'),
(16, 9, '2022-04-20 11:59:53', '2022-04-20 12:13:15', '2022-04-20 06:59:53', '2022-04-20 07:13:15'),
(17, 5, '2022-04-20 12:13:21', '2022-04-20 12:13:30', '2022-04-20 07:13:21', '2022-04-20 07:13:30'),
(18, 9, '2022-04-20 12:13:38', NULL, '2022-04-20 07:13:38', '2022-04-20 07:13:38'),
(19, 5, '2022-04-21 06:11:14', '2022-04-21 08:25:58', '2022-04-21 01:11:14', '2022-04-21 03:25:58'),
(20, 9, '2022-04-21 08:26:03', '2022-04-21 09:23:21', '2022-04-21 03:26:03', '2022-04-21 04:23:21'),
(21, 5, '2022-04-21 09:23:26', '2022-04-21 09:23:42', '2022-04-21 04:23:26', '2022-04-21 04:23:42'),
(22, 5, '2022-04-21 09:24:25', '2022-04-21 09:54:46', '2022-04-21 04:24:25', '2022-04-21 04:54:46'),
(23, 9, '2022-04-21 09:54:50', NULL, '2022-04-21 04:54:50', '2022-04-21 04:54:50'),
(24, 9, '2022-04-22 05:46:20', '2022-04-22 08:12:17', '2022-04-22 00:46:20', '2022-04-22 03:12:17'),
(25, 1, '2022-04-22 08:12:28', '2022-04-22 08:14:27', '2022-04-22 03:12:28', '2022-04-22 03:14:27'),
(26, 5, '2022-04-22 08:14:34', '2022-04-22 09:50:00', '2022-04-22 03:14:34', '2022-04-22 04:50:00'),
(27, 9, '2022-04-22 09:50:06', '2022-04-22 12:01:19', '2022-04-22 04:50:06', '2022-04-22 07:01:19'),
(28, 5, '2022-04-22 12:01:26', '2022-04-22 12:55:08', '2022-04-22 07:01:26', '2022-04-22 07:55:08'),
(29, 1, '2022-04-22 12:55:32', NULL, '2022-04-22 07:55:32', '2022-04-22 07:55:32'),
(30, 5, '2022-04-22 14:18:43', '2022-04-22 14:21:28', '2022-04-22 09:18:43', '2022-04-22 09:21:28'),
(31, 1, '2022-04-22 14:21:37', '2022-04-22 14:34:45', '2022-04-22 09:21:37', '2022-04-22 09:34:45'),
(32, 1, '2022-04-22 14:34:52', NULL, '2022-04-22 09:34:52', '2022-04-22 09:34:52'),
(33, 1, '2022-04-22 15:13:38', NULL, '2022-04-22 10:13:38', '2022-04-22 10:13:38');

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
-- Indexes for table `backpacks`
--
ALTER TABLE `backpacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_systems`
--
ALTER TABLE `chat_systems`
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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

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
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_details`
--
ALTER TABLE `material_details`
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
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_attempt_details`
--
ALTER TABLE `quiz_attempt_details`
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
-- Indexes for table `share_files`
--
ALTER TABLE `share_files`
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
-- Indexes for table `subject_overviews`
--
ALTER TABLE `subject_overviews`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assigned_classes`
--
ALTER TABLE `assigned_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assign_classes`
--
ALTER TABLE `assign_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `backpacks`
--
ALTER TABLE `backpacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_systems`
--
ALTER TABLE `chat_systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_details`
--
ALTER TABLE `material_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_attempt_details`
--
ALTER TABLE `quiz_attempt_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `read_notifications`
--
ALTER TABLE `read_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `share_files`
--
ALTER TABLE `share_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_class_quizzes`
--
ALTER TABLE `student_class_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_classes`
--
ALTER TABLE `study_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `study_class_quizzes`
--
ALTER TABLE `study_class_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject_overviews`
--
ALTER TABLE `subject_overviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
