<?php  
    include_once('../config/pdo.php');
    require_once('../models/cv_model.php');
    require_once('../userManagers/cv_Manager.php');
    session_start();

    $mail = $_SESSION['email'];

    // fonction utilisée pour enregister le chemin de l'upload au bon candidat
    function upload_save($path, $email, $bd)
    {
        $query=$bd->prepare("UPDATE CV AS c INNER JOIN candidat AS e ON (c.id_candidat = e.id_candidat) SET c.pdf_path = '$path'  WHERE c.id_candidat = e.id_candidat and e.mail = '$email' ");
        $query->execute();
    }

    // mise à jour du CV en fonction des données reçues en post depuis le formulaire.
    $donnee = [];   
    $user = new CV($donnee);
    $user->setdiplomes($_POST["diplomes"]);
    $user->setemploi_precedent($_POST["emploi_precedent"]);
    $user->setpermis($_POST["permis"]);
    $user->setcompetences($_POST["competences"]);
    $user->setloisirs($_POST["loisirs"]);
    $user_controller = new User_cv_Manager($pdo);
    $user_controller->update_Cv($user, $mail);
    

    header("Location: http://localhost:8080/tp_php/homes/home_c.php");
    exit();
?>
