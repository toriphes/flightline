import React from 'react';
import {Link} from "react-router-dom";
import { PaperAirplaneIcon } from '@heroicons/react/solid'

function  Header() {
  return (
    <header className="fixed w-full h-16 bg-white shadow-[0_0_20px_0_rgb(0,0,0,0.15)]">
      <div className="container px-8 lg:px-0 mx-auto flex justify-between h-full">
        <Link to="/" className="text-teal-700 flex items-center font-medium gap-4 h-full">
          <PaperAirplaneIcon className="w-10" />
          flightline
        </Link>
        <nav className="flex h-full items-center h-full gap-4">
          <Link to="/" className="p-4">
            Home
          </Link>
          <Link to="/flights" className="p-4">
            All flights
          </Link>
        </nav>
      </div>
    </header>
  );
}

export default Header;
