<?php
// Configuración de la base de datos
$host     = 'localhost';
$dbname   = 'ordinarybloom';
$username = 'root';
$password = '';

try {
    // Crear la conexión PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Configurar PDO para que lance excepciones cuando ocurra un error
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configurar el modo de obtención de datos por defecto (array asociativo)
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Manejo básico de errores si no conecta
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
