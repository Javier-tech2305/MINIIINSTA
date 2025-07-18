<?php

if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {

     if(isset($_POST)){
        $nomphoto=$_POST["author"];
    }
    $today = date("Y-m-d H:i:s");

    $photoinf=$today.$nomphoto;
    
    $dossier_destination = "photos/";
    
    $chemin_temporaire = $_FILES["photo"]["tmp_name"];
    $nom_fichier = basename($_FILES["photo"]["name"]);
    $chemin_complet = $dossier_destination ."-". $photoinf ."-".$nom_fichier;
    
    $types_autorises = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $type_fichier = mime_content_type($chemin_temporaire);
    
    if (in_array($type_fichier, $types_autorises)) {
        move_uploaded_file($chemin_temporaire, $chemin_complet);
    } else {
        echo "alert('Type de fichier non autorisé')";
    }
}


function lire_dossier() {
    $file_names = [];
    $dossier = "photos/";
   
    
    if (is_dir($dossier)) {
        $fichiers = scandir($dossier);
        foreach ($fichiers as $fichier) {
            if ($fichier != "." && $fichier != "..") {
                $file_names[] = $fichier;
            }
        }
    }
    
    return $file_names;
}

$liste_des_fichiers = lire_dossier();









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MINiINSTA</title>
</head>
<body>
     <h1> Bonjour </h1>
        <div class="fichiers">
                <?php foreach ($liste_des_fichiers as $file_name): ?>
                <img src="photos/<?=$file_name ?>" >
                <?=$file_name?>
                <?php endforeach; ?>
        </div>
    <a href="index.php">RETOUR A  L'ACCUEIL</a>
</body>
</html>

