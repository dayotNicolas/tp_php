<?php
require_once('../models/cv_model.php');

// contrôles applicables sur l'objet cv (préparation des requêtes SQL principalement)
class User_cv_Manager
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    // Fonction d'ajout d'une nouvelle donnée
    public function addCv(CV $user, $id){
        $query = $this->db->prepare("INSERT INTO CV(id_candidat, diplomes, emploi_precedent, permis, competences, loisirs) VALUES('$id', :diplomes, :emploi_precedent, :permis, :competences, :loisirs)");

        $query->bindValue(':diplomes', $user->diplomes());
        $query->bindValue(':emploi_precedent', $user->emploi_precedent());
        $query->bindValue(':permis', $user->permis());
        $query->bindValue(':competences', $user->competences());
        $query->bindValue(':loisirs', $user->loisirs());

        $query->execute();
    }

    // Fonction de modification de données dans la bdd
    public function update_Cv(CV $user, $email){
        $query = $this->db->prepare("UPDATE CV AS c INNER JOIN candidat AS e ON (c.id_candidat = e.id_candidat) SET c.diplomes =:diplomes, c.emploi_precedent =:emploi_precedent, c.permis =:permis, c.competences =:competences, c.loisirs =:loisirs WHERE c.id_candidat = e.id_candidat and e.mail = '$email' ");

        $query->bindValue(':diplomes', $user->diplomes());
        $query->bindValue(':emploi_precedent', $user->emploi_precedent());
        $query->bindValue(':permis', $user->permis());
        $query->bindValue(':competences', $user->competences());
        $query->bindValue(':loisirs', $user->loisirs());

        $query->execute();
    }
}

?>
