<?php

$link = 'localhost';
$user = 'root';
$mdp = '';
$bdd = 'test_bdd_resto_berger';

$base = mysqli_connect($link, $user, $mdp, $bdd);
if ($base) {
    //on "exporte" le nom est on le met dans la variable nomDessert
    $nomDessert = ($_POST['nomDessert']);
    //on "exporte" le prix est on le met dans la variable prixDessert
    $prixDessert = ($_POST['prixdessert']);

    //  ci-dessous on declare les variables concernant le fichier uploadé 
    if (isset($_FILES['imageDessert'])) {
        $tmpname = $_FILES['imageDessert']['tmp_name'];
        $name = $_FILES['imageDessert']['name'];
        $size = $_FILES['imageDessert']['size'];

        // ajout de la variable pour l'extension du fichier
        $extension = strrchr($name, '.');
        // tableau des extenssion qui sont accepté 
        $extensions_accepte =  array ('.jpg', '.JPG','.png', '.PNG' , '.jpeg' , '.JPEG');

        if (in_array($extension, $extensions_accepte)) {
            $uniqueName = uniqid("", true);
            $file = $uniqueName . $extension;
            $local_image = "../uploaded_images/dessert";

            //on deplace ensuite l'image dans le dossier uploaded_image à la racine du site  uniquement si l'extention est bonne 
            move_uploaded_file($tmpname,$local_image.$file);
            // adresse ou se trouve l'image 
            $adresse_image_dessert = $local_image.$file;

            //on retire les caractère au debut pour recupèrer la photo
            $newAdresse_image_dessert = substr($adresse_image_dessert, 3);
            //on entre ensuite le nom de l'image dans la base de donnée 
            $requete = 'INSERT INTO dessert (libelleDessert,prixDessert,adressePhotoDessert) VALUES ("'. $nomDessert . '","'. $prixDessert . '","'. $newAdresse_image_dessert . '")';
            mysqli_query($base, $requete);
            echo '<body onLoad="alert(\'Dessert enregistré\')">';
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