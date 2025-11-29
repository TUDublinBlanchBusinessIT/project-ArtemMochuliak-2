CREATE DATABASE IF NOT EXISTS car_maintenance;
USE car_maintenance;

CREATE TABLE service_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL
);

INSERT INTO service_types (type_name) VALUES
('Oil Change'),
('Tyre Replacement'),
('Brake Check'),
('Engine Diagnostics'),
('Battery Replacement');

CREATE TABLE basic_log_v3 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_type_id INT NOT NULL,
    cost DECIMAL(10,2) NOT NULL,
    service_date DATE NOT NULL,
    FOREIGN KEY (service_type_id) REFERENCES service_types(id)
);
