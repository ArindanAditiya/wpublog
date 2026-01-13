<x-app-layout>
    <!-- Upload Kitab Section -->
    <section id="upload-kitab" class="content-section fade-in">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold">Pustaka Kitab Digital</h3>
            <button onclick="toggleFormKitab()"
                class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-2 transition shadow-lg shadow-emerald-200">
                <i class="fas fa-upload"></i> Upload Kitab
            </button>
        </div>

        <!-- Form Upload Kitab -->
        <div id="form-kitab" class="hidden mb-8 bg-white p-6 rounded-xl border border-emerald-100 shadow-sm">
            <h4 class="font-bold text-slate-700 mb-4">Upload Kitab Baru</h4>
            <div class="grid grid-cols-1 gap-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" placeholder="Nama Kitab"
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none" />
                    <input type="text" placeholder="Pengarang"
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <select
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="">Pilih Kategori</option>
                        <option value="fiqh">Fiqh</option>
                        <option value="aqidah">Aqidah</option>
                        <option value="tasawuf">Tasawuf</option>
                        <option value="tafsir">Tafsir</option>
                        <option value="hadits">Hadits</option>
                        <option value="ushul">Ushul Fiqh</option>
                    </select>
                    <select
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="">Bahasa</option>
                        <option value="arab">Arab</option>
                        <option value="indonesia">Indonesia</option>
                        <option value="arab-indo">Arab-Indonesia</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">File Kitab
                        (PDF)</label>
                    <div class="border-2 border-dashed border-slate-300 rounded-lg p-8 text-center">
                        <i class="fas fa-file-pdf text-3xl text-red-500 mb-4"></i>
                        <p class="text-slate-600 mb-2">
                            Drag & drop file PDF atau klik untuk upload
                        </p>
                        <p class="text-sm text-slate-500">
                            Maksimal ukuran file: 50MB
                        </p>
                        <input type="file" class="hidden" id="file-kitab" accept=".pdf" />
                        <button onclick="document.getElementById('file-kitab').click()"
                            class="mt-4 bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-emerald-700 transition">
                            Pilih File
                        </button>
                    </div>
                </div>
                <div class="flex justify-end gap-3">
                    <button onclick="toggleFormKitab()" class="px-4 py-2 text-slate-400 hover:text-slate-600">
                        Batal
                    </button>
                    <button
                        class="bg-emerald-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-emerald-700 transition">
                        Upload Kitab
                    </button>
                </div>
            </div>
        </div>

        <!-- Kitab Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Kitab Card -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-book-open text-emerald-600"></i>
                        </div>
                        <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs">Fiqh</span>
                    </div>
                    <h4 class="font-bold text-slate-800 mb-2">Fathul Qorib</h4>
                    <p class="text-sm text-slate-600 mb-4">
                        Syarah Matan Abi Syuja' oleh Al-Ghazi
                    </p>
                    <div class="flex items-center text-sm text-slate-500 mb-4">
                        <i class="fas fa-user-pen mr-2"></i>
                        <span>Imam Al-Ghazi</span>
                    </div>
                    <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                        <span class="text-xs text-slate-500">Upload: 15 Mar 2023</span>
                        <div class="flex gap-2">
                            <button
                                class="w-8 h-8 rounded bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button
                                class="w-8 h-8 rounded bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="openDeleteModal('kitab-1')"
                                class="w-8 h-8 rounded bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- More kitab cards would go here -->
        </div>
    </section>
</x-app-layout>
