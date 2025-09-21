# 📚 Proyecto: Matrícula de Cursos Online

## 🎯 Objetivo
Plataforma web para inscribirse en cursos online, gestionar progresos y permitir a administradores crear y administrar cursos y matrículas.

## ⚙️ Tecnologías
- **Backend:** PHP Laravel  
- **Frontend:** React  
- **Base de datos:** MySQL  
- **Entorno:** XAMPP 8.1.25.0  
- **Editor:** VS Code  

## 🚀 Funcionalidades
- Listar y filtrar cursos  
- Ver detalles del curso  
- Matricularse en cursos  
- Panel de usuario para ver cursos inscritos y progreso  
- Gestión de cursos por administradores  

## 🔧 Backend (Laravel)
**Endpoints:**

| Método | Endpoint | Descripción |
|--------|---------|-------------|
| GET    | /courses | Listar cursos |
| GET    | /courses/{id} | Detalle de curso |
| POST   | /enrollments | Matricular usuario |
| GET    | /enrollments/{userId} | Cursos de usuario |
| POST   | /courses | Crear curso |
| PUT    | /courses/{id} | Editar curso |
| DELETE | /courses/{id} | Eliminar curso |

**Autenticación:** JWT y roles de usuario  

## 🎨 Frontend (React)
- Catálogo y buscador de cursos  
- Vista de detalle de curso  
- Proceso de matrícula  
- Panel de usuario  

## 🗂️ Estructura del Proyecto
matriculaonline/
├── app/
├── database/
│ └── matricula_cursos.sql
├── frontend/
├── routes/
├── public/
├── tests/
├── .env.example
├── composer.json
└── package.json

## 🛠️ Instalación
```bash
git clone https://github.com/UPT-FAING-EPIS/examen-2025-ii-si784-u1-Hashiravc.git
cd matriculaonline
composer install
npm install
cp .env.example .env
php artisan key:generate

Configurar .env con tu base de datos:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=matricula_cursos
DB_USERNAME=root
DB_PASSWORD=

Importar base de datos en phpMyAdmin: database/matricula_cursos.sql

👤 Autor

Nombre: Belén Vargas
📝 Diagramas
Diagrama de flujo del proceso de matrícula
graph LR
A[Usuario] --> B[Buscar curso]
B --> C[Ver detalles del curso]
C --> D[Matricularse]
D --> E[Confirmación de matrícula]
E --> F[Panel de usuario]
Secuencia de inscripción
sequenceDiagram
Usuario ->> Sistema: Solicita lista de cursos
Sistema -->> Usuario: Envía lista de cursos
Usuario ->> Sistema: Selecciona curso
Sistema -->> Usuario: Muestra detalles
Usuario ->> Sistema: Realiza matrícula
Sistema -->> Usuario: Confirma inscripción

