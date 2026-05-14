-- Run this in phpMyAdmin before testing

CREATE DATABASE IF NOT EXISTS section_r;

USE section_r;

CREATE TABLE IF NOT EXISTS users (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    firstname   VARCHAR(100) NOT NULL,
    lastname    VARCHAR(100) NOT NULL,
    dob         VARCHAR(20)  NOT NULL,
    gender      VARCHAR(10)  NOT NULL,
    phone       VARCHAR(20)  NOT NULL,
    email       VARCHAR(150) NOT NULL,
    password    VARCHAR(255) NOT NULL,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
