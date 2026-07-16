var isBlue = false;
const fruits = ["Apfel", "Banane", "Orange", "Birne"];

function createGreeting(name) {
    return "Hallo " + name + "!";
}

document.addEventListener("DOMContentLoaded", function () {

    const body = document.getElementById("bd");
    const a1 = document.getElementById("a1");
    const a2 = document.getElementById("a2");
    const b1 = document.getElementById("b2");

    const headline = document.createElement("h1");
    headline.textContent = "JavaScript DOM-Test";
    body.insertBefore(headline, a1);

    b1.textContent = "Dieser Text wurde mit JavaScript eingefügt.";

    a1.style.backgroundColor = "lightgray";
    a1.style.padding = "10px";

    const paragraph = document.createElement("p");
    paragraph.textContent = "Dies ist ein dynamisch erzeugter Absatz.";
    b1.appendChild(paragraph);

    const list = document.createElement("ul");

    for (let i = 0; i < fruits.length; i++) {
        const item = document.createElement("li");
        item.textContent = fruits[i];
        list.appendChild(item);
    }

    b1.appendChild(list);

    const button = document.createElement("button");
    button.textContent = "Text ändern";
    b1.appendChild(button);

    button.addEventListener("click", function () {
        a2.textContent = "Der ursprüngliche Text wurde geändert.";
    });

    const colorButton = document.createElement("button");
    colorButton.textContent = "Farbe ändern";
    b1.appendChild(colorButton);

    colorButton.addEventListener("click", function () {
        if (isBlue) {
            a1.style.backgroundColor = "lightgray";
        } else {
            a1.style.backgroundColor = "lightblue";
        }

        isBlue = !isBlue;
    });


    const greeting = document.createElement("p");
    greeting.textContent = createGreeting("Webtechnologien");
    b1.appendChild(greeting);

    const date = new Date();
    const dateParagraph = document.createElement("p");
    dateParagraph.textContent = "Aktuelles Datum: " +
        date.toLocaleDateString();

    b1.appendChild(dateParagraph);

});