<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
</head>
<body>

<?php require("header.php") ?>

<div class="container">
	<div class="row">
		<form method="post" id="formulaire">
			<div class="form-group">
		    <label for="exampleInputPassword1">Prenom</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" name="prenom">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nom</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" name="nom">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
		  </div>
		  <button type="submit" class="btn btn-primary" name="inscrire">S'inscrire</button>
		</form>
	</div>
</div>

<?php  

$dbb= new PDO('mysql:host=localhost; dbname=projet', 'root', ''); 

if(isset($_POST['inscrire'])){
	$prenom=$_POST['prenom'];
	$nom=$_POST['nom'];
	$mail=$_POST['mail'];
	$password=$_POST['password'];

	$sql=$dbb->prepare("INSERT INTO membre (prenom,nom,email,password) VALUES (?,?,?,?)");
	$sql->execute(array($prenom,$nom,$mail,$password));
	var_dump($sql);
	echo "Inscription effectué";
	header('location: connexion.php');
}


?>


</body>
</html>