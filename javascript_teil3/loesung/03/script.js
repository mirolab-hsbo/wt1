async function myFunction() {
	console.log("Executing some code ...")
    let el = document.getElementById("testcontainer")
    if (el == null) {
        throw new Error("Element nicht vorhanden!")
    }
    else {
        el.innerHTML = "Hallo Welt!"
    }
}

myFunction()
    .then(function () {
        console.log("Erfolgreich eingefügt!")
    })
    .catch(function () {
        console.log("Ein Fehler ist aufgetreten. Eventuell existiert das Element nicht?")
    })