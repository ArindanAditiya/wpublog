<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 ease-in-out bg-[#A2AF9B] text-white shadow-md">
    <div class="container mx-auto peer-[]:x-4 md:px-12">
        <div class="flex justify-between items-center h-20">

            <a href="/" class="flex items-center gap-3">
                <img src="{{ asset('img/LOGO TURATS putih 1.png') }}" alt="Logo" id="logo-img"
                    class="h-12 w-auto object-contain filter brightness-0 md:brightness-0 md:invert transition-all duration-300">
                <span class="text-xl font-bold tracking-wide">Turast Tebuireng</span>
            </a>

            <div class="hidden md:flex space-x-8 items-center font-medium text-sm tracking-wider">
                <a href="/" class="hover:text-yellow-500 transition">BERANDA</a>
                <a href="/profile" class="hover:text-yellow-500 transition">PROFIL</a>
                <div class="relative group h-20 flex items-center">
                    <button class="flex items-center hover:text-yellow-500 transition focus:outline-none gap-1">
                        ARTIKEL
                        <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute top-16 left-0 mt-2 w-56 bg-white text-gray-800 rounded-lg shadow-xl py-2 hidden group-hover:block border border-gray-100">
                        <a href="/posts"
                            class="block px-5 py-3 hover:bg-gray-50 hover:text-indigo-600 transition border-b-1  border-gray-100">Semua
                            Artikel</a>
                        @foreach (App\Models\Category::all() as $category)
                            <a href="/posts?category={{ $category->slug }}"
                                class="block px-5 py-3 hover:bg-gray-50 hover:text-indigo-600 transition">{{ $category->name }}</a>
                        @endforeach



                    </div>
                </div>
                <a href="/catalog" class="hover:text-yellow-500 transition">KATALOG</a>
                <a href="/contact" class="hover:text-yellow-500 transition">KONTAK KAMI</a>
            </div>

            <div class="hidden md:flex items-center gap-6">
                <button id="desktop-search-btn" class="hover:text-yellow-500 transition focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                <a href="/login" class="text-white hover:text-yellow-500 focus:outline-none" aria-label="User Menu">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </a>
                <img src="{{ asset('img/tebuireng 1.png') }}" alt="Badge" class="h-10 w-auto">
            </div>

            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu"
        class="hidden md:hidden bg-white text-gray-900 border-t border-gray-200 shadow-lg absolute w-full left-0 top-20">
        <div class="px-6 py-4 space-y-3">
            <a href="index.html"
                class="block py-2 font-medium hover:text-indigo-600 border-b border-gray-100">BERANDA</a>
            <a href="artikel-post.html"
                class="block py-2 font-medium hover:text-indigo-600 border-b border-gray-100">PROFIL</a>
            <div x-data="{ open: false }">
                <button id="mobile-dropdown-btn"
                    class="w-full flex justify-between items-center py-2 font-medium hover:text-indigo-600 border-b border-gray-100 focus:outline-none">
                    ARTIKEL
                    <svg id="mobile-chevron" class="w-4 h-4 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="mobile-dropdown-content" class="hidden pl-4 mt-2 space-y-2 bg-gray-50 rounded-md p-3">
                    <a href="/posts" class="block text-sm text-gray-600 hover:text-indigo-600">Kegiatan
                        Kami</a>
                    <a href="/posts" class="block text-sm text-gray-600 hover:text-indigo-600">Opini &
                        Esai</a>
                    <a href="/posts" class="block text-sm text-gray-600 hover:text-indigo-600">Kajian
                        Turats</a>
                </div>
            </div>
            <a href="/katalog" class="block py-2 font-medium hover:text-indigo-600 border-b border-gray-100">KATALOG</a>
            <a href="/kontak" class="block py-2 font-medium hover:text-indigo-600 border-b border-gray-100">KONTAK
                KAMI</a>

            <div class="flex gap-6 mt-4 pt-4 justify-center border-t border-gray-100">
                <button id="mobile-search-btn" class="text-gray-600 hover:text-indigo-600 focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                <a href="/login" class="text-gray-600 hover:text-indigo-600 focus:outline-none"
                    aria-label="User Menu">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</nav>

<div id="search-modal"
    class="fixed inset-0 bg-black/80 backdrop-blur-sm z-60 hidden flex-col items-center justify-center fade-in">
    <button id="close-search" class="absolute top-6 right-6 text-white hover:text-gray-300">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <div class="w-full max-w-3xl px-6 text-center">
        <h2 class="text-white text-2xl font-semibold mb-6">Pencarian Koleksi & Artikel</h2>
        <div class="relative">
            <input type="text" placeholder="Ketik kata kunci lalu tekan Enter..."
                class="w-full py-4 pl-6 pr-12 text-xl text-gray-900 rounded-full focus:outline-none shadow-2xl bg-white">
            <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-indigo-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
