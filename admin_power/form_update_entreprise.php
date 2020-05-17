<?php
  session_start();
  $_SESSION['id_entreprise'] = $_POST['id_entreprise'];
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>update entreprise</title>
  <link rel="stylesheet" href="style_form.css">
</head>
<body>
    <!-- Affichage du formulaire de modification de compte entreprise -->
    <div id="container">
      <h1>Modification compte entreprise : </h1>
      <form method="post" action="update_entreprise.php">
        <p> Nom : </p>
        <input type="text" name="nom" />
        <p> Email : </p>
        <input type="text" name="email" />
        <p> Mot de passe : </p>
        <input type="password" name="mdp"/>
        </br>
        <input type="submit" value="Valider" />
        </p>
      </form>
  </div>
</body>
</html>