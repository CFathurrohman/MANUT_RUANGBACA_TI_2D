<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="styles.css">
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
    </div>
</div>
<script>
    document.querySelector('.calculator').addEventListener('click', function(e) {
        if (e.target.tagName === 'BUTTON') {
            const display = document.querySelector('.display');
            const buttonValue = e.target.textContent;
            display.textContent += buttonValue;
        }
    });
</script>
</body>
</html>