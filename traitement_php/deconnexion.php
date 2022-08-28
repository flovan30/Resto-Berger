<?php
session_start();

if(session_destroy()){
    echo '<body onLoad="alert(\'Vous êtes déconnecté \n Vous aller être redirigé vers la page Accueil\')">';
    echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
}
?>