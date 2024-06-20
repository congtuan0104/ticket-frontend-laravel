{{-- layout mặc định --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ticket - Website mua bán vé và quản lý sự kiện</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <div class="min-h-screen bg-gray-100">
        @include('components.default-header')

        <!-- Page Content -->
        <main class="max-w-screen-xl mx-auto mt-[60px] relative">
            {{ $slot }}
        </main>
    </div>
</body>

</html>