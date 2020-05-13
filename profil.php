<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<?php require("header.php")  ?>
	<?php 
		$idd= $_SESSION['id'];
		$dbb= new PDO('mysql:host=localhost; dbname=projet', 'root', ''); 
		$image=$dbb->query("SELECT avatar from membre where idUser=$idd");
		$donnees=$image->fetch();
	 ?>

	<div class="container">
			<div class="jumbotron jumbotron-fluid">
			  <div class="row">
			  	<div class="col-sm" style="border-right: 2px solid red;">
			  		<h3  style="text-align: center;">Profil:</h3>
			  		<div style="padding-left: 50px">
			  			<?php if(!empty($donnees['avatar'])) { ?>
			  			<img src="membres/profil/<?php echo $donnees['avatar'] ?>" width="150" style="border-radius: 50px"> <?php } ?><br><br>
			  			<p>Prénom: <?php echo "  ".$_SESSION['prenom']?> </p>
			  			<p>Nom: <?php echo "  ".$_SESSION['nom']?></p>
			  			<p>Adresse mail:  <?php echo "  ".$_SESSION['mail']; ?> </p>
			  			<p>Contact: ............</p>
			  			<a class="btn btn-primary" href="update_profil.php" >Mettre à jour</a>
			  		</div>
			  	</div>
			  	<div class="col-sm">
			  		<h3 style="text-align: center;">Du texte:</h3>
			  	</div>
			  </div>
			</div>
	</div>


</body>
</html>