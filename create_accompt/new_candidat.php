<?php
  include_once('../config/pdo.php');
  require_once('../models/candidat.php');
  require_once('../userManagers/User_candidat_Manager.php');

  // créer un objet candidat avec les données du formulaire et l'enregistre sur la bdd.

  $donnee = [];
  $user = new User_candidat($donnee);
  if (!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["email"]) and !empty($_POST["mot_de_passe"]))
  {
    $user->setNom($_POST["nom"]);
    $user->setPrenom($_POST["prenom"]);
    $user->setMail($_POST["email"]);
    $user->setMdp($_POST["mot_de_passe"]);
    $user_controller = new User_candidat_Manager($pdo);
    $user_controller->addUser($user);

    header("Location: ../index.php");
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