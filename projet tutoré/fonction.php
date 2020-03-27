<?php 

//fonction d'affichage d'erreur et de redirection
	function errorManager($message, $url = NULL)
	{
		//Affiche le message passé en paramètre
		echo $message;  
		
		//Si l'url n'est pas renseigné, on arrête tout
		if ($url == NULL) die();	
		
		//Sinon, redirection vers l'url rensigné
		else header("Location: $url"); 
		exit();
	}

//fonction permettant de crypté des les mots de passes
	function crypte($password)
	{	
		$crypass=crypt($password,"jhF5Ujh52F69F420Xfcfpasw4ouhplqzfu5615");
		return $crypass;
	}

//fonction de connexion à la base de données MySQL

	function dbConnect()
	{
		//Renseignement des informations de connexion
		$host_name = "localhost";
		$database = "projetut";
		$user_name = "Admin";
		$password = "MotDePasse";
		
		try
		{
			$db = new PDO('mysql:host='.$host_name.';dbname='.$database, $user_name, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $db;
		}
		
		catch(PDOException $e)
		{
			//appel de la fonction "errorManager" si erreur
			echo errorManager($e->getMessage()); 
			die();
		}
	}	
	
//Fonction créeant un nouvel utilisateur
	function dbNewUser($db, $Pseudo, $Password, $ukey)
	{
		
		$query = $db->prepare("INSERT INTO users (Pseudo, Password, ukey) VALUES (:Pseudo, :Password, :ukey)");
		//valeurs extraites de la requête pour éviter les injection SQL
		$query->bindValue(':Pseudo', $Pseudo);
		$query->bindValue(':Password', $Password);
		$query->bindValue(':ukey', $ukey);
		$query->execute();
	}
	
	
//Fonction qui permet de récupérer une données de la bdd souhaité:
	function get($id,$bdd,$choix)
	{
		//Se connecte à la bdd
		$db=dbConnect();
		//Séléctionne la table correspondant à l'id du joueur
		$req=$db->query('SELECT * FROM '.$bdd.' WHERE Id="'.$id.'"');
		$donnees=$req->fetch();

		//Renvoie la valeur demandé
		$var=$donnees[$choix];
		return $var;			
	}



//Fonction de generation d'une clé
	function generateKey($length = 32)
	{
		//Liste des caractères possibles pour la clé
	    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$Key = '';
		
		//Selection aléatoire de "$length" éléments parmis la liste "$char"
		for ($i = 0; $i < $length; $i++)
			$Key .= $char[random_int(0, 61)]; 
		return $Key;
	}
	
//Fonction permettant l'ajout d'un nouvel utilisateur dans la base de données	
	function Inscription($Pseudo, $Password, $ukey=NULL)
	{
		
		//Se connecte à la base de données
		$db=dbConnect();
		
		//Compte le nombre de Pseudo identique à celui que l'utiliseurs vient de rentrer
		$req=$db->query('SELECT COUNT(*) AS Nb FROM `users` WHERE Pseudo="'.$Pseudo.'"');
		$donnees=$req->fetch();
		
		//Si le Pseudo est déjà utiliser, préviens l'utilisateurs et lui en demande un nouveaux
		if ($donnees['Nb']!=0)
		{
			errorManager('Ce pseudo est déja utlisé, essaye en un autre ! </br> <a href="index.php">Retour</a>');
		}
		//Sinon, inscrit l'utilisateurs et le rentre dans la base de données
		else
		{	
			if ($ukey==NULL)
			{ 	
				//génération d'une clé aléatoire afin d'éviter les connexions frauduleuses
				$ukey=generateKey();
			}
			$Pass=crypte($Password);
			dbNewUser($db, $Pseudo, $Pass, $ukey);
			echo 'Vous êtes maitenant inscris :) </br> <a href="index.php">Retour à la page de connexion</a>';
		}
	}

//Fonction permettant à un utilisateur de se connecter
	function Connexion($Pseudo, $Password)
	{
		//Se connecte à la base de données
		$db=dbConnect();
		
		//Vérification de l'existance du Pseudo
		$req=$db->query('SELECT COUNT(*) AS Nb FROM `users` WHERE Pseudo="'.$Pseudo.'"');
		$donnees=$req->fetch();
			
		//Si le Pseudo n'existe pas, on affiche un message d'erreur
		if ($donnees['Nb']==0)
		{
			errorManager('Ce pseudo n\'existe pas </br> <a href="index.php">Retour</a>');
		}
		
		//Vérification du mot de passe
		$req=$db->query('SELECT * FROM `users` WHERE Pseudo="'.$Pseudo.'"');
		$donnees=$req->fetch();
		$Pass=crypte($Password);
		//Si le mot de passe est incorrect, affiche un message d'erreur
		if ($donnees['Password']!=$Pass)
		{
			errorManager('Mot de passe incorrect </br> <a href="index.php">Retour</a>');
		}
		
		//Sinon, envoie l'utilisateurs vers une nouvelle page en passant la clé et l'id par url
		else
		{
			$ukey=$donnees['ukey'];
			header('Location: main.php?id='.$donnees['id'].'&ukey='.$ukey.'');
		}
		
	}

//Fonction de vérification d'authentification
	function Verif($id,$ukey)
	{
		//Si la valeur de la clé est nul, envoie un message d'erreur
		if($ukey==NULL)
		{
			errorManager('non','erreur.php');
		}
		
		//Récupère la clé correspondant a l'id de l'utilisateurs
		$ukey2=get($id,"users","ukey");
		
		//Si la valeur de la clé ne correspond pas à celle contenue dans la bdd, envoie un message d'erreur
		if($ukey2!=$ukey)
		{
			errorManager('non','erreur.php');
		}
	}



//Fonction permettant de changer le mdp d'un utilisateur
function ChgmtMdp($id,$Password,$NewPassword,$NewPassword2)
{
	$db=dbConnect();
	$req=$db->query('SELECT * FROM `users` WHERE id="'.$id.'"');
	$donnees=$req->fetch();
	$ukey=$donnees['ukey'];

	$Password=crypte($Password); 
	$NewPassword=crypte($NewPassword); 
	$NewPassword2=crypte($NewPassword2); 
	


	if($donnees["Password"]==$Password)
	{
		if ($NewPassword!=$NewPassword2)
		{
			errorManager('Mdp pas pareil ! </br> <a href=compte.php?Pseudo='.$Pseudo.'&ukey='.$ukey.'>Retour</a>');
			
		}

		else 
		{
			$query = $db->prepare('UPDATE users SET Password = ? WHERE id= ?');
			$query->bindValue(1, $NewPassword);
			$query->bindValue(2, $id);
			$query->execute();
			header('Location: compte.php?id='.$id.'&ukey='.$ukey.'');
		}
	}
	else
	{
		errorManager('Mdp incorrect ! </br> <a href=compte.php?Pseudo='.$Pseudo.'&ukey='.$ukey.'>Retour</a>');
	}

}

//Fonction permettant le changement d'avatar
function ChgmtAvatar($id,$Choix)
{
	$db=dbConnect();
	$req=$db->query('SELECT * FROM `users` WHERE id="'.$id.'"');
	$donnees=$req->fetch();
	$ukey=get($id,"users","ukey");

	$avatar=("image/avatar/avatar".$Choix.".png");
	
	$query = $db->prepare('UPDATE users SET Avatar = ? WHERE id= ?');
	$query->bindValue(1, $avatar);
	$query->bindValue(2, $id);
	$query->execute();
	header('Location: compte.php?id='.$id.'&ukey='.$ukey.'');

}


//------------------------------------------------------ Fonction TicTacToe ------------------------------------------------------------
	
	
//Fonction permettant de récupérer le pseudo des joueurs en fonction de l'id de la partie
	function getPseudos($idgame,$id)
	{
		//Récupère la partie correspondant à l'id demandé
		$db=dbConnect();
		$req=$db->query('SELECT * FROM `tictactoe` WHERE id ='.$idgame.'');
		$donnees=$req->fetch();
		
		//Récupère l'id des Joueurs
		$idj1=$donnees['PseudoJ1'];
		$idj2=$donnees['PseudoJ2'];
		
		//Récupère les pseudos des deux joueurs
		$req=$db->query('SELECT * FROM `users` WHERE id ='.$idj1.'');
		$donnees=$req->fetch();
		$J1=$donnees['Pseudo'];
		
		$req=$db->query('SELECT * FROM `users` WHERE id ='.$idj2.'');
		$donnees=$req->fetch();
		$J2=$donnees['Pseudo'];
		
		
		//Si le joueur est J1
		if ($id==$idj1)
		{
			$Pseudos=array
			(
			'J1'=>$J1,
			'J2'=>$J2,
			'PseudoJoueur'=>$J1,
			'PseudoAdv'=>$J2
			);
			return $Pseudos;
		}
		
		//Sinon (Il est donc J2)
		else
		{
			$Pseudos=array
			(
			'J1'=>$J1,
			'J2'=>$J2,
			'PseudoJoueur'=>$J2,
			'PseudoAdv'=>$J1
			);
			return $Pseudos;	
		}
	}
		

//Fonction créant une nouvelle partie de tictactoe
	function dbNewTictactoeGame($db, $PseudoJ1, $PseudoJ2=NULL)
	{
		$query = $db->prepare("INSERT INTO tictactoe (PseudoJ1, PseudoJ2) VALUES (:PseudoJ1, :PseudoJ2)");
		//Si J2 est est nul alors J1 joue contre l'ordinateur, on renseigne donc J2 comme étant l'IA
		if ($PseudoJ2==NULL) $PseudoJ2="IA";
		$query->bindValue(':PseudoJ1', $PseudoJ1);
		$query->bindValue(':PseudoJ2', $PseudoJ2);
		$query->execute();
	}
	
//Fonction de vérification de joueurs en attente
		function matchMaking($idj)
		{
			$db=dbConnect();
			//Regarde si une salle est en attente d'un 2eme joueur (Etat=1)
			$req1=$db->query('SELECT COUNT(*) AS Nb FROM `tictactoe` WHERE etat=1');
			$donnees1=$req1->fetch();
			//Si personne n'est en attente d'un autre joueur
			if ($donnees1['Nb']==0)
			{
				//Créée une nouvele salle avec Pour joueur 1 le joueur actuel et passe l'état de la game à 1 (Etat=1 -> en attente)
				dbNewTictactoeGame($db, $idj);
				$req3=$db->query('SELECT MAX(id) FROM tictactoe WHERE etat=0');
				$donnees3=$req3->fetch();
				$id=$donnees3['MAX(id)'];
				$db->query('UPDATE `tictactoe` SET `etat`=1 WHERE id='.$id.'');
			}	
			//Sinon (Un joueur est en attente d'un autre joueur)
			else 
			{
				//Rejoint la salle de l'autre joueurs avec pour Joueur 2 le joueur actuel et passe l'état de la game à 2 (Etat=2 -> en jeu)
				$req2=$db->query('SELECT MAX(id) FROM tictactoe WHERE etat=1');
				$donnees2=$req2->fetch();
				$id=$donnees2['MAX(id)'];
				//Vérification pour ne pas jouer contre soit même
				$req4=$db->query('SELECT * FROM tictactoe WHERE id='.$id.'');
				$donnees4=$req4->fetch();
				if($donnees4['PseudoJ1']==$idj)
				{
					$db->query('DELETE FROM `tictactoe` WHERE id='.$id.'');
					errorManager('','erreur.php');
				}
				
				$db->query('UPDATE `tictactoe` SET `PseudoJ2`='.$idj.' WHERE id='.$id.'');
				$db->query('UPDATE `tictactoe` SET `etat`=2 WHERE id='.$id.'');	
			}
			return $id;
		}

//Function permettant l'arrêt d'une recherche au bon d'un temps donné
	function stop_MatchMaking($time,$id)
	{
		$test=0;
		do
		{
			$etat=get($id,"tictactoe","etat");
			$test=$test+1;
			if ($test==$time)
			{
				echo ("Personne ne vient jouer.....<br>");
				echo ('<a href='.$_SERVER['HTTP_REFERER'].'>retour</a>');
				$db=dbConnect();
				$db->query('DELETE FROM tictactoe WHERE id='.$id.'');
				die();
			}
			sleep(1);
		}while ($etat==1);
	}
?>	
	
	
	

