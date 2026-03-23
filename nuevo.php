<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Publicación - OrdinaryBloom</title>
    <!-- Incluimos la misma hoja de estilos -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navegación -->
    <nav class="navbar">
        <a href="index.php" class="brand">Ordinary<span>Bloom</span></a>
        <div class="nav-links">
            <a href="index.php">Inicio</a>
            <a href="#">Categorías</a>
            <a href="nuevo.php" class="btn-primary">Nueva Publicación</a>
        </div>
    </nav>

    <!-- Contenedor del Formulario -->
    <main class="container">
        <h1 class="page-title">Crear una publicación</h1>
        
        <div class="form-container">
            <!-- El formulario enviará los datos a guardar.php más adelante -->
            <form action="guardar.php" method="POST">
                <div class="form-group">
                    <label class="form-label" for="titulo">Título de la publicación</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Ej. El ritual del glow nocturno" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="categoria">Categoría</label>
                    <select id="categoria" name="id_categoria" class="form-control" required>
                        <option value="">Selecciona una categoría encantadora...</option>
                        <option value="1">Superación Personal</option>
                        <option value="2">Fitness</option>
                        <option value="3">Cuidado Personal</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="video_url">URL del Video (YouTube / Vimeo)</label>
                    <input type="url" id="video_url" name="video_url" class="form-control" placeholder="https://..." required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Escribe la esencia de esta publicación aquí..." required></textarea>
                </div>

                <button type="submit" class="submit-btn">Publicar Inspiración</button>
            </form>
        </div>
    </main>

</body>
</html>
