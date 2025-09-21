<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Matrícula de Cursos Online</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; }
        h1, h2, h3 { color: #2c3e50; }
        code { background: #f4f4f4; padding: 2px 4px; border-radius: 4px; }
        pre { background: #f4f4f4; padding: 10px; border-radius: 4px; overflow-x: auto; }
        ul { margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>📚 Matrícula de Cursos Online</h1>

    <h2>🎯 Objetivo</h2>
    <p>Plataforma web para inscribirse en cursos online, gestionar progresos y permitir a administradores crear y administrar cursos y matrículas.</p>

    <h2>⚙️ Tecnologías</h2>
    <ul>
        <li>Backend: PHP Laravel</li>
        <li>Frontend: React</li>
        <li>Base de datos: MySQL</li>
        <li>Entorno: XAMPP 8.1.25.0</li>
        <li>Editor: VS Code</li>
    </ul>

    <h2>🚀 Funcionalidades</h2>
    <ul>
        <li>Listar y filtrar cursos</li>
        <li>Ver detalles del curso</li>
        <li>Matricularse en cursos</li>
        <li>Panel de usuario para ver cursos inscritos y progreso</li>
        <li>Gestión de cursos por administradores</li>
    </ul>

    <h2>🔧 Backend (Laravel)</h2>
    <p><strong>Endpoints:</strong></p>
    <ul>
        <li>GET /courses — Listar cursos</li>
        <li>GET /courses/{id} — Detalle de curso</li>
        <li>POST /enrollments — Matricular usuario</li>
        <li>GET /enrollments/{userId} — Cursos de usuario</li>
        <li>POST /courses — Crear curso</li>
        <li>PUT /courses/{id} — Editar curso</li>
        <li>DELETE /courses/{id} — Eliminar curso</li>
    </ul>
    <p><strong>Autenticación:</strong> JWT y roles de usuario</p>

    <h2>🎨 Frontend (React)</h2>
    <ul>
        <li>Catálogo y buscador de cursos</li>
        <li>Vista de detalle de curso</li>
        <li>Proceso de matrícula</li>
        <li>Panel de usuario</li>
    </ul>

    <h2>🗂️ Estructura del proyecto</h2>
    <pre>
matriculaonline/
├── app/
├── database/
│   └── matricula_cursos.sql
├── frontend/
├── routes/
├── public/
├── tests/
├── .env.example
├── composer.json
└── package.json
    </pre>

    <h2>🛠️ Instalación</h2>
    <pre>
git clone https://github.com/UPT-FAING-EPIS/examen-2025-ii-si784-u1-Hashiravc.git
cd matriculaonline
composer install
npm install
cp .env.example .env
php artisan key:generate
    </pre>
    <p>Configurar <code>.env</code> con tu base de datos:</p>
    <pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=matricula_cursos
DB_USERNAME=root
DB_PASSWORD=
    </pre>
    <p>Importar base de datos en phpMyAdmin e importar <code>database/matricula_cursos.sql</code>.</p>

    <h2>👤 Autor</h2>
    <ul>
        <li>Nombre: [Tu nombre]</li>
        <li>GitHub: Hashiravd</li>
        <li>Correo: hv2022075480@virtual.upt.pe</li>
    </ul>
</body>
</html>
