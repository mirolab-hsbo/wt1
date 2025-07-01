async function myFunction(textToAdd) {
	console.log("Executing some code ...")
    let el = document.getElementById("testcontainer")
    if (el == null) {
        throw new Error("Element nicht vorhanden!")
    }
    else {
        el.innerHTML += textToAdd
    }
}

myFunction("Hallo")
.then(function(){
	return myFunction(" ")
})
.then(function(){
	return myFunction("Welt")
})
.then(function(){
	return myFunction("!")
})
