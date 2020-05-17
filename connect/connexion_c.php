<?php
include_once('../config/pdo.php');
require_once('../models/candidat.php');
require_once('../userManagers/User_candidat_Manager.php');
session_start();

// construit l'utilisateur à partir des données entrées pour se connecter et compare la correspondance entre email et mot de passe.

$reponse_candidat = $pdo->query('SELECT mail, mdp FROM candidat');
$donnees_candidat = $reponse_candidat->fetchAll();
$user_controller = new User_candidat_Manager($pdo);
$user = $user_controller->getUser($_POST["email"]);
foreach ($donnees_candidat as $indice=>$tab){
    if ( empty($_POST["email"]) or empty($_POST["mot_de_passe"])){
        header('Location: http://Localhost:8080/tp_php/index.php');
        exit();
    } elseif ($tab['mail'] == $_POST["email"] and $tab['mdp'] == $_POST["mot_de_passe"]){
        $_SESSION['isConnected'] = True;
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['user'] = $user;
        header('Location: http://Localhost:8080/tp_php/homes/home_c.php');
        exit();
    }
}
header('Location: http://Localhost:8080/tp_php/index.php');
?>
