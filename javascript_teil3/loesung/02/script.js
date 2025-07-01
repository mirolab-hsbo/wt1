let myPromise = new Promise(function (resolve, reject) {
    console.log("Executing some code ...")
    let el = document.getElementById("testcontainer")
    if (el == null) {
        reject()
    }
    else {
        el.innerHTML = "Hallo Welt!"
        resolve()
    }
})

myPromise
    .then(function () {
        console.log("Erfolgreich eingefügt!")
    })
    .catch(function () {
        console.log("Ein Fehler ist aufgetreten. Eventuell existiert das Element nicht?")
    })