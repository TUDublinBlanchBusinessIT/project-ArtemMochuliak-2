CREATE DATABASE IF NOT EXISTS car_maintenance;
USE car_maintenance;

CREATE TABLE basic_log_v2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100) NOT NULL,
    cost DECIMAL(10,2) NOT NULL,
    service_date DATE NOT NULL
);
