<x-layout :title="$title">
    {{-- Artikel list --}}
    <section class="py-12 md:py-16">
        <div class="container mx-auto px-4 md:px-12">
            <!-- wrapper utama -->
            <div class="flex flex-col lg:flex-row gap-12 mt-12">

                <!-- konten kiri -->
                <div class="w-full lg:w-8/12 ">

                    <h2
                        class="text-2xl md:text-3xl font-bold my-8 text-white bg-[#A2AF9B] inline-block p-1 self-end relative after:absolute after:left-0 after:top-11.25 after:block 
                        after:w-[125%] md:after:w-[150%] after:h-2 after:bg-[#A2AF9B]">
                        {{ $title }}
                    </h2>

                    <!-- list artikel -->
                    <div class="flex flex-col gap-x-6 gap-y-10 md:flex-row md:flex-wrap lg:justify-between lg:gap-x-0">
                        @foreach ($posts as $post)
                            <a href="/post/{{ $post->slug }}" class="w-full md:w-[48%] lg:w-[49%]">
                                <span>status : {{ $post->status }}</span>
                                <article class="group cursor-pointer flex flex-col h-full">
                                    <div class="overflow-hidden rounded-lg mb-4 h-48 lg:h-52 bg-gray-100">
                                        <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                                            alt="{{ $post->title }}"
                                            class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500" />
                                    </div>

                                    <h3
                                        class="text-md lg:text-xl font-bold text-gray-900 leading-snug group-hover:text-indigo-600 transition mb-2">
                                        {{ $post->title }}
                                    </h3>
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

                                    <p class="text-sm text-gray-500">
                                        <span class="font-semibold text-gray-900">{{ $post->author->name }}</span>
                                        - {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </article>
                            </a>
                        @endforeach
                    </div>

                    @if ($posts->hasPages())
                        <x-posts-pagination :posts="$posts" />
                    @endif
                </div>

                <!-- sidebar kanan -->
                <aside class="w-full lg:w-4/12 border-t lg:border-t-0 lg:border-l border-gray-100 pt-8 lg:pt-0 lg:pl-8">
                    <div class="sticky top-24">
                        <h2 class="text-2xl md:text-3xl font-bold my-8 text-white bg-[#A2AF9B] inline-block p-1">
                            Terpopuler {{ now()->translatedFormat('F') }}
                        </h2>

                        <div class="flex flex-col gap-6">
                            @foreach ($popularPosts as $post)
                                <a href="/post/{{ $post->slug }}" class="flex gap-4 group items-start border-bottom">
                                    <span>status : {{ $post->status }}</span>
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
               c4.478 0 8.268 2.943 9.542 7
               -1.274 4.057-5.064 7-9.542 7
               -4.477 0-8.268-2.943-9.542-7z" />
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
                            Artikel Terbaru
                        </h2>

                        <div class="flex flex-col gap-6">
                            @foreach ($lastPosts as $post)
                                <a href="/post/{{ $post->slug }}" class="flex gap-4 group items-start">
                                    <span>status : {{ $post->status }}</span>
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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
               c4.478 0 8.268 2.943 9.542 7
               -1.274 4.057-5.064 7-9.542 7
               -4.477 0-8.268-2.943-9.542-7z" />
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
        </div>
    </section>
</x-layout>
