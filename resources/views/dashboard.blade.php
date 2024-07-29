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
				height: 80vh;
				/* Para centrar verticalmente */
			}

			.calculator {
				padding: 10px;
				border-radius: 20px;
				background-color: #E6E6E7;
				box-shadow: 5px 5px 5px #000;
				border: 3px solid black;
				padding-top: 30px;
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
				height: 60px;
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
				margin-top: 20px;
				margin-bottom: 30px;
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

			button:hover {
				background-color: #E6E6E7;
				color: #000;
			}
		</style>
	</head>

	<body>
		<div class="calculator-container">
			<div class="calculator mt-40 p-4 rounded-lg shadow-lg">
				<input type="text" id="display" disabled
				placeholder="0"	class="w-full mb-4 p-2 text-right bg-white text-white shadow-inner rounded">

				<div class="buttons grid grid-cols-4 gap-1">
					<button style="background:#61f8ff;"  class=" p-0 m-1 text-black" onclick="appendNumber('0')">0</button>
					<button style="background:#61f8ff;"  class=" p-0 m-1 text-black " onclick="appendNumber('1')">1</button>
					<button style="background:#ff6e7f;" class=" p-0 m-1 text-black " onclick="clearDisplay()">C</button>
					<button style="background:#ff6e7f;"class=" p-0 m-1 text-black " onclick="deleteLast()">←</button>
					<button style="background:#FFEF9F;" class=" p-0 m-1 text-black " onclick="setOperation('+')">+</button>
					<button style="background:#FFEF9F;" class=" p-0 m-1 text-black " onclick="setOperation('-')">-</button>
					<button style="background:#FFEF9F;" class=" p-0 m-1 text-black " onclick="setOperation('*')">*</button>
					<button style="background:#FFEF9F;" class=" p-0 m-1 text-black " onclick="setOperation('/')">/</button>
					<button style="background:#84f0a1;"  class=" p-0 m-1 text-black col-span-4" onclick="calculate()">=</button>
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

		function appendNumber(number) {
			display.value += number;
		}

		function clearDisplay() {
			display.value = '';
			currentOperation = '';
			firstOperand = '';
			secondOperand = '';
		}

		function deleteLast() {
			display.value = display.value.slice(0, -1);
		}

		function setOperation(operation) {
			if (display.value === '') return;
			firstOperand = display.value;
			currentOperation = operation;
			display.value = '';
		}

		function calculate() {
			if (display.value === '' || currentOperation === '') return;
			secondOperand = display.value;
			let result;
			switch (currentOperation) {
				case '+':
					result = parseInt(firstOperand, 2) + parseInt(secondOperand, 2);
					break;
				case '-':
					result = parseInt(firstOperand, 2) - parseInt(secondOperand, 2);
					break;
				case '*':
					result = parseInt(firstOperand, 2) * parseInt(secondOperand, 2);
					break;
				case '/':
					result = parseInt(firstOperand, 2) / parseInt(secondOperand, 2);
					break;
			}
			display.value = result.toString(2);
			currentOperation = '';
			firstOperand = '';
			secondOperand = '';
		}

	</script>
</x-app-layout>