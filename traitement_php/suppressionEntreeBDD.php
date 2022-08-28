<?php
    $link = 'localhost';
    $user = 'root';
    $mdp = '';
    $bdd = 'test_bdd_resto_berger';
    $base = mysqli_connect($link, $user, $mdp, $bdd);
    
    if ($base) {
        //on recupere le numeros de l'entree à supprimé
        $idEntree = ($_POST['idEntree']);

        //on envoie ensuite une requete pour pouvoir connaitre le chemin de l'image
        $requete1 = "SELECT adressePhotoEntree FROM entree WHERE idEntree = '$idEntree'";
        $result = mysqli_query($base,$requete1);
        $rows = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){
            $adressePhotoEntree = $row['adressePhotoEntree'];
        }
        
        // on envoie alors une seconde requete pour supprimé la ligne voulu
        $requete2 = "DELETE FROM `entree` WHERE idEntree = '$idEntree'";
        mysqli_query($base,$requete2);
        //puis on efface la photo dans le dossier à l'aide d'une dernière requete en PHP
        $fichier = "../$adressePhotoEntree";
        if(file_exists($fichier)){unlink($fichier);}

        echo '<body onLoad="alert(\'Entrée supprimé\')">';
        echo '<meta http-equiv="refresh" content="0;URL=../PageAdmin.php">';
    }
?>