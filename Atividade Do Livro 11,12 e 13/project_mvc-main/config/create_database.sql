create database project_mvc;
use project_mvc;
create table users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(100) NOT NULL
);
create table tasks(
idtask INT AUTO_INCREMENT PRIMARY KEY,
task VARCHAR(60) NOT NULL,
prazo VARCHAR(60) NOT NULL
);
