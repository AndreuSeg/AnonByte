DROP DATABASE IF EXISTS AnonByte;

CREATE DATABASE AnonByte;

USE AnonByte;

CREATE TABLE users (
    user_id int not null AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) not null,
    lastname VARCHAR(255) not null,
    email VARCHAR(255) not null UNIQUE,
    password VARCHAR(255) not null,
    container_id int,
    network_id int
);

CREATE TABLE containers (
    container_id int not null AUTO_INCREMENT PRIMARY KEY,
    container_name VARCHAR(255) not null,
    container_image VARCHAR(255) not null,
    network_id int
);

CREATE TABLE networks (
    network_id int not null AUTO_INCREMENT PRIMARY KEY,
    network_name VARCHAR(255) not null UNIQUE
);

ALTER TABLE users
    ADD FOREIGN KEY (container_id)
        REFERENCES containers (container_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    ADD FOREIGN KEY (network_id)
        REFERENCES networks (network_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
;

ALTER TABLE containers
    ADD FOREIGN KEY (network_id)
        REFERENCES networks (network_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
;
