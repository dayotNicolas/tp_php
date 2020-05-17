<?php
  include_once('../config/pdo.php');
  require_once('../models/candidat.php');
  require_once('../userManagers/User_candidat_Manager.php');
  session_start();

  // met à jour l'utilisateur dont la variable de session correspond au mail en fonction des données envoyés par formulaire.
  $donnee = [];
  $user = new User_candidat($donnee);
  $user->setNom($_POST["nom"]);
  $user->setPrenom($_POST["prenom"]);
  $user->setMail($_POST["email"]);
  $user->setMdp($_POST["mot_de_passe"]);
  $user_controller = new User_candidat_Manager($pdo);
  $user_controller->updateUser($user, $_SESSION['email']);

  header("Location: http://localhost:8080/tp_php/index.php");
  exit();
?>