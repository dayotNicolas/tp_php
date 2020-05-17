<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>connexion</title>
  <link rel="stylesheet" href="style_connect.css">
</head>
<body>
  <!-- Affichage formulaire de connexion entreprise -->
  <div id='container'>
    <h1>Connexion en tant qu'entreprise :<h1>
    <form method="post" action="connexion_e.php">
  
      <p>
        <p> Email : </p>
        <input type="text" name="email" />
        <p> Mot de passe : </p>
        <input type="password" name="mot_de_passe"/>
        </br>
        <input type="submit" value="Valider" />
      </p> 
    </form>
</div>
</body>
</html>