-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 08:47 AM
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
-- Database: `hospital_management`
--
drop database if exists `hospital_management`;
CREATE DATABASE IF NOT EXISTS `hospital_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital_management`;
-- --------------------------------------------------------

--
-- Table structure for table `hms_appointments`
--

CREATE TABLE `hms_appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_date` datetime DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled','completed','rescheduled') DEFAULT 'pending',
  `cancellation_reason` text DEFAULT NULL,
  `consultation_notes` text DEFAULT NULL,
  `payment_status` enum('unpaid','paid','partial') DEFAULT 'unpaid',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `hms_departments`
--

CREATE TABLE `hms_departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_doctors`
--

CREATE TABLE `hms_doctors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL COMMENT 'Years of Experience',
  `contact_number` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hms_doctor_availability`
--

CREATE TABLE `hms_doctor_availability` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'Sunrise Hospital', 'India', '67 MG Road, Mumbai', 'sunrise.com', '+91-9876543210', 'help@sunrisehosp.in', '24/7 emergency and specialized care.', 'Sunrise Hospital.png', 'Sunrise Hospital.jpeg', '2025-02-04 23:48:39', '2025-02-05 21:57:01'),
(4, 'MediLife Healthcare', 'Canada', '89 Elm St, Toronto', 'medilife.com', '+1-416-555-7890', 'support@medilife.ca', 'Providing patient-centered care.', 'MediLife Healthcare.jpg', 'MediLife Healthcare.jpg', '2025-02-04 23:48:39', '2025-02-05 21:56:21');

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
(1, 101, 'John Doe', '1990-05-15', 'john.doe@example.com', '+1234567890', '+0987654321', '123 Main St, New York, USA', 'male', 'O+', 'BlueCross', 'INS123456', '2025-02-06 13:12:26', '2025-02-06 13:12:26'),
(2, 102, 'Jane Smith', '1985-09-22', 'jane.smith@example.com', '+9876543210', '+0123456789', '456 Elm St, California, USA', 'female', 'A-', 'UnitedHealth', 'INS987654', '2025-02-06 13:12:26', '2025-02-06 13:12:26'),
(3, 103, 'Michael Johnson', '1992-07-10', 'michael.johnson@example.com', '+1122334455', '+5544332211', '789 Oak St, Texas, USA', 'male', 'B+', 'Aetna', 'INS556677', '2025-02-06 13:12:26', '2025-02-06 13:12:26'),
(4, 104, 'Emily Davis', '1998-12-05', 'emily.davis@example.com', '+6655443322', '+2233445566', '321 Pine St, Florida, USA', 'female', 'AB-', 'Cigna', 'INS998877', '2025-02-06 13:12:26', '2025-02-06 13:12:26');

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
  `name` enum('super_admin','admin','doctor','patient','receptionist') DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hms_users`
--

INSERT INTO `hms_users` (`id`, `name`, `email`, `password`, `role_id`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'johndoe@example.com', '$2y$10$abcdefghijABCDEFGHIJ1234567890', 1, '1234567890', '123 Main St, New York, NY', '2025-02-06 11:33:36', '2025-02-06 11:33:36'),
(2, 'Jane Smith', 'janesmith@example.com', '$2y$10$klmnopqrstKLMNOPQRST1234567890', 2, '9876543210', '456 Elm St, Los Angeles, CA', '2025-02-06 11:33:36', '2025-02-06 11:33:36'),
(3, 'Michael Johnson', 'michaelj@example.com', '$2y$10$uvwxyzUVWXYZ1234567890abcdef', 3, '5551234567', '789 Oak St, Chicago, IL', '2025-02-06 11:33:36', '2025-02-06 11:33:36'),
(4, 'Emily Davis', 'emilyd@example.com', '$2y$10$12345ABCDEABCDEABCDEABCDEABCDE', 2, '6669876543', '321 Pine St, Houston, TX', '2025-02-06 11:33:36', '2025-02-06 11:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `hms_wards`
--

CREATE TABLE `hms_wards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` enum('ICU','General Ward','Private Room','Emergency') DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hms_appointments`
--
ALTER TABLE `hms_appointments`
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
-- Indexes for table `hms_doctor_availability`
--
ALTER TABLE `hms_doctor_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_hospitals`
--
ALTER TABLE `hms_hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_medicine_sales`
--
ALTER TABLE `hms_medicine_sales`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `hms_suppliers`
--
ALTER TABLE `hms_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hms_users`
--
ALTER TABLE `hms_users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `hms_departments`
--
ALTER TABLE `hms_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_doctors`
--
ALTER TABLE `hms_doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_doctor_availability`
--
ALTER TABLE `hms_doctor_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_hospitals`
--
ALTER TABLE `hms_hospitals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hms_medicine_sales`
--
ALTER TABLE `hms_medicine_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_patients`
--
ALTER TABLE `hms_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hms_patient_medical_histories`
--
ALTER TABLE `hms_patient_medical_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_suppliers`
--
ALTER TABLE `hms_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hms_users`
--
ALTER TABLE `hms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hms_wards`
--
ALTER TABLE `hms_wards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
