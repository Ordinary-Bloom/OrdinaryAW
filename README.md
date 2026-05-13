# OrdinaryBloom - The Digital Florist's Atelier

OrdinaryBloom es un santuario digital curado dedicado al crecimiento personal, la atención plena (mindfulness), el fitness y el autocuidado. Esta aplicación web dinámica combina un diseño editorial de lujo con un backend potente para ofrecer una experiencia de usuario única y envolvente.

## 🌸 ¿Qué hace la app?

OrdinaryBloom permite a los usuarios sumergirse en un ecosistema de bienestar digital completo:

- **Exploración de Contenido**: Rutas de bienestar categorizadas en *Superación Personal*, *Fitness* y *Cuidado Personal*.
- **Inspiraciones Dinámicas**: Una galería interactiva de publicaciones recientes con videos integrados y descripciones inspiradoras que se cargan directamente desde la base de datos.
- **Rituales Sagrados**: Artículos editoriales sobre prácticas diarias de autocuidado con un diseño visual impecable.
- **Comunidad Voices of Bloom**: Un espacio donde los usuarios pueden leer testimonios reales sobre cómo el amor propio y la presencia radical han transformado vidas.
- **Contribución Interactiva**: Los usuarios pueden "plantar su inspiración" añadiendo nuevas publicaciones y compartiendo sus experiencias a través de formularios integrados.
- **Archivo Digital**: Una sección de transparencia que muestra en tiempo real la estructura de los datos almacenados (categorías, publicaciones y testimonios).

## 🛠️ Tecnologías Utilizadas

El proyecto utiliza un stack moderno y eficiente para garantizar velocidad y estética:

- **Frontend**: 
  - **HTML5 & Vanilla JavaScript**: Para una base sólida y ligera.
  - **Tailwind CSS (CDN)**: Para un diseño responsivo impulsado por utilidades y efectos de glassmorphism.
  - **Google Fonts**: Integración de tipografías elegantes (*Playfair Display*, *Montserrat*, *Noto Serif*, *Manrope*).
  - **Material Symbols**: Iconografía moderna y minimalista.
- **Backend**:
  - **PHP 8.x**: Manejo de la lógica del servidor, procesamiento de formularios y renderizado dinámico de contenido.
- **Base de Datos**:
  - **MySQL**: Almacenamiento seguro y organizado de toda la información comunitaria.
  - **PDO (PHP Data Objects)**: Para una interacción segura con la base de datos mediante consultas preparadas.

## 🚀 Instalación y Configuración

Sigue estos pasos para configurar tu propio "Atelier" localmente:

1. **Descargar el Proyecto**:
   Copia los archivos del repositorio en la carpeta raíz de tu servidor local (XAMPP, WAMP, Laragon, etc.).

2. **Preparar la Base de Datos**:
   - Abre tu gestor de base de datos (como phpMyAdmin).
   - Crea una nueva base de datos (ej: `alumno3_OrdinaryBloom`).
   - Importa el archivo `database.sql` ubicado en la carpeta raíz para crear las tablas y cargar los datos iniciales.

3. **Configurar la Conexión**:
   - Abre el archivo `config.php` y actualiza las constantes con tus credenciales de base de datos local:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'tu_nombre_de_bd');
     define('DB_USER', 'tu_usuario');
     define('DB_PASS', 'tu_contraseña');
     ```

4. **¡Listo para Florecer!**:
   Abre tu navegador y accede a `http://localhost/nombre-de-tu-carpeta/index.php`.

---

## 🌐 Enlace del Proyecto
Puedes explorar la versión oficial desplegada en el servidor DWES aquí:  
👉 **[https://alumno3.dwes.site/](https://alumno3.dwes.site/)**

---
*Cultivating the art of living well. We nurture your growth, one petal at a time.*
