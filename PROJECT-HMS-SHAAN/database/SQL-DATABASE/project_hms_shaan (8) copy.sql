-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 07:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_hms_shaan`
--
DROP DATABASE IF EXISTS `project_hms_shaan`;
CREATE DATABASE IF NOT EXISTS `project_hms_shaan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project_hms_shaan`;
-- --------------------------------------------------------

--
-- Table structure for table `hms_appointments`
--

CREATE TABLE `hms_appointments` (
  `id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `patient_id` bigint(20) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `cancellation_reason` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_appointments`
--

INSERT INTO `hms_appointments` (`id`, `doctor_id`, `patient_id`, `appointment_date`, `appointment_time`, `status_id`, `cancellation_reason`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-02-25', '10:00:00', 5, 'dfb ousdhf ouusdhf', '2025-02-26 04:00:55', '2025-03-02 21:38:33'),
(2, 2, 2, '2025-02-26', '11:30:00', 5, 'Patient not available', '2025-02-26 04:04:22', '2025-03-02 21:29:01'),
(4, 4, 4, '2025-02-28', '14:45:00', 5, 'Doctor rescheduled', '2025-02-26 04:04:31', '2025-02-27 00:40:11'),
(8, 1, 10, '2025-02-25', '10:58:00', 9, 'juytg ypay 98yhtgw e', '2025-02-26 04:07:23', '2025-02-27 00:01:28'),
(10, 6, 11, '2025-03-04', '13:34:00', 3, NULL, '2025-03-06 05:59:53', '2025-03-06 00:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `hms_appointment_trasheds`
--

CREATE TABLE `hms_appointment_trasheds` (
  `id` bigint(20) NOT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `patient_id` bigint(20) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_appointment_trasheds`
--

