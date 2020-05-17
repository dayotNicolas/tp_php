<?php  
    include_once('../config/pdo.php');
    require_once('../models/candidat.php');
    require_once('../userManagers/User_candidat_Manager.php');
    session_start();

    $id_candidat = $_SESSION['id_candidat'];

    // construit un utilisateur 'candidat' et met à jour la partie de la bdd en fonction de l'id passé.
    $donnee = [];
    $user = new User_candidat($donnee);
    $user->setNom($_POST["nom"]);
    $user->setPrenom($_POST["prenom"]);
    $user->setMail($_POST["email"]);
    $user->setMdp($_POST["mot_de_passe"]);;
    $user_controller = new User_candidat_Manager($pdo);
    $user_controller->updateUserById($user, $id_candidat);

    header("Location: http://localhost:8080/tp_php/homes/home_a.php");
    exit();
?>