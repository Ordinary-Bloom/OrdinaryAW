# OrdinaryBloom - The Digital Florist's Atelier

OrdinaryBloom is a curated digital space dedicated to personal growth, mindfulness, fitness, and self-care. Designed with a clean, luxurious, and editorial aesthetic, it serves as a virtual sanctuary where modern mindfulness meets the timeless wisdom of nature.

## 🌸 Features

- **Categorized Wellness paths**: Curated content divided into Superación Personal (Self-Improvement), Fitness, and Cuidado Personal (Self-Care).
- **Responsive & Elegant UI**: Built with Tailwind CSS and custom glassmorphism styles, offering a smooth scroll experience and beautiful animations.
- **Community Testimonies**: "Voices of Bloom" - A dedicated section where users share their stories of how self-love and radical presence have transformed their lives. Users can submit their own experiences directly from the page.
- **SQL Backend Ready**: A pre-designed SQL schema (`database.sql`) is included to track articles (publicaciones), categories, and user testimonies.

## 📁 Project Structure

- `index.html`: The main single-page application structure. Contains all UI elements including hero sections, inspirations, article views, testimonies, and the contact form.
- `index.css` & `style.css`: Custom CSS for fonts, tailored animations, and editorial-style element overrides beyond standard Tailwind utilities.
- `database.sql`: SQL script to generate the underlying MySQL schema (`categorias`, `publicaciones`, and `testimonios`), along with dummy data.

## 🚀 Getting Started

Since OrdinaryBloom relies on client-side rendering with Tailwind CSS imported via CDN, there are no complex build steps required.

1. **Frontend**: Open `index.html` in your favorite modern web browser to view the application locally.
2. **Backend / Database**: If you wish to implement the backend, install a MySQL/MariaDB server and run the script:
   ```bash
   mysql -u root -p < database.sql
   ```
   This will set up the `ordinarybloom` database with all required tables and sample inserts.

## 🛠️ Built With

- HTML5 
- JavaScript (Vanilla)
- [Tailwind CSS (CDN)](https://tailwindcss.com/)
- Fonts: Google Fonts (Playfair Display, Montserrat, Noto Serif, Manrope)
- Icons: Google Material Symbols
- Database: MySQL (Ready)

---

*Cultivating the art of living well. We nurture your growth, one petal at a time.*
