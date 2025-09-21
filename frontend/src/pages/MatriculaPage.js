import React from 'react';
import UsuarioPanel from '../components/UsuarioPanel';

const MatriculaPage = () => {
  const userId = 1; // Por ahora fijo
  return (
    <div>
      <UsuarioPanel userId={userId} />
    </div>
  );
};

export default MatriculaPage;
