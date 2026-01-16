<div x-data="{ openDeleteModal: null }" class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

    {{-- SEARCH & SORT --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 p-4 border-b border-slate-200">

        {{-- SEARCH --}}
        <form class="flex items-center" method="GET">
            <div class="relative w-full">
                <button type="submit"
                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none hover:text-gray-700 hover:cursor-pointer">
                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <input type="text" name="keyword" autocomplete="off" value="{{ request('keyword') }}"
                    placeholder="Cari judul artikel"
                    class="bg-white border border-slate-300 text-sm rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none block w-full pl-10 p-2.5">

                @if (request('keyword'))
                    <button type="button" onclick="this.previousElementSibling.value=''; this.form.submit();"
                        class="absolute inset-y-0 right-0 pr-3 text-slate-500 hover:text-slate-700">
                        <i class="fas fa-times-circle"></i>
                    </button>
                @endif
            </div>
        </form>


        {{-- SORT --}}
        <form method="GET">
            <div class="relative">
                <select name="sort_by" onchange="this.form.submit()"
                    class="border border-slate-200 rounded-lg p-3 pr-10 focus:ring-2 focus:ring-emerald-500 outline-none appearance-none cursor-pointer">
                    <option value="">Urutkan berdasarkan</option>
                    <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                    <option value="title_asc" {{ request('sort_by') == 'title_asc' ? 'selected' : '' }}>Judul A-Z
                    </option>
                    <option value="title_desc" {{ request('sort_by') == 'title_desc' ? 'selected' : '' }}>Judul Z-A
                    </option>
                </select>
                <style>
                    select::-ms-expand {
                        display: none;
                        /* Hides the default arrow in IE */
                    }
                </style>
            </div>
        </form>
    </div>

    {{-- TABLE --}}
    <div class="relative overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Judul</th>
                    <th class="px-4 py-3 text-left hidden md:table-cell">Kategori</th>
                    <th class="px-4 py-3 text-left hidden lg:table-cell">Penulis</th>
                    <th class="px-4 py-3 text-left hidden md:table-cell">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse ($posts as $post)
                    <tr class="hover:bg-slate-50 align-top">
                        <td class="px-4 py-3 text-slate-600 whitespace-nowrap">
                            {{ $loop->iteration + ($posts->currentPage() - 1) * $posts->perPage() }}
                        </td>

                        <td class="px-4 py-3 font-medium text-slate-900 max-w-xs">
                            <p class="text-sm">{{ $post->title }}</p>
                            {{-- info tambahan mobile --}}
                            <div class="mt-2 space-y-1 text-xs text-slate-500 md:hidden">
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-folder"></i>
                                    {{ $post->category->name }}
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-user"></i>
                                    {{ $post->author->name }}
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ $post->created_at->format('d M Y') }}
                                </div>
                                <div class="flex items-center gap-1">
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium
                                    {{ $post->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        <i
                                            class="fas {{ $post->status === 'published' ? 'fa-check-circle' : 'fa-clock' }}"></i>
                                        {{ strtoupper($post->status) }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-3 hidden md:table-cell">
                            <span class="text-xs font-medium bg-slate-100 px-3 py-1 rounded-full">
                                {{ $post->category->name }}
                            </span>
                        </td>

                        <td class="px-4 py-3 hidden lg:table-cell text-slate-600 text-xs">
                            {{ $post->author->name }}
                        </td>

                        <td class="px-4 py-3 hidden md:table-cell">
                            <div class="flex flex-col gap-1">
                                <span
                                    class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium
                                {{ $post->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    <i
                                        class="fas {{ $post->status === 'published' ? 'fa-check-circle' : 'fa-clock' }}"></i>
                                    {{ strtoupper($post->status) }}
                                </span>

                                <span
                                    class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs bg-slate-100 text-slate-700">
                                    <i class="fas fa-eye"></i> {{ $post->watch }}
                                </span>

                                {{-- created at --}}
                                <span
                                    class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs bg-slate-100 text-slate-700">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ $post->created_at->format('d M Y') }}
                                </span>
                            </div>
                        </td>

                        <td x-data="{ openAction: false }" class="px-4 py-3 text-center relative">
                            <button @click="openAction = !openAction"
                                class="w-8 h-8 inline-flex items-center justify-center rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>

                            <div x-show="openAction" x-transition @click.outside="openAction = false"
                                class="absolute right-4 top-12 z-20 bg-white border rounded-lg shadow-lg p-2 flex gap-2">

                                <a href="/dashboard/menejemen-artikel/{{ $post->slug }}"
                                    class="w-8 h-8 rounded bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white flex items-center justify-center">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="/dashboard/menejemen-artikel/{{ $post->slug }}/edit"
                                    class="w-8 h-8 rounded bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white flex items-center justify-center">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button @click="openDeleteModal = {{ $post->id }}"
                                    class="w-8 h-8 rounded bg-red-50 text-red-600 hover:bg-red-600 hover:text-white">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                            Data tidak ditemukan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($posts->hasPages())
            <div class="p-4 border-t">
                <x-posts-pagination :posts="$posts" />
            </div>
        @endif
    </div>

</div>
