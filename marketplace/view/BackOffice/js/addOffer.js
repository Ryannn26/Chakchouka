
// Correction partie 3 etude de cas Partie JS

document.addEventListener("DOMContentLoaded", function(){

var titleElement= document.getElementById("title");

titleElement.addEventListener("keyup", function(){
    var titleerrorElement= document.getElementById("title_error");
    var titleErrorValue=titleElement.value;
    if(titleErrorValue.length < 3) {
        titleerrorElement.innerHTML = "Le titre doit contenir au moins 3 caractères";
        titleerrorElement.style.color = "red";
    }
    else {
        titleerrorElement.innerHTML = "Correct";
        titleerrorElement.style.color = "green";
    }
})


})