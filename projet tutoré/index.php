<!doctype html>
<!-- Inclusion des fonctions Javascript -->
<script type="text/javascript" src="fonction.js"></script>
<?php 
//Inclusion des fonctions php
require_once('fonction.php');
?>
<html lang="fr">
    <head>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!-- Police -->
		<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">

		<!-- Renseignement du fichier css pour le style de la page -->
		<link rel="stylesheet" href="css/projetut.css">
		
		<!-- Titre de la page -->
        <title>Spadice</title>

		<link rel="icon" type="image/png" href="logo.png" />
    </head>
	
    <body>
	
		<div class="title" id="menu" >Spadice</br>
			<button onClick="Afficher_div(this, 'Connexion');Cacher_div(this, 'menu');" class="btn btn-primary btn-lg active" role="button"  aria-pressed="true">Connexion</button>
			<button onClick="Afficher_div(this, 'Inscription');Cacher_div(this, 'menu');"class="btn btn-primary btn-lg active" role="button"  aria-pressed="true">Inscription</button>
		</div>


		
		<!------------------------------------------------Connexion----------------------------------------------------->
		
		<div id="Connexion" style="display:none;">
			<!-- Création du titre -->
			<div class="title">Connexion</div>
			
			<!-- Formulaire -->		
			<div class="mx-auto" style="max-width:400px">
				<form action="traitement.php?x=connexion" method="post">
				
					<div class="form-group"> 
					
						<!-- Pseudo -->
						<input type="text" class="form-control" name="Pseudo" placeholder="Pseudo" required>
						</br>
						
						<!-- MotDePasse -->
						<input type="password" class="form-control" name="MotDePasse" placeholder="Mot de passe" required>
						</br>
					
						<!-- Bouton -->
						<button type="submit" class="btn btn-primary btn-block">Connexion</button>
						</br>
						
						<a href="index.php">Retour</a>
					</div>
				</form>
			</div>
		</div>
		
		
		<!------------------------------------------------Inscription----------------------------------------------------->
		
		<div id="Inscription" style="display:none;">
		
			<!-- Création du titre -->
			<div class="title">Inscription</div>
			
			<!-- Formulaire -->
			<div class="mx-auto" style="max-width:400px">
				<form action="traitement.php?x=inscription" method="post">
					
					<div class="form-group"> 
						
						<!-- Pseudo -->
						<input type="text" class="form-control" name="Pseudo" placeholder="Pseudo" required>
						</br>
						
						<!-- MotDePasse -->
						<input type="password" class="form-control" name="MotDePasse" placeholder="Mot de passe" required>
						</br>
						
						<input type="password" class="form-control" name="MotDePasse2" placeholder="Confirmer le mot de passe" required>
						</br>
						
						<!-- Bouton -->
						<button type="submit" class="btn btn-primary btn-block">C'est parti !</button>
						</br>
						
						<a href="index.php">Retour</a>
					</div>	
				</form>
			</div>
		</div>
    </body>
</html>
