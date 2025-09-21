📚 Proyecto: Aplicación de Matrícula de Cursos Online
🎯 Objetivo
Desarrollar una plataforma web que permita a los usuarios inscribirse en cursos online, gestionar su progreso y a los administradores/educadores crear y administrar cursos y matrículas.

⚙️ Stack Tecnológico
Backend: PHP con Laravel

Frontend: React

Base de datos: MySQL (phpMyAdmin)

Herramienta de desarrollo: VS Code

Entorno local: XAMPP 8.1.25.0

🚀 Funcionalidades Principales
Catálogo de cursos con búsqueda y filtrado por categoría, nivel, etc.

Visualización de detalles del curso (descripción, temario, duración, instructor, precio).

Proceso de matrícula en cursos.

Gestión de matrículas y usuarios inscritos.

Notificaciones de inscripción y recordatorios.

🔧 Backend (API Laravel)
Framework: Laravel

Endpoints RESTful:

GET /courses — Listar cursos disponibles.

GET /courses/{id} — Detalle de curso.

POST /enrollments — Matricularse en un curso.

GET /enrollments/{userId} — Listar cursos inscritos de un usuario.

POST /courses — Crear curso (admin/instructor).

PUT /courses/{id} — Editar curso.

DELETE /courses/{id} — Eliminar curso.

Base de datos: MySQL

Autenticación: JWT y roles de usuario.

Pruebas: Unitarias y de integración.

🎨 Frontend (React)
Framework: React

Funcionalidades:

Catálogo de cursos y buscador.

Vista de detalle y proceso de matrícula.

Panel de usuario para ver cursos inscritos y progreso.

📋 Consideraciones
Validación de datos en frontend y backend.

Crear la infraestructura en nube para el despliegue utilizando IaC (Terraform).

Crear automatización de despliegue en nube mediante Github Actions.

Crear automatización que genere el diagrama de clases de la aplicación mediante Github Actions.

Crear automatización que genere la documentación del código mediante Github Actions.

Crear automatización que genere el escaneo de código utilizando SonarCloud, asegurar 0 bugs, 0 vulnerabilidades de seguridad, reporte en markdown publicado en github.

Crear automatización que genere el escaneo de código utilizando Semgrep, asegurar 0 bugs, 0 vulnerabilidades de seguridad, reporte en markdown publicado en github.

Crear automatización que genere el escaneo de código utilizando Snyk, asegurar 0 bugs, 0 vulnerabilidades de seguridad, reporte en markdown publicado en github.

🗂️ Estructura del Proyecto
text
matriculaonline/
├── app/                 # Backend Laravel
├── bootstrap/
├── config/
├── database/           # Migraciones y seeders
│   └── matricula_cursos.sql  # Estructura de la base de datos
├── frontend/           # Aplicación React
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── vendor/
├── .env.example        # Variables de entorno (example)
├── artisan            # CLI de Laravel
├── composer.json      # Dependencias PHP
├── composer.lock
├── package.json       # Dependencias Node.js
└── README.md          # Este archivo
🛠️ Instalación y Configuración
Requisitos previos
PHP 8.1+

Composer

Node.js y npm

MySQL

XAMPP (opcional)

Pasos de instalación
Clonar el repositorio:

bash
git clone https://github.com/UPT-FAING-EPIS/examen-2025-ii-si784-u1-Hashiravc.git
cd matriculaonline
Instalar dependencias PHP:

bash
composer install
Instalar dependencias JavaScript:

bash
npm install
Configurar entorno:

bash
cp .env.example .env
php artisan key:generate
Configurar las variables de base de datos en el archivo .env:

text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=matricula_cursos
DB_USERNAME=root
DB_PASSWORD=
Importar base de datos:

Abrir phpMyAdmin

Crear base de datos llamada matricula_cursos

Importar el archivo database/matricula_cursos.sql

Ejecutar migraciones:

bash
php artisan migrate
Ejecutar el servidor de desarrollo:

bash
# Backend (Laravel)
php artisan serve

# Frontend (React)
npm run dev

👤 Autor
Nombre: Hashira Belén Vargas Candia


📝 Licencia
Este proyecto es desarrollado para el examen de la primera unidad de la Universidad Privada de Tacna.

<p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>
