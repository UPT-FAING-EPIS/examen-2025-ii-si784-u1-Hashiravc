import React, { useEffect, useState } from 'react';
import { getCursos } from '../services/CursoService';
import { Link } from 'react-router-dom';
import './CursoList.css';

const CursoList = () => {
  const [cursos, setCursos] = useState([]);

  useEffect(() => {
    getCursos().then(data => setCursos(data));
  }, []);

  return (
    <div>
      <h2>Catálogo de Cursos</h2>
      <ul>
        {cursos.map(curso => (
          <li key={curso.id_curso}>
            <Link to={`/cursos/${curso.id_curso}`}>{curso.titulo}</Link>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default CursoList;
