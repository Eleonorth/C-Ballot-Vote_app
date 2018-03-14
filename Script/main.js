// Fonction qui vérifie les champs de connexion et bloque l'envoi si tous n'est pas remplie
function connectInput() {
	
	// Je récupère les input dans un tableau
	var tab = [
				document.getElementById('email-connect'),
				document.getElementById('mdp-connect')
				];

	// Je regarde si les valeurs dans les input sont correct
	for (var i = 0; i < tab.length; i++) {
		if (tab[i].value === '') {
		
			tab[i].className = 	'form-control is-invalid';
		
		} else if (tab[i].value != '') {
		
			tab[i].className = 	'form-control is-valid';	
		}
	}
}


// Fonction qui vérifie les champs d'inscription et bloque l'envoi si tous n'est pas remplie
function registerInput() {

	// Je récupère les input dans un tableau
	var tab = [
				document.getElementById('lastname'),
				document.getElementById('firstname'),
				document.getElementById('email'),
				];
	
	// Je regarde si les valeurs dans les input sont correct
	for (var i = 0; i < tab.length; i++) {
		
		if (tab[i].value === "") {
			
			tab[i].className = 	'form-control is-invalid';
			var button = document.getElementById("button-register").disabled = true;		
		
		} else if (tab[i].value != "") {
			
			tab[i].className = 	'form-control is-valid';
			button = document.getElementById("button-register").disabled = false;
		}

	}
}

// Fonction qui vérifie les mots de passes pour s'inscrire
function registerMdp() {
	
	// Je récupère les valeurs dans un tableau
	var tab = [
			document.getElementById('password'),
			document.getElementById('passwordconf')
			];

	// Je parcour le tableau et vérifie si tout à l'intérieur sont correct
	for (var i = 0; i < tab.length; i++) {

		if (tab[i].value === '' || tab[0].value != tab[1].value ) {
			
			tab[i].className = 	'form-control is-invalid';
			var button = document.getElementById("button-register").disabled = true;
		} else {
			
			tab[i].className = 	'form-control is-valid';
			button = document.getElementById("button-register").disabled = false;
		}		
	}
}






