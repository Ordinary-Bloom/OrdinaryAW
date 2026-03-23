<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrdinaryBloom - La Esencia</title>
    <!-- Incluimos la hoja de estilos base, pero sobrescribiremos para esta página -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Estilos específicos tipo Victoria's Secret para esta página */
        body.vs-style {
            background-color: #000000; /* Fondo oscuro elegante */
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        .vs-hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.7)), url('https://i.pinimg.com/736x/ec/9b/e4/ec9be436b4b6d4d8d00e596c7f6ca6a0.jpg') center/cover no-repeat;
            position: relative;
        }

        .vs-brand {
            font-family: 'Playfair Display', serif;
            font-size: 5rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 1rem;
            animation: glow 2s ease-in-out infinite alternate;
        }

        .vs-brand span {
            color: #FF0066; /* Rosa vibrante VS */
            font-style: italic;
            text-transform: lowercase;
        }

        .vs-tagline {
            font-size: 1.5rem;
            font-weight: 300;
            letter-spacing: 8px;
            text-transform: uppercase;
            margin-bottom: 3rem;
            color: #FFB3D9; /* Rosa suave */
            font-family: 'Playfair Display', serif;
        }

        .vs-btn {
            background-color: #FF0066; /* Rosa vibrante */
            color: white;
            padding: 1rem 3rem;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
            border: 2px solid #FF0066;
            transition: all 0.4s ease;
            font-weight: 600;
        }

        .vs-btn:hover {
            background-color: transparent;
            color: #FF0066;
            box-shadow: 0 0 20px rgba(255, 0, 102, 0.5);
        }

        .vs-section {
            padding: 6rem 10%;
            background-color: #111111;
        }

        .vs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .vs-card {
            background: #000;
            border: 1px solid #333;
            overflow: hidden;
            transition: transform 0.4s ease;
        }

        .vs-card:hover {
            transform: translateY(-10px);
            border-color: #FF0066;
            box-shadow: 0 10px 30px rgba(255, 0, 102, 0.2);
        }

        .vs-card img {
            width: 100%;
            aspect-ratio: 4/5;
            object-fit: cover;
            filter: grayscale(20%) contrast(120%);
            transition: filter 0.4s ease;
        }

        .vs-card:hover img {
            filter: grayscale(0%) contrast(110%);
        }

        .vs-card-content {
            padding: 2rem;
            text-align: center;
        }

        .vs-card-title {
            color: #FF0066;
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .vs-footer {
            background: #000;
            padding: 3rem;
            text-align: center;
            border-top: 1px solid #333;
        }

        .vs-social-links a {
            color: #ffffff;
            font-size: 1.5rem;
            margin: 0 1rem;
            transition: color 0.3s;
        }

        .vs-social-links a:hover {
            color: #FF0066;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px #ffffff, 0 0 20px #ffffff, 0 0 30px #FF0066; }
            to { text-shadow: 0 0 20px #ffffff, 0 0 30px #FF0066, 0 0 40px #FF0066; }
        }

        @media (max-width: 768px) {
            .vs-brand { font-size: 3rem; }
            .vs-tagline { font-size: 1rem; letter-spacing: 4px; }
        }
        
        /* Ocultar elementos globales si hay interferencia */
        .container { display: none; }
    </style>
</head>
<body class="vs-style">

    <!-- Sin Navbar como se solicitó -->

    <!-- Sección Hero Principal -->
    <header class="vs-hero">
        <h1 class="vs-brand">Ordinary<span>Bloom</span></h1>
        <p class="vs-tagline">La belleza del poder femenino</p>
        <a href="index.php" class="vs-btn">Descubrir la colección</a>
    </header>

    <!-- Sección de Categorías / Productos Destacados -->
    <section class="vs-section">
        <div class="vs-grid">
            <div class="vs-card">
                <img src="https://i.pinimg.com/736x/d6/7e/a8/d67ea8e0c21dbd77de953f80b7f57a0d.jpg" alt="Elegancia">
                <div class="vs-card-content">
                    <h3 class="vs-card-title">Elegancia</h3>
                    <p>Rituales que elevan tu esencia diaria.</p>
                </div>
            </div>
            <div class="vs-card">
                <img src="https://i.pinimg.com/1200x/41/76/c7/4176c7acf6dbcbabcc6490937d1742a2.jpg" alt="Sofisticación">
                <div class="vs-card-content">
                    <h3 class="vs-card-title">Sofisticación</h3>
                    <p>El poder de sentirte segura en tu propia piel.</p>
                </div>
            </div>
            <div class="vs-card">
                <img src="https://i.pinimg.com/1200x/d4/be/7e/d4be7ec33a4611ab82520bdcf6b5e6e8.jpg" alt="Audacia">
                <div class="vs-card-content">
                    <h3 class="vs-card-title">Audacia</h3>
                    <p>Atrévete a brillar en cada paso que das.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Simple -->
    <footer class="vs-footer">
        <div class="vs-social-links">
            <a href="https://www.instagram.com/ordinarybloom_?igsh=MW9scHI1Y2dmeHd4cw%3D%3D&utm_source=qr" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@ordinarybloom_" target="_blank"><i class="fab fa-tiktok"></i></a>
        </div>
        <p style="margin-top: 1.5rem; color: #666; font-size: 0.9rem;">© 2026 OrdinaryBloom. All rights reserved.</p>
    </footer>

</body>
</html>
