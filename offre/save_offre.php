<?php  
    include_once('../config/pdo.php');
    require_once('../models/offre_model.php');
    require_once('../userManagers/offre_Manager.php');
    session_start();

    $id_offre = $_SESSION['id_offre'];

    // modifie une offre en fonction de l'id de l'offre
    $donnee = [];
    $user = new offre($donnee);
    $user->settitre($_POST["titre"]);
    $user->setdescription($_POST["description"]);
    $user->setexperience($_POST["experience"]);
    $user_controller = new User_offre_Manager($pdo);
    $user_controller->update_offre($user, $id_offre);

    header("Location: http://localhost:8080/tp_php/homes/home_e.php");
    exit();
?>