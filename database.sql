CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','student','staff') NOT NULL
);

CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  department VARCHAR(50),
  roll_number VARCHAR(20),
  parent_name VARCHAR(100),
  parent_contact VARCHAR(15),
  emergency_contact VARCHAR(15),
  parent_adhar VARCHAR(12)
);

CREATE TABLE staff (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  department VARCHAR(50),
  staff_id VARCHAR(20),
  joining_date DATE,
  role_in_school VARCHAR(50)
);