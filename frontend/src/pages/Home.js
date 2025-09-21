// src/pages/Home.js
import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import axios from "../services/api"; // api.js debe enviar token en headers

import './Home.css';

function Home({ user }) {
  const [cursos, setCursos] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState("");

  useEffect(() => {
    const fetchCursos = async () => {
      try {
        const token = localStorage.getItem('token');
        const res = await axios.get("/courses", {
          headers: { Authorization: `Bearer ${token}` }
        });
        setCursos(res.data);
      } catch (err) {
        console.error(err);
        setError("No se pudieron cargar los cursos");
      } finally {
        setLoading(false);
      }
    };

    fetchCursos();
  }, []);

  if (loading) return <p>Cargando cursos...</p>;
  if (error) return <p className="error">{error}</p>;

  return (
    <div className="home-container">
      <h2>Catálogo de Cursos</h2>
      <div className="cursos-list">
        {cursos.map((curso) => (
          <div key={curso.id_curso} className="curso-card">
            <h3>{curso.titulo}</h3>
            <p>{curso.descripcion}</p>
            <p><strong>Categoría:</strong> {curso.categoria}</p>
            <p><strong>Nivel:</strong> {curso.nivel}</p>
            <p><strong>Duración:</strong> {curso.duracion} horas</p>
            <p><strong>Precio:</strong> ${curso.precio}</p>

            {user.rol === 'estudiante' && (
              <Link to={`/matricular/${curso.id_curso}`}>Matricularse</Link>
            )}
            {user.rol !== 'estudiante' && (
              <>
                <Link to={`/curso/${curso.id_curso}`}>Ver detalles / Editar</Link>
              </>
            )}
          </div>
        ))}
      </div>
    </div>
  );
}

export default Home;
