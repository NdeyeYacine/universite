<?php
    class Loger extends Boursier{
        private $num_chambre;
      public function __construct($matricule, $nom, $prenom, $email, $tel, $date_de_naissance, $libelle,$num_chambre){
        parent::__construct($matricule,$nom,$prenom,$email,$tel,$date_de_naissance,$libelle);
        $this->num_chambre=$num_chambre;
      } 
    public function getNum_chambre()
    {
    return $this->num_chambre;
    } 
    public function setNum_chambre($num_chambre)
    {
    $this->num_chambre = $num_chambre;
    }
    public function infos(){
    return parent::infos().", ".$this->num_chambre;
  }
   }

?>