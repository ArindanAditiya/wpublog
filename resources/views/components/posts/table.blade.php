@if (Session::has("success"))
    <div 
    x-data="{ toastAlert: true }"
    x-show="toastAlert"
    x-transition
    @click.outside="toastAlert = false"
    id="toast-success"
    class="flex items-center max-w-3xl p-4 text-body bg-neutral-primary-soft
           rounded-base shadow-xs border border-default"
    role="alert"
>
    <div class="inline-flex items-center justify-center shrink-0 w-7 h-7 text-fg-success bg-success-soft rounded">
        <svg class="w-5 h-5" aria-hidden="true" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  d="M5 11.917 9.724 16.5 19 7.5"/>
        </svg>
    </div>

    <div class="ms-3 text-sm font-normal">
        {!! Session::get('success') !!}
    </div>

    <button
        @click="toastAlert = false"
        type="button"
        class="ms-auto flex items-center justify-center text-body hover:text-heading
               bg-transparent rounded h-8 w-8"
        aria-label="Close"
    >
        ✕
    </button>
</div>
@endif
<section class=" p-3 sm:p-5">
    <h2 class="text-xl font-semibold pl-4 mb-3">{{ $countPosts }} Post by : {{ Auth::user()->name }}</h2>
    <div class="max-w-7xl">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative border sm:rounded-lg">
            <div class="flex flex-col md:flex-row items-center justify-start space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">

                    {{-- start search --}}
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input name="keyword" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" autocomplete="off" >
                        </div>
                    </form>
                    {{-- end search --}}

                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 shrink-0">
                    <a href="/dashboard/create" class="flex items-center justify-center text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 cursor-pointer">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Post
                    </a>
                </div>
            </div>
            <div class="">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 relative">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">#</th>
                            <th scope="col" class="px-4 py-3 hidden lg:block">Thumbnail</th>
                            <th scope="col" class="px-4 py-3">Title</th>
                            <th scope="col" class="px-4 py-3">Category</th>
                            <th scope="col" class="px-4 py-3">Published At</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $posts as $post )    
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $posts->firstItem() + $loop->index }}</th>
                            <td class="px-4 py-3 hidden lg:block"><img class="w-40" src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-thumbnail.jpg') }}" alt=""></td>
                            <td class="px-4 py-3">{{ $post->title }}</td>
                            <td class="px-4 py-3">{{ $post->category->name }}</td>
                            <td class="px-4 py-3">{{ $post->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-3 flex items-center justify-end relative" x-data="{open:false}">
                                <button @click=" open = !open " x-bind:class="open ? 'bg-gray-200' : 'bg-none' " class="inline-flex items-center p-1 rounded-sm text-sm font-medium text-center text-gray-500 hover:text-gray-800 focus:outline-none dark:text-gray-400 dark:hover:text-gray-100 hover:bg-gray-200" type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div x-show="open"  @click.outside="open = false" class="absolute -left-45 z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" >
                                        <li>
                                            <a href="/dashboard/{{ $post->slug }}/edit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/{{ $post->slug }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                        </li>
                                        
                                    </ul>
                                   <div class="py-1" x-data="{ openDeleteModal: false }">
                                        {{-- delete modal btn --}}
                                        <button
                                            @click="openDeleteModal = true"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100
                                                   dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            Delete
                                        </button>
                                        {{-- delete modal --}}
                                        <div
                                            x-show="openDeleteModal"
                                            x-transition
                                            @click.outside="openDeleteModal = false"
                                            class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50
                                                   flex justify-center items-center bg-black/50">
                                    
                                            <div class="relative p-4 w-full max-w-md">
                                                <!-- Modal content -->
                                                <div  @click.outside="openDeleteModal = false" class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                
                                                    {{-- close button --}}
                                                    <button
                                                        type="button"
                                                        @click="openDeleteModal = false"
                                                        class="absolute top-2.5 right-2.5 text-gray-400
                                                               hover:bg-gray-200 hover:text-gray-900 rounded-lg
                                                               text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        ✕
                                                    </button>
                                                
                                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                         aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                
                                                    <p class="mb-4 text-gray-500 dark:text-gray-300">
                                                        Apakah anda yakin ingin menghapus permanen postingan artikel ini
                                                    </p>
                                                
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button
                                                            type="button"
                                                            @click="openDeleteModal = false"
                                                            class="py-2 px-3 text-sm font-medium text-gray-500
                                                                   bg-white rounded-lg border border-gray-200
                                                                   hover:bg-gray-100 dark:bg-gray-700
                                                                   dark:text-gray-300 dark:border-gray-500
                                                                   dark:hover:text-white dark:hover:bg-gray-600">
                                                            No, cancel
                                                        </button>
                                                    
                                                        <form action="/dashboard/{{ $post->slug }}" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button
                                                                type="submit"
                                                                class="py-2 px-3 text-sm font-medium text-white
                                                                       bg-red-600 rounded-lg hover:bg-red-700
                                                                       focus:ring-4 focus:outline-none focus:ring-red-300
                                                                       dark:bg-red-500 dark:hover:bg-red-600
                                                                       dark:focus:ring-red-900">Yes, I'm sure </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="border-b dark:border-gray-700">
                           <td colspan="5" class="px-4 py-3"><span class="text-sm">tidak ada data yang ditemukan. <a class="text-blue-500 hover:underline" href="/dashboard">reload</a> untuk memuat ulang</span></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($posts->hasPages())
                <div class="full flex justify-center">
                    <x-pagination :posts="$posts"></x-pagination>
                </div>
            @endif
        </div>
    </div>
    </section>