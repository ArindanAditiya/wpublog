<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
  <div class="flex justify-between px-4 mx-auto max-w-7xl">
    <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">

      <a href="/dashboard" class="font-medium text-blue-500 hover:underline">
        &laquo; Back to all posts
      </a>

      <header class="my-6 lg:mb-10 not-format">

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

        {{-- Author --}}
        <address class="flex items-center mb-6 not-italic">
          <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
            <img class="mr-4 w-16 h-16 rounded-full object-cover" src="{{  $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}" alt="{{ $post->author->name }}">
            <div>
              <a
                href="/posts?author={{ $post->author->username }}"
                rel="author"
                class="block text-lg font-bold text-gray-900 dark:text-white"
              >
                {{ $post->author->name }}
              </a>

              <x-category-link
                href="/posts?category={{ $post->category->slug }}"
                :categorySlug="$post->category->slug">
                {{ $post->category->name }}
              </x-category-link>

              <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ $post->created_at->diffForHumans() }}
              </p>
            </div>
          </div>
        </address>

        {{-- Action Button --}}
        <div class="flex gap-3 mb-6">
          <a
            class="py-2 px-4 rounded-md text-white text-sm bg-blue-500 hover:bg-blue-600"
            href="/dashboard/{{ $post->slug }}/edit">
            Edit
          </a>

          <div x-data="{ openDeleteModal: false }">
            <button
              @click="openDeleteModal = true"
              class="py-2 px-4 rounded-md text-white text-sm bg-red-500 hover:bg-red-600">
              Delete
            </button>

            {{-- Delete Modal --}}
            <div
              x-show="openDeleteModal"
              x-transition
              @click.outside="openDeleteModal = false"
              class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">

              <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 max-w-md w-full relative">

                <button
                  @click="openDeleteModal = false"
                  class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 dark:hover:text-white">
                  ✕
                </button>

                <svg
                  class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-500"
                  fill="currentColor"
                  viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9z"
                    clip-rule="evenodd" />
                </svg>

                <p class="text-center text-gray-600 dark:text-gray-300 mb-6">
                  Apakah anda yakin ingin menghapus permanen postingan artikel ini?
                </p>

                <div class="flex justify-center gap-4">
                  <button
                    @click="openDeleteModal = false"
                    class="px-4 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600">
                    Cancel
                  </button>

                  <form action="/dashboard/{{ $post->slug }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                      type="submit"
                      class="px-4 py-2 text-sm rounded-lg bg-red-600 text-white hover:bg-red-700">
                      Yes, delete
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Title --}}
        <h1 class="text-3xl lg:text-4xl font-extrabold leading-tight text-gray-900 dark:text-white">
          {{ $post->title }}
        </h1>

      </header>

      {{-- Content --}}
      <div class="prose dark:prose-invert max-w-none">
        {!! $post->body !!}
      </div>

    </article>
  </div>
</main>
