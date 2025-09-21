import React, { useEffect, useState } from 'react';
import { getMatriculasByUsuario } from '../services/MatriculaService';

const UsuarioPanel = ({ userId }) => {
  const [matriculas, setMatriculas] = useState([]);

  useEffect(() => {
    getMatriculasByUsuario(userId).then(data => setMatriculas(data));
  }, [userId]);

  return (
    <div>
      <h2>Mis Cursos Inscritos</h2>
      <ul>
        {matriculas.map(m => (
          <li key={m.id_matricula}>{m.curso.titulo}</li>
        ))}
      </ul>
    </div>
  );
};

export default UsuarioPanel;
