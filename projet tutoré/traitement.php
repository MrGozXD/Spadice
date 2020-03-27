<?php
//Inclusion des fonctions php
require_once('fonction.php');

if ($_GET['x']=="connexion")
{
//Connexion au compte utilisateurs
Connexion($_POST['Pseudo'], $_POST['MotDePasse']); 
}

else if ($_GET['x']=="inscription")
{
    //Vérifie si les deux mdp rentré sont indentique
    if ($_POST['MotDePasse']!=$_POST['MotDePasse2'])
    {
        echo ('Le mot de passe doit être identique !</br>');
        echo ('<a href="index.php">Retour</a>');
        die();
    }

    //Inscription du compte utilisateurs
    Inscription($_POST['Pseudo'], $_POST['MotDePasse']);
}

else if ($_GET['x']=="nvxmdp")
{
    //Changement du mdp
    ChgmtMdp($_GET['id'], $_POST['MotDePasse'], $_POST['NvxMotDePasse'], $_POST['NvxMotDePasse2']);
}

else if ($_GET['x']=="nvxavatar")
{
    //Changement de l'avatar
    ChgmtAvatar($_GET['id'],$_GET['Choix']);
}
?>