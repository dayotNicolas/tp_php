<?php
    include_once('../config/pdo.php');
    session_start();

    function upload_save($path, $email, $bd)
    {
        $query=$bd->prepare("UPDATE CV AS c INNER JOIN candidat AS e ON (c.id_candidat = e.id_candidat) SET c.pdf_path = '$path'  WHERE c.id_candidat = e.id_candidat and e.mail = '$email' ");
        $query->execute();
    }

    $email = $_SESSION['email'];
    // Vérifier si le formulaire a été soumis
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Vérifie si le fichier a été uploadé sans erreur.
        if(isset($_FILES['photo']) && $_FILES['photo']["error"] == 0){
            $allowed = array("pdf" => "application/pdf");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];

            // Vérifie l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

            // Vérifie la taille du fichier - 5Mo maximum
            $maxsize = 10 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");
        
            if(in_array($filetype, $allowed)){
                $path = "C:/xampp/htdocs/tp_php/upload/" . $_FILES["photo"]["name"];
                move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
                upload_save($path, $email, $pdo);
                header("Location: http://localhost:8080/tp_php/homes/home_c.php");
                exit();
            } else{
                echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
            }
        } else{
            echo "Error: " . $_FILES["photo"]["error"];
        }
    }
?>