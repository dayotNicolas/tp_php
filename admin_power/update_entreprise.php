<?php  
    include_once('../config/pdo.php');
    require_once('../models/entreprise.php');
    require_once('../userManagers/User_entreprise_Manager.php');
    session_start();

    $id_entreprise = $_SESSION['id_entreprise'];

    // construit un utilisateur 'entreprise' et met à jour la partie de la bdd en fonction de l'id passé.
    $donnee = [];
    $user = new User_entreprise($donnee);
    $user->setNom($_POST["nom"]);
    $user->setMail($_POST["email"]);
    $user->setMdp($_POST["mdp"]);
    $user_controller = new User_entreprise_Manager($pdo);
    $user_controller->updateUserById($user, $id_entreprise);

    header("Location: http://localhost:8080/tp_php/homes/home_a.php");
    exit();
?>