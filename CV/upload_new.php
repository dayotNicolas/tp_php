<?php
    include_once('../config/pdo.php');    
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>upload</title>
  <link rel="stylesheet" href="style_connect.css">
</head>
<body>
    <!-- Affichage du formulaire d'enregistrement de l'upload -->
    <div id="container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <h2>Upload Fichier</h2>
          <label for="fileUpload">Fichier:</label>
          <input type="file" name="photo" id="fileUpload">
          <input type="submit" name="submit" value="Upload">
          <p><strong>Note:</strong> Seul les formats PDF sont autorisés.</p>
        </form>
    </div>
</body>
</html>