<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión entre Bases</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^3.0/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@^1.6.3/dist/flowbite.min.css">
    <style>
        body {
            background: radial-gradient(at 21.980550567522773% 29.650507060184793%, hsla(0, 0%, 90.19607843137256%, 1) 0%, hsla(0, 0%, 90.19607843137256%, 0) 100%), radial-gradient(at 5.675583183471655% 56.09646661582133%, hsla(0, 0%, 78.43137254901961%, 1) 0%, hsla(0, 0%, 78.43137254901961%, 0) 100%), radial-gradient(at 46.95963957828448% 81.16631764526292%, hsla(0, 0%, 67.05882352941175%, 1) 0%, hsla(0, 0%, 67.05882352941175%, 0) 100%), radial-gradient(at 24.547757547950756% 51.598496103273405%, hsla(0, 0%, 45.09803921568628%, 1) 0%, hsla(0, 0%, 45.09803921568628%, 0) 100%), radial-gradient(at 48.834625417466015% 99.61010503814197%, hsla(0, 0%, 90.19607843137256%, 1) 0%, hsla(0, 0%, 90.19607843137256%, 0) 100%), radial-gradient(at 13.418770287805938% 54.396993215925725%, hsla(0, 0%, 78.43137254901961%, 1) 0%, hsla(0, 0%, 78.43137254901961%, 0) 100%), radial-gradient(at 82.1907139703395% 98.68780554195669%, hsla(0, 0%, 67.05882352941175%, 1) 0%, hsla(0, 0%, 67.05882352941175%, 0) 100%), radial-gradient(at 91.3445121317676% 19.543600342422017%, hsla(0, 0%, 45.09803921568628%, 1) 0%, hsla(0, 0%, 45.09803921568628%, 0) 100%), radial-gradient(at 72.11722378277973% 65.71232820185257%, hsla(0, 0%, 90.19607843137256%, 1) 0%, hsla(0, 0%, 90.19607843137256%, 0) 100%), radial-gradient(at 74.96403577774726% 74.1335580753314%, hsla(0, 0%, 78.43137254901961%, 1) 0%, hsla(0, 0%, 78.43137254901961%, 0) 100%);
        }
        .container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            margin-top: 60px; /* Espacio suficiente para la barra de navegación fija */
        }
        .input-group {
            margin-bottom: 10px;
        }
        .input-group input {
            border-radius: 6px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
            width: calc(100% - 22px);
            background-color: #f9f9f9;
        }
        .btn {
            padding: 8px 12px;
            font-size: 14px;
        }
        .subscript {
            font-size: 0.75em;
            vertical-align: sub;
        }
    </style>
</head>
<body>
   
   <!-- Barra de menú -->
   <nav class="bg-blue-500 text-white p-4 fixed top-0 w-full z-10">       
            
            <div>
                <a href="/" class="text-xl font-bold">Calculadora Boole</a>
                <a href="/" class="px-4 py-2 hover:bg-blue-700 rounded">Inicio</a>
                <a href="/calculator" class="px-4 py-2 hover:bg-blue-700 rounded">Operaciones</a>
                <a href="/converter" class="px-4 py-2 hover:bg-blue-700 rounded">Conversiones</a>
            </div>     
    </nav>

    <br>

    <div class="text-center my-10">
        <h1 class="text-2xl font-bold text-gray-900">
            Conversor de Sistemas Numéricos
        </h1>
        <p class="mt-2 text-lg text-gray-700">
            Puedes realizar conversiones entre los sistemas numéricos: Binarios, decimales, hexadecimales y octales. 
        </p>
    </div>

    <div class="container mx-auto mt-20">
        <div class="mb-4">
            <label for="from-base-select" class="block text-sm font-medium text-gray-900">Base de origen</label>
            <select id="from-base-select" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="2">Binario</option>
                <option value="8">Octal</option>
                <option value="10">Decimal</option>
                <option value="16">Hexadecimal</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="to-base-select" class="block text-sm font-medium text-gray-900">Base de destino</label>
            <select id="to-base-select" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="2">Binario</option>
                <option value="8">Octal</option>
                <option value="10">Decimal</option>
                <option value="16">Hexadecimal</option>
            </select>
        </div>
        <div class="mb-4">
    <label for="input-number" class="block text-sm font-medium text-gray-900">Número a convertir</label>
    <input id="input-number" type="text" class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out" placeholder="Número" />
</div>

        <button id="convert" class="btn mt-4 w-full bg-green-500 text-white rounded-md">Convertir</button>
        <div id="result" class="mt-4 p-2 border border-gray-300 rounded-md"></div>
    </div>

    <script>
        document.getElementById('convert').addEventListener('click', () => {
            const fromBase = parseInt(document.getElementById('from-base-select').value);
            const toBase = parseInt(document.getElementById('to-base-select').value);
            const inputNumber = document.getElementById('input-number').value.trim();

            if (!inputNumber) {
                document.getElementById('result').textContent = 'Por favor, ingresa un número.';
                return;
            }

            const convert = (number, fromBase, toBase) => {
                return parseInt(number, fromBase).toString(toBase).toUpperCase();
            };

            try {
                const result = convert(inputNumber, fromBase, toBase);
                document.getElementById('result').innerHTML = `Resultado: ${result}<span class="subscript">${toBase}</span>`;
            } catch (error) {
                document.getElementById('result').textContent = 'Error en la conversión.';
            }
        });
    </script>
</body>
</html>
