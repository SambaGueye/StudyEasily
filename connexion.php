<?php  require("header.php");

session_start();
$dbb= new PDO('mysql:host=localhost; dbname=projet', 'root', ''); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<div class="container">
	<div class="row">
		<form method="post" id="formulaire">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
		  </div>
		  <button type="submit" class="btn btn-primary" name="submit">Connecter</button>
		</form>
	</div>
</div>

<p> <?php if(isset($erreur)){ echo $erreur;} ?></p>


<?php 

if(isset($_POST['submit'])){
	$mail=$_POST['mail'];
	$password=$_POST['password'];

	if(!empty($mail) and !empty($password)){
		$sql=$dbb->prepare("SELECT * from membre where email=? and password=? ");
		$sql->execute(array($mail,$password));
		$user=$sql->rowCount();

		if($user==1){
			$userinfo=$sql->fetch();
			$_SESSION['id']=$userinfo['idUser'];
			$_SESSION['prenom']=$userinfo['prenom'];
			$_SESSION['nom']=$userinfo['nom'];
			$_SESSION['mail']=$userinfo['email'];
			
			header("location: LandingPage.php?id=".$_SESSION['id']);
		}
		else echo"Ce compte néxiste pas";
	}
	else{
		echo"Veuillez remplir tous le champs";
	}
}


?>




</body>
</html>