CREATE DATABASE IF NOT EXISTS urbanspark;
USE urbanspark;

CREATE TABLE IF NOT EXISTS ideas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    email VARCHAR(255) NOT NULL,
    file_path VARCHAR(255),
    likes INT DEFAULT 0,
    status VARCHAR(20) DEFAULT 'Pending',
    feedback TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admins (username, password) VALUES 
('admin', '$2y$10$8i5Oo58g5EF.ZOXGPrqyUuHx3pVGBE0zQMTvBhI0zVX9SAUzVjASy'); 