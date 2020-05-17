<?php
require_once('../models/admin.php');
require_once('../userManagers/User_admin_Manager.php');
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

// récupération de toutes les données candidats et entreprises.
$query = $pdo->query("SELECT * FROM candidat");
$liste_candidats = $query->fetchAll(PDO::FETCH_ASSOC);

$query2 = $pdo->query("SELECT * FROM entreprise");
$liste_entreprises = $query2->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>home administrateur</title>
  <link rel="stylesheet" href="styleA.css">
</head>
<body>    
    <h1>home</h1>
    <!-- Affichage des tableaux candidats et entreprises avec des boutons pour modifier ou supprimer les comptes -->
    <div id="container">
        <div id="profil">
            <h2>Profil</h2>
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
            <button id='buttonP' onclick ="window.location.href = 'http://localhost:8080/tp_php/update_profil/form_update_a.html';">Modifier</button>
        </div>
        <div class="tableau">
            <table>
            <?php
                foreach($liste_candidats as $candidats)
                {   
                    echo "<div id='case'>";
                    echo "<tr>";
                    foreach($candidats as $key => $candidat)
                    {   
                        echo "{$key} : {$candidat} ";                
                        if ($key == "id_candidat")
                        {
                           $id_candidat = $candidat;
                        }
                        echo "</br>";
                    }
                    
                    echo "</tr>";
                    echo "</br>";
                    echo "<form action='http://localhost:8080/tp_php/admin_power/form_update_user.php' method='post'>
                          <p>
                          <input type='hidden' name='id_candidat' value='$id_candidat' />
                          <input type='submit' value='Modifier' />
                          </p>
                          </form>";
                    echo "<form action='http://localhost:8080/tp_php/admin_power/del_user.php' method='post'>
                          <p>
                          <input type='hidden' name='id_candidat' value='$id_candidat' />
                          <input type='submit' value='supprimer' />
                          </p>
                          </form>";
                    echo "</br>";
                    echo "</div>";
                }
            ?>
            </table>
        </div>
        <div class="tableau">
            <table>
            <?php
                foreach($liste_entreprises as $entreprises)
                {
                    echo "<div id='case'>";
                    echo "<tr>";
                    foreach($entreprises as $key => $entreprise)
                    {   
                        echo "{$key} : {$entreprise} ";                
                        if ($key == "id_entreprise")
                        {
                           $id_entreprise = $entreprise;
                        }
                        echo "</br>";
                    }
                    
                    echo "</tr>";
                    echo "</br>";
                    echo "<form action='http://localhost:8080/tp_php/admin_power/form_update_entreprise.php' method='post'>
                          <p>
                          <input type='hidden' name='id_entreprise' value='$id_entreprise' />
                          <input type='submit' value='Modifier' />
                          </p>
                          </form>";
                    echo "<form action='http://localhost:8080/tp_php/admin_power/del_entreprise.php' method='post'>
                          <p>
                          <input type='hidden' name='id_entreprise' value='$id_entreprise' />
                          <input type='submit' value='supprimer' />
                          </p>
                          </form>";
                    echo "</br>";
                    echo "</div>";
                }
            ?>
            </table>
        </div>
        <button onclick ="window.location.href = 'http://localhost:8080/tp_php/deconnect/deconnect.php';">Se déconnecter</button>
    </div>
</body>
</html>