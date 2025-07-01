
let currentDate = new Date();
let datePart = currentDate.getDate();
if(datePart < 10){
    datePart = "0" + datePart;
}
// Hinweis: Hierbei handelt es sich um eine Zahl von 0 bis 11!
let monthPart = currentDate.getMonth() + 1;
if(monthPart < 10){
    monthPart = "0" + monthPart;
}
let yearPart = currentDate.getFullYear();

document.write(datePart + "." + monthPart + "." + yearPart);
