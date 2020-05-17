<?php
require_once('../models/candidat.php');

// contrôles applicables sur l'objet candidat (préparation des requêtes SQL principalement)
class User_candidat_Manager
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

    public function getUser($email)
    {
        //$email = (int) $id;

        $query = $this->db->prepare('SELECT * FROM candidat WHERE mail = :email');
        $query->bindParam(':email', $email);
        $query->execute();
        $donnees = $query->fetch(PDO::FETCH_ASSOC);

        if(!empty($donnees)){
            return new User_candidat($donnees);
        }else{
            return null;
        }

    }

    // Fonction d'ajout d'une nouvelle donnée
    public function addUser(User_candidat $user){
        $query = $this->db->prepare('INSERT INTO candidat(id_manager, nom, prenom, mail, mdp) VALUES(1, :nom, :prenom, :mail, :mdp)');

        $query->bindValue(':nom', $user->nom());
        $query->bindValue(':prenom', $user->prenom());
        $query->bindValue(':mail', $user->mail());
        $query->bindValue(':mdp', $user->mdp());

        $query->execute();
    }

    // Fonction de modification de données dans la bdd
    public function updateUser(User_candidat $user, $email){
        $query = $this->db->prepare("UPDATE `candidat` SET nom =:nom, prenom =:prenom, mail =:mail, mdp =:mdp WHERE candidat.mail = '$email'");

        $query->bindValue(':nom', $user->nom());
        $query->bindValue(':prenom', $user->prenom());
        $query->bindValue(':mail', $user->mail());
        $query->bindValue(':mdp', $user->mdp());

        $query->execute();
    }

    // Fonction de modification de données dans la bdd par id
    public function updateUserById(User_candidat $user, $id){
        $query = $this->db->prepare("UPDATE `candidat` SET nom =:nom, prenom =:prenom, mail =:mail, mdp =:mdp WHERE id_candidat = '$id'");
    
        $query->bindValue(':nom', $user->nom());
        $query->bindValue(':prenom', $user->prenom());
        $query->bindValue(':mail', $user->mail());
        $query->bindValue(':mdp', $user->mdp());
        

        $query->execute();
    }

    // Fonction de suppression de données
    public function del_candidat($id){
       $query = $this->db->prepare("DELETE FROM candidat WHERE id_candidat = '$id'");
        
       $query->execute();
    }

    public function getAllUser()
    {
        $users = [];

        $query = $this->db->query('SELECT * FROM candidat');
        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($donnees as $d){
            $users[] = new User_candidat($d);
        }

        return $users;
    }
}

?>
