<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - OrdinaryBloom</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- Navegación -->
    <nav class="navbar">
        <a href="index.php" class="brand">Ordinary<span>Bloom</span></a>
        <div class="nav-links">
            <a href="index.php">Inicio</a>
            <a href="categorias.php">Categorías</a>
            <a href="nuevo.php" class="btn-primary">Nueva Publicación</a>
        </div>
    </nav>

    <main class="container">
        <h1 class="page-title">Explora nuestras Categorías</h1>

        <!-- ========================= -->
<!--   CARRUSEL DE CATEGORÍAS  -->
<!-- ========================= -->

<style>
/* ====== ESTILOS DEL CARRUSEL ====== */

.carousel-container {
    position: relative;
    width: 100%;
    max-width: 700px;
    margin: auto;
    overflow: hidden;
    border-radius: 12px;
}

.carousel-slide {
    display: none;
    position: relative;
}

.carousel-slide.active {
    display: block;
}

.carousel-slide img {
    width: 100%;
    display: block;
    border-radius: 12px;
}

.carousel-caption {
    position: absolute;
    bottom: 15px;
    left: 20px;
    color: white;
    text-shadow: 0 0 8px rgba(0,0,0,0.7);
}

.carousel-prev,
.carousel-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.4);
    border: none;
    color: white;
    padding: 10px;
    cursor: pointer;
    border-radius: 50%;
    font-size: 1.2rem;
}

.carousel-prev { left: 10px; }
.carousel-next { right: 10px; }
</style>

<div class="carousel-container">

    <!-- Slide 1 -->
    <div class="carousel-slide active">
        <img src="https://i.pinimg.com/736x/81/e4/5c/81e45cd3998a84f4421d777b22c0021a.jpg" alt="Superación Personal">
        <div class="carousel-caption">
            <h3>Superación Personal</h3>
            <p style="margin-top: 0.5rem; color: var(--vp-black);">Descubre tu potencial interior.</p>
        </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-slide">
        <img src="https://i.pinimg.com/1200x/22/69/f0/2269f0fa1ca141847e55820b5fc8e887.jpg" alt="Manifestaciones">
        <div class="carousel-caption">
            <h3>Manifestaciones</h3>
            <p style="margin-top: 0.5rem; color: var(--vp-black);">Alma y cuerpo.</p>
        </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-slide">
        <img src="https://i.pinimg.com/736x/35/db/82/35db82188946ee61ed7d132db5a65f40.jpg" alt="Cuidado Personal">
        <div class="carousel-caption">
            <h3>Cuidado Personal</h3>
            <p style="margin-top: 0.5rem; color: var(--vp-black);">Rituales para tu bienestar diario.</p>
        </div>
    </div>

    <!-- Controles -->
    <button class="carousel-prev" onclick="changeSlide(-1)">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="carousel-next" onclick="changeSlide(1)">
        <i class="fas fa-chevron-right"></i>
    </button>

</div>

<script>
/* ====== FUNCIONALIDAD DEL CARRUSEL ====== */

let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.carousel-slide');

    if (index >= slides.length) currentSlide = 0;
    else if (index < 0) currentSlide = slides.length - 1;
    else currentSlide = index;

    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === currentSlide);
    });
}

function changeSlide(direction) {
    showSlide(currentSlide + direction);
}
</script>

    </main>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            if (index >= slides.length) currentSlide = 0;
            if (index < 0) currentSlide = slides.length - 1;
            if(slides.length > 0) {
                slides[currentSlide].classList.add('active');
            }
        }

        function changeSlide(step) {
            currentSlide += step;
            showSlide(currentSlide);
        }

        // Cambio automático cada 5 segundos
        if (slides.length > 0) {
             setInterval(() => {
                changeSlide(1);
            }, 5000);
        }
    </script>
</body>
</html>
