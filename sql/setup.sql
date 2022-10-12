DROP DATABASE IF EXISTS AnonByte;

CREATE DATABASE AnonByte;

USE AnonByte;

CREATE TABLE users (
    id_user int not null AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) not null,
    lastname VARCHAR(255) not null,
    email VARCHAR(255) not null UNIQUE,
    password VARCHAR(255) not null
);

CREATE TABLE mv (
    id_mv int not nll AUTO_INCREMENT PRIMARY KEY,
    name_mv VARCHAR(255) not null,
)

/* En sqlserver Autoincrement no existe, se usa IDENTITY(1,1) */