INSERT INTO `hms_appointment_trasheds` (`id`, `doctor_id`, `patient_id`, `appointment_date`, `appointment_time`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2025-02-27', '09:15:00', 5, '2025-02-24 22:40:17', '2025-02-24 22:40:17'),
(2, 1, 8, '2025-02-24', '20:59:00', 5, '2025-02-24 23:12:28', '2025-02-24 23:12:28'),
(3, 5, 7, '2025-03-05', '15:24:00', 5, '2025-03-02 21:35:44', '2025-03-02 21:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `hms_beds`
--

CREATE TABLE `hms_beds` (
  `id` int(11) NOT NULL,
  `bed_number` varchar(50) DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_beds`
--

INSERT INTO `hms_beds` (`id`, `bed_number`, `ward_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'B101', 1, 1, '2025-03-03 11:19:26', '2025-03-03 11:19:26'),
(2, 'B102', 1, 2, '2025-03-03 11:19:26', '2025-03-03 11:19:26'),
(3, 'B103', 1, 3, '2025-03-03 11:19:26', '2025-03-03 11:19:26'),
(4, 'B201', 2, 1, '2025-03-03 11:19:26', '2025-03-03 11:19:26'),
(5, 'B202', 2, 2, '2025-03-03 11:19:26', '2025-03-03 11:19:26'),
(6, 'B203', 2, 1, '2025-03-03 11:19:26', '2025-03-03 11:19:26'),
(7, 'B301', 3, 3, '2025-03-03 11:19:26', '2025-03-03 11:19:26'),
(8, 'B302', 3, 1, '2025-03-03 11:19:26', '2025-03-03 11:19:26'),
(9, 'B303', 3, 2, '2025-03-03 11:19:26', '2025-03-03 11:19:26'),
(10, 'B304', 3, 1, '2025-03-03 11:19:26', '2025-03-03 11:19:26'),
(11, 'B3022', 2, 10, '2025-03-04 21:12:43', '2025-03-04 21:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `hms_bed_assignments`
--

CREATE TABLE `hms_bed_assignments` (
  `id` int(11) NOT NULL,
  `bed_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `assigned_at` datetime DEFAULT current_timestamp(),
  `discharged_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_bed_assignments`
--

INSERT INTO `hms_bed_assignments` (`id`, `bed_id`, `patient_id`, `assigned_at`, `discharged_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2025-02-26 11:19:26', NULL, '2025-03-03 11:19:26', '2025-03-03 11:19:38'),
(2, 5, 2, '2025-02-21 11:19:26', '2025-02-28 11:19:26', '2025-03-03 11:19:26', '2025-03-03 11:19:44'),
(3, 9, 3, '2025-03-01 11:19:26', NULL, '2025-03-03 11:19:26', '2025-03-03 11:20:33'),
(4, 3, 4, '2025-02-23 11:19:26', '2025-03-02 11:19:26', '2025-03-03 11:19:26', '2025-03-03 11:20:25'),
(5, 7, 5, '2025-02-25 11:19:26', NULL, '2025-03-03 11:19:26', '2025-03-03 11:20:25'),
(6, 1, 6, '2025-02-24 11:19:26', '2025-03-01 11:19:26', '2025-03-03 11:19:26', '2025-03-03 11:20:25'),
(7, 4, 7, '2025-02-28 11:19:26', NULL, '2025-03-03 11:19:26', '2025-03-03 11:20:25'),
(8, 6, 8, '2025-02-22 11:19:26', '2025-02-26 11:19:26', '2025-03-03 11:19:26', '2025-03-03 11:20:25'),
(9, 8, 9, '2025-03-02 11:19:26', NULL, '2025-03-03 11:19:26', '2025-03-03 11:20:25'),
(10, 10, 10, '2025-02-27 11:19:26', '2025-03-02 11:19:26', '2025-03-03 11:19:26', '2025-03-03 11:20:25'),
(11, 3, 11, NULL, NULL, '2025-03-04 21:03:43', '2025-03-04 21:03:43'),
(12, 2, 1, NULL, NULL, '2025-03-04 21:04:19', '2025-03-04 21:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `hms_billings`
--

CREATE TABLE `hms_billings` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT 0.00,
  `tax` decimal(10,2) DEFAULT 0.00,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `balance_amount` decimal(10,2) DEFAULT 0.00,
  `payment_status_id` int(11) DEFAULT NULL,
  `payment_mode` enum('cash','credit_card','insurance','online') DEFAULT 'cash',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_billings`
--

INSERT INTO `hms_billings` (`id`, `patient_id`, `appointment_id`, `total_amount`, `discount`, `tax`, `paid_amount`, `balance_amount`, `payment_status_id`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 1, 101, 500.00, 50.00, 45.00, 495.00, 0.00, 1, 'cash', '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(2, 2, 102, 1200.00, 100.00, 108.00, 1000.00, 208.00, 2, 'credit_card', '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(3, 3, 103, 800.00, 0.00, 72.00, 800.00, 0.00, 1, 'online', '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(4, 4, 104, 1500.00, 200.00, 117.00, 1300.00, 117.00, 3, 'insurance', '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(5, 5, 105, 300.00, 0.00, 27.00, 300.00, 0.00, 1, 'cash', '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(6, 6, 106, 2000.00, 300.00, 153.00, 1700.00, 153.00, 2, 'credit_card', '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(7, 7, 107, 700.00, 50.00, 58.50, 700.00, 0.00, 1, 'online', '2025-03-03 12:43:30', '2025-03-03 12:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `hms_billing_beds`
--

CREATE TABLE `hms_billing_beds` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `bed_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_billing_beds`
--

INSERT INTO `hms_billing_beds` (`id`, `billing_id`, `bed_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 301, 100.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(2, 2, 302, 150.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(3, 3, 303, 200.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(4, 4, 304, 250.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(5, 5, 305, 100.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(6, 6, 306, 300.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `hms_billing_consultations`
--

CREATE TABLE `hms_billing_consultations` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `consultation_id` int(11) DEFAULT NULL,
  `consultation_fee` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_billing_consultations`
--

INSERT INTO `hms_billing_consultations` (`id`, `billing_id`, `consultation_id`, `consultation_fee`, `created_at`, `updated_at`) VALUES
(1, 1, 201, 200.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(2, 2, 202, 300.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(3, 3, 203, 150.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(4, 4, 204, 400.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(5, 5, 205, 100.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(6, 6, 206, 500.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `hms_billing_lab_tests`
--

CREATE TABLE `hms_billing_lab_tests` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `lab_test_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_billing_lab_tests`
--

INSERT INTO `hms_billing_lab_tests` (`id`, `billing_id`, `lab_test_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 601, 150.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(2, 2, 602, 250.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(3, 3, 603, 200.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(4, 4, 604, 300.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(5, 5, 605, 100.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(6, 6, 606, 350.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(7, 7, 607, 180.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `hms_billing_medicines`
--

CREATE TABLE `hms_billing_medicines` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_billing_medicines`
--

INSERT INTO `hms_billing_medicines` (`id`, `billing_id`, `medicine_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 401, 2, 50.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(2, 2, 402, 1, 100.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(3, 3, 403, 3, 30.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(4, 4, 404, 2, 75.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(5, 5, 405, 1, 20.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(6, 6, 406, 4, 25.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(7, 7, 407, 2, 40.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `hms_billing_services`
--

CREATE TABLE `hms_billing_services` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_billing_services`
--

INSERT INTO `hms_billing_services` (`id`, `billing_id`, `service_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100.00, '2025-03-03 12:43:30', '2025-03-03 23:30:31'),
(2, 2, 2, 200.00, '2025-03-03 12:43:30', '2025-03-03 23:30:31'),
(3, 3, 3, 150.00, '2025-03-03 12:43:30', '2025-03-03 23:30:31'),
(4, 4, 4, 300.00, '2025-03-03 12:43:30', '2025-03-03 23:30:31'),
(5, 5, 5, 50.00, '2025-03-03 12:43:30', '2025-03-03 23:30:31'),
(6, 6, 6, 400.00, '2025-03-03 12:43:30', '2025-03-03 23:30:31'),
(7, 7, 7, 250.00, '2025-03-03 12:43:30', '2025-03-03 23:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `hms_cache`
--

CREATE TABLE `hms_cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_cache_locks`
--

CREATE TABLE `hms_cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_consultations`
--

CREATE TABLE `hms_consultations` (
  `id` bigint(20) NOT NULL,
  `appointment_id` bigint(20) DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `prescription` text DEFAULT NULL,
  `consultation_notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_consultations`
--

INSERT INTO `hms_consultations` (`id`, `appointment_id`, `symptoms`, `diagnosis`, `prescription`, `consultation_notes`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"Fever\",\"Cough\",\"Sore throat\"]', '1. Physical examination\n2. Blood test (CBC, ESR)\n3. Urine test\n4. Chest X-ray\n5. Sputum culture\n6. Throat swab (Rapid antigen test)\n7. Blood culture', '[\"Ibuprofen\",\"Aspirin\",\"Diclofenac\",\"Tramadol\",\"Metformin\"]', 'ffffffff', '2025-02-27 00:53:48', '2025-03-03 04:11:08'),
(2, 2, '[\"Body aches\",\"Fatigue\",\"Headache\"]', '1. Blood Glucose Test\n2. Blood Glucose Test\n3. X-Ray Chest\n4. Pregnancy Test', '[\"Ibuprofen\",\"Diclofenac\",\"Tramadol\",\"Lisinopril\",\"Salbutamol\",\"Doxycycline\",\"Methotrexate\",\"Haloperidol\"]', 'Meet 5 days later', '2025-02-27 00:58:45', '2025-03-02 22:25:13'),
(3, 9, '[\"Diarrhea\",\"Severe headache\"]', '', '[\"Aspirin\",\"Diclofenac\",\"Tramadol\"]', 'dtyudtytdyu', '2025-02-27 01:26:12', '2025-02-27 01:26:12'),
(7, 10, '[\"Cough\"]', '', 'null', NULL, '2025-03-03 22:37:38', '2025-03-03 22:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `hms_consultation_lab_tests`
--

CREATE TABLE `hms_consultation_lab_tests` (
  `id` int(11) NOT NULL,
  `consultation_id` bigint(20) NOT NULL,
  `lab_test_id` int(11) NOT NULL,
  `lab_test_result` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_consultation_lab_tests`
--

INSERT INTO `hms_consultation_lab_tests` (`id`, `consultation_id`, `lab_test_id`, `lab_test_result`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Positive', 1, 1, '2023-10-01 04:30:00', '2023-10-01 04:30:00'),
(2, 2, 2, 'Negative', 2, 2, '2023-10-02 06:00:00', '2023-10-02 06:00:00'),
(3, 3, 3, 'Inconclusive', 3, 3, '2023-10-03 03:45:00', '2023-10-03 03:45:00'),
(18, 2, 2, 'Thats Good', 1, 1, '2025-02-27 00:58:45', '2025-03-03 03:05:14'),
(19, 2, 6, 'patient_lab_results/2/X-Ray_Chest.pdf', 2, 2, '2025-03-01 07:11:49', '2025-03-03 03:05:19'),
(20, 2, 19, 'patient_lab_results/2/Pregnancy_Test.jpg', 3, 3, '2025-03-01 06:28:36', '2025-03-03 03:05:23'),
(22, 6, 4, NULL, NULL, NULL, '2025-03-02 21:38:03', '2025-03-02 21:38:03'),
(23, 6, 5, NULL, NULL, NULL, '2025-03-02 21:38:03', '2025-03-02 21:38:03'),
(24, 7, 3, 'Thats Good', 2, 2, '2025-03-03 22:37:38', '2025-03-03 22:38:05'),
(25, 7, 5, 'Thats Good', 2, 2, '2025-03-03 22:37:38', '2025-03-03 22:38:09'),
(26, 7, 6, 'Thats Good', 2, 2, '2025-03-03 22:37:38', '2025-03-03 22:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `hms_departments`
--

CREATE TABLE `hms_departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_departments`
--

INSERT INTO `hms_departments` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'CARDIO-THORACIC-SURGERY', 'Cardio Thoracic Surgery Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(2, 'CARDIOLOGY', 'Cardiology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(3, 'CHILD-GUIDANCE-CLINIC', 'Child Guidance Clinic', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(4, 'DENTAL', 'Dental Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(5, 'DERMATOLOGY', 'Dermatology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(6, 'DIABETOLOGY-ENDOCRINOLOGY', 'Diabetology & Endocrinology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(7, 'ENT', 'ENT Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(8, 'GASTRO-SURGERY', 'Gastro Surgery Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(9, 'GASTROENTEROLOGY', 'Gastroenterology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(10, 'GENERAL-MEDICINE', 'General Medicine Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(11, 'GENERAL-SURGERY', 'General Surgery Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(12, 'GYNAE-ONCOLOGY', 'Gynae Oncology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(13, 'GYNAECOLOGY', 'Gynaecology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(14, 'HAEMATOLOGY', 'Haematology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(15, 'NEPHROLOGY', 'Nephrology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(16, 'ONCO-SURGERY', 'Onco Surgery Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(17, 'ONCOLOGY', 'Oncology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(18, 'ONCOLOGY-TEAM', 'Oncology Team', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(19, 'ORTHOPAEDICS', 'Orthopaedics Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(20, 'PAEDIATRIC-NEPHROLOGY', 'Paediatric Nephrology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(21, 'PAEDIATRIC-ORTHOPAEDICS', 'Paediatric Orthopaedics Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(22, 'PAEDIATRIC-SURGERY', 'Paediatric Surgery Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(23, 'PAEDIATRICS', 'Paediatrics Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(24, 'PHYSICAL-MEDICINE', 'Physical Medicine Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(25, 'PLASTIC-SURGERY', 'Plastic Surgery Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(26, 'PSYCHIATRY', 'Psychiatry Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(27, 'RESP-MEDICINE-ALLERGY', 'Respiratory Medicine & Allergy Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(28, 'RHEUMATOLOGY', 'Rheumatology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(29, 'THALASSAEMIA-HAEMOGLOBINOPATHIES', 'Thalassaemia & Haemoglobinopathies Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25'),
(30, 'UROLOGY', 'Urology Department', '2025-02-22 23:22:25', '2025-02-22 23:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `hms_doctors`
--

CREATE TABLE `hms_doctors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL COMMENT 'Years of Experience',
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `qualification` text DEFAULT NULL,
  `registration_no` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `consultation_fee` decimal(10,2) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_doctors`
--

INSERT INTO `hms_doctors` (`id`, `user_id`, `name`, `date_of_birth`, `department_id`, `specialization`, `experience`, `contact_number`, `email`, `address`, `gender`, `qualification`, `registration_no`, `photo`, `bio`, `consultation_fee`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dr. John Doe', '1980-05-15', 1, 'Cardiology', 15, '1234567890', 'johndoe@example.com', '123 Heart St, New York, USA', 'Male', 'MBBS, MD (Cardiology)', 'DOC12345', 'john_doe.jpg', 'Experienced cardiologist specializing in heart diseases.', 150.00, 2, '2025-02-18 12:27:41', '2025-02-18 12:27:41'),
(2, 2, 'Dr. Sarah Smith', '1985-09-22', 2, 'Neurology', 10, '0987654321', 'sarahsmith@example.com', '456 Brain Ave, Los Angeles, USA', 'Female', 'MBBS, DM (Neurology)', 'DOC67890', 'sarah_smith.jpg', 'Expert in treating neurological disorders.', 180.00, 1, '2025-02-18 12:27:41', '2025-02-18 12:27:41'),
(3, 3, 'Dr. Michael Brown', '1975-12-10', 3, 'Orthopedics', 20, '1122334455', 'michaelbrown@example.com', '789 Bone Rd, Chicago, USA', 'Male', 'MBBS, MS (Orthopedics)', 'DOC11223', 'michael_brown.jpg', 'Specialist in bone and joint treatments.', 120.00, 2, '2025-02-18 12:27:41', '2025-02-18 12:27:41'),
(4, 4, 'Dr. Emma Johnson', '1990-07-08', 4, 'Dermatology', 8, '2233445566', 'emmajohnson@example.com', '567 Skin Lane, Houston, USA', 'Female', 'MBBS, MD (Dermatology)', 'DOC33445', 'emma_johnson.jpg', 'Expert in skincare and dermatological treatments.', 130.00, 1, '2025-02-18 12:27:41', '2025-02-18 12:27:41'),
(5, 3, 'Shawon Islam', '2025-02-05', NULL, 'agas', 44, '0541651', 'shawoni397@gmail.com', 'Shahapur', 'Male', 'sdgasdg', 'ADfy28234', 'Shawon Islam.jpg', 'dfgbasdg', 1500.00, 1, '2025-02-18 06:56:13', '2025-02-18 06:56:13'),
(6, 2, 'Shawon Islam 1', '2025-02-20', NULL, 'fdfgsdh', 3, '0541651', 'sshawoni397@gmail.com', 'Shahapur', 'Male', 'agagat', 'ADfy28234sf', 'Shawon Islam 1.jpg', 'aSDvs', 1500.00, 1, '2025-02-18 07:03:25', '2025-02-18 07:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `hms_doctor_availabilities`
--

CREATE TABLE `hms_doctor_availabilities` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `day` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`day`)),
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_doctor_availabilities`
--

INSERT INTO `hms_doctor_availabilities` (`id`, `doctor_id`, `day`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Sunday\"]', '06:00:00', '23:01:00', '2025-02-23 20:10:39', '2025-02-23 20:10:39'),
(2, 2, '[\"Tuesday\",\"Thursday\",\"Saturday\",\"Sunday\"]', '13:00:00', '17:00:00', '2025-02-22 12:52:03', '2025-02-22 12:52:03'),
(3, 5, '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\",\"Sunday\"]', '13:00:00', '17:00:00', '2025-02-23 13:51:41', '2025-02-23 13:51:41'),
(4, 6, '[\"Monday\",\"Tuesday\",\"Wednesday\"]', '12:01:00', '20:07:00', '2025-02-23 14:01:31', '2025-02-23 14:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `hms_failed_jobs`
--

CREATE TABLE `hms_failed_jobs` (
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
-- Table structure for table `hms_hospitals`
--

CREATE TABLE `hms_hospitals` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_hospitals`
--

INSERT INTO `hms_hospitals` (`id`, `name`, `country`, `address`, `website`, `phone`, `email`, `description`, `logo`, `banner`, `created_at`, `updated_at`) VALUES
(1, 'CityCare Hospital', 'USA', '123 Main St, New York', 'citycare.com', '+1-212-555-1234', 'info@citycare.com', 'A leading multi-specialty hospital.', 'CityCare Hospital.jpg', 'CityCare Hospital.jpg', '2025-02-04 23:48:39', '2025-02-05 21:58:13'),
(2, 'Greenland Medical Center', 'UK', '45 Baker St, London', 'greenland.comm', '+44-20-7946-0123', 'contact@greenlandmed.uk', 'State-of-the-art healthcare services.', 'Greenland Medical Center.jpg', 'Greenland Medical Center.jpeg', '2025-02-04 23:48:39', '2025-02-05 21:57:49'),
(3, 'Sunrise Hospital', 'India', '67 MG Road, Mumbai', 'sunrise.com', '+91-9876543210', 'help@sunrisehosp.in', '24/7 emergency and specialized care.', 'Sunrise Hospital.jpg', 'Sunrise Hospital.jpg', '2025-02-04 23:48:39', '2025-02-06 13:50:11'),
(4, 'MediLife Healthcare', 'Canada', '89 Elm St, Toronto', 'medilife.com', '+1-416-555-7890', 'support@medilife.ca', 'Providing patient-centered care.', 'MediLife Healthcare.png', 'MediLife Healthcare.jpg', '2025-02-04 23:48:39', '2025-02-08 15:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `hms_jobs`
--

CREATE TABLE `hms_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_job_batches`
--

CREATE TABLE `hms_job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_lab_tests`
--

CREATE TABLE `hms_lab_tests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discount_percentage` decimal(5,2) DEFAULT 0.00,
  `category_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_lab_tests`
--

INSERT INTO `hms_lab_tests` (`id`, `name`, `description`, `price`, `discount_percentage`, `category_id`, `status_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Complete Blood Count (CBC)', 'A test to evaluate overall health.', 50.00, 5.00, 1, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(2, 'Blood Glucose Test', 'Measures blood sugar levels.', 25.00, 0.00, 1, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(3, 'Lipid Profile', 'Measures cholesterol and triglycerides.', 70.00, 10.00, 1, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(4, 'Urine Routine Examination', 'Basic urine test.', 30.00, 0.00, 2, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(5, 'Urine Culture', 'Identifies bacterial infections in urine.', 40.00, 5.00, 2, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(6, 'X-Ray Chest', 'Chest imaging for lung and heart examination.', 100.00, 15.00, 3, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(7, 'MRI Brain', 'Magnetic Resonance Imaging of the brain.', 500.00, 20.00, 3, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(8, 'Thyroid Function Test', 'Checks T3, T4, and TSH levels.', 60.00, 5.00, 4, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(9, 'Testosterone Test', 'Measures testosterone hormone levels.', 55.00, 0.00, 4, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(10, 'HIV Test', 'Detects HIV infection.', 80.00, 10.00, 5, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(11, 'Hepatitis B Test', 'Checks for Hepatitis B infection.', 75.00, 10.00, 5, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(12, 'Dengue Test', 'Detects Dengue fever infection.', 90.00, 10.00, 5, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(13, 'Malaria Test', 'Detects Malaria parasite.', 65.00, 5.00, 5, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(14, 'Vitamin D Test', 'Measures vitamin D levels.', 45.00, 5.00, 4, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(15, 'Electrolyte Panel', 'Checks electrolyte balance.', 50.00, 0.00, 1, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(16, 'Liver Function Test', 'Evaluates liver health.', 85.00, 10.00, 1, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(17, 'Kidney Function Test', 'Checks kidney performance.', 70.00, 5.00, 1, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(18, 'C-Reactive Protein (CRP)', 'Measures inflammation levels.', 40.00, 5.00, 1, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(19, 'Pregnancy Test', 'Detects pregnancy.', 30.00, 0.00, 2, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(20, 'Hemoglobin A1c Test', 'Measures average blood sugar over three months.', 60.00, 10.00, 1, 1, 1, 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `hms_lab_test_categories`
--

CREATE TABLE `hms_lab_test_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_lab_test_categories`
--

INSERT INTO `hms_lab_test_categories` (`id`, `name`, `description`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Blood Tests', 'General blood tests including CBC and glucose levels.', 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(2, 'Urine Tests', 'Urine analysis including culture and sensitivity.', 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(3, 'Imaging Tests', 'Radiology and imaging-related lab tests.', 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(4, 'Hormonal Tests', 'Tests for hormonal imbalances and thyroid functions.', 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46'),
(5, 'Infectious Diseases', 'Tests for bacterial and viral infections.', 1, '2025-02-27 03:37:46', '2025-02-27 03:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `hms_medicines`
--

CREATE TABLE `hms_medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `dosage` varchar(255) DEFAULT NULL,
  `strength` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_medicines`
--

INSERT INTO `hms_medicines` (`id`, `name`, `category`, `dosage`, `strength`, `manufacturer`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', 'Painkiller', 'Tablet', '500mg', 'Pfizer', 2.50, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(2, 'Ibuprofen', 'Painkiller', 'Tablet', '400mg', 'GSK', 3.00, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(3, 'Aspirin', 'Painkiller', 'Tablet', '300mg', 'Bayer', 2.80, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(4, 'Diclofenac', 'Painkiller', 'Tablet', '50mg', 'Novartis', 3.50, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(5, 'Tramadol', 'Painkiller', 'Capsule', '100mg', 'Sanofi', 6.00, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(6, 'Metformin', 'Diabetes', 'Tablet', '500mg', 'Novartis', 4.00, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(7, 'Amlodipine', 'Blood Pressure', 'Tablet', '5mg', 'AstraZeneca', 3.20, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(8, 'Atorvastatin', 'Cholesterol', 'Tablet', '10mg', 'Pfizer', 5.50, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(9, 'Losartan', 'Blood Pressure', 'Tablet', '50mg', 'Sanofi', 4.80, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(10, 'Omeprazole', 'Acid Reflux', 'Capsule', '20mg', 'GSK', 3.50, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(11, 'Simvastatin', 'Cholesterol', 'Tablet', '20mg', 'Merck', 5.00, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(12, 'Levothyroxine', 'Thyroid', 'Tablet', '100mcg', 'AbbVie', 4.20, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(13, 'Lisinopril', 'Blood Pressure', 'Tablet', '10mg', 'Novartis', 3.90, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(14, 'Clopidogrel', 'Blood Thinner', 'Tablet', '75mg', 'Sanofi', 6.20, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(15, 'Salbutamol', 'Asthma', 'Inhaler', '100mcg', 'GSK', 7.50, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(16, 'Ranitidine', 'Acid Reflux', 'Tablet', '150mg', 'Zydus', 3.70, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(17, 'Ciprofloxacin', 'Antibiotic', 'Tablet', '500mg', 'Bayer', 6.50, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(18, 'Cetirizine', 'Allergy', 'Tablet', '10mg', 'Zydus', 2.90, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(19, 'Amoxicillin', 'Antibiotic', 'Capsule', '500mg', 'GSK', 5.80, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(20, 'Azithromycin', 'Antibiotic', 'Tablet', '250mg', 'Pfizer', 7.30, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(21, 'Doxycycline', 'Antibiotic', 'Capsule', '100mg', 'Sanofi', 5.00, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(22, 'Prednisolone', 'Steroid', 'Tablet', '5mg', 'Merck', 4.60, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(23, 'Hydrochlorothiazide', 'Diuretic', 'Tablet', '25mg', 'Bayer', 3.80, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(24, 'Warfarin', 'Blood Thinner', 'Tablet', '5mg', 'Boehringer Ingelheim', 6.00, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(25, 'Metoprolol', 'Blood Pressure', 'Tablet', '50mg', 'Novartis', 4.50, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(26, 'Furosemide', 'Diuretic', 'Tablet', '40mg', 'Sanofi', 3.90, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(27, 'Insulin Glargine', 'Diabetes', 'Injection', '100 IU/ml', 'Sanofi', 12.00, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(28, 'Morphine', 'Painkiller', 'Injection', '10mg/ml', 'Pfizer', 15.00, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(29, 'Clarithromycin', 'Antibiotic', 'Tablet', '500mg', 'AbbVie', 8.50, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(30, 'Methotrexate', 'Cancer', 'Tablet', '2.5mg', 'Pfizer', 18.00, '2025-03-03 12:46:24', '2025-03-03 12:46:24'),
(31, 'Haloperidol', 'Antipsychotic', 'Tablet', '5mg', 'Janssen', 7.00, '2025-03-03 12:46:24', '2025-03-03 12:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `hms_medicine_sales`
--

CREATE TABLE `hms_medicine_sales` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `sold_at` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_migrations`
--

CREATE TABLE `hms_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hms_migrations`
--

INSERT INTO `hms_migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hms_password_reset_tokens`
--

CREATE TABLE `hms_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_patients`
--

CREATE TABLE `hms_patients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `emergency_contact` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `blood_group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `insurance_provider` varchar(255) DEFAULT NULL,
  `insurance_number` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_patients`
--

INSERT INTO `hms_patients` (`id`, `user_id`, `name`, `date_of_birth`, `email`, `contact_number`, `emergency_contact`, `address`, `gender`, `blood_group`, `insurance_provider`, `insurance_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Doe', '1990-05-15', NULL, '+1234567890', '+0987654321', '123 Main St, New York, USA', 'male', 'O+', 'BlueCross', 'INS123456', '2025-02-06 13:12:26', '2025-02-06 18:58:08'),
(2, 2, 'Jane Smith', '1985-09-22', NULL, '+9876543210', '+0123456789', '456 Elm St, California, USA', 'female', 'A-', 'UnitedHealth', 'INS987654', '2025-02-06 13:12:26', '2025-02-06 18:58:12'),
(3, 3, 'lwjfrenc ecwe', '1992-07-10', NULL, '+1122334455', '+5544332211', '789 Oak St, Texas, USA', 'female', 'B+', 'Aetna', 'INS556677', '2025-02-06 13:12:26', '2025-02-06 13:16:48'),
(4, 4, 'Emily Davis', '1998-12-05', NULL, '+6655443322', '+2233445566', '321 Pine St, Florida, USA', 'female', 'AB-', 'Cigna', 'INS998877', '2025-02-06 13:12:26', '2025-02-06 18:58:23'),
(6, 2, 'Shawon Islam', '1985-09-22', NULL, '+9876543210', '+0123456789', '456 Elm St, California, USA', 'male', 'A-', 'UnitedHealth', 'INS987654', '2025-02-06 13:03:44', '2025-02-06 13:03:44'),
(7, 4, 'FAQRUL ISLAM TAPAN', '1998-12-05', NULL, '+6655443322', '+2233445566', '321 Pine St, Florida, USA', 'male', 'AB-', 'Cigna', 'INS998877', '2025-02-06 13:05:58', '2025-02-06 13:05:58'),
(8, 2, 'Shawon Islam', '2025-02-04', 'shawon.idb61@gmail.com', '8801941424166', '012305121215', 'Shahapur,Sonargaon', 'male', 'AB+', NULL, NULL, '2025-02-23 21:04:45', '2025-02-26 11:36:51'),
(10, 1, 'Shawon Islam', '2025-02-23', 'shawon.idb61@gmail.com', '+8801941424166', '012305121215', 'Shahapur,Sonargaon', 'male', 'AB+', NULL, NULL, '2025-02-23 21:09:42', '2025-02-23 21:09:42'),
(11, 1, 'Shawon Islam4', '2025-03-04', 'shawoni397@gmail.com', '45634563', '45685463', 'Shahapur', 'male', 'B+', NULL, NULL, '2025-03-04 10:35:20', '2025-03-04 10:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `hms_patient_medical_histories`
--

CREATE TABLE `hms_patient_medical_histories` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `prescriptions` text DEFAULT NULL,
  `treatments` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_payment_details`
--

CREATE TABLE `hms_payment_details` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_mode` enum('cash','credit_card','insurance','online') DEFAULT 'cash',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_payment_details`
--

INSERT INTO `hms_payment_details` (`id`, `billing_id`, `amount`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 1, 1000.00, 'cash', '2023-05-24 11:45:00', '2023-05-24 11:45:00'),
(2, 1, 1000.00, 'credit_card', '2023-05-24 11:45:00', '2023-05-24 11:45:00'),
(3, 2, 500.00, 'online', '2023-05-24 11:45:00', '2023-05-24 11:45:00'),
(4, 3, 500.00, 'insurance', '2023-05-24 11:45:00', '2023-05-24 11:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `hms_payment_statuss`
--

CREATE TABLE `hms_payment_statuss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_payment_statuss`
--

INSERT INTO `hms_payment_statuss` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'paid', '2025-02-17 10:35:44', '2025-02-17 10:35:44'),
(2, 'pending', '2025-02-17 10:35:44', '2025-02-17 10:35:44'),
(3, 'Due', '2025-02-22 17:12:22', '2025-02-22 17:12:22'),
(4, 'cancel', '2025-02-17 10:35:44', '2025-02-17 10:35:44'),
(5, 'refund', '2025-02-17 10:35:44', '2025-02-17 10:35:44'),
(6, 'partially paid', '2025-02-17 10:35:44', '2025-02-17 10:35:44'),
(7, 'partially due', '2025-02-17 10:35:44', '2025-02-17 10:35:44'),
(8, 'partially cancel', '2025-02-17 10:35:44', '2025-02-17 10:35:44'),
(9, 'partially refund', '2025-02-17 10:35:44', '2025-02-17 10:35:44'),
(10, 'DNP', '2025-02-18 13:09:54', '2025-02-18 13:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `hms_pharmacies`
--

CREATE TABLE `hms_pharmacies` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `batch_number` varchar(50) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_reports`
--

CREATE TABLE `hms_reports` (
  `id` int(11) NOT NULL,
  `report_type` enum('finance','patients','appointments','beds','pharmacy') DEFAULT NULL,
  `generated_at` datetime DEFAULT current_timestamp(),
  `details` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_roles`
--

CREATE TABLE `hms_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_roles`
--

INSERT INTO `hms_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2025-02-22 00:56:28', '2025-02-22 00:56:28'),
(2, 'Admin', '2025-02-22 00:57:44', '2025-02-22 00:57:44'),
(3, 'Doctor', '2025-02-22 01:00:27', '2025-02-22 01:00:27'),
(4, 'Patient', '2025-02-17 10:36:09', '2025-02-25 16:21:13'),
(5, 'Receptionist', '2025-02-17 10:36:09', '2025-02-25 16:21:22'),
(7, 'Drug Dealer', '2025-02-22 02:44:46', '2025-02-22 02:44:46'),
(8, 'Suppliers', '2025-02-22 15:24:39', '2025-02-22 15:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `hms_services`
--

CREATE TABLE `hms_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_services`
--

INSERT INTO `hms_services` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'General Consultation', 100.00, '2025-03-03 12:43:30', '2025-03-03 12:43:30'),
(2, 'Oxygen Cylinder', 200.00, '2025-03-03 12:43:30', '2025-03-03 23:28:04'),
(3, 'Blood Bank', 150.00, '2025-03-03 12:43:30', '2025-03-03 23:28:22'),
(4, 'Cleaning', 500.00, '2025-03-03 12:43:30', '2025-03-03 23:28:40'),
(5, 'Breakfast', 300.00, '2025-03-03 12:43:30', '2025-03-03 23:28:59'),
(6, 'Launch', 400.00, '2025-03-03 12:43:30', '2025-03-03 23:29:06'),
(7, 'Dinner', 250.00, '2025-03-03 12:43:30', '2025-03-03 23:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `hms_sessions`
--

CREATE TABLE `hms_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hms_sessions`
--

INSERT INTO `hms_sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iPJ8jzT0ydkgM1o5S5o69Y3CpRYLsS2IHEEyLq6u', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibTRHNWRzV1hTVTdOUExPM1ViMzREWUZ4Z2hBVHBWOUlURDJ4RUVuQiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBwb2ludG1lbnRzL2FwcHJvdmVkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1741241110),
('ktWc61anZcSD8F7YPizQT8KkYFuPI1Op0CRM25Ad', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRENycjcxb1lMNUtuZzNmM09aQVBZMnFjaVRvd3JMYzc4c3hmQ2JDUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHA6Ly9sb2NhbGhvc3QvTEFSQVZFTF9CRUdJTklORy9QUk9KRUNULUhNUy1TSEFBTi9wdWJsaWMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741197648),
('OWtLYUSarSoeNU4o5oSYmWCZuVmeJ7ir0Mw7DTOq', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaEplMTdIMk9ORU9XUm9KaW5hemRLd3FYcjJZbzlWRE1jSVdqZXFIUyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvaW52b2ljZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1741203260),
('rqO2FTosHIycQWrUHob9Kvr3CjG9RR9OUOtUyY7D', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicGFZRmFMVGJwREhUUWlobHVUWm5CeDVVYzVQbkkyQnh3aTFVRXVxZSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYmVkYXNzaWdubWVudHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1741190972);

-- --------------------------------------------------------

--
-- Table structure for table `hms_statuss`
--

CREATE TABLE `hms_statuss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_statuss`
--

INSERT INTO `hms_statuss` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2025-02-17 10:35:44', '2025-02-23 20:53:33'),
(2, 'Inactive', '2025-02-17 10:35:44', '2025-02-23 20:53:41'),
(3, 'Approved', '2025-02-17 10:35:44', '2025-02-25 16:48:40'),
(4, 'Pending', '2025-02-17 10:35:44', '2025-02-23 20:53:48'),
(5, 'Completed', '2025-02-17 10:35:44', '2025-02-23 20:53:54'),
(6, 'Cancelled', '2025-02-17 10:35:44', '2025-02-23 20:53:58'),
(7, 'Confirmed', '2025-02-17 10:35:44', '2025-02-22 10:36:01'),
(8, 'Reschedule', '2025-02-17 10:35:44', '2025-02-24 20:25:42'),
(9, 'Processing', '2025-02-17 10:35:44', '2025-02-25 16:48:30'),
(10, 'Available', '2025-02-17 10:35:44', '2025-02-22 10:49:00'),
(11, 'Occupied', '2025-02-17 10:35:44', '2025-02-23 20:54:07'),
(12, 'Maintenance', '2025-02-17 10:35:44', '2025-02-23 20:54:16'),
(13, 'Deleted', '2025-02-17 10:35:44', '2025-02-23 20:54:21'),
(14, 'Shawon Islam', '2025-02-22 16:07:11', '2025-02-22 16:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `hms_suppliers`
--

CREATE TABLE `hms_suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_users`
--

CREATE TABLE `hms_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hms_users`
--

INSERT INTO `hms_users` (`id`, `name`, `email`, `email_verified_at`, `role_id`, `phone`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-02-12 21:34:33', 3, '78456892345', 'uytgr oiugrtofiwuer oiugh', '$2y$12$Z.8.vn7a4HgzWeJ4IgvAMeZSHmlTIZ.zHo/uROEU0ZuSVMbSXB/Ja', 'lkeSA7goJL', '2025-02-12 21:34:33', '2025-02-12 21:34:33'),
(2, 'Shawon Islam', 'shawoni397@gmail.com', NULL, 1, '96793528096', 'iry7t oiurtgoiqu rugt ', '$2y$12$vOEvZdBf/ZOzD3lyMb42D.VoxUwR5dt/7m83sB.zT8Hfv3GVmwU8.', 'd1dnqkaUE9hQFyBoNP5PMgpa76kUjoOpxu94yDbrD4W7IPUBWjbfttvlPXAP', '2025-02-12 21:47:48', '2025-02-12 21:47:48'),
(3, 'Shawon Islam', 'sshawoni397@gmail.com', NULL, 2, '2956209356', 'kiuerty iurt iurt y', '$2y$12$vOEvZdBf/ZOzD3lyMb42D.VoxUwR5dt/7m83sB.zT8Hfv3GVmwU8.', '6R6dWOvrpszjmeunt1U3Jrz4tN86rm2aFbCIxMqngat7rTYKBGzJNxAC5MED', '2025-02-16 01:20:47', '2025-02-16 01:20:47'),
(4, 'Shawon Islam', 'shawon.idb61@gmail.com', NULL, 4, '2452345234', 'asdgbv aweg we ', '$2y$12$vOEvZdBf/ZOzD3lyMb42D.VoxUwR5dt/7m83sB.zT8Hfv3GVmwU8.', '2lTptYbQVRZqxnx20rwOjAP7Mnau8iB6Yno85olLx8bCPZk2aQ1xkk89GKI7', '2025-02-19 07:12:22', '2025-02-19 07:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `hms_wards`
--

CREATE TABLE `hms_wards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_wards`
--

INSERT INTO `hms_wards` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'ICU - A1', 'ICU', '2025-02-19 21:01:01', '2025-02-19 21:29:18'),
(2, 'General Ward - B2', 'General Wards', '2025-02-19 21:01:01', '2025-02-19 21:29:28'),
(3, 'Private Room - C3', 'Private sections', '2025-02-19 21:01:01', '2025-02-19 21:29:38'),
(4, 'Emergency - D4', 'Emergency', '2025-02-19 21:01:01', '2025-02-19 21:29:48'),
(5, 'Local wards', 'Locals in the floor', '2025-02-19 21:29:55', '2025-02-19 21:29:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hms_appointments`
--
ALTER TABLE `hms_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_appointment_trasheds`
--
ALTER TABLE `hms_appointment_trasheds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_beds`
--
ALTER TABLE `hms_beds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_bed_assignments`
--
ALTER TABLE `hms_bed_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_billings`
--
ALTER TABLE `hms_billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_billing_beds`
--
ALTER TABLE `hms_billing_beds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_billing_consultations`
--
ALTER TABLE `hms_billing_consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_billing_lab_tests`
--
ALTER TABLE `hms_billing_lab_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_billing_medicines`
--
ALTER TABLE `hms_billing_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_billing_services`
--
ALTER TABLE `hms_billing_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_cache`
--
ALTER TABLE `hms_cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `hms_cache_locks`
--
ALTER TABLE `hms_cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `hms_consultations`
--
ALTER TABLE `hms_consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_consultation_lab_tests`
--
ALTER TABLE `hms_consultation_lab_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_departments`
--
ALTER TABLE `hms_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_doctors`
--
ALTER TABLE `hms_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_doctor_availabilities`
--
ALTER TABLE `hms_doctor_availabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_failed_jobs`
--
ALTER TABLE `hms_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hms_hospitals`
--
ALTER TABLE `hms_hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_jobs`
--
ALTER TABLE `hms_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `hms_job_batches`
--
ALTER TABLE `hms_job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_lab_tests`
--
ALTER TABLE `hms_lab_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_lab_test_categories`
--
ALTER TABLE `hms_lab_test_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `hms_medicines`
--
ALTER TABLE `hms_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_medicine_sales`
--
ALTER TABLE `hms_medicine_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_migrations`
--
ALTER TABLE `hms_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_password_reset_tokens`
--
ALTER TABLE `hms_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `hms_patients`
--
ALTER TABLE `hms_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_patient_medical_histories`
--
ALTER TABLE `hms_patient_medical_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_payment_details`
--
ALTER TABLE `hms_payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_payment_statuss`
--
ALTER TABLE `hms_payment_statuss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_pharmacies`
--
ALTER TABLE `hms_pharmacies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_reports`
--
ALTER TABLE `hms_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_roles`
--
ALTER TABLE `hms_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_services`
--
ALTER TABLE `hms_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_sessions`
--
ALTER TABLE `hms_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `hms_statuss`
--
ALTER TABLE `hms_statuss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_suppliers`
--
ALTER TABLE `hms_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_users`
--
ALTER TABLE `hms_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `hms_wards`
--
ALTER TABLE `hms_wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hms_appointments`
--
ALTER TABLE `hms_appointments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hms_appointment_trasheds`
--
ALTER TABLE `hms_appointment_trasheds`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hms_beds`
--
ALTER TABLE `hms_beds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hms_bed_assignments`
--
ALTER TABLE `hms_bed_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hms_billings`
--
ALTER TABLE `hms_billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hms_billing_beds`
--
ALTER TABLE `hms_billing_beds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hms_billing_consultations`
--
ALTER TABLE `hms_billing_consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hms_billing_lab_tests`
--
ALTER TABLE `hms_billing_lab_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hms_billing_medicines`
--
ALTER TABLE `hms_billing_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hms_billing_services`
--
ALTER TABLE `hms_billing_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hms_consultations`
--
ALTER TABLE `hms_consultations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hms_consultation_lab_tests`
--
ALTER TABLE `hms_consultation_lab_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hms_departments`
--
ALTER TABLE `hms_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hms_doctors`
--
ALTER TABLE `hms_doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hms_doctor_availabilities`
--
ALTER TABLE `hms_doctor_availabilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hms_failed_jobs`
--
ALTER TABLE `hms_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_hospitals`
--
ALTER TABLE `hms_hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hms_jobs`
--
ALTER TABLE `hms_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_lab_tests`
--
ALTER TABLE `hms_lab_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hms_lab_test_categories`
--
ALTER TABLE `hms_lab_test_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hms_medicines`
--
ALTER TABLE `hms_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hms_medicine_sales`
--
ALTER TABLE `hms_medicine_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_migrations`
--
ALTER TABLE `hms_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hms_patients`
--
ALTER TABLE `hms_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hms_patient_medical_histories`
--
ALTER TABLE `hms_patient_medical_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_payment_details`
--
ALTER TABLE `hms_payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hms_payment_statuss`
--
ALTER TABLE `hms_payment_statuss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hms_pharmacies`
--
ALTER TABLE `hms_pharmacies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_reports`
--
ALTER TABLE `hms_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_roles`
--
ALTER TABLE `hms_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hms_services`
--
ALTER TABLE `hms_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hms_statuss`
--
ALTER TABLE `hms_statuss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hms_suppliers`
--
ALTER TABLE `hms_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_users`
--
ALTER TABLE `hms_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hms_wards`
--
ALTER TABLE `hms_wards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
