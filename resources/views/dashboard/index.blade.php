<x-app-layout>
    <!-- Dashboard Section (Default) -->
    <section id="dashboard" class="content-section fade-in ">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Total Kontributor</p>
                        <p class="text-3xl font-bold mt-2">48</p>
                    </div>
                    <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-emerald-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-slate-100">
                    <p class="text-xs text-emerald-600 font-medium">
                        <i class="fas fa-arrow-up mr-1"></i> 12% dari bulan lalu
                    </p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Artikel Terbit</p>
                        <p class="text-3xl font-bold mt-2">124</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-lines text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-slate-100">
                    <p class="text-xs text-blue-600 font-medium">
                        <i class="fas fa-arrow-up mr-1"></i> 8 artikel baru
                    </p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Kitab Unggahan</p>
                        <p class="text-3xl font-bold mt-2">36</p>
                    </div>
                    <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-book-open text-amber-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-slate-100">
                    <p class="text-xs text-amber-600 font-medium">
                        <i class="fas fa-plus mr-1"></i> 3 kitab baru
                    </p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-500 text-sm">Menunggu Approval</p>
                        <p class="text-3xl font-bold mt-2">7</p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clock text-red-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-slate-100">
                    <p class="text-xs text-red-600 font-medium">
                        <i class="fas fa-exclamation-circle mr-1"></i> Perlu
                        tindakan
                    </p>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-8">
            <div class="p-6 border-b border-slate-100">
                <h3 class="text-lg font-semibold text-slate-800">
                    Aktivitas Terbaru
                </h3>
            </div>
            <div class="divide-y divide-slate-100">
                <div class="p-4 flex items-start hover:bg-slate-50 transition">
                    <div
                        class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-user-plus text-emerald-600"></i>
                    </div>
                    <div>
                        <p class="font-medium">Kontributor baru mendaftar</p>
                        <p class="text-sm text-slate-500">
                            Ahmad Fauzi mendaftar sebagai kontributor baru
                        </p>
                        <p class="text-xs text-slate-400 mt-1">2 jam yang lalu</p>
                    </div>
                </div>
                <div class="p-4 flex items-start hover:bg-slate-50 transition">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-file-upload text-blue-600"></i>
                    </div>
                    <div>
                        <p class="font-medium">Artikel baru diunggah</p>
                        <p class="text-sm text-slate-500">
                            "Sejarah Mushaf Nusantara" telah diunggah oleh Ust.
                            Abdul
                        </p>
                        <p class="text-xs text-slate-400 mt-1">
                            1 hari yang lalu
                        </p>
                    </div>
                </div>
                <div class="p-4 flex items-start hover:bg-slate-50 transition">
                    <div
                        class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-book text-amber-600"></i>
                    </div>
                    <div>
                        <p class="font-medium">Kitab baru ditambahkan</p>
                        <p class="text-sm text-slate-500">
                            Kitab "Fathul Qorib" berhasil ditambahkan ke pustaka
                        </p>
                        <p class="text-xs text-slate-400 mt-1">
                            3 hari yang lalu
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Welcome Message -->
        <div class="text-center py-12 px-4">
            <i class="fas fa-mosque text-emerald-100 text-8xl mb-6"></i>
            <h3 class="text-2xl font-bold text-slate-700 mb-3">
                Pusat Administrasi Turots Digital
            </h3>
            <p class="text-slate-500 max-w-2xl mx-auto">
                Selamat datang di dashboard admin. Kelola kontributor,
                artikel, dan kitab digital dengan mudah melalui panel ini.
            </p>
        </div>
    </section>
</x-app-layout>
