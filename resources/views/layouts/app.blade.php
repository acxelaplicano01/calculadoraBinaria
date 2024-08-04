<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooleanCalc</title>
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-500 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-lg font-bold">Calculadora Bin</a>
            <ul class="flex space-x-4">
                <li><a href="/calculator" class="hover:underline">Calculadora</a></li>
                <li><a href="/converter" class="hover:underline">Conversiones</a></li>
                <!-- Agrega más enlaces aquí -->
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
