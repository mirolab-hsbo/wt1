function ausgabe(text){
	console.log(text)
}
var wochentage = new Array('Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag');

for (var i = 0; i <= wochentage.length; i++){
	if (i%2 == 0){
		ausgabe(wochentage[i]);
	}
}
for(let tag of wochentage){
	ausgabe(tag);
}
