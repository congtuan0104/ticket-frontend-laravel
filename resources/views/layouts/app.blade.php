{{-- layout mặc định --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ticket - Website mua bán vé và quản lý sự kiện</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        @include('components.default-header')

        <!-- Page Content -->
        <main class="max-w-screen-xl mx-auto pt-[60px] relative flex-1 w-full">
            {{ $slot }}
        </main>

        <footer class="mt-4">
            <div class="bg-gray-800 text-white py-5">
                <div class="max-w-screen-xl mx-auto flex justify-center items-center gap-8">
                    Đồ án môn Ứng dụng phân tán 2024 - Nhóm 06
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
