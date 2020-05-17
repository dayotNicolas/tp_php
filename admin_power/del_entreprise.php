<?php  
    include_once('../config/pdo.php');
    require_once('../models/entreprise.php');
    require_once('../userManagers/User_entreprise_Manager.php');
    session_start();

    // supprime une entreprise en fonction de l'id reçue en post
    $id_entreprise = $_POST['id_entreprise'];


    $user_controller = new User_entreprise_Manager($pdo);
    $user_controller->del_entreprise($id_entreprise);

    header("Location: http://localhost:8080/tp_php/homes/home_a.php");
    exit();
?>