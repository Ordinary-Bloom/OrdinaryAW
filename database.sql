-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS ordinarybloom CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ordinarybloom;

-- Creación de la tabla 'categorias'
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Creación de la tabla 'publicaciones'
CREATE TABLE publicaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    video_url VARCHAR(255),
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Insertar datos de ejemplo en 'categorias'
INSERT INTO categorias (nombre) VALUES 
('Superación Personal'),
('Fitness'),
('Cuidado Personal');

-- Insertar datos de ejemplo reales en 'publicaciones'
INSERT INTO publicaciones (titulo, descripcion, video_url, id_categoria) VALUES 
('Glow Up Mental: Hábitos Diarios', 'Descubre cómo transformar tu mentalidad con pequeños pasos constantes.', 'https://youtu.be/igec_McVFKY?si=DvGWlz83DpH-2nuw', 1),
('Rutina Full Body - Sin Equipo', 'Entrenamiento intenso y efectivo para tonificar todo el cuerpo en casa.', 'https://youtu.be/7fSDTZkbO20?si=VRDvtdK6O-XFHtF_', 2),
('Skincare Ritual: Piel Radiante', 'Los secretos para una piel luminosa este verano. Productos y técnicas.', 'https://youtu.be/32zVmuct7OQ?si=AmZQ_0d1MHK5WcRZ', 3),
('Confianza y Autoestima', 'Aprende a amarte y proyectar tu mejor versión al mundo.', 'https://youtu.be/xtXf_2s14gg?si=qCH8XcHuS5fxuCPI', 1),
('The Ritual of the Nightly Glow', 'True restoration begins not when we close our eyes, but when we open our intention to the evening.', 'https://youtu.be/Sd0-l_DeK3k?si=EtbUIH09VjOMS8Gx', 3);

-- Creación de la tabla 'testimonios'
CREATE TABLE testimonios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(100) NOT NULL,
    nivel_felicidad INT CHECK(nivel_felicidad >= 1 AND nivel_felicidad <= 10),
    experiencia TEXT NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insertar datos de ejemplo en 'testimonios'
INSERT INTO testimonios (nombre_usuario, nivel_felicidad, experiencia) VALUES 
('Clara Márquez', 9, 'Desde que dedico tiempo a mis propios rituales de cuidado, mi ansiedad ha bajado muchísimo y me siento más conectada conmigo misma.'),
('Laura Gutiérrez', 10, 'El autoconocimiento me abrió las puertas a una paz mental inmensa. Ahora confío en mis decisiones y vivo con mayor plenitud.'),
('Andrés Silva', 8, 'Empezar a ejercitarme suavemente no solo mejoró mi salud física, sino que elevó mi estado de ánimo y mi amor propio.');

-- Creación de la tabla 'usuarios'
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

