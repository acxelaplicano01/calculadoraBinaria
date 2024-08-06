<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - BooleanCalc</title>
    <!-- Flowbite CSS CDN -->
    <link href="https://unpkg.com/flowbite@latest/dist/flowbite.min.css" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: radial-gradient(at 21.980550567522773% 29.650507060184793%, hsla(0, 0%, 90.19607843137256%, 1) 0%, hsla(0, 0%, 90.19607843137256%, 0) 100%), radial-gradient(at 5.675583183471655% 56.09646661582133%, hsla(0, 0%, 78.43137254901961%, 1) 0%, hsla(0, 0%, 78.43137254901961%, 0) 100%), radial-gradient(at 46.95963957828448% 81.16631764526292%, hsla(0, 0%, 67.05882352941175%, 1) 0%, hsla(0, 0%, 67.05882352941175%, 0) 100%), radial-gradient(at 24.547757547950756% 51.598496103273405%, hsla(0, 0%, 45.09803921568628%, 1) 0%, hsla(0, 0%, 45.09803921568628%, 0) 100%), radial-gradient(at 48.834625417466015% 99.61010503814197%, hsla(0, 0%, 90.19607843137256%, 1) 0%, hsla(0, 0%, 90.19607843137256%, 0) 100%), radial-gradient(at 13.418770287805938% 54.396993215925725%, hsla(0, 0%, 78.43137254901961%, 1) 0%, hsla(0, 0%, 78.43137254901961%, 0) 100%), radial-gradient(at 82.1907139703395% 98.68780554195669%, hsla(0, 0%, 67.05882352941175%, 1) 0%, hsla(0, 0%, 67.05882352941175%, 0) 100%), radial-gradient(at 91.3445121317676% 19.543600342422017%, hsla(0, 0%, 45.09803921568628%, 1) 0%, hsla(0, 0%, 45.09803921568628%, 0) 100%), radial-gradient(at 72.11722378277973% 65.71232820185257%, hsla(0, 0%, 90.19607843137256%, 1) 0%, hsla(0, 0%, 90.19607843137256%, 0) 100%), radial-gradient(at 74.96403577774726% 74.1335580753314%, hsla(0, 0%, 78.43137254901961%, 1) 0%, hsla(0, 0%, 78.43137254901961%, 0) 100%);
        }
    </style>
</head>

<body>
    <!-- Barra de menú -->
    <nav class="bg-blue-500 text-white p-4 fixed top-0 w-full z-10">

        <div>
            <a href="/" class="text-xl font-bold">Calculadora Boole</a>
            <a href="/" class="px-4 py-2 hover:bg-blue-700 rounded">Inicio</a>
            <a href="/dashboard" class="px-4 py-2 hover:bg-blue-700 rounded">Operaciones</a>
            <a href="/conversiones" class="px-4 py-2 hover:bg-blue-700 rounded">Conversiones</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="pt-16">
        <div class="flex flex-col items-center justify-center min-h-screen">
            <h1 class="text-4xl font-bold mb-6">¡Bienvenido a la Calculadora Booleana!</h1>
            <p class="text-lg mb-8">Seleccione una opción para comenzar:</p>
            <div class="flex space-x-4">
                <a href="/dashboard"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-4 px-8 rounded-lg shadow-lg text-center">
                    Calculadora
                </a>
                <a href="/conversiones"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-4 px-8 rounded-lg shadow-lg text-center">
                    Convertir
                </a>
            </div>
        </div>
    </div>
</body>

</html>