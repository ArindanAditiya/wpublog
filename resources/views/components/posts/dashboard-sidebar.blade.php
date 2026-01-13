<aside id="sidebar"
    class="sidebar-transition fixed inset-y-0 left-0 z-50 w-64 bg-emerald-900 text-white md:relative md:translate-x-0 -translate-x-full shadow-2xl h-screen flex flex-col">
    <div class="h-16 flex items-center justify-between px-6 border-b border-emerald-800">
        <div id="logo-area" class="flex items-center gap-3">
            <i class="fas fa-book-quran text-2xl text-emerald-400"></i>
            <span class="font-bold text-lg tracking-tight sidebar-text">TUROTS</span>
        </div>
        <button onclick="toggleSidebar()" class="hidden md:block text-emerald-400 hover:text-white transition">
            <i class="fas fa-bars-staggered"></i>
        </button>
        <button onclick="toggleMobileMenu()" class="md:hidden text-white">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <nav class="mt-6 px-3 space-y-1">
        <a href="/dashboard"
            class="w-full flex items-center py-3 px-3 rounded-lg hover:bg-emerald-800 transition group active-nav"
            title="Dashboard">
            <i class="fas fa-home w-8 text-center text-emerald-400 group-hover:text-white"></i>
            <span class="sidebar-text ml-2">Dashboard</span>
        </a>
        <a href="/dashboard/create-account"
            class="w-full flex items-center py-3 px-3 rounded-lg hover:bg-emerald-800 transition group"
            title="Create Akun">
            <i class="fas fa-user-plus w-8 text-center text-emerald-400 group-hover:text-white"></i>
            <span class="sidebar-text ml-2">Create Akun</span>
        </a>
        <a href="/dashboard/approve-account"
            class="w-full flex items-center py-3 px-3 rounded-lg hover:bg-emerald-800 transition group"
            title="Approve Akun">
            <i class="fas fa-user-check w-8 text-center text-emerald-400 group-hover:text-white"></i>
            <span class="sidebar-text ml-2">Approve Akun</span>
        </a>
        <a href="/dashboard/menejemen-artikel"
            class="w-full flex items-center py-3 px-3 rounded-lg hover:bg-emerald-800 transition group"
            title="Manajemen Artikel">
            <i class="fas fa-file-alt w-8 text-center text-emerald-400 group-hover:text-white"></i>
            <span class="sidebar-text ml-2">Manajemen Artikel</span>
        </a>
        <a href="/dashboard/menejmen-kitab"
            class="w-full flex items-center py-3 px-3 rounded-lg hover:bg-emerald-800 transition group"
            title="Upload Kitab">
            <i class="fas fa-book w-8 text-center text-emerald-400 group-hover:text-white"></i>
            <span class="sidebar-text ml-2">Pustaka Kitab</span>
        </a>
    </nav>

    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-emerald-800">
        <div class="flex items-center gap-3">
            <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/default-avatar.jpg') }}"
                alt="{{ Auth::user()->username }}"
                class="w-8 h-8 rounded-full bg-emerald-700 flex items-center justify-center">
            </img>
            <div class="sidebar-text">
                <p class="text-sm font-medium">Administrator</p>
                <p class="text-xs text-emerald-300">admin@turots.id</p>
            </div>
        </div>
    </div>
</aside>
