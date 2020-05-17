<?php
require_once('../models/offre_model.php');

// contrôles applicables sur l'objet offre (préparation des requêtes SQL principalement)
class User_offre_Manager
{
    private $db; // Instance de PDO

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    // Fonction d'ajout d'une nouvelle donnée
    public function addoffre(offre $user, $id){
        $query = $this->db->prepare("INSERT INTO offre(id_entreprise, titre, description_offre, experience) VALUES('$id', :titre, :description_offre, :experience)");

        $query->bindValue(':titre', $user->titre());
        $query->bindValue(':description_offre', $user->description());
        $query->bindValue(':experience', $user->experience());

        $query->execute();
    }

    // Fonction de modification de données dans la bdd
    public function update_offre(offre $user, $id_offre){
        $query = $this->db->prepare("UPDATE offre SET titre =:titre, description_offre =:description_offre, experience =:experience WHERE id_offre = '$id_offre'");
    
        $query->bindValue(':titre', $user->titre());
        $query->bindValue(':description_offre', $user->description());
        $query->bindValue(':experience', $user->experience());
        

        $query->execute();
    }

    // Fonction de suppression de données
    public function del_offre($id){
       $query = $this->db->prepare("DELETE FROM offre WHERE id_offre = '$id'");
        
       $query->execute();
    }
}
?>
