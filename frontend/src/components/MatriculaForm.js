import React from 'react';
import { crearMatricula } from '../services/MatriculaService';

const MatriculaForm = ({ cursoId, userId }) => {
  const handleMatricular = async () => {
    const data = { id_usuario: userId, id_curso: cursoId };
    await crearMatricula(data);
    alert('Matriculado correctamente');
  };

  return <button onClick={handleMatricular}>Inscribirse</button>;
};

export default MatriculaForm;
