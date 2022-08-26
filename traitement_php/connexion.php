<?php
    // si le formulaire est envoye 
    if(isset($_POST['mail']) && isset($_POST['motdepasse'])){
        // preparation a la connexion à la base de données 
        $link = 'localhost';
        $user = 'root';
        $mdp = '';
        $bdd = 'test_bdd_resto_berger';
        $base = mysqli_connect($link, $user, $mdp, $bdd);
        
        // on recupére l'ensemble des données entrées
        $mail = $_POST['mail'];
        $motdepasse = $_POST['motdepasse'];
        $motdepassehash = hash('sha256',$motdepasse);

        
        if(!empty($mail) && !empty($motdepasse)){
            $requete = ("SELECT prenomClient FROM clients WHERE mailClient = '$mail' AND mdpClient = '$motdepassehash'");
            $result = mysqli_query($base,$requete);
            $rows = mysqli_num_rows($result);
            
            while($row = mysqli_fetch_assoc($result)){
            $prenom = $row['prenomClient'];
            }
            
            if($rows===1){
                echo '<body onLoad="alert(\'Vous êtes connecté, Bienvenue ' . $prenom . ' \n Vous aller être redirigé vers la page Accueil\')">';
                echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
            }

            else{
                echo '<body onLoad="alert(\'Le compte est introuvable \n Vous aller être redirigé vers la page de connexion\ \')">';
                echo '<meta http-equiv="refresh" content="0;URL=../connexion.php">';
            }
        }
        else{
            echo '<body onLoad="alert(\'Veuillez contacter un administrateur du site \')">';
            echo '<meta http-equiv="refresh" content="0;URL=../connexion.php">';
        }
    }
    else{
        echo '<body onLoad="alert(\'Aucune informations reçu \')">';
        echo '<meta http-equiv="refresh" content="0;URL=../connexion.php">';
    }
?>