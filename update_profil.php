<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php require('header.php') ?>

<div class="container">
	<div class="row">
	<div class="col-6">
		<form method="post" action="" enctype="multipart/form-data" >
		   <div class="form-group">
		    <label for="exampleInputPassword1">Prenom</label>
		    <input type="text" class="form-control" id="exampleInputPassword1">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nom</label>
		    <input type="text" class="form-control" id="exampleInputPassword1">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Choisir une photo de profil</label><br>
		    <input type="file" name="avatar" >
		  </div>
		  <button type="submit" class="btn btn-primary" name="majPP">Mettre à jour</button>
		</form>
		<?php if(isset($msg)){ echo $msg; } ?>
	</div>

</div>
</div>

<?php 
$dbb= new PDO('mysql:host=localhost; dbname=projet', 'root', '');

if(isset($_POST['majPP'])){
	if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])){
		$tailleMax= 2097152;
		$extensionValide= array('jpg', 'png', 'gif', 'jpeg');
		if($_FILES['avatar']['size']<=$tailleMax){
			$extensionUpload= strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
			if(in_array($extensionUpload, $extensionValide)){
				$chemin="membres/profil/".$_SESSION['id'].".".$extensionUpload;
				$resultat=move_uploaded_file($_FILES['avatar']['tmp_name'] , $chemin);
				if($resultat){
					$updateAvatar= $dbb->prepare('UPDATE membre SET avatar= :avatar WHERE idUser= :id');
					$updateAvatar->execute(array(
						'avatar'=> $_SESSION['id'].".".$extensionUpload,
						'id' => $_SESSION['id']
					));
					header('location: profil.php');
				}
				else { $msg = "Erreur pendant l'importation de votre fichier"; }
			}else { $msg = "Votre photo doit etre en format jpg, gif, png ou jpeg"; }
		}
		else {$msg = "Votre photo de profil ne doit pas dépasser 2Mo"; }

	}
}


?>

</body>
</html>