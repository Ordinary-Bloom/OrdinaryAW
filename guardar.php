<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recibir y sanear datos
    $titulo       = trim($_POST['titulo'] ?? '');
    $descripcion  = trim($_POST['descripcion'] ?? '');
    $id_categoria = trim($_POST['id_categoria'] ?? '');
    $video_url    = trim($_POST['video_url'] ?? '');

    // Validar que todos los campos estén completos
    if (empty($titulo) || empty($descripcion) || empty($id_categoria) || empty($video_url)) {
        die("Error: Todos los campos son obligatorios. Por favor retrocede e inténtalo de nuevo.");
    }

    try {
        // Preparar la consulta SQL (Prepared Statement)
        $sql = "INSERT INTO publicaciones (titulo, descripcion, video_url, id_categoria) 
                VALUES (:titulo, :descripcion, :video_url, :id_categoria)";
        $stmt = $conexion->prepare($sql);
        
        // Vincular los parámetros
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':video_url', $video_url);
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        
        // Ejecutar y redirigir
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            die("Error desconocido al intentar guardar la publicación.");
        }
        
    } catch (PDOException $e) {
        // Manejar errores de base de datos de forma clara
        die("Error de base de datos al guardar: " . $e->getMessage());
    }

} else {
    // Redirigir si se accede al archivo de forma directa (GET)
    header("Location: nuevo.php");
    exit();
}
?>
