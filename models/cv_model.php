<?php
    // Construction de l'object cv
    class CV
    {

        private $diplomes;
        private $emploi_precedent;
        private $permis;
        private $competences;
        private $loisirs;
    
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

        public function diplomes(){
            return $this->diplomes;
        }

        public function emploi_precedent(){
            return $this->emploi_precedent;
        }

        public function permis(){
            return $this->permis;
        }

        public function competences(){
            return $this->competences;
        }

        public function loisirs(){
            return $this->loisirs;
        }

        public function setdiplomes($diplome_envoyer){
            if (is_string($diplome_envoyer))
            {
                $this->diplomes = htmlspecialchars($diplome_envoyer);
            }
        }

        public function setemploi_precedent($emploi_precedent_envoyer){
            if (is_string($emploi_precedent_envoyer))
            {
                $this->emploi_precedent = htmlspecialchars($emploi_precedent_envoyer);
            }
        }

        public function setpermis($permis_envoyer){
            if (is_string($permis_envoyer))
            {
                $this->permis = htmlspecialchars($permis_envoyer);
            }
        }

        public function setcompetences($competences_envoyer){
            if (is_string($competences_envoyer))
            {
                $this->competences = htmlspecialchars($competences_envoyer);
            }
        }

         public function setloisirs($loisirs_envoyer){
            if (is_string($loisirs_envoyer))
            {
                $this->loisirs = htmlspecialchars($loisirs_envoyer);
            }
        }
    }
?>