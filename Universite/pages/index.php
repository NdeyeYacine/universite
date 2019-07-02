<?php
//ini_set("display_errors",1);
require 'class/Autoloader.php';
Autoloader::register();
Database::connect();
// //include "EtudiantService.php";
// $etu = new EtudiantService();

// $s = new NonBoursier();
// $etu->add($s);
// //var_dump($s->infos());
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Université</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" >
  </head>
    <body>
        
    <div class="card text-center">
  <div class="card-header">

   <ul class="nav nav-tabs card-header-tabs">
   <li class="nav-item">
        <a class="nav-link" href="acceuil.php">acceuil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Ajouter</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="find.php">rechercher</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="findAll.php">recherchers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkStatut.php">checkStatut</a>
      </li>

    </ul>
    
  </div>
      <form action="" method="POST">
        <div class="form-group" id="mat">
            <label for="formGroupExampleInput">Matricule</label>
            <input type="text" name="matricule" class="form-control" id="formGroupExampleInput" placeholder="Donner votre matricule">
        </div>
        <div class="form-group" id="nom">
            <label for="formGroupExampleInput2">Nom</label>
            <input type="text" name="nom" class="form-control" id="formGroupExampleInput2" placeholder="Donner votre nom">
        </div>
        <div class="form-group" id="prenom">
            <label for="formGroupExampleInput3">Prenom</label>
            <input type="text" name="prenom" class="form-control" id="formGroupExampleInput3" placeholder="Donner votre prenom">
        </div>

        <div class="form-group" id="email">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput4" placeholder="Donner votre email">
        </div>

        <div class="form-group" id="tel">
            <label for="formGroupExampleInput3">Telephone</label>
            <input type="number" name="tel" class="form-control" id="formGroupExampleInput5" placeholder="Donner votre numero">
        </div>

        <div class="form-group" id="date">
            <label for="formGroupExampleInput3">Date de Naissance</label>
            <input type="date" name="dte" class="form-control" id="formGroupExampleInput6" placeholder="Donner votre date de naissance">
        </div>


        <div id="brse">
            <div class="form-check form-check-inline" id="boursier">
                <input name="boursier" class="form-check-input" type="radio"  id="inlineRadio1" value="Boursier" checked>
                <label class="form-check-label" for="inlineRadio1">Boursier</label>
            </div>
            <div class="form-check form-check-inline" id="nonboursier">
                <input name="boursier" class="form-check-input" type="radio" id="inlineRadio2" value="Non_Boursier">
                <label class="form-check-label" for="inlineRadio2">Non_Boursier</label>
            </div><br/>
        </div>

       <!-- <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Type</label> -->
       <div id="typebourse">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Type</label>
                <?php
                //require_once 'class/Autoloader.php';
                //Autoloader::register();
                $connection=Database::connect();
                echo'<select name="type" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"> ';
                
                        $requete=$connection->query('SELECT * FROM Type_bourse');
                        while($rep = $requete->fetch()){
                            //echo "<option value=''></option>";
                            echo '<option value='.$rep["libelle"].'>'.$rep["libelle"].'</option><br>';
                   
                        }
                        echo'</select><br>';
                ?>

   
        </div>

        <div class="custom-control custom-checkbox my-1 mr-sm-2" id="loge">
            <input type="checkbox" name="loge" value="Loger" class="custom-control-input" id="customControlInline">
            <label class="custom-control-label" for="customControlInline">Loger</label>
        </div>

        <div class="form-group" id="numchamb">
            <label for="formGroupExampleInput3">Chambre</label>
            <input type="text" name="numchamb" class="form-control" id="formGroupExampleInput7" placeholder="Donner votre numero de chambre">
        </div>

        <div class="form-group" id="numbat">
            <label for="formGroupExampleInput3">Batiment</label>
            <input type="text" class="form-control" id="formGroupExampleInput7" placeholder="Donner votre date de numero de batiment">
        </div>

        <div class="form-group" id="adr">
            <label for="formGroupExampleInput3">Adresse</label>
            <input type="text" name="adresse" class="form-control" id="formGroupExampleInput8" placeholder="Donner votre adresse">
        </div>

        <button type="submit" class="btn btn-primary my-1" name="inserer">enregistrer</button>
    </form>

        <?php
            if(isset($_POST['inserer'])){
                    
                    $matricule=$_POST['matricule'];
                    $nom=$_POST['nom'];
                    $prenom=$_POST['prenom'];
                    $email=$_POST['email'];
                    $tel=$_POST['tel'];
                    $date_de_naissance=$_POST['dte'];
                    //var_dump($date_de_naissance);die();
                    $etud= new Etudiant($matricule,$nom,$prenom,$email,$tel,$date_de_naissance);
                    $etusev= new EtudiantService();
                    $etusev->add($etud);
                    //var_dump($etud);
                    //var_dump($_POST);

                    $adresse=$_POST['adresse'];
                    $id_type=$_POST['type'];
                    $num_chambre=$_POST['numchamb'];
                    //var_dump($num_chambre);
                    
                    if($_POST['boursier']=='Boursier'){
                        

                        $etu= new Boursier($matricule,$nom,$prenom,$email,$tel,$date_de_naissance,$id_type);
                       // $etuds= new EtudiantService();
                        $etusev->add($etu);

                        if($_POST['loge']=='Loger')
                        {
                            $loge=new Loger($matricule,$nom,$prenom,$email,$tel,$date_de_naissance,$id_type,$num_chambre);
                           // $etuserv = new EtudiantService();
                            
                            $etusev->add($loge);
                        }
                    }

                   else if($_POST['boursier']=='Non_Boursier'){
                        $etdi= new NonBoursier($matricule,$nom,$prenom,$email,$tel,$date_de_naissance,$adresse);
                        //$nonbrs= new EtudiantService();
                        $etusev->add($etdi);
                }

            }
        ?>












    <script src="teste.js"></script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>