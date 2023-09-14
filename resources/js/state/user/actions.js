import { createAsyncThunk } from "@reduxjs/toolkit";
import { loginRequest } from "../../requests";

export const login = createAsyncThunk("login", async (input) => {
  const response = await loginRequest(input.email, input.password);
  const user = response.data.data;

  localStorage.setItem("user", JSON.stringify(user));
  return user;
});

export const logout = createAsyncThunk("logout", async (_input) => {
  localStorage.clear();
  return null;
});
