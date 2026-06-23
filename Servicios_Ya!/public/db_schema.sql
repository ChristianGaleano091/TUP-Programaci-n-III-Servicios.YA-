CREATE DATABASE IF NOT EXISTS servicios_ya CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE servicios_ya;

CREATE TABLE IF NOT EXISTS clientes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    dni VARCHAR(20) NOT NULL,
    location VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    created_date DATE NOT NULL,
    created_time TIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS prestadores (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(80) NOT NULL,
    location VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    user_name VARCHAR(100) NOT NULL,
    dni VARCHAR(20) NOT NULL,
    created_date DATE NOT NULL,
    created_time TIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS reservas (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_id INT UNSIGNED NOT NULL,
    prestador_name VARCHAR(150) NOT NULL,
    service_name VARCHAR(150) NOT NULL,
    category VARCHAR(80) NOT NULL,
    scheduled_date DATE NOT NULL,
    scheduled_time VARCHAR(50) NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'confirmada',
    created_date DATE NOT NULL,
    created_time TIME NOT NULL,
    FOREIGN KEY (client_id) REFERENCES clientes(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
