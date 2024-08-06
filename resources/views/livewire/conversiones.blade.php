<div>
	<x-app-layout>
		<!DOCTYPE html>
		<html lang="es">

		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Calculadora Binaria</title>
			<link rel="stylesheet" href="styles.css">
			<style>
				body {
					display: flex;
					justify-content: center;
					align-items: center;
					height: 100vh;
					background-color: #f0f0f0;
					font-family: Arial, sans-serif;
				}

				.calculator-container {
					display: flex;
					justify-content: center;
					align-items: center;
					height: 60vh;
					/* Para centrar verticalmente */
				}

				.calculator {
					padding: 10px;
					border-radius: 20px;
					background-color: #fff;
					box-shadow: 5px 5px 5px #000;
					border: 3px solid black;
					padding-top: 1px;
					width: 270px;
					height: auto;
				}

				#display {
					background-color: black;
					display: block;
					box-sizing: border-box;
					border: 0;
					text-align: right;
					font-size: 35px;
					font-family: 'Share Tech Mono', monospace;
					letter-spacing: -2px;
					border-radius: 5px;
					box-shadow: 0 -4px 4px -3px rgba(255, 255, 255, .3), 5px 0 3px -5px rgba(255, 255, 255, .8), 0 5px 5px -3px rgba(0, 0, 0, .5), -3px 0 3px -1px rgba(0, 0, 0, .8), inset 0 -5px 3px -4px rgba(0, 0, 0, .5), inset 5px 0 5px -2px rgba(0, 0, 0, .8);
					height: 65px;
					border-radius: 6px;
					text-align: right;
					padding-right: 8px;
					width: 240px;
					overflow-x: auto;
					margin: 0px 10px 0px;
					padding-top: 8px;
					margin: 5px auto;
					color: #d9d9d9;
				}

				.buttons {
					margin-top: 10px;
					margin-bottom: 40px;
					display: grid;
					grid-template-columns: repeat(4, 1fr);
				}

				button {
					cursor: pointer;
					border-radius: 10px;
					border: 3px solid black;
					color: #fff;
					font-size: 20pt;
					font-family: "Love Ya Like A Sister", cursive;
					box-shadow: 3px 2px #666;
					text-align: center;
					display: flex;
					justify-content: center;
					align-items: center;
				}

				select {
					cursor: pointer;
					border-radius: 10px;
					border: 3px solid black;
					color: #000;
					font-family: "Love Ya Like A Sister", cursive;
					box-shadow: 1px 1px #666;
				}

				button:hover {
					color: #fff;
				}

				#resultado {
					margin-top: 170px;
					padding: 10px;
					background-color: #e9ecef;
					border: 1px solid #ced4da;
					border-radius: 4px;
					font-size: 2.2em;
					color: #495057;
					text-align: right;
					white-space: pre;
				}
			</style>
		</head>

		<body>
			<div class="calculator-container">
				<div class="calculator mt-40 p-4 rounded-lg shadow-lg">
					<a href="{{route('dashboard')}}" class="bg-red-200 button">Conversiones</a>
					<input type="text" id="display" disabled placeholder=""
						class="w-full mb-4 p-2 text-right bg-white text-white shadow-inner rounded">
					<select id="conversion" class="w-full mt-2">
						<option value="binarioADecimal">Binario a Decimal</option>
						<option value="binarioAOctal">Binario a Octal</option>
						<option value="binarioAHexadecimal">Binario a Hexadecimal</option>
						<option value="octalABinario">Octal a Binario</option>
						<option value="decimalABinario" selected>Decimal a Binario</option>
						<option value="hexadecimalABinario">Hexadecimal a Binario</option>
					</select>
					<div class="buttons grid grid-cols-4 gap-1">

						<button style="display: none; background:black;"
							class="btnsBinario p-0 m-1 text-white text-center" onclick="appendNumber('0')">0</button>
						<button style="display: none; background:black;"
							class="btnsBinario p-0 m-1 text-white text-center " onclick="appendNumber('1')">1</button>
						<button style="display: none; background:black;"
							class="btnsBinario p-0 m-1 text-white text-center " onclick="appendNumber('.')">.</button>
						<button style="display: none; background:#ff6e7f;"
							class="btnsBinario p-0 m-1 text-white text-center " onclick="clearDisplay()">C</button>
						<button style="display: none; background:#ff6e7f;"
							class="btnsBinario p-0 m-1 text-white text-center " onclick="deleteLast()">←</button>
						<button style="display: none; background:#14f0a1;"
							class="btnsBinario p-0 m-1 text-white text-center col-span-3"
							onclick="convert()">Convertir</button>

						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('0')">0</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('1')">1</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('2')">2</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('3')">3</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('4')">4</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('5')">5</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('6')">6</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('7')">7</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('8')">8</button>
						<button style=" display: none;background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('9')">9</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('A')">A</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('B')">B</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('C')">C</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('D')">D</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('E')">E</button>
						<button style="display: none; background:#000;"
							class="hexadecimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('F')">F</button>
						<button style="display: none; background:black;"
							class="hexadecimalABinario p-0 m-1 text-white text-center "
							onclick="appendNumber('.')">.</button>
						<button style="display: none; background:#ff6e7f;"
							class="hexadecimalABinario p-0 m-1 text-white text-center"
							onclick="clearDisplay()">C</button>
						<button style="display: none; background:#ff6e7f;"
							class="hexadecimalABinario p-0 m-1 text-white text-center col-span-2 "
							onclick="deleteLast()">←</button>
						<button style="display: none; background:#14f0a1;"
							class=" p-0 m-1 text-white text-center col-span-4 hexadecimalABinario"
							onclick="convert()">Convertir</button>

						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('1')">1</button>
						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('2')">2</button>
						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('3')">3</button>
						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('4')">4</button>
						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('5')">5</button>
						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('6')">6</button>
						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('7')">7</button>
						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('8')">8</button>
						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('9')">9</button>
						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('0')">0</button>
						<button style="display: none; background:#ff6e7f;"
							class="decimalABinario p-0 m-1 text-white text-center" onclick="clearDisplay()">C</button>
						<button style="display: none; background:#ff6e7f;"
							class="decimalABinario p-0 m-1 text-white text-center" onclick="deleteLast()">←</button>
						<button style="display: none; background:#000;"
							class="decimalABinario p-0 m-1 text-white text-center"
							onclick="appendNumber('.')">.</button>
						<button style="display: none; background:#14f0a1;"
							class="decimalABinario p-0 m-1 text-white text-center col-span-3"
							onclick="convert()">Convertir</button>


						<button style="display: none; background:#000;"
							class="octalABinario p-0 m-1 text-white text-center " onclick="appendNumber('0')">0</button>
						<button style="display: none; background:#000;"
							class="octalABinario p-0 m-1 text-white text-center " onclick="appendNumber('1')">1</button>
						<button style="display: none; background:#000;"
							class="octalABinario p-0 m-1 text-white text-center " onclick="appendNumber('2')">2</button>
						<button style="display: none; background:#000;"
							class="octalABinario p-0 m-1 text-white text-center " onclick="appendNumber('3')">3</button>
						<button style="display: none; background:#000;"
							class="octalABinario p-0 m-1 text-white text-center " onclick="appendNumber('4')">4</button>
						<button style="display: none; background:#000;"
							class="octalABinario p-0 m-1 text-white text-center " onclick="appendNumber('5')">5</button>
						<button style="display: none; background:#000;"
							class="octalABinario p-0 m-1 text-white text-center " onclick="appendNumber('6')">6</button>
						<button style="display: none; background:#000;"
							class="octalABinario p-0 m-1 text-white text-center " onclick="appendNumber('7')">7</button>
						<button style="display: none; background:#000;"
							class="octalABinario p-0 m-1 text-white text-center " onclick="appendNumber('.')">.</button>
						<button style="display: none; background:#ff6e7f;"
							class="octalABinario p-0 m-1 text-white text-center " onclick="clearDisplay()">C</button>
						<button style="display: none; background:#ff6e7f;"
							class="octalABinario p-0 m-1 text-white text-center  col-span-2"
							onclick="deleteLast()">←</button>
						<button style="display: none; background:#14f0a1;"
							class="octalABinario p-0 m-1 text-white text-center col-span-4"
							onclick="convert()">Convertir</button>
					</div>
				</div>
			</div>
			<p id="resultado"></p>
		</body>

		</html>
		<script>
			// Funciones de conversión
			function binarioADecimal(binario) {
				let parts = binario.split('.');
				let integerPart = parseInt(parts[0], 2);
				let fractionalPart = parts[1] ? parseInt(parts[1], 2) / Math.pow(2, parts[1].length) : 0;
				return integerPart + fractionalPart;
			}

			function binarioAOctal(binario) {
				let decimal = binarioADecimal(binario);
				return decimalToOctal(decimal);
			}

			function binarioAHexadecimal(binario) {
				let decimal = binarioADecimal(binario);
				return decimalToHexadecimal(decimal);
			}

			function octalABinario(octal) {
				let decimal = parseInt(octal, 8);
				return decimalToBinary(decimal);
			}

			function decimalABinario(decimal) {
				let integerPart = Math.floor(decimal);
				let fractionalPart = decimal - integerPart;
				let binaryIntegerPart = integerPart.toString(2);
				let binaryFractionalPart = '';

				if (fractionalPart > 0) {
					binaryFractionalPart = '.';
					let count = 0;
					while (fractionalPart > 0 && count < 9) { // Limitar a 10 dígitos fraccionarios
						fractionalPart *= 2;
						if (fractionalPart >= 1) {
							binaryFractionalPart += '1';
							fractionalPart -= 1;
						} else {
							binaryFractionalPart += '0';
						}
						count++;
					}
				}

				return binaryIntegerPart + binaryFractionalPart;
			}

			function hexadecimalABinario(hexadecimal) {
				let parts = hexadecimal.split('.');
				let integerPart = parseInt(parts[0], 16).toString(2);
				let fractionalPart = parts[1] ? convertHexFractionalToBinary(parts[1]) : '';
				return fractionalPart ? integerPart + '.' + fractionalPart : integerPart;
			}

			function convertHexFractionalToBinary(fractionalPart) {
				let binaryFractionalPart = '';
				let decimalValue = 0;

				for (let i = 0; i < fractionalPart.length; i++) {
					decimalValue += parseInt(fractionalPart[i], 16) / Math.pow(16, i + 1);
				}

				let count = 0;
				while (decimalValue > 0 && count < 9) { // Limitar a 10 dígitos fraccionarios
					decimalValue *= 2;
					if (decimalValue >= 1) {
						binaryFractionalPart += '1';
						decimalValue -= 1;
					} else {
						binaryFractionalPart += '0';
					}
					count++;
				}

				return binaryFractionalPart;
			}

			function decimalToOctal(decimal) {
				let integerPart = Math.floor(decimal);
				let fractionalPart = decimal - integerPart;
				let octalIntegerPart = integerPart.toString(8);
				let octalFractionalPart = '';

				if (fractionalPart > 0) {
					octalFractionalPart = '.';
					let count = 0;
					while (fractionalPart > 0 && count < 9) { // Limitar a 10 dígitos fraccionarios
						fractionalPart *= 8;
						let digit = Math.floor(fractionalPart);
						octalFractionalPart += digit.toString(8);
						fractionalPart -= digit;
						count++;
					}
				}

				return octalIntegerPart + octalFractionalPart;
			}

			function decimalToHexadecimal(decimal) {
				let integerPart = Math.floor(decimal);
				let fractionalPart = decimal - integerPart;
				let hexIntegerPart = integerPart.toString(16).toUpperCase();
				let hexFractionalPart = '';

				if (fractionalPart > 0) {
					hexFractionalPart = '.';
					let count = 0;
					while (fractionalPart > 0 && count < 9) { // Limitar a 10 dígitos fraccionarios
						fractionalPart *= 16;
						let digit = Math.floor(fractionalPart);
						hexFractionalPart += digit.toString(16).toUpperCase();
						fractionalPart -= digit;
						count++;
					}
				}

				return hexIntegerPart + hexFractionalPart;
			}

			// Función para manejar la conversión
			function convert() {
				const resultadoElement = document.getElementById('resultado');
				const conversion = document.getElementById('conversion').value;
				const inputValue = document.getElementById('display').value;
				let convertedValue;

				switch (conversion) {
					case 'binarioADecimal':
						convertedValue = binarioADecimal(inputValue) + '₁₀';
						inputSubscript = '₂';
						break;
					case 'binarioAOctal':
						convertedValue = binarioAOctal(inputValue) + '₈';
						inputSubscript = '₂';
						break;
					case 'binarioAHexadecimal':
						convertedValue = binarioAHexadecimal(inputValue) + '₁₆';
						inputSubscript = '₂';
						break;
					case 'octalABinario':
						convertedValue = octalABinario(inputValue) + '₂';
						inputSubscript = '₈';
						break;
					case 'decimalABinario':
						convertedValue = decimalABinario(inputValue) + '₂';
						inputSubscript = '₁₀';
						break;
					case 'hexadecimalABinario':
						convertedValue = hexadecimalABinario(inputValue) + '₂';
						inputSubscript = '₁₆';
						break;
					default:
						convertedValue = 'Seleccione una conversión válida';
				}
				resultadoElement.innerHTML = `${inputValue}${inputSubscript} = ${convertedValue}`;
				display.value = convertedValue
			}

			// Añadir evento al botón
			document.querySelector('button').addEventListener('click', convert);
		</script>
		<script>
			document.addEventListener('DOMContentLoaded', () => {
				const conversion = document.getElementById('conversion');
				const decimal = document.querySelectorAll('.decimalABinario');
				const hexadecimal = document.querySelectorAll('.hexadecimalABinario');
				const octal = document.querySelectorAll('.octalABinario');
				const binario = document.querySelectorAll('.btnsBinario');

				const showButtons = (value) => {
					// Ocultar todos los botones primero
					decimal.forEach(field => field.style.display = 'none');
					hexadecimal.forEach(field => field.style.display = 'none');
					octal.forEach(field => field.style.display = 'none');
					binario.forEach(field => field.style.display = 'none');

					// Mostrar los botones correspondientes a la opción seleccionada
					if (value === 'decimalABinario') {
						decimal.forEach(field => field.style.display = 'flex');
					} else if (value === 'hexadecimalABinario') {
						hexadecimal.forEach(field => field.style.display = 'flex');
					} else if (value === 'octalABinario') {
						octal.forEach(field => field.style.display = 'flex');
					} else if (value === 'binarioADecimal' || value === 'binarioAOctal' || value === 'binarioAHexadecimal') {
						binario.forEach(field => field.style.display = 'flex');
					}
				};

				// Mostrar los botones correspondientes a la opción seleccionada por defecto
				showButtons(conversion.value);

				conversion.addEventListener('change', () => {
					showButtons(conversion.value);
				});
			});

		</script>

		<script>
			let display = document.getElementById('display');
			let currentOperation = '';
			let firstOperand = '';
			let secondOperand = '';

			function clearDisplay() {
				display.value = '';
				currentOperation = '';
				firstOperand = '';
				secondOperand = '';
				document.getElementById('resultado').textContent = '';
			}

			function deleteLast() {
				display.value = display.value.slice(0, -1);
			}

			function appendNumber(number) {
				display.value += number;
			}

			function setOperation(operation) {
				if (display.value === '') return;
				if (operation === '¬') {
					let number = parseBinaryToDecimal(display.value);
					if (isNaN(number)) {
						display.value = 'Error';
						return;
					}
					let complementedNumber = ~number & ((1 << display.value.length) - 1);
					let binaryResult = decimalToBinary(complementedNumber);
					display.value = binaryResult;
				} else {
					firstOperand = display.value;
					currentOperation = operation;
					display.value += operation;
				}
			}

			function calculate() {
				if (display.value === '' || currentOperation === '') return;
				let operands = display.value.split(currentOperation);
				if (operands.length !== 2) return;
				firstOperand = operands[0];
				secondOperand = operands[1];
				let result;
				let firstNumber = parseBinaryToDecimal(firstOperand);
				let secondNumber = parseBinaryToDecimal(secondOperand);

				switch (currentOperation) {
					case '+':
						result = firstNumber + secondNumber;
						break;
					case '-':
						result = firstNumber - secondNumber;
						break;
					case '*':
						result = firstNumber * secondNumber;
						break;
					case '/':
						if (secondNumber === 0) {
							display.value = 'Error';
							return;
						}
						result = firstNumber / secondNumber;
						break;
					default:
						display.value = 'Error';
						return;
				}

				display.value = decimalToBinary(result);
				currentOperation = '';
				firstOperand = '';
				secondOperand = '';
			}

			function parseBinaryToDecimal(binary) {
				let parts = binary.split('.');
				let integerPart = parseInt(parts[0], 2);
				let fractionalPart = parts[1] ? parseInt(parts[1], 2) / Math.pow(2, parts[1].length) : 0;
				return integerPart + fractionalPart;
			}

			function decimalToBinary(decimal) {
				let integerPart = Math.floor(decimal);
				let fractionalPart = decimal - integerPart;
				let binaryIntegerPart = integerPart.toString(2);
				let binaryFractionalPart = '';

				while (fractionalPart > 0) {
					fractionalPart *= 2;
					if (fractionalPart >= 1) {
						binaryFractionalPart += '1';
						fractionalPart -= 1;
					} else {
						binaryFractionalPart += '0';
					}
					// Limitar la longitud de la parte fraccionaria para evitar bucles infinitos
					if (binaryFractionalPart.length > 9) break;
				}

				return binaryFractionalPart ? binaryIntegerPart + '.' + binaryFractionalPart : binaryIntegerPart;
			}
		</script>
	</x-app-layout>
</div>