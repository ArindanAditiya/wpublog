<x-app-layout>
    <main id="top" class="w-full lg:w-10/12 mx-auto px-4 space-y-8 mt-10 mb-10">
        <div class="flex flex-wrap gap-3 pt-8  sticky top-0" x-data="{ showConfirmTop: false }">
            <div class=" bg-white p-4 rounded-lg shadow-xs border border-gray-200 z-999999  ">
                <a href="/dashboard/menejemen-artikel/{{ $post->slug }}/edit"
                    class="inline-flex items-center px-4 py-2 bg-orange-600 text-white rounded-lg font-semibold hover:bg-orange-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>

                <button @click="showConfirmTop = true"
                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus
                </button>

                <a href="/dashboard/menejemen-artikel"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg font-semibold hover:bg-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
            <!-- CONFIRMATION DIALOG -->
            <div x-show="showConfirmTop"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                @click.away="showConfirmTop = false">
                <div class="bg-white rounded-lg p-6 shadow-lg max-w-sm">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Konfirmasi Penghapusan</h3>
                    <p class="text-gray-600 mb-6">Yakin ingin menghapus artikel ini?</p>
                    <div class="flex gap-3">
                        <button @click="showConfirmTop = false"
                            class="flex-1 px-4 py-2 bg-gray-300 text-gray-900 rounded-lg font-semibold hover:bg-gray-400 transition">
                            Batal
                        </button>
                        <button @click="document.getElementById('delete-form-{{ $post->id }}').submit()"
                            class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- HEADER -->
        <header class="my-4 lg:mb-6 not-format">
            <address class="flex items-center mb-6 not-italic">
                <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                    <img class="object-cover mr-4 w-16 h-16 rounded-full"
                        src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
                        alt="{{ $post->author->name }}">
                    <div class="flex-1">
                        <a href="/posts?author={{ $post->author->username }}" rel="author"
                            class="block text-xl font-bold text-gray-900 hover:text-blue-600 transition">{{ $post->author->name }}</a>
                        <div class="flex items-center gap-2 text-xs mt-1">
                            <span
                                class="inline-flex items-center bg-gray-900 py-1 px-3 text-white rounded text-xs font-semibold">
                                {{ $post->category->name }}
                            </span>

                            <div class="flex items-center gap-1 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>{{ $post->watch }}</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            {{ $post['created_at']->diffForHumans() }}</p>
                    </div>
                </div>
            </address>
            <h1 class="mb-6 text-3xl lg:text-4xl font-extrabold leading-tight text-gray-900">
                {{ $post['title'] }}
            </h1>
        </header>

        <!-- THUMBNAIL -->
        <div class="h-72 md:h-80 lg:h-96 rounded-lg overflow-hidden bg-gray-100 shadow-md">
            <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                alt="{{ $post->title }}" class="w-full h-full object-cover hover:scale-105 transition duration-500" />
        </div>

        <!-- ARTICLE CONTENT -->
        <article class="prose max-w-none text-gray-700 leading-relaxed text-justify space-y-4">
            {!! $post->body !!}
        </article>

        <!-- ACTION BUTTONS -->
        <div class="flex flex-wrap gap-3 pt-8 border-t border-gray-200" x-data="{ showConfirm: false }">
            <a href="/dashboard/menejemen-artikel/{{ $post->slug }}/edit"
                class="inline-flex items-center px-4 py-2 bg-orange-600 text-white rounded-lg font-semibold hover:bg-orange-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>

            <button @click="showConfirm = true"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Hapus
            </button>

            <a href="/dashboard/menejemen-artikel"
                class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg font-semibold hover:bg-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>

            <!-- CONFIRMATION DIALOG -->
            <div x-show="showConfirm"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                @click.away="showConfirm = false">
                <div class="bg-white rounded-lg p-6 shadow-lg max-w-sm">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Konfirmasi Penghapusan</h3>
                    <p class="text-gray-600 mb-6">Yakin ingin menghapus artikel ini?</p>
                    <div class="flex gap-3">
                        <button @click="showConfirm = false"
                            class="flex-1 px-4 py-2 bg-gray-300 text-gray-900 rounded-lg font-semibold hover:bg-gray-400 transition">
                            Batal
                        </button>
                        <button @click="document.getElementById('delete-form-{{ $post->id }}').submit()"
                            class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- META INFORMATION -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-8 border-t border-gray-200">
            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-sm text-gray-500 font-semibold">Diperbarui</p>
                <p class="text-lg text-gray-900">{{ $post->updated_at->format('d M Y') }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-sm text-gray-500 font-semibold">Total Dibaca</p>
                <p class="text-lg text-gray-900">{{ $post->watch ?? 0 }} kali</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-sm text-gray-500 font-semibold">Penulis</p>
                <p class="text-lg text-gray-900">{{ $post->author->name }}</p>
            </div>
        </div>

        {{-- to top button --}}
        <div class="fixed bottom-5 left-1/2 transform -translate-x-1/2">
            <a href="#top"
                class="inline-flex items-center justify-center px-4 py-2 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg border border-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            </a>
        </div>
    </main>

    <!-- DELETE FORM (HIDDEN) -->
    <form id="delete-form-{{ $post->id }}" action="/dashboard/menejemen-artikel/{{ $post->slug }}/delete"
        method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-app-layout>
