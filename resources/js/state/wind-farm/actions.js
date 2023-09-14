import { createAsyncThunk } from "@reduxjs/toolkit";
import { fetchWindFarmRequest } from "../../requests";

export const fetchWindFarm = createAsyncThunk("fetchWindFarm", async () => {
  const response = await fetchWindFarmRequest();
  return response.data.data;
});
