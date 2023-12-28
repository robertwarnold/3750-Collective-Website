const colorChoice = document.getElementById("colorChoice");
const generateDot = document.getElementById("generateDot");
const windowBox = document.getElementById("windowBox");
const printTotal = document.getElementById("printTotal");
let totalSum = 0;

generateDot.addEventListener("click", generateDot);
clickMove.addEventListener("click", clickMove);

function generateDot() {
    const color = colorChoice.value;
    const button = document.createElement("button");
    button.className = "button";
    button.style.backgroundColor = color;
    button.style.left = getRandomPosition(windowBox.offsetWidth - 50) + "px";
    button.style.top = getRandomPosition(windowBox.offsetHeight - 50) + "px";
    button.innerText = getRandomNumber();
    
    button.addEventListener("click", () => {
        changeButtonColor(button);
        updateTotal(button.innerText);
    });

    windowBox.appendChild(button);
}

function getRandomPosition(max) {
    return Math.floor(Math.random() * max);
}

function getRandomNumber() {
    return Math.floor(Math.random() * 99) + 1;
}

function changeButtonColor(button) {
    const color = colorChoice.value;
    button.style.backgroundColor = color;
}

function updateTotal(number) {
    totalSum += parseInt(number);
    printTotal.textContent = "Total: " + totalSum;
}