import "../css/app.css";
import React from "react";
import ReactDOM from "react-dom/client";
import { Provider } from "react-redux";
import store from "./state/store";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Login from "./pages/login";
import Inspector from "./pages/inspector";
import UnauthenticatedRoute from "./components/unauthenticated-route";
import AuthenticatedRoute from "./components/authenticated-route";

ReactDOM.createRoot(document.getElementById("app")).render(
  <React.StrictMode>
    <Provider store={store}>
      <BrowserRouter>
        <Routes>
          <Route
            path="/login"
            element={
              <UnauthenticatedRoute>
                <Login />
              </UnauthenticatedRoute>
            }
          />
          <Route
            path="/"
            element={
              <AuthenticatedRoute>
                <Inspector />
              </AuthenticatedRoute>
            }
          />
        </Routes>
      </BrowserRouter>
    </Provider>
  </React.StrictMode>
);
