<?php
    include_once('../config/pdo.php');
    session_start();

    // requêtes SQL pour récupérer l'id de l'utilisateur et son CV en fonction de son id

    $mail = $_SESSION['email'];
    $query = $pdo->query("SELECT id_candidat FROM candidat WHERE mail LIKE '$mail'");
    $ids = $query->fetch();
    $id = $ids['id_candidat'];
    $query2 = $pdo->query("SELECT id_CV AS `numéros d'identification CV`, id_candidat AS `numéros d'identification candidat`, diplomes AS `dipômes`, permis, competences AS `compétences`, loisirs FROM CV WHERE id_candidat = '$id'");
    $liste_CV = $query2->fetch();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>mon CV</title>
  <link rel="stylesheet" href="style_connect.css">
</head>
<body>
    <!-- Affichage du CV de l'utilisateur -->
    <div id='container'>
        <h1>Mon CV : <h1>
        <table>
        <?php
                echo "<tr>";
                foreach ($liste_CV as $title=>$donnee)
                {
                    echo $title . " : ";
                    echo $donnee;
                    echo "</br>";
                }
                echo "</tr>";
                echo "</br>";
                echo "</br>";
        ?>
        </table>
    <div>
</body>
</html>