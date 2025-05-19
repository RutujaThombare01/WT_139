let memory = 0;

function appendValue(value) {
    document.getElementById('display').value += value;
}

function clearDisplay() {
    document.getElementById('display').value = '';
}

function deleteLast() {
    let display = document.getElementById('display');
    display.value = display.value.slice(0, -1);
}

function calculateResult() {
    let display = document.getElementById('display');
    try {
        display.value = eval(display.value) || '';
    } catch {
        display.value = 'Error';
    }
}

function calculateSquare() {
    let display = document.getElementById('display');
    display.value = Math.pow(display.value, 2);
}

function calculateSquareRoot() {
    let display = document.getElementById('display');
    display.value = Math.sqrt(display.value);
}

function calculateReciprocal() {
    let display = document.getElementById('display');
    display.value = 1 / display.value;
}

function memoryClear() {
    memory = 0;
    alert("Memory Cleared");
}

function memoryRecall() {
    document.getElementById('display').value = memory;
}

function memoryAdd() {
    let display = document.getElementById('display');
    memory += parseFloat(display.value) || 0;
    display.value = '';
    alert("Added to Memory");
}

function memorySubtract() {
    let display = document.getElementById('display');
    memory -= parseFloat(display.value) || 0;
    display.value = '';
    alert("Subtracted from Memory");
}
