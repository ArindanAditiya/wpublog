<x-app-layout>
    <!-- Approve Akun Section -->
    <section id="approve-akun" class="content-section fade-in">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold">Approval Akun Kontributor</h3>
            <div class="text-sm text-slate-500">
                <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full font-medium">7
                    permintaan pending</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Pending Requests -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="p-6 border-b border-slate-100">
                        <h3 class="text-lg font-semibold text-slate-800">
                            Permintaan Pendaftaran
                        </h3>
                    </div>
                    <div class="divide-y divide-slate-100">
                        <!-- Request Item -->
                        <div class="p-4 hover:bg-slate-50 transition">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start">
                                    <div
                                        class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center mr-4 flex-shrink-0">
                                        <i class="fas fa-user text-emerald-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Ahmad Fauzi</p>
                                        <p class="text-sm text-slate-500">
                                            ahmad.fauzi@email.id
                                        </p>
                                        <p class="text-xs text-slate-400 mt-1">
                                            Mendaftar sebagai Kontributor Artikel
                                        </p>
                                        <div class="flex gap-2 mt-2">
                                            <span
                                                class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs">Artikel</span>
                                            <span class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs">Sejarah
                                                Islam</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-2 ml-4">
                                    <button onclick="approveRequest('req-1')"
                                        class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-medium hover:bg-emerald-700 transition">
                                        Terima
                                    </button>
                                    <button onclick="rejectRequest('req-1')"
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700 transition">
                                        Tolak
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- More request items would go here -->
                    </div>
                </div>
            </div>

            <!-- Approval Stats -->
            <div>
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <h3 class="text-lg font-semibold text-slate-800 mb-4">
                        Statistik Approval
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-slate-700">Total
                                    Permintaan</span>
                                <span class="text-sm font-bold text-slate-800">24</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="bg-emerald-600 h-2 rounded-full" style="width: 100%">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-slate-700">Diterima</span>
                                <span class="text-sm font-bold text-emerald-700">15</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="bg-emerald-600 h-2 rounded-full" style="width: 62.5%">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-slate-700">Ditolak</span>
                                <span class="text-sm font-bold text-red-700">2</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="bg-red-600 h-2 rounded-full" style="width: 8.3%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-slate-700">Menunggu</span>
                                <span class="text-sm font-bold text-amber-700">7</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="bg-amber-500 h-2 rounded-full" style="width: 29.2%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
