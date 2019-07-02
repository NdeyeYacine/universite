<?php
class Boursier extends Etudiant{
  
  private $libelle;
    public function __construct($matricule, $nom, $prenom, $email, $tel, $date_de_naissance, $libelle)
    {
      parent:: __construct($matricule,$nom,$prenom,$email,$tel,$date_de_naissance);
      $this->libelle=$libelle;
    }
  public function getLibelle()
  {
    return $this->libelle;
  }

  public function setLibelle($libelle)
  {
    $this->libelle = $libelle;

  }
  public function infos(){
    return parent::infos().", ".$this->libelle;
  }

}
?>