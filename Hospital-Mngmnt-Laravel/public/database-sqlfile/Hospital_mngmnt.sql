CREATE DATABASE hospital_management;
USE hospital_management;

CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('super_admin', 'admin', 'doctor', 'patient', 'receptionist') NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE departments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE doctors (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED UNIQUE NOT NULL,
    department_id BIGINT UNSIGNED NOT NULL,
    specialization VARCHAR(255) NOT NULL,
    experience INT NOT NULL COMMENT 'Years of Experience',
    available_days SET('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE CASCADE
);

CREATE TABLE doctor_availability (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    doctor_id BIGINT UNSIGNED NOT NULL,
    day ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE
);

CREATE TABLE patients (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED UNIQUE NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-') NOT NULL,
    insurance_provider VARCHAR(255),
    insurance_number VARCHAR(50),
    contact_number VARCHAR(20) NOT NULL,
    emergency_contact VARCHAR(20) NOT NULL,
    medical_history TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE appointments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patient_id BIGINT UNSIGNED NOT NULL,
    doctor_id BIGINT UNSIGNED NOT NULL,
    appointment_date DATETIME NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled', 'completed', 'rescheduled') DEFAULT 'pending',
    rescheduled_from DATETIME NULL,
    notes TEXT,
    FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
    FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE
);

CREATE TABLE billing (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patient_id BIGINT UNSIGNED NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    discount DECIMAL(10,2) DEFAULT 0.00,
    tax DECIMAL(10,2) DEFAULT 0.00,
    paid_amount DECIMAL(10,2) DEFAULT 0.00,
    balance_amount DECIMAL(10,2) GENERATED ALWAYS AS (total_amount - discount + tax - paid_amount) STORED,
    payment_status ENUM('pending', 'paid', 'partial') DEFAULT 'pending',
    payment_mode ENUM('cash', 'credit_card', 'insurance', 'online') DEFAULT 'cash',
    issued_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE
);

CREATE TABLE beds (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    bed_number VARCHAR(50) UNIQUE NOT NULL,
    ward ENUM('ICU', 'General Ward', 'Private Room', 'Emergency') NOT NULL,
    status ENUM('available', 'occupied', 'maintenance') DEFAULT 'available'
);

CREATE TABLE bed_assignments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    bed_id BIGINT UNSIGNED NOT NULL,
    patient_id BIGINT UNSIGNED NOT NULL,
    assigned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    discharged_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (bed_id) REFERENCES beds(id) ON DELETE SET NULL,
    FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE
);

CREATE TABLE pharmacy (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    medicine_name VARCHAR(255) UNIQUE NOT NULL,
    manufacturer VARCHAR(255) NOT NULL,
    supplier VARCHAR(255),
    batch_number VARCHAR(50),
    stock_quantity INT NOT NULL,
    expiry_date DATE NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

CREATE TABLE medicine_sales (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patient_id BIGINT UNSIGNED NOT NULL,
    medicine_id BIGINT UNSIGNED NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10,2) GENERATED ALWAYS AS (quantity * (SELECT price FROM pharmacy WHERE id = medicine_id)) STORED,
    sold_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
    FOREIGN KEY (medicine_id) REFERENCES pharmacy(id) ON DELETE CASCADE
);

CREATE TABLE reports (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_type ENUM('finance', 'patients', 'appointments', 'beds', 'pharmacy') NOT NULL,
    generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    details TEXT NOT NULL
);

-- Indexes for Performance Optimization
CREATE INDEX idx_doctor_department ON doctors (department_id);
CREATE INDEX idx_patient_contact ON patients (contact_number);
CREATE INDEX idx_appointment_date ON appointments (appointment_date);
CREATE INDEX idx_billing_patient ON billing (patient_id);
CREATE INDEX idx_medicine_sales ON medicine_sales (medicine_id);
