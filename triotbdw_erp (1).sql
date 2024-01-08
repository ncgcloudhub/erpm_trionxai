-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 05:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `triotbdw_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `acid_products`
--

CREATE TABLE `acid_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `stock` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acid_products`
--

INSERT INTO `acid_products` (`id`, `product_name`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Sulphuric Acid', 0, NULL, '2023-04-29 23:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `production` varchar(255) DEFAULT NULL,
  `l_c` varchar(255) DEFAULT NULL,
  `sale` varchar(255) DEFAULT NULL,
  `chalan` int(11) DEFAULT NULL,
  `alluser` varchar(255) DEFAULT NULL,
  `expense` int(11) DEFAULT NULL,
  `hr` int(11) DEFAULT NULL,
  `adminuserrole` varchar(255) DEFAULT NULL,
  `schedule` int(11) DEFAULT NULL,
  `report` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `category`, `product`, `customer`, `bank`, `supplier`, `production`, `l_c`, `sale`, `chalan`, `alluser`, `expense`, `hr`, `adminuserrole`, `schedule`, `report`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-06-05 03:57:32', '$2y$10$RdbUE5rPfW05xbSA.WWSn.ZxeMYF8g7zfrDK4KlUWP/3v7deFVWMy', '01964870827', '1', '1', '1', '1', '1', '1', '1', '1', 1, '1', 1, 1, '1', 1, '1', 1, 'WYySRksKfZ9giqXAvTWL2dDUqdSIjyiKkgUfKJf04Cs5xeAES90z4Elq3wjR', NULL, '202207230834attachment_127807231.jfif', '2022-06-05 03:57:32', '2023-12-25 16:51:36'),
(2, 'Ifaz', 'ifaz.alam1@gmail.com', NULL, '$2y$10$Pu2tNQcnJ1oC6cgytFMBhOLcXjNrCqTggI0Xc.viV96se.VXvPT8.', '+8801677341032', '1', '1', '1', '1', '1', '1', '1', '1', 1, '1', 1, 1, '1', 1, '1', 1, NULL, NULL, 'upload/admin_images/1787236805260133.png', '2024-01-05 02:03:59', '2024-01-05 02:08:40'),
(3, 'Fahmid', 'fahmidh26@gmail.com', NULL, '$2y$10$qJafDwDHxrRvIW6vmFLLYOKJEzHSo.VKHAlWwy/h2ikgSO07ae48e', '01908497296', '1', '1', '1', '1', '1', '1', '1', '1', 1, '1', 1, 1, '1', 1, '1', 1, NULL, NULL, 'upload/admin_images/1787236869763164.png', '2024-01-05 02:05:00', NULL),
(4, 'Saiful', 'saiful@gmail.com', NULL, '$2y$10$idWXnXL5jJMnMy/FEz/IhOSuOtzVkmlmcx7uShvtpwYcFLuRR6BMu', '+16465085790', '1', '1', '1', '1', '1', '1', '1', '1', 1, '1', 1, 1, '1', 1, '1', 1, NULL, NULL, 'upload/admin_images/1787236934062537.png', '2024-01-05 02:06:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ac_name` varchar(255) NOT NULL,
  `ano_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `balance` float DEFAULT NULL,
  `loan` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `ac_name`, `ano_name`, `branch`, `balance`, `loan`, `created_at`, `updated_at`) VALUES
(5, 'Capital', 'Capital', 'Capital', 'Capital', 391074, NULL, '2023-03-25 07:07:00', '2023-12-06 06:08:15'),
(6, 'bKash', 'bKash', 'bKash', 'bKash', 0, 0, '2023-06-05 01:39:10', NULL),
(7, 'Cash', 'Cash', 'Cash', 'Cash', -290, 0, '2023-06-05 01:40:01', '2023-10-30 06:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `assign_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `assigned_by` varchar(100) DEFAULT NULL,
  `assign_to` varchar(100) DEFAULT NULL,
  `bug` varchar(255) DEFAULT NULL,
  `issue` varchar(255) DEFAULT NULL,
  `hyperlinks` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `project_name`, `description`, `comment`, `assign_date`, `completion_date`, `assigned_by`, `assign_to`, `bug`, `issue`, `hyperlinks`, `priority`, `product_img`, `created_at`, `updated_at`) VALUES
(13, 'TrionxAI', '<p>ggggggggggggggggg</p>', '<p>sssssssssssssssss</p>', '2024-01-01', '2024-01-27', '1', '2', 'Irure illo commodi d', NULL, NULL, 'critical', 'upload/products/1786886818723132.webp', '2024-01-01 05:21:05.000000', '2024-01-02 05:14:56.000000'),
(14, 'ERPM', '<p>Create Project management in ERPM</p>', '<p>Hello</p>', '2024-01-01', '2024-01-08', '2', '3', 'No Bugs Found', 'No Issues found', 'https://chat.openai.com', 'major', 'upload/products/1786904261730904.png', '2024-01-01 09:58:20.000000', '2024-01-04 08:40:28.000000'),
(15, 'Ecommerce', NULL, '<p>Ecom</p>', '2024-01-02', '2024-01-18', '4', '2', NULL, NULL, 'https://chat.openai.com/', 'critical', NULL, '2024-01-01 23:06:55.000000', '2024-01-04 08:39:37.000000'),
(16, 'AI WebsiteS', '<p>Create an AI Website</p>\r\n<p>Create 5 sections:</p>\r\n<p>Section 1 - HomeS</p>\r\n<p>Section 2 - Template</p>\r\n<p>Section 3 - Sale</p>\r\n<p>Section 4 - Customer</p>\r\n<p>Section 5 - Student</p>', '<p>No</p>', '2024-01-04', '2024-01-31', '4', '2', 'Bug s', 'No issue till nows', NULL, 'normal', NULL, '2024-01-04 08:28:06.000000', '2024-01-08 09:04:49.000000');

-- --------------------------------------------------------

--
-- Table structure for table `chalans`
--

