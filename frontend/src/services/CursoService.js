import axios from 'axios';

const API_URL = 'http://127.0.0.1:8000/api';

// Obtener todos los cursos
export const getCursos = async () => {
  try {
    const response = await axios.get(`${API_URL}/courses`);
    return response.data;
  } catch (error) {
    console.error("Error al obtener cursos:", error);
    return [];
  }
};

// Obtener un curso por ID
export const getCursoById = async (id) => {
  try {
    const response = await axios.get(`${API_URL}/courses/${id}`);
    return response.data;
  } catch (error) {
    console.error(`Error al obtener curso ${id}:`, error);
    return null;
  }
};
