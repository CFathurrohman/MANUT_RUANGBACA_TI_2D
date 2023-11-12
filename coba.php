<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: antiquewhite;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .calculator {
            width: 220px;
            height: 320px;
            border: 1px solid #000;
            border-radius: 5px;
            padding: 20px;
            background-color: black;
        }

        .display {
            width: 100%;
            height: 40px;
            background-color: darkgray;
            margin-bottom: 20px;
            padding: 10px;
            text-align: right;
            font-size: 20px;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        button {
            width: 100%;
            height: 40px;
            background-color: darkgray;
            border: 1px solid #000;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        button:hover {
            background-color: #e0e0e0;
        }

        button:active {
            background-color: #d0d0d0;
        }
    </style>
</head>
<body>
<div class="calculator">
    <div class="display">0</div>
    <div class="buttons">
        <button>7</button>
        <button>8</button>
        <button>9</button>
        <button>/</button>
        <button>4</button>
        <button>5</button>
        <button>6</button>
        <button>*</button>
        <button>1</button>
        <button>2</button>
        <button>3</button>
        <button>-</button>
        <button>0</button>
        <button>.</button>
        <button>+</button>
        <button>=</button>
    </div>
</div>
</body>
</html>