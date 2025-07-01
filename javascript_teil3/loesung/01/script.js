let myPromise = new Promise(function(resolve, reject) {
	console.log("Executing some code ...")
	let el = document.getElementById("testcontainer")
	if(el == null){
		reject()
	}
	else{
		el.innerHTML = "Hallo Welt!"
		resolve()
	}
})