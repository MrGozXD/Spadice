<!-- le jeu -->
<?php
require_once('fonction.php');
$avatar=get($_GET['id'],"users","Avatar");
$Pseudo=get($_GET['id'],"users","Pseudo");
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title><?php echo $Pseudo?> VS IA</title>
  
 
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css'>
 
      <link rel="stylesheet" href="css/tictactoe.css">
      <link rel="icon" type="image/png" href="logo.png" />
      </head>
<body>
<a href="<?php echo('main.php?id='.$_GET['id'].'&ukey='.$_GET['ukey'].'')?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Quitter</a>  

 <div class="versus">
 <img src="<?php echo $avatar?>" width="100"> VS <img src="image/avatar_IA.png" width="100">
 </br>
 </div>

 
 
 
 
  <div id="main">
<div class="container-fluid">
<div class="row">
  <div class="col-xs-4 cell" id="c11">
  </div>
  <div class="col-xs-4 cell" id="c12">
  </div>
  <div class="col-xs-4 cell" id="c13">
  </div>
</div>
  <div class="row">
<div class="col-xs-4 cell" id="c21">
</div>
<div class="col-xs-4 cell" id="c22">
</div>
<div class="col-xs-4 cell" id="c23">
</div>
  </div>
  <div class="row">
<div class="col-xs-4 cell" id="c31">
</div>
<div class="col-xs-4 cell" id="c32">
</div>
<div class="col-xs-4 cell" id="c33">
</div>
  </div>
</div>
</div>
 
<div id="dialog-confirm" title="Tic Tac Toe | JavaScript">
  <p>Choose X or O</p>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://code.jquery.com/ui/1.11.4/jquery-ui.js'></script>
 
    <script src="fonctiontictactoe.js"></script>
 
</body>
</html>
