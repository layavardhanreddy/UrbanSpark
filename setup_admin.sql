CREATE DATABASE IF NOT EXISTS urbanspark;
USE urbanspark;

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admins (username, password) VALUES 
('admin', '$2y$10$8i5Oo58g5EF.ZOXGPrqyUuHx3pVGBE0zQMTvBhI0zVX9SAUzVjASy'); 