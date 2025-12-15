CREATE DATABASE IF NOT EXISTS USUARIOS_DB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE USUARIOS_DB;

CREATE TABLE IF NOT EXISTS Roles (
    id INT NOT NULL AUTO_INCREMENT,
    -- No se pueden repetir los tipos
    -- El tipo más grande es administrador, 13 letras
    nombre VARCHAR(13) UNIQUE NOT NULL,
    fecha_creacion DATE,
    fecha_actualizacion DATE,
    concurrencia INT,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    rol_fk INT NOT NULL,
    nombre VARCHAR(20) NOT NULL,
    correo varchar(64) NOT NULL,
    contrasena varchar(60) NOT NULL, -- Contraseña hasheada con BCRYPT
    fecha_creacion DATE,
    fecha_actualizacion DATE,
    concurrencia INT,
    PRIMARY KEY(id),
    FOREIGN KEY(rol_fk) REFERENCES Roles(id)
);
