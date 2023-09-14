import axios from "axios";

export const loginRequest = (email, password) =>
  axios.post("http://localhost/api/auth", { email, password });

export const fetchComponentTypesRequest = () => {
  return axios.get("http://localhost/api/component-types", {
    headers: {
      Authorization: `Bearer ${fetchToken()}`,
      Accept: "application/json",
    },
  });
};

export const fetchComponentGradesRequest = () => {
  return axios.get("http://localhost/api/component-grades", {
    headers: {
      Authorization: `Bearer ${fetchToken()}`,
      Accept: "application/json",
    },
  });
};

export const fetchWindFarmRequest = () => {
  return axios.get("http://localhost/api/wind-farm", {
    headers: {
      Authorization: `Bearer ${fetchToken()}`,
      Accept: "application/json",
    },
  });
};

const fetchToken = () => JSON.parse(localStorage.getItem("user")).token;
