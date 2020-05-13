<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/edtStyle.css">
</head>
<body>
	<?php require("header.php") ?>
	<?php
	$dbb= new PDO('mysql:host=localhost; dbname=projet', 'root', ''); 

	if(isset($_POST['sub'])){
		$nomT=$_POST['nomT'];
		$descT=$_POST['descT'];
		if(!empty($nomT) && !empty($descT)){
			$sql=$dbb->prepare("INSERT into tache (nomT,descriptionT,idUser) values (?,?,?)");
			$sql->execute(array($nomT,$descT,$_SESSION['id']));
			$succes= "Tache ajoutée avec succès";
		}
		else {
			$error= "Veuillez remplir tous les champs";
		}
	}
	
?>
	<div>
		<div class="container">
		  <div class="row">
		    <div class="col-sm">
		      ICI c'est pour le planning
				<embed src="edt.pdf" style="width: 500px; height: 500px;"></embed>
		    </div>
		    
		    <div class="col-sm">
		      <h3>Planning - Ajouter des taches à faire</h3>
				<a href="listeTache.php" class="btn btn-secondary">Liste des taches</a><br><br>
					<form method="post">
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Nom tache</label>
					    <input type="text" class="form-control" name="nomT" >
					  </div>
					  
					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Description</label>
					    <textarea class="form-control" name="descT" rows="3"></textarea>
					  </div>
					   <button type="submit" class="btn btn-primary" name="sub">Ajouter</button>
					</form><br>
					<?php  if(isset($succes)) { ?>
						<div class="alert alert-success" role="alert">
						  <?php echo $succes; ?>
						</div>
					<?php } ?>
					<?php  if(isset($error)) { ?>
						<div class="alert alert-danger" role="alert">
						  <?php echo $error; ?>
						</div>
					<?php } ?>
		    </div>
		  </div>
		</div>
	</div>

	



</body>
</html>