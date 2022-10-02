DROP DATABASE IF EXISTS AnonByte;

CREATE DATABASE AnonByte;

USE AnonByte;

CREATE TABLE users (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) not null,
    lastname VARCHAR(255) not null,
    email VARCHAR(255) not null UNIQUE,
    password VARCHAR(255) not null
);