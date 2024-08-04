<!-- resources/views/livewire/calculator.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="{{ asset('css/calculadora.css') }}">
   
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(at 21.980550567522773% 29.650507060184793%, hsla(0, 0%, 90.19607843137256%, 1) 0%, hsla(0, 0%, 90.19607843137256%, 0) 100%), radial-gradient(at 5.675583183471655% 56.09646661582133%, hsla(0, 0%, 78.43137254901961%, 1) 0%, hsla(0, 0%, 78.43137254901961%, 0) 100%), radial-gradient(at 46.95963957828448% 81.16631764526292%, hsla(0, 0%, 67.05882352941175%, 1) 0%, hsla(0, 0%, 67.05882352941175%, 0) 100%), radial-gradient(at 24.547757547950756% 51.598496103273405%, hsla(0, 0%, 45.09803921568628%, 1) 0%, hsla(0, 0%, 45.09803921568628%, 0) 100%), radial-gradient(at 48.834625417466015% 99.61010503814197%, hsla(0, 0%, 90.19607843137256%, 1) 0%, hsla(0, 0%, 90.19607843137256%, 0) 100%), radial-gradient(at 13.418770287805938% 54.396993215925725%, hsla(0, 0%, 78.43137254901961%, 1) 0%, hsla(0, 0%, 78.43137254901961%, 0) 100%), radial-gradient(at 82.1907139703395% 98.68780554195669%, hsla(0, 0%, 67.05882352941175%, 1) 0%, hsla(0, 0%, 67.05882352941175%, 0) 100%), radial-gradient(at 91.3445121317676% 19.543600342422017%, hsla(0, 0%, 45.09803921568628%, 1) 0%, hsla(0, 0%, 45.09803921568628%, 0) 100%), radial-gradient(at 72.11722378277973% 65.71232820185257%, hsla(0, 0%, 90.19607843137256%, 1) 0%, hsla(0, 0%, 90.19607843137256%, 0) 100%), radial-gradient(at 74.96403577774726% 74.1335580753314%, hsla(0, 0%, 78.43137254901961%, 1) 0%, hsla(0, 0%, 78.43137254901961%, 0) 100%);
        }
        nav {
            background-color: #1d4ed8; /* Color de fondo para la barra de navegación */
            color: #ffffff; /* Color de texto para la barra de navegación */
            padding: 1rem 1rem; /* Espaciado interno */
            width: 100%;
            position: top; /* Fija la barra de navegación en la parte superior */
            top: 1;
            left: 1;
            z-index: 100; /* Asegura que esté sobre otros elementos */
}
        .container {
            position: relative;
            max-width: 400px;
            width: 100%;
            border-radius: 12px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        .display {
            height: 80px;
            width: 100%;
            outline: none;
            border: none;
            text-align: right;
            margin-bottom: 10px;
            font-size: 25px;
            color: #000e1a;
            pointer-events: none;
        }
        .select-wrapper {
            margin-bottom: 10px;
        }
        .select-wrapper select {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            background-color: #f9f9f9;
        }
        .buttons {
            display: grid;
            grid-gap: 10px;
            grid-template-columns: repeat(4, 1fr);
        }
        .buttons button {
            padding: 10px;
            border-radius: 6px;
            border: none;
            font-size: 20px;
            cursor: pointer;
            background-color: #eee;
        }
        .buttons button:active {
            transform: scale(0.99);
        }
        .operator {
            color: #2f9fff;
        }
    </style>
</head>
<body>

 
    <div class="container">
        <input type="text" class="display" readonly />
        <div class="select-wrapper">
            <select id="base-select">
                <option value="bin" selected>Binario</option>
                <option value="oct">Octal</option>
                <option value="dec">Decimal</option>
                <option value="hex">Hexadecimal</option>
            </select>
        </div>
        <div class="buttons">
            <button data-value="1">1</button>
            <button data-value="2">2</button>
            <button data-value="3">3</button>
            <button data-value="+">+</button>
            <button data-value="4">4</button>
            <button data-value="5">5</button>
            <button data-value="6">6</button>
            <button data-value="-">-</button>
            <button data-value="7">7</button>
            <button data-value="8">8</button>
            <button data-value="9">9</button>
            <button data-value="*">*</button>
            <button data-value="0">0</button>
            <button data-value=".">.</button>
            <button data-value="=">=</button>
            <button data-value="/">/</button>
            <button data-value="AC">AC</button>
            <button data-value="DEL">DEL</button>
        </div>
    </div>
    <script>// assets/js/calculadora.js

const display = document.querySelector(".display");
const buttons = document.querySelectorAll(".buttons button");
const baseSelect = document.getElementById("base-select");

let output = "";
let currentBase = "bin";

// Function to convert number based on current base
const convertNumber = (number, fromBase, toBase) => {
    return parseInt(number, fromBase).toString(toBase);
};

// Function to calculate based on button clicked
const calculate = (btnValue) => {
    if (btnValue === "=" && output !== "") {
        try {
            let result = eval(output.replace("%", "/100"));

            // Convert result based on selected base
            if (currentBase === "bin") {
                display.value = convertNumber(result, 10, 2);
            } else if (currentBase === "oct") {
                display.value = convertNumber(result, 10, 8);
            } else if (currentBase === "hex") {
                display.value = convertNumber(result, 10, 16);
            } else {
                display.value = result;
            }
        } catch (e) {
            display.value = "Error";
        }
    } else if (btnValue === "AC") {
        output = "";
        display.value = "";
    } else if (btnValue === "DEL") {
        output = output.slice(0, -1);
        display.value = output;
    } else {
        if (output === "" && ["+", "-", "*", "/"].includes(btnValue)) return;
        output += btnValue;
        display.value = output;
    }
};

// Event listener for button clicks
buttons.forEach(button => {
    button.addEventListener("click", (e) => calculate(e.target.dataset.value));
});

// Event listener for base selection changes
baseSelect.addEventListener("change", (e) => {
    currentBase = e.target.value;
    if (display.value) {
        // Convert current display value based on new base
        display.value = convertNumber(display.value, 10, parseInt(currentBase));
    }
});
</script>
</body>
</html>
