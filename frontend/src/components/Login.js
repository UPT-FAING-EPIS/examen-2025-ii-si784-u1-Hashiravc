import React, { useState } from 'react';
import axios from 'axios';
import './Login.css';

const Login = ({ onLogin }) => {
  const [correo, setCorreo] = useState('');
  const [contrasena, setContrasena] = useState('');
  const [error, setError] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');

    try {
      const response = await axios.post('http://127.0.0.1:8000/api/login', { correo, contrasena });

      if (response.data.success) {
        localStorage.setItem('user', JSON.stringify(response.data.user));
        onLogin(response.data.user);
      } else {
        setError(response.data.message || 'Credenciales incorrectas');
      }
    } catch (err) {
      setError('Error en la conexión con el servidor');
      console.error(err);
    }
  };

  return (
    <div className="login-container">
      <form className="login-form" onSubmit={handleSubmit}>
        <h2>Iniciar Sesión</h2>
        {error && <p className="error">{error}</p>}
        <input type="email" placeholder="Correo" value={correo} onChange={(e) => setCorreo(e.target.value)} required />
        <input type="password" placeholder="Contraseña" value={contrasena} onChange={(e) => setContrasena(e.target.value)} required />
        <button type="submit">Ingresar</button>
      </form>
    </div>
  );
};

export default Login;
