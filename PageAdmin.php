<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="uts-8">
    <link rel="stylesheet" type="text/css" href="style/style_nav.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Martel:wght@900&display=swap" rel="stylesheet">
    <title>Page d'administration</title>
</head>

<body>

    <!--Début de la NavBar-->
    <div class="nav">
        <ul>
            <!-- Logo -->
            <li>
                <img src="images/gaston_berger.png" class="logo" alt="logo resto-berger">
            </li>

            <!-- Lien vers l'accueil -->
            <li>
                <a href="index.php">
                    <div class="icon">
                        <i class="fas fa-home" aria-hidden="true"></i>
                        <i class="fas fa-home" aria-hidden="true"></i>
                    </div>
                    <div class="name"><span data-text="Accueil">Accueil</span></div>
                </a>
            </li>

            <!-- Lien vers le menu -->
            <li>
                <a href="menu.php">
                    <div class="icon">
                        <i class="fas fa-utensils"></i>
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="name"><span data-text="Menu">Menu</span></div>
                </a>
            </li>

            <!-- Lien vers la reservation -->
            <li>
                <a href="reservation.php">
                    <div class="icon">
                        <i class="fas fa-concierge-bell"></i>
                        <i class="fas fa-concierge-bell"></i>
                    </div>
                    <div class="name"><span data-text="Réservation">Réservation</span></div>
                </a>
            </li>

            <!-- Lien vers la page de contact -->
            <li>
                <a href="Contact.php">
                    <div class="icon">
                        <i class="fas fa-id-card"></i>
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="name"><span data-text="Contact">Contact</span></div>
                </a>
            </li>

            <?php
    if(!empty($_SESSION['username']) && $_SESSION['admin?'] == 1){
?>
            <!-- Lien vers le profil si utilisateur connecté admin-->
            <li>
                <a href="PageAdmin.php">
                    <div class="icon">
                        <i class="fas fa-gear"></i>
                        <i class="fas fa-gear"></i>
                    </div>
                    <div class="name"><span data-text="ADMIN">ADMIN</span></div>
                </a>
            </li>
            <?php
    }
    else if(!empty($_SESSION['username']) && $_SESSION['admin?'] == 0){
        ?>
            <!-- Lien vers le profil si utilisateur connecté non-admin-->
            <li>
                <a href="profile.php">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="name"><span data-text="Profile">Mon_Profile</span></div>
                </a>
            </li>
            <?php
    }
    else{
?>
            <!-- Lien vers la connexion si utilisateur pas connecté-->
            <li>
                <a href="connexion.php">
                    <div class="icon">
                        <i class='fas fa-key'></i>
                        <i class='fas fa-key'></i>
                    </div>
                    <div class="name"><span data-text="Connexion">Connexion</span></div>
                </a>
            </li>
            <?php
    }
?>


        </ul>
        <br><br><br><br><br><br><br><br><br><br>
    </div>
    <!--Fin de la NavBar-->


    <div class="contactUS">

        <div class="title">
            <h2>Page d'administration</h2>
        </div>
        <a href="traitement_php/deconnexion.php">se deconnecter</a>
        <!--_______________________________________________ce qui concerne les entrées____________________________________________________________________________________-->

        <div class="box">
            <div class="contact from">
                <h3>liste des entrées</h3>

                <!-- liste qui contient toutes les entrees -->
                <?php
        $link = 'localhost';
        $user = 'root';
        $mdp = '';
        $bdd = 'test_bdd_resto_berger';
        $base = mysqli_connect($link, $user, $mdp, $bdd);

        if ($base){
            $nb_entree = mysqli_query($base, 'SELECT * FROM entree');
            echo"<table>";
            echo"<tr><th>id entrée</th><th>Désignation entrée</th><th>Prix entrée</th></tr>";
            while($ligne = mysqli_fetch_row($nb_entree)){
                echo "<tr> <td>".$ligne['0']."</td> <td>".$ligne['1']."</td> <td>".$ligne['2']. "</td> </tr>";
            }
            echo"</table><BR>";
        }
    ?>

                <!-- formulaire d'ajout d'entrée  -->
                <h3>Ajout d'une entree à la base de donnée</h3>
                <form enctype="multipart/form-data" action="traitement_php/ajoutentree.php" method="post">
                    <input type="text" name="nomEntree" id="nomEntree" required>
                    <label for="nomEntree">Nom de l'entree</label><br><br>
                    <input type="number" step="0.01" name="prixentree" id="prixentree" required>
                    <label for="prixentree">Veuillez saisir le prix de l'entree</label><br><br>
                    <input type="file" name="imageEntree" id="imageEntree" required>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <label for="imageEntree"><br> Veuillez choisir une image pour votre entree</label><br>
                    <input type="submit" value="Ajouter à la base de donnée" />
                </form><br>


                <h3>Suppression d'une entrée à la base de données</h3>
                <form action="traitement_php/suppressionEntreeBDD.php" method="POST">
                    <input type="number" name="idEntree" id="idEntree"><br>
                    <label for="idEntree">Veuilez saisir l'identifiant de l'entrée à supprimer dans la base de
                        données</label><br>
                    <input type="submit" value="Supprimer de la base de données">
                    <input type="reset" value="Effacer">
                </form>

</body>

</html>