<x-layout :title="$title">
    <div class="container mx-auto px-4 md:px-8 lg:px-12 py-10 md:py-16">
        <!-- WRAPPER -->
        <div class="flex flex-col lg:flex-row gap-12">

            <!-- ARTIKEL -->
            <main class="w-full lg:w-8/12 space-y-8 mt-10">
                <header class="my-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="object-cover mr-4 w-16 h-16 rounded-full"
                                src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
                                alt="{{ $post->author->name }}">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" rel="author"
                                    class="block text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <div class="flex items-center gap-1 text-xs">
                                    <span class="inline-flex items-center bg-gray-900 py-1 px-2 text-white">
                                        {{ $post->category->name }}
                                    </span>

                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
               c4.478 0 8.268 2.943 9.542 7
               -1.274 4.057-5.064 7-9.542 7
               -4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>

                                    <span class="leading-none">
                                        {{ $post->watch }}
                                    </span>
                                </div>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    {{ $post['created_at']->diffForHumans() }}</p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl  dark:text-white">
                        {{ $post['title'] }}
                    </h1>
                </header>

                <div class="h-70 md:h-80 lg:h-96 rounded-lg overflow-hidden bg-gray-100 mb-3">
                    <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                        alt="{{ $post->title }}"
                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500" />
                </div>

                <article class="prose max-w-none text-gray-700 leading-relaxed text-justify space-y-4">
                    {{ $post->body }}
                </article>

                <!-- IMAGE WITH CAPTION -->
                {{-- <div class="w-full aspect-16/10 rounded-lg overflow-hidden bg-gray-100 mt-8">
                    <img src="https://placehold.co/800x500/eee/333?text=Tim+Penelusuran" alt="Tim Penelusuran"
                        class="w-full h-full object-cover" />
                </div>
                <p class="text-sm text-gray-500 italic mt-2">
                    Tim penelusuran Jejak Intelektual Hadratussyaikh KH. M. Hasyim Asy'ari.
                </p> --}}

                <!-- TAG -->
                {{-- <div class="pt-8 border-t border-gray-100">
                    <div class="flex flex-wrap gap-2">
                        <span
                            class="bg-gray-100 px-4 py-2 rounded-md text-sm font-semibold hover:bg-gray-200 transition">#HasTag</span>
                        <span
                            class="bg-gray-100 px-4 py-2 rounded-md text-sm font-semibold hover:bg-gray-200 transition">#HasTag</span>
                        <span
                            class="bg-gray-100 px-4 py-2 rounded-md text-sm font-semibold hover:bg-gray-200 transition">#HasTag</span>
                    </div>
                </div> --}}


            </main>

            <!-- SIDEBAR -->
            <aside class="w-full lg:w-4/12 border-t lg:border-t-0 lg:border-l border-gray-100 pt-8 lg:pt-0 lg:pl-8">
                <div class="sticky top-24">
                    <h2 class="text-2xl md:text-3xl font-bold my-8 text-white bg-[#A2AF9B] inline-block p-1">
                        Artikel Terbaru
                    </h2>

                    <div class="flex flex-col gap-6">
                        @foreach ($lastPosts as $post)
                            <a href="/post/{{ $post->slug }}" class="flex gap-4 group items-start">
                                <div class="w-24 h-24 shrink-0 rounded overflow-hidden bg-gray-200">
                                    <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                                        alt="{{ $post->title }}"
                                        class="w-full h-full object-cover group-hover:opacity-80 transition" />
                                </div>

                                <div class="flex flex-col">
                                    <h3
                                        class="text-sm font-bold text-gray-900 leading-snug group-hover:text-indigo-600 transition line-clamp-2">
                                        {{ $post->title }}
                                    </h3>
                                    <div class="flex items-center gap-1 text-xs mt-2">
                                        <span class="inline-flex items-center bg-gray-900 py-0.5 px-1 text-white">
                                            {{ $post->category->name }}
                                        </span>

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5 c4.478 0 8.268 2.943 9.542 7 -1.274 4.057-5.064 7-9.542 7 -4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>

                                        <span class="leading-none">
                                            {{ $post->watch }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        <span class="font-semibold text-gray-900">{{ $post->author->name }}</span>
                                        - {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <h2 class="text-2xl md:text-3xl font-bold my-8 text-white bg-[#A2AF9B] inline-block p-1">
                        Terpopuler {{ now()->translatedFormat('F') }}
                    </h2>

                    <div class="flex flex-col gap-6">
                        @foreach ($popularPosts as $post)
                            <a href="/post/{{ $post->slug }}" class="flex gap-4 group items-start border-bottom">
                                <div class="w-24 h-24 shrink-0 rounded overflow-hidden bg-gray-200">
                                    <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                                        alt="{{ $post->title }}"
                                        class="w-full h-full object-cover group-hover:opacity-80 transition" />
                                </div>

                                <div class="flex flex-col">
                                    <h3
                                        class="text-sm font-bold text-gray-900 leading-snug group-hover:text-indigo-600 transition line-clamp-2">
                                        {{ $post->title }}
                                    </h3>
                                    <div class="flex items-center gap-1 text-xs mt-2">
                                        <span class="inline-flex items-center bg-gray-900 py-0.5 px-1 text-white">
                                            {{ $post->category->name }}
                                        </span>

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5 c4.478 0 8.268 2.943 9.542 7 -1.274 4.057-5.064 7-9.542 7 -4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>

                                        <span class="leading-none">
                                            {{ $post->watch }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        <span class="font-semibold text-gray-900">{{ $post->author->name }}</span>
                                        - {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
        <!-- ARTIKEL TERKAIT -->
        <div class="pt-8 lg:border-t border-gray-100 mt-12">
            <h3 class="text-2xl md:text-3xl font-bold my-8 text-white bg-[#A2AF9B] inline-block p-1">Artikel Terkait
            </h3>
            <div id="related-posts" class="flex flex-wrap justify-start gap-6 lg:gap-1 lg:justify-between">
                @foreach ($relatedPosts as $post)
                    <a href="/post/{{ $post->slug }}" class="w-full sm:w-[48%] lg:w-[17%] group cursor-pointer">
                        <div class="h-50 md:h- rounded-lg overflow-hidden bg-gray-100 mb-3">
                            <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                                alt="{{ $post->title }}"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500" />
                        </div>
                        <h4 class="font-bold group-hover:text-indigo-600 transition">
                            {{ Str::limit($post->title, 50, '...') }}
                        </h4>
                        <div class="flex items-center gap-1 text-xs mt-2">
                            <span class="inline-flex items-center bg-gray-900 py-0.5 px-1 text-white">
                                {{ $post->category->name }}
                            </span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5 c4.478 0 8.268 2.943 9.542 7 -1.274 4.057-5.064 7-9.542 7 -4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            <span class="leading-none">
                                {{ $post->watch }}
                            </span>
                        </div>
                        <p class="text-xs text-gray-500">
                            <span class="font-semibold text-gray-900">{{ $post->author->name }}</span>
                            - {{ $post->created_at->diffForHumans() }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
