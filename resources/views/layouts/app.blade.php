<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Smart Locker')</title>

    {{-- Tailwind via CDN (quick setup — swap for your compiled CSS later if you set up Vite) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Alpine.js for interactivity --}}
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.5/cdn.min.js"></script>
</head>
<body class="bg-gray-100">

    @yield('content')

</body>
</html>