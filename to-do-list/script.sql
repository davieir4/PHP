CREATE DATABASE list;
USE list;

CREATE TABLE tasks (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(50) DEFAULT NULL,
    is_done BOOLEAN DEFAULT FALSE
);