DROP DATABASE IF EXISTS hospital_management;
CREATE DATABASE IF NOT EXISTS hospital_management;
USE hospital_management;

-- 🌟 Hospital Table
DROP TABLE IF EXISTS hms_hospitals;
CREATE TABLE if not exists hms_hospitals
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) ,
    country VARCHAR(30),
    address VARCHAR(50),
    phone VARCHAR(30),
    email VARCHAR(30),
    description VARCHAR(100),
    logo VARCHAR(255),
    banner VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
-- 🌟 User Management (RBAC)
DROP TABLE IF EXISTS hms_roles;
CREATE TABLE if not exists hms_roles (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    name ENUM('super_admin', 'admin', 'doctor', 'patient', 'receptionist'),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS hms_users;
CREATE TABLE if not exists hms_users (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) ,
    email VARCHAR(255)  ,
    password VARCHAR(255) ,
    role_id INT  ,
    phone VARCHAR(20) ,
    address TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 🌟 Hospital Departments
DROP TABLE IF EXISTS hms_departments;
CREATE TABLE if not exists hms_departments (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)  ,
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 🌟 Doctors & Availability
DROP TABLE IF EXISTS hms_doctors;
CREATE TABLE if not exists hms_doctors (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    user_id INT   ,
    department_id INT  ,
    specialization VARCHAR(255) ,
    experience INT  COMMENT 'Years of Experience',
    contact_number VARCHAR(20) ,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS hms_doctor_availability;
CREATE TABLE if not exists hms_doctor_availability (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    doctor_id INT  ,
    day ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') ,
    start_time TIME ,
    end_time TIME ,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 🌟 Patient Management
DROP TABLE IF EXISTS hms_patients;
CREATE TABLE if not exists hms_patients (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(255) ,
    date_of_birth DATE ,
    email VARCHAR(255) ,
    contact_number VARCHAR(20) ,
    emergency_contact VARCHAR(20) ,
    address TEXT,
    gender ENUM('male', 'female', 'other') ,
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-') ,
    insurance_provider VARCHAR(255),
    insurance_number VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS hms_patient_medical_histories;
CREATE TABLE if not exists hms_patient_medical_histories (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    patient_id INT  ,
    diagnosis TEXT,
    prescriptions TEXT,
    treatments TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 🌟 Appointment System
DROP TABLE IF EXISTS hms_appointments;
CREATE TABLE if not exists hms_appointments (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    patient_id INT  ,
    doctor_id INT  ,
    appointment_date DATETIME ,
    status ENUM('pending', 'confirmed', 'cancelled', 'completed', 'rescheduled') DEFAULT 'pending',
    cancellation_reason TEXT NULL,
    consultation_notes TEXT NULL,
    payment_status ENUM('unpaid', 'paid', 'partial') DEFAULT 'unpaid',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 🌟 Billing & Payments
DROP TABLE IF EXISTS hms_billings;
CREATE TABLE if not exists hms_billings (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    patient_id INT  ,
    total_amount DECIMAL(10,2) ,
    discount DECIMAL(10,2) DEFAULT 0.00,
    tax DECIMAL(10,2) DEFAULT 0.00,
    paid_amount DECIMAL(10,2) DEFAULT 0.00,
    balance_amount DECIMAL(10,2) GENERATED ALWAYS AS (total_amount - discount + tax - paid_amount) STORED,
    payment_status ENUM('pending', 'paid', 'partial') DEFAULT 'pending',
    payment_mode ENUM('cash', 'credit_card', 'insurance', 'online') DEFAULT 'cash',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 🌟 Bed & Ward Management
DROP TABLE IF EXISTS hms_wards;
CREATE TABLE if not exists hms_wards (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) ,
    type ENUM('ICU', 'General Ward', 'Private Room', 'Emergency') ,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS hms_beds;
CREATE TABLE if not exists hms_beds (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    bed_number VARCHAR(50)  ,
    ward_id INT  ,
    status ENUM('available', 'occupied', 'maintenance') DEFAULT 'available',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS hms_bed_assignments;
CREATE TABLE if not exists hms_bed_assignments (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    bed_id INT  ,
    patient_id INT  ,
    assigned_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    discharged_at DATETIME NULL DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 🌟 Pharmacy Management
DROP TABLE IF EXISTS hms_suppliers;
CREATE TABLE if not exists hms_suppliers (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) ,
    contact VARCHAR(255),
    email VARCHAR(255),
    address TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS hms_pharmacies;
CREATE TABLE if not exists hms_pharmacies (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    medicine_name VARCHAR(255)  ,
    manufacturer VARCHAR(255) ,
    supplier_id INT  ,
    batch_number VARCHAR(50),
    stock_quantity INT ,
    expiry_date DATE ,
    price DECIMAL(10,2) ,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS hms_medicine_sales;
CREATE TABLE if not exists hms_medicine_sales (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    patient_id INT  ,
    medicine_id INT  ,
    quantity INT ,
    total_price DECIMAL(10,2) ,
    sold_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 🌟 Reports & Analytics
DROP TABLE IF EXISTS hms_reports;
CREATE TABLE if not exists hms_reports (
    id INT  AUTO_INCREMENT PRIMARY KEY,
    report_type ENUM('finance', 'patients', 'appointments', 'beds', 'pharmacy') ,
    generated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    details TEXT ,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
