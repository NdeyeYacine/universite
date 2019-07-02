<!doctype html>
<html lang="en">
  <head>
    <title>FindAll</title>
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
        <a class="nav-link  active" href="findAll.php">recherchers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkStatut.php">checkStatut</a>
      </li>

    </ul>
    
  </div>

  <form action="findAll.php" method="POST">
  <div class="form-row align-items-center">
    <div class="col-sm-3 my-1">
      <label class="sr-only" for="inlineFormInputName">Etudiant</label>
      <input type="text" name="etud" class="form-control" id="inlineFormInputName" placeholder="">
    </div>
    </div>
    <div class="col-auto my-1">
      <button type="submit" name="reche" class="btn btn-primary">rechercher</button>
    </div>
  </div>
</form>
<?php
   require 'class/Autoloader.php';
   Autoloader::register();
   Database::connect();
  //include_once "EtudiantService.php";
?>

<?php

 $etusev= new EtudiantService();  
    //$etudi= new EtudiantService();
    if(isset($_POST['reche'])){
        if($_POST['etud']=="BOURSIER"){

          echo"<table class='table table-striped'>";
            echo"<tbody>";
            echo "<tr>";
            echo"<td>Matricule</td>";
            echo"<td>Nom</td>";
            echo"<td>Prenom</td>";
            echo"<td>Email</td>";
            echo"<td>Telephone</td>";
            echo"<td>Date De Naissance</td>";
            echo"<td>id_type</td>";
            echo"</tr>";
            foreach ($etusev->findAll('BOURSIER') as $key => $uti) {
                echo "<tr>";
                echo"<td>".$uti['matricule']."</td>";
                echo"<td>".$uti['nom']."</td>";
                echo"<td>".$uti['prenom']."</td>";
                echo"<td>".$uti['email']."</td>";
                echo"<td>".$uti['tel']."</td>";
                echo"<td>".$uti['date_de_naissance']."</td>";
                echo"<td>".$uti['id_type']."</td>";
                echo"</tr>";
                
            }

        }
        elseif($_POST['etud']=="NON_BOURSIER"){
          echo"<table class='table table-striped'>";
            echo"<tbody>";
            echo "<tr>";
            echo"<td>Matricule</td>";
            echo"<td>Nom</td>";
            echo"<td>Prenom</td>";
            echo"<td>Email</td>";
            echo"<td>Telephone</td>";
            echo"<td>Date De Naissance</td>";
            echo"<td>Adresse</td>";
            echo"</tr>";
            foreach ($etusev->findAll('NON_BOURSIER') as $key => $uti) {
                echo "<tr>";
                echo"<td>".$uti['matricule']."</td>";
                echo"<td>".$uti['nom']."</td>";
                echo"<td>".$uti['prenom']."</td>";
                echo"<td>".$uti['email']."</td>";
                echo"<td>".$uti['tel']."</td>";
                echo"<td>".$uti['date_de_naissance']."</td>";
                echo"<td>".$uti['adresse']."</td>";
                echo"</tr>";
            }
        }
        elseif($_POST['etud']=="LOGER"){
          echo"<table class='table table-striped'>";
            echo"<tbody>";
            echo "<tr>";
            echo"<td>Matricule</td>";
            echo"<td>Nom</td>";
            echo"<td>Prenom</td>";
            echo"<td>Email</td>";
            echo"<td>Telephone</td>";
            echo"<td>Date De Naissance</td>";
            echo"<td>id_chambre</td>";
            echo"</tr>";
            foreach ($etusev->findAll('LOGER') as $key => $uti) {
              //die(var_dump($etusev->findAll('LOGER')));
                echo "<tr>";
                echo"<td>".$uti['matricule']."</td>";
                echo"<td>".$uti['nom']."</td>";
                echo"<td>".$uti['prenom']."</td>";
                echo"<td>".$uti['email']."</td>";
                echo"<td>".$uti['tel']."</td>";
                echo"<td>".$uti['date_de_naissance']."</td>";
                echo"<td>".$uti['id_chambre']."</td>";
                echo"</tr>";
            }
        }

    }
    echo'</tbody>';
    echo'</table>';
    
?>

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
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>