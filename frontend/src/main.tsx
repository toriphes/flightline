import React from 'react'
import ReactDOM from 'react-dom/client'
import {BrowserRouter, Route, Routes} from "react-router-dom";
import './index.css'
import App from './App'

import Search from "./pages/Search";
import Flights from "./pages/Flights";

ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<App/>}>
        <Route path="/" element={<Search/>}/>
        <Route path="flights" element={<Flights/>}/>
      </Route>
    </Routes>
  </BrowserRouter>
)
