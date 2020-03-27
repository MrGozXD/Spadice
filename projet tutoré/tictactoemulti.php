<!-- Inclusion des fonctions javascript -->
<script type="text/javascript" src="fonction.js"></script>
<link href="css/projetut.css" rel="stylesheet">

<?php
//Inclusion des fonctions php
require_once('fonction.php');
//Cherche un deuxième joueurs
$idgame=matchMaking($_GET['id']);
//Si aucun joueur n'est trouver dans le temps donner, annule la recherche et supprime la partie en cours
stop_MatchMaking(10,$idgame);


//Renseigne les Pseudos de chaque joueurs dans un tableau (Afin de les réutiliser plus facilement après)
$Pseudos=getPseudos($idgame,$_GET['id']);

$idj1=get($idgame,"tictactoe","PseudoJ1");
$idj2=get($idgame,"tictactoe","PseudoJ2");

$AvatarJ1=get($idj1,"users","Avatar");
$AvatarJ2=get($idj2,"users","Avatar");

echo ("".$Pseudos['PseudoAdv']." à rejoint la partie !</br>");
echo ("J1:".$Pseudos['J1']." </br> J2:".$Pseudos['J2']."<br>");

?>
<a href="<?php echo ('main.php?id='.$_GET['id'].'&ukey='.$_GET['ukey'].''); ?>">Retour</a>
<div class="title">
<img src="<?php echo $AvatarJ1?>" title="<?php echo $Pseudos['J1']?>">
VS
<img src="<?php echo $AvatarJ2?>" title="<?php echo $Pseudos['J2']?>">
</div>
<head>
    <title><?php echo (''.$Pseudos['PseudoJoueur'].' VS '.$Pseudos['PseudoAdv'].'');?></title>
    <link rel="icon" type="image/png" href="logo.png" />
</head>