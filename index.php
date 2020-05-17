<?php
  session_start();
  if (!isset($_SESSION['isConnected'])) {
      $_SESSION['isConnected'] = FALSE;
  }
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>index</title>
  <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>
<body>
  <div id="container">
    <h1>Connection en tan que :<h1>
    <button onclick ="window.location.href = 'http://localhost:8080/tp_php/connect/connectcandidat.php';">Candidat</button>
    <button onclick ="window.location.href = 'http://localhost:8080/tp_php/connect/connectentreprise.php';">Entreprise</button>
    <button onclick ="window.location.href = 'http://localhost:8080/tp_php/connect/connectadmin.php';">Administrateur</button>
  </div>
  <div id="container">
    <p>Nouveau? Créer un compte</p>
    <button onclick ="window.location.href = 'http://localhost:8080/tp_php/create_accompt/new_candidat.html';">Candidat</button>
    <button onclick ="window.location.href = 'http://localhost:8080/tp_php/create_accompt/new_entreprise.html';">Entreprise</button>
  </div>
</body>
</html>