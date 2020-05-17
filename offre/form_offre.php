<?php
  session_start();
  $_SESSION['id_offre'] = $_POST['id_offre'];
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>index</title>
  <link rel="stylesheet" href="style_connect.css">
</head>
<body>
  <!-- Affichage du formulaire de modification d'une offre -->
  <div id='container'>
    <h1>Modification de l'offre<h1>
    <form method="post" action="save_offre.php">
       <p>
        <p> titre de l'offre : </p>
        <input type="text" name="titre" style="width:350px;"/>
        <p> description : </p>
        <input type="text" name="description" style="width:350px; height:400px"/>
        <p> expérience requise : </p>
    <input type="text" name="experience" style="width:350px;" />
        <input type="submit" value="Valider" />
      </p> 
    </form>
  <div>
</body>
</html>