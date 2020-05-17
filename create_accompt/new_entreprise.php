<?php
  include_once('../config/pdo.php');
  require_once('../models/entreprise.php');
  require_once('../userManagers/User_entreprise_Manager.php');

  // créer un objet entreprise avec les données du formulaire et l'enregistre sur la bdd.

  $donnee = [];
  $user = new User_entreprise($donnee);
  if (!empty($_POST["nom"]) and !empty($_POST["email"]) and !empty($_POST["mdp"]))
  {
    $user->setNom($_POST["nom"]);
    $user->setMail($_POST["email"]);
    $user->setMdp($_POST["mdp"]);
    $user_controller = new User_entreprise_Manager($pdo);
    $user_controller->addUser($user);

    header("Location: http://localhost:8080/tp_php/connect/connectentreprise.php");
    exit();
  } else
  {
    echo "il manque des informations à la création du compte";
    echo "<form action='http://localhost:8080/tp_php/create_accompt/new_candidat.html'>
                          <p>
                          <input type='submit' value='précédent' />
                          </p>
                          </form>";
  }
?>