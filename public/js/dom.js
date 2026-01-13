document.addEventListener("DOMContentLoaded", () => {
    // ===============================
    // 1. NAVBAR LOGIC
    // ===============================
    const navbar = document.getElementById("navbar");
    const logoImg = document.getElementById("logo-img");
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    const mobileDropdownBtn = document.getElementById("mobile-dropdown-btn");
    const mobileDropdownContent = document.getElementById(
        "mobile-dropdown-content"
    );
    const mobileChevron = document.getElementById("mobile-chevron");

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    }

    if (mobileDropdownBtn && mobileDropdownContent && mobileChevron) {
        mobileDropdownBtn.addEventListener("click", () => {
            mobileDropdownContent.classList.toggle("hidden");
            mobileChevron.classList.toggle("rotate-180");
        });
    }

    // ===============================
    // 2. POPUP SEARCH LOGIC
    // ===============================
    const searchModal = document.getElementById("search-modal");
    const closeSearchBtn = document.getElementById("close-search");
    const desktopSearchBtn = document.getElementById("desktop-search-btn");
    const mobileSearchBtn = document.getElementById("mobile-search-btn");

    function openSearch() {
        if (!searchModal) return;
        searchModal.classList.remove("hidden");
        if (mobileMenu) mobileMenu.classList.add("hidden");
    }

    function closeSearch() {
        if (!searchModal) return;
        searchModal.classList.add("hidden");
    }

    if (desktopSearchBtn) {
        desktopSearchBtn.addEventListener("click", openSearch);
    }

    if (mobileSearchBtn) {
        mobileSearchBtn.addEventListener("click", openSearch);
    }

    if (closeSearchBtn) {
        closeSearchBtn.addEventListener("click", closeSearch);
    }

    if (searchModal) {
        searchModal.addEventListener("click", (e) => {
            if (e.target === searchModal) closeSearch();
        });
    }

    // ===============================
    // 3. POPUP AUTH LOGIC (LOGIN / REGISTER)
    // ===============================
    const authModal = document.getElementById("auth-modal");
    const closeAuthBtn = document.getElementById("close-auth");
    const desktopUserBtn = document.getElementById("desktop-user-btn");
    const mobileUserBtn = document.getElementById("mobile-user-btn");

    function openAuth() {
        if (!authModal) return;
        authModal.classList.remove("hidden");
        if (mobileMenu) mobileMenu.classList.add("hidden");
    }

    function closeAuth() {
        if (!authModal) return;
        authModal.classList.add("hidden");
    }

    if (desktopUserBtn) {
        desktopUserBtn.addEventListener("click", openAuth);
    }

    if (mobileUserBtn) {
        mobileUserBtn.addEventListener("click", openAuth);
    }

    if (closeAuthBtn) {
        closeAuthBtn.addEventListener("click", closeAuth);
    }

    if (authModal) {
        authModal.addEventListener("click", (e) => {
            if (e.target === authModal) closeAuth();
        });
    }

    // ===============================
    // 4. SWITCH TAB LOGIC (LOGIN <-> REGISTER)
    // ===============================
    const tabBtnLogin = document.getElementById("tab-btn-login");
    const tabBtnRegister = document.getElementById("tab-btn-register");
    const formLogin = document.getElementById("form-login");
    const formRegister = document.getElementById("form-register");

    function switchTab(tab) {
        if (!formLogin || !formRegister) return;

        if (tab === "login") {
            formLogin.classList.remove("hidden");
            formRegister.classList.add("hidden");

            if (tabBtnLogin && tabBtnRegister) {
                tabBtnLogin.classList.add(
                    "text-indigo-600",
                    "border-b-2",
                    "border-indigo-600",
                    "bg-gray-50"
                );
                tabBtnLogin.classList.remove("text-gray-500");

                tabBtnRegister.classList.remove(
                    "text-indigo-600",
                    "border-b-2",
                    "border-indigo-600",
                    "bg-gray-50"
                );
                tabBtnRegister.classList.add("text-gray-500");
            }
        } else {
            formLogin.classList.add("hidden");
            formRegister.classList.remove("hidden");

            if (tabBtnLogin && tabBtnRegister) {
                tabBtnRegister.classList.add(
                    "text-indigo-600",
                    "border-b-2",
                    "border-indigo-600",
                    "bg-gray-50"
                );
                tabBtnRegister.classList.remove("text-gray-500");

                tabBtnLogin.classList.remove(
                    "text-indigo-600",
                    "border-b-2",
                    "border-indigo-600",
                    "bg-gray-50"
                );
                tabBtnLogin.classList.add("text-gray-500");
            }
        }
    }

    // expose ke global biar bisa dipanggil dari HTML
    window.switchTab = switchTab;
});
