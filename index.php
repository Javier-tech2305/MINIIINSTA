<?php
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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <h1>MINiINSTA</h1>
    
    
        <form action="user.php" method="post" enctype="multipart/form-data">
            <input type="text" name="author" placeholder="Auteur" required>
            <input type="file" name="photo" accept="image/*" required>
            <input type="submit" value="Envoyer">
        </form>
    
        <div class="fichiers">
                <?php foreach ($liste_des_fichiers as $file_name): ?>
                <img src="photos/<?=$file_name ?>" >
                <?=$file_name?>
                <?php endforeach; ?>
        </div>
        
    

</body>
</html>