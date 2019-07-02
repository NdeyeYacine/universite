          <?php
            class NonBoursier extends Etudiant{
            private $adresse;

            public function __construct($matricule="", $nom="", $prenom="", $email="", $tel="", $date_de_naissance="", $adresse="")
            {
              parent::__construct($matricule,$nom,$prenom,$email,$tel,$date_de_naissance);
              $this->adresse=$adresse;
            }

            public function getAdresse()
            {
                        return $this->adresse;
            }
            public function setAdresse($adresse)
            {
                        $this->adresse = $adresse;
            }
            public function infos(){
              return parent::infos().", ".$this->adresse;
            }
            }
        ?>
