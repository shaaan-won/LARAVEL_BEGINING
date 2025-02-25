-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 08:50 AM
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
(1, 1, 1, '2025-02-25', '10:00:00', 1, NULL, '2025-02-22 15:19:29', '2025-02-22 15:19:29'),
(2, 2, 2, '2025-02-26', '11:30:00', 5, 'Patient not available', '2025-02-25 07:18:14', '2025-02-25 01:18:24'),
(4, 4, 4, '2025-02-28', '14:45:00', 3, 'Doctor rescheduled', '2025-02-22 15:19:29', '2025-02-22 15:19:29'),
(8, 1, 10, '2025-02-25', '10:58:00', 8, 'juytg ypay 98yhtgw e', '2025-02-25 03:57:07', '2025-02-24 21:58:48');

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
(2, 1, 8, '2025-02-24', '20:59:00', 5, '2025-02-24 23:12:28', '2025-02-24 23:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `hms_beds`
--

CREATE TABLE `hms_beds` (
  `id` int(11) NOT NULL,
  `bed_number` varchar(50) DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL,
  `status` enum('available','occupied','maintenance') DEFAULT 'available',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `hms_billings`
--

CREATE TABLE `hms_billings` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT 0.00,
  `tax` decimal(10,2) DEFAULT 0.00,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `balance_amount` decimal(10,2) GENERATED ALWAYS AS (`total_amount` - `discount` + `tax` - `paid_amount`) STORED,
  `payment_status` enum('pending','paid','partial') DEFAULT 'pending',
  `payment_mode` enum('cash','credit_card','insurance','online') DEFAULT 'cash',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 1, 'Fever, headache', 'Common cold', 'Paracetamol 500mg', 'Patient advised rest and hydration', '2025-02-22 15:19:29', '2025-02-22 15:19:29'),
(2, 3, 'Chest pain', 'Acid reflux', 'Antacid tablets', 'Recommended dietary changes', '2025-02-22 15:19:29', '2025-02-22 15:19:29'),
(3, 4, 'Back pain', 'Muscle strain', 'Pain relief gel', 'Suggested physiotherapy', '2025-02-22 15:19:29', '2025-02-22 15:19:29'),
(4, 1, 'Cough, sore throat', 'Seasonal flu', 'Cough syrup', 'Monitor symptoms and follow up if needed', '2025-02-22 15:19:29', '2025-02-22 15:19:29');

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
(8, NULL, 'Shawon Islam', '2025-02-04', 'shawon.idb61@gmail.com', '8801941424166', '012305121215', 'Shahapur,Sonargaon', 'male', 'AB+', NULL, NULL, '2025-02-23 21:04:45', '2025-02-23 21:04:45'),
(10, 1, 'Shawon Islam', '2025-02-23', 'shawon.idb61@gmail.com', '+8801941424166', '012305121215', 'Shahapur,Sonargaon', 'male', 'AB+', NULL, NULL, '2025-02-23 21:09:42', '2025-02-23 21:09:42');

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
(4, 'patient', '2025-02-17 10:36:09', '2025-02-17 10:36:35'),
(5, 'receptionist', '2025-02-17 10:36:09', '2025-02-17 10:36:41'),
(7, 'Drug Dealer', '2025-02-22 02:44:46', '2025-02-22 02:44:46'),
(8, 'Suppliers', '2025-02-22 15:24:39', '2025-02-22 15:24:39');

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
('avHqFwqnJ3sFOXZZFedjiiFWKLIOzOVbPwMaSrtc', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMmd4TkNKcU5GbVN5d2FiZzN0a1dobk00bU8wWndkcU5NV3FuTzAwUiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZG9jdG9yL2FwcG9pbnRtZW50cz9kb2N0b3JfaWQ9JnN0YXR1c19pZD0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1740469669);

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
(3, 'Suspended', '2025-02-17 10:35:44', '2025-02-23 20:53:44'),
(4, 'Pending', '2025-02-17 10:35:44', '2025-02-23 20:53:48'),
(5, 'Completed', '2025-02-17 10:35:44', '2025-02-23 20:53:54'),
(6, 'Cancelled', '2025-02-17 10:35:44', '2025-02-23 20:53:58'),
(7, 'Confirmed', '2025-02-17 10:35:44', '2025-02-22 10:36:01'),
(8, 'Reschedule', '2025-02-17 10:35:44', '2025-02-24 20:25:42'),
(9, 'Processing', '2025-02-17 10:35:44', '2025-02-24 20:26:05'),
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
(2, 'Shawon Islam', 'shawoni397@gmail.com', NULL, 1, '96793528096', 'iry7t oiurtgoiqu rugt ', '$2y$12$vOEvZdBf/ZOzD3lyMb42D.VoxUwR5dt/7m83sB.zT8Hfv3GVmwU8.', '0cDEhJ3BbAKChGngakYo2d9SMmP9ccdNyJtJPD2K2cZkuFuz8CXscsNecKhO', '2025-02-12 21:47:48', '2025-02-12 21:47:48'),
(3, 'Shawon Islam', 'sshawoni397@gmail.com', NULL, 2, '2956209356', 'kiuerty iurt iurt y', '$2y$12$vOEvZdBf/ZOzD3lyMb42D.VoxUwR5dt/7m83sB.zT8Hfv3GVmwU8.', '6R6dWOvrpszjmeunt1U3Jrz4tN86rm2aFbCIxMqngat7rTYKBGzJNxAC5MED', '2025-02-16 01:20:47', '2025-02-16 01:20:47'),
(4, 'Shawon Islam', 'shawon.idb61@gmail.com', NULL, 3, '2452345234', 'asdgbv aweg we ', '$2y$12$vOEvZdBf/ZOzD3lyMb42D.VoxUwR5dt/7m83sB.zT8Hfv3GVmwU8.', '2lTptYbQVRZqxnx20rwOjAP7Mnau8iB6Yno85olLx8bCPZk2aQ1xkk89GKI7', '2025-02-19 07:12:22', '2025-02-19 07:12:22');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hms_appointment_trasheds`
--
ALTER TABLE `hms_appointment_trasheds`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hms_beds`
--
ALTER TABLE `hms_beds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_bed_assignments`
--
ALTER TABLE `hms_bed_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_billings`
--
ALTER TABLE `hms_billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_consultations`
--
ALTER TABLE `hms_consultations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hms_patient_medical_histories`
--
ALTER TABLE `hms_patient_medical_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
