<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    {{-- font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    {{-- css --}}
    @vite('resources/css/app.css')
    @stack('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>

</head>

<body class="">

    <!-- Navbar -->
    <x-navbar></x-navbar>

    {{-- contet --}}
    {{ $slot }}

    <!-- Footer -->
    <x-footer></x-footer>

    {{-- js --}}
    <script src="{{ asset('js/dom.js') }}"></script>
    @stack('js')
</body>

</html>
