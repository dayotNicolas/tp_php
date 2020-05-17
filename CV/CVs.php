<?php
    include_once('../config/pdo.php');

    // requête SQL pour récupérer la totalité des CV.
    $query = $pdo->query("SELECT id_CV AS `numéros d'identification CV`, id_candidat AS `numéros d'identification candidat`, diplomes AS `dipômes`, permis, competences AS `compétences`, loisirs, pdf_path FROM cv");
    $liste_CV = $query->fetchAll(PDO::FETCH_ASSOC);
    
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Les CV</title>
  <link rel="stylesheet" href="style_connect.css">
</head>
<body>
    <!-- Affichage séparé de tous les CV avec un lien de téléchargement pour ceux qui sont postés en PDF -->
    <h1>Quelques CV : <h1>
    <table>
    <?php
        foreach($liste_CV as $CVs)
        {
            echo "<div id='container'";
            echo "<tr>";
            foreach($CVs as $key => $CV)
            {
                if ($key == "pdf_path")
                {
                    $link_path = $CV;
                } else 
                {
                echo "{$key} : {$CV} ";
                echo "</br>";
                }
            }
            $link = substr($link_path, 15);
            echo "</tr>";
            echo "</br>";
            if (isset($link_path))
            {
            echo "<a href='http://localhost:8080/$link' download='CV.pdf'>Télécharger le CV</a>";
            }
            echo "</br>";
            echo "</div>";
        }
    ?>
    </table>
</body>
</html>