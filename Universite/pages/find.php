<?php
      require_once('class/Database.php');
      require_once('class/EtudiantService.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Find</title>
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
        <a class="nav-link active" href="find.php">rechercher</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="findAll.php">recherchers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkStatut.php">checkStatut</a>
      </li>

    </ul>
    
  </div>

  <form action="find.php" method="POST">
  <div class="form-row align-items-center">

    <div class="col-auto my-1">
      <button type="submit" name="liste" class="btn btn-primary">recherche</button>
    </div>


    <div class="col-sm-3 my-1">
      <label class="sr-only" for="inlineFormInputName">Etudiant</label>
    </div>
     <?php
        Database::connect();
        $connection=Database::connect();
  ?>
 <select name="matricule" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
      <?php
         $requete=$connection->query('SELECT * FROM ETUDIANT');
         while($ret = $requete->fetch())
         {
             echo"<option value= '$ret[matricule] '>$ret[matricule]</option>";
      }?>
 </select>

     <!--//$connection=Database::connect();
     echo"<select id='d2' name='etude'>";
     echo"<option></option>";

     $sel=new EtudiantService();
     foreach ($sel->select('ETUDIANT') as $key=>$ma) {
       echo"<option value=".$ma['matricule'].">".$ma['matricule']."</option>";

     }
     echo"</select>";*/
     ?-->
    </div>
  </div>
</form>

<?php
  $etusev= new EtudiantService();

  if(isset($_POST['liste'])){
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
    foreach ($etusev->find('ETUDIANT',$_POST['matricule']) as $key => $val) {
      echo "<tr>";
      echo"<td>".$val['matricule']."</td>";
      echo"<td>".$val['nom']."</td>";
      echo"<td>".$val['prenom']."</td>";
      echo"<td>".$val['email']."</td>";
      echo"<td>".$val['tel']."</td>";
      echo"<td>".$val['date_de_naissance']."</td>";
      echo"</tr>";
    }
  }


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