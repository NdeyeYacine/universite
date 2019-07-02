var boursier = document.getElementById("inlineRadio1");
var non_boursier = document.getElementById("inlineRadio2");
var type = document.getElementById("typebourse");
var loger = document.getElementById("customControlInline");
var chambre = document.getElementById("numchamb");
var batiment = document.getElementById("numbat");
var adresse = document.getElementById("adr");

adresse.style.display = "none";
type.style.display = "block";
chambre.style.display = "none";
batiment.style.display = "none";
loger.style.display = "none";

boursier.onchange = function(){
    adresse.style.display = "none";
    type.style.display = "block";
    chambre.style.display = "none";
    batiment.style.display = "none";
    loger.style.display = "none";
}
non_boursier.onchange = function(){
    adresse.style.display= "block";
    type.style.display = "none";
    chambre.style.display = "none";
    batiment.style.display = "none";
    loger.style.display = "none";
}
loger.onchange = function(){
    chambre.style.display = "block";
    batiment.style.display = "block";
    adresse.style.display = "none";
    type.style.display = "none";
}