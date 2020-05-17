<?php
require_once('../models/entreprise.php');

// contrôles applicables sur l'objet entreprise (préparation des requêtes SQL principalement)
class User_entreprise_Manager
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

    public function getUser($email)
    {
        //$email = (int) $id;

        $query = $this->db->prepare('SELECT * FROM entreprise WHERE mail = :email');
        $query->bindParam(':email', $email);
        $query->execute();
        $donnees = $query->fetch(PDO::FETCH_ASSOC);

        if(!empty($donnees)){
            return new User_entreprise($donnees);
        }else{
            return null;
        }
    }

    // Fonction d'ajout d'une nouvelle donnée
    public function addUser(User_entreprise $user){
        $query = $this->db->prepare('INSERT INTO entreprise(id_manager, nom, mail, mdp) VALUES(1, :nom, :mail, :mdp)');

        $query->bindValue(':nom', $user->nom());
        $query->bindValue(':mail', $user->mail());
        $query->bindValue(':mdp', $user->mdp());

        $query->execute();
    }

    // Fonction de modification de données dans la bdd
    public function updateUser(User_entreprise $user, $email){
        $query = $this->db->prepare("UPDATE `entreprise` SET nom =:nom, mail =:mail, mdp =:mdp WHERE entreprise.mail = '$email'");

        $query->bindValue(':nom', $user->nom());
        $query->bindValue(':mail', $user->mail());
        $query->bindValue(':mdp', $user->mdp());

        $query->execute();
    }

    // Fonction de modification de données dans la bdd par id
    public function updateUserById(User_entreprise $user, $id){
        $query = $this->db->prepare("UPDATE `entreprise` SET nom =:nom, mail =:mail, mdp =:mdp WHERE id_entreprise = '$id'");
    
        $query->bindValue(':nom', $user->nom());
        $query->bindValue(':mail', $user->mail());
        $query->bindValue(':mdp', $user->mdp());
        

        $query->execute();
    }

    // Fonction de suppression de données
    public function del_entreprise($id){

        $query = $this->db->prepare("DELETE FROM offre WHERE id_entreprise = '$id'");
        $query->execute();
        $query2 = $this->db->prepare("DELETE FROM entreprise WHERE id_entreprise = '$id'");
        $query2->execute();
    }

    public function getAllUser()
    {
        $users = [];

        $query = $this->db->query('SELECT * FROM entreprise');
        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($donnees as $d){
         //   $users[] = new User($d);
        }

        return $users;
    }
}
?>