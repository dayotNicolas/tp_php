<?php
    class User_candidat
    {
        //private $id_c;
        //private $id_m;
        private $nom;
        private $prenom;
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
        /*
        public function id_c(){
            return $this->id_c;
        }

        public function id_m(){
            return $this->id_m;
        }
        */
        public function nom(){
            return $this->nom;
        }

        public function prenom(){
            return $this->prenom;
        }

        public function mail(){
            return $this->mail;
        }

        public function mdp(){
            return $this->mdp;
        }
       /*
        public function setId_c($idc_envoyer){
            $id_c = (int) $idc_envoyer;
            $this->id_c = $id_c;
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

        public function setPrenom($prenom_envoyer){
            if (is_string($prenom_envoyer))
            {
                $this->prenom = htmlspecialchars($prenom_envoyer);
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