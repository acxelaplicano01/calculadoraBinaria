<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Claculadora Binaria</title>
    <!-- Flowbite CSS CDN -->
    <link href="https://unpkg.com/flowbite@latest/dist/flowbite.min.css" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: #fff;
        }

        button {
            cursor: pointer;
            border-radius: 10px;
            border: 3px solid black;
            color: #000;
            font-size: 20pt;
            font-family: "Love Ya Like A Sister", cursive;
            box-shadow: 3px 2px #666;
            background-color: #ced4da;
        }
        .letra{
            font-family: "Love Ya Like A Sister", cursive;
        }
    </style>
</head>

<body>
    <!-- Barra de menú -->
    <nav class="bg-blue-500 text-white p-4 fixed top-0 w-full z-10">

        <div>
            <a href="/" class="text-xl letra font-bold">Calculadora Binaria</a>
            <a href="/dashboard" class="px-4 letra py-2 hover:bg-blue-700 rounded">Operaciones</a>
            <a href="/conversiones" class="px-4 letra py-2 hover:bg-blue-700 rounded">Conversiones</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="pt-16">
        <div class="flex flex-col items-center justify-center min-h-screen">
            <h1 class="text-4xl font-bold letra mb-6">¡Bienvenido a la Calculadora Binaria!</h1>
            <p class="text-lg letra mb-8">Seleccione una opción para comenzar:</p>
            <div class="flex space-x-4">
            <button><a href="/dashboard"
                    class=" button">
                    Calculadora
                </a></button>
                <button><a href="/conversiones"
                    class=" button">
                    Convertir
                </a></button>
            </div>
        </div>
    </div>
</body>

</html>