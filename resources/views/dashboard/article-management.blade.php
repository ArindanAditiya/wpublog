<x-app-layout>
    <!-- Upload Artikel Section -->
    <section class="content-section fade-in">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold">Daftar Artikel</h3>
            <a onclick="toggleFormArtikel()"
                class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-2 transition shadow-lg shadow-emerald-200">
                <i class="fas fa-plus"></i> Tambah Artikel
            </a>
        </div>

        <!-- Form Tambah Artikel -->
        <div id="form-artikel" class="hidden mb-8 bg-white p-6 rounded-xl border border-emerald-100 shadow-sm">
            <h4 class="font-bold text-slate-700 mb-4">Buat Artikel Baru</h4>
            <div class="grid grid-cols-1 gap-4">
                <input type="text" placeholder="Judul Artikel"
                    class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                    id="judul-artikel" />

                <!-- Input Gambar Cover -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-slate-700">
                        Cover Artikel (Opsional)
                    </label>
                    <div class="flex items-center space-x-4">
                        <!-- Preview Gambar -->
                        <div class="relative">
                            <div id="image-preview"
                                class="w-32 h-32 border-2 border-dashed border-slate-300 rounded-lg flex items-center justify-center bg-slate-50 overflow-hidden">
                                <div id="image-placeholder" class="text-center p-4">
                                    <svg class="w-12 h-12 text-slate-400 mx-auto" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p class="text-xs text-slate-500 mt-2">No image</p>
                                </div>
                                <img id="cover-preview" src="" alt="Preview"
                                    class="hidden w-full h-full object-cover" />
                            </div>
                            <button type="button" id="remove-image"
                                class="hidden absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600"
                                onclick="hapusGambar()">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Input File -->
                        <div class="flex-1">
                            <input type="file" id="cover-image" accept="image/*" class="hidden"
                                onchange="previewImage(this)" />
                            <div class="space-y-2">
                                <button type="button" onclick="document.getElementById('cover-image').click()"
                                    class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-lg hover:bg-emerald-100 transition border border-emerald-200">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12">
                                        </path>
                                    </svg>
                                    Pilih Gambar
                                </button>
                                <p class="text-xs text-slate-500">
                                    Format: JPG, PNG, GIF. Maks: 2MB
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Container untuk Quill Editor -->
                <div class="quill-container">
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Konten Artikel
                    </label>
                    <div id="editor-container" style="height: 300px"></div>
                    <input type="hidden" id="konten-artikel" name="konten" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <select
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                        id="kategori-artikel">
                        <option value="">Pilih Kategori</option>
                        <option value="sejarah">Sejarah Islam</option>
                        <option value="fiqh">Fiqh & Ushul Fiqh</option>
                        <option value="aqidah">Aqidah & Tauhid</option>
                        <option value="tasawuf">Tasawuf & Akhlak</option>
                    </select>
                    <select
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                        id="status-artikel">
                        <option value="">Pilih Status</option>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>
                <div class="flex justify-end gap-3">
                    <button onclick="toggleFormArtikel()" class="px-4 py-2 text-slate-400 hover:text-slate-600"
                        type="button">
                        Batal
                    </button>
                    <button
                        class="bg-emerald-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-emerald-700 transition"
                        onclick="simpanArtikel()" type="button">
                        Simpan Artikel
                    </button>
                </div>
            </div>
        </div>

        <!-- Artikel Table -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            {{-- search and short button --}}
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 p-4 border-b border-slate-200">
                {{-- start search --}}
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input name="keyword" type="text" id="simple-search"
                            class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none block w-full pl-10 p-2.5"
                            placeholder="Cari judul artikel" autocomplete="off" value="{{ old('keyword') }}">
                    </div>
                </form>
                {{-- end search --}}
                <form class="flex items-center gap-2" id="sort-form" method="GET">
                    <i class="fas fa-sort"></i>
                    <select id="sort-select"
                        class="border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                        name="sort_by" onchange="document.getElementById('sort-form').submit()">
                        <option value=""> Urutkan berdasarkan</option>
                        <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                        <option value="title_asc" {{ request('sort_by') == 'title_asc' ? 'selected' : '' }}>Judul A-Z
                        </option>
                        <option value="title_desc" {{ request('sort_by') == 'title_desc' ? 'selected' : '' }}>Judul Z-A
                        </option>
                    </select>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-bold border-b border-slate-200">
                        <tr>
                            <th class="p-3 md:p-4">No.</th>
                            <th class="p-3 md:p-4">Judul</th>
                            <th class="p-3 md:p-4 hidden md:table-cell">Kategori</th>
                            <th class="p-3 md:p-4 hidden lg:table-cell">Penulis</th>
                            <th class="p-3 md:p-4 hidden md:table-cell">Status</th>
                            <th class="p-3 md:p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($posts as $post)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-3 md:p-4 font-medium text-slate-700">
                                    {{ $loop->iteration + ($posts->currentPage() - 1) * $posts->perPage() }}
                                <td class="p-3 md:p-4 font-semibold text-sm md:text-base wrap-break-word">
                                    {{ $post->title }}
                                </td>
                                <td class="p-3 md:p-4 hidden md:table-cell">
                                    <span
                                        class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs whitespace-nowrap">
                                        {{ $post->category->name }}
                                    </span>
                                </td>
                                <td class="p-3 md:p-4 hidden lg:table-cell text-xs">
                                    {{ $post->author->name }}
                                </td>
                                <td class="p-3 md:p-4 hidden md:table-cell">
                                    <span
                                        class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded text-xs font-medium whitespace-nowrap">
                                        {{ strtoupper($post->status) }}
                                    </span>
                                    <span
                                        class="block mt-1 text-xs text-slate-500">{{ $post->created_at->format('d-M-Y') }}</span>
                                    <span
                                        class="block mt-1 text-xs text-slate-500">{{ $post->created_at->format('H:i') }}</span>
                                </td>
                                <td class="p-3 md:p-4">
                                    <div class="flex justify-center gap-2">
                                        <button
                                            class="w-8 h-8 md:w-7 md:h-7 rounded bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition text-xs flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 md:w-7 md:h-7 rounded bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white transition text-xs flex items-center justify-center">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="openDeleteModal('{{ $post->id }}')"
                                            class="w-8 h-8 md:w-7 md:h-7 rounded bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition text-xs flex items-center justify-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-6 text-center text-slate-500">
                                    @if (request('keyword'))
                                        Pencarian <b>"{{ request('keyword') }}"</b> tidak ditemukan. silahkan coba kata
                                        kunci lain atau <a href="/dashboard/menejemen-artikel"
                                            class="text-emerald-600 underline">muat ulang halaman</a>.
                                    @else
                                        Belum ada postingan yang diupload.
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- Pagination Links --}}
                @if ($posts->hasPages())
                    <x-posts-pagination :posts="$posts" />
                @endif
            </div>
        </div>
    </section>
</x-app-layout>
