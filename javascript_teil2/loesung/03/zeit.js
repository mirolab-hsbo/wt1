var d = new Date();
var h = d.getHours();

var el = document.getElementById('ausgabe');

if (h >= 11 && h <= 13){
	for (var i = 0; i < 10; i++){
		el.innerHTML += "Mittagspause!<br />";
	}
}
else{
	el.innerHTML = "Noch kein Feierabend...";
}
