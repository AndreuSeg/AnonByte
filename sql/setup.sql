DROP DATABASE IF EXISTS AnonByte;

CREATE DATABASE AnonByte;

USE AnonByte;

CREATE TABLE users (
    user_id int not null /* IDENTITY(1, 1) */ AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) not null,
    lastname VARCHAR(255) not null,
    email VARCHAR(255) not null UNIQUE,
    password VARCHAR(255) not null,
    container_id int
);
CREATE TABLE containers (
    container_id int not null /* IDENTITY(1, 1) */ AUTO_INCREMENT PRIMARY KEY,
    container_name VARCHAR(255) not null,
    container_image VARCHAR(255) not null,
    creation_data VARCHAR(255) not null,
    status VARCHAR(255) not null,
    open_ports int not null,
    command VARCHAR(255) not null
);

ALTER TABLE users
   ADD CONSTRAINT FK_Container FOREIGN KEY (container_id)
      REFERENCES containers (container_id)
      ON DELETE CASCADE
      ON UPDATE CASCADE
;