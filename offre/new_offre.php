<?php  
    include_once('../config/pdo.php');
    require_once('../models/offre_model.php');
    require_once('../userManagers/offre_Manager.php');
    session_start();


    // ajoute une nouvelle offre avec l'identifiant de l'entreprise
    $mail = $_SESSION['email'];
    $query = $pdo->prepare("SELECT id_entreprise FROM entreprise WHERE mail LIKE '$mail'");
    $id = $query->execute();
    $donnee = [];
    $user = new offre($donnee);
    $user->settitre($_POST["titre"]);
    $user->setdescription($_POST["description"]);
    $user->setexperience($_POST["experience"]);
    $user_controller = new User_offre_Manager($pdo);
    $user_controller->addoffre($user, $id);

    header("Location: http://localhost:8080/tp_php/homes/home_e.php");
    exit();
?>