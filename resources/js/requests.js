import axios from "axios";

const apiUrl = import.meta.env.VITE_API_URL;
const fetchToken = () => JSON.parse(localStorage.getItem("user")).token;

export const loginRequest = (email, password) =>
  axios.post(`${apiUrl}/auth`, { email, password });

export const fetchComponentTypesRequest = () => {
  return axios.get(`${apiUrl}/component-types`, {
    headers: {
      Authorization: `Bearer ${fetchToken()}`,
      Accept: "application/json",
    },
  });
};

export const fetchComponentGradesRequest = () => {
  return axios.get(`${apiUrl}/component-grades`, {
    headers: {
      Authorization: `Bearer ${fetchToken()}`,
      Accept: "application/json",
    },
  });
};

export const fetchWindFarmRequest = () => {
  return axios.get(`${apiUrl}/wind-farm`, {
    headers: {
      Authorization: `Bearer ${fetchToken()}`,
      Accept: "application/json",
    },
  });
};
