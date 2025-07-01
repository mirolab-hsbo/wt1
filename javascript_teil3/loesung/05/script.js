fetch("https://catfact.ninja/fact")
.then(function(result){
    return result.json()
}).then((json) => {
    console.log(json)
}).catch(function(err){
    console.log(err)
})
