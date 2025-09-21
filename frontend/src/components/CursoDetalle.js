import React, { useEffect, useState } from 'react';
import { getCursoById } from '../services/CursoService';
import { useParams } from 'react-router-dom';

const CursoDetalle = () => {
  const { id } = useParams();
  const [curso, setCurso] = useState(null);

  useEffect(() => {
    getCursoById(id).then(data => setCurso(data));
  }, [id]);

  if (!curso) return <p>Cargando...</p>;

  return (
    <div>
      <h2>{curso.titulo}</h2>
      <p>{curso.descripcion}</p>
      <p>Categoria: {curso.categoria}</p>
      <p>Nivel: {curso.nivel}</p>
      <p>Duración: {curso.duracion} horas</p>
      <p>Precio: ${curso.precio}</p>
    </div>
  );
};

export default CursoDetalle;
