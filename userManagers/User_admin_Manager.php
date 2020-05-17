<?php
require_once('../models/admin.php');

// contrôles applicables sur l'objet administrateur (préparation des requêtes SQL principalement)
class User_admin_Manager
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

        $query = $this->db->prepare('SELECT * FROM manager WHERE mail = :email');
        $query->bindParam(':email', $email);
        $query->execute();
        $donnees = $query->fetch(PDO::FETCH_ASSOC);

        if(!empty($donnees)){
            return new User_admin($donnees);
        }else{
            return null;
        }

    }

    // Fonction d'ajout d'une nouvelle donnée
    public function addUser(User_candidat $user){
        $query = $this->db->prepare('INSERT INTO manager(nom, prenom, mail, mdp) VALUES(:nom, :prenom, :mail, :mdp)');

        $query->bindValue(':nom', $user->nom());
        $query->bindValue(':prenom', $user->prenom());
        $query->bindValue(':mail', $user->mail());
        $query->bindValue(':mdp', $user->mdp());

        $query->execute();
    }

    // Fonction de modification de données dans la bdd
    public function updateUser(User_admin $user, $email){
        $query = $this->db->prepare("UPDATE `manager` SET nom =:nom, prenom =:prenom, mail =:mail, mdp =:mdp WHERE manager.mail = '$email'");

        $query->bindValue(':nom', $user->nom());
        $query->bindValue(':prenom', $user->prenom());
        $query->bindValue(':mail', $user->mail());
        $query->bindValue(':mdp', $user->mdp());

        $query->execute();
    }

    public function getAllUser()
    {
        $users = [];

        $query = $this->db->query('SELECT * FROM manager');
        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($donnees as $d){
            $users[] = new User_admin($d);
        }

        return $users;
    }
}

?>
