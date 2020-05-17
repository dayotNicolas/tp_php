<?php  
    include_once('../config/pdo.php');
    require_once('../models/offre_model.php');
    require_once('../userManagers/offre_Manager.php');
    session_start();

    $id_offre = $_POST['id_offre'];
    
    // supprime un offre en fonction de son id
    $user_controller = new User_offre_Manager($pdo);
    $user_controller->del_offre($id_offre);

    header("Location: http://localhost:8080/tp_php/homes/home_e.php");
    exit();
?>