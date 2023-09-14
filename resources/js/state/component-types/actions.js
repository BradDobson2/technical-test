import { createAsyncThunk } from "@reduxjs/toolkit";
import { fetchComponentTypesRequest } from "../../requests";

export const fetchComponentTypes = createAsyncThunk(
  "fetchComponentTypes",
  async () => {
    const response = await fetchComponentTypesRequest();
    return response.data.data;
  }
);
