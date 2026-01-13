{{-- nnti dipelajari lagi oke brother --}}

<nav aria-label="Page navigation example" class="my-4">
    <ul class="flex gap-2 justify-center md:justify-start">

        {{-- Previous --}}
        <li>
            <a href="{{ $lastPosts->previousPageUrl() ?? '#' }}"
                class="w-10 h-10 flex items-center justify-center bg-gray-100 text-gray-600 rounded font-bold
         {{ $lastPosts->onFirstPage() ? 'opacity-50 pointer-events-none' : '' }}">
                &lt;
            </a>
        </li>

        {{-- Page Numbers --}}
        @for ($page = 1; $page <= $lastPosts->lastPage(); $page++)
            {{-- Biar nggk kepanjangan --}}
            @if ($page == 1 || $page == $lastPosts->lastPage() || abs($page - $lastPosts->currentPage()) <= 1)
                <li>
                    <a href="{{ $lastPosts->url($page) }}"
                        class="w-10 h-10 flex items-center justify-center rounded font-bold
             {{ $page == $lastPosts->currentPage() ? 'bg-black text-white' : 'bg-gray-200 text-gray-600 hover:bg-gray-300' }}">
                        {{ $page }}
                    </a>
                </li>

                {{-- Ellipsis --}}
            @elseif ($page == 2 || $page == $lastPosts->lastPage() - 1)
                <li class="flex items-center">
                    <span class="text-gray-400 px-1">...</span>
                </li>
            @endif
        @endfor

        {{-- Next --}}
        <li>
            <a href="{{ $lastPosts->nextPageUrl() ?? '#' }}"
                class="w-10 h-10 flex items-center justify-center bg-gray-100 text-gray-600 rounded font-bold
         {{ $lastPosts->hasMorePages() ? '' : 'opacity-50 pointer-events-none' }}">
                &gt;
            </a>
        </li>

    </ul>
</nav>
