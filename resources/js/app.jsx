//import "./bootstrap";
import "../css/app.css";
import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Login from "./pages/login";
import Inspector from "./pages/inspector";

ReactDOM.createRoot(document.getElementById("app")).render(
    <React.StrictMode>
        <BrowserRouter>
            <Routes>
                <Route path="/login" element={<Login />} />
                <Route path="/" element={<Inspector />} />
            </Routes>
        </BrowserRouter>
    </React.StrictMode>
);
