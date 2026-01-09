<!doctype html>
<html class="h-full bg-gray-100">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    
    {{-- tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])       
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

    {{-- alpine --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- font --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />  
  </head>
  <body class="h-full">
    <div class="min-h-full">
  
        {{-- navbaer --}}
        <x-navbar></x-navbar>

        {{-- header --}}
        {{-- passing data to component --}}
        <x-header :title="$title"></x-header>

        {{-- CONTENT --}}
        <main>
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">      
            {{ $slot }}
          </div>
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
  </body>
</html>