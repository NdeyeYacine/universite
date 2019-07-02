
        <?php
            class Batiment{
            private $num_batiment;

            public function __construct($num_batiment)
            {
                $this->num_batiment=$num_batiment;
            } 
            public function getNum_batiment()
            {
                        return $this->num_batiment;
            }
            public function setNum_batiment($num_batiment)
            {
                        $this->num_batiment = $num_batiment;
            }
            public function infos(){
                return $this->num_batiment;
            }

            }
        ?>
