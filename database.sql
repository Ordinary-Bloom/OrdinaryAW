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
('Glow Up Mental: Hábitos Diarios', 'Descubre cómo transformar tu mentalidad con pequeños pasos constantes.', 'https://vm.tiktok.com/ZNR9BUPQN/', 1),
('Rutina Full Body - Sin Equipo', 'Entrenamiento intenso y efectivo para tonificar todo el cuerpo en casa.', 'https://vm.tiktok.com/ZNR9BbTAJ/', 2),
('Skincare Ritual: Piel Radiante', 'Los secretos para una piel luminosa este verano. Productos y técnicas.', 'https://vm.tiktok.com/ZNR9B5VaY/', 3),
('Confianza y Autoestima', 'Aprende a amarte y proyectar tu mejor versión al mundo.', 'https://vm.tiktok.com/ZNR9BaLPr/', 1);

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
