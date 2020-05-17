<?php
require_once('../models/entreprise.php');
require_once('../userManagers/User_entreprise_Manager.php');
require_once('../models/offre_model.php');
require_once('../userManagers/offre_Manager.php');
include_once('../config/pdo.php');
session_start();

if(isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    // rendre accessible les données privées : 
    $reflexion = new ReflectionObject($user);
    $nom = $reflexion->getProperty('nom');
    $nom->setAccessible(true);
    $mail = $reflexion->getProperty('mail');
    $mail->setAccessible(true);
}
$email = $_SESSION['email'];

// récupération de l'id entreprise
$query1 = $pdo->query("SELECT id_entreprise FROM entreprise WHERE mail LIKE '$email'");
$id_entreprises = $query1->fetch();
$id_entreprise = $id_entreprises['id_entreprise'];

// récupération des offres de l'utilisateur
$query2 = $pdo->query("SELECT id_offre AS `numéros d'identification de l'offre`, id_entreprise AS `numéros d'identification entreprise`, titre, description_offre AS `Description`, experience FROM offre WHERE id_entreprise = '$id_entreprise'");
$liste_offres = $query2->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>home candidat</title>
  <link rel="stylesheet" href="styleC.css"> 
</head>
<body>
    <h1>home</h1>
    <div id='container'>
        <!-- Affichage du profil -->
        <div id='profil'>
            <h2>Profil entreprise</h2>
            <p>
            <?php
                echo 'Votre nom : ' . $nom->getValue($user);
            ?>
            </p>
            <p>
            <?php
                echo 'votre mail :' . $mail->getValue($user);
            ?>
            </p>
            <button id='buttonP' onclick ="window.location.href = 'http://localhost:8080/tp_php/update_profil/form_update_e.html';">Modifier</button>
        </div>
        <div id='offres'>
            <table>
            <!-- Affichage des offres de cette entreprise -->
            <?php
                foreach($liste_offres as $offres)
                {
                    echo "<div id='uneoffre'>";
                    echo "<tr>";
                    foreach($offres as $key => $offre)
                    {   
                        echo "{$key} : {$offre} ";                
                        if ($key == "numéros d'identification de l'offre")
                        {
                           $id_offre = $offre;
                        }
                        echo "</br>";
                    }
                    
                    echo "</tr>";
                    echo "</br>";
                    echo "<form action='http://localhost:8080/tp_php/offre/form_offre.php' method='post'>
                          <p>
                          <input type='hidden' name='id_offre' value='$id_offre' />
                          <input type='submit' value='Modifier' />
                          </p>
                          </form>";
                    echo "<form action='http://localhost:8080/tp_php/offre/del_offre.php' method='post'>
                          <p>
                          <input type='hidden' name='id_offre' value='$id_offre' />
                          <input type='submit' value='supprimer' />
                          </p>
                          </form>";
                    echo "</div>";
                    echo "</br>";
                }
            ?>
            </table>
        </div>
        <div id="button">
            <button onclick ="window.location.href = 'http://localhost:8080/tp_php/offre/form_new_offre.html';">Ajouter une offre</button>
            <button onclick ="window.location.href = 'http://localhost:8080/tp_php/CV/CVs.php';">Voir quelques CV</button>    
            <button onclick ="window.location.href = 'http://localhost:8080/tp_php/deconnect/deconnect.php';">Se déconnecter</button>
        <div>
    </div>
</body>
</html>