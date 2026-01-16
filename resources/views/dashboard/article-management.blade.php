<x-app-layout>
    <!-- Upload Artikel Section -->
    <section class="content-section fade-in">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold">Daftar Artikel</h3>
            <a href="/dashboard/menejemen-artikel/create"
                class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-2 transition shadow-lg shadow-emerald-200 hover:cursor-pointer">
                <i class="fas fa-plus"></i> Tambah Artikel
            </a>
        </div>

        <!-- succes -->
        @if (session()->has('success'))
            <div
                class="mb-4 px-4 py-3 rounded-lg bg-green-100 text-green-800 border border-green-300 flex items-center gap-3">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
                <i class="fas fa-times ml-auto hover:cursor-pointer"
                    onclick="this.parentElement.style.display='none'"></i>
            </div>
        @endif
        <!-- info -->
        @if (session()->has('info'))
            <div
                class="mb-4 px-4 py-3 rounded-lg bg-blue-100 text-blue-800 border border-blue-300 flex items-center gap-3">
                <i class="fas fa-info-circle"></i>
                <span>{!! session('info') !!}</span>
                <i class="fas fa-times ml-auto hover:cursor-pointer"
                    onclick="this.parentElement.style.display='none'"></i>
            </div>
        @endif

        <!-- Artikel Table -->
        <x-posts.table :posts="$posts" />


    </section>
</x-app-layout>
