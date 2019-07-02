<!doctype html>
<html lang="en">
  <head>
    <title>CheckStatut</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <div class="card text-center">
  <div class="card-header">

   <ul class="nav nav-tabs card-header-tabs">
   <li class="nav-item">
        <a class="nav-link" href="acceuil.php">acceuil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Ajouter</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="find.php">rechercher</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="findAll.php">recherchers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="checkStatut.php">checkStatut</a>
      </li>

    </ul>
    
  </div><br/>


    <form action="checkStatut.php" method="POST">
    <div class="form-row align-items-center">
        <div class="col-sm-3 my-1">
        <label class="sr-only" for="inlineFormInputName">Etudiant</label>
        <input type="text" name="etud" class="form-control" id="inlineFormInputName" placeholder="">
        </div>
        </div>
        <div class="col-auto my-1">
        <button type="submit" name="rech" class="btn btn-primary">rechercher</button>
        </div>
    </div>
    </form>

<?php
  require 'class/Autoloader.php';
  Autoloader::register();
  $etusev = new EtudiantService();

  echo"<table class='table table-striped'>";
  echo"<tbody>";
  echo "<tr>";
  echo"<td>Matricule</td>";
  echo"<td>Nom</td>";
  echo"<td>Prenom</td>";
  echo"<td>Email</td>";
  echo"<td>Telephone</td>";
  echo"<td>Date De Naissance</td>";
  echo"</tr>";
  foreach ($etusev->select('ETUDIANT') as $key => $us) {
    echo "<tr>";
    echo"<td>".$us['matricule']."</td>";
    echo"<td>".$us['nom']."</td>";
    echo"<td>".$us['prenom']."</td>";
    echo"<td>".$us['email']."</td>";
    echo"<td>".$us['tel']."</td>";
    echo"<td>".$us['date_de_naissance']."</td>";
    echo"</tr>";
    
  }

  if(isset($_POST['rech'])){
    foreach ($etusev->checkStatut('BOURSIER',$_POST['etud']) as $key => $use) {
      if($use["matricule"]==$_POST['etud']){
        echo"<h2> C'est un boursier</h2>";
      }
    }
    foreach ($etusev->checkStatut('NON_BOURSIER',$_POST['etud']) as $key => $use) {
      if($use["matricule"]==$_POST['etud']){
        echo"<h2> C'est un non_boursier</h2>";
      }
    }
    foreach ($etusev->checkStatut('LOGER',$_POST['etud']) as $key => $use) {
      if($use["matricule"]==$_POST['etud']){
        echo"<h2> C'est un loger</h2>";
      }
    }
  }

?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <!-- Footer -->

<footer class="page-footer font-small unique-color-dark pt-4">

<!-- Footer Elements -->
<div class="container">

  <!-- Call to action -->
  <ul class="list-unstyled list-inline text-center py-2">
    <li class="list-inline-item">
      <h5 class="mb-1">CODING FOR BETTER LIFE</h5>
    </li>
  </ul>
  <!-- Call to action -->

</div>
<!-- Footer Elements -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2019 Copyright:
  <a href="https://mdbootstrap.com/education/bootstrap/"> SONATELACADEMY.com</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
  </body>
</html>


