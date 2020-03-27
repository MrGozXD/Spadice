//Fonction permettant d'afficher la div passée en paramètre
function Afficher_div(bouton, id)
{
		var div = document.getElementById(id);
		div.style.display="block";
}

//Fonction permettant de cacher la div passée en paramètre
function Cacher_div(bouton, id)
{
	var div = document.getElementById(id);
	div.style.display="none";
}

