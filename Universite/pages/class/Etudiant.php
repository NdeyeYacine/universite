
      <?php

       class Etudiant{
            private $matricule;
            private $nom;
            private $prenom;
            private $email;
            private $tel;
            private $date_de_naissance;


            public function __construct($matricule="", $nom="", $prenom="", $email="", $tel="", $date_de_naissance="")
            {
                $this->matricule=$matricule;
                $this->nom=$nom;
                $this->prenom=$prenom;
                $this->email=$email;
                $this->tel=$tel;
                $this->date_de_naissance=$date_de_naissance;
            }
            public function getMatricule(){
                return $this->matricule;
            }
            public function setMatricule($matricule){
                $this->matricule=$matricule;
            }
            public function getNom(){
                return $this->nom;
            }
            public function setNom($nom){
                $this->nom=$nom;
            }
            public function getPrenom(){
                return $this->prenom;
            }
            public function setPrenom($prenom){
                $this->prenom=$prenom;
            }
            public function getEmail(){
                return $this->email;
            }
            public function setEmail($email){
                $this->email=$email;
            }
            public function getTel(){
                return $this->tel;
            }
            public function setTel($tel){
                $this->tel=$tel;
            }            
            public function getDate_de_naissance(){
                return $this->date_de_naissance;
            }
            public function setDate_de_naissance($date_de_naissance){
                $this->_date_de_naissance=$date_de_naissance;
            }
            public function infos(){
                return $this->matricule.", ".$this->nom.", ".$this->prenom.", ".$this->email.", ".$this->tel.", ".$this->date_de_naissance;
            }
        }
      ?>