<?php
require_once('../models/candidat.php');
require_once('../userManagers/User_candidat_Manager.php');
include_once('../config/pdo.php');
session_start();


$user = $_SESSION['user'];

// rendre accessible les données privées : 
$reflexion = new ReflectionObject($user);
$nom = $reflexion->getProperty('nom');
$nom->setAccessible(true);
$prenom = $reflexion->getProperty('prenom');
$prenom->setAccessible(true);
$mail = $reflexion->getProperty('mail');
$mail->setAccessible(true);

// récupération des offres pour affichage.
$query = $pdo->query("SELECT id_offre AS `numéros d'identification offre`, id_entreprise AS `numéros d'identification entreprise`, titre, description_offre AS `Description`, experience FROM offre");
$liste_offre = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>home entreprise</title>
  <link rel="stylesheet" href="styleC.css">
</head>
<body>
    <h1>home</h1>
    <!-- Affichage du profil -->
    <div id='container'>
        <div id='profil'>
            <h2>Votre profil</h2>
            <p>
            <?php
                echo 'Votre nom : ' . $nom->getValue($user);
            ?>
            </p>
            <p>
            <?php
                echo 'votre prénom :' . $prenom->getValue($user);
            ?>
            </p>
            <p>
            <?php
                echo 'votre mail :' . $mail->getValue($user);
            ?>
            </p>
            <button id="buttonP" onclick ="window.location.href = 'http://localhost:8080/tp_php/update_profil/form_update_c.html';">Modifier</button>
        </div>
        <div id='offres'>
            <!-- affichage des offres -->
            <table>
            <?php
                foreach($liste_offre as $offres)
                {
                    echo "<div id='uneoffre'";
                    echo "<tr>";
                    foreach($offres as $key => $offre)
                    {
                        echo "{$key} : {$offre} ";
                        echo "</br>";
                    }
                    echo "</tr>";
                    echo "</br>";
                    echo "</br>";
                    echo "</div>";
                }
            ?>
            </table>
        </div>
        <div id='button'>
            <button onclick ="window.location.href = 'http://localhost:8080/tp_php/CV/CV.php';">Mon CV en ligne</button>
            <button onclick ="window.location.href = 'http://localhost:8080/tp_php/CV/upload_new.php';">Nouveau CV pdf</button>
            <button onclick ="window.location.href = 'http://localhost:8080/tp_php/CV/form_cv.html';">Modifier</button>
            <a href="http://localhost:8080/tp_php/CV/new_cv.html"><button>Créer nouveau CV</button></a>
            <a href="http://localhost:8080/tp_php/deconnect/deconnect.php"><button>Se déconnecter</button></a>
        </div>
    </div>
</body>
</html>