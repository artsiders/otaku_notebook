/*var btn = document.querySelector("#btn");
var inputNombre = document.querySelector("#input_nombre");
var resultat = document.querySelector("#resultat");

// on ajoute un gestinnaire d'evenement au bouton
btn.addEventListener("click", paire); 

function paire(){

	if(inputNombre.value%2 == 0){
		resultat.value = "le nombre est paire";
	}
	else{
		resultat.value = "le nombre est impaire";
	}
}

var a = 14;
var b = 12;
[a,b] = [b,a];
console.log(`a = ${a} et b = ${b}`);*/

// ____________________________________________________________________________________

var prixProduit = document.querySelector("#prix_produit");
var nombreProduit = document.querySelector("#nombre_produit");
var tva = document.querySelector("#tva");
var resultatFacturation = document.querySelector("#resultat_facturation");

var btnFacturation = document.querySelector("#btn_facturation");

btnFacturation.addEventListener("click", facturation);

function facturation(){

	if(isNaN(parseFloat(prixProduit.value))){
		prixProduit.style.borderBottom = "3px solid #ff000057";
		prixProduit.style.color = "#d03333";
		resultatFacturation.value = "le prix n'est pas valide";
		resultatFacturation.style.color = "#ff000057";
		resultatFacturation.style.borderBottom = "3px solid #ff000057";
	}
	if(isNaN(parseFloat(prixProduit.value)) == false){
		prixProduit.style.borderBottom = "3px solid #00ff0065";
		prixProduit.style.color = "#51a951";
	}
	if(isNaN(parseFloat(nombreProduit.value))){
		nombreProduit.style.borderBottom = "3px solid #ff000057";
		nombreProduit.style.color = "#d03333";
		resultatFacturation.value = "le nombre de produit n'est pas valide";
		resultatFacturation.style.color = "#ff000057";
		resultatFacturation.style.borderBottom = "3px solid #ff000057";
	}
	if(isNaN(parseFloat(nombreProduit.value)) == false){
		nombreProduit.style.borderBottom = "3px solid #00ff0065";
		nombreProduit.style.color = "#51a951";
	}
	if(isNaN(parseFloat(tva.value))){
		tva.style.borderBottom = "3px solid #ff000057";
		tva.style.color = "#d03333";
		resultatFacturation.value = "la taxe n'est pas valide";
		resultatFacturation.style.color = "#ff000057";
		resultatFacturation.style.borderBottom = "3px solid #ff000057";
	}
	if(parseFloat(tva.value) > 100){
		tva.style.borderBottom = "3px solid #ff000057";
		tva.style.color = "#d03333";
		resultatFacturation.value = "la taxe ne peut pas être supperieur a 100%";
		resultatFacturation.style.color = "#ff000057";
		resultatFacturation.style.borderBottom = "3px solid #ff000057";
	}
	if(isNaN(parseFloat(tva.value)) == false){
		tva.style.borderBottom = "3px solid #00ff0065";
		tva.style.color = "#51a951";
	}
	if(!isNaN(parseFloat(prixProduit.value)) && !isNaN(parseFloat(nombreProduit.value)) && !isNaN(parseFloat(tva.value))){
		var totalProduit = parseFloat(prixProduit.value) * parseFloat(nombreProduit.value);
		var taxe = totalProduit * tva.value / 100;
		var resultat = totalProduit + taxe;
		resultatFacturation.value = `${resultat} FCFA`;
		resultatFacturation.style.borderBottom = "3px solid #00ff0065";
		resultatFacturation.style.color = "#51a951";
	}

}



