<x-layout :title="$title">
<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
  <div class="flex justify-between px-4 mx-auto max-w-7xl ">
    <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to all posts </a>
        {{-- Thumbnail --}}
        <div class="relative w-full overflow-hidden rounded-xl shadow-lg mb-6">
          <div class="aspect-video">
            <img
              src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-thumbnail.jpg') }}"
              alt="{{ $post->title }}"
              class="w-full h-full object-cover"
            >
          </div>

          {{-- gradient overlay --}}
          <div class="absolute inset-0 bg-linear-to-t from-black/40 via-black/10 to-transparent"></div>
        </div>
          <header class="my-4 lg:mb-6 not-format">
              <address class="flex items-center mb-6 not-italic">
                  <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                      <img class="object-cover mr-4 w-16 h-16 rounded-full" src="{{  $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}" alt="{{ $post->author->name }}">
                      <div>
                          <a href="/posts?author={{ $post->author->username }}" rel="author" class="block text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                          <x-category-link href="/posts?category={{ $post->category->slug }}" :categorySlug="$post->category->slug">
                            {{ $post->category->name }}
                          </x-category-link>
                          <p class="text-base text-gray-500 dark:text-gray-400">{{ $post["created_at"]->diffForHumans() }}</p>
                      </div>
                  </div>
              </address>
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl  dark:text-white">
                {{ $post["title"] }}
              </h1>
          </header>
          <p>{!! $post["body"] !!}</p>
        </article>        
    </div>
</main>
</x-layout>
