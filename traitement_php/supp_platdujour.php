<?php
$link = 'localhost';
$user = 'root';
$mdp = '';
$bdd = 'test_bdd_resto_berger';
$base = mysqli_connect($link, $user, $mdp, $bdd);

if ($base) {
    //on recupere le numero du plat pour l'ajouter en plat du jour 
    $idPlat = $_POST['idPlat'];
    
    // on requete pour mettre à jour le plat
    $requete = "UPDATE plat SET platdujour = 0 WHERE idPlat = '$idPlat'";
    mysqli_query($base,$requete);

    echo '<body onLoad="alert(\'Plat du jour supprimé\')">';
    echo '<meta http-equiv="refresh" content="0;URL=../PageAdmin.php">';
}
?>