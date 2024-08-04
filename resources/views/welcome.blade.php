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
            background: -webkit-linear-gradient(90deg, #b4dffd,#9e99ff);background: linear-gradient(90deg, #b4dffd,#9e99ff);
        }
    </style>
</head>
<body>
   <!-- Barra de menú -->
   <nav class="bg-blue-500 text-white p-4 fixed top-0 w-full z-10">       
            
            <div>
                <a href="/" class="text-xl font-bold">Calculadora Boole</a>
                <a href="/" class="px-4 py-2 hover:bg-blue-700 rounded">Inicio</a>
                <a href="/calculator" class="px-4 py-2 hover:bg-blue-700 rounded">Calculadora</a>
                <a href="/converter" class="px-4 py-2 hover:bg-blue-700 rounded">Convertir</a>
            </div>     
    </nav>

    <!-- Contenido principal -->
    <div class="pt-16">
        <div class="flex flex-col items-center justify-center min-h-screen">
            <h1 class="text-4xl font-bold mb-6">¡Bienvenido a la Calculadora Booleana!</h1>
            <p class="text-lg mb-8">Seleccione una opción para comenzar:</p>
            <div class="flex space-x-4">
                <a href="/calculator" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-4 px-8 rounded-lg shadow-lg text-center">
                    Calculadora
                </a>
                <a href="/converter" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-4 px-8 rounded-lg shadow-lg text-center">
                    Convertir
                </a>
            </div>
        </div>
    </div>
</body>
</html>
