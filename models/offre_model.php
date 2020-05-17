<?php
    // Construction de l'object offre
    class offre
    {
        private $id_offre;
        private $titre;
        private $description;
        private $experience;
    
        public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value)
            {
                $method = 'set'.ucfirst($key);

                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }

        public function id_offre(){
            return $this->id_offre;
        }

        public function titre(){
            return $this->titre;
        }

        public function description(){
            return $this->description;
        }

        public function experience(){
            return $this->experience;
        }

        public function setid_offre($id_offre_envoyer){
            $id_offre = (int) $id_offre_envoyer;
            $this->id_offre = $id_offre;
        }

        public function settitre($titre_envoyer){
            if (is_string($titre_envoyer))
            {
                $this->titre = htmlspecialchars($titre_envoyer);
            }
        }

        public function setdescription($description_envoyer){
            if (is_string($description_envoyer))
            {
                $this->description = htmlspecialchars($description_envoyer);
            }
        }

        public function setexperience($experience_envoyer){
            if (is_string($experience_envoyer))
            {
                $this->experience = htmlspecialchars($experience_envoyer);
            }
        }
    }
?>