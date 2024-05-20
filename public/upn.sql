CREATE DATABASE upn;
USE upn;

CREATE TABLE users (
    idUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    apellido VARCHAR(50),
    telefono VARCHAR(10) UNIQUE,
    correo VARCHAR(80) UNIQUE,
    usuario VARCHAR(10) UNIQUE,
    contraseña VARCHAR(20),
    rol ENUM('Estudiante', 'Administrador', 'Maestro'),
    created_at DATETIME NULL,
    updated_at DATETIME NULL,
    deleted_at DATETIME NULL
);

CREATE TABLE equipos (
    idEquipo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre TEXT,
    marca TEXT,
    modelo TEXT,
    descripcion TEXT,
    tipo ENUM('Computadora', 'Impresora', 'Fotocopiadora', 'Television'),
    estado ENUM('Disponible', 'En reparacion', 'Dañado'),
    created_at DATETIME NULL,
    updated_at DATETIME NULL,
    deleted_at DATETIME NULL
);

CREATE TABLE mobiliario (
    idMobiliario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    cantidad INT,
    tipo VARCHAR(30),
    idProveedor INT,
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    FOREIGN KEY(idProveedor) REFERENCES proveedores(idProveedor) ON DELETE CASCADE
);

CREATE TABLE proveedores (
    idProveedor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    telefono VARCHAR(10),
    correo VARCHAR(80) UNIQUE,
    direccion TEXT,
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME
);

CREATE TABLE mantenimiento (
    idMantenimiento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idEquipo INT,
    tipo ENUM('Equipo', 'Dispositivo', 'Mobiliario'),
    fechaMantenimiento DATE,
    fechaSalida DATE,
    fechaIngreso DATE,
    descripcion TEXT,
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    FOREIGN KEY(idEquipo) REFERENCES equipos(idEquipo) ON DELETE CASCADE
);
