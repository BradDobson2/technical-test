import { combineReducers } from "@reduxjs/toolkit";
import login from "./reducers/login";
import fetchWindFarm from "./reducers/fetch-wind-farm";

export default combineReducers({
  login,
  fetchWindFarm,
});
