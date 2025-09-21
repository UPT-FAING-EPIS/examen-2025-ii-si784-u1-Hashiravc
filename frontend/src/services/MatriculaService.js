import axios from 'axios';
import api from './api'; // api.js contiene la configuración base de Axios con la URL del backend

// Obtener matrículas de un usuario
export const getMatriculasByUsuario = async (userId) => {
  try {
    const response = await api.get(`/enrollments/${userId}`);
    return response.data;
  } catch (error) {
    console.error(`Error al obtener matrículas del usuario ${userId}:`, error);
    return [];
  }
};

// Crear una nueva matrícula
export const crearMatricula = async (data) => {
  try {
    const response = await api.post('/enrollments', data);
    return response.data;
  } catch (error) {
    console.error("Error al crear matrícula:", error);
    return { success: false, message: 'Error al crear matrícula' };
  }
};
