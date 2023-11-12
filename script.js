document.getElementById('clear').addEventListener('click', clearDisplay);

let buttons = document.getElementsByClassName('button');
for(let button of buttons) {
    button.addEventListener('click', appendToDisplay);
}

let display = document.getElementById('display');
let prevNumber = 0;
let currentOperation = '';

function appendToDisplay() {
    if(this.id === 'decimal' && display.textContent.includes('.')) return;
    if(this.id === 'equals') {
        if(currentOperation === '+') display.textContent = prevNumber + parseFloat(display.textContent);
        if(currentOperation === '-') display.textContent = prevNumber - parseFloat(display.textContent);
        if(currentOperation === '*') display.textContent = prevNumber * parseFloat(display.textContent);
        if(currentOperation === '/') display.textContent = prevNumber / parseFloat(display.textContent);
        return;
    }
    if(display.textContent === '0' || currentOperation !== '') {
        display.textContent = this.id === 'decimal' ? '0.' : this.id;
    } else {
        display.textContent += this.id === 'decimal' ? '.' : this.id;
    }
    if(this.id === '+' || this.id === '-' || this.id === '*' || this.id === '/') {
        prevNumber = parseFloat(display.textContent);
        currentOperation = this.id;
    }
}

function clearDisplay() {
    display.textContent = '0';
    prevNumber = 0;
    currentOperation = '';
}