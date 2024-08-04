<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
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
            position: relative;
        }
        .input-group input {
            border-radius: 6px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
            width: calc(100% - 120px);
            background-color: #f9f9f9;
        }
        .input-group .decimal-output {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 100px;
            text-align: center;
            color: #333;
        }
        .btn {
            padding: 8px 12px;
            font-size: 14px;
        }
        .result-box {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        .result-box span {
            display: block;
            margin-bottom: 5px;
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
                <a href="/calculator" class="px-4 py-2 hover:bg-blue-700 rounded">Calculadora</a>
                <a href="/converter" class="px-4 py-2 hover:bg-blue-700 rounded">Convertir</a>
            </div>     
    </nav>
    <br>
    <div class="container mx-auto mt-20">
        <div class="mb-4">
            <label for="base-select" class="block text-sm font-medium text-gray-900">Selecciona la base numérica</label>
            <select id="base-select" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="2">Binario</option>
                <option value="8">Octal</option>
                <option value="10">Decimal</option>
                <option value="16">Hexadecimal</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="operation-select" class="block text-sm font-medium text-gray-900">Selecciona la operación</label>
            <select id="operation-select" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="add">Suma</option>
                <option value="subtract">Resta</option>
                <option value="multiply">Multiplicación</option>
                <option value="divide">División</option>
            </select>
        </div>
        <div id="input-container">
            <div class="input-group">
                <input type="text" class="input-number" placeholder="Número 1" oninput="updateDecimal(this)" />
                <div class="decimal-output" id="decimal-output1">0</div>
            </div>
            <div class="input-group">
                <input type="text" class="input-number" placeholder="Número 2" oninput="updateDecimal(this)" />
                <div class="decimal-output" id="decimal-output2">0</div>
            </div>
            <div class="flex justify-center gap-2">
                <button id="add-input" class="btn bg-blue-500 text-white rounded-md">Agregar Casilla</button>
                <button id="clear-inputs" class="btn bg-red-500 text-white rounded-md">Limpiar Casillas</button>
            </div>
        </div>
        <button id="calculate" class="btn mt-4 w-full bg-green-500 text-white rounded-md">Calcular</button>
        <div id="result-container" class="mt-4 flex gap-4">
            <div id="result-base" class="result-box w-full">
                <span id="result">Resultado: </span>
            </div>
            <div id="result-decimal" class="result-box w-full">
                <span id="decimal-result">Decimal: </span>
            </div>
        </div>
    </div>

    <script>
        const updateDecimal = (input) => {
            const base = parseInt(document.getElementById('base-select').value);
            const decimalOutput = input.parentElement.querySelector('.decimal-output');
            const value = input.value;

            try {
                const decimalValue = parseInt(value, base) || 0;
                decimalOutput.textContent = decimalValue;
            } catch {
                decimalOutput.textContent = '0';
            }
        };

        document.getElementById('add-input').addEventListener('click', () => {
            const container = document.getElementById('input-container');
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group';
            newInputGroup.innerHTML = '<input type="text" class="input-number" placeholder="Número" oninput="updateDecimal(this)" /><div class="decimal-output">0</div>';
            container.insertBefore(newInputGroup, document.querySelector('.flex'));
        });

        document.getElementById('clear-inputs').addEventListener('click', () => {
            const container = document.getElementById('input-container');
            const inputGroups = container.querySelectorAll('.input-group');
            for (let i = inputGroups.length - 1; i >= 2; i--) {
                container.removeChild(inputGroups[i]);
            }
            inputGroups.forEach(inputGroup => {
                inputGroup.querySelector('input').value = '';
                inputGroup.querySelector('.decimal-output').textContent = '0';
            });
        });

        document.getElementById('calculate').addEventListener('click', () => {
            const base = parseInt(document.getElementById('base-select').value);
            const operation = document.getElementById('operation-select').value;
            const numbers = Array.from(document.querySelectorAll('.input-number')).map(input => parseInt(input.value, base));

            if (numbers.length < 2) {
                document.getElementById('result-base').innerHTML = 'Por favor, ingresa al menos dos números.';
                document.getElementById('decimal-result').textContent = '';
                return;
            }

            try {
                let result;
                const [num1, num2] = numbers;
                
                switch (operation) {
                    case 'add':
                        result = num1 + num2;
                        break;
                    case 'subtract':
                        result = num1 - num2;
                        break;
                    case 'multiply':
                        result = num1 * num2;
                        break;
                    case 'divide':
                        result = num1 / num2;
                        break;
                    default:
                        throw new Error('Operación no válida.');
                }

                const resultBase = result.toString(base).toUpperCase();
                const resultDecimal = result.toString(10);

                document.getElementById('result-base').innerHTML = `Resultado: ${resultBase}<sub>${base}</sub>`;
                document.getElementById('decimal-result').innerHTML = `Decimal: ${resultDecimal}<sub>10</sub>`;
            } catch (error) {
                document.getElementById('result-base').textContent = 'Error en los cálculos.';
                document.getElementById('decimal-result').textContent = '';
            }
        });
    </script>
</body>
</html>
