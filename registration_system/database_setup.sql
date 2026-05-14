-- Run this in phpMyAdmin before starting

CREATE DATABASE IF NOT EXISTS registration_db;
USE registration_db;

CREATE TABLE IF NOT EXISTS users (
    id        INT(11)      NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname  VARCHAR(100) NOT NULL,
    dob       VARCHAR(20)  NOT NULL,
    gender    VARCHAR(10)  NOT NULL,
    phone     VARCHAR(20)  NOT NULL,
    email     VARCHAR(100) NOT NULL,
    password  VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
