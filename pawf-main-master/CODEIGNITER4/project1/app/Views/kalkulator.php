<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MacOS Calculator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .calculator {
            background: #1d1d1d;
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 32px 64px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 320px;
        }

        .display-container {
            background: #000;
            border-radius: 16px;
            margin-bottom: 20px;
            overflow: hidden;
            min-height: 140px;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .expression-display {
            color: #a6a6a6;
            font-size: 28px;
            font-weight: 300;
            text-align: right;
            min-height: 36px;
            flex-shrink: 0;
            letter-spacing: -1px;
            opacity: 0.8;
        }

        .display {
            background: transparent;
            color: #ff9500;
            font-size: 64px;
            font-weight: 300;
            text-align: right;
            padding: 0;
            border-radius: 0;
            margin: 0;
            overflow: hidden;
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            letter-spacing: -2px;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        button {
            height: 64px;
            border: none;
            border-radius: 16px;
            font-size: 28px;
            font-weight: 300;
            cursor: pointer;
            transition: all 0.1s ease;
            position: relative;
            overflow: hidden;
        }

        button:active {
            transform: scale(0.98);
            animation: rgbGlow 0.6s ease-in-out;
            box-shadow: 0 0 20px rgba(255, 0, 150, 0.8), inset 0 0 20px rgba(0, 255, 255, 0.3);
        }

        @keyframes rgbGlow {
            0% { 
                box-shadow: 0 0 20px #ff0000, inset 0 0 20px #ff0000;
                filter: hue-rotate(0deg);
            }
            33% { 
                box-shadow: 0 0 20px #00ff00, inset 0 0 20px #00ff00;
                filter: hue-rotate(120deg);
            }
            66% { 
                box-shadow: 0 0 20px #0000ff, inset 0 0 20px #0000ff;
                filter: hue-rotate(240deg);
            }
            100% { 
                box-shadow: 0 0 20px #ff00ff, inset 0 0 20px #ff00ff;
                filter: hue-rotate(300deg);
            }
        }

        .number {
            background: #333;
            color: #fff;
        }

        .number:hover {
            background: #404040;
        }

        .operator {
            background: linear-gradient(145deg, #ff9500, #ff9a00);
            color: #000;
            font-weight: 500;
            box-shadow: 0 8px 16px rgba(255, 149, 0, 0.3);
        }

        .operator:hover {
            background: linear-gradient(145deg, #ffb347, #ff9a00);
        }

        .function {
            background: #a6a6a6;
            color: #000;
            font-weight: 500;
        }

        .function:hover {
            background: #bfbfbf;
        }

        .zero {
            grid-column: span 2;
        }

        @media (max-width: 400px) {
            .calculator {
                padding: 20px;
                margin: 10px;
            }
            
            .display {
                font-size: 48px;
                padding: 20px 16px;
            }
            
            button {
                height: 56px;
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="calculator">
        <div class="display-container">
            <div class="expression-display" id="expression"> </div>
            <div class="display" id="display">0</div>
        </div>
        <div class="buttons">
            <button class="function" onclick="clearDisplay()">AC</button>
            <button class="function" onclick="toggleSign()">+/-</button>
            <button class="function" onclick="inputPercent()">&percnt;</button>
            <button class="operator" onclick="inputOperator('/')">÷</button>
            
            <button class="number" onclick="inputNumber('7')">7</button>
            <button class="number" onclick="inputNumber('8')">8</button>
            <button class="number" onclick="inputNumber('9')">9</button>
            <button class="operator" onclick="inputOperator('*')">×</button>
            
            <button class="number" onclick="inputNumber('4')">4</button>
            <button class="number" onclick="inputNumber('5')">5</button>
            <button class="number" onclick="inputNumber('6')">6</button>
            <button class="operator" onclick="inputOperator('-')">-</button>
            
            <button class="number" onclick="inputNumber('1')">1</button>
            <button class="number" onclick="inputNumber('2')">2</button>
            <button class="number" onclick="inputNumber('3')">3</button>
            <button class="operator" onclick="inputOperator('+')">+</button>
            
            <button class="number zero" onclick="inputNumber('0')">0</button>
            <button class="number" onclick="inputDecimal()">.</button>
            <button class="operator" onclick="calculate()" style="font-size: 32px;">=</button>
        </div>
    </div>

    <script>
let displayValue = '0';
        let expression = '';
        let previousValue = null;
        let operator = null;
        let waitingForOperand = false;
        let shouldClearExpression = false;

        const expressionDisplay = document.getElementById('expression');
        const display = document.getElementById('display');

function updateDisplays() {
            expressionDisplay.textContent = expression.trim() || ' ';
            display.textContent = formatDisplay(displayValue);
        }

        function updateDisplay() {
            updateDisplays();
        }

        function formatDisplay(value) {
            return parseFloat(value).toLocaleString('en') || '0';
        }

        function clearDisplay() {
            displayValue = '0';
            expression = '';
            previousValue = null;
            operator = null;
            waitingForOperand = false;
            shouldClearExpression = false;
            updateDisplays();
        }

        function inputNumber(num) {
            if (shouldClearExpression) {
                expression = '';
                shouldClearExpression = false;
            }
            if (waitingForOperand) {
                displayValue = num;
                waitingForOperand = false;
            } else {
                displayValue = displayValue === '0' || displayValue === '-0' ? num : displayValue + num;
            }
            expression += num;
            updateDisplays();
        }

        function inputDecimal() {
            if (shouldClearExpression) {
                expression = '';
                shouldClearExpression = false;
            }
            if (waitingForOperand) {
                displayValue = '0.';
                expression = '0.';
                waitingForOperand = false;
            } else if (displayValue.indexOf('.') === -1) {
                displayValue += '.';
                expression += '.';
            }
            updateDisplays();
        }

        function inputOperator(nextOperator) {
            const inputValue = parseFloat(displayValue);
            const opSymbol = {'+': '+', '-': '-', '*': '×', '/': '÷'}[nextOperator] || nextOperator;

            if (previousValue === null) {
                previousValue = inputValue;
                expression += opSymbol;
            } else if (operator) {
                const currentValue = previousValue || 0;
                const newValue = performCalculation(currentValue, inputValue, operator);

                displayValue = String(newValue);
                previousValue = newValue;
                expression += opSymbol;
                updateDisplays();
            } else {
                expression += opSymbol;
            }

            waitingForOperand = true;
            operator = nextOperator;
            updateDisplays();
        }

        function calculate() {
            const inputValue = parseFloat(displayValue);

            if (previousValue !== null && operator) {
                const currentValue = previousValue || 0;
                const newValue = performCalculation(currentValue, inputValue, operator);

                displayValue = String(newValue);
                expression += '=';
                previousValue = null;
                operator = null;
                shouldClearExpression = true;
                waitingForOperand = true;
                updateDisplays();
            }
        }

        function performCalculation(firstValue, secondValue, operator) {
            switch (operator) {
                case '+':
                    return firstValue + secondValue;
                case '-':
                    return firstValue - secondValue;
                case '*':
                    return firstValue * secondValue;
                case '/':
                    return secondValue === 0 ? 'Error' : firstValue / secondValue;
                default:
                    return secondValue;
            }
        }

        function toggleSign() {
            if (displayValue !== '0' && displayValue !== 'Error') {
                if (displayValue.startsWith('-')) {
                    displayValue = displayValue.slice(1);
                    // Remove - from expression if it's only affecting display
                } else {
                    displayValue = '-' + displayValue;
                }
                updateDisplays();
            }
        }

        function inputPercent() {
            const value = parseFloat(displayValue);
            if (!isNaN(value)) {
                displayValue = String(value / 100);
                updateDisplays();
            }
        }

        // Keyboard support
        document.addEventListener('keydown', function(event) {
            const key = event.key;
            
            if (key >= '0' && key <= '9') {
                inputNumber(key);
            } else if (key === '.') {
                inputDecimal();
            } else if (key === '+' || key === '-') {
                inputOperator(key);
            } else if (key === '*') {
                inputOperator('*');
            } else if (key === '/') {
                inputOperator('/');
            } else if (key === 'Enter' || key === '=') {
                calculate();
            } else if (key === 'Escape') {
                clearDisplay();
            }
        });

        updateDisplay();
    </script>
</body>
</html>
