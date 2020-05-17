<?php
  session_start();
  $_SESSION['id_candidat'] = $_POST['id_candidat'];
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>update user</title>
  <link rel="stylesheet" href="style_form.css">
</head>
<body>
  <!-- Affichage du formulaire de modification de compte candidat -->
  <div  id="container">
    <h1>Modifier le compte candidat : <h1>
    <form method="post" action="update_user.php">
        <p>
        <p> Nom : </p>
        <input type="text" name="nom" />
        <p> Prénom : </p>
        <input type="text" name="prenom" />
        <p> Email : </p>
        <input type="text" name="email" />
        <p> Mot de passe : </p>
        <input type="password" name="mot_de_passe" />
        <input type="submit" value="Valider" />
      </p> 
    </form>
  <div>
</body>
</html>