CREATE DATABASE IF NOT EXISTS ALMACEN_DB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

USE ALMACEN_DB;

CREATE TABLE IF NOT EXISTS Categorias (
    id INT NOT NULL AUTO_INCREMENT,
    -- No se pueden repetir las categorías
    nombre VARCHAR(20) UNIQUE NOT NULL,
    fecha_creacion DATE,
    fecha_actualizacion DATE,
    concurrencia INT,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Productos (
    id INT NOT NULL AUTO_INCREMENT,
    categoria_fk INT NOT NULL,
    nombre VARCHAR(20) UNIQUE NOT NULL,
    descripcion VARCHAR(255),
    stock_minimo INT NOT NULL,
    fecha_creacion DATE,
    fecha_actualizacion DATE,
    concurrencia INT,
    PRIMARY KEY(id),
    FOREIGN KEY(categoria_fk) REFERENCES Categorias(id)
);


CREATE TABLE IF NOT EXISTS Ubicaciones (
    id INT NOT NULL AUTO_INCREMENT,
    -- No se pueden repetir las ubicaciones
    nombre VARCHAR(20) UNIQUE NOT NULL,
    fecha_creacion DATE,
    fecha_actualizacion DATE,
    concurrencia INT,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Ventas (
    id INT NOT NULL AUTO_INCREMENT,
    -- No se pueden repetir las ventas
    nombre VARCHAR(20) UNIQUE NOT NULL,
    fecha_creacion DATE,
    fecha_actualizacion DATE,
    concurrencia INT,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Ejemplares (
    id INT NOT NULL AUTO_INCREMENT,
    producto_fk INT NOT NULL,
    ubicacion_fk INT NOT NULL,
    venta_fk INT,
    precio INT NOT NULL,
    fecha_creacion DATE,
    fecha_actualizacion DATE,
    concurrencia INT,
    PRIMARY KEY(id),
    FOREIGN KEY(producto_fk) REFERENCES Productos(id),
    FOREIGN KEY(ubicacion_fk) REFERENCES Ubicaciones(id),
    FOREIGN KEY(venta_fk) REFERENCES Ventas(id)
);
