import React, { useState, useEffect } from 'react';
import Login from './components/Login';
import UsuarioPanel from './components/UsuarioPanel'; // tu componente existente

function App() {
  const [user, setUser] = useState(null);

  useEffect(() => {
    // Revisar si ya hay usuario en localStorage
    const storedUser = localStorage.getItem('user');
    if (storedUser) setUser(JSON.parse(storedUser));
  }, []);

  const handleLogin = (usuario) => {
    setUser(usuario);
  };

  if (!user) {
    return <Login onLogin={handleLogin} />;
  }

  // Mostrar según rol usando tu componente existente
  return (
    <div>
      <h1>Bienvenido, {user.nombre}</h1>
      {user.rol === 'admin' && <UsuarioPanel rol="admin" />}
      {user.rol === 'instructor' && <UsuarioPanel rol="instructor" />}
      {user.rol === 'estudiante' && <UsuarioPanel rol="estudiante" />}
    </div>
  );
}

export default App;
