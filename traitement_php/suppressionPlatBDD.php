<?php
    $link = 'localhost';
    $user = 'root';
    $mdp = '';
    $bdd = 'test_bdd_resto_berger';
    $base = mysqli_connect($link, $user, $mdp, $bdd);
    
    if ($base) {
        //on recupere le numeros de l'entree à supprimé
        $idPlat = $_POST['idPlat'];

        //on envoie ensuite une requete pour pouvoir connaitre le chemin de l'image
        $requete1 = "SELECT adressePhotoPlat FROM plat WHERE idPlat = '$idPlat'";
        $result = mysqli_query($base,$requete1);
        $rows = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){
            $adressePhotoPlat = $row['adressePhotoPlat'];
        }
        
        // on envoie alors une seconde requete pour supprimé la ligne voulu
        $requete2 = "DELETE FROM `plat` WHERE idPlat = '$idPlat'";
        mysqli_query($base,$requete2);
        //puis on efface la photo dans le dossier à l'aide d'une dernière requete en PHP
        $fichier = "../$adressePhotoPlat";
        if(file_exists($fichier)){unlink($fichier);}

        echo '<body onLoad="alert(\'Plat supprimé\')">';
        echo '<meta http-equiv="refresh" content="0;URL=../PageAdmin.php">';
    }
?>