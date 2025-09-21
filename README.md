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
