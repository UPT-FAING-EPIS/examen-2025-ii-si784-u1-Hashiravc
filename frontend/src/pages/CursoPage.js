// src/pages/CursoPage.js
import React, { useState, useEffect } from "react";
import { useParams } from "react-router-dom";
import axios from "../services/api";
import "./CursoPage.css";

function CursoPage({ user }) {
  const { id } = useParams();
  const [curso, setCurso] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState("");
  const [mensaje, setMensaje] = useState("");

  useEffect(() => {
    const fetchCurso = async () => {
      try {
        const res = await axios.get(`/courses/${id}`, {
          headers: { Authorization: `Bearer ${user.token}` },
        });
        setCurso(res.data);
      } catch (err) {
        console.error(err);
        setError("No se pudo cargar el curso");
      } finally {
        setLoading(false);
      }
    };

    fetchCurso();
  }, [id, user.token]);

  const handleMatricular = async () => {
    try {
      const res = await axios.post(
        "/enrollments",
        { id_usuario: user.id_usuario, id_curso: curso.id_curso },
        { headers: { Authorization: `Bearer ${user.token}` } }
      );
      setMensaje(`Resultado: ${res.data.resultado}`);
    } catch (err) {
      console.error(err);
      setMensaje("Error al matricularse");
    }
  };

  const handleEliminar = async () => {
    if (!window.confirm("¿Seguro que deseas eliminar este curso?")) return;
    try {
      await axios.delete(`/courses/${curso.id_curso}`, {
        headers: { Authorization: `Bearer ${user.token}` },
      });
      setMensaje("Curso eliminado correctamente");
      setCurso(null);
    } catch (err) {
      console.error(err);
      setMensaje("Error al eliminar el curso");
    }
  };

  if (loading) return <p>Cargando curso...</p>;
  if (error) return <p className="error">{error}</p>;
  if (!curso) return <p>Curso no disponible</p>;

  return (
    <div className="curso-container">
      <h2>{curso.titulo}</h2>
      <p>{curso.descripcion}</p>
      <p>
        <strong>Categoría:</strong> {curso.categoria}
      </p>
      <p>
        <strong>Nivel:</strong> {curso.nivel}
      </p>
      <p>
        <strong>Duración:</strong> {curso.duracion} horas
      </p>
      <p>
        <strong>Precio:</strong> ${curso.precio}
      </p>
      <p>
        <strong>Capacidad:</strong> {curso.capacidad || "Ilimitado"}
      </p>

      {user.rol === "estudiante" && (
        <button className="btn-matricular" onClick={handleMatricular}>
          Matricularme
        </button>
      )}

      {(user.rol === "admin" || user.rol === "instructor") && (
        <button className="btn-eliminar" onClick={handleEliminar}>
          Eliminar Curso
        </button>
      )}

      {mensaje && <p className="mensaje">{mensaje}</p>}
    </div>
  );
}

export default CursoPage;
