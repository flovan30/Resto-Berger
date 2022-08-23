<?php
    session_start();
    // si le formulaire est envoye 
    if(isset($_POST['mail']) && isset($_POST['motdepasse'])){
        // preparation a la connexion à la base de données 
        $link = 'localhost';
        $user = 'id18837970_administrateur';
        $mdp = 'P@ssword123456789';
        $bdd = 'id18837970_resto_berger';
        $base = mysqli_connect($link, $user, $mdp, $bdd);
        
        // on recupére l'ensemble des données entrées
        $mail = $_POST['mail'];
        $motdepasse = $_POST['motdepasse'];
        // on verifie que les champs ne sont pas vide
        if(!empty($mail) && !empty($motdepasse)){
            $requete = ("SELECT * FROM clients WHERE mailClient_Clients = $mail");
            mysqli_query($base,$requete);
            $result = array();
            

            if($result == TRUE){
                // le compte existe
                $hashpassword = $result['mdpClient_Clients'];
                if(password_verify(hash('sha256',$motdepasse),$hashpassword)){
                    echo "Connexion en cour";
                }
            }
            else{
                echo '<body onLoad="alert(\'le compte existe pas \')">';
                echo '<meta http-equiv="refresh" content="0;URL=../connexion.html">';  
            }
        }
        else{
            echo '<body onLoad="alert(\'veuillez saisir toutes les champs \')">';
            echo '<meta http-equiv="refresh" content="0;URL=../connexion.html">';
        }
    }
    else{
        echo '<body onLoad="alert(\'Aucun formualaire reçu\')">';
        echo '<meta http-equiv="refresh" content="0;URL=../connexion.html">';
    }
?>