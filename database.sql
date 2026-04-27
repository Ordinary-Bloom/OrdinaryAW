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
