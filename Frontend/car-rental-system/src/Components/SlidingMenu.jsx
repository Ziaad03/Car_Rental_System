"use client";

import { XMarkIcon } from "@heroicons/react/24/outline";
import "../styles/slidingmenu.css";

export default function SlidingMenu({ isOpen, onClose }) {
  return (
    <div
      className={` Sliding-Menu fixed top-0 left-0 h-full w-64 bg-gray-800 text-white shadow-lg transform transition-transform duration-300 ${
        isOpen ? "translate-x-0" : "-translate-x-full"
      }`}
    >
      <div className="flex justify-between items-center p-4 border-b border-gray-700">
        <h2 className="text-lg font-semibold">Log in</h2>
        <button onClick={onClose} className="text-white">
          <XMarkIcon className="h-6 w-6" />
        </button>
      </div>
      <div className="p-4">
        <div className="login-options">
          <button className="w-full py-2 text-white bg-gray-900 hover:bg-gray-800">
            Admin
          </button>
          <button className="w-full py-2 text-white bg-gray-900 hover:bg-gray-800 ">
            Customer
          </button>
        </div>
      </div>
    </div>
  );
}
