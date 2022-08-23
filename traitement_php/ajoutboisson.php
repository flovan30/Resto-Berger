<?php

$link = 'localhost';
$user = 'root';
$mdp = '';
$bdd = 'resto-berger';

$base = mysqli_connect($link, $user, $mdp, $bdd);
if ($base) {
    //on "exporte" le nom est on le met dans la variable nomentree
    $nomBoisson = ($_POST['nomBoisson']);
    //on "exporte" le rpix est on le met dans la variable prixentree
    $prixBoisson = ($_POST['prixBoisson']);

    //  ci-dessous on declare les variables concernant le fichier uploadé 
    if (isset($_FILES['imageBoisson'])) {
        $tmpname = $_FILES['imageBoisson']['tmp_name'];
        $name = $_FILES['imageBoisson']['name'];
        $size = $_FILES['imageBoisson']['size'];

        // ajout de la variable pour l'extension du fichier
        $extension = strrchr($name, '.');
        // tableau des extenssion qui sont accepté 
        $extensions_accepte =  array ('.jpg', '.JPG','.png', '.PNG' , '.jpeg' , '.JPEG');

        if (in_array($extension, $extensions_accepte)) {
            $uniqueName = uniqid("", true);
            $file = $uniqueName . $extension;
            $local_image = "../uploaded_images/boisson";

            //on deplace ensuite l'image dans le dossier uploaded_image à la racine du site  uniquement si l'extention est bonne 
            move_uploaded_file($tmpname,$local_image.$file);

            //on entre ensuite le nom de l'image dans la base de donnée 
            $requete = 'INSERT INTO boisson (libelleBoisson_Boisson,prixBoisson_Boisson,photoBoisson) VALUES ("'. $nomBoisson . '","'. $prixBoisson . '","'. $file . '")';
            mysqli_query($base, $requete);
            echo '<body onLoad="alert(\'Boisson enregistré\')">';
            echo '<meta http-equiv="refresh" content="0;URL=../PageAdmin.php">';
        } 
        
        else {
            echo '<body onLoad="alert(\'Extention incorect seul les fichier en .jpg / .png / .jpeg sont accepté, \')">';
            echo '<meta http-equiv="refresh" content="0;URL=../PageAdmin.php">';
        }
    } else {
        echo '<body onLoad="alert(\'ERREUR aucune image trouvé\')">';
        echo '<meta http-equiv="refresh" content="0;URL=../PageAdmin.php">';
    }
} else {
    echo '<body onLoad="alert(\'ERREUR impossible de se connecter à la base de données\')">';
    echo '<meta http-equiv="refresh" content="0;URL=../PageAdmin.php">';;
}
// reste à implémenté la taille max