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
				font-family: Arial, sans-serif;
			}

			.calculator-container {
				display: flex;
				justify-content: center;
				align-items: center;
				height: 80vh;
				/* Para centrar verticalmente */
			}

			.calculator {
				padding: 10px;
				border-radius: 20px;
				background-color: #fff;
				box-shadow: 5px 5px 5px #000;
				border: 3px solid black;
				padding-top: 1px;
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
				padding-right: 15px;
				width: 235px;
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
				color: #000;
				font-size: 20pt;
				font-family: "Love Ya Like A Sister", cursive;
				box-shadow: 3px 2px #666;
			}

			
		</style>
	</head>

	<body>
		<div class="calculator-container">
			<div class="calculator mt-40 p-4 rounded-lg shadow-lg">
				<a href="{{route('conversiones')}}" class="button bg-green-200">Calculadora</a>
				<input type="text" id="display" disabled placeholder=""
					class="w-full mb-4 p-2 text-right bg-white text-white shadow-inner rounded">
				<div class="buttons grid grid-cols-4 gap-1">
					<button style="background: black;" class=" p-0 m-1 text-white"
						onclick="appendNumber('0')">0</button>
					<button style="background: black;" class=" p-0 m-1 text-white "
						onclick="appendNumber('1')">1</button>
					<button style="background:#ff6e7f;" class=" p-0 m-1 text-black " onclick="clearDisplay()">C</button>
					<button style="background:#ff6e7f;" class=" p-0 m-1 text-black " onclick="deleteLast()">←</button>
					<button style="background:#FFEF9F;" class=" p-0 m-1 text-black "
						onclick="setOperation('+')">+</button>
					<button style="background:#FFEF9F;" class=" p-0 m-1 text-black "
						onclick="setOperation('-')">-</button>
					<button style="background:#FFEF9F;" class=" p-0 m-1 text-black "
						onclick="setOperation('*')">*</button>
					<button style="background:#FFEF9F;" class=" p-0 m-1 text-black "
						onclick="setOperation('/')">/</button>

					<button style="background:#fff;" class=" p-0 m-1 text-black col-span-1"
						onclick="setOperation('¬')">¬</button>
					<button style="background:#84f0a1;" class=" p-0 m-1 text-black col-span-3"
						onclick="calculate()">=</button>
				</div>
			</div>
		</div>
	</body>

	</html>
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
				if (binaryFractionalPart.length > 10) break;
			}

			return binaryFractionalPart ? binaryIntegerPart + '.' + binaryFractionalPart : binaryIntegerPart;
		}
	</script>
</x-app-layout>