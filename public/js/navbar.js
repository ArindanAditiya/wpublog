// --- 1. NAVBAR LOGIC (Sama seperti sebelumnya) ---
const navbar = document.getElementById("navbar");
const mobileMenuBtn = document.getElementById("mobile-menu-btn");
const mobileMenu = document.getElementById("mobile-menu");
const mobileDropdownBtn = document.getElementById("mobile-dropdown-btn");
const mobileDropdownContent = document.getElementById(
    "mobile-dropdown-content"
);
const mobileChevron = document.getElementById("mobile-chevron");

window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
        navbar.classList.remove(
            "md:bg-transparent",
            "md:text-white",
            "md:shadow-none"
        );
        navbar.classList.add("shadow-md");
    } else {
        navbar.classList.add(
            "md:bg-transparent",
            "md:text-white",
            "md:shadow-none"
        );
        navbar.classList.remove("shadow-md");
    }
});

mobileMenuBtn.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
});

mobileDropdownBtn.addEventListener("click", () => {
    mobileDropdownContent.classList.toggle("hidden");
    mobileChevron.classList.toggle("rotate-180");
});

// --- 2. POPUP SEARCH LOGIC ---
const searchModal = document.getElementById("search-modal");
const closeSearchBtn = document.getElementById("close-search");

// Tombol Trigger (Desktop & Mobile)
const desktopSearchBtn = document.getElementById("desktop-search-btn");
const mobileSearchBtn = document.getElementById("mobile-search-btn");

function openSearch() {
    searchModal.classList.remove("hidden");
    // Tutup mobile menu jika sedang terbuka agar rapi
    mobileMenu.classList.add("hidden");
}

function closeSearch() {
    searchModal.classList.add("hidden");
}

desktopSearchBtn.addEventListener("click", openSearch);
mobileSearchBtn.addEventListener("click", openSearch);
closeSearchBtn.addEventListener("click", closeSearch);

// Tutup jika klik area hitam (luar modal)
searchModal.addEventListener("click", (e) => {
    if (e.target === searchModal) closeSearch();
});

// --- 3. POPUP AUTH LOGIC (LOGIN/REGISTER) ---
const authModal = document.getElementById("auth-modal");
const closeAuthBtn = document.getElementById("close-auth");

// Tombol Trigger (Desktop & Mobile)
const desktopUserBtn = document.getElementById("desktop-user-btn");
const mobileUserBtn = document.getElementById("mobile-user-btn");

function openAuth() {
    authModal.classList.remove("hidden");
    mobileMenu.classList.add("hidden"); // Tutup mobile menu
}

function closeAuth() {
    authModal.classList.add("hidden");
}

desktopUserBtn.addEventListener("click", openAuth);
mobileUserBtn.addEventListener("click", openAuth);
closeAuthBtn.addEventListener("click", closeAuth);

authModal.addEventListener("click", (e) => {
    if (e.target === authModal) closeAuth();
});

// slider
const slider = document.getElementById("hero-slider");

const autoSlide = () => {
    // Cek apakah sudah mentok kanan (dengan toleransi 10px)
    if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 10) {
        slider.scrollLeft = 0; // Balik ke awal
    } else {
        slider.scrollLeft += slider.clientWidth; // Geser 1 layar
    }
};

// Slide otomatis setiap 5 detik
setInterval(autoSlide, 5000);
