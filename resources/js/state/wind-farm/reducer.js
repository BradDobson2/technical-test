import { combineReducers } from "@reduxjs/toolkit";
import windFarm from "./reducers/wind-farm";
import turbines from "./reducers/turbines";
import inspections from "./reducers/inspections";

export default combineReducers({
  windFarm,
  turbines,
  inspections,
});
