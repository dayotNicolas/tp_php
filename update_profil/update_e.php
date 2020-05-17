<?php
  include_once('../config/pdo.php');
  require_once('../models/entreprise.php');
  require_once('../userManagers/User_entreprise_Manager.php');
  session_start();

  // met à jour l'utilisateur dont la variable de session correspond au mail en fonction des données envoyés par formulaire.
  $donnee = [];
  $user = new User_entreprise($donnee);
  $user->setNom($_POST["nom"]);
  $user->setMail($_POST["email"]);
  $user->setMdp($_POST["mdp"]);
  $user_controller = new User_entreprise_Manager($pdo);
  $user_controller->updateUser($user, $_SESSION['email']);

  header("Location: http://localhost:8080/tp_php/index.php");
  exit();
?>