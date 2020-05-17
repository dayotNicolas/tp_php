<?php  
    include_once('../config/pdo.php');
    require_once('../models/cv_model.php');
    require_once('../userManagers/cv_Manager.php');
    session_start();

    // création du nouveau CV en fonction du mail enrgistré en variable de session et des infos de la table 
    // coresspondant à ce mail et enrigstrement bdd.
    $mail = $_SESSION['email'];
    $query = $pdo->query("SELECT id_candidat FROM candidat WHERE mail LIKE '$mail'");
    $id = $query->fetch();
    $donnee = [];
    $user = new CV($donnee);
    $user->setdiplomes($_POST["diplomes"]);
    $user->setemploi_precedent($_POST["emploi_precedent"]);
    $user->setpermis($_POST["permis"]);
    $user->setcompetences($_POST["competences"]);
    $user->setloisirs($_POST["loisirs"]);
    $user_controller = new User_cv_Manager($pdo);
    $user_controller->addCv($user, $id['id_candidat']);

    header("Location: http://localhost:8080/tp_php/homes/home_c.php");
    exit();
?>