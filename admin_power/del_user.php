<?php  
    include_once('../config/pdo.php');
    require_once('../models/candidat.php');
    require_once('../userManagers/User_candidat_Manager.php');
    session_start();

    // supprime une entreprise en fonction de l'id reçue en post
    $id_candidat = $_POST['id_candidat'];


    $user_controller = new User_candidat_Manager($pdo);
    $user_controller->del_candidat($id_candidat);

    header("Location: http://localhost:8080/tp_php/homes/home_a.php");
    exit();
?>