<?php
include_once('../config/pdo.php');
require_once('../models/admin.php');
require_once('../userManagers/User_admin_Manager.php');
session_start();

// construit l'utilisateur à partir des données entrées pour se connecter et compare la correspondance entre email et mot de passe.

$reponse_admin = $pdo->query('SELECT mail, mdp FROM manager');
$donnees_admin = $reponse_admin->fetchAll();
$user_controller = new User_admin_Manager($pdo);
$user = $user_controller->getUser($_POST["email"]);
foreach ($donnees_admin as $indice=>$tab){
    if ( empty($_POST["email"]) or empty($_POST["mot_de_passe"])){
        header('Location: http://Localhost:8080/tp_php/index.php');
        exit();
    } elseif ($tab['mail'] == $_POST["email"] and $tab['mdp'] == $_POST["mot_de_passe"]){
        $_SESSION['isConnected'] = True;
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['user'] = $user;
        header('Location: http://Localhost:8080/tp_php/homes/home_a.php');
        exit();
    }
}
header('Location: http://Localhost:8080/tp_php/index.php');
?>