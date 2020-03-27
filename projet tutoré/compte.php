<!doctype html>
<!-- Inclusion des fonctions Javascript -->
<script type="text/javascript" src="fonction.js"></script>
<?php 
//Inclusion des fonctions php
require_once('fonction.php');
$Avatar=get($_GET['id'],"users","Avatar");
$Pseudo=get($_GET['id'],"users","Pseudo");
//Verif($_GET['Pseudo'],$_GET['ukey']);
?>
<img src="<?php echo $Avatar?>">
</br>
<a href="<?php echo ('main.php?id='.$_GET['id'].'&ukey='.$_GET['ukey'].''); ?>">Retour</a>
<br>
<?php echo('Salut '.$Pseudo.' !');?>
</br>
<button onCLick="Afficher_div(this, 'ChgmtMdp');" class="btn btn-primary btn-lg active" role="button"  aria-pressed="true">Changer le mot de passe</button>
</br>


<!-----------------  Changement de mot de passe  -------------------->
<div id="ChgmtMdp" style="display:none;">	
	<form action="traitement.php?x=nvxmdp&id=<?php echo$_GET['id']?>" method="post">
		<div> 
		
			<!-- Mot de passe actuel -->
			<input type="password" class="form-control" name="MotDePasse" placeholder="Mot de passe actuel" required>
			</br>
			
			<!-- Nouveaux mdp -->
			<input type="password" class="form-control" name="NvxMotDePasse" placeholder="Nouveaux mot de passe" required>
			</br>
			
			<!-- Confirmation mdp -->
			<input type="password" class="form-control" name="NvxMotDePasse2" placeholder="Confirmation mot de passe" required>
			</br>
		
			<!-- Ennvoie -->
			<button type="submit">Confirmer</button>

		
		</div>
	</form>
	<!-- Annulation -->
	<button onCLick="Cacher_div(this, 'ChgmtMdp');">Annuler</button>
</div>
<button onCLick="Afficher_div(this, 'ChgmtAvatar');" class="btn btn-primary btn-lg active" role="button"  aria-pressed="true">Changer l'avatar</button>
<!-----------------  Changement d'avatar  -------------------->
<div id="ChgmtAvatar" style="display:none;">	

<?php 
for ($i=1;$i<=40;$i++)
{
	echo('<a href="traitement.php?x=nvxavatar&id='.$_GET['id'].'&Choix='.$i.'"><img src="image/avatar/avatar'.$i.'.png"></a>');
}

?>

<button onCLick="Cacher_div(this, 'ChgmtAvatar');">Annuler</button>
<div>