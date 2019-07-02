
        <?php
            class Type{
            private $libelle;
            private $montant;

            public function __construct($libelle="", $montant="")
            {
                $this->libelle=$libelle;
                $this->montan=$montant;
            }
            public function getLibelle(){
                return $this->libelle;
            }
            public function setLibelle($libelle){
                $this->libelle=$libelle;
            }
            public function getMontant(){
                return $this->montant;
            }
            public function setMontant($montant){
                $this->montant=$montant;
            }
            public function infos(){
                return $this->libelle.", ".$this->montant;
            }
            }
        ?>
