<!doctype html>
<!-- Inclusion des fonctions Javascript -->
<script type="text/javascript" src="fonction.js"></script>
<?php 
//Inclusion des fonctions php
require_once('fonction.php');
$Pseudo=get($_GET['id'],"users","Pseudo");
//Verifie l'authenticité de la connexion 
Verif($_GET['id'],$_GET['ukey']);
?>
<html lang="fr">
    <head>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!-- Police -->
		<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet">


		<!-- Renseignement du fichier css pour le style de la page -->
		<link href="css/projetut.css" rel="stylesheet">
		
		<!-- Titre de la page -->
        <title><?php echo $Pseudo?></title>
		<link rel="icon" type="image/png" href="logo.png" />
    </head>
	
    <body>
	
		<div id="deco">
			<a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Déconnexion</a>
		</div>
		<div id="compte">
			<a href="<?php echo ('compte.php?id='.$_GET['id'].'&ukey='.$_GET['ukey'].''); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Compte</a>
		</div>
		<!-- Création du titre -->
		<div class="title" id="menu" >Bienvenue <?php echo $Pseudo ?> !
			<br>
			<a href="<?php echo ('tictactoesolo.php?id='.$_GET['id'].'&ukey='.$_GET['ukey'].''); ?>" class="btn btn-danger btn-lg active" role="button"  aria-pressed="true">SOLO</a>
			<a href="<?php echo ('tictactoemulti.php?id='.$_GET['id'].'&ukey='.$_GET['ukey'].''); ?>" onClick="Afficher_div(this, 'attente');Cacher_div(this, 'menu');Cacher_div(this, 'deco');Cacher_div(this, 'compte')"; class="btn btn-success btn-lg active" role="button"  aria-pressed="true">MULTI</a>
			</br>
		</div>
		

		
		<div class="title" id="attente" style="display:none;">
			En attente de joueurs...</br>
			<img src="image/loading.gif">
		</div>

    </body>
</html>





