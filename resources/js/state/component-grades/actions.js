import { createAsyncThunk } from "@reduxjs/toolkit";
import { fetchComponentGradesRequest } from "../../requests";

export const fetchComponentGrades = createAsyncThunk(
  "fetchComponentGrades",
  async () => {
    const response = await fetchComponentGradesRequest();
    return response.data.data;
  }
);
