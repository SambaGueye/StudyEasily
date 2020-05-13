<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">EasyStudies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class='nav-link' href="LandingPage.php?id=<?php echo $_SESSION['id'] ?>">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="edtPlanning.php">EDT-Planning</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Notes-Resultats</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Quiz-Révisions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="profil.php">Profils</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="aPropos.php">A propos de nous</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="deconnexion.php">Deconnexion</a>
      </li>
    </ul>
  </div>
</nav>

<style type="text/css">
  
</style>


	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
