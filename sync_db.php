<?php
// Configuración local para la sincronización
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'alumno3_OrdinaryBloom'; // El nombre que espera config.php

try {
    // Conectar primero sin base de datos para crearla si no existe
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Creando base de datos '$db_name' si no existe...\n";
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$db_name`");

    $pdo->beginTransaction();

    // Crear tablas si no existen (basado en database.sql)
    echo "Asegurando que las tablas existan...\n";
    $pdo->exec("CREATE TABLE IF NOT EXISTS categorias (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL
    )");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS publicaciones (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        descripcion TEXT,
        video_url VARCHAR(255),
        fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
        id_categoria INT,
        FOREIGN KEY (id_categoria) REFERENCES categorias(id) ON DELETE CASCADE ON UPDATE CASCADE
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS testimonios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre_usuario VARCHAR(100) NOT NULL,
        nivel_felicidad INT,
        experiencia TEXT NOT NULL,
        fecha DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // Desactivar temporalmente las restricciones de claves foráneas
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0");

    // Limpiar tablas para evitar duplicados o conflictos de IDs
    echo "Limpiando tablas...\n";
    $pdo->exec("TRUNCATE TABLE publicaciones");
    $pdo->exec("TRUNCATE TABLE categorias");
    $pdo->exec("TRUNCATE TABLE testimonios");

    // Insertar categorías
    echo "Insertando categorías...\n";
    $pdo->exec("INSERT INTO categorias (id, nombre) VALUES 
    (1, 'Superación Personal'),
    (2, 'Fitness'),
    (3, 'Cuidado Personal')");

    // Insertar publicaciones (con los enlaces actualizados)
    echo "Insertando publicaciones actualizadas...\n";
    $pdo->exec("INSERT INTO publicaciones (id, titulo, descripcion, video_url, id_categoria) VALUES 
    (1, 'Glow Up Mental: Hábitos Diarios', 'Descubre cómo transformar tu mentalidad con pequeños pasos constantes.', 'https://youtu.be/igec_McVFKY?si=DvGWlz83DpH-2nuw', 1),
    (2, 'Rutina Full Body - Sin Equipo', 'Entrenamiento intenso y efectivo para tonificar todo el cuerpo en casa.', 'https://youtu.be/7fSDTZkbO20?si=VRDvtdK6O-XFHtF_', 2),
    (3, 'Skincare Ritual: Piel Radiante', 'Los secretos para una piel luminosa este verano. Productos y técnicas.', 'https://youtu.be/32zVmuct7OQ?si=AmZQ_0d1MHK5WcRZ', 3),
    (4, 'Confianza y Autoestima', 'Aprende a amarte y proyectar tu mejor versión al mundo.', 'https://youtu.be/xtXf_2s14gg?si=qCH8XcHuS5fxuCPI', 1)");

    // Insertar testimonios
    echo "Insertando testimonios...\n";
    $pdo->exec("INSERT INTO testimonios (id, nombre_usuario, nivel_felicidad, experiencia) VALUES 
    (1, 'Clara Márquez', 9, 'Desde que dedico tiempo a mis propios rituales de cuidado, mi ansiedad ha bajado muchísimo y me siento más conectada conmigo misma.'),
    (2, 'Laura Gutiérrez', 10, 'El autoconocimiento me abrió las puertas a una paz mental inmensa. Ahora confío en mis decisiones y vivo con mayor plenitud.'),
    (3, 'Andrés Silva', 8, 'Empezar a ejercitarme suavemente no solo mejoró mi salud física, sino que elevó mi estado de ánimo y mi amor propio.')");

    // Volver a activar las restricciones de claves foráneas
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1");

    $pdo->commit();
    echo "¡Sincronización completada con éxito! Los enlaces han sido actualizados.\n";

} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "Error durante la sincronización: " . $e->getMessage() . "\n";
}
?>
