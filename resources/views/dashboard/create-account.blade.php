<x-app-layout>
    <section id="create-akun" class="content-section fade-in">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold">
                Buat Akun Kontributor Baru
            </h3>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-8">
            <h4 class="font-bold text-slate-700 mb-4">
                Form Pendaftaran Kontributor
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                    <input type="text"
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                        placeholder="Masukkan nama lengkap" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                    <input type="email"
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                        placeholder="email@contoh.id" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                    <input type="password"
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                        placeholder="Minimal 8 karakter" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Konfirmasi
                        Password</label>
                    <input type="password"
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                        placeholder="Ulangi password" />
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Role</label>
                    <select
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="">Pilih Role</option>
                        <option value="contributor">Kontributor Artikel</option>
                        <option value="editor">Editor Kitab</option>
                        <option value="reviewer">Reviewer</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Keterangan
                        (Opsional)</label>
                    <textarea rows="3"
                        class="w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                        placeholder="Catatan tentang kontributor"></textarea>
                </div>
            </div>
            <div class="flex justify-end gap-3 mt-6 pt-6 border-t border-slate-100">
                <button
                    class="px-6 py-3 border border-slate-300 text-slate-600 rounded-lg font-medium hover:bg-slate-50 transition">
                    Reset Form
                </button>
                <button
                    class="bg-emerald-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-emerald-700 transition flex items-center gap-2">
                    <i class="fas fa-save"></i> Simpan Akun
                </button>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-100">
                <h3 class="text-lg font-semibold text-slate-800">
                    Daftar Kontributor Terbaru
                </h3>
            </div>
            <div class="responsive-table">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-bold">
                        <tr>
                            <th class="p-4">Nama</th>
                            <th class="p-4 hidden md:table-cell">Email</th>
                            <th class="p-4 hidden lg:table-cell">Role</th>
                            <th class="p-4">Tanggal Dibuat</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-4 font-medium">Ust. Abdul Halim</td>
                            <td class="p-4 hidden md:table-cell">
                                abdul.halim@email.id
                            </td>
                            <td class="p-4 hidden lg:table-cell">
                                <span
                                    class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-medium">Kontributor</span>
                            </td>
                            <td class="p-4">15 Mar 2023</td>
                            <td class="p-4">
                                <div class="flex justify-center gap-2">
                                    <button
                                        class="w-8 h-8 rounded bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white transition">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="openDeleteModal('user-1')"
                                        class="w-8 h-8 rounded bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-4 font-medium">Dr. Siti Aminah</td>
                            <td class="p-4 hidden md:table-cell">
                                siti.aminah@email.id
                            </td>
                            <td class="p-4 hidden lg:table-cell">
                                <span
                                    class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-medium">Editor</span>
                            </td>
                            <td class="p-4">10 Mar 2023</td>
                            <td class="p-4">
                                <div class="flex justify-center gap-2">
                                    <button
                                        class="w-8 h-8 rounded bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button
                                        class="w-8 h-8 rounded bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white transition">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="openDeleteModal('user-2')"
                                        class="w-8 h-8 rounded bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