CREATE TABLE `chalans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `chalan_date` date NOT NULL,
  `chalan_no` varchar(20) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `invoice_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chalans`
--

INSERT INTO `chalans` (`id`, `customer_id`, `chalan_date`, `chalan_no`, `user_id`, `details`, `purpose`, `invoice_number`, `created_at`, `updated_at`) VALUES
(241, 811, '2023-12-06', 'STAC202343769', '46', NULL, 'Sales', '710', '2023-12-06 06:08:51', NULL),
(242, 811, '2023-12-06', 'STAC202315172', '63', NULL, 'Sale', NULL, '2023-12-06 06:11:28', NULL),
(243, 811, '2023-12-15', 'STAC202396346', '1', NULL, 'Dealership', NULL, '2023-12-15 11:47:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chalan_items`
--

CREATE TABLE `chalan_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chalan_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(20) DEFAULT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` double(8,2) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inventory` varchar(255) DEFAULT 'Not Mentioned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chalan_items`
--

INSERT INTO `chalan_items` (`id`, `chalan_id`, `product_id`, `qty`, `rate`, `amount`, `created_at`, `updated_at`, `inventory`) VALUES
(723, 242, '175', '1', 2600.00, 2600.00, '2023-12-06 06:11:28', '2023-12-06 06:11:28', 'qty'),
(724, 242, '49', '1', 700.00, 700.00, '2023-12-06 06:11:28', '2023-12-06 06:11:28', 'qty'),
(725, 243, '368', '1', 2400.00, 2400.00, '2023-12-15 11:47:14', '2023-12-15 11:47:14', 'qty');

-- --------------------------------------------------------

--
-- Table structure for table `conveyances`
--

CREATE TABLE `conveyances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `s_employee` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `grand_total` int(11) NOT NULL,
  `status` varchar(25) DEFAULT 'Pending',
  `approved_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from_bank_id` int(11) DEFAULT NULL,
  `amount_from` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conveyances`
--

