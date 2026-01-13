<x-layout :title="$title">
    <!-- Hero Section (Full screen) -->
    <section class="relative h-screen bg-cover bg-cente" style="background-image: url('{{ asset('img/hero-1.png') }}')">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative h-full w-full flex flex-col justify-center px-6 sm:px-12 md:px-24 lg:px-32 2xl:px-40">
            <div class="max-w-full md:max-w-4xl text-center md:text-left">
                <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight mb-6">
                    Fiqh - Damaran - dst
                </h1>
                <p class="text-gray-300 text-lg sm:text-xl mb-12 max-w-xl">
                    Klik di bawah ini untuk memilih Kategori
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-full">
                    <select
                        class="bg-transparent border border-gray-300 rounded-md text-white p-3 appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option>-- Pilih Kategori 1 --</option>
                        <option>Fiqh</option>
                        <option>Hadits</option>
                        <option>Sejarah</option>
                    </select>
                    <select
                        class="bg-transparent border border-gray-300 rounded-md text-white p-3 appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option>-- Pilih Kategori 2 --</option>
                        <option>Fiqh</option>
                        <option>Hadits</option>
                        <option>Sejarah</option>
                    </select>
                    <select
                        class="bg-transparent border border-gray-300 rounded-md text-white p-3 appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option>-- Pilih Kategori 3 --</option>
                        <option>Fiqh</option>
                        <option>Hadits</option>
                        <option>Sejarah</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Table & Cards Section (full width container) -->
    <section class="bg-gray-50 text-gray-900 w-full py-10">
        <div class="max-w-screen-2xl mx-auto px-6">

            <!-- Table -->
            <!-- Table Section -->
            <section class="bg-gray-50 text-gray-900 px-6 py-10 max-w-7xl mx-auto w-full">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse table-auto text-left">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="sticky left-0 bg-gray-900 text-white px-4 py-3 w-12 z-10">No.</th>
                                <th class="px-4 py-3">
                                    <select
                                        class="w-full bg-gray-100 rounded-md p-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option>Judul Arab</option>
                                        <option>Judul Arab 1</option>
                                        <option>Judul Arab 2</option>
                                    </select>
                                </th>
                                <th class="px-4 py-3">
                                    <select
                                        class="w-full bg-gray-100 rounded-md p-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option>Judul Latin</option>
                                        <option>Judul Latin 1</option>
                                        <option>Judul Latin 2</option>
                                    </select>
                                </th>
                                <th class="px-4 py-3">
                                    <select
                                        class="w-full bg-gray-100 rounded-md p-2 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option>Topik</option>
                                        <option>Fiqh</option>
                                        <option>Hadits</option>
                                        <option>Sejarah</option>
                                    </select>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <!-- Contoh Baris Data kosong -->
                            <tr>
                                <td class="sticky left-0 bg-white border px-4 py-3">1</td>
                                <td class="border px-4 py-3"></td>
                                <td class="border px-4 py-3"></td>
                                <td class="border px-4 py-3"></td>
                            </tr>
                            <!-- Bisa tambahkan baris data lain disini -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav class="flex items-center justify-center mt-6 space-x-2 select-none">
                    <button
                        class="bg-gray-300 rounded px-3 py-1 font-medium hover:bg-indigo-500 hover:text-white transition"
                        aria-label="Previous page">&lt;</button>
                    <button class="bg-black text-white rounded px-3 py-1 font-bold" aria-current="page">1</button>
                    <button
                        class="bg-gray-300 rounded px-3 py-1 font-medium hover:bg-indigo-500 hover:text-white transition"
                        aria-label="Next page">&gt;</button>
                </nav>
            </section>


            <!-- Card list tampil di mobile (sm dan bawah) -->
            <div class="md:hidden grid grid-cols-1 gap-4">
                <!-- Card item contoh -->
                <div class="bg-white rounded-lg shadow p-4 text-gray-900">
                    <div class="flex space-x-4">
                        <img src="https://via.placeholder.com/100x140?text=Naskah" alt="Naskah Image"
                            class="h-36 w-auto rounded border border-gray-300" />
                        <div class="flex flex-col justify-between text-sm leading-relaxed flex-1">
                            <h2 class="font-bold text-lg mb-2">Nama Naskah</h2>
                            <div class="space-y-1">
                                <p><span class="font-semibold">Judul Arab</span> : Contoh Judul</p>
                                <p><span class="font-semibold">Judul Seri</span> : i10d24/1</p>
                                <p><span class="font-semibold">Topik</span> : NU</p>
                                <p><span class="font-semibold">Pemilik Naskah</span> : PP Damaran</p>
                                <p><span class="font-semibold">Halaman</span> : 99</p>
                                <p><span class="font-semibold">Bahasa</span> : Pegon</p>
                            </div>
                            <button
                                class="mt-4 self-start bg-[#c8bda4] text-gray-900 px-4 py-1 rounded shadow hover:bg-[#b6aa8f] transition whitespace-nowrap">
                                Baca Lebih Lanjut
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan card lain sesuai data -->
            </div>
        </div>

        <!-- Pagination tetap di bawah -->
        <nav class="flex items-center justify-center mt-6 space-x-2 select-none">
            <button class="bg-gray-300 rounded px-3 py-1 font-medium hover:bg-indigo-500 hover:text-white transition"
                aria-label="Previous page">&lt;</button>
            <button class="bg-black text-white rounded px-3 py-1 font-bold" aria-current="page">1</button>
            <button class="bg-gray-300 rounded px-3 py-1 font-medium hover:bg-indigo-500 hover:text-white transition"
                aria-label="Next page">&gt;</button>
        </nav>

        <!-- Nama Naskah Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <h2 class="font-bold text-xl mb-4 text-gray-900">Nama Naskah</h2>
                <div class="flex space-x-4">
                    <img src="https://via.placeholder.com/100x140?text=Naskah" alt="Naskah Image"
                        class="rounded border border-gray-300" />
                    <div class="text-gray-800 text-sm leading-relaxed">
                        <p><span class="font-semibold">Judul Arab</span> : -----</p>
                        <p><span class="font-semibold">Judul Seri</span> : i10d24/1</p>
                        <p><span class="font-semibold">Topik</span> : NU</p>
                        <p><span class="font-semibold">Pemilik Naskah</span> : PP Damaran</p>
                        <p><span class="font-semibold">Halaman</span> : 99</p>
                        <p><span class="font-semibold">Bahasa</span> : Pegon</p>
                        <button
                            class="mt-4 bg-[#c8bda4] text-gray-900 px-4 py-1 rounded shadow hover:bg-[#b6aa8f] transition">Baca
                            Lebih Lanjut</button>
                    </div>
                </div>
            </div>
            <!-- Duplikasi sesuai kebutuhan -->
            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <h2 class="font-bold text-xl mb-4 text-gray-900">Nama Naskah</h2>
                <div class="flex space-x-4">
                    <img src="https://via.placeholder.com/100x140?text=Naskah" alt="Naskah Image"
                        class="rounded border border-gray-300" />
                    <div class="text-gray-800 text-sm leading-relaxed">
                        <p><span class="font-semibold">Judul Arab</span> : -----</p>
                        <p><span class="font-semibold">Judul Seri</span> : i10d24/1</p>
                        <p><span class="font-semibold">Topik</span> : NU</p>
                        <p><span class="font-semibold">Pemilik Naskah</span> : PP Damaran</p>
                        <p><span class="font-semibold">Halaman</span> : 99</p>
                        <p><span class="font-semibold">Bahasa</span> : Pegon</p>
                        <button
                            class="mt-4 bg-[#c8bda4] text-gray-900 px-4 py-1 rounded shadow hover:bg-[#b6aa8f] transition">Baca
                            Lebih Lanjut</button>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <h2 class="font-bold text-xl mb-4 text-gray-900">Nama Naskah</h2>
                <div class="flex space-x-4">
                    <img src="https://via.placeholder.com/100x140?text=Naskah" alt="Naskah Image"
                        class="rounded border border-gray-300" />
                    <div class="text-gray-800 text-sm leading-relaxed">
                        <p><span class="font-semibold">Judul Arab</span> : -----</p>
                        <p><span class="font-semibold">Judul Seri</span> : i10d24/1</p>
                        <p><span class="font-semibold">Topik</span> : NU</p>
                        <p><span class="font-semibold">Pemilik Naskah</span> : PP Damaran</p>
                        <p><span class="font-semibold">Halaman</span> : 99</p>
                        <p><span class="font-semibold">Bahasa</span> : Pegon</p>
                        <button
                            class="mt-4 bg-[#c8bda4] text-gray-900 px-4 py-1 rounded shadow hover:bg-[#b6aa8f] transition">Baca
                            Lebih Lanjut</button>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <h2 class="font-bold text-xl mb-4 text-gray-900">Nama Naskah</h2>
                <div class="flex space-x-4">
                    <img src="https://via.placeholder.com/100x140?text=Naskah" alt="Naskah Image"
                        class="rounded border border-gray-300" />
                    <div class="text-gray-800 text-sm leading-relaxed">
                        <p><span class="font-semibold">Judul Arab</span> : -----</p>
                        <p><span class="font-semibold">Judul Seri</span> : i10d24/1</p>
                        <p><span class="font-semibold">Topik</span> : NU</p>
                        <p><span class="font-semibold">Pemilik Naskah</span> : PP Damaran</p>
                        <p><span class="font-semibold">Halaman</span> : 99</p>
                        <p><span class="font-semibold">Bahasa</span> : Pegon</p>
                        <button
                            class="mt-4 bg-[#c8bda4] text-gray-900 px-4 py-1 rounded shadow hover:bg-[#b6aa8f] transition">Baca
                            Lebih Lanjut</button>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <h2 class="font-bold text-xl mb-4 text-gray-900">Nama Naskah</h2>
                <div class="flex space-x-4">
                    <img src="https://via.placeholder.com/100x140?text=Naskah" alt="Naskah Image"
                        class="rounded border border-gray-300" />
                    <div class="text-gray-800 text-sm leading-relaxed">
                        <p><span class="font-semibold">Judul Arab</span> : -----</p>
                        <p><span class="font-semibold">Judul Seri</span> : i10d24/1</p>
                        <p><span class="font-semibold">Topik</span> : NU</p>
                        <p><span class="font-semibold">Pemilik Naskah</span> : PP Damaran</p>
                        <p><span class="font-semibold">Halaman</span> : 99</p>
                        <p><span class="font-semibold">Bahasa</span> : Pegon</p>
                        <button
                            class="mt-4 bg-[#c8bda4] text-gray-900 px-4 py-1 rounded shadow hover:bg-[#b6aa8f] transition">Baca
                            Lebih Lanjut</button>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg shadow">
                <h2 class="font-bold text-xl mb-4 text-gray-900">Nama Naskah</h2>
                <div class="flex space-x-4">
                    <img src="https://via.placeholder.com/100x140?text=Naskah" alt="Naskah Image"
                        class="rounded border border-gray-300" />
                    <div class="text-gray-800 text-sm leading-relaxed">
                        <p><span class="font-semibold">Judul Arab</span> : -----</p>
                        <p><span class="font-semibold">Judul Seri</span> : i10d24/1</p>
                        <p><span class="font-semibold">Topik</span> : NU</p>
                        <p><span class="font-semibold">Pemilik Naskah</span> : PP Damaran</p>
                        <p><span class="font-semibold">Halaman</span> : 99</p>
                        <p><span class="font-semibold">Bahasa</span> : Pegon</p>
                        <button
                            class="mt-4 bg-[#c8bda4] text-gray-900 px-4 py-1 rounded shadow hover:bg-[#b6aa8f] transition">Baca
                            Lebih Lanjut</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination bawah kartu -->
        <nav class="flex items-center justify-center mt-8 space-x-2 select-none">
            <button class="bg-gray-300 rounded px-3 py-1 font-medium hover:bg-indigo-500 hover:text-white transition"
                aria-label="Previous page">&lt;</button>
            <button class="bg-black text-white rounded px-3 py-1 font-bold" aria-current="page">1</button>
            <button class="bg-gray-300 rounded px-3 py-1 font-medium hover:bg-indigo-500 hover:text-white transition"
                aria-label="Next page">&gt;</button>
        </nav>
        </div>
    </section>

    <section class="w-full bg-white py-12">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl font-bold mb-8 text-gray-900">Artikel Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Artikel 1 dengan gambar valid -->
                <article class="space-y-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/29/Kitab_al-jabar.jpg"
                        alt="Naskah Hadratussyaikh di Ponpes Damaran"
                        class="rounded-lg w-full object-cover h-48 md:h-52" />
                    <h3 class="font-semibold text-lg leading-snug text-gray-900">
                        Naskah Hadratussyaikh di Ponpes Damaran
                    </h3>
                    <p class="text-sm text-gray-700">
                        oleh: Viki Junianto
                    </p>
                </article>

                <!-- Artikel 2 -->
                <article class="space-y-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/11/Al-Azhar_Mosque_%28Cairo%29_01.jpg"
                        alt="Naskah Hadratussaikh di Ponpes Yanbu’a"
                        class="rounded-lg w-full object-cover h-48 md:h-52" />
                    <h3 class="font-semibold text-lg leading-snug text-gray-900">
                        Naskah Hadratussaikh di Ponpes Yanbu’a
                    </h3>
                    <p class="text-sm text-gray-700">
                        oleh: Ilham Zidal Haq
                    </p>
                </article>

            </div>

            <!-- Pagination -->
            <nav class="flex items-center mt-6 space-x-2 select-none">
                <button class="w-8 h-8 rounded bg-black text-white font-semibold hover:bg-gray-800 transition"
                    aria-current="page">1</button>
                <button class="w-8 h-8 rounded bg-yellow-50 text-black font-semibold hover:bg-yellow-200 transition"
                    aria-label="Previous page">&lt;</button>
                <button class="w-8 h-8 rounded bg-yellow-50 text-black font-semibold hover:bg-yellow-200 transition"
                    aria-label="Next page">&gt;</button>
            </nav>
        </div>
    </section>
</x-layout>
