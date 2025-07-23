import "./bootstrap";

// Tambahkan impor Alpine.js
import Alpine from "alpinejs";

// Jadikan Alpine global agar bisa diakses dari file Blade
window.Alpine = Alpine;

window.appState = window.appState || {}; // Pastikan appState ada
window.appState.modalOpen = false; 

// Mulai Alpine
Alpine.start();
