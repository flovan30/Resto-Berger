<?php

// preparation pour connexion a la base de donnees
$link = 'localhost';
$user = 'root';
$mdp = '';
$bdd = 'test_bdd_resto_berger';
$base = mysqli_connect($link, $user, $mdp, $bdd);


if($base){
    // recuperation des donnees
    $prenomClient = ($_POST['prenomClient']);
    $nomClient = ($_POST['nomClient']);
    $mailClient = ($_POST['mailClient']);
    $telClient = ($_POST['telClient']);
    $mdpClient = ($_POST['mdpClient']);
    $confirme_mdpClient = ($_POST['confirme_mdpClient']);

    // variable de verification pour le telephone 
    $verifTel = FALSE;
    $longueurTel = strlen($telClient);

    // variables de verification pour le mail
    $verifMail = FALSE;
    $longueurMail = strlen($mailClient);

    // variable de verification pour le mot de passe 
    $maj = FALSE;
    $min = FALSE;
    $chi = FALSE;
    $cara = FALSE;
    $verifMDP = FALSE;
    $longueurMotdepasse = strlen($mdpClient);

// ________________________________________verif ___________________________________

    // verification des conditions pour le tel
    if($longueurTel == 10 && $telClient[0] == chr(48)){
        $verifTel = true;
    }

    // verification des conditions pour le mail
    for($i=0; $i < $longueurMail; $i++){
        if ($mailClient[$i]==chr(64)){
            $verifMail = true;
        }
    }

    // verification des conditions pour le mot de passe 
    for($i=0; $i < $longueurMotdepasse; $i++){
        if($mdpClient[$i]>=chr(65) && $mdpClient[$i]<=chr(90)){
            $maj = true;
        }
        if($mdpClient[$i]>=chr(97) && $mdpClient[$i]<=chr(122)){
            $min = true;
        }
        if ($mdpClient[$i]>=chr(48) && $mdpClient[$i]<=chr(57)){
            $chi = true;
        }
        if($mdpClient[$i]>=chr(33) && $mdpClient[$i]<=chr(47) || $mdpClient[$i] <=chr(58) && $mdpClient[$i]<=chr(64) || $mdpClient[$i]<=chr(91) && $mdpClient[$i]<=chr(96) || $mdpClient[$i]>=chr(123) && $mdpClient[$i]<=chr(126)){
            $cara = true;
        }
    }

    if(strcmp($mdpClient,$confirme_mdpClient) == 0){
        $verifMDP = true;
    }

    // chiffrement du mot de passe 
    if($verifMDP = true && $maj == true && $min == true && $chi == true && $cara == true){
        $mdpClient = hash('sha256',$mdpClient);
    }

    // si toutes les conditions sont respecter on entre les informations dans la base de donnees
    if($verifMail == TRUE && $verifTel == TRUE && $verifMDP == TRUE){
        $requete = 'INSERT INTO clients (prenomClient,nomClient ,mailClient,telClient,mdpClient) VALUES ("'. $prenomClient .'","'. $nomClient .'","'. $mailClient .'","'. $telClient .'","'. $mdpClient .'")';
        mysqli_query($base, $requete);
        echo '<body onLoad="alert(\'Vous venez de vous enregistrer \')">';
        echo '<meta http-equiv="refresh" content="0;URL=../connexion.html">';
    }
}

?>
<!--- pour la connexion on dechiffre pas le mot de passe 
on chiffre le mot de passe rentré par l'utilisateur et on vérifie si c'est le même que dans la bdd
en le recherchant grace a l'email tapper -->