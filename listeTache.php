<?php 
session_start();

$idd=$_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/styleListeTache.css">
</head>
<body>

	<?php require("header.php"); ?>
	<br>
	<div class='container'>
		<div class='row' >

<?php
	
	$dbb= new PDO('mysql:host=localhost; dbname=projet', 'root', ''); 
	if(isset($_GET['del_task'])){
		$id = $_GET['del_task'];
		$sql=$dbb->query("DELETE from tache where id=$id");
		header('location: listeTache.php');
	}


	$sql=$dbb->query("SELECT * FROM tache where idUser=$idd");

	while($donnees=$sql->fetch()){ ?>
		<div class='col-4'>
				<div class='card' style='width: 18rem;'>
				  <div class='card-body' style="border-bottom: 2px solid black; ">
				    <h4 class='card-title'><?php echo $donnees['nomT']?></h4>
				   	<h6 class='card-subtitle mb-2 text-muted' >Card subtitle</h6>
				    <p class='card-text'><?php echo $donnees['descriptionT'] ?></p>
				    <a href='#' class='card-link' id='boutt'>Evaluer</a>
				    <a href='listeTache.php?del_task=<?php echo $donnees['id'] ?>' class='card-link' id='boutt'>Supprimer</a>
				  </div>
				</div><br>
			</div>	
<?php } ?>
	</div>
</div><br>
</body>
</html>