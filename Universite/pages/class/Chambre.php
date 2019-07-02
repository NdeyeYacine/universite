
        <?php
            class Chambre{
            private $num_batiment;
            private $num_chambre;
            
            public function __construct(Batiment $num_batiment, $num_chambre)
            {
                $this->num_chambre=$num_chambre;
                $this->num_batiment=$num_batiment->getNum_batiment();
                
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
                return $this->num_batiment.", ".$this->num_chambre;
            }

            /**
             * Get the value of num_batiment
             */ 
            public function getNum_batiment()
            {
                        return $this->num_batiment;
            }

            /**
             * Set the value of num_batiment
             *
             * @return  self
             */ 
            public function setNum_batiment($num_batiment)
            {
                        $this->num_batiment = $num_batiment;

                        return $this;
            }
            }
        ?>
