CREATE DATABASE projetb2; 
USE projetb2; 
CREATE TABLE users (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50), password VARCHAR(255), role ENUM('admin', 'user')); 
INSERT INTO users (username, password, role) VALUES ('admin', 'password', 'admin');
