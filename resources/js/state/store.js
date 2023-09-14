import { configureStore } from "@reduxjs/toolkit";
import user from "./user/reducer";
import windFarm from "./wind-farm/reducer";
import requests from "./requests/reducer";
import componentTypes from "./component-types/reducer";
import componentGrades from "./component-grades/reducer";
import initialState from "./user/initial-state";

export default configureStore({
  reducer: {
    user,
    windFarm,
    requests,
    componentTypes,
    componentGrades,
  },
  preloadedState: {
    user: initialState(),
  },
});
