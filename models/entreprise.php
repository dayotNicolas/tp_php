<?php
    // Construction de l'object entreprise
    class User_entreprise
    {
        //private $id_e;
        //private $id_m;
        private $nom;
        private $mail;
        private $mdp;

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

     /*   public function id_e(){
            return $this->id_e;
        }

        public function id_m(){
            return $this->id_m;
        }
    */
        public function nom(){
            return $this->nom;
        }

        public function mail(){
            return $this->mail;
        }

        public function mdp(){
            return $this->mdp;
        }
    /*    
        public function setId_e($ide_envoyer){
            $id_e = (int) $ide_envoyer;
            $this->id_e = $id_e;
        }
        
        public function setId_m($idm_envoyer){
            $id_m = (int) $idm_envoyer;
            $this->id_m = $id_m;
        }
    */    
        public function setNom($nom_envoyer){
            if (is_string($nom_envoyer))
            {
                $this->nom = htmlspecialchars($nom_envoyer);
            }
        }

        public function setMail($mail_envoyer){
            if (is_string($mail_envoyer))
            {
                $this->mail = htmlspecialchars($mail_envoyer);
            }
        }

        public function setMdp($mdp_envoyer){
            if (is_string($mdp_envoyer))
            {
                $this->mdp = htmlspecialchars($mdp_envoyer);
            }
        }
    }
?>