INSERT INTO `conveyances` (`id`, `employee_id`, `user_id`, `s_employee`, `date`, `grand_total`, `status`, `approved_by`, `created_at`, `updated_at`, `from_bank_id`, `amount_from`) VALUES
(438, 34, 44, NULL, '2023-12-04', 160, 'Pending', NULL, '2023-12-05 12:09:40', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conveyance_items`
--

CREATE TABLE `conveyance_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conveyance_id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conveyance_items`
--

INSERT INTO `conveyance_items` (`id`, `conveyance_id`, `from`, `to`, `purpose`, `transport`, `amount`, `created_at`, `updated_at`) VALUES
(1148, 438, 'Office', 'asad gate', 'Product delivery', 'Bus', 80.00, '2023-12-05 12:09:40', '2023-12-05 12:09:40'),
(1149, 438, 'asad gate', 'office', 'Product delivery', 'Bus', 80.00, '2023-12-05 12:09:40', '2023-12-05 12:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `fees` int(255) NOT NULL,
  `discounted_fees` varchar(255) DEFAULT NULL,
  `difficulty` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `prerequisites` text DEFAULT NULL,
  `objectives` text DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `code`, `description`, `type`, `fees`, `discounted_fees`, `difficulty`, `duration`, `prerequisites`, `objectives`, `comments`, `created_at`, `updated_at`) VALUES
(1, 'AI', 'STA17143437', '<p>test</p>', 'Self Paced', 12, '$9.99', 'HArd', 'No', NULL, NULL, NULL, NULL, '2024-01-07 06:24:18'),
(2, 'TrionxAI', 'T391', '<p>No Description</p>', 'Hard', 25, '$9.99', 'Easy', '6 hours', 'no', 'none', 'no notes', NULL, '2024-01-07 06:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `office_phone` varchar(30) DEFAULT NULL,
  `personal_phone` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zip` int(30) DEFAULT NULL,
  `country` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company_name`, `user_name`, `email`, `office_phone`, `personal_phone`, `address`, `city`, `state`, `zip`, `country`, `created_at`, `updated_at`) VALUES
(811, 'Trionxai', 'Sheikh Mohammed Sadik', 'sms6318@gmail.com', NULL, '167542312', 'Dhaka', 'Dhaka', 'Dhaka', 11111, 'BD', '2023-12-06 05:54:31', '2024-01-05 04:16:54.000000'),
(812, 'TrionxAI', 'Saiful', 'ifaz.alam1@gmail.com', NULL, '1677341032', 'Ka-27/4, Shahid Abdul Aziz Road', 'Dhaka', 'Dubai', 12291, 'Bangladesh', '2024-01-02 09:11:23', '2024-01-05 04:16:36.000000'),
(813, 'Ifaz', 'Ifaz', 'ifaz@gmail.com', '1234', '000000', 'ifaz', 'ifaz', 'ifaz', 12121, 'ifaz', '2024-01-02 09:12:24', '2024-01-05 05:45:09.000000');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `created_at`, `updated_at`) VALUES
(1, 'B2B', NULL, NULL),
(2, 'Dealership', NULL, NULL),
(3, 'Marketing and B2C', NULL, NULL),
(4, 'After Sales', NULL, NULL),
(5, 'Operations', NULL, NULL),
(6, 'IT', NULL, NULL),
(7, 'Management', NULL, NULL),
(8, 'Office Assistant', NULL, NULL),
(9, 'Branding & Design', NULL, NULL),
(10, 'R&D', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deposit_date` date NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `cashType_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_of_deposit` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `deposit_date`, `employee_id`, `cashType_id`, `bank_id`, `amount`, `details`, `created_at`, `updated_at`, `type_of_deposit`, `user_id`) VALUES
(1, '2023-11-20', 32, 17, 11, 395390.00, NULL, '2023-11-20 06:39:18', NULL, 'loan', '1'),
(2, '2023-11-20', 29, 15, 8, 5180.00, 'UV Machine Color (White & Varnish)', '2023-11-20 09:11:23', NULL, 'loan', '1'),
(3, '2023-11-22', 17, 17, 15, 130000.00, NULL, '2023-11-22 07:34:32', NULL, 'loan', '1'),
(4, '2023-11-26', 10, 15, 8, 10000.00, 'Salary and Expense', '2023-11-26 09:53:17', NULL, 'loan', '1'),
(5, '2023-11-26', 17, 14, 15, 10000.00, 'Loan Repayment From STATA Account', '2023-11-26 09:55:33', NULL, 'return_loan', '1'),
(6, '2023-11-26', 17, 17, 15, 135000.00, 'Crusher Machine Purchase', '2023-11-26 09:57:29', NULL, 'loan', '1'),
(7, '2023-11-27', 23, 15, 17, 10000.00, 'Loan adjustment', '2023-11-27 05:30:00', NULL, 'return_loan', '1'),
(8, '2023-11-26', 23, 15, 14, 11000.00, 'For purchase adjustment (STC)', '2023-11-27 05:41:32', NULL, 'loan', '1'),
(9, '2023-11-27', 23, 14, 15, 11000.00, 'Loan Repayment for purchase purpose', '2023-11-27 05:42:19', NULL, 'return_loan', '1'),
(10, '2023-11-27', 17, 8, 14, 174000.00, 'Ahmadia Sales Bank Deposit', '2023-11-27 08:49:21', NULL, 'deposit', '1'),
(11, '2023-11-27', 23, 14, 15, 81410.00, 'Group B Product Purchase', '2023-11-27 08:54:45', NULL, 'deposit', '1'),
(12, '2023-11-27', 10, 14, 11, 32428.00, 'Group A Product', '2023-11-27 08:59:02', NULL, 'deposit', '1'),
(13, '2023-11-27', 17, 14, 8, 60000.00, 'Withdraw For Salary , commission and office expense', '2023-11-27 09:07:06', NULL, 'deposit', '1'),
(14, '2023-11-28', 29, 17, 8, 180000.00, 'Cable Purchase for factory (SQ Cable)', '2023-11-28 07:20:40', NULL, 'loan', '1'),
(15, '2023-11-28', 10, 15, 8, 78280.00, 'Imperial Series Purchase', '2023-11-28 11:02:23', NULL, 'loan', '1'),
(16, '2023-11-29', 23, 17, 8, 368300.00, NULL, '2023-11-29 11:11:11', NULL, 'loan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(2, 'Sales', NULL, NULL),
(3, 'Sales & Marketing Executive', NULL, NULL),
(4, 'Brand Executive', NULL, NULL),
(5, 'Marketing & Sales Manager', NULL, NULL),
(6, 'Head Of Sales', NULL, NULL),
(7, 'Support Specialist', NULL, NULL),
(8, 'Managing Director', NULL, NULL),
(9, 'Operation Manager', NULL, NULL),
(10, 'Commercial Executive', NULL, NULL),
(11, 'Software Engineer', NULL, NULL),
(12, 'Office Assistant', NULL, NULL),
(13, 'Sr. Branding & Design', NULL, NULL),
(14, 'Project Engineer', NULL, NULL),
(15, 'Business Development Manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `designation_id` varchar(255) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `r_type` varchar(20) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `employee_type` varchar(255) DEFAULT NULL,
  `department_id` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `f_name`, `l_name`, `designation_id`, `phone`, `r_type`, `salary`, `email`, `employee_type`, `department_id`, `address`, `city`, `state`, `zip`, `country`, `image`, `created_at`, `updated_at`) VALUES
(34, 'Solaiman Islam', 'Akash', '2', 9, 'Salary', 75, 'solaimanakash@stataglobal.com', 'A', '1', 'Dhaka', 'Dhaka', NULL, NULL, 'Bangladesh', NULL, '2023-09-18 05:43:21', NULL),
(38, 'Ifaz', 'Alam', '6', 1234, 'Hourly', 20000, 'ifaz@ifaz.com', 'Permanent', '5', 'Dhaka', 'Dhaka', 'Badda', '1223', 'Bangladesh', NULL, '2024-01-06 05:40:20', '2024-01-07 06:27:08'),
(39, 'Stephen', 'Barton', '3', 13, 'Salary', 14, 'gigufybit@mailinator.com', 'Part Time', '5', 'Et porro quidem moll', 'Unde nihil voluptas', 'Rerum reprehenderit', '59937', 'Bangladesh', 'upload/employee/1787341058450084.png', '2024-01-06 05:41:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenseType_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` varchar(5) DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `approved_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `made_by_id` varchar(255) DEFAULT NULL,
  `from_bank_id` int(11) DEFAULT NULL,
  `amount_from` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expenseType_id`, `date`, `user_id`, `amount`, `location`, `details`, `status`, `approved_by`, `created_at`, `updated_at`, `made_by_id`, `from_bank_id`, `amount_from`) VALUES
(397, 15, '2023-12-05', '27', 1100.00, 'Head Office', 'A4 Paper x 2', 'Pending', NULL, '2023-12-05 08:33:31', NULL, '54', NULL, NULL),
(398, 21, '2023-12-05', '21', 240.00, 'Head Office', 'rakib,noman', 'Pending', NULL, '2023-12-05 12:11:39', NULL, '44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenseType` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `expenseType`, `created_at`, `updated_at`) VALUES
(10, 'Travel Allowance', '2023-07-24 23:17:02', NULL),
(11, 'Food Allowance', '2023-07-24 23:17:05', NULL),
(12, 'Entertainment', '2023-07-24 23:17:08', NULL),
(13, 'Mobile Bill', '2023-07-24 23:17:19', NULL),
(14, 'Conveyence', '2023-07-24 23:17:26', NULL),
(15, 'Office Accessories', '2023-07-24 23:18:02', NULL),
(16, 'VAT/TAX', '2023-08-19 12:31:52', NULL),
(17, 'Salary', '2023-08-19 12:31:58', NULL),
(18, 'Office Event', '2023-08-19 12:32:16', NULL),
(19, 'Office Guest Coffee and Snacks', '2023-08-30 06:09:27', NULL),
(20, 'Factory and Machinery', '2023-08-31 04:52:56', NULL),
(21, 'Office Lunch', '2023-09-07 06:56:50', NULL),
(22, 'Courier Charge', '2023-09-12 05:10:26', NULL),
(23, 'Purchase', '2023-10-14 12:44:45', NULL),
(24, 'Commission', '2023-11-01 18:14:50', NULL),
(25, 'Salary', '2023-11-01 18:18:49', NULL),
(26, 'Shipping Charge', '2023-11-22 07:37:41', NULL),
(27, 'IVR Bill', '2023-11-23 08:12:16', NULL),
(28, 'Currency Fluctuation', '2023-11-26 09:24:57', NULL),
(29, 'C&F Charge', '2023-11-26 09:25:10', NULL),
(30, 'Salary', '2023-11-27 09:07:29', NULL),
(31, 'NPSB Charge', '2023-11-27 09:10:20', NULL),
(32, 'Car Parking', '2023-11-27 10:26:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_05_035221_create_sessions_table', 1),
(7, '2022_06_05_093510_create_admins_table', 2),
(8, '2022_06_08_050819_create_brands_table', 3),
(9, '2022_06_11_072712_create_sliders_table', 4),
(10, '2022_06_11_080003_create_sliders_table', 5),
(11, '2022_06_12_044009_create_categories_table', 6),
(12, '2022_06_12_044635_create_sub_categories_table', 6),
(13, '2022_06_12_101831_create_products_table', 7),
(14, '2022_06_12_102120_create_multi_imgs_table', 7),
(15, '2022_06_15_111136_create_carts_table', 8),
(16, '2022_06_18_051335_create_wishlists_table', 9),
(17, '2022_06_19_061429_create_coupons_table', 10),
(18, '2022_06_20_055345_create_ship_divisions_table', 11),
(19, '2022_06_20_082833_create_ship_districts_table', 12),
(20, '2022_06_21_050936_create_ship_states_table', 13),
(21, '2022_06_22_153813_create_shippings_table', 14),
(22, '2022_06_25_052407_create_oders_table', 14),
(23, '2022_06_25_075304_create_orders_table', 15),
(24, '2022_06_25_075738_create_order_items_table', 15),
(25, '2022_06_30_065319_create_site_settings_table', 16),
(26, '2022_06_30_110044_create_seos_table', 17),
(27, '2022_07_02_062717_create_reviews_table', 18),
(28, '2022_08_01_044732_create_locations_table', 19),
(29, '2022_12_17_142839_create_quotations_table', 20),
(30, '2022_12_18_071520_create_quotations_table', 21),
(31, '2022_12_18_083754_create_quotation_items_table', 22),
(32, '2022_12_21_072212_create_customers_table', 22),
(33, '2022_12_22_051900_create_quotation_items_table', 23),
(34, '2022_12_22_051908_create_quotations_table', 23),
(35, '2022_12_22_051920_create_customers_table', 23),
(36, '2022_12_22_062042_create_quotation_items_table', 24),
(37, '2023_01_10_060905_create_banks_table', 25),
(38, '2023_01_10_071658_create_suppliers_table', 26),
(39, '2023_01_10_111709_create_purchases_table', 27),
(40, '2023_01_10_111933_create_purchase_items_table', 27),
(41, '2023_01_10_114539_create_payment_items_table', 27),
(42, '2023_01_31_092320_create_expense_types_table', 28),
(43, '2023_01_31_095728_create_employees_table', 29),
(44, '2023_01_31_103138_create_designations_table', 29),
(45, '2023_02_25_093329_create_sulphur_stocks_table', 30),
(46, '2023_02_27_054051_create_productions_table', 31),
(47, '2023_02_27_092217_create_todays_productions_table', 32),
(48, '2023_03_01_052946_create_dealers_table', 33),
(49, '2023_03_01_091128_create_schedules_table', 34),
(50, '2023_03_02_094932_create_schedules_table', 35),
(51, '2023_03_02_113137_create_schedule_dates_table', 36),
(52, '2023_03_13_103924_create_sales_table', 36),
(53, '2023_03_13_103937_create_sales_items_table', 36),
(54, '2023_03_14_101450_create_sales_payment_items_table', 37),
(55, '2023_03_14_104021_create_acid_products_table', 38),
(56, '2023_03_15_085403_create_chalans_table', 39),
(57, '2023_03_22_061304_create_requisitions_table', 40),
(58, '2023_03_22_061552_create_requisition_types_table', 41),
(59, '2023_03_22_072837_create_requisitions_table', 42),
(60, '2023_03_29_095153_create_expenses_table', 43),
(61, '2023_05_28_104023_create_quotations_table', 44),
(62, '2023_05_28_104034_create_quotation_items_table', 44),
(63, '2023_05_28_105102_create_quotation_payment_items_table', 45),
(64, '2023_06_01_045822_create_chalans_table', 46),
(65, '2023_06_01_052234_create_chalan_items_table', 47),
(66, '2023_06_11_063330_create_employees_table', 48),
(67, '2023_06_11_091553_create_conveyances_table', 48),
(68, '2023_06_11_092104_create_conveyance_items_table', 48),
(69, '2023_06_12_055835_create_departments_table', 48),
(70, '2023_07_26_155959_create_return_products_table', 48),
(71, '2023_07_26_161000_create_return_product_items_table', 48),
(72, '2023_08_31_070452_admin_id_new_field', 49),
(73, '2023_09_17_101358_create_service_invoices_table', 50),
(74, '2023_09_17_101958_create_service_invoice_items_table', 50),
(75, '2023_09_17_104419_create_service_invoice_payment_items_table', 51),
(76, '2023_10_03_101827_create_deposits_table', 52),
(77, '2023_11_26_080831_create_salaries_table', 53),
(78, '2023_11_26_095415_create_ship_expense_types_table', 53),
(79, '2023_11_26_102445_create_ship_expenses_table', 53),
(85, '2023_11_28_104340_create_salaries_table', 54),
(86, '2023_12_02_053936_create_raw_materials_table', 54),
(87, '2024_01_02_113858_create_students_table', 55),
(88, '2024_01_04_113707_create_notices_table', 56),
(90, '2024_01_06_172959_create_courses_table', 57),
(91, '2024_01_07_180610_create_site_settings_table', 58);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `deadline` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `assign_date`, `description`, `deadline`, `status`, `created_at`, `updated_at`) VALUES
(1, '2024-01-04', 'Hello World', NULL, 1, '2024-01-04 05:45:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_items`
--

CREATE TABLE `payment_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `b_paid_amount` double(28,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `project_list` varchar(255) DEFAULT NULL,
  `task_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `assign_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `assigned_by` varchar(100) DEFAULT NULL,
  `assign_to` varchar(100) DEFAULT NULL,
  `sub_task` varchar(255) DEFAULT NULL,
  `bug` varchar(255) DEFAULT NULL,
  `issue` varchar(255) DEFAULT NULL,
  `hyperlinks` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `project_list`, `task_name`, `description`, `comment`, `assign_date`, `completion_date`, `assigned_by`, `assign_to`, `sub_task`, `bug`, `issue`, `hyperlinks`, `priority`, `product_img`, `created_at`, `updated_at`) VALUES
(373, '13', 'Hello', '<p>Nogggggggggggggg</p>', '<p>eeeeeeeeeeee</p>', '2024-01-01', '2024-01-19', '2', '3', 'Hi', 'No', 'No', 'https://trionxai.com/', 'major', 'upload/products/1786884732989926.webp', '2024-01-01 04:47:56.000000', '2024-01-02 05:18:02.000000'),
(374, '14', 'Add Button', '<p>Add a Button to ERPM</p>', '<p>test</p>', '2024-01-01', '2024-01-05', '1', '3', 'Button', 'Irure illo commodi d', 'add', NULL, 'major', 'upload/products/1786904322431756.png', '2024-01-01 09:59:18.000000', '2024-01-05 09:24:47.000000'),
(372, '15', 'Nemo error quia dign', '<p>yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy</p>', '<p>rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrriiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>', '2016-01-09', '1998-10-30', '3', '2', 'Corporis exercitatio', 'Iste officiis minus', 'Ut iusto voluptatem', 'Sapiente ad beatae a', 'critical', 'upload/products/1786725643483027.png', '2023-12-30 10:39:16.000000', NULL),
(375, '14', 'Aliquam vel minus pr', '<p>fffffff</p>', '<p>fffffffff</p>', '2010-09-28', '2021-05-17', '4', '3', 'Qui quis ut quo inve', 'Voluptatum sint cons', 'Sequi voluptas maior', 'Et aspernatur et et', 'critical', NULL, '2024-01-04 05:22:19.000000', NULL),
(376, '14', 'Exercitation vero qu', '<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>\r\n<p>ffdsfdsdsfds</p>', '<p>fdsdfsdfdsfsdfds</p>', '2019-10-20', '2001-12-16', '3', '4', 'Asperiores excepturi', 'Aperiam perspiciatis', 'Dolorem rem commodo', 'Mollit sit aperiam', 'minor', NULL, '2024-01-04 05:23:56.000000', NULL),
(377, '15', 'Allegra Bishop', NULL, NULL, '1994-02-26', '1989-06-06', '4', '3', 'Iusto totam id paria', NULL, NULL, 'Cillum do quis eu po', 'minor', NULL, '2024-01-08 08:56:19.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `vendor_id`, `purchase_date`, `expiration_date`, `details`, `created_at`, `updated_at`) VALUES
(114, 8, '2024-01-08', '2024-01-18', 'Yes', '2024-01-08 05:50:49', '2024-01-08 08:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `batch_no` varchar(255) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `rateType` varchar(255) DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `details` text DEFAULT NULL,
  `sub_total` double(10,2) DEFAULT NULL,
  `invoice` varchar(20) DEFAULT NULL,
  `grand_total` double(10,2) DEFAULT NULL,
  `discount_flat` varchar(255) DEFAULT NULL,
  `discount_per` varchar(255) DEFAULT NULL,
  `total_vat` varchar(255) DEFAULT NULL,
  `p_paid_amount` varchar(255) NOT NULL,
  `due_amount` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `customer_id`, `sale_date`, `expire_date`, `details`, `sub_total`, `invoice`, `grand_total`, `discount_flat`, `discount_per`, `total_vat`, `p_paid_amount`, `due_amount`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(65, 811, '2023-12-15', '2023-12-15', NULL, 140.00, 'STAQ202357915', 140.00, NULL, NULL, NULL, '70', '70', 1, '2023-12-15 11:31:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_items`
--

CREATE TABLE `quotation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_items`
--

INSERT INTO `quotation_items` (`id`, `quotation_id`, `product_id`, `qty`, `rate`, `amount`, `created_at`, `updated_at`) VALUES
(397, 65, 367, '2', 70.00, 140.00, '2023-12-15 11:31:40', '2023-12-15 11:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_payment_items`
--

CREATE TABLE `quotation_payment_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `b_paid_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_payment_items`
--

INSERT INTO `quotation_payment_items` (`id`, `quotation_id`, `bank_id`, `b_paid_amount`, `created_at`, `updated_at`) VALUES
(62, 65, 7, 70.00, '2023-12-15 11:31:40', '2023-12-15 11:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `cost_price` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requisitionType_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `lo` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisitions`
--

INSERT INTO `requisitions` (`id`, `requisitionType_id`, `date`, `type`, `lo`, `location`, `amount`, `status`, `details`, `qty`, `created_at`, `updated_at`) VALUES
(13, 10, '2023-06-08', 'Emergency', 'Local Purchase', 'Head Office', 3000, 'Unpaid', 'Mould Holding Clamp 4 Pieces', NULL, '2023-06-08 11:03:48', NULL),
(14, 8, '2023-06-08', 'Emergency', 'Local Purchase', 'Head Office', 700, 'Unpaid', 'Mould Spray 2 Pieces', NULL, '2023-06-08 11:04:48', NULL),
(15, 10, '2023-06-08', 'Emergency', 'Local Purchase', 'Head Office', 400, 'Unpaid', 'Washer 2 KG', NULL, '2023-06-08 11:05:20', NULL),
(16, 10, '2023-06-08', 'Emergency', 'Local Purchase', 'Head Office', 500, 'Unpaid', 'Bolt 4 Pieces', NULL, '2023-06-08 11:05:53', NULL),
(17, 10, '2023-06-08', 'Emergency', 'Local Purchase', 'Head Office', 900, 'Unpaid', 'Allen Key 14 number 2 Pieces', NULL, '2023-06-08 11:06:46', NULL),
(18, 8, '2023-06-08', 'Moderate', 'Local Purchase', 'Head Office', 4000, 'Unpaid', 'Hopper Magnet', NULL, '2023-06-08 11:07:19', NULL),
(19, 9, '2023-06-08', 'Moderate', 'Local Purchase', 'Head Office', 28000, 'Unpaid', 'ABS Resign 25K Bag 4 Pieces', NULL, '2023-06-08 11:08:06', NULL),
(20, 9, '2023-06-08', 'Emergency', 'Local Purchase', 'Head Office', 3000, 'Unpaid', 'Master Batch Black Color', NULL, '2023-06-08 11:08:45', NULL),
(21, 12, '2023-06-08', 'Emergency', 'Local Purchase', 'Head Office', 30000, 'Unpaid', 'Due Payment', NULL, '2023-06-08 11:14:41', NULL),
(22, 11, '2023-06-08', 'Emergency', 'Local Purchase', 'Head Office', 16000, 'Unpaid', 'LED Signboard', NULL, '2023-06-08 11:15:10', NULL),
(23, 9, '2023-08-07', 'Emergency', 'Local Purchase', 'Head Office', 1000, 'Unpaid', NULL, 1, '2023-08-07 14:12:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_types`
--

CREATE TABLE `requisition_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requisitionType` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisition_types`
--

INSERT INTO `requisition_types` (`id`, `requisitionType`, `created_at`, `updated_at`) VALUES
(2, 'Water Pump', '2023-03-28 05:14:52', NULL),
(6, 'SS Pipe', '2023-04-03 07:35:42', NULL),
(7, 'Pump', '2023-04-03 07:36:37', NULL),
(8, 'Machineries Accessories', '2023-06-08 10:58:37', NULL),
(9, 'Raw Material', '2023-06-08 10:58:57', NULL),
(10, 'Mechanical Accessories', '2023-06-08 10:59:38', NULL),
(11, 'Factory Decoration', '2023-06-08 11:13:29', NULL),
(12, 'Verticle Injection Moulding Machine', '2023-06-08 11:14:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `return_products`
--

CREATE TABLE `return_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `return_date` date NOT NULL,
  `return_number` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chalan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_products`
--

INSERT INTO `return_products` (`id`, `customer_id`, `return_date`, `return_number`, `details`, `user_id`, `chalan_id`, `created_at`, `updated_at`) VALUES
(71, 811, '2023-11-28', 'STAR202332285', NULL, 52, 241, '2023-12-04 11:25:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `return_product_items`
--

CREATE TABLE `return_product_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `return_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sold_qty` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_product_items`
--

INSERT INTO `return_product_items` (`id`, `return_id`, `product_id`, `sold_qty`, `qty`, `created_at`, `updated_at`) VALUES
(145, 71, 367, 2, 1, '2023-12-04 11:25:02', '2023-12-04 11:25:02'),
(146, 71, 367, 1, 1, '2023-12-04 11:25:02', '2023-12-04 11:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `details` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `salary_type` varchar(255) NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `made_by_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` date NOT NULL,
  `details` text DEFAULT NULL,
  `invoice` varchar(20) DEFAULT NULL,
  `sub_total` bigint(20) NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `discount_flat` varchar(255) DEFAULT NULL,
  `discount_per` varchar(255) DEFAULT NULL,
  `p_paid_amount` varchar(255) NOT NULL,
  `due_amount` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active_inactive` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sale_due_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `student_id`, `sale_date`, `details`, `invoice`, `sub_total`, `grand_total`, `discount_flat`, `discount_per`, `p_paid_amount`, `due_amount`, `user_id`, `active_inactive`, `created_at`, `updated_at`, `sale_due_amount`) VALUES
(710, 5, '2023-12-06', NULL, 'STA202318521', 3300, 2805, NULL, '15', '2805', '0', 3, 1, '2023-12-06 06:08:15', NULL, 0),
(711, 5, '1974-02-14', 'Qui eum consequatur', 'TXAI202422996', 5756, 5659, '97', NULL, '97', '5562', 1, 1, '2024-01-07 10:20:20', NULL, 5562),
(712, 5, '1974-02-14', 'Qui eum consequatur', 'TXAI202439440', 5756, 5659, '97', NULL, '97', '5562', 1, 1, '2024-01-07 10:21:53', NULL, 5562),
(713, 2, '1993-04-28', 'Et et magna lorem al', 'TXAI202485425', 6389, 6349, '40', NULL, '3', '6346', 1, 1, '2024-01-07 10:22:31', NULL, 6346),
(714, 2, '1993-04-28', 'Et et magna lorem al', 'TXAI202431614', 6389, 6349, '40', NULL, '3', '6346', 1, 1, '2024-01-07 10:23:12', NULL, 6346),
(715, 2, '1993-04-28', 'Et et magna lorem al', 'TXAI202424042', 6389, 6349, '40', NULL, '3', '6346', 1, 1, '2024-01-07 10:24:17', NULL, 6346),
(716, 2, '1993-04-28', 'Et et magna lorem al', 'TXAI202435361', 6389, 6349, '40', NULL, '3', '6346', 1, 1, '2024-01-07 10:24:50', NULL, 6346),
(717, 2, '1993-04-28', 'Et et magna lorem al', 'TXAI202416216', 6389, 6349, '40', NULL, '3', '6346', 1, 1, '2024-01-07 10:24:59', NULL, 6346),
(718, 2, '1980-11-17', 'Quis ut voluptate te', 'TXAI202482310', 10319, 10261, '58', NULL, '75', '10186', 1, 1, '2024-01-07 10:25:51', NULL, 10186),
(719, 2, '1980-11-17', 'Quis ut voluptate te', 'TXAI202482125', 10319, 10261, '58', NULL, '75', '10186', 1, 1, '2024-01-07 10:26:04', NULL, 10186),
(720, 1, '2000-08-18', 'Et asperiores aspern', 'TXAI202423800', 4059, 3984, '75', NULL, '99', '3885', 1, 1, '2024-01-07 10:30:18', NULL, 3885),
(721, 3, '2009-03-26', 'Et excepturi eius do', 'TXAI202493581', 19049, 18965, '84', NULL, '79', '18886', 1, 1, '2024-01-07 10:30:40', NULL, 18886);

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`id`, `sales_id`, `product_id`, `qty`, `rate`, `amount`, `created_at`, `updated_at`) VALUES
(1992, 710, 175, '1', 2600.00, 2600, '2023-12-06 06:08:15', '2023-12-06 06:08:15'),
(1993, 710, 49, '1', 700.00, 700, '2023-12-06 06:08:15', '2023-12-06 06:08:15'),
(1994, 720, 1, '71', 12.00, 639, '2024-01-07 10:30:18', '2024-01-07 10:30:18'),
(1995, 720, 1, '60', 12.00, 3420, '2024-01-07 10:30:18', '2024-01-07 10:30:18'),
(1996, 721, 2, '96', 25.00, 7968, '2024-01-07 10:30:40', '2024-01-07 10:30:40'),
(1997, 721, 2, '81', 25.00, 648, '2024-01-07 10:30:40', '2024-01-07 10:30:40'),
(1998, 721, 1, '31', 12.00, 155, '2024-01-07 10:30:40', '2024-01-07 10:30:40'),
(1999, 721, 1, '87', 12.00, 7395, '2024-01-07 10:30:40', '2024-01-07 10:30:40'),
(2000, 721, 1, '93', 12.00, 2883, '2024-01-07 10:30:40', '2024-01-07 10:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `sales_payment_items`
--

CREATE TABLE `sales_payment_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `b_paid_amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_payment_items`
--

INSERT INTO `sales_payment_items` (`id`, `sale_id`, `bank_id`, `b_paid_amount`, `created_at`, `updated_at`) VALUES
(695, 710, 7, 2805, '2023-12-06 06:08:15', '2023-12-06 06:08:15'),
(696, 720, 7, 99, '2024-01-07 10:30:18', '2024-01-07 10:30:18'),
(697, 721, 5, 79, '2024-01-07 10:30:40', '2024-01-07 10:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_date` date DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_invoices`
--

CREATE TABLE `service_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `service_date` date NOT NULL,
  `details` text DEFAULT NULL,
  `invoice` varchar(20) NOT NULL,
  `sub_total` double(10,2) NOT NULL,
  `grand_total` double(10,2) NOT NULL,
  `service_discount_flat` varchar(255) DEFAULT NULL,
  `service_discount_per` varchar(255) DEFAULT NULL,
  `total_vat` varchar(255) DEFAULT NULL,
  `p_paid_amount` varchar(255) NOT NULL,
  `due_amount` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_invoices`
--

INSERT INTO `service_invoices` (`id`, `customer_id`, `service_date`, `details`, `invoice`, `sub_total`, `grand_total`, `service_discount_flat`, `service_discount_per`, `total_vat`, `p_paid_amount`, `due_amount`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 811, '2023-11-22', NULL, 'STAS202364922', 7500.00, 7500.00, NULL, NULL, NULL, '3750', '3750', 54, '2023-11-22 11:22:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice_items`
--

CREATE TABLE `service_invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` double(8,2) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_invoice_items`
--

INSERT INTO `service_invoice_items` (`id`, `product_id`, `service_id`, `qty`, `rate`, `amount`, `created_at`, `updated_at`) VALUES
(21, 228, 14, '5', 1500.00, 7500.00, '2023-11-22 11:22:19', '2023-11-22 11:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice_payment_items`
--

CREATE TABLE `service_invoice_payment_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `b_paid_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_invoice_payment_items`
--

INSERT INTO `service_invoice_payment_items` (`id`, `service_id`, `bank_id`, `b_paid_amount`, `created_at`, `updated_at`) VALUES
(10, 14, 14, 3750.00, '2023-11-22 11:22:19', '2023-11-22 11:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6c10vqWRr2jdkLNeyOteyXg8c4gdgPZIQ8a1VN9X', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibnlsc041ZU42TFJKY2ZpOFdxa2hoZDYzYTVqNXg1bTFpMlBJWjZQbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50L21hbmFnZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE5OiJwYXNzd29yZF9oYXNoX2FkbWluIjtzOjYwOiIkMnkkMTAkUmRiVUU1clBmVzA1eGJTQS5XV1NuLlp4ZU1ZRjhnN3pmckRLNEtsVVdQLzN2N2RlRlZXTXkiO30=', 1704726597),
('L4JbjpxZiTefKi3ZqLpV2inwcEDvs6jGmotCWQZC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV2E4TDhhRFFkb2hET1F0ZWUwbllSeEZ0MVdNd1Y4Uk5PSkJBV2J5TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXRlL3NldHRpbmdzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTk6InBhc3N3b3JkX2hhc2hfYWRtaW4iO3M6NjA6IiQyeSQxMCRSZGJVRTVyUGZXMDV4YlNBLldXU24uWnhlTVlGOGc3emZyREs0S2xVV1AvM3Y3ZGVGVldNeSI7fQ==', 1704732227);

-- --------------------------------------------------------

--
-- Table structure for table `ship_expenses`
--

CREATE TABLE `ship_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenseType_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `details` varchar(255) NOT NULL,
  `made_by_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `from_bank_id` int(11) DEFAULT NULL,
  `amount_from` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_expenses`
--

INSERT INTO `ship_expenses` (`id`, `expenseType_id`, `date`, `amount`, `details`, `made_by_id`, `created_at`, `updated_at`, `approved_by`, `status`, `from_bank_id`, `amount_from`) VALUES
(1, 3, '2023-11-28', 500.00, 'Mugda Para to Office by Truck', 1, '2023-11-28 11:03:00', '2023-11-28 11:03:46', 1, 'Approved', 8, 500),
(2, 3, '2023-11-29', 20440.00, '85340000', 52, '2023-11-29 11:13:45', NULL, NULL, 'Pending', NULL, NULL),
(3, 1, '2023-11-30', 20000.00, 'Total : 125.27 KG \r\nRate 660 \r\nRemaining : 70493', 1, '2023-11-30 08:03:03', '2023-11-30 08:03:39', 1, 'Approved', 11, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `ship_expense_types`
--

CREATE TABLE `ship_expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expenseType` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_expense_types`
--

INSERT INTO `ship_expense_types` (`id`, `expenseType`, `created_at`, `updated_at`) VALUES
(1, 'C&F Charge', '2023-11-27 06:36:17', NULL),
(2, 'Logistic Charge', '2023-11-27 06:36:32', NULL),
(3, 'Shipping Charge', '2023-11-27 06:37:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `login_img` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `link` varchar(555) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `title`, `favicon`, `logo`, `login_img`, `footer`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Trionxai', 'upload/products/1786904322431756.png', 'upload/products/1787541299993696.jpg', 'upload/products/1786904322431756.png', 'Copyright Trionxai', 'https://trionxai.com/', NULL, '2024-01-08 10:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subTitle` text DEFAULT NULL,
  `startingPrice` int(11) DEFAULT NULL,
  `slideStyle` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `enrolled_in` date NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_id`, `gender`, `dob`, `email`, `enrolled_in`, `phone`, `address`, `city`, `state`, `zip`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Ifaz Alam', '123456', 'male', '1989-06-20', 'ifaz@gmail.com', '2024-01-01', 4324324, 'Placeat consectetur', 'Adipisicing obcaecat', 'Qui adipisicing sed', 13214, 'Bangladesh', NULL, '2024-01-05 05:45:00'),
(2, 'Fahmid Hasan', '123', 'male', '1997-03-09', 'ifaz.alam1@gmail.com', '2024-01-04', 1677341032, 'Ka-27/4, Shahid Abdul Aziz Road, Jagannathpur, Vatara, Khilkhet, Dhaka', 'Dhaka', 'Dhaka', 12291, 'Bangladesh', NULL, '2024-01-05 05:44:50'),
(3, 'Arafat', '240105144347', 'male', '1996-04-05', 'arafatrahman619@gmail.com', '2024-01-01', 1714675632, 'Badda', 'Dhaka', 'Dhaka', 12123, 'Bang', NULL, NULL),
(5, 'Yeo Ban', '240105152225', 'male', '2020-06-26', 'parasidy@mailinator.com', '2010-01-05', 31232, 'Ullam amet temporib', 'Ipsam aperiam occaec', 'Fugiat quis volupta', 98830, 'Id odio adipisci mi', NULL, '2024-01-05 09:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `vendor_s_name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `vendor_name`, `vendor_s_name`, `price`, `email`, `contact`, `address`, `city`, `state`, `zip`, `country`, `created_at`, `updated_at`) VALUES
(4, 'OpenAI', 'Chat GPT', '20', 'statabangladesh@gmail.com', '01234', 'No', 'Dhaka', 'No', '12121', 'BD', '2023-06-13 12:20:36', '2024-01-08 05:15:56'),
(8, 'Lyle Doyle', 'Wilma Burks', '782', 'fyduhazy@mailinator.com', '126432123456', 'Consectetur omnis n', 'Optio ut eos accus', 'Ipsam adipisicing ve', '50163', NULL, '2024-01-08 08:34:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `todays_productions`
--

CREATE TABLE `todays_productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todays_productions`
--

INSERT INTO `todays_productions` (`id`, `product`, `qty`, `created_at`, `updated_at`) VALUES
(17, 'Sulphuric Acid', '0', '2023-04-06 17:55:45', '2023-04-06 17:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_seen` varchar(255) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acid_products`
--
ALTER TABLE `acid_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chalans`
--
ALTER TABLE `chalans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chalan_items`
--
ALTER TABLE `chalan_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chalan_items_chalan_id_foreign` (`chalan_id`);

--
-- Indexes for table `conveyances`
--
ALTER TABLE `conveyances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conveyance_items`
--
ALTER TABLE `conveyance_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conveyance_items_conveyance_id_foreign` (`conveyance_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_items`
--
ALTER TABLE `payment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_items_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`project_list`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_items_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_items_quotation_id_foreign` (`quotation_id`);

--
-- Indexes for table `quotation_payment_items`
--
ALTER TABLE `quotation_payment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_payment_items_quotation_id_foreign` (`quotation_id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_types`
--
ALTER TABLE `requisition_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_products`
--
ALTER TABLE `return_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_product_items`
--
ALTER TABLE `return_product_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_product_items_return_id_foreign` (`return_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_items_sale_id_foreign` (`sales_id`);

--
-- Indexes for table `sales_payment_items`
--
ALTER TABLE `sales_payment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_payment_items_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_invoices`
--
ALTER TABLE `service_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_invoice_items`
--
ALTER TABLE `service_invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_invoice_items_service_id_foreign` (`service_id`);

--
-- Indexes for table `service_invoice_payment_items`
--
ALTER TABLE `service_invoice_payment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_invoice_payment_items_service_id_foreign` (`service_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ship_expenses`
--
ALTER TABLE `ship_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_expense_types`
--
ALTER TABLE `ship_expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todays_productions`
--
ALTER TABLE `todays_productions`
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
-- AUTO_INCREMENT for table `acid_products`
--
ALTER TABLE `acid_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chalans`
--
ALTER TABLE `chalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `chalan_items`
--
ALTER TABLE `chalan_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=726;

--
-- AUTO_INCREMENT for table `conveyances`
--
ALTER TABLE `conveyances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;

--
-- AUTO_INCREMENT for table `conveyance_items`
--
ALTER TABLE `conveyance_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1152;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=826;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_items`
--
ALTER TABLE `payment_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `quotation_items`
--
ALTER TABLE `quotation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;

--
-- AUTO_INCREMENT for table `quotation_payment_items`
--
ALTER TABLE `quotation_payment_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `requisition_types`
--
ALTER TABLE `requisition_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `return_products`
--
ALTER TABLE `return_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `return_product_items`
--
ALTER TABLE `return_product_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=722;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2001;

--
-- AUTO_INCREMENT for table `sales_payment_items`
--
ALTER TABLE `sales_payment_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=698;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `service_invoices`
--
ALTER TABLE `service_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `service_invoice_items`
--
ALTER TABLE `service_invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `service_invoice_payment_items`
--
ALTER TABLE `service_invoice_payment_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ship_expenses`
--
ALTER TABLE `ship_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ship_expense_types`
--
ALTER TABLE `ship_expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `todays_productions`
--
ALTER TABLE `todays_productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chalan_items`
--
ALTER TABLE `chalan_items`
  ADD CONSTRAINT `chalan_items_chalan_id_foreign` FOREIGN KEY (`chalan_id`) REFERENCES `chalans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `conveyance_items`
--
ALTER TABLE `conveyance_items`
  ADD CONSTRAINT `conveyance_items_conveyance_id_foreign` FOREIGN KEY (`conveyance_id`) REFERENCES `conveyances` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_items`
--
ALTER TABLE `payment_items`
  ADD CONSTRAINT `payment_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD CONSTRAINT `quotation_items_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotation_payment_items`
--
ALTER TABLE `quotation_payment_items`
  ADD CONSTRAINT `quotation_payment_items_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `return_product_items`
--
ALTER TABLE `return_product_items`
  ADD CONSTRAINT `return_product_items_return_id_foreign` FOREIGN KEY (`return_id`) REFERENCES `return_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD CONSTRAINT `sales_items_sale_id_foreign` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_payment_items`
--
ALTER TABLE `sales_payment_items`
  ADD CONSTRAINT `sales_payment_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_invoice_items`
--
ALTER TABLE `service_invoice_items`
  ADD CONSTRAINT `service_invoice_items_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `service_invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_invoice_payment_items`
--
ALTER TABLE `service_invoice_payment_items`
  ADD CONSTRAINT `service_invoice_payment_items_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `service_invoices` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
