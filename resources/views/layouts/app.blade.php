<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Turots Digital - Admin Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    {{-- taileind --}}
    @vite('resources/css/app.css')

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />

    @stack('css')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-screen overflow-hidden bg-slate-50 text-slate-800">

    <!-- ROOT WRAPPER -->
    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR (COMPONENT) -->
        <x-posts.dashboard-sidebar />

        <!-- MAIN AREA -->
        <div class="flex-1 flex flex-col h-screen min-w-0">

            <!-- MOBILE HEADER -->
            <header class="h-16 bg-white border-b flex items-center justify-between px-6 md:hidden">
                <h1 class="font-bold text-emerald-900">TUROTS DIGITAL</h1>
                <button class="p-2 border rounded">
                    <i class="fas fa-bars"></i>
                </button>
            </header>

            <!-- CONTENT (SCROLL DI SINI AJA) -->
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                <div class="max-w-7xl mx-auto">

                    <h2 class="text-2xl font-bold mb-6">
                        Dashboard Admin
                    </h2>

                    {{ $slot }}

                </div>
            </main>

        </div>
    </div>



    {{-- stack --}}
    @stack('scripts')
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
