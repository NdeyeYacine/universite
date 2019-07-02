<?php
class EtudiantService{
  function add(Etudiant $etudiant){

    
    try
    {
      $bd=Database::connect();
      if(get_class($etudiant)=='Etudiant'){
      $requete=$bd->prepare("INSERT INTO ETUDIANT(matricule,nom,prenom,email,tel,date_de_naissance) 
      VALUES(:matricule,:nom,:prenom,:email,:tel,:date_de_naissance)");
      $requete->bindValue(':matricule',$etudiant->getMatricule(),PDO::PARAM_STR); 
      $requete->bindValue(':nom',$etudiant->getNom(),PDO::PARAM_STR);
      $requete->bindValue(':prenom',$etudiant->getPrenom(),PDO::PARAM_STR);
      $requete->bindValue(':email',$etudiant->getEmail(),PDO::PARAM_STR);
      $requete->bindValue(':tel',$etudiant->getTel(),PDO::PARAM_INT);
      $requete->bindValue(':date_de_naissance',$etudiant->getDate_de_naissance());  
      $insert=$requete->execute();
     
    }
    //$requete=$bd->prepare($requete);
    
    //$requete->execute();
    
   // $resultat=$requete->fetchAll();
    
    //$req ="SELECT MAX(id_etudiant) as id from ETUDIANT";

    //$req=$bd->query($req);
   
   //while ($var=$req->fetch()) {
    //$_id=$var['id'];
  
     //break;
    // }

       //$requete->execute();
       
       

   // $resultat=$requete->fetchAll();

   // die(var_dump(($resultat)));

    elseif(get_class($etudiant)=='Boursier'){

      $req = $bd->query("SELECT MAX(id_etudiant) as mat from ETUDIANT");
      while ($var=$req->fetch()) {
   $_id=$var['mat'];
 //var_dump($_id);
    break;
   }
       $_libelle=$etudiant->getLibelle();
      $req=$bd->query("SELECT id_type as id from Type_bourse WHERE libelle='$_libelle'");
      $res=$req->fetch(PDO::FETCH_ASSOC);
       $id_type=$res['id'];
       //var_dump($res);die();
       $requete=$bd->prepare('INSERT INTO BOURSIER(id_etudiant,id_type) VALUES(:id_etudiant,:id_type)');
      
      // $req ="SELECT id_type as id from Type_bourse WHERE libelle=".$etudiant->getLibelle();
       //var_dump($etudiant->getLibelle());die();
      
       $requete->bindParam(':id_etudiant',$_id,PDO::PARAM_INT);
       $requete->bindParam(':id_type',$id_type,PDO::PARAM_INT);

       $insert=$requete->execute();
     //  var_dump($insert);die();
       //$_libelle=$etudiant->getLibelle();
        //$requete=("INSERT INTO BOURSIER(id_etudiant,id_type) VALUES('$_id', 'id_type')");

       // $req=$bd->prepare($requete);
       // $req->execute();

        
     }
     elseif(get_class($etudiant)=='NonBoursier'){
      $req = $bd->query("SELECT MAX(id_etudiant) as mat from ETUDIANT");
      while ($var=$req->fetch()) {
   $_id=$var['mat'];
 //var_dump($_id);
    break;
   }
       $_adresse=$etudiant->getAdresse();
      // var_dump(($_adresse));
       $requete=$bd->prepare("INSERT INTO NON_BOURSIER(id_etudiant,adresse) VALUES(:id_etudiant,:adresse)");
       $requete->bindParam(':id_etudiant',$_id,PDO::PARAM_INT);
       $requete->bindParam(':adresse',$_adresse,PDO::PARAM_STR);
       $insert=$requete->execute();
       //$req=$bd->query($requete);
       //var_dump($requete);
       //die();
       //$req->execute();

     }
     elseif(get_class($etudiant)=='Loger'){

       $req=$bd->query("SELECT MAX(id_boursier) as id from BOURSIER");
      $rest=$req->fetch(PDO::FETCH_ASSOC);
      $id=$rest['id'];
      //  while ($var=$req->fetch()) {
      //  $id=$var['id'];
      //   var_dump($id);
      //  break;


      // }

        $_num_chambre=$etudiant->getNum_chambre();
        //var_dump($_num_chambre);
        $req=$bd->query("SELECT id_chambre as id from CHAMBRE WHERE num_chambre='$_num_chambre'");
        $res=$req->fetch(PDO::FETCH_ASSOC);
        $id_chambre=$res['id'];
        //var_dump($id_chambre);
       $requete=$bd->prepare("INSERT INTO LOGER (id_boursier,id_chambre) VALUES(:id_boursier,:id_chambre)");
       $requete->bindValue(':id_boursier',$id,PDO::PARAM_INT);
       $requete->bindValue(':id_chambre',$id_chambre,PDO::PARAM_INT);
       $insert=$requete->execute();

      //  $requete=$bd->prepare('INSERT INTO BOURSIER(id_etudiant,id_type) VALUES(:id_etudiant,:id_type)');
      //  $requete->bindParam(':id_etudiant',$_id,PDO::PARAM_INT);
      //  $requete->bindParam(':id_type',$etudiant->getId_type(),PDO::PARAM_INT);
      //  $insert=$requete->execute();

      // $req=$bd->prepare($requete);
      // $req->execute();


      // $req ="SELECT MAX(id_boursier,id_chambre) as id from BOURSIER AND CHAMBRE";
      // $req=$bd->query($req);

      //  while ($var=$req->fetch()) {
      //    $_id=$var['id'];
      
      //     break;
      //     }
      //     $requete->execute();

      // $resultat=$requete->fetchAll();

      // $requete=("SELECT * FROM BOURSIER,CHAMBRE WHERE Boursier.id_boursier=Loger.id_Boursier AND Chambre.id_chambre=Loger.id_chambre");
    }
  
  }
    catch(Exception $e)
    {
      die($e->getMessage());
    }
    
  }

  public function select($selec){
    $bd=Database::connect();
    $requete=$bd->query("SELECT * FROM $selec");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

   public function find($tab,$mat){
    $bd=Database::connect();
    //$_matricule=$etudiant->getMatricule();
    if($tab=='ETUDIANT'){
          $requete="SELECT * FROM $tab WHERE $tab.matricule='$mat'";
    }
    elseif($tab=='BOURSIER'){
      $requete="SELECT * FROM $tab,ETUDIANT WHERE ETUDIANT.matricule='$mat' AND ETUDIANT.id_etudiant='$tab.id_etudiant'";
    }
    elseif($tab=='NON_BOURSIER'){
      $requete="SELECT * FROM $tab,ETUDIANT WHERE ETUDIANT.matricule='$mat' AND ETUDIANT.id_etudiant=$tab.id_etudiant";
    }
    elseif($tab=='LOGER'){
      $requete="SELECT * FROM $tab,ETUDIANT WHERE ETUDIANT.matricule='$mat' AND ETUDIANT.id_etudiant=$tab.id_boursier";
    }
    $result=$bd->query($requete);
 // $result->bindValue(':matricule',$mat,PDO::PARAM_STR);
  $line=$result->fetchAll(PDO::FETCH_ASSOC);
  return $line;
    $result->closeCursor();
  }
 
  public function findAll($tab){
    $bd=Database::connect();
     if($tab=="BOURSIER"){
       $requete=$bd->query("SELECT * FROM $tab,ETUDIANT WHERE BOURSIER.id_etudiant=ETUDIANT.id_etudiant");
     }
     elseif($tab=="NON_BOURSIER"){
       $requete=$bd->query("SELECT * FROM $tab,ETUDIANT WHERE NON_BOURSIER.id_etudiant=ETUDIANT.id_etudiant");
     }
     elseif($tab=="LOGER"){
       $requete=$bd->query("SELECT * FROM $tab,ETUDIANT WHERE ETUDIANT.id_etudiant=LOGER.id_boursier");
     }
    //  $requete=$bd->query("SELECT * FROM $tab,ETUDIANT WHERE ETUDIANT.id_etudiant=$tab.id_boursier");
    //  die();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }
public function checkStatut($tab,$mat){
  
    $bd=Database::connect();
     if($tab=="BOURSIER"){
       $requete=$bd->query("SELECT * FROM BOURSIER,ETUDIANT WHERE BOURSIER.id_etudiant=ETUDIANT.id_etudiant and ETUDIANT.matricule ='$mat' ");
     }
     elseif($tab=="NON_BOURSIER"){
       $requete=$bd->query("SELECT * FROM NON_BOURSIER,ETUDIANT WHERE NON_BOURSIER.id_etudiant=ETUDIANT.id_etudiant  and ETUDIANT.matricule ='$mat'");
     }
     elseif($tab=="LOGER"){
       $requete=$bd->query("SELECT * FROM LOGER,ETUDIANT WHERE ETUDIANT.id_etudiant=LOGER.id_boursier and ETUDIANT.matricule ='$mat'");
     }
    //  $requete=$bd->query("SELECT * FROM $tab,ETUDIANT WHERE ETUDIANT.id_etudiant=$tab.id_boursier");
    //  die();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
   
}
}
